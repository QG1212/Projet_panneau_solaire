<?php
require_once 'core/Router.php';


require_once 'controller/UserController.php';
require_once 'controller/DepartementsController.php';
require_once 'controller/InstallateursController.php';
require_once 'controller/InstallationsController.php';
require_once 'controller/OnduleursController.php';
require_once 'controller/PanneauxController.php';
require_once 'controller/CommunesController.php';

$routes = '/GitHub/Projet_panneau_solaire/src/api/index.php';

Router::add('GET', $routes.'/onduleurs', ['OnduleursController', 'get20RandOnduleurs']);
Router::add('GET', $routes.'/panneaux', ['PanneauxController', 'get20RandPanneaux']);
Router::add('GET', $routes.'/departements', ['DepartementsController', 'get20RandDepartements']);


Router::add('GET', $routes.'/nbInstallation', ['InstallationsController', 'nbInstallation']);
Router::add('GET', $routes.'/nbPanneaux', ['PanneauxController', 'nbPanneaux']);
Router::add('GET', $routes.'/nbOnduleurs', ['OnduleursController', 'nbOnduleurs']);
Router::add('GET', $routes.'/nbInstallateurs', ['InstallateursController', 'nbInstallateurs']);
Router::add('GET', $routes.'/nbInstallationAnnee', ['InstallationsController', 'nbInstallationAnnee']);
Router::add('GET', $routes.'/nbInstallationRegion', ['InstallationsController', 'nbInstallationRegion']);
Router::add('GET', $routes.'/admin', ['UserController', 'getAdmin']);
Router::add('GET', $routes.'/communes', ['CommunesController', 'getCommunes']);
Router::add('GET', $routes.'/search', ['InstallationsController', 'searchInstallations']);
Router::add('GET', $routes.'/installations', ['InstallationsController', 'getInstallations']);