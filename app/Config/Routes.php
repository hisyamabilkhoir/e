<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
$routes->get('/', 'Auth::index');

$routes->get('/home', 'Home::index', ['filter' => 'login']);
$routes->get('/kelas', 'Kelas::index', ['filter' => 'login']);
$routes->get('/operator', 'Operator::index', ['filter' => 'login']);
$routes->get('/siswa', 'Siswa::index', ['filter' => 'login']);
$routes->get('/tahun_pelajar', 'TahunPelajaran::index', ['filter' => 'login']);
$routes->get('/wali_kelas', 'WaliKelas::index', ['filter' => 'login']);
$routes->get('/matapelajaran', 'MataPelajaran::index', ['filter' => 'login']);

$routes->get('/TahunPelajaran/edit', 'AjaxController::edit_tahun_pelajaran');
$routes->post('/WaliKelas/KelasSiswa', 'AjaxController::kelas_siswa');
$routes->get('/Kelas/edit', 'AjaxController::edit_kelas');
$routes->get('/Kelas/detail', 'AjaxController::detail_kelas');
$routes->get('/Operator/detail', 'AjaxController::edit_pegawai');

//$routes->get('/operator/ubah/(:segment)', 'Operator::ubah/$1');

//$routes->get('/operator/hapus', 'Operator::hapus');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}