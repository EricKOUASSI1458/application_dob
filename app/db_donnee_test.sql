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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Listage des données de la table application_dob_contrat.clients : ~10 rows (environ)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `name`, `place`, `systeme`, `email`, `tel`, `fax`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`, `commercial_id`) VALUES
	(1, 'DOUANES', 'Treichville rue 12 avenue crossont 2', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', '2020-11-01', 1, 1, 1, 1),
	(2, 'BNI', 'Treichville rue 12', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', NULL, 1, 1, 1, 1),
	(3, 'BAD', 'Treichville rue 12', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', NULL, 1, 1, 1, 1),
	(4, 'BOLLORE', 'Port bouÃªt Soleil', 'xi 50', 'bollore@mail.com', '09047878', '77201452', '2020-10-31', '2020-11-01', 1, 1, 1, 1),
	(5, 'SOLIBRA', 'Treichville rue 12', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', NULL, 1, 1, 1, 3),
	(6, 'CNPS', 'Treichville rue 12', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', '2020-11-28', 1, 1, 1, 3),
	(7, 'TEST', 'Treichville rue 12', 'xi 50', 'douane@mail.com', '09047878', '08074545', '2020-10-31', NULL, 1, 1, 1, 3),
	(9, 'test customer', 'even ', 'produitr', 'hfut', 'hdj', '7585855', '2020-11-22', '2020-11-24', 1, 1, 1, NULL),
	(10, 'MOVIS', 'II PLATEAU ANGRE', 'X50', 'support@movis.com', '57202223', '58754879', '2020-11-28', NULL, 1, 1, 1, 4),
	(11, 'OLAM', 'RIVERA II', 'IPBX', 'support@olam.com', '21222425', '08082323', '2020-11-28', NULL, 1, NULL, 1, 4);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Listage des données de la table application_dob_contrat.commercials : ~5 rows (environ)
/*!40000 ALTER TABLE `commercials` DISABLE KEYS */;
INSERT INTO `commercials` (`id`, `name`, `email`, `tel`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`) VALUES
	(1, 'Commercial TEST1', 'mail1.test@mm.com', '08010203', '2020-10-31', '2020-11-22', 1, 1, 1),
	(2, 'Commercial TEST2', 'mail2.test@mm.com', '08010203', '2020-10-31', '2020-10-31', 1, 1, 1),
	(3, 'Commercial TEST3', 'mail1.test@mm.com', '08010203', '2020-10-31', '2020-11-03', 1, 1, 1),
	(4, 'salym saha', 'salym.saha@orange.com', '47285114', '2020-11-22', '2020-11-22', 1, 1, 1),
	(5, 'bravet kouassi', 'bravet.kouassi@orange.com', '57205121', '2020-11-22', '2020-11-22', 1, 1, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Listage des données de la table application_dob_contrat.contrats : ~12 rows (environ)
/*!40000 ALTER TABLE `contrats` DISABLE KEYS */;
INSERT INTO `contrats` (`id`, `montant`, `date_deb`, `date_fin`, `date_sign`, `type_cont`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`, `client_id`) VALUES
	(1, 1000000, '2020-11-01', '2021-11-01', '2020-11-01', 'Deployement', '2020-01-01', '2020-11-01', 1, 1, 1, 3),
	(2, 15000000, '2020-08-14', '2021-08-14', '2020-11-01', 'Maintenance', '2020-11-01', '2020-11-01', 1, 1, 1, 3),
	(3, 5000000, '2020-08-01', '2021-08-01', '2020-11-01', 'Deployement', '2020-07-01', '2020-11-01', 1, 1, 1, 1),
	(4, 34000000, '2020-08-01', '2021-08-01', '2020-11-01', 'maintenance', '2020-07-01', NULL, 1, 1, 1, 1),
	(5, 34000000, '2020-08-01', '2021-08-01', '2020-11-01', 'maintenance', '2020-07-01', NULL, 1, 1, 1, 2),
	(6, 34000000, '2020-08-01', '2021-08-01', '2020-11-01', 'maintenance', '2020-07-01', NULL, 1, 1, 1, 3),
	(7, 50000000, '2020-11-17', '2020-10-30', '2020-11-10', 'Maintenance', '2020-11-24', '2020-11-26', 1, 1, 1, 1),
	(12, 9600000, '2015-11-08', '2020-11-03', '2020-11-04', 'Deployement', '2020-11-26', '2020-11-28', 1, 1, 1, 9),
	(16, 13000000, '2020-01-29', '2021-01-29', '2020-11-28', 'Deployement', '2020-11-28', '2020-12-03', 1, 1, 1, 2),
	(17, 700000, '2020-11-14', '2021-11-14', '2020-11-28', 'Maintenance', '2020-11-28', '2020-12-09', 1, 1, 1, 4),
	(18, 100000, '2020-11-02', '2021-11-02', '2020-11-30', 'Deployement', '2020-11-30', '2020-11-30', 1, 1, 1, 2),
	(19, 78000, '2020-11-08', '1970-01-01', '2020-11-30', 'Deployement', '2020-11-30', NULL, 1, NULL, 1, 1),
	(22, 500000, '2020-11-30', '2021-11-30', '2020-11-30', 'Deployement', '2020-11-30', NULL, 1, NULL, 1, 5),
	(23, NULL, '2019-12-30', '2020-12-30', '2020-12-03', 'Deployement', '2020-12-03', '2020-12-03', 1, 1, 1, 10),
	(24, NULL, '2013-12-03', '2014-12-03', '2020-12-03', 'Maintenance', '2020-12-03', NULL, 1, NULL, 1, 10);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table application_dob_contrat.interventions : ~11 rows (environ)
/*!40000 ALTER TABLE `interventions` DISABLE KEYS */;
INSERT INTO `interventions` (`id`, `dte_int`, `rapport_int`, `fiche_int`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`, `prestataire_id`, `contrat_id`) VALUES
	(1, '2020-11-01', 'Intervention rÃ©alisÃ©e sous la supervision des prestataires externes, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est la route.', 'rpt.text', '2020-11-01', '2020-11-02', NULL, 1, 1, 1, 1),
	(2, '2021-02-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'rpt.text', '2020-02-01', '2020-12-01', NULL, 1, 1, 1, 1),
	(3, '2020-03-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'rpt.text', '2020-03-01', NULL, NULL, 1, 1, 1, 2),
	(4, '2020-05-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'rpt.text', '2020-05-01', NULL, NULL, 1, 1, 1, 2),
	(5, '2020-05-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'rpt.text', '2020-05-01', NULL, NULL, 1, 1, 3, 3),
	(6, '2020-08-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'rpt.text', '2020-08-01', NULL, NULL, 1, 1, 3, 3),
	(7, '2021-11-30', 'rediger un rapport buscuit', NULL, '2020-11-24', '2020-12-01', 1, 1, 1, 1, 6),
	(9, '2020-12-24', 'go after new step', NULL, '2020-11-24', '2020-12-01', 1, 1, 1, 4, 3),
	(10, '2020-12-09', 'un diamnche', NULL, '2020-12-02', NULL, 1, NULL, 1, 2, 18),
	(11, '2021-12-01', 'dimanche++++', NULL, '2020-12-02', '2020-12-02', 1, 1, 1, 1, 1),
	(12, '2012-12-09', 'belle lurÃ¨ne', '1', '2020-12-02', NULL, 1, NULL, 1, 1, 6),
	(13, '2020-12-06', 'mercredi +++++++++', '/laragon/www/application_dob/uploads/_2020-12-02_20200209_131959.jpg', '2020-12-02', NULL, 1, NULL, 1, 4, 17);
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
  `montant` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestataire_id` (`prestataire_id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `interventionstablesss_ibfk_1` FOREIGN KEY (`prestataire_id`) REFERENCES `prestataires` (`id`),
  CONSTRAINT `interventionstablesss_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table application_dob_contrat.intervention_sans_contrats : ~6 rows (environ)
/*!40000 ALTER TABLE `intervention_sans_contrats` DISABLE KEYS */;
INSERT INTO `intervention_sans_contrats` (`id`, `dte_int`, `rapport_int`, `fiche_int`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`, `prestataire_id`, `client_id`, `montant`) VALUES
	(1, '2020-11-29', 'une bellle intervention sans contrats. rÃ©alisÃ© un jour de pluie avec cinq collaborateur de VIPNET', NULL, '2020-11-28', '2020-11-29', 1, 1, 1, 2, 4, 1000000),
	(2, '2018-10-28', 'plus ............... smc', NULL, '2020-11-28', '2020-11-29', 1, 1, 1, 4, 4, 150000000),
	(3, '2020-11-28', ',kl,k', NULL, '2020-11-28', NULL, 1, 1, 1, 3, 5, 8000000000000),
	(4, '2020-11-29', 'test rap test ok', NULL, '2020-11-28', NULL, 1, 1, 1, 2, 5, NULL),
	(5, '2020-10-29', 'rap', NULL, '2020-11-28', NULL, 1, 1, 1, 4, 5, 35014587),
	(6, '2020-11-15', 'rapidement allons vite prÃ©cipitamment, shap ', NULL, '2020-11-28', NULL, 1, NULL, 1, 1, 5, 12000000);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Listage des données de la table application_dob_contrat.prestataires : ~6 rows (environ)
/*!40000 ALTER TABLE `prestataires` DISABLE KEYS */;
INSERT INTO `prestataires` (`id`, `name`, `place`, `email`, `tel`, `fax`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`) VALUES
	(1, 'GLOBAS CS', 'PLATEAU AVENUE XX RUE 21', 'global@mm.com', '77151618', '99151616', '2020-03-01', '2020-11-28', NULL, 1, 1),
	(2, 'VIPINET', 'TREIVILLE AVENUE 15 RUE 13', 'vipinet@mm.com', '77151618', '99151616', '2020-03-01', '2020-11-28', NULL, 1, 1),
	(3, 'HUAWEI', 'PLATEAU AVENUE XX RUE XX', 'prest1.mm.com', '77151618', '99151616', '2020-03-01', NULL, NULL, 1, 1),
	(4, 'SONY', 'PLATEAU AVENUE XX RUE XX', 'prest1.mm.com', '77151618', '99151616', '2020-03-01', NULL, NULL, 1, 1),
	(5, 'TEST VALUE01', 'PLATEAU AVENUE XX RUE XX', 'prest1.mm.com', '77151618', '99151616', '2020-03-01', '2020-11-01', NULL, 1, 1),
	(6, 'CODIVAL', 'YOPOUGON', 'support@codival.com', '5822292624', '58754879', '2020-11-28', '2020-11-28', 1, 1, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table application_dob_contrat.users : ~4 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `password`, `type_user`, `created_at`, `updated_at`, `created_by`, `updated_by`, `statut`) VALUES
	(1, 'Eliot DEA', 'ec86376e23b99516bb874a35db8a3cdb6a95987d', '1', '2020-10-31', '2020-12-15', 1, 1, 1),
	(2, 'luc kouadio', '5dc35fa9b5181cf374d77ada02f42716f255ae42', '0', '2020-10-31', '2020-12-13', 1, 1, 1),
	(3, 'Doudou', '55a73756274e3ce4da81120960d1739dbc8d9a92', '1', '2020-10-31', '2020-12-13', 1, 3, 1),
	(4, 'sekou', 'cef2a3bdd0bd7b7bd2a95158a0e4fe9e56fba7ba', '0', '2020-11-07', '2020-12-13', 1, 1, 1),
	(5, 'PHINEAS', '016f504936aaf0995494f7afb10ad1fc8d7efeff', '0', '2020-12-13', '2020-12-13', 4, 4, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
