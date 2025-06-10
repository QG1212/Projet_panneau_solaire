<?php
require_once 'config/database.php';
require_once 'model/Installations.php';

require_once 'model/Installations.php';
require_once 'config/database.php';

class InstallationsController

{
    public static function nbInstallation() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Installations::getNb($db);
        echo json_encode($nb);
    }

    public static function nbInstallationAnnee() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Installations::getNbAnnee($db);
        echo json_encode($nb);
    }

    public static function nbInstallationRegion() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Installations::getNbRegion($db);
        echo json_encode($nb);
    }

    public static function searchInstallations() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $id_panneau = $_GET['id_panneau'];
        $id_onduleur = $_GET['id_onduleur'];
        $id_dep = $_GET['id_dep'];
        $data = Installations::search($db, $id_panneau, $id_onduleur, $id_dep);
        echo json_encode($data);
    }

    public static function getInstallations() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $data = Installations::getInstallations($db);
        echo json_encode($data);
    }

    public static function getInstallationsbyId() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $id = $_GET['id'];
        $data = Installations::getInstallationsbyId($db, $id);
        echo json_encode($data);
    }

}