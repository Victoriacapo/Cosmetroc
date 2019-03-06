-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 06 mars 2019 à 15:08
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cosmetroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `velo_maincat`
--

DROP TABLE IF EXISTS `velo_maincat`;
CREATE TABLE IF NOT EXISTS `velo_maincat` (
  `maincat_id` int(11) NOT NULL AUTO_INCREMENT,
  `maincat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`maincat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `velo_maincat`
--

INSERT INTO `velo_maincat` (`maincat_id`, `maincat_name`) VALUES
(1, 'Maquillage'),
(2, 'Soin Visage'),
(3, 'Soin Corps');

-- --------------------------------------------------------

--
-- Structure de la table `velo_products`
--

DROP TABLE IF EXISTS `velo_products`;
CREATE TABLE IF NOT EXISTS `velo_products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_name` varchar(100) NOT NULL,
  `products_brand` varchar(100) DEFAULT NULL,
  `products_quantity` int(11) DEFAULT NULL,
  `products_state` varchar(30) NOT NULL,
  `products_capacity` varchar(100) NOT NULL,
  `products_expiration` datetime DEFAULT NULL,
  `products_img` varchar(355) NOT NULL,
  `products_validate` tinyint(1) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `maincat_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`products_id`),
  KEY `velo_products_velo_subcat_FK` (`subcat_id`),
  KEY `velo_products_velo_maincat0_FK` (`maincat_id`),
  KEY `velo_products_velo_users1_FK` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `velo_products`
--

INSERT INTO `velo_products` (`products_id`, `products_name`, `products_brand`, `products_quantity`, `products_state`, `products_capacity`, `products_expiration`, `products_img`, `products_validate`, `subcat_id`, `maincat_id`, `users_id`) VALUES
(14, 'Savon', 'Dove', 1, 'neuf', '200g', '2019-02-28 00:00:00', '../assets/imgProducts/6122727_001.jpg', 1, 9, 3, 33),
(15, 'crème corps', 'Nivea', 1, 'neuf', '200ml', '2019-02-28 00:00:00', '../assets/imgProducts/262862-1.png', 0, 9, 3, 33),
(16, 'gel douche', 'Dop', 1, 'neuf', '250ml', '2019-12-28 00:00:00', '../assets/imgProducts/image1.jpg', 0, 9, 3, 33),
(18, 'gel douche', 'Dop', 1, 'neuf', '200ml', '2019-02-28 00:00:00', '../assets/imgProducts/image3.png', 0, 9, 3, 33),
(19, 'la vie est belle', 'Lancôme', 1, 'neuf', '200ml', '2019-02-28 00:00:00', '../assets/imgProducts/lancome_la_vie_est_belle_creme_corps_la_vie_est_belle_creme_corps_200ml_500x500.jpg', 0, 9, 3, 33),
(23, 'deodorant', 'Dove', 1, 'neuf', '50ml', '2019-02-28 00:00:00', '../assets/imgProducts/dove_deodorant_femme_bille_original_zero.png', 0, 9, 3, 33),
(24, 'Fond de teint', 'L\'Oréal', 3, 'neuf', '50ml', '2019-06-22 00:00:00', '../assets/imgProducts/fonddeteintL\'oréal.jpg', 0, 1, 1, 36),
(25, 'Lait Réhydratant Peaux Normales à Sèches', 'Yves Rocher', 2, 'testé', '150ml', '2019-09-20 00:00:00', '../assets/imgProducts/crèmeVisage YvesRocher.jpg', 1, 5, 2, 36);

-- --------------------------------------------------------

--
-- Structure de la table `velo_subcat`
--

DROP TABLE IF EXISTS `velo_subcat`;
CREATE TABLE IF NOT EXISTS `velo_subcat` (
  `subcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_name` varchar(100) NOT NULL,
  `maincat_id` int(11) NOT NULL,
  PRIMARY KEY (`subcat_id`),
  KEY `velo_subcat_velo_maincat_FK` (`maincat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `velo_subcat`
--

INSERT INTO `velo_subcat` (`subcat_id`, `subcat_name`, `maincat_id`) VALUES
(1, 'Teint', 1),
(2, 'Yeux', 1),
(3, 'Lèvres', 1),
(4, 'Nettoyant/Démaquillant', 2),
(5, 'Crème', 2),
(6, 'Masque/Gommage', 2),
(7, 'Crème/huile', 3),
(8, 'Masque/Gommage', 3),
(9, 'Hygiène/Bain', 3);

-- --------------------------------------------------------

--
-- Structure de la table `velo_users`
--

DROP TABLE IF EXISTS `velo_users`;
CREATE TABLE IF NOT EXISTS `velo_users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_gender` varchar(5) NOT NULL,
  `users_lastname` char(50) DEFAULT NULL,
  `users_firstname` varchar(50) DEFAULT NULL,
  `users_address` varchar(300) DEFAULT NULL,
  `users_city` varchar(100) DEFAULT NULL,
  `users_CP` varchar(5) DEFAULT NULL,
  `users_email` varchar(100) NOT NULL,
  `users_phone` varchar(10) DEFAULT NULL,
  `users_pseudo` varchar(15) NOT NULL,
  `users_password` varchar(300) NOT NULL,
  `users_authorised` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `velo_users`
--

INSERT INTO `velo_users` (`users_id`, `users_gender`, `users_lastname`, `users_firstname`, `users_address`, `users_city`, `users_CP`, `users_email`, `users_phone`, `users_pseudo`, `users_password`, `users_authorised`) VALUES
(33, 'MME', 'Bogart', 'Vicky', '3 rue des cerisiers', 'le Havre', '76600', 'bogart@gmail.com', '0145784547', 'vick34', '$2y$10$s3.L0hzw2nTvpUwbELCPKuCOmtGibTViZ/FKaTlGqQOcXq2DIs.c6', NULL),
(34, 'MR', 'Trouvetou', 'Hugo', '4 rue des Pellegrin', 'le Havre', '76600', 'hugo@gmail.com', '0145487542', 'hugo', '$2y$10$jg2xtz9AdulscOjTmXATIuH9VvFlxT6.8kqLhaYqkY4JqzDS9Rfv2', NULL),
(36, 'MME', 'Victoria', 'Capo', '4 rue Michel Dubosc', 'le Havre', '76600', 'vyctorya972@hotmail.com', '0761427548', 'victoria972', '$2y$10$iBLnXfyj2nqiJDlOtdfAmOgnX.1BIm2nifpAmVPbxeKBIp4SGq1M.', 1),
(37, 'MR', NULL, NULL, NULL, NULL, NULL, 'Anousone@gmail.com', NULL, 'Anousone', '$2y$10$S.kHvG7EJy572/yBibGHr.af8Lh6/Ix93THvyt0gHAF0/LId0u5Um', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `velo_products`
--
ALTER TABLE `velo_products`
  ADD CONSTRAINT `velo_products_velo_maincat0_FK` FOREIGN KEY (`maincat_id`) REFERENCES `velo_maincat` (`maincat_id`),
  ADD CONSTRAINT `velo_products_velo_subcat_FK` FOREIGN KEY (`subcat_id`) REFERENCES `velo_subcat` (`subcat_id`),
  ADD CONSTRAINT `velo_products_velo_users1_FK` FOREIGN KEY (`users_id`) REFERENCES `velo_users` (`users_id`);

--
-- Contraintes pour la table `velo_subcat`
--
ALTER TABLE `velo_subcat`
  ADD CONSTRAINT `velo_subcat_velo_maincat_FK` FOREIGN KEY (`maincat_id`) REFERENCES `velo_maincat` (`maincat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
