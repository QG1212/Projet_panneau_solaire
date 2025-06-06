<?php
require_once 'core/Router.php';
require_once 'controller/UserController.php';

Router::add('GET', '/api/onduleurs', ['UserController', 'get20RandOnduleurs']);
Router::add('GET', '/api/panneaux', ['UserController', 'get20RandPanneaux']);

?>
