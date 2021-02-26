-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-02-2021 a las 02:48:13
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
-- Base de datos: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE `cupon` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo_cupon` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` enum('no canjeado','canjeado') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'no canjeado',
  `tipo` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`id`, `codigo_cupon`, `estado`, `tipo`, `valor`) VALUES
(1, '78945', 'canjeado', 'porcentaje', '50'),
(2, '65432', 'canjeado', 'porcentaje', '25'),
(3, '16589', 'no canjeado', 'monto', '40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `id_usuario`, `total`, `fecha`, `estado`) VALUES
(12, 3, '605.00', '2021-02-24 23:43:20', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pedido` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`id`, `id_pedido`, `id_producto`, `cantidad`) VALUES
(1, 12, 89, 1),
(2, 12, 90, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `stock`) VALUES
(79, 'Procesador AMD', 'AMD Ryzen 3700X 3.6Ghz', '900.00', '7-3.jpg', 10),
(80, 'Monitor AOC', 'Monitor AOC Q3279VWF', '550.00', '61v1c9s2cfl-sl1000.jpg', 30),
(81, 'Samsung Galaxy Tab', 'Samsung Galaxy Tab A 8\" 2019 2/32GB Wifi Negra', '610.00', 'sm-t290-001-front-black.jpg', 15),
(82, 'Samsung Galaxy Tab', 'Samsung Galaxy Tab A 8\" 2019 2/32GB Wifi Plata', '550.00', 'sm-t290-001-front-silver.jpg', 29),
(83, 'Mouse Logitech', 'Logitech G402 Hyperion Fury FPS Gaming', '135.00', '2.jpg', 50),
(84, 'Monitor MSI', 'Monitor MSI Optix MAG321CURV 31.5\" LED UltraHD 4K HDR Curvo', '825.00', '1.jpg', 35),
(85, 'Auriculares Logitech', 'Logitech G432 Auriculares Gaming 7.1', '180.00', '1 (1).jpg', 21),
(86, 'Monitor ASUS', 'Monitor Asus VG248QG 24\" LED FullHD 165Hz FreeSync', '715.00', '1 (2).jpg', 30),
(88, 'Webcam Razer', 'Razer Kiyo Webcam FullHD 1080p', '345.00', 'd1.jpg', 30),
(89, 'Procesador Intel Core i5', 'Intel Core i5-10400 2.90 GHz', '415.00', 'intel-core-i5-10400-290-ghz-comprar.jpg', 30),
(90, 'Teclado Newskill', 'Newskill Serike Teclado Mecánico Gaming Full RGB Switch Red', '190.00', 'serike.jpg', 25),
(91, 'Apple iPhone 12', 'Apple iPhone 12 64GB Negro Libre', '2900.00', '1791-apple-iphone-12-64gb-negro-libre.jpg', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `rol` enum('Administrador','Cliente') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `email`, `contraseña`, `fecha_nac`, `rol`) VALUES
(1, 'Pedro', NULL, 'pedro123@gmail.com', 'pedrillo321', NULL, 'Administrador'),
(2, 'Jaime', 'Romero', 'jaime1@gmail.com', 'jaime1234', '1999-10-15', 'Cliente'),
(3, 'Sam', NULL, 'sam@outlook.com', 'sam12345', NULL, 'Cliente'),
(4, 'Pablo', NULL, 'pablo123@gmail.com', 'pablo123', NULL, 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_code` (`codigo_cupon`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido` (`id_pedido`),
  ADD KEY `fk_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `fk_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
