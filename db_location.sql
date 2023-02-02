-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 06 déc. 2021 à 15:24
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_location`
--
CREATE DATABASE IF NOT EXISTS `db_location` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_location`;

-- --------------------------------------------------------

--
-- Structure de la table `loueur`
--

CREATE TABLE `loueur` (
  `code_client` varchar(7) NOT NULL,
  `siren` varchar(9) NOT NULL,
  `nom` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `loueur`
--

INSERT INTO `loueur` (`code_client`, `siren`, `nom`) VALUES
('CLI0001', 'a1b2c3d4e', 'Client1'),
('CLI0010', 'f1g2h3i4j', 'Client10'),
('CLI0100', 'k1l2m3n4o', 'Client100');

-- --------------------------------------------------------

--
-- Structure de la table `propriete`
--

CREATE TABLE `propriete` (
  `code_location` varchar(7) NOT NULL,
  `surface` decimal(10,0) NOT NULL,
  `nb_piece` int(11) NOT NULL,
  `loyer_mensuel` decimal(10,0) NOT NULL,
  `ville` varchar(56) NOT NULL,
  `code_client_loueur` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `propriete`
--

INSERT INTO `propriete` (`code_location`, `surface`, `nb_piece`, `loyer_mensuel`, `ville`, `code_client_loueur`) VALUES
('LOC0001', '20', 1, '350', 'Ville1', 'CLI0001'),
('LOC0010', '60', 3, '768', 'Ville2', 'CLI0100'),
('LOC0100', '55', 3, '724', 'Ville2', NULL),
('LOC1000', '120', 6, '999', 'Ville1', 'CLI0001');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `loueur`
--
ALTER TABLE `loueur`
  ADD PRIMARY KEY (`code_client`),
  ADD UNIQUE KEY `siren` (`siren`);

--
-- Index pour la table `propriete`
--
ALTER TABLE `propriete`
  ADD PRIMARY KEY (`code_location`),
  ADD KEY `code_client_loueur` (`code_client_loueur`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `propriete`
--
ALTER TABLE `propriete`
  ADD CONSTRAINT `propriete_ibfk_1` FOREIGN KEY (`code_client_loueur`) REFERENCES `loueur` (`code_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
