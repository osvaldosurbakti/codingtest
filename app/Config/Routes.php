<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
//$routes->get('/home/user', 'Home::user');
$routes->get('/', 'Admin::index');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/user', 'User::index', ['filter' => 'role:user']);
$routes->add('/sampahdata', 'Admin::sampahdata', ['filter' => 'role:admin']);
$routes->add('Admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
$routes->get('admin/detail/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
$routes->add('/createemployee', 'Admin::createemployee', ['filter' => 'role:admin']);
$routes->add('/admin/sampahdata', 'Admin::sampahdata', ['filter' => 'role:admin']);
$routes->post('/saveEmployee', 'Admin::saveEmployee', ['filter' => 'role:admin']);
$routes->get('admin/deleteemployee/(:num)', 'Admin::deleteemployee/$1');
$routes->get('admin/editemployee/(:num)', 'Admin::editemployee/$1');
$routes->post('admin/updateemployee', 'Admin::updateemployee');
