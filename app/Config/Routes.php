<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');
$routes->get('/home/getData', 'HomeController::getData');
$routes->post('/home/searchData', 'HomeController::searchData');
$routes->get('/buypixels/getData', 'BuyPixelsController::getData');
$routes->get('/edit/getData', 'EditController::getData');
$routes->get('/buy-pixels', 'BuypixelsController::index');
$routes->get('/edit/(:num)', 'EditController::index/$1');
$routes->post('/buypixels/insert', 'BuypixelsController::insert');
$routes->post('/edit/updateData', 'EditController::updateData');
$routes->get('/about-us', 'AboutusController::index');
$routes->get('/contact-me', 'ContactmeController::index');
$routes->get('/faq', 'FaqController::index');

//Admin Routes
$routes->get('/admin', 'admin\LoginController::index');
$routes->get('/admin/login', 'admin\LoginController::index');
$routes->get('/admin/logout', 'admin\LogoutController::index');
$routes->post('/admin/loginfunc', 'admin\LoginController::loginfunc');
$routes->get('/admin/home', 'admin\HomeController::index');
$routes->get('/admin/approved-transactions', 'admin\ApprovedTransactionController::index');
$routes->get('/admin/rejected-transactions', 'admin\RejectedTransactionsController::index');
$routes->get('/admin/add-user', 'admin\AdduserController::index');
$routes->post('/admin/adduser/insert', 'admin\AdduserController::insert');
$routes->get('/admin/user-masterlist', 'admin\UsermasterlistController::index');
$routes->delete('/admin/usermasterlist/delete/(:num)', 'admin\UsermasterlistController::delete/$1');
$routes->get('/admin/edit-user/(:num)', 'admin\EdituserController::index/$1');
$routes->post('/admin/edituser/update', 'admin\EdituserController::update');
$routes->post('/admin/home/getData', 'admin\HomeController::getData');
$routes->post('/admin/approvedtransactions/getData', 'admin\ApprovedTransactionController::getData');
$routes->post('/admin/rejectedtransactions/getData', 'admin\RejectedTransactionsController::getData');
$routes->delete('/admin/home/delete/(:num)', 'admin\HomeController::delete/$1');
$routes->delete('/admin/approvedtransactions/delete/(:num)', 'admin\ApprovedTransactionController::delete/$1');
$routes->delete('/admin/rejectedtransactions/delete/(:num)', 'admin\RejectedTransactionsController::delete/$1');
$routes->post('/admin/home/approve/(:num)', 'admin\HomeController::approve/$1');
$routes->post('/admin/home/reject/(:num)', 'admin\HomeController::reject/$1');
