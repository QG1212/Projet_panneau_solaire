<?php

class InstallateursController
{
    public static function nbInstallateurs() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $nb = Installateurs::getNb($db);
        echo json_encode($nb);
    }
}