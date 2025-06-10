<?php
class Onduleurs {
    public static function get20Rand($db) {
        $stmt = $db->query("SELECT DISTINCT m.id, m.nom FROM Onduleur_Installe oi INNER JOIN Marques m ON m.id = oi.id_marque ORDER BY RAND() LIMIT 20");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get20RandModele($db) {
        $stmt = $db->query("SELECT DISTINCT p.id, p.modele FROM Onduleur_Installe pi INNER JOIN Onduleur p ON p.id = pi.id_marque ORDER BY RAND() LIMIT 20");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getNb($db) {
        $stmt = $db->query("SELECT COUNT(*) as nbOnduleurs FROM Onduleur;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getMarqueOnduleur($db, $id_marque) {
        $stmt = $db->prepare("SELECT * FROM Marques WHERE id = :id_marque");
        $stmt->bindValue(":id_marque", $id_marque, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}