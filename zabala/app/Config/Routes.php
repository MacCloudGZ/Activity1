<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Destine::index');
$routes->post('/save', 'Destine::save');
