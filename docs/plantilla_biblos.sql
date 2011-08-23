-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-08-2011 a las 13:04:41
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblos_g4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE IF NOT EXISTS `acceso` (
  `usuario_dni` int(10) unsigned NOT NULL,
  `fecha_hora_entrada` datetime NOT NULL,
  `fecha_hora_salida` datetime DEFAULT NULL,
  PRIMARY KEY (`usuario_dni`,`fecha_hora_entrada`),
  KEY `fk_acceso_usuario1` (`usuario_dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `acceso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` smallint(5) unsigned NOT NULL,
  `nombre_autor` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellido1` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido2` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `autor`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dewey`
--

CREATE TABLE IF NOT EXISTS `dewey` (
  `id_categoria_dewey` int(10) unsigned NOT NULL,
  `categoria_dewey` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria_dewey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `dewey`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id_editorial` smallint(5) unsigned NOT NULL,
  `nombre_editorial` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_editorial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `editorial`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE IF NOT EXISTS `plantilla` (
  `idplantilla` tinyint(3) unsigned NOT NULL,
  `nombre_plantilla` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idplantilla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`idplantilla`, `nombre_plantilla`) VALUES
(1, 'plantilla1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` tinyint(3) unsigned NOT NULL,
  `tipo_usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(0, 'administrador'),
(1, 'lector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo`
--

CREATE TABLE IF NOT EXISTS `titulo` (
  `dewey_id_categoria_dewey` int(10) unsigned NOT NULL,
  `id_apellido_autor` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `id_título` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_titulo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `isbn` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_publicacion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_adquisicion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `idioma` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `num_paginas` smallint(5) unsigned DEFAULT NULL,
  `edición` smallint(5) unsigned DEFAULT NULL,
  `autor_id_autor` smallint(5) unsigned NOT NULL,
  `editorial_id_editorial` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`dewey_id_categoria_dewey`,`id_apellido_autor`,`id_título`),
  KEY `fk_titulo_dewey1` (`dewey_id_categoria_dewey`),
  KEY `fk_titulo_autor1` (`autor_id_autor`),
  KEY `fk_titulo_editorial1` (`editorial_id_editorial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `titulo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `dni` int(10) unsigned NOT NULL,
  `nombre_usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellido1_usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellido2_usuario` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `direccion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` int(10) unsigned DEFAULT NULL,
  `plantilla_idplantilla` tinyint(3) unsigned NOT NULL,
  `tipo_usuario_id_tipo_usuario` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_usuario_plantilla` (`plantilla_idplantilla`),
  KEY `fk_usuario_tipo_usuario1` (`tipo_usuario_id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre_usuario`, `apellido1_usuario`, `apellido2_usuario`, `email`, `direccion`, `telefono`, `plantilla_idplantilla`, `tipo_usuario_id_tipo_usuario`) VALUES
(1, 'lector1', 'lector1_apellido1', 'lector1_apellido2', NULL, NULL, NULL, 1, 1),
(2, 'administrador1', 'administrado1_apellido1', NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_titulo`
--

CREATE TABLE IF NOT EXISTS `usuario_has_titulo` (
  `usuario_dni` int(10) unsigned NOT NULL,
  `titulo_dewey_id_categoria_dewey` int(10) unsigned NOT NULL,
  `titulo_id_apellido_autor` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `titulo_id_título` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_hora_prestamo` datetime NOT NULL,
  `fecha_hora_devolucion_propuesta` datetime NOT NULL,
  `fecha_hora_devolucion_efectiva` datetime DEFAULT NULL,
  PRIMARY KEY (`usuario_dni`,`titulo_dewey_id_categoria_dewey`,`titulo_id_apellido_autor`,`titulo_id_título`),
  KEY `fk_usuario_has_titulo_titulo1` (`titulo_dewey_id_categoria_dewey`,`titulo_id_apellido_autor`,`titulo_id_título`),
  KEY `fk_usuario_has_titulo_usuario1` (`usuario_dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `usuario_has_titulo`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_acceso_usuario1` FOREIGN KEY (`usuario_dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD CONSTRAINT `fk_titulo_autor1` FOREIGN KEY (`autor_id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_titulo_dewey1` FOREIGN KEY (`dewey_id_categoria_dewey`) REFERENCES `dewey` (`id_categoria_dewey`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_titulo_editorial1` FOREIGN KEY (`editorial_id_editorial`) REFERENCES `editorial` (`id_editorial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_plantilla` FOREIGN KEY (`plantilla_idplantilla`) REFERENCES `plantilla` (`idplantilla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_titulo`
--
ALTER TABLE `usuario_has_titulo`
  ADD CONSTRAINT `fk_usuario_has_titulo_titulo1` FOREIGN KEY (`titulo_dewey_id_categoria_dewey`, `titulo_id_apellido_autor`, `titulo_id_título`) REFERENCES `titulo` (`dewey_id_categoria_dewey`, `id_apellido_autor`, `id_título`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_titulo_usuario1` FOREIGN KEY (`usuario_dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;
