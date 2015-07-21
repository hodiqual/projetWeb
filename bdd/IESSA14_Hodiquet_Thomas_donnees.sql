-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 21 Juillet 2015 à 13:44
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `IESSA14_Hodiquet_Thomas`
--

--
-- Contenu de la table `Membre`
--

INSERT INTO `Membre` (`noMem`, `nom`, `prenom`, `avatar`, `email`, `mdp`) VALUES
(1, 'THOMAS', 'Raimana', '', 'thomasr@gmail.com', 'iessa'),
(2, 'HODIQUET', 'Alexis', NULL, 'hodiqueta@gmail.com', 'iessa'),
(4, 'DARDEK', 'Nahim', NULL, 'dardekn@gmail.com', 'iessa'),
(5, 'prout', 'prout', NULL, 'prout@gmail.com', 'prout'),
(6, 'toto', 'alexis', NULL, 'toto@fr.fr', 'prout'),
(7, 'Hodiquet', 'Alexis', NULL, 'alexis.hodiquet@gmail.com', 'prout'),
(8, 'Pout', 'Prout', NULL, 'alexis.hodiquet@gmail.comm', 'mdede'),
(9, 'admin', 'adminus', NULL, 'admin@admini.de', 'admin'),
(10, 'Wayne', 'Bruce', NULL, 'batman@wayne.riz', 'iessa'),
(11, 'admin', 'admin', NULL, 'admin@admin.admin', 'admin');



--
-- Contenu de la table `Spot`
--

