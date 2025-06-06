<?php
require_once 'model/Panneaux.php';
require_once 'config/database.php';
class PanneauxController
{
    public static function get20RandPanneaux() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $data = Panneaux::get20Rand($db);
        echo json_encode($data);
    }

    public static function nbPanneaux() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Panneaux::getNb($db);
        echo json_encode($nb);
    }
}