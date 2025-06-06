<?php
require_once 'core/Router.php';
require_once 'controller/UserController.php';

$routes = '/Projet_panneau_solaire/src/api/index.php';

Router::add('GET', $routes.'/onduleurs', ['UserController', 'get20RandOnduleurs']);
Router::add('GET', $routes.'/panneaux', ['UserController', 'get20RandPanneaux']);
Router::add('GET', $routes.'/localisation', ['UserController', 'get20RandPanneaux']);

?>
