<?php
require_once 'model/Onduleurs.php';
require_once 'config/database.php';

class OnduleursController
{
    public static function get20RandOnduleurs() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $data = Onduleurs::get20Rand($db);
        echo json_encode($data);
    }

    public static function nbOnduleurs() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Onduleurs::getNb($db);
        echo json_encode($nb);
    }
}