-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2018 a las 17:58:50
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_users` ()  begin

select * FROM users;

end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `ID_EDIFICIO` int(11) NOT NULL,
  `PISO` int(11) DEFAULT NULL,
  `CAPACIDAD` int(11) DEFAULT NULL,
  `OBS` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`ID`, `NOMBRE`, `ID_EDIFICIO`, `PISO`, `CAPACIDAD`, `OBS`) VALUES
(1, 'UNI9', 1, 0, 23, NULL),
(2, 'UNI21', 1, 0, 0, NULL),
(3, 'UNI2', 1, 1, 34, NULL),
(4, 'SAV25', 2, 0, 33, NULL),
(5, 'FRI16', 3, 1, 12, NULL),
(6, 'SAV4', 2, 1, 23, NULL),
(7, 'LA 24', 4, 1, 12, NULL),
(8, 'UNI8', 1, 2, 12, NULL),
(9, 'UN 15', 5, 0, 33, NULL),
(10, 'LA 25', 4, 1, 33, NULL),
(11, 'UNI6', 1, 1, 34, NULL),
(12, 'FRI4', 3, 2, 12, NULL),
(13, 'LA 25', 4, 1, 23, NULL),
(14, 'SAV15', 2, 0, 34, NULL),
(15, 'UN 22', 5, 0, 34, NULL),
(16, 'UNI15', 1, 1, 23, NULL),
(17, 'SAV11', 2, 1, 23, NULL),
(18, 'SAV8', 2, 0, 12, NULL),
(19, 'LA 7', 4, 2, 12, NULL),
(20, 'FRI10', 3, 0, 34, NULL),
(21, 'UNI3', 1, 2, 12, NULL),
(22, 'SAV10', 2, 2, 40, NULL),
(23, 'UN 14', 5, 1, 23, NULL),
(24, 'LA 17', 4, 34, 12, NULL);

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
(3, 2, 'MEDICINA'),
(4, 4, 'PSICOLOGIA'),
(5, 4, 'LICENECIATURA EN LETRAS'),
(6, 4, 'HISTORIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo_lectivo`
--

CREATE TABLE `ciclo_lectivo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciclo_lectivo`
--

