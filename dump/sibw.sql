-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2019 a las 11:01:32
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sibw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(50) NOT NULL,
  `id_evento` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `ip_usuario` varchar(45) DEFAULT NULL,
  `fecha_hora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_evento`, `nombre`, `correo`, `texto`, `ip_usuario`, `fecha_hora`) VALUES
(1, 2, 'fdwd', 'asfaf@ssf.com', 'fef', '127.0.0.1', 'Thu, 02 May 2019 13:20:06 +0200'),
(2, 2, 'comentario2', 'comwntando2sgwre@aafae.com', 'sgwgw wiiiii\r\n', '127.0.0.1', 'Thu, 02 May 2019 13:30:24 +0200'),
(3, 2, 'JC', 'escribe@asfef.com', 'arha<tswgn<swtgh<tsh<th', '127.0.0.1', 'Thu, 02 May 2019 13:34:06 +0200'),
(4, 4, 'maikel', 'afaef@afae.com', 'yeyiiiii!!!!', '127.0.0.1', 'Thu, 02 May 2019 13:38:21 +0200'),
(5, 1, 'Probando', 'asfaf@ssf.com', 'zi', '127.0.0.1', 'Thu, 02 May 2019 13:40:08 +0200'),
(6, 3, 'Probando', 'asfaf@ssf.com', 'hhh', '127.0.0.1', 'Thu, 02 May 2019 16:13:17 +0200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(10) NOT NULL,
  `texto` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `texto`) VALUES
