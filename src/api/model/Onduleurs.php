<?php
class Onduleurs {
    public static function get20Rand($db) {
        $stmt = $db->query("SELECT DISTINCT m.id, m.nom FROM Onduleur_Installe oi INNER JOIN Marques m ON m.id = oi.id_marque ORDER BY RAND() LIMIT 20");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getNb($db) {
        $stmt = $db->query("SELECT COUNT(*) FROM Onduleur;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}