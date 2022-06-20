<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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
$routes->get('/', 'Halaman_awal::halaman_awal');
$routes->get('/user', 'User::index', ['filter' => 'role:admin,pendaftar']);
// $routes->get('/', 'Home_Pendaftar::index');

/**** ADMIN ****/
$routes->add('/admin_daftar_penerima/(:any)', 'Admin_daftar_penerima::$1',  ['filter' => 'role:admin']);
$routes->add('/admin_data_pendaftaran/(:any)', 'Admin_data_pendaftaran::$1',  ['filter' => 'role:admin']);
$routes->add('/admin_detail_pendaftaran/(:any)', 'Admin_detail_pendaftaran::$1',  ['filter' => 'role:admin']);
$routes->add('/admin_download/(:any)', 'Admin_download::$1',  ['filter' => 'role:admin']);
$routes->add('/admin_informasi/(:any)', 'Admin_informasi::$1',  ['filter' => 'role:admin']);
$routes->add('/home_admin/(:any)', 'Home_admin::$1',  ['filter' => 'role:admin']);

/**** Pendaftar ****/
// $routes->add('/home_pendaftar/download_detail_pendaftar/(:num)', 'home_pendaftar::download_detail_pendaftar/$1',  ['filter' => 'role: pendaftar']);
$routes->add('/calon_mhs/(:any)', 'Calon_mhs::$1',  ['filter' => 'role:pendaftar']);
$routes->add('/mahasiswa/(:any)', 'Mahasiswa::$1',  ['filter' => 'role:pendaftar']);
$routes->add('/siswa/(:any)', 'Siswa::$1',  ['filter' => 'role:pendaftar']);
$routes->add('/penerima/(:any)', 'Penerima::$1',  ['filter' => 'role:pendaftar']);
$routes->add('/home_pendaftar/(:any)', 'Home_pendaftar::$1',  ['filter' => 'role:pendaftar']);
$routes->add('/pendaftaran/(:any)', 'Pendaftaran::$1',  ['filter' => 'role:pendaftar']);

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