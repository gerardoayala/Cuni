-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2013 a las 01:05:21
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `congress_tec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_attendance`
--

CREATE TABLE IF NOT EXISTS `uc_attendance` (
  `idAttendance` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` int(11) NOT NULL,
  `hour` datetime NOT NULL,
  PRIMARY KEY (`idAttendance`),
  KEY `idDelegate` (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_configuration`
--

CREATE TABLE IF NOT EXISTS `uc_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `uc_configuration`
--

INSERT INTO `uc_configuration` (`id`, `name`, `value`) VALUES
(1, 'website_name', 'Congress System'),
(2, 'website_url', 'localhost:8080/congress/tecaboutit/'),
(3, 'email', 'xl_dag_lx@hotmail.com'),
(4, 'activation', 'false'),
(5, 'resend_activation_threshold', '0'),
(6, 'language', 'models/languages/en.php'),
(7, 'template', 'models/site-templates/default.css');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_pages`
--

CREATE TABLE IF NOT EXISTS `uc_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(150) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `uc_pages`
--

INSERT INTO `uc_pages` (`id`, `page`, `private`) VALUES
(1, 'account.php', 1),
(2, 'activate-account.php', 0),
(3, 'admin_configuration.php', 1),
(4, 'admin_page.php', 1),
(5, 'admin_pages.php', 1),
(6, 'admin_permission.php', 1),
(7, 'admin_permissions.php', 1),
(8, 'admin_user.php', 1),
(9, 'admin_users.php', 1),
(10, 'forgot-password.php', 0),
(11, 'index.php', 0),
(12, 'nav.php', 0),
(13, 'login.php', 0),
(14, 'logout.php', 1),
(15, 'register.php', 1),
(16, 'resend-activation.php', 0),
(17, 'user_settings.php', 1),
(26, 'admin_tickets.php', 1),
(27, 'admin_universities.php', 1),
(28, 'controller.php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_permissions`
--

CREATE TABLE IF NOT EXISTS `uc_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `uc_permissions`
--

INSERT INTO `uc_permissions` (`id`, `name`) VALUES
(1, 'New Member'),
(2, 'Administrator'),
(3, 'Seller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_permission_page_matches`
--

CREATE TABLE IF NOT EXISTS `uc_permission_page_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `uc_permission_page_matches`
--

INSERT INTO `uc_permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
(1, 1, 1),
(2, 1, 14),
(3, 1, 17),
(4, 2, 1),
(5, 2, 3),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 2, 8),
(11, 2, 9),
(12, 2, 14),
(13, 2, 17),
(21, 2, 27),
(22, 2, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_students`
--

CREATE TABLE IF NOT EXISTS `uc_students` (
  `idStudent` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `university_id` int(11) NOT NULL,
  `campus` varchar(100) CHARACTER SET latin1 NOT NULL,
  `student_number` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cellphone` varchar(13) CHARACTER SET latin1 NOT NULL,
  `payment` tinyint(1) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  PRIMARY KEY (`idStudent`),
  KEY `university_id` (`university_id`),
  KEY `ticket_id` (`ticket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1028 ;

--
-- Volcado de datos para la tabla `uc_students`
--

INSERT INTO `uc_students` (`idStudent`, `name`, `lastname`, `university_id`, `campus`, `student_number`, `email`, `cellphone`, `payment`, `ticket_id`) VALUES
(1027, 'Gerardo', 'Ayala', 1, 'Puebla', 'A01094105', 'gerardoayalad@outlook.com', '2224840964', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_tickets`
--

CREATE TABLE IF NOT EXISTS `uc_tickets` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_name` varchar(50) NOT NULL,
  `ticket_price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`idTicket`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `uc_tickets`
--

INSERT INTO `uc_tickets` (`idTicket`, `ticket_name`, `ticket_price`, `qty`) VALUES
(2, 'Preventa', 10, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_universities`
--

CREATE TABLE IF NOT EXISTS `uc_universities` (
  `idUniversity` int(11) NOT NULL AUTO_INCREMENT,
  `name_university` varchar(100) NOT NULL,
  PRIMARY KEY (`idUniversity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `uc_universities`
--

INSERT INTO `uc_universities` (`idUniversity`, `name_university`) VALUES
(1, 'Tec de Monterrey'),
(6, 'Udla'),
(7, 'ITESM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_users`
--

CREATE TABLE IF NOT EXISTS `uc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(150) NOT NULL,
  `activation_token` varchar(225) NOT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `uc_users`
--

INSERT INTO `uc_users` (`id`, `user_name`, `display_name`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`) VALUES
(1, 'admin', 'admin', '6b9ef3d71f26dfbfdda8ce51abc8bdbb7fd291d5788f4ac5d32526bd7e4b742f8', 'xl_dag_lx@hotmail.com', '13cf3533efb40f6970915620eb9b1563', 1378142821, 0, 1, 'New Member', 1378142821, 1381190073);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_user_permission_matches`
--

CREATE TABLE IF NOT EXISTS `uc_user_permission_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `uc_user_permission_matches`
--

INSERT INTO `uc_user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
(1, 1, 2),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `un_ticket`
--

CREATE TABLE IF NOT EXISTS `un_ticket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_number` int(16) NOT NULL,
  `ticket_type` int(11) NOT NULL,
  PRIMARY KEY (`idTicket`),
  KEY `ticket_type` (`ticket_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `un_ticket`
--

INSERT INTO `un_ticket` (`idTicket`, `ticket_number`, `ticket_type`) VALUES
(1, 123213, 2),
(2, 413213, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `uc_attendance`
--
ALTER TABLE `uc_attendance`
  ADD CONSTRAINT `uc_attendance_ibfk_1` FOREIGN KEY (`idStudent`) REFERENCES `uc_students` (`idStudent`);

--
-- Filtros para la tabla `uc_students`
--
ALTER TABLE `uc_students`
  ADD CONSTRAINT `uc_students_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `uc_universities` (`idUniversity`),
  ADD CONSTRAINT `uc_students_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `un_ticket` (`idTicket`);

--
-- Filtros para la tabla `un_ticket`
--
ALTER TABLE `un_ticket`
  ADD CONSTRAINT `un_ticket_ibfk_1` FOREIGN KEY (`ticket_type`) REFERENCES `uc_tickets` (`idTicket`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
