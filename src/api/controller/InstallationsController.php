<?php

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
}