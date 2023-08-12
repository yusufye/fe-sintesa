<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('/', 'Web::index');
$routes->post('/web/globalDtTable/(:any)/(:any)/(:any)/(:any)', 'Web::globalDtTable/$1/$2/$3/$4');
$routes->get('/data-diklat/(:any)', 'Web::data_diklat/$1');
$routes->get('/data-diklat/(:any)/(:any)', 'Web::data_diklat/$1/$2');
$routes->get('/data-diklat/(:any)/(:any)/(:any)', 'Web::data_diklat/$1/$2/$3');
//data perencana
$routes->get('/data-perencana/(:any)', 'Web::data_perencana/$1');
$routes->get('/data-perencana/(:any)/(:any)', 'Web::data_perencana/$1/$2');
$routes->get('/data-perencana/(:any)/(:any)/(:any)', 'Web::data_perencana/$1/$2/$3');
$routes->post('/web/get_chart_perencana_pusat_detail', 'Web::get_chart_perencana_pusat_detail');
//data administratif
$routes->get('/data-administratif/biodata-narasumber', 'Web::data_administratif_biodata_narasumber');
$routes->post('/web/detail_pegawai/(:any)', 'Web::detail_pegawai/$1');
$routes->get('/data-administratif/data-kegiatan', 'Web::data_administratif_kegiatan');
$routes->post('/web/detail_kegiatan/(:any)', 'Web::detail_kegiatan/$1');
$routes->get('/data-administratif/data-lkj', 'Web::data_administratif_lkj');
$routes->get('/data-administratif/data-kerjasama', 'Web::data_administratif_kerjasama');
$routes->get('/data-administratif/data-kerjasama/(:any)', 'Web::data_administratif_kerjasama/$1');
$routes->get('/data-administratif/data-kerjasama/(:any)/(:any)', 'Web::data_administratif_kerjasama/$1/$2');
// $routes->get('/data-administratif/data-kerjasama/(:any)/(:any)/(:any)', 'Web::data_administratif_kerjasama/$1/$2/$3');
//publikasi
$routes->get('/publikasi/(:any)', 'Web::publikasi/$1');
$routes->get('/publikasi/(:any)/(:any)', 'Web::publikasi/$1/$2');
$routes->get('/publikasi/(:any)/(:any)/(:any)', 'Web::publikasi/$1/$2/$3');
$routes->post('/web/detail_publikasi/(:any)', 'Web::detail_publikasi/$1');
//auth
$routes->get('/login', 'Login::index');
$routes->post('/login/validasi', 'Login::validasi');
$routes->get('/logout', 'Login::logout');



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
