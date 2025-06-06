<?php

class Panneaux
{
    public static function get20Rand($db) {
        $stmt = $db->query("SELECT DISTINCT m.nom FROM Panneaux_Installe oi INNER JOIN Marques m ON m.id = oi.id_marque ORDER BY RAND() LIMIT 20");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>