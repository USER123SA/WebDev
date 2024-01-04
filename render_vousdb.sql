-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Jeudi 11 Mai 2023 à 01:15
-- Version du serveur: 4.1.9
-- Version de PHP: 4.3.10
-- 
-- Base de données: `render_vousdb`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `admin`
-- 

CREATE TABLE `admin` (
  `id` int(11) NOT NULL default '0',
  `nom` varchar(30) NOT NULL default '',
  `email` varchar(40) NOT NULL default '',
  `password` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `admin`
-- 

INSERT INTO `admin` VALUES (1, 'admin', 'admin.pfa2024@gmail.com', 'pfa2024');

-- --------------------------------------------------------

-- 
-- Structure de la table `medecin`
-- 

CREATE TABLE `medecin` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(30) NOT NULL default '',
  `prenom` varchar(30) NOT NULL default '',
  `password` varchar(30) NOT NULL default '',
  `tel` int(8) NOT NULL default '0',
  `email` varchar(50) NOT NULL default '',
  `adress` varchar(50) NOT NULL default '',
  `specialite` varchar(30) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `situation` varchar(255) NOT NULL default '',
  `dateDisp` date NOT NULL default '0000-00-00',
  `heurDisp` varchar(9) NOT NULL default '00:00:00',
  `date_inscription` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Contenu de la table `medecin`
-- 

INSERT INTO `medecin` VALUES (2, 'Abderrahim Ncir', 'ddd', 'ddd', 9999999, 'ncir.abderrahim2021@gmail.com', 'ddd', 'ddd', 'ddd', '', '2023-05-19', '00:00:00', '2023-05-04 00:07:49');
INSERT INTO `medecin` VALUES (4, 'wael', 'mohamed', 'rrazerty', 99874563, 'email2400@gmail.com', '8 rue 7895', '', 'generaliste', '', '2023-05-09', '00:00:00', '');

-- --------------------------------------------------------

-- 
-- Structure de la table `patient`
-- 

CREATE TABLE `patient` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(30) NOT NULL default '',
  `prenom` varchar(30) NOT NULL default '',
  `password` varchar(30) NOT NULL default '',
  `tel` int(8) NOT NULL default '0',
  `email` varchar(50) NOT NULL default '',
  `date_inscription` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Contenu de la table `patient`
-- 

INSERT INTO `patient` VALUES (3, 'ahmed', 'nnfjsdf', 'ff', 1234, 'rrrr@frrf.com', '2023-05-01 23:42:24');
INSERT INTO `patient` VALUES (4, 'firest', 'ok', 'ttt', 4444, 'rrrr@ff.comyy', '2023-05-07 17:41:50');
INSERT INTO `patient` VALUES (5, 'ncir', 'walid', 'azer', 26547896, 'success.99@gmail.com', '2023-05-10 21:13:28');

-- --------------------------------------------------------

-- 
-- Structure de la table `rdv`
-- 

CREATE TABLE `rdv` (
  `idRdv` int(11) NOT NULL auto_increment,
  `idMedecin` int(11) NOT NULL default '0',
  `idPatient` int(11) NOT NULL default '0',
  `date_rdv` date NOT NULL default '0000-00-00',
  `heure_rdv` time NOT NULL default '00:00:00',
  PRIMARY KEY  (`idRdv`,`idMedecin`,`idPatient`),
  KEY `idMedecin` (`idMedecin`),
  KEY `idPatient` (`idPatient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Contenu de la table `rdv`
-- 

INSERT INTO `rdv` VALUES (2, 2, 4, '2023-05-20', '00:00:00');
INSERT INTO `rdv` VALUES (3, 2, 3, '2023-05-15', '01:00:00');
INSERT INTO `rdv` VALUES (5, 2, 5, '2023-05-28', '00:00:00');

-- 
-- Contraintes pour les tables exportées
-- 

-- 
-- Contraintes pour la table `rdv`
-- 
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rdv_ibfk_2` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
