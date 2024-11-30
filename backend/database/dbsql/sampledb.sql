-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 02:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental_scheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_details_id` int(11) DEFAULT NULL,
  `consent_form` longtext DEFAULT NULL,
  `enccode` longtext DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_details_id`, `consent_form`, `enccode`, `appointment_date`, `appointment_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '{\"details\":{\"name\":\"Lex\",\"collegeOffice\":\"asd\",\"reason\":\"asdasd\"},\"dentalHistory\":{\"previousDentist\":\"asdas\",\"address\":\"asda\",\"lastDentalVisit\":\"asdasd\",\"reason\":\"asd\"},\"medicalHistory\":{\"physician\":\"asd\",\"specialty\":\"asd\",\"clinicAddress\":\"asd\",\"contactNumber\":\"asd\",\"q1\":{\"answ\":\"No\"},\"q2\":{\"answ\":\"No\",\"remarks\":null},\"q3\":{\"answ\":\"No\",\"remarks\":null},\"q4\":{\"answ\":\"No\",\"remarks\":null},\"q5\":{\"answ\":\"No\",\"remarks\":null},\"q6\":{\"answ\":\"No\"},\"q7\":{\"answ\":\"No\"},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}', NULL, '2024-11-25', '8:30 am - 9:30 am', 5, '2024-11-23 08:54:23', '2024-11-26 23:43:21'),
(2, 2, '{\"details\":{\"name\":\"asdas\",\"collegeOffice\":\"asda\",\"reason\":\"asd\"},\"dentalHistory\":{\"previousDentist\":null,\"address\":null,\"lastDentalVisit\":null,\"reason\":null},\"medicalHistory\":{\"physician\":null,\"specialty\":null,\"clinicAddress\":null,\"contactNumber\":null,\"q1\":{\"answ\":null},\"q2\":{\"answ\":null,\"remarks\":null},\"q3\":{\"answ\":null,\"remarks\":null},\"q4\":{\"answ\":null,\"remarks\":null},\"q5\":{\"answ\":null,\"remarks\":null},\"q6\":{\"answ\":null},\"q7\":{\"answ\":null},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}', NULL, '2024-11-29', '8:30 am - 9:30 am', 2, '2024-11-23 10:22:46', '2024-11-26 23:50:54'),
(3, 2, '{\"details\":{\"name\":\"Test\",\"collegeOffice\":\"asdasd\",\"reason\":\"asdasd\"},\"dentalHistory\":{\"previousDentist\":null,\"address\":null,\"lastDentalVisit\":null,\"reason\":null},\"medicalHistory\":{\"physician\":null,\"specialty\":null,\"clinicAddress\":null,\"contactNumber\":null,\"q1\":{\"answ\":\"No\"},\"q2\":{\"answ\":\"No\",\"remarks\":null},\"q3\":{\"answ\":\"No\",\"remarks\":null},\"q4\":{\"answ\":\"No\",\"remarks\":null},\"q5\":{\"answ\":null,\"remarks\":null},\"q6\":{\"answ\":null},\"q7\":{\"answ\":null},\"q8\":{\"answ\":null,\"remarks\":[],\"others\":null},\"q9\":{\"pregnant\":null,\"nursing\":null,\"birthcontrol\":null},\"q10\":{\"answ\":[],\"c1\":[],\"c1others\":null,\"c2cancer\":null,\"c3respiratory\":null,\"c4blood\":null,\"others\":null}},\"vitals\":{\"bloodtype\":null,\"bleedingtime\":null,\"bloodpressure\":null,\"datetaken\":null},\"preconsent\":{\"treatment\":null,\"drugs\":null,\"treatmentPlan\":null,\"radiograph\":null,\"removal\":null,\"periodontal\":null,\"fillings\":null},\"finalconsent\":{\"patient\":null,\"date\":null,\"dentist\":null}}', NULL, '2024-11-26', '8:30 am - 9:30 am', 2, '2024-11-24 23:16:37', '2024-11-26 23:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `badult_leftteeth`
--

CREATE TABLE `badult_leftteeth` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `tooth_38` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_38`)),
  `tooth_37` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_37`)),
  `tooth_36` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_36`)),
  `tooth_35` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_35`)),
  `tooth_34` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_34`)),
  `tooth_33` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_33`)),
  `tooth_32` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_32`)),
  `tooth_31` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_31`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `badult_leftteeth`
--

INSERT INTO `badult_leftteeth` (`id`, `appointment_id`, `tooth_38`, `tooth_37`, `tooth_36`, `tooth_35`, `tooth_34`, `tooth_33`, `tooth_32`, `tooth_31`) VALUES
(1, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(2, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(3, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(4, 3, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(5, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `badult_rightteeth`
--

CREATE TABLE `badult_rightteeth` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `tooth_48` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_48`)),
  `tooth_47` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_47`)),
  `tooth_46` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_46`)),
  `tooth_45` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_45`)),
  `tooth_44` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_44`)),
  `tooth_43` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_43`)),
  `tooth_42` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_42`)),
  `tooth_41` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_41`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `badult_rightteeth`
--

INSERT INTO `badult_rightteeth` (`id`, `appointment_id`, `tooth_48`, `tooth_47`, `tooth_46`, `tooth_45`, `tooth_44`, `tooth_43`, `tooth_42`, `tooth_41`) VALUES
(1, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(2, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(3, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(4, 3, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(5, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `bbaby_leftteeth`
--

CREATE TABLE `bbaby_leftteeth` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `tooth_75` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_75`)),
  `tooth_74` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_74`)),
  `tooth_73` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_73`)),
  `tooth_72` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_72`)),
  `tooth_71` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_71`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bbaby_leftteeth`
--

INSERT INTO `bbaby_leftteeth` (`id`, `appointment_id`, `tooth_75`, `tooth_74`, `tooth_73`, `tooth_72`, `tooth_71`) VALUES
(1, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(2, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(3, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(4, 3, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(5, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `bbaby_rightteeth`
--

CREATE TABLE `bbaby_rightteeth` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `tooth_85` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_85`)),
  `tooth_84` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_84`)),
  `tooth_83` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_83`)),
  `tooth_82` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_82`)),
  `tooth_81` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_81`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bbaby_rightteeth`
--

INSERT INTO `bbaby_rightteeth` (`id`, `appointment_id`, `tooth_85`, `tooth_84`, `tooth_83`, `tooth_82`, `tooth_81`) VALUES
(1, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(2, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(3, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(4, 3, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(5, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `clinical_details`
--

CREATE TABLE `clinical_details` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `firstPage` longtext DEFAULT NULL,
  `services_rendered` longtext DEFAULT NULL,
  `tooth_number` longtext DEFAULT NULL,
  `medicine_prescribed` longtext DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinical_details`
