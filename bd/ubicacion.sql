-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2015 a las 19:21:45
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ubicacion`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BorrarLocacion`(IN `pid` INT)
    NO SQL
delete from micasa where id = pid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DameLasLocaciones`()
    NO SQL
select * from micasa$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarLocacion`(IN `pcoordenada` VARCHAR(255), IN `pnombre_usuario` VARCHAR(255))
    NO SQL
INSERT INTO micasa (coordenada,nombre_usuario) 
VALUES (pcoordenada,pnombre_usuario)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `micasa`
--

CREATE TABLE IF NOT EXISTS `micasa` (
`id` int(11) NOT NULL,
  `coordenada` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `micasa`
--

INSERT INTO `micasa` (`id`, `coordenada`, `nombre_usuario`) VALUES
(1, 'Avellaneda;Mitre;750', 'jose'),
(8, 'Lanus;Eva Peron;200', 'maria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `foto`) VALUES
(1, 'jose', 'jose20151210183115.jpg'),
(2, 'maria', 'maria20151210190506.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `micasa`
--
ALTER TABLE `micasa`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `micasa`
--
ALTER TABLE `micasa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
