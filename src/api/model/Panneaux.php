<?php

class Panneaux
{
    public static function get20Rand($db) {
        $stmt = $db->query("SELECT DISTINCT m.id, m.nom FROM Panneaux_Installe oi INNER JOIN Marques m ON m.id = oi.id_marque ORDER BY RAND() LIMIT 20");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get20RandModele($db) {
        $stmt = $db->query("SELECT DISTINCT p.id, p.modele FROM Panneaux_Installe pi INNER JOIN Panneaux p ON p.id = pi.id_marque ORDER BY RAND() LIMIT 20");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getNbPanneauInstalle($db, $id) {
        $stmt = $db->query("SELECT pi.nb from Marques m INNER JOIN Panneaux_Installe pi ON pi.id_marque = m.id WHERE pi.id_marque = ?");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getNb($db) {
        $stmt = $db->query("SELECT COUNT(*) as nbPanneaux FROM Panneaux;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMarquePanneau($db, $id_marque) {
        $stmt = $db->prepare("SELECT * FROM Marques WHERE id = :id_marque");
        $stmt->bindValue(":id_marque", $id_marque, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}