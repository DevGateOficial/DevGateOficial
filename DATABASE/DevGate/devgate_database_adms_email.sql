-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: devgate_database
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adms_email`
--

DROP TABLE IF EXISTS `adms_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adms_email` (
  `idEmail` int NOT NULL AUTO_INCREMENT,
  `title` varchar(220) DEFAULT NULL,
  `name` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `host` varchar(220) DEFAULT NULL,
  `username` varchar(220) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `smtpsecure` varchar(220) DEFAULT NULL,
  `port` int DEFAULT NULL,
  PRIMARY KEY (`idEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adms_email`
--

LOCK TABLES `adms_email` WRITE;
/*!40000 ALTER TABLE `adms_email` DISABLE KEYS */;
INSERT INTO `adms_email` VALUES (1,'Confirmação de E-mail','Confirmação de E-mail','devgate.oficial@Gmail.com','smtp.mailtrap.io','b321e9d6f98510','607e3f5ebf4b75','PHPMailer::ENCRYPTION_STARTTLS',2525),(2,'Recuperar senha','Recuperar senha','devgate.oficial@Gmai.com','smtp.mailtrap.io','b321e9d6f98510','607e3f5ebf4b75','PHPMailer::ENCRYPTION_STARTTLS',2525);
/*!40000 ALTER TABLE `adms_email` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-30 22:03:11
