-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2026 a las 19:23:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel_reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `name`, `description`) VALUES
(1, 'Económica', 'Habitación básica'),
(2, 'Estándar', 'Habitación estándar'),
(3, 'Lujo', 'Habitación de lujo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `name`, `description`) VALUES
(1, 'Disponible', 'Habitación disponible'),
(2, 'Ocupada', 'Habitación ocupada'),
(3, 'Desinfeccion', 'En desinfeccion'),
(4, 'Mantenimiento', 'En mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `num_habitacion` int(3) NOT NULL,
  `id_categorias` int(11) NOT NULL,
  `num_camas` int(11) NOT NULL,
  `max_personas` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `precio` int(15) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `num_habitacion`, `id_categorias`, `num_camas`, `max_personas`, `description`, `precio`, `id_estado`) VALUES
(1, 101, 1, 1, 2, 'Habitación con cama sencilla, incluye ventilador, baño privado con agua caliente, televisión por cable, WiFi gratuito y escritorio pequeño. Ideal para estancias cortas o viajeros individuales.', 80000, 1),
(2, 102, 2, 2, 4, 'Habitación familiar con dos camas dobles, aire acondicionado, baño privado, televisión pantalla plana, WiFi de alta velocidad, minibar y armario amplio. Perfecta para familias o grupos pequeños.', 150000, 1),
(3, 201, 3, 2, 4, 'Habitación con vista panorámica, equipada con dos camas queen, aire acondicionado, baño privado con jacuzzi, televisión smart TV, WiFi premium, minibar, caja fuerte y servicio a la habitación 24/7. Ideal para una experiencia confortable y exclusiva.', 300000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_de_pago`
--

CREATE TABLE `metodos_de_pago` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodos_de_pago`
--

INSERT INTO `metodos_de_pago` (`id`, `name`, `description`) VALUES
(1, 'Efectivo', 'Pago en efectivo'),
(2, 'Tarjeta', 'Pago con tarjeta'),
(3, 'Transferencia', 'Pago por transferencia bancaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `num_personas` int(11) NOT NULL,
  `estado` varchar(150) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_metodo_pago` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `id_users`, `id_habitacion`, `fecha_inicio`, `fecha_final`, `num_personas`, `estado`, `precio`, `id_metodo_pago`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2026-05-14', '2026-05-17', 2, 'realizado', 240000, 1, '2026-05-14 18:01:20', '2026-05-14 18:01:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Administrador', 'Administrador del sistema'),
(2, 'Empleado', 'Personal responsable del mantenimiento y limpieza de las instalaciones'),
(3, 'Cliente', 'Usuario que realiza reservas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_documentos`
--

CREATE TABLE `tipos_de_documentos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_de_documentos`
--

INSERT INTO `tipos_de_documentos` (`id`, `name`) VALUES
(1, 'Cedula de ciudadania'),
(2, 'Cédula de Extranjería'),
(3, 'Tarjeta de Identidad'),
(4, 'Pasaporte '),
(5, 'NIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tipos_de_documentos` int(11) NOT NULL,
  `num_document` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_rol` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `tipos_de_documentos`, `num_document`, `email`, `password`, `created_at`, `updated_at`, `id_rol`, `estado`) VALUES
(1, 'Nicolas Rodriguez Villota', 1, '1127073195', 'rodriguezvillotanicolas@gmail.com', '$2y$10$p3vNlZ545mrXxnXd1XFfMOJI8Bv1tkxJa1c4yBTuDzTXvZRuSgfLe', '2026-05-14 14:49:00', '2026-05-14 14:49:00', 3, 'Activo'),
(2, 'Camilim', 3, '1107979585', 'breynerbohoquez@gamil.com', '$2y$10$KTA3O4JiWEWtmODAevBf5eYXQaQQrrgrss4DABoD0vRh/jWat3Sx.', '2026-05-14 17:58:01', '2026-05-14 17:58:01', 3, 'Activo'),
(3, 'Breyner', 3, '112135321132', 'breynerbohoquez@gmail.com', '$2y$10$rNN3BHDsvNmDfxZwhAYVzOfgUq4klMLCX882I6LOxmnH4XBHHS/ri', '2026-05-14 17:59:17', '2026-05-14 17:59:17', 3, 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num_habitacion` (`num_habitacion`),
  ADD KEY `fk_habitaciones_categorias` (`id_categorias`),
  ADD KEY `fk_habitaciones_estados` (`id_estado`);

--
-- Indices de la tabla `metodos_de_pago`
--
ALTER TABLE `metodos_de_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkd_reservas_usuarios` (`id_users`),
  ADD KEY `fkd_reservas_habitacion` (`id_habitacion`),
  ADD KEY `fkd_reservas_metodos_de_pago` (`id_metodo_pago`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_de_documentos`
--
ALTER TABLE `tipos_de_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num_document` (`num_document`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tipos_de_documentos` (`tipos_de_documentos`),
  ADD KEY `fk_usuarios_roles` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `metodos_de_pago`
--
ALTER TABLE `metodos_de_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipos_de_documentos`
--
ALTER TABLE `tipos_de_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `fk_habitaciones_categorias` FOREIGN KEY (`id_categorias`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_habitaciones_estados` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fkd_reservas_habitacion` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkd_reservas_metodos_de_pago` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodos_de_pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkd_reservas_usuarios` FOREIGN KEY (`id_users`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipos_de_documentos`) REFERENCES `tipos_de_documentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
