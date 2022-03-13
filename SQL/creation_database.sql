-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : 
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `renseignement`
--
CREATE DATABASE IF NOT EXISTS `renseignement` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `renseignement`;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Entreprise`;
CREATE TABLE Entreprise(
   idEnt int(11) NOT NULL,
   nomEnt VARCHAR(50),
   missionEnt VARCHAR(100),
   numAdrEnt INT,
   libAdrEnt VARCHAR(50),
   codePostalEnt VARCHAR(5),
   villeAdrEnt VARCHAR(25),
   telephoneEnt VARCHAR(10),
   mailEnt VARCHAR(50),
   siretEnt VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Contact`;
CREATE TABLE Contact(
   idContact int(11) NOT NULL,
   nomContact VARCHAR(25),
   prenomContact VARCHAR(25),
   telContact VARCHAR(10),
   mailContact VARCHAR(50),
   fct_contact VARCHAR(50),
   is_gerant VARCHAR(50),
   idEnt int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `AnneeScolaire`;
CREATE TABLE AnneeScolaire(
   idAnneeScolaire int(11) NOT NULL,
   libAnneeScolaire VARCHAR(9)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Etudiant`;
CREATE TABLE Etudiant(
   idEtudiant int(11) NOT NULL,
   nomEtudiant VARCHAR(25),
   prenomEtudiant VARCHAR(25),
   telEtudiant VARCHAR(10),
   mdpEtudiant VARCHAR(255),
   dateNaissanceEtudiant date DEFAULT NULL,
   villeAdrEtudiant VARCHAR(25),
   numAdrEtudiant VARCHAR(10),
   codePostalAdrEtudiant VARCHAR(5),
   libAdrEtudiant VARCHAR(50),
   dateArriveeEtudiant date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Prof`;
CREATE TABLE Prof(
   idProf int(11) NOT NULL,
   nomProf VARCHAR(25),
   prenomProf VARCHAR(25),
   mdpProf VARCHAR(255),
   telProf VARCHAR(10),
   mailProf VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Stage`;
CREATE TABLE Stage(
   IdStage int(11) NOT NULL,
   titreStage VARCHAR(50),
   descriptifStage VARCHAR(100),
   dateDebutStage DATE DEFAULT NULL,
   dateFinStage DATE DEFAULT NULL,
   dureeHebdoStage INT DEFAULT NULL,
   idProf int(11) NOT NULL,
   idEtudiant int(11) NOT NULL,
   idAnneeScolaire int(11) NOT NULL,
   idEnt int(11) NOT NULL,
   idContact int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `Entreprise`
  ADD PRIMARY KEY (`idEnt`);

ALTER TABLE `Contact`
  ADD PRIMARY KEY (`idContact`),
  ADD KEY `fk_idEnt` (`idEnt`);

ALTER TABLE `AnneeScolaire`
  ADD PRIMARY KEY (`idAnneeScolaire`);

ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`idEtudiant`);

ALTER TABLE `Prof`
  ADD PRIMARY KEY (`idProf`);

ALTER TABLE `Stage`
  ADD PRIMARY KEY (`idStage`),
  ADD KEY `fk_idProf` (`idProf`),
  ADD KEY `fk_idEtudiant` (`idEtudiant`),
  ADD KEY `fk_idAnneeScolaire` (`idAnneeScolaire`),
  ADD KEY `fk_idEnt_Stage` (`idEnt`),
  ADD KEY `fk_idContact` (`idContact`);

ALTER TABLE `Entreprise`
    MODIFY `idEnt` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `AnneeScolaire`
  MODIFY `idAnneeScolaire` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Etudiant`
  MODIFY `idEtudiant` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Prof`
  MODIFY `idProf` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Stage`
  MODIFY `idStage` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Contact`
  ADD CONSTRAINT `fk_idEnt` FOREIGN KEY (`idEnt`) REFERENCES `Entreprise` (`idEnt`);

ALTER TABLE `Stage`
  ADD CONSTRAINT `fk_idProf` FOREIGN KEY (`idProf`) REFERENCES `Prof` (`idProf`),
  ADD CONSTRAINT `fk_idEtudiant` FOREIGN KEY (`idEtudiant`) REFERENCES `Etudiant` (`idEtudiant`),
  ADD CONSTRAINT `fk_idAnneeScolaire` FOREIGN KEY (`idAnneeScolaire`) REFERENCES `AnneeScolaire` (`idAnneeScolaire`),
  ADD CONSTRAINT `fk_idEnt_Stage` FOREIGN KEY (`idEnt`) REFERENCES `Entreprise` (`idEnt`),
  ADD CONSTRAINT `fk_idContact` FOREIGN KEY (`idContact`) REFERENCES `Contact` (`idContact`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;