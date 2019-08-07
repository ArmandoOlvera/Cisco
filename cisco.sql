-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-08-2019 a las 13:04:39
-- Versión del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cisco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academia`
--

CREATE TABLE `academia` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direccion2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `academia`
--

INSERT INTO `academia` (`id`, `id_usuario`, `nombre`, `direccion`, `condicion`, `created_at`, `updated_at`, `direccion2`, `pais`, `estado`, `ciudad`, `codigo`, `url`, `institucion`) VALUES
(1, 3, 'CBTIS 271', 'Direccion de ejemplos', 0, '2019-07-13 00:00:00', '2019-07-13 00:00:00', 'Direccion2', 'Mexico', 'Tamaulipas', 'Victoria', '87049', 'goldenwind.me', 'Publica'),
(2, 10, 'CBTIS 236', 'Direccion de ejemplos', 1, '2019-07-13 00:00:00', '2019-07-13 00:00:00', 'Direccion 22', 'Mexico', 'Otro estado', 'Morelos', '87087', 'elizarlo.me', 'Privada'),
(3, 1, 'CBTIS 127', 'Direccion de ejemplos', 1, '2019-07-13 00:00:00', '2019-07-14 17:00:24', 'Direcion222', 'Mexico', 'Tamaulipas', 'Victoria', '87032', 'mariorc.com.mx', 'De gobierno'),
(6, 68, 'Academia NUevesita', 'Caaaa', 1, '2019-07-19 21:50:43', '2019-07-23 17:15:53', 'aaaaaaa', 'Mexico', 'Tamaulipas', 'Victoria', '1234123', 'No', 'Publica'),
(30, 11, 'CBTIS NUEVO', 'Direccion 123', 1, '2019-07-29 13:31:52', '2019-07-29 13:31:52', 'aaaaaa', 'MEXICO', 'TAMPS', 'VIC', '2343', 'aiwjdlaiwdj', 'Privada'),
(31, 2, 'qwe', 'qwe', 1, '2019-07-29 13:43:07', '2019-07-29 13:43:07', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'Privada'),
(32, 14, 'COBAT 109', 'afwf', 1, '2019-07-29 14:27:01', '2019-07-29 14:27:01', 'jkkl', 'kjklj', 'kjl', 'kjk', '99', 'klk', 'Gobierno'),
(33, 70, 'COPAVISA 119', 'Centro Universitario Adolfo López Mateos', 1, '2019-08-05 08:31:54', '2019-08-05 08:32:29', 'kk', 'México', 'TAMAULIPAS', 'Victoria', '87000', 'k', 'Gobierno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'Prueba', 'Preuba', 0),
(2, 'Prueba2', 'Prueba2', 1),
(3, 'Prueba3', 'Prueba3', 0),
(4, 'Prueba4', 'Prueba4', 0),
(5, 'ola', '1', 1),
(6, 'grupo nuevo', '1', 1),
(7, 'grupo', 'descripcion', 1),
(8, 'Nevi', 'asdasd', 1),
(9, 'Nuevos2', 'Nuevox2', 1),
(10, 'Genaro Juan', 'de', 1),
(11, 'g8', 'de', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `grupos_resultados_aprobado`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `grupos_resultados_aprobado` (
`nombreacademia` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `grupos_resultados_reprobado`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `grupos_resultados_reprobado` (
`nombreacademia` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `id_academia` int(11) UNSIGNED NOT NULL,
  `id_instructor` int(11) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `id_materia` int(11) UNSIGNED NOT NULL,
  `fecha_oc` date NOT NULL,
  `condicion` tinyint(1) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `hora_preferida` varchar(50) NOT NULL,
  `id_grupo` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `id_academia`, `id_instructor`, `status`, `fecha_inicio`, `id_materia`, `fecha_oc`, `condicion`, `created_at`, `updated_at`, `hora_preferida`, `id_grupo`) VALUES
(1, 1, 1, 'Reprobado', '2019-07-02', 1, '2019-07-01', 1, NULL, '2019-07-29', '17:00', 8),
(2, 3, 2, 'Aprobado', '2019-07-12', 5, '2019-07-17', 1, '2019-07-29', '2019-07-29', '17:00', 8),
(3, 2, 3, 'Espera', '2019-07-11', 5, '2019-07-31', 1, '2019-07-29', '2019-07-29', '17:00', 7),
(4, 1, 2, 'Espera', '2019-07-25', 3, '2019-07-01', 1, '2019-07-29', '2019-07-29', '17:00', 6),
(5, 2, 2, 'Reprobado', '2019-07-01', 4, '2019-07-17', 0, '2019-07-29', '2019-07-29', '17:00', 9),
(6, 6, 3, 'Reprobado', '2019-07-16', 4, '2019-07-31', 0, '2019-07-29', '2019-07-29', '17:00', 5),
(7, 1, 7, 'Espera', '2019-08-09', 5, '2019-08-23', 0, '2019-08-05', '2019-08-05', '17:00', 11),
(8, 31, 7, 'Aprobado', '2019-08-09', 5, '2019-08-23', 0, '2019-08-05', '2019-08-05', '17:00', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_academia` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apellido` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oc` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`id`, `id_academia`, `nombre`, `telefono`, `email`, `condicion`, `created_at`, `updated_at`, `apellido`, `oc`) VALUES
(1, 1, 'Instructor Juancho', '8341231243', 'juancho@hotmail.com', 0, '2019-07-15 00:00:00', '2019-07-15 00:00:00', ' Perez', 0),
(2, 1, 'Instructor Juancho6', '8341231246', 'juancho2@hotmail.com', 1, '2019-07-15 00:00:00', '2019-07-15 22:32:50', 'Perez6', 0),
(3, 1, 'Pedro2', '3423423423', 'ped@gm.com', 0, '2019-07-15 22:33:20', '2019-07-29 13:35:20', 'LOpez', 0),
(4, 1, 'sdfr', '234234', 'sdfsdf@asd.com', 1, '2019-07-29 13:39:42', '2019-07-29 13:39:42', 'sdf', NULL),
(5, 1, 'nn', 'nn', 'systemas@gmail.com', 1, '2019-07-29 14:28:21', '2019-07-29 14:28:21', ',m,', NULL),
(6, 1, 'jj', 'p8', 'systemas@gmail.comsa', 1, '2019-07-29 14:28:44', '2019-07-29 14:28:44', 'jj', NULL),
(7, 33, 'Mario', '56789', 'mhrodriguez@docentes.uat.edu.mx', 1, '2019-08-05 08:32:48', '2019-08-05 08:32:48', 'Rodriguez', NULL),
(9, 33, 'kk', '890jjjj', 'systejmas@gmail.com', 1, '2019-08-05 08:33:14', '2019-08-05 08:33:14', 'ii', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'Curso de Orientacion', 1, '2019-07-15', '2019-07-15 00:00:00'),
(2, 'CNNA 1', 1, '2019-07-15', '2019-07-15 00:00:00'),
(3, 'CNNA 2', 1, '2019-07-15', '2019-07-15 00:00:00'),
(4, 'CNNA 3', 0, '2019-07-15', '2019-07-15 19:52:42'),
(5, 'CCNA 55', 1, '2019-07-15', '2019-07-15 19:52:39'),
(6, 'Materia Nueva', 1, '2019-07-25', '2019-07-25 23:12:52'),
(7, 'kkkk', 1, '2019-07-29', '2019-07-29 13:29:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_emisor` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `id_ticket`, `mensaje`, `fecha`, `id_emisor`) VALUES
(1, 1, 'Hola buen dia', '2019-07-19 00:00:00', 11),
(2, 1, 'Hola, que tal?', '2019-07-19 00:01:00', 2),
(3, 1, 'Nada, aqui nomas', '2019-07-19 20:16:48', 11),
(4, 1, 'Estas ahi?', '2019-07-19 20:18:32', 11),
(5, 1, 'Hola?', '2019-07-19 20:19:41', 11),
(6, 1, 'Si, aqui estoy, estaba atendiendo una llamada, perdon', '2019-07-19 20:20:42', 2),
(7, 2, 'HOla buenos dias', '2019-07-20 04:49:14', 11),
(8, 2, 'Hola buen dia, pasa algo?', '2019-07-20 04:49:45', 12),
(9, 1, 'sale teme cuidas', '2019-07-20 05:00:33', 11),
(12, 2, 'jdc', '2019-07-29 14:43:21', 11),
(21, 2, 'omg', '2019-07-29 14:56:39', 11),
(22, 3, 'nuevo mensaje', '2019-07-29 15:05:58', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin de Cisco que administra academias.', 1, '2019-07-10 00:00:00', '2019-07-10 00:00:00'),
(2, 'Contacto Principal', 'Rol de contacto principal.', 1, '2019-07-10 00:00:00', '2019-07-10 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol666`
--

CREATE TABLE `rol666` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol666`
--

INSERT INTO `rol666` (`id`, `nombre`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin de Cisco que administra academias.', 1, '2019-07-08 00:00:00', '2019-07-08 00:00:00'),
(2, 'Contacto Principal', 'Rol de contacto principal.', 1, '2019-07-08 00:00:00', '2019-07-08 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `id_usuario1` int(11) UNSIGNED NOT NULL,
  `id_usuario2` int(11) UNSIGNED NOT NULL,
  `asunto` varchar(250) NOT NULL,
  `fecha` date DEFAULT NULL,
  `nuevo` tinyint(1) DEFAULT '0',
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `nombre_admin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `id_usuario1`, `id_usuario2`, `asunto`, `fecha`, `nuevo`, `condicion`, `nombre_admin`) VALUES
(1, 11, 2, 'Asunto de ejemplo para mostrar en el cuadro de texto.', '2019-07-18', 0, 1, 'Admin123'),
(2, 11, 12, 'Reunion el martes', '2019-07-20', 0, 1, 'Admin123'),
(3, 11, 3, 'aaaaaaaaaaaaa', '2019-07-20', 0, 1, '[\"Admin123\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `idrol` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) DEFAULT '1',
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idioma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oc` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `idrol`, `nombre`, `telefono`, `email`, `usuario`, `password`, `condicion`, `created_at`, `updated_at`, `apellido`, `pais`, `extension`, `cargo`, `idioma`, `oc`) VALUES
(1, 1, 'Mario', '8341234567', 'mario@gmail.com', 'admin', '$2y$10$K.VGfuFpbVTXT.NC/Sd8k.8Vb/c6LYvM.kFGYeKYdKqSgH5fsn6Ua', 0, '2019-07-16', '2019-07-23 15:01:50', 'Humberto', 'Mexico', 'No', 'Docente', 'Espanol', 0),
(2, 2, 'Hiram', '8341234567', 'hiram@gmail.com', 'admin2', '$2y$10$npigKfWYb/K.O0dZSatQOeObd4nx7ZbTprISUnqHiaI/QX27NLBFm', 1, '2019-06-11', '2019-07-11 14:16:03', 'Chavez', 'Mexico', 'No', 'Docente', 'Espanol', 0),
(3, 2, 'Armando124', '8341234323', 'maro@gmail.com', 'mando', '$2y$10$HTE4b.8ltYEYKElTqpE4Bu.MZuq6DNPjpQ5N8eRKElZCLDI8IKnDq', 1, '2019-06-04', '2019-07-29 14:46:56', 'Perez', 'Mexico', 'No', 'Docente', 'Espanol', 0),
(10, 1, 'Hugo', '8347575788', 'hugo@gmail.com', 'hugo', '$2y$10$EsaBvfL2/q1K72p0HB91ku7NsvSsBQ0KwUQoqqFr7Fn5bbf0TDwZ.', 1, '2019-07-13', '2019-07-13 18:22:18', 'Lopez', 'Mexico', 'No', 'Docente', 'Espanol', 0),
(11, 1, 'Admin123', '8348484884', 'ADMIN123@gmail.com', 'admin123', '$2y$10$IW.QzOuhyVVEq7L0excOHOpUih/ZZGBNn2yQWL1pmoxBkD/B63tSi', 1, '2019-07-14', '2019-07-14 19:41:52', 'Admistoso123', 'Estados Unidos', 'No', 'Rector', 'Ingles', 0),
(12, 2, 'Contactaso', '8341234323', 'mauro@gmail.com', 'asdf', '$2y$10$NMIX6thKp59I18sboqQWm.RQVdKZoKyR.BoeskDBma2yt0sZ14qVO', 1, '2019-07-19', '2019-07-25 23:11:30', 'Contaxto', 'asdf', 'No', 'Docente', 'Espanol', 0),
(14, 1, 'Momon', '8888883888', 'armando@gmail.com', 'momonga', '$2y$10$iSCVluQPCezYTqEEMKLszervG5uyWxp.U5dxpsSCMkVF/QOKJMoRC', 1, '2019-07-25', '2019-07-25 23:44:57', 'Goal', 'Mexico', '666', 'Docente', 'Espanol', 0),
(68, 2, 'Hiram2', '8099', 'systemas@gmail.com', 'admin5', '$2y$10$.JQ4je9Aiab1.9gZJd2sZuChlLCvNxCqXPIYjAxltM.fPAsnr/sv2', 1, '2019-07-29', '2019-07-29 14:26:18', 'iuiui', 'México', 'kljlk', 'Rector', 'Mandarin', 0),
(69, 1, 'Maximo', '1010101010', 'maximo@gmail.com', 'asdasd', '$2y$10$Q3voIpq/UsOirpOry876WOr0Qbq2HmKJ7giE5bu4EoZgFzveB3Thu', 1, '2019-07-30', '2019-07-30 14:47:24', 'Decimo', 'Mexico', '10', 'Rector', 'Espanol', 0),
(70, 2, 'Marioz', 'kkk777777', 'mhrodriguez@docentes.uat.edu.mx', 'u', '$2y$10$Gp7JsG.ccumdMQsAF.g3POCXY4OfROCiRNW6gaM6W5TkT4.N2iVmy', 1, '2019-08-05', '2019-08-05 08:31:08', 'Rodriguez', 'México', '890', 'Director', 'Ingles', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users3`
--

CREATE TABLE `users3` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `idrol` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users3`
--

INSERT INTO `users3` (`id`, `usuario`, `password`, `condicion`, `idrol`, `remember_token`) VALUES
(14, 'admin', '$2y$10$npigKfWYb/K.O0dZSatQOeObd4nx7ZbTprISUnqHiaI/QX27NLBFm', 1, 1, NULL),
(10, 'almacenero', '$2y$10$u/1r8nXmf1oGVol21yzFlu5Mof7tR6xFTrE7aYsD26cYwxrPJfpAy', 1, 3, 'd9PD31agq1M3lsQ3CEybYYn5jGX2cAFl6H5YrkcoWJ23WUgEFfIiWTkh8Pc1'),
(8, 'jcarlosad7', '$2y$10$Yt1HHnF.zHONEx9ayMimCO0Tu9jUcielbsBFItHXTFL4kDSu4U.0i', 1, 1, 'QF8ZwCTFHd6HCHkgf7XKqItRUOunEBtP9hvUYuKK4DWpqxgiIUuaeBcT9sHb'),
(9, 'vendedor', '$2y$10$jZw3Eakc3kSKIyakefnW9.mpfkv0225Q5.ry7rXjM694a275Y94cu', 1, 2, '006r0AOU5RN4fgyvtgogoeL0pESBA8wvI5beJvNMkFuADJORL7qwpkjHbR55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users666`
--

CREATE TABLE `users666` (
  `id` int(10) UNSIGNED NOT NULL,
  `idrol` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users666`
--

INSERT INTO `users666` (`id`, `idrol`, `nombre`, `telefono`, `email`, `password`, `condicion`, `created_at`, `updated_at`, `usuario`) VALUES
(1, 1, 'Mario', '8341234567', 'mario@gmail.com', '$2y$10$npigKfWYb/K.O0dZSatQOeObd4nx7ZbTprISUnqHiaI/QX27NLBFm', 1, '2019-07-08 00:00:00', '2019-07-08 00:00:00', 'admin'),
(2, 2, 'Hiram', '8341234567', 'mario@gmail.com', '$2y$10$npigKfWYb/K.O0dZSatQOeObd4nx7ZbTprISUnqHiaI/QX27NLBFm', 1, '2019-07-08 00:00:00', '2019-07-08 00:00:00', 'admin2');

-- --------------------------------------------------------

--
-- Estructura para la vista `grupos_resultados_aprobado`
--
DROP TABLE IF EXISTS `grupos_resultados_aprobado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grupos_resultados_aprobado`  AS  select distinct `a`.`nombre` AS `nombreacademia` from (`historial` `h` join `academia` `a`) where ((`h`.`id_grupo` = 8) and (`h`.`id_academia` = `a`.`id`) and (`h`.`status` = 'Espera')) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `grupos_resultados_reprobado`
--
DROP TABLE IF EXISTS `grupos_resultados_reprobado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grupos_resultados_reprobado`  AS  select distinct `a`.`nombre` AS `nombreacademia` from (`historial` `h` join `academia` `a`) where ((`h`.`id_grupo` = 8) and (`h`.`id_academia` = `a`.`id`) and (`h`.`status` = 'Reprobado')) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academia`
--
ALTER TABLE `academia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_instructor` (`id_instructor`),
  ADD KEY `id_academia` (`id_academia`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `instructor_id_academia_foreign` (`id_academia`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ticket` (`id_ticket`),
  ADD KEY `id_emisor` (`id_emisor`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol666`
--
ALTER TABLE `rol666`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario1` (`id_usuario1`),
  ADD KEY `id_usuario2` (`id_usuario2`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_usuario_unique` (`usuario`),
  ADD KEY `users_idrol_foreign` (`idrol`);

--
-- Indices de la tabla `users3`
--
ALTER TABLE `users3`
  ADD UNIQUE KEY `users_usuario_unique` (`usuario`),
  ADD KEY `users_id_foreign` (`id`),
  ADD KEY `users_idrol_foreign` (`idrol`);

--
-- Indices de la tabla `users666`
--
ALTER TABLE `users666`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `usuario_idrol_foreign` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academia`
--
ALTER TABLE `academia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rol666`
--
ALTER TABLE `rol666`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `users666`
--
ALTER TABLE `users666`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `academia`
--
ALTER TABLE `academia`
  ADD CONSTRAINT `academia_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `historial_ibfk_3` FOREIGN KEY (`id_instructor`) REFERENCES `instructor` (`id`),
  ADD CONSTRAINT `historial_ibfk_4` FOREIGN KEY (`id_academia`) REFERENCES `academia` (`id`);

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_id_academia_foreign` FOREIGN KEY (`id_academia`) REFERENCES `academia` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `tickets` (`id`),
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`id_emisor`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_idrol_foreign` FOREIGN KEY (`idrol`) REFERENCES `rol` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users666`
--
ALTER TABLE `users666`
  ADD CONSTRAINT `usuario_idrol_foreign` FOREIGN KEY (`idrol`) REFERENCES `rol666` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
