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

}

?>