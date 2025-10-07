-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2025 a las 21:11:03
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
-- Base de datos: `deportivo_patagones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL COMMENT 'Identificador único del cliente',
  `full_name` varchar(100) NOT NULL COMMENT 'Nombre completo del cliente',
  `phone` varchar(20) DEFAULT NULL COMMENT 'Teléfono del cliente',
  `member` tinyint(1) DEFAULT 0 COMMENT 'Indica si el cliente es socio',
  `member_id` int(11) DEFAULT NULL COMMENT 'ID de socio si aplica'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de clientes';

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`client_id`, `full_name`, `phone`, `member`, `member_id`) VALUES
(1, 'John Doe', '123456789', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `detail_id` int(11) NOT NULL COMMENT 'Identificador único del detalle de factura',
  `header_id` int(11) NOT NULL COMMENT 'ID del encabezado de la factura al que pertenece',
  `rental_id` int(11) DEFAULT NULL COMMENT 'ID del alquiler asociado',
  `description` varchar(200) DEFAULT NULL COMMENT 'Descripción del concepto facturado',
  `quantity` int(11) DEFAULT 1 COMMENT 'Cantidad de unidades',
  `unit_price` decimal(10,2) NOT NULL COMMENT 'Precio por unidad',
  `subtotal` decimal(10,2) NOT NULL COMMENT 'Subtotal del detalle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Detalles de cada factura';

--
-- Volcado de datos para la tabla `invoice_detail`
--

INSERT INTO `invoice_detail` (`detail_id`, `header_id`, `rental_id`, `description`, `quantity`, `unit_price`, `subtotal`) VALUES
(1, 1, 1, 'Court rental', 1, 150.00, 150.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_header`
--

