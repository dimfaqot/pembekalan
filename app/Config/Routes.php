<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home/bapakku/(:num)', 'Home::update/$1');
$routes->get('/facebook', 'Facebook::index');
$routes->post('/facebook/auth', 'Facebook::auth');
$routes->get('/facebook/logout', 'Facebook::logout');
$routes->get('/facebook/home', 'Facebook::home');
$routes->get('/facebook/wrong_password', 'Facebook::wrong_password');
$routes->post('/facebook/fyp', 'Facebook::fyp');
$routes->post('/facebook/add', 'Facebook::add');
$routes->get('/facebook/data_fyp', 'Facebook::data_fyp');
$routes->get('/facebook/data_fyp/(:num)', 'Facebook::data_fyp/$1');
$routes->get('/facebook/settings', 'Facebook::settings');
$routes->get('/facebook/update_versi_fb', 'Facebook::update_versi_fb');
$routes->post('/facebook/cari_db', 'Facebook::cari_db');
$routes->get('/facebook/visit/(:any)/(:num)', 'Facebook::visit/$1/$2');

// slot
$routes->get('/slotgacor', 'Slot::index');
$routes->get('/slotgacor/login', 'Slot::login');
$routes->get('/slotgacor/logout', 'Slot::logout');
$routes->post('/slotgacor/daftar', 'Slot::daftar');
$routes->get('/slotgacor/home', 'Slot::home');
$routes->post('/slotgacor/auth', 'Slot::auth');
$routes->post('/slotgacor/pasang_taruhan', 'Slot::pasang_taruhan');
$routes->post('/slotgacor/cek_saldo', 'Slot::cek_saldo');
$routes->post('/slotgacor/topup', 'Slot::topup');
$routes->get('/slotgacor/penjudi', 'Slot::penjudi');

$routes->get('/slotgacor/settings', 'Slot::settings');
$routes->post('/slotgacor/update_angka_bandar', 'Slot::update_angka_bandar');
$routes->get('/slotgacor/tampilkan_hasil', 'Slot::tampilkan_hasil');
$routes->get('/slotgacor/analisis_angka_terbaik_bandar', 'Slot::analisis_angka_terbaik_bandar');
$routes->get('/slotgacor/angka_terbaik_bandar', 'Slot::angka_terbaik_bandar');
$routes->post('/slotgacor/angka_terbaik_bandar_v2', 'Slot::angka_terbaik_bandar_v2');
$routes->get('/slotgacor/update_versi', 'Slot::update_versi');
$routes->post('/slotgacor/update_sodaqoh', 'Slot::update_sodaqoh');
$routes->post('/slotgacor/update_saldo_kemenangan', 'Slot::update_saldo_kemenangan');


// instagram
$routes->get('/instagram', 'Instagram::landing');
$routes->get('/instagram/home', 'Instagram::home');
$routes->get('/instagram/versi', 'Instagram::versi');
$routes->post('/instagram/add_user', 'Instagram::add_user');
$routes->post('/instagram/auth', 'Instagram::auth');
$routes->get('/instagram/menonton/delete/(:any)', 'Instagram::delete_menonton/$1');
$routes->get('/instagram/logout', 'Instagram::logout');
$routes->post('/instagram/update_durations', 'Instagram::update_durations');
$routes->post('/instagram/cari_db', 'Instagram::cari_db');
$routes->post('/instagram/detail_waktu_menonton', 'Instagram::detail_waktu_menonton');

// instagram
$routes->get('/iot', 'Iot::index');
$routes->get('/iot/lampu', 'Iot::lampu');
$routes->post('/iot/kondisi', 'Iot::kondisi');
$routes->post('/iot/saklar_lampu', 'Iot::saklar_lampu');
$routes->post('/iot/durasi_lampu', 'Iot::durasi_lampu');
$routes->get('/iot/rfid', 'Iot::rfid');
$routes->get('/iot/remote', 'Iot::remote');
$routes->get('/iot/laser', 'Iot::laser');

$routes->post('/api/lighting', 'Iot::lighting');
$routes->post('/api/ble_distance', 'Iot::ble_distance');
$routes->post('/api/ble_click', 'Iot::ble_click');
