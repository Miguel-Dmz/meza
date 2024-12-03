-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2024 a las 06:37:49
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
-- Base de datos: `miguelin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `platoid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `precioTotal` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_Cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `nombre`, `password`, `direccion`, `telefono`, `correo`, `created_at`) VALUES
(1, 'Miguel_Admin', '$2y$10$l0yRpdFUpC4YyF04SCeB8.fUgbOOeYkJLMrN2GuzfjLhocKL6xMgS', 'Digital', 2147483647, 'miguel@gmail.com', '2024-11-25 03:09:05'),
(2, 'Random', '$2y$10$NcY1be/BAAOufTJBBRJsVOEYzvKCBl7/GXPdhWe2rdz.6sE5dQ0Zu', 'Uganda 7409', 2147483647, 'random@gmail.com', '2024-11-25 04:49:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `fecha_ingreso` varchar(50) NOT NULL,
  `hora_llegada` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `id_Plato` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`id_Plato`, `nombre`, `descripcion`, `precio`, `stock`, `tipo`, `image`, `created_at`) VALUES
(6, 'Nike Mercurial Superfly 9', 'tachos de futbol', 2500.00, 20, 'nike', '../images/Nike Mercurial Superfly 9.png', '2024-12-02 03:46:00'),
(7, 'Nike Mercurial Superfly 9 Club', 'tachos de futbol', 4000.00, 30, 'nike', '../images/Nike Mercurial Superfly 9 Club.png', '2024-12-02 04:33:57'),
(8, 'Nike Superfly 9 Academy Mercurial Dream Speed', 'tachos de futbol', 3000.00, 11, 'nike', '../images/Nike Superfly 9 Academy Mercurial Dream Speed.png', '2024-12-02 04:34:54'),
(9, 'Nike Mercurial Vapor 15 Academy', 'tachos de futbol', 2000.00, 10, 'nike', '../images/Nike Mercurial Vapor 15 Academy.png', '2024-12-02 04:36:03'),
(10, 'NIke air max pulse', 'air max pulse', 2500.00, 55, 'air max', '../images/NIke air max pulse.png', '2024-12-02 04:41:48'),
(11, 'nike air max plus', 'air max plus', 3000.00, 20, 'air max', '../images/nike air max plus.png', '2024-12-02 04:43:25'),
(12, 'nike air max 97', 'air max 97', 4000.00, 5, 'air max', '../images/nike air max 97.png', '2024-12-02 04:44:05'),
(13, 'nike air max 95', 'air max 95', 1500.00, 100, 'air max', '../images/nike air max 95.png', '2024-12-02 04:45:38'),
(14, 'Nike Air Jordan 4 Retro University Blue', 'Nike Air Jordan 4 Retro University Blue', 25000.00, 2, 'jordan', '../images/Nike Air Jordan 4 Retro University Blue.png', '2024-12-02 04:46:47'),
(15, 'Jordan 4 travis (purple)', 'Jordan 4 travis (purple)', 30000.00, 5, 'jordan', '../images/Jordan 4 travis (purple).png', '2024-12-02 04:56:12'),
(16, 'Jordan 4 black cat', 'Jordan 4 black cat', 100000.00, 2, 'jordan', '../images/Jordan 4 black cat.png', '2024-12-02 04:57:17'),
(17, 'Jordan 1 Retro High OG Hyper Royal', 'Jordan 1 Retro High OG Hyper Royal', 15000.00, 12, 'jordan', '../images/Jordan 1 Retro High OG Hyper Royal.jpg', '2024-12-02 04:58:17'),
(18, 'Jordan 1 High The Dior', 'Jordan 1 High The Dior', 250000.00, 1, 'jordan', '../images/Jordan 1 High The Dior.png', '2024-12-02 04:59:55'),
(19, 'Jordan 1 Chicago 1994 Sample', 'Jordan 1 Chicago 1994 Sample', 5000.00, 20, 'jordan', '../images/Jordan 1 Chicago 1994 Sample.jpg', '2024-12-02 05:00:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_reserva` varchar(50) NOT NULL,
  `numero_personas` int(11) NOT NULL,
  `hora_llegada` varchar(50) NOT NULL,
  `hora_salida` varchar(50) NOT NULL,
  `mesaID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `idTienda` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo_electronico` varchar(255) DEFAULT NULL,
  `horario` varchar(50) DEFAULT NULL,
  `tipo_de_productos` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_Venta` int(11) NOT NULL,
  `Id_empleado` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fechaVenta` varchar(50) NOT NULL,
  `IdPlato` int(11) NOT NULL,
  `Total_Venta` decimal(10,2) NOT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`id_Plato`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`idTienda`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_Venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `id_Plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `idTienda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_Venta` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
