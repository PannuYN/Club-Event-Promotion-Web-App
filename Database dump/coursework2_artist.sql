-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: coursework2
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artist` (
  `code` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `bio` varchar(200) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `fb` varchar(30) DEFAULT NULL,
  `twt` varchar(30) DEFAULT NULL,
  `ig` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES (1,'June','Solo Artist','June is a poet and a writer famous for her pieces.','ArtistImages/pexels-tima-miroshnichenko-6550160.jpg','june@facebook.com','june@twitter.com','june@instagram.com'),(2,'Ms. Mayfield','Solo Comedian','Mayfield is a performer. Her talk shows are pretty famous these days.','ArtistImages/pexels-oleksandr-p-3791983.jpg','mayfield@facebook.com','mayfield@twitter.com','mayfield@instagram.com'),(3,'Anna Mcphee','Solo Artist','Anna is a rising star. She performs music at famous events.','ArtistImages/pexels-cottonbro-studio-5648357.jpg','anna@facebook.com','anna@twitter.com','anna@instagram.com'),(4,'Mad Chain','Band','Mad Chain is an indie band that is taking place everywhere these days.','ArtistImages/pexels-david-yu-1749822.jpg','madchain@facebook.com','madchain@twitter.com','madchain@instagram.com'),(5,'William Cooper','Solo Artist','William Cooper writes and sings viral songs.','ArtistImages/pexels-tima-miroshnichenko-6670752.jpg','william@facebook.com','william@twitter.com','william@instagram.com'),(6,'Shelly Adam','Solo Artist','Shelly Adam loves to read and write poems.','ArtistImages/pexels-cottonbro-studio-4855373.jpg','shelly@facebook.com','shelly@twitter.com','shelly@instagram.com'),(7,'BlackAndWhite','Band','Black&amp;White is a band.','ArtistImages/pexels-edward-eyer-811838.jpg','bnw@facebook.com','bnw@twitter.com','bnw@instagram.com'),(8,'Shane Joseph','Solo Comedian','Shane is a famous comedian who perform solo in talk shows.','ArtistImages/pexels-cottonbro-studio-4861373.jpg','shane@facebook.com','shane@twitter.com','shane@instagram.com');
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-01 16:33:27
