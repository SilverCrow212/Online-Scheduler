-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dental_scheduler
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
  `consent_form` longtext COLLATE utf8mb4_general_ci,
  `enccode` longtext COLLATE utf8mb4_general_ci,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` longtext COLLATE utf8mb4_general_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (1,2,'{\"details\":{\"name\":\"Lex\",\"collegeOffice\":\"asd\",\"reason\":\"asdasd\"},\"dentalHistory\":{\"previousDentist\":\"asdas\",\"address\":\"asda\",\"lastDentalVisit\":\"asdasd\",\"reason\":\"asd\"},\"medicalHistory\":{\"physician\":\"asd\",\"specialty\":\"asd\",\"clinicAddress\":\"asd\",\"contactNumber\":\"asd\",\"q1\":{\"answ\":\"No\"},\"q2\":{\"answ\":\"No\",\"remarks\":null},\"q3\":{\"answ\":\"No\",\"remarks\":null},\"q4\":{\"answ\":\"No\",\"remarks\":null},\"q5\":{\"answ\":\"No\",\"remarks\":null},\"q6\":{\"answ\":\"No\"},\"q7\":{\"answ\":\"No\"},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-25','8:30 am - 9:30 am',5,'2024-11-23 08:54:23','2024-11-26 23:43:21'),(2,2,'{\"details\":{\"name\":\"asdas\",\"collegeOffice\":\"asda\",\"reason\":\"asd\"},\"dentalHistory\":{\"previousDentist\":null,\"address\":null,\"lastDentalVisit\":null,\"reason\":null},\"medicalHistory\":{\"physician\":null,\"specialty\":null,\"clinicAddress\":null,\"contactNumber\":null,\"q1\":{\"answ\":null},\"q2\":{\"answ\":null,\"remarks\":null},\"q3\":{\"answ\":null,\"remarks\":null},\"q4\":{\"answ\":null,\"remarks\":null},\"q5\":{\"answ\":null,\"remarks\":null},\"q6\":{\"answ\":null},\"q7\":{\"answ\":null},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-29','8:30 am - 9:30 am',2,'2024-11-23 10:22:46','2024-11-26 23:50:54'),(3,2,'{\"details\":{\"name\":\"Test\",\"collegeOffice\":\"asdasd\",\"reason\":\"asdasd\"},\"dentalHistory\":{\"previousDentist\":null,\"address\":null,\"lastDentalVisit\":null,\"reason\":null},\"medicalHistory\":{\"physician\":null,\"specialty\":null,\"clinicAddress\":null,\"contactNumber\":null,\"q1\":{\"answ\":\"No\"},\"q2\":{\"answ\":\"No\",\"remarks\":null},\"q3\":{\"answ\":\"No\",\"remarks\":null},\"q4\":{\"answ\":\"No\",\"remarks\":null},\"q5\":{\"answ\":null,\"remarks\":null},\"q6\":{\"answ\":null},\"q7\":{\"answ\":null},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-26','8:30 am - 9:30 am',2,'2024-11-24 23:16:37','2024-11-26 23:45:34');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment_backup_2024_12_03_22_01_49`
--

DROP TABLE IF EXISTS `appointment_backup_2024_12_03_22_01_49`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_backup_2024_12_03_22_01_49` (
  `id` int NOT NULL DEFAULT '0',
  `user_details_id` int DEFAULT NULL,
  `consent_form` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `enccode` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment_backup_2024_12_03_22_01_49`
--

