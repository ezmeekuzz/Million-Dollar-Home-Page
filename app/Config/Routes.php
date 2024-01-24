<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');
$routes->get('/home/getData', 'HomeController::getData');
$routes->get('/buy-pixels', 'BuypixelsController::index');
$routes->post('/buypixels/insert', 'BuypixelsController::insert');
$routes->get('/about-us', 'AboutusController::index');
$routes->get('/contact-me', 'ContactmeController::index');
$routes->get('/faq', 'FaqController::index');

//Admin Routes
$routes->get('/admin', 'admin\LoginController::index');
$routes->get('/admin/login', 'admin\LoginController::index');
$routes->get('/admin/logout', 'admin\LogoutController::index');
$routes->post('/admin/loginfunc', 'admin\LoginController::loginfunc');
$routes->get('/admin/home', 'admin\HomeController::index');
$routes->get('/admin/add-user', 'admin\AdduserController::index');
$routes->post('/admin/adduser/insert', 'admin\AdduserController::insert');
$routes->get('/admin/user-masterlist', 'admin\UsermasterlistController::index');
$routes->delete('/admin/usermasterlist/delete/(:num)', 'admin\UsermasterlistController::delete/$1');
$routes->get('/admin/edit-user/(:num)', 'admin\EdituserController::index/$1');
$routes->post('/admin/edituser/update', 'admin\EdituserController::update');
$routes->post('/admin/home/getData', 'admin\HomeController::getData');
$routes->delete('/admin/home/delete/(:num)', 'admin\HomeController::delete/$1');
