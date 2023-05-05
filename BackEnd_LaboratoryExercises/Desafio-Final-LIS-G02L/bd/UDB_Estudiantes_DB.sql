--
-- Daniel Alexander Reyes Pineda RP191495.
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";
--
-- Base de datos: `Estudiantes UDB`
--
CREATE DATABASE IF NOT EXISTS `Estudiantes_udb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Estudiantes_udb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estudiante`
--
/*los campos a tomar en cuenta 
son: carnet, nombre, dirección, fecha de ingreso, fecha de nacimiento, correo, teléfono y carrera que 
estudia.*/

CREATE TABLE IF NOT EXISTS `carrera` (
	`id_carrera` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`Nombre_de_Carrera` varchar(50) NOT NULL,
	PRIMARY KEY (`id_carrera`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla Carrera';

--
-- Volcado de datos para la tabla `carrera`
--
INSERT INTO `carrera` (`id_carrera`,`Nombre_de_Carrera`) VALUES
(2, 'Ingenieria en Ciencias de La Computacion'),
(3, 'Ingenieria en Software'),
(4, 'Igenieria Electronica'),
(5, 'Licenciatura en Marketing Digital'),
(6, 'Licenciatura en Informatica');

CREATE TABLE IF NOT EXISTS `estudiante` (
  `id_estudiante` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_carrera` int(10) unsigned NOT NULL,
  `carnet` varchar(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo` varchar(40) NOT NULL,
  `telefono` char(8) NOT NULL,
  PRIMARY KEY (`id_estudiante`),
  KEY `id_carrera` (`id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla Estudiante';

ALTER TABLE `estudiante`
ADD CONSTRAINT `fk_carrera_estudiante` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiante` (`id_estudiante`, `id_carrera`, `carnet`, `nombre`, `apellido`, `direccion`, `fecha_ingreso`,  `fecha_nacimiento`, `correo`, `telefono`) VALUES
(2, 2, 'RE02', 'Daniel Alexander', 'Reyes Pineda', 'La Escalon, Pasaje La Union', '2020-01-15', '2001-06-21', 'rp191495@alumno.udb.edu.sv', '77889910'),
(3, 5, 'VA03', 'Mauricio Otmar', 'Vásquez', 'San Jacinto',  '2019-1-12', '1998-12-21', 'sa342516@alumno.udb.edu.sv', '76121311'),
(4, 2, 'DU04', 'Ana Silvia', 'Durán Hernández', 'Col. Ciudad Victoria',  '2017-1-05', '1995-08-21', 'du675894@alumno.udb.edu.sv', '63291304'),
(5, 4, 'HE05', 'Evelyn Lissette', 'Hernández Rivera', 'Col. Bosques del Río',  '2015-12-25', '2001-06-21', 'he678594@alumno.udb.edu.sv', '73124629'),
(6, 6, 'EL06', 'Ricardo Ernesto', 'Elías Guandique', 'Reparto Morazán',  '2020-01-15', '2001-06-21', 'el689574@alumno.udb.edu.sv', '65493826'),
(7, 5, 'CA07', 'Salvador Ernesto', 'Cabrera Rodríguez', 'Col. Las Colinas',  '2020-01-15', '1994-06-21', 'ca756894@alumno.udb.edu.sv', '68574934'),
(8, 2, 'MA08', 'Yesenia Xiomara', 'Martínez Oviedo', 'Residencial Los Conacastes',  '2020-01-15', '1995-06-21', 'ma354672@alumno.udb.edu.sv', '79865743'),
(9, 3, 'RO09', 'Edgardo Alberto', 'Romero Masis', 'Col. Vista al Lago Pje. 3',  '2020-01-15', '1998-06-21', 'ro243561@alumno.udb.edu.sv', '65843923'),
(10, 4,'CA10', 'Blanca Iris', 'Cañas Abarca', '21ª calle poniente',  '2020-01-15', '1997-06-21', 'ca465738@alumno.udb.edu.sv', '77968534'),
(11, 5, 'PO11', 'Claudia Verónica', 'Portillo Abrego', 'Col. San José',  '2020-01-15', '1999-06-21', 'po243561@alumno.udb.edu.sv', '66786945'),
(12, 6, 'AR12', 'Maura Verónica', 'Arévalo Mulato', 'Col. Las Magnolias',  '2020-01-15', '2000-06-21', 'ar465342@alumno.udb.edu.sv', '65843923');


