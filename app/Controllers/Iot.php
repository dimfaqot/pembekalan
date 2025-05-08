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

        return view('iot/lampu', ['judul' => 'Lampu']);
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
    public function lighting()
    {
        $db = db('iot');

        $q = $db->where('kategori', "Lampu")->get()->getRowArray();

        if (!$q) {
            gagal_js("Data not found...");
        }

        sukses_js("Sukses", ($q['value'] == "off" ? 0 : 1));
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
            sukses_js("Sukses", ($q['value'] == "off" ? 0 : 1));
        } else {
            gagal_js("Gagal...");
        }
    }
}
