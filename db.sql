-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour gestion_stock
CREATE DATABASE IF NOT EXISTS `gestion_stock` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gestion_stock`;

-- Listage de la structure de la table gestion_stock. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table gestion_stock.categories : ~5 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Cat A'),
	(2, 'Cat B'),
	(3, 'Cat C'),
	(4, 'Cat D'),
	(5, 'Cat E');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Listage de la structure de la table gestion_stock. fournisseurs
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `sit_geo` varchar(200) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table gestion_stock.fournisseurs : ~5 rows (environ)
/*!40000 ALTER TABLE `fournisseurs` DISABLE KEYS */;
INSERT INTO `fournisseurs` (`id`, `name`, `sit_geo`, `contact`) VALUES
	(1, 'Four A', 'Sit A', '+225 57205115'),
	(2, 'Four B', 'Sit B', '+225 57205114'),
	(3, 'Four C', 'Sit C', '+225 57205114'),
	(4, 'Four D', 'Sit D', '+225 57205114'),
	(5, 'Four E', 'Sit E', '+225 57205114');
/*!40000 ALTER TABLE `fournisseurs` ENABLE KEYS */;

-- Listage de la structure de la table gestion_stock. produits
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `prix` int(11) NOT NULL DEFAULT '0',
  `detail` text,
  `categorie_id` int(11) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_id` (`categorie_id`),
  KEY `fournisseur_id` (`fournisseur_id`),
  CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table gestion_stock.produits : ~10 rows (environ)
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` (`id`, `name`, `prix`, `detail`, `categorie_id`, `fournisseur_id`) VALUES
	(1, 'Produit A', 200, 'bon marchÃ©', 1, 1),
	(2, 'Produit B', 200, 'bon marchÃ©', 2, 5),
	(3, 'Produit C', 200, 'bon marché', 3, 5),
	(4, 'Produit D', 200, 'bon marché', 4, 5),
	(5, 'Produit E', 200, 'bon marché', 5, 5),
	(6, 'Produit A2', 200, 'bon marché', 1, 2),
	(7, 'Produit B2', 200, 'bon marché', 2, 2),
	(8, 'Produit C2', 200, 'bon marché', 3, 2),
	(9, 'Produit D2', 200, 'bon marché', 4, 2),
	(10, 'Produit E2', 200, 'bon marché', 5, 2);
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;

-- Listage de la structure de la table gestion_stock. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Listage des données de la table gestion_stock.users : ~0 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `password`) VALUES
	(1, 'dea', 'ec86376e23b99516bb874a35db8a3cdb6a95987d');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
