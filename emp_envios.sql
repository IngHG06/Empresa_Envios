-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2017 a las 20:35:12
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `emp_envios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `cod_articulo` varchar(4) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  `cantidad` int(2) NOT NULL,
  `cod_pedido_asoc` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`cod_articulo`, `descripcion`, `cantidad`, `cod_pedido_asoc`) VALUES
('AR02', 'Traje Caballero', 2, 'NE1LV2'),
('AR04', 'Raqueta Tenis', 2, 'NE1LV4'),
('AR05', 'Mancuernas', 2, 'NE1LV4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `cod_pedido` varchar(6) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `direccion` varchar(75) NOT NULL,
  `estatus` varchar(20) NOT NULL,
  `cod_transporte` varchar(6) NOT NULL,
  `id_cliente` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`cod_pedido`, `precio`, `direccion`, `estatus`, `cod_transporte`, `id_cliente`) VALUES
('NE1LV2', '20000', 'Casa #30, Calle Santa Ana, Altagracia', 'Embalado', 'TT1NE1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE IF NOT EXISTS `transportes` (
  `cod_transporte` varchar(6) NOT NULL,
  `tipo_transporte` varchar(15) NOT NULL,
  `color` varchar(20) NOT NULL,
  `matricula` varchar(8) NOT NULL,
  `nom_conductor` varchar(25) NOT NULL,
  `destino_asig` varchar(25) NOT NULL,
  `fecha_salida` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`cod_transporte`, `tipo_transporte`, `color`, `matricula`, `nom_conductor`, `destino_asig`, `fecha_salida`) VALUES
('TT1NE1', 'DrÃ³n', 'Blanco', '06H98GA', 'Hiram GonzÃ¡lez', 'Municipio GÃ³mez', '04/11/2017'),
('TT1NE2', 'Motocicleta', 'Negro', 'LG0517C', 'JosuÃ© GÃ³mez', 'Municipio Marcano', '06/11/2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(5) NOT NULL,
  `nom_ape` varchar(30) NOT NULL,
  `user` varchar(10) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `cuenta` int(1) DEFAULT NULL,
  `direccion` varchar(60) NOT NULL,
  `saldo` varchar(10) NOT NULL,
  `descuento` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nom_ape`, `user`, `pass`, `cuenta`, `direccion`, `saldo`, `descuento`) VALUES
(1, 'Admin', 'admin', 'c93ccd78b2076528346216b3b2f701e6', 0, 'El Valle', '0', 0),
(2, 'Hiram GonzÃ¡lez', 'usuario', '781e5e245d69b566979b86e28d23f2c7', 1, 'Juangriego', '0', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`cod_articulo`), ADD UNIQUE KEY `cod_articulo` (`cod_articulo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`cod_pedido`), ADD UNIQUE KEY `cod_pedido` (`cod_pedido`);

--
-- Indices de la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`cod_transporte`), ADD UNIQUE KEY `cod_transporte` (`cod_transporte`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
