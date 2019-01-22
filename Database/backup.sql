-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: cseemyweb.essex.ac.uk    Database: ce29x_bd17671
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `carID` int(11) NOT NULL AUTO_INCREMENT,
  `Make` varchar(45) DEFAULT NULL,
  `Model` varchar(45) NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`carID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'Ford','Mondeo',21500),(2,'Ford','Focus',18000),(3,'Ford','Fiesta',14000);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colours`
--

DROP TABLE IF EXISTS `colours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colours` (
  `colour` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`colour`,`carID`),
  KEY `carID` (`carID`),
  CONSTRAINT `colours_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colours`
--

LOCK TABLES `colours` WRITE;
/*!40000 ALTER TABLE `colours` DISABLE KEYS */;
INSERT INTO `colours` VALUES ('Green',1,0),('Green',2,0),('Green',3,0),('Matt Black',1,2000),('Metallic Blue',1,1500),('Metallic Blue',2,1000),('Metallic Blue',3,1000),('Red',1,0),('Red',2,0),('Red',3,0);
/*!40000 ALTER TABLE `colours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `custID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`custID`,`email`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `custID_UNIQUE` (`custID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (18,'boris.descubes@gmail.com'),(23,'bd17671@essex.ac.uk');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `engines`
--

DROP TABLE IF EXISTS `engines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `engines` (
  `engine` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`engine`,`carID`),
  KEY `carID` (`carID`),
  CONSTRAINT `engines_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `engines`
--

LOCK TABLES `engines` WRITE;
/*!40000 ALTER TABLE `engines` DISABLE KEYS */;
INSERT INTO `engines` VALUES ('1.0L',2,0),('1.0L',3,0),('1.4L',1,0),('2.0L',1,1750),('2.0L',2,1500),('2.0L',3,1500),('2.2L',2,1750),('2.2L',3,1750),('3.0L',1,3000);
/*!40000 ALTER TABLE `engines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interiors`
--

DROP TABLE IF EXISTS `interiors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interiors` (
  `interior` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`interior`,`carID`),
  KEY `carID` (`carID`),
  CONSTRAINT `interiors_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interiors`
--

LOCK TABLES `interiors` WRITE;
/*!40000 ALTER TABLE `interiors` DISABLE KEYS */;
INSERT INTO `interiors` VALUES ('Full Leather',1,2000),('Full Leather',2,1000),('Full Leather',3,1000),('Half Leather',1,1250),('Half Leather',2,500),('Half Leather',3,500),('Standard',1,0),('Standard',2,0),('Standard',3,0);
/*!40000 ALTER TABLE `interiors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `carID` int(11) DEFAULT NULL,
  `carTrim` varchar(45) DEFAULT NULL,
  `colour` varchar(45) DEFAULT NULL,
  `interior` varchar(45) DEFAULT NULL,
  `engine` varchar(45) DEFAULT NULL,
  `wheel` varchar(45) DEFAULT NULL,
  `sensors` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `carID` (`carID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (21,2,'Sport','Red','Half Leather','2.2L','18 Sport Alloy','Yes',25350),(22,1,'Standard','Green','Standard','1.4L','Standard','No',21500),(23,1,'Standard','Green','Standard','1.4L','Standard','No',21500),(24,1,'Standard','Green','Standard','1.4L','Standard','No',21500),(25,3,'EcoMax','Metallic Blue','Full Leather','2.2L','17 Executive Alloy','Yes',21250),(26,1,'Standard','Green','Standard','1.4L','Standard','No',21500),(27,1,'Standard','Green','Standard','1.4L','Standard','No',21500);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensors`
--

DROP TABLE IF EXISTS `sensors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sensors` (
  `sensors` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`sensors`,`carID`),
  KEY `carID` (`carID`),
  CONSTRAINT `sensors_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensors`
--

LOCK TABLES `sensors` WRITE;
/*!40000 ALTER TABLE `sensors` DISABLE KEYS */;
INSERT INTO `sensors` VALUES ('No',1,0),('No',2,0),('No',3,0),('Yes',1,1000),('Yes',2,1000),('Yes',3,1000);
/*!40000 ALTER TABLE `sensors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trims`
--

DROP TABLE IF EXISTS `trims`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trims` (
  `carTrim` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`carTrim`,`carID`),
  KEY `carID` (`carID`),
  CONSTRAINT `trims_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trims`
--

LOCK TABLES `trims` WRITE;
/*!40000 ALTER TABLE `trims` DISABLE KEYS */;
INSERT INTO `trims` VALUES ('EcoMax',2,600),('EcoMax',3,500),('Sport',1,750),('Sport',2,1600),('Sport',3,1500),('Standard',1,0),('Standard',2,0),('Standard',3,0),('Titanium',1,3000),('Titanium',2,2100),('Titanium',3,2000);
/*!40000 ALTER TABLE `trims` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wheels`
--

DROP TABLE IF EXISTS `wheels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wheels` (
  `wheel` varchar(45) NOT NULL,
  `carID` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`wheel`,`carID`),
  KEY `carID` (`carID`),
  CONSTRAINT `wheels_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `cars` (`carID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wheels`
--

LOCK TABLES `wheels` WRITE;
/*!40000 ALTER TABLE `wheels` DISABLE KEYS */;
INSERT INTO `wheels` VALUES ('16 Alloy',1,1500),('16 Alloy',2,1500),('16 Alloy',3,1500),('17 Executive Alloy',1,2000),('17 Executive Alloy',2,2000),('17 Executive Alloy',3,2000),('18 Sport Alloy',1,2500),('18 Sport Alloy',2,2500),('18 Sport Alloy',3,2500),('Standard',1,0),('Standard',2,0),('Standard',3,0);
/*!40000 ALTER TABLE `wheels` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-18  7:04:47
