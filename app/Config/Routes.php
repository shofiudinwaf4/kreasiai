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
$routes->get('/', 'Home::index');
$routes->add('logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'noauth'], function ($routes) {
    $routes->add('login', 'Auth::index');
    $routes->add('ceklogin', 'Auth::cekLogin');
});

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->add('', 'Admin::index');
    $routes->add('dashboard', 'Admin::index');
    $routes->add('layanan', 'Admin::Layanan');
    $routes->add('tambahLayanan', 'Admin::TambahLayanan');
    $routes->add('saveLayanan', 'Admin::SaveLayanan');
    $routes->add('editLayanan/(:segment)', 'Admin::EditLayanan/$1');
    $routes->add('updateLayanan/(:segment)', 'Admin::UpdateLayanan/$1');
    $routes->add('deleteLayanan/(:segment)', 'Admin::DeleteLayanan/$1');
    $routes->add('daftarLayanan/(:any)', 'Admin::DaftarLayanan/$1');
    $routes->add('tambahPaket/(:any)', 'Admin::TambahPaket/$1');
    $routes->add('savePaket/(:any)', 'Admin::SavePaket/$1');
});




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
