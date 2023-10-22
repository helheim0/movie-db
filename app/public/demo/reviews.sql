-- Adminer 4.8.1 MySQL 8.0.16 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `movieId` int(6) NOT NULL,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `review` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `reviews` (`id`, `movieId`, `name`, `email`, `review`) VALUES
(4,	9,	'yes',	'helgu77@yahoo.com',	'ddd'),
(5,	9,	'yes',	'helgu77@yahoo.com',	'fhggf');

-- 2023-10-20 16:57:03
