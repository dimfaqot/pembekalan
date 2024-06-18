<?php

namespace App\Controllers;

class Slot extends BaseController
{

    public function index(): string
    {
        return view('slot/index', ['judul' => 'Slot Gacor']);
    }
    public function login(): string
    {
        if (session('id')) {
            sukses(base_url('slotgacor/home'), 'Login.');
        }
        return view('slot/login', ['judul' => 'Login Slot Gacor']);
    }
    public function home(): string
    {
        kadaluarsa('slotgacor/login');
        return view('slot/home_versi_' . settings()['versi'], ['judul' => 'Home']);
    }


    public function penjudi()
    {
        $db = db('penjudi');
        $q = $db->orderBy('jml_taruhan', 'DESC')->orderBy('uang', 'DESC')->orderBy('angka_taruhan', 'ASC')->orderBy('nama', 'ASC')->get()->getResultArray();
        return view('slot/penjudi', ['judul' => 'Penjudi', 'data' => $q]);
    }

    public function daftar()
    {
        $db = db('penjudi');

        $nama = upper_first($this->request->getVar('nama'));
        $uang = $this->request->getVar('uang');
        $username = strtolower($this->request->getVar('username'));
        $password = $this->request->getVar('password');

        $q = $db->where('username', $username)->get()->getRowArray();

        if ($q) {
            gagal(base_url('slotgacor'), 'Username sudah terdaftar!.');
        }

        $data = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama' => $nama,
            'uang' => $uang,
            'role' => 'Member'
        ];


        $db->insert($data);

