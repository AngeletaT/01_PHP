-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2023 a las 19:05:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fotohogar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_ref` varchar(5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `opcion` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `m2` int(50) NOT NULL,
  `precio` int(50) NOT NULL,
  `habs` int(50) NOT NULL,
  `banys` int(50) NOT NULL,
  `ascensor` tinyint(4) NOT NULL,
  `fechapubli` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `id_ref`, `nombre`, `opcion`, `tipo`, `m2`, `precio`, `habs`, `banys`, `ascensor`, `fechapubli`) VALUES
(1, '1526A', 'Chalet en Madrid', 'Venta', 'Chalet', 150, 152, 5, 2, 0, '10/12/2023'),
(2, '1527A', 'Piso en Barcelona', 'Alquiler', 'Casa', 100, 105, 4, 2, 1, '11/12/2023'),
(3, '1528A', 'Casa en Valencia', 'Obra Nueva', 'Casa', 120, 132, 4, 3, 0, '10/12/2023');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_ref` (`id_ref`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 