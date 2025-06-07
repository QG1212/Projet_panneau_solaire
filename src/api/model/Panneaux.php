<?php

class Panneaux
{
    public static function get20Rand($db) {
        $stmt = $db->query("SELECT DISTINCT m.id, m.nom FROM Panneaux_Installe oi INNER JOIN Marques m ON m.id = oi.id_marque ORDER BY RAND() LIMIT 20");
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
}