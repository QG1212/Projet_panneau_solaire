<?php
class Installateurs {
    public static function getNb($db) {
        $stmt = $db->query("SELECT COUNT(*) as nbInstallateurs FROM Installateur;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}