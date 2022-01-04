-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 jan. 2022 à 09:27
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambres`
--

DROP TABLE IF EXISTS `chambres`;
CREATE TABLE IF NOT EXISTS `chambres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imgcard` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `imgback` varchar(255) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `chambres`
--

INSERT INTO `chambres` (`id`, `imgcard`, `nom`, `imgback`, `price`) VALUES
(1, 'laroyale', 'Chambre Royal', 'laroyale', 250),
(2, 'lapdeluxe', 'Chambre Premium Deluxe', 'lapdeluxe', 175),
(3, 'laexecut', 'Chambre Exécutive', 'laexecut', 125);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(6, 'laroyale', 'sejour dans la suite parental', '2022-01-04 11:00:00', '2022-01-04 14:00:00', 1),
(7, 'lapdeluxe', 'sejour pour nos noces', '2021-12-24 11:00:00', '2021-12-25 19:00:00', 1),
(8, 'laexecut', 'sejour dans la suite parental', '2021-12-16 12:00:00', '2021-12-18 14:00:00', 1),
(9, 'laroyale', 'sejour dans la suite parental', '2021-12-29 12:00:00', '2021-12-31 14:00:00', 1),
(10, 'lapdeluxe', 'tout est gratuit', '2021-12-01 13:27:00', '2021-12-04 13:28:00', 1),
(11, 'laexecut', 'c\'est super genial', '2021-12-17 13:29:00', '2021-12-02 13:29:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `mail`) VALUES
(1, 'Samir-Gonzalez', 'c045c9838ba93fe23b0842c44195bfbd7298d35d', 's@s.s');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
