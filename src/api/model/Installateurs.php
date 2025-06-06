<?php
class Installateurs {
    public static function getNb($db) {
        $stmt = $db->query("SELECT COUNT(*) FROM Installateur;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}