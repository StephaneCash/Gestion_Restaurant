-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 22 sep. 2021 à 10:58
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `nomRepas` varchar(255) NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCommande`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `nomRepas`, `quantite`, `status`) VALUES
(1, ' Fumbwa', '4', '1'),
(10, ' Ngombe ', '1', '1'),
(7, ' Ngombe Na Medesu ', '1', '1'),
(9, ' Hambourger ', '2', '1');

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `idRepas` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `detail` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`idRepas`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`idRepas`, `nom`, `prix`, `detail`, `photo`) VALUES
(1, 'Fumbwa', 256, 'Fumbwa est un meilleur repas sollicitÃ© par un grand nombre de congolais. ', 's953671827754616883_p6_i1_w2048.jpeg'),
(10, 'Pizza', 25, 'Tres bon repas', 'delish-homemade-pizza-horizontal-1542312378.png'),
(11, 'Hambourger', 20, 'Ceci est fait pour les congolais', 'hamburger.jpeg'),
(21, 'Ngombe', 6, 'j', 'maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `idRepas` int(11) DEFAULT NULL,
  `etat` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idRepas` (`idRepas`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `password`, `idRepas`, `etat`, `role`) VALUES
(1, 'Admin', 'Admin', '12345', 1, 1, 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
