<?php

function db($tabel, $db = null)
{
    if ($db == null || $db == 'pembekalan') {
        $db = \Config\Database::connect();
    } else {
        $db = \Config\Database::connect(strtolower(str_replace(" ", "_", $db)));
    }
    $db = $db->table($tabel);

    return $db;
}


function angka($uang)
{
    return number_format($uang, 0, ",", ".");
}

function sukses($url, $pesan)
{
    session()->setFlashdata('sukses', $pesan);
    header("Location: " . $url);
    die;
}

function gagal($url, $pesan)
{
    session()->setFlashdata('gagal', "Gagal!. " . $pesan);
    header("Location: " . $url);
    die;
}

function sukses_js($pesan, $data = null, $data2 = null, $data3 = null, $data4 = null)
{
    $data = [
        'status' => '200',
        'message' => $pesan,
        'data' => $data,
        'data2' => $data2,
        'data3' => $data3,
        'data4' => $data4
    ];

    echo json_encode($data);
    die;
}

function gagal_js($pesan)
{
    $data = [
        'status' => '400',
        'message' => "Gagal!. " . $pesan
    ];

    echo json_encode($data);
    die;
}

function default_penjudi()
{
    $db = db('penjudi');

    $q = $db->get()->getRowArray();

    return $q;
}

function user()
{
    $db = db('penjudi');

    return $db->where('id', session('id'))->get()->getRowArray();
}

function angka_taruhan($angka)
{
    $res = [0, 0, 0];
    if ($angka !== '') {
        $res = explode(",", $angka);
    }

    return $res;
}

function clear($text)
{
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}



function upper_first($text)
{
    $text = clear($text);
    $exp = explode(" ", $text);

    $val = [];
    foreach ($exp as $i) {
        $lower = strtolower($i);
        $val[] = ucfirst($lower);
    }

    return implode(" ", $val);
}

function kadaluarsa($url)
{
    if (!session('id')) {
        gagal(base_url($url), 'Please login!.');
    }
}


function settings()
{
    $db = db('settings');
    $q = $db->get()->getRowArray();
    return $q;
}

function compare_two_array($angka_taruhan, $jml_taruhan, $angka_bandar = null)
{
    if ($angka_bandar == null) {

        $exp = explode(",", settings()['angka_bandar']);
    } else {
        $exp = explode(",", $angka_bandar);
    }

    $angka_taruhan = explode(",", $angka_taruhan);
    $jml = 0;

    for ($i = 0; $i < 3; $i++) {
        if ($exp[$i] == $angka_taruhan[$i]) {
            $jml++;
        }
    }

    return (int)$jml_taruhan * $jml;
}

function hasil($data = null)
{

    $at = ($data == null ? user()['angka_taruhan'] : $data['angka_taruhan']);
    $jt = ($data == null ? user()['jml_taruhan'] : $data['jml_taruhan']);
    return compare_two_array($at, $jt);
}


function angka_terbaik_bandar($id_penjudi = null)
{
    $dbp = db('penjudi');
    if ($id_penjudi == null) {
        $penjudi = $dbp->whereNotIn('angka_taruhan', [''])->get()->getResultArray();
    } else {
        $penjudi = $dbp->whereNotIn('angka_taruhan', [''])->where('id', $id_penjudi)->get()->getResultArray();
    }

    $num = range(1, 777);
    shuffle($num);


    $angka_acak_taruhan = [];

    foreach ($num as $i) {
        $split = str_split($i);
        if (count($split) == 3) {
            if (!in_array(0, $split) && !in_array(8, $split) && !in_array(9, $split)) {
                $angka_acak_taruhan[] = implode(",", $split);
            }
        }
    }

    $data = [];
    foreach ($angka_acak_taruhan as $i) {

        $total = 0;
        foreach ($penjudi as $p) {
            $total += compare_two_array($p['angka_taruhan'], $p['jml_taruhan'], $i);
        }


        $data[] = ['angka_taruhan' => $i, 'hadiah' => $total];
    }

    $short_by = SORT_ASC;

    $keys = array_column($data, 'hadiah');
    array_multisort($keys, $short_by, $data);


    return $data;
}
function angka_terbaik_bandar_v2()
{
    $data = angka_terbaik_bandar(user()['id']);

    if (user()['sodaqoh'] == 0) {
        return $data[0];
    } else {
        foreach ($data as $i) {
            if ($i['hadiah'] == user()['jml_taruhan'] * user()['sodaqoh']) {
                return $i;
            }
        }
    }
}

function penjudi()
{
    $dbp = db('penjudi');

    $penjudi = $dbp->orderBy('nama', 'ASC')->get()->getResultArray();
    return $penjudi;
}

function videos()
{
    $db = db('videos');
    $q = $db->get()->getResultArray();

    return $q;
}

