-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-03-2024 a las 22:28:22
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login ucocar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(100) NOT NULL,
  `nivel` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `cedula`, `nivel`) VALUES
(2, 'Lucy', '2209', 'luisdanielpineda1998@gmail.com', 0, 0),
(3, 'Max', '$2y$10$U20Q6ksGlaDoJHWhM/gRi.qHWRqWlry4CWxdl5O7/.4gPIHTTUUT2', 'credsama7@gmail.com', 0, 0),
(4, 'Luis', '$2y$10$My4uSKdZ/iI5W1BObkonROlvvqit05x67baVV.JiGieqhZgBpPAyC', 'sd@gmail.com', 0, 0),
(8, 'maxi', '$2y$10$sBlp48wCI22wsa8qqUyBZOfHfnJRe8zfc3L.fD8f66eVdIuiCTMUy', 'sd2@gmail.com', 0, 0),
(12, 'Maxis', '$2y$10$ywm9cauHIEZ/M4RTFSgdLeZgXHu4I28WRrTXZULH1628zLd0qf6Ae', 'ds23s@gmail.com', 27565963, 0),
(13, 'dsd7', '$2y$10$8QGhxiJW5/vqP.Pzy.WjR.iaUZYdS/yDIcUEgpxofhSJCn5EiDace', 'dsads89@gmail.com', 268954, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
