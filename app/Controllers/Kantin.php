<?php

namespace App\Controllers;

class Kantin extends BaseController
{
    // 1. mencari apakah ada status yang 0 artinya ada yang sedang transaksi
    // 2. jika ada berarti menunggu tap
    // 3. tap dilakukan, 
    // 4. jika saldo tidak cukup maka msg: Saldo tidak cukup status 1 dan semua data terisi (selesai)
    // 5. jika rfid tidak dikenal maka msg: Unregistered card status 1 dan semua data terisi (selesai)
    // 6. jika 

    public function kantin()
    {
        return view('iot/kantin', ['judul' => 'Kantin', 'data' => db('kantin')->orderBy('menu', 'ASC')->get()->getResultArray()]);
    }
    public function harga()
    {
        // kode 0 ada menunggu pembayaran, kode 1 selesai pembayaran
        // $transaksi=
        $data = [
            'biaya' => (int)$this->request->getVar('total'),
            'tgl' => time()
        ];
        if (db('bayar')->insert($data)) {
            sukses_js("Sukses");
        }

        gagal_js("Gagal");
    }
    public function cek_pembayaran()
    {
        $data = [];
        $data = db('bayar')->where('status', 0)->get()->getRowArray();
        $status = 0;

        if ($data) {
            if ($data['msg'] == "Unregistered card") {
                $status = 2;
                $data['status'] = 1;
                $data['user_id'] = time();
                db('bayar')->where('id', $data['id'])->update($data);
            } elseif ($data['msg'] == "Saldo tidak cukup!") {
                $status = 3;
                $data['status'] = 1;
                $user = db('penjudi')->where('id', $data['user_id'])->get()->getRowArray();

                db('bayar')->where('id', $data['id'])->update($data);
                if ($user) {
                    $data['uang'] = $user['uang'];
                    $data['nama'] = $user['nama'];
                }
            } elseif ($data['msg'] == "Transaksi sukses") {
                $status = 4;
                $data['status'] = 1;
                $user = db('penjudi')->where('id', $data['user_id'])->get()->getRowArray();

                db('bayar')->where('id', $data['id'])->update($data);
                if ($user) {
                    $data['uang'] = $user['uang'];
                }
            } else {
                $status = 1;
            }
        }


        sukses_js("Ok", $status, $data);
    }
}
