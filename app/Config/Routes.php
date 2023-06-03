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
$routes->get('/', 'Utama::index');
$routes->get('/detail/(:segment)', 'Utama::detail/$1');
$routes->get('/list-produk', 'Utama::listProduk');
$routes->get('/list-event', 'Utama::listEvent');
$routes->get('/list-event-show/(:segment)', 'Utama::listEventDetail/$1');

$routes->group('', ['filter' => 'auth'], function ($routes) {
   // Autentikasi
   $routes->get('login', 'Autentikasi::login');
   $routes->post('login/process', 'Autentikasi::loginVerif');
   $routes->get('register', 'Autentikasi::register');
   $routes->post('register/process', 'Autentikasi::registerVerif');
});

$routes->group('', ['filter' => 'usersAuth'], function ($routes) {
   // Dashboard
   $routes->get('home', 'Home::index');

   // Data Users
   $routes->get('users', 'Users::index');
   $routes->get('users/create', 'Users::create');
   $routes->post('users/save', 'Users::save');
   $routes->get('users/edit/(:segment)', 'Users::edit/$1');
   $routes->post('users/update/(:segment)', 'Users::update/$1');
   $routes->get('users/delete/(:segment)', 'Users::delete/$1');

   // Data Event
   $routes->get('event', 'Event::index');
   $routes->get('event/show/(:segment)', 'Event::show/$1');
   $routes->get('event/create', 'Event::create');
   $routes->post('event/save', 'Event::save');
   $routes->get('event/edit/(:segment)', 'Event::edit/$1');
   $routes->post('event/update/(:segment)', 'Event::update/$1');
   $routes->get('event/delete/(:segment)', 'Event::delete/$1');

   // Data Usaha
   $routes->get('usaha', 'Usaha::index');
   $routes->get('usaha/show/(:segment)', 'Usaha::show/$1');
   $routes->get('usaha/create', 'Usaha::create');
   $routes->post('usaha/save', 'Usaha::save');
   $routes->get('usaha/edit/(:segment)', 'Usaha::edit/$1');
   $routes->post('usaha/update/(:segment)', 'Usaha::update/$1');
   $routes->get('usaha/delete/(:segment)', 'Usaha::delete/$1');

   // Data Produk
   $routes->get('produk', 'Produk::index');
   $routes->get('produk/create', 'Produk::create');
   $routes->post('produk/save', 'Produk::save');
   $routes->get('produk/edit/(:segment)', 'Produk::edit/$1');
   $routes->post('produk/update/(:segment)', 'Produk::update/$1');
   $routes->get('produk/delete/(:segment)', 'Produk::delete/$1');

   // Data Laporan
   $routes->get('laporan', 'Laporan::index');
   $routes->get('laporan/print', 'Laporan::print');

   // Profile
   $routes->get('profile', 'Autentikasi::profile');

   $routes->get('logout', 'Autentikasi::logout');
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