function status($order = null)
{
    $db = db('status');
    $db;
    if ($order == null) {
        $db->whereNotIn('jenis', ['story']);
    }
    if ($order !== null) {
        if ($order !== 'all') {
            $db->where('jenis', $order);
        }
    }
    $q = $db->orderBy('id', 'DESC')->get()->getResultArray();

    $data = [];

    foreach ($q as $i) {
        $exp = explode(',', $i['produk_image']);
        $i['arr_produk_image'] = $exp;
        $data[] = $i;
    }
    return $data;
}

function data_fyp($user_id = null)
{
    if ($user_id == null) {
        $user_id = session('id');
    }
    $db = db('fyp');
    $q = $db->select('fyp.id as id, nama,jenis,nama_produk,produk_image,kategori,grup_image,user_image,grup,ket,created_at,status_id,user_id')->join('status', 'status_id=status.id')->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->getResultArray();

    $simpulan = [];
    $ready = [];

    foreach ($q as $i) {
        if (!in_array($i['status_id'], $ready)) {
            $ready[] = $i['status_id'];
            $jml = $db->where('user_id', $user_id)->where('status_id', $i['status_id'])->countAllResults();
            $i['jml_kunjungan'] = $jml;
            $simpulan[] = $i;
        }
    }

    $short_by = SORT_DESC;

    $keys = array_column($simpulan, 'jml_kunjungan');
    array_multisort($keys, $short_by, $simpulan);

    $data = ['data' => $q, 'simpulan' => $simpulan];

    return $data;
}

function get_files()
{
    $val = [];

    $dir_name = "fb/user/";
    $images = glob($dir_name . "*.*");

    foreach ($images as $i) {
        $val[] = $i;
    }

    $dir_name = "fb/grup/";
    $images = glob($dir_name . "*.*");

    foreach ($images as $i) {
        $val[] = $i;
    }
    $dir_name = "fb/produk/";
    $images = glob($dir_name . "*.*");

    foreach ($images as $i) {
        $val[] = $i;
    }
    $dir_name = "fb/story/";
    $images = glob($dir_name . "*.*");

    foreach ($images as $i) {
        $val[] = $i;
    }

    return $val;
}

function iklan()
{

    $db = db('fyp');


    $p = $db->select('fyp.id as id, nama,jenis,nama_produk,produk_image,kategori,grup_image,user_image,grup,ket,created_at,status_id,user_id')->join('status', 'status.id=status_id')->where('jenis', 'produk')->where('ket', 'produk')->where('user_id', session('id'))->groupBy('status_id')->get()->getResultArray();
    $g = $db->select('fyp.id as id, nama,jenis,nama_produk,produk_image,kategori,grup_image,user_image,grup,ket,created_at,status_id,user_id')->join('status', 'status.id=status_id')->where('jenis', 'produk')->where('ket', 'grup')->where('user_id', session('id'))->groupBy('status_id')->get()->getResultArray();
    $t = $db->select('fyp.id as id, nama,jenis,nama_produk,produk_image,kategori,grup_image,user_image,grup,ket,created_at,status_id,user_id')->join('status', 'status.id=status_id')->whereIn('jenis', ['user', 'story'])->whereIn('ket', ['user', 'story'])->where('user_id', session('id'))->groupBy('status_id')->get()->getResultArray();

    $produk = [];
    foreach ($p as $i) {
        $q = $db->join('status', 'status.id=status_id')->where('jenis', 'produk')->where('ket', 'produk')->where('user_id', $i['user_id'])->where('status_id', $i['status_id'])->get()->getResultArray();
        $i['jml'] = count($q);

        $img = '';

        $exp = explode(",", $i['produk_image']);

        if (count($exp) > 0) {
            $img = $exp[0];
        }

        $i['produk_image'] = $img;
        $produk[] = $i;
    }
    $grup = [];
    foreach ($g as $i) {
        $q = $db->join('status', 'status.id=status_id')->where('jenis', 'produk')->where('user_id', $i['user_id'])->where('ket', 'grup')->where('status_id', $i['status_id'])->countAllResults();
        $i['jml'] = $q;
        $grup[] = $i;
    }
    $teman = [];
    foreach ($t as $i) {
        $q = $db->join('status', 'status.id=status_id')->whereIn('jenis', ['user', 'story'])->whereIn('ket', ['user', 'story'])->where('user_id', $i['user_id'])->where('status_id', $i['status_id'])->countAllResults();
        $i['jml'] = $q;
        $teman[] = $i;
    }

    $short_by = SORT_DESC;

    $keys = array_column($produk, 'jml');
    array_multisort($keys, $short_by, $produk);

    $keys = array_column($grup, 'jml');
    array_multisort($keys, $short_by, $grup);

    $keys = array_column($teman, 'jml');
    array_multisort($keys, $short_by, $teman);

    $res = ['produk' => $produk, 'grup' => $grup, 'teman' => $teman];
    return $res;
}

function get_profile()
{
    $link = base_url('fb/user/');
    if (user()['img'] == 'images.jpg') {
        $link = base_url();
    }
    return $link . user()['img'];
}
