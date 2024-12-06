-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 04:06 AM
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
  `age` int(11) DEFAULT NULL,
  `consent_form` longtext DEFAULT NULL,
  `enccode` longtext DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `pending_accounts`
--

CREATE TABLE `pending_accounts` (
  `id` int(11) NOT NULL,
  `details` longtext NOT NULL,
  `file_path` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_accounts`
--

INSERT INTO `pending_accounts` (`id`, `details`, `file_path`, `status`) VALUES
(39, '{\"school_id_number\":\"8971249\",\"password\":\"password\",\"firstname\":\"kasdlkajsdl\",\"lastname\":\"kljalskdjal\",\"middlename\":\"lkasdlasjd\",\"birthday\":null,\"user_type\":\"patient\",\"type\":2,\"employee_student_type\":1,\"employment_classification\":1,\"office_level\":1,\"department_program\":\"laksdjlj\",\"sex\":\"Male\",\"email\":\"kljaslkdj@gmail.com\",\"contact_no\":\"08979182749\",\"civil_status\":1,\"guardian\":null,\"guardian_no\":\"08712983471\",\"permanent_address\":\"asdasdkjh\",\"bsu_address\":\"kjasdkjashdkh\",\"updated_at\":null,\"created_at\":null,\"age\":\"25\",\"security_answer\":\"Test\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/2f6aa5e2-0d03-4d49-832a-736a60965081\"},\"guardian_firstname\":\"kjhaskdhask\",\"guardian_middlename\":\"kjahsdkhasdh\",\"guardian_lastname\":\"jkahsdkhaskdjh\"}', 'uploads/1733446244.png', NULL),
(40, '{\"school_id_number\":\"1892579\",\"password\":\"password\",\"firstname\":\"asd\",\"lastname\":\"asd\",\"middlename\":\"asd\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"employment_classification\":null,\"office_level\":\"asd\",\"department_program\":\"asd\",\"sex\":\"Male\",\"email\":\"akdlfjhgklj@gmail.com\",\"contact_no\":\"08127591729\",\"civil_status\":1,\"guardian\":null,\"guardian_no\":\"08917258971\",\"permanent_address\":\"kajsdklajd\",\"bsu_address\":\"klasdlkajsd\",\"updated_at\":null,\"created_at\":null,\"age\":\"24\",\"security_answer\":\"asdasd\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/c68727a2-15c7-4273-a6a5-c88911979497\"},\"guardian_firstname\":\"asdkajlshdkj\",\"guardian_middlename\":\"kjashdkjahsd\",\"guardian_lastname\":\"klasdkljasdj\"}', 'uploads/1733448448.png', NULL),
(41, '{\"school_id_number\":\"1892579\",\"password\":\"password\",\"firstname\":\"asd\",\"lastname\":\"asd\",\"middlename\":\"asd\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"employment_classification\":null,\"office_level\":\"asd\",\"department_program\":\"asd\",\"sex\":\"Male\",\"email\":\"akdlfjhgklj@gmail.com\",\"contact_no\":\"08127591729\",\"civil_status\":1,\"guardian\":null,\"guardian_no\":\"08917258971\",\"permanent_address\":\"kajsdklajd\",\"bsu_address\":\"klasdlkajsd\",\"updated_at\":null,\"created_at\":null,\"age\":\"24\",\"security_answer\":\"asdasd\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/36089d3a-50df-4f43-a896-981e935feebf\"},\"guardian_firstname\":\"asdkajlshdkj\",\"guardian_middlename\":\"kjashdkjahsd\",\"guardian_lastname\":\"klasdkljasdj\"}', 'uploads/1733448470.png', NULL),
(42, '{\"school_id_number\":\"1892579\",\"password\":\"password\",\"firstname\":\"asd\",\"lastname\":\"asd\",\"middlename\":\"asd\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"employment_classification\":null,\"office_level\":\"asd\",\"department_program\":\"asd\",\"sex\":\"Male\",\"email\":\"akdlfjhgklj@gmail.com\",\"contact_no\":\"08127591729\",\"civil_status\":1,\"guardian\":null,\"guardian_no\":\"08917258971\",\"permanent_address\":\"kajsdklajd\",\"bsu_address\":\"klasdlkajsd\",\"updated_at\":null,\"created_at\":null,\"age\":\"24\",\"security_answer\":\"asdasd\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/7b6d0665-12dc-4219-ab48-969b0ad8d61d\"},\"guardian_firstname\":\"asdkajlshdkj\",\"guardian_middlename\":\"kjashdkjahsd\",\"guardian_lastname\":\"klasdkljasdj\"}', 'uploads/1733448492.png', NULL),
(43, '{\"school_id_number\":\"8126348\",\"password\":\"password\",\"firstname\":\"kjahskdhak\",\"lastname\":\"kjahsdkahk\",\"middlename\":\"kjhaksjdhk\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"office_level\":\"asdaksjdhk\",\"department_program\":\"ajkshdkjashdk\",\"sex\":\"Male\",\"email\":\"hkjhdagksmdnnbgmn@gmail.com\",\"contact_no\":\"08172481729\",\"civil_status\":1,\"guardian_firstname\":\"klasjflkajsdl\",\"guardian_middlename\":\"klasjdlkj\",\"guardian_lastname\":\"lkajsldkajsldj\",\"guardian_no\":\"06871265478\",\"permanent_address\":\"klasjflk\",\"bsu_address\":\"aklsjflkj\",\"updated_at\":null,\"created_at\":null,\"age\":\"525\",\"security_answer\":\"jalskdjalksdj\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/16b40f88-2d41-46bc-857f-b3216ec281e4\"}}', 'uploads/1733448609.png', NULL),
(44, '{\"school_id_number\":\"8126348\",\"password\":\"password\",\"firstname\":\"kjahskdhak\",\"lastname\":\"kjahsdkahk\",\"middlename\":\"kjhaksjdhk\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"office_level\":\"asdaksjdhk\",\"department_program\":\"ajkshdkjashdk\",\"sex\":\"Male\",\"email\":\"hkjhdagksmdnnbgmn@gmail.com\",\"contact_no\":\"08172481729\",\"civil_status\":1,\"guardian_firstname\":\"klasjflkajsdl\",\"guardian_middlename\":\"klasjdlkj\",\"guardian_lastname\":\"lkajsldkajsldj\",\"guardian_no\":\"06871265478\",\"permanent_address\":\"klasjflk\",\"bsu_address\":\"aklsjflkj\",\"updated_at\":null,\"created_at\":null,\"age\":\"525\",\"security_answer\":\"jalskdjalksdj\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/0927aae6-4ee4-43f4-8109-9b751687f3a6\"}}', 'uploads/1733448952.png', NULL),
(45, '{\"school_id_number\":\"8126348\",\"password\":\"password\",\"firstname\":\"kjahskdhak\",\"lastname\":\"kjahsdkahk\",\"middlename\":\"kjhaksjdhk\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"office_level\":\"asdaksjdhk\",\"department_program\":\"ajkshdkjashdk\",\"sex\":\"Male\",\"email\":\"hkjhdagksmdnnbgmn@gmail.com\",\"contact_no\":\"08172481729\",\"civil_status\":1,\"guardian_firstname\":\"klasjflkajsdl\",\"guardian_middlename\":\"klasjdlkj\",\"guardian_lastname\":\"lkajsldkajsldj\",\"guardian_no\":\"06871265478\",\"permanent_address\":\"klasjflk\",\"bsu_address\":\"aklsjflkj\",\"updated_at\":null,\"created_at\":null,\"age\":\"525\",\"security_answer\":\"jalskdjalksdj\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/b4baa526-3683-4e9b-a5a2-54bdfd9ab9cb\"}}', 'uploads/1733449685.png', NULL),
(46, '{\"school_id_number\":\"8126348\",\"password\":\"password\",\"firstname\":\"kjahskdhak\",\"lastname\":\"kjahsdkahk\",\"middlename\":\"kjhaksjdhk\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"office_level\":\"asdaksjdhk\",\"department_program\":\"ajkshdkjashdk\",\"sex\":\"Male\",\"email\":\"hkjhdagksmdnnbgmn@gmail.com\",\"contact_no\":\"08172481729\",\"civil_status\":1,\"guardian_firstname\":\"klasjflkajsdl\",\"guardian_middlename\":\"klasjdlkj\",\"guardian_lastname\":\"lkajsldkajsldj\",\"guardian_no\":\"06871265478\",\"permanent_address\":\"klasjflk\",\"bsu_address\":\"aklsjflkj\",\"updated_at\":null,\"created_at\":null,\"age\":\"525\",\"security_answer\":\"jalskdjalksdj\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/912d3cdf-02d1-4630-a8a1-7ce7948b2de1\"}}', 'uploads/1733450075.png', NULL),
(47, '{\"school_id_number\":\"8126348\",\"password\":\"password\",\"firstname\":\"kjahskdhak\",\"lastname\":\"kjahsdkahk\",\"middlename\":\"kjhaksjdhk\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"office_level\":\"asdaksjdhk\",\"department_program\":\"ajkshdkjashdk\",\"sex\":\"Male\",\"email\":\"hkjhdagksmdnnbgmn@gmail.com\",\"contact_no\":\"08172481729\",\"civil_status\":1,\"guardian_firstname\":\"klasjflkajsdl\",\"guardian_middlename\":\"klasjdlkj\",\"guardian_lastname\":\"lkajsldkajsldj\",\"guardian_no\":\"06871265478\",\"permanent_address\":\"klasjflk\",\"bsu_address\":\"aklsjflkj\",\"updated_at\":null,\"created_at\":null,\"age\":\"525\",\"security_answer\":\"jalskdjalksdj\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/60d65b9e-4a9a-4b28-8933-00e871bbd8f3\"}}', 'uploads/1733450102.png', NULL),
(48, '{\"school_id_number\":\"8126348\",\"password\":\"password\",\"firstname\":\"kjahskdhak\",\"lastname\":\"kjahsdkahk\",\"middlename\":\"kjhaksjdhk\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"office_level\":\"asdaksjdhk\",\"department_program\":\"ajkshdkjashdk\",\"sex\":\"Male\",\"email\":\"hkjhdagksmdnnbgmn@gmail.com\",\"contact_no\":\"08172481729\",\"civil_status\":1,\"guardian_firstname\":\"klasjflkajsdl\",\"guardian_middlename\":\"klasjdlkj\",\"guardian_lastname\":\"lkajsldkajsldj\",\"guardian_no\":\"06871265478\",\"permanent_address\":\"klasjflk\",\"bsu_address\":\"aklsjflkj\",\"updated_at\":null,\"created_at\":null,\"age\":\"525\",\"security_answer\":\"jalskdjalksdj\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/60d65b9e-4a9a-4b28-8933-00e871bbd8f3\"}}', 'uploads/1733450153.png', NULL),
(49, '{\"school_id_number\":\"8126348\",\"password\":\"password\",\"firstname\":\"kjahskdhak\",\"lastname\":\"kjahsdkahk\",\"middlename\":\"kjhaksjdhk\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"office_level\":\"asdaksjdhk\",\"department_program\":\"ajkshdkjashdk\",\"sex\":\"Male\",\"email\":\"hkjhdagksmdnnbgmn@gmail.com\",\"contact_no\":\"08172481729\",\"civil_status\":1,\"guardian_firstname\":\"klasjflkajsdl\",\"guardian_middlename\":\"klasjdlkj\",\"guardian_lastname\":\"lkajsldkajsldj\",\"guardian_no\":\"06871265478\",\"permanent_address\":\"klasjflk\",\"bsu_address\":\"aklsjflkj\",\"updated_at\":null,\"created_at\":null,\"age\":\"525\",\"security_answer\":\"jalskdjalksdj\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/b82c31e2-9809-4fa5-92c1-8acf79cc4e92\"}}', 'uploads/1733450273.png', NULL),
(50, '{\"school_id_number\":\"8126348\",\"password\":\"password\",\"firstname\":\"kjahskdhak\",\"lastname\":\"kjahsdkahk\",\"middlename\":\"kjhaksjdhk\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"office_level\":\"asdaksjdhk\",\"department_program\":\"ajkshdkjashdk\",\"sex\":\"Male\",\"email\":\"hkjhdagksmdnnbgmn@gmail.com\",\"contact_no\":\"08172481729\",\"civil_status\":1,\"guardian_firstname\":\"klasjflkajsdl\",\"guardian_middlename\":\"klasjdlkj\",\"guardian_lastname\":\"lkajsldkajsldj\",\"guardian_no\":\"06871265478\",\"permanent_address\":\"klasjflk\",\"bsu_address\":\"aklsjflkj\",\"updated_at\":null,\"created_at\":null,\"age\":\"525\",\"security_answer\":\"jalskdjalksdj\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/b82c31e2-9809-4fa5-92c1-8acf79cc4e92\"}}', 'uploads/1733450293.png', NULL),
(51, '{\"school_id_number\":\"8126348\",\"password\":\"password\",\"firstname\":\"kjahskdhak\",\"lastname\":\"kjahsdkahk\",\"middlename\":\"kjhaksjdhk\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"office_level\":\"asdaksjdhk\",\"department_program\":\"ajkshdkjashdk\",\"sex\":\"Male\",\"email\":\"hkjhdagksmdnnbgmn@gmail.com\",\"contact_no\":\"08172481729\",\"civil_status\":1,\"guardian_firstname\":\"klasjflkajsdl\",\"guardian_middlename\":\"klasjdlkj\",\"guardian_lastname\":\"lkajsldkajsldj\",\"guardian_no\":\"06871265478\",\"permanent_address\":\"klasjflk\",\"bsu_address\":\"aklsjflkj\",\"updated_at\":null,\"created_at\":null,\"age\":\"525\",\"security_answer\":\"jalskdjalksdj\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/317d7750-7685-443f-bb9d-b1ae292b10d7\"}}', 'uploads/1733450309.png', NULL),
(52, '{\"school_id_number\":\"8126348\",\"password\":\"password\",\"firstname\":\"kjahskdhak\",\"lastname\":\"kjahsdkahk\",\"middlename\":\"kjhaksjdhk\",\"birthday\":null,\"user_type\":\"patient\",\"type\":1,\"employee_student_type\":4,\"office_level\":\"asdaksjdhk\",\"department_program\":\"ajkshdkjashdk\",\"sex\":\"Male\",\"email\":\"hkjhdagksmdnnbgmn@gmail.com\",\"contact_no\":\"08172481729\",\"civil_status\":1,\"guardian_firstname\":\"klasjflkajsdl\",\"guardian_middlename\":\"klasjdlkj\",\"guardian_lastname\":\"lkajsldkajsldj\",\"guardian_no\":\"06871265478\",\"permanent_address\":\"klasjflk\",\"bsu_address\":\"aklsjflkj\",\"updated_at\":null,\"created_at\":null,\"age\":\"525\",\"security_answer\":\"jalskdjalksdj\",\"security_question\":1,\"file\":{\"objectURL\":\"blob:http://localhost:5173/42f59b6b-cdcd-4059-a24b-46378c3f0423\"}}', 'uploads/1733450962.png', NULL);

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
(47, 'App\\Models\\User', 1, 'my-token', 'cfc46c941bed44bd724cd0012bd3e99007d83b339782a2e047c3c2b10a40b2a8', '[\"*\"]', '2024-11-28 15:36:37', '2024-11-28 16:18:22', '2024-11-28 15:18:22', '2024-11-28 15:36:37'),
(48, 'App\\Models\\User', 1, 'my-token', '8f03acf0506a6b114a80e51f9293e579cb23ebd4d4d7e89afd1c638b8717ea33', '[\"*\"]', '2024-11-30 14:16:40', '2024-11-30 15:06:50', '2024-11-30 14:06:50', '2024-11-30 14:16:40'),
(49, 'App\\Models\\User', 1, 'my-token', '2e207f4d06ff1d2dfe76ab167d1de294485ea828f230eb15ff7ba49faacfa4f6', '[\"*\"]', '2024-11-30 15:09:26', '2024-11-30 15:49:10', '2024-11-30 14:49:10', '2024-11-30 15:09:26'),
(50, 'App\\Models\\User', 1, 'my-token', '71ef7e2ccce029b1039c09378d5e7ef8a76b61a5138e659d7ef3300de1be14fb', '[\"*\"]', '2024-12-01 13:27:24', '2024-12-01 14:27:15', '2024-12-01 13:27:15', '2024-12-01 13:27:24'),
(51, 'App\\Models\\User', 2, 'my-token', '5aa4aefd3fd73947bc3ee271b17a7304b2e4556c1d68dd75384ee2865d819a67', '[\"*\"]', '2024-12-01 13:34:22', '2024-12-01 14:33:52', '2024-12-01 13:33:52', '2024-12-01 13:34:22'),
(52, 'App\\Models\\User', 1, 'my-token', 'cc976eb6ddf0e5bed907d847daeb069007c778756fb93042087c2ed7d3cd2046', '[\"*\"]', '2024-12-01 13:58:59', '2024-12-01 14:34:43', '2024-12-01 13:34:43', '2024-12-01 13:58:59'),
(53, 'App\\Models\\User', 1, 'my-token', '7d6c3dd1029619e525ce0719ccade7c8c24d84e8363cfa289d86ae62c263a3c3', '[\"*\"]', '2024-12-01 14:53:27', '2024-12-01 15:24:33', '2024-12-01 14:24:33', '2024-12-01 14:53:27'),
(54, 'App\\Models\\User', 2, 'my-token', 'dd1f70dd6cb3bf7386f7aae6b77e86d93071c2dfd8fda91114d38e9895582d77', '[\"*\"]', '2024-12-01 14:53:37', '2024-12-01 15:53:35', '2024-12-01 14:53:35', '2024-12-01 14:53:37'),
(55, 'App\\Models\\User', 1, 'my-token', '5b7af684f79c05400a0a3a2b703c88186c869822a744296948166a994a215e01', '[\"*\"]', '2024-12-01 15:16:08', '2024-12-01 15:53:49', '2024-12-01 14:53:49', '2024-12-01 15:16:08'),
(56, 'App\\Models\\User', 2, 'my-token', 'd8d94fe42e3bbb3f35ddfe8c4da5394a4c822161d5cdca6c97720dc732843e37', '[\"*\"]', '2024-12-01 15:00:04', '2024-12-01 16:00:02', '2024-12-01 15:00:02', '2024-12-01 15:00:04'),
(57, 'App\\Models\\User', 1, 'my-token', 'cc461581eb3351097398b9575f1d47bc3bd56d7e651b56f8e2aa28af76607252', '[\"*\"]', '2024-12-02 13:07:49', '2024-12-02 14:01:45', '2024-12-02 13:01:46', '2024-12-02 13:07:49'),
(58, 'App\\Models\\User', 1, 'my-token', 'e92761b4455c08ef30e310997bcf92132def1b08b8792cb00db41f60f8cefcaa', '[\"*\"]', '2024-12-02 14:01:25', '2024-12-02 14:34:39', '2024-12-02 13:34:39', '2024-12-02 14:01:25'),
(59, 'App\\Models\\User', 1, 'my-token', '00e39cbd8bdc508e5747cbbf4b7429b5218205398528c3f31f5224015e50a396', '[\"*\"]', '2024-12-02 14:22:47', '2024-12-02 15:05:03', '2024-12-02 14:05:03', '2024-12-02 14:22:47'),
(60, 'App\\Models\\User', 2, 'my-token', 'a1077fd93526da71c07ec0be74d0d549be985fc3fe31637dc96b2dffa064e966', '[\"*\"]', '2024-12-02 14:26:05', '2024-12-02 15:26:04', '2024-12-02 14:26:04', '2024-12-02 14:26:05'),
(61, 'App\\Models\\User', 1, 'my-token', 'baf7ee96947d1c81cda2b1b83eea78702ac9a9391d8a524dc1f935c4f8a7143c', '[\"*\"]', '2024-12-02 14:45:02', '2024-12-02 15:26:13', '2024-12-02 14:26:13', '2024-12-02 14:45:02'),
(62, 'App\\Models\\User', 1, 'my-token', '0a344ad8acbb2c61f6cb5149a698c3c06730304f64bd756ea52a2cb8c20bc77e', '[\"*\"]', '2024-12-02 15:26:52', '2024-12-02 16:14:31', '2024-12-02 15:14:31', '2024-12-02 15:26:52'),
(63, 'App\\Models\\User', 1, 'my-token', '0f06949ec4bd0d49ee060b30a3ec358d3f040869d8a874a2011b3ff9987a9de4', '[\"*\"]', '2024-12-02 15:35:07', '2024-12-02 16:27:10', '2024-12-02 15:27:10', '2024-12-02 15:35:07'),
(64, 'App\\Models\\User', 1, 'my-token', 'c6b26d06d037cf4a10f895f476e0b1868436038468acd1b6eacaeb317ba76f55', '[\"*\"]', '2024-12-02 15:39:17', '2024-12-02 16:35:36', '2024-12-02 15:35:36', '2024-12-02 15:39:17'),
(65, 'App\\Models\\User', 1, 'my-token', '465b911df51f6482e5f5a5d635b3cdab1ea43c7a26e7daf49c72e91153334b32', '[\"*\"]', '2024-12-02 16:13:44', '2024-12-02 16:44:20', '2024-12-02 15:44:20', '2024-12-02 16:13:44'),
(66, 'App\\Models\\User', 1, 'my-token', '7db94e08f5b8c09e404c63d9eb61e8a56efb904e1a142f978fb80ca680f1b0cb', '[\"*\"]', '2024-12-02 16:39:47', '2024-12-02 17:19:11', '2024-12-02 16:19:11', '2024-12-02 16:39:47'),
(67, 'App\\Models\\User', 1, 'my-token', '4bd599664413e0c624c2c1ccd7f34137cb50ee6e5893113a21fe2d11cd7a59b3', '[\"*\"]', '2024-12-02 16:48:52', '2024-12-02 17:42:25', '2024-12-02 16:42:25', '2024-12-02 16:48:52'),
(68, 'App\\Models\\User', 1, 'my-token', '1f22368b468cd04a4ced48d612ebf7a56d98b4efd236b25a41bd661dd70256ea', '[\"*\"]', '2024-12-03 13:48:22', '2024-12-03 14:47:47', '2024-12-03 13:47:48', '2024-12-03 13:48:22'),
(69, 'App\\Models\\User', 1, 'my-token', '4cd43646d389eda97fbd619f36e09750e9eae430828778cc5d9590f3302e46ea', '[\"*\"]', '2024-12-03 15:01:48', '2024-12-03 15:33:04', '2024-12-03 14:33:04', '2024-12-03 15:01:48'),
(70, 'App\\Models\\User', 2, 'my-token', '8b87e8532b6a7e55f82523793e669a248a0b8cd411df6813971bd3cbeddc83e0', '[\"*\"]', '2024-12-03 15:31:20', '2024-12-03 16:23:07', '2024-12-03 15:23:07', '2024-12-03 15:31:20'),
(71, 'App\\Models\\User', 1, 'my-token', '8bd2537e59a8d2920151fcfbfe6397e0f4c21385ca8ee8d2fe507fe7506f12cf', '[\"*\"]', '2024-12-03 15:33:09', '2024-12-03 16:31:29', '2024-12-03 15:31:29', '2024-12-03 15:33:09'),
(72, 'App\\Models\\User', 1, 'my-token', '8ff7a8f702545594fabec860e6fde787b8b11fe17e0f3b5334799eeb0427cfdc', '[\"*\"]', '2024-12-03 16:38:20', '2024-12-03 17:36:41', '2024-12-03 16:36:41', '2024-12-03 16:38:20'),
(73, 'App\\Models\\User', 1, 'my-token', '3b9b0f181f004118bd527d083bc40f267271f7e98bf31dca8780cacee1f70f5e', '[\"*\"]', '2024-12-03 16:52:16', '2024-12-03 17:52:08', '2024-12-03 16:52:09', '2024-12-03 16:52:16'),
(74, 'App\\Models\\User', 1, 'my-token', '8742dba134322465023dca1f138724b1843be0185beef337c7f0fc833411eca4', '[\"*\"]', '2024-12-03 17:23:03', '2024-12-03 18:11:48', '2024-12-03 17:11:49', '2024-12-03 17:23:03'),
(75, 'App\\Models\\User', 1, 'my-token', 'fe282bac42d88d7bd30cdaa46ac919a53e28eea31863e5de809da362fd3b72aa', '[\"*\"]', '2024-12-03 17:50:44', '2024-12-03 18:34:35', '2024-12-03 17:34:35', '2024-12-03 17:50:44'),
(76, 'App\\Models\\User', 1, 'my-token', '9015b5ffe323f46628250745662b526e296ededefb0e7c01ddcabf2835ad5207', '[\"*\"]', '2024-12-03 19:15:58', '2024-12-03 19:52:04', '2024-12-03 18:52:04', '2024-12-03 19:15:58'),
(77, 'App\\Models\\User', 1, 'my-token', 'c395b039bf56f1994687aa8718e18ea809b919f15fcc46b19f645684a8a9c638', '[\"*\"]', '2024-12-03 20:28:10', '2024-12-03 21:28:09', '2024-12-03 20:28:09', '2024-12-03 20:28:10'),
(78, 'App\\Models\\User', 1, 'my-token', '53300d6df9daa5e0563c652068dd7ac76366930afc4cce8c7b372cd6232e5484', '[\"*\"]', '2024-12-03 21:23:19', '2024-12-03 22:22:13', '2024-12-03 21:22:13', '2024-12-03 21:23:19'),
(79, 'App\\Models\\User', 1, 'my-token', '03b4156c6841a3f3e8fd12d84866cdc684b9b3971aa3179bfe0551cf8a54d425', '[\"*\"]', '2024-12-03 21:35:06', '2024-12-03 22:35:02', '2024-12-03 21:35:02', '2024-12-03 21:35:06'),
(80, 'App\\Models\\User', 1, 'my-token', '8b1acb536c8ac2094b9b1e4f203467f8fb54e08e3ca9abbf29138d797fc7dba0', '[\"*\"]', '2024-12-04 13:27:36', '2024-12-04 14:17:11', '2024-12-04 13:17:11', '2024-12-04 13:27:36'),
(81, 'App\\Models\\User', 1, 'my-token', '03834f0856a98f0fdbb42cc9cea51a9ac3650304e6de16b929ef1f13582faaea', '[\"*\"]', '2024-12-04 15:44:45', '2024-12-04 16:44:43', '2024-12-04 15:44:44', '2024-12-04 15:44:45'),
(82, 'App\\Models\\User', 1, 'my-token', '3fd41c9aeaa09b0849862fbb17c74532f0784e881c1f82c2f9366aadf1968ba3', '[\"*\"]', '2024-12-05 13:05:11', '2024-12-05 13:45:51', '2024-12-05 12:45:51', '2024-12-05 13:05:11'),
(83, 'App\\Models\\User', 1, 'my-token', '0096fe28bfcc84f19ee839452ada20a5a2258979e90aa33af5e082a38ad11204', '[\"*\"]', '2024-12-05 16:55:06', '2024-12-05 17:46:05', '2024-12-05 16:46:05', '2024-12-05 16:55:06'),
(84, 'App\\Models\\User', 1, 'my-token', '1f52af8811acea5460d9b80741b46d68abc968b4cab14ad2ea89a99d84f2b626', '[\"*\"]', '2024-12-05 17:25:24', '2024-12-05 17:56:29', '2024-12-05 16:56:29', '2024-12-05 17:25:24'),
(85, 'App\\Models\\User', 1, 'my-token', 'abd05fe667f4f0a79f2004f2777f8ea28907a41005015c3c6cb5f95278928760', '[\"*\"]', '2024-12-05 17:33:37', '2024-12-05 18:27:32', '2024-12-05 17:27:32', '2024-12-05 17:33:37'),
(86, 'App\\Models\\User', 1, 'my-token', '4ae5e09c187d4336158a124da8f2e0045d6351fdf6120bf058bb41e27ec04c43', '[\"*\"]', '2024-12-05 17:43:18', '2024-12-05 18:35:19', '2024-12-05 17:35:19', '2024-12-05 17:43:18'),
(87, 'App\\Models\\User', 1, 'my-token', '506b1a6993ac50ee8442258ed56f7ae40b8897d7484b063cc49b8f33616b1341', '[\"*\"]', '2024-12-05 17:44:26', '2024-12-05 18:44:17', '2024-12-05 17:44:17', '2024-12-05 17:44:26'),
(88, 'App\\Models\\User', 1, 'my-token', '8d7178f716df8ba6ce4d79f63c177d1f1084a010a66715a8681fdd76fdf0b834', '[\"*\"]', '2024-12-05 18:01:03', '2024-12-05 18:58:50', '2024-12-05 17:58:50', '2024-12-05 18:01:03'),
(89, 'App\\Models\\User', 1, 'my-token', '38162ee3280687627d1d6218c9428b59a7b495da503e6c9d1211d7447b7852df', '[\"*\"]', '2024-12-05 23:24:56', '2024-12-06 00:09:28', '2024-12-05 23:09:28', '2024-12-05 23:24:56'),
(90, 'App\\Models\\User', 1, 'my-token', '000eabcb0303ace827e71f5a2d31c738709172782a03fddf526f793b18611ed6', '[\"*\"]', '2024-12-06 00:05:25', '2024-12-06 01:05:09', '2024-12-06 00:05:09', '2024-12-06 00:05:25'),
(91, 'App\\Models\\User', 1, 'my-token', '4d53a50da8a0e14e496418428f180b392d6b188545945110862a792dd3e85773', '[\"*\"]', '2024-12-06 00:49:31', '2024-12-06 01:49:27', '2024-12-06 00:49:27', '2024-12-06 00:49:31'),
(92, 'App\\Models\\User', 1, 'my-token', '3597fef2dbb18f8176a6e60d7d406c049b24e67a31a79d5e8a1dbc815dbc06ed', '[\"*\"]', '2024-12-06 00:50:53', '2024-12-06 01:50:51', '2024-12-06 00:50:51', '2024-12-06 00:50:53'),
(93, 'App\\Models\\User', 2, 'my-token', '5ec812c49e1c520262854882fae8a796d59882c024990c47e8be9897345f0220', '[\"*\"]', '2024-12-06 02:32:07', '2024-12-06 03:30:29', '2024-12-06 02:30:29', '2024-12-06 02:32:07');

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
(1, '11824', 'admin', 'admin@gmail.com', NULL, '$2y$12$07DhnSCZMVuN8SWFExPF..k8RovtObiLDAezt5.b8cF1V4IhDWWN2', NULL, NULL, NULL, 1, '2024-11-02 07:51:32', '2024-11-02 07:51:32');

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
  `type` int(45) DEFAULT NULL,
  `employee_student_type` int(45) DEFAULT NULL,
  `employment_classification` int(11) DEFAULT NULL,
  `office_level` varchar(45) DEFAULT NULL,
  `department_program` varchar(45) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `civil_status` int(11) DEFAULT NULL,
  `guardian_firstname` varchar(45) DEFAULT NULL,
  `guardian_middlename` varchar(45) NOT NULL,
  `guardian_lastname` varchar(45) NOT NULL,
  `guardian_no` varchar(45) DEFAULT NULL,
  `permanent_address` varchar(45) DEFAULT NULL,
  `bsu_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `school_id_number`, `firstname`, `lastname`, `middlename`, `type`, `employee_student_type`, `employment_classification`, `office_level`, `department_program`, `sex`, `age`, `birthday`, `email`, `contact_no`, `civil_status`, `guardian_firstname`, `guardian_middlename`, `guardian_lastname`, `guardian_no`, `permanent_address`, `bsu_address`, `created_at`, `updated_at`) VALUES
(1, 1, '11824', 'Admin', 'Admin', 'Admin', 1, 0, NULL, '0', 'test', 'Male', 0, NULL, 'admin@gmail.com', '0000', 0, '0', '', '', '0', '0', '0', '2024-11-02 07:51:32', '2024-11-02 15:51:32');

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
-- Indexes for table `pending_accounts`
--
ALTER TABLE `pending_accounts`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `badult_leftteeth`
--
ALTER TABLE `badult_leftteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `badult_rightteeth`
--
ALTER TABLE `badult_rightteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bbaby_leftteeth`
--
ALTER TABLE `bbaby_leftteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bbaby_rightteeth`
--
ALTER TABLE `bbaby_rightteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinical_details`
--
ALTER TABLE `clinical_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pending_accounts`
--
ALTER TABLE `pending_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `security_questions_lib`
--
ALTER TABLE `security_questions_lib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tadult_leftteeth`
--
ALTER TABLE `tadult_leftteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tadult_rightteeth`
--
ALTER TABLE `tadult_rightteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbaby_leftteeth`
--
ALTER TABLE `tbaby_leftteeth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbaby_rightteeth`
--
ALTER TABLE `tbaby_rightteeth`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
