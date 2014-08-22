-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2014 a las 17:41:29
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `curso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `id_administradores` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_administradores` varchar(20) NOT NULL,
  `password_administrador` varchar(8) NOT NULL,
  PRIMARY KEY (`id_administradores`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_administradores`, `nombre_administradores`, `password_administrador`) VALUES
(1, 'hector', 'hector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE IF NOT EXISTS `entrada` (
  `IDentrada` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(15) NOT NULL,
  `Rut` varchar(10) NOT NULL,
  `Fechaentrada` varchar(20) NOT NULL,
  `Horaentrada` varchar(8) NOT NULL,
  `EntradaSalida` varchar(7) NOT NULL,
  `observa` varchar(150) NOT NULL,
  PRIMARY KEY (`IDentrada`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='entrada trabajadores' AUTO_INCREMENT=73 ;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`IDentrada`, `Nombre`, `Rut`, `Fechaentrada`, `Horaentrada`, `EntradaSalida`, `observa`) VALUES
(42, 'Hector', '1234567813', '27-05-2014', '20:22:30', '', ''),
(43, 'gonzalito', '18393479-1', '27-05-2014', '20:29:40', '', ''),
(71, 'isabela', '17321567-5', '29-05-2014', '09:37:57', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardias`
--

CREATE TABLE IF NOT EXISTS `guardias` (
  `id_guardias` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_guardias` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id_guardias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `guardias`
--

INSERT INTO `guardias` (`id_guardias`, `nombre_guardias`, `password`) VALUES
(1, 'gonzalo', 'gonzalo'),
(3, 'victor', 'victor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE IF NOT EXISTS `salida` (
  `IDsalida` int(10) NOT NULL,
  `Nombre` int(15) NOT NULL,
  `Rut` int(10) NOT NULL,
  `Fechasalida` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
