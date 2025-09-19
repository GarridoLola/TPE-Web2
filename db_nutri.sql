-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2025 a las 18:43:55
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
-- Base de datos: `db_nutri`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `ID_alimento` int(11) NOT NULL,
  `nombre_alimento` varchar(100) NOT NULL,
  `ID_grupo` int(11) NOT NULL,
  `descripcion_alimento` varchar(255) NOT NULL,
  `calorias` decimal(6,2) NOT NULL,
  `proteinas` decimal(6,2) NOT NULL,
  `carbohidratos` decimal(6,2) NOT NULL,
  `fibras` decimal(6,2) NOT NULL,
  `grasas` decimal(6,2) NOT NULL,
  `imagen_alimento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_alimentos`
--

CREATE TABLE `grupos_alimentos` (
  `ID_grupo` int(11) NOT NULL,
  `nombre_grupo` varchar(50) NOT NULL,
  `descripcion_grupo` text NOT NULL,
  `imagen_grupo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`ID_alimento`),
  ADD KEY `ID_grupo` (`ID_grupo`);

--
-- Indices de la tabla `grupos_alimentos`
--
ALTER TABLE `grupos_alimentos`
  ADD PRIMARY KEY (`ID_grupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `ID_alimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos_alimentos`
--
ALTER TABLE `grupos_alimentos`
  MODIFY `ID_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD CONSTRAINT `alimentos_ibfk_1` FOREIGN KEY (`ID_grupo`) REFERENCES `grupos_alimentos` (`ID_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
