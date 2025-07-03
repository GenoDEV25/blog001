<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta de inicio
$routes->get('/', function () {
    return view('home');
});

$routes->get('blog', 'Blog::index');
$routes->get('admin/blog', 'Admin\Blog::index');
$routes->post('admin/blog/create', 'Admin\Blog::create');
$routes->post('admin/blog/delete/(:num)', 'Admin\Blog::delete/$1');
$routes->post('admin/blog/update/(:num)', 'Admin\Blog::update/$1');