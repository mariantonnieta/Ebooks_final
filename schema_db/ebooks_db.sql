SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `ebooks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE DATABASE `ebooks`;
USE `ebooks`;

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `description`, `isbn`, `publisher`, `language`, `image`) VALUES
(1, 'La vaca púrpura', 'Seth Godin', 'El mundo está cambiando de forma vertiginosa y, con este, las reglas del marketing. Las cuatro Pes y las viejas prácticas han dejado de funcionar por una sencilla razón: la saturación de los medios y de la mente del consumidor. Para que nuestro producto no se vuelva invisible en esta nebulosa de opciones debemos hacerlo extraordinario, diferenciarlo. Y nada más extraordinario y diferente que una vaca púrpura. Seth Godin nos brinda su visión y opiniones sobre la función del marketing en las organizaciones y nos abre los ojos a una nueva y sobresaliente mentalidad que hará que nuestros productos y planteamientos de mercado dejen de ser perfectos para convertirse en diferentes y transformadores.', '9780141016405', '1 enero 2019 ', 'Español', 'vaca_purpura.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_borrow`
--

CREATE TABLE `book_borrow` (
  `id_book` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `duration_day` int(11) NOT NULL,
  `borrow_in` datetime NOT NULL,
  `returned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `book_borrow`
--

INSERT INTO `book_borrow` (`id_book`, `id_user`, `duration_day`, `borrow_in`, `returned`) VALUES
(1, 5, 3, '2021-02-12 02:36:48', 1),
(22, 8, 6, '2021-02-11 03:48:36', 1),
(1, 12, 10, '2021-02-11 10:56:13', 1),
(23, 12, 5, '2021-02-11 11:01:16', 1),
(1, 16, 5, '2021-02-11 19:23:18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_category`
--

CREATE TABLE `book_category` (
  `id_book` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `book_category`
--

INSERT INTO `book_category` (`id_book`, `id_category`) VALUES
(1, 2),
(2, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 5),
(22, 1),
(23, 1),
(24, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Trama'),
(2, 'Motivación'),
(5, 'Novela'),
(6, 'Cuento'),
(7, 'Relato'),
(8, 'Crónica'),
(9, 'Drama'),
(10, 'Tragedia'),
(11, 'Comedia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `email`) VALUES
(7, '5716986fba96b6260e5ccb593df852', 'damianrincondrc@gmail.com'),
(8, '180ebf0315a13b9ab4427e2c198a33', 'antonieta82000@gmail.com'),
(9, '5e875296a77a978cb9ada13b595b56', 'antonieta82000@gmail.com'),
(10, '39811373700f37c4f59ecc91400242', 'antonieta82000@gmail.com'),
(11, 'e35fe30428cabc6fe7457249500741', 'antonieta82000@gmail.com'),
(12, '1dc5a7a7fcc3078ea54f7846f7702a', 'antonieta82000@gmail.com'),
(14, '7f30c98e3e79c00032713ba36123d9', 'antonieta82000@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `type`) VALUES
(13, 'Maria', 'Huaraca', 'antonieta82000@gmail.com', 'antonieta8', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;
