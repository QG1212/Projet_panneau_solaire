<?php
class Installateurs {
    public static function getNb($db) {
        $stmt = $db->query("SELECT COUNT(*) as nbInstallateurs FROM Installateur;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get20Rand($db) {
        $stmt = $db->query("SELECT *  FROM Installateur ORDER BY RAND() LIMIT 20");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}