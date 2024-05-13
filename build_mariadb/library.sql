-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : lun. 13 mai 2024 à 11:33
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
-- Base de données : `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Structure de la table `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL,
  `nominal_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stackable` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gravity` tinyint(1) DEFAULT NULL,
  `transparency` tinyint(1) DEFAULT NULL,
  `luminous` tinyint(1) DEFAULT NULL,
  `loot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `block`
--

INSERT INTO `block` (`id`, `nominal_id`, `name`, `stackable`, `gravity`, `transparency`, `luminous`, `loot`) VALUES
(1, 'dirt', 'Dirt', 'Yes(64)', 0, 0, 0, 'dirt'),
(2, 'grass_block', 'Grass block', 'Yes(64)', 0, 0, 0, 'dirt'),
(3, 'sand', 'Sand', 'Yes(64)', 1, 0, 0, 'sand'),
(4, 'stone', 'Stone', 'Yes(64)', 0, 0, 0, 'cobblestone'),
(6, 'glowstone', 'Glowstone', 'Yes(64)', 0, 0, 1, 'Glowstone powder'),
(9, 'glass', 'Glass', 'Yes(64)', 0, 1, 0, 'Nothing'),
(10, 'bedrock', 'Bedrock', 'Yes(64)', 0, 0, 0, 'Nothing'),
(11, 'magma_block', 'Magma Block', 'Yes(64)', 0, 0, 1, 'Itself'),
(12, 'emerald_ore', 'Emerald Ore', 'Yes(64)', 0, 0, 0, 'Emerald'),
(13, 'ice', 'Ice', 'Yes(64)', 0, 1, 0, 'Nothing'),
(14, 'spawner', 'Monster Spawner', 'No', 0, 0, 0, 'Nothing'),
(16, 'furnace', 'Furnace', 'Yes(64)', 0, 0, 1, 'Itself'),
(17, 'beehive', 'Bee hive', 'Yes(64)', 0, 0, 0, 'Itself'),
(18, 'composter', 'Composter', 'Yes(64)', 0, 0, 0, 'Itself'),
(19, 'campfire', 'Campfire', 'Yes(64)', 0, 0, 1, 'Coal'),
(20, 'sandstone', 'Sandstone', 'Yes(64)', 0, 0, 0, 'Itself'),
(21, 'chiseled_red_sandstone', 'Chiseled red sandstone', 'Yes(64)', 0, 0, 0, 'Itself'),
(22, 'pearlescent_froglight', 'Froglight', 'Yes(64)', 0, 0, 1, 'Itself'),
(23, 'candle', 'Candle', 'Yes(64)', 0, 0, 1, 'Itself'),
(24, 'lava', 'Lava', 'No', 1, 1, 1, 'Nothing'),
(25, 'tube_coral_block', 'Tube Coral', 'Yes(64)', 0, 0, 0, 'Dead coral / Nothing'),
(26, 'lantern', 'Lantern', 'Yes(64)', 0, 0, 1, 'Nothing / Itself'),
(27, 'chest', 'Chest', 'Yes(64)', 0, 0, 0, 'Itself'),
(28, 'enchanting_table', 'Enchantment Table', 'Yes(64)', 0, 0, 1, 'Itself'),
(29, 'bell', 'Bell', 'Yes(64)', 0, 1, 0, 'Itself'),
(30, 'sponge', 'Sponge block', 'Yes(64)', 0, 0, 0, 'Itself'),
(31, 'redstone_lamp', 'Redstone Lamp', 'Yes(64)', 0, 0, 1, 'Itself'),
(32, 'slime_block', 'Slimeblock', 'Yes(64)', 0, 1, 0, 'Itself');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nominal_id` (`nominal_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
