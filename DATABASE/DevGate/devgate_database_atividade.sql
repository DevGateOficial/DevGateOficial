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
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atividade` (
  `idAtividade` int NOT NULL AUTO_INCREMENT,
  `nomeAtividade` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descricao` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `url` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipoAtividade` enum('videoAula','materialApoio','projeto') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idAula` int NOT NULL,
  PRIMARY KEY (`idAtividade`),
  KEY `idAula_idx` (`idAula`),
  CONSTRAINT `idAula` FOREIGN KEY (`idAula`) REFERENCES `aula` (`idAula`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (12,'Introdução','Assista o vídeo para saber mais sobre o curso','https://www.youtube.com/embed/TfsO0BGvGn0&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_&index=1','videoAula',21),(13,'História do PHP','Você sabe como o PHP surgiu? Sabe que é Rasmus Lerdorf? Conhece o Zeev Suraski e o Andi Gutmans? Sabe qual foi a contribuição da empresa Zend para o PHP? Pois é nesse vídeo que você vai encontrar as respostas para todas essas perguntas. Esse vídeo faz parte do seu curso de PHP Moderno 100% grátis','https://www.youtube.com/embed/TwNmvk-F7E8&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_&index=4','videoAula',21),(14,'Como conectar o PHP ao Banco de Dados','Aprenda a fazer a conexão com o Banco de Dados a partir do PHP','https://www.youtube.com/embed/3zUhy1BeWM4','videoAula',21),(15,'Site Simples','Site Simples com PHP e HTML','https://www.youtube.com/embed/qqEbKc0Pq8Y','videoAula',22),(16,'Instalando ferramentas','Aula destinada a preparação do ambiente de trabalho','https://www.youtube.com/embed/UForX7ehChM&list=PLHz_AreHm4dkZ9-atkcmcBaMZdmLHft8n&index=12','videoAula',23),(17,'Primeiro Site ','Primeiro Site usando apenas HTML','https://www.youtube.com/embed/E6CdIawPTh0&list=PLHz_AreHm4dkZ9-atkcmcBaMZdmLHft8n&index=12','videoAula',23),(18,'Como funciona o HTML com CSS','Aprenda como as 2 tecnologias interagem','03-como-funciona-html-e-css.pdf','materialApoio',23);
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;
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
