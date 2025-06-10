

INSERT INTO Installateur (nom) SELECT DISTINCT installateur FROM data_2024;

INSERT INTO Onduleur (modele) SELECT DISTINCT onduleur_modele FROM data_2024;

INSERT INTO Panneaux (modele) SELECT DISTINCT panneaux_modele FROM data_2024;

INSERT INTO Regions (reg_nom) SELECT DISTINCT reg_nom FROM communes_2024;

INSERT INTO Departements (dep_nom) SELECT DISTINCT dep_nom FROM communes_2024;

INSERT IGNORE INTO Panneau_Marques (nom)
SELECT DISTINCT TRIM(panneaux_marque)
FROM data_2024
WHERE panneaux_marque IS NOT NULL AND panneaux_marque != '';

INSERT IGNORE INTO Onduleur_Marques (nom)
SELECT DISTINCT TRIM(onduleur_marque)
FROM data_2024
WHERE onduleur_marque IS NOT NULL AND onduleur_marque != '';

INSERT INTO Locality (code_insee, nom_commune, code_postal, id_reg, id_dep) SELECT      c.code_insee,     c.nom_standard,     c.code_postal,     r.id AS id_reg,     d.id AS id_dep FROM communes_2024 c JOIN Regions r ON c.reg_nom = r.reg_nom JOIN Departements d ON c.dep_nom = d.dep_nom;

INSERT INTO Onduleur_Installe (id_onduleur, id_marque, nb)
SELECT
    o.id AS id_onduleur,
    m.id AS id_marque,
    d.nb_onduleur AS nb
FROM data_2024 d
         JOIN Onduleur o ON d.onduleur_modele = o.modele
         JOIN Onduleur_Marques m ON d.onduleur_marque = m.nom;

INSERT INTO Panneaux_Installe (id_panneau, id_marque, nb)
SELECT
    p.id AS id_panneau,
    m.id AS id_marque,
    d.nb_panneaux AS nb
FROM data_2024 d
    JOIN Panneaux p ON d.panneaux_modele = p.modele
    JOIN Panneau_Marques m ON d.panneaux_marque = m.nom;
