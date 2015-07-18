CREATE DATABASE IESSA14_Hodiquet_Thomas;
USE IESSA14_Hodiquet_Thomas;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS Membre
(
	noMem 				INT NOT NULL AUTO_INCREMENT,
	nom 				VARCHAR(20) NOT NULL,
	prenom 				VARCHAR(20) NOT NULL,
	avatar 				VARCHAR(100),
	email 				VARCHAR(40) NOT NULL CHECK (email LIKE "%@%"),
	mdp 				VARCHAR(20) NOT NULL,
	PRIMARY KEY(noMem)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Spot
(
	nomSpot 			VARCHAR(50) NOT NULL,
	photoSpot 			VARCHAR(100),
	idFSI 				INT,
	urlGoogleMap 			VARCHAR(1000),
	PRIMARY KEY(nomSpot)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS SessionSurf
(
	noSes 				INT NOT NULL AUTO_INCREMENT,
	nomSpot 			VARCHAR(50) NOT NULL,
	dateAller 			TIMESTAMP NOT NULL,
	dateRetour 			TIMESTAMP NOT NULL,
	lieuDep 			VARCHAR(50),
	PRIMARY KEY(noSes),
	FOREIGN KEY(nomSpot) REFERENCES Spot(nomSpot)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Vehicule
(
	noVeh 				INT NOT NULL AUTO_INCREMENT,
	nbrPlaces 			INT,
	nbrPlanches 			INT,
	marqueVeh 			VARCHAR(20),
	modeleVeh 			VARCHAR(20),
	couleurVeh 			VARCHAR(20),
	photoVeh 			VARCHAR(100),
	PRIMARY KEY(noVeh)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS VehiculeSessionSurf
(
	noVeh 				INT NOT NULL,
	noSes 				INT NOT NULL,
	nbrPlacesDispo 			INT NOT NULL,
	nbrPlanchesDispo		INT NOT NULL,
	PRIMARY KEY(noVeh, noSes),
	FOREIGN KEY(noVeh) REFERENCES Vehicule(noVeh) ON DELETE CASCADE,
	FOREIGN KEY(noSes) REFERENCES SessionSurf(noSes) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Propose
(
	noMem 				INT NOT NULL,
	noSes 				INT NOT NULL UNIQUE,
	PRIMARY KEY(noMem, noSes),
	FOREIGN KEY(noMem) REFERENCES Membre(noMem) ON DELETE CASCADE,
	FOREIGN KEY(noSes) REFERENCES SessionSurf(noSes) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Participe
(
	noMem 				INT NOT NULL,
	noSes 				INT NOT NULL,
	PRIMARY KEY(noMem, noSes),
	FOREIGN KEY(noMem) REFERENCES Membre(noMem) ON DELETE CASCADE,
	FOREIGN KEY(noSes) REFERENCES SessionSurf(noSes) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Possede
(
	noMem 				INT NOT NULL,
	noVeh 				INT NOT NULL UNIQUE,
	PRIMARY KEY(noMem, noVeh),
	FOREIGN KEY(noMem) REFERENCES Membre(noMem) ON DELETE CASCADE,
	FOREIGN KEY(noVeh) REFERENCES Vehicule(noVeh) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/** Donnees **/
-- Spot
INSERT INTO `IESSA14_Hodiquet_Thomas`.`Spot` (`nomSpot`, `photoSpot`, `idFSI`, `urlGoogleMap`) VALUES ('Dieppe', 'ressource/img/dieppe.jpg', '1', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20550.94480663189!2d1.0834894999999998!3d49.92005045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e0a207670619f9%3A0xaea20a3d78418545!2sDieppe!5e0!3m2!1sfr!2sfr!4v1436979569652" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>');
INSERT INTO `IESSA14_Hodiquet_Thomas`.`Spot` (`nomSpot`, `photoSpot`, `idFSI`, `urlGoogleMap`) VALUES ('Siouville', 'ressource/img/siouville.jpg', '2', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10351.957742046245!2d-1.8303565500000003!3d49.560222499999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480cec4db3fab077%3A0x72b1686bcb8dd123!2s50340+Siouville-Hague!5e0!3m2!1sfr!2sfr!4v1436980143468" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>');
INSERT INTO `IESSA14_Hodiquet_Thomas`.`Spot` (`nomSpot`, `photoSpot`, `idFSI`, `urlGoogleMap`) VALUES ('La Torche', 'ressource/img/latorche.jpg', '3', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10712.521514064989!2d-4.353274000000001!3d47.837067499999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48173acc8773429b%3A0x64ed67bf332b3077!2sPointe+de+la+Torche%2C+29120+Plomeur!5e0!3m2!1sfr!2sfr!4v1436980210903" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>');
INSERT INTO `IESSA14_Hodiquet_Thomas`.`Spot` (`nomSpot`, `photoSpot`, `idFSI`, `urlGoogleMap`) VALUES ('La Sauzaie', 'ressource/img/lasauzaie.jpg', '4', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5478.4199847461805!2d-1.89084!3d46.642367449999966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480459cf0dbe5925%3A0xecb89b13d8daee73!2sLa+Sauzaie%2C+85470+Bretignolles-sur-Mer!5e0!3m2!1sfr!2sfr!4v1436984575333" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>');
INSERT INTO `IESSA14_Hodiquet_Thomas`.`Spot` (`nomSpot`, `photoSpot`, `idFSI`, `urlGoogleMap`) VALUES ('Lacanau', 'ressource/img/lacanau.jpg', '5', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11284.48954965727!2d-1.1947349999999974!3d45.00213650000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4801ffc558a23645%3A0xc02b43d4e1f03569!2sLacanau+Oc%C3%A9an%2C+33680+Lacanau!5e0!3m2!1sfr!2sfr!4v1436976508811" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>');
INSERT INTO `IESSA14_Hodiquet_Thomas`.`Spot` (`nomSpot`, `photoSpot`, `idFSI`, `urlGoogleMap`) VALUES ('Seignosse', 'ressource/img/seignosse.jpg', '6', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46147.89133021739!2d-1.3938345!3d43.70549455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd515a0dba9b1cf3%3A0x8f2b273d8e559e6b!2sSeignosse!5e0!3m2!1sfr!2sfr!4v1436984927701" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>');	
INSERT INTO `IESSA14_Hodiquet_Thomas`.`Spot` (`nomSpot`, `photoSpot`, `idFSI`, `urlGoogleMap`) VALUES ('Anglet', 'ressource/img/anglet.jpg', '7', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46314.005604354155!2d-1.519271!3d43.489288450000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd51401cdc979735%3A0xbdbc5ff838b9ab48!2sAnglet!5e0!3m2!1sfr!2sfr!4v1436985004003" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>');
INSERT INTO `IESSA14_Hodiquet_Thomas`.`Spot` (`nomSpot`, `photoSpot`, `idFSI`, `urlGoogleMap`) VALUES ('Nice', 'ressource/img/nice.jpg', '11', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46149.66507190079!2d7.25281705!3d43.70319045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cdd0106a852d31%3A0x40819a5fd979a70!2sNice!5e0!3m2!1sfr!2sfr!4v1436985264418" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>');

-- Membre
INSERT INTO `Membre` (`noMem`, `nom`, `prenom`, `avatar`, `email`, `mdp`) VALUES
(1, 'THOMAS', 'Raimana', '', 'thomasr@gmail.com', 'iessa'),
(2, 'HODIQUET', 'Alexis', NULL, 'hodiqueta@gmail.com', 'iessa'),
(4, 'DARDEK', 'Nahim', NULL, 'dardekn@gmail.com', 'iessa');

-- SessionSurf
INSERT INTO `SessionSurf` (`noSes`, `nomSpot`, `dateAller`, `dateRetour`, `lieuDep`) VALUES
(1, 'Anglet', '2015-07-18 22:00:00', '2015-07-18 22:00:00', ''),
(2, 'Dieppe', '2015-07-19 22:00:00', '2015-07-21 22:00:00', NULL),
(3, 'Lacanau', '2015-07-19 22:00:00', '2015-07-22 22:00:00', NULL);

-- Vehicule
INSERT INTO `Vehicule` (`noVeh`, `nbrPlaces`, `nbrPlanches`, `marqueVeh`, `modeleVeh`, `couleurVeh`, `photoVeh`) VALUES
(1, 6, 4, 'nissan', NULL, NULL, NULL),
(2, 4, 2, 'mercedes', NULL, NULL, NULL);

-- Participe
INSERT INTO `Participe` (`noMem`, `noSes`) VALUES
(1, 2),
(2, 3);

-- Possede
INSERT INTO `Possede` (`noMem`, `noVeh`) VALUES
(2, 1),
(1, 2);

-- Propose
INSERT INTO `Propose` (`noMem`, `noSes`) VALUES
(1, 1),
(2, 2);

-- VehiculeSessionSurf
INSERT INTO `VehiculeSessionSurf` (`noVeh`, `noSes`, `nbrPlacesDispo`, `nbrPlanchesDispo`) VALUES
(1, 3, 4, 2),
(2, 3, 2, 2);
