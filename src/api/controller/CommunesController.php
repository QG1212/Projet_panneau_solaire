<?php
require_once 'model/Communes.php';
require_once 'config/database.php';

class CommunesController {
    public static function getCommunes() {
        header('Content-Type: application/json');

        $id_dep = $_GET['id_dep'];
        $annee = $_GET['annee'];
        $db = connexionDB();
        $data = Communes::getCommunes($db, $id_dep, $annee);
        echo json_encode($data);
    }

    public static function get20Rand() {
        header('Content-Type: application/json');

        $db = connexionDB();
        $data = Communes::get20Rand($db);
        echo json_encode($data);
    }
}
