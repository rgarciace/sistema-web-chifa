-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2020 a las 05:24:49
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `terra_system`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_x_dia`
--

CREATE TABLE `caja_x_dia` (
  `id_caja_dia` int(11) NOT NULL,
  `fecha_caja_dia` date NOT NULL,
  `estado_caja` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caja_x_dia`
--

INSERT INTO `caja_x_dia` (`id_caja_dia`, `fecha_caja_dia`, `estado_caja`) VALUES
(5, '2020-11-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

CREATE TABLE `comprobante` (
  `id_comprobante` int(11) NOT NULL,
  `id_caja_dia` int(11) NOT NULL,
  `id_descuento` int(11) DEFAULT NULL,
  `estado_comprobante` tinyint(1) DEFAULT '0',
  `id_usuario` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprobante`
--

INSERT INTO `comprobante` (`id_comprobante`, `id_caja_dia`, `id_descuento`, `estado_comprobante`, `id_usuario`, `id_mesa`) VALUES
(27, 5, NULL, 1, 75541206, 6),
(28, 5, NULL, 0, 75541206, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE `descuento` (
  `id_descuento` int(11) NOT NULL,
  `nombre_descuento` varchar(30) NOT NULL,
  `porcenta_descuento` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descuento`
--

INSERT INTO `descuento` (`id_descuento`, `nombre_descuento`, `porcenta_descuento`) VALUES
(1, 'combo1', 0.25),
(2, 'combo2', 0.15),
(3, 'combo3', 0.3),
(5, 'combo5', 0.35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_venta_plato`
--

CREATE TABLE `det_venta_plato` (
  `id_vent_plat` int(11) NOT NULL,
  `id_comprobante` int(11) DEFAULT NULL,
  `id_mesa` int(11) NOT NULL,
  `cantidad_plato` int(11) NOT NULL,
  `costo_plato` double NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `esta_det_venta` tinyint(2) NOT NULL DEFAULT '0',
  `hora_atencion` time DEFAULT NULL,
  `id_plato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_venta_plato`
--

INSERT INTO `det_venta_plato` (`id_vent_plat`, `id_comprobante`, `id_mesa`, `cantidad_plato`, `costo_plato`, `id_usuario`, `esta_det_venta`, `hora_atencion`, `id_plato`) VALUES
(137, 27, 6, 2, 42.9, 75541206, 1, '20:51:00', 1),
(140, 27, 6, 6, 5.9, 75541206, 1, '20:51:00', 2),
(141, 27, 6, 3, 25.5, 75541206, 1, '20:51:00', 3),
(143, 28, 1, 1, 5.9, 75541206, 0, '20:59:00', 2),
(144, 28, 1, 3, 42.9, 75541206, 0, '20:59:00', 1),
(145, 28, 1, 3, 25.5, 75541206, 0, '20:59:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(11) NOT NULL,
  `nro_mesa` varchar(6) DEFAULT NULL,
  `estado_mesa` tinyint(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `nro_mesa`, `estado_mesa`) VALUES
(1, 'M00001', 0),
(2, 'M00002', 0),
(3, 'M00003', 0),
(4, 'M00004', 0),
(5, 'M00005', 0),
(6, 'M00006', 0),
(7, 'M00007', 0),
(8, 'M00008', 0),
(9, 'M00009', 0),
(10, 'M00010', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `id_plato` int(11) NOT NULL,
  `nombre_plato` varchar(40) DEFAULT NULL,
  `costo` double NOT NULL,
  `es_plato` tinyint(1) NOT NULL,
  `estado_plato` tinyint(1) NOT NULL,
  `estado_eliminado_plato` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`id_plato`, `nombre_plato`, `costo`, `es_plato`, `estado_plato`, `estado_eliminado_plato`) VALUES
(1, 'Arroz Chaufa', 42.9, 1, 1, 1),
(2, 'Coca Cola', 5.9, 0, 1, 1),
(3, 'Sopa con Wantan', 25.5, 1, 1, 1),
(4, 'Inca Kola', 5.9, 0, 0, 0),
(5, '40 x 40 - Especial', 55.6, 1, 0, 0),
(7, 'Fanta', 7.5, 0, 0, 0),
(8, 'Mostrito', 15, 0, 1, 1),
(9, 'Tallarín saltado', 25.9, 0, 1, 1),
(10, 'Kam Lu Wantán', 30.9, 0, 1, 1),
(11, 'Chicharrón de pollo', 20.9, 0, 1, 1),
(12, 'Pollo Chi Jau Kay', 23.5, 0, 1, 1),
(13, 'Pollo Ti Pa Kay', 36.5, 0, 1, 1),
(14, 'Chicha morada 1L', 10, 1, 1, 1),
(15, 'Chicha morada 1/2L', 6, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `cantidad_horas_reseva` int(11) NOT NULL,
  `dni_cliente` varchar(8) NOT NULL,
  `nombre_cliente` varchar(60) NOT NULL,
  `celular` varchar(9) NOT NULL,
  `cantidad_comesales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_mesa`, `fecha_reserva`, `cantidad_horas_reseva`, `dni_cliente`, `nombre_cliente`, `celular`, `cantidad_comesales`) VALUES
(1, 1, '2020-05-11', 3, '78945625', 'keilder Mejia', '985632185', 4),
(2, 3, '2020-04-20', 2, '44563218', 'Pablo Jurupe', '964535785', 2),
(3, 5, '2020-08-03', 1, '72356159', 'thauso gad', '935715925', 1),
(4, 7, '2020-04-16', 4, '69321475', 'Rosita Peregrina', '945963426', 8),
(5, 9, '2020-10-10', 2, '16987532', 'oscar Serquer', '998765489', 1),
(6, 10, '2020-12-03', 1, '12345678', 'Renzo Samuel', '955261681', 2),
(12, 9, '2020-12-05', 1, '32655466', 'gad', '123478965', 1),
(13, 9, '2020-12-03', 1, '32655466', 'AAA', '955261682', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo_usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `nombre_tipo_usuario`) VALUES
(1, 'Administrador del Sistema'),
(2, 'Gerente'),
(3, 'Administrador'),
(4, 'Maitre'),
(5, 'Cocinero'),
(6, 'Camarero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `dni_usuario` char(8) NOT NULL,
  `nombre_completo` varchar(60) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `contra_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_tipo_usuario`, `dni_usuario`, `nombre_completo`, `nombre_usuario`, `contra_usuario`) VALUES
(6, '15975324', 'Maribel Sosa', 'msosat', '123'),
(5, '16458791', 'Pablo Jurupe', 'pjurupes', '123'),
(6, '45678213', 'Sandra Aguayo', 'saguayo', '123'),
(5, '45678912', 'Juan Caicedo', 'jcaicedol', '123'),
(5, '45678923', 'Renzo García', 'rgarciace', '123'),
(2, '69852347', 'Selena Aldana', 'laldanat', '123'),
(3, '71236549', 'Leslie Gómez', 'lgomezva', '123'),
(4, '72659874', 'Gianmarco Tirado', 'gtiradoju', '123'),
(6, '73829071', 'Leo García', 'lgarciace', '123'),
(1, '75541203', 'Brayian Ramírez', 'bramirezaa', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja_x_dia`
--
ALTER TABLE `caja_x_dia`
  ADD PRIMARY KEY (`id_caja_dia`);

--
-- Indices de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`id_comprobante`);

--
-- Indices de la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD PRIMARY KEY (`id_descuento`);

--
-- Indices de la tabla `det_venta_plato`
--
ALTER TABLE `det_venta_plato`
  ADD PRIMARY KEY (`id_vent_plat`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`id_plato`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni_usuario`),
  ADD UNIQUE KEY `dni_usuario` (`dni_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja_x_dia`
--
ALTER TABLE `caja_x_dia`
  MODIFY `id_caja_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  MODIFY `id_comprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `descuento`
--
ALTER TABLE `descuento`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `det_venta_plato`
--
ALTER TABLE `det_venta_plato`
  MODIFY `id_vent_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
