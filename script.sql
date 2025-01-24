CREATE TABLE variete_the (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    occupation DECIMAL(5,2) NOT NULL,
    rendement DECIMAL(5,2) NOT NULL,
    prix_vente DECIMAL(10,2) NOT NULL
);

CREATE TABLE parcelle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(50) NOT NULL,
    surface DECIMAL(10,2) NOT NULL,
    variete_the_id INT,
    FOREIGN KEY (variete_the_id) REFERENCES variete_the(id)
);

CREATE TABLE cueilleur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    genre ENUM('M', 'F') NOT NULL,
    date_naissance DATE NOT NULL
);

CREATE TABLE categorie_depense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE salaire_cueilleur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    montant_par_kg DECIMAL(10,2) NOT NULL
);

CREATE TABLE cueillette (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    cueilleur_id INT,
    parcelle_id INT,
    poids DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (cueilleur_id) REFERENCES cueilleur(id),
    FOREIGN KEY (parcelle_id) REFERENCES parcelle(id)
);

CREATE TABLE depense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    categorie_depense_id INT,
    montant DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (categorie_depense_id) REFERENCES categorie_depense(id)
);

CREATE TABLE regeneration_the (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mois INT NOT NULL
);

CREATE TABLE configuration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poids_minimal_journalier DECIMAL(10,2) NOT NULL,
    bonus DECIMAL(5,2) NOT NULL,
    malus DECIMAL(5,2) NOT NULL
);

CREATE TABLE paiement_cueilleur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    cueilleur_id INT,
    poids_total DECIMAL(10,2) NOT NULL,
    bonus DECIMAL(10,2) NOT NULL,
    malus DECIMAL(10,2) NOT NULL,
    montant_paiement DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (cueilleur_id) REFERENCES cueilleur(id)
);