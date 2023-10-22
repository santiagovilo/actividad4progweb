-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2023 a las 21:23:02
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `embotelladora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `cantidad` int(11) DEFAULT NULL,
  `direccion` varchar(50) NOT NULL,
  `vendedor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `fecha_hora`, `cantidad`, `direccion`, `vendedor`) VALUES
(46, '2023-10-22 00:57:08', 21, 'Yaracuy ', 'ID-zu00004'),
(48, '2023-10-22 01:48:13', 99, 'Miranda', 'ID-zu00002'),
(49, '2023-10-22 03:01:47', 300, 'Sucre', 'ID-zu00004'),
(54, '2023-10-22 03:41:18', 222, 'Bolívar', 'ID-zu00005'),
(55, '2023-10-22 03:49:43', 111, 'Delta Amacuro', 'ID-zu00004'),
(57, '2023-10-22 04:10:01', 20, 'Zulia', 'ID-zu00001'),
(58, '2023-10-22 15:21:52', 18, 'Barinas', 'ID-zu00010'),
(59, '2023-10-22 15:54:42', 55, 'Apure', 'ID-zu00009'),
(60, '2023-10-22 15:55:41', 178, 'Delta Amacuro', 'ID-zu00008'),
(61, '2023-10-22 15:55:59', 250, 'Guárico', 'ID-zu00006'),
(62, '2023-10-22 15:56:20', 20, 'Falcón', 'ID-zu00007'),
(63, '2023-10-22 15:56:56', 300, 'Mérida', 'ID-zu00005'),
(64, '2023-10-22 15:57:41', 1, 'Zulia', 'ID-zu00003'),
(65, '2023-10-22 15:58:06', 90, 'Portuguesa', 'ID-zu00004'),
(66, '2023-10-22 15:58:40', 120, 'Trujillo', 'ID-zu00002'),
(67, '2023-10-22 15:59:05', 190, 'Yaracuy ', 'ID-zu00001'),
(68, '2023-10-22 16:01:17', 264, 'Cojedes', 'ID-zu00005');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula` int(10) NOT NULL,
  `contrasena` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `contrasena`, `nombre`, `telefono`) VALUES
(25693144, 'Arroz1234', 'Jaime Perozo', '04241237872'),
(30139486, '123456', 'Santiago Viloria', '04125897489');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