LOCK TABLES `appointment_backup_2024_12_03_22_01_49` WRITE;
/*!40000 ALTER TABLE `appointment_backup_2024_12_03_22_01_49` DISABLE KEYS */;
INSERT INTO `appointment_backup_2024_12_03_22_01_49` VALUES (1,2,'{\"details\":{\"name\":\"Lex\",\"collegeOffice\":\"asd\",\"reason\":\"asdasd\"},\"dentalHistory\":{\"previousDentist\":\"asdas\",\"address\":\"asda\",\"lastDentalVisit\":\"asdasd\",\"reason\":\"asd\"},\"medicalHistory\":{\"physician\":\"asd\",\"specialty\":\"asd\",\"clinicAddress\":\"asd\",\"contactNumber\":\"asd\",\"q1\":{\"answ\":\"No\"},\"q2\":{\"answ\":\"No\",\"remarks\":null},\"q3\":{\"answ\":\"No\",\"remarks\":null},\"q4\":{\"answ\":\"No\",\"remarks\":null},\"q5\":{\"answ\":\"No\",\"remarks\":null},\"q6\":{\"answ\":\"No\"},\"q7\":{\"answ\":\"No\"},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-25','8:30 am - 9:30 am',5,'2024-11-23 08:54:23','2024-11-26 23:43:21'),(2,2,'{\"details\":{\"name\":\"asdas\",\"collegeOffice\":\"asda\",\"reason\":\"asd\"},\"dentalHistory\":{\"previousDentist\":null,\"address\":null,\"lastDentalVisit\":null,\"reason\":null},\"medicalHistory\":{\"physician\":null,\"specialty\":null,\"clinicAddress\":null,\"contactNumber\":null,\"q1\":{\"answ\":null},\"q2\":{\"answ\":null,\"remarks\":null},\"q3\":{\"answ\":null,\"remarks\":null},\"q4\":{\"answ\":null,\"remarks\":null},\"q5\":{\"answ\":null,\"remarks\":null},\"q6\":{\"answ\":null},\"q7\":{\"answ\":null},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-29','8:30 am - 9:30 am',2,'2024-11-23 10:22:46','2024-11-26 23:50:54'),(3,2,'{\"details\":{\"name\":\"Test\",\"collegeOffice\":\"asdasd\",\"reason\":\"asdasd\"},\"dentalHistory\":{\"previousDentist\":null,\"address\":null,\"lastDentalVisit\":null,\"reason\":null},\"medicalHistory\":{\"physician\":null,\"specialty\":null,\"clinicAddress\":null,\"contactNumber\":null,\"q1\":{\"answ\":\"No\"},\"q2\":{\"answ\":\"No\",\"remarks\":null},\"q3\":{\"answ\":\"No\",\"remarks\":null},\"q4\":{\"answ\":\"No\",\"remarks\":null},\"q5\":{\"answ\":null,\"remarks\":null},\"q6\":{\"answ\":null},\"q7\":{\"answ\":null},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-26','8:30 am - 9:30 am',2,'2024-11-24 23:16:37','2024-11-26 23:45:34');
/*!40000 ALTER TABLE `appointment_backup_2024_12_03_22_01_49` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment_backup_2024_12_03_22_02_24`
--

DROP TABLE IF EXISTS `appointment_backup_2024_12_03_22_02_24`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_backup_2024_12_03_22_02_24` (
  `id` int NOT NULL DEFAULT '0',
  `user_details_id` int DEFAULT NULL,
  `consent_form` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `enccode` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment_backup_2024_12_03_22_02_24`
--

LOCK TABLES `appointment_backup_2024_12_03_22_02_24` WRITE;
/*!40000 ALTER TABLE `appointment_backup_2024_12_03_22_02_24` DISABLE KEYS */;
INSERT INTO `appointment_backup_2024_12_03_22_02_24` VALUES (1,2,'{\"details\":{\"name\":\"Lex\",\"collegeOffice\":\"asd\",\"reason\":\"asdasd\"},\"dentalHistory\":{\"previousDentist\":\"asdas\",\"address\":\"asda\",\"lastDentalVisit\":\"asdasd\",\"reason\":\"asd\"},\"medicalHistory\":{\"physician\":\"asd\",\"specialty\":\"asd\",\"clinicAddress\":\"asd\",\"contactNumber\":\"asd\",\"q1\":{\"answ\":\"No\"},\"q2\":{\"answ\":\"No\",\"remarks\":null},\"q3\":{\"answ\":\"No\",\"remarks\":null},\"q4\":{\"answ\":\"No\",\"remarks\":null},\"q5\":{\"answ\":\"No\",\"remarks\":null},\"q6\":{\"answ\":\"No\"},\"q7\":{\"answ\":\"No\"},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-25','8:30 am - 9:30 am',5,'2024-11-23 08:54:23','2024-11-26 23:43:21'),(2,2,'{\"details\":{\"name\":\"asdas\",\"collegeOffice\":\"asda\",\"reason\":\"asd\"},\"dentalHistory\":{\"previousDentist\":null,\"address\":null,\"lastDentalVisit\":null,\"reason\":null},\"medicalHistory\":{\"physician\":null,\"specialty\":null,\"clinicAddress\":null,\"contactNumber\":null,\"q1\":{\"answ\":null},\"q2\":{\"answ\":null,\"remarks\":null},\"q3\":{\"answ\":null,\"remarks\":null},\"q4\":{\"answ\":null,\"remarks\":null},\"q5\":{\"answ\":null,\"remarks\":null},\"q6\":{\"answ\":null},\"q7\":{\"answ\":null},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-29','8:30 am - 9:30 am',2,'2024-11-23 10:22:46','2024-11-26 23:50:54'),(3,2,'{\"details\":{\"name\":\"Test\",\"collegeOffice\":\"asdasd\",\"reason\":\"asdasd\"},\"dentalHistory\":{\"previousDentist\":null,\"address\":null,\"lastDentalVisit\":null,\"reason\":null},\"medicalHistory\":{\"physician\":null,\"specialty\":null,\"clinicAddress\":null,\"contactNumber\":null,\"q1\":{\"answ\":\"No\"},\"q2\":{\"answ\":\"No\",\"remarks\":null},\"q3\":{\"answ\":\"No\",\"remarks\":null},\"q4\":{\"answ\":\"No\",\"remarks\":null},\"q5\":{\"answ\":null,\"remarks\":null},\"q6\":{\"answ\":null},\"q7\":{\"answ\":null},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-26','8:30 am - 9:30 am',2,'2024-11-24 23:16:37','2024-11-26 23:45:34');
/*!40000 ALTER TABLE `appointment_backup_2024_12_03_22_02_24` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment_backup_2024_12_03_22_06_03`
--

DROP TABLE IF EXISTS `appointment_backup_2024_12_03_22_06_03`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_backup_2024_12_03_22_06_03` (
  `id` int NOT NULL DEFAULT '0',
  `user_details_id` int DEFAULT NULL,
  `consent_form` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `enccode` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment_backup_2024_12_03_22_06_03`
--

LOCK TABLES `appointment_backup_2024_12_03_22_06_03` WRITE;
/*!40000 ALTER TABLE `appointment_backup_2024_12_03_22_06_03` DISABLE KEYS */;
INSERT INTO `appointment_backup_2024_12_03_22_06_03` VALUES (1,2,'{\"details\":{\"name\":\"Lex\",\"collegeOffice\":\"asd\",\"reason\":\"asdasd\"},\"dentalHistory\":{\"previousDentist\":\"asdas\",\"address\":\"asda\",\"lastDentalVisit\":\"asdasd\",\"reason\":\"asd\"},\"medicalHistory\":{\"physician\":\"asd\",\"specialty\":\"asd\",\"clinicAddress\":\"asd\",\"contactNumber\":\"asd\",\"q1\":{\"answ\":\"No\"},\"q2\":{\"answ\":\"No\",\"remarks\":null},\"q3\":{\"answ\":\"No\",\"remarks\":null},\"q4\":{\"answ\":\"No\",\"remarks\":null},\"q5\":{\"answ\":\"No\",\"remarks\":null},\"q6\":{\"answ\":\"No\"},\"q7\":{\"answ\":\"No\"},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-25','8:30 am - 9:30 am',5,'2024-11-23 08:54:23','2024-11-26 23:43:21'),(2,2,'{\"details\":{\"name\":\"asdas\",\"collegeOffice\":\"asda\",\"reason\":\"asd\"},\"dentalHistory\":{\"previousDentist\":null,\"address\":null,\"lastDentalVisit\":null,\"reason\":null},\"medicalHistory\":{\"physician\":null,\"specialty\":null,\"clinicAddress\":null,\"contactNumber\":null,\"q1\":{\"answ\":null},\"q2\":{\"answ\":null,\"remarks\":null},\"q3\":{\"answ\":null,\"remarks\":null},\"q4\":{\"answ\":null,\"remarks\":null},\"q5\":{\"answ\":null,\"remarks\":null},\"q6\":{\"answ\":null},\"q7\":{\"answ\":null},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-29','8:30 am - 9:30 am',2,'2024-11-23 10:22:46','2024-11-26 23:50:54'),(3,2,'{\"details\":{\"name\":\"Test\",\"collegeOffice\":\"asdasd\",\"reason\":\"asdasd\"},\"dentalHistory\":{\"previousDentist\":null,\"address\":null,\"lastDentalVisit\":null,\"reason\":null},\"medicalHistory\":{\"physician\":null,\"specialty\":null,\"clinicAddress\":null,\"contactNumber\":null,\"q1\":{\"answ\":\"No\"},\"q2\":{\"answ\":\"No\",\"remarks\":null},\"q3\":{\"answ\":\"No\",\"remarks\":null},\"q4\":{\"answ\":\"No\",\"remarks\":null},\"q5\":{\"answ\":null,\"remarks\":null},\"q6\":{\"answ\":null},\"q7\":{\"answ\":null},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}',NULL,'2024-11-26','8:30 am - 9:30 am',2,'2024-11-24 23:16:37','2024-11-26 23:45:34');
/*!40000 ALTER TABLE `appointment_backup_2024_12_03_22_06_03` ENABLE KEYS */;
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
  `tooth_38` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_37` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_36` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_35` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_34` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_33` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_32` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_31` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  CONSTRAINT `badult_leftteeth_chk_1` CHECK (json_valid(`tooth_38`)),
  CONSTRAINT `badult_leftteeth_chk_2` CHECK (json_valid(`tooth_37`)),
  CONSTRAINT `badult_leftteeth_chk_3` CHECK (json_valid(`tooth_36`)),
  CONSTRAINT `badult_leftteeth_chk_4` CHECK (json_valid(`tooth_35`)),
  CONSTRAINT `badult_leftteeth_chk_5` CHECK (json_valid(`tooth_34`)),
  CONSTRAINT `badult_leftteeth_chk_6` CHECK (json_valid(`tooth_33`)),
  CONSTRAINT `badult_leftteeth_chk_7` CHECK (json_valid(`tooth_32`)),
  CONSTRAINT `badult_leftteeth_chk_8` CHECK (json_valid(`tooth_31`))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badult_leftteeth`
