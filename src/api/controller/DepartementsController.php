<?php
require_once 'model/Departements.php';
require_once 'config/database.php';

class DepartementsController
{
    public static function get20RandDepartements() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $data = Departements::get20Rand($db);
        echo json_encode($data);
    }
}

