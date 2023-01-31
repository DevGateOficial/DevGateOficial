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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nomeCompleto` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nomeUsuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `senha` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dtNascimento` date NOT NULL,
  `tipoUsuario` enum('aluno','professor','administrador') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagem` varchar(300) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cpf` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `endereco` int DEFAULT NULL,
  `recoverPass` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `confEmail` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `adms_user_sits` int DEFAULT '3',
  PRIMARY KEY (`idUsuario`),
  KEY `endereco_idx` (`endereco`),
  KEY `adms_user_sits_idx` (`adms_user_sits`),
  CONSTRAINT `endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`idEndereco`),
  CONSTRAINT `user_sits` FOREIGN KEY (`adms_user_sits`) REFERENCES `user_sits` (`idAdms_sits`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Marcela Turim','marcelaTurim@Gmail.com','MarcelaDosGatos','$2y$10$DzvGEH5./aLQuIH2qZfcEOiI.1DadrLfiyGQ9jckDB727s8YyYQ6u','2004-04-27','administrador','profileImg1.png','12345678910','123456789',5,NULL,'',1),(5,'Felipe da Silva Gonçalves','felipe@gmail.com','PhillHappy','$2y$10$Knp7odCfeufN5mMZH4FWMuSRNoz2U9lBOUqRdyvaVR4F9bRvg4n2O','2004-04-27','professor','profileImg1.png','12345678910','123456789',13,NULL,'',1),(6,'Daniel Chielle','daniel@Gmail.com','DanDaniel','$2y$10$RH9WcOFg8K.9Ke..eYfi7ORLYmmZsTLZFJfhrqanEGMRufaVJC7P2','2004-04-27','aluno','profileImg3.png','','',NULL,NULL,'',1),(7,'Gabriel Brambilla','gabriel@gmail.com','Gabriel','$2y$10$TP.hLxx2SQHmbb.P5NVG7.R.QZ.RhH1IuCiLL/GlzMfAFlpWxqwF2','2004-04-27','aluno','profileImg1.png','','',NULL,'$2y$10$b4Jn4fqx7IW3Jh40.xF6kOhg0L7v6IN1SzXmhbLlO3nK/wCUUXZH2','',1),(8,'Jefferson Chaves','jeff@Gmail.com','Jeffinho','$2y$10$vLmYGqeEtBfUfPnhm3yJ0uGgENrLa5p5Gt4qFGqpXdUFqauZo/ija','2004-04-27','professor','profileImg2.png','12345678910','123456789',14,NULL,'',1),(9,'Evandro Cantú','cantu@gmail.com','Cantu','$2y$10$6OT1aku9rzBlkualcR58LuuzMkYWa8n0tKGKxsy9x0/u8OUwyXyfu','2004-04-27','professor','profileImg2.png','12345678910','123456789',15,NULL,'',1),(10,'Humberto','humberto@gmail.com','Humberto','$2y$10$hROqWbhr4WO3B42I.aV5Qewia1Hq7Sy/XJGPGQEDmJAogGfR2X/YS','2004-04-27','aluno','profileImg2.png','','',NULL,NULL,'',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
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
