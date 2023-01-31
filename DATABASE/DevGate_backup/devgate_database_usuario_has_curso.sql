-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: devgate_database
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `usuario_has_curso`
--

DROP TABLE IF EXISTS `usuario_has_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_has_curso` (
  `usuario_idUsuario` int NOT NULL,
  `curso_idCurso` int NOT NULL,
  `tipo_usuario_curso` enum('aluno','professor','administrador') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_inscricao` date NOT NULL,
  `ultimo_acesso` datetime NOT NULL,
  `aulas_assistidas` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`usuario_idUsuario`,`curso_idCurso`),
  KEY `fk_usuario_has_curso_curso1_idx` (`curso_idCurso`),
  KEY `fk_usuario_has_curso_usuario1_idx` (`usuario_idUsuario`),
  CONSTRAINT `fk_usuario_has_curso_curso1` FOREIGN KEY (`curso_idCurso`) REFERENCES `curso` (`idCurso`),
  CONSTRAINT `fk_usuario_has_curso_usuario1` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_has_curso`
--

LOCK TABLES `usuario_has_curso` WRITE;
/*!40000 ALTER TABLE `usuario_has_curso` DISABLE KEYS */;
INSERT INTO `usuario_has_curso` VALUES (1,2,'aluno','2023-01-31','2023-01-31 00:00:00','a:2:{i:0;s:2:\"21\";i:1;s:2:\"22\";}'),(1,8,'aluno','2023-01-31','2023-01-31 00:00:00','a:5:{i:0;s:2:\"37\";i:1;s:2:\"36\";i:2;s:2:\"35\";i:3;s:2:\"34\";i:4;s:2:\"33\";}'),(1,10,'aluno','2023-01-31','2023-01-31 00:00:00',NULL),(7,2,'aluno','2023-01-31','2023-01-31 00:00:00',NULL),(7,3,'aluno','2023-01-31','2023-01-31 00:00:00',NULL),(7,8,'aluno','2023-01-31','2023-01-31 00:00:00',NULL);
/*!40000 ALTER TABLE `usuario_has_curso` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-31 11:26:48
