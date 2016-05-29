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

insert  into `cargo`(`id_Cargo`,`nom_cargo`,`descripcion`) values ('C001','Administrador',NULL),('C002','Registrador',NULL);

/*Table structure for table `cargo_privilegio` */

DROP TABLE IF EXISTS `cargo_privilegio`;

CREATE TABLE `cargo_privilegio` (
  `cargo_id_Cargo` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `privilegio_idprivilegios` char(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`cargo_id_Cargo`,`privilegio_idprivilegios`),
  KEY `fk_cargo_has_privilegio_privilegio1_idx` (`privilegio_idprivilegios`),
  KEY `fk_cargo_has_privilegio_cargo1_idx` (`cargo_id_Cargo`),
  CONSTRAINT `fk01` FOREIGN KEY (`cargo_id_Cargo`) REFERENCES `cargo` (`id_Cargo`),
  CONSTRAINT `fk02` FOREIGN KEY (`privilegio_idprivilegios`) REFERENCES `privilegio` (`idprivilegios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `cargo_privilegio` */

insert  into `cargo_privilegio`(`cargo_id_Cargo`,`privilegio_idprivilegios`) values ('C001','001'),('C001','002'),('C001','003'),('C002','004'),('C002','005'),('C002','006'),('C002','007'),('C002','008');

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

insert  into `distrito`(`id_distrito`,`nom_dis`) values ('002','Cercado de  lima'),('001','Chorrillos'),('003','La molina'),('004','Santa Anita');

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
  CONSTRAINT `fk_doc_pago_participante1` FOREIGN KEY (`participante_id_part`) REFERENCES `persona` (`id_part`) ON DELETE NO ACTION ON UPDATE NO ACTION
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

/*Table structure for table `participante` */

DROP TABLE IF EXISTS `participante`;

CREATE TABLE `participante` (
  `id_part` char(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_part`),
  CONSTRAINT `fk` FOREIGN KEY (`id_part`) REFERENCES `persona` (`id_part`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `participante` */

insert  into `participante`(`id_part`) values ('001'),('002'),('004');

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
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

/*Data for the table `persona` */

insert  into `persona`(`id_part`,`nom_part`,`ape_pater`,`ape_mater`,`doc_id`,`fec_nac`,`telf`,`correo`,`distrito_id_distrito`,`procedencia_id_proce`) values ('001','Katty ','De la Cruz',NULL,NULL,NULL,NULL,NULL,'001','002'),('002','Pedro','Lopez',NULL,NULL,NULL,NULL,NULL,'002','001'),('003','Romina','Torres',NULL,NULL,NULL,NULL,NULL,'004','003'),('004','Fátima','Rodrguez',NULL,NULL,NULL,NULL,NULL,'004','004');

/*Table structure for table `persona_evento` */

DROP TABLE IF EXISTS `persona_evento`;

CREATE TABLE `persona_evento` (
  `participante_id_part` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `evento_id_evento` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `asistencia` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`participante_id_part`,`evento_id_evento`),
  KEY `fk_participante_has_evento_evento1_idx` (`evento_id_evento`),
  KEY `fk_participante_has_evento_participante1_idx` (`participante_id_part`),
  CONSTRAINT `fk_participante_has_evento_evento1` FOREIGN KEY (`evento_id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_participante_has_evento_participante1` FOREIGN KEY (`participante_id_part`) REFERENCES `persona` (`id_part`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `persona_evento` */

/*Table structure for table `ponente` */

DROP TABLE IF EXISTS `ponente`;

CREATE TABLE `ponente` (
  `id_ponente` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `Especialidad` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `participante_id_part` char(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_ponente`),
  UNIQUE KEY `id_ponente_UNIQUE` (`id_ponente`),
  KEY `fk_ponente_participante1_idx` (`participante_id_part`),
  CONSTRAINT `fk_ponente_participante1` FOREIGN KEY (`participante_id_part`) REFERENCES `persona` (`id_part`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `ponente` */

insert  into `ponente`(`id_ponente`,`Especialidad`,`participante_id_part`) values ('001','bd','003');

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
  `label` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idprivilegios`),
  UNIQUE KEY `idprivilegios_UNIQUE` (`idprivilegios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `privilegio` */

insert  into `privilegio`(`idprivilegios`,`link`,`descripcion_priv`,`label`) values ('001','registrar usuario',NULL,'Registrar Usuario'),('002','editar usuario',NULL,'Editar Usuario'),('003','cambiar password',NULL,'Cambiar password'),('004','registrar pago',NULL,'Registrar Pago'),('005','editar pago',NULL,'Editar Pago'),('006','registrar evento',NULL,'Registrar Evento'),('007','editar evento',NULL,'Editar Evento'),('008','registrar certificacion',NULL,'Registrar Certificación');

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

insert  into `procedencia`(`id_proce`,`tipo_proce`,`nom_proce`,`correo_proce`,`telf_proce`) values ('001','','UNMMS',NULL,NULL),('002','','UNTELS',NULL,NULL),('003','','UNI',NULL,NULL),('004','','UNFV',NULL,NULL);

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
  CONSTRAINT `fk_usuario_participante1` FOREIGN KEY (`participante_id_part`) REFERENCES `persona` (`id_part`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`usuario_nom`,`pass`,`participante_id_part`,`Cargo_id_Cargo`) values ('001','katty','827ccb0eea8a706c4c34a16891f84e7b','001','C001'),('002','Pedro','827ccb0eea8a706c4c34a16891f84e7b','002','C002');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
