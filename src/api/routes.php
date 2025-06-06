<?php
require_once 'core/Router.php';
require_once 'controller/UserController.php';
require_once 'controller/DepartementsController.php';
require_once 'controller/InstallateursController.php';
require_once 'controller/InstallationsController.php';
require_once 'controller/OnduleursController.php';
require_once 'controller/PanneauxController.php';

$routes = './Projet_panneau_solaire/src/api/index.php';

<<<<<<< HEAD
Router::add('GET', $routes.'/onduleurs', ['UserController', 'get20RandOnduleurs']);
Router::add('GET', $routes.'/panneaux', ['UserController', 'get20RandPanneaux']);
Router::add('GET', $routes.'/localisation', ['UserController', 'get20RandPanneaux']);
=======
Router::add('GET', $routes.'/onduleurs', ['OnduleursController', 'get20RandOnduleurs']);
Router::add('GET', $routes.'/panneaux', ['PanneauxController', 'get20RandPanneaux']);
Router::add('GET', $routes.'/departements', ['DepartementsController', 'get20RandDepartements']);
>>>>>>> 38c8b01d62537028d0232168001ab896c5c3fa57

Router::add('GET', $routes.'/nbInstallation', ['InstallationsController', 'nbInstallation']);
Router::add('GET', $routes.'/nbPanneaux', ['PanneauxController', 'nbPanneaux']);
Router::add('GET', $routes.'/nbOnduleurs', ['OnduleursController', 'nbOnduleurs']);
Router::add('GET', $routes.'/nbInstallateurs', ['InstallateursController', 'nbInstallateurs']);
Router::add('GET', $routes.'/nbInstallationAnnee', ['InstallationsUserController', 'nbInstallationAnnee']);
Router::add('GET', $routes.'/nbInstallationRegion', ['InstallationsController', 'nbInstallationRegion']);