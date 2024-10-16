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
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `code` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `category` varchar(20) NOT NULL,
  `fee` decimal(10,0) NOT NULL,
  `max_cap` int NOT NULL,
  `artist_code` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `for_event` (`artist_code`),
  CONSTRAINT `for_event` FOREIGN KEY (`artist_code`) REFERENCES `artist` (`code`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'2023-09-07','20:00:00','23:30:00','Poetry',140,100,1),(2,'2023-09-05','12:00:00','14:00:00','Poetry',80,30,6),(6,'2023-10-17','20:15:00','23:30:00','Music',80,30,5),(7,'2023-10-31','21:20:00','23:30:00','Music',80,30,3),(8,'2023-11-09','19:15:00','22:30:00','Performance',80,30,2),(9,'2023-11-15','12:00:00','14:00:00','Performance',80,30,8),(10,'2023-11-30','12:00:00','14:00:00','Poetry',80,30,6),(11,'2023-12-13','20:00:00','23:59:00','Music',150,100,7),(12,'2023-12-22','20:00:00','23:59:00','Performance',150,100,2),(13,'2024-01-04','20:00:00','23:59:00','Performance',150,100,2),(14,'2024-01-16','20:00:00','23:59:00','Music',150,100,3),(15,'2024-01-22','20:00:00','23:30:00','Poetry',140,100,1),(16,'2024-02-09','20:00:00','23:59:00','Music',150,100,5),(17,'2024-02-21','20:00:00','23:59:00','Music',150,100,4),(18,'2024-02-24','20:00:00','23:59:00','Performance',150,100,8),(19,'2024-03-07','00:15:00','04:00:00','Poetry',30,20,1),(20,'2024-03-21','17:00:00','19:00:00','Music',50,20,3),(21,'2023-07-19','11:00:00','14:00:00','Music',100,10,3),(22,'2023-06-13','11:00:00','14:00:00','Poetry',100,10,6),(23,'2023-05-18','11:00:00','14:00:00','Performance',100,10,2),(24,'2023-05-08','11:00:00','14:00:00','Music',100,10,7),(25,'2023-05-25','11:00:00','14:00:00','Music',100,10,4),(26,'2023-04-13','10:00:00','12:00:00','Music',102,10,1),(27,'2023-08-11','15:20:00','18:15:00','Poetry',77,40,7),(28,'2023-08-26','12:00:00','15:00:00','Music',77,90,1),(29,'2023-08-19','00:00:00','00:00:00','Music',2000,2,5),(30,'2023-08-31','12:00:00','15:00:00','Music',20,30,3),(31,'2023-09-02','12:00:00','14:00:00','Music',20,130,5),(32,'2023-09-18','14:00:00','16:00:00','Music',50,200,3),(33,'2023-09-18','03:00:00','05:00:00','Music',10,20,1),(34,'2023-09-10','22:00:00','23:00:00','Music',10,12,5);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
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