INSERT INTO `ciclo_lectivo` (`id`, `nombre`, `fecha_inicio`, `fecha_fin`, `estado`) VALUES
(1, '2018-1C', '2018-08-01', '2018-12-01', 'Abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE `comision` (
  `ID` int(11) NOT NULL,
  `NUMERO` int(10) UNSIGNED DEFAULT NULL,
  `ID_MATERIA` int(11) DEFAULT NULL,
  `CARGA_HORARIA_SEMANAL` int(11) DEFAULT NULL,
  `ID_Ciclo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`ID`, `NUMERO`, `ID_MATERIA`, `CARGA_HORARIA_SEMANAL`, `ID_Ciclo`) VALUES
(1, 11, 1, 9, 1),
(2, 7, 2, 9, 1),
(3, 2, 3, 6, 1),
(4, 19, 4, 6, 1),
(5, 27, 7, 4, 1),
(6, 19, 8, 9, 1),
(7, 12, 9, 8, 1),
(8, 5, 10, 9, 1),
(9, 18, 11, 4, 1),
(10, 15, 12, 5, 1),
(11, 19, 13, 9, 1),
(12, 22, 14, 6, 1),
(13, 1, 11, 6, 1),
(14, 2, 11, 6, 1),
(21, 1, 1, 6, 1),
(22, 2, 1, 6, 1),
(23, 3, 1, 6, 1),
(24, 4, 1, 6, 1),
(25, 5, 1, 6, 1);

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
(3, 1, 'FRIULI', 4),
(4, 3, 'LA FEA', 9),
(5, 4, 'UN NOMBRE', NULL),
(6, 4, 'OTRO NOMBRE', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_calendar`
--

CREATE TABLE `evento_calendar` (
  `id` int(11) NOT NULL,
  `ID_Aula` int(11) DEFAULT NULL,
  `ID_Comision` int(11) DEFAULT NULL,
  `ID_User_Asigna` int(11) DEFAULT NULL,
  `Hora_ini` time DEFAULT NULL,
  `Hora_fin` time DEFAULT NULL,
  `dow` varchar(20) DEFAULT NULL,
  `ID_Instituto` int(11) DEFAULT NULL,
  `ID_Ciclo` int(11) DEFAULT NULL,
  `momento` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento_calendar`
--


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
(2, 'Unqui');

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
(1, 1, 'INGENIERIA', '#A63322'),
(2, 1, 'SOCIALES', '#283A8A'),
(3, 2, 'SALUD', '#8ab03f'),
(4, 2, 'sociales', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `DESC_CORTA` varchar(20) NOT NULL,
  `ID_Carrera` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `COD_MATERIA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID`, `NOMBRE`, `DESC_CORTA`, `ID_Carrera`, `anio`, `COD_MATERIA`) VALUES
(1, 'MATEMATICA', 'MATE', 1, 2, 'CI002'),
(2, 'FISICA', 'FISI', 2, 2, 'CI025'),
(3, 'FUNDAMENTOS EN INFORMATICA', 'FUND', 1, 1, 'CI010'),
(4, 'INTRODUCCION A LA PSICOLOGIA', 'INTR', 4, 2, NULL),
(5, 'COMO GANAR EL LOTO', 'COMO', 5, 1, NULL),
(6, 'HISTORIA ARGENTINA', 'HIST', 6, 2, 'CI004'),
(7, 'SEGURIDAD EN INFORMATICA', 'SEGU', 1, 3, NULL),
(8, 'BIOLOGIA', 'BIOL', 3, 2, NULL),
(9, 'MATERIALES', 'MATE', 2, 3, NULL),
(10, 'ANALISIS MATEMATICO', 'ANAL', 2, 2, NULL),
(11, 'LENGUA', 'LENG', 5, 2, NULL),
(12, 'INGLES', 'INGL', 3, 3, NULL),
(13, 'FISICA 2', 'FISI', 1, 4, 'CI027'),
(14, 'PROBABILIDAD Y ESTADISTICAS', 'PROB', 2, 4, 'CI029');

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

--
-- Volcado de datos para la tabla `notificacion`
--


-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `oferta_academica`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `oferta_academica` (
`Carrera` varchar(40)
,`Año` int(11)
,`Materia` varchar(40)
,`Comision` int(10) unsigned
,`Dia` varchar(20)
,`Hora Inicio` varchar(7)
,`Hora Fin` varchar(7)
,`Edificio` varchar(40)
,`Sede` varchar(50)
,`Aula` varchar(40)
);

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
(4, 'proyector', 'viste un cine?, bueno algo asi pero en un aula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restri_calendar`
--

CREATE TABLE `restri_calendar` (
  `id` int(11) UNSIGNED NOT NULL,
  `ID_Aula` int(11) DEFAULT NULL,
  `ID_User_Asigna` int(11) DEFAULT NULL,
  `Hora_ini` time DEFAULT NULL,
  `Hora_fin` time DEFAULT NULL,
  `dow` varchar(20) DEFAULT NULL,
  `ID_Instituto` int(11) DEFAULT NULL,
  `ID_Ciclo` int(11) DEFAULT NULL,
  `momento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restri_calendar`
--


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
(6, 1, 'Sede Test', 'false street 123', 'Florencio Varela', '08:00:00', '21:00:00');

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
(3, '18:00:00', '22:00:00');

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

-- --------------------------------------------------------

--
-- Estructura para la vista `oferta_academica`
--
DROP TABLE IF EXISTS `oferta_academica`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `oferta_academica`  AS  select `carrera`.`NOMBRE` AS `Carrera`,`materia`.`anio` AS `Año`,`materia`.`NOMBRE` AS `Materia`,`comision`.`NUMERO` AS `Comision`,`evento_calendar`.`dow` AS `Dia`,concat(left(`evento_calendar`.`Hora_ini`,5),'Hs') AS `Hora Inicio`,concat(left(`evento_calendar`.`Hora_fin`,5),'Hs') AS `Hora Fin`,`edificio`.`NOMBRE` AS `Edificio`,`sede`.`NOMBRE` AS `Sede`,`aula`.`NOMBRE` AS `Aula` from ((((((`carrera` join `materia` on((`materia`.`ID_Carrera` = `carrera`.`ID`))) join `comision` on((`materia`.`ID` = `comision`.`ID_MATERIA`))) join `evento_calendar` on((`comision`.`ID` = `evento_calendar`.`ID_Comision`))) join `sede` on((`sede`.`ID_INSTITUCION` = 1))) join `edificio` on((`edificio`.`ID_SEDE` = `sede`.`ID`))) join `aula` on((`aula`.`ID_EDIFICIO` = `edificio`.`ID`))) where (`aula`.`ID` = `evento_calendar`.`ID_Aula`) order by `carrera`.`NOMBRE` desc,`materia`.`anio`,`evento_calendar`.`dow` ;

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `ciclo_lectivo`
--
ALTER TABLE `ciclo_lectivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comision`
--
ALTER TABLE `comision`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_MATERIA` (`ID_MATERIA`),
  ADD KEY `comision_ibfk_2` (`ID_Ciclo`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ID_Aula` (`ID_Aula`),
  ADD KEY `fk_ID_Comision` (`ID_Comision`),
  ADD KEY `fk_ID_Instituto` (`ID_Instituto`),
  ADD KEY `fk_ID_User_Asigna` (`ID_User_Asigna`),
  ADD KEY `fk_ID_Ciclo` (`ID_Ciclo`);

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ID_Carrera` (`ID_Carrera`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Aula` (`ID_Aula`),
  ADD KEY `ID_User_Asigna` (`ID_User_Asigna`),
  ADD KEY `ID_Instituto` (`ID_Instituto`),
  ADD KEY `ID_Ciclo` (`ID_Ciclo`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_INSTITUCION` (`ID_INSTITUCION`);

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
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ciclo_lectivo`
--
ALTER TABLE `ciclo_lectivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comision`
--
ALTER TABLE `comision`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `evento_calendar`
--
ALTER TABLE `evento_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `institucion_educativa`
--
ALTER TABLE `institucion_educativa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `instituto`
--
ALTER TABLE `instituto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `restri_calendar`
--
ALTER TABLE `restri_calendar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

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
-- Filtros para la tabla `comision`
--
ALTER TABLE `comision`
  ADD CONSTRAINT `comision_ibfk_1` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materia` (`ID`),
  ADD CONSTRAINT `comision_ibfk_2` FOREIGN KEY (`ID_Ciclo`) REFERENCES `ciclo_lectivo` (`id`);

--
-- Filtros para la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD CONSTRAINT `edificio_ibfk_1` FOREIGN KEY (`ID_SEDE`) REFERENCES `sede` (`ID`);

--
-- Filtros para la tabla `evento_calendar`
--
ALTER TABLE `evento_calendar`
  ADD CONSTRAINT `fk_ID_Aula` FOREIGN KEY (`ID_Aula`) REFERENCES `aula` (`ID`),
  ADD CONSTRAINT `fk_ID_Ciclo` FOREIGN KEY (`ID_Ciclo`) REFERENCES `ciclo_lectivo` (`id`),
  ADD CONSTRAINT `fk_ID_Comision` FOREIGN KEY (`ID_Comision`) REFERENCES `comision` (`ID`),
  ADD CONSTRAINT `fk_ID_Instituto` FOREIGN KEY (`ID_Instituto`) REFERENCES `instituto` (`ID`),
  ADD CONSTRAINT `fk_ID_User_Asigna` FOREIGN KEY (`ID_User_Asigna`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `instituto`
--
ALTER TABLE `instituto`
  ADD CONSTRAINT `instituto_ibfk_1` FOREIGN KEY (`ID_INSTITUCION`) REFERENCES `institucion_educativa` (`ID`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_ID_Carrera` FOREIGN KEY (`ID_Carrera`) REFERENCES `carrera` (`ID`);

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
  ADD CONSTRAINT `restri_calendar_ibfk_2` FOREIGN KEY (`ID_User_Asigna`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `restri_calendar_ibfk_3` FOREIGN KEY (`ID_Instituto`) REFERENCES `instituto` (`ID`),
  ADD CONSTRAINT `restri_calendar_ibfk_4` FOREIGN KEY (`ID_Ciclo`) REFERENCES `ciclo_lectivo` (`id`);

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
