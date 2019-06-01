-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2019 a las 23:24:48
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qrcamdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `userfk` varchar(12) DEFAULT NULL,
  `enter_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exit_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `day_work` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reg`
--

INSERT INTO `reg` (`id`, `userfk`, `enter_time`, `exit_time`, `day_work`) VALUES
(1, '123456789', '2019-05-26 19:51:40', '0000-00-00 00:00:00', '2019-05-26'),
(2, 'admin', '2019-05-26 22:08:21', '2019-05-26 22:17:13', '2019-05-26'),
(3, '123456789', '2019-06-01 20:24:46', '0000-00-00 00:00:00', '2019-06-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` varchar(12) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `stall` varchar(100) NOT NULL,
  `tel` bigint(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pass` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `grade`, `stall`, `tel`, `email`, `reg_date`, `pass`) VALUES
('123456789', 'juan', 'perez perez', 'Ingeniero', 'puesto', 123456789, 'algoemail', '2019-05-26 05:52:50', NULL),
('admin', 'admin', 'admin', 'Licenciado', 'admin', 123456789, 'admin', '2019-05-26 22:35:33', 'adminadmin'),
('xxx', 'xx', 'xx', 'Tecnico', 'xxx', 9241011231, 'admin', '2019-05-28 01:42:37', 'xx');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userfk` (`userfk`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reg`
--
ALTER TABLE `reg`
  ADD CONSTRAINT `reg_ibfk_1` FOREIGN KEY (`userfk`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
