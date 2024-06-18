<?php

namespace App\Controllers;

class Instagram extends BaseController
{

    public function home(): string
    {
        if (!session('id')) {
            gagal(base_url('instagram'), 'Please login!.');
        }
        $db = db('durasi_menonton');
        $q = $db->select('durasi_menonton.id as id, start,end,total,penyanyi,judul,genre,url')->where('user_id', session('id'))->join('videos', 'video_id=videos.id')->orderBy('total', 'DESC')->get()->getResultArray();

        $data = [];

        foreach ($q as $i) {
            $i['durasi'] = gmdate("H:i:s", $i['total']);
            $data[] = $i;
        }
        return view('instagram/home', ['judul' => 'Instagram', 'data' => $data]);
    }
    public function landing(): string
    {
        if (session('id')) {
            sukses(base_url('instagram/home'), 'Login sukses!.');
        }
        return view('instagram/landing', ['judul' => 'Instagram']);
    }
    public function auth(): string
    {
        $username = clear($this->request->getVar('username'));
        $password = clear($this->request->getVar('password'));

        $db = db('penjudi');

        $q = $db->where('username', $username)->get()->getRowArray();

        if (!$q) {
            gagal(base_url('instagram'), 'Username not found!.');
        }


        if (!password_verify($password, $q['password'])) {
            gagal(base_url('instagram'), 'Wrong password!.');
        }

        $data = [
            'id' => $q['id'],
            'role' => $q['role'],
            'nama' => $q['nama']
        ];


        session()->set($data);

        sukses(base_url('instagram/home'), 'Login sukses.');
    }

    public function versi()
    {
        if (!session('id')) {
            gagal(base_url('instagram'), 'Please login!.');
        }
        if (session('role') !== 'Root') {
            gagal(base_url('instagram'), 'You are not allowed!.');
        }
        $data = settings();

        $data['versi_ig'] = ($data['versi_ig'] == 0 || $data['versi_ig'] == 2 ? 1 : 2);
        $db = db('settings');
        $db->where('id', $data['id']);
        $db->update($data);
        sukses(base_url('instagram/home'), 'Update sukses.');
    }
    public function logout()
    {
        session()->remove('id');
        session()->remove('role');
        session()->remove('nama');

        sukses(base_url('instagram'), 'Logout sukses!.');
    }

    public function update_durations()
    {
        if (!session('id')) {
            gagal(base_url('instagram'), 'Please login!.');
        }

        $db = db('durasi_menonton');
        $q = $db->where('user_id', session('id'))->get()->getResultArray();
        $status = $this->request->getVar('status_now');


        $exp = explode(" ", $status);

        $start = $exp[2];
        $end = $exp[0];
        if (!$q) {
            if ($start !== 0) {

                $data = [
                    'user_id' => session('id'),
                    'video_id' => $start,
                    'start' => time(),
                    'end' => 0,
                    'total' => 0
                ];
                $db->insert($data);
            }
        } else {


            if ($start !== "0" && $end !== "0") {
                $s = $db->where('video_id', $start)->where('user_id', session('id'))->get()->getRowArray();
                if ($s) {
                    $s['start'] = time();
                    $s['end'] = 0;
                    $db->where('id', $s['id']);
                    $db->update($s);
                } else {
                    $data = [
                        'user_id' => session('id'),
                        'video_id' => $start,
                        'start' => time(),
                        'end' => 0,
                        'total' => 0
                    ];
                    $db->insert($data);
                }
            }

            if ($end !== "0") {
                $time = time();
                $e = $db->where('video_id', $end)->where('user_id', session('id'))->get()->getRowArray();

                $e['end'] = $time;
                $e['total'] = ($time - $e['start']) + $e['total'];
                $db->where('id', $e['id']);
                $db->update($e);
            }
        }

        $q = $db->select('durasi_menonton.id as id, start,end,total,penyanyi,judul,genre,url')->where('user_id', session('id'))->join('videos', 'video_id=videos.id')->orderBy('total', 'DESC')->get()->getResultArray();

        $data = [];

        foreach ($q as $i) {
            $i['durasi'] = gmdate("H:i:s", $i['total']);
            $data[] = $i;
        }
        sukses_js('Ok', $data);
    }

    public function cari_db()
    {
        if (!session('id')) {
            gagal(base_url('instagram'), 'Please login!.');
        }

        $dbs = clear($this->request->getVar('db'));
        $text = clear($this->request->getVar('text'));

        $db = db($dbs);
        $q = $db->whereNotIn('role', ['Root'])->like('nama', $text, 'both')->get()->getResultArray();


        sukses_js('Ok', $q);
    }

    public function detail_waktu_menonton()
    {
        if (!session('id')) {
            gagal(base_url('instagram'), 'Please login!.');
        }
        $id = $this->request->getVar('id');

        $db = db('durasi_menonton');

        $q = $db->select('durasi_menonton.id as id, start,end,total,penyanyi,judul,genre,url')->where('user_id', $id)->join('videos', 'video_id=videos.id')->orderBy('total', 'DESC')->get()->getResultArray();

        $data = [];

        foreach ($q as $i) {
            $i['durasi'] = gmdate("H:i:s", $i['total']);
            $data[] = $i;
        }
        sukses_js('Ok', $data);
    }

    public function delete_menonton($id)
    {

        if (!session('id')) {
            gagal(base_url('instagram'), 'Please login!.');
        }
        if (session('role') !== 'Root') {
            gagal(base_url('instagram'), 'You are not allowed!.');
        }


        $db = db('durasi_menonton');

        if ($id == 'all') {
            $db->whereNotIn('user_id', [0]);
            $db->delete();
        } else {
            $db->where('user_id', $id);
            $db->delete();
        }

        sukses(base_url('instagram/home'), 'Delete success.');
    }

    public function add_user()
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
                sukses(base_url('instagram'), 'Sign up succees.');
            }
        }
    }
}
