/*
SQLyog Professional v12.09 (64 bit)
MySQL - 5.6.26 : Database - evento1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`evento1` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;

USE `evento1`;

/*Table structure for table `cargo` */

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo` (
  `id_Cargo` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `nom_cargo` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_Cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `cargo` */

insert  into `cargo`(`id_Cargo`,`nom_cargo`,`descripcion`) values ('c001','Gerencia','...'),('c002','ponencia','...'),('c003','registros','...'),('c004','administrador','...');

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id_tipo_evento` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `nom_evento` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion_evento` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `categoria` */

/*Table structure for table `certificado` */

DROP TABLE IF EXISTS `certificado`;

CREATE TABLE `certificado` (
  `id_certificado` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `titulo_certficado` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `precio_certificado` double DEFAULT NULL,
  PRIMARY KEY (`id_certificado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `certificado` */

/*Table structure for table `distrito` */

DROP TABLE IF EXISTS `distrito`;

CREATE TABLE `distrito` (
  `id_distrito` char(3) COLLATE latin1_spanish_ci NOT NULL,
  `nom_dis` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_distrito`),
  UNIQUE KEY `id_distrito_UNIQUE` (`id_distrito`),
  UNIQUE KEY `nom_dis_UNIQUE` (`nom_dis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `distrito` */

insert  into `distrito`(`id_distrito`,`nom_dis`) values ('D00','');

/*Table structure for table `doc_pago` */

DROP TABLE IF EXISTS `doc_pago`;

CREATE TABLE `doc_pago` (
  `id_doc_pago` char(15) COLLATE latin1_spanish_ci NOT NULL,
  `num_bol` char(15) COLLATE latin1_spanish_ci NOT NULL,
  `participante_id_part` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_doc` date DEFAULT NULL,
  `monto_total` double DEFAULT NULL,
  PRIMARY KEY (`id_doc_pago`),
  UNIQUE KEY `id_doc_pago_UNIQUE` (`id_doc_pago`),
  UNIQUE KEY `num_bol_UNIQUE` (`num_bol`),
  KEY `fk_doc_pago_participante1_idx` (`participante_id_part`),
  CONSTRAINT `fk_doc_pago_participante1` FOREIGN KEY (`participante_id_part`) REFERENCES `participante` (`id_part`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `doc_pago` */

/*Table structure for table `doc_pago_evento` */

DROP TABLE IF EXISTS `doc_pago_evento`;

CREATE TABLE `doc_pago_evento` (
  `doc_pago_id_doc_pago` char(15) COLLATE latin1_spanish_ci NOT NULL,
  `evento_id_evento` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `cant` int(11) NOT NULL,
  `importe` double DEFAULT NULL,
  `certificado_id_certificado` char(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`doc_pago_id_doc_pago`,`evento_id_evento`,`certificado_id_certificado`),
  KEY `fk_doc_pago_has_evento_evento1_idx` (`evento_id_evento`),
  KEY `fk_doc_pago_has_evento_doc_pago1_idx` (`doc_pago_id_doc_pago`),
  KEY `fk_doc_pago_has_evento_certificado1_idx` (`certificado_id_certificado`),
  CONSTRAINT `fk_doc_pago_has_evento_certificado1` FOREIGN KEY (`certificado_id_certificado`) REFERENCES `certificado` (`id_certificado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_doc_pago_has_evento_doc_pago1` FOREIGN KEY (`doc_pago_id_doc_pago`) REFERENCES `doc_pago` (`id_doc_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_doc_pago_has_evento_evento1` FOREIGN KEY (`evento_id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `doc_pago_evento` */

/*Table structure for table `evento` */

DROP TABLE IF EXISTS `evento`;

CREATE TABLE `evento` (
  `id_evento` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `nom_evento` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `precio` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_evento` date DEFAULT NULL,
  `hora_ini` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ambiente` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `categoria_id_tipo_evento` char(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_evento`),
  UNIQUE KEY `id_evento_UNIQUE` (`id_evento`),
  KEY `fk_evento_categoria1_idx` (`categoria_id_tipo_evento`),
  CONSTRAINT `fk_evento_categoria1` FOREIGN KEY (`categoria_id_tipo_evento`) REFERENCES `categoria` (`id_tipo_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `evento` */

/*Table structure for table `evento_ponente` */

DROP TABLE IF EXISTS `evento_ponente`;

CREATE TABLE `evento_ponente` (
  `evento_id_evento` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `ponente_id_ponente` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `hora_ini` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `duracion` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tema` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`evento_id_evento`,`ponente_id_ponente`),
  KEY `fk_evento_has_ponente_ponente1_idx` (`ponente_id_ponente`),
  KEY `fk_evento_has_ponente_evento1_idx` (`evento_id_evento`),
  CONSTRAINT `fk_evento_has_ponente_evento1` FOREIGN KEY (`evento_id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_ponente_ponente1` FOREIGN KEY (`ponente_id_ponente`) REFERENCES `ponente` (`id_ponente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `evento_ponente` */

/*Table structure for table `modulo` */

DROP TABLE IF EXISTS `modulo`;

CREATE TABLE `modulo` (
  `idmodulo` char(3) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_mod` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `modulo` */

insert  into `modulo`(`idmodulo`,`nombre_mod`) values ('001','Usuario'),('002','Reportes'),('003','Seguridad'),('004','Registros');

/*Table structure for table `participante` */

DROP TABLE IF EXISTS `participante`;

CREATE TABLE `participante` (
  `id_part` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `nom_part` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ape_pater` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ape_mater` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `doc_id` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `telf` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `correo` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `distrito_id_distrito` char(3) COLLATE latin1_spanish_ci NOT NULL,
  `procedencia_id_proce` char(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_part`),
  UNIQUE KEY `id_part_UNIQUE` (`id_part`),
  KEY `fk_participante_distrito1_idx` (`distrito_id_distrito`),
  KEY `fk_participante_procedencia1_idx` (`procedencia_id_proce`),
  CONSTRAINT `fk_participante_distrito1` FOREIGN KEY (`distrito_id_distrito`) REFERENCES `distrito` (`id_distrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_participante_procedencia1` FOREIGN KEY (`procedencia_id_proce`) REFERENCES `procedencia` (`id_proce`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `participante` */

insert  into `participante`(`id_part`,`nom_part`,`ape_pater`,`ape_mater`,`doc_id`,`fec_nac`,`telf`,`correo`,`distrito_id_distrito`,`procedencia_id_proce`) values ('P001','Katty','De la cruz',NULL,NULL,NULL,NULL,NULL,'D00','P001'),('P002','Juan','Perez',NULL,NULL,NULL,NULL,NULL,'D00','P001'),('P003','Romina','De la fuente',NULL,NULL,NULL,NULL,NULL,'D00','P001');

/*Table structure for table `participante_evento` */

DROP TABLE IF EXISTS `participante_evento`;

CREATE TABLE `participante_evento` (
  `participante_id_part` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `evento_id_evento` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `asistencia` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`participante_id_part`,`evento_id_evento`),
  KEY `fk_participante_has_evento_evento1_idx` (`evento_id_evento`),
  KEY `fk_participante_has_evento_participante1_idx` (`participante_id_part`),
  CONSTRAINT `fk_participante_has_evento_evento1` FOREIGN KEY (`evento_id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_participante_has_evento_participante1` FOREIGN KEY (`participante_id_part`) REFERENCES `participante` (`id_part`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `participante_evento` */

/*Table structure for table `ponente` */

DROP TABLE IF EXISTS `ponente`;

CREATE TABLE `ponente` (
  `id_ponente` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `Especialidad` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `participante_id_part` char(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_ponente`),
  UNIQUE KEY `id_ponente_UNIQUE` (`id_ponente`),
  KEY `fk_ponente_participante1_idx` (`participante_id_part`),
  CONSTRAINT `fk_ponente_participante1` FOREIGN KEY (`participante_id_part`) REFERENCES `participante` (`id_part`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `ponente` */

/*Table structure for table `ponente_certificado` */

DROP TABLE IF EXISTS `ponente_certificado`;

CREATE TABLE `ponente_certificado` (
  `ponente_id_ponente` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `certificado_id_certificado` char(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`ponente_id_ponente`,`certificado_id_certificado`),
  KEY `fk_ponente_has_certificado_certificado1_idx` (`certificado_id_certificado`),
  KEY `fk_ponente_has_certificado_ponente1_idx` (`ponente_id_ponente`),
  CONSTRAINT `fk_ponente_has_certificado_certificado1` FOREIGN KEY (`certificado_id_certificado`) REFERENCES `certificado` (`id_certificado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ponente_has_certificado_ponente1` FOREIGN KEY (`ponente_id_ponente`) REFERENCES `ponente` (`id_ponente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `ponente_certificado` */

/*Table structure for table `privilegio` */

DROP TABLE IF EXISTS `privilegio`;

CREATE TABLE `privilegio` (
  `idprivilegios` char(3) COLLATE latin1_spanish_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion_priv` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `idmodulo` char(3) COLLATE latin1_spanish_ci DEFAULT NULL,
  `label` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idprivilegios`),
  UNIQUE KEY `idprivilegios_UNIQUE` (`idprivilegios`),
  KEY `privilegio_fk_modulo` (`idmodulo`),
  CONSTRAINT `privilegio_fk_modulo` FOREIGN KEY (`idmodulo`) REFERENCES `modulo` (`idmodulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `privilegio` */

insert  into `privilegio`(`idprivilegios`,`link`,`descripcion_priv`,`idmodulo`,`label`) values ('',NULL,NULL,NULL,'Registra Pago'),('001',NULL,NULL,'001','Cambiar Password'),('002','',NULL,'001','Registrar Usuario'),('003','',NULL,'001','Editar Usuario'),('004',NULL,NULL,'004','Registrar Participante'),('005',NULL,NULL,'004','Registrar Pago'),('007',NULL,NULL,'004','Editar Pago'),('008',NULL,NULL,'004','Registrar Evento'),('009',NULL,NULL,'004','Editar Evento'),('010',NULL,NULL,'004','Registrar Entrega de certificados'),('011',NULL,NULL,'002','Reporte de participantes'),('012',NULL,NULL,'002','Reporte de pagos'),('013',NULL,NULL,'002','Reporte de Eventos'),('014',NULL,NULL,'002','Reporte de certificado entregados');

/*Table structure for table `procedencia` */

DROP TABLE IF EXISTS `procedencia`;

CREATE TABLE `procedencia` (
  `id_proce` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `tipo_proce` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `nom_proce` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `correo_proce` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telf_proce` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_proce`),
  UNIQUE KEY `id_procedencia_UNIQUE` (`id_proce`),
  UNIQUE KEY `correo_UNIQUE` (`correo_proce`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `procedencia` */

insert  into `procedencia`(`id_proce`,`tipo_proce`,`nom_proce`,`correo_proce`,`telf_proce`) values ('P001','','',NULL,NULL);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `usuario_nom` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `participante_id_part` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `Cargo_id_Cargo` char(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario_nom_UNIQUE` (`usuario_nom`),
  KEY `fk_usuario_participante1_idx` (`participante_id_part`),
  KEY `fk_usuario_Cargo1_idx` (`Cargo_id_Cargo`),
  CONSTRAINT `fk_usuario_Cargo1` FOREIGN KEY (`Cargo_id_Cargo`) REFERENCES `cargo` (`id_Cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_participante1` FOREIGN KEY (`participante_id_part`) REFERENCES `participante` (`id_part`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`usuario_nom`,`pass`,`participante_id_part`,`Cargo_id_Cargo`) values ('001','gerencia','827ccb0eea8a706c4c34a16891f84e7b','P001','c001'),('002','juan','827ccb0eea8a706c4c34a16891f84e7b','P002','c003'),('003','romina','827ccb0eea8a706c4c34a16891f84e7b','P003','c004');

/*Table structure for table `usuario_privilegio` */

DROP TABLE IF EXISTS `usuario_privilegio`;

CREATE TABLE `usuario_privilegio` (
  `id_usuario` char(3) COLLATE latin1_spanish_ci NOT NULL,
  `idprivilegios` char(3) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`,`idprivilegios`),
  KEY `usuario_privilegio_fk_privilegio` (`idprivilegios`),
  CONSTRAINT `usuario_privilegio_fk_privilegio` FOREIGN KEY (`idprivilegios`) REFERENCES `privilegio` (`idprivilegios`),
  CONSTRAINT `usuario_privilegio_fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `usuario_privilegio` */

insert  into `usuario_privilegio`(`id_usuario`,`idprivilegios`) values ('001','001'),('003','001'),('001','002'),('003','002'),('001','003'),('003','003'),('001','004'),('002','004'),('001','005'),('002','005'),('001','007'),('002','007'),('001','008'),('002','008'),('001','009'),('002','009'),('001','010'),('001','012'),('001','013'),('001','014');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
