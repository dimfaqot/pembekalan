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
        // 1. check apakak sedang daftar rfid dari status penjudi

        $user = db('penjudi')->where('is_tap', 1)->get()->getRowArray();
        $kode = ($user ? 1 : 0);

        // 2. check status iot on atau off
        $db = db('iot');

        $q = $db->where('kategori', "Lampu")->get()->getRowArray();

        if (!$q) {
            gagal_js("Data not found...");
        }

        sukses_js("Sukses", $kode, ($q['value'] == "off" ? 0 : 1));
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
        $uid = db('penjudi')->where('id', $id)->get()->getRowArray();

        if (!$uid) {
            sukses_js("Ok", "Nama tidak ditemukan!.");
        }

        if ($uid['is_tap'] == 0) {
            $uid['is_tap'] = 1;
            db('penjudi')->where('id', $id)->update($uid);
        }

        sukses_js("Ok", $uid['uid']);
    }
}
