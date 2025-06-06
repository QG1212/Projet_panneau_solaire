<?php
class Departements
{
    public static function get20Rand($db) {
        $stmt = $db->query("SELECT * FROM Departements ORDER BY RAND() LIMIT 20");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
