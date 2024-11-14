-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: dental_scheduler
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_details_id` int DEFAULT NULL,
  `consent_form` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `enccode` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (1,3,'Y','123123','2024-10-26','08:00:00','A',NULL,NULL),(2,3,'Y','123124','2024-10-28','10:30:00','A','2024-10-25 22:17:57','2024-10-26 06:29:23');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `badult_leftteeth`
--

DROP TABLE IF EXISTS `badult_leftteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badult_leftteeth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` int DEFAULT NULL,
  `tooth_38` json DEFAULT NULL,
  `tooth_37` json DEFAULT NULL,
  `tooth_36` json DEFAULT NULL,
  `tooth_35` json DEFAULT NULL,
  `tooth_34` json DEFAULT NULL,
  `tooth_33` json DEFAULT NULL,
  `tooth_32` json DEFAULT NULL,
  `tooth_31` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badult_leftteeth`
--

LOCK TABLES `badult_leftteeth` WRITE;
/*!40000 ALTER TABLE `badult_leftteeth` DISABLE KEYS */;
INSERT INTO `badult_leftteeth` VALUES (1,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:blue\", \"right:blue\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(2,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(3,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(4,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}');
/*!40000 ALTER TABLE `badult_leftteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `badult_rightteeth`
--

DROP TABLE IF EXISTS `badult_rightteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badult_rightteeth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` int DEFAULT NULL,
  `tooth_48` json DEFAULT NULL,
  `tooth_47` json DEFAULT NULL,
  `tooth_46` json DEFAULT NULL,
  `tooth_45` json DEFAULT NULL,
  `tooth_44` json DEFAULT NULL,
  `tooth_43` json DEFAULT NULL,
  `tooth_42` json DEFAULT NULL,
  `tooth_41` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badult_rightteeth`
--

LOCK TABLES `badult_rightteeth` WRITE;
/*!40000 ALTER TABLE `badult_rightteeth` DISABLE KEYS */;
INSERT INTO `badult_rightteeth` VALUES (1,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(2,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(3,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(4,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}');
/*!40000 ALTER TABLE `badult_rightteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbaby_leftteeth`
--

DROP TABLE IF EXISTS `bbaby_leftteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bbaby_leftteeth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` int DEFAULT NULL,
  `tooth_75` json DEFAULT NULL,
  `tooth_74` json DEFAULT NULL,
  `tooth_73` json DEFAULT NULL,
  `tooth_72` json DEFAULT NULL,
  `tooth_71` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbaby_leftteeth`
--

LOCK TABLES `bbaby_leftteeth` WRITE;
/*!40000 ALTER TABLE `bbaby_leftteeth` DISABLE KEYS */;
INSERT INTO `bbaby_leftteeth` VALUES (1,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(2,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(3,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(4,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}');
/*!40000 ALTER TABLE `bbaby_leftteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbaby_rightteeth`
--

DROP TABLE IF EXISTS `bbaby_rightteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bbaby_rightteeth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` int DEFAULT NULL,
  `tooth_85` json DEFAULT NULL,
  `tooth_84` json DEFAULT NULL,
  `tooth_83` json DEFAULT NULL,
  `tooth_82` json DEFAULT NULL,
  `tooth_81` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbaby_rightteeth`
--

LOCK TABLES `bbaby_rightteeth` WRITE;
/*!40000 ALTER TABLE `bbaby_rightteeth` DISABLE KEYS */;
INSERT INTO `bbaby_rightteeth` VALUES (1,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(2,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(3,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(4,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}');
/*!40000 ALTER TABLE `bbaby_rightteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clinical_details`
--

DROP TABLE IF EXISTS `clinical_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clinical_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` int DEFAULT NULL,
  `hygiene_status` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `services_rendered` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `teeth_questionmark` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `medicine_given` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinical_details`
--

LOCK TABLES `clinical_details` WRITE;
/*!40000 ALTER TABLE `clinical_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `clinical_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `holidays` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holidays`
--

LOCK TABLES `holidays` WRITE;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
INSERT INTO `holidays` VALUES (1,'2024-12-25','Xmas Day','2024-10-25 21:12:20','2024-10-26 05:12:20');
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informed_consent`
--

DROP TABLE IF EXISTS `informed_consent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `informed_consent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_details_id` int DEFAULT NULL,
  `details` json DEFAULT NULL,
  `dental_history` json DEFAULT NULL,
  `medical_history` json DEFAULT NULL,
  `vitals` json DEFAULT NULL,
  `pre_consent` json DEFAULT NULL,
  `final_consent` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informed_consent`
--

LOCK TABLES `informed_consent` WRITE;
/*!40000 ALTER TABLE `informed_consent` DISABLE KEYS */;
/*!40000 ALTER TABLE `informed_consent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `action` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'changed the security question of school#: 123123',3,'2024-11-14 02:43:06','2024-11-14 02:43:06'),(2,'changed the security question of school#: 123123',3,'2024-11-14 02:44:56','2024-11-14 02:44:56'),(3,'changed the security question of school#: 123123',9,'2024-11-14 03:21:08','2024-11-14 03:21:08'),(4,'created user account: 12',NULL,'2024-11-14 03:24:14','2024-11-14 03:24:14'),(5,'created user account: 13',NULL,'2024-11-14 03:27:17','2024-11-14 03:27:17');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (11,'App\\Models\\User',3,'my-token','c8ea20b708ba1e08d3443100bde700af428ff05fe490fab98e43b0fbfda53993','[\"*\"]','2024-10-22 02:09:47',NULL,'2024-10-22 02:09:03','2024-10-22 02:09:47'),(12,'App\\Models\\User',3,'my-token','07e2d30877652eca325e49a3bfc0720062296f8c6f6a0b0e68964188fc27c1ec','[\"*\"]',NULL,NULL,'2024-10-22 02:12:41','2024-10-22 02:12:41'),(13,'App\\Models\\User',9,'my-token','8e011ce87779e9afdc5f5c21439ad87e4793e36474b92c235d1fcd58f69cbdc0','[\"*\"]',NULL,NULL,'2024-10-22 02:26:28','2024-10-22 02:26:28'),(14,'App\\Models\\User',10,'my-token','9228e59bb06d24dafc8941bfc44073baa31cca50438e05bd8c94591370a65d52','[\"*\"]',NULL,NULL,'2024-10-22 02:29:41','2024-10-22 02:29:41'),(15,'App\\Models\\User',3,'my-token','03de6979446d24afc648addf95b6f459d4a2eab4f113f8a5ec54d54b525cf7cf','[\"*\"]',NULL,NULL,'2024-10-25 20:13:34','2024-10-25 20:13:34'),(16,'App\\Models\\User',3,'my-token','91faed364c6c944fbc2e68cdfe480a7aaaada1eb16258475c3ab967aa005b1a6','[\"*\"]','2024-10-25 22:12:26',NULL,'2024-10-25 20:13:50','2024-10-25 22:12:26'),(17,'App\\Models\\User',3,'my-token','aefb772ad81675279ce79b0343aa431e6b94f5c7dddbb8daf2bb767325886372','[\"*\"]','2024-10-26 00:00:15',NULL,'2024-10-25 22:17:34','2024-10-26 00:00:15'),(18,'App\\Models\\User',3,'my-token','07bc666c17a0fc3160fae5a4864fe7270b54d0e899861316ba6c6def32e656a4','[\"*\"]',NULL,NULL,'2024-10-25 23:34:46','2024-10-25 23:34:46'),(19,'App\\Models\\User',3,'my-token','53f495510e12a62d7721d2ef2c8cac5d8667ba4390ad305b627469f86590b3c2','[\"*\"]','2024-10-26 01:38:54',NULL,'2024-10-25 23:59:46','2024-10-26 01:38:54'),(20,'App\\Models\\User',3,'my-token','6a939f990f7c8bf32e3d9e4d91ad3013db93c924a84d9def18995413c0fa887e','[\"*\"]',NULL,NULL,'2024-10-26 00:06:58','2024-10-26 00:06:58'),(21,'App\\Models\\User',3,'my-token','a4e6c107ed771ac6d6939a32dcdbede7174f8b2b4e84e2ddbf71ed98c847d957','[\"*\"]',NULL,NULL,'2024-10-26 00:09:06','2024-10-26 00:09:06'),(22,'App\\Models\\User',3,'my-token','9da623c9f00f43bf38c79682699823bc7e858c7e1d5dde496113d4ee68591bea','[\"*\"]','2024-10-26 02:32:35',NULL,'2024-10-26 02:30:19','2024-10-26 02:32:35'),(23,'App\\Models\\User',3,'my-token','f8e69bff1cf7e2e2e0babb8fa7e1d0352ce85a3c033813c9cca63dc4466caaa0','[\"*\"]','2024-10-27 06:10:14',NULL,'2024-10-27 06:10:03','2024-10-27 06:10:14'),(24,'App\\Models\\User',3,'my-token','80a5b3140313f3ad54768500888524c5bece599b869f33578d22ef4731b1effd','[\"*\"]','2024-10-27 06:21:44',NULL,'2024-10-27 06:21:05','2024-10-27 06:21:44'),(25,'App\\Models\\User',3,'my-token','a7e496ab1a14b0829e6dbc8b131777e5a22ae6179e04ab92397365560a00c193','[\"*\"]','2024-10-29 20:11:06',NULL,'2024-10-29 18:34:40','2024-10-29 20:11:06'),(26,'App\\Models\\User',3,'my-token','747972d1fa4aebaa3ac5fbd7697940877be573dfdadfc37083a5d58b282db295','[\"*\"]','2024-10-29 19:27:43',NULL,'2024-10-29 19:26:58','2024-10-29 19:27:43'),(27,'App\\Models\\User',3,'my-token','57afa094678124563c19f11ad7f149481fba50982ee70f5a7159649d429e61a8','[\"*\"]','2024-10-30 00:17:02',NULL,'2024-10-29 22:20:14','2024-10-30 00:17:02'),(28,'App\\Models\\User',3,'my-token','dc2feea87866ece60d233bc07b0803dd222aebaf0d73a2122903283af95eefce','[\"*\"]','2024-10-30 01:38:32',NULL,'2024-10-30 01:05:12','2024-10-30 01:38:32'),(29,'App\\Models\\User',3,'my-token','b5310034b16fdaf7d54d08396cf924707467e20bc031b74bad058bfd6f36befe','[\"*\"]','2024-11-14 02:44:56',NULL,'2024-11-14 02:36:16','2024-11-14 02:44:56'),(30,'App\\Models\\User',9,'my-token','8594f08c2e469152ffb3139b0ef930cf84c9f7025963c10fd20541da68d3899a','[\"*\"]','2024-11-14 03:18:38',NULL,'2024-11-14 03:18:15','2024-11-14 03:18:38'),(31,'App\\Models\\User',9,'my-token','d018acc2ae730e056e162b994e3ba6cf5479b7231c088fb3d57cf9a3cdf7c7fd','[\"*\"]','2024-11-14 03:19:17',NULL,'2024-11-14 03:19:16','2024-11-14 03:19:17'),(32,'App\\Models\\User',3,'my-token','d21fa532efdb42fba2af97b035039ef0307e89bfe0841e4907b23ca02a656b86','[\"*\"]','2024-11-14 03:20:22',NULL,'2024-11-14 03:20:20','2024-11-14 03:20:22'),(33,'App\\Models\\User',9,'my-token','39e96d3c6da88394bc0dffbeb0129707416e564bd87413a5473d7d09ac2204b3','[\"*\"]','2024-11-14 03:21:15',NULL,'2024-11-14 03:20:48','2024-11-14 03:21:15'),(34,'App\\Models\\User',9,'my-token','e853494b089f634ed8f4d273667658c93d643c045bbc9d475f0b57db51e9ef64','[\"*\"]','2024-11-14 03:22:10',NULL,'2024-11-14 03:22:08','2024-11-14 03:22:10'),(35,'App\\Models\\User',12,'my-token','c12058c2302a2bf60a3541115712f2f8ab8275c0d7a76c61b74a15f7465751ba','[\"*\"]','2024-11-14 03:24:25',NULL,'2024-11-14 03:24:25','2024-11-14 03:24:25'),(36,'App\\Models\\User',13,'my-token','66dcb6b82a71db2c505b78b66fae51ff0825a713c0a67c397a833ce887183601','[\"*\"]','2024-11-14 03:28:27',NULL,'2024-11-14 03:28:26','2024-11-14 03:28:27');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `security_questions_lib`
--

DROP TABLE IF EXISTS `security_questions_lib`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `security_questions_lib` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `security_questions_lib`
--

LOCK TABLES `security_questions_lib` WRITE;
/*!40000 ALTER TABLE `security_questions_lib` DISABLE KEYS */;
INSERT INTO `security_questions_lib` VALUES (1,'What is your grandfather\'s last name?',NULL,NULL),(2,'What is your favorite snack?',NULL,NULL);
/*!40000 ALTER TABLE `security_questions_lib` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tadult_leftteeth`
--

DROP TABLE IF EXISTS `tadult_leftteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tadult_leftteeth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` int DEFAULT NULL,
  `tooth_21` json DEFAULT NULL,
  `tooth_22` json DEFAULT NULL,
  `tooth_23` json DEFAULT NULL,
  `tooth_24` json DEFAULT NULL,
  `tooth_25` json DEFAULT NULL,
  `tooth_26` json DEFAULT NULL,
  `tooth_27` json DEFAULT NULL,
  `tooth_28` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tadult_leftteeth`
--

LOCK TABLES `tadult_leftteeth` WRITE;
/*!40000 ALTER TABLE `tadult_leftteeth` DISABLE KEYS */;
INSERT INTO `tadult_leftteeth` VALUES (1,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(2,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(3,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(4,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:blue\", \"right:blue\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:blue\", \"right:blue\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}');
/*!40000 ALTER TABLE `tadult_leftteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tadult_rightteeth`
--

DROP TABLE IF EXISTS `tadult_rightteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tadult_rightteeth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` int DEFAULT NULL,
  `tooth_18` json DEFAULT NULL,
  `tooth_17` json DEFAULT NULL,
  `tooth_16` json DEFAULT NULL,
  `tooth_15` json DEFAULT NULL,
  `tooth_14` json DEFAULT NULL,
  `tooth_13` json DEFAULT NULL,
  `tooth_12` json DEFAULT NULL,
  `tooth_11` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tadult_rightteeth`
--

LOCK TABLES `tadult_rightteeth` WRITE;
/*!40000 ALTER TABLE `tadult_rightteeth` DISABLE KEYS */;
INSERT INTO `tadult_rightteeth` VALUES (1,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(2,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(3,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(4,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}');
/*!40000 ALTER TABLE `tadult_rightteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbaby_leftteeth`
--

DROP TABLE IF EXISTS `tbaby_leftteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbaby_leftteeth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` int DEFAULT NULL,
  `tooth_61` json DEFAULT NULL,
  `tooth_62` json DEFAULT NULL,
  `tooth_63` json DEFAULT NULL,
  `tooth_64` json DEFAULT NULL,
  `tooth_65` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbaby_leftteeth`
--

LOCK TABLES `tbaby_leftteeth` WRITE;
/*!40000 ALTER TABLE `tbaby_leftteeth` DISABLE KEYS */;
INSERT INTO `tbaby_leftteeth` VALUES (1,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(2,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(3,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(4,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}');
/*!40000 ALTER TABLE `tbaby_leftteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbaby_rightteeth`
--

DROP TABLE IF EXISTS `tbaby_rightteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbaby_rightteeth` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `appointment_id` int DEFAULT NULL,
  `tooth_55` json DEFAULT NULL,
  `tooth_54` json DEFAULT NULL,
  `tooth_53` json DEFAULT NULL,
  `tooth_52` json DEFAULT NULL,
  `tooth_51` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbaby_rightteeth`
--

LOCK TABLES `tbaby_rightteeth` WRITE;
/*!40000 ALTER TABLE `tbaby_rightteeth` DISABLE KEYS */;
INSERT INTO `tbaby_rightteeth` VALUES (1,2,'{\"class\": [\"top:white\", \"left:white\", \"right:blue\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:blue\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": 6}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:blue\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(2,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(3,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}'),(4,2,'{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}','{\"class\": [\"top:white\", \"left:white\", \"right:white\", \"center:white\", \"bottom:white\"], \"botBox\": null, \"topBox\": null}');
/*!40000 ALTER TABLE `tbaby_rightteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `school_id_number` int NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `middlename` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employee_student_type` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `office_level` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department_program` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_no` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `civil_status` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `guardian` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `guardian_no` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bsu_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_id_number_UNIQUE` (`school_id_number`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (1,9,123123,'Ivana','Morales','A','1','student','asdas','Department of kwan',NULL,NULL,'aasdsd@gmail.com','123213','asdsad','asdsad','12321312','asdasdas','asddasd','2024-10-22 02:25:40','2024-10-22 10:25:40'),(2,10,1234,'asda','asdasd','asdasd','1','asdasd','asdsad','asdsad',NULL,NULL,'asdasd@gmail.com','123123','asdasd','asdsad','12312321','asdasd','asdasd','2024-10-22 02:28:45','2024-10-22 10:28:45'),(5,12,1234567890,'asdasd','asdasd','asdasd','1','1','asdasd','asdas','Male','asdsad','1234@gmail.com','etete','adasd','asdasd','adasd','asdasd','asdasd','2024-11-14 03:24:14','2024-11-14 11:24:14'),(6,13,12345,'asdas','asdsad','asdasd','1','1','asdasd','asdas','Male','asdasd','12345@gmail.com','asdasd','asdasd','asdasd','asdasd','asdsad','asdasdasd','2024-11-14 03:27:17','2024-11-14 11:27:17');
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `school_id_number` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_question` int DEFAULT NULL,
  `security_answer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'1','user','test@example.com','2024-10-08 00:30:06','$2y$12$fKyEl1ev0W3JCWW7XL6pfuyVhuS44Of06gof8dCRt1nX3.vpO1uB.','EjLgM8pwp4',NULL,NULL,'2024-10-08 00:30:06','2024-10-08 00:30:06'),(3,'222','admin','user@example.com','2024-10-08 00:31:05','$2y$12$59u1P5VbHHk59kChDmsFKOeGAMhNSre1OBStbcO1mlQFjcKobeH/a','XEkLxzoV2E',NULL,NULL,'2024-10-08 00:31:06','2024-10-08 00:31:06'),(9,'123123','user','aasdsd@gmail.com',NULL,'$2y$12$xMVybmo2ihzt6UfDd.Ubv.ZaxEyoJnBBK.OG5B.gVwZ5uKmLmBlXK',NULL,2,'$2y$12$lTlmqUKN2g2n8kD7Ht535ux660bICzVC48l/gkK8RS5InRFTprbrK','2024-10-22 02:25:40','2024-11-14 03:21:59'),(10,'1234','user','asdasd@gmail.com',NULL,'$2y$12$ANnGvQynEkXMvPl8hm4e/O9QrbHjNc8syCLn54c2KWBNR7KqLWMHm',NULL,NULL,NULL,'2024-10-22 02:28:45','2024-10-22 02:28:45'),(12,'1234567890','user','1234@gmail.com',NULL,'$2y$12$WDcMqqz7A4NF6U9CSQFQru.ORvDjR9aStJHSAjpMyQKXiulRTFx5K',NULL,1,'$2y$12$DKvZ3zpObe0vNRJyfj/8VuaK7QeawQCubYzpGu7AYZkhT957Vr61a','2024-11-14 03:24:14','2024-11-14 03:24:14'),(13,'12345','user','12345@gmail.com',NULL,'$2y$12$si62AAQG4rdn5UOdiSsvKuVJcYPHngJuzlZYVl/2Yf2i1iNbXUgOa',NULL,2,'$2y$12$rnJ9a4XGAowNwmKpBqQyFey3tfRwANDsf3qCJ6vCTmk0FgqHPwTTq','2024-11-14 03:27:17','2024-11-14 03:28:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-14 19:29:47
