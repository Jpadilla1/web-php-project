-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2014 at 06:42 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistema_seguridad_administracion`
--
CREATE DATABASE IF NOT EXISTS `sistema_seguridad_administracion` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistema_seguridad_administracion`;

-- --------------------------------------------------------

--
-- Table structure for table `asignado`
--

CREATE TABLE IF NOT EXISTS `asignado` (
  `sis_id_PK` varchar(4) NOT NULL COMMENT 'Código del sistema.',
  `usu_id_PK` varchar(6) NOT NULL COMMENT 'Id del usuario ',
  PRIMARY KEY (`sis_id_PK`,`usu_id_PK`),
  KEY `sis_id_PK` (`sis_id_PK`),
  KEY `usu_id_PK` (`usu_id_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `asignado`
--

INSERT INTO `asignado` (`sis_id_PK`, `usu_id_PK`) VALUES
('001', '5767');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_id_PK` varchar(4) NOT NULL COMMENT 'id de la categoría ',
  `cat_titulo` varchar(20) NOT NULL COMMENT 'Título de la categoría del usuario ',
  `cat_descripcion` varchar(60) NOT NULL COMMENT 'Descripción de lo que esa categoría  usualmente puede o no puede hacer',
  PRIMARY KEY (`cat_id_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de categoria';

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`cat_id_PK`, `cat_titulo`, `cat_descripcion`) VALUES
('001', 'Admin', 'Administratcion'),
('002', 'Superuser', 'Super usuario'),
('003', 'Normal', 'usuario normal');

-- --------------------------------------------------------

--
-- Table structure for table `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
  `sis_id_PK` varchar(4) NOT NULL COMMENT 'Código del sistema. ',
  `sis_titulo` varchar(20) NOT NULL COMMENT 'Título del nombre del sistema. Ej.  Presupuesto. ',
  `sis_descripcion` varchar(30) NOT NULL COMMENT 'Descripción detallada de lo que es el  sistema.',
  PRIMARY KEY (`sis_id_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sistema`
--

INSERT INTO `sistema` (`sis_id_PK`, `sis_titulo`, `sis_descripcion`) VALUES
('001', 'Accounting', 'sistema de contabilidad'),
('002', 'Payroll', 'sistema de nomina');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_id_PK` varchar(6) NOT NULL COMMENT 'Id del usuario ',
  `usu_username` varchar(15) NOT NULL COMMENT 'nombre de usuario ',
  `usu_password` varchar(64) DEFAULT NULL COMMENT 'clave',
  `usu_nombre` varchar(40) NOT NULL COMMENT 'Nombre y apellidos reales ',
  `usu_last_login` date DEFAULT NULL COMMENT 'Fecha del último acceso ',
  `usu_intentos_fallidos` int(11) DEFAULT NULL COMMENT 'Cant. de intentos fallidos a la cuenta. ',
  `usu_fecha_creacion` date NOT NULL COMMENT 'Fecha en que se creó la cuenta ',
  `usu_fecha_expiracion` date DEFAULT NULL COMMENT 'Fecha en que expirará la cuenta ',
  `usu_fecha_cambio_password` date DEFAULT NULL COMMENT 'Fecha en que se cambió la clave por  última vez ',
  `usu_flag_cambio_password` char(1) DEFAULT NULL COMMENT 'Si está activo (true) la clave se va a  cambiar la cantidad de días que se  indique en el siguiente atributo. T o F',
  `usu_cantidad_dias_password` int(11) DEFAULT NULL COMMENT 'Cantidad de días a partir de la fecha  del último cambio de clave para que le  solicite al usuario que lo cambie. ',
  `cat_id_FK` varchar(4) DEFAULT NULL COMMENT 'id de la categoría',
  PRIMARY KEY (`usu_id_PK`),
  UNIQUE KEY `usu_username` (`usu_username`),
  KEY `cat_id_FK` (`cat_id_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de usuario';

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usu_id_PK`, `usu_username`, `usu_password`, `usu_nombre`, `usu_last_login`, `usu_intentos_fallidos`, `usu_fecha_creacion`, `usu_fecha_expiracion`, `usu_fecha_cambio_password`, `usu_flag_cambio_password`, `usu_cantidad_dias_password`, `cat_id_FK`) VALUES
('1111', 'dale', '123', 'dale', '2014-05-17', 0, '2014-05-17', '2014-05-17', '2014-05-17', '0', 1000, '001'),
('1234', 'jose', '1234', 'jose', '2014-05-17', 10, '2014-05-17', '2014-05-17', '2014-05-17', '0', 1000, '001'),
('5767', 'admin', 'admin', 'jose', '2014-05-16', 13, '2014-05-16', '2014-05-16', '2014-05-16', '0', 100, '001');

-- --------------------------------------------------------

--
-- Table structure for table `vitacora`
--

CREATE TABLE IF NOT EXISTS `vitacora` (
  `id` int(11) NOT NULL DEFAULT '0',
  `usu_id_PK_FK` varchar(6) NOT NULL COMMENT 'Id del usuario',
  `vit_codigo` varchar(3) NOT NULL COMMENT 'Código abreviado de la acción del  usuario. Más adelante se listan los  códigos a utilizar. ',
  `vit_nemonic` varchar(10) NOT NULL COMMENT 'Abreviación de la acción del usuario. ',
  `vit_accion` varchar(30) NOT NULL COMMENT 'Una descripción del proceso que hizo  el usuario. También se va a incluir una  lista',
  `vit_fecha` date NOT NULL COMMENT 'fecha',
  PRIMARY KEY (`id`),
  KEY `usu_id_PK_FK` (`usu_id_PK_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de vitacora';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asignado`
--
ALTER TABLE `asignado`
  ADD CONSTRAINT `sis_id_PK` FOREIGN KEY (`sis_id_PK`) REFERENCES `sistema` (`sis_id_PK`),
  ADD CONSTRAINT `usu_id_PK` FOREIGN KEY (`usu_id_PK`) REFERENCES `usuario` (`usu_id_PK`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `cat_id_FK` FOREIGN KEY (`cat_id_FK`) REFERENCES `categoria` (`cat_id_PK`) ON UPDATE CASCADE;

--
-- Constraints for table `vitacora`
--
ALTER TABLE `vitacora`
  ADD CONSTRAINT `usu_id_PK_FK` FOREIGN KEY (`usu_id_PK_FK`) REFERENCES `usuario` (`usu_id_PK`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
