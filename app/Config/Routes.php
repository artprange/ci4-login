<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */


$routes->get('/', 'Home::index');
$routes->get('products/list', 'Products::list');
$routes->post('products/add', 'Products::create');
$routes->get('products/delete/(:num)', 'Products::delete/$1');

$routes->get('products/edit/(:num)', 'Products::edit/$1');
$routes->post('products/edit/(:num)', 'Products::createOrUpdate/$1');

$routes->post('products/add', 'Products::createOrUpdate');


