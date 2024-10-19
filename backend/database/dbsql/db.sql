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
  `consent_form` varchar(45) DEFAULT NULL,
  `enccode` varchar(45) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `badult_leftteeth`
--

DROP TABLE IF EXISTS `badult_leftteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badult_leftteeth` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `tooth_38` json DEFAULT NULL,
  `tooth_37` json DEFAULT NULL,
  `tooth_36` json DEFAULT NULL,
  `tooth_35` json DEFAULT NULL,
  `tooth_34` json DEFAULT NULL,
  `tooth_33` json DEFAULT NULL,
  `tooth_32` json DEFAULT NULL,
  `tooth_31` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badult_leftteeth`
--

LOCK TABLES `badult_leftteeth` WRITE;
/*!40000 ALTER TABLE `badult_leftteeth` DISABLE KEYS */;
/*!40000 ALTER TABLE `badult_leftteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `badult_rightteeth`
--

DROP TABLE IF EXISTS `badult_rightteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `badult_rightteeth` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `tooth_48` json DEFAULT NULL,
  `tooth_47` json DEFAULT NULL,
  `tooth_46` json DEFAULT NULL,
  `tooth_45` json DEFAULT NULL,
  `tooth_44` json DEFAULT NULL,
  `tooth_43` json DEFAULT NULL,
  `tooth_42` json DEFAULT NULL,
  `tooth_41` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badult_rightteeth`
--

LOCK TABLES `badult_rightteeth` WRITE;
/*!40000 ALTER TABLE `badult_rightteeth` DISABLE KEYS */;
/*!40000 ALTER TABLE `badult_rightteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbaby_leftteeth`
--

DROP TABLE IF EXISTS `bbaby_leftteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bbaby_leftteeth` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `tooth_75` json DEFAULT NULL,
  `tooth_74` json DEFAULT NULL,
  `tooth_73` json DEFAULT NULL,
  `tooth_72` json DEFAULT NULL,
  `tooth_71` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbaby_leftteeth`
--

LOCK TABLES `bbaby_leftteeth` WRITE;
/*!40000 ALTER TABLE `bbaby_leftteeth` DISABLE KEYS */;
/*!40000 ALTER TABLE `bbaby_leftteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbaby_rightteeth`
--

DROP TABLE IF EXISTS `bbaby_rightteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bbaby_rightteeth` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `tooth_85` json DEFAULT NULL,
  `tooth_84` json DEFAULT NULL,
  `tooth_83` json DEFAULT NULL,
  `tooth_82` json DEFAULT NULL,
  `tooth_81` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbaby_rightteeth`
--

LOCK TABLES `bbaby_rightteeth` WRITE;
/*!40000 ALTER TABLE `bbaby_rightteeth` DISABLE KEYS */;
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
  `hygiene_status` varchar(45) DEFAULT NULL,
  `services_rendered` varchar(45) DEFAULT NULL,
  `teeth_questionmark` varchar(45) DEFAULT NULL,
  `medicine_given` varchar(45) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `action` text,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tadult_leftteeth`
--

DROP TABLE IF EXISTS `tadult_leftteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tadult_leftteeth` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `tooth_21` json DEFAULT NULL,
  `tooth_22` json DEFAULT NULL,
  `tooth_23` json DEFAULT NULL,
  `tooth_24` json DEFAULT NULL,
  `tooth_25` json DEFAULT NULL,
  `tooth_26` json DEFAULT NULL,
  `tooth_27` json DEFAULT NULL,
  `tooth_28` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tadult_leftteeth`
--

LOCK TABLES `tadult_leftteeth` WRITE;
/*!40000 ALTER TABLE `tadult_leftteeth` DISABLE KEYS */;
/*!40000 ALTER TABLE `tadult_leftteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tadult_rightteeth`
--

DROP TABLE IF EXISTS `tadult_rightteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tadult_rightteeth` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `tooth_18` json DEFAULT NULL,
  `tooth_17` json DEFAULT NULL,
  `tooth_16` json DEFAULT NULL,
  `tooth_15` json DEFAULT NULL,
  `tooth_14` json DEFAULT NULL,
  `tooth_13` json DEFAULT NULL,
  `tooth_12` json DEFAULT NULL,
  `tooth_11` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tadult_rightteeth`
--

LOCK TABLES `tadult_rightteeth` WRITE;
/*!40000 ALTER TABLE `tadult_rightteeth` DISABLE KEYS */;
/*!40000 ALTER TABLE `tadult_rightteeth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbaby_leftteeth`
--

DROP TABLE IF EXISTS `tbaby_leftteeth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbaby_leftteeth` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `tooth_61` json DEFAULT NULL,
  `tooth_62` json DEFAULT NULL,
  `tooth_63` json DEFAULT NULL,
  `tooth_64` json DEFAULT NULL,
  `tooth_65` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbaby_leftteeth`
--

LOCK TABLES `tbaby_leftteeth` WRITE;
/*!40000 ALTER TABLE `tbaby_leftteeth` DISABLE KEYS */;
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
  `patient_id` int DEFAULT NULL,
  `tooth_55` json DEFAULT NULL,
  `tooth_54` json DEFAULT NULL,
  `tooth_53` json DEFAULT NULL,
  `tooth_52` json DEFAULT NULL,
  `tooth_51` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbaby_rightteeth`
--

LOCK TABLES `tbaby_rightteeth` WRITE;
/*!40000 ALTER TABLE `tbaby_rightteeth` DISABLE KEYS */;
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
  `user_client_id` int NOT NULL,
  `id_number` int DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `employee_student_type` varchar(45) DEFAULT NULL,
  `office_level` varchar(45) DEFAULT NULL,
  `department_program` varchar(45) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `guardian` varchar(45) DEFAULT NULL,
  `guardian_no` varchar(45) DEFAULT NULL,
  `permanent_address` varchar(45) DEFAULT NULL,
  `bsu_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
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
  `school_id_number` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'1','Test User','test@example.com','2024-10-08 00:30:06','$2y$12$fKyEl1ev0W3JCWW7XL6pfuyVhuS44Of06gof8dCRt1nX3.vpO1uB.','EjLgM8pwp4','2024-10-08 00:30:06','2024-10-08 00:30:06'),(3,'222','User','user@example.com','2024-10-08 00:31:05','$2y$12$59u1P5VbHHk59kChDmsFKOeGAMhNSre1OBStbcO1mlQFjcKobeH/a','XEkLxzoV2E','2024-10-08 00:31:06','2024-10-08 00:31:06');
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

-- Dump completed on 2024-10-17 14:43:09