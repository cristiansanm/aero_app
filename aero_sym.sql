-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-02-2021 a las 10:23:38
-- Versión del servidor: 8.0.23-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aero_sym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviones`
--

CREATE TABLE `aviones` (
  `id` int NOT NULL,
  `baseavion_id` int DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disponible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aviones`
--

INSERT INTO `aviones` (`id`, `baseavion_id`, `tipo`, `disponible`) VALUES
(1, 1, 'boeing 787', 0),
(2, 5, 'boeing 777', 1),
(3, 3, 'boeing 767', 0),
(4, 4, 'boeing 757', 0),
(5, 2, 'boeing 747', 1),
(6, 1, 'boeing 737', 1),
(7, 3, 'boeing 727', 0),
(8, 4, 'an 225', 0),
(9, 2, 'a 380', 1),
(10, 5, 'a 320', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bases`
--

CREATE TABLE `bases` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bases`
--

INSERT INTO `bases` (`id`, `nombre`) VALUES
(1, 'carroll'),
(2, 'rose'),
(3, 'nekoma'),
(4, 'maunsell'),
(5, 'hetel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `nombre`) VALUES
(1, 'madrid'),
(2, 'barcelona'),
(3, 'paris'),
(4, 'lima'),
(5, 'alicante'),
(6, 'milan'),
(7, 'torino'),
(8, 'lisboa'),
(9, 'londres'),
(10, 'bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210223015305', '2021-02-23 02:53:24', 1078),
('DoctrineMigrations\\Version20210223015941', '2021-02-23 02:59:47', 353),
('DoctrineMigrations\\Version20210223020432', '2021-02-23 03:04:36', 578),
('DoctrineMigrations\\Version20210223021647', '2021-02-23 03:16:55', 544),
('DoctrineMigrations\\Version20210225081954', '2021-02-25 09:20:11', 987),
('DoctrineMigrations\\Version20210225082223', '2021-02-25 09:22:28', 243);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`id`, `nombre`) VALUES
(1, 'piloto'),
(2, 'copiloto'),
(3, 'ingeniero'),
(4, 'auxiliar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int NOT NULL,
  `funcion_id` int DEFAULT NULL,
  `basepersonal_id` int DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `funcion_id`, `basepersonal_id`, `nombre`, `apellido`) VALUES
(1, 1, 1, 'alonso', 'sanchez'),
(2, 2, 1, 'pedro', 'arevalo'),
(3, 3, 1, 'juan ', 'flores'),
(4, 4, 1, 'soledad', 'martinez'),
(5, 1, 2, 'ana ', 'perez'),
(6, 2, 2, 'alejandro', 'arrazabal'),
(7, 3, 2, 'edison ', 'guerrero'),
(8, 4, 2, 'alberto ', 'rodriguez'),
(9, 1, 3, 'jean', 'poblano'),
(10, 2, 3, 'solange ', 'penco'),
(11, 3, 3, 'rosa ', 'casado'),
(12, 4, 3, 'penelope', 'benavente'),
(13, 1, 4, 'arley', 'reyes'),
(14, 2, 4, 'martin', 'vizcarra'),
(15, 3, 4, 'cristina', 'saenz'),
(16, 4, 3, 'carlos', 'santisteban'),
(17, 1, 5, 'javier', 'sagastegui'),
(18, 2, 5, 'liz ', 'saenz'),
(19, 3, 5, 'rocio', 'molina'),
(20, 4, 5, 'oscar', 'villamarin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nombre`) VALUES
(1, 'cristian.admin@aero.es', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$0lfHaBXg0rR3OsnmwpqI/A$rEEeizQKag1y9U2V3pzBn+MLTRL996PKl5yDKKoQBoI', 'Cristian'),
(2, 'arley.user@aero.es', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$gIzw004aQKgBlRxQZQHcVw$CMJBq51peQDwYPo3aGc2NP7D1CZO295Dn/WZTde9nC0', 'Arley');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int NOT NULL,
  `origen_id` int DEFAULT NULL,
  `destino_id` int DEFAULT NULL,
  `avion_id` int DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `origen_id`, `destino_id`, `avion_id`, `fecha`, `hora`) VALUES
(1, 1, 2, 1, '2020-12-01', '08:30:00'),
(2, 5, 6, 5, '2020-12-03', '13:00:00'),
(3, 4, 3, 1, '2020-12-05', '15:50:00'),
(4, 9, 10, 3, '2020-12-07', '16:40:00'),
(5, 6, 1, 7, '2020-12-09', '10:20:00'),
(6, 7, 8, 10, '2020-12-11', '09:45:00'),
(7, 2, 9, 6, '2020-12-13', '11:35:00'),
(8, 10, 7, 2, '2020-12-15', '17:25:00'),
(9, 3, 7, 6, '2020-12-17', '18:50:00'),
(10, 4, 5, 8, '2020-12-19', '06:00:00'),
(11, 2, 9, 4, '2020-12-21', '07:10:00'),
(12, 9, 6, 3, '2020-12-23', '10:15:00'),
(13, 8, 10, 1, '2020-12-25', '12:00:00'),
(14, 4, 10, 5, '2020-12-27', '23:00:00'),
(15, 1, 8, 5, '2020-12-29', '15:00:00'),
(16, 3, 8, 2, '2020-12-31', '19:20:00'),
(17, 3, 5, 6, '2021-01-02', '17:00:00'),
(18, 3, 6, 10, '2021-01-04', '20:40:00'),
(19, 9, 10, 9, '2021-01-06', '12:50:00'),
(20, 5, 7, 4, '2021-01-08', '00:30:00'),
(21, 6, 2, 7, '2021-01-10', '11:00:00'),
(22, 10, 3, 2, '2021-01-12', '09:50:00'),
(23, 1, 7, 4, '2021-01-12', '15:00:00'),
(24, 4, 1, 3, '2021-01-14', '18:45:00'),
(25, 2, 9, 5, '2021-01-16', '13:10:00'),
(26, 3, 2, 1, '2021-01-16', '11:25:00'),
(27, 1, 7, 8, '2021-01-18', '19:50:00'),
(28, 3, 5, 6, '2021-01-20', '14:05:00'),
(29, 5, 6, 3, '2021-01-22', '16:40:00'),
(30, 7, 1, 8, '2021-01-24', '11:00:00'),
(31, 4, 7, 3, '2021-01-26', '07:45:00'),
(32, 10, 5, 4, '2021-01-28', '05:30:00'),
(33, 9, 1, 10, '2021-01-30', '16:00:00'),
(34, 8, 5, 8, '2021-02-01', '20:00:00'),
(35, 6, 4, 5, '2021-02-03', '06:30:00'),
(36, 3, 4, 9, '2021-02-05', '12:00:00'),
(37, 6, 10, 7, '2021-02-07', '19:00:00'),
(38, 7, 10, 3, '2021-02-09', '17:10:00'),
(39, 6, 7, 1, '2021-02-11', '15:15:00'),
(40, 1, 5, 4, '2021-02-13', '10:20:00'),
(41, 7, 2, 6, '2021-02-15', '23:55:00'),
(42, 9, 2, 9, '2021-02-17', '08:40:00'),
(43, 6, 5, 7, '2021-02-19', '15:35:00'),
(44, 7, 4, 5, '2021-02-21', '10:00:00'),
(45, 1, 2, 1, '2021-02-23', '13:00:00'),
(46, 5, 9, 2, '2021-02-25', '16:30:00'),
(47, 8, 1, 3, '2021-02-27', '06:20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos_personal`
--

CREATE TABLE `vuelos_personal` (
  `id` int NOT NULL,
  `vuelo_id_id` int DEFAULT NULL,
  `piloto_id` int DEFAULT NULL,
  `copiloto_id` int DEFAULT NULL,
  `ingeniero_id` int DEFAULT NULL,
  `auxiliar_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vuelos_personal`
--

INSERT INTO `vuelos_personal` (`id`, `vuelo_id_id`, `piloto_id`, `copiloto_id`, `ingeniero_id`, `auxiliar_id`) VALUES
(1, 1, 1, 2, 3, 4),
(2, 2, 17, 18, 19, 20),
(3, 3, 5, 6, 7, 8),
(4, 4, 13, 14, 15, 16),
(5, 5, 9, 10, 11, 12),
(6, 6, 17, 18, 19, 20),
(7, 7, 1, 2, 3, 4),
(8, 8, 13, 14, 15, 16),
(9, 9, 5, 6, 7, 8),
(10, 10, 9, 10, 11, 12),
(11, 11, 1, 2, 3, 4),
(12, 12, 9, 10, 11, 12),
(13, 13, 13, 14, 15, 16),
(14, 14, 17, 18, 19, 20),
(15, 15, 9, 10, 11, 12),
(16, 16, 1, 2, 3, 4),
(17, 17, 5, 6, 7, 8),
(18, 18, 17, 18, 19, 20),
(19, 19, 1, 2, 3, 4),
(20, 20, 13, 14, 15, 16),
(21, 21, 9, 10, 11, 12),
(22, 22, 1, 2, 3, 4),
(23, 23, 17, 18, 19, 20),
(24, 24, 5, 6, 7, 8),
(25, 25, 13, 14, 15, 16),
(26, 26, 1, 2, 3, 4),
(27, 27, 9, 10, 11, 12),
(28, 28, 5, 6, 7, 8),
(29, 29, 13, 14, 15, 16),
(30, 30, 17, 18, 19, 20),
(31, 31, 9, 10, 11, 12),
(32, 32, 13, 14, 15, 16),
(33, 33, 13, 14, 15, 16),
(34, 34, 1, 2, 3, 4),
(35, 35, 9, 10, 11, 12),
(36, 36, 17, 18, 19, 20),
(37, 37, 9, 10, 11, 12),
(38, 38, 1, 2, 3, 4),
(39, 39, 17, 18, 19, 20),
(40, 40, 5, 6, 7, 8),
(41, 41, 5, 6, 7, 8),
(42, 42, 17, 18, 19, 20),
(43, 43, 13, 14, 15, 16),
(44, 44, 1, 2, 3, 4),
(45, 45, 9, 10, 11, 12),
(46, 46, 1, 2, 3, 4),
(47, 47, 5, 6, 7, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aviones`
--
ALTER TABLE `aviones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_97EDDD4C0F5E058` (`baseavion_id`);

--
-- Indices de la tabla `bases`
--
ALTER TABLE `bases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F18A6D848C185C36` (`funcion_id`),
  ADD KEY `IDX_F18A6D84ADB22A3D` (`basepersonal_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3BD7425B93529ECD` (`origen_id`),
  ADD KEY `IDX_3BD7425BE4360615` (`destino_id`),
  ADD KEY `IDX_3BD7425B80BBB841` (`avion_id`);

--
-- Indices de la tabla `vuelos_personal`
--
ALTER TABLE `vuelos_personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_442CF87AC580F9FB` (`vuelo_id_id`),
  ADD KEY `IDX_442CF87A9AAD4A8D` (`piloto_id`),
  ADD KEY `IDX_442CF87AFEF9400B` (`copiloto_id`),
  ADD KEY `IDX_442CF87A13629BA4` (`ingeniero_id`),
  ADD KEY `IDX_442CF87AF1EB3E5E` (`auxiliar_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aviones`
--
ALTER TABLE `aviones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `bases`
--
ALTER TABLE `bases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `vuelos_personal`
--
ALTER TABLE `vuelos_personal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aviones`
--
ALTER TABLE `aviones`
  ADD CONSTRAINT `FK_97EDDD4C0F5E058` FOREIGN KEY (`baseavion_id`) REFERENCES `bases` (`id`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `FK_F18A6D848C185C36` FOREIGN KEY (`funcion_id`) REFERENCES `funciones` (`id`),
  ADD CONSTRAINT `FK_F18A6D84ADB22A3D` FOREIGN KEY (`basepersonal_id`) REFERENCES `bases` (`id`);

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD CONSTRAINT `FK_3BD7425B80BBB841` FOREIGN KEY (`avion_id`) REFERENCES `aviones` (`id`),
  ADD CONSTRAINT `FK_3BD7425B93529ECD` FOREIGN KEY (`origen_id`) REFERENCES `ciudades` (`id`),
  ADD CONSTRAINT `FK_3BD7425BE4360615` FOREIGN KEY (`destino_id`) REFERENCES `ciudades` (`id`);

--
-- Filtros para la tabla `vuelos_personal`
--
ALTER TABLE `vuelos_personal`
  ADD CONSTRAINT `FK_442CF87A13629BA4` FOREIGN KEY (`ingeniero_id`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `FK_442CF87A9AAD4A8D` FOREIGN KEY (`piloto_id`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `FK_442CF87AC580F9FB` FOREIGN KEY (`vuelo_id_id`) REFERENCES `vuelos` (`id`),
  ADD CONSTRAINT `FK_442CF87AF1EB3E5E` FOREIGN KEY (`auxiliar_id`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `FK_442CF87AFEF9400B` FOREIGN KEY (`copiloto_id`) REFERENCES `personal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
