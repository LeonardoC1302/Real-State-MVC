<?php 

require_once __DIR__ .  '/../includes/app.php';

use MVC\Router;

$router = new Router();

$router->get('/admin', 'admin_function');
$router->get('/contact', 'contact_function');

$router->checkRoutes();