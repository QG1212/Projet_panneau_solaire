--20 Marques Onduleur
SELECT DISTINCT m.nom FROM Onduleur_Installe oi INNER JOIN Marques m ON m.id = oi.id_marque ORDER BY RAND() LIMIT 20;

--20 Marques Panneaux
SELECT DISTINCT m.nom FROM Panneaux_Installe oi INNER JOIN Marques m ON m.id = oi.id_marque ORDER BY RAND() LIMIT 20;