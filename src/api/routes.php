<?php
require_once 'core/Router.php';


require_once 'controller/UserController.php';
require_once 'controller/DepartementsController.php';
require_once 'controller/InstallateursController.php';
require_once 'controller/InstallationsController.php';
require_once 'controller/OnduleursController.php';
require_once 'controller/PanneauxController.php';
require_once 'controller/CommunesController.php';

$routes = '/Projet_panneau_solaire/src/api/index.php';

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

Router::add('GET', $routes.'/installation', ['InstallationsController', 'getInstallationsbyId']);
Router::add('GET', $routes.'/marqueOnduleur', ['OnduleursController', 'getMarqueOnduleur']);
Router::add('GET', $routes.'/marquePanneau', ['PanneauxController', 'getMarquePanneau']);
Router::add('GET', $routes.'/modelePanneau', ['PanneauxController', 'get20RandModele']);
Router::add('GET', $routes.'/modeleOnduleur', ['OnduleursController', 'get20RandModele']);
Router::add('GET', $routes.'/randCommunes', ['CommunesController', 'get20Rand']);
Router::add('GET', $routes.'/randInstallateur', ['InstallateursController', 'get20Rand']);

Router::add('POST', $routes.'/ajouter-installation', ['InstallationsController', 'addInstallation']);

Router::add('PUT', $routes.'/modifier', ['User', 'dbModifyDate']);
Router::add('PUT', $routes.'/modifier', ['User', 'dbModifyPanneau']);
Router::add('PUT', $routes.'/modifier', ['User', 'dbModifyOnduleur']);
Router::add('PUT', $routes.'/modifier', ['User', 'dbModifySurface']);
Router::add('PUT', $routes.'/modifier', ['User', 'dbModifyLocalisation']);
Router::add('PUT', $routes.'/modifier', ['User', 'dbModifyPuissance']);

Router::add('DELETE', $routes.'/supprimer', ['User', 'dbDelete']);