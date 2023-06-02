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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'redirectIfAuthenticated'], function ($routes) {
   $routes->get('login', 'Auth::login');
   $routes->post('login', 'Auth::loginVerif');
   $routes->get('register', 'Auth::register');
   $routes->post('register', 'Auth::registerVerif');
});

$routes->group('', ['filter' => 'authenticate'], function ($routes) {
   $routes->get('dashboard', 'Dashboard::index');

   $routes->get('user', 'User::index');
   $routes->post('user/save', 'User::save');
   $routes->get('user/delete/(:segment)', 'User::delete/$1');

   $routes->get('request', 'Request::index');
   $routes->post('request/save', 'Request::save');
   $routes->get('request/show/(:segment)', 'Request::show/$1');
   $routes->get('request/confirm/(:segment)', 'Request::confirm/$1');
   $routes->post('request/bill/(:segment)', 'Request::bill/$1');

   $routes->get('transaction', 'Transaction::index');
   $routes->get('transaction/add/(:segment)', 'Transaction::add/$1');
   $routes->post('transaction/save', 'Transaction::save');
   $routes->get('transaction/unduh/(:segment)', 'Transaction::unduh/$1');
   $routes->get('transaction/upload/(:segment)', 'Transaction::upload/$1');
   $routes->post('transaction/postUpload/(:segment)', 'Transaction::postUpload/$1');

   $routes->get('invoice', 'Invoice::index');
   $routes->get('invoice/add/(:segment)', 'Invoice::add/$1');
   $routes->post('invoice/save', 'Invoice::save');
   $routes->get('invoice/unduh/(:segment)', 'Invoice::unduh/$1');
   $routes->get('invoice/upload/(:segment)', 'Invoice::upload/$1');
   $routes->post('invoice/postUpload/(:segment)', 'Invoice::postUpload/$1');
   $routes->get('invoice/konfirmasi/(:segment)', 'Invoice::konfirmasi/$1');
   $routes->post('invoice/postKonfirmasi/(:segment)', 'Invoice::postKonfirmasi/$1');

   $routes->get('logout', 'Auth::logout');
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
