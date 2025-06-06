<?php
require_once 'model/Onduleurs.php';
require_once 'model/Panneaux.php';


require_once 'config/database.php';

class UserController {
    public static function get20RandOnduleurs() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $onduleurs = Onduleurs::get20Rand($db);
        echo json_encode($onduleurs);
    }

    public static function get20RandPanneaux() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $panneaux = Panneaux::get20Rand($db);
        echo json_encode($panneaux);
    }

    public static function nbInstallation() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Installations::getNb($db);
        echo json_encode($nb);
    }

    public static function nbPanneaux() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Installations::getNb($db);
        echo json_encode($nb);
    }

    public static function nbOnduleurs() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Onduleurs::getNb($db);
        echo json_encode($nb);
    }

    public static function nbInstallateurs() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Installateurs::getNb($db);
        echo json_encode($nb);
    }
}

?>