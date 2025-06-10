<?php

require_once 'model/Installateurs.php';
require_once 'config/database.php';

class InstallateursController
{
    public static function nbInstallateurs() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Installateurs::getNb($db);
        echo json_encode($nb);
    }

    public static function get20Rand() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Installateurs::get20Rand($db);
        echo json_encode($nb);
    }
}