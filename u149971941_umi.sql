
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2014 at 01:57 AM
-- Server version: 5.1.61
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u149971941_umi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumno_grupo`
--

CREATE TABLE IF NOT EXISTS `alumno_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=134 ;

--
-- Dumping data for table `alumno_grupo`
--

INSERT INTO `alumno_grupo` (`id`, `id_grupo`, `id_alumno`) VALUES
(124, 0, 5),
(123, 0, 3),
(111, 0, 2),
(131, 1, 2),
(133, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `ide` int(120) NOT NULL AUTO_INCREMENT,
  `id_p` int(120) NOT NULL,
  `id_usuario` varchar(512) COLLATE utf8_bin NOT NULL,
  `no_preg` int(120) NOT NULL,
  `calif` int(120) NOT NULL,
  `completado` int(120) NOT NULL,
  PRIMARY KEY (`ide`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Dumping data for table `evaluacion`
--

INSERT INTO `evaluacion` (`ide`, `id_p`, `id_usuario`, `no_preg`, `calif`, `completado`) VALUES
(1, 20, '5', 1, 0, 0),
(2, 13, '5', 2, 0, 0),
(3, 3, '5', 3, 0, 0),
(4, 6, '5', 4, 0, 0),
(5, 11, '5', 5, 0, 0),
(6, 15, '5', 6, 0, 0),
(7, 12, '5', 7, 0, 0),
(8, 1, '5', 8, 0, 0),
(9, 4, '5', 9, 0, 0),
(10, 7, '5', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `orden` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nombre`, `avatar`, `orden`, `estatus`) VALUES
(0, 'TIC73', '', '', '1'),
(1, 'TIC71', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `maestro_materia`
--

CREATE TABLE IF NOT EXISTS `maestro_materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_maestro` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(256) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(256) COLLATE utf8_bin NOT NULL,
  `orden` varchar(256) COLLATE utf8_bin NOT NULL,
  `estatus` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=64 ;

--
-- Dumping data for table `maestro_materia`
--

INSERT INTO `maestro_materia` (`id`, `id_maestro`, `id_materia`, `nombre`, `avatar`, `orden`, `estatus`) VALUES
(55, 5, 1, '', '', '', ''),
(62, 2, 2, '', '', '', ''),
(61, 2, 6, '', '', '', ''),
(60, 2, 1, '', '', '', ''),
(63, 2, 5, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(256) COLLATE utf8_bin NOT NULL,
  `orden` varchar(256) COLLATE utf8_bin NOT NULL,
  `estatus` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `avatar`, `orden`, `estatus`) VALUES
(1, 'Español', '', '', '1'),
(2, 'Matemáticas', '', '', '1'),
(3, 'Inglés', '', '', '1'),
(4, 'Programación de Aplicaciones', '', '', '1'),
(5, 'Optativa', '', '', '1'),
(6, 'Ingenieria económica', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `id_pt` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(2048) COLLATE utf8_bin NOT NULL,
  `opc1` varchar(256) COLLATE utf8_bin NOT NULL,
  `opc2` varchar(256) COLLATE utf8_bin NOT NULL,
  `opc3` varchar(256) COLLATE utf8_bin NOT NULL,
  `opc4` varchar(256) COLLATE utf8_bin NOT NULL,
  `resp_c` varchar(256) COLLATE utf8_bin NOT NULL,
  `curso` varchar(512) COLLATE utf8_bin NOT NULL,
  `id_p` int(11) NOT NULL,
  UNIQUE KEY `id_p` (`id_pt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=123 ;

--
-- Dumping data for table `preguntas`
--

INSERT INTO `preguntas` (`id_pt`, `pregunta`, `opc1`, `opc2`, `opc3`, `opc4`, `resp_c`, `curso`, `id_p`) VALUES
(1, 'Es el buscador más utilizado en la actualidad', 'Bing', 'Yahoo', 'DuckDuckGo', 'Google', 'Google', '1', 1),
(2, 'Es uno de los buscadores que ofrecen mayor privacidad en la red', 'Google ', 'Bing', 'Yahoo', 'DuckDuckGo', 'DuckDuckGo', '1', 2),
(3, 'Sistema operativo más usado en el mundo', 'Windows XP', 'Ubuntu', 'Mac OS X', 'Windows 7', 'Windows 7', '1', 3),
(4, 'Protocolo seguro de transferencia de hipertexto', 'http', 'https', 'ftp', 'git', 'https', '1', 4),
(5, 'Es la desarrolladora del juego "Halo"', 'Bungie Studios', 'Blizzard', 'Ubisoft', 'Naughty dog', 'Bungie Studios', '1', 5),
(6, 'Es la empresa distribuidora del juego Assassin''s Creed', 'Ubisoft', 'Microsoft', 'Blizzard', 'Nintendo', 'Ubisoft', '1', 6),
(7, 'Es un servicio de microblogging y una red social', 'Twitter', 'Blogger', 'Wordpress', 'Joomla', 'Twitter', '1', 7),
(8, 'Protocolo de Transferencia de Archivos', 'FTP', 'GIT', 'HTTPS', 'HTTP', 'FTP', '1', 8),
(9, 'Es software Libre', 'Libre Office', 'Microsoft Office', 'Kingsoft Office', 'iWork', 'Libre Office', '1', 9),
(10, 'Es un software de control de versiones diseñado por Linus Torvalds', 'Git', 'https', 'http', 'FTP', 'Git', '1', 10),
(11, 'es una plataforma de distribución digital de aplicaciones móviles para los dispositivos con sistema operativo Firefox OS (B2G)', ' Firefox Marketplace', 'Windows Marketplace', 'Google Play Store', 'App Store', ' Firefox Marketplace', '1', 11),
(15, '¿Cuál será el nombre del próximo sistema operativo de Microsoft?', 'Windows 0', 'Windows 9', 'Windows Vienna', 'Windows 10', 'Windows 10', '1', 12),
(16, 'Linux Mint es derivado de:', 'Ubuntu', 'Lubuntu', 'Xubuntu', 'Kubuntu', 'Ubuntu', '1', 13),
(17, 'Sistema operativo móvil de Mozilla ', 'Android', 'IOS', 'Windows Phone', 'Boot 2 Gecko', 'Boot 2 Gecko', '1', 14),
(18, 'Es la red social más famosa en la actualidad', 'Twitter', 'Facebook', 'Google plus', 'Tumblr', 'Facebook', '1', 15),
(19, 'Es el juego más famosos de Blizzard en la actualidad', 'World of Warcraft', 'Hearthstone', 'StarCraft', 'Heroes of The Storm', 'World of Warcraft', '1', 16),
(20, 'Es el nuevo juego de Blizzard tipo MOBA que se encuentra en desarrollo', 'World of Warcraft', 'Hearthstone', 'Heroes of The Storm', 'StarCraft', 'Heroes of The Storm', '1', 17),
(12, 'fue autodefinido como "el primer buscador basado en significados", y que utiliza "un sistema semántico propietario', 'Google', 'Sohu', 'Yandex', 'Hakia', 'Hakia', '1', 18),
(13, 'es una plataforma de distribución digital de aplicaciones móviles para los dispositivos con sistema operativo Android', 'Google Play Store', 'Android Market', 'Firefox Marketplace ', 'Windows Marketplace', 'Google Play Store', '1', 19),
(14, 'Consola de videjuegos de Steam', 'PlayStation', 'Xbox', 'Wii U', 'Steam Machines', 'Steam Machines', '1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `ApellidoPaterno` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `ApellidoMaterno` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `telefono` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `Calle` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `NumeroExterior` int(6) NOT NULL,
  `NumeroInterior` int(6) NOT NULL,
  `colonia` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `municipio` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `estado` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `cp` int(6) NOT NULL,
  `correo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `correctas` int(11) NOT NULL,
  `totales` int(11) NOT NULL,
  `usuario` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `nivel` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `estatus` varchar(250) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `telefono`, `Calle`, `NumeroExterior`, `NumeroInterior`, `colonia`, `municipio`, `estado`, `cp`, `correo`, `correctas`, `totales`, `usuario`, `password`, `nivel`, `estatus`) VALUES
(2, 'Soma', 'Satsugai', 'Yebara', '', '', 0, 0, '', '', '', 0, '', 0, 0, 'Soma', 'mezurashi', '2', '1'),
(3, 'Kevin', 'Trejo', 'Granda', '', '', 0, 0, '', '', '', 0, '', 0, 0, '', '', '1', '1'),
(5, '.Elyud.', '.Fabian.', '.Granda.', '', '', 0, 0, '', '', '', 0, '', 0, 0, 'Lightum', 'password', '1', '1'),
(6, '.Dono.', '.Trejo.', '.Granda.', '', '', 0, 0, '', '', '', 0, '', 0, 0, '', '', '1', '1'),
(1, '.asdada.', '.ASDAS.', '.ASD.', '', '', 0, 0, '', '', '', 0, '', 0, 0, '', '', '.1.', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
