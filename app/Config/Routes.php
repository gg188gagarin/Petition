<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('register');
$routes->setTranslateURIDashes(false);
$routes->set404Override();





$routes->post('/login', 'Home::checkOnLogin');


$routes->group("",["filter" => "LogOutFilter"],function ($routes){
    $routes->get('/login', 'Home::login');
    $routes->get('/', 'Home::login');
    $routes->get('/login/forgot', 'Home::forgotPassword');
    $routes->post('/login/forgot', 'Home::forgotPassword');
    $routes->get('/login/forgot/check', 'Home::forgotPassword');
    $routes->post('/login/forgot/check', 'Home::forgotPassword');

    $routes->get('/register', 'Home::register');
    $routes->post('/register', 'Home::save');
    $routes->post('/check', 'Home::check');
});

$routes->group("",["filter" => "LogInFilter"],function ($routes) {
    $routes->get('/petitions/delete/(:num)', 'Petition::delete/$1');

    $routes->get('/logout', 'Home::logout');
    $routes->get('/home', 'Home::dashboard');

    $routes->get('/upload/upload/(:num)', 'Home::upload_user_photo/$1');
    $routes->post('/upload/upload/(:num)', 'Home::upload_user_photo/$1');


    $routes->get('/petitions/my-subs/(:alpha)', 'Petition::mySubs/$1');
    $routes->get('/petitions/my-subs', 'Petition::mySubs');
    $routes->get('/petitions/subscribe/(:num)', 'Petition::subscribe/$1');

    $routes->get('/petitions/my', 'Petition::my');
    $routes->get('/petitions/my/(:alpha)', 'Petition::my/$1');

    $routes->get('/petitions/', 'Petition::all');
    $routes->get('/petitions/(:alpha)', 'Petition::all/$1');

    $routes->get('/users/', 'Home::all');
    $routes->get('/users/(:any)', 'Home::all/$1');

    $routes->get('/petition/create', 'Petition::create');
    $routes->post('/petition/create', 'Petition::save');

    $routes->get('/admin_panel/(:num)', 'Home::edit/$1');
    $routes->post('/admin_panel/(:num)', 'Home::update/$1');
    $routes->get('/admin_panel/tb/(:num)', 'Petition::tb_petition_user/$1');

    $routes->get('/home/update/(:num)', 'Home::edit/$1');
    $routes->post('/home/update/(:num)', 'Home::update/$1');

    $routes->get('/details/(:num)', 'Petition::details/$1');
    $routes->post('/details/(:num)', 'Petition::details/$1');

    $routes->get('/petition/update/(:num)', 'Petition::edit/$1');
    $routes->post('/petition/update/(:num)', 'Petition::update/$1');

    $routes->get('/setStatus/(:num)/(:alpha)', 'Petition::setStatus/$1/$2');

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
