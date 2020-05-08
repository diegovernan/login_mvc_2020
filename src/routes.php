<?php

use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@loginAction');

$router->get('/logout', 'AuthController@logout');

$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@registerAction');
