<?php
class Installations {
    public static function getNb($db) {
        $stmt = $db->query("SELECT COUNT(*) FROM Installation;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getNbAnnee($db) {
        $stmt = $db->query("SELECT an_installation AS year, COUNT(*) AS nb_installations FROM Installation 
        GROUP BY an_installation ORDER BY an_installation;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getNbRegion($db) {
        $stmt = $db->query("SELECT r.reg_nom AS region, SUM(1) AS nb_installations FROM Installation i
        JOIN Locality l ON i.code_insee = l.code_insee JOIN Regions r ON l.id_reg = r.id
        GROUP BY r.reg_nom ORDER BY r.reg_nom;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function search($db, $id_panneau, $id_onduleur, $id_dep) {
        $stmt = $db->prepare("
        SELECT * , oi.nb as nb_onduleur, pi.nb as nb_panneau 
        FROM Installation i 
        INNER JOIN Panneaux_Installe pi ON pi.id = i.id_panneau 
        INNER JOIN Onduleur_Installe oi ON oi.id = i.id_onduleur 
        INNER JOIN Locality l ON l.code_insee = i.code_insee 
        INNER JOIN Departements d ON l.id_dep = d.id 
        WHERE pi.id_marque = :id_panneau 
          AND oi.id_marque = :id_onduleur 
          AND d.id = :id_dep
    ");

        $stmt->bindParam(":id_panneau", $id_panneau, PDO::PARAM_INT);
        $stmt->bindParam(":id_onduleur", $id_onduleur, PDO::PARAM_INT);
        $stmt->bindParam(":id_dep", $id_dep, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getInstallations($db) {
        $stmt = $db->prepare("
        SELECT * , oi.nb as nb_onduleur, pi.nb as nb_panneau 
        FROM Installation i 
        INNER JOIN Panneaux_Installe pi ON pi.id = i.id_panneau 
        INNER JOIN Onduleur_Installe oi ON oi.id = i.id_onduleur 
        INNER JOIN Locality l ON l.code_insee = i.code_insee 
        INNER JOIN Departements d ON l.id_dep = d.id 
    ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>