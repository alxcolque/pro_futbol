-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2019 a las 13:13:52
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsoccer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbitros`
--

CREATE TABLE `arbitros` (
  `arbitro_id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `torneo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `arbitros`
--

INSERT INTO `arbitros` (`arbitro_id`, `nombres`, `apellidos`, `foto`, `torneo_id`) VALUES
(1, 'Juanito', 'perry', '', 1),
(2, 'Juancho', 'Lomm', '', 1),
(3, 'Pedro', 'idaa', 'iu.jpg', 1),
(5, 'wert', 'wertwre', 'wretwer', 1),
(6, 'twertwer', 'wertwer', 'twertwer', 1),
(7, 'twertwter', 'sdrtsdfg', '', 1),
(9, 'dfgsdf', 'sdfg', 'sdfg', 1),
(12, 'Moise', 'Col', '', 1),
(14, 'fghhh', 'hhhhh', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios`
--

CREATE TABLE `cambios` (
  `cambio_id` int(11) NOT NULL,
  `cam_min` datetime NOT NULL,
  `e_jugador` int(11) NOT NULL,
  `s_jugador` int(11) NOT NULL,
  `partido_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cambios`
--

INSERT INTO `cambios` (`cambio_id`, `cam_min`, `e_jugador`, `s_jugador`, `partido_id`, `equipo_id`) VALUES
(16, '2019-12-08 23:12:46', 18, 7, 1, 1),
(17, '2019-12-12 08:33:56', 67, 68, 13, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `equipo_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `procedencia` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `torneo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`equipo_id`, `nombre`, `procedencia`, `logo`, `torneo_id`) VALUES
(1, 'Barcelona', 'España', 'ba.jpg', 1),
(2, 'Real madrid', 'Europa', 'ma.jpg', 1),
(3, 'Bayern Munich', 'Europa', '', 1),
(4, 'Atlético de Madrid', 'Europa', '', 1),
(5, 'Ajax', 'Europa', 'aja.jpg', 1),
(6, 'Manchester City', 'Europa', '', 1),
(7, 'Napoli', 'Europa', '', 1),
(8, 'Manchester United', 'Europa', '', 1),
(9, 'Chelsea', 'Europa', '', 1),
(10, 'Juventus', 'Europa', '', 1),
(11, 'Calahuani', 'Mexico', '', 3),
(12, 'Ing Civil', 'Oruro', '', 2),
(27, 'Enfermeria', '', '', 2),
(28, 'Inglaterra', '', '', 1),
(29, 'Informatica', '', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadios`
--

CREATE TABLE `estadios` (
  `estadio_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `torneo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadios`
--

INSERT INTO `estadios` (`estadio_id`, `nombre`, `ubicacion`, `torneo_id`) VALUES
(1, 'Ciudad Barsa', 'España', 1),
(2, 'Madrid', 'España', 1),
(3, '3 de mayo', 'Oruro', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hechos`
--

CREATE TABLE `hechos` (
  `partido_id` int(11) NOT NULL,
  `jugador_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `tipo_hecho` int(11) NOT NULL,
  `minuto` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hechos`
--

INSERT INTO `hechos` (`partido_id`, `jugador_id`, `equipo_id`, `tipo_hecho`, `minuto`) VALUES
(1, 16, 1, 1, '2019-12-08 23:11:58'),
(1, 3, 1, 3, '2019-12-08 23:12:11'),
(1, 15, 2, 2, '2019-12-08 23:12:21'),
(1, 15, 2, 2, '2019-12-08 23:12:28'),
(13, 66, 10, 1, '2019-12-12 09:06:45'),
(13, 66, 10, 2, '2019-12-12 09:07:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `jugador_id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `num_cam` int(3) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`jugador_id`, `nombres`, `apellidos`, `equipo_id`, `num_cam`, `foto`, `puesto`, `estado`) VALUES
(1, 'Lionel', 'Messi', 1, 10, 'messi.png', 'Delantero', 1),
(2, 'Cristiano', 'Ronaldo', 2, 7, 'cris.jpg', 'Delantero', 1),
(3, 'Ronaldinho', 'Gaucho', 1, 9, 'hu.jpg', 'Medio campista', 1),
(4, 'Jordi', 'Alba', 1, 18, 'ji.jtd', 'Centro campista', 1),
(5, 'Ivan', 'Rakitic', 1, 23, 'dfgdsfg', 'Puntero', 1),
(6, 'Arturo', 'Vidal', 1, 6, 'adfas', 'Centro campista', 1),
(7, 'Luis', 'Suarez', 1, 8, 'hhhhhg', 'Centro', 3),
(10, 'Sergio', 'Busquets', 1, 2, 'qq', 'Carril Izquierdo', 1),
(11, 'Xavi', 'ddd', 1, 8, 'jklj', 'Defensa', 1),
(12, 'Iker', 'Casillas', 2, 1, 'kjk', 'Portero', 1),
(13, 'Carlos', 'Alonso', 2, 4, 'jghkjh', 'Medio', 1),
(14, 'Marcelo', 'Veira', 2, 4, 'fg', 'centro', 1),
(15, 'Marco', 'Asencio', 2, 12, 'dfasd', 'Delantero', 1),
(16, 'Sergio', 'Ramos', 1, 2, 'sdfg', 'Defensa', 1),
(18, 'Andres', 'Iniesta', 1, 6, 'sdfgs', 'Centro', 2),
(19, 'James', 'Rodriguez', 2, 10, 'sdfgs', 'Delantero', 1),
(20, 'Luca', 'Zidane', 2, 13, 'fdg', 'Centro', 1),
(21, 'Manuel', 'Neuer', 3, 1, 'll', 'Portero', 1),
(22, 'Sandro', 'Wagner', 3, 11, 'dd', 'Delantero', 1),
(23, 'Renato ', 'Sanchez', 3, 14, 'dd', 'Defe', 1),
(24, 'Kylian ', 'Mbappé', 3, 12, 'a', 'Delantero', 1),
(25, 'Edin', 'jjjdj', 3, 14, 'sdf', 'Medio', 1),
(26, 'Roberto', 'Firmino', 3, 11, '', 'Carril Izquierdo', 1),
(27, 'Gareth', 'Bale', 4, 11, 'fff', 'Delantero', 1),
(28, 'Casemiro', 'BLa', 4, 7, 'akk', 'Centro campista', 1),
(29, 'James', 'Miler', 4, 2, 'kk', 'Centro campista', 1),
(30, 'Giorgio', 'Chiellini', 4, 40, 'SFG', 'Defensa', 1),
(31, 'Diego', 'Godin', 4, 8, 'adfa', 'Defensa', 1),
(32, 'Jan', 'Oblak', 4, 8, 'g', 'Portero', 1),
(33, 'Griezmann', 'A', 5, 67, 'fg', 'Delantero', 1),
(34, 'Juan', 'pablo', 5, 1, 'dd', 'Portero', 1),
(35, 'Pedro', 'H', 5, 23, 'dfs', 'Centro campista', 1),
(36, 'Henry', 'Galo', 5, 12, 'f', 'Defensa', 1),
(37, 'Hulk', 'HEloo', 5, 5, 'dff', 'Defensa', 1),
(38, 'Alan', 'Pierre', 5, 14, 'df', 'Delantero', 1),
(39, 'Sam', 'Juaresz', 6, 1, 'sdfs', 'Portero', 1),
(40, 'Perdro', 'Nier', 6, 2, 'df', 'Defensa', 1),
(41, 'Robert', 'Guti', 6, 3, 'df', 'Defensa', 1),
(42, 'Mario', 'Perez', 6, 4, 'adf', 'Centro campista', 1),
(43, 'Gustavo', 'Bernal', 6, 5, 'sdf', 'Centro campista', 1),
(44, 'Joe', 'Kier', 6, 6, 'fe', 'Delantero', 1),
(45, 'Kell', 'Muerte', 6, 9, 'sf', 'Delantero', 1),
(46, 'Xavi', 'Neil', 7, 1, 'dfs', 'Portero', 1),
(47, 'Martin', 'H', 7, 2, '', 'Defensa', 1),
(48, 'Hugo', 'Choque', 7, 4, 'sfd', 'Defensa', 1),
(49, 'Hernan', 'Grom', 7, 5, 'sd', 'Centro campista', 1),
(50, 'Alvaro', 'Martinez', 7, 6, 'C', 'Centro campista', 1),
(51, 'Alejandro', 'Bosquez', 7, 7, 'fgfd', 'Delantero', 1),
(52, 'Jose', 'Perno', 8, 1, 'sfg', 'Portero', 1),
(53, 'Jorge', 'Guzman', 8, 3, 'Dfg', 'Defensa', 1),
(54, 'Amancio', 'Gates', 8, 2, 'fd', 'Defensa', 1),
(55, 'Jeff', 'Oretega', 8, 5, 'sd', 'Defensa', 1),
(56, 'Jim', 'Kim', 8, 6, 'we', 'Centro campista', 1),
(57, 'Jack', 'Ron', 8, 7, 'Jie', 'Centro campista', 1),
(58, 'Diego', 'Kim', 8, 10, 'sdfg', 'Delantero', 1),
(59, 'Tomas', 'Muller', 9, 1, 'Perdid', 'Portero', 1),
(60, 'Juan', 'Padilla', 9, 2, 'kk', 'Defensa', 1),
(61, 'Mateo', 'Espejo', 9, 3, 'Ds', 'Defensa', 1),
(62, 'Ariel', 'Garcia', 9, 4, 's', 'Defensa', 1),
(63, 'Cristian', 'Guerrero', 9, 5, 'fg', 'Centro campista', 1),
(64, 'Grover', 'Coor', 9, 7, 'sfdg', 'Delantero', 1),
(65, 'Julian', 'Perla', 9, 9, 'dsdf', 'Delantero', 1),
(66, 'Victor', 'Mamfred', 10, 1, 'df', 'Portero', 1),
(67, 'Andres', 'Condo', 10, 2, 'f', 'Defensa', 2),
(68, 'Marcial', 'German', 10, 3, 'sd', 'Defensa', 3),
(69, 'Iver', 'Marquez', 10, 4, 'k', 'Defensa', 1),
(70, 'Ronal', 'Feo', 10, 5, 's', 'Centro campista', 1),
(71, 'Miguiel', 'Suarez', 10, 7, 'df', 'Centro campista', 1),
(72, 'Jhonny', 'Fuentes', 10, 8, 's', 'Delantero', 1),
(73, 'Perdro', 'Cordova', 10, 10, 'sdf', 'Delantero', 1),
(74, 'Wilason', 'Mendez', 11, 1, 'j', 'Portero', 1),
(75, 'Moises', 'Ramirez', 11, 2, 'd', 'Defensa', 1),
(76, 'Timoteo', 'Jue', 11, 3, 'd', 'Defensa', 1),
(77, 'Miguel', 'Porte', 11, 4, 'f', 'Defensa', 1),
(78, 'Genaro', 'Sama', 11, 5, 'f', 'Centro campista', 1),
(79, 'Shifu', 'Maestre', 11, 6, 'g', 'Centro campista', 1),
(80, 'Michael', 'Golden', 11, 7, 's', 'Delantero', 1),
(81, 'Marcelo', 'Martins', 11, 11, 'd', 'Delantero', 1),
(82, 'Carlitos', 'Jimenez', 12, 1, 'fgdf', 'Portero', 1),
(83, 'Hijito ', 'De Papá', 12, 2, 'sd', 'Defensa', 1),
(84, 'Diego A', 'Maradona', 1, 13, '', 'Delantero', 0),
(85, 'Puyol', 'JJJDD', 1, 19, '', 'Medio Campista', 0),
(88, 'Ivan', 'Rodri', 12, 10, 'foto.png', 'Centro Campista', 1),
(90, 'Juancho', 'Ajklj', 27, 12, 'foto.png', 'Centro Campista', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `partido_id` int(11) NOT NULL,
  `estadio_id` int(11) NOT NULL,
  `arbitro_id` int(11) NOT NULL,
  `equipoA_id` int(11) NOT NULL,
  `equipoB_id` int(11) NOT NULL,
  `fecha_i` datetime NOT NULL,
  `fecha_d` datetime NOT NULL,
  `fecha_r` datetime NOT NULL,
  `fecha_f` datetime NOT NULL,
  `torneo_id` int(11) NOT NULL,
  `estado_partido` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`partido_id`, `estadio_id`, `arbitro_id`, `equipoA_id`, `equipoB_id`, `fecha_i`, `fecha_d`, `fecha_r`, `fecha_f`, `torneo_id`, `estado_partido`) VALUES
(1, 1, 1, 1, 2, '2019-12-08 23:08:44', '2019-12-08 23:13:01', '2019-12-08 23:22:32', '2019-12-08 23:23:54', 1, 4),
(2, 2, 2, 3, 5, '2019-11-16 21:22:42', '2019-11-16 21:26:18', '2019-11-16 21:24:20', '2019-11-16 20:42:20', 1, 1),
(9, 1, 5, 5, 7, '2019-11-24 17:40:59', '2019-11-16 20:15:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(10, 1, 3, 7, 8, '2019-11-24 08:14:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(11, 1, 3, 5, 7, '2019-11-24 17:58:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(12, 2, 7, 5, 9, '2019-11-24 17:58:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(13, 1, 9, 10, 1, '2019-12-12 08:23:25', '2019-12-21 18:36:05', '2019-12-21 18:36:13', '2019-12-12 09:34:47', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `tecnico_id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `equipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`tecnico_id`, `nombres`, `apellidos`, `equipo_id`) VALUES
(1, 'Ernesto Valverde', '', 1),
(2, 'Santiago Solari', '', 2),
(5, 'Nico Kovac', '', 3),
(6, 'Samuel', '', 4),
(7, 'Jund', '', 5),
(8, 'fffff', '', 6),
(9, 'tuio', '', 7),
(10, 'fgjh', '', 8),
(11, 'Jefe', '', 9),
(12, 'Gato', '', 10),
(13, 'Victor', '', 11),
(14, 'Bufon', '', 12),
(26, 'Juancito', '', 27),
(27, 'Chapulin', '', 28),
(28, 'Ing Gutierrez', '', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE `torneos` (
  `torneo_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `encargado` varchar(80) NOT NULL,
  `fecha_inicio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`torneo_id`, `nombre`, `lugar`, `encargado`, `fecha_inicio`) VALUES
(1, 'Euro Copa', 'Europa', 'Bladimir putin', '2019-10-01'),
(2, '3 de Julio', 'Facultad Nacional de Ingenieria', 'Pajas', '2019-10-02'),
(3, 'Copa 3 de Mayo', '3 de mayo oruro', 'Don Victor', '2019-10-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `nombre`, `apellido`, `email`, `clave`) VALUES
(1, 'admin', 'admin', 'admin@mail.com', 'admin'),
(2, 'alex', 'alex', 'alex@gmail.com', '534b44a19bf18d20b71ecc4eb77c572f'),
(3, 'Moises', 'Col', 'moi@gmail.com', '2000b7287e012511c77a7b2517e838ba'),
(4, 'juan', 'juan', 'juan@mail.com', '363b122c528f54df4a0446b6bab05515');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arbitros`
--
ALTER TABLE `arbitros`
  ADD PRIMARY KEY (`arbitro_id`),
  ADD KEY `fk_torneo2` (`torneo_id`);

--
-- Indices de la tabla `cambios`
--
ALTER TABLE `cambios`
  ADD PRIMARY KEY (`cambio_id`),
  ADD KEY `fk_cam_part` (`partido_id`),
  ADD KEY `fk_cam_e_j` (`e_jugador`),
  ADD KEY `fk_cam_s_j` (`s_jugador`),
  ADD KEY `fk_equi` (`equipo_id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`equipo_id`),
  ADD KEY `nombre_equipo` (`nombre`),
  ADD KEY `fk_torneo1` (`torneo_id`);

--
-- Indices de la tabla `estadios`
--
ALTER TABLE `estadios`
  ADD PRIMARY KEY (`estadio_id`),
  ADD KEY `fk_torneoe` (`torneo_id`);

--
-- Indices de la tabla `hechos`
--
ALTER TABLE `hechos`
  ADD PRIMARY KEY (`minuto`),
  ADD KEY `frk_part` (`partido_id`),
  ADD KEY `frk_jug` (`jugador_id`),
  ADD KEY `frk_equ` (`equipo_id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`jugador_id`),
  ADD KEY `fk_jugador_equipo` (`equipo_id`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`partido_id`),
  ADD KEY `fk_partidos_estadio` (`estadio_id`),
  ADD KEY `fk_partido_equipoA` (`equipoA_id`),
  ADD KEY `fk_partido_equipoB` (`equipoB_id`),
  ADD KEY `fk_par_arb` (`arbitro_id`),
  ADD KEY `torneo_id` (`torneo_id`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`tecnico_id`),
  ADD KEY `fk_entrenador_equipo` (`equipo_id`);

--
-- Indices de la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`torneo_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arbitros`
--
ALTER TABLE `arbitros`
  MODIFY `arbitro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cambios`
--
ALTER TABLE `cambios`
  MODIFY `cambio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `equipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `estadios`
--
ALTER TABLE `estadios`
  MODIFY `estadio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `jugador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `partido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `tecnico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `torneos`
--
ALTER TABLE `torneos`
  MODIFY `torneo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arbitros`
--
ALTER TABLE `arbitros`
  ADD CONSTRAINT `fk_torneo2` FOREIGN KEY (`torneo_id`) REFERENCES `torneos` (`torneo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cambios`
--
ALTER TABLE `cambios`
  ADD CONSTRAINT `fk_cam_e_j` FOREIGN KEY (`e_jugador`) REFERENCES `jugadores` (`jugador_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cam_part` FOREIGN KEY (`partido_id`) REFERENCES `partidos` (`partido_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cam_s_j` FOREIGN KEY (`s_jugador`) REFERENCES `jugadores` (`jugador_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_equi` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`equipo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `fk_torneo1` FOREIGN KEY (`torneo_id`) REFERENCES `torneos` (`torneo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estadios`
--
ALTER TABLE `estadios`
  ADD CONSTRAINT `fk_torneoe` FOREIGN KEY (`torneo_id`) REFERENCES `torneos` (`torneo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hechos`
--
ALTER TABLE `hechos`
  ADD CONSTRAINT `frk_equ` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`equipo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frk_jug` FOREIGN KEY (`jugador_id`) REFERENCES `jugadores` (`jugador_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frk_part` FOREIGN KEY (`partido_id`) REFERENCES `partidos` (`partido_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `fk_jugador_equipo` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`equipo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `fk_par_arb` FOREIGN KEY (`arbitro_id`) REFERENCES `arbitros` (`arbitro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_partido_equipoA` FOREIGN KEY (`equipoA_id`) REFERENCES `equipos` (`equipo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_partido_equipoB` FOREIGN KEY (`equipoB_id`) REFERENCES `equipos` (`equipo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_partidos_estadio` FOREIGN KEY (`estadio_id`) REFERENCES `estadios` (`estadio_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_torneo` FOREIGN KEY (`torneo_id`) REFERENCES `torneos` (`torneo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD CONSTRAINT `fk_entrenador_equipo` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`equipo_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