(1, 'metal'),
(2, 'linkin park'),
(3, 'violadores del verso'),
(4, 'rap');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `fecha_publi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `nombre`, `texto`, `grupo`, `fecha_publi`, `fecha_mod`) VALUES
(1, 'Concierto de Linkin Park', 'Linkin Park es una banda estadounidense de rock alternativo procedente de Agoura Hills, California. Formada en 1996, el grupo estuvo inicialmente integrado por Mike Shinoda, Dave Farrell, Joe Hahn, Brad Delson, Rob Bourdon y Mark Wakefield, este último como voz principal. La banda inició en ese mismo año sus primeros trabajos musicales de manera independiente y posterior a esto grabaron su primer material llamado Xero; sin embargo no tuvieron gran éxito en la búsqueda de un sello discográfico ya que nadie mostró interés por su trabajo, lo que ocasionó la renuncia de Mark Wakefield. Poco después, Chester Bennington se incorporó a la banda como vocalista; el grupo realizó su primera presentación en un club de Los Ángeles y siendo respaldados por Jeff Blue, en aquel entonces vicepresidente de Warner Bros. Records, lograron firmar con el sello en 1999. El nombre del grupo es un juego de palabras que hace referencia al Lincoln Park en Santa Mónica.\r\n\r\n', 'Linkin Park', '2019-05-01 15:00:00', '2019-05-01 15:21:00'),
(2, 'Concierto de Foo Fighters', 'Foo Fighters es una banda estadounidense de rock alternativo formada en la ciudad de Seattle en 1994 por Dave Grohl, exbaterista de Nirvana , Scream y Queens of the Stone Age.\r\n\r\nEl grupo debe su nombre a los ovnis y los diversos fen?menos a?reos que fueron reportados por los pilotos de los aviones aliados en la Segunda Guerra Mundial, que se conocen colectivamente como Foo Fighters. Antes del lanzamiento de su ?lbum debut en 1995, Grohl, como ?nico miembro oficial, reclut? al bajista Nate Mendel y el baterista William Goldsmith, ambos anteriormente miembros de Sunny Day Real Estate, as? como su compa?ero en las giras de Nirvana, Pat Smear como guitarrista para completar la alineaci?n.\r\n', 'Foo Fighters', '2019-05-01 04:00:00', '2019-05-01 04:07:00'),
(3, 'Concierto de Disturbed', 'Disturbed es una banda de heavy metal formada en Chicago, Illinois, por David Draiman (voz), Dan Donegan (guitarra), John Moyer (bajo) y Mike Wengren (bater?a). Sus ex integrantes son el cantante Erich Awalt y el bajista Steve Kmak.\r\n\r\nFundada en 1994 bajo el nombre de Brawl, y s?lo hasta 1996 cuando David Draiman fue contratado como nuevo vocalista cambi? su nombre a Disturbed. Comenzaron como una banda de nu metal pero despu?s mostraron fuertes influencias del heavy metal incorporando solos y riffs de guitarra m?s t?cnicos.\r\n\r\nHasta abril de 2017, han vendido 16 millones de ?lbumes en todo el mundo, convirti?ndose en uno de los m?s grandes taquilleros en los ?ltimos a?os.1? La banda ha lanzado seis ?lbumes de estudio, cinco de los cuales han consecutivamente debutado en el n?mero uno en la lista Billboard 200.2? Disturbed ha ganado varios reconocimientos, teniendo 1 disco de plata, 19 discos de platino, 2 sencillos de oro y un sencillo platino.', 'Disturbed', '2019-05-01 12:00:00', '2019-05-01 21:00:00'),
(4, 'Concierto de Violadores del Verso', 'Violadores del Verso, tambi?n conocido como Doble V, es uno de los grupos de m?sica rap de habla hispana m?s conocidos, cuyos miembros son Kase.O, L?rico, SHO-HAI y R de Rumba (DJ), todos ellos nacidos en Zaragoza, Arag?n.\r\n\r\nSon considerados un referente en el rap espa?ol, y uno de los mejores grupos de rap de habla hispana de la historia. Sus discos Genios (1999) y Vivir para contarlo (2006) aparecen siempre en las listas de mejores discos de rap espa?ol.\r\n\r\nVioladores del Verso gan? el disco de oro por Vivir para contarlo (2006), y junto con SFDK son los ?nicos grupos de rap espa?ol que hasta la fecha han conseguido ganar un disco de oro.1? ', 'Violadores del Verso', '2019-05-01 09:00:00', '2019-05-01 11:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(10) NOT NULL,
  `id_evento` int(10) NOT NULL,
  `ruta` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `id_evento`, `ruta`, `tipo`) VALUES
(1, 1, 'img/lk_2.jpg', ''),
(2, 1, 'img/lk_1.jpg', ''),
(3, 1, 'img/585358_469093.jpg', ''),
(4, 3, 'img/2017.jpg', ''),
(5, 3, 'img/Disturbed-FBOG_0.jpg', ''),
(6, 3, 'img/disturbed.jpg', ''),
(7, 2, 'img/73367_1.jpg', ''),
(8, 2, 'img/p01br4cp.jpg', ''),
(9, 4, 'img/vio.jpg', ''),
(10, 4, 'img/violadores_del_verso_-_foto_2.jpg', ''),
(11, 1, 'img/maxresdefault.jpg', 'portada'),
(12, 2, 'img/foo-fighters-anthem-2017-billboard-1548.jpg', 'portada'),
(13, 3, 'img/disturbed.png', 'portada'),
(14, 4, 'img/vio.jpg', 'portada'),
(15, 1, 'https://www.youtube.com/embed/VEljwjZen-A', 'video'),
(16, 2, 'https://www.youtube.com/embed/tQh609EAVao', 'video'),
(17, 3, 'https://www.youtube.com/embed/SfqlnAGzNwg', 'video'),
(18, 4, 'https://www.youtube.com/embed/8MhXyiDIDHI', 'video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `nombre`, `ruta`) VALUES
(1, 'Home', '/'),
(2, 'Eventos', '/listado'),
(3, 'Contacto', '/contacto'),
(4, 'Sobre nosotros', '/nosotros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prohibidas`
--

CREATE TABLE `prohibidas` (
  `id` int(50) NOT NULL,
  `palabra` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prohibidas`
--

INSERT INTO `prohibidas` (`id`, `palabra`) VALUES
(1, 'japuta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evento` (`id_evento`) USING BTREE;

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prohibidas`
--
ALTER TABLE `prohibidas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prohibidas`
--
ALTER TABLE `prohibidas`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
