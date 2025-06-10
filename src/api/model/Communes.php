<?php

class Communes
{
    public static function getCommunes($db, $id_dep, $annee) {
        $sql = "
            SELECT DISTINCT l.code_insee, l.nom_commune, l.code_postal, i.puissance_crete, i.lon, i.lat
            FROM Locality l
            INNER JOIN Installation i ON l.code_insee = i.code_insee
            INNER JOIN Departements d ON d.id = l.id_dep
            WHERE d.id = :id_dep AND i.an_installation = :annee
            ORDER BY RAND()
        ";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_dep', $id_dep, PDO::PARAM_INT);
        $stmt->bindParam(':annee', $annee, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get20Rand($db) {
        $sql = "SELECT * FROM Locality ORDER BY RAND() LIMIT 20";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
