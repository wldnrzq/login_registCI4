<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/register', 'AuthLogin::register');
$routes->post('/register/save', 'AuthLogin::saveRegister');

$routes->get('/login', 'AuthLogin::login');
$routes->post('/login/process', 'AuthLogin::loginProcess');
$routes->get('/logout', 'AuthLogin::logout');

$routes->get('/users', 'User::index');
$routes->get('/users/export-excel', 'User::exportExcel');
$routes->get('/users/export-pdf', 'User::exportPDF');

// $routes->get('dashboard', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('dashboard/exportPdf', 'Dashboard::exportPdf');
$routes->get('dashboard/exportExcel', 'Dashboard::exportExcel');
