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


-- Listage de la structure de la base pour application_dob_contrat
CREATE DATABASE IF NOT EXISTS `application_dob_contrat` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `application_dob_contrat`;

-- Listage de la structure de la table application_dob_contrat. clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  `systeme` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `tel` varchar(200) DEFAULT NULL,
  `fax` varchar(200) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `commercial_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commercial_id` (`commercial_id`),
  CONSTRAINT `contrats_ibfk_1` FOREIGN KEY (`commercial_id`) REFERENCES `commercials` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Listage des données de la table application_dob_contrat.clients : ~6 rows (environ)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `name`, `place`, `systeme`, `email`, `tel`, `fax`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`, `commercial_id`) VALUES
	(1, 'DOUANES', 'Treichville rue 12 avenue crossont 2', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', '2020-11-01', 1, 1, 1, 1),
	(2, 'BNI', 'Treichville rue 12', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', NULL, 1, 1, 1, 1),
	(3, 'BAD', 'Treichville rue 12', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', NULL, 1, 1, 1, 1),
	(4, 'BOLLORE', 'Port bouÃªt Soleil', 'xi 50', 'bollore@mail.com', '09047878', '77201452', '2020-10-31', '2020-11-01', 1, 1, 1, 1),
	(5, 'SOLIBRA', 'Treichville rue 12', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', NULL, 1, 1, 1, 3),
	(6, 'CNPS', 'Treichville rue 12', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', NULL, 1, 1, 1, 3),
	(7, 'TEST', 'Treichville rue 12', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', NULL, 1, 1, 1, 3);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Listage de la structure de la table application_dob_contrat. commercials
CREATE TABLE IF NOT EXISTS `commercials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table application_dob_contrat.commercials : ~2 rows (environ)
/*!40000 ALTER TABLE `commercials` DISABLE KEYS */;
INSERT INTO `commercials` (`id`, `name`, `email`, `tel`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`) VALUES
	(1, 'Commercial TEST1', 'mail1.test@mm.com', '08010203', '2020-10-31', '2020-10-31', 1, 1, 1),
	(2, 'Commercial TEST2', 'mail2.test@mm.com', '08010203', '2020-10-31', '2020-10-31', 1, 1, 1),
	(3, 'Commercial TEST3', 'mail1.test@mm.com', '08010203', '2020-10-31', '2020-11-03', 1, 1, 1);
/*!40000 ALTER TABLE `commercials` ENABLE KEYS */;

-- Listage de la structure de la table application_dob_contrat. contrats
CREATE TABLE IF NOT EXISTS `contrats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montant` int(11) DEFAULT NULL,
  `date_deb` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `date_sign` date DEFAULT NULL,
  `type_cont` varchar(200) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `tablecontrats_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table application_dob_contrat.contrats : ~6 rows (environ)
/*!40000 ALTER TABLE `contrats` DISABLE KEYS */;
INSERT INTO `contrats` (`id`, `montant`, `date_deb`, `date_fin`, `date_sign`, `type_cont`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`, `client_id`) VALUES
	(1, 1000000, '2020-11-01', '2021-11-01', '2020-11-01', 'Deployement', '2020-01-01', '2020-11-01', 1, 1, 1, 3),
	(2, 15000000, '2020-08-14', '2021-08-14', '2020-11-01', 'Maintenance', '2020-11-01', '2020-11-01', 1, 1, 1, 3),
	(3, 5000000, '2020-08-01', '2021-08-01', '2020-11-01', 'Deployement', '2020-07-01', '2020-11-01', 1, 1, 1, 1),
	(4, 34000000, '2020-08-01', '2021-08-01', '2020-11-01', 'maintenance', '2020-07-01', NULL, 1, 1, 1, 1),
	(5, 34000000, '2020-08-01', '2021-08-01', '2020-11-01', 'maintenance', '2020-07-01', NULL, 1, 1, 1, 2),
	(6, 34000000, '2020-08-01', '2021-08-01', '2020-11-01', 'maintenance', '2020-07-01', NULL, 1, 1, 1, 3);
/*!40000 ALTER TABLE `contrats` ENABLE KEYS */;

-- Listage de la structure de la table application_dob_contrat. interventions
CREATE TABLE IF NOT EXISTS `interventions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dte_int` date DEFAULT NULL,
  `rapport_int` text,
  `fiche_int` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `prestataire_id` int(11) DEFAULT NULL,
  `contrat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestataire_id` (`prestataire_id`),
  KEY `contrat_id` (`contrat_id`),
  CONSTRAINT `interventionstable_ibfk_1` FOREIGN KEY (`prestataire_id`) REFERENCES `prestataires` (`id`),
  CONSTRAINT `interventionstable_ibfk_2` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table application_dob_contrat.interventions : ~6 rows (environ)
/*!40000 ALTER TABLE `interventions` DISABLE KEYS */;
INSERT INTO `interventions` (`id`, `dte_int`, `rapport_int`, `fiche_int`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`, `prestataire_id`, `contrat_id`) VALUES
	(1, '2020-11-01', 'Intervention rÃ©alisÃ©e sous la supervision des prestataires externes, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est la route.', 'rpt.text', '2020-11-01', '2020-11-02', NULL, 1, 1, 1, 1),
	(2, '2020-02-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'rpt.text', '2020-02-01', NULL, NULL, 1, 1, 1, 1),
	(3, '2020-03-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'rpt.text', '2020-03-01', NULL, NULL, 1, 1, 1, 2),
	(4, '2020-05-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'rpt.text', '2020-05-01', NULL, NULL, 1, 1, 1, 2),
	(5, '2020-05-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'rpt.text', '2020-05-01', NULL, NULL, 1, 1, 3, 3),
	(6, '2020-08-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'rpt.text', '2020-08-01', NULL, NULL, 1, 1, 3, 3);
/*!40000 ALTER TABLE `interventions` ENABLE KEYS */;

-- Listage de la structure de la table application_dob_contrat. intervention_sans_contrats
CREATE TABLE IF NOT EXISTS `intervention_sans_contrats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dte_int` date DEFAULT NULL,
  `rapport_int` text,
  `fiche_int` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `prestataire_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestataire_id` (`prestataire_id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `interventionstablesss_ibfk_1` FOREIGN KEY (`prestataire_id`) REFERENCES `prestataires` (`id`),
  CONSTRAINT `interventionstablesss_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table application_dob_contrat.intervention_sans_contrats : ~0 rows (environ)
/*!40000 ALTER TABLE `intervention_sans_contrats` DISABLE KEYS */;
/*!40000 ALTER TABLE `intervention_sans_contrats` ENABLE KEYS */;

-- Listage de la structure de la table application_dob_contrat. prestataires
CREATE TABLE IF NOT EXISTS `prestataires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `tel` varchar(200) DEFAULT NULL,
  `fax` varchar(200) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Listage des données de la table application_dob_contrat.prestataires : ~4 rows (environ)
/*!40000 ALTER TABLE `prestataires` DISABLE KEYS */;
INSERT INTO `prestataires` (`id`, `name`, `place`, `email`, `tel`, `fax`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`) VALUES
	(1, 'GLOBAS CS', 'PLATEAU AVENUE XX RUE 21', 'global@mm.com', '77151618', '99151616', '2020-03-01', '2020-11-01', NULL, 1, 1),
	(2, 'VIPINET', 'TREIVILLE AVENUE 15 RUE 13', 'vipinet@mm.com', '77151618', '99151616', '2020-03-01', '2020-11-01', NULL, 1, 1),
	(3, 'HUAWEI', 'PLATEAU AVENUE XX RUE XX', 'prest1.mm.com', '77151618', '99151616', '2020-03-01', NULL, NULL, NULL, 1),
	(4, 'SONY', 'PLATEAU AVENUE XX RUE XX', 'prest1.mm.com', '77151618', '99151616', '2020-03-01', NULL, NULL, NULL, 1),
	(5, 'TEST VALUE01', 'PLATEAU AVENUE XX RUE XX', 'prest1.mm.com', '77151618', '99151616', '2020-03-01', '2020-11-01', NULL, 1, 0);
/*!40000 ALTER TABLE `prestataires` ENABLE KEYS */;

-- Listage de la structure de la table application_dob_contrat. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type_user` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table application_dob_contrat.users : ~0 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `password`, `type_user`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`) VALUES
	(1, 'dea', 'ec86376e23b99516bb874a35db8a3cdb6a95987d', '1', '2020-10-31', '2020-10-31', 1, 1, 0),
	(2, 'luc', '5dc35fa9b5181cf374d77ada02f42716f255ae42', '0', '2020-10-31', '2020-10-31', 1, 1, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
