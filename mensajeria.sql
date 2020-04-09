-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2018 a las 23:39:40
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mensajeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `fecha_mensaje` datetime NOT NULL,
  `cuerpo` varchar(1000) NOT NULL,
  `leido` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_respuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id_mensaje`, `asunto`, `fecha_mensaje`, `cuerpo`, `leido`, `id_usuario`, `id_respuesta`) VALUES
(33, 'saludo', '2018-01-04 00:00:00', 'hola mari', 0, 15, NULL),
(41, 'hola', '2018-01-04 00:00:00', 'mensaje de ana a pepe', 1, 6, NULL),
(42, 'prueba', '2018-01-04 00:00:00', 'hola a todos los del foro', 1, 12, NULL),
(43, 'probandoCuerpo', '2018-01-04 00:00:00', 'hola pepe soy maria', 1, 6, NULL),
(44, 'la web', '2018-01-04 00:00:00', 'En informática, la World Wide Web (WWW) o red informática mundial1​ es un sistema de distribución de documentos de hipertexto o hipermedios interconectados y accesibles vía Internet. Con un navegador web, un usuario visualiza sitios web compuestos de páginas web que pueden contener textos, imágenes, vídeos u otros contenidos multimedia, y navega a través de esas páginas usando hiperenlaces.\r\n\r\nLa Web se desarrolló entre marzo de 1989 y diciembre de 1990.2​3​ por el inglés Tim Berners-Lee con la ayuda del belga Robert Cailliau mientras trabajaban en el CERN en Ginebra, Suiza, y publicado en 1992. Desde entonces, Berners-Lee ha jugado un papel activo guiando el desarrollo de estándares Web (como los lenguajes de marcado con los que se crean las páginas web), y en los últimos años ha abogado por su visión de una Web semántica. Utilizando los conceptos de sus anteriores sistemas de hipertexto como ENQUIRE, el físico británico Tim Berners-Lee, un científico de la computación y en ese tiempo', 1, 6, NULL),
(48, 'lawkdj', '2018-01-05 00:00:00', 'hola maria soy pepe', 1, 12, NULL),
(49, 'skjfh', '2018-01-05 00:00:00', 'hola pepe soy maria', 1, 3, NULL),
(50, 'iokpo', '2018-01-05 00:00:00', 'zñsdofkpo', 0, 3, NULL),
(51, 'iokpo', '2018-01-05 00:00:00', 'zñsdofkpo', 0, 3, NULL),
(52, 'iokpo', '2018-01-05 00:00:00', 'zñsdofkpo', 0, 3, NULL),
(53, 'iokpo', '2018-01-05 00:00:00', 'zñsdofkpo', 1, 3, NULL),
(54, 'iokpo', '2018-01-05 00:00:00', 'zñsdofkpo', 0, 3, NULL),
(55, 'iokpo', '2018-01-05 00:00:00', 'zñsdofkpo', 0, 3, NULL),
(56, 'ñsldk', '2018-01-05 00:00:00', 'asñkfdjwe', 0, 12, NULL),
(57, 'snfowEI', '2018-01-05 00:00:00', 'aMSklwe', 0, 12, NULL),
(58, 'msjfhe', '2018-01-05 00:00:00', 'Re:ñlsdkfpo', 0, 12, NULL),
(59, 'respuesta', '2018-01-05 00:00:00', 'Re:añskjf', 0, 6, NULL),
(60, 'zndjfh', '2018-01-05 00:00:00', 'Re:zdkjf', 0, 6, NULL),
(61, 'skjdi', '2018-01-05 00:00:00', 'Re:alkj', 0, 6, NULL),
(62, 'nasf', '2018-01-05 00:00:00', 'Re:ñaslkjf', 0, 6, NULL),
(63, 'zskdw', '2018-01-05 00:00:00', 'zskajshdqw', 0, 6, NULL),
(64, 'zjdhfu', '2018-01-05 00:00:00', 'ksajdij', 0, 6, NULL),
(65, 'primerMnsaje', '2018-01-05 00:00:00', 'enviando mensaje a admin', 1, 12, NULL),
(66, 'askfdh', '2018-01-05 00:00:00', 'alkejr', 0, 12, NULL),
(67, 'hola', '2018-01-05 00:00:00', 'Re:´ÑDFLWPELTF', 0, 12, NULL),
(68, 'hola', '2018-01-05 00:00:00', 'Re:asknfsehf', 0, 12, NULL),
(69, 'hola', '2018-01-05 00:00:00', 'Re:', 0, 12, NULL),
(70, 'primerMnsaje', '2018-01-05 00:00:00', 'Re:hola', 1, 7, NULL),
(71, 'hola', '2018-01-05 00:00:00', 'Re:hola', 0, 12, NULL),
(73, 'php', '2018-01-07 00:00:00', 'aprendiendo', 1, 7, NULL),
(83, 'hh', '2018-01-07 00:00:00', 'hhhhjj', 0, 23, NULL),
(84, 'test', '2018-01-07 00:00:00', 'ENVIO test2 desde Nick hacia foro aunque pone maria es publico', 0, 23, NULL),
(85, 'holanick', '2018-01-07 00:00:00', 'hola Nick soy maria y es mi primer mensaje privado a ti', 1, 12, NULL),
(86, 'holanick', '2018-01-07 00:00:00', 'Re: melón, eres pepe, no maria y yo soy nick', 1, 23, NULL),
(87, 'holanick', '2018-01-07 00:00:00', 'Re:ah vale, tuve una crisis de identidad y por eso te cambio el asunto, melonudo', 1, 12, NULL),
(88, 'adiosnick', '2018-01-07 00:00:00', 'Re:ahora lo cambio el asunto yo de verdad a adiosnick, que lo sepas pepe.', 1, 23, NULL),
(89, 'valesnick', '2018-01-07 00:00:00', 'Re: ok, por yo también lo cambio', 1, 12, NULL),
(90, 'conhora', '2018-01-07 00:00:00', 'lasedkfowe', 1, 12, NULL),
(91, 'conhora', '2018-01-07 14:43:18', 'sndfwureu', 1, 12, NULL),
(93, 'conhora', '2018-01-07 14:44:44', 'Re:pues vale, haz la comida', 1, 3, NULL),
(94, 'mmmm', '2018-01-07 14:55:27', 'mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm', 1, 12, NULL),
(95, 'sinleer', '2018-01-07 15:02:47', 'sdkjfiowje', 1, 12, NULL),
(96, 'testing', '2018-01-07 19:39:18', 'hola laura,soy Nick, haciendo qa.', 0, 23, NULL),
(97, 'otra cosa', '2018-01-07 19:40:24', 'este es otro mensaje privado de Nick a laura', 1, 23, NULL),
(98, 'otra', '2018-01-07 19:40:58', 'Re:vale, recibido ok.', 1, 19, NULL),
(99, 'primerMnsaje', '2018-01-07 20:58:48', 'Re:amsdjdoiq', 1, 12, NULL),
(105, 'sinleer', '2018-01-08 21:47:56', 'Re:me auto respondo una vez', 1, 12, 95),
(106, 'sinleerdos', '2018-01-08 21:48:55', 'Re:me auto respondo por segunda vez', 1, 12, 95),
(107, 'sinleerdos', '2018-01-08 22:47:15', 'Re:me auto respondo tercera vez', 1, 12, 95),
(108, 'sinleerdos', '2018-01-08 22:48:25', 'Re:', 1, 12, 95),
(109, 'ajshd', '2018-01-08 23:25:42', 'akñeowr', 0, 12, NULL),
(110, 'prueba', '2018-01-08 23:33:46', 'Re:', 1, 12, 42),
(111, 'prueba', '2018-01-09 11:37:20', 'Re:', 0, 12, 42),
(112, 'soyPepe', '2018-01-11 21:38:09', 'hola soy pepe maria', 0, 12, NULL),
(113, 'mostra', '2018-01-11 21:44:05', 'lkaswjdoqw', 0, 12, NULL),
(114, 'masMensaje', '2018-01-11 21:45:17', 'aswlkdjopq', 0, 3, NULL),
(115, 'seEnvia', '2018-01-11 22:05:23', 'lkasdjfwe', 0, 12, NULL),
(116, 'prueba', '2018-01-11 23:38:30', 'Re:jsdhuewh', 0, 12, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibe`
--

