<?php
class Installations {
    public static function getNb($db) {
        $stmt = $db->query("count(*)");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}