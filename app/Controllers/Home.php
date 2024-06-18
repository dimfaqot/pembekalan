<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $db = db('penjudi');
        $q = $db->get()->getResultArray();

        return view('home', ['judul' => 'Home - Masuk atau Daftar', 'data' => $q]);
    }

    public function update($id)
    {

        $db = db('penjudi');
        $q = $db->where('id', $id)->get()->getRowArray();
        $q['uang'] -= 100000;

        $db->where('id', $id);
        $db->update($q);
    }
}
