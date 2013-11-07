-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2013 a las 17:47:08
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
  PRIMARY KEY (`idStudent`),
  KEY `university_id` (`university_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1046 ;

--
-- Volcado de datos para la tabla `uc_students`
--

INSERT INTO `uc_students` (`idStudent`, `name`, `lastname`, `university_id`, `campus`, `student_number`, `email`, `cellphone`) VALUES
(1029, 'Gerardo', 'Ayala', 1, 'Puebla', 'A01094105', 'gerardoayalad@outlook.com', '2224840964'),
(1030, 'Gerardo', 'Ayala', 6, 'Puebla', 'A01094105', 'gerardoayalad@outlook.com', ''),
(1031, 'Gerardo', 'Ayala', 1, 'Puebla', 'A01094105', 'xl_dag_lx@hotmail.com', '2224840964'),
(1032, 'Gerardo', 'Ayala', 7, 'Puebla', 'A01094105', 'xl_dag_lx@hotmail.com', '2224840964'),
(1033, 'Gerardo', 'Ayala', 1, 'Puebla', 'asdas', 'xl_dag_lx@hotmail.com', '522224840964'),
(1034, 'Banamex', 'Ayala', 1, 'Puebla', 'asdas', 'xl_dag_lx@hotmail.com', '522224840964'),
(1035, 'Gerardo', 'Ayala', 1, 'Puebla', 'asdas', 'xl_dag_lx@hotmail.com', '522224840964'),
(1036, 'Matriz', 'Ayala', 1, 'Puebla', 'asdas', 'xl_dag_lx@hotmail.com', '522224840964'),
(1037, 'Matriz', 'Ayala', 1, 'Puebla', 'asdas', 'xl_dag_lx@hotmail.com', '522224840964'),
(1038, 'Gerardo', 'Ayala', 1, 'Puebla', '1234', 'xl_dag_lx@hotmail.com', '522224840964'),
(1039, 'Gerardo', 'Ayala', 1, 'Puebla', '1234', 'xl_dag_lx@hotmail.com', '522224840964'),
(1040, 'Gerardo', 'Ayala', 1, 'Puebla', '1234', 'xl_dag_lx@hotmail.com', '522224840964'),
(1041, 'Gerardo', 'Ayala', 1, 'Puebla', '1234', 'xl_dag_lx@hotmail.com', '522224840964'),
(1042, 'Gerardo', 'Ayala', 7, 'Puebla', 'A01094105', 'xl_dag_lx@hotmail.com', '522224840964'),
(1043, 'Gerardo', 'Ayala', 7, 'Puebla', 'A01094105', 'xl_dag_lx@hotmail.com', '522224840964'),
(1044, 'Gerardo', 'Ayala', 7, 'Puebla', 'A01094105', 'xl_dag_lx@hotmail.com', '522224840964'),
(1045, 'Gerardo', 'Ayala', 7, 'Puebla', 'A01323813', 'A01094105@itesm.mx', '522224840964');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `uc_students`
--
ALTER TABLE `uc_students`
  ADD CONSTRAINT `uc_students_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `uc_universities` (`idUniversity`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
