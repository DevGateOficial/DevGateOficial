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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (12,'Introdução','Assista o vídeo para saber mais sobre o curso','https://www.youtube.com/embed/TfsO0BGvGn0&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_&index=1','videoAula',21),(13,'História do PHP','Você sabe como o PHP surgiu? Sabe que é Rasmus Lerdorf? Conhece o Zeev Suraski e o Andi Gutmans? Sabe qual foi a contribuição da empresa Zend para o PHP? Pois é nesse vídeo que você vai encontrar as respostas para todas essas perguntas. Esse vídeo faz parte do seu curso de PHP Moderno 100% grátis','https://www.youtube.com/embed/TwNmvk-F7E8&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_&index=4','videoAula',21),(14,'Como conectar o PHP ao Banco de Dados','Aprenda a fazer a conexão com o Banco de Dados a partir do PHP','https://www.youtube.com/embed/3zUhy1BeWM4','videoAula',21),(15,'Site Simples','Site Simples com PHP e HTML','https://www.youtube.com/embed/qqEbKc0Pq8Y','videoAula',22),(16,'Instalando ferramentas','Aula destinada a preparação do ambiente de trabalho','https://www.youtube.com/embed/UForX7ehChM&list=PLHz_AreHm4dkZ9-atkcmcBaMZdmLHft8n&index=12','videoAula',23),(17,'Primeiro Site ','Primeiro Site usando apenas HTML','https://www.youtube.com/embed/E6CdIawPTh0&list=PLHz_AreHm4dkZ9-atkcmcBaMZdmLHft8n&index=12','videoAula',23),(18,'Como funciona o HTML com CSS','Aprenda como as 2 tecnologias interagem','03-como-funciona-html-e-css.pdf','materialApoio',23),(19,'Conhecendo a evolução da robótica','Os alunos assistirão a um vídeo sobre a história da robótica, desde sua criação até sua evolução e impacto atual no mundo','https://www.youtube.com/embed/hCBK1h5W6XI','videoAula',33),(20,'Conhecendo robôs ao redor do mundo','Os alunos poderão acessar um arquivo PDF que apresenta diferentes tipos de robôs e suas aplicações em diferentes áreas, como robôs industriais, robôs médicos, robôs de serviço, entre outros.','tipos-de-robos-industriais-e-suas-aplicacoes.pdf','materialApoio',33),(21,'Descobrindo a impacto da robótica na sociedade','Os alunos assistirão a um vídeo que apresenta diferentes aplicações da robótica na sociedade, incluindo sua utilização em indústrias, saúde, educação e muito mais.','https://www.youtube.com/embed/Sf02UUzqLbc','videoAula',33),(22,'Entendendo o que é robótica','Os alunos assistirão a um vídeo que apresenta uma definição geral de robótica, incluindo seus componentes básicos e suas aplicações.','https://www.youtube.com/embed/29zvPVPKFtI','videoAula',34),(26,'Conhecendo os componentes básicos de um robô','Os alunos poderão acessar um arquivo PDF que apresenta os componentes básicos de um robô, incluindo sensores, atuadores, controladores e muito mais. ','03-como-funciona-html-e-css.pdf','materialApoio',34),(27,'Entendendo os diferentes sistemas de robótica','Os alunos assistirão a um vídeo que apresenta os diferentes sistemas de robótica, incluindo sistemas autônomos, controlados por computador e sistemas híbridos','https://www.youtube.com/embed/vSvYtMko3TI','videoAula',34),(28,'MISSÕES ESPACIAIS 2023 - Ciência Sem Fim','Neste episódio Sérgio e Ned irão falar sobre as principais missões programadas para o ano de 2023','https://www.youtube.com/embed/1NzOnAma4cc','videoAula',38),(29,'A Ascensão das Máquinas','Assistir a uma video-aula de 15 minutos sobre a história da automação e sua evolução ao longo do tempo','https://youtu.be/WSKi8HfcxEk','videoAula',39),(30,'Machine Learning Explicado','Machine learning (ou aprendizado de máquina) é um dos termos mais quentes no mundo atual. A ideia é simples: fazer máquinas aprenderem, assim como nós humanos aprendemos durante a vida. Mas o desafio é inspirador! Como é que nós podemos programar máquinas que aprendem como seres humanos?','https://www.youtube.com/embed/0PrOA2JK6GQ','videoAula',40);
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

-- Dump completed on 2023-01-31 11:26:48
