

INSERT INTO Installateur (nom) SELECT DISTINCT installateur FROM data_2024;

INSERT INTO Onduleur (modele) SELECT DISTINCT onduleur_modele FROM data_2024;

INSERT INTO Panneaux (modele) SELECT DISTINCT panneaux_modele FROM data_2024;

INSERT INTO Regions (reg_nom) SELECT DISTINCT reg_nom FROM commune_2024;

INSERT INTO Departements (dep_nom) SELECT DISTINCT dep_nom FROM commune_2024;

INSERT IGNORE INTO Marques (nom) SELECT DISTINCT marque FROM (     SELECT TRIM(panneaux_marque) AS marque FROM data_2024     WHERE panneaux_marque IS NOT NULL AND panneaux_marque != ''          UNION          SELECT TRIM(onduleur_marque) AS marque FROM data_2024     WHERE onduleur_marque IS NOT NULL AND onduleur_marque != '' ) AS combined_marques;

INSERT INTO Installation (mois_installation, an_installation, puissance_crete, surface, pente, pente_optimum_ o
rientation, orientation_optimum, production_pvgis, lat, lon) SELECT DISTINCT  FROM data_2024;

 INSERT INTO Locality (code_insee, nom_commune, code_postal, id_reg, id_dep) SELECT      c.code_insee,     c.nom_standard,     c.code_postal,     r.id AS id_reg,     d.id AS id_dep FROM communes_2024 c JOIN Regions r ON c.reg_nom = r.reg_nom JOIN Departements d ON c.dep_nom = d.dep_nom;

INSERT INTO Panneaux_Installe (id_installation, id_panneau, id_marque, nb)
SELECT
    p.id AS id_panneau,
    m.id AS id_marque,
    d.nb_panneaux AS nb
FROM data_2024 d
JOIN Panneaux p ON d.panneaux_modele = p.modele
JOIN Marques m ON d.panneaux_marque = m.nom;

INSERT INTO Onduleur_Installe (id_onduleur, id_marque, nb)
SELECT
    o.id AS id_onduleur,
    m.id AS id_marque,
    d.nb_onduleur AS nb
FROM data_2024 d
         JOIN Onduleur o ON d.onduleur_modele = o.modele
         JOIN Marques m ON d.onduleur_marque = m.nom;


