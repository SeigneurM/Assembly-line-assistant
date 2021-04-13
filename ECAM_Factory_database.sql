-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 13 jan. 2021 à 12:09
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `labsession4_seigneur`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `Id` varchar(11) NOT NULL,
  `Type` tinyint(1) NOT NULL,
  `WheelsNb` smallint(4) NOT NULL,
  `BoltsNb` smallint(4) NOT NULL,
  `WashersNb` smallint(4) NOT NULL,
  `Frame` tinyint(1) NOT NULL,
  `WheelColor` smallint(3) NOT NULL,
  `WheelCarrierMobile` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`Id`, `Type`, `WheelsNb`, `BoltsNb`, `WashersNb`, `Frame`, `WheelColor`, `WheelCarrierMobile`) VALUES
('2', 1, 4, 4, 4, 1, 2, 0),
('20', 1, 4, 4, 4, 1, 3, 1),
('4', 1, 4, 4, 4, 1, 2, 1),
('18', 1, 4, 4, 4, 1, 1, 1),
('6', 1, 4, 4, 4, 1, 3, 1),
('16', 1, 4, 4, 4, 1, 1, 1),
('8', 1, 4, 4, 4, 1, 2, 0),
('14', 1, 4, 4, 4, 1, 2, 1),
('10', 1, 4, 4, 4, 1, 1, 0),
('12', 1, 4, 4, 4, 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `flaw`
--

CREATE TABLE `flaw` (
  `flaw_id` int(11) NOT NULL,
  `flaw_type` varchar(32) DEFAULT NULL,
  `severity` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `flaw`
--

INSERT INTO `flaw` (`flaw_id`, `flaw_type`, `severity`) VALUES
(1, 'scratch', 'low'),
(2, 'scratch', 'medium'),
(3, 'scratch', 'high'),
(4, 'painting', 'low'),
(5, 'painting', 'medium'),
(6, 'painting', 'high'),
(7, 'electricity', 'low'),
(8, 'electricity', 'medium'),
(9, 'electricity', 'high'),
(10, 'robustness', 'low'),
(11, 'robustness', 'medium'),
(12, 'robustness', 'high');

-- --------------------------------------------------------

--
-- Structure de la table `flaw_count`
--

CREATE TABLE `flaw_count` (
  `flaw_type` varchar(32) NOT NULL,
  `severity` varchar(32) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `flaw_count`
--

INSERT INTO `flaw_count` (`flaw_type`, `severity`, `count`) VALUES
('scratch', 'low', 2),
('scratch', 'medium', 4),
('scratch', 'high', 0),
('painting', 'low', 3),
('painting', 'medium', 4),
('painting', 'high', 2),
('electricity', 'low', 2),
('electricity', 'medium', 2),
('electricity', 'high', 3),
('robustness', 'low', 0),
('robustness', 'medium', 2),
('robustness', 'high', 4);

-- --------------------------------------------------------

--
-- Structure de la table `induscomputerbox`
--

CREATE TABLE `induscomputerbox` (
  `Id` varchar(11) NOT NULL,
  `Type` tinyint(1) NOT NULL,
  `RelaysNb` smallint(3) NOT NULL,
  `SensorsNb` smallint(6) NOT NULL,
  `Box` tinyint(1) NOT NULL,
  `Raspberry` tinyint(1) NOT NULL,
  `ElectricConnectionCable` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `induscomputerbox`
--

INSERT INTO `induscomputerbox` (`Id`, `Type`, `RelaysNb`, `SensorsNb`, `Box`, `Raspberry`, `ElectricConnectionCable`) VALUES
('1', 0, 2, 4, 1, 1, 1),
('19', 1, 1, 2, 1, 1, 1),
('3', 0, 2, 4, 1, 1, 1),
('17', 1, 1, 1, 1, 1, 1),
('5', 0, 2, 6, 1, 1, 1),
('15', 1, 3, 2, 1, 1, 1),
('7', 0, 2, 4, 1, 1, 1),
('13', 1, 1, 5, 1, 1, 1),
('9', 0, 2, 3, 1, 1, 1),
('11', 1, 2, 5, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ordertable`
--

CREATE TABLE `ordertable` (
  `Id` varchar(11) NOT NULL,
  `OrderTime` int(11) DEFAULT NULL,
  `CompletionTime` int(11) DEFAULT NULL,
  `Status` smallint(3) DEFAULT NULL,
  `ProductNb` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ordertable`
--

INSERT INTO `ordertable` (`Id`, `OrderTime`, `CompletionTime`, `Status`, `ProductNb`) VALUES
('1', 30, 50, 2, 1),
('2', 30, 50, 1, 2),
('3', 30, 50, 3, 2),
('4', 30, 50, 3, 3),
('5', 30, 50, 2, 1),
('6', 30, 50, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Type` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `quality_test`
--

CREATE TABLE `quality_test` (
  `order_id` int(11) NOT NULL,
  `product_type` varchar(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `state` varchar(32) DEFAULT NULL,
  `flaw_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quality_test`
--

INSERT INTO `quality_test` (`order_id`, `product_type`, `product_id`, `state`, `flaw_id`) VALUES
(4, 'cart', 3, 'passed', 1),
(6, 'box', 13, 'failed', 12),
(7, 'cart', 6, 'minor_flaw', 5),
(8, 'box', 7, 'minor_flaw', 8),
(9, 'cart', 9, 'minor_flaw', 11),
(5, 'box', 5, 'failed', 9),
(16, 'cart', 17, 'minor_flaw', 2),
(3, 'cart', 4, 'minor_flaw', 5),
(2, 'box', 2, 'passed', 4);

--
-- Déclencheurs `quality_test`
--
DELIMITER $$
CREATE TRIGGER `update_flaw` AFTER INSERT ON `quality_test` FOR EACH ROW UPDATE `flaw_count`, `flaw`, `quality_test` SET `count`=`count`+1 WHERE `quality_test`.flaw_id = `flaw`.flaw_id AND flaw_count.severity=flaw.severity AND flaw_count.flaw_type=flaw.flaw_type
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `quality_tests_and_flaws`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `quality_tests_and_flaws` (
`flaw_id` int(11)
,`order_id` int(11)
,`product_type` varchar(10)
,`product_id` int(11)
,`state` varchar(32)
,`flaw_type` varchar(32)
,`severity` varchar(32)
);

-- --------------------------------------------------------

--
-- Structure de la vue `quality_tests_and_flaws`
--
DROP TABLE IF EXISTS `quality_tests_and_flaws`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quality_tests_and_flaws`  AS  select `quality_test`.`flaw_id` AS `flaw_id`,`quality_test`.`order_id` AS `order_id`,`quality_test`.`product_type` AS `product_type`,`quality_test`.`product_id` AS `product_id`,`quality_test`.`state` AS `state`,`flaw`.`flaw_type` AS `flaw_type`,`flaw`.`severity` AS `severity` from (`quality_test` join `flaw` on((`quality_test`.`flaw_id` = `flaw`.`flaw_id`))) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `induscomputerbox`
--
ALTER TABLE `induscomputerbox`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
