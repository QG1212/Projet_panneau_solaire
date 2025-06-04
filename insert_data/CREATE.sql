-- Table: Regions
CREATE TABLE Regions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reg_nom CHAR(32) NOT NULL
) ENGINE=InnoDB;

-- Table: Departements
CREATE TABLE Departements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dep_nom CHAR(32) NOT NULL
) ENGINE=InnoDB;

-- Table: Locality
CREATE TABLE Locality (
    code_insee VARCHAR(6) PRIMARY KEY,
    locality_nom CHAR(32) NOT NULL,
    code_postal INT NOT NULL,
    id_reg INT NOT NULL,
    id_dep INT NOT NULL,
    FOREIGN KEY (id_reg) REFERENCES Regions(id),
    FOREIGN KEY (id_dep) REFERENCES Departements(id)
) ENGINE=InnoDB;

-- Table: Installateur
CREATE TABLE Installateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom CHAR(50) NOT NULL
) ENGINE=InnoDB;

-- Table: Panneaux
CREATE TABLE Panneaux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modele CHAR(50) NOT NULL
) ENGINE=InnoDB;

-- Table: Onduleur
CREATE TABLE Onduleur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modele CHAR(50) NOT NULL
) ENGINE=InnoDB;

-- Table: Marques
CREATE TABLE Marques (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom CHAR(50) NOT NULL
) ENGINE=InnoDB;

-- Table: Installation
CREATE TABLE Installation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code_insee VARCHAR(6),
    id_installateur INT,
    mois_installation INT,
    an_installation INT,
    puissance_crete INT,
    surface INT,
    pente INT,
    pente_optimum INT,
    orientation INT,
    orientation_optimum INT,
    production_pvgis INT,
    lat FLOAT,
    lon FLOAT,
    FOREIGN KEY (code_insee) REFERENCES Locality(code_insee),
    FOREIGN KEY (id_installateur) REFERENCES Installateur(id)
) ENGINE=InnoDB;


-- Table: Panneaux_Installe (association Installation - Panneaux - Marques)
CREATE TABLE Panneaux_Installe (
    id_installation INT,
    id_panneau INT,
    id_marque INT,
    nb INT,
    PRIMARY KEY (id_installation, id_panneau, id_marque),
    FOREIGN KEY (id_installation) REFERENCES Installation(id),
    FOREIGN KEY (id_panneau) REFERENCES Panneaux(id),
    FOREIGN KEY (id_marque) REFERENCES Marques(id)
) ENGINE=InnoDB;

-- Table: Onduleur_Installe (association Installation - Onduleur - Marques)
CREATE TABLE Onduleur_Installe (
    id_installation INT,
    id_onduleur INT,
    id_marque INT,
    nb INT,
    PRIMARY KEY (id_installation, id_onduleur, id_marque),
    FOREIGN KEY (id_installation) REFERENCES Installation(id),
    FOREIGN KEY (id_onduleur) REFERENCES Onduleur(id),
    FOREIGN KEY (id_marque) REFERENCES Marques(id)
) ENGINE=InnoDB;


CREATE TABLE communes_2024 (     code_insee VARCHAR(10) NOT NULL,     nom_standard VARCHAR(255),     reg_code VARCHAR(10),     reg_nom VARCHAR(100),     dep_code VARCHAR(10),     dep_nom VARCHAR(100),     code_postal VARCHAR(10),     population INT,     PRIMARY KEY (code_insee) );

CREATE TABLE data_2024 (     id INT AUTO_INCREMENT PRIMARY KEY,     iddoc VARCHAR(100),     mois_installation TINYINT,                 an_installation SMALLINT,                 nb_panneaux INT,     panneaux_marque VARCHAR(100),     panneaux_modele VARCHAR(100),     nb_onduleur INT,     onduleur_marque VARCHAR(100),     onduleur_modele VARCHAR(100),     puissance_crete FLOAT,                    surface FLOAT,                            pente FLOAT,                              pente_optimum FLOAT,                      orientation VARCHAR(50),     orientation_optimum VARCHAR(50),     installateur VARCHAR(150),     production_pvgis FLOAT,                   lat DECIMAL(10, 7),                       lon DECIMAL(10, 7),                       country VARCHAR(100),     postal_code VARCHAR(20),     postal_code_suffix VARCHAR(20),     postal_town VARCHAR(100),     locality VARCHAR(100));
