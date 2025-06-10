<?php

class User
{
    public static function getUser($db)
    {
        $stmt = $db->query("SELECT * FROM user");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function dbModifyDate($db, $mois_installation, $an_installation, $id)
    {
        $stmt = $db->prepare("UPDATE Installation SET mois_installation = :mois_installation, an_installation = :an_installation WHERE id = :id");
        $stmt->bindParam(":mois_installation", $mois_installation);
        $stmt->bindParam(":an_installation", $an_installation);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function dbModifyPanneau($db, $nb, $id)
    {
        $stmt = $db->prepare("UPDATE Panneaux_Installe SET nb =: nb WHERE id = :id");
        $stmt->bindParam(":nb", $nb);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function dbModifyOnduleur($db, $nb, $id)
    {
        $stmt = $db->prepare("UPDATE Onduleur_Installe SET nb =: nb WHERE id = :id");
        $stmt->bindParam(":nb", $nb);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function dbModifySurface($db, $surface, $id)
    {
        $stmt = $db->prepare("UPDATE Installation SET surface =: surface WHERE id = :id");
        $stmt->bindParam(":surface", $surface);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function dbModifyLocalisation($db, $localisation, $id)
    {
        $stmt = $db->prepare("UPDATE Locality SET nom_commune =: nom_commune WHERE id = :id");
        $stmt->bindParam(":nom_commune", $localisation);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function dbModifyPuissance($db, $puissance_crete, $id)
    {
        $stmt = $db->prepare("UPDATE Installation SET puissance_crete =: puissance_crete WHERE id = :id");
        $stmt->bindParam(":puissance_crete", $puissance_crete);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function dbDelete($db, $id)
    {
        $stmt = $db->prepare("DELETE FROM Installation WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>