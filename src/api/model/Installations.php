<?php
class Installations {
    public static function getNb($db) {
        $stmt = $db->query("SELECT COUNT(*) FROM Installation;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getNbAnnee($db) {
        $stmt = $db->query("SELECT an_installation AS year, COUNT(*) AS nb_installations FROM Installation 
        GROUP BY an_installation ORDER BY an_installation;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getNbRegion($db) {
        $stmt = $db->query("SELECT r.reg_nom AS region, SUM(1) AS nb_installations FROM Installation i
        JOIN Locality l ON i.code_insee = l.code_insee JOIN Regions r ON l.id_reg = r.id
        GROUP BY r.reg_nom ORDER BY r.reg_nom;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function search($db, $id_panneau, $id_onduleur, $id_dep) {
        $conditions = [];
        $params = [];

        if ($id_panneau != 0) {
            $conditions[] = "pi.id_marque = :id_panneau";
            $params[':id_panneau'] = $id_panneau;
        }
        if ($id_onduleur != 0) {
            $conditions[] = "oi.id_marque = :id_onduleur";
            $params[':id_onduleur'] = $id_onduleur;
        }
        if ($id_dep != 0) {
            $conditions[] = "d.id = :id_dep";
            $params[':id_dep'] = $id_dep;
        }

        $sql = "
        SELECT *, i.id as id_installation, oi.nb as nb_onduleur, pi.nb as nb_panneau, oi.id_marque AS marque_onduleur, pi.id_marque AS marque_panneau
        FROM Installation i
        INNER JOIN Panneaux_Installe pi ON pi.id = i.id_panneau
        INNER JOIN Onduleur_Installe oi ON oi.id = i.id_onduleur
        INNER JOIN Locality l ON l.code_insee = i.code_insee
        INNER JOIN Departements d ON l.id_dep = d.id
    ";

        if (count($conditions) > 0) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $sql .= " LIMIT 100";

        $stmt = $db->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_INT);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public static function getInstallations($db) {
        $stmt = $db->prepare("
        SELECT * , i.id as id_installation, oi.nb as nb_onduleur, pi.nb as nb_panneau
        FROM Installation i 
        INNER JOIN Panneaux_Installe pi ON pi.id = i.id_panneau 
        INNER JOIN Onduleur_Installe oi ON oi.id = i.id_onduleur 
        INNER JOIN Locality l ON l.code_insee = i.code_insee 
        INNER JOIN Departements d ON l.id_dep = d.id
        INNER JOIN Installateur ir ON i.id_installateur = ir.id
        LIMIT 20;
    ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getInstallationsbyId($db, $id) {
        $stmt = $db->prepare("
        SELECT * , i.id as id_installation, oi.nb as nb_onduleur, pi.nb as nb_panneau
        FROM Installation i 
        INNER JOIN Panneaux_Installe pi ON pi.id = i.id_panneau 
        INNER JOIN Onduleur_Installe oi ON oi.id = i.id_onduleur 
        INNER JOIN Locality l ON l.code_insee = i.code_insee 
        INNER JOIN Departements d ON l.id_dep = d.id
        INNER JOIN Installateur ir ON i.id_installateur = ir.id
        WHERE i.id = :id
    ");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function ajout($db, $id_onduleur, $id_marqueOnduleur, $nb_Onduleur, $nb_Panneau, $id_panneau, $id_marquePanneau, $code_insee, $id_installateur, $mois_installation, $an_installation, $puissance_crete, $surface, $lat, $lon)
    {
        try {
            $db->beginTransaction();

            $stmt1 = $db->prepare("INSERT INTO Onduleur_Installe(id_onduleur, id_marque, nb) VALUES(:id_onduleur, :id_marque, :nb)");
            $stmt1->bindValue(":id_onduleur", $id_onduleur, PDO::PARAM_INT);
            $stmt1->bindValue(":id_marque", $id_marqueOnduleur, PDO::PARAM_INT);
            $stmt1->bindValue(":nb", $nb_Onduleur, PDO::PARAM_INT);
            $stmt1->execute();
            $id1 = $db->lastInsertId();

            $stmt2 = $db->prepare("INSERT INTO Panneaux_Installe(id_panneau, id_marque, nb) VALUES (:id_panneau, :id_marque, :nb)");
            $stmt2->bindValue(":id_panneau", $id_panneau, PDO::PARAM_INT);
            $stmt2->bindValue(":id_marque", $id_marquePanneau, PDO::PARAM_INT);
            $stmt2->bindValue(":nb", $nb_Panneau, PDO::PARAM_INT);
            $stmt2->execute();
            $id2 = $db->lastInsertId();

            $stmt3 = $db->prepare("INSERT INTO Installation(code_insee, id_installateur, id_panneau, id_onduleur, mois_installation, an_installation, puissance_crete, surface, pente, pente_optimum, orientation, orientation_optimum, production_pvgis, lat, lon) 
                                    VALUES (:code_insee, :id_installateur, :id_panneau, :id_onduleur, :mois_installation, :an_installation, :puissance_crete, :surface, null, null, null, null, null, :lat, :lon)");
            $stmt3->bindValue(":code_insee", $code_insee, PDO::PARAM_INT);
            $stmt3->bindValue(":id_installateur", $id_installateur, PDO::PARAM_INT);
            $stmt3->bindValue(":id_onduleur", $id1, PDO::PARAM_INT);
            $stmt3->bindValue(":id_panneau", $id2, PDO::PARAM_INT);
            $stmt3->bindValue(":mois_installation", $mois_installation, PDO::PARAM_INT);
            $stmt3->bindValue(":an_installation", $an_installation, PDO::PARAM_INT);
            $stmt3->bindValue(":puissance_crete", $puissance_crete, PDO::PARAM_INT);
            $stmt3->bindValue(":surface", $surface, PDO::PARAM_INT);
            $stmt3->bindValue(":lat", $lat, PDO::PARAM_STR);
            $stmt3->bindValue(":lon", $lon, PDO::PARAM_STR);
            $stmt3->execute();
            $db->commit();
            echo json_encode("Transaction réussie !");
        } catch (Exception $e) {
            $db->rollBack();
            echo json_encode("Échec de la transaction : " . $e->getMessage());
        }
    }

    public static function update(
        $db,
        $id_onduleur_installe,
        $id_panneaux_installe,
        $id_installation,
        $id_onduleur,
        $id_marqueOnduleur,
        $nb_Onduleur,
        $nb_Panneau,
        $id_panneau,
        $id_marquePanneau,
        $code_insee,
        $id_installateur,
        $mois_installation,
        $an_installation,
        $puissance_crete,
        $surface,
        $lat,
        $lon
    ) {
        try {
            $db->beginTransaction();

            // 🔍 1. Récupération des anciennes valeurs
            $stmtOld = $db->prepare("
            SELECT 
                I.*, 
                OI.id_onduleur as old_id_onduleur, OI.id_marque as old_id_marque_onduleur, OI.nb as old_nb_onduleur,
                PI.id_panneau as old_id_panneau, PI.id_marque as old_id_marque_panneau, PI.nb as old_nb_panneau
            FROM Installation I
            JOIN Onduleur_Installe OI ON OI.id = I.id_onduleur
            JOIN Panneaux_Installe PI ON PI.id = I.id_panneau
            WHERE I.id = :id
        ");
            $stmtOld->execute([':id' => $id_installation]);
            $oldData = $stmtOld->fetch(PDO::FETCH_ASSOC);

            if (!$oldData) {
                throw new Exception("Installation introuvable.");
            }

            // 🛠 2. Si les nouvelles valeurs sont nulles, utiliser les anciennes
            $code_insee        = $code_insee        ?: $oldData['code_insee'];
            $id_installateur   = $id_installateur   ?: $oldData['id_installateur'];
            $mois_installation = $mois_installation ?: $oldData['mois_installation'];
            $an_installation   = $an_installation   ?: $oldData['an_installation'];
            $puissance_crete   = $puissance_crete   ?: $oldData['puissance_crete'];
            $surface           = $surface           ?: $oldData['surface'];
            $lat               = $lat               ?: $oldData['lat'];
            $lon               = $lon               ?: $oldData['lon'];

            $id_onduleur       = $id_onduleur       ?: $oldData['old_id_onduleur'];
            $id_marqueOnduleur = $id_marqueOnduleur ?: $oldData['old_id_marque_onduleur'];
            $nb_Onduleur       = $nb_Onduleur       ?: $oldData['old_nb_onduleur'];

            $id_panneau        = $id_panneau        ?: $oldData['old_id_panneau'];
            $id_marquePanneau  = $id_marquePanneau  ?: $oldData['old_id_marque_panneau'];
            $nb_Panneau        = $nb_Panneau        ?: $oldData['old_nb_panneau'];

            // ✅ 3. Mise à jour des tables
            // -- Onduleur_Installe
            $stmt1 = $db->prepare("
            UPDATE Onduleur_Installe 
            SET id_onduleur = :id_onduleur, id_marque = :id_marque, nb = :nb 
            WHERE id = :id
        ");
            $stmt1->execute([
                ":id_onduleur" => $id_onduleur,
                ":id_marque"   => $id_marqueOnduleur,
                ":nb"          => $nb_Onduleur,
                ":id"          => $id_onduleur_installe,
            ]);

            // -- Panneaux_Installe
            $stmt2 = $db->prepare("
            UPDATE Panneaux_Installe 
            SET id_panneau = :id_panneau, id_marque = :id_marque, nb = :nb 
            WHERE id = :id
        ");
            $stmt2->execute([
                ":id_panneau" => $id_panneau,
                ":id_marque"  => $id_marquePanneau,
                ":nb"         => $nb_Panneau,
                ":id"         => $id_panneaux_installe,
            ]);

            // -- Installation
            $stmt3 = $db->prepare("
            UPDATE Installation SET
                code_insee = :code_insee,
                id_installateur = :id_installateur,
                id_panneau = :id_panneaux_installe,
                id_onduleur = :id_onduleur_installe,
                mois_installation = :mois_installation,
                an_installation = :an_installation,
                puissance_crete = :puissance_crete,
                surface = :surface,
                pente = NULL,
                pente_optimum = NULL,
                orientation = NULL,
                orientation_optimum = NULL,
                production_pvgis = NULL,
                lat = :lat,
                lon = :lon
            WHERE id = :id
        ");
            $stmt3->execute([
                ":code_insee"          => $code_insee,
                ":id_installateur"     => $id_installateur,
                ":id_panneaux_installe"=> $id_panneaux_installe,
                ":id_onduleur_installe"=> $id_onduleur_installe,
                ":mois_installation"   => $mois_installation,
                ":an_installation"     => $an_installation,
                ":puissance_crete"     => $puissance_crete,
                ":surface"             => $surface,
                ":lat"                 => $lat,
                ":lon"                 => $lon,
                ":id"                  => $id_installation,
            ]);

            $db->commit();
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                'message' => 'Mise à jour réussie !'
            ]);
        } catch (Exception $e) {
            $db->rollBack();
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => 'Échec de la mise à jour : ' . $e->getMessage()
            ]);
        }
    }



    public static function delete($db, $id){
        $stmt = $db->prepare("DELETE FROM Installation WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}


?>