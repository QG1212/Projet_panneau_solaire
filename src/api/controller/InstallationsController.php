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

    public static function addInstallation() {
        header('Content-Type: application/json');
        $db = connexionDB();
        $id_onduleur        = (int)$_POST['modeleO'];
        $id_marqueOnduleur  = (int)$_POST['marqueO'];
        $nb_Onduleur        = (int)$_POST['onduleur'];

        $nb_Panneau         = (int)$_POST['panneau'];
        $id_panneau         = (int)$_POST['modeleP'];
        $id_marquePanneau   = (int)$_POST['marqueP'];

        $code_insee         = (string)$_POST['commune'];
        $id_installateur = (int)$_POST['installateur'];

        $mois_installation  = (int)$_POST['mois'];
        $an_installation    = (int)$_POST['annee'];

        $puissance_crete    = (int)$_POST['puissance'];
        $surface            = (int)$_POST['surface'];

        $lat                = 48.2;
        $lon                = 1.5;

        Installations::ajout($db, $id_onduleur, $id_marqueOnduleur, $nb_Onduleur, $nb_Panneau, $id_panneau, $id_marquePanneau, $code_insee, $id_installateur, $mois_installation, $an_installation, $puissance_crete, $surface, $lat, $lon);
    }

    public static function updateInstallation() {
        header('Content-Type: application/json');

        $db = connexionDB();

        // Récupérer les données PUT JSON envoyées dans le body
        $putData = file_get_contents("php://input");
        $data = json_decode($putData, true);

        if (!$data) {
            echo json_encode(["error" => "Données PUT invalides ou manquantes"]);
            http_response_code(400);
            return;
        }

        $id_onduleur       = (int)($data['modeleO']);
        $id_marqueOnduleur = (int)($data['marqueO']);
        $nb_Onduleur       = (int)($data['onduleur']);

        $nb_Panneau        = (int)($data['panneau']);
        $id_panneau        = (int)($data['modeleP']);
        $id_marquePanneau  = (int)($data['marqueP']);

        $code_insee        = (string)($data['commune']);
        $id_installateur   = (int)($data['installateur']);

        $mois_installation = (int)($data['mois']);
        $an_installation   = (int)($data['annee']);

        $puissance_crete   = (int)($data['puissance']);
        $surface           = (int)($data['surface']);

        $lat               = 48.2;  // ou récupéré depuis $data si tu veux
        $lon               = 1.5;

        // Appelle ta méthode update avec les bons paramètres
        Installations::update(
            $db,
            $data['id_onduleur_installe'] , // à récupérer côté client !
            $data['id_panneaux_installe'] ,
            $data['id_installation'] ,
            $id_onduleur,
            $id_marqueOnduleur,
            $nb_Onduleur,
            $nb_Panneau,
            $id_panneau,
            $id_marquePanneau,
            $code_insee,
            $id_installateur,
            $mois_installation,
            $an_installation,
            $puissance_crete,
            $surface,
            $lat,
            $lon
        );
    }

    public static function deleteInstallation()
    {
        header('Content-Type: application/json');
        $db = connexionDB();

        $id = (int)$_GET['id'];

        $result = Installations::delete($db, $id);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Installation supprimée']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression']);
        }
    }

}