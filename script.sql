CREATE TABLE `user` ( 
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `pwd` VARCHAR(100) NOT NULL
);

CREATE TABLE `varieteThe` ( 
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(100) NOT NULL,
    `occupation` DECIMAL(5,2) NOT NULL,
    `rendement` DECIMAL(5,2) NOT NULL,
    `img` VARCHAR(100) NOT NULL,
    `prixVente` DECIMAL(10,2) NOT NULL
);

CREATE TABLE `parcelle` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `numero` VARCHAR(50) NOT NULL,
    `surface` DECIMAL(10,2) NOT NULL
    `varieteTheId` INT,
    FOREIGN KEY (`varieteTheId`) REFERENCES `varieteThe`(`id`)
);

CREATE TABLE `cueilleur` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(100) NOT NULL,
    `genre` ENUM('M', 'F') NOT NULL,
    `dateNaissance` DATE NOT NULL
);

CREATE TABLE `categorieDepense` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(100) NOT NULL
);

CREATE TABLE `salaireCueilleur` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `montantParKg` DECIMAL(10,2) NOT NULL
);

CREATE TABLE `cueillette` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `date` DATE NOT NULL,
    `cueilleurId` INT,
    `parcelleId` INT,
    `poids` DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (`cueilleurId`) REFERENCES `cueilleur`(`id`),
    FOREIGN KEY (`parcelleId`) REFERENCES `parcelle`(`id`)
);

CREATE TABLE `depense` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `date` DATE NOT NULL,
    `categorieDepenseId` INT,
    `montant` DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (`categorieDepenseId`) REFERENCES `categorieDepense`(`id`)
);

CREATE TABLE `regenerationThe` (

    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `mois` INT NOT NULL
);

CREATE TABLE `configuration` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `poidsMinimalJournalier` DECIMAL(10,2) NOT NULL,
    `bonus` DECIMAL(5,2) NOT NULL,
    `malus` DECIMAL(5,2) NOT NULL
);

CREATE TABLE `paiementCueilleur` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `date` DATE NOT NULL,
    `cueilleurId` INT,
    `poidsTotal` DECIMAL(10,2) NOT NULL,
    `bonus` DECIMAL(10,2) NOT NULL,
    `malus` DECIMAL(10,2) NOT NULL,
    `montantPaiement` DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (`cueilleurId`) REFERENCES `cueilleur`(`id`)
);
