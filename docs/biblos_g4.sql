-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-08-2011 a las 13:34:38
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `biblos_g4`
--
CREATE DATABASE `biblos_g4` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `biblos_g4`;

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
  `id_autor` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_autor` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellido1` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido2` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre_autor`, `apellido1`, `apellido2`) VALUES
(1, 'Ernest', 'Hemingway', NULL),
(2, 'Julio', 'Verne', NULL),
(3, 'Ken', 'Follett', NULL),
(4, 'Dan', 'Brown', NULL),
(5, 'William', 'Shakespeare', NULL),
(6, 'Johannes', 'HIRSCHBERGER', NULL),
(7, 'Jesús', 'Romero ', 'Moñivas'),
(8, 'Nalini ', 'Singh', NULL),
(9, 'Ange', 'Guéro', NULL),
(10, 'CARLOS', 'RUIZ ', ' ZAFON');

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

INSERT INTO `dewey` (`id_categoria_dewey`, `categoria_dewey`) VALUES
(0, ' Obras Generales'),
(100, ' Filosofía'),
(200, ' Religión'),
(300, ' Ciencias Sociales'),
(400, ' Lingüística'),
(500, ' Ciencias Puras'),
(600, ' Ciencias Aplicadas'),
(700, 'Artes y Recreación'),
(800, 'Literatura'),
(900, 'Historia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id_editorial` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_editorial` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_editorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre_editorial`) VALUES
(1, 'Charles Scribner''s Sons'),
(2, 'Planeta'),
(3, 'PLAZA $ JANES'),
(4, 'umbriel'),
(5, 'Vision Libros'),
(6, 'Herder'),
(7, 'Editorial Verbo Divino'),
(8, 'DeBolsillo');

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
  `id_titulo` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_titulo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `isbn` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_publicacion` year(4) DEFAULT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `idioma` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `num_paginas` smallint(5) unsigned DEFAULT NULL,
  `edición` smallint(5) unsigned DEFAULT NULL,
  `autor_id_autor` smallint(5) unsigned NOT NULL,
  `editorial_id_editorial` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`dewey_id_categoria_dewey`,`id_apellido_autor`,`id_titulo`),
  KEY `fk_titulo_dewey1` (`dewey_id_categoria_dewey`),
  KEY `fk_titulo_autor1` (`autor_id_autor`),
  KEY `fk_titulo_editorial1` (`editorial_id_editorial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `titulo`
--

INSERT INTO `titulo` (`dewey_id_categoria_dewey`, `id_apellido_autor`, `id_titulo`, `nombre_titulo`, `isbn`, `fecha_publicacion`, `fecha_adquisicion`, `idioma`, `num_paginas`, `edición`, `autor_id_autor`, `editorial_id_editorial`) VALUES
(100, 'HIR', 'BRE', 'Breve historia de la filosofía', '978-84-254-0120-6', 2004, NULL, 'español', NULL, 1, 6, 6),
(200, 'FOL', 'LOS', 'Los pilares de la tierra', '978-84-9759-290-1', 2003, NULL, 'español', NULL, 1, 3, 3),
(500, 'ROM', 'DEL', 'De las ciencias a la teología', '9788499451916', 2011, NULL, 'español', NULL, 1, 7, 7),
(800, 'BRO', 'ANG', 'Angeles y demonios', '978-84-95618-71-9', 2004, NULL, 'español', NULL, 1, 4, 4),
(800, 'GUE', 'LAA', 'La amenaza del desierta', '978-84-9908-960-7', 2011, NULL, 'español', NULL, 1, 9, 8),
(800, 'HEM', 'ELV', 'El viejo y el mar', '978-0-684-80122-3', 1952, NULL, 'español', NULL, 1, 1, 1),
(800, 'RUI', 'ELJ', 'El juego del angel', '9788408081180 ', 2008, NULL, 'español', NULL, 1, 10, 2),
(800, 'SIN', 'ELA', 'El ángel caído', '978-84-9908-889-1', 2011, NULL, 'español', NULL, 1, 8, 8),
(900, 'SHA', 'ROM', 'Romeo y Julieta', '9788497704243', 0000, NULL, 'español', NULL, 5, 5, 5),
(900, 'VER', 'VIA', 'Viaje al centro de la tierra', '9788466705707', 1954, NULL, 'español', NULL, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `dni` int(10) unsigned NOT NULL,
  `clave` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
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

INSERT INTO `usuario` (`dni`, `clave`, `nombre_usuario`, `apellido1_usuario`, `apellido2_usuario`, `email`, `direccion`, `telefono`, `plantilla_idplantilla`, `tipo_usuario_id_tipo_usuario`) VALUES
(1, '1', 'lector1', 'lector1_apellido1', 'lector1_apellido2', NULL, NULL, NULL, 1, 1),
(2, '2', 'administrador1', 'administrado1_apellido1', NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_titulo`
--

CREATE TABLE IF NOT EXISTS `usuario_has_titulo` (
  `usuario_dni` int(10) unsigned NOT NULL,
  `titulo_dewey_id_categoria_dewey` int(10) unsigned NOT NULL,
  `titulo_id_apellido_autor` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `titulo_id_titulo` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_hora_prestamo` datetime NOT NULL,
  `fecha_hora_devolucion_propuesta` datetime NOT NULL,
  `fecha_hora_devolucion_efectiva` datetime DEFAULT NULL,
  PRIMARY KEY (`usuario_dni`,`titulo_dewey_id_categoria_dewey`,`titulo_id_apellido_autor`,`titulo_id_titulo`),
  KEY `fk_usuario_has_titulo_titulo1` (`titulo_dewey_id_categoria_dewey`,`titulo_id_apellido_autor`,`titulo_id_titulo`),
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
  ADD CONSTRAINT `fk_usuario_has_titulo_titulo1` FOREIGN KEY (`titulo_dewey_id_categoria_dewey`, `titulo_id_apellido_autor`, `titulo_id_titulo`) REFERENCES `titulo` (`dewey_id_categoria_dewey`, `id_apellido_autor`, `id_titulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_titulo_usuario1` FOREIGN KEY (`usuario_dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;
