<?php
require_once 'core/Router.php';
require_once 'routes.php';


$router = new Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$router->resolve();
