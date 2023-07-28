-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para proyecto_db
CREATE DATABASE IF NOT EXISTS `proyecto_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `proyecto_db`;

-- Volcando estructura para tabla proyecto_db.carreras
CREATE TABLE IF NOT EXISTS `carreras` (
  `id_carreras` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_carreras`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyecto_db.carreras: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
INSERT INTO `carreras` (`id_carreras`, `nombre`) VALUES
	(1, 'TECNICO SUPERIOR EN DESARROLLO DE SOFTWARE'),
	(2, 'ANALISTA EN MEDIO AMBIENTE'),
	(3, 'TECNICO SUPERIOR EN INFRAESTRUCTURA DE TECNOLOGIA '),
	(4, 'TECNICO SUPERIOR EN GESTION INDUSTRIAL');
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto_db.examenes
CREATE TABLE IF NOT EXISTS `examenes` (
  `id_examenes` int(11) NOT NULL AUTO_INCREMENT,
  `carrera` int(11) NOT NULL DEFAULT 0,
  `anio` int(11) NOT NULL DEFAULT 0,
  `espacio_curricular` int(11) NOT NULL DEFAULT 0,
  `llamado_1` date NOT NULL,
  `llamado_2` date NOT NULL,
  `hora` time NOT NULL,
  `presidente` varchar(50) NOT NULL DEFAULT '',
  `vocal_1` varchar(50) NOT NULL DEFAULT '',
  `vocal_2` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_examenes`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyecto_db.examenes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `examenes` DISABLE KEYS */;
INSERT INTO `examenes` (`id_examenes`, `carrera`, `anio`, `espacio_curricular`, `llamado_1`, `llamado_2`, `hora`, `presidente`, `vocal_1`, `vocal_2`) VALUES
	(92, 1, 1, 1, '2023-04-12', '2023-04-05', '01:18:00', 'Moschen Silvio', 'Fontana Claudia', 'Roelschin Sebastian'),
	(93, 2, 2, 28, '2023-04-24', '2023-04-19', '03:19:00', 'asdasd', 'rewe', 'dasads');
/*!40000 ALTER TABLE `examenes` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto_db.inscripcion_alumno
CREATE TABLE IF NOT EXISTS `inscripcion_alumno` (
  `id_inscripcion_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `condicion` varchar(50) NOT NULL DEFAULT '0',
  `anio_regular` year(4) NOT NULL DEFAULT 2000,
  `llamado` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_inscripcion_alumno`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyecto_db.inscripcion_alumno: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inscripcion_alumno` DISABLE KEYS */;
INSERT INTO `inscripcion_alumno` (`id_inscripcion_alumno`, `id_alumno`, `id_examen`, `condicion`, `anio_regular`, `llamado`) VALUES
	(110, 34, 84, 'Alunmno Libre', '2023', 'Segundo Llamado');
/*!40000 ALTER TABLE `inscripcion_alumno` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto_db.inscriptos
CREATE TABLE IF NOT EXISTS `inscriptos` (
  `idinscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `idalumno` int(11) NOT NULL,
  `idmesa` int(11) NOT NULL,
  PRIMARY KEY (`idinscripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyecto_db.inscriptos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inscriptos` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscriptos` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto_db.mat
CREATE TABLE IF NOT EXISTS `mat` (
  `id_mat` int(11) DEFAULT NULL,
  `descrip_mat` varchar(50) DEFAULT NULL,
  `anio_mat` int(11) DEFAULT NULL,
  `carrera_mat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyecto_db.mat: ~108 rows (aproximadamente)
/*!40000 ALTER TABLE `mat` DISABLE KEYS */;
INSERT INTO `mat` (`id_mat`, `descrip_mat`, `anio_mat`, `carrera_mat`) VALUES
	(26, 'Matematica I', 1, 2),
	(27, 'Quimica I', 1, 2),
	(28, 'Fisica I', 1, 2),
	(29, 'Biologia', 1, 2),
	(30, 'Biodiversidad I', 1, 2),
	(31, 'Metodologia de la Investigacion', 1, 2),
	(32, 'Ecologia I', 1, 2),
	(34, 'Ingles I', 1, 2),
	(35, 'Informatica I', 1, 2),
	(36, 'Antropologia Filosofica', 1, 2),
	(37, 'Matematica II', 2, 2),
	(38, 'Quimica II', 2, 2),
	(39, 'Fisica II', 2, 2),
	(40, 'Quimica Biologica y Microbiologia', 2, 2),
	(41, 'Biodiversidad II', 2, 2),
	(42, 'Psicologia Ambiental', 2, 2),
	(43, 'Ecologia II', 2, 2),
	(44, 'Economia y Medio Ambiente', 2, 2),
	(45, 'Legislacion Ambiental', 2, 2),
	(46, 'Ingles II', 2, 2),
	(47, 'Informatica II', 2, 2),
	(48, 'Formacion Nacional', 2, 2),
	(49, 'Problematica ambiental urbana', 2, 2),
	(50, 'Estadistica', 3, 2),
	(51, 'Ingles III', 3, 2),
	(52, 'Informatica Aplicada', 3, 2),
	(53, 'Bioetica', 3, 2),
	(54, 'Ecologia III', 3, 2),
	(55, 'Auditoria Ambiental', 3, 2),
	(56, 'Termodinamica', 3, 2),
	(57, 'Fisico Quimica', 3, 2),
	(58, 'Quimica y toxicologia ambiental', 3, 2),
	(59, 'Ingenieria Ambiental', 3, 2),
	(60, 'Ecologia Humana', 3, 2),
	(61, 'Ecologia Cultural', 3, 2),
	(33, 'Ecogeografia', 1, 2),
	(1, 'Comunicacion', 1, 1),
	(2, 'Unidad de definicion institucional', 1, 1),
	(3, 'Ingles tecnico I', 1, 1),
	(4, 'Matematica', 1, 1),
	(5, 'Administracion', 1, 1),
	(6, 'Tecnologia de la informacion', 1, 1),
	(7, 'Logica y estructura de datos', 1, 1),
	(8, 'Ingenieria del software I', 1, 1),
	(9, 'Sistemas operativos', 1, 1),
	(10, 'Problematicas socio contemporaneas', 2, 1),
	(11, 'Unidad de definicion institucional II', 2, 1),
	(12, 'Ingles tecnico II', 2, 1),
	(13, 'Innovacion y desarrollo Emprendedor', 2, 1),
	(14, 'Estadistica', 2, 1),
	(15, 'Programacion I', 2, 1),
	(16, 'Ingenieria del software II', 2, 1),
	(17, 'Base de datos I', 2, 1),
	(18, 'Practicas profesionalizantes I', 2, 1),
	(19, 'Etica y responsabilidad social', 3, 1),
	(20, 'Derecho y legislacion laboral', 3, 1),
	(21, 'Redes y comunicacion', 3, 1),
	(22, 'Programacion II', 3, 1),
	(23, 'Gestion de proyectos de software', 3, 1),
	(24, 'Base de datos II', 3, 1),
	(25, 'Practicas profesionalizantes II', 3, 1),
	(62, 'Comunicacion', 1, 3),
	(63, 'Unidad de definicion institucional I', 1, 3),
	(64, 'Ingles tecnico I', 1, 3),
	(65, 'Matematica', 1, 3),
	(66, 'Fisica aplicada a las tecnologias de la informacio', 1, 3),
	(67, 'Administracion ', 1, 3),
	(68, 'Arquitectura de las computadoras', 1, 3),
	(69, 'Logica y programacion', 1, 3),
	(70, 'Infraestructura en redes I', 1, 3),
	(71, 'Problematicas socio contemporaneas', 2, 3),
	(72, 'Unidad de definicion Institucional II', 2, 3),
	(73, 'Innovacion y desarrollo emprendedor', 2, 3),
	(74, 'Estadistica', 2, 3),
	(75, 'Sistemas operativos', 2, 3),
	(76, 'Algoritmo y estructura de datos', 2, 3),
	(77, 'Base de datos ', 2, 3),
	(78, 'Infraestructura en redes II', 2, 3),
	(79, 'Practicas profesionalizantes I', 2, 3),
	(80, 'Etica y responsabilidad social', 3, 3),
	(81, 'Derecho y legislacion laboral', 3, 3),
	(82, 'Administracion de base de datos ', 3, 3),
	(83, 'Seguridad de los sistemas', 3, 3),
	(84, 'Integridad y migracion de datos', 3, 3),
	(85, 'Administracion de sistemas operativos y redes', 3, 3),
	(86, 'Practicas profesionalizantes II', 3, 3),
	(87, 'Comunicacion', 1, 4),
	(88, 'Unidad de definicion institucional I', 1, 4),
	(89, 'Economia I', 1, 4),
	(90, 'Matematica y estadistica', 1, 4),
	(91, 'Contabilidad y finanzas', 1, 4),
	(92, 'Informatica', 1, 4),
	(93, 'Administracion', 1, 4),
	(94, 'Estrategia Empresarial', 1, 4),
	(95, 'Planificacion y control de la produccion', 1, 4),
	(96, 'Gestion del talento humano', 1, 4),
	(97, 'Gestion de costos', 1, 4),
	(98, 'Problematicas socio contemporaneas', 2, 4),
	(99, 'Unidad de definicion institucional II', 2, 4),
	(100, 'Innovacion y desarrollo emprendedor', 2, 4),
	(101, 'Gestion de calidad', 2, 4),
	(102, 'Logica y gestion de la cadena de abastecimiento', 2, 4),
	(103, 'Gestion de comercializacion e investigacion comerc', 2, 4),
	(104, 'Ingles tecnico', 2, 4),
	(105, 'Gestion contable', 2, 4),
	(106, 'Practicas profesionalizante I', 2, 4),
	(107, 'Gestion de seguridad salud ocupacional y medio amb', 3, 4),
	(108, 'Etica y responsabilidad social', 3, 4),
	(109, 'Legislacion laboral', 3, 4),
	(110, 'gestion de mantenimiento industrial', 3, 4),
	(111, 'Sistemas informaticos administrativos contables (S', 3, 4),
	(112, 'Gestion financiera', 3, 4),
	(113, 'Evaluacion y gestion de proyectos de inversion', 3, 4),
	(114, 'Control de gestion', 3, 4),
	(115, 'Practicas profesionalizantes II', 3, 4);
/*!40000 ALTER TABLE `mat` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto_db.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `fk_rol` int(11) NOT NULL,
  `carrera` int(11) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyecto_db.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `username`, `pass`, `nombre`, `apellido`, `fk_rol`, `carrera`, `celular`, `correo`) VALUES
	(34, '41403362', '123', 'Enzo', 'Marquez', 0, 1, '3482647506', 'enzomarquez42@gmail.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
