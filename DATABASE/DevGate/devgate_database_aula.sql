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
-- Table structure for table `aula`
--

DROP TABLE IF EXISTS `aula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aula` (
  `idAula` int NOT NULL AUTO_INCREMENT,
  `nomeAula` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descricao` varchar(6000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idCurso` int NOT NULL,
  PRIMARY KEY (`idAula`),
  KEY `idCurso_idx` (`idCurso`),
  CONSTRAINT `idCurso` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aula`
--

LOCK TABLES `aula` WRITE;
/*!40000 ALTER TABLE `aula` DISABLE KEYS */;
INSERT INTO `aula` VALUES (21,'Introdução','<p>Nessa aula é apresentada a história e evolução da linguagem PHP, explicando porque é uma das linguagens mais populares para desenvolvimento de aplicações web. Em seguida, os alunos aprendem sobre os principais usos do PHP, como criar páginas dinâmicas e se comunicar com banco de dados. Ao<span style=\"font-size: 1.6rem;\">&nbsp;final da aula, os alunos serão capazes de entender a importância do PHP no desenvolvimento web e estarão preparados para começar a aprender as técnicas avançadas da linguagem.</span></p>',2),(22,'Prática Simples','<p>Nesta aula você irá aprender a criar um site simples utilizando PHP, HTML e CSS.</p>',2),(23,'Introdução','<p>Primeiros passos para começar a aprender</p>',3),(24,'Processo de Software','<p>Especificação de Software e Processo de Software</p>',4);
/*!40000 ALTER TABLE `aula` ENABLE KEYS */;
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
