-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 01 Janvier 2014 à 16:38
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `rendusymfony2`
--
CREATE DATABASE IF NOT EXISTS `rendusymfony2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rendusymfony2`;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'admin', 'admin', 'admin@live.fr', 'admin@live.fr', 1, 'osnxuk1d9sgcow0g4o4wkkk8ogws8oo', 'gVULqzmOs9qW1D5l9O1uajdym7P4IC1QmXS93vJWY5GFVhNqlKBEA0q6ZDKJi+G/DnMmCtKlVAFsjgMvO+wlQA==', '2013-12-31 13:32:38', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL),
(2, 'poney', 'poney', 'poney@live.fr', 'poney@live.fr', 1, 'hkeyri90y54c40cswokg8kg8gosk4cw', 'COVDocC9tdtHhIgV1nX9YnMy2g2glBMAjqvup4rhk0Zswgy1cxxm68rv+YDYptBAr5fvDE7fH5e/C/7KKX3gLA==', '2013-12-31 11:58:34', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(3, 'loutre', 'loutre', 'loutre@live.fr', 'loutre@live.fr', 1, 'm5ue6g34uio0o04ok4sgowc80ok004k', 'v8TgGx8MbGLPoWqJgaGErUWKR6Do6YO0ehA70RnBUsS6YrGI/O1fHrVSdW1hAFGV65kICU3CvZ9x9czSmhdzxw==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `file_name`, `content`) VALUES
(4, 'Photo0174.jpg', 'aaaaaaaa'),
(5, 'Photo0174.jpg', 'bbbbbbbbb'),
(6, 'Photo0174.jpg', 'zzzzzzzzzzzzzzz');

-- --------------------------------------------------------

--
-- Structure de la table `product_user`
--

CREATE TABLE IF NOT EXISTS `product_user` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`user_id`),
  KEY `IDX_7BF4E84584665A` (`product_id`),
  KEY `IDX_7BF4E8A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `product_user`
--

INSERT INTO `product_user` (`product_id`, `user_id`) VALUES
(4, 2),
(5, 3),
(6, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `product_user`
--
ALTER TABLE `product_user`
  ADD CONSTRAINT `FK_7BF4E84584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7BF4E8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