--

LOCK TABLES `badult_leftteeth` WRITE;
/*!40000 ALTER TABLE `badult_leftteeth` DISABLE KEYS */;
INSERT INTO `badult_leftteeth` VALUES (1,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(2,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(3,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(4,3,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(5,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');
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
  `tooth_48` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_47` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_46` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_45` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_44` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_43` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_42` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_41` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  CONSTRAINT `badult_rightteeth_chk_1` CHECK (json_valid(`tooth_48`)),
  CONSTRAINT `badult_rightteeth_chk_2` CHECK (json_valid(`tooth_47`)),
  CONSTRAINT `badult_rightteeth_chk_3` CHECK (json_valid(`tooth_46`)),
  CONSTRAINT `badult_rightteeth_chk_4` CHECK (json_valid(`tooth_45`)),
  CONSTRAINT `badult_rightteeth_chk_5` CHECK (json_valid(`tooth_44`)),
  CONSTRAINT `badult_rightteeth_chk_6` CHECK (json_valid(`tooth_43`)),
  CONSTRAINT `badult_rightteeth_chk_7` CHECK (json_valid(`tooth_42`)),
  CONSTRAINT `badult_rightteeth_chk_8` CHECK (json_valid(`tooth_41`))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badult_rightteeth`
--

LOCK TABLES `badult_rightteeth` WRITE;
/*!40000 ALTER TABLE `badult_rightteeth` DISABLE KEYS */;
INSERT INTO `badult_rightteeth` VALUES (1,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(2,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(3,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(4,3,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(5,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');
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
  `tooth_75` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_74` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_73` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_72` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_71` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  CONSTRAINT `bbaby_leftteeth_chk_1` CHECK (json_valid(`tooth_75`)),
  CONSTRAINT `bbaby_leftteeth_chk_2` CHECK (json_valid(`tooth_74`)),
  CONSTRAINT `bbaby_leftteeth_chk_3` CHECK (json_valid(`tooth_73`)),
  CONSTRAINT `bbaby_leftteeth_chk_4` CHECK (json_valid(`tooth_72`)),
  CONSTRAINT `bbaby_leftteeth_chk_5` CHECK (json_valid(`tooth_71`))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbaby_leftteeth`
--

LOCK TABLES `bbaby_leftteeth` WRITE;
/*!40000 ALTER TABLE `bbaby_leftteeth` DISABLE KEYS */;
INSERT INTO `bbaby_leftteeth` VALUES (1,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(2,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(3,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(4,3,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(5,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');
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
  `tooth_85` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_84` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_83` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_82` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_81` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  CONSTRAINT `bbaby_rightteeth_chk_1` CHECK (json_valid(`tooth_85`)),
  CONSTRAINT `bbaby_rightteeth_chk_2` CHECK (json_valid(`tooth_84`)),
  CONSTRAINT `bbaby_rightteeth_chk_3` CHECK (json_valid(`tooth_83`)),
  CONSTRAINT `bbaby_rightteeth_chk_4` CHECK (json_valid(`tooth_82`)),
  CONSTRAINT `bbaby_rightteeth_chk_5` CHECK (json_valid(`tooth_81`))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbaby_rightteeth`
--

LOCK TABLES `bbaby_rightteeth` WRITE;
/*!40000 ALTER TABLE `bbaby_rightteeth` DISABLE KEYS */;
INSERT INTO `bbaby_rightteeth` VALUES (1,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(2,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(3,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(4,3,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(5,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');
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
  `firstPage` longtext COLLATE utf8mb4_general_ci,
  `services_rendered` longtext COLLATE utf8mb4_general_ci,
  `tooth_number` longtext COLLATE utf8mb4_general_ci,
  `medicine_prescribed` longtext COLLATE utf8mb4_general_ci,
  `remarks` longtext COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinical_details`
--

LOCK TABLES `clinical_details` WRITE;
/*!40000 ALTER TABLE `clinical_details` DISABLE KEYS */;
INSERT INTO `clinical_details` VALUES (1,2,'{\"periodicalScreening\":[],\"occlusion\":[],\"appliances\":[],\"rpd\":null,\"tmd\":[],\"tmdOthers\":null,\"others\":null,\"dateOfExamination1\":null,\"dateOfExamination2\":null,\"dateOfExamination3\":null,\"dateOfExamination4\":null,\"oralHygieneStatus1\":null,\"oralHygieneStatus2\":null,\"oralHygieneStatus3\":null,\"oralHygieneStatus4\":null}','[{\"id\":1,\"name\":\"Examination\"},{\"id\":16,\"name\":\"Enrollees Examined\"}]','asd','asd','asd','2024-11-26 14:39:03','2024-11-26 22:40:23'),(2,1,'{\"periodicalScreening\":[],\"occlusion\":[],\"appliances\":[],\"rpd\":null,\"tmd\":[],\"tmdOthers\":null,\"others\":null,\"dateOfExamination1\":null,\"dateOfExamination2\":null,\"dateOfExamination3\":null,\"dateOfExamination4\":null,\"oralHygieneStatus1\":null,\"oralHygieneStatus2\":null,\"oralHygieneStatus3\":null,\"oralHygieneStatus4\":null}','[]',NULL,NULL,NULL,'2024-11-26 15:42:42','2024-11-26 23:42:42'),(4,3,'{\"periodicalScreening\":[],\"occlusion\":[],\"appliances\":[],\"rpd\":null,\"tmd\":[],\"tmdOthers\":null,\"others\":null,\"dateOfExamination1\":null,\"dateOfExamination2\":null,\"dateOfExamination3\":null,\"dateOfExamination4\":null,\"oralHygieneStatus1\":null,\"oralHygieneStatus2\":null,\"oralHygieneStatus3\":null,\"oralHygieneStatus4\":null}','[]',NULL,NULL,NULL,'2024-11-26 15:45:34','2024-11-26 23:45:34');
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
  `uuid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holidays`
--

LOCK TABLES `holidays` WRITE;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
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
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `dental_history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `medical_history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `vitals` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `pre_consent` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `final_consent` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `informed_consent_chk_1` CHECK (json_valid(`details`)),
  CONSTRAINT `informed_consent_chk_2` CHECK (json_valid(`dental_history`)),
  CONSTRAINT `informed_consent_chk_3` CHECK (json_valid(`medical_history`)),
  CONSTRAINT `informed_consent_chk_4` CHECK (json_valid(`vitals`)),
  CONSTRAINT `informed_consent_chk_5` CHECK (json_valid(`pre_consent`)),
  CONSTRAINT `informed_consent_chk_6` CHECK (json_valid(`final_consent`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `action` text COLLATE utf8mb4_general_ci,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'created user account: 2',NULL,'2024-11-23 08:48:35','2024-11-23 08:48:35'),(2,'created appointment: 1',1,'2024-11-23 08:54:23','2024-11-23 08:54:23'),(3,'created appointment: 2',2,'2024-11-23 10:22:46','2024-11-23 10:22:46'),(4,'created appointment: 3',1,'2024-11-24 23:16:37','2024-11-24 23:16:37'),(5,'created teeth data for apptID: 2',1,'2024-11-26 14:39:03','2024-11-26 14:39:03'),(6,'updated teeth data for apptID: 2',1,'2024-11-26 14:39:11','2024-11-26 14:39:11'),(7,'updated teeth data for apptID: 2',1,'2024-11-26 14:39:13','2024-11-26 14:39:13'),(8,'updated teeth data for apptID: 2',1,'2024-11-26 14:40:24','2024-11-26 14:40:24'),(9,'created teeth data for apptID: 1',2,'2024-11-26 15:42:43','2024-11-26 15:42:43'),(10,'created teeth data for apptID: 1',2,'2024-11-26 15:43:21','2024-11-26 15:43:21'),(11,'created teeth data for apptID: 3',2,'2024-11-26 15:45:34','2024-11-26 15:45:34'),(12,'created teeth data for apptID: 2',2,'2024-11-26 15:50:54','2024-11-26 15:50:54'),(13,'created user account: 5',NULL,'2024-11-27 16:49:29','2024-11-27 16:49:29'),(14,'changed the security question of school#: ',1,'2024-11-28 14:42:30','2024-11-28 14:42:30'),(15,'changed the security question of school#: ',1,'2024-11-28 14:43:14','2024-11-28 14:43:14');
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
  `migration` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `tokenable_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'my-token','e8a5a3ebaf39ac4bf40d316420fbbc26fda95a3e88319b8e6af99c188561a40f','[\"*\"]','2024-11-02 07:52:26',NULL,'2024-11-02 07:52:13','2024-11-02 07:52:26'),(2,'App\\Models\\User',1,'my-token','8dafaaeb2a6980deaf3129c5925c4c2f96fda85bf87fd43d95faecfa3edc1032','[\"*\"]','2024-11-02 07:52:58',NULL,'2024-11-02 07:52:57','2024-11-02 07:52:58'),(3,'App\\Models\\User',1,'my-token','c1ba6fec5df2375e73669796a3f115ef0326ff1503e943c535cdbc6f3a953291','[\"*\"]','2024-11-22 08:27:47',NULL,'2024-11-22 08:17:22','2024-11-22 08:27:47'),(4,'App\\Models\\User',1,'my-token','bfa21b5ccd92f69d6de53079b600eec719b2ba2ff0d78884baa0e0345d426465','[\"*\"]','2024-11-22 08:48:14',NULL,'2024-11-22 08:29:13','2024-11-22 08:48:14'),(5,'App\\Models\\User',1,'my-token','120c774fe0ba496c0d9429af5c1d939f0ba9874cc79dd2e6d404eb5b7aac7b8f','[\"*\"]','2024-11-23 02:45:33',NULL,'2024-11-23 02:20:42','2024-11-23 02:45:33'),(6,'App\\Models\\User',1,'my-token','b936c14dbf30dcc1ae4f0c7c78afe67eed20221cc47db6dfe1a1b3a7a37a8b54','[\"*\"]','2024-11-23 08:10:38',NULL,'2024-11-23 06:40:29','2024-11-23 08:10:38'),(7,'App\\Models\\User',1,'my-token','fd731c78b1fb8c2e7c41944405f5fde11c1f9fba62a92fcfc33687f182da2037','[\"*\"]','2024-11-23 09:54:56',NULL,'2024-11-23 08:49:09','2024-11-23 09:54:56'),(8,'App\\Models\\User',2,'my-token','c4b60bd9ff7ab61670171d8d6ca786dfcd7b1dbacb86b7f03e7ec6455b6e80c1','[\"*\"]','2024-11-23 10:26:00',NULL,'2024-11-23 09:59:11','2024-11-23 10:26:00'),(9,'App\\Models\\User',1,'my-token','d8243e1567906d30256a04b6e6ae32f6a4f9db1509402a035eb6acfac128532d','[\"*\"]','2024-11-24 03:45:21',NULL,'2024-11-24 03:45:20','2024-11-24 03:45:21'),(10,'App\\Models\\User',1,'my-token','500914c60cdbdab65d712ab66403037cc651c30ff79c475273fbe2d68c8c5e63','[\"*\"]','2024-11-24 05:39:40',NULL,'2024-11-24 04:13:25','2024-11-24 05:39:40'),(11,'App\\Models\\User',1,'my-token','2dc27c1b6beb86aa2bcc8deab9389a102037fe25a6eb7aac8974ddd77338ffb7','[\"*\"]','2024-11-24 06:22:01',NULL,'2024-11-24 06:19:05','2024-11-24 06:22:01'),(12,'App\\Models\\User',1,'my-token','7aaf957e858029c62609219dee566d14128aec75e510887735bef96db86b5985','[\"*\"]','2024-11-24 07:03:40',NULL,'2024-11-24 06:48:29','2024-11-24 07:03:40'),(13,'App\\Models\\User',1,'my-token','73952759b750a604d3fe395407cf70737a6ac4f36ef136ed19369fc6aec1d574','[\"*\"]','2024-11-24 15:06:08',NULL,'2024-11-24 15:06:06','2024-11-24 15:06:08'),(14,'App\\Models\\User',1,'my-token','d955584eaa9d2e69f14442b635998a80ce3860b461266db2a846a7da3547a05f','[\"*\"]','2024-11-24 15:06:15',NULL,'2024-11-24 15:06:07','2024-11-24 15:06:15'),(15,'App\\Models\\User',1,'my-token','aaaf6c053a3c4368ee07291e056985b4edfa5c8ff8acec0883680884ae5c63ee','[\"*\"]','2024-11-24 23:16:47',NULL,'2024-11-24 23:08:15','2024-11-24 23:16:47'),(16,'App\\Models\\User',1,'my-token','5e4c201172fa6e83fbbb979a314539e668e2563880c891b2a9968f1dbaee312d','[\"*\"]','2024-11-25 13:17:09',NULL,'2024-11-25 13:17:06','2024-11-25 13:17:09'),(17,'App\\Models\\User',1,'my-token','d37661977022d48ce7e44e80c2a9ef6e1f0522be07de44e31e024b2c6b93c279','[\"*\"]','2024-11-25 13:17:18',NULL,'2024-11-25 13:17:17','2024-11-25 13:17:18'),(18,'App\\Models\\User',1,'my-token','da68b9dda7c1898935dd9974e9747ea9f96ef4187ae1613249f565f06a180c71','[\"*\"]','2024-11-25 14:15:19',NULL,'2024-11-25 14:10:56','2024-11-25 14:15:19'),(19,'App\\Models\\User',2,'my-token','1f4ade27b3a54e53fa72f62506fc1872a33d2de26fbc58fceebe19ea394de092','[\"*\"]','2024-11-25 14:36:29',NULL,'2024-11-25 14:17:32','2024-11-25 14:36:29'),(20,'App\\Models\\User',1,'my-token','65679ab4d2336b0bb64a2f604474682910d8d5ac574a0b1118d5546d59d742c1','[\"*\"]','2024-11-25 15:36:38',NULL,'2024-11-25 14:36:42','2024-11-25 15:36:38'),(21,'App\\Models\\User',1,'my-token','1181293b65bd72c17915142ecc01b860e6d9a505ebac24d4683dded70e2d7fc0','[\"*\"]','2024-11-25 16:20:40',NULL,'2024-11-25 15:59:11','2024-11-25 16:20:40'),(22,'App\\Models\\User',1,'my-token','7746ee12b8c14df6a16b5f51a0d7f01080680d602f43e0a2ba1bbbbd00f8fdc0','[\"*\"]','2024-11-25 16:33:16',NULL,'2024-11-25 16:33:15','2024-11-25 16:33:16'),(23,'App\\Models\\User',1,'my-token','6c42e0e002aa05ebe9d18c59e7c4f145cf46e128fbf818c089beeabbabfc587e','[\"*\"]','2024-11-25 17:20:09',NULL,'2024-11-25 16:48:46','2024-11-25 17:20:09'),(24,'App\\Models\\User',1,'my-token','9411f7acded4eb8deb763fd6fdb750f7364a6d880fce55f90f5a36ca1009e1df','[\"*\"]','2024-11-25 18:03:04',NULL,'2024-11-25 17:30:44','2024-11-25 18:03:04'),(25,'App\\Models\\User',1,'my-token','7f4f6cc4961252a17020aeb0dbf627d2f5d003fca14bef7db7f0ba3d81d3daea','[\"*\"]','2024-11-26 13:39:16',NULL,'2024-11-26 13:15:59','2024-11-26 13:39:16'),(26,'App\\Models\\User',2,'my-token','32babc07f16777e97d1bcf880bcd53f9c0fe81a50343a21ef6687d5f6541318f','[\"*\"]','2024-11-26 14:37:53',NULL,'2024-11-26 13:54:14','2024-11-26 14:37:53'),(27,'App\\Models\\User',1,'my-token','cb0d6fe419212d39386fdea93690d160d8f9b074c175dbf680d37a366c8e4030','[\"*\"]','2024-11-26 14:39:14',NULL,'2024-11-26 14:38:27','2024-11-26 14:39:14'),(28,'App\\Models\\User',2,'my-token','72e3be1c102ea63149e5a412b3715723bd006608f1ad03674dd20b49356a54ef','[\"*\"]','2024-11-26 14:39:27',NULL,'2024-11-26 14:39:22','2024-11-26 14:39:27'),(29,'App\\Models\\User',1,'my-token','fd2becd3c775c69dc5ae4fbfccdca564e3ca50d681ae8d3c891810da7045a637','[\"*\"]','2024-11-26 14:40:31',NULL,'2024-11-26 14:40:01','2024-11-26 14:40:31'),(30,'App\\Models\\User',2,'my-token','c11141990df1816919edd17bc34f909f4a449e24602f278b5621838bf57aec31','[\"*\"]','2024-11-26 16:29:10',NULL,'2024-11-26 14:40:42','2024-11-26 16:29:10'),(31,'App\\Models\\User',2,'my-token','a01eeeadd0010065fa8825b33c246124e3044574346e44c6dbd0026dcc2fb5f1','[\"*\"]','2024-11-26 16:37:32',NULL,'2024-11-26 16:37:31','2024-11-26 16:37:32'),(32,'App\\Models\\User',1,'my-token','9523ca7b83c2022e903bbc32163d477ac8ae504bd3003f93670b2f70d17fb9b6','[\"*\"]','2024-11-26 16:37:50',NULL,'2024-11-26 16:37:42','2024-11-26 16:37:50'),(33,'App\\Models\\User',1,'my-token','507e35368c13ce1ccfa78bfa2474305f8e7e8bbf6eccc52ffd5bb96623f32bd4','[\"*\"]','2024-11-26 16:43:18',NULL,'2024-11-26 16:41:49','2024-11-26 16:43:18'),(34,'App\\Models\\User',2,'my-token','8bceaefb0951d534c39a2538131b09108981a05ba3cf6780d911cf9e573dc714','[\"*\"]','2024-11-27 13:50:56',NULL,'2024-11-27 13:48:07','2024-11-27 13:50:56'),(35,'App\\Models\\User',2,'my-token','3e6e7a50ac074e275c84674f07f0a59c18b7393e06c38c1c887ffe130e92af9b','[\"*\"]','2024-11-27 13:51:06',NULL,'2024-11-27 13:51:05','2024-11-27 13:51:06'),(36,'App\\Models\\User',2,'my-token','02fd35c3761a0c665bde7a81f6c31aea1c6ca1fc5ed711ed0e5cbfea67a58b39','[\"*\"]','2024-11-27 14:20:31',NULL,'2024-11-27 13:51:17','2024-11-27 14:20:31'),(37,'App\\Models\\User',2,'my-token','62625293acf95618fd30e8dc1bbf877d04af81ab2568ae91e6848d94c20ec96d','[\"*\"]','2024-11-27 16:34:37',NULL,'2024-11-27 16:22:38','2024-11-27 16:34:37'),(38,'App\\Models\\User',1,'my-token','702770f9bab1dada996db09014844279ae7c235040450fe5a9ea215fe0a45b49','[\"*\"]','2024-11-27 16:55:14','2024-11-27 17:53:39','2024-11-27 16:53:39','2024-11-27 16:55:14'),(39,'App\\Models\\User',1,'my-token','0d29504193c2c1045975b80b438aced685e86c28357647d31299cef97749b368','[\"*\"]','2024-11-27 17:04:18','2024-11-27 17:55:22','2024-11-27 16:55:22','2024-11-27 17:04:18'),(40,'App\\Models\\User',1,'my-token','4c61c0791d16546335444c3ec04d3ce3f4e4e8620a56b9d5786dd1b686382eee','[\"*\"]','2024-11-28 13:17:11','2024-11-28 13:53:58','2024-11-28 12:53:58','2024-11-28 13:17:11'),(41,'App\\Models\\User',1,'my-token','7257a1dfdb5721847d0ceadac6509b049598d7e06ce4c9cc8ded28f8ca34e0bd','[\"*\"]','2024-11-28 13:26:53','2024-11-28 14:26:25','2024-11-28 13:26:25','2024-11-28 13:26:53'),(42,'App\\Models\\User',1,'my-token','6881df5dc52df75e6618347ae07c3127ed0e52f3fa25599712dd4fe2d3a009a9','[\"*\"]','2024-11-28 14:13:02','2024-11-28 15:12:00','2024-11-28 14:12:00','2024-11-28 14:13:02'),(43,'App\\Models\\User',1,'my-token','05fe96eae4b682a336810550a26fefa5a6d1a2edbe3be89147c5e90254c72655','[\"*\"]','2024-11-28 14:14:37','2024-11-28 15:14:36','2024-11-28 14:14:36','2024-11-28 14:14:37'),(44,'App\\Models\\User',2,'my-token','07646948f42171497137aa79314304324d06a90116de21ec71e3264ff79dbfce','[\"*\"]','2024-11-28 14:15:08','2024-11-28 15:15:07','2024-11-28 14:15:07','2024-11-28 14:15:08'),(45,'App\\Models\\User',1,'my-token','eeb13589feb128198f3f407fccc00231dca8a313c13886bb58d33d3ca214670a','[\"*\"]','2024-11-28 14:44:39','2024-11-28 15:15:22','2024-11-28 14:15:22','2024-11-28 14:44:39'),(46,'App\\Models\\User',1,'my-token','f471aed2257562ee93dc9d91894b6b567483115ee4d32ead1fc18818d17b834f','[\"*\"]','2024-11-28 15:18:13','2024-11-28 15:53:29','2024-11-28 14:53:29','2024-11-28 15:18:13'),(47,'App\\Models\\User',1,'my-token','cfc46c941bed44bd724cd0012bd3e99007d83b339782a2e047c3c2b10a40b2a8','[\"*\"]','2024-11-28 15:36:37','2024-11-28 16:18:22','2024-11-28 15:18:22','2024-11-28 15:36:37'),(48,'App\\Models\\User',1,'my-token','c59ab5c552b6cc53a9458a4ca59b1e4edce56da2ca792c86d84433b569d7a63c','[\"*\"]','2024-12-03 14:06:03','2024-12-03 14:37:49','2024-12-03 13:37:49','2024-12-03 14:06:03'),(49,'App\\Models\\User',1,'my-token','3e3df11465ba80b7401ecfa168b44c899414e835e2ca4711e939c95febceed26','[\"*\"]','2024-12-03 14:08:42','2024-12-03 15:08:36','2024-12-03 14:08:36','2024-12-03 14:08:42'),(50,'App\\Models\\User',1,'my-token','b69383102d28f40f2cccf094bd0465ad96d11280d44558200c69a50e36ae11e8','[\"*\"]','2024-12-03 15:15:24','2024-12-03 15:46:01','2024-12-03 14:46:01','2024-12-03 15:15:24'),(51,'App\\Models\\User',1,'my-token','20abb42ddb1f0945880f0414501d1b97fbd1715e9965243ec623cf89941d0890','[\"*\"]','2024-12-03 15:38:18','2024-12-03 16:18:18','2024-12-03 15:18:18','2024-12-03 15:38:18');
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
  `item` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `tooth_21` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_22` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_23` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_24` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_25` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_26` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_27` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_28` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  CONSTRAINT `tadult_leftteeth_chk_1` CHECK (json_valid(`tooth_21`)),
  CONSTRAINT `tadult_leftteeth_chk_2` CHECK (json_valid(`tooth_22`)),
  CONSTRAINT `tadult_leftteeth_chk_3` CHECK (json_valid(`tooth_23`)),
  CONSTRAINT `tadult_leftteeth_chk_4` CHECK (json_valid(`tooth_24`)),
  CONSTRAINT `tadult_leftteeth_chk_5` CHECK (json_valid(`tooth_25`)),
  CONSTRAINT `tadult_leftteeth_chk_6` CHECK (json_valid(`tooth_26`)),
  CONSTRAINT `tadult_leftteeth_chk_7` CHECK (json_valid(`tooth_27`)),
  CONSTRAINT `tadult_leftteeth_chk_8` CHECK (json_valid(`tooth_28`))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tadult_leftteeth`
--

LOCK TABLES `tadult_leftteeth` WRITE;
/*!40000 ALTER TABLE `tadult_leftteeth` DISABLE KEYS */;
INSERT INTO `tadult_leftteeth` VALUES (1,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(2,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(3,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(4,3,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(5,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');
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
  `tooth_18` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_17` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_16` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_15` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_14` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_13` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_12` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_11` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  CONSTRAINT `tadult_rightteeth_chk_1` CHECK (json_valid(`tooth_18`)),
  CONSTRAINT `tadult_rightteeth_chk_2` CHECK (json_valid(`tooth_17`)),
  CONSTRAINT `tadult_rightteeth_chk_3` CHECK (json_valid(`tooth_16`)),
  CONSTRAINT `tadult_rightteeth_chk_4` CHECK (json_valid(`tooth_15`)),
  CONSTRAINT `tadult_rightteeth_chk_5` CHECK (json_valid(`tooth_14`)),
  CONSTRAINT `tadult_rightteeth_chk_6` CHECK (json_valid(`tooth_13`)),
  CONSTRAINT `tadult_rightteeth_chk_7` CHECK (json_valid(`tooth_12`)),
  CONSTRAINT `tadult_rightteeth_chk_8` CHECK (json_valid(`tooth_11`))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tadult_rightteeth`
--

LOCK TABLES `tadult_rightteeth` WRITE;
/*!40000 ALTER TABLE `tadult_rightteeth` DISABLE KEYS */;
INSERT INTO `tadult_rightteeth` VALUES (1,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(2,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(3,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(4,3,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(5,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');
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
  `tooth_61` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_62` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_63` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_64` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_65` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  CONSTRAINT `tbaby_leftteeth_chk_1` CHECK (json_valid(`tooth_61`)),
  CONSTRAINT `tbaby_leftteeth_chk_2` CHECK (json_valid(`tooth_62`)),
  CONSTRAINT `tbaby_leftteeth_chk_3` CHECK (json_valid(`tooth_63`)),
  CONSTRAINT `tbaby_leftteeth_chk_4` CHECK (json_valid(`tooth_64`)),
  CONSTRAINT `tbaby_leftteeth_chk_5` CHECK (json_valid(`tooth_65`))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbaby_leftteeth`
--

LOCK TABLES `tbaby_leftteeth` WRITE;
/*!40000 ALTER TABLE `tbaby_leftteeth` DISABLE KEYS */;
INSERT INTO `tbaby_leftteeth` VALUES (1,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(2,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(3,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(4,3,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(5,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');
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
  `tooth_55` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_54` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_53` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_52` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `tooth_51` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  CONSTRAINT `tbaby_rightteeth_chk_1` CHECK (json_valid(`tooth_55`)),
  CONSTRAINT `tbaby_rightteeth_chk_2` CHECK (json_valid(`tooth_54`)),
  CONSTRAINT `tbaby_rightteeth_chk_3` CHECK (json_valid(`tooth_53`)),
  CONSTRAINT `tbaby_rightteeth_chk_4` CHECK (json_valid(`tooth_52`)),
  CONSTRAINT `tbaby_rightteeth_chk_5` CHECK (json_valid(`tooth_51`))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbaby_rightteeth`
--

LOCK TABLES `tbaby_rightteeth` WRITE;
/*!40000 ALTER TABLE `tbaby_rightteeth` DISABLE KEYS */;
INSERT INTO `tbaby_rightteeth` VALUES (1,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(2,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(3,1,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(4,3,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),(5,2,'{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}','{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');
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
  `school_id_number` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `middlename` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employee_student_type` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employment_classification` int DEFAULT NULL,
  `office_level` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department_program` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_no` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `civil_status` int DEFAULT NULL,
  `guardian` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `guardian_no` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_address` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bsu_address` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_id_number_UNIQUE` (`school_id_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (1,1,'11824','Admin','Admin','Admin','1','test',NULL,'test','test','Male',0,NULL,'admin@gmail.com','0000',0,'0','0','0','0','2024-11-02 07:51:32','2024-11-02 15:51:32'),(2,2,'1803214','Lex','Dixon','G','2','1',NULL,'25','BSIT','Male',24,NULL,'lexgdixon21@gmail.com','09480759938',1,'Test','09204542229','Buyagan LTB','Buyagan LTB','2024-11-23 08:48:35','2024-11-23 16:48:35'),(3,5,'1234567','Test','Test','Test','2','1',1,'1','Test','Male',26,NULL,'test@gmail.com','01231231231',1,'test','01231231234','test','test','2024-11-27 16:49:29','2024-11-28 00:49:29');
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
  `school_id_number` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `security_question` int DEFAULT NULL,
  `security_answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'11824','admin','admin@gmail.com',NULL,'$2y$12$07DhnSCZMVuN8SWFExPF..k8RovtObiLDAezt5.b8cF1V4IhDWWN2',NULL,NULL,NULL,1,'2024-11-02 07:51:32','2024-11-02 07:51:32'),(2,'1803214','patient','lexgdixon21@gmail.com',NULL,'$2y$12$v/5qq2v0ASwqg9itPA591ehWKnNL5qEy1iE/HlJc8.FB7CfP2pdoy',NULL,1,'$2y$12$PeqsAQht3v.7HQXiJT9BcuYS87CuqxnJPGGM7flTy21PJ7A0rqSE6',1,'2024-11-23 08:48:35','2024-11-23 08:48:35'),(5,'1234567','patient','test@gmail.com',NULL,'$2y$12$cKW1xjFjydYgeOY4TKh6G.WoRUV43bLXc2L.QnRJHWdANkJBCp/si',NULL,1,'$2y$12$LGvAgh4QoFczU/RWMmUs0eXiBqMc4q7KfJCKf9sA0Ezvm1Zx7w5i6',1,'2024-11-27 16:49:29','2024-11-27 16:49:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_backup_2024_12_03_22_01_49`
--

DROP TABLE IF EXISTS `users_backup_2024_12_03_22_01_49`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_backup_2024_12_03_22_01_49` (
  `id` bigint unsigned NOT NULL DEFAULT '0',
  `school_id_number` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `security_question` int DEFAULT NULL,
  `security_answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_backup_2024_12_03_22_01_49`
--

LOCK TABLES `users_backup_2024_12_03_22_01_49` WRITE;
/*!40000 ALTER TABLE `users_backup_2024_12_03_22_01_49` DISABLE KEYS */;
INSERT INTO `users_backup_2024_12_03_22_01_49` VALUES (1,'11824','admin','admin@gmail.com',NULL,'$2y$12$07DhnSCZMVuN8SWFExPF..k8RovtObiLDAezt5.b8cF1V4IhDWWN2',NULL,NULL,NULL,1,'2024-11-02 07:51:32','2024-11-02 07:51:32'),(2,'1803214','patient','lexgdixon21@gmail.com',NULL,'$2y$12$v/5qq2v0ASwqg9itPA591ehWKnNL5qEy1iE/HlJc8.FB7CfP2pdoy',NULL,1,'$2y$12$PeqsAQht3v.7HQXiJT9BcuYS87CuqxnJPGGM7flTy21PJ7A0rqSE6',1,'2024-11-23 08:48:35','2024-11-23 08:48:35'),(5,'1234567','patient','test@gmail.com',NULL,'$2y$12$cKW1xjFjydYgeOY4TKh6G.WoRUV43bLXc2L.QnRJHWdANkJBCp/si',NULL,1,'$2y$12$LGvAgh4QoFczU/RWMmUs0eXiBqMc4q7KfJCKf9sA0Ezvm1Zx7w5i6',1,'2024-11-27 16:49:29','2024-11-27 16:49:29');
/*!40000 ALTER TABLE `users_backup_2024_12_03_22_01_49` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_backup_2024_12_03_22_02_24`
--

DROP TABLE IF EXISTS `users_backup_2024_12_03_22_02_24`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_backup_2024_12_03_22_02_24` (
  `id` bigint unsigned NOT NULL DEFAULT '0',
  `school_id_number` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `security_question` int DEFAULT NULL,
  `security_answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_backup_2024_12_03_22_02_24`
--

LOCK TABLES `users_backup_2024_12_03_22_02_24` WRITE;
/*!40000 ALTER TABLE `users_backup_2024_12_03_22_02_24` DISABLE KEYS */;
INSERT INTO `users_backup_2024_12_03_22_02_24` VALUES (1,'11824','admin','admin@gmail.com',NULL,'$2y$12$07DhnSCZMVuN8SWFExPF..k8RovtObiLDAezt5.b8cF1V4IhDWWN2',NULL,NULL,NULL,1,'2024-11-02 07:51:32','2024-11-02 07:51:32'),(2,'1803214','patient','lexgdixon21@gmail.com',NULL,'$2y$12$v/5qq2v0ASwqg9itPA591ehWKnNL5qEy1iE/HlJc8.FB7CfP2pdoy',NULL,1,'$2y$12$PeqsAQht3v.7HQXiJT9BcuYS87CuqxnJPGGM7flTy21PJ7A0rqSE6',1,'2024-11-23 08:48:35','2024-11-23 08:48:35'),(5,'1234567','patient','test@gmail.com',NULL,'$2y$12$cKW1xjFjydYgeOY4TKh6G.WoRUV43bLXc2L.QnRJHWdANkJBCp/si',NULL,1,'$2y$12$LGvAgh4QoFczU/RWMmUs0eXiBqMc4q7KfJCKf9sA0Ezvm1Zx7w5i6',1,'2024-11-27 16:49:29','2024-11-27 16:49:29');
/*!40000 ALTER TABLE `users_backup_2024_12_03_22_02_24` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_backup_2024_12_03_22_06_03`
--

DROP TABLE IF EXISTS `users_backup_2024_12_03_22_06_03`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_backup_2024_12_03_22_06_03` (
  `id` bigint unsigned NOT NULL DEFAULT '0',
  `school_id_number` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `security_question` int DEFAULT NULL,
  `security_answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_backup_2024_12_03_22_06_03`
--

LOCK TABLES `users_backup_2024_12_03_22_06_03` WRITE;
/*!40000 ALTER TABLE `users_backup_2024_12_03_22_06_03` DISABLE KEYS */;
INSERT INTO `users_backup_2024_12_03_22_06_03` VALUES (1,'11824','admin','admin@gmail.com',NULL,'$2y$12$07DhnSCZMVuN8SWFExPF..k8RovtObiLDAezt5.b8cF1V4IhDWWN2',NULL,NULL,NULL,1,'2024-11-02 07:51:32','2024-11-02 07:51:32'),(2,'1803214','patient','lexgdixon21@gmail.com',NULL,'$2y$12$v/5qq2v0ASwqg9itPA591ehWKnNL5qEy1iE/HlJc8.FB7CfP2pdoy',NULL,1,'$2y$12$PeqsAQht3v.7HQXiJT9BcuYS87CuqxnJPGGM7flTy21PJ7A0rqSE6',1,'2024-11-23 08:48:35','2024-11-23 08:48:35'),(5,'1234567','patient','test@gmail.com',NULL,'$2y$12$cKW1xjFjydYgeOY4TKh6G.WoRUV43bLXc2L.QnRJHWdANkJBCp/si',NULL,1,'$2y$12$LGvAgh4QoFczU/RWMmUs0eXiBqMc4q7KfJCKf9sA0Ezvm1Zx7w5i6',1,'2024-11-27 16:49:29','2024-11-27 16:49:29');
/*!40000 ALTER TABLE `users_backup_2024_12_03_22_06_03` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_backup_2024_12_03_22_08_42`
--

DROP TABLE IF EXISTS `users_backup_2024_12_03_22_08_42`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_backup_2024_12_03_22_08_42` (
  `id` bigint unsigned NOT NULL DEFAULT '0',
  `school_id_number` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `security_question` int DEFAULT NULL,
  `security_answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_backup_2024_12_03_22_08_42`
--

LOCK TABLES `users_backup_2024_12_03_22_08_42` WRITE;
/*!40000 ALTER TABLE `users_backup_2024_12_03_22_08_42` DISABLE KEYS */;
INSERT INTO `users_backup_2024_12_03_22_08_42` VALUES (1,'11824','admin','admin@gmail.com',NULL,'$2y$12$07DhnSCZMVuN8SWFExPF..k8RovtObiLDAezt5.b8cF1V4IhDWWN2',NULL,NULL,NULL,1,'2024-11-02 07:51:32','2024-11-02 07:51:32'),(2,'1803214','patient','lexgdixon21@gmail.com',NULL,'$2y$12$v/5qq2v0ASwqg9itPA591ehWKnNL5qEy1iE/HlJc8.FB7CfP2pdoy',NULL,1,'$2y$12$PeqsAQht3v.7HQXiJT9BcuYS87CuqxnJPGGM7flTy21PJ7A0rqSE6',1,'2024-11-23 08:48:35','2024-11-23 08:48:35'),(5,'1234567','patient','test@gmail.com',NULL,'$2y$12$cKW1xjFjydYgeOY4TKh6G.WoRUV43bLXc2L.QnRJHWdANkJBCp/si',NULL,1,'$2y$12$LGvAgh4QoFczU/RWMmUs0eXiBqMc4q7KfJCKf9sA0Ezvm1Zx7w5i6',1,'2024-11-27 16:49:29','2024-11-27 16:49:29');
/*!40000 ALTER TABLE `users_backup_2024_12_03_22_08_42` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-03 23:38:18
