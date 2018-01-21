-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 21 Janvier 2018 à 19:07
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_covoit`
--

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `id_trajet` int(255) NOT NULL,
  `id_personne` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `participation`
--

INSERT INTO `participation` (`id_trajet`, `id_personne`) VALUES
(3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `nom` varchar(15) CHARACTER SET ascii NOT NULL,
  `prenoms` varchar(45) CHARACTER SET ascii NOT NULL,
  `mail` varchar(45) CHARACTER SET ascii NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `annee_naissance` int(11) NOT NULL,
  `genre` varchar(10) CHARACTER SET ascii NOT NULL,
  `mdp` varchar(100) CHARACTER SET ascii NOT NULL,
  `avatar` varchar(256) NOT NULL,
  `marque_vehic` varchar(10) CHARACTER SET ascii DEFAULT NULL,
  `modele_vehic` varchar(10) CHARACTER SET ascii DEFAULT NULL,
  `couleur_vehic` varchar(10) CHARACTER SET ascii DEFAULT NULL,
  `categorie_vehic` varchar(10) CHARACTER SET ascii DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`nom`, `prenoms`, `mail`, `telephone`, `annee_naissance`, `genre`, `mdp`, `avatar`, `marque_vehic`, `modele_vehic`, `couleur_vehic`, `categorie_vehic`, `id`) VALUES
('KRAGBE', 'ange', 'angekragbe@gmail.com', '0601770443', 1994, 'Homme', 'ab4f63f9ac65152575886860dde480a1', '5.jpg', NULL, NULL, NULL, NULL, 5),
('mon', 'best', 'angekragb@gmail.com', NULL, 1999, 'Homme', 'ab4f63f9ac65152575886860dde480a1', '', NULL, NULL, NULL, NULL, 6),
('mzmz', 'sks', 'angekrag@gmail.com', NULL, 1996, 'Femme', 'ab4f63f9ac65152575886860dde480a1', '', NULL, NULL, NULL, NULL, 7),
('mzmz', 'sks', 'angekra@gmail.com', '0601770443', 1996, 'Femme', 'ab4f63f9ac65152575886860dde480a1', '', NULL, NULL, NULL, NULL, 8),
('RDFGJHB', 'IHGFTF', 'angeke@gmail.com', '545454', 1998, 'Homme', 'ab4f63f9ac65152575886860dde480a1', '', NULL, NULL, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id_trajet` int(255) NOT NULL,
  `id_personne` int(255) NOT NULL,
  `ville_depart` varchar(50) NOT NULL,
  `ville_arriver` varchar(50) NOT NULL,
  `date_depart` date NOT NULL,
  `date_arriver` date DEFAULT NULL,
  `ville_intermediaire1` varchar(50) DEFAULT NULL,
  `ville_intermediaire2` varchar(50) DEFAULT NULL,
  `ville_intermediaire3` varchar(50) DEFAULT NULL,
  `ville_intermediaire4` varchar(50) DEFAULT NULL,
  `heure_depart` time NOT NULL,
  `heure_arriver` time NOT NULL,
  `tarif` int(10) NOT NULL,
  `nbr_place` int(10) NOT NULL,
  `est_complet` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `trajet`
--

INSERT INTO `trajet` (`id_trajet`, `id_personne`, `ville_depart`, `ville_arriver`, `date_depart`, `date_arriver`, `ville_intermediaire1`, `ville_intermediaire2`, `ville_intermediaire3`, `ville_intermediaire4`, `heure_depart`, `heure_arriver`, `tarif`, `nbr_place`, `est_complet`) VALUES
(1, 5, 'a', 'd', '2017-12-08', NULL, 'b', 'c', NULL, NULL, '12:00:00', '13:00:00', 0, 0, 0),
(2, 5, 'd', 'a', '2017-12-09', NULL, NULL, NULL, 'c', 'b', '13:00:00', '15:00:00', 0, 0, 0),
(3, 5, 'A', 'B', '2017-12-10', NULL, 'F', NULL, NULL, NULL, '23:00:00', '02:06:00', 5, 3, 0),
(4, 5, 'A', 'B', '2017-12-10', NULL, NULL, NULL, NULL, NULL, '20:00:00', '06:00:00', 5, 3, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`id_trajet`,`id_personne`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id_trajet`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id_trajet` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
