-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2018 a las 16:48:18
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aulas_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_asig_comision`
--

CREATE TABLE `agenda_asig_comision` (
  `ID` int(11) NOT NULL,
  `ID_AULA` int(11) NOT NULL,
  `ID_COMISION` int(11) NOT NULL,
  `ID_DIA` int(11) NOT NULL,
  `PERIODO_LECTIVO` varchar(6) NOT NULL,
  `ID_HORA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_asig_horas`
--

CREATE TABLE `agenda_asig_horas` (
  `ID` int(11) NOT NULL,
  `ID_HORA` int(11) NOT NULL,
  `ID_DIA` int(11) NOT NULL,
  `ID_AULA` int(11) NOT NULL,
  `ID_USER_ASIGNA` int(11) NOT NULL,
  `ID_USER_RECIBE` int(11) NOT NULL,
  `COMISION_ASIGNADA` tinyint(1) NOT NULL DEFAULT '0',
  `PERIODO_LECTIVO` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `ID_EDIFICIO` int(11) NOT NULL,
  `PISO` int(11) DEFAULT NULL,
  `CAPACIDAD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`ID`, `NOMBRE`, `ID_EDIFICIO`, `PISO`, `CAPACIDAD`) VALUES
(1, 'aula', 1, 0, 23),
(2, 'aula', 1, 0, 0),
(3, 'aula', 1, 1, 34),
(4, 'aula', 2, 0, 33),
(5, 'aula', 3, 1, 12),
(6, 'aula', 2, 1, 23),
(7, 'aula', 4, 1, 12),
(8, 'aula', 1, 2, 12),
(9, 'aula', 5, 0, 33),
(10, 'aula', 4, 1, 33),
(11, 'aula', 1, 1, 34),
(12, 'aula', 3, 2, 12),
(13, 'aula', 4, 1, 23),
(14, 'aula', 2, 0, 34),
(15, 'aula', 5, 0, 34),
(16, 'aula', 1, 1, 23),
(17, 'aula', 2, 1, 23),
(18, 'aula', 2, 0, 12),
(19, 'aula', 4, 2, 12),
(20, 'aula', 3, 0, 34),
(21, 'aula', 1, 2, 12),
(22, 'aula', 2, 2, 40),
(23, 'aula', 5, 1, 23),
(24, 'aula', 4, 34, 12),
(25, 'aula', 1, 0, 23),
(26, 'aula', 1, 0, 0),
(27, 'aula', 1, 1, 34),
(28, 'aula', 2, 0, 33),
(29, 'aula', 3, 1, 12),
(30, 'aula', 2, 1, 23),
(31, 'aula', 4, 1, 12),
(32, 'aula', 1, 2, 12),
(33, 'aula', 5, 0, 33),
(34, 'aula', 4, 1, 33),
(35, 'aula', 1, 1, 34),
(36, 'aula', 3, 2, 12),
(37, 'aula', 4, 1, 23),
(38, 'aula', 2, 0, 34),
(39, 'aula', 5, 0, 34),
(40, 'aula', 1, 1, 23),
(41, 'aula', 2, 1, 23),
(42, 'aula', 2, 0, 12),
(43, 'aula', 4, 2, 12),
(44, 'aula', 3, 0, 34),
(45, 'aula', 1, 2, 12),
(46, 'aula', 2, 2, 40),
(47, 'aula', 5, 1, 23),
(48, 'aula', 4, 34, 12),
(49, 'aula', 1, 0, 23),
(50, 'aula', 1, 0, 0),
(51, 'aula', 1, 1, 34),
(52, 'aula', 2, 0, 33),
(53, 'aula', 3, 1, 12),
(54, 'aula', 2, 1, 23),
(55, 'aula', 4, 1, 12),
(56, 'aula', 1, 2, 12),
(57, 'aula', 5, 0, 33),
(58, 'aula', 4, 1, 33),
(59, 'aula', 1, 1, 34),
(60, 'aula', 3, 2, 12),
(61, 'aula', 4, 1, 23),
(62, 'aula', 2, 0, 34),
(63, 'aula', 5, 0, 34),
(64, 'aula', 1, 1, 23),
(65, 'aula', 2, 1, 23),
(66, 'aula', 2, 0, 12),
(67, 'aula', 4, 2, 12),
(68, 'aula', 3, 0, 34),
(69, 'aula', 1, 2, 12),
(70, 'aula', 2, 2, 40),
(71, 'aula', 5, 1, 23),
(72, 'aula', 4, 34, 12),
(73, 'aula', 1, 0, 23),
(74, 'aula', 1, 0, 0),
(75, 'aula', 1, 1, 34),
(76, 'aula', 2, 0, 33),
(77, 'aula', 3, 1, 12),
(78, 'aula', 2, 1, 23),
(79, 'aula', 4, 1, 12),
(80, 'aula', 1, 2, 12),
(81, 'aula', 5, 0, 33),
(82, 'aula', 4, 1, 33),
(83, 'aula', 1, 1, 34),
(84, 'aula', 3, 2, 12),
(85, 'aula', 4, 1, 23),
(86, 'aula', 2, 0, 34),
(87, 'aula', 5, 0, 34),
(88, 'aula', 1, 1, 23),
(89, 'aula', 2, 1, 23),
(90, 'aula', 2, 0, 12),
(91, 'aula', 4, 2, 12),
(92, 'aula', 3, 0, 34),
(93, 'aula', 1, 2, 12),
(94, 'aula', 2, 2, 40),
(95, 'aula', 5, 1, 23),
(96, 'aula', 4, 34, 12),
(97, 'aula 4', 1, 1, 25),
(98, '20', 1, 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula_recurso`
--

CREATE TABLE `aula_recurso` (
  `ID_RECURSO` int(11) NOT NULL,
  `ID_AULA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aula_recurso`
--

INSERT INTO `aula_recurso` (`ID_RECURSO`, `ID_AULA`) VALUES
(1, 1),
(1, 2),
(1, 6),
(1, 10),
(1, 13),
(1, 16),
(1, 24),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 12),
(2, 14),
(2, 15),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(3, 3),
(3, 5),
(3, 11),
(3, 15),
(3, 21),
(4, 1),
(4, 3),
(4, 4),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 21),
(4, 22),
(4, 23),
(4, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `ID` int(11) NOT NULL,
  `ID_INSTITUTO` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`ID`, `ID_INSTITUTO`, `NOMBRE`) VALUES
(1, 1, 'INFORMATICA'),
(2, 1, 'ELECTROMECANICA'),
(3, 3, 'MEDICINA'),
(4, 4, 'PSICOLOGIA'),
(5, 4, 'LICENECIATURA EN LETRAS'),
(6, 4, 'HISTORIA'),
(7, 1, 'INFORMATICA'),
(8, 1, 'ELECTROMECANICA'),
(9, 2, 'MEDICINA'),
(10, 4, 'PSICOLOGIA'),
(11, 4, 'LICENECIATURA EN LETRAS'),
(12, 4, 'HISTORIA'),
(13, 1, 'INFORMATICA'),
(14, 1, 'ELECTROMECANICA'),
(15, 2, 'MEDICINA'),
(16, 4, 'PSICOLOGIA'),
(17, 4, 'LICENECIATURA EN LETRAS'),
(18, 4, 'HISTORIA'),
(19, 1, 'INFORMATICA'),
(20, 1, 'ELECTROMECANICA'),
(21, 3, 'MEDICINA'),
(22, 4, 'PSICOLOGIA'),
(23, 4, 'LICENECIATURA EN LETRAS'),
(24, 4, 'HISTORIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_materia`
--

CREATE TABLE `carrera_materia` (
  `ID_MATERIA` int(11) NOT NULL,
  `ID_CARRERA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera_materia`
--

INSERT INTO `carrera_materia` (`ID_MATERIA`, `ID_CARRERA`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(4, 4),
(5, 4),
(6, 5),
(6, 6),
(7, 1),
(8, 3),
(9, 2),
(10, 1),
(10, 2),
(11, 3),
(11, 5),
(12, 4),
(12, 5),
(13, 1),
(13, 2),
(14, 1),
(14, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE `comision` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `ID_MATERIA` int(11) NOT NULL,
  `CARGA_HORARIA_SEMANAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`ID`, `NOMBRE`, `ID_MATERIA`, `CARGA_HORARIA_SEMANAL`) VALUES
(1, 'Com x Materia 1', 1, 9),
(2, 'Com x Materia 2', 2, 9),
(3, 'Com x Materia 3', 3, 6),
(4, 'Com x Materia 4', 4, 6),
(5, 'Com x Materia 7', 7, 4),
(6, 'Com x Materia 8', 8, 9),
(7, 'Com x Materia 9', 9, 8),
(8, 'Com x Materia 10', 10, 9),
(9, 'Com x Materia 11', 11, 4),
(10, 'Com x Materia 12', 12, 5),
(11, 'Com x Materia 13', 13, 9),
(12, 'Com x Materia 14', 14, 6),
(13, 'Com x Materia 1', 1, 9),
(14, 'Com x Materia 2', 2, 9),
(15, 'Com x Materia 3', 3, 6),
(16, 'Com x Materia 4', 4, 6),
(17, 'Com x Materia 7', 7, 4),
(18, 'Com x Materia 8', 8, 9),
(19, 'Com x Materia 9', 9, 8),
(20, 'Com x Materia 10', 10, 9),
(21, 'Com x Materia 11', 11, 4),
(22, 'Com x Materia 12', 12, 5),
(23, 'Com x Materia 13', 13, 9),
(24, 'Com x Materia 14', 14, 6),
(25, 'Com x Materia 1', 1, 9),
(26, 'Com x Materia 2', 2, 9),
(27, 'Com x Materia 3', 3, 6),
(28, 'Com x Materia 4', 4, 6),
(29, 'Com x Materia 7', 7, 4),
(30, 'Com x Materia 8', 8, 9),
(31, 'Com x Materia 9', 9, 8),
(32, 'Com x Materia 10', 10, 9),
(33, 'Com x Materia 11', 11, 4),
(34, 'Com x Materia 12', 12, 5),
(35, 'Com x Materia 13', 13, 9),
(36, 'Com x Materia 14', 14, 6),
(37, 'Com x Materia 1', 1, 9),
(38, 'Com x Materia 2', 2, 9),
(39, 'Com x Materia 3', 3, 6),
(40, 'Com x Materia 4', 4, 6),
(41, 'Com x Materia 7', 7, 4),
(42, 'Com x Materia 8', 8, 9),
(43, 'Com x Materia 9', 9, 8),
(44, 'Com x Materia 10', 10, 9),
(45, 'Com x Materia 11', 11, 4),
(46, 'Com x Materia 12', 12, 5),
(47, 'Com x Materia 13', 13, 9),
(48, 'Com x Materia 14', 14, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_semana`
--

CREATE TABLE `dia_semana` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(10) DEFAULT NULL,
  `NOM_ABREV` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dia_semana`
--

INSERT INTO `dia_semana` (`ID`, `NOMBRE`, `NOM_ABREV`) VALUES
(1, 'LUNES', 'LUN'),
(2, 'MARTES', 'MAR'),
(3, 'MIERCOLES', 'MIER'),
(4, 'JUEVES', 'JUE'),
(5, 'VIERNES', 'VIE'),
(6, 'SABADO', 'SAB'),
(7, 'DOMINGO', 'DOM'),
(8, 'LUNES', 'LUN'),
(9, 'MARTES', 'MAR'),
(10, 'MIERCOLES', 'MIER'),
(11, 'JUEVES', 'JUE'),
(12, 'VIERNES', 'VIE'),
(13, 'SABADO', 'SAB'),
(14, 'DOMINGO', 'DOM'),
(15, 'LUNES', 'LUN'),
(16, 'MARTES', 'MAR'),
(17, 'MIERCOLES', 'MIER'),
(18, 'JUEVES', 'JUE'),
(19, 'VIERNES', 'VIE'),
(20, 'SABADO', 'SAB'),
(21, 'DOMINGO', 'DOM'),
(22, 'LUNES', 'LUN'),
(23, 'MARTES', 'MAR'),
(24, 'MIERCOLES', 'MIER'),
(25, 'JUEVES', 'JUE'),
(26, 'VIERNES', 'VIE'),
(27, 'SABADO', 'SAB'),
(28, 'DOMINGO', 'DOM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `ID` int(11) NOT NULL,
  `ID_SEDE` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `CANTIDAD_AULAS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `edificio`
--

INSERT INTO `edificio` (`ID`, `ID_SEDE`, `NOMBRE`, `CANTIDAD_AULAS`) VALUES
(1, 1, 'UNICO', 3),
(2, 2, 'SAVIO', 7),
(3, 5, 'FRIULI', 4),
(4, 3, 'LA FEA', 9),
(5, 4, 'UN NOMBRE', NULL),
(6, 4, 'OTRO NOMBRE', NULL),
(7, 1, 'UNICO', 3),
(8, 2, 'SAVIO', 7),
(9, 5, 'FRIULI', 4),
(10, 3, 'LA FEA', 9),
(11, 4, 'UN NOMBRE', NULL),
(12, 4, 'OTRO NOMBRE', NULL),
(13, 1, 'UNICO', 3),
(14, 2, 'SAVIO', 7),
(15, 5, 'FRIULI', 4),
(16, 3, 'LA FEA', 9),
(17, 4, 'UN NOMBRE', NULL),
(18, 4, 'OTRO NOMBRE', NULL),
(19, 1, 'UNICO', 3),
(20, 2, 'SAVIO', 7),
(21, 5, 'FRIULI', 4),
(22, 3, 'LA FEA', 9),
(23, 4, 'UN NOMBRE', NULL),
(24, 4, 'OTRO NOMBRE', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_calendar`
--

CREATE TABLE `evento_calendar` (
  `ID` int(11) NOT NULL,
  `ID_Aula` int(100) DEFAULT NULL,
  `ID_Restri` int(11) DEFAULT NULL,
  `ID_Comision` int(11) NOT NULL,
  `ID_Hora` int(11) DEFAULT NULL,
  `ID_User_Asigna` int(11) NOT NULL,
  `ID_Dia` int(11) DEFAULT NULL,
  `Fecha_ini` date NOT NULL,
  `Hora_ini` int(11) DEFAULT NULL,
  `Hora_fin` int(11) DEFAULT NULL,
  `title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento_calendar`
--

INSERT INTO `evento_calendar` (`ID`, `ID_Aula`, `ID_Restri`, `ID_Comision`, `ID_Hora`, `ID_User_Asigna`, `ID_Dia`, `Fecha_ini`, `Hora_ini`, `Hora_fin`, `title`) VALUES
(8, NULL, NULL, 1, NULL, 1, NULL, '2018-06-07', 1, 5, 'sdsdsd'),
(9, NULL, NULL, 1, NULL, 1, NULL, '2018-06-13', 1, 6, 'sddfd'),
(10, NULL, NULL, 1, NULL, 3, NULL, '2018-08-27', NULL, NULL, 'Com x Materia 1'),
(11, NULL, NULL, 1, NULL, 3, NULL, '2018-08-30', NULL, NULL, 'Com x Materia 1'),
(12, NULL, NULL, 9, NULL, 3, NULL, '2018-09-05', NULL, NULL, 'Com x Materia 11'),
(13, NULL, NULL, 6, NULL, 3, NULL, '2018-10-05', NULL, NULL, 'Com x Materia 8'),
(14, NULL, NULL, 6, NULL, 3, NULL, '2018-08-29', NULL, NULL, 'Com x Materia 8'),
(15, NULL, NULL, 6, NULL, 4, NULL, '2018-10-05', NULL, NULL, 'Com x Materia 8'),
(16, NULL, NULL, 9, NULL, 4, NULL, '2018-10-05', 7, 7, 'Com x Materia 11'),
(17, NULL, NULL, 6, NULL, 4, NULL, '2018-10-05', 1, 1, 'Com x Materia 8'),
(18, NULL, NULL, 9, NULL, 4, NULL, '2018-10-05', 26, 26, 'Com x Materia 11'),
(21, NULL, NULL, 9, NULL, 4, NULL, '2018-10-06', 8, 11, 'Com x Materia 11'),
(24, NULL, NULL, 6, NULL, 4, NULL, '2018-10-06', 2, 7, 'Com x Materia 8'),
(25, NULL, NULL, 6, NULL, 4, NULL, '2018-10-06', 13, 17, 'Com x Materia 8'),
(26, NULL, NULL, 9, NULL, 4, NULL, '2018-10-06', 28, 13, 'Com x Materia 11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora`
--

CREATE TABLE `hora` (
  `ID` int(11) NOT NULL,
  `HORA` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hora`
--

INSERT INTO `hora` (`ID`, `HORA`) VALUES
(1, '07:00:00'),
(2, '08:00:00'),
(3, '08:00:00'),
(4, '09:00:00'),
(5, '10:00:00'),
(6, '11:00:00'),
(7, '12:00:00'),
(8, '13:00:00'),
(9, '14:00:00'),
(10, '15:00:00'),
(11, '16:00:00'),
(12, '17:00:00'),
(13, '18:00:00'),
(14, '19:00:00'),
(15, '20:00:00'),
(16, '21:00:00'),
(17, '22:00:00'),
(18, '23:00:00'),
(19, '07:30:00'),
(20, '08:30:00'),
(21, '09:30:00'),
(22, '10:30:00'),
(23, '11:30:00'),
(24, '12:30:00'),
(25, '13:30:00'),
(26, '14:30:00'),
(27, '15:30:00'),
(28, '16:30:00'),
(29, '17:30:00'),
(30, '18:30:00'),
(31, '19:30:00'),
(32, '20:30:00'),
(33, '21:30:00'),
(34, '07:00:00'),
(35, '08:00:00'),
(36, '08:00:00'),
(37, '09:00:00'),
(38, '10:00:00'),
(39, '11:00:00'),
(40, '12:00:00'),
(41, '13:00:00'),
(42, '14:00:00'),
(43, '15:00:00'),
(44, '16:00:00'),
(45, '17:00:00'),
(46, '18:00:00'),
(47, '19:00:00'),
(48, '20:00:00'),
(49, '21:00:00'),
(50, '22:00:00'),
(51, '23:00:00'),
(52, '07:00:00'),
(53, '08:00:00'),
(54, '08:00:00'),
(55, '09:00:00'),
(56, '10:00:00'),
(57, '11:00:00'),
(58, '12:00:00'),
(59, '13:00:00'),
(60, '14:00:00'),
(61, '15:00:00'),
(62, '16:00:00'),
(63, '17:00:00'),
(64, '18:00:00'),
(65, '19:00:00'),
(66, '20:00:00'),
(67, '21:00:00'),
(68, '22:00:00'),
(69, '23:00:00'),
(70, '07:00:00'),
(71, '08:00:00'),
(72, '08:00:00'),
(73, '09:00:00'),
(74, '10:00:00'),
(75, '11:00:00'),
(76, '12:00:00'),
(77, '13:00:00'),
(78, '14:00:00'),
(79, '15:00:00'),
(80, '16:00:00'),
(81, '17:00:00'),
(82, '18:00:00'),
(83, '19:00:00'),
(84, '20:00:00'),
(85, '21:00:00'),
(86, '22:00:00'),
(87, '23:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_educativa`
--

CREATE TABLE `institucion_educativa` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `institucion_educativa`
--

INSERT INTO `institucion_educativa` (`ID`, `NOMBRE`) VALUES
(1, 'UNAJ'),
(2, 'Unqui'),
(3, 'UNAJ'),
(4, 'Unqui'),
(5, 'UNAJ'),
(6, 'Unqui'),
(7, 'UNAJ'),
(8, 'Unqui');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituto`
--

CREATE TABLE `instituto` (
  `ID` int(11) NOT NULL,
  `ID_INSTITUCION` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `COLOR_HEXA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instituto`
--

INSERT INTO `instituto` (`ID`, `ID_INSTITUCION`, `NOMBRE`, `COLOR_HEXA`) VALUES
(1, 1, 'INGENIERIA', '#a63322'),
(2, 1, 'SOCIALES', '#283A8A'),
(3, 2, 'SALUD', '0#8ab03f'),
(4, 2, 'sociales', '0'),
(5, 1, 'INGENIRIA', ''),
(6, 1, 'SOCIALES', ''),
(7, 2, 'SALUD', ''),
(8, 2, 'sociales', ''),
(9, 1, 'INGENIRIA', ''),
(10, 1, 'SOCIALES', ''),
(11, 2, 'SALUD', ''),
(12, 2, 'sociales', ''),
(13, 1, 'INGENIRIA', ''),
(14, 1, 'SOCIALES', ''),
(15, 2, 'SALUD', ''),
(16, 2, 'sociales', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `DESC_CORTA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID`, `NOMBRE`, `DESC_CORTA`) VALUES
(1, 'MATEMATICA', ''),
(2, 'FISICA', ''),
(3, 'FUNDAMENTOS EN INFORMATICA', ''),
(4, 'INTRODUCCION A LA PSICOLOGIA', ''),
(5, 'COMO GANAR EL LOTO', ''),
(6, 'HISTORIA ARGENTINA', ''),
(7, 'SEGURIDAD EN INFORMATICA', ''),
(8, 'BIOLOGIA', ''),
(9, 'MATERIALES', ''),
(10, 'ANALISIS MATEMATICO', ''),
(11, 'LENGUA', ''),
(12, 'INGLES', ''),
(13, 'FISICA 2', ''),
(14, 'PROBABILIDAD Y ESTADISTICAS', ''),
(15, 'MATEMATICA', 'MAT'),
(16, 'FISICA', 'FIS'),
(17, 'FUNDAMENTOS EN INFORMATICA', 'FunInf'),
(18, 'INTRODUCCION A LA PSICOLOGIA', 'InPsico'),
(19, 'COMO GANAR EL LOTO', 'HOW TO WIN LOTO'),
(20, 'HISTORIA ARGENTINA', 'PHA'),
(21, 'SEGURIDAD EN INFORMATICA', 'SEGINF'),
(22, 'BIOLOGIA', 'BIO'),
(23, 'MATERIALES', 'MATER'),
(24, 'ANALISIS MATEMATICO', 'ANMAT'),
(25, 'LENGUA', 'LEN'),
(26, 'INGLES', 'ING'),
(27, 'FISICA 2', 'FIS2'),
(28, 'PROBABILIDAD Y ESTADISTICAS', 'PROBYEST'),
(29, 'MATEMATICA', 'MAT'),
(30, 'FISICA', 'FIS'),
(31, 'FUNDAMENTOS EN INFORMATICA', 'FunInf'),
(32, 'INTRODUCCION A LA PSICOLOGIA', 'InPsico'),
(33, 'COMO GANAR EL LOTO', 'HOW TO WIN LOTO'),
(34, 'HISTORIA ARGENTINA', 'PHA'),
(35, 'SEGURIDAD EN INFORMATICA', 'SEGINF'),
(36, 'BIOLOGIA', 'BIO'),
(37, 'MATERIALES', 'MATER'),
(38, 'ANALISIS MATEMATICO', 'ANMAT'),
(39, 'LENGUA', 'LEN'),
(40, 'INGLES', 'ING'),
(41, 'FISICA 2', 'FIS2'),
(42, 'PROBABILIDAD Y ESTADISTICAS', 'PROBYEST'),
(43, 'MATEMATICA', 'MAT'),
(44, 'FISICA', 'FIS'),
(45, 'FUNDAMENTOS EN INFORMATICA', 'FunInf'),
(46, 'INTRODUCCION A LA PSICOLOGIA', 'InPsico'),
(47, 'COMO GANAR EL LOTO', 'HOW TO WIN LOTO'),
(48, 'HISTORIA ARGENTINA', 'PHA'),
(49, 'SEGURIDAD EN INFORMATICA', 'SEGINF'),
(50, 'BIOLOGIA', 'BIO'),
(51, 'MATERIALES', 'MATER'),
(52, 'ANALISIS MATEMATICO', 'ANMAT'),
(53, 'LENGUA', 'LEN'),
(54, 'INGLES', 'ING'),
(55, 'FISICA 2', 'FIS2'),
(56, 'PROBABILIDAD Y ESTADISTICAS', 'PROBYEST');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `ID` int(11) NOT NULL,
  `ID_USER_EMISOR` int(11) NOT NULL,
  `ID_USER_RECEPTOR` int(11) NOT NULL,
  `NOTIFICACION` varchar(300) DEFAULT NULL,
  `FECHA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `DESCRIPCION` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`ID`, `NOMBRE`, `DESCRIPCION`) VALUES
(1, 'computarizada', 'tiene computadoras'),
(2, 'aire acondicionado', 'si tenes frio tira aire caliente, si tenes calor aire frio. '),
(3, 'laboratorio quimico', 'todo lo que necesita un quimico'),
(4, 'proyector', 'viste un cine?, bueno algo asi pero en un aula'),
(5, 'computarizada', 'tiene computadoras'),
(6, 'aire acondicionado', 'si tenes frio tira aire caliente, si tenes calor aire frio. '),
(7, 'laboratorio quimico', 'todo lo que necesita un quimico'),
(8, 'proyector', 'viste un cine?, bueno algo asi pero en un aula'),
(9, 'computarizada', 'tiene computadoras'),
(10, 'aire acondicionado', 'si tenes frio tira aire caliente, si tenes calor aire frio. '),
(11, 'laboratorio quimico', 'todo lo que necesita un quimico'),
(12, 'proyector', 'viste un cine?, bueno algo asi pero en un aula'),
(13, 'computarizada', 'tiene computadoras'),
(14, 'aire acondicionado', 'si tenes frio tira aire caliente, si tenes calor aire frio. '),
(15, 'laboratorio quimico', 'todo lo que necesita un quimico'),
(16, 'proyector', 'viste un cine?, bueno algo asi pero en un aula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restri_calendar`
--

CREATE TABLE `restri_calendar` (
  `ID` int(11) NOT NULL,
  `ID_Aula` int(11) NOT NULL,
  `ID_Instituto_Recibe` int(11) NOT NULL,
  `ID_Tipo_Repeticion` int(11) NOT NULL,
  `ID_User_Recibe` int(11) NOT NULL,
  `Fecha_ini` date NOT NULL,
  `Hora_ini` int(100) NOT NULL,
  `Hora_fin` int(100) NOT NULL,
  `Periodo_Academico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restri_calendar`
--

INSERT INTO `restri_calendar` (`ID`, `ID_Aula`, `ID_Instituto_Recibe`, `ID_Tipo_Repeticion`, `ID_User_Recibe`, `Fecha_ini`, `Hora_ini`, `Hora_fin`, `Periodo_Academico`) VALUES
(1, 1, 1, 2, 1, '2018-06-13', 1, 7, ''),
(2, 3, 1, 1, 1, '2018-06-29', 1, 7, '2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `ID` int(11) NOT NULL,
  `ID_INSTITUCION` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CALLEYNUM` varchar(100) NOT NULL,
  `LOCALIDAD` varchar(50) NOT NULL,
  `DISPONIBLE_DESDE` time NOT NULL,
  `DISPONIBLE_HASTA` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`ID`, `ID_INSTITUCION`, `NOMBRE`, `CALLEYNUM`, `LOCALIDAD`, `DISPONIBLE_DESDE`, `DISPONIBLE_HASTA`) VALUES
(1, 1, 'HEC', 'calle 222 n 1223', 'florencio varela', '08:00:00', '22:00:00'),
(2, 1, 'UNICA', 'calle falsa 123', 'FLORENCIO VARELA', '08:00:00', '22:00:00'),
(3, 2, 'SEDE 1', 'calle 21 num 12323', 'quilmes', '08:00:00', '22:00:00'),
(4, 2, 'SEDE 2', 'c 3 num 345', 'quilmes', '08:00:00', '22:00:00'),
(5, 1, 'berasategui', 'calle 334 num 345', 'berasategui', '08:00:00', '22:00:00'),
(6, 1, 'HEC', 'calle 222 n 1223', 'florencio varela', '08:00:00', '22:00:00'),
(7, 1, 'UNICA', 'calle falsa 123', 'FLORENCIO VARELA', '08:00:00', '22:00:00'),
(8, 2, 'SEDE 1', 'calle 21 num 12323', 'quilmes', '08:00:00', '22:00:00'),
(9, 2, 'SEDE 2', 'c 3 num 345', 'quilmes', '08:00:00', '22:00:00'),
(10, 1, 'berasategui', 'calle 334 num 345', 'berasategui', '08:00:00', '22:00:00'),
(11, 1, 'HEC', 'calle 222 n 1223', 'florencio varela', '08:00:00', '22:00:00'),
(12, 1, 'UNICA', 'calle falsa 123', 'FLORENCIO VARELA', '08:00:00', '22:00:00'),
(13, 2, 'SEDE 1', 'calle 21 num 12323', 'quilmes', '08:00:00', '22:00:00'),
(14, 2, 'SEDE 2', 'c 3 num 345', 'quilmes', '08:00:00', '22:00:00'),
(15, 1, 'berasategui', 'calle 334 num 345', 'berasategui', '08:00:00', '22:00:00'),
(16, 1, 'HEC', 'calle 222 n 1223', 'florencio varela', '08:00:00', '22:00:00'),
(17, 1, 'UNICA', 'calle falsa 123', 'FLORENCIO VARELA', '08:00:00', '22:00:00'),
(18, 2, 'SEDE 1', 'calle 21 num 12323', 'quilmes', '08:00:00', '22:00:00'),
(19, 2, 'SEDE 2', 'c 3 num 345', 'quilmes', '08:00:00', '22:00:00'),
(20, 1, 'berasategui', 'calle 334 num 345', 'berasategui', '08:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_repeticion`
--

CREATE TABLE `tipo_repeticion` (
  `ID` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_repeticion`
--

INSERT INTO `tipo_repeticion` (`ID`, `Tipo`) VALUES
(1, 'semana'),
(2, 'cuatrimestral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `ID` int(11) NOT NULL,
  `HORA_DESDE` time NOT NULL,
  `HORA_HASTA` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`ID`, `HORA_DESDE`, `HORA_HASTA`) VALUES
(1, '08:00:00', '12:00:00'),
(2, '12:00:00', '18:00:00'),
(3, '18:00:00', '22:00:00'),
(4, '08:00:00', '12:00:00'),
(5, '12:00:00', '18:00:00'),
(6, '18:00:00', '22:00:00'),
(7, '08:00:00', '12:00:00'),
(8, '12:00:00', '18:00:00'),
(9, '18:00:00', '22:00:00'),
(10, '08:00:00', '12:00:00'),
(11, '12:00:00', '18:00:00'),
(12, '18:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(250) NOT NULL,
  `authKey` varchar(250) NOT NULL,
  `accessToken` varchar(250) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  `idInstituto` int(11) DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT '10',
  `verification_code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`, `activate`, `idInstituto`, `rol`, `verification_code`) VALUES
(1, 'defaultUser', 'pds2018unaj@gmail.com', 'maM50xBabOXqs', 'e9ff4f229f0673c2213d6648d70df9de787d156f06b59021d48a464ad50d485578beff315c0f8857ca1f04b1a8921e8340e501a98439227d9b9134ca32e526302f5d9ba63be580b3eb2563971bad523a65b89280161a16846f8e4de6487c8372a276de93', '714eff2fe0c3a0edc98440bef3f25cf1390c597d6c4e577d4f442fbfe14dfd86888465c97d76f009d7c9984333e1534f355405ff63bc17420d1cf5de7a4db4c99fec9006c3fa8953e598c9059630729e4ec2f50f44d38969c079fb7c816134896c7ba5c2', 1, 1, 20, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda_asig_comision`
--
ALTER TABLE `agenda_asig_comision`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_AULA` (`ID_AULA`),
  ADD KEY `ID_COMISION` (`ID_COMISION`),
  ADD KEY `ID_HORA` (`ID_HORA`),
  ADD KEY `ID_DIA` (`ID_DIA`);

--
-- Indices de la tabla `agenda_asig_horas`
--
ALTER TABLE `agenda_asig_horas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_HORA` (`ID_HORA`),
  ADD KEY `ID_DIA` (`ID_DIA`),
  ADD KEY `ID_AULA` (`ID_AULA`),
  ADD KEY `ID_USER_ASIGNA` (`ID_USER_ASIGNA`),
  ADD KEY `ID_USER_RECIBE` (`ID_USER_RECIBE`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_EDIFICIO` (`ID_EDIFICIO`);

--
-- Indices de la tabla `aula_recurso`
--
ALTER TABLE `aula_recurso`
  ADD PRIMARY KEY (`ID_RECURSO`,`ID_AULA`),
  ADD KEY `ID_AULA` (`ID_AULA`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_INSTITUTO` (`ID_INSTITUTO`);

--
-- Indices de la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  ADD PRIMARY KEY (`ID_MATERIA`,`ID_CARRERA`),
  ADD KEY `ID_CARRERA` (`ID_CARRERA`);

--
-- Indices de la tabla `comision`
--
ALTER TABLE `comision`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_MATERIA` (`ID_MATERIA`);

--
-- Indices de la tabla `dia_semana`
--
ALTER TABLE `dia_semana`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_SEDE` (`ID_SEDE`);

--
-- Indices de la tabla `evento_calendar`
--
ALTER TABLE `evento_calendar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Restri` (`ID_Restri`),
  ADD KEY `ID_Comision` (`ID_Comision`),
  ADD KEY `ID_Hora` (`ID_Hora`),
  ADD KEY `ID_User_Asigna` (`ID_User_Asigna`),
  ADD KEY `ID_Dia` (`ID_Dia`),
  ADD KEY `Hora_fin` (`Hora_fin`),
  ADD KEY `Hora_ini` (`Hora_ini`),
  ADD KEY `ID_Aula` (`ID_Aula`);

--
-- Indices de la tabla `hora`
--
ALTER TABLE `hora`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `institucion_educativa`
--
ALTER TABLE `institucion_educativa`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `instituto`
--
ALTER TABLE `instituto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_INSTITUCION` (`ID_INSTITUCION`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_USER_EMISOR` (`ID_USER_EMISOR`),
  ADD KEY `ID_USER_RECEPTOR` (`ID_USER_RECEPTOR`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `restri_calendar`
--
ALTER TABLE `restri_calendar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Aula` (`ID_Aula`),
  ADD KEY `ID_Instituto_Recibe` (`ID_Instituto_Recibe`),
  ADD KEY `ID_Tipo_Repeticion` (`ID_Tipo_Repeticion`),
  ADD KEY `ID_User_Recibe` (`ID_User_Recibe`),
  ADD KEY `Hora_fin` (`Hora_fin`),
  ADD KEY `Hora_ini` (`Hora_ini`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_INSTITUCION` (`ID_INSTITUCION`);

--
-- Indices de la tabla `tipo_repeticion`
--
ALTER TABLE `tipo_repeticion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idInstituto` (`idInstituto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda_asig_comision`
--
ALTER TABLE `agenda_asig_comision`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `agenda_asig_horas`
--
ALTER TABLE `agenda_asig_horas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `comision`
--
ALTER TABLE `comision`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `dia_semana`
--
ALTER TABLE `dia_semana`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `evento_calendar`
--
ALTER TABLE `evento_calendar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `hora`
--
ALTER TABLE `hora`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `institucion_educativa`
--
ALTER TABLE `institucion_educativa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `instituto`
--
ALTER TABLE `instituto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `restri_calendar`
--
ALTER TABLE `restri_calendar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tipo_repeticion`
--
ALTER TABLE `tipo_repeticion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda_asig_comision`
--
ALTER TABLE `agenda_asig_comision`
  ADD CONSTRAINT `agenda_asig_comision_ibfk_1` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID`),
  ADD CONSTRAINT `agenda_asig_comision_ibfk_2` FOREIGN KEY (`ID_COMISION`) REFERENCES `comision` (`ID`),
  ADD CONSTRAINT `agenda_asig_comision_ibfk_3` FOREIGN KEY (`ID_HORA`) REFERENCES `hora` (`ID`),
  ADD CONSTRAINT `agenda_asig_comision_ibfk_4` FOREIGN KEY (`ID_DIA`) REFERENCES `dia_semana` (`ID`);

--
-- Filtros para la tabla `agenda_asig_horas`
--
ALTER TABLE `agenda_asig_horas`
  ADD CONSTRAINT `agenda_asig_horas_ibfk_1` FOREIGN KEY (`ID_HORA`) REFERENCES `hora` (`ID`),
  ADD CONSTRAINT `agenda_asig_horas_ibfk_2` FOREIGN KEY (`ID_DIA`) REFERENCES `dia_semana` (`ID`),
  ADD CONSTRAINT `agenda_asig_horas_ibfk_3` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID`),
  ADD CONSTRAINT `agenda_asig_horas_ibfk_4` FOREIGN KEY (`ID_USER_ASIGNA`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `agenda_asig_horas_ibfk_5` FOREIGN KEY (`ID_USER_RECIBE`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`ID_EDIFICIO`) REFERENCES `edificio` (`ID`);

--
-- Filtros para la tabla `aula_recurso`
--
ALTER TABLE `aula_recurso`
  ADD CONSTRAINT `aula_recurso_ibfk_1` FOREIGN KEY (`ID_RECURSO`) REFERENCES `recurso` (`ID`),
  ADD CONSTRAINT `aula_recurso_ibfk_2` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID`);

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `carrera_ibfk_1` FOREIGN KEY (`ID_INSTITUTO`) REFERENCES `instituto` (`ID`);

--
-- Filtros para la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  ADD CONSTRAINT `carrera_materia_ibfk_1` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materia` (`ID`),
  ADD CONSTRAINT `carrera_materia_ibfk_2` FOREIGN KEY (`ID_CARRERA`) REFERENCES `carrera` (`ID`);

--
-- Filtros para la tabla `comision`
--
ALTER TABLE `comision`
  ADD CONSTRAINT `comision_ibfk_1` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materia` (`ID`);

--
-- Filtros para la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD CONSTRAINT `edificio_ibfk_1` FOREIGN KEY (`ID_SEDE`) REFERENCES `sede` (`ID`);

--
-- Filtros para la tabla `evento_calendar`
--
ALTER TABLE `evento_calendar`
  ADD CONSTRAINT `evento_calendar_ibfk_1` FOREIGN KEY (`ID_Restri`) REFERENCES `restri_calendar` (`ID`),
  ADD CONSTRAINT `evento_calendar_ibfk_2` FOREIGN KEY (`ID_Comision`) REFERENCES `comision` (`ID`),
  ADD CONSTRAINT `evento_calendar_ibfk_3` FOREIGN KEY (`ID_Hora`) REFERENCES `hora` (`ID`),
  ADD CONSTRAINT `evento_calendar_ibfk_4` FOREIGN KEY (`ID_User_Asigna`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `evento_calendar_ibfk_5` FOREIGN KEY (`ID_Dia`) REFERENCES `dia_semana` (`ID`),
  ADD CONSTRAINT `evento_calendar_ibfk_6` FOREIGN KEY (`Hora_fin`) REFERENCES `hora` (`ID`),
  ADD CONSTRAINT `evento_calendar_ibfk_7` FOREIGN KEY (`Hora_ini`) REFERENCES `hora` (`ID`),
  ADD CONSTRAINT `evento_calendar_ibfk_8` FOREIGN KEY (`ID_Aula`) REFERENCES `aula` (`ID`);

--
-- Filtros para la tabla `instituto`
--
ALTER TABLE `instituto`
  ADD CONSTRAINT `instituto_ibfk_1` FOREIGN KEY (`ID_INSTITUCION`) REFERENCES `institucion_educativa` (`ID`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`ID_USER_EMISOR`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notificacion_ibfk_2` FOREIGN KEY (`ID_USER_RECEPTOR`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `restri_calendar`
--
ALTER TABLE `restri_calendar`
  ADD CONSTRAINT `restri_calendar_ibfk_1` FOREIGN KEY (`ID_Aula`) REFERENCES `aula` (`ID`),
  ADD CONSTRAINT `restri_calendar_ibfk_2` FOREIGN KEY (`ID_Instituto_Recibe`) REFERENCES `instituto` (`ID`),
  ADD CONSTRAINT `restri_calendar_ibfk_3` FOREIGN KEY (`ID_Tipo_Repeticion`) REFERENCES `tipo_repeticion` (`ID`),
  ADD CONSTRAINT `restri_calendar_ibfk_4` FOREIGN KEY (`ID_User_Recibe`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `restri_calendar_ibfk_5` FOREIGN KEY (`Hora_fin`) REFERENCES `hora` (`ID`),
  ADD CONSTRAINT `restri_calendar_ibfk_6` FOREIGN KEY (`Hora_ini`) REFERENCES `hora` (`ID`);

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`ID_INSTITUCION`) REFERENCES `institucion_educativa` (`ID`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idInstituto`) REFERENCES `instituto` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
