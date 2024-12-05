-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2024 a las 03:15:27
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
-- Base de datos: `project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `pabellon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `codigo`, `pabellon`) VALUES
(1, 'B-3', 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios`
--

CREATE TABLE `medios` (
  `id` int(11) NOT NULL,
  `tipo_medio_id_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medios`
--

INSERT INTO `medios` (`id`, `tipo_medio_id_id`, `cantidad`) VALUES
(1, 2, 0),
(2, 2, 0),
(3, 1, 3),
(4, 1, 0),
(5, 1, 1),
(6, 2, 1),
(7, 1, 10),
(8, 2, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id` int(11) NOT NULL,
  `usuario_id_id` int(11) NOT NULL,
  `medios_id_id` int(11) NOT NULL,
  `aulas_id_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(30) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id`, `usuario_id_id`, `medios_id_id`, `aulas_id_id`, `descripcion`, `fecha`, `estado`, `hora_inicio`, `hora_final`) VALUES
(1, 2, 1, 1, 'pichula', '2024-12-03', 'Cancelado', '01:00:00', '02:00:00'),
(2, 7, 1, 1, 'pichula2', '2024-12-08', 'Reservado', '01:35:00', '03:35:00'),
(3, 2, 1, 1, 'zzz', '2024-12-05', 'Cancelado', '01:31:00', '02:32:00'),
(4, 2, 1, 1, 'pichula3', '2024-12-04', 'Reservado', '03:10:00', '05:10:00'),
(5, 14, 1, 1, 'xd', '2024-12-04', 'Cancelado', '03:25:00', '05:25:00'),
(6, 14, 1, 1, 'xd', '2024-12-04', 'Cancelado', '02:28:00', '03:28:00'),
(7, 14, 2, 1, 'pichula', '2024-12-03', 'Cancelado', '07:10:00', '09:10:00'),
(8, 14, 2, 1, 'pichula', '2024-12-03', 'Cancelado', '07:16:00', '09:17:00'),
(9, 14, 1, 1, 'pichula2', '2024-12-02', 'Cancelado', '09:17:00', '10:17:00'),
(10, 14, 1, 1, 'pichula2', '2024-12-02', 'Cancelado', '11:18:00', '12:18:00'),
(11, 14, 2, 1, 'pichula', '2024-12-05', 'Cancelado', '09:07:00', '10:07:00'),
(12, 14, 2, 1, 'pichula', '2024-12-06', 'Cancelado', '07:10:00', '09:10:00'),
(13, 14, 1, 1, 'pichula', '2024-12-02', 'Cancelado', '01:12:00', '01:12:00'),
(14, 14, 2, 1, 'pichula', '2024-12-10', 'Cancelado', '22:14:00', '00:15:00'),
(15, 14, 1, 1, 'pichula', '2024-12-01', 'Cancelado', '12:12:00', '12:12:00'),
(16, 14, 1, 1, 'pichula', '2024-12-12', 'Cancelado', '12:12:00', '12:12:00'),
(17, 14, 1, 1, 'pichula', '2024-12-03', 'Cancelado', '06:21:00', '09:15:00'),
(18, 14, 1, 1, 'pichula', '2024-12-03', 'Cancelado', '07:20:00', '08:20:00'),
(19, 14, 1, 1, 'pichula', '2024-12-03', 'Cancelado', '07:20:00', '10:20:00'),
(20, 14, 1, 1, 'pichula', '2024-12-04', 'Cancelado', '16:20:00', '18:08:00'),
(21, 14, 1, 1, 'pichula', '2024-12-03', 'Cancelado', '17:20:00', '18:00:00'),
(22, 14, 1, 1, 'pichula2', '2024-12-03', 'Cancelado', '17:00:00', '18:10:00'),
(23, 14, 1, 1, 'pichula', '2024-12-03', 'Cancelado', '07:20:00', '10:00:00'),
(24, 14, 1, 1, 'pichula', '2024-12-03', 'Cancelado', '07:20:00', '10:07:00'),
(25, 14, 1, 1, 'pichula2', '2024-12-03', 'Reservado', '07:20:00', '10:00:00'),
(26, 14, 1, 1, 'pichula', '2024-12-03', 'Reservado', '07:20:00', '10:20:00'),
(27, 14, 1, 1, 'pichula', '2024-12-03', 'Reservado', '07:20:00', '09:00:00'),
(28, 14, 1, 1, 'pichula', '2024-12-03', 'Reservado', '07:20:00', '09:00:00'),
(29, 16, 2, 1, 'fgfsfsfnfgh', '2024-12-04', 'Reservado', '07:20:00', '09:00:00'),
(30, 16, 4, 1, 'hfgjgfgf', '2024-12-03', 'Reservado', '07:20:00', '09:00:00'),
(31, 16, 3, 1, 'dsf', '2024-12-05', 'Cancelado', '09:44:00', '10:44:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `medios_id` int(11) NOT NULL,
  `aulas_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(30) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `usuario_id`, `medios_id`, `aulas_id`, `descripcion`, `fecha`, `estado`, `hora_inicio`, `hora_final`) VALUES
(1, 2, 1, 1, 'xd', '2024-12-03', 'Reservado', '18:00:00', '20:00:00'),
(2, 2, 1, 1, 'awdsx', '2024-12-04', 'Reservado', '18:00:00', '25:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_medio`
--

CREATE TABLE `tipo_medio` (
  `id` int(11) NOT NULL,
  `nombre_medio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_medio`
--

INSERT INTO `tipo_medio` (`id`, `nombre_medio`) VALUES
(1, 'Data'),
(2, 'HDMI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `nombre_tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre_tipo`) VALUES
(1, 'Administrador'),
(2, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariouni`
--

CREATE TABLE `usuariouni` (
  `id` int(11) NOT NULL,
  `tipo_usuario_id` int(11) DEFAULT NULL,
  `username` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuariouni`
--

INSERT INTO `usuariouni` (`id`, `tipo_usuario_id`, `username`, `roles`, `password`, `nombre`, `apellido`) VALUES
(2, 2, 'retfly2', '[]', '$2y$13$rj8g1x1AxvIvXhAyB0qadeYYdeLpe5nGOW9XEdYc5xmO0IZeNkCHu', 'potentexd:v', 'retfly'),
(3, 1, 'retfly3', '[]', '$2y$13$Fez6E2STSnRB8st//FeOr.jk.A3sGzl1DiSzfQs4QLfvndGzK3q46', 'retfly3', 'retfly3'),
(4, 1, 'retfly4', '[]', '$2y$13$q7tWKQsXW2Sa1nnxNcjfCOq8Kk0XGgLziAoTNq6.r7rmt.3Hi1fGq', 'retfly4', 'retfly4'),
(5, 1, 'retfly5', '[]', '$2y$13$IsWZ5IF6fQy4iTi.yq63teKxKYV62Dfu4IAJdeisTo5WOl5nLpL1m', 'retfly4', 'retfly4'),
(6, 1, 'retfly6', '[]', '$2y$13$aXC2CViNy7ODv6WasDKYT.IW9eEy3kQ.fFsRkfTxtNEWarn3lTANe', 'retfly6', 'retfly6'),
(7, 1, 'RetFly', '[]', '$2y$13$yoh.oEybLH9ijeqFdW7u4OGDuRpZklRdw4EwoKlpoO8nfDWkt3p6a', 'RetFly', 'RetFly'),
(8, 1, 'retfly7', '[]', '$2y$13$4pwaI78gl5fJoHQlxz/x0egteHtx99ZCV9UUBE5wLYNqbA7zZKLwu', 'retfly7', 'retfly7'),
(9, 1, 'pepipto_destroyer', '[]', 'pepipto_destroyer', 'pepito', 'destroyer'),
(10, 2, 'RetFly1', '[]', 'RetFly1', 'RetFly1', 'RetFly1'),
(14, 2, 'docente', '[]', '$2y$13$FI8EeLZgSzfD0Hr0LiVigO8aWPYPpQSeUXjLqaT1wo5qhOV2eENdS', 'docente', 'docente'),
(15, 2, 'Alvaro', '[]', 'Alvaro', 'Alvaro', 'Flores'),
(16, 2, 'Yarel', '[]', '$2y$13$Er13PMjn/JuD1CUQ/EBdNeBLoP/KlIm7HWm5LuYg6z/4CgW8aWiyi', 'Yarel', 'Yarel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medios`
--
ALTER TABLE `medios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8C51820F5460F43` (`tipo_medio_id_id`);

--
-- Indices de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_46408D55629AF449` (`usuario_id_id`),
  ADD KEY `IDX_46408D555492A9CF` (`medios_id_id`),
  ADD KEY `IDX_46408D55D5957D83` (`aulas_id_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AA1DAB01629AF449` (`usuario_id`),
  ADD KEY `IDX_AA1DAB015492A9CF` (`medios_id`),
  ADD KEY `IDX_AA1DAB01D5957D83` (`aulas_id`);

--
-- Indices de la tabla `tipo_medio`
--
ALTER TABLE `tipo_medio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuariouni`
--
ALTER TABLE `usuariouni`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_USERNAME` (`username`),
  ADD KEY `IDX_DF126AD24ABE41B6` (`tipo_usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medios`
--
ALTER TABLE `medios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_medio`
--
ALTER TABLE `tipo_medio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuariouni`
--
ALTER TABLE `usuariouni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medios`
--
ALTER TABLE `medios`
  ADD CONSTRAINT `FK_8C51820F5460F43` FOREIGN KEY (`tipo_medio_id_id`) REFERENCES `tipo_medio` (`id`);

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `FK_46408D555492A9CF` FOREIGN KEY (`medios_id_id`) REFERENCES `medios` (`id`),
  ADD CONSTRAINT `FK_46408D55629AF449` FOREIGN KEY (`usuario_id_id`) REFERENCES `usuariouni` (`id`),
  ADD CONSTRAINT `FK_46408D55D5957D83` FOREIGN KEY (`aulas_id_id`) REFERENCES `aulas` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `FK_AA1DAB015492A9CF` FOREIGN KEY (`medios_id`) REFERENCES `medios` (`id`),
  ADD CONSTRAINT `FK_AA1DAB01629AF449` FOREIGN KEY (`usuario_id`) REFERENCES `usuariouni` (`id`),
  ADD CONSTRAINT `FK_AA1DAB01D5957D83` FOREIGN KEY (`aulas_id`) REFERENCES `aulas` (`id`);

--
-- Filtros para la tabla `usuariouni`
--
ALTER TABLE `usuariouni`
  ADD CONSTRAINT `FK_DF126AD24ABE41B6` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
