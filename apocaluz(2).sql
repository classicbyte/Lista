-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2017 a las 18:48:14
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apocaluz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
  `cod_lista` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `fecha_event` varchar(30) NOT NULL,
  `create_at` varchar(50) NOT NULL,
  `update_at` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`cod_lista`, `cod_user`, `fecha_event`, `create_at`, `update_at`) VALUES
(6, 1, '30-11-17', '25-11-17 12:03:42 PM', '25-11-17 12:03:42 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `cod_user` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `category_users` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(400) NOT NULL,
  `activo` int(2) NOT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `create_at` varchar(50) DEFAULT NULL,
  `update_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`cod_user`, `name`, `last_name`, `category_users`, `email`, `password`, `activo`, `whatsapp`, `facebook`, `instagram`, `create_at`, `update_at`) VALUES
(1, 'Administrador', 'PrincipalFua', 'Admin', 'micorreo@apocaluz.cl', 'c4ca4238a0b923820dcc509a6f75849b', 1, '+56988989865', 'www.facebook.com/usuarioface', 'www.intagram.com/black_bull8904', '22-11-17', '22-11-17'),
(17, 'ventas', '2', 'Ventas', 'ventas2@apocaluz.cl', 'd9f6e636e369552839e7bb8057aeb8da', 1, '+56982914811', 'https://www.facebook.com/cristian.campos.7796', 'www.intagram.com/black_bull8904', '22-11-17', NULL),
(21, 'Pedrito', 'Valenzuela', 'Enlistador', 'enlistador@apocaluz.cl', 'd9f6e636e369552839e7bb8057aeb8da', 1, '+56982914811', 'https://www.facebook.com/cristian.campos.7796', 'www.intagram.com/black_bull8904', '23-11-17', NULL),
(22, 'Pedro', 'Maincra', 'Enlistador', 'otrocorreo@correo.cl', 'd9f6e636e369552839e7bb8057aeb8da', 1, '+56982914811', 'https://www.facebook.com/cristian.campos.7796', 'www.intagram.com/black_bull8904', '23-11-17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `cod_venta` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `cod_lista` int(30) NOT NULL,
  `tramo` varchar(3) NOT NULL,
  `can_ventas` int(11) NOT NULL,
  `total` int(30) NOT NULL,
  `fecha_event` varchar(30) NOT NULL,
  `create_at` varchar(50) NOT NULL,
  `update_at` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`cod_venta`, `cod_user`, `cod_lista`, `tramo`, `can_ventas`, `total`, `fecha_event`, `create_at`, `update_at`) VALUES
(21, 21, 6, '0', 0, 0, '30-11-17', '25-11-17', '25-11-17'),
(22, 22, 6, '0', 0, 0, '30-11-17', '25-11-17', '25-11-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`cod_lista`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`cod_user`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`cod_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
  MODIFY `cod_lista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `cod_venta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
