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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aula`
--

LOCK TABLES `aula` WRITE;
/*!40000 ALTER TABLE `aula` DISABLE KEYS */;
INSERT INTO `aula` VALUES (21,'Introdução','<p>Nessa aula é apresentada a história e evolução da linguagem PHP, explicando porque é uma das linguagens mais populares para desenvolvimento de aplicações web. Em seguida, os alunos aprendem sobre os principais usos do PHP, como criar páginas dinâmicas e se comunicar com banco de dados. Ao<span style=\"font-size: 1.6rem;\">&nbsp;final da aula, os alunos serão capazes de entender a importância do PHP no desenvolvimento web e estarão preparados para começar a aprender as técnicas avançadas da linguagem.</span></p>',2),(22,'Prática Simples','<p>Nesta aula você irá aprender a criar um site simples utilizando PHP, HTML e CSS.</p>',2),(23,'Introdução','<p>Primeiros passos para começar a aprender</p>',3),(24,'Processo de Software','<p>Especificação de Software e Processo de Software</p>',4),(33,'Introdução à Robótica','<p>Neste módulo, os alunos aprenderão sobre o que é robótica e sua evolução ao longo dos anos. Serão apresentados exemplos de robôs e suas aplicações em diferentes áreas<br></p>',8),(34,'Componentes básicos de robôs','<p>Neste módulo, os alunos aprenderão sobre os componentes básicos de robôs, incluindo microcontroladores, motores, sensores e atuadores. Serão apresentadas as funções de cada componente e como eles trabalham juntos para controlar o robô<br></p>',8),(35,'Aprendendo a programar robôs','<p>Neste módulo, os alunos aprenderão os conceitos básicos de programação de robôs, incluindo linguagens de programação, algoritmos e lógica de programação. Serão apresentados exemplos simples de programação de robôs para ilustrar o aprendizado.<br></p>',8),(36,'Sensores e atuadores em robôs','<p>Neste módulo, os alunos aprenderão sobre os diferentes tipos de sensores e atuadores utilizados em robôs e como eles são utilizados para interagir com o mundo. Serão apresentados exemplos de aplicações práticas de sensores e atuadores em robôs<br></p>',8),(37,'Sistemas básicos de robótica e sua aplicação','<p>Neste módulo, os alunos aprenderão sobre sistemas básicos de robótica, incluindo robôs autônomos, robôs controlados remotamente e robôs industriais. Serão apresentados exemplos de aplicações práticas de cada tipo de sistema e sua importância no mundo atual<br></p>',8),(38,'Missões Espaciais 2023: Ciência Sem Fim','                                        <p><font color=\"#d1d5db\" face=\"Söhne, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, sans-serif, Helvetica Neue, Arial, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji\"><span style=\"white-space: pre-wrap;\">Nesta aula, vamos explorar as missões espaciais atuais e futuras de 2023. Aprenda sobre a história da exploração espacial, os desafios científicos enfrentados e as descobertas emocionantes que estão por vir</span></font><br></p>                                ',9),(39,'A Ascensão das Máquinas','<p>Por que desda vez vai ser muito diferente</p>',10),(40,'A Ascensão das Máquinas','<p>Neste aula, vamos explorar a evolução da automação e como o Machine Learning está revolucionando a forma como as empresas tomam decisões e realizam tarefas. Você aprenderá sobre os principais conceitos de aprendizagem automática, como o processo de treinamento de modelos e como a tecnologia está sendo aplicada em diferentes indústrias.<br></p>',11);
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

-- Dump completed on 2023-01-31 11:26:48