INSERT INTO `Spot` (`nomSpot`, `photoSpot`, `idFSI`, `urlGoogleMap`) VALUES
('Anglet', 'ressource/img/anglet.jpg', 7, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46314.005604354155!2d-1.519271!3d43.489288450000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd51401cdc979735%3A0xbdbc5ff838b9ab48!2sAnglet!5e0!3m2!1sfr!2sfr!4v1436985004003" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>'),
('Dieppe', 'ressource/img/dieppe.jpg', 1, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20550.94480663189!2d1.0834894999999998!3d49.92005045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e0a207670619f9%3A0xaea20a3d78418545!2sDieppe!5e0!3m2!1sfr!2sfr!4v1436979569652" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>'),
('La Sauzaie', 'ressource/img/lasauzaie.jpg', 4, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5478.4199847461805!2d-1.89084!3d46.642367449999966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480459cf0dbe5925%3A0xecb89b13d8daee73!2sLa+Sauzaie%2C+85470+Bretignolles-sur-Mer!5e0!3m2!1sfr!2sfr!4v1436984575333" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>'),
('La Torche', 'ressource/img/latorche.jpg', 3, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10712.521514064989!2d-4.353274000000001!3d47.837067499999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48173acc8773429b%3A0x64ed67bf332b3077!2sPointe+de+la+Torche%2C+29120+Plomeur!5e0!3m2!1sfr!2sfr!4v1436980210903" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>'),
('Lacanau', 'ressource/img/lacanau.jpg', 5, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11284.48954965727!2d-1.1947349999999974!3d45.00213650000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4801ffc558a23645%3A0xc02b43d4e1f03569!2sLacanau+Oc%C3%A9an%2C+33680+Lacanau!5e0!3m2!1sfr!2sfr!4v1436976508811" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>'),
('Nice', 'ressource/img/nice.jpg', 11, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46149.66507190079!2d7.25281705!3d43.70319045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cdd0106a852d31%3A0x40819a5fd979a70!2sNice!5e0!3m2!1sfr!2sfr!4v1436985264418" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>'),
('Seignosse', 'ressource/img/seignosse.jpg', 6, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46147.89133021739!2d-1.3938345!3d43.70549455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd515a0dba9b1cf3%3A0x8f2b273d8e559e6b!2sSeignosse!5e0!3m2!1sfr!2sfr!4v1436984927701" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>'),
('Siouville', 'ressource/img/siouville.jpg', 2, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10351.957742046245!2d-1.8303565500000003!3d49.560222499999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480cec4db3fab077%3A0x72b1686bcb8dd123!2s50340+Siouville-Hague!5e0!3m2!1sfr!2sfr!4v1436980143468" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>');


--
-- Contenu de la table `SessionSurf`
--

INSERT INTO `SessionSurf` (`noSes`, `nomSpot`, `dateAller`, `dateRetour`, `lieuDep`) VALUES
(1, 'Anglet', '2015-07-20 12:53:21', '2015-07-18 22:00:00', 'Cannes'),
(2, 'Dieppe', '2015-07-20 12:53:29', '2015-07-21 22:00:00', 'Paris'),
(3, 'Lacanau', '2015-07-20 12:53:37', '2015-07-22 22:00:00', 'Toulouse'),
(15, 'Nice', '2015-07-24 22:00:00', '2015-07-25 22:00:00', 'Cannes'),
(16, 'Seignosse', '2015-07-24 22:00:00', '2015-07-25 22:00:00', 'Paris'),
(17, 'La Torche', '2015-07-24 22:00:00', '2015-07-25 22:00:00', 'Paris'),
(18, 'Siouville', '2015-07-29 22:00:00', '2015-07-30 22:00:00', 'Lille'),
(19, 'Dieppe', '2015-07-24 22:00:00', '2015-07-25 22:00:00', 'Lille'),
(20, 'Nice', '2015-07-29 22:00:00', '2015-07-30 22:00:00', 'Cannes'),
(21, 'Anglet', '2015-07-30 22:00:00', '2015-08-06 22:00:00', 'ProutLand'),
(22, 'Anglet', '2015-07-22 22:00:00', '2015-07-29 22:00:00', 'JOrdi'),
(23, 'Anglet', '2015-07-25 22:00:00', '2015-07-27 22:00:00', 'VergeLand'),
(24, 'La Sauzaie', '2015-07-29 22:00:00', '2015-07-30 22:00:00', 'Angers'),
(25, 'Siouville', '2015-07-29 22:00:00', '2015-07-30 22:00:00', 'TestVille'),
(26, 'La Torche', '2015-07-24 22:00:00', '2015-07-30 22:00:00', 'PENHORS'),
(27, 'Nice', '2015-07-23 22:00:00', '2015-07-25 22:00:00', 'Nice'),
(28, 'Anglet', '2015-07-24 22:00:00', '2015-07-30 22:00:00', 'Paris'),
(29, 'Anglet', '2015-07-29 22:00:00', '2015-07-30 22:00:00', 'Anglet'),
(30, 'Anglet', '2015-07-24 22:00:00', '2015-07-30 22:00:00', 'Nice'),
(31, 'Anglet', '2015-07-25 22:00:00', '2015-07-28 22:00:00', 'Paris'),
(32, 'Anglet', '2015-07-23 22:00:00', '2015-07-25 22:00:00', 'Nice'),
(33, 'La Torche', '2015-07-29 22:00:00', '2015-08-01 22:00:00', 'Chaumiere');



--
-- Contenu de la table `Participe`
--

INSERT INTO `Participe` (`noMem`, `noSes`, `avecPlanche`) VALUES
(1, 2, 1),
(1, 3, 1),
(1, 15, 0),
(1, 16, 1),
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(2, 15, 1),
(2, 16, 0),
(2, 25, 1),
(2, 26, 0),
(2, 27, 1),
(2, 31, 0),
(2, 32, 0),
(2, 33, 0),
(4, 3, 0),
(4, 16, 0),
(4, 17, 0),
(4, 18, 0),
(4, 19, 0),
(4, 20, 0),
(4, 21, 0),
(4, 22, 0),
(4, 23, 0),
(4, 24, 0),
(4, 25, 0),
(4, 26, 0),
(4, 27, 0),
(4, 28, 0),
(4, 29, 0),
(4, 30, 0);

--
-- Contenu de la table `Vehicule`
--

INSERT INTO `Vehicule` (`noVeh`, `nbrPlaces`, `nbrPlanches`, `marqueVeh`, `modeleVeh`, `couleurVeh`, `photoVeh`) VALUES
(1, 6, 4, 'nissan', 'nv200', NULL, NULL),
(2, 4, 2, 'mercedes', 'vito', NULL, NULL),
(4, 4, 2, 'ProutCar', 'Essayemoie', 'Rouge', NULL),
(5, 2, 5, 'toto', 'coco', 'grise', NULL),
(6, 7, 14, 'rino', 'clito', 'grise', NULL),
(7, 4, 3, 'BMW', 'M5', 'Noir', NULL);

--
-- Contenu de la table `Possede`
--

INSERT INTO `Possede` (`noMem`, `noVeh`) VALUES
(2, 1),
(1, 2),
(9, 5),
(10, 6),
(11, 7);

--
-- Contenu de la table `Propose`
--



INSERT INTO `Propose` (`noMem`, `noSes`) VALUES
(1, 1),
(2, 2),
(1, 3),
(1, 15),
(2, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(2, 31),
(2, 32),
(2, 33);


--
-- Contenu de la table `VehiculeSessionSurf`
--

INSERT INTO `VehiculeSessionSurf` (`noVeh`, `noSes`, `nbrPlacesDispo`, `nbrPlanchesDispo`) VALUES
(1, 3, 4, 2),
(1, 16, 6, 6),
(1, 32, 3, 3),
(2, 3, 2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
