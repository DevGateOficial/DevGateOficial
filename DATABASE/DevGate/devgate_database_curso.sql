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
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curso` (
  `idCurso` int NOT NULL AUTO_INCREMENT,
  `nomeCurso` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subtituloCurso` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `objetivos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `requisitos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagem` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idResponsavel` int NOT NULL,
  PRIMARY KEY (`idCurso`),
  KEY `idResponsavel_idx` (`idResponsavel`),
  CONSTRAINT `idResponsavel` FOREIGN KEY (`idResponsavel`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (2,'PHP Moderno','Aprenda a programar com PHP nos dias atuais','                    <p>Um curso grátis de PHP moderno que pode mudar sua visão em relação à linguagem mais utilizada na Web. Acompanhe todos os módulos do curso que foi criado pelo Professor Gustavo Guanabara para o canal Curso em Vídeo no YouTube.</p>                ','                    <p>Aprenda a utilizar as últimas versões e recursos disponíveis da linguagem PHP para desenvolver aplicações web robustas e eficientes. Domine boas práticas de programação, como programação orientada a objetos e padrões de projeto, bem como como integrar o PHP com outras tecnologias web, como CSS e JavaScript. O curso também inclui tópicos sobre segurança e escalabilidade, para garantir que os aplicativos desenvolvidos pelos alunos sejam resistentes a ataques e possam lidar com grandes volumes de tráfego.</p>                ','                    <p>Conhecimento básico de programação, HTML e CSS. Um ambiente de desenvolvimento, como um computador e um editor de código para escrever e executar códigos. Acesso à internet, para acessar recursos adicionais, como documentação e tutoriais.</p><p><br></p>                ','php.jpg',1),(3,'Curso de HTML5 e CSS3','Curso de HTML5 e CSS3, para iniciar na programação','                                        <p>O Curso de HTML5 e CSS3 vai ensinar a criar sites usando a linguagem de marcação hipertexto (HTML) e&nbsp; folhas de estilo em cascata (CSS), todas em suas versões mais recentes. Neste curso, o Professor Gustavo Guanabara criou um conjunto de vídeos, exercícios, desafios e um material de apoio em forma de e-book com 30 capítulos ao todo</p><p><br></p>                                ','                                        <p>Conseguir entender o que é HTML5 e CSS, e criar uma página responsiva estilizada utilizando as duas tecnologias.<br></p><p><br></p>                                ','                                        <p>Computador</p><p>Acesso a internet</p><p>2 horas semanais</p>                                ','html.png',1),(4,'Documentação nota mil','Aprenda a documentar e fazer diagramas','                    <p><span style=\"font-size: 1.6rem;\">Ppara ensinar aos alunos as técnicas e boas práticas para documentar e modelar corretamente um banco de dados. O curso começa com uma introdução à documentação de projeto, explicando porque é importante e como pode ser feito de forma eficiente. Em seguida, os alunos aprendem sobre as diferentes técnicas de modelagem de banco de dados, incluindo modelagem entidade-relacionamento (ER) e modelagem de objetos.</span><br></p><p><br></p><p>Os alunos também aprendem sobre as diferentes ferramentas e tecnologias utilizadas para modelar e documentar bancos de dados, incluindo ferramentas de modelagem visual e ferramentas de gerenciamento de banco de dados. Além disso, os alunos aprendem sobre as boas práticas de projeto de banco de dados, incluindo normalização e otimização de desempenho.</p>                ','                    <p>Ensinar as técnicas e boas práticas para documentar e modelar corretamente um banco de dados.</p><p><br></p><p>Fornecer uma compreensão completa dos princípios da modelagem de banco de dados, incluindo modelagem entidade-relacionamento (ER) e modelagem de objetos.</p><p><br></p><p>Introduzir os alunos às ferramentas e tecnologias utilizadas para modelar e documentar bancos de dados, incluindo ferramentas de modelagem visual e ferramentas de gerenciamento de banco de dados.</p>                ','                    <p>Conhecimento básico de programação: os alunos devem ter alguma experiência prévia em programação e ter noções básicas de banco de dados.</p><p><br></p><p>Ambiente de desenvolvimento: os alunos devem ter um computador e um editor de código para escrever e executar códigos de modelagem de banco de dados.</p><p><br></p><p>Conhecimento básico de SQL: os alunos devem ter noções básicas de SQL para poder seguir o curso.</p>                ','documentacao.jpg',1);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
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
