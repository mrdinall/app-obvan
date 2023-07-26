<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
// $routes->setAutoRoute(true);
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');
$routes->get('/inventaris_gudang', 'InventarisGudang::index');
$routes->get('/inventaris_kamera', 'InventarisKamera::index');
$routes->get('/inventaris_sng_van', 'InventarisSNGVAN::index');
$routes->get('/peminjaman_alat', 'PeminjamanAlat::index');
// $routes->get('/tambah_peminjaman_alat', 'TambahPeminjamanAlat::index');
// $routes->get('/peminjaman_alat/tambah_peminjaman_alat', 'TambahPeminjamanAlat::index');
$routes->get('/peminjaman_alat/create', 'PeminjamanAlat::create');
$routes->get('/peminjaman_alat/edit/(:segment)', 'PeminjamanAlat::edit/$1');
$routes->delete('/peminjaman_alat/edit/(:segment)/(:segment)', 'PeminjamanAlat::edit/$1/$2');
$routes->post('/peminjaman_alat/save', 'PeminjamanAlat::save');
$routes->post('/peminjaman_alat/update/(:any)', 'PeminjamanAlat::update/$1');
$routes->delete('/peminjaman_alat/(:segment)', 'PeminjamanAlat::delete/$1');
// $routes->delete('/peminjaman_alat/edit/(:segment)/(:segment)', 'PeminjamanAlat::deletemerk/$1/$2');




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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
