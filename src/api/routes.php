<?php
require_once 'core/Router.php';
require_once 'controller/UserController.php';

$routes = '/Projet_panneau_solaire/src/api/index.php';

Router::add('GET', $routes.'/onduleurs', ['UserController', 'get20RandOnduleurs']);
Router::add('GET', $routes.'/panneaux', ['UserController', 'get20RandPanneaux']);
Router::add('GET', $routes.'/departements', ['UserController', 'get20RandDepartements']);
Router::add('GET', $routes.'/localisation', ['UserController', 'get20RandPanneaux']);

Router::add('GET', $routes.'/nbInstallation', ['UserController', 'nbInstallation']);
Router::add('GET', $routes.'/nbPanneaux', ['UserController', 'nbPanneaux']);
Router::add('GET', $routes.'/nbOnduleurs', ['UserController', 'nbOnduleurs']);
Router::add('GET', $routes.'/nbInstallateurs', ['UserController', 'nbInstallateurs']);
Router::add('GET', $routes.'/nbInstallationAnnee', ['UserController', 'nbInstallationAnnee']);
Router::add('GET', $routes.'/nbInstallationRegion', ['UserController', 'nbInstallationRegion']);