CREATE TABLE `invoice_header` (
  `header_id` int(11) NOT NULL COMMENT 'Identificador único del encabezado de factura',
  `client_id` int(11) NOT NULL COMMENT 'Cliente asociado a la factura',
  `issue_date` datetime DEFAULT current_timestamp() COMMENT 'Fecha de emisión de la factura',
  `status` varchar(50) DEFAULT 'Pending' COMMENT 'Estado de la factura (Pagada, Pendiente, etc.)',
  `payment_method` varchar(50) DEFAULT NULL COMMENT 'Método de pago (efectivo, tarjeta, etc.)',
  `subtotal` decimal(10,2) NOT NULL COMMENT 'Subtotal de la factura',
  `discount` decimal(10,2) DEFAULT 0.00 COMMENT 'Descuento aplicado',
  `total` decimal(10,2) NOT NULL COMMENT 'Total final de la factura'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Encabezado de facturas emitidas';

--
-- Volcado de datos para la tabla `invoice_header`
--

INSERT INTO `invoice_header` (`header_id`, `client_id`, `issue_date`, `status`, `payment_method`, `subtotal`, `discount`, `total`) VALUES
(1, 1, '2025-10-07 16:06:25', 'Paid', 'Credit Card', 150.00, 10.00, 140.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentals`
--

CREATE TABLE `rentals` (
  `rental_id` int(11) NOT NULL COMMENT 'Identificador único del alquiler',
  `client_id` int(11) NOT NULL COMMENT 'Cliente que realiza el alquiler',
  `total_amount` decimal(10,2) NOT NULL COMMENT 'Monto total del alquiler',
  `advance_payment` decimal(10,2) DEFAULT 0.00 COMMENT 'Anticipo pagado por el cliente',
  `status` varchar(50) DEFAULT 'Pending' COMMENT 'Estado del alquiler (Pendiente, Pagado, etc.)',
  `registration_date` datetime DEFAULT current_timestamp() COMMENT 'Fecha de registro del alquiler'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de alquileres';

--
-- Volcado de datos para la tabla `rentals`
--

INSERT INTO `rentals` (`rental_id`, `client_id`, `total_amount`, `advance_payment`, `status`, `registration_date`) VALUES
(1, 1, 150.00, 50.00, 'Active', '2025-10-07 16:06:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shifts`
--

CREATE TABLE `shifts` (
  `shift_id` int(11) NOT NULL COMMENT 'Identificador único del turno',
  `rental_id` int(11) NOT NULL COMMENT 'ID del alquiler asociado al turno',
  `start_date` datetime NOT NULL COMMENT 'Fecha y hora de inicio del turno',
  `end_date` datetime NOT NULL COMMENT 'Fecha y hora de finalización del turno',
  `reservation_type` varchar(50) DEFAULT NULL COMMENT 'Tipo de reserva (por hora, día, etc.)',
  `day_of_week` varchar(20) DEFAULT NULL COMMENT 'Día de la semana del turno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Turnos o reservas asociados a los alquileres';

--
-- Volcado de datos para la tabla `shifts`
--

INSERT INTO `shifts` (`shift_id`, `rental_id`, `start_date`, `end_date`, `reservation_type`, `day_of_week`) VALUES
(1, 1, '2025-10-10 14:00:00', '2025-10-10 15:00:00', 'Hourly', 'Friday');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Identificador único del usuario',
  `username` varchar(50) NOT NULL COMMENT 'Nombre de usuario para iniciar sesión',
  `password` varchar(255) NOT NULL COMMENT 'Contraseña cifrada del usuario',
  `email` varchar(100) DEFAULT NULL COMMENT 'Correo electrónico del usuario',
  `first_name` varchar(50) DEFAULT NULL COMMENT 'Nombre del usuario',
  `last_name` varchar(50) DEFAULT NULL COMMENT 'Apellido del usuario',
  `phone` varchar(20) DEFAULT NULL COMMENT 'Teléfono del usuario',
  `address` varchar(150) DEFAULT NULL COMMENT 'Dirección del usuario',
  `role` varchar(50) DEFAULT 'user' COMMENT 'Rol del usuario (admin, user, etc.)',
  `status` varchar(50) DEFAULT 'active' COMMENT 'Estado del usuario (activo, inactivo)',
  `profile_picture` varchar(255) DEFAULT NULL COMMENT 'Ruta o URL de la foto de perfil',
  `last_login` datetime DEFAULT NULL COMMENT 'Último inicio de sesión',
  `created_at` datetime DEFAULT current_timestamp() COMMENT 'Fecha de creación del usuario',
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Última actualización del registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Usuarios del sistema';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `phone`, `address`, `role`, `status`, `profile_picture`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1234', 'admin@example.com', 'System', 'Admin', '000000000', NULL, 'admin', 'active', NULL, NULL, '2025-10-07 16:06:25', '2025-10-07 16:06:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indices de la tabla `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `header_id` (`header_id`),
  ADD KEY `rental_id` (`rental_id`);

--
-- Indices de la tabla `invoice_header`
--
ALTER TABLE `invoice_header`
  ADD PRIMARY KEY (`header_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indices de la tabla `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indices de la tabla `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`shift_id`),
  ADD KEY `rental_id` (`rental_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del cliente', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del detalle de factura', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `invoice_header`
--
ALTER TABLE `invoice_header`
  MODIFY `header_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del encabezado de factura', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del alquiler', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `shifts`
--
ALTER TABLE `shifts`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del turno', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del usuario', AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `invoice_detail_ibfk_1` FOREIGN KEY (`header_id`) REFERENCES `invoice_header` (`header_id`),
  ADD CONSTRAINT `invoice_detail_ibfk_2` FOREIGN KEY (`rental_id`) REFERENCES `rentals` (`rental_id`);

--
-- Filtros para la tabla `invoice_header`
--
ALTER TABLE `invoice_header`
  ADD CONSTRAINT `invoice_header_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Filtros para la tabla `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Filtros para la tabla `shifts`
--
ALTER TABLE `shifts`
  ADD CONSTRAINT `shifts_ibfk_1` FOREIGN KEY (`rental_id`) REFERENCES `rentals` (`rental_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