CREATE TABLE `recibe` (
  `id_usuario` int(11) NOT NULL,
  `id_mensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recibe`
--

INSERT INTO `recibe` (`id_usuario`, `id_mensaje`) VALUES
(3, 48),
(3, 50),
(3, 51),
(3, 52),
(3, 53),
(3, 54),
(3, 55),
(3, 64),
(3, 66),
(3, 73),
(3, 90),
(3, 91),
(3, 94),
(3, 109),
(3, 112),
(3, 113),
(3, 114),
(3, 115),
(6, 57),
(6, 58),
(6, 59),
(6, 60),
(6, 61),
(6, 62),
(6, 67),
(6, 68),
(6, 69),
(6, 71),
(7, 65),
(7, 99),
(12, 41),
(12, 43),
(12, 44),
(12, 49),
(12, 70),
(12, 86),
(12, 88),
(12, 93),
(12, 95),
(12, 105),
(12, 106),
(12, 107),
(12, 108),
(12, 110),
(12, 111),
(12, 116),
(14, 56),
(14, 63),
(15, 33),
(19, 96),
(19, 97),
(23, 85),
(23, 87),
(23, 89),
(23, 98);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `contraseña` varchar(300) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `contraseña`, `nick`, `apellido`, `email`, `fecha`, `tipo`) VALUES
(3, '$2y$10$liN7dqUB/lZdDs.7.kCfQev4.qZ2uH8Q0Y0GPDuOWatZiXImy9PZa', 'maria', '', '', '0000-00-00', 0),
(6, '$2y$10$rR4mMBD1jmVu5J6XNc5CPeu14YSNzJQJj9YKCy2eLcK67yx7SCLPy', 'ana', '', '', '0000-00-00', 0),
(7, '$2y$10$eoyPxZfDFkYs6PCPIQH.eeIkhkdiTBX81vRXVbowLv/uH7ydocaBG', 'admin', 'alcazar', 'admin@gmail.com', '2017-12-30', 1),
(11, '$2y$10$FStBps0IyZAmGxUXOZZshOUWt54R2rfcosGnHXSL4Adyxac2H/Mbu', 'juan', '', '', '0000-00-00', 0),
(12, '$2y$10$20h0lR6QerFB7eBdaGGHMOAaEZCsbZRCxHAS76dtDaWjMAntE1ZJm', 'pepe', '', '', '0000-00-00', 0),
(13, '$2y$10$SFXjHqASvHZKjiqxmRJprOzXn5CYxPLrvZiUMvhPqCseKDjt9.2Qq', 'mariano', '', '', '0000-00-00', 0),
(14, '$2y$10$KeXARl6d6SbZ3cFpMY.vAuk6Q.6Jdetk3VxO9oYPNeQG82eYnzB2O', 'raul', '', '', '0000-00-00', 0),
(15, '$2y$10$M5k.rIIW4H7O2IqTA0SJxOuEUJQwDsDwyt50b7hVkkeDd6vNseBre', 'mari', '', '', '0000-00-00', 0),
(17, '$2y$10$JVA1IiG2VdUuP4LEWyz/Uu5V11MUISzcjI2CUWeDOjbnVe2hxcxjm', 'ivan', '', '', '0000-00-00', 0),
(18, '$2y$10$Byp6bXQpLga.1nQLQJ..Q.oQJTiRgryoaw0AiKijOlz.GScDMwJgy', 'new', '', '', '0000-00-00', 0),
(19, '$2y$10$AFzhULy6khNgeNRu7Fievu/z1XNOgueQK6O0/pzuG9KTo6kf3oEQK', 'laura', 'alcazar', 'laura@gmail.com', '2018-01-05', 0),
(22, '$2y$10$TJXoVOqmu5j4/8gKlE/TT.LAjByKbkAXgr9zE8rI3Rypw3RSLKfNC', 'otro', 'ape', 'otro@gmail.com', '2018-01-07', 0),
(23, '$2y$10$pgwPAdtM0KVEBySeZwKgae3YdVr0XYWtkT10xfFMgBZny4YTmbDVS', 'nick', 'apellido', 'email@email.es', '2018-01-07', 0),
(24, '$2y$10$6Ym8UjfVjp5qRAf9Pc6c/u.xXVMhYB/27HZrFr76H5.JnFAzNJypq', 'roberto', 'abad', 'roberto@gmail.com', '2018-01-07', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_respuesta` (`id_respuesta`);

--
-- Indices de la tabla `recibe`
--
ALTER TABLE `recibe`
  ADD PRIMARY KEY (`id_usuario`,`id_mensaje`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_mensaje` (`id_mensaje`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nick_unico` (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_id_respuesta` FOREIGN KEY (`id_respuesta`) REFERENCES `mensaje` (`id_mensaje`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idusuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibe`
--
ALTER TABLE `recibe`
  ADD CONSTRAINT `fk_idmensaje` FOREIGN KEY (`id_mensaje`) REFERENCES `mensaje` (`id_mensaje`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idusuarfio` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
