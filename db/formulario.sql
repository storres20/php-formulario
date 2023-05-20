-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-05-2023 a las 12:25:15
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formulario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anonimo`
--

DROP TABLE IF EXISTS `anonimo`;
CREATE TABLE IF NOT EXISTS `anonimo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `anonimo`
--

INSERT INTO `anonimo` (`id`, `name`, `email`, `message`) VALUES
(1, 'john', 'john@gmail.com', 'hello john'),
(3, 'mike', 'mike@gmail.com', 'hello mike'),
(6, 'lady', 'lady@gmail.com', 'hello lady'),
(7, 'dua', 'dua@gmail.com', 'hello dua'),
(21, 'mickey mouse', 'mickey@gmail.com', 'hello mickey'),
(17, 'john', 'john@gmail.com', 'hello john rambo 2'),
(16, 'rambo', 'rambo@gmail.com', 'hello john rambo'),
(22, 'mickey mouse', 'mickey@gmail.com', 'hello mickey'),
(24, 'pluto', 'pluto@gmail.com', 'hello pluto 222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principal`
--

DROP TABLE IF EXISTS `principal`;
CREATE TABLE IF NOT EXISTS `principal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `principal`
--

INSERT INTO `principal` (`id`, `name`, `email`, `message`) VALUES
(1, 'mario', 'mario@gmail.com', 'hello mario'),
(2, 'tom', 'tom@gmail.com', 'hello tom'),
(3, 'luigi', 'luigi@gmail.com', 'hello luigi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
