CREATE DATABASE  IF NOT EXISTS `bdcrudalphacode` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdcrudalphacode`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: bdcrudalphacode
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `mail` varchar(180) NOT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `cellphone` varchar(17) NOT NULL,
  `send_wpp` tinyint(1) DEFAULT NULL,
  `send_mail_permission` tinyint(1) DEFAULT NULL,
  `send_sms_permission` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `actived` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `phone_2` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (41,'marcus','2002-09-13','marcus@gmail.com','dev','11932715817','1132715817',1,1,1,'2024-08-27 03:00:00','2024-08-28 22:19:49',0),(42,'marcus','2002-09-13','marcus@gamil.com','dev','1932518474','',1,1,1,'2024-08-27 03:00:00','2024-08-28 22:21:05',0),(43,'marcus','2002-09-13','viffni@gmail.com','dev','1293271851','1132715817',0,0,0,'2024-08-27 03:00:00','2024-08-28 19:20:34',1),(46,'marcus','2002-09-13','vini@gmail.com','dev','1132718517','11932715817',1,1,1,'2024-08-27 03:00:00','2024-08-28 21:35:13',1),(48,'marcus','2002-09-13','vinissa@gmail.com','dev','1132749517','11832115817',1,1,1,'2024-08-28 18:13:09','2024-08-28 21:35:13',1),(50,'Marcus Vinnicius Rodrigues de Souza','2024-08-15','marcusvinniciusoussza@gmail.com','dev','(11) 9371-5817','(11) 1111-11111',0,0,0,'2024-08-28 19:37:02','2024-08-28 20:54:31',1),(51,'flavio silva','2024-01-15','falviosilva@gmail.com','CIO','(11) 9856-7487','(11) 9325-4866',1,0,1,'2024-08-28 21:00:37','2024-08-28 22:20:42',1),(52,'lucio','2023-01-10','lucio@gmail.com','adm','(15) 6456-1654','(15) 6156-1566',1,0,0,'2024-08-28 22:21:44',NULL,1);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-28 19:23:18
