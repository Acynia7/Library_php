-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : lun. 13 mai 2024 à 11:38
-- Version du serveur : 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- Version de PHP : 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `login`, `password`) VALUES
(57, 'test', '$2y$10$eO3RE6.ggyMrRxto3fJO5OTSgcYRGmRMXahPar3paD8ks1ZhTxvrW'),
(59, 'evalenti', '$2y$10$jhwU3qQeE.fd/AzolnoPIevPCgLpBEzOecXiOchldDlSS4vmV0hRC'),
(60, 'root', '$2y$10$Sz9HwJX2/PSasO3l/DshBeK.2w9ZaElwbpPlDEn2IbqnvBGqpMoDm'),
(62, 'eval&é\"\'(-è_çà<?\\\";--', '$2y$10$r6WEuYpTCZmgj8xV.tXrP.qxGUiX1cl.dCjOFcn4cs3NSB/X5mecy'),
(64, 'abcde', '$2y$10$3Fr9S7xS/HXijmtmCYkRbOK8Zz6dwLPmXIOslfC/Lu.VGywQKvIYK'),
(66, 'emilie', '$2y$10$K7Ix84eBk9qYz95hnLI94.pxP2.FQC4jVg47eFwcMgC459XoyPCYi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
