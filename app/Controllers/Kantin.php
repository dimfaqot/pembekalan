<?php

namespace App\Controllers;

class Kantin extends BaseController
{

    public function kantin()
    {
        return view('iot/kantin', ['judul' => 'Kantin', 'data' => db('kantin')->orderBy('menu', 'ASC')->get()->getResultArray()]);
    }
    public function harga()
    {
        // kode 0 ada menunggu pembayaran, kode 1 selesai pembayaran
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
        if ($data && $data['user_id'] != 0) {
            $status = 2;
            $data['status'] = 1;
            $user = db('penjudi')->where('id', $data['user_id'])->get()->getRowArray();

            db('bayar')->where('id', $data['id'])->update($data);
            if ($user) {
                $data['uang'] = $user['uang'];
            }
        } else {
            if ($data['msg'] == "Unregistered card") {
                $status = 3;
                $data['status'] = 1;
                db('bayar')->where('id', $data['id'])->update($data);
            } else {
                $status = 1;
            }
        }

        sukses_js("Ok", $status, $data);
    }
}