--

INSERT INTO `clinical_details` (`id`, `appointment_id`, `firstPage`, `services_rendered`, `tooth_number`, `medicine_prescribed`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 2, '{\"periodicalScreening\":[],\"occlusion\":[],\"appliances\":[],\"rpd\":null,\"tmd\":[],\"tmdOthers\":null,\"others\":null,\"dateOfExamination1\":null,\"dateOfExamination2\":null,\"dateOfExamination3\":null,\"dateOfExamination4\":null,\"oralHygieneStatus1\":null,\"oralHygieneStatus2\":null,\"oralHygieneStatus3\":null,\"oralHygieneStatus4\":null}', '[{\"id\":1,\"name\":\"Examination\"},{\"id\":16,\"name\":\"Enrollees Examined\"}]', 'asd', 'asd', 'asd', '2024-11-26 14:39:03', '2024-11-26 22:40:23'),
(2, 1, '{\"periodicalScreening\":[],\"occlusion\":[],\"appliances\":[],\"rpd\":null,\"tmd\":[],\"tmdOthers\":null,\"others\":null,\"dateOfExamination1\":null,\"dateOfExamination2\":null,\"dateOfExamination3\":null,\"dateOfExamination4\":null,\"oralHygieneStatus1\":null,\"oralHygieneStatus2\":null,\"oralHygieneStatus3\":null,\"oralHygieneStatus4\":null}', '[]', NULL, NULL, NULL, '2024-11-26 15:42:42', '2024-11-26 23:42:42'),
(4, 3, '{\"periodicalScreening\":[],\"occlusion\":[],\"appliances\":[],\"rpd\":null,\"tmd\":[],\"tmdOthers\":null,\"others\":null,\"dateOfExamination1\":null,\"dateOfExamination2\":null,\"dateOfExamination3\":null,\"dateOfExamination4\":null,\"oralHygieneStatus1\":null,\"oralHygieneStatus2\":null,\"oralHygieneStatus3\":null,\"oralHygieneStatus4\":null}', '[]', NULL, NULL, NULL, '2024-11-26 15:45:34', '2024-11-26 23:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informed_consent`
--

CREATE TABLE `informed_consent` (
  `id` int(11) NOT NULL,
  `user_details_id` int(11) DEFAULT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`details`)),
  `dental_history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dental_history`)),
  `medical_history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`medical_history`)),
  `vitals` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`vitals`)),
  `pre_consent` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`pre_consent`)),
  `final_consent` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`final_consent`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL,
  `action` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `action`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'created user account: 2', NULL, '2024-11-23 08:48:35', '2024-11-23 08:48:35'),
(2, 'created appointment: 1', 1, '2024-11-23 08:54:23', '2024-11-23 08:54:23'),
(3, 'created appointment: 2', 2, '2024-11-23 10:22:46', '2024-11-23 10:22:46'),
(4, 'created appointment: 3', 1, '2024-11-24 23:16:37', '2024-11-24 23:16:37'),
(5, 'created teeth data for apptID: 2', 1, '2024-11-26 14:39:03', '2024-11-26 14:39:03'),
(6, 'updated teeth data for apptID: 2', 1, '2024-11-26 14:39:11', '2024-11-26 14:39:11'),
(7, 'updated teeth data for apptID: 2', 1, '2024-11-26 14:39:13', '2024-11-26 14:39:13'),
(8, 'updated teeth data for apptID: 2', 1, '2024-11-26 14:40:24', '2024-11-26 14:40:24'),
(9, 'created teeth data for apptID: 1', 2, '2024-11-26 15:42:43', '2024-11-26 15:42:43'),
(10, 'created teeth data for apptID: 1', 2, '2024-11-26 15:43:21', '2024-11-26 15:43:21'),
(11, 'created teeth data for apptID: 3', 2, '2024-11-26 15:45:34', '2024-11-26 15:45:34'),
(12, 'created teeth data for apptID: 2', 2, '2024-11-26 15:50:54', '2024-11-26 15:50:54'),
(13, 'created user account: 5', NULL, '2024-11-27 16:49:29', '2024-11-27 16:49:29'),
(14, 'changed the security question of school#: ', 1, '2024-11-28 14:42:30', '2024-11-28 14:42:30'),
(15, 'changed the security question of school#: ', 1, '2024-11-28 14:43:14', '2024-11-28 14:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'my-token', 'e8a5a3ebaf39ac4bf40d316420fbbc26fda95a3e88319b8e6af99c188561a40f', '[\"*\"]', '2024-11-02 07:52:26', NULL, '2024-11-02 07:52:13', '2024-11-02 07:52:26'),
(2, 'App\\Models\\User', 1, 'my-token', '8dafaaeb2a6980deaf3129c5925c4c2f96fda85bf87fd43d95faecfa3edc1032', '[\"*\"]', '2024-11-02 07:52:58', NULL, '2024-11-02 07:52:57', '2024-11-02 07:52:58'),
(3, 'App\\Models\\User', 1, 'my-token', 'c1ba6fec5df2375e73669796a3f115ef0326ff1503e943c535cdbc6f3a953291', '[\"*\"]', '2024-11-22 08:27:47', NULL, '2024-11-22 08:17:22', '2024-11-22 08:27:47'),
(4, 'App\\Models\\User', 1, 'my-token', 'bfa21b5ccd92f69d6de53079b600eec719b2ba2ff0d78884baa0e0345d426465', '[\"*\"]', '2024-11-22 08:48:14', NULL, '2024-11-22 08:29:13', '2024-11-22 08:48:14'),
(5, 'App\\Models\\User', 1, 'my-token', '120c774fe0ba496c0d9429af5c1d939f0ba9874cc79dd2e6d404eb5b7aac7b8f', '[\"*\"]', '2024-11-23 02:45:33', NULL, '2024-11-23 02:20:42', '2024-11-23 02:45:33'),
(6, 'App\\Models\\User', 1, 'my-token', 'b936c14dbf30dcc1ae4f0c7c78afe67eed20221cc47db6dfe1a1b3a7a37a8b54', '[\"*\"]', '2024-11-23 08:10:38', NULL, '2024-11-23 06:40:29', '2024-11-23 08:10:38'),
(7, 'App\\Models\\User', 1, 'my-token', 'fd731c78b1fb8c2e7c41944405f5fde11c1f9fba62a92fcfc33687f182da2037', '[\"*\"]', '2024-11-23 09:54:56', NULL, '2024-11-23 08:49:09', '2024-11-23 09:54:56'),
(8, 'App\\Models\\User', 2, 'my-token', 'c4b60bd9ff7ab61670171d8d6ca786dfcd7b1dbacb86b7f03e7ec6455b6e80c1', '[\"*\"]', '2024-11-23 10:26:00', NULL, '2024-11-23 09:59:11', '2024-11-23 10:26:00'),
(9, 'App\\Models\\User', 1, 'my-token', 'd8243e1567906d30256a04b6e6ae32f6a4f9db1509402a035eb6acfac128532d', '[\"*\"]', '2024-11-24 03:45:21', NULL, '2024-11-24 03:45:20', '2024-11-24 03:45:21'),
(10, 'App\\Models\\User', 1, 'my-token', '500914c60cdbdab65d712ab66403037cc651c30ff79c475273fbe2d68c8c5e63', '[\"*\"]', '2024-11-24 05:39:40', NULL, '2024-11-24 04:13:25', '2024-11-24 05:39:40'),
(11, 'App\\Models\\User', 1, 'my-token', '2dc27c1b6beb86aa2bcc8deab9389a102037fe25a6eb7aac8974ddd77338ffb7', '[\"*\"]', '2024-11-24 06:22:01', NULL, '2024-11-24 06:19:05', '2024-11-24 06:22:01'),
(12, 'App\\Models\\User', 1, 'my-token', '7aaf957e858029c62609219dee566d14128aec75e510887735bef96db86b5985', '[\"*\"]', '2024-11-24 07:03:40', NULL, '2024-11-24 06:48:29', '2024-11-24 07:03:40'),
(13, 'App\\Models\\User', 1, 'my-token', '73952759b750a604d3fe395407cf70737a6ac4f36ef136ed19369fc6aec1d574', '[\"*\"]', '2024-11-24 15:06:08', NULL, '2024-11-24 15:06:06', '2024-11-24 15:06:08'),
(14, 'App\\Models\\User', 1, 'my-token', 'd955584eaa9d2e69f14442b635998a80ce3860b461266db2a846a7da3547a05f', '[\"*\"]', '2024-11-24 15:06:15', NULL, '2024-11-24 15:06:07', '2024-11-24 15:06:15'),
(15, 'App\\Models\\User', 1, 'my-token', 'aaaf6c053a3c4368ee07291e056985b4edfa5c8ff8acec0883680884ae5c63ee', '[\"*\"]', '2024-11-24 23:16:47', NULL, '2024-11-24 23:08:15', '2024-11-24 23:16:47'),
(16, 'App\\Models\\User', 1, 'my-token', '5e4c201172fa6e83fbbb979a314539e668e2563880c891b2a9968f1dbaee312d', '[\"*\"]', '2024-11-25 13:17:09', NULL, '2024-11-25 13:17:06', '2024-11-25 13:17:09'),
(17, 'App\\Models\\User', 1, 'my-token', 'd37661977022d48ce7e44e80c2a9ef6e1f0522be07de44e31e024b2c6b93c279', '[\"*\"]', '2024-11-25 13:17:18', NULL, '2024-11-25 13:17:17', '2024-11-25 13:17:18'),
(18, 'App\\Models\\User', 1, 'my-token', 'da68b9dda7c1898935dd9974e9747ea9f96ef4187ae1613249f565f06a180c71', '[\"*\"]', '2024-11-25 14:15:19', NULL, '2024-11-25 14:10:56', '2024-11-25 14:15:19'),
(19, 'App\\Models\\User', 2, 'my-token', '1f4ade27b3a54e53fa72f62506fc1872a33d2de26fbc58fceebe19ea394de092', '[\"*\"]', '2024-11-25 14:36:29', NULL, '2024-11-25 14:17:32', '2024-11-25 14:36:29'),
(20, 'App\\Models\\User', 1, 'my-token', '65679ab4d2336b0bb64a2f604474682910d8d5ac574a0b1118d5546d59d742c1', '[\"*\"]', '2024-11-25 15:36:38', NULL, '2024-11-25 14:36:42', '2024-11-25 15:36:38'),
(21, 'App\\Models\\User', 1, 'my-token', '1181293b65bd72c17915142ecc01b860e6d9a505ebac24d4683dded70e2d7fc0', '[\"*\"]', '2024-11-25 16:20:40', NULL, '2024-11-25 15:59:11', '2024-11-25 16:20:40'),
(22, 'App\\Models\\User', 1, 'my-token', '7746ee12b8c14df6a16b5f51a0d7f01080680d602f43e0a2ba1bbbbd00f8fdc0', '[\"*\"]', '2024-11-25 16:33:16', NULL, '2024-11-25 16:33:15', '2024-11-25 16:33:16'),
(23, 'App\\Models\\User', 1, 'my-token', '6c42e0e002aa05ebe9d18c59e7c4f145cf46e128fbf818c089beeabbabfc587e', '[\"*\"]', '2024-11-25 17:20:09', NULL, '2024-11-25 16:48:46', '2024-11-25 17:20:09'),
(24, 'App\\Models\\User', 1, 'my-token', '9411f7acded4eb8deb763fd6fdb750f7364a6d880fce55f90f5a36ca1009e1df', '[\"*\"]', '2024-11-25 18:03:04', NULL, '2024-11-25 17:30:44', '2024-11-25 18:03:04'),
(25, 'App\\Models\\User', 1, 'my-token', '7f4f6cc4961252a17020aeb0dbf627d2f5d003fca14bef7db7f0ba3d81d3daea', '[\"*\"]', '2024-11-26 13:39:16', NULL, '2024-11-26 13:15:59', '2024-11-26 13:39:16'),
(26, 'App\\Models\\User', 2, 'my-token', '32babc07f16777e97d1bcf880bcd53f9c0fe81a50343a21ef6687d5f6541318f', '[\"*\"]', '2024-11-26 14:37:53', NULL, '2024-11-26 13:54:14', '2024-11-26 14:37:53'),
(27, 'App\\Models\\User', 1, 'my-token', 'cb0d6fe419212d39386fdea93690d160d8f9b074c175dbf680d37a366c8e4030', '[\"*\"]', '2024-11-26 14:39:14', NULL, '2024-11-26 14:38:27', '2024-11-26 14:39:14'),
(28, 'App\\Models\\User', 2, 'my-token', '72e3be1c102ea63149e5a412b3715723bd006608f1ad03674dd20b49356a54ef', '[\"*\"]', '2024-11-26 14:39:27', NULL, '2024-11-26 14:39:22', '2024-11-26 14:39:27'),
(29, 'App\\Models\\User', 1, 'my-token', 'fd2becd3c775c69dc5ae4fbfccdca564e3ca50d681ae8d3c891810da7045a637', '[\"*\"]', '2024-11-26 14:40:31', NULL, '2024-11-26 14:40:01', '2024-11-26 14:40:31'),
(30, 'App\\Models\\User', 2, 'my-token', 'c11141990df1816919edd17bc34f909f4a449e24602f278b5621838bf57aec31', '[\"*\"]', '2024-11-26 16:29:10', NULL, '2024-11-26 14:40:42', '2024-11-26 16:29:10'),
(31, 'App\\Models\\User', 2, 'my-token', 'a01eeeadd0010065fa8825b33c246124e3044574346e44c6dbd0026dcc2fb5f1', '[\"*\"]', '2024-11-26 16:37:32', NULL, '2024-11-26 16:37:31', '2024-11-26 16:37:32'),
(32, 'App\\Models\\User', 1, 'my-token', '9523ca7b83c2022e903bbc32163d477ac8ae504bd3003f93670b2f70d17fb9b6', '[\"*\"]', '2024-11-26 16:37:50', NULL, '2024-11-26 16:37:42', '2024-11-26 16:37:50'),
(33, 'App\\Models\\User', 1, 'my-token', '507e35368c13ce1ccfa78bfa2474305f8e7e8bbf6eccc52ffd5bb96623f32bd4', '[\"*\"]', '2024-11-26 16:43:18', NULL, '2024-11-26 16:41:49', '2024-11-26 16:43:18'),
(34, 'App\\Models\\User', 2, 'my-token', '8bceaefb0951d534c39a2538131b09108981a05ba3cf6780d911cf9e573dc714', '[\"*\"]', '2024-11-27 13:50:56', NULL, '2024-11-27 13:48:07', '2024-11-27 13:50:56'),
(35, 'App\\Models\\User', 2, 'my-token', '3e6e7a50ac074e275c84674f07f0a59c18b7393e06c38c1c887ffe130e92af9b', '[\"*\"]', '2024-11-27 13:51:06', NULL, '2024-11-27 13:51:05', '2024-11-27 13:51:06'),
(36, 'App\\Models\\User', 2, 'my-token', '02fd35c3761a0c665bde7a81f6c31aea1c6ca1fc5ed711ed0e5cbfea67a58b39', '[\"*\"]', '2024-11-27 14:20:31', NULL, '2024-11-27 13:51:17', '2024-11-27 14:20:31'),
(37, 'App\\Models\\User', 2, 'my-token', '62625293acf95618fd30e8dc1bbf877d04af81ab2568ae91e6848d94c20ec96d', '[\"*\"]', '2024-11-27 16:34:37', NULL, '2024-11-27 16:22:38', '2024-11-27 16:34:37'),
(38, 'App\\Models\\User', 1, 'my-token', '702770f9bab1dada996db09014844279ae7c235040450fe5a9ea215fe0a45b49', '[\"*\"]', '2024-11-27 16:55:14', '2024-11-27 17:53:39', '2024-11-27 16:53:39', '2024-11-27 16:55:14'),
(39, 'App\\Models\\User', 1, 'my-token', '0d29504193c2c1045975b80b438aced685e86c28357647d31299cef97749b368', '[\"*\"]', '2024-11-27 17:04:18', '2024-11-27 17:55:22', '2024-11-27 16:55:22', '2024-11-27 17:04:18'),
(40, 'App\\Models\\User', 1, 'my-token', '4c61c0791d16546335444c3ec04d3ce3f4e4e8620a56b9d5786dd1b686382eee', '[\"*\"]', '2024-11-28 13:17:11', '2024-11-28 13:53:58', '2024-11-28 12:53:58', '2024-11-28 13:17:11'),
(41, 'App\\Models\\User', 1, 'my-token', '7257a1dfdb5721847d0ceadac6509b049598d7e06ce4c9cc8ded28f8ca34e0bd', '[\"*\"]', '2024-11-28 13:26:53', '2024-11-28 14:26:25', '2024-11-28 13:26:25', '2024-11-28 13:26:53'),
(42, 'App\\Models\\User', 1, 'my-token', '6881df5dc52df75e6618347ae07c3127ed0e52f3fa25599712dd4fe2d3a009a9', '[\"*\"]', '2024-11-28 14:13:02', '2024-11-28 15:12:00', '2024-11-28 14:12:00', '2024-11-28 14:13:02'),
(43, 'App\\Models\\User', 1, 'my-token', '05fe96eae4b682a336810550a26fefa5a6d1a2edbe3be89147c5e90254c72655', '[\"*\"]', '2024-11-28 14:14:37', '2024-11-28 15:14:36', '2024-11-28 14:14:36', '2024-11-28 14:14:37'),
(44, 'App\\Models\\User', 2, 'my-token', '07646948f42171497137aa79314304324d06a90116de21ec71e3264ff79dbfce', '[\"*\"]', '2024-11-28 14:15:08', '2024-11-28 15:15:07', '2024-11-28 14:15:07', '2024-11-28 14:15:08'),
(45, 'App\\Models\\User', 1, 'my-token', 'eeb13589feb128198f3f407fccc00231dca8a313c13886bb58d33d3ca214670a', '[\"*\"]', '2024-11-28 14:44:39', '2024-11-28 15:15:22', '2024-11-28 14:15:22', '2024-11-28 14:44:39'),
(46, 'App\\Models\\User', 1, 'my-token', 'f471aed2257562ee93dc9d91894b6b567483115ee4d32ead1fc18818d17b834f', '[\"*\"]', '2024-11-28 15:18:13', '2024-11-28 15:53:29', '2024-11-28 14:53:29', '2024-11-28 15:18:13'),
(47, 'App\\Models\\User', 1, 'my-token', 'cfc46c941bed44bd724cd0012bd3e99007d83b339782a2e047c3c2b10a40b2a8', '[\"*\"]', '2024-11-28 15:36:37', '2024-11-28 16:18:22', '2024-11-28 15:18:22', '2024-11-28 15:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `security_questions_lib`
--

CREATE TABLE `security_questions_lib` (
  `id` int(11) NOT NULL,
  `item` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security_questions_lib`