        sukses(base_url('slotgacor/login'), 'Regitration sussecss.');
    }


    public function pasang_taruhan()
    {
        kadaluarsa('slotgacor/login');
        if (settings()['versi'] == 1 && settings()['bukaan'] == 1) {
            gagal(base_url('slotgacor/home'), 'Taruhan sudah ditutup!.');
        }
        if (settings()['versi'] == 1 && settings()['bukaan'] == 2) {
            gagal(base_url('slotgacor/home'), 'Taruhan belum dibuka!.');
        }
        $db = db('penjudi');
        $q = $db->where('id', user()['id'])->get()->getRowArray();

        if ($q['jml_taruhan'] > 0) {
            gagal(base_url('slotgacor/home'), 'Anda sudah memasang taruhan!.');
        }
        if (!$q) {
            gagal(base_url('slotgacor/login'), 'Id tidak ditemukan!');
        }

        $jml_taruhan = $this->request->getVar('jml_taruhan');
        if ($jml_taruhan < 50000) {
            gagal(base_url('slotgacor/home'), 'Taruhan minilam Rp50.000!.');
        }
        if ($jml_taruhan > $q['uang']) {
            gagal(base_url('slotgacor/home'), 'Saldo Anda tidak cukup!.');
        }
        $angka1 = $this->request->getVar('angka1');
        $angka2 = $this->request->getVar('angka2');
        $angka3 = $this->request->getVar('angka3');

        $q['angka_taruhan'] = $angka1 . ',' . $angka2 . ',' . $angka3;
        $q['jml_taruhan'] = $jml_taruhan;
        $q['uang'] -= $jml_taruhan;


        $db->where('id', user()['id']);
        $db->update($q);
        sukses(base_url('slotgacor/home'), 'Data updated.');
    }
    public function topup()
    {
        kadaluarsa('slotgacor/login');
        $db = db('penjudi');
        $q = $db->where('id', user()['id'])->get()->getRowArray();

        if (!$q) {
            gagal(base_url('slotgacor/login'), 'Id tidak ditemukan!');
        }

        $uang = $this->request->getVar('uang');
        $q['uang'] += $uang;



        $db->where('id', user()['id']);
        $db->update($q);
        sukses(base_url('slotgacor/home'), 'Data updated.');
    }
    public function settings()
    {
        kadaluarsa('slotgacor/login');
        if (user()['role'] !== 'Root') {
            gagal(base_url('slotgacor/home'), 'You are not allowed!.');
        }
        return view('slot/settings', ['judul' => 'Settings']);
    }

    public function update_angka_bandar()
    {
        kadaluarsa('slotgacor/login');
        if (user()['role'] !== 'Root') {
            gagal(base_url('slotgacor/home'), 'You are not allowed!.');
        }

        $data = settings();
        $data['angka_bandar'] = $this->request->getVar('angka_bandar');
        if ($data['versi'] == 1) {
            $data['bukaan'] = 1;
        }

        $db = db('settings');
        $db->where('id', $data['id']);

        $db->update($data);


        sukses(base_url('slotgacor/settings'), 'Update sukses.');
    }
    public function analisis_angka_terbaik_bandar()
    {
        kadaluarsa('slotgacor/login');
        if (user()['role'] !== 'Root') {
            gagal(base_url('slotgacor/home'), 'You are not allowed!.');
        }

        return view('slot/analisis_angka_terbaik_bandar', ['judul' => 'Analisis Angka Terbaik Bandar', 'data' => angka_terbaik_bandar()]);
    }
    public function angka_terbaik_bandar()
    {
        kadaluarsa('slotgacor/login');
        if (user()['role'] !== 'Root') {
            gagal(base_url('slotgacor/home'), 'You are not allowed!.');
        }

        $data = angka_terbaik_bandar();
        $q = settings();
        $q['angka_bandar'] = $data[0]['angka_taruhan'];
        if (settings()['versi'] == 1) {
            $q['bukaan'] = 1;
        }

        $db = db('settings');

        $db->where('id', $q['id']);

        $db->update($q);

        sukses(base_url('slotgacor/settings'), 'Update sukses.');
    }
    public function angka_terbaik_bandar_v2()
    {
        kadaluarsa('slotgacor/login');

        $data = angka_terbaik_bandar_v2();

        $user = user();
        $db = db('penjudi');
        // $user['jml_taruhan'] = 0;
        $db->where('id', $user['id']);
        $db->update($user);

        sukses_js('Ok', $data);
    }

    public function update_versi()
    {
        kadaluarsa('slotgacor/login');
        if (user()['role'] !== 'Root') {
            gagal(base_url('slotgacor/home'), 'You are not allowed!.');
        }

        $data = settings();
        $data['versi'] = ($data['versi'] == 1 ? 2 : 1);

        $db = db('settings');
        $db->where('id', $data['id']);

        $db->update($data);

        sukses(base_url('slotgacor/settings'), 'Update sukses.');
    }
    public function update_sodaqoh()
    {
        kadaluarsa('slotgacor/login');
        if (user()['role'] !== 'Root') {
            gagal(base_url('slotgacor/home'), 'You are not allowed!.');
        }

        $id = $this->request->getVar('id');
        $val = (int)$this->request->getVar('val');

        if ($val > 3) {
            gagal_js('Tidak boleh lebih besar dari 3!.');
        }

        $db = db('penjudi');
        $q = $db->where('id', $id)->get()->getRowArray();

        if (!$q) {
            gagal_js('Id tidak ditemukan!.');
        }

        $q['sodaqoh'] = $val;
        $db->where('id', $id);

        $db->update($q);

        sukses_js('Update sukses.');
    }
    public function tampilkan_hasil()
    {
        // bukaan 0 kode bandar belum ditentukan
        // bukaan 1 kode bandar sudah ditentukan
        // bukaan 2 hadiah diproses dan hasil ditampilkan
        kadaluarsa('slotgacor/login');
        if (user()['role'] !== 'Root') {
            gagal(base_url('slotgacor/home'), 'You are not allowed!.');
        }
        $data = settings();

        if ($data['bukaan'] == 0) {
            gagal(base_url('slotgacor/settings'), 'No bandar belum diset!.');
        }
        if ($data['bukaan'] == 2) {

            $db = db('penjudi');
            $q = $db->get()->getResultArray();

            foreach ($q as $i) {
                $i['jml_taruhan'] = 0;
                $db->where('id', $i['id']);

                $db->update($i);
            }

            $data['bukaan'] = 0;
            $db = db('settings');
            $db->where('id', $data['id']);
            $db->update($data);
        }
        if ($data['bukaan'] == 1) {

            $db = db('penjudi');
            $q = $db->whereNotIn('angka_taruhan', [''])->get()->getResultArray();

            foreach ($q as $i) {
                if (hasil($i) > 0) {
                    $i['uang'] += $i['jml_taruhan'] + hasil($i);
                }
                $db->where('id', $i['id']);
                $db->update($i);
            }
            $data['bukaan'] = 2;

            $db = db('settings');
            $db->where('id', $data['id']);

            $db->update($data);
        }


        sukses(base_url('slotgacor/settings'), 'Update sukses.');
    }
    public function cek_saldo()
    {
        kadaluarsa('slotgacor/login');
        $jml_taruhan = clear($this->request->getVar('jml_taruhan'));
        $db = db('penjudi');
        $q = $db->where('id', session('id'))->get()->getRowArray();

        if (!$q) {
            gagal_js('Id not found!.');
        }
        if ($q['jml_taruhan'] == 0 && $jml_taruhan > 0) {
            gagal_js('Anda belum konfirmasi taruhan!.');
        }

        if ($jml_taruhan < 50000) {
            gagal_js('Minimal taruhan Rp50.000!.');
        }

        if ($jml_taruhan > $q['jml_taruhan']) {
            gagal_js('Saldo Anda tidak cukup!.');
        }

        sukses_js('Ok');
    }
    public function update_saldo_kemenangan()
    {
        kadaluarsa('slotgacor/login');
        $hadiah = clear($this->request->getVar('hadiah'));
        $order = clear($this->request->getVar('order'));
        $db = db('penjudi');
        $q = $db->where('id', session('id'))->get()->getRowArray();

        if (!$q) {
            gagal_js('Id not found!.');
        }

        if ($order == 'menang') {
            $q['uang'] += ($q['jml_taruhan'] + $hadiah);
        }
        $q['jml_taruhan'] = 0;

        $db->where('id', $q['id']);
        $db->update($q);
        sukses_js('Ok');
    }


    public function auth()
    {
        $username = clear($this->request->getVar('username'));
        $password = clear($this->request->getVar('password'));

        $db = db('penjudi');

        $q = $db->where('username', $username)->get()->getRowArray();

        if (!$q) {
            gagal(base_url('slotgacor/login'), 'Username not found!.');
        }


        if (!password_verify($password, $q['password'])) {
            gagal(base_url('slotgacor/login'), 'Wrong password!.');
        }

        $data = [
            'id' => $q['id'],
        ];


        session()->set($data);

        sukses(base_url('slotgacor/home'), 'Login sukses.');
    }

    public function logout()
    {
        session()->remove('id');

        sukses(base_url('slotgacor/login'), 'Logout sukses!.');
    }
}
