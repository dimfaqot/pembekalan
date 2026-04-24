<?php

namespace App\Controllers;

class Iot extends BaseController
{
    public function index(): string
    {
        return view('iot/index', ['judul' => 'Iot']);
    }
    public function lampu(): string
    {
        $data = db('iot')->get()->getRowArray();
        return view('iot/lampu', ['judul' => 'Lampu', 'data' => $data]);
    }
    public function kondisi(): string
    {
        $kategori = clear($this->request->getVar('kategori'));
        $db = db('iot');
        $res = null;

        $q = $db->where('kategori', $kategori)->get()->getRowArray();

        if ($q) {
            $res = $q;
        }

        sukses_js("Sukses", $res);
    }
    public function saklar_lampu(): string
    {
        $kategori = clear($this->request->getVar('kategori'));
        $check = clear($this->request->getVar('check'));
        $db = db('iot');

        $q = $db->where('kategori', $kategori)->get()->getRowArray();

        if (!$q) {
            gagal_js("Data not found...");
        }

        $q['value'] = ($q['value'] == "on" ? "off" : "on");
        $q['msg'] = "Lampu dikontrol dari web";
        $db->where('id', $q['id']);

        if ($db->update($q)) {

            if ($q['value'] == "on") {
                sukses_js("Light on...");
            } else {
                gagal_js("Light off...");
            }
        } else {
            gagal_js("Saklar failed...");
        }
    }
    public function durasi_lampu(): string
    {
        $kategori = clear($this->request->getVar('kategori'));
        $durasi = clear($this->request->getVar('durasi'));
        $db = db('iot');

        $q = $db->where('kategori', $kategori)->get()->getRowArray();

        if (!$q) {
            gagal_js("Data not found...");
        }

        $q['durasi'] = $durasi;
        $db->where('id', $q['id']);

        if ($db->update($q)) {

            sukses_js("Sukses...");
        } else {
            gagal_js("Gagal...");
        }
    }
    // kode: 1= daftar rfid, 0= menyalakan atau mematikan lampu
    public function lighting()
    {
        $kode = 0;
        $uid = $this->request->getVar('data'); // dari esp

        // cek apakah sedang mendaftarkan rfid
        $user = db('penjudi')->where('is_tap', 1)->get()->getRowArray();

        // data iot di db
        $db = db('iot');
        $q = $db->where('kategori', "Lampu")->get()->getRowArray();

        // jika sedang ada yang mendaftar rfid
        if ($user && $uid !== "") {
            // masukkan uid ke user
            $user['uid'] = $uid;
            $user['is_tap'] = 0;
            if (!db('penjudi')->where('id', $user['id'])->update($user)) {
                // jika daftar rfid gagal
                $q['msg'] = "Registration failed!";
                $db->where('id', $q['id'])->update($q);
                gagal_js("Registration failed!");
            }

            // jika daftar rfid berhasil
            $q['msg'] = "Card registered";
            $db->where('id', $q['id'])->update($q);
            sukses_js("Card registered");
        }

        // cek apakah sedang ada transaksi kantin
        $transaksi = db('bayar')->where('status', 0)->where('user_id', 0)->get()->getRowArray();

        if ($transaksi && $uid !== "") {
            $pembeli = db('penjudi')->where('uid', $uid)->get()->getRowArray();

            if ($pembeli) {
                $transaksi['user_id'] = $pembeli['id'];
                $transaksi['nama'] = $pembeli['nama'];

                if ($transaksi['biaya'] > $pembeli['uang']) {
                    $transaksi['msg'] = "Saldo tidak cukup!";
                    if (!db('bayar')->where('id', $transaksi['id'])->update($transaksi)) {
                        gagal_js("Saldo tidak cukup!");
                    }
                } else {
                    $transaksi['msg'] = "Transaksi sukses";
                    if (!db('bayar')->where('id', $transaksi['id'])->update($transaksi)) {
                        gagal_js("Transaksi gagal!");
                    }

                    $pembeli['uang'] -= $transaksi['biaya'];

                    if (!db('penjudi')->where('id', $pembeli['id'])->update($pembeli)) {
                        gagal_js("Update saldo gagal");
                    }

                    sukses_js("Transaksi berhasil");
                }
            } else {
                $transaksi['msg'] = "Unregistered card";
                if (!db('bayar')->where('id', $transaksi['id'])->update($transaksi)) {
                    gagal_js("Unregistered card!");
                }
            }
        }

        if ($uid !== "") {
            // jika tidak sedang ada yang mendaftar rfid dan tidak ada pembayaran kantin dan uid tidak kososng berarti menyalakan/mematikan lampu
            // Apakah rfid terdaftar
            $operator_iot = db('penjudi')->where('uid', $uid)->get()->getRowArray();

            // Jika tidak terdaftar
            if (!$operator_iot) {
                $q['msg'] = "Unregistered card";
                $db->where('id', $q['id'])->update($q);
                gagal_js("Unregistered card");
            }

            // Jika terdaftar maka nyalakan lampu
            $msg = "Light turned " . ($q['value'] == "off" ? "on" : "off") . " by " . $operator_iot['nama'];

            $q['msg'] = $msg;
            $q['value'] = ($q['value'] == "off" ? "on" : "off");
            $db->where('id', $q['id'])->update($q);
            $kode = ($q['value'] == "on" ? 1 : 0);
        } else {
            // jika tidak ada yang mendaftar rfid dan uid kosong maka hanya check status lampu saja
            $msg = "Check";
            $kode = ($q['value'] == "on" ? 1 : 0);
        }

        sukses_js($msg, $kode);
    }
    public function is_light_on()
    {

        $iot = db('iot')->get()->getRowArray();

        sukses_js("Ok", $iot);
    }
    public function ble_distance()
    {
        $data = clear($this->request->getVar('data'));
        $db = db('iot');

        $q = $db->where('kategori', "Lampu")->get()->getRowArray();

        if (!$q) {
            gagal_js("Data not found...");
        }

        $q['value'] = $data;
        $db->where('id', $q['id']);

        if ($db->update($q)) {
            sukses_js("Sukses", $data);
        } else {
            gagal_js("Gagal...");
        }
    }
    public function ble_click()
    {
        $data = clear($this->request->getVar('data'));
        $db = db('iot');

        $q = $db->where('kategori', "Lampu")->get()->getRowArray();

        if (!$q) {
            gagal_js("Data not found...");
        }

        $q['value'] = ($q['value'] == "on" ? "off" : "on");
        $db->where('id', $q['id']);

        if ($db->update($q)) {
            sukses_js("Sukses", $data);
        } else {
            gagal_js("Gagal...");
        }
    }

    public function user()
    {
        $users = db('penjudi')->orderBy('nama', 'ASC')->get()->getResultArray();

        sukses_js("Ok", $users);
    }
    public function rfid()
    {
        $id = clear($this->request->getVar('id'));
        $order = clear($this->request->getVar('order'));
        $uid = db('penjudi')->where('id', $id)->get()->getRowArray();


        if ($order == "daftar") {
            if (!$uid) {
                gagal_js("Data not found!.");
            }

            if ($uid['uid'] !== "") {
                gagal_js("Uid existed.");
            }

            $uid['is_tap'] = 1;
            if (db('penjudi')->where('id', $id)->update($uid)) {
                sukses_js("Silahkan tap...");
            }
        }



        sukses_js("Ok", $uid['uid']);
    }
}