--

INSERT INTO `security_questions_lib` (`id`, `item`, `created_at`, `updated_at`) VALUES
(1, 'What is your grandfather\'s last name?', NULL, NULL),
(2, 'What is your favorite snack?', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tadult_leftteeth`
--

CREATE TABLE `tadult_leftteeth` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `tooth_21` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_21`)),
  `tooth_22` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_22`)),
  `tooth_23` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_23`)),
  `tooth_24` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_24`)),
  `tooth_25` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_25`)),
  `tooth_26` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_26`)),
  `tooth_27` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_27`)),
  `tooth_28` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_28`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tadult_leftteeth`
--

INSERT INTO `tadult_leftteeth` (`id`, `appointment_id`, `tooth_21`, `tooth_22`, `tooth_23`, `tooth_24`, `tooth_25`, `tooth_26`, `tooth_27`, `tooth_28`) VALUES
(1, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(2, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(3, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(4, 3, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(5, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `tadult_rightteeth`
--

CREATE TABLE `tadult_rightteeth` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `tooth_18` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_18`)),
  `tooth_17` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_17`)),
  `tooth_16` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_16`)),
  `tooth_15` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_15`)),
  `tooth_14` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_14`)),
  `tooth_13` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_13`)),
  `tooth_12` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_12`)),
  `tooth_11` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_11`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tadult_rightteeth`
--

INSERT INTO `tadult_rightteeth` (`id`, `appointment_id`, `tooth_18`, `tooth_17`, `tooth_16`, `tooth_15`, `tooth_14`, `tooth_13`, `tooth_12`, `tooth_11`) VALUES
(1, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(2, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(3, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(4, 3, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(5, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `tbaby_leftteeth`
--

CREATE TABLE `tbaby_leftteeth` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `tooth_61` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_61`)),
  `tooth_62` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_62`)),
  `tooth_63` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_63`)),
  `tooth_64` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_64`)),
  `tooth_65` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_65`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbaby_leftteeth`
--

INSERT INTO `tbaby_leftteeth` (`id`, `appointment_id`, `tooth_61`, `tooth_62`, `tooth_63`, `tooth_64`, `tooth_65`) VALUES
(1, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(2, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(3, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(4, 3, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(5, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `tbaby_rightteeth`
--

CREATE TABLE `tbaby_rightteeth` (
  `id` bigint(20) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `tooth_55` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_55`)),
  `tooth_54` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_54`)),
  `tooth_53` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_53`)),
  `tooth_52` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_52`)),
  `tooth_51` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tooth_51`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbaby_rightteeth`
--

INSERT INTO `tbaby_rightteeth` (`id`, `appointment_id`, `tooth_55`, `tooth_54`, `tooth_53`, `tooth_52`, `tooth_51`) VALUES
(1, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(2, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(3, 1, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(4, 3, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}'),
(5, 2, '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}', '{\"topBox\":null,\"botBox\":null,\"class\":[\"top:white\",\"left:white\",\"right:white\",\"center:white\",\"bottom:white\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id_number` varchar(45) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `security_question` int(11) DEFAULT NULL,
  `security_answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `school_id_number`, `user_type`, `email`, `email_verified_at`, `password`, `remember_token`, `security_question`, `security_answer`, `status`, `created_at`, `updated_at`) VALUES
(1, '11824', 'admin', 'admin@gmail.com', NULL, '$2y$12$07DhnSCZMVuN8SWFExPF..k8RovtObiLDAezt5.b8cF1V4IhDWWN2', NULL, NULL, NULL, 1, '2024-11-02 07:51:32', '2024-11-02 07:51:32'),
(2, '1803214', 'patient', 'lexgdixon21@gmail.com', NULL, '$2y$12$v/5qq2v0ASwqg9itPA591ehWKnNL5qEy1iE/HlJc8.FB7CfP2pdoy', NULL, 1, '$2y$12$PeqsAQht3v.7HQXiJT9BcuYS87CuqxnJPGGM7flTy21PJ7A0rqSE6', 1, '2024-11-23 08:48:35', '2024-11-23 08:48:35'),
(5, '1234567', 'patient', 'test@gmail.com', NULL, '$2y$12$cKW1xjFjydYgeOY4TKh6G.WoRUV43bLXc2L.QnRJHWdANkJBCp/si', NULL, 1, '$2y$12$LGvAgh4QoFczU/RWMmUs0eXiBqMc4q7KfJCKf9sA0Ezvm1Zx7w5i6', 1, '2024-11-27 16:49:29', '2024-11-27 16:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id_number` varchar(45) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `employee_student_type` varchar(45) DEFAULT NULL,
  `employment_classification` int(11) DEFAULT NULL,
  `office_level` varchar(45) DEFAULT NULL,
  `department_program` varchar(45) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `civil_status` int(11) DEFAULT NULL,
  `guardian` varchar(45) DEFAULT NULL,
  `guardian_no` varchar(45) DEFAULT NULL,
  `permanent_address` varchar(45) DEFAULT NULL,
  `bsu_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `school_id_number`, `firstname`, `lastname`, `middlename`, `type`, `employee_student_type`, `employment_classification`, `office_level`, `department_program`, `sex`, `age`, `birthday`, `email`, `contact_no`, `civil_status`, `guardian`, `guardian_no`, `permanent_address`, `bsu_address`, `created_at`, `updated_at`) VALUES
(1, 1, '11824', 'Admin', 'Admin', 'Admin', '1', 'test', NULL, 'test', 'test', 'Male', 0, NULL, 'admin@gmail.com', '0000', 0, '0', '0', '0', '0', '2024-11-02 07:51:32', '2024-11-02 15:51:32'),
(2, 2, '1803214', 'Lex', 'Dixon', 'G', '2', '1', NULL, '25', 'BSIT', 'Male', 24, NULL, 'lexgdixon21@gmail.com', '09480759938', 1, 'Test', '09204542229', 'Buyagan LTB', 'Buyagan LTB', '2024-11-23 08:48:35', '2024-11-23 16:48:35'),
(3, 5, '1234567', 'Test', 'Test', 'Test', '2', '1', 1, '1', 'Test', 'Male', 26, NULL, 'test@gmail.com', '01231231231', 1, 'test', '01231231234', 'test', 'test', '2024-11-27 16:49:29', '2024-11-28 00:49:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badult_leftteeth`
--
ALTER TABLE `badult_leftteeth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badult_rightteeth`
--
ALTER TABLE `badult_rightteeth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bbaby_leftteeth`
--
ALTER TABLE `bbaby_leftteeth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bbaby_rightteeth`
--
ALTER TABLE `bbaby_rightteeth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinical_details`
--
ALTER TABLE `clinical_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informed_consent`
--
ALTER TABLE `informed_consent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `security_questions_lib`
--
ALTER TABLE `security_questions_lib`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tadult_leftteeth`
--
ALTER TABLE `tadult_leftteeth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tadult_rightteeth`
--
ALTER TABLE `tadult_rightteeth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbaby_leftteeth`
--
ALTER TABLE `tbaby_leftteeth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbaby_rightteeth`
--
ALTER TABLE `tbaby_rightteeth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_id_number_UNIQUE` (`school_id_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `badult_leftteeth`
--
ALTER TABLE `badult_leftteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `badult_rightteeth`
--
ALTER TABLE `badult_rightteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bbaby_leftteeth`
--
ALTER TABLE `bbaby_leftteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bbaby_rightteeth`
--
ALTER TABLE `bbaby_rightteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clinical_details`
--
ALTER TABLE `clinical_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informed_consent`
--
ALTER TABLE `informed_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `security_questions_lib`
--
ALTER TABLE `security_questions_lib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tadult_leftteeth`
--
ALTER TABLE `tadult_leftteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tadult_rightteeth`
--
ALTER TABLE `tadult_rightteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbaby_leftteeth`
--
ALTER TABLE `tbaby_leftteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbaby_rightteeth`
--
ALTER TABLE `tbaby_rightteeth`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
