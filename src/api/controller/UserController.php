<?php
require_once 'model/Onduleurs.php';
require_once 'model/Panneaux.php';

require_once 'config/database.php';

class UserController {
    public static function get20RandOnduleurs() {
        $db = connexionDB();
        $onduleurs = Onduleurs::get20Rand($db);
        echo json_encode($onduleurs);
    }

    public static function get20RandPanneaux() {
        $db = connexionDB();
        $panneaux = Panneaux::get20Rand($db);
        echo json_encode($panneaux);
    }
}
?>