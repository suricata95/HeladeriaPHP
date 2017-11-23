CREATE DATABASE  IF NOT EXISTS `heladeria` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `heladeria`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: heladeria
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `caja`
--

DROP TABLE IF EXISTS `caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja` (
  `idcaja` int(11) NOT NULL AUTO_INCREMENT,
  `totalInicio` decimal(10,2) DEFAULT NULL,
  `totalFin` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idcaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja`
--

LOCK TABLES `caja` WRITE;
/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallepedido`
--

DROP TABLE IF EXISTS `detallepedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallepedido` (
  `iddetallePedido` int(11) NOT NULL AUTO_INCREMENT,
  `pedidoID` int(11) DEFAULT NULL,
  `productoID` int(11) DEFAULT NULL,
  `saborID` int(11) DEFAULT NULL,
  `extraID` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddetallePedido`),
  KEY `FKProducto_idx` (`productoID`),
  KEY `FKSaborDetalle_idx` (`saborID`),
  KEY `FKExtraDetalle_idx` (`extraID`),
  KEY `FKPedidoDetalle_idx` (`pedidoID`),
  CONSTRAINT `FKExtraDetalle` FOREIGN KEY (`extraID`) REFERENCES `extra` (`idExtras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKPedidoDetalle` FOREIGN KEY (`pedidoID`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKProductoDetalle` FOREIGN KEY (`productoID`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKSaborDetalle` FOREIGN KEY (`saborID`) REFERENCES `sabor` (`idSabor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallepedido`
--

LOCK TABLES `detallepedido` WRITE;
/*!40000 ALTER TABLE `detallepedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallepedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadopedido`
--

DROP TABLE IF EXISTS `estadopedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadopedido` (
  `idestadoPedido` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idestadoPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadopedido`
--

LOCK TABLES `estadopedido` WRITE;
/*!40000 ALTER TABLE `estadopedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadopedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extra`
--

DROP TABLE IF EXISTS `extra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extra` (
  `idExtras` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idExtras`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extra`
--

LOCK TABLES `extra` WRITE;
/*!40000 ALTER TABLE `extra` DISABLE KEYS */;
/*!40000 ALTER TABLE `extra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formapago`
--

DROP TABLE IF EXISTS `formapago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formapago` (
  `idformaPago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idformaPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formapago`
--

LOCK TABLES `formapago` WRITE;
/*!40000 ALTER TABLE `formapago` DISABLE KEYS */;
/*!40000 ALTER TABLE `formapago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `clienteID` int(11) DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `pagoID` int(11) DEFAULT NULL,
  `cajaID` int(11) NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `FKPagoPedido_idx` (`pagoID`),
  KEY `FKClientePedido_idx` (`clienteID`),
  KEY `FKEstadoPedido_idx` (`estado`),
  KEY `FKCajaPedido_idx` (`cajaID`),
  CONSTRAINT `FKCajaPedido` FOREIGN KEY (`cajaID`) REFERENCES `caja` (`idcaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKClientePedido` FOREIGN KEY (`clienteID`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKEstadoPedido` FOREIGN KEY (`estado`) REFERENCES `estadopedido` (`idestadoPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKPagoPedido` FOREIGN KEY (`pagoID`) REFERENCES `formapago` (`idformaPago`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `FKTipoProducto_idx` (`tipo`),
  CONSTRAINT `FKTipoProducto` FOREIGN KEY (`tipo`) REFERENCES `tipoproducto` (`idtipoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocion`
--

DROP TABLE IF EXISTS `promocion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promocion` (
  `idPromocion` int(11) NOT NULL,
  `decripcion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  PRIMARY KEY (`idPromocion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocion`
--

LOCK TABLES `promocion` WRITE;
/*!40000 ALTER TABLE `promocion` DISABLE KEYS */;
/*!40000 ALTER TABLE `promocion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocionsaborproducto`
--

DROP TABLE IF EXISTS `promocionsaborproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promocionsaborproducto` (
  `idpromocionSaborProducto` int(11) NOT NULL,
  `producto` int(11) DEFAULT NULL,
  `sabor` int(11) DEFAULT NULL,
  `promocion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpromocionSaborProducto`),
  KEY `FKPromoSabor_idx` (`sabor`),
  KEY `FKPromoProducto_idx` (`producto`),
  KEY `FKpromoPromo_idx` (`promocion`),
  CONSTRAINT `FKPromoProducto` FOREIGN KEY (`producto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKPromoSabor` FOREIGN KEY (`sabor`) REFERENCES `sabor` (`idSabor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FKpromoPromo` FOREIGN KEY (`promocion`) REFERENCES `promocion` (`idPromocion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocionsaborproducto`
--

LOCK TABLES `promocionsaborproducto` WRITE;
/*!40000 ALTER TABLE `promocionsaborproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `promocionsaborproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sabor`
--

DROP TABLE IF EXISTS `sabor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sabor` (
  `idSabor` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSabor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sabor`
--

LOCK TABLES `sabor` WRITE;
/*!40000 ALTER TABLE `sabor` DISABLE KEYS */;
/*!40000 ALTER TABLE `sabor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoproducto`
--

DROP TABLE IF EXISTS `tipoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoproducto` (
  `idtipoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idtipoProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproducto`
--

LOCK TABLES `tipoproducto` WRITE;
/*!40000 ALTER TABLE `tipoproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `idtipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idtipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'Administrador');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreUsuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contraseña` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idTipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `FKUsuarioTipo_idx` (`idTipo`),
  CONSTRAINT `FKUsuarioTipo` FOREIGN KEY (`idTipo`) REFERENCES `tipousuario` (`idtipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Kevin','Sánchez','1','1',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'heladeria'
--

--
-- Dumping routines for database 'heladeria'
--
/*!50003 DROP PROCEDURE IF EXISTS `ConsultaUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultaUsuario`(in nU varchar(45), in c varchar(45))
BEGIN
select * from usuario where nombreUsuario = nU and contraseña = c;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-23  1:24:41
