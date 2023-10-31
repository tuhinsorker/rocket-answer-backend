-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2023 at 06:49 AM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rockte_answer`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('roket_answer_cache___ASC__', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:11:{i:0;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:1;s:5:\"group\";s:4:\"Site\";s:3:\"key\";s:9:\"site.name\";s:12:\"display_name\";s:4:\"Name\";s:5:\"value\";s:6:\"Bdtask\";s:4:\"type\";s:4:\"text\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:1;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-06-19 01:48:12\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:1;s:5:\"group\";s:4:\"Site\";s:3:\"key\";s:9:\"site.name\";s:12:\"display_name\";s:4:\"Name\";s:5:\"value\";s:6:\"Bdtask\";s:4:\"type\";s:4:\"text\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:1;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-06-19 01:48:12\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:7;s:5:\"group\";s:7:\"Contact\";s:3:\"key\";s:11:\"contact.phn\";s:12:\"display_name\";s:5:\"Phone\";s:5:\"value\";s:17:\"+880 1xxx xxx xxx\";s:4:\"type\";s:4:\"text\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:1;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-03-21 06:00:12\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:7;s:5:\"group\";s:7:\"Contact\";s:3:\"key\";s:11:\"contact.phn\";s:12:\"display_name\";s:5:\"Phone\";s:5:\"value\";s:17:\"+880 1xxx xxx xxx\";s:4:\"type\";s:4:\"text\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:1;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-03-21 06:00:12\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:16;s:5:\"group\";s:10:\"Appearance\";s:3:\"key\";s:19:\"appearance.auth_img\";s:12:\"display_name\";s:20:\"Authentication image\";s:5:\"value\";s:52:\"setting/8qw76vZESn16Y6Fv4pENvsNyvUmuO0ejia9vbv7c.jpg\";s:4:\"type\";s:5:\"image\";s:7:\"details\";s:2:\"[]\";s:4:\"note\";N;s:5:\"order\";i:1;s:10:\"created_at\";s:19:\"2023-03-23 04:45:32\";s:10:\"updated_at\";s:19:\"2023-07-11 07:31:03\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:16;s:5:\"group\";s:10:\"Appearance\";s:3:\"key\";s:19:\"appearance.auth_img\";s:12:\"display_name\";s:20:\"Authentication image\";s:5:\"value\";s:52:\"setting/8qw76vZESn16Y6Fv4pENvsNyvUmuO0ejia9vbv7c.jpg\";s:4:\"type\";s:5:\"image\";s:7:\"details\";s:2:\"[]\";s:4:\"note\";N;s:5:\"order\";i:1;s:10:\"created_at\";s:19:\"2023-03-23 04:45:32\";s:10:\"updated_at\";s:19:\"2023-07-11 07:31:03\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:2;s:5:\"group\";s:4:\"Site\";s:3:\"key\";s:16:\"site.description\";s:12:\"display_name\";s:11:\"Description\";s:5:\"value\";s:158:\"Want to study abroad ? Get free expert advice and information on colleges, courses, exams, admission, student visa, and application process to study overseas.\";s:4:\"type\";s:9:\"text_area\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:2;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-06-19 01:48:12\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:2;s:5:\"group\";s:4:\"Site\";s:3:\"key\";s:16:\"site.description\";s:12:\"display_name\";s:11:\"Description\";s:5:\"value\";s:158:\"Want to study abroad ? Get free expert advice and information on colleges, courses, exams, admission, student visa, and application process to study overseas.\";s:4:\"type\";s:9:\"text_area\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:2;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-06-19 01:48:12\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:8;s:5:\"group\";s:7:\"Contact\";s:3:\"key\";s:13:\"contact.email\";s:12:\"display_name\";s:5:\"Email\";s:5:\"value\";s:15:\"info@xxxxx.xxxx\";s:4:\"type\";s:4:\"text\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:2;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-03-21 06:00:12\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:8;s:5:\"group\";s:7:\"Contact\";s:3:\"key\";s:13:\"contact.email\";s:12:\"display_name\";s:5:\"Email\";s:5:\"value\";s:15:\"info@xxxxx.xxxx\";s:4:\"type\";s:4:\"text\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:2;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-03-21 06:00:12\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:5;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:17;s:5:\"group\";s:10:\"Appearance\";s:3:\"key\";s:27:\"appearance.auth_quote_title\";s:12:\"display_name\";s:31:\"Authentication Page Quote Title\";s:5:\"value\";s:25:\"Top Notch Stock Resources\";s:4:\"type\";s:4:\"text\";s:7:\"details\";s:2:\"[]\";s:4:\"note\";N;s:5:\"order\";i:2;s:10:\"created_at\";s:19:\"2023-03-23 04:51:08\";s:10:\"updated_at\";s:19:\"2023-03-23 04:54:13\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:17;s:5:\"group\";s:10:\"Appearance\";s:3:\"key\";s:27:\"appearance.auth_quote_title\";s:12:\"display_name\";s:31:\"Authentication Page Quote Title\";s:5:\"value\";s:25:\"Top Notch Stock Resources\";s:4:\"type\";s:4:\"text\";s:7:\"details\";s:2:\"[]\";s:4:\"note\";N;s:5:\"order\";i:2;s:10:\"created_at\";s:19:\"2023-03-23 04:51:08\";s:10:\"updated_at\";s:19:\"2023-03-23 04:54:13\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:6;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:3;s:5:\"group\";s:4:\"Site\";s:3:\"key\";s:8:\"site.url\";s:12:\"display_name\";s:8:\"Site Url\";s:5:\"value\";s:29:\"http://localhost/roketanswer/\";s:4:\"type\";s:4:\"text\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:3;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-06-12 22:47:37\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:3;s:5:\"group\";s:4:\"Site\";s:3:\"key\";s:8:\"site.url\";s:12:\"display_name\";s:8:\"Site Url\";s:5:\"value\";s:29:\"http://localhost/roketanswer/\";s:4:\"type\";s:4:\"text\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:3;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-06-12 22:47:37\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:7;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:9;s:5:\"group\";s:7:\"Contact\";s:3:\"key\";s:15:\"contact.address\";s:12:\"display_name\";s:7:\"Address\";s:5:\"value\";s:18:\"xxxx,xxxx,xxxx-xxx\";s:4:\"type\";s:4:\"text\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:3;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-03-21 06:00:12\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:9;s:5:\"group\";s:7:\"Contact\";s:3:\"key\";s:15:\"contact.address\";s:12:\"display_name\";s:7:\"Address\";s:5:\"value\";s:18:\"xxxx,xxxx,xxxx-xxx\";s:4:\"type\";s:4:\"text\";s:7:\"details\";N;s:4:\"note\";N;s:5:\"order\";i:3;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-03-21 06:00:12\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:8;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:18;s:5:\"group\";s:10:\"Appearance\";s:3:\"key\";s:21:\"appearance.auth_quote\";s:12:\"display_name\";s:25:\"Authentication Page Quote\";s:5:\"value\";s:116:\"Today, we create innovative solutions to the challenges that consumers face in both their everyday lives and events.\";s:4:\"type\";s:9:\"text_area\";s:7:\"details\";s:2:\"[]\";s:4:\"note\";N;s:5:\"order\";i:3;s:10:\"created_at\";s:19:\"2023-03-23 04:55:02\";s:10:\"updated_at\";s:19:\"2023-03-23 04:55:18\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:18;s:5:\"group\";s:10:\"Appearance\";s:3:\"key\";s:21:\"appearance.auth_quote\";s:12:\"display_name\";s:25:\"Authentication Page Quote\";s:5:\"value\";s:116:\"Today, we create innovative solutions to the challenges that consumers face in both their everyday lives and events.\";s:4:\"type\";s:9:\"text_area\";s:7:\"details\";s:2:\"[]\";s:4:\"note\";N;s:5:\"order\";i:3;s:10:\"created_at\";s:19:\"2023-03-23 04:55:02\";s:10:\"updated_at\";s:19:\"2023-03-23 04:55:18\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:9;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:5;s:5:\"group\";s:4:\"Site\";s:3:\"key\";s:15:\"site.logo_black\";s:12:\"display_name\";s:10:\"Logo Black\";s:5:\"value\";s:53:\"setting/HvUprpT7HNzC0j2CrTqv6d0rJ5wuzEBHWRf5SMtK.webp\";s:4:\"type\";s:5:\"image\";s:7:\"details\";N;s:4:\"note\";s:25:\"Default image size 205x60\";s:5:\"order\";i:4;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-06-19 05:46:38\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:5;s:5:\"group\";s:4:\"Site\";s:3:\"key\";s:15:\"site.logo_black\";s:12:\"display_name\";s:10:\"Logo Black\";s:5:\"value\";s:53:\"setting/HvUprpT7HNzC0j2CrTqv6d0rJ5wuzEBHWRf5SMtK.webp\";s:4:\"type\";s:5:\"image\";s:7:\"details\";N;s:4:\"note\";s:25:\"Default image size 205x60\";s:5:\"order\";i:4;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-06-19 05:46:38\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:10;O:32:\"Modules\\Setting\\Entities\\Setting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:6;s:5:\"group\";s:4:\"Site\";s:3:\"key\";s:12:\"site.favicon\";s:12:\"display_name\";s:7:\"Favicon\";s:5:\"value\";s:52:\"setting/6hrgR22EatGk1rofa4pkwY21yLLinez2kMHeBWsG.jpg\";s:4:\"type\";s:5:\"image\";s:7:\"details\";N;s:4:\"note\";s:24:\"Default image size 68x68\";s:5:\"order\";i:8;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-06-19 05:46:38\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:6;s:5:\"group\";s:4:\"Site\";s:3:\"key\";s:12:\"site.favicon\";s:12:\"display_name\";s:7:\"Favicon\";s:5:\"value\";s:52:\"setting/6hrgR22EatGk1rofa4pkwY21yLLinez2kMHeBWsG.jpg\";s:4:\"type\";s:5:\"image\";s:7:\"details\";N;s:4:\"note\";s:24:\"Default image size 68x68\";s:5:\"order\";i:8;s:10:\"created_at\";s:19:\"2023-03-21 06:00:12\";s:10:\"updated_at\";s:19:\"2023-06-19 05:46:38\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"group\";i:1;s:3:\"key\";i:2;s:12:\"display_name\";i:3;s:5:\"value\";i:4;s:4:\"type\";i:5;s:7:\"details\";i:6;s:4:\"note\";i:7;s:5:\"order\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 2004420663),
('roket_answer_cache___Group__', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:3:{i:0;s:4:\"Site\";i:1;s:7:\"Contact\";i:2;s:10:\"Appearance\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 2004420663),
('roket_answer_cache_0932b1749eb8852bf96011af2b989517', 'i:1;', 1689673946),
('roket_answer_cache_0932b1749eb8852bf96011af2b989517:timer', 'i:1689673946;', 1689673946),
('roket_answer_cache_14408a5431d3af34633fa076863d7264', 'i:1;', 1689653442),
('roket_answer_cache_14408a5431d3af34633fa076863d7264:timer', 'i:1689653442;', 1689653442),
('roket_answer_cache_16d220b4f83b13bd0da0fd3434ae2e5e', 'i:6;', 1689517863),
('roket_answer_cache_16d220b4f83b13bd0da0fd3434ae2e5e:timer', 'i:1689517863;', 1689517863),
('roket_answer_cache_2bc272d56d27d905f34f73f9d47d9b5a', 'i:2;', 1689673542),
('roket_answer_cache_2bc272d56d27d905f34f73f9d47d9b5a:timer', 'i:1689673542;', 1689673542),
('roket_answer_cache_36a4f58ffb94712f19272fa507754670', 'i:1;', 1689681515),
('roket_answer_cache_36a4f58ffb94712f19272fa507754670:timer', 'i:1689681515;', 1689681515),
('roket_answer_cache_44ee5a4c5fe23a8b9ad982d352fcc59a', 'i:1;', 1689412472),
('roket_answer_cache_44ee5a4c5fe23a8b9ad982d352fcc59a:timer', 'i:1689412472;', 1689412472),
('roket_answer_cache_4ddebcab278a71d68bfc500b9dfdc292', 'i:2;', 1689060072),
('roket_answer_cache_4ddebcab278a71d68bfc500b9dfdc292:timer', 'i:1689060072;', 1689060072),
('roket_answer_cache_55490c2943b3b1db60bc4124ea5d2244', 'i:5;', 1689577930),
('roket_answer_cache_55490c2943b3b1db60bc4124ea5d2244:timer', 'i:1689577930;', 1689577930),
('roket_answer_cache_5ad294bc2e15b07c88b09c63f105b104', 'i:2;', 1689228004),
('roket_answer_cache_5ad294bc2e15b07c88b09c63f105b104:timer', 'i:1689228004;', 1689228004),
('roket_answer_cache_6a9fd864a9e049883eb3b28fc3c0726d', 'i:1;', 1689106862),
('roket_answer_cache_6a9fd864a9e049883eb3b28fc3c0726d:timer', 'i:1689106862;', 1689106862),
('roket_answer_cache_70b661b8cad946c4e4fc2ee3ae234c78', 'i:5;', 1689577807),
('roket_answer_cache_70b661b8cad946c4e4fc2ee3ae234c78:timer', 'i:1689577807;', 1689577807),
('roket_answer_cache_7b5aa08abdfaf4366b91a5eb83aa1e9f', 'i:1;', 1689056360),
('roket_answer_cache_7b5aa08abdfaf4366b91a5eb83aa1e9f:timer', 'i:1689056360;', 1689056360),
('roket_answer_cache_7d862ba3c5d751f4dac969c3b8e1f7da', 'i:7;', 1689402910),
('roket_answer_cache_7d862ba3c5d751f4dac969c3b8e1f7da:timer', 'i:1689402910;', 1689402910),
('roket_answer_cache_8dff94401ff134b486ab582405079dac', 'i:5;', 1689582036),
('roket_answer_cache_8dff94401ff134b486ab582405079dac:timer', 'i:1689582036;', 1689582036),
('roket_answer_cache_8fafc9d04046ece097e21901c7f3dc28', 'i:5;', 1689082863),
('roket_answer_cache_8fafc9d04046ece097e21901c7f3dc28:timer', 'i:1689082863;', 1689082863),
('roket_answer_cache_aa1304c397b5e37d89ab9b9b27f0a78a', 'i:5;', 1689660338),
('roket_answer_cache_aa1304c397b5e37d89ab9b9b27f0a78a:timer', 'i:1689660338;', 1689660338),
('roket_answer_cache_b6abf90ae0f53645fa4fe745d8ace3f4', 'i:5;', 1689251037),
('roket_answer_cache_b6abf90ae0f53645fa4fe745d8ace3f4:timer', 'i:1689251037;', 1689251037),
('roket_answer_cache_bVXoh6loycp3DqQZ', 'a:1:{s:11:\"valid_until\";i:1689067473;}', 1690579473),
('roket_answer_cache_cf0dad854d8ddaba5c4d59fe64fe8f27', 'i:3;', 1689680487),
('roket_answer_cache_cf0dad854d8ddaba5c4d59fe64fe8f27:timer', 'i:1689680487;', 1689680487),
('roket_answer_cache_d07b9d9e291aa644ffd589885212e66b', 'i:9;', 1689575018),
('roket_answer_cache_d07b9d9e291aa644ffd589885212e66b:timer', 'i:1689575018;', 1689575018),
('roket_answer_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:5:\"group\";s:1:\"d\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:38:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:15:\"user_management\";s:1:\"c\";s:4:\"User\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:15:\"role_management\";s:1:\"c\";s:4:\"User\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:21:\"permission_management\";s:1:\"c\";s:4:\"User\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:3;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:19:\"document_management\";s:1:\"c\";s:8:\"Document\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:4;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:18:\"setting_management\";s:1:\"c\";s:7:\"Setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:5;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:23:\"mail_setting_management\";s:1:\"c\";s:7:\"Setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:6;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:28:\"recaptcha_setting_management\";s:1:\"c\";s:7:\"Setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:7;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:25:\"module_setting_management\";s:1:\"c\";s:7:\"Setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:8;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:22:\"env_setting_management\";s:1:\"c\";s:7:\"Setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:9;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:27:\"language_setting_management\";s:1:\"c\";s:7:\"Setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:10;a:5:{s:1:\"a\";i:25;s:1:\"b\";s:17:\"backup_management\";s:1:\"c\";s:6:\"Backup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:11;a:5:{s:1:\"a\";i:26;s:1:\"b\";s:19:\"customer_management\";s:1:\"c\";s:4:\"User\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:12;a:5:{s:1:\"a\";i:27;s:1:\"b\";s:15:\"post_management\";s:1:\"c\";s:4:\"User\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:13;a:5:{s:1:\"a\";i:30;s:1:\"b\";s:21:\"default_payment_setup\";s:1:\"c\";s:7:\"Setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:14;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:14:\"payment_method\";s:1:\"c\";s:7:\"Setting\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:15;a:5:{s:1:\"a\";i:32;s:1:\"b\";s:14:\"privacy_policy\";s:1:\"c\";s:3:\"CMS\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:16;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:16:\"terms_of_service\";s:1:\"c\";s:3:\"CMS\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:17;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:11:\"testimonial\";s:1:\"c\";s:3:\"CMS\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:18;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:18:\"landing_page_setup\";s:1:\"c\";s:3:\"CMS\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:19;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:13:\"post_category\";s:1:\"c\";s:3:\"CMS\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:20;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:9:\"page_list\";s:1:\"c\";s:3:\"CMS\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:21;a:5:{s:1:\"a\";i:38;s:1:\"b\";s:8:\"add_page\";s:1:\"c\";s:3:\"CMS\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:22;a:5:{s:1:\"a\";i:39;s:1:\"b\";s:9:\"post_list\";s:1:\"c\";s:3:\"CMS\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:23;a:5:{s:1:\"a\";i:40;s:1:\"b\";s:8:\"add_post\";s:1:\"c\";s:3:\"CMS\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:24;a:5:{s:1:\"a\";i:41;s:1:\"b\";s:12:\"package_list\";s:1:\"c\";s:8:\"Packages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:25;a:5:{s:1:\"a\";i:42;s:1:\"b\";s:12:\"invoice_list\";s:1:\"c\";s:8:\"Packages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:26;a:5:{s:1:\"a\";i:43;s:1:\"b\";s:13:\"customer_list\";s:1:\"c\";s:9:\"Customers\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:27;a:5:{s:1:\"a\";i:44;s:1:\"b\";s:21:\"customer_subscription\";s:1:\"c\";s:9:\"Customers\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:28;a:5:{s:1:\"a\";i:45;s:1:\"b\";s:29:\"customer_conversation_history\";s:1:\"c\";s:13:\"Conversations\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:29;a:5:{s:1:\"a\";i:46;s:1:\"b\";s:16:\"withdraw_request\";s:1:\"c\";s:12:\"Transactions\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:30;a:5:{s:1:\"a\";i:49;s:1:\"b\";s:22:\"transaction_management\";s:1:\"c\";s:12:\"Transactions\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:31;a:5:{s:1:\"a\";i:50;s:1:\"b\";s:14:\"pending_expert\";s:1:\"c\";s:7:\"Experts\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:32;a:5:{s:1:\"a\";i:51;s:1:\"b\";s:13:\"active_expert\";s:1:\"c\";s:7:\"Experts\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:33;a:5:{s:1:\"a\";i:52;s:1:\"b\";s:15:\"expert_category\";s:1:\"c\";s:7:\"Experts\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:34;a:5:{s:1:\"a\";i:53;s:1:\"b\";s:19:\"expert_sub_category\";s:1:\"c\";s:7:\"Experts\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:35;a:5:{s:1:\"a\";i:54;s:1:\"b\";s:18:\"expert_pay_account\";s:1:\"c\";s:7:\"Experts\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:36;a:5:{s:1:\"a\";i:55;s:1:\"b\";s:13:\"expert_review\";s:1:\"c\";s:7:\"Experts\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:37;a:5:{s:1:\"a\";i:56;s:1:\"b\";s:20:\"expert_payment_setup\";s:1:\"c\";s:7:\"Experts\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:13:\"Administrator\";s:1:\"d\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:14:\"Administrator1\";s:1:\"d\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:4:\"User\";s:1:\"d\";s:3:\"web\";}}}', 1689752569);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `card_types`
--

CREATE TABLE IF NOT EXISTS `card_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `card_types`
--

INSERT INTO `card_types` (`id`, `name`, `is_active`) VALUES
(1, 'Visa', 1),
(2, 'Master', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_history`
--

CREATE TABLE IF NOT EXISTS `chat_history` (
  `chat_id` bigint NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `attach_file` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `chat_date` date NOT NULL,
  `chat_date_time` datetime NOT NULL,
  `expert_id` int NOT NULL,
  `action_type` tinyint(1) NOT NULL COMMENT '1=agent, 2=visitor and 0=auto',
  `type` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=read, 1=unread',
  `isNotify` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=true, 0=false',
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE IF NOT EXISTS `cms_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `event` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `event`, `details`, `created_at`, `updated_at`) VALUES
(1, 'web_setup', '{\"weblogo\":\"application\\/1689757529648.webp\",\"stikyweblogo\":\"application\\/1674445568359.png\",\"footerlogo\":\"application\\/1689757529149.webp\",\"favicon\":\"application\\/1689757529542.jpg\",\"title\":\"Eos doloremque et cu\",\"footertext\":\"test\",\"copyright\":\"Copyright \\u00a9 2022\",\"metatag\":\"Reiciendis cupiditat\",\"metadescription\":\"Adipisicing aute par\",\"email\":\"hello@iqonic.design\",\"phone\":\"+0123456789\",\"address\":\"1234 North Avenue Luke Lane,<br\\/>South Bend, N 360001\"}', '2022-11-01 15:58:14', '2023-07-19 09:05:29'),
(2, 'social_link', '{\"_token\":\"thh1Ad5RXraH4J4KBSSiJaOdGPdRN2QwQBCHoat5\",\"id\":\"2\",\"facebook\":\"https:\\/\\/www.facebook.com\\/tuhin.bu\",\"twitter\":\"https:\\/\\/twitter.com\\/startuplag\",\"github\":\"https:\\/\\/github.com\\/tuhinsorker\",\"dribbble\":\"https:\\/\\/dribbble.com\\/\",\"instagram\":\"https:\\/\\/www.instagram.com\\/startuplag\\/\",\"linkedin\":\"https:\\/\\/www.linkedin.com\\/in\\/md-tuhin-sarker-550898a1\\/\",\"youtube\":\"https:\\/\\/www.youtube.com\\/@startuplagos363\\/featured\"}', '2022-11-01 20:33:28', '2023-07-19 09:06:46'),
(3, 'Privacy-Policy', '{\"_token\":\"Wn1dBT8QUBSlh4EJ5YjGRuIPewl01rfX0ISfeiGQ\",\"id\":\"3\",\"privacypolicy\":\"<p><br \\/>\\r\\nPrivacy Policy for Startup Lagos At www.startuplagos.net, accessible from www.startuplagos.net, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by www.startuplagos.net and how we use it. If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us. This Privacy&nbsp;<\\/p>\\r\\n\\r\\n<p>Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and\\/or collect in www.startuplagos.net. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the Free Privacy Policy Generator. Consent By using our website, you hereby consent to our Privacy Policy and agree to its&nbsp;<\\/p>\\r\\n\\r\\n<p>terms. Information we collect The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information. If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and\\/or attachments you may send us, and any other information you&nbsp;<\\/p>\\r\\n\\r\\n<p>may choose to provide. When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number. How we use your information We use the information we collect in various ways, including to: Provide, operate, and maintain our website Improve, personalize, and expand our website Understand and analyze how you use our&nbsp;<\\/p>\\r\\n\\r\\n<p>website Develop new products, services, features, and functionality Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes Send you emails Find and prevent fraud Log Files www.startuplagos.net follows a standard procedure of using log files. These files log visitors&nbsp;<\\/p>\\r\\n\\r\\n<p>when they visit websites. All hosting companies do this and a part of hosting services&#39; analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring\\/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends,&nbsp;<\\/p>\\r\\n\\r\\n<p>administering the site, tracking users&#39; movement on the website, and gathering demographic information. Cookies and Web Beacons Like any other website, www.startuplagos.net uses &#39;cookies&#39;. These cookies are used to store information including visitors&#39; preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users&#39; experience by customizing our&nbsp;<\\/p>\\r\\n\\r\\n<p>web page content based on visitors&#39; browser type and\\/or other information. Google DoubleClick DART Cookie Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy&nbsp;<\\/p>\\r\\n\\r\\n<p>at the following URL &ndash; https:\\/\\/policies.google.com\\/technologies\\/ads Our Advertising Partners Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below. Google https:\\/\\/policies.google.com\\/technologies\\/ads Advertising&nbsp;<\\/p>\\r\\n\\r\\n<p>Partners Privacy Policies You may consult this list to find the Privacy Policy for each of the advertising partners of www.startuplagos.net. Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on www.startuplagos.net, which are sent directly to users&#39; browser. They automatically receive your IP address when&nbsp;<\\/p>\\r\\n\\r\\n<p>this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and\\/or to personalize the advertising content that you see on websites that you visit. Note that www.startuplagos.net has no access to or control over these cookies that are used by third-party advertisers. Third Party Privacy Policies www.startuplagos.net&#39;s Privacy Policy does not apply to other advertisers or websites. Thus,&nbsp;<\\/p>\\r\\n\\r\\n<p>we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers&#39; respective websites. CCPA&nbsp;<\\/p>\\r\\n\\r\\n<p>Privacy Rights (Do Not Sell My Personal Information) Under the CCPA, among other rights, California consumers have the right to: Request that a business that collects a consumer&#39;s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers. Request that a business delete any personal data about the consumer that a business has collected. Request that a business that sells a&nbsp;<\\/p>\\r\\n\\r\\n<p>consumer&#39;s personal data, not sell the consumer&#39;s personal data. If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us. GDPR Data Protection Rights We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following: The right to access &ndash; You have the right to request copies of your personal data. We may charge&nbsp;<\\/p>\\r\\n\\r\\n<p>you a small fee for this service. The right to rectification &ndash; You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete. The right to erasure &ndash; You have the right to request that we erase your personal data, under certain conditions. The right to restrict processing &ndash; You have the right to request that we restrict the processing of your&nbsp;<\\/p>\\r\\n\\r\\n<p>personal data, under certain conditions. The right to object to processing &ndash; You have the right to object to our processing of your personal data, under certain conditions. The right to data portability &ndash; You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions. If you make a request, we have one month to respond to you. If you would like to exercise any of&nbsp;<\\/p>\\r\\n\\r\\n<p>these rights, please contact us. Children&#39;s Information Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and\\/or monitor and guide their online activity. www.startuplagos.net does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of&nbsp;<\\/p>\\r\\n\\r\\n<p>information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.<br \\/>\\r\\n&nbsp;<\\/p>\"}', '2022-12-02 23:01:50', '2023-06-21 22:31:09'),
(4, 'Terms-Of-Service', '{\"_token\":\"Wn1dBT8QUBSlh4EJ5YjGRuIPewl01rfX0ISfeiGQ\",\"id\":\"4\",\"termsofservice\":\"<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Terms of Service<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Welcome to Startup Lagos!<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">These terms and conditions outline the rules and regulations for the use of Eko Incubation&#39;s Website, located at www.startuplagos.net.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">By accessing this website, we assume you accept these terms and conditions. Do not continue to use Startup Lagos if you do not agree to all of the terms and conditions stated on this page.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">The following terminology applies to these Terms and Conditions, Privacy Statement, Disclaimer Notice, and all Agreements: &quot;Client,&rdquo; &ldquo;you,&quot; and &quot;&ldquo;your&quot; refer to you, the person who logs on to this website and is compliant with the company&rsquo;s terms and conditions. &quot;The Company,&quot; &quot;Ourselves,&quot; &quot;We&quot;, &quot;Our&quot; and &quot;Us&quot;, refers to our Company. &quot;Party&quot;, &quot;Parties&quot;, or &quot;Us&quot;, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client&rsquo;s needs in respect of provision of the Company&rsquo;s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and\\/or he\\/she or they, are taken as interchangeable and therefore as referring to the same.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><strong><span style=\\\"font-size:13.5pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Cookies<\\/span><\\/span><\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">We use cookies. By accessing Startup Lagos, you agree to use cookies in accordance with the Eko Incubation&#39;s Privacy Policy.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Most interactive websites use cookies to let us retrieve the user&rsquo;s details for each visit. Cookies are used by our website to enable the functionality of certain areas and make it easier for people visiting our website. Some of our affiliates and advertising partners may also use cookies.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><strong><span style=\\\"font-size:13.5pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">License<\\/span><\\/span><\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Unless otherwise stated, Eko Incubation and\\/or its licensors own the intellectual property rights for all material on Startup Lagos. All intellectual property rights are reserved. You may access this from Startup Lagos for your own personal use subjected to restrictions set in these terms and conditions.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">You must not:<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">Republish material from Startup Lagos.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">Sell, rent, or sublicense material from Startup Lagos<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">Reproduce, duplicate, or copy material from Startup Lagos<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">Redistribute content from Startup Lagos<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the&nbsp;<\\/span><\\/span><\\/span><a href=\\\"https:\\/\\/www.termsandconditionsgenerator.com\\/\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Free Terms and Conditions Generator<\\/span><\\/span><\\/span><\\/a><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Eko Incubation does not filter, edit, publish, or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Eko Incubation,its agents or affiliates. Comments reflect the views and opinions of the person who posts those views and opinions. To the extent permitted by applicable laws, Eko Incubation shall not be liable for the Comments or for any liability, damages, or expenses caused or suffered as a result of the use of, posting of, or appearance of the Comments on this website.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Eko Incubation reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">You warrant and represent that<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">The Comments do not contain any defamatory, libelous, offensive, indecent, or otherwise unlawful material, which is an invasion of privacy.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">The Comments will not be used to solicit or promote business, custom, or present commercial activities or unlawful activity.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">You hereby grant Eko Incubation a non-exclusive license to use, reproduce, edit, and authorize others to use, reproduce, edit, and edit any of your Comments in any and all forms, formats, or media.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><strong><span style=\\\"font-size:13.5pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Hyperlinking to Our Content<\\/span><\\/span><\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">The following organizations may link to our Website without prior written approval:<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">Government agencies;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">Search engines;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">News organizations;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses, and<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups, which may not hyperlink to our Web site.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">These organizations may link to our home page, to publications, or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement, or approval of the linking party and its products and\\/or services; and (c) fits within the context of the linking party&rsquo;s site.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">We may consider and approve other link requests from the following types of organizations:<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">commonly known consumer and\\/or business information sources;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">dot.com community sites;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">associations or other groups representing charities;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">online directory distributors;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">internet portals;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">accounting, law, and consulting firms; and<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">educational institutions and trade associations.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of Eko Incubation; and (d) the link is in the context of general resource information.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement, or approval of the linking party and its products or services; and (c) fits within the context of the linking party&rsquo;s site.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to Eko Incubation. Please include your name, your organization name, contact information, and the URL of your site, as well as a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2&ndash;3 weeks for a response.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Approved organizations may hyperlink to our Website as follows:<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">By use of our corporate name; or<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">By use of the uniform resource locator being linked to; or<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party&rsquo;s site.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">No use of Eko Incubation&#39;s logo or other artwork will be allowed for linking absent a trademark license agreement.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><strong><span style=\\\"font-size:13.5pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">iFrames<\\/span><\\/span><\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><strong><span style=\\\"font-size:13.5pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Content Liability<\\/span><\\/span><\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that are made on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene, or criminal, or that infringes, otherwise violates, or advocates the infringement or other violation of any third party rights.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><strong><span style=\\\"font-size:13.5pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Your Privacy<\\/span><\\/span><\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Please read Privacy Policy<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><strong><span style=\\\"font-size:13.5pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Reservation of Rights<\\/span><\\/span><\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">We reserve the right to request that you remove all links or any particular link to our Website. You agree to immediately remove all links to our Website upon request. We also reserve the right to amend these terms and conditions and their linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><strong><span style=\\\"font-size:13.5pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Removal of links from our website<\\/span><\\/span><\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">If you find any link on our Website that is offensive for any reason, you are free to contact us and inform us at any time. We will consider requests to remove links, but we are not obligated to do so or to respond to you directly.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><strong><span style=\\\"font-size:13.5pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">Disclaimer<\\/span><\\/span><\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">To the maximum extent permitted by applicable law, we exclude all representations, warranties, and conditions relating to our website and the use of this website. Nothing in this disclaimer will:<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">limit or exclude our or your liability for death or personal injury;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">limit or exclude our or your liability for fraud or fraudulent misrepresentation;<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">limit any of our or your liabilities in any way that is not permitted under applicable law; or<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\\"font-size:11pt\\\"><span style=\\\"color:#252525\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\">exclude any of our or your liabilities that may not be excluded under applicable law.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">The limitations and prohibitions of liability set forth in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort, and for breach of statutory duty.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\\"font-size:11pt\\\"><span style=\\\"font-family:Calibri,sans-serif\\\"><span style=\\\"font-size:12.0pt\\\"><span style=\\\"font-family:&quot;Times New Roman&quot;,serif\\\"><span style=\\\"color:#252525\\\">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.<\\/span><\\/span><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\"}', '2022-12-02 23:01:50', '2023-06-21 22:31:36'),
(6, 'landing_page', '{\"_token\":\"vPULg3u5cP1Xst0TuSgtdSqtLLbVmYuPocGtWmFs\",\"id\":\"6\",\"head_text\":\"Revolutionizing professional services\",\"head_description\":\"24\\/7 access to help from thousands of Experts, where and when you need it.\",\"head_button_text\":\"Get Your Answer\",\"head_bg_img_old\":\"cms\\/1692015830_common.jpg\",\"top_head_text\":\"Know Our Top Expert List\",\"top_head_description\":\"Advanced cameras combined with a large display, fast performance, and highly calibrated sensors have always made uniquely capable.\",\"to_work_head_text\":\"Join The Rocket Answer How it work\",\"to_word_head_description\":\"Advanced cameras combined with a large display, fast performance, and highly calibrated sensors have always made uniquely capable.\",\"testimonial_head_text\":\"Join The Rocket Answer How it work\",\"testimonial_head_description\":\"Advanced cameras combined with a large display, fast performance, and highly calibrated sensors have always made uniquely capable.\",\"get_start_head_text\":\"Tap into the world\\u2019s largest talent network\",\"get_start_head_description\":\"Find and hire specialized talent. Quickly generate a shortlist of qualified talent Browse rated and reviewed professionals Scale your teams up or down as business dynamics change\",\"get_start_button_text\":\"Connect With Talent\",\"get_start_img_old\":\"cms\\/1690798029_pexels-joyce-toh-2912583.jpg\",\"get_start_video_url\":\"https:\\/\\/www.youtube.com\\/watch?v=FtjS1hfRTRw\",\"app_head_text\":\"Any Service Any Time\",\"app_head_description\":\"Big, small, online, offline, local or other. Size doesn\\u2019t matter. We work on diverse projects for top brands as well as for cool startups. Check out some of our favorites.\",\"gpstore_button_link\":\"ss\",\"app_store_button_link\":\"ss\",\"app_img_old\":\"cms\\/1692017147_phone.png\",\"app_img\":\"cms\\/1692017325_Frame 4.png\",\"head_bg_img\":\"cms\\/1692015830_common.jpg\",\"get_start_img\":\"cms\\/1690798029_pexels-joyce-toh-2912583.jpg\"}', '2022-12-02 23:01:50', '2023-08-14 12:48:45'),
(7, 'fb_login_credential', '{\"_token\":\"vPULg3u5cP1Xst0TuSgtdSqtLLbVmYuPocGtWmFs\",\"app_id\":\"259791428784848\"}', '2022-12-02 23:01:50', '2023-08-14 12:48:45'),
(8, 'gl_login_credential', '{\"_token\":\"vPULg3u5cP1Xst0TuSgtdSqtLLbVmYuPocGtWmFs\",\"client_id\":\"854103627036-njjdrrjn6l5d9ama55vreq3jgnda7o6v.apps.googleusercontent.com\"}', '2022-12-02 23:01:50', '2023-08-14 12:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `contact_queries`
--

CREATE TABLE IF NOT EXISTS `contact_queries` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_queries`
--

INSERT INTO `contact_queries` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Mks', 'mk@gamil.com', 'I am looking for my wife', '2023-09-05 10:41:56', '2023-09-05 10:41:56'),
(2, 'Mks Tamin', 'a@a.com', 'hello world!', '2023-09-05 10:42:13', '2023-09-05 10:42:13'),
(3, 'Mks Tamin', 'admin@gmail.com', 'Let’s say we need to use the new script as soon as it loads. It declares new functions, and we want to run them.', '2023-09-07 04:11:40', '2023-09-07 04:11:40'),
(4, 'Mks Tamin', 'admin@gmail.com', 'Let’s say we need to use the new script as soon as it loads. It declares new functions, and we want to run them.', '2023-09-07 04:17:07', '2023-09-07 04:17:07'),
(5, 'Mks Tamin', 'admin@gmail.com', 'Let’s say we need to use the new script as soon as it loads. It declares new functions, and we want to run them.', '2023-09-07 04:20:29', '2023-09-07 04:20:29'),
(6, 'Mks Tamin', 'admin@gmail.com', 'Let’s say we need to use the new script as soon as it loads. It declares new functions, and we want to run them.', '2023-09-07 04:21:59', '2023-09-07 04:21:59'),
(7, 'Mks Tamin', 'admin@gmail.com', 'Let’s say we need to use the new script as soon as it loads. It declares new functions, and we want to run them.', '2023-09-07 04:23:51', '2023-09-07 04:23:51'),
(8, 'tamin', 'a@b.com', 'ksdf asdf asdf asdfasd  asdf asd f asdf sadf', '2023-09-13 08:20:30', '2023-09-13 08:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE IF NOT EXISTS `conversations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  `expert_id` int DEFAULT NULL,
  `customer_id` int NOT NULL,
  `expert_category_id` int DEFAULT NULL,
  `expert_sub_category_id` int DEFAULT NULL,
  `question_answers` longtext,
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `title` varchar(500) DEFAULT NULL,
  `description` text,
  `price` float(8,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `expert_reply_date` datetime DEFAULT NULL,
  `rating` varchar(5) DEFAULT NULL,
  `is_customer_closed` tinyint(1) NOT NULL DEFAULT '0',
  `is_expert_closed` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `code`, `expert_id`, `customer_id`, `expert_category_id`, `expert_sub_category_id`, `question_answers`, `subject`, `title`, `description`, `price`, `date`, `start_time`, `end_date`, `end_time`, `expert_reply_date`, `rating`, `is_customer_closed`, `is_expert_closed`, `created_at`, `updated_at`) VALUES
(1, '1694849173634', NULL, 321, 1, NULL, NULL, 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-09-14', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-14 08:03:46', NULL),
(2, '1694850137413', NULL, 317, 3, NULL, NULL, 'Looking for good Mechanic', 'Looking for good Mechanic', 'Looking for good Mechanic', NULL, '2023-09-14', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-14 08:03:46', NULL),
(3, '1694851104697', 199, 318, 1, NULL, NULL, 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-09-14', '06:21:39', NULL, NULL, NULL, NULL, 0, 0, '2023-09-14 08:03:46', NULL),
(4, '1694851246121', NULL, 319, 3, NULL, NULL, 'Looking for good Mechanic', 'Looking for good Mechanic', 'Looking for good Mechanic', NULL, '2023-09-14', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-14 08:03:46', NULL),
(5, '1694851932079', 199, 320, 1, NULL, NULL, 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, NULL, NULL, NULL, NULL, '2023-10-29 00:00:00', NULL, 0, 0, '2023-09-14 08:03:46', NULL),
(6, '1694859489774', 211, 320, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', '04:00:07', NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(7, '1694860885972', 305, 321, 2, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"d\",\"a\":\"Welcome! How can I help with your medical question?\"},{\"q\":\"asdf\",\"a\":\"The Doctor can help. Just a couple quick questions before I transfer you. What are all your symptoms? Are you currently using any medications?\"},{\"q\":\"asdfsdf\",\"a\":\"What\'s your age and gender?\"},{\"q\":\"asdfsdfe\",\"a\":\"Anything else in your medical history you think the Doctor should know?\"},{\"q\":\"tt\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $10. While you\'re filling out that form, I\'ll tell the Neurologist about your situation and then connect you two.\"}]', 'Looking for good Lawyer', 'Looking for good Lawyer', 'Looking for good Lawyer', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(8, '1694862789725', 305, 319, 2, NULL, NULL, 'Looking for good lawyer', 'Looking for good lawyer', 'Looking for good lawyer', NULL, '2023-09-16', '08:53:58', NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(9, '1694936191955', 305, 316, 2, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"hid\",\"a\":\"Welcome! How can I help with your legal question?\"},{\"q\":\"test\",\"a\":\"Where is this occurring? I only ask because laws can vary by state.\"},{\"q\":\"sss\",\"a\":\"What steps have been taken so far?\"},{\"q\":\"ttt\",\"a\":\"Is there anything else the Lawyer should know before I connect you? Rest assured that they\'ll be able to help you.\"},{\"q\":\"444\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $15. While you\'re filling out that form, I\'ll tell the Lawyer about your situation and then connect you two.\"}]', 'Looking for good lawyer', 'Looking for good lawyer', 'Looking for good lawyer', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(10, '1694936328166', NULL, 316, 3, NULL, NULL, 'Looking for good mechanic', 'Looking for good mechanic', 'Looking for good mechanic', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(11, '1694939529715', 305, 321, 2, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"sdf\",\"a\":\"Welcome! How can I help with your legal question?\"},{\"q\":\"a\",\"a\":\"Where is this occurring? I only ask because laws can vary by state.\"},{\"q\":\"b\",\"a\":\"What steps have been taken so far?\"},{\"q\":\"g\",\"a\":\"Is there anything else the Lawyer should know before I connect you? Rest assured that they\'ll be able to help you.\"},{\"q\":\"w\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $15. While you\'re filling out that form, I\'ll tell the Lawyer about your situation and then connect you two.\"}]', 'Looking for good Lawyer', 'Looking for good Lawyer', 'Looking for good Lawyer', NULL, '2023-09-16', '08:53:58', NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(12, '1694943532547', 322, 323, 1, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"asd\",\"a\":\"Welcome! How can I help with your medical question?\"},{\"q\":\"asdfs\",\"a\":\"The Doctor can help. Just a couple quick questions before I transfer you. What are all your symptoms? Are you currently using any medications?\"},{\"q\":\"asdfs\",\"a\":\"What\'s your age and gender?\"},{\"q\":\"afdas\",\"a\":\"Anything else in your medical history you think the Doctor should know?\"},{\"q\":\"sdf\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $10. While you\'re filling out that form, I\'ll tell the Neurologist about your situation and then connect you two.\"}]', 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', '08:53:58', NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(13, '1694943849895', 211, 324, 1, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"zdfsd\",\"a\":\"Welcome! How can I help with your medical question?\"},{\"q\":\"dsfsd\",\"a\":\"The Doctor can help. Just a couple quick questions before I transfer you. What are all your symptoms? Are you currently using any medications?\"},{\"q\":\"sdfsd\",\"a\":\"What\'s your age and gender?\"},{\"q\":\"asdfd\",\"a\":\"Anything else in your medical history you think the Doctor should know?\"},{\"q\":\"sdfsadf\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $10. While you\'re filling out that form, I\'ll tell the Neurologist about your situation and then connect you two.\"}]', 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-09-16', '08:53:58', NULL, '09:56:45', NULL, '5', 1, 1, '2023-09-16 08:53:58', '2023-09-17 09:56:45'),
(14, '1694943947905', 322, 324, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', NULL, NULL, '09:56:29', NULL, '5', 1, 1, '2023-09-16 08:53:58', '2023-09-17 09:56:29'),
(15, '1694945054107', 211, 324, 1, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"asdfasdf\",\"a\":\"Welcome! How can I help with your medical question?\"},{\"q\":\"asdfasdf\",\"a\":\"The Doctor can help. Just a couple quick questions before I transfer you. What are all your symptoms? Are you currently using any medications?\"},{\"q\":\"sdfgsdfg\",\"a\":\"What\'s your age and gender?\"},{\"q\":\"hgjfghj\",\"a\":\"Anything else in your medical history you think the Doctor should know?\"},{\"q\":\"2\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $10. While you\'re filling out that form, I\'ll tell the Neurologist about your situation and then connect you two.\"}]', 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', '08:53:58', NULL, '10:38:37', NULL, '2', 1, 1, '2023-09-16 08:53:58', '2023-09-17 10:38:37'),
(16, '1694948141790', 199, 321, 1, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"d\",\"a\":\"Welcome! How can I help with your medical question?\"},{\"q\":\"asd\",\"a\":\"The Doctor can help. Just a couple quick questions before I transfer you. What are all your symptoms? Are you currently using any medications?\"},{\"q\":\"asdf\",\"a\":\"What\'s your age and gender?\"},{\"q\":\"asdf\",\"a\":\"Anything else in your medical history you think the Doctor should know?\"},{\"q\":\"asdf\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $10. While you\'re filling out that form, I\'ll tell the Neurologist about your situation and then connect you two.\"}]', 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-09-16', NULL, '2023-09-17', '11:23:38', NULL, '5', 1, 1, '2023-09-16 08:53:58', '2023-09-17 11:23:38'),
(17, '1695010908553', NULL, 321, 2, NULL, NULL, 'Looking for good Lawyer', 'Looking for good Lawyer', 'Looking for good Lawyer', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(18, '1695010980085', NULL, 321, 2, NULL, NULL, 'Looking for good Lawyer', 'Looking for good Lawyer', 'Looking for good Lawyer', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(19, '1695011142477', 211, 321, 1, NULL, NULL, 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-09-16', '04:00:07', NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(20, '1695011357460', NULL, 321, 2, NULL, NULL, 'Looking for good Lawyer', 'Looking for good Lawyer', 'Looking for good Lawyer', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(21, '1695026911841', 199, 326, 1, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"Im fine \",\"a\":\"Welcome! How can I help with your medical question?\"},{\"q\":\"Yes\",\"a\":\"The Doctor can help. Just a couple quick questions before I transfer you. What are all your symptoms? Are you currently using any medications?\"},{\"q\":\"Yes\",\"a\":\"What\'s your age and gender?\"},{\"q\":\"21\",\"a\":\"Anything else in your medical history you think the Doctor should know?\"},{\"q\":\"No\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $10. While you\'re filling out that form, I\'ll tell the Neurologist about your situation and then connect you two.\"}]', 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-09-16', '08:53:58', NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(22, '1695104116685', NULL, 321, 2, NULL, NULL, 'Looking for good Lawyer', 'Looking for good Lawyer', 'Looking for good Lawyer', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(23, '1695118357246', 198, 329, 2, NULL, NULL, 'Looking for good Lawyer', 'Looking for good Lawyer', 'Looking for good Lawyer', NULL, '2023-09-16', '08:53:58', NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(24, '1695622562853', NULL, 349, 6, NULL, NULL, 'Looking for good Tech', 'Looking for good Tech', 'Looking for good Tech', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(25, '1695644159239', 211, 365, 1, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"dsfsdsda\",\"a\":\"Welcome! What\'s going on with your car?\"},{\"q\":\"sdafasdfsadf dsfsdaf\",\"a\":\"What\'s the make, model, and year of your car?\"},{\"q\":\"sfsad fs sadf asdfasdf\",\"a\":\"What\'s the approximate mileage on your car?\"},{\"q\":\"sdf sadfsadf dfsdfsadfasdfss\",\"a\":\"Is there anything else the car Mechanic should know before I connect you? Rest assured that they\'ll be able to help you.\"},{\"q\":\"sadfsdfsdfsdf fsdf asdfsadf\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $9. While you\'re filling out that form, I\'ll tell the car Mechanic about your situation and then connect you two.\"}]', 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(26, '1695658195404', 211, 366, 1, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"Hi\",\"a\":\"Welcome! How can I help with your medical question?\"},{\"q\":\"Ki\",\"a\":\"The Doctor can help. Just a couple quick questions before I transfer you. What are all your symptoms? Are you currently using any medications?\"},{\"q\":\"Hiu\",\"a\":\"What\'s your age and gender?\"},{\"q\":\"Agju\",\"a\":\"Anything else in your medical history you think the Doctor should know?\"},{\"q\":\"Kkgf\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $10. While you\'re filling out that form, I\'ll tell the Neurologist about your situation and then connect you two.\"}]', 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-09-16', '08:53:58', NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(27, '1695677209829', NULL, 367, 2, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"Hello\",\"a\":\"Welcome! How can I help with your legal question?\"},{\"q\":\"my neighbor cut down my tree\",\"a\":\"Where is this occurring? I only ask because laws can vary by state.\"},{\"q\":\"my house\",\"a\":\"What steps have been taken so far?\"},{\"q\":\"nothing\",\"a\":\"Is there anything else the Lawyer should know before I connect you? Rest assured that they\'ll be able to help you.\"},{\"q\":\"no\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $15. While you\'re filling out that form, I\'ll tell the Lawyer about your situation and then connect you two.\"}]', 'Looking for good Lawyer', 'Looking for good Lawyer', 'Looking for good Lawyer', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(28, '1695707863217', 199, 368, 1, NULL, NULL, 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-09-16', '08:53:58', '2023-09-26', '06:33:58', NULL, '4', 1, 1, '2023-09-16 08:53:58', '2023-09-26 06:33:58'),
(29, '1695714134038', 199, 368, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', '08:53:58', '2023-09-26', '07:43:15', NULL, '5', 1, 1, '2023-09-16 08:53:58', '2023-09-26 07:43:15'),
(30, '1696138855380', 211, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-16 08:53:58', NULL),
(31, '1696139967313', 211, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', '04:00:07', '2023-10-04', '04:00:05', NULL, NULL, 0, 1, '2023-09-16 08:53:58', '2023-10-04 04:00:05'),
(32, '1696140723388', 211, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', '04:00:07', '2023-10-01', '09:07:06', NULL, '5', 1, 1, '2023-09-16 08:53:58', '2023-10-01 09:07:06'),
(33, '1696147011473', 199, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', '08:53:58', '2023-10-01', '09:07:20', NULL, '5', 1, 1, '2023-09-16 08:53:58', '2023-10-01 09:07:20'),
(34, '1696147692398', 211, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', NULL, '2023-10-01', '09:06:58', NULL, '4.5', 1, 1, '2023-09-16 08:53:58', '2023-10-01 09:06:58'),
(35, '1696156499398', 211, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', NULL, '2023-10-01', '10:37:45', NULL, '5', 1, 1, '2023-09-16 08:53:58', '2023-10-01 10:37:45'),
(36, '1696221286026', 211, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', '08:53:58', '2023-10-02', '04:35:27', NULL, '5', 1, 1, '2023-09-16 08:53:58', '2023-10-02 04:35:27'),
(37, '1696223696707', 211, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-09-16', NULL, '2023-10-02', '05:16:10', NULL, '5', 1, 1, '2023-09-16 08:53:58', '2023-10-02 05:16:10'),
(38, '1696393258895', 211, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-10-04', NULL, '2023-10-04', '04:31:03', NULL, '5', 1, 1, '2023-10-04 04:00:07', '2023-10-04 04:31:03'),
(39, '1696393871072', 211, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-10-04', '04:00:07', '2023-10-04', '04:53:51', NULL, '5', 1, 1, '2023-10-04 04:00:07', '2023-10-04 04:53:51'),
(40, '1696395238658', 211, 321, 1, NULL, NULL, 'Looking for good doctor', 'Looking for good doctor', 'Looking for good doctor', NULL, '2023-10-04', NULL, '2023-10-04', '04:54:59', NULL, NULL, 1, 1, '2023-10-04 04:00:07', '2023-10-04 04:54:59'),
(41, '1696400291190', 211, 374, 1, NULL, NULL, 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-10-04', NULL, '2023-10-04', '06:19:14', NULL, '5', 1, 1, '2023-10-04 04:00:07', '2023-10-04 06:19:14'),
(42, '1698485644233', 199, 348, 1, NULL, '[{\"q\":null,\"a\":\"How are you?\"},{\"q\":\"k\",\"a\":\"Welcome! How can I help with your medical question?\"},{\"q\":\"l\",\"a\":\"The Doctor can help. Just a couple quick questions before I transfer you. What are all your symptoms? Are you currently using any medications?\"},{\"q\":\"lll\",\"a\":\"What\'s your age and gender?\"},{\"q\":\"lkj\",\"a\":\"Anything else in your medical history you think the Doctor should know?\"},{\"q\":\"kmkmk\",\"a\":\"OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $10. While you\'re filling out that form, I\'ll tell the Neurologist about your situation and then connect you two.\"}]', 'Looking for good Doctor', 'Looking for good Doctor', 'Looking for good Doctor', NULL, '2023-10-28', '07:28:33', NULL, NULL, NULL, NULL, 0, 0, '2023-10-28 09:10:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conversation_details`
--

CREATE TABLE IF NOT EXISTS `conversation_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `conversation_id` int NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `is_sender` tinyint NOT NULL DEFAULT '0' COMMENT '1=customer,2=expert',
  `is_receiver` tinyint NOT NULL DEFAULT '0' COMMENT '1=customer,2=expert',
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chat_message_type` enum('text','image','video','file','audio','location','other','pdf') NOT NULL DEFAULT 'text',
  `sender_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unseen, 1=seen, 2=delete',
  `receiver_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unseen, 1=seen, 2=delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `conversation_details`
--

INSERT INTO `conversation_details` (`id`, `conversation_id`, `sender_id`, `receiver_id`, `is_sender`, `is_receiver`, `message`, `chat_message_type`, `sender_status`, `receiver_status`, `created_at`, `updated_at`) VALUES
(1, 5, 199, 320, 2, 1, 'hi', 'text', 1, 0, '2023-09-16 08:50:03', NULL),
(2, 7, 305, 321, 2, 1, 'hi', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(3, 8, 305, 319, 2, 1, 'hi', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(4, 9, 305, 316, 2, 1, 'hi', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(5, 9, 316, 22, 1, 2, 'ted', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(6, 9, 305, 316, 2, 1, 'hh', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(7, 9, 316, 22, 1, 2, 'jjj', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(8, 9, 305, 316, 2, 1, 'hello', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(9, 9, 305, 316, 2, 1, 'tuhin', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(10, 13, 211, 324, 2, 1, 'hi', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(11, 13, 211, 324, 2, 1, 'socket connections ', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(12, 13, 324, 20, 1, 2, '1021132132', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(13, 13, 211, 324, 2, 1, 'okay git it ', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(14, 13, 211, 324, 2, 1, 'Let\'s have a chat', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(15, 14, 322, 324, 2, 1, 'new doctoe', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(16, 14, 322, 324, 2, 1, 'test case', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(17, 13, 211, 324, 2, 1, 'jamshed', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(18, 14, 322, 324, 2, 1, 'gyr', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(19, 13, 211, 324, 2, 1, 'no text here', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(20, 14, 322, 324, 2, 1, 'ty', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(21, 13, 211, 324, 2, 1, 'another text ', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(22, 14, 322, 324, 2, 1, 'hhhfh', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(23, 13, 324, 20, 1, 2, 'ok', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(24, 13, 324, 20, 1, 2, 'jamshed', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(25, 14, 322, 324, 2, 1, 'test nabid', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(26, 14, 324, 23, 1, 2, 'nabid', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(27, 14, 322, 324, 2, 1, 'ttt', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(28, 14, 324, 23, 1, 2, 'bhai', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(29, 14, 324, 23, 1, 2, 'tetxttx', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(30, 14, 324, 23, 1, 2, 'text oaucen', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(31, 14, 322, 324, 2, 1, 'ted', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(32, 14, 324, 23, 1, 2, 'sadfasdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(33, 14, 324, 23, 1, 2, 'No text', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(34, 14, 322, 324, 2, 1, 'test tuhin', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(35, 14, 322, 324, 2, 1, 'ted', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(36, 14, 322, 324, 2, 1, 'tegd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(37, 14, 324, 23, 1, 2, 'tuhin bhai', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(38, 14, 322, 324, 2, 1, 'teeee', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(39, 14, 324, 23, 1, 2, 'asdfsadf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(40, 14, 322, 324, 2, 1, 'tecvxd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(41, 14, 324, 23, 1, 2, 'sdfsd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(42, 14, 322, 324, 2, 1, 'fccccc', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(43, 14, 322, 324, 2, 1, 'fccgg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(44, 14, 322, 324, 2, 1, 'tegd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(45, 14, 322, 324, 2, 1, 'ghhh', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(46, 14, 322, 324, 2, 1, 'bb', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(47, 14, 324, 23, 1, 2, 'new docket', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(48, 14, 324, 23, 1, 2, 'e kmn', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(49, 14, 322, 324, 2, 1, 'test tuhin', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(50, 14, 322, 324, 2, 1, 'test nabid', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(51, 14, 322, 324, 2, 1, 'ghh', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(52, 14, 324, 23, 1, 2, 'sdfgsdfg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(53, 11, 305, 321, 2, 1, 'ttt', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(54, 11, 305, 321, 2, 1, 'hhhd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(55, 14, 322, 324, 2, 1, 'ghn', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(56, 14, 322, 324, 2, 1, 'new', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(57, 14, 322, 324, 2, 1, 'newww', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(58, 14, 322, 324, 2, 1, 'okay', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(59, 11, 305, 321, 2, 1, 'Hi, I\'m Tuhin ', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(60, 11, 305, 321, 2, 1, 'Hi, ', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(61, 11, 305, 321, 2, 1, 'Hhf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(62, 14, 322, 324, 2, 1, 'okayyy', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(63, 15, 211, 324, 2, 1, 'hi', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(64, 15, 211, 324, 2, 1, 'text change from admin', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(65, 15, 211, 324, 2, 1, 'admin rating', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(66, 15, 324, 20, 1, 2, '4r', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(67, 15, 324, 20, 1, 2, 'ok', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(68, 16, 199, 321, 2, 1, 'hhhhhsh', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(69, 16, 321, 15, 1, 2, 'asdfsd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(70, 16, 199, 321, 2, 1, 'hdhhshhs', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(71, 16, 321, 15, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(72, 16, 321, 15, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(73, 16, 321, 15, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(74, 23, 198, 329, 2, 1, 'hi', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(75, 23, 198, 329, 2, 1, 'can I help you?', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(76, 28, 199, 368, 2, 1, 'hi', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(77, 28, 368, 15, 1, 2, 'ksdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(78, 28, 199, 368, 2, 1, 'ndnxbbdx', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(79, 28, 368, 15, 1, 2, 'askd fkasfd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(80, 28, 368, 15, 1, 2, 'asjfdk a', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(81, 28, 368, 15, 1, 2, 'sajfks f', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(82, 28, 368, 15, 1, 2, 'asfjkkjasf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(83, 28, 199, 368, 2, 1, 'nsnjdd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(84, 28, 368, 15, 1, 2, 'sajfs f', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(85, 28, 368, 15, 1, 2, 'asfdjsf ', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(86, 29, 199, 368, 2, 1, 'hddhhd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(87, 29, 368, 15, 1, 2, 'gyhjh', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(88, 29, 199, 368, 2, 1, 'shjddhjd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(89, 29, 368, 15, 1, 2, 'fghgfh', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(90, 29, 199, 368, 2, 1, 'jsnndnd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(91, 29, 368, 15, 1, 2, 'ghjhkl', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(92, 29, 368, 15, 1, 2, 'kl', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(93, 29, 368, 15, 1, 2, 'khl', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(94, 29, 368, 15, 1, 2, 'kl', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(95, 29, 368, 15, 1, 2, 'jhk\\', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(96, 29, 368, 15, 1, 2, 'jh', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(97, 29, 368, 15, 1, 2, 'g]', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(98, 29, 368, 15, 1, 2, 'jhk', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(99, 29, 368, 15, 1, 2, 'jjhg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(100, 29, 368, 15, 1, 2, 'fdg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(101, 29, 368, 15, 1, 2, 'sdg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(102, 29, 368, 15, 1, 2, 'dsf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(103, 29, 368, 15, 1, 2, 'gd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(104, 29, 368, 15, 1, 2, 'f', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(105, 29, 368, 15, 1, 2, 'sfd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(106, 29, 368, 15, 1, 2, 'sdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(107, 29, 368, 15, 1, 2, 'dfg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(108, 29, 368, 15, 1, 2, 'dfg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(109, 29, 368, 15, 1, 2, 'd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(110, 29, 368, 15, 1, 2, 'gd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(111, 29, 368, 15, 1, 2, 'fg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(112, 29, 368, 15, 1, 2, 'dg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(113, 29, 368, 15, 1, 2, 'dfg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(114, 29, 368, 15, 1, 2, 'dfg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(115, 29, 368, 15, 1, 2, 'd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(116, 29, 368, 15, 1, 2, 'gd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(117, 29, 368, 15, 1, 2, 'g', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(118, 32, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(119, 32, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(120, 32, 321, 20, 1, 2, 'Mks', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(121, 32, 321, 20, 1, 2, 'asdfsdfsdfsaddsf sdsdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(122, 32, 211, 321, 2, 1, 'sdfdfdsf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(123, 32, 321, 20, 1, 2, 'asdfsdfds', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(124, 32, 321, 20, 1, 2, 'K', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(125, 32, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(126, 32, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(127, 32, 211, 321, 2, 1, 'asd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(128, 32, 211, 321, 2, 1, 'asd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(129, 32, 211, 321, 2, 1, 'fas', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(130, 32, 211, 321, 2, 1, 'df', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(131, 32, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(132, 32, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(133, 32, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(134, 32, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(135, 32, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(136, 32, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(137, 32, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(138, 32, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(139, 32, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(140, 32, 321, 20, 1, 2, 'asd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(141, 32, 321, 20, 1, 2, 'asd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(142, 32, 321, 20, 1, 2, 'asd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(143, 32, 321, 20, 1, 2, 'ds', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(144, 32, 321, 20, 1, 2, 'ad', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(145, 32, 321, 20, 1, 2, 'asd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(146, 32, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(147, 32, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(148, 32, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(149, 32, 321, 20, 1, 2, 'asdfsdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(150, 32, 211, 321, 2, 1, 'https://cdn.jsdelivr.net/npm/emoji-datasource-apple/img/apple/64/1f606.png', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(151, 33, 199, 321, 2, 1, 'lol', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(152, 33, 321, 15, 1, 2, 'dfg', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(153, 33, 199, 321, 2, 1, 'hvjch', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(154, 34, 211, 321, 2, 1, 'sadf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(155, 34, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(156, 34, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(157, 34, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(158, 34, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(159, 35, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(160, 35, 211, 321, 2, 1, 'sdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(161, 35, 321, 20, 1, 2, 'asdfdsf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(162, 35, 321, 20, 1, 2, 'asdfds', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(163, 35, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(164, 35, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(165, 35, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(166, 35, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(167, 35, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(168, 35, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(169, 35, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(170, 35, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(171, 35, 211, 321, 2, 1, 'asdfasd sdf sdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(172, 35, 211, 321, 2, 1, 'https://cdn.jsdelivr.net/npm/emoji-datasource-apple/img/apple/64/1f606.png', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(173, 35, 211, 321, 2, 1, 'sasdf ;asdfl sa;sdlf ;asld f;la sdlfk ;alsfk; ;lsdfk; alsd', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(174, 35, 211, 321, 2, 1, 'In simple words, a linked list consists of nodes where each node contains a data field and a reference(link) to the next node in the list.', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(175, 36, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(176, 36, 321, 20, 1, 2, 'Hi', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(177, 36, 211, 321, 2, 1, 'https://cdn.jsdelivr.net/npm/emoji-datasource-apple/img/apple/64/1f606.png', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(178, 36, 321, 20, 1, 2, 'asdfsdfsdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(179, 37, 211, 321, 2, 1, 'Hu', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(180, 37, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(181, 37, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(182, 37, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-09-16 08:53:58', NULL),
(183, 38, 211, 321, 2, 1, 'Hi', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(184, 38, 321, 20, 1, 2, 'Hello', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(185, 38, 211, 321, 2, 1, 'https://cdn.jsdelivr.net/npm/emoji-datasource-apple/img/apple/64/1f606.png', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(186, 38, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(187, 38, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(188, 38, 211, 321, 2, 1, 'asdfasd sdf sdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(189, 39, 211, 321, 2, 1, 'sdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(190, 39, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(191, 39, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(192, 39, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(193, 39, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(194, 39, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(195, 40, 211, 321, 2, 1, 'asd', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(196, 40, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(197, 40, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(198, 40, 321, 20, 1, 2, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(199, 40, 211, 321, 2, 1, 'asdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(200, 40, 211, 321, 2, 1, 'sdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(201, 41, 211, 374, 2, 1, 'hi', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(202, 41, 374, 20, 1, 2, 'okayyy', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(203, 41, 374, 20, 1, 2, 'both end chat in', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(204, 41, 211, 374, 2, 1, 'dfgsdfg', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(205, 41, 211, 374, 2, 1, 'asdfasdfasdf', 'text', 1, 0, '2023-10-04 04:00:07', NULL),
(206, 42, 199, 348, 2, 1, 'so much headache ', 'text', 1, 0, '2023-10-28 09:10:03', NULL),
(207, 42, 199, 348, 2, 1, '?\n', 'text', 1, 0, '2023-10-28 09:10:03', NULL),
(208, 42, 348, 15, 1, 2, 'yes', 'text', 1, 0, '2023-10-28 09:10:03', NULL),
(209, 42, 199, 348, 2, 1, 'how many days ?', 'text', 1, 0, '2023-10-28 09:10:03', NULL),
(210, 42, 348, 15, 1, 2, '12*365 days', 'text', 1, 0, '2023-10-28 09:10:03', NULL),
(211, 42, 199, 348, 2, 1, 'wow still you alive 🤩', 'text', 1, 0, '2023-10-28 09:10:03', NULL),
(212, 42, 348, 15, 1, 2, 'no. I am in the grave..', 'text', 1, 0, '2023-10-28 09:10:03', NULL),
(213, 42, 199, 348, 2, 1, 'now i am worried ', 'text', 1, 0, '2023-10-28 09:10:03', NULL),
(214, 3, 199, 318, 2, 1, 'hi', 'text', 1, 0, '2023-10-29 06:21:39', NULL),
(215, 3, 199, 318, 2, 1, 'good luck', 'text', 1, 0, '2023-10-29 06:21:39', NULL),
(216, 42, 348, 199, 1, 2, 'my name is khan', 'text', 1, 0, '2023-10-29 06:21:39', NULL),
(217, 42, 348, 199, 1, 2, 'my name is khan', 'text', 1, 0, '2023-10-29 06:21:39', NULL),
(218, 42, 348, 199, 1, 2, 'my name is khan', 'text', 1, 0, '2023-10-29 06:21:39', NULL),
(219, 42, 199, 348, 2, 1, 'hi', 'text', 1, 0, '2023-10-29 06:21:39', NULL),
(220, 42, 348, 199, 1, 2, 'my name is khan', 'text', 1, 0, '2023-10-29 06:21:39', NULL),
(221, 42, 199, 348, 2, 1, 'hhfhef', 'text', 1, 0, '2023-10-29 06:21:39', NULL),
(222, 42, 348, 199, 1, 2, 'my name is khan', 'text', 1, 0, '2023-10-29 06:21:39', NULL),
(223, 42, 348, 199, 1, 2, 'customer question added', 'text', 1, 0, '2023-10-29 06:21:39', NULL),
(224, 42, 348, 199, 1, 2, 'customer question added', 'text', 1, 0, '2023-10-30 07:24:35', NULL),
(225, 42, 348, 199, 1, 2, 'customer question added', 'text', 1, 0, '2023-10-30 07:28:33', NULL),
(226, 42, 348, 199, 1, 2, 'customer question added', 'text', 1, 0, '2023-10-30 15:37:14', NULL),
(227, 42, 348, 199, 1, 2, 'customer question added', 'text', 1, 0, '2023-10-30 15:45:57', NULL),
(228, 42, 348, 199, 1, 2, 'Now sent from local', 'text', 1, 0, '2023-10-30 15:45:57', NULL),
(229, 42, 348, 199, 1, 2, 'Now sent from local', 'text', 1, 0, '2023-10-30 15:49:24', NULL),
(230, 42, 348, 199, 1, 2, 'Now sent from local', 'text', 1, 0, '2023-10-30 15:53:14', NULL),
(231, 42, 348, 199, 1, 2, 'Now sent from local', 'text', 1, 0, '2023-10-30 16:33:01', NULL),
(232, 42, 348, 199, 1, 2, 'Now sent from local', 'text', 1, 0, '2023-10-30 17:10:34', NULL),
(233, 42, 348, 199, 1, 2, 'Now sent from local', 'text', 1, 0, '2023-10-30 17:48:01', NULL),
(234, 42, 348, 199, 1, 2, 'Now sent from local', 'text', 1, 0, '2023-10-30 17:48:28', NULL),
(235, 42, 348, 199, 1, 2, 'Now sent from local', 'text', 1, 0, '2023-10-30 17:52:01', NULL),
(236, 42, 348, 199, 1, 2, 'Now sent from local', 'text', 1, 0, '2023-10-30 18:14:51', NULL),
(237, 42, 348, 199, 1, 2, 'customer question added', 'text', 1, 0, '2023-10-31 11:54:20', NULL),
(238, 42, 348, 199, 1, 2, 'my name is khan', 'text', 1, 0, '2023-10-31 11:54:20', NULL),
(239, 42, 348, 199, 1, 2, 'my name is khan', 'text', 1, 0, '2023-10-31 12:29:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `stripe_cus_id` varchar(200) DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `code`, `user_id`, `stripe_cus_id`, `country_id`, `name`, `email`, `phone`, `address`, `dob`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CUS1', 316, 'cus_OeBF1hzxjvz6K1', NULL, 'tuhin1', 'tuhin1@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-16 07:25:46', '2023-09-16 07:26:08'),
(2, 'CUS2', 317, 'cus_OeBUgrVXoeYbvf', NULL, 'tuhin2', 'tuhin2@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-16 07:40:32', '2023-09-16 07:41:11'),
(3, 'CUS3', 318, 'cus_OeBkrGks3AbqIo', NULL, 'tuhin3', 'tuhin3@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-16 07:56:51', '2023-09-16 07:57:19'),
(4, 'CUS4', 319, 'cus_OeBouetcsnr1L9', NULL, 'tuhin4', 'tuhin4@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-16 08:00:22', '2023-09-16 08:00:40'),
(5, 'CUS5', 320, 'cus_OeBzDiqZnq1Dmq', NULL, 'kivabil645', 'kivabil645@viicard.com', NULL, NULL, NULL, NULL, 1, '2023-09-16 08:11:37', '2023-09-16 08:12:06'),
(6, 'CUS6', 321, 'cus_OeEPat5USANhGP', 18, 'lol', 'lol@gmail.com', '878989789', '8lojkl', '2023-09-20', 'uploads/6517b48c1fa3c.png', 1, '2023-09-16 10:41:01', '2023-09-30 05:39:24'),
(7, 'CUS7', 323, 'cus_Oeab91AVGA7Pbg', NULL, 'podokap405', 'podokap405@ipnuc.com', NULL, NULL, NULL, NULL, 1, '2023-09-17 09:37:00', '2023-09-17 09:37:44'),
(8, 'CUS8', 324, 'cus_OeahTZtxXVM90t', NULL, 'hanipip120', 'hanipip120@tenjb.com', NULL, NULL, NULL, NULL, 1, '2023-09-17 09:43:26', '2023-09-17 09:44:03'),
(9, 'CUS9', 325, NULL, NULL, 'daneci1088', 'daneci1088@twugg.com', NULL, NULL, NULL, NULL, 1, '2023-09-17 12:31:53', '2023-09-17 12:31:53'),
(10, 'CUS10', 326, 'cus_Oex2twB2sDNRXs', NULL, 'admin23', 'admin23@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-18 08:46:31', '2023-09-18 08:48:26'),
(11, 'CUS11', 327, NULL, NULL, 'mks.tamin.bd', 'mks.tamin.bd@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-19 06:17:03', '2023-09-19 06:17:03'),
(12, 'CUS12', 328, NULL, NULL, 'lugnazuspa', 'lugnazuspa@gufum.com', NULL, NULL, NULL, NULL, 1, '2023-09-19 07:54:07', '2023-09-19 07:54:07'),
(13, 'CUS13', 329, 'cus_OfLbAUzIHK5KYd', NULL, 'jemox33929', 'jemox33929@tenjb.com', NULL, NULL, NULL, NULL, 1, '2023-09-19 10:10:57', '2023-09-19 10:11:31'),
(14, 'CUS14', 343, NULL, NULL, 'cc111', 'cc111@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-20 09:44:32', '2023-09-20 09:44:32'),
(15, 'CUS15', 346, NULL, NULL, 'customer', 'customer@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-24 03:53:40', '2023-09-24 03:53:40'),
(16, 'CUS16', 347, NULL, NULL, 'abc', 'abc@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-24 04:50:43', '2023-09-24 04:50:43'),
(17, 'CUS17', 348, 'cus_OtwnRWobOCYndL', NULL, 'a', 'a@a.com', NULL, NULL, NULL, NULL, 1, '2023-09-25 06:14:26', '2023-10-28 09:33:59'),
(18, 'CUS18', 349, 'cus_OhX9x43P5aGgIQ', NULL, 'ab', 'ab@ab.com', NULL, NULL, NULL, NULL, 1, '2023-09-25 06:15:11', '2023-09-25 06:15:57'),
(19, 'CUS19', 365, 'cus_OhcxLqla7DptCs', NULL, 'fdasdssf', 'fdasdssf@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-25 12:15:28', '2023-09-25 12:15:53'),
(20, 'CUS20', 366, 'cus_OhgjZK0sqgDuyy', NULL, 'kk', 'kk@k.com', NULL, NULL, NULL, NULL, 1, '2023-09-25 16:09:22', '2023-09-25 16:09:49'),
(21, 'CUS21', 367, 'cus_OhlqDgMjesBeAe', NULL, 'danny818', 'danny818@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-09-25 21:26:18', '2023-09-25 21:26:45'),
(22, 'CUS22', 368, 'cus_Ohu5rgK5KgQ9oM', NULL, 'llll', 'llll@l.com', NULL, NULL, NULL, NULL, 1, '2023-09-26 05:57:19', '2023-09-26 05:57:37'),
(23, 'CUS23', 374, 'cus_OkuDmldvE1Tbla', NULL, 'abcdabcd', 'abcdabcd@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-10-04 06:17:43', '2023-10-04 06:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `default_payment_setups`
--

CREATE TABLE IF NOT EXISTS `default_payment_setups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `payment_amount` float(10,1) DEFAULT NULL,
  `second_pay_amount` float(10,2) DEFAULT NULL,
  `rating_range` decimal(10,1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` timestamp NULL DEFAULT NULL,
  `updated_by` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `default_payment_setups`
--

INSERT INTO `default_payment_setups` (`id`, `payment_amount`, `second_pay_amount`, `rating_range`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 10.0, 10.00, 4.5, NULL, '2023-07-08 04:56:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doc_types`
--

CREATE TABLE IF NOT EXISTS `doc_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doc_types`
--

INSERT INTO `doc_types` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'Education', 1, '2023-06-21 03:55:06', '2023-06-21 03:55:06'),
(4, 'Certificate', 1, '2023-06-21 03:55:27', '2023-06-21 03:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE IF NOT EXISTS `experts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `sub_category_id` int DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `phone_code` varchar(8) DEFAULT NULL,
  `iso_code` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `state` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `zip_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `full_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gender` tinyint DEFAULT NULL COMMENT '1=male,2=female,3=other',
  `profile_photo_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `expert_in_bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `display_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `paypal_email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `rank_no` decimal(8,1) DEFAULT NULL,
  `security_alert` tinyint(1) DEFAULT '1',
  `status` tinyint DEFAULT '0' COMMENT '0=pending,1=active,2=suspend',
  `online_status` tinyint(1) DEFAULT '1' COMMENT '1=online,0=offline',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`id`, `code`, `user_id`, `category_id`, `sub_category_id`, `dob`, `country_id`, `phone_code`, `iso_code`, `address`, `state`, `zip_code`, `first_name`, `last_name`, `full_name`, `gender`, `profile_photo_url`, `expert_in_bio`, `display_name`, `email`, `paypal_email`, `phone`, `rank_no`, `security_alert`, `status`, `online_status`, `created_at`, `updated_at`) VALUES
(1, 'EXP1', 150, 1, NULL, '2023-08-10', 18, '+880', 'BD', 'Mirpur-1', 'Dhaka', '1212', 'Alan', 'Andro Lopez', 'Alan Andro Lopez', 1, 'uploads/64d4be4e45425.jpeg', '2023-08-10', 'Alan D. Lopez', 'mr@gmail.com', 'mr@gmail.com', '1515234339', NULL, 1, 1, 1, '2023-08-10 10:19:39', '2023-08-14 12:55:26'),
(2, 'EXP2', 151, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mr1', NULL, 'mr1', NULL, NULL, NULL, 'mr1', 'mr1@gmail.com', NULL, NULL, NULL, 1, 0, 1, '2023-08-10 10:21:21', '2023-08-10 10:21:21'),
(3, 'EXP3', 155, 1, NULL, '2023-08-01', 4, '+93', 'AF', 'dsd', 'Dhaka', '234455', 'Mishuva', 'Rahman', 'Mishuva Rahman', 1, NULL, NULL, 'Mishuva', 'mr2@gmail.com', 'sss@gmail.com', '015858565', NULL, 1, 1, 1, '2023-08-10 10:45:06', '2023-08-23 12:14:44'),
(4, 'EXP4', 158, 1, NULL, '2023-08-13', 18, '+880', 'BD', 'sherpur', '4885', '59446', 'Hafiz', 'Rahman', 'Hafiz Rahman', 1, NULL, NULL, 'Hafiz', 'hafijur300000@gmail.com', 'hafij@gmail.com', '1929995093', NULL, 1, 1, 1, '2023-08-13 08:53:53', '2023-08-14 11:09:58'),
(5, 'EXP5', 162, 1, NULL, '2023-08-14', 18, '880', NULL, 'Dhaka', 'Dhaka', '1212', 'Jamshed', 'Alam', 'Jamshed Alam', 1, 'uploads/651d52dba8852.png', NULL, 'Jamshed', 'doctor@gmail.com', 'doctor@gmail.com', '01585312132', NULL, 1, 1, 1, '2023-08-14 05:54:49', '2023-10-05 07:59:45'),
(6, 'EXP6', 184, 3, NULL, '2023-08-14', 1, '+93', 'AF', 'Dhaka', 'Dhaka', '1212', 'Mechanic', 'specialist', 'Mechanic specialist', 1, 'uploads/64da39ebc20b2.jpeg', NULL, 'Mechanic', 'mechanic@gmail.com', 'mechanic@gmail.com', '134646466', NULL, 1, 1, 1, '2023-08-14 14:25:55', '2023-08-14 15:26:25'),
(7, 'EXP7', 185, 3, NULL, '2023-08-14', 1, '+93', 'AF', 'Dhaka', 'Dhaka', '1212', 'Mech', 'Alam', 'Mech Alam', 1, NULL, NULL, 'Mech', 'mechanic2@gmail.com', 'mechanic2@gmail.com', '325588552', NULL, 1, 1, 1, '2023-08-14 14:28:33', '2023-08-14 15:26:13'),
(8, 'EXP8', 186, 4, NULL, '2023-08-14', 5, '+93', 'AF', 'Dhaka', 'Dhaka', '1212', 'electrician', 'Rahman', 'electrician Rahman', 1, 'uploads/64da3ab0a407e.jpeg', NULL, 'electrician', 'electrician@gmail.com', 'electrician@gmail.com', '352665236', NULL, 1, 1, 1, '2023-08-14 14:30:07', '2023-08-14 15:26:03'),
(9, 'EXP9', 187, 6, NULL, '2023-08-14', 5, '+93', 'AF', 'Dhaka', 'Dhaka', '2580', 'Tech', 'Specialist', 'Tech Specialist', 1, 'uploads/64da3b1bda640.jpeg', NULL, 'Tech', 'tech@gmail.com', 'tech@gmail.com', '352536552', NULL, 1, 1, 1, '2023-08-14 14:31:53', '2023-08-14 15:25:51'),
(10, 'EXP10', 188, 6, NULL, '2023-08-14', 1, '+93', 'AF', 'Dhaka', 'Dhaka', '2569', 'Tech s', 'Specialist', 'Tech s Specialist', 1, 'uploads/64da3b98d19c0.jpeg', NULL, 'Tech s', 'tech2@gmail.com', 'tech2@gmail.com', '366556999', NULL, 1, 1, 1, '2023-08-14 14:33:47', '2023-08-14 15:25:36'),
(11, 'EXP11', 189, 5, NULL, '2023-08-14', 1, '+93', 'AF', 'Dhaka', 'Dhaka', '1245', 'vet', 'veterinarian', 'vet veterinarian', 1, 'uploads/64da3bf20174c.jpeg', NULL, 'vet', 'vet@gmail.com', 'vet@gmail.com', '265365985', NULL, 1, 1, 1, '2023-08-14 14:35:34', '2023-08-14 15:25:23'),
(12, 'EXP12', 190, 5, NULL, '2023-08-14', 4, '+93', 'AF', 'Dhaka', 'Dhaka', '3521', 'Another Vaterian', 'second', 'Another Vaterian second', 1, NULL, NULL, 'Another Vaterian', 'vat2@gmail.com', 'vat2@gmail.com', '652366555', NULL, 1, 1, 1, '2023-08-14 14:37:27', '2023-08-14 15:25:09'),
(13, 'EXP13', 191, 4, NULL, '2023-08-14', 5, '+93', 'AF', 'CTG', 'Dhaka', '6525', 'electrician1', 'second', 'electrician1 second', 1, 'uploads/64da3d732d4d0.jpeg', NULL, 'electrician1', 'electrician3@gmail.com', 'electrician3@gmail.com', '652566256', NULL, 1, 1, 1, '2023-08-14 14:39:42', '2023-08-17 08:48:27'),
(14, 'EXP14', 198, 2, NULL, '2023-08-17', 2, NULL, NULL, 'Dhaka', '2121', '12122', 'lawyer', 'Asaa', 'lawyer Asaa', 1, 'uploads/64de081d23352.jpeg', NULL, 'lawyer', 'lawyer@gmail.com', 'abcd@gmail.com', '12121212', NULL, 1, 1, 1, '2023-08-17 11:36:13', '2023-08-17 11:44:29'),
(15, 'EXP15', 199, 1, NULL, '2023-08-17', 18, '+880', 'BD', 'sherpur thanaghat', 'nzxn', '12348', 'Md Hafijur', 'Rahman', 'Md Hafijur Rahman', 1, 'uploads/64de08a285636.jpeg', NULL, 'Md Hafijur', 'doctor_hafij@gmail.com', 'hafij@gmail.com', '1929995093', NULL, 1, 1, 1, '2023-08-17 11:37:17', '2023-10-04 06:43:51'),
(16, 'EXP16', 204, 2, NULL, '2023-08-20', 1, '+93', 'AF', 'dfdf', 'daa', '2432', 'mr5', 'Rahman', 'mr5 Rahman', 1, NULL, NULL, 'mr5', 'mr5@gmail.com', 'mr@ffd.vo', '232324443', NULL, 1, 1, 1, '2023-08-20 11:33:48', '2023-08-20 11:38:17'),
(17, 'EXP17', 205, 3, NULL, '2023-08-21', 3, '+93', 'AF', 'cfddd', 'unjo', '5244', 'igiggi', 'owjjs', 'igiggi owjjs', 1, NULL, NULL, 'igiggi', 'mr10@gmail.com', 'hvea@hh.bom', '151523433', NULL, 1, 1, 1, '2023-08-21 08:57:31', '2023-08-21 09:12:14'),
(18, 'EXP18', 207, 1, NULL, '2023-08-22', 2, NULL, NULL, NULL, 'Bangaldesh', '1260', 'Mostafiz', 'Rahman', 'Mostafiz Rahman', 1, NULL, NULL, 'mr11', 'mostafiz@gmail.com', NULL, '12323243434', NULL, 1, 1, 1, '2023-08-22 05:32:30', '2023-08-22 09:15:31'),
(19, 'EXP19', 210, 1, NULL, '2023-08-22', 1, '+93', 'AF', 'bd', 'dhaka', '2539', 'mr12', 'Rahman', 'mr12 Rahman', 1, NULL, NULL, 'mr12', 'mr12@gmail.com', 'ubh@gmail.com', '172090990', NULL, 1, 1, 1, '2023-08-22 10:38:12', '2023-08-22 10:41:23'),
(20, 'EXP20', 211, 1, NULL, '2023-08-22', 18, '880', NULL, 'Dhaka', 'Dhaka', '1212', 'doctorr', 'aboyr', 'doctorr aboyr', 1, 'uploads/64e4a42246f58.jpeg', NULL, 'doctorr', 'doctorr@gmail.com', 'doctorr@gmail.com', '0164312346', NULL, 1, 1, 1, '2023-08-22 12:00:16', '2023-10-05 03:14:14'),
(21, 'EXP21', 290, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tdoctor', NULL, 'tdoctor', NULL, NULL, NULL, 'tdoctor', 'tdoctor@gmail.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-11 12:19:32', '2023-09-11 12:19:32'),
(22, 'EXP22', 305, 2, NULL, '1994-09-08', 2, '+880', 'BD', 'Address', 'Test', '7000', 'tulawyer', 'sarker', 'tulawyer sarker', 1, NULL, NULL, 'tulawyer', 'tulawyer@gmail.com', 'tt@gmail.com', '1751194212', NULL, 1, 1, 1, '2023-09-14 04:49:05', '2023-09-16 10:56:38'),
(23, 'EXP23', 322, 1, NULL, '2023-09-17', 1, '+93', 'AF', 'Dhaka', 'Dhaka', '2580', 'Nabid', 'Mahmud', 'Nabid Mahmud', 1, 'uploads/6506c860affaf.jpeg', NULL, 'Nabid', 'nabid@gmail.com', 'nabid@gmail.com', '255885665', NULL, 1, 1, 1, '2023-09-17 09:31:09', '2023-09-17 09:36:35'),
(24, 'EXP24', 330, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mks', NULL, 'Mks', NULL, NULL, NULL, 'Mks', 'mks@g.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:01:47', '2023-09-20 08:01:47'),
(25, 'EXP25', 331, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tamin', NULL, 'tamin', NULL, NULL, NULL, 'tamin', 'k@k.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:03:53', '2023-09-20 08:03:53'),
(26, 'EXP26', 332, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdf', NULL, 'asdf', NULL, NULL, NULL, 'asdf', 'asd@g.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:08:05', '2023-09-20 08:08:05'),
(27, 'EXP27', 333, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfasdf', NULL, 'asdfasdf', NULL, NULL, NULL, 'asdfasdf', 'asd@f.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:09:30', '2023-09-20 08:09:30'),
(28, 'EXP28', 334, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfdsfdsfdf', NULL, 'asdfdsfdsfdf', NULL, NULL, NULL, 'asdfdsfdsfdf', 'asdfadf@ad.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:11:00', '2023-09-20 08:11:00'),
(29, 'EXP29', 335, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfgyrtr', NULL, 'dfgyrtr', NULL, NULL, NULL, 'dfgyrtr', 'dsfgfgh@g.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:12:12', '2023-09-20 08:12:12'),
(30, 'EXP30', 336, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdpp', NULL, 'asdpp', NULL, NULL, NULL, 'asdpp', 'p@p.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:14:51', '2023-09-20 08:14:51'),
(31, 'EXP31', 337, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asd', NULL, 'asd', NULL, NULL, NULL, 'asd', 'asdfdf@a.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:15:47', '2023-09-20 08:15:47'),
(32, 'EXP32', 338, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfj', NULL, 'asdfj', NULL, NULL, NULL, 'asdfj', 'adsf@a.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:17:31', '2023-09-20 08:17:31'),
(33, 'EXP33', 339, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdf asd', NULL, 'asdf asd', NULL, NULL, NULL, 'asdf asd', 'adfm@ad.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:18:08', '2023-09-20 08:18:08'),
(34, 'EXP34', 340, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdf asdfsdf dsf', NULL, 'asdf asdfsdf dsf', NULL, NULL, NULL, 'asdf asdfsdf dsf', 'h@d.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:19:33', '2023-09-20 08:19:33'),
(35, 'EXP35', 341, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mksssss', NULL, 'mksssss', NULL, NULL, NULL, 'mksssss', 'mksss@g.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-20 08:51:59', '2023-09-20 08:51:59'),
(36, 'EXP36', 342, 1, NULL, '2022-01-04', 1, '880', NULL, 'asdfsdf', 'sdfsdfsdf-29', '85525', 'Md', 'Jumsed', 'Md Jumsed', 1, 'uploads/6517afbb8d844.png', NULL, 'Md', 'jumsed@gmail.com', 'jumsed@gmail.com', '0128562545', NULL, 1, 0, 1, '2023-09-20 09:04:43', '2023-09-30 05:18:51'),
(37, 'EXP37', 344, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lllll', NULL, 'lllll', NULL, NULL, NULL, 'lllll', 'lllll@gmail.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-21 09:25:45', '2023-09-21 09:25:45'),
(38, 'EXP38', 345, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ahad', NULL, 'ahad', NULL, NULL, NULL, 'ahad', 'ahad@gmail.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-21 11:22:47', '2023-09-21 11:22:47'),
(39, 'EXP39', 350, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aaaa', NULL, 'aaaa', NULL, NULL, NULL, 'aaaa', 'ea@a.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:18:23', '2023-09-25 06:18:23'),
(40, 'EXP40', 351, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bbbbb', NULL, 'bbbbb', NULL, NULL, NULL, 'bbbbb', 'eb@b.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:20:07', '2023-09-25 06:20:07'),
(41, 'EXP41', 352, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfdsf', NULL, 'asdfdsf', NULL, NULL, NULL, 'asdfdsf', 'asd@a.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:21:46', '2023-09-25 06:21:46'),
(42, 'EXP42', 353, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfg', NULL, 'dfg', NULL, NULL, NULL, 'dfg', 's@asdf.cp', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:23:46', '2023-09-25 06:23:46'),
(43, 'EXP43', 354, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdsdf', NULL, 'asdsdf', NULL, NULL, NULL, 'asdsdf', 'asdfd@asdfl.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:25:43', '2023-09-25 06:25:43'),
(44, 'EXP44', 355, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pjjjj', NULL, 'pjjjj', NULL, NULL, NULL, 'pjjjj', 'ppsd@p.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:26:53', '2023-09-25 06:26:53'),
(45, 'EXP45', 356, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfdsfdsfsdfds', NULL, 'asdfdsfdsfsdfds', NULL, NULL, NULL, 'asdfdsfdsfsdfds', 'pasdpf@pasd.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:28:03', '2023-09-25 06:28:03'),
(46, 'EXP46', 357, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfsdfsf', NULL, 'asdfsdfsf', NULL, NULL, NULL, 'asdfsdfsf', 'asdfsaf@c.csd', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:28:36', '2023-09-25 06:28:36'),
(47, 'EXP47', 358, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfsdfspapd', NULL, 'asdfsdfspapd', NULL, NULL, NULL, 'asdfsdfspapd', 'pppppp@lc.on', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:29:11', '2023-09-25 06:29:11'),
(48, 'EXP48', 359, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Compiler', NULL, 'Compiler', NULL, NULL, NULL, 'Compiler', 'compiler@co.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:31:42', '2023-09-25 06:31:42'),
(49, 'EXP49', 360, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfdsfsdfsadf', NULL, 'asdfdsfsdfsadf', NULL, NULL, NULL, 'asdfdsfsdfsadf', 'pasdfdf@lksdf.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:32:50', '2023-09-25 06:32:50'),
(50, 'EXP50', 361, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pppppp', NULL, 'pppppp', NULL, NULL, NULL, 'pppppp', 'pppp@d.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:34:17', '2023-09-25 06:34:17'),
(51, 'EXP51', 362, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdfdsfsdfsdf', NULL, 'asdfdsfsdfsdf', NULL, NULL, NULL, 'asdfdsfsdfsdf', 'oppp@lasd.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:36:27', '2023-09-25 06:36:27'),
(52, 'EXP52', 363, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'house', NULL, 'house', NULL, NULL, NULL, 'house', 'house@house.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-25 06:37:30', '2023-09-25 06:37:30'),
(53, 'EXP53', 364, 5, NULL, '1997-02-26', 21, '1268', NULL, 'Dhaka', 'Uttara', '556564', 'Mks', 'Tamin', 'Mks Tamin', 1, 'uploads/651173f4b7064.jpeg', NULL, 'Mks', 'mks@mks.com', 'mks@mks.com', '1546456456', NULL, 1, 0, 1, '2023-09-25 06:41:26', '2023-09-25 11:50:12'),
(54, 'EXP54', 369, 2, NULL, '2023-09-01', 18, '880', NULL, 'sdfdsfdsfdsf', 'sdfsdfdsf', '454', 'sdf', 'asdfdsfdsf', 'sdf asdfdsfdsf', 3, 'uploads/6513c97394601.png', NULL, 'sdf', 'as@s.com', 'as@s.com', '45546456456456', NULL, 1, 0, 1, '2023-09-27 06:17:26', '2023-09-27 06:19:51'),
(55, 'EXP55', 370, 3, NULL, '2023-09-01', 18, '880', NULL, 'asdfdsf', 'asdfdsf', '474', 'asdasdf', 'asdf', 'asdasdf asdf', 3, 'uploads/6513cc2b2be88.png', NULL, 'asdasdf', 'asd@o.com', 'asd@o.com', '84545452', NULL, 1, 0, 1, '2023-09-27 06:30:03', '2023-09-27 06:34:37'),
(56, 'EXP56', 371, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lllllll', NULL, 'Lllllll', NULL, NULL, NULL, 'Lllllll', 'msk@m.com', NULL, NULL, NULL, 1, 0, 1, '2023-09-27 06:49:56', '2023-09-27 06:49:56'),
(57, 'EXP57', 372, 1, NULL, '2022-01-04', 1, '+880', NULL, NULL, 'dddd-29', '85525', 'Md', 'mmmm', 'Md mmmm', 1, 'uploads/6513f74442ebe.jpeg', NULL, 'tuhin', 'mmm@gmail.com', NULL, '0128562545', NULL, 1, 0, 1, '2023-09-27 07:17:32', '2023-09-27 09:35:00'),
(58, 'EXP58', 373, 1, NULL, '2022-01-04', 2, '355', NULL, 'sdsf sdf sfdsdf', 'dddd-29', '85525', 'Md sdfsf', 'mmmm', 'Md sdfsf mmmm', 1, 'uploads/6514045a4cca3.png', NULL, 'Md sdfsf', 'mmm@gmail.com', 'mmm@gmail.com', '0128562545', NULL, 1, 0, 1, '2023-09-27 07:22:02', '2023-10-02 06:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `expert_balances`
--

CREATE TABLE IF NOT EXISTS `expert_balances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expert_id` int DEFAULT NULL,
  `balance` float(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expert_balances`
--

INSERT INTO `expert_balances` (`id`, `expert_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, NULL, 10.00, NULL, NULL),
(2, 199, 478.00, NULL, NULL),
(3, 211, 91.00, NULL, NULL),
(4, 322, 25.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expert_categories`
--

CREATE TABLE IF NOT EXISTS `expert_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stripe_code` varchar(255) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `icon_path` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image_path` varchar(200) DEFAULT NULL,
  `payment_amount` float(8,2) DEFAULT NULL,
  `second_pay_amount` float(10,2) DEFAULT NULL,
  `rating_range` float(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expert_categories`
--

INSERT INTO `expert_categories` (`id`, `code`, `stripe_code`, `name`, `is_active`, `icon_path`, `image_path`, `payment_amount`, `second_pay_amount`, `rating_range`, `created_at`, `updated_at`) VALUES
(1, 'CAT-1', 'CAT-1', 'Doctor', 1, 'expert_category/x7hEIlY2rvhgOkORCZpFkFZS5Vwj2eZuPqqxbauJ.png', 'expert_category/faoB7ZK1GnrwXS4SiTZn9sD9XygPz3LqCNWSbYEl.png', 25.00, 2.00, 2.50, '2023-08-10 10:34:23', '2023-08-29 12:51:45'),
(2, 'CAT-2', 'CAT-2', 'Lawyer', 1, 'expert_category/rM4CbiNStoC9xECSG6fxbcQc6NHtxmnrk2gKF9A2.png', 'expert_category/hxfdY9nOv4SC8MTFddaR3AJCvrvHSzGZDeOBtyms.png', 10.00, 20.00, 3.00, '2023-08-14 11:12:08', '2023-08-29 12:47:35'),
(3, 'CAT-3', 'CAT-3', 'Mechanic', 1, 'expert_category/5ozFocgHFmqO6iHun3vAZGFrFvLTWmyouI3OJSVs.png', 'expert_category/m0M5IAY7BIJtEdydE7H1NgYYPOf3SkXgbk2D6U2E.png', 20.00, 3.00, 3.00, '2023-08-14 11:14:04', '2023-08-29 12:47:21'),
(4, 'CAT-4', 'CAT-4', 'Electricians', 1, 'expert_category/z1zh3y4fZXZ4MakRVfJ4ZqEnWo6WvMad0V2E9ARO.png', 'expert_category/z9DZOS0SONu9jM26z8nGbYD9NrsxpKeeKWf6vhxf.png', 30.00, 5.00, 3.00, '2023-08-14 11:15:20', '2023-08-29 12:47:48'),
(5, 'CAT-5', 'CAT-5', 'Vet', 1, 'expert_category/SmAqK5TA536zLTKSIE6jdg7d40RZzP2tF0j6oiPc.png', 'expert_category/7toyQuygP9Y8hIno1l4nSaj4PldsjKUQPbmWec85.png', 15.00, 5.00, 3.00, '2023-08-14 11:17:53', '2023-08-29 12:47:06'),
(6, 'CAT-6', 'CAT-6', 'Tech', 1, 'expert_category/8U34WuhZsACKTiGzKxG8i27Wb8Nw5pwc1RKySxPy.jpg', NULL, 50.00, 9.00, 3.00, '2023-08-14 11:19:19', '2023-08-14 12:08:31'),
(7, 'CAT-7', 'CAT-7', 'Electrician', 1, 'expert_category/DmneaVxIcHaMXkdJgIGWIn5hewbgqeh7vF3hTavH.jpg', 'expert_category/uzxxbhW6wodJgG8kPm6hHMbWKvmoHg4PqSG1SaIt.jpg', 10.00, 5.00, 2.00, '2023-09-03 07:48:43', '2023-09-03 07:48:43'),
(8, 'CAT-8', 'CAT-8', 'Plumber', 1, 'expert_category/HDdRiDRINh0v8cyvPeceGwaw9mo1MA605qVqYt4j.png', 'expert_category/QzdN6DuALOAqUSlRkr7v6shu2px6bQnHj2wKtLag.png', 20.00, 5.00, 2.00, '2023-09-03 07:49:08', '2023-09-03 07:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `expert_documents`
--

CREATE TABLE IF NOT EXISTS `expert_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expert_id` int NOT NULL,
  `doc_type_id` int DEFAULT NULL,
  `doc_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `doc_valid_date` date DEFAULT NULL,
  `doc_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expert_documents`
--

INSERT INTO `expert_documents` (`id`, `expert_id`, `doc_type_id`, `doc_number`, `doc_valid_date`, `doc_path`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '93434343434', '2023-08-10', 'doc/64d4bcb73c3f8.jpeg', '2023-08-10 10:32:23', '2023-08-10 10:39:57'),
(2, 3, 3, 'dfdfdf', '2023-08-10', 'doc/64d4c02ad13bd.jpeg', '2023-08-10 10:47:06', '2023-08-10 10:47:06'),
(3, 4, 3, 'nsnzkzzjjs', '2023-08-13', 'doc/64d8af755d705.jpeg', '2023-08-13 10:24:53', '2023-08-13 10:24:53'),
(4, 16, 3, 'dfdf', '2023-08-20', 'doc/64e1fa9855c27.jpeg', '2023-08-20 11:35:52', '2023-08-20 11:35:52'),
(5, 17, 3, 'he dn no', '2023-08-21', 'doc/64e327bcaca16.jpeg', '2023-08-21 09:00:44', '2023-08-21 09:00:44'),
(6, 19, 3, 'uh77', '2023-08-22', 'doc/64e4908d16a4f.jpeg', '2023-08-22 10:40:13', '2023-08-22 10:40:13'),
(7, 22, 3, 'Documentation', '2023-09-14', 'doc/6502995e41e05.jpeg', '2023-09-14 05:25:50', '2023-09-16 11:28:42'),
(8, 3, 4, '123', '2022-01-04', 'doc/65127c20c0ce7.jpeg', '2023-09-26 06:37:20', '2023-09-26 06:37:20'),
(9, 36, 2, '455454', '2023-05-10', 'doc/65179eaf57882.png', '2023-09-26 11:45:13', '2023-09-30 04:06:07'),
(10, 36, 2, '555555', '2023-09-06', 'doc/65179ecfece75.png', '2023-09-26 11:45:39', '2023-09-30 04:06:39'),
(11, 54, 1, '5645', '2023-09-15', 'doc/6513ca9aed67e.png', '2023-09-27 06:21:58', '2023-09-27 06:24:26'),
(12, 54, 2, '554554', '2023-09-08', 'doc/6513ca803bbd8.png', '2023-09-27 06:24:00', '2023-09-27 06:24:00'),
(13, 58, 3, '123234234', '2022-01-04', 'doc/6514161593c26.png', '2023-09-27 07:34:56', '2023-09-27 11:46:29'),
(14, 58, 1, '123', '2022-01-04', '', '2023-09-27 07:35:21', '2023-09-27 11:39:01'),
(15, 58, 4, '123', '2022-01-04', 'doc/6514159ce2c09.jpeg', '2023-09-27 09:48:40', '2023-09-27 11:44:28'),
(16, 58, 4, '123', '2022-01-04', 'doc/6514161596a06.jpeg', '2023-09-27 11:46:29', '2023-09-27 11:46:29'),
(17, 36, 1, '85544', '2023-09-14', 'doc/65179f021fd08.jpeg', '2023-09-30 04:07:30', '2023-09-30 04:08:27'),
(18, 20, NULL, '4555', '2023-10-02', 'doc/651aa939e2c84.png', '2023-10-02 11:27:53', '2023-10-02 11:27:53'),
(19, 20, 2, '455', '2023-09-05', 'doc/651bec2935118.png', '2023-10-03 10:25:45', '2023-10-03 10:25:45'),
(20, 5, 2, '45545', '2023-10-04', 'doc/651d531220c59.png', '2023-10-04 11:57:06', '2023-10-04 11:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `expert_educations`
--

CREATE TABLE IF NOT EXISTS `expert_educations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expert_id` int NOT NULL,
  `degree` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pass_year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `institute_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expert_educations`
--

INSERT INTO `expert_educations` (`id`, `expert_id`, `degree`, `pass_year`, `institute_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'MBBS', '2022', 'DU', '2023-08-10 10:25:33', '2023-08-10 10:39:16'),
(2, 3, 'Bbadfdf', '2424', '3dfdfcv', '2023-08-10 10:46:31', '2023-08-23 04:56:49'),
(3, 4, 'ssc', '2007', 'victoria', '2023-08-13 10:22:32', '2023-08-13 10:22:32'),
(4, 15, 'ssc', '2025', 'victoria academy', '2023-08-17 11:42:00', '2023-09-26 07:47:47'),
(5, 16, 'dd', '324', 'dfdf', '2023-08-20 11:35:03', '2023-08-20 11:35:03'),
(6, 17, 'ubeiwj', '352', 'jbeiwh', '2023-08-21 09:00:02', '2023-08-21 09:00:02'),
(7, 19, 'ufbm', '258', 'lkhu', '2023-08-22 10:39:33', '2023-08-22 10:39:33'),
(8, 3, 'BBA', '2020', 'NU', '2023-08-23 04:13:23', '2023-08-23 04:56:49'),
(9, 20, 'SSC', '2009', 'Sherpur Govt Victoria Academy', '2023-09-10 06:57:35', '2023-10-04 11:58:43'),
(10, 22, 'Degree', '2022', 'Institue Name', '2023-09-14 05:24:52', '2023-09-16 11:28:15'),
(11, 15, 'testsss', '2022', 'ssss', '2023-09-26 04:31:29', '2023-09-26 07:47:47'),
(12, 3, 'testsss', '2022', 'ssss', '2023-09-26 06:02:04', '2023-09-26 06:02:04'),
(13, 3, NULL, '2022', 'ssss', '2023-09-26 06:02:27', '2023-09-26 06:02:27'),
(14, 3, NULL, '2022', 'ssss', '2023-09-26 06:02:38', '2023-09-26 06:02:38'),
(15, 3, NULL, '2022', 'ssss', '2023-09-26 06:02:54', '2023-09-26 06:02:54'),
(16, 3, NULL, '2022', 'ssss', '2023-09-26 06:03:18', '2023-09-26 06:03:18'),
(17, 3, NULL, '2022', 'ssss', '2023-09-26 06:03:18', '2023-09-26 06:03:18'),
(18, 3, NULL, NULL, 'ssss', '2023-09-26 06:03:22', '2023-09-26 06:03:22'),
(19, 3, NULL, '2022', 'ssss', '2023-09-26 06:03:22', '2023-09-26 06:03:22'),
(20, 3, NULL, NULL, NULL, '2023-09-26 06:03:26', '2023-09-26 06:03:26'),
(21, 3, NULL, '2022', 'ssss', '2023-09-26 06:03:26', '2023-09-26 06:03:26'),
(22, 3, NULL, NULL, NULL, '2023-09-26 06:03:40', '2023-09-26 06:03:40'),
(23, 3, NULL, '2022', 'ssss', '2023-09-26 06:03:40', '2023-09-26 06:03:40'),
(24, 3, NULL, NULL, NULL, '2023-09-26 06:03:48', '2023-09-26 06:03:48'),
(25, 3, NULL, '2022', 'ssss', '2023-09-26 06:03:48', '2023-09-26 06:03:48'),
(26, 3, NULL, NULL, NULL, '2023-09-26 06:03:56', '2023-09-26 06:03:56'),
(27, 3, 'testsss', '2022', 'ssss', '2023-09-26 06:04:26', '2023-09-26 06:04:26'),
(28, 3, 'testsss', '2022', 'ssss', '2023-09-26 06:35:23', '2023-09-26 06:35:23'),
(29, 36, 'MMMMMt', '2022', 'ssss', '2023-09-26 06:41:26', '2023-09-27 03:54:47'),
(30, 36, 'testsss', '2022', 'ssss', '2023-09-26 06:41:26', '2023-09-27 03:54:47'),
(31, 36, 'TTTTTT', '2022', 'ssss', '2023-09-26 06:44:47', '2023-09-27 03:54:47'),
(32, 15, 'testssstttttttttttttttttttttttttttttttttt', '2022', 'ssss', '2023-09-26 06:53:41', '2023-09-26 07:47:47'),
(33, 15, 'testsss', '2022', 'ssss', '2023-09-26 06:53:41', '2023-09-26 07:47:47'),
(34, 15, 'testssstttttttttttttttttttttttttttttttttt', '2022', 'ssss', '2023-09-26 06:53:56', '2023-09-26 07:47:47'),
(35, 15, 'testsss', '2022', 'ssss', '2023-09-26 06:53:56', '2023-09-26 07:47:47'),
(36, 36, 'asdfasdfsfssdfsdfsdfsdfsdfsfsdf nwew', '5555', 'ddddddddddddddddddddddddddddddsdfsasdf', '2023-09-26 07:02:31', '2023-09-27 03:54:47'),
(37, 58, 'Mks', '4555', 'asdfsdf', '2023-09-27 07:32:18', '2023-09-27 11:13:23'),
(38, 20, 'HSC', '2011', 'Sherpur Govt Victoria Academy', '2023-10-03 10:23:45', '2023-10-04 11:58:43'),
(39, 5, 'Mks', '5445', '<sdfasdf', '2023-10-04 11:56:26', '2023-10-04 11:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `expert_jobs`
--

CREATE TABLE IF NOT EXISTS `expert_jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expert_id` int NOT NULL,
  `company_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `designation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `employer_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `employer_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_continue` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expert_jobs`
--

INSERT INTO `expert_jobs` (`id`, `expert_id`, `company_name`, `designation`, `start_date`, `end_date`, `employer_name`, `employer_number`, `is_continue`, `created_at`, `updated_at`) VALUES
(1, 1, 'DMCH', 'DR', '2023-08-10', '2023-08-10', 'Mostafizur', '0939438483843', 0, '2023-08-10 10:31:06', '2023-08-10 10:39:50'),
(2, 1, 'Navalid', 'nurse', '2023-08-10', NULL, 'dfdf', '333333', 1, '2023-08-10 10:39:50', '2023-08-10 10:39:50'),
(3, 3, 'Bdtask', 'Sr. Flutter Developer', '2023-08-10', NULL, 'Md. Mostafiur Rahman', '162', 1, '2023-08-10 10:46:49', '2023-08-23 04:58:16'),
(4, 4, 'bdtask', 'Laravel developer', '2023-08-13', '2023-08-13', 'bdtask', '01929995093', 0, '2023-08-13 10:23:31', '2023-08-13 10:23:31'),
(5, 16, 'dfdf', 'ssfs', '2023-08-20', NULL, 'fdfdf', '3333', 1, '2023-08-20 11:35:24', '2023-08-20 11:35:24'),
(6, 17, 'hbdis', 'ijend', '2023-08-21', NULL, 'kmsks', '66943499464', 1, '2023-08-21 09:00:26', '2023-08-21 09:00:26'),
(7, 19, 'itgj', 'ouuh', '2023-08-22', NULL, 'okk', '6666', 1, '2023-08-22 10:39:53', '2023-08-22 10:39:53'),
(8, 22, 'Update Information', 'Update Information', '2023-09-14', '2023-09-16', 'Update Information', '22', 1, '2023-09-14 05:25:18', '2023-09-16 11:29:17'),
(9, 36, 'asdfdsf', 'asdfsdfsdfdsaf', '2023-06-28', NULL, 'asdf', '4554', 1, '2023-09-26 09:29:20', '2023-09-26 09:30:47'),
(10, 36, 'asfsfsdfsdf', 'asfsdfsafsdf', '2023-06-06', '2023-09-26', 'asdfdsfdsfdsf', '54545445', 0, '2023-09-26 09:30:47', '2023-09-26 09:30:47'),
(11, 58, 'asdfds', 'asdfsdfsdf', '2023-09-02', NULL, 'asdfsdf', '54545', 1, '2023-09-27 07:32:37', '2023-09-27 11:13:51'),
(12, 20, 'bdtask', 'dr', '2023-08-03', '2023-10-12', 'doctor', '255', 1, '2023-10-03 10:25:10', '2023-10-04 10:46:52'),
(13, 20, 'bdtask', 'dr', '2023-07-06', '2023-10-04', 'doctor', '5445', 0, '2023-10-04 10:46:52', '2023-10-04 10:46:52'),
(14, 5, 'asdf', 'asdf', '2023-08-02', '2023-10-04', 'asdfsdf', '47', 1, '2023-10-04 11:56:49', '2023-10-05 03:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `expert_payment_setups`
--

CREATE TABLE IF NOT EXISTS `expert_payment_setups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expert_id` int NOT NULL,
  `pay_amount` float(10,2) NOT NULL,
  `second_pay_amount` float(8,2) DEFAULT NULL,
  `rating_range` float DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expert_pay_accounts`
--

CREATE TABLE IF NOT EXISTS `expert_pay_accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expert_id` int NOT NULL,
  `card_type_id` int NOT NULL,
  `payment_method_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `valid_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expert_reviews`
--

CREATE TABLE IF NOT EXISTS `expert_reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `conversation_id` int NOT NULL,
  `expert_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `review` text NOT NULL,
  `rating` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expert_reviews`
--

INSERT INTO `expert_reviews` (`id`, `conversation_id`, `expert_id`, `customer_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(1, 83, 199, 285, 'Please', 4.00, '2023-09-11 09:42:36', '2023-09-11 09:42:36'),
(2, 86, 199, 286, 'Please', 4.00, '2023-09-11 10:37:31', '2023-09-11 10:37:31'),
(3, 88, 199, 287, 'Please', 5.00, '2023-09-11 10:53:59', '2023-09-11 10:53:59'),
(4, 94, 199, 292, 'Please', 4.50, '2023-09-12 08:33:17', '2023-09-12 08:33:17'),
(5, 113, 211, 306, 'Please', 5.00, '2023-09-14 05:15:55', '2023-09-14 05:15:55'),
(6, 114, 211, 306, 'Please', 5.00, '2023-09-14 05:37:44', '2023-09-14 05:37:44'),
(7, 123, 199, 307, 'Please', 4.50, '2023-09-14 08:20:24', '2023-09-14 08:20:24'),
(8, 123, 199, 307, 'Please', 4.50, '2023-09-14 08:20:41', '2023-09-14 08:20:41'),
(9, 122, 199, 307, 'Please', 5.00, '2023-09-14 08:22:45', '2023-09-14 08:22:45'),
(10, 123, 199, 307, 'This is test review', 4.50, '2023-09-14 08:25:54', '2023-09-14 08:25:54'),
(11, 123, 199, 307, 'This is test review', 4.50, '2023-09-14 08:27:17', '2023-09-14 08:27:17'),
(12, 123, 199, 307, 'This is test review', 4.50, '2023-09-14 08:28:02', '2023-09-14 08:28:02'),
(13, 122, 199, 307, 'Please', 1.00, '2023-09-14 08:29:18', '2023-09-14 08:29:18'),
(14, 125, 199, 307, 'Please', 3.50, '2023-09-14 10:50:01', '2023-09-14 10:50:01'),
(15, 126, 199, 307, 'Please', 5.00, '2023-09-14 10:50:08', '2023-09-14 10:50:08'),
(16, 131, 199, 312, 'Please', 3.50, '2023-09-14 11:34:26', '2023-09-14 11:34:26'),
(17, 130, 199, 312, 'Please', 5.00, '2023-09-14 11:34:35', '2023-09-14 11:34:35'),
(18, 132, 199, 312, 'Please', 5.00, '2023-09-14 11:39:18', '2023-09-14 11:39:18'),
(19, 133, 199, 312, 'Please', 4.50, '2023-09-14 11:42:06', '2023-09-14 11:42:06'),
(20, 134, 199, 313, 'Please', 4.50, '2023-09-14 11:46:40', '2023-09-14 11:46:40'),
(21, 14, 322, 324, 'Please', 5.00, '2023-09-17 09:56:29', '2023-09-17 09:56:29'),
(22, 13, 211, 324, 'Please', 5.00, '2023-09-17 09:56:45', '2023-09-17 09:56:45'),
(23, 15, 211, 324, '', 2.00, '2023-09-17 10:38:36', '2023-09-17 10:38:36'),
(24, 16, 199, 321, '', 5.00, '2023-09-17 11:07:00', '2023-09-17 11:07:00'),
(25, 16, 199, 321, '', 5.00, '2023-09-17 11:14:36', '2023-09-17 11:14:36'),
(26, 16, 199, 321, '', 5.00, '2023-09-17 11:15:42', '2023-09-17 11:15:42'),
(27, 16, 199, 321, '', 5.00, '2023-09-17 11:21:55', '2023-09-17 11:21:55'),
(28, 16, 199, 321, '', 5.00, '2023-09-17 11:22:19', '2023-09-17 11:22:19'),
(29, 16, 199, 321, '', 5.00, '2023-09-17 11:23:38', '2023-09-17 11:23:38'),
(30, 28, 199, 368, 'Please', 4.00, '2023-09-26 05:58:25', '2023-09-26 05:58:25'),
(31, 28, 199, 368, 'This is test review', 4.00, '2023-09-26 06:15:28', '2023-09-26 06:15:28'),
(32, 28, 199, 368, 'This is test review', 4.00, '2023-09-26 06:29:23', '2023-09-26 06:29:23'),
(33, 28, 199, 368, 'This is test review', 4.00, '2023-09-26 06:31:32', '2023-09-26 06:31:32'),
(34, 28, 199, 368, 'This is test review', 4.00, '2023-09-26 06:33:58', '2023-09-26 06:33:58'),
(35, 29, 199, 368, 'Please', 5.00, '2023-09-26 07:43:15', '2023-09-26 07:43:15'),
(36, 34, 211, 321, 'Please', 4.50, '2023-10-01 09:06:58', '2023-10-01 09:06:58'),
(37, 32, 211, 321, 'Please', 5.00, '2023-10-01 09:07:06', '2023-10-01 09:07:06'),
(38, 33, 199, 321, 'Please', 5.00, '2023-10-01 09:07:20', '2023-10-01 09:07:20'),
(39, 35, 211, 321, 'Please', 5.00, '2023-10-01 10:37:45', '2023-10-01 10:37:45'),
(40, 36, 211, 321, 'Please', 5.00, '2023-10-02 04:35:27', '2023-10-02 04:35:27'),
(41, 37, 211, 321, 'Please', 5.00, '2023-10-02 05:16:10', '2023-10-02 05:16:10'),
(42, 38, 211, 321, 'Please', 5.00, '2023-10-04 04:31:03', '2023-10-04 04:31:03'),
(43, 39, 211, 321, 'Please', 5.00, '2023-10-04 04:53:51', '2023-10-04 04:53:51'),
(44, 41, 211, 374, 'Please', 5.00, '2023-10-04 06:19:14', '2023-10-04 06:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `expert_sub_categories`
--

CREATE TABLE IF NOT EXISTS `expert_sub_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expert_category_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0000',
  `icon_path` varchar(200) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expert_withdraw_requests`
--

CREATE TABLE IF NOT EXISTS `expert_withdraw_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `expert_id` int NOT NULL,
  `request_amount` float(10,2) NOT NULL,
  `paypal_email` varchar(100) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `is_approve` tinyint(1) DEFAULT '0' COMMENT '0=request,1=acepte, 2=reject ',
  `approve_by` int DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `card_type_id` int DEFAULT NULL,
  `card_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `valid_date` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `reject_note` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expert_withdraw_requests`
--

INSERT INTO `expert_withdraw_requests` (`id`, `code`, `expert_id`, `request_amount`, `paypal_email`, `request_date`, `is_approve`, `approve_by`, `approved_date`, `card_type_id`, `card_number`, `valid_date`, `reject_note`, `created_at`, `updated_at`) VALUES
(1, '0001', 211, 255.00, 'asd@f.co', '2023-10-02', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-02 04:22:53', '2023-10-02 04:22:53'),
(2, '0002', 211, 554.00, 'sdf@f.com', '2023-10-02', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-02 04:23:28', '2023-10-02 04:23:28'),
(3, '0003', 211, 554.00, 'sdf@f.com', '2023-10-02', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-02 04:25:27', '2023-10-02 04:25:27'),
(4, '0004', 211, 554.00, 'sdf@f.com', '2023-10-02', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-02 04:25:28', '2023-10-02 04:25:28'),
(5, '0005', 211, 122.00, 'as@g.co', '2023-10-02', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-02 04:27:59', '2023-10-02 04:27:59'),
(6, '0006', 211, 55.00, 'a@j.com', '2023-10-02', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-02 04:28:43', '2023-10-02 04:28:43'),
(7, '0007', 211, 55.00, 'a@j.com', '2023-10-02', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-02 04:30:51', '2023-10-02 04:30:51'),
(8, '0008', 211, 241.00, 'cvx@dsf.com', '2023-10-02', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-02 10:04:09', '2023-10-02 10:04:09'),
(9, '0009', 211, 4555.00, 'mks@tamin.com', '2023-10-04', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-04 11:32:34', '2023-10-04 11:32:34'),
(10, '0010', 162, 44.00, 'asd@g.com', '2023-10-04', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-04 11:55:49', '2023-10-04 11:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `how_it_works`
--

CREATE TABLE IF NOT EXISTS `how_it_works` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `header` text,
  `description` text,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `btn_text` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `how_it_works`
--

INSERT INTO `how_it_works` (`id`, `name`, `header`, `description`, `image`, `btn_text`, `created_at`, `updated_at`) VALUES
(1, 'Step 01', 'Ask your question', 'Tell us your situation. Ask any question in any category, anytime you want.', 'cms/testimonial/1690790988_law.c57663da.svg', 'Get Essentials Today', '2023-07-06 06:14:26', '2023-09-17 07:54:40'),
(3, 'Step 02', 'Let us match you', 'We’ll connect you in minutes with the best Expert for your question.', 'cms/testimonial/1690966932_Lawyers.svg', 'Get Essentials Today', '2023-07-06 06:28:23', '2023-09-17 07:55:25'),
(4, 'Step 03', 'Chat with an Expert', 'Talk, text, or chat till you have your answer. Members get unlimited conversations 24/7, so you’ll always have an Expert ready to help.', 'cms/testimonial/1690791041_law.c57663da.svg', 'Get Essentials Today', '2023-07-06 06:28:23', '2023-09-17 07:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `jp_activity_attendant`
--

CREATE TABLE IF NOT EXISTS `jp_activity_attendant` (
  `activity_attendant_id` int NOT NULL AUTO_INCREMENT,
  `accepted` tinyint(1) NOT NULL,
  `icon_url` varchar(255) NOT NULL COMMENT 'Activity icon url',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `version` int NOT NULL,
  `user_id` int NOT NULL COMMENT 'joined user id',
  `activity_id` int NOT NULL,
  PRIMARY KEY (`activity_attendant_id`),
  KEY `FK_0919e3593c5dcb373436891d4b5` (`user_id`),
  KEY `FK_895770321cfd3594e3747fcacdf` (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jp_user_online`
--

CREATE TABLE IF NOT EXISTS `jp_user_online` (
  `user_online_id` int NOT NULL AUTO_INCREMENT,
  `profile_picture` varchar(255) NOT NULL DEFAULT '',
  `profile_name` varchar(255) NOT NULL DEFAULT '',
  `online_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `account_type` enum('personal','business') NOT NULL DEFAULT 'personal',
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `location` varchar(500) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `last_seen` bigint NOT NULL,
  `socket_id` varchar(255) NOT NULL DEFAULT '',
  `device_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `user_type` varchar(255) DEFAULT NULL COMMENT 'customer || expert',
  `category_id` bigint DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `subcategory_id` bigint DEFAULT NULL,
  PRIMARY KEY (`user_online_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jp_user_online`
--

INSERT INTO `jp_user_online` (`user_online_id`, `profile_picture`, `profile_name`, `online_status`, `account_type`, `latitude`, `longitude`, `location`, `user_id`, `last_seen`, `socket_id`, `device_token`, `user_type`, `category_id`, `category_name`, `subcategory_id`) VALUES
(1, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 378', 'inactive', 'personal', 0, 0, 'fgfg', 265, 1694081074731, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(2, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 504', 'inactive', 'personal', 0, 0, 'fgfg', 238, 1697609656224, '', 'zkbiaR8bI-2u_cAFAAAD', 'customer', 1, 'Lawyers', NULL),
(3, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 430', 'inactive', 'personal', 0, 0, 'fgfg', 267, 1694065495567, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(4, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 473', 'inactive', 'personal', 0, 0, 'fgfg', 266, 1693914667968, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(5, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 258', 'inactive', 'personal', 0, 0, 'fgfg', 268, 1694410685284, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(6, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 131', 'inactive', 'personal', 0, 0, 'fgfg', 269, 1694066752863, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(7, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 287', 'inactive', 'personal', 0, 0, 'fgfg', 270, 1694067127175, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(8, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 685', 'inactive', 'personal', 0, 0, 'fgfg', 271, 1694068667819, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(9, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 571', 'inactive', 'personal', 0, 0, 'fgfg', 272, 1694074044569, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(10, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 25', 'inactive', 'personal', 0, 0, 'fgfg', 273, 1694082384675, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(11, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 774', 'inactive', 'personal', 0, 0, 'fgfg', 274, 1694074547463, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(12, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 146', 'inactive', 'personal', 0, 0, 'fgfg', 276, 1694090265315, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(13, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 210', 'inactive', 'personal', 0, 0, 'fgfg', 278, 1694412702451, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(14, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 422', 'inactive', 'personal', 0, 0, 'fgfg', 279, 1694413933851, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(15, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 120', 'inactive', 'personal', 0, 0, 'fgfg', 280, 1694420058687, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(16, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 991', 'inactive', 'personal', 0, 0, 'fgfg', 281, 1694422012783, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(17, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 802', 'inactive', 'personal', 0, 0, 'fgfg', 199, 1698659470799, '', 'fY2jZ9LXTlmzfJ5DQQwD6I:APA91bF7kERPWLBVtBPqFeq-kf6XWW09MerpoefThjh5ntpzhQQJYtvrBXhc6EbZTQSsIpfH9oLvzFJPN7vbK0bWwC8wvRA68-8XATy5FHTDeKL0cfOUIuk_l-6abq4kWxqZ_zIUzUw3', NULL, 1, 'Doctor', NULL),
(18, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 432', 'inactive', 'personal', 0, 0, 'fgfg', 282, 1694421425720, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(19, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 254', 'inactive', 'personal', 0, 0, 'fgfg', 283, 1694422506740, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(20, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 264', 'inactive', 'personal', 0, 0, 'fgfg', 284, 1694423948472, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(21, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 629', 'inactive', 'personal', 0, 0, 'fgfg', 285, 1694430351732, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(22, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 760', 'inactive', 'personal', 0, 0, 'fgfg', 286, 1694429579007, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(23, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 20', 'inactive', 'personal', 0, 0, 'fgfg', 287, 1694429590155, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(24, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 672', 'inactive', 'personal', 0, 0, 'fgfg', 288, 1694430898019, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(25, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 904', 'inactive', 'personal', 0, 0, 'fgfg', 211, 1696513181066, '', 'fz8GZZrXSsi0AcaIHuJr6Q:APA91bGMtGBKzlqTbri3OhrJ7HfP65cjxD335U413DcIdfA3d5ta8rwf92yjSw6zEtU20QCMSw5cxfhnxLsQliV4qJxB_Z-3jIaWfAL-5tSc_KU5U_pfxYokffLgJfWKlqlr_uKNURRP', NULL, 1, 'Doctor', NULL),
(26, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 791', 'inactive', 'personal', 0, 0, 'fgfg', 289, 1694436111572, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(27, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 415', 'inactive', 'personal', 0, 0, 'fgfg', 292, 1694516176975, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(28, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 559', 'inactive', 'personal', 0, 0, 'fgfg', 295, 1694524717703, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(29, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 299', 'inactive', 'personal', 0, 0, 'fgfg', 294, 1694574934337, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(30, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 731', 'active', 'personal', 0, 0, 'fgfg', 2, 1698658808541, 'ZxpQ8U7FoDNeMwSrAAAB', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(31, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 766', 'inactive', 'personal', 0, 0, 'fgfg', 297, 1694583213635, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(32, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 426', 'inactive', 'personal', 0, 0, 'fgfg', 296, 1694582037259, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(33, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 848', 'inactive', 'personal', 0, 0, 'fgfg', 298, 1694586401161, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(34, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 512', 'inactive', 'personal', 0, 0, 'fgfg', 299, 1694586543487, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(35, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 62', 'inactive', 'personal', 0, 0, 'fgfg', 301, 1694674767792, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(36, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 693', 'inactive', 'personal', 0, 0, 'fgfg', 302, 1694597228499, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(37, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 346', 'inactive', 'personal', 0, 0, 'fgfg', 303, 1694600452391, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(38, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 515', 'inactive', 'personal', 0, 0, 'fgfg', 304, 1694660688423, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(39, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 654', 'inactive', 'personal', 0, 0, 'fgfg', 305, 1695104840783, '', 'fgkQBjFPRZK9YpPfnBZxpG:APA91bFwSe_w-8GZsuDdKBuasl4wpFBdFf4aprFdl_-fjO2yUtpCFT-uG9VnIXN7AD2hpdJbDLAUqhNO_cv7NfylONreE6jCiwlT6wshvzC8wvpXELaQ5vOhFEmWRZb11Q9c1Nqi0oLc', NULL, 2, 'Lawyer', NULL),
(40, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 34', 'inactive', 'personal', 0, 0, 'fgfg', 306, 1694670712340, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(41, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 18', 'inactive', 'personal', 0, 0, 'fgfg', 307, 1694689510225, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(42, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 658', 'inactive', 'personal', 0, 0, 'fgfg', 311, 1694689240623, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(43, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 539', 'inactive', 'personal', 0, 0, 'fgfg', 312, 1694691687771, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(44, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 71', 'inactive', 'personal', 0, 0, 'fgfg', 313, 1694692581611, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(45, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 436', 'inactive', 'personal', 0, 0, 'fgfg', 310, 1694695302595, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(46, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 948', 'inactive', 'personal', 0, 0, 'fgfg', 314, 1694837037252, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(47, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 302', 'inactive', 'personal', 0, 0, 'fgfg', 315, 1694848189091, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(48, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 399', 'inactive', 'personal', 0, 0, 'fgfg', 316, 1694946280883, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(49, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 302', 'inactive', 'personal', 0, 0, 'fgfg', 317, 1694850990627, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(50, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 867', 'inactive', 'personal', 0, 0, 'fgfg', 318, 1694851207572, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(51, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 873', 'inactive', 'personal', 0, 0, 'fgfg', 319, 1694868456875, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(52, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 729', 'inactive', 'personal', 0, 0, 'fgfg', 320, 1694864883340, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(53, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 824', 'inactive', 'personal', 0, 0, 'fgfg', 321, 1696395300075, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(54, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 640', 'inactive', 'personal', 0, 0, 'fgfg', 322, 1694945106104, '', 'cjFEIJAvS1mPtHiJCN6vFZ:APA91bErZYnvxAxDMlVk0JB4f11OgO98MHg_10z8Xe0donPlque61lCebLJOI6eLUJeMZbBmGr1D4X_ntn10fvmWAtLuUWs3Fu5rJgcjLt-NVRIoDAXQHHbWjI2-iiphsUM8hABZqwd1', NULL, 1, 'Doctor', NULL),
(55, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 756', 'inactive', 'personal', 0, 0, 'fgfg', 323, 1694943659699, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(56, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 580', 'inactive', 'personal', 0, 0, 'fgfg', 324, 1694945570008, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(57, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 865', 'inactive', 'personal', 0, 0, 'fgfg', 326, 1695026940112, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(58, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 443', 'inactive', 'personal', 0, 0, 'fgfg', 329, 1695130928656, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(59, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 370', 'inactive', 'personal', 0, 0, 'fgfg', 342, 1696223193084, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, 4, 'Electricians', NULL),
(60, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 300', 'inactive', 'personal', 0, 0, 'fgfg', 349, 1695622594663, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(61, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 638', 'inactive', 'personal', 0, 0, 'fgfg', 364, 1695701573528, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(62, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 755', 'inactive', 'personal', 0, 0, 'fgfg', 365, 1695644194439, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(63, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 243', 'inactive', 'personal', 0, 0, 'fgfg', 366, 1695658235530, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(64, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 911', 'inactive', 'personal', 0, 0, 'fgfg', 198, 1695677612178, '', 'ed9rhLaWTS-GLc0su52LZp:APA91bEpMsQIbWsHtC3fWOvnK0LipwfYcLQmITNWENTupDCElBd57jQ1tXmR7vbwc1lfoxONimTW6fSyZ7HqYOp2P9R-KKtramabeDJThvpmdIznTKNASrVIA71WP0vD7N0neFGX45l_', NULL, 2, 'Lawyer', NULL),
(65, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 197', 'inactive', 'personal', 0, 0, 'fgfg', 367, 1696092556439, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(66, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 68', 'inactive', 'personal', 0, 0, 'fgfg', 368, 1695714195919, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(67, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 139', 'inactive', 'personal', 0, 0, 'fgfg', 369, 1695795491871, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(68, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 600', 'inactive', 'personal', 0, 0, 'fgfg', 370, 1695796226435, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(69, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 983', 'inactive', 'personal', 0, 0, 'fgfg', 371, 1695797413667, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(70, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 374', 'inactive', 'personal', 0, 0, 'fgfg', 373, 1696151877323, '', 'eDYPElS2R16CJ5chGrPLob:APA91bGRUGrswOSrAezmRcNDWjG8C75OGPepeGkheL9nQgzmuM1IYRu8wctFBTsFs7VV5W4-zePB-ByEKbCoeBazXO-R4lyVJq-SxXBQ-nEng0PaVp-9rCv10zZiMFl2zwQ9-ZSdEtOs', NULL, 1, 'Doctor', NULL),
(71, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 79', 'inactive', 'personal', 0, 0, 'fgfg', 155, 1696402998946, '', 'elZefwouRj2MkHfyOM1Za5:APA91bFDJGJ76TFphOYPSXKTsUgmBaGZ39SbNv7dyyUzn-_b1_K4Yg6pbWMsuFgp4XcYpHQb4ySQ_gZ5Yz4ifvdqyvEd704I5ByYNZB4uZfqJtwTxGYZ1p7C-vR5__Xi2NYaPvVpCA5h', NULL, 1, 'Doctor', NULL),
(72, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 748', 'inactive', 'personal', 0, 0, 'fgfg', 374, 1696400355793, '', 'niuqXN48ZfUvCp6XAAAD', NULL, NULL, NULL, NULL),
(73, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 319', 'inactive', 'personal', 0, 0, 'fgfg', 162, 1696493865336, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL),
(74, 'http://24.199.122.48/roketanswer/storage/file_upload/168967876087091792.png', 'Rohit 916', 'inactive', 'personal', 0, 0, 'fgfg', 348, 1698664051428, '', 'zkbiaR8bI-2u_cAFAAAD', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0=Inactive , 1=Active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_lang_name_unique` (`lang_name`),
  UNIQUE KEY `languages_title_unique` (`title`),
  UNIQUE KEY `languages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang_name`, `title`, `slug`, `status`) VALUES
(1, 'English', 'en', 'en', 1),
(2, 'Bangla', 'bn', 'bn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_03_01_042503_create_cache_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_12_25_124522_create_settings_table', 1),
(8, '2022_05_25_072926_create_languages_table', 1),
(9, '2023_02_09_051208_create_permission_tables', 1),
(10, '2023_02_12_070616_create_sessions_table', 1),
(11, '2023_02_28_082321_add_group_column_in_permissions_table', 1),
(16, '2022_06_22_084103_create_package_settings_table', 2),
(17, '2022_06_22_084122_create_packages_table', 2),
(18, '2022_06_22_084148_create_package_recarring_invoices_table', 2),
(19, '2022_06_22_084240_create_package_invoice_payments_table', 2),
(20, '2022_06_22_084334_create_package_invoices_table', 2),
(21, '2022_06_22_091143_create_package_invoice_details_table', 2),
(22, '2022_06_22_091725_create_package_payment_methods_table', 2),
(23, '2022_06_22_092243_create_package_durations_table', 2),
(24, '2022_06_22_092949_create_package_recarring_invoice_details_table', 2),
(25, '2022_06_22_093004_create_package_recarring_invoice_payments_table', 2),
(26, '2022_09_12_112354_create_package_modules_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` tinyint DEFAULT NULL COMMENT '1=chat,2=asking,3=transaction',
  `user_type` tinyint DEFAULT NULL COMMENT '1=customer | 2 = expert',
  `expert_id` int DEFAULT NULL,
  `conversation_id` bigint DEFAULT NULL,
  `payment_transaction_id` bigint DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `body` text,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `seen_total` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `user_type`, `expert_id`, `conversation_id`, `payment_transaction_id`, `title`, `body`, `is_read`, `seen_total`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 305, 9, NULL, 'New message has been added', 'ted', 0, 1, NULL, '2023-09-17 09:34:57'),
(2, 1, NULL, 211, 13, NULL, 'New message has been added', '1021132132', 0, 1, NULL, '2023-10-04 07:33:25'),
(3, 1, NULL, 322, 14, NULL, 'New message has been added', 'nabid', 0, 0, NULL, '2023-09-16 08:53:58'),
(4, 3, NULL, 322, NULL, 1, 'Your balance is debited', 'Your balance is debited from conversation', 0, 0, '2023-09-17 09:56:29', '2023-09-17 09:56:29'),
(5, 3, NULL, 211, NULL, 2, 'Your balance is debited', 'Your balance is debited from conversation', 0, 1, '2023-09-17 09:56:45', '2023-10-04 07:33:25'),
(6, 1, NULL, 211, 15, NULL, 'New message has been added', '4r', 0, 1, NULL, '2023-10-04 07:33:25'),
(7, 1, NULL, 199, 16, NULL, 'New message has been added', 'asdfsd', 1, 1, NULL, '2023-10-04 07:05:17'),
(8, 3, NULL, 199, NULL, 3, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-17 11:07:00', '2023-10-04 07:05:17'),
(9, 3, NULL, 199, NULL, 4, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-17 11:14:36', '2023-10-04 07:05:17'),
(10, 3, NULL, 199, NULL, 5, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-17 11:15:41', '2023-10-04 07:05:17'),
(11, 3, NULL, 199, NULL, 6, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-17 11:21:55', '2023-10-04 07:05:17'),
(12, 3, NULL, 199, NULL, 7, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-17 11:22:19', '2023-10-04 07:05:17'),
(13, 3, NULL, 199, NULL, 8, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-17 11:23:37', '2023-10-04 07:05:17'),
(14, 1, NULL, 199, 28, NULL, 'New message has been added', 'ksdf', 1, 1, NULL, '2023-10-04 07:05:17'),
(15, 3, NULL, 199, NULL, 9, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-26 05:58:25', '2023-10-04 07:05:17'),
(16, 3, NULL, 199, NULL, 10, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-26 06:15:28', '2023-10-04 07:05:17'),
(17, 3, NULL, 199, NULL, 11, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-26 06:29:23', '2023-10-04 07:05:17'),
(18, 3, NULL, 199, NULL, 12, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-26 06:31:32', '2023-10-04 07:05:17'),
(19, 3, NULL, 199, NULL, 13, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-26 06:33:58', '2023-10-04 07:05:17'),
(20, 1, NULL, 199, 29, NULL, 'New message has been added', 'gyhjh', 1, 1, NULL, '2023-10-04 07:05:17'),
(21, 3, NULL, 199, NULL, 14, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-09-26 07:43:15', '2023-10-04 07:05:17'),
(22, 1, NULL, 211, 32, NULL, 'New message has been added', 'asdf', 0, 1, NULL, '2023-10-04 07:33:25'),
(23, 1, NULL, 199, 33, NULL, 'New message has been added', 'dfg', 1, 1, NULL, '2023-10-04 07:05:17'),
(24, 1, NULL, 211, 34, NULL, 'New message has been added', 'asdf', 0, 1, NULL, '2023-10-04 07:33:25'),
(25, 3, NULL, 211, NULL, 15, 'Your balance is debited', 'Your balance is debited from conversation', 0, 1, '2023-10-01 09:06:58', '2023-10-04 07:33:25'),
(26, 3, NULL, 211, NULL, 16, 'Your balance is debited', 'Your balance is debited from conversation', 0, 1, '2023-10-01 09:07:06', '2023-10-04 07:33:25'),
(27, 3, NULL, 199, NULL, 17, 'Your balance is debited', 'Your balance is debited from conversation', 1, 1, '2023-10-01 09:07:20', '2023-10-04 07:05:17'),
(28, 1, NULL, 211, 35, NULL, 'New message has been added', 'asdfdsf', 0, 1, NULL, '2023-10-04 07:33:25'),
(29, 3, NULL, 211, NULL, 18, 'Your balance is debited', 'Your balance is debited from conversation', 0, 1, '2023-10-01 10:37:45', '2023-10-04 07:33:25'),
(30, 1, NULL, 211, 36, NULL, 'New message has been added', 'Hi', 0, 1, NULL, '2023-10-04 07:33:25'),
(31, 3, NULL, 211, NULL, 19, 'Your balance is debited', 'Your balance is debited from conversation', 0, 1, '2023-10-02 04:35:27', '2023-10-04 07:33:25'),
(32, 1, NULL, 211, 37, NULL, 'New message has been added', 'asdf', 0, 1, NULL, '2023-10-04 07:33:25'),
(33, 3, NULL, 211, NULL, 20, 'Your balance is debited', 'Your balance is debited from conversation', 0, 1, '2023-10-02 05:16:10', '2023-10-04 07:33:25'),
(34, 1, NULL, 211, 38, NULL, 'New message has been added', 'Hello', 0, 1, NULL, '2023-10-04 07:33:25'),
(35, 3, NULL, 211, NULL, 21, 'Your balance is debited', 'Your balance is debited from conversation', 0, 1, '2023-10-04 04:31:03', '2023-10-04 07:33:25'),
(36, 1, NULL, 211, 39, NULL, 'New message has been added', 'asdf', 0, 1, NULL, '2023-10-04 07:33:25'),
(37, 3, NULL, 211, NULL, 22, 'Your balance is debited', 'Your balance is debited from conversation', 0, 1, '2023-10-04 04:53:51', '2023-10-04 07:33:25'),
(38, 1, NULL, 211, 40, NULL, 'New message has been added', 'asdf', 0, 1, NULL, '2023-10-04 07:33:25'),
(39, 1, NULL, 211, 41, NULL, 'New message has been added', 'okayyy', 0, 1, NULL, '2023-10-04 07:33:25'),
(40, 3, NULL, 211, NULL, 23, 'Your balance is debited', 'Your balance is debited from conversation', 0, 1, '2023-10-04 06:19:14', '2023-10-04 07:33:25'),
(41, 1, NULL, 199, 42, NULL, 'New message has been added', 'yes', 0, 0, NULL, '2023-10-31 12:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_no` int NOT NULL,
  `expert_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `expert_category_id` int NOT NULL,
  `expert_sub_category_id` int NOT NULL,
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` float(8,2) NOT NULL,
  `order_date` date NOT NULL,
  `order_start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `payment_method_id` int NOT NULL,
  `payment_status_id` int NOT NULL,
  `expert_reply_date` datetime NOT NULL,
  `rating` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `duration` int NOT NULL,
  `service_number` int DEFAULT NULL,
  `expert_categories_id` json DEFAULT NULL,
  `offer` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_price` double DEFAULT NULL,
  `offer_discount` double DEFAULT NULL,
  `offer_duration` int DEFAULT NULL,
  `offer_start_date` date DEFAULT NULL,
  `offer_status` tinyint NOT NULL DEFAULT '1',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `packages_created_by_foreign` (`created_by`),
  KEY `packages_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_durations`
--

CREATE TABLE IF NOT EXISTS `package_durations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_durations_created_by_foreign` (`created_by`),
  KEY `package_durations_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_invoices`
--

CREATE TABLE IF NOT EXISTS `package_invoices` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `duration` int NOT NULL,
  `service_number` int DEFAULT NULL,
  `offer` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_price` double DEFAULT NULL,
  `offer_discount` double DEFAULT NULL,
  `offer_start_date` date DEFAULT NULL,
  `offer_duration` int DEFAULT NULL,
  `total_amount` double NOT NULL,
  `offer_status` tinyint NOT NULL DEFAULT '0',
  `payment_status` tinyint NOT NULL DEFAULT '0' COMMENT '0=pending , 1=Complete , 2=Incomplete',
  `status` tinyint NOT NULL DEFAULT '0',
  `bill_start_date` date DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_invoices_created_by_foreign` (`created_by`),
  KEY `package_invoices_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_invoice_details`
--

CREATE TABLE IF NOT EXISTS `package_invoice_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_invoice_id` bigint UNSIGNED NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_invoice_details_created_by_foreign` (`created_by`),
  KEY `package_invoice_details_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_invoice_payments`
--

CREATE TABLE IF NOT EXISTS `package_invoice_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_payment_method_id` bigint UNSIGNED NOT NULL,
  `total_amount` double DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `payment_type` tinyint DEFAULT '1' COMMENT '1=subscription,2=recurring',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_invoice_payments_created_by_foreign` (`created_by`),
  KEY `package_invoice_payments_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_modules`
--

CREATE TABLE IF NOT EXISTS `package_modules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `expert_categories_id` int NOT NULL,
  `package_id` int NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_modules_created_by_foreign` (`created_by`),
  KEY `package_modules_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_payment_methods`
--

CREATE TABLE IF NOT EXISTS `package_payment_methods` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_payment_methods_created_by_foreign` (`created_by`),
  KEY `package_payment_methods_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_recarring_invoices`
--

CREATE TABLE IF NOT EXISTS `package_recarring_invoices` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `coustomer_id` bigint UNSIGNED NOT NULL,
  `package_duration_id` bigint UNSIGNED NOT NULL,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `duration` int NOT NULL,
  `offer` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_price` double DEFAULT NULL,
  `offer_discount` double DEFAULT NULL,
  `offer_start_date` date DEFAULT NULL,
  `offer_duration` int DEFAULT NULL,
  `offer_status` tinyint NOT NULL DEFAULT '1',
  `payment_status` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `bill_start_date` date DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_recarring_invoices_created_by_foreign` (`created_by`),
  KEY `package_recarring_invoices_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_recarring_invoice_details`
--

CREATE TABLE IF NOT EXISTS `package_recarring_invoice_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_recarring_invoice_id` bigint UNSIGNED NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_recarring_invoice_details_created_by_foreign` (`created_by`),
  KEY `package_recarring_invoice_details_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_recarring_invoice_payments`
--

CREATE TABLE IF NOT EXISTS `package_recarring_invoice_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_recarring_invoice_id` bigint UNSIGNED NOT NULL,
  `package_payment_method_id` bigint UNSIGNED NOT NULL,
  `total_amount` double DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_recarring_invoice_payments_created_by_foreign` (`created_by`),
  KEY `package_recarring_invoice_payments_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_settings`
--

CREATE TABLE IF NOT EXISTS `package_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `reminder_duration` int NOT NULL DEFAULT '3',
  `reminder_method` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_recarring_invoice` tinyint NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_settings_created_by_foreign` (`created_by`),
  KEY `package_settings_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('lol@gmail.com', '470680', '2023-09-19 07:49:16'),
('lugnazuspa@gufum.com', '446394', '2023-09-19 07:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `client_id` varchar(200) DEFAULT NULL,
  `client_secret` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `client_id`, `client_secret`, `username`, `password`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Paypal', 'AZ1Wt4EPTxiCMluNRys0zNP7-VgOtPa0pjJ_3tiL9ng_1Qtr8gHV-uDm8BEtIKFvTOXoSM20laI2I4uC', 'EJYgioqu3ja4xyNzLjmhF9ARylWrkAg2Rpgjsf1ae1pTWSkgmY8lmOPINK5nNmc6VQG8RNzwnbWFbmX5', 'sb-dmsyw26183019_api1.business.example.com', 'DEH8HZN8TU6XY3U7', 1, NULL, '2023-08-01 05:19:45'),
(2, 'Strip', 'pk_test_51MBYXXImRvvOt4BMiNb8f3xZC0UTGVlEhHzrEdNwnnUyUtvFPxynwcDcd13IDPKt6oTfLoWIaovEq4WiTKiDF3PA00Q43NKGhy', 'sk_test_51MBYXXImRvvOt4BMurCB98K7kTa6dbFlPvNBGe90NmnQ49fwXAJZ4hehCgit4BgZS8wsjX8j7CD9ypsXf2W76ilP00GSvrCTdD', NULL, NULL, 1, '2023-08-02 04:32:39', '2023-08-02 04:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `payment_statuses`
--

CREATE TABLE IF NOT EXISTS `payment_statuses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

CREATE TABLE IF NOT EXISTS `payment_transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `expert_id` int NOT NULL,
  `conversation_id` int DEFAULT NULL,
  `expert_withdraw_request_id` int DEFAULT NULL,
  `amount` double(10,2) NOT NULL,
  `attachment` varchar(200) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `transaction_type` tinyint DEFAULT NULL COMMENT '1=in,2=out',
  `payment_method_id` int DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_transactions`
--

INSERT INTO `payment_transactions` (`id`, `code`, `expert_id`, `conversation_id`, `expert_withdraw_request_id`, `amount`, `attachment`, `payment_date`, `transaction_type`, `payment_method_id`, `email`, `created_at`, `updated_at`) VALUES
(1, '0001', 322, 14, NULL, 25.00, NULL, '2023-09-17', 1, NULL, NULL, '2023-09-17 09:56:29', '2023-09-17 09:56:29'),
(2, '0002', 211, 13, NULL, 25.00, NULL, '2023-09-17', 1, NULL, NULL, '2023-09-17 09:56:45', '2023-09-17 09:56:45'),
(3, '0003', 199, 16, NULL, 25.00, NULL, '2023-09-17', 1, NULL, NULL, '2023-09-17 11:07:00', '2023-09-17 11:07:00'),
(4, '0004', 199, 16, NULL, 25.00, NULL, '2023-09-17', 1, NULL, NULL, '2023-09-17 11:14:36', '2023-09-17 11:14:36'),
(5, '0005', 199, 16, NULL, 25.00, NULL, '2023-09-17', 1, NULL, NULL, '2023-09-17 11:15:41', '2023-09-17 11:15:41'),
(6, '0006', 199, 16, NULL, 25.00, NULL, '2023-09-17', 1, NULL, NULL, '2023-09-17 11:21:55', '2023-09-17 11:21:55'),
(7, '0007', 199, 16, NULL, 25.00, NULL, '2023-09-17', 1, NULL, NULL, '2023-09-17 11:22:19', '2023-09-17 11:22:19'),
(8, '0008', 199, 16, NULL, 25.00, NULL, '2023-09-17', 1, NULL, NULL, '2023-09-17 11:23:37', '2023-09-17 11:23:37'),
(13, '0013', 199, 28, NULL, 25.00, NULL, '2023-09-26', 1, NULL, NULL, '2023-09-26 06:33:58', '2023-09-26 06:33:58'),
(14, '0014', 199, 29, NULL, 2.00, NULL, '2023-09-26', 1, NULL, NULL, '2023-09-26 07:43:15', '2023-09-26 07:43:15'),
(15, '0015', 211, 34, NULL, 2.00, NULL, '2023-10-01', 1, NULL, NULL, '2023-10-01 09:06:58', '2023-10-01 09:06:58'),
(16, '0016', 211, 32, NULL, 2.00, NULL, '2023-10-01', 1, NULL, NULL, '2023-10-01 09:07:06', '2023-10-01 09:07:06'),
(17, '0017', 199, 33, NULL, 2.00, NULL, '2023-10-01', 1, NULL, NULL, '2023-10-01 09:07:20', '2023-10-01 09:07:20'),
(18, '0018', 211, 35, NULL, 2.00, NULL, '2023-10-01', 1, NULL, NULL, '2023-10-01 10:37:45', '2023-10-01 10:37:45'),
(19, '0019', 211, 36, NULL, 2.00, NULL, '2023-10-02', 1, NULL, NULL, '2023-10-02 04:35:27', '2023-10-02 04:35:27'),
(20, '0020', 211, 37, NULL, 2.00, NULL, '2023-10-02', 1, NULL, NULL, '2023-10-02 05:16:10', '2023-10-02 05:16:10'),
(21, '0021', 211, 38, NULL, 2.00, NULL, '2023-10-04', 1, NULL, NULL, '2023-10-04 04:31:03', '2023-10-04 04:31:03'),
(22, '0022', 211, 39, NULL, 2.00, NULL, '2023-10-04', 1, NULL, NULL, '2023-10-04 04:53:51', '2023-10-04 04:53:51'),
(23, '0023', 211, 41, NULL, 25.00, NULL, '2023-10-04', 1, NULL, NULL, '2023-10-04 06:19:14', '2023-10-04 06:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'General',
  `guard_name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user_management', 'User', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(2, 'role_management', 'User', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(3, 'permission_management', 'User', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(17, 'document_management', 'Document', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(18, 'setting_management', 'Setting', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(19, 'mail_setting_management', 'Setting', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(20, 'recaptcha_setting_management', 'Setting', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(22, 'module_setting_management', 'Setting', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(23, 'env_setting_management', 'Setting', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(24, 'language_setting_management', 'Setting', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(25, 'backup_management', 'Backup', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(26, 'customer_management', 'User', 'web', '2023-06-18 02:12:28', '2023-06-18 02:12:28'),
(27, 'post_management', 'User', 'web', '2023-06-24 03:18:21', '2023-06-24 03:18:21'),
(30, 'default_payment_setup', 'Setting', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(31, 'payment_method', 'Setting', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(32, 'privacy_policy', 'CMS', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(33, 'terms_of_service', 'CMS', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(34, 'testimonial', 'CMS', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(35, 'landing_page_setup', 'CMS', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(36, 'post_category', 'CMS', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(37, 'page_list', 'CMS', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(38, 'add_page', 'CMS', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(39, 'post_list', 'CMS', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(40, 'add_post', 'CMS', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(41, 'package_list', 'Packages', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(42, 'invoice_list', 'Packages', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(43, 'customer_list', 'Customers', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(44, 'customer_subscription', 'Customers', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(45, 'customer_conversation_history', 'Conversations', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(46, 'withdraw_request', 'Transactions', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(49, 'transaction_management', 'Transactions', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(50, 'pending_expert', 'Experts', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(51, 'active_expert', 'Experts', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(52, 'expert_category', 'Experts', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(53, 'expert_sub_category', 'Experts', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(54, 'expert_pay_account', 'Experts', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(55, 'expert_review', 'Experts', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(56, 'expert_payment_setup', 'Experts', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_category_id` int UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `publish_by` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `type` int DEFAULT '0' COMMENT '1 = page and 0 = post',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_post_category_id_index` (`post_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `uuid`, `post_category_id`, `title`, `content`, `post_image`, `meta_title`, `meta_description`, `publish_by`, `status`, `type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(13, 'fc4b438d-aaff-4525-a544-70b088981e58', 1, 'Have medical questions? Ask a doctor online!', '<p>Verified doctors are online around the clock and ready to answer your question online or by phone.&nbsp;</p>', 'post_image/1692011097888.jpg', 'Verified doctors are online around the clock and ready to answer your question online or by phone.', 'Verified doctors are online around the clock and ready to answer your question online or by phone.', 'Test', 1, 1, 1, 1, '2022-11-29 08:47:56', '2023-08-14 11:38:53'),
(16, '700baf57-eae2-4e23-a069-b1362b66c103', 6, 'DeHaat, an Indian agritech company, has raised $60 million at a value of more than $700 million.', '<p>DeHaat,&nbsp;a company that provides farmers in India with a variety of agricultural services, has just closed a $60 million fundraising round to expand its operations throughout the nation and attain profitability in two years.<br />\r\nAccording to a source familiar with the situation, the Patna and Gurgaon-based startup&#39;s Series E fundraising was co-led by Sofina Ventures and Temasek, and the company was valued at between $700 million and $800 million. RTP Global Partners, Prosus Ventures, and Lightrock India, all of which had previously invested, joined the latest round as well.</p>\r\n\r\n<p>While farming in India is worth $350 billion, farmers there confront some problems that have gone mostly neglected until disruptive startups like DeHaat came along. Problems include an insufficient runway, difficulty finding consumers for crops, and difficulty obtaining necessary agri-inputs.</p>\r\n\r\n<p>While companies like Reliance and Adani Group do provide certain services to farmers, their overall engagement in the agricultural industry is still quite modest. Due to the country&#39;s rapidly expanding population and the effects of climate change, Indian farmers must rapidly embrace technology to increase and sustain crop production.<br />\r\nDeHaat utilizes AI to assist India&#39;s 1.5 million farmers in locating raw materials, locating consulting and financing services, and selling products across 11 states, 110,000 villages, and over 150 zip codes.<br />\r\nMore than 2,000 agricultural organizations, such as input manufacturers, food and consumer product corporations, banks, and insurance agencies, have joined the initiative. It employs a network of over 10,000 &quot;micro-entrepreneurs&quot; to manage its complex network of &quot;last-mile&quot; suppliers.<br />\r\nFounder and CEO Shashank Kumar told TechCrunch that after two years of rapid growth across many significant Indian states, the company&#39;s immediate emphasis would be on expanding its footprint inside the existing zip codes and on attaining break-even profitability within the next year.</p>\r\n\r\n<p>Kumar predicts DeHaat will turn a profit within 40 months of launching with the additional cash. We won&#39;t be expanding to any additional regions for the next several months. He vowed that in the areas where his company operates, &quot;at least for the next three to five months, we are not adding any new geographies. &quot;We will continue to serve more farmers and broaden our network of centers in the states where we are operational,&quot;<br />\r\nFor the time being, the southern Indian states are not a focus for DeHaat&#39;s expansion. As for the other states, Kumar said the business is planning to begin growing there in roughly a year.</p>\r\n\r\n<p>Kumar said that in the present market environment, it is difficult to attract investors. Since the global economy turned so suddenly for the worst, investors have been much more hesitant to put money into local firms.</p>\r\n\r\n<p>According to Kumar, &quot;the lens has shifted,&quot; and now investors are only interested in assets that can provide income quickly. As a bonus, &quot;our unit economics are quite good; whatever burn we have is for additional regions,&quot; which was an advantage unique to DeHaat. He said, &quot;We raised the round to be ready for all the prospects,&quot; and revealed that around two-thirds of the previous $115 million investment round is still available to DeHaat.</p>', 'post_image/1687413390737.jpg', 'DeHaat, an Indian agritech company, has raised $60 million at a value of more than $700 million.', 'DeHaat, an Indian agritech company, has raised $60 million at a value of more than $700 million.', 'Tuhin', 0, 0, 1, 1, '2022-12-01 01:41:34', '2023-06-24 06:11:59'),
(17, '3e1da339-c0d8-4088-891b-e5af9c4109f6', 6, 'AOT 4.0, NIGERIA’S LARGEST YEARLY TECHNOLOGY CONFERENCE, WILL BE HELD IN LAGOS', '<p>​ The Art of Technology Lagos (AOT) conference is Nigeria&#39;s largest annual technology conference, bringing together important players from the public and private sectors to debate policies and initiatives that will pave the way for the creation of a smarter, digital, efficient, and competitive Lagos. Together with the Lagos State Government, the economic and technological core of Nigeria, Eko Innovation Centre, one of the leading tech hubs in Nigeria, is organizing the conference. Eko Innovation Centre is responsible for organizing events such as MarkHack, the Lagos Smart Meter Hackathon, EkoClimathon, and Security hackathon Talent Acceleration will be the primary emphasis of AOT 4.0, with a ten-year plan developed to increase the talent acceleration pipeline to ensure the sustainability of talent and, hence, the delivery of a Smarter Lagos. At AOT 4.0, the Tech Ecosystem Award will be presented for the first time to recognize the efforts of individuals, groups, and businesses that have contributed significantly to the expansion and improvement of Nigeria&#39;s technology sector. There were five main categories and twenty minor ones for nominations. The award nomination voting ended on November 15, 2022, with over twenty thousand (20,000) votes cast across all categories. The winners will be revealed and acknowledged during the Gala and Awards Night, which is slated for December 9th, 2022. In keeping with this year&#39;s conference theme, the conference committee, led by the Special Adviser to the Lagos State Governor on Innovation and Strategy, went on a Hub Tour to educate startup founders on the importance of promoting policies that benefit the ecosystem and to extend an invitation to attend the conference. Co-Creation Hub, Impact Hub, Hub One, and Nest Hub were among the hubs visited. AOT 4.0 conference committee led by Special Adviser to the Lagos State Governor on Innovation and Strategy at Co-Creation Hub a Hub Tour Founder, Eko Innovation Centre, Victor Afolabi addressing startups at Impact Hub &nbsp; Special adviser to the Lagos State Governor on Innovation and Strategy, Tunbosun Alake addressing startups at Co-Creation Hub during the Hub Tour &nbsp; AOT 4.0 conference committee led by Special Adviser to the Lagos State Governor on Innovation and Strategy with Startup Founders from Hub one and Nest Hub &nbsp; AOT 4.0 conference committee led by Special Adviser to the Lagos State Governor on Innovation and Strategy with Hub one and Nest Hub Management Team The AOT 4.0 will hold at the Landmark Event Centre in Lagos, Nigeria, on December 8th and 9th, and will feature thirteen (13) plenary speakers, three (3) guest speakers, five (5) keynote speakers, and more than thirty-five thousand (35,000) registered participants from all sectors of the technology industry, including policymakers, enthusiasts, ecosystem players, investors, business founders and executives, venture capital firms, startups, and technology talent.&nbsp;To be a part of the event, click on the link to register&nbsp;Here ​</p>', 'post_image/1687413480534.jpg', 'AOT 4.0, NIGERIA’S LARGEST YEARLY TECHNOLOGY CONFERENCE, WILL BE HELD IN LAGOS', 'AOT 4.0, NIGERIA’S LARGEST YEARLY TECHNOLOGY CONFERENCE, WILL BE HELD IN LAGOS', 'Testing..', 1, 0, 1, 1, '2022-12-01 09:09:56', '2023-06-21 23:58:00'),
(18, 'b705ddda-ccfe-4437-97bc-8deb2cb13b6e', 2, 'CyVers raises $8 million to deliver proactive Web3 economic security.', '<p>Elron Ventures is leading an $8 million fundraising round for CyVers, a supplier of cutting-edge proactive Web3 security for centralized, decentralized, and blockchain-based financial and smart contract applications.</p>\r\n\r\n<p>CyVers is creating scalable, highly accurate, plug-and-play, agentless systems for detecting suspicious behavior. As a result, CyVers can record transactions in the brief window of time between when they are broadcast and when they are permanently recorded on a blockchain ledger.<br />\r\nThese seasoned businesspeople started the company at the beginning of this year. After selling his startup, Presenso, to SKF as founder and CTO, Deddy Lavid went on to serve as CEO of SKF&#39;s Israeli subsidiary, where he oversaw a team of hundreds of engineers and dozens of artificial intelligence (AI) products. Lavid is an inventor with eleven patents in the field of automated anomaly detection. Meir Dolev was the Chief Technology Officer (CTO) of an acquired company and then moved on to become the Vice President of Research and Development (R&amp;D).<br />\r\nMeir started working with Deddy in 2020 to help modernize the analytics industry and set up four research and development hubs throughout the world. Customers for CyVers include Bit2C, Solidus Capital, and CoinMama. Eli Bejerano, CEO of Bit2C, praised CyVers for its &quot;excellent alerts about malicious activity</p>\r\n\r\n<p><br />\r\nMarket liquidity, volatility, and lack of trader confidence have all been issues since the 2020 crypto boom. Of the $3.5 billion in crypto money lost so far this year, 69% came from attacks on cross-chain bridges. Most crypto exchanges, DeFi protocols, and custodians don&#39;t find out about fraudulent transactions until after they&#39;ve been permanently recorded.<br />\r\nTo quote CyVers&#39;s co-founder and chief technology officer, &quot;our sophisticated monitoring system receives real-time data streams from our cross-blockchain data collection platform.&quot; Using machine learning and artificial intelligence, our analytics engine can foresee new types of assaults and recognize malicious actors&#39; patterns of activity.<br />\r\nExploits of smart contracts, disclosure of secret keys, Flashloans, etc. Once an AI system recognizes the development of an exploit pattern, it issues an alarm, giving personnel ample time to implement the most effective remedy before further exploitation and money laundering can take place.<br />\r\nElik Etzion, a managing partner at Elron Ventures, predicted that with CyVers, the frequency of assaults would be much reduced, making the crypto economy more secure. As a group, &quot;we are allowing a trustworthy and transparent Web3.&quot;</p>', 'post_image/1687413553116.jpg', 'CyVers raises $8M to bring proactive security to Web3 economy', 'CyVers raises $8M to bring proactive security to Web3 economy', 'Test', 1, 0, 1, 1, '2022-12-02 02:19:07', '2023-06-21 23:59:13'),
(22, 'd1387e77-830c-47f8-bdc3-e72be06d3b2b', 6, 'Safeboda Bids Nigeria Goodbye.', '<p>Due to the mobility laws in the country&#39;s commercial capital, several bike-hailing firms have been forced to relocate their operations to neighboring states such as Oyo and Ogun.<br />\r\nThis change would result in the company leaving a city with a large number of young, technologically aware Nigerians. In Oyo and Ogun, for example, they must focus on the state capitals, where travel is often shorter and tickets are consequently cheaper. In Lagos, they would have been able to commute from the mainland to the island as well as contend with traffic congestion, resulting in longer, more expensive journeys. TechCabal reports that SafeBoda, a Ugandan bike-hailing firm that opened in Ibadan in 2020, has announced it will be terminating its operations in Nigeria.</p>\r\n\r\n<p>The company, which was able to build its business in Uganda before embarking on enormous expansion in Kenya and Nigeria, has announced that it will now pull back and concentrate only on its Ugandan operation.<br />\r\nSafeBoda&#39;s departure from Nigeria comes despite the company&#39;s success, as it recently announced that over three million rides have been conducted using its app.<br />\r\nAccording to a statement released by SafeBoda, the company is departing Nigeria because the bike-hailing industry there is not yet &quot;economically sustainable.&quot; The sector, according to the statement, &quot;is not commercially sustainable in its current condition and sadly requires major investment in the current hard global economic climate.&quot;<br />\r\nSafeBoda noted that it arrived at this conclusion as part of its strategy to &quot;bring the firm to profitability by strengthening its core transportation product&quot; in Uganda.<br />\r\nIn 2020, at the height of the epidemic, the corporation halted operations in Kenya, blaming the negative impacts of the pandemic.<br />\r\n&quot;While Nairobi is seeing some economic recovery from COVID-19, boda boda transportation has been hit hard,&quot; the company said. &quot;This has meant our business cannot sustainably operate in this environment, and unfortunately, the timeline for a full recovery is not certain. This decision is a hard one for SafeBoda to make. We know that this will negatively impact our community of boda boda drivers.&quot;</p>\r\n\r\n<p>Therefore, SafeBoda&#39;s struggles with profitability in Kenya and Nigeria are not unique to the firm. It is part of a basic question that ride-hailing companies have resisted answering for years. Since the inception of ride-hailing over two decades ago, industry titans such as Uber and Bolt have battled with profitability.<br />\r\nTo entice customers, ride-hailing businesses have incorporated frequent discounts into their business models. It results in enormous losses at the end of the year for some of these firms.<br />\r\nAccording to Forbes, Uber recorded a third-quarter loss of about $1.5 billion in 2017, pushing its total loss for the year to over $3.2 billion.<br />\r\nSome ride-hailing businesses have begun to place advertisements on their platforms. Uber developed an entire advertising section this year, which it claims will serve major companies globally.<br />\r\nAs the global IT sector stinks of diminishing earnings this year, entrepreneurs who would have given these African ride-hailing businesses more runway have scaled down their investments and are focusing on other potential ventures.</p>\r\n\r\n<p><br />\r\nThis has caused African entrepreneurs to be more prudent and frugal with their expenditures. Numerous firms have been forced to lay off employees, with others closing down entirely. This week, the crypto payment business LazerPay was forced to lay off a portion of its workers.</p>', 'post_image/1687419877317.jpg', 'Safeboda Bids Nigeria Goodbye.', 'Safeboda Bids Nigeria Goodbye.', 'Jon', 1, 0, 1, NULL, '2022-12-02 04:15:17', '2023-06-22 01:44:37'),
(45, 'ac5ba380-5432-4455-9cc1-9d74a6ac9e6e', 2, 'Lorem Ipsum is simply dummy text of the printing and', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'post_image/1687419956400.jpg', 'Lorem Ipsum is simply dummy text of the printing and', 'Lorem Ipsum is simply dummy text of the printing and', 'Misor', 1, 0, 1, NULL, '2023-06-21 05:40:48', '2023-06-22 01:45:56'),
(48, 'b5d7398b-122e-4047-ae61-0df2f666586e', 8, 'Hello Randome heading', '<p>Even if you&#39;re not sure what a blog is, you&#39;ve no doubt come across one at some point in time. Perhaps you&#39;ve stumbled across a blog when you&#39;ve searched &quot;healthy dinner recipes&quot;. In fact, if you&#39;re reading this, guess what?&nbsp;<em>You&#39;re on a blog.&nbsp;</em>(Very meta, I know.)</p>', 'post_image/1691052084738.jpg', 'Hello Randome heading', 'Hello Randome heading', 'MSM', 1, 0, 1, NULL, '2023-06-24 03:53:16', '2023-08-03 08:41:25'),
(50, '09ac1a02-8126-43be-90f7-76af767d3e4e', 2, 'Ask a lawyer when life gets tricky', '<p>Verified lawyers are online around the clock and ready to answer your question online or by phone.&nbsp;</p>', 'post_image/1692016429753.jpg', 'Ask a lawyer when life gets tricky', 'Ask a lawyer when life gets tricky', NULL, 1, 1, 1, 1, '2023-06-24 04:29:48', '2023-08-17 04:18:54'),
(52, '1401bc2c-dcc9-45e7-b721-eff6730b17ad', 5, 'Ask a vet. Get veterinary questions answered.', '<p>Verified veterinarians are online around the clock and ready to answer your question online or by phone.&nbsp;</p>', 'post_image/169071555262.jpg', 'Ask a vet. Get veterinary questions answered.', 'Ask a vet. Get veterinary questions answered.', NULL, 1, 1, 1, 1, '2023-06-24 04:33:26', '2023-08-14 11:42:03'),
(53, '42ded668-6f24-440e-a246-1e736cb52606', 3, 'Ask a mechanic online and get answers to your car questions', '<p>Verified auto mechanics are online around the clock and ready to answer your question online or by phone.&nbsp;</p>', 'post_image/1692015987227.jpg', 'Ask a mechanic online and get answers to your car questions', 'Ask a mechanic online and get answers to your car questions', NULL, 1, 1, 1, 1, '2023-06-24 06:15:29', '2023-08-14 12:26:27'),
(54, '3e14f177-4ddc-403c-af55-ce1ce3bcd8df', 6, 'For online computer support, ask a computer technician', '<p>Verified tech support specialists are online around the clock and ready to answer your question online or by phone.&nbsp;</p>', 'post_image/1691496307798.jpg', 'For online computer support, ask a computer technician', 'For online computer support, ask a computer technician', NULL, 1, 1, 1, NULL, '2023-08-08 12:05:07', '2023-08-14 11:43:25'),
(55, '80a1151a-9deb-4342-9968-56c81077e264', 4, 'Electrical questions? Ask an electrician online.', '<p>Verified electricians are online around the clock and ready to answer your question online or by phone.&nbsp;</p>', 'post_image/1691581539480.png', 'Electrical questions? Ask an electrician online.', 'Electrical questions? Ask an electrician online.', NULL, 1, 1, 1, NULL, '2023-08-09 11:45:39', '2023-08-14 11:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(2, 'Raises', 'Raises', '2022-11-02 17:26:40', '2023-06-21 02:24:23'),
(4, 'Feature', 'Feature', '2022-11-05 21:40:41', '2022-12-02 02:13:46'),
(5, 'Fintech', 'Startup', '2022-11-30 07:49:01', '2022-11-30 07:49:01'),
(6, 'Startup', 'Startup', '2022-11-30 07:49:17', '2022-11-30 07:49:17'),
(7, 'How To', 'How-To', '2022-11-30 07:49:32', '2022-11-30 07:49:32'),
(8, 'Insights', 'Insights', '2022-12-02 02:13:30', '2022-12-02 02:13:30'),
(15, 'New Arrival', 'new_arrival', '2023-06-21 22:15:40', '2023-06-21 22:33:48'),
(19, 'politics', 'politics', '2023-09-13 05:22:42', '2023-09-13 05:22:42'),
(20, 'politics', 'politics', '2023-09-13 05:22:42', '2023-09-13 05:22:42'),
(21, 'good', 'good', '2023-09-13 05:29:02', '2023-09-13 05:29:02'),
(22, 'good', 'good', '2023-09-13 05:29:02', '2023-09-13 05:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `predefined_answers`
--

CREATE TABLE IF NOT EXISTS `predefined_answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phrase` json DEFAULT NULL,
  `answer_one` text,
  `answer_two` text,
  `answer_three` text,
  `answer_four` text,
  `answer_five` text,
  `category_id` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `predefined_answers`
--

INSERT INTO `predefined_answers` (`id`, `phrase`, `answer_one`, `answer_two`, `answer_three`, `answer_four`, `answer_five`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(35, NULL, 'Welcome! How can I help with your medical question?', 'The Doctor can help. Just a couple quick questions before I transfer you. What are all your symptoms? Are you currently using any medications?', 'What\'s your age and gender?', 'Anything else in your medical history you think the Doctor should know?', 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $10. While you\'re filling out that form, I\'ll tell the Neurologist about your situation and then connect you two.', 1, 1, '2023-08-10 10:35:57', '2023-08-14 11:47:17'),
(36, NULL, 'Welcome! How can I help with your legal question?', 'Where is this occurring? I only ask because laws can vary by state.', 'What steps have been taken so far?', 'Is there anything else the Lawyer should know before I connect you? Rest assured that they\'ll be able to help you.', 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $15. While you\'re filling out that form, I\'ll tell the Lawyer about your situation and then connect you two.', 2, 1, '2023-08-14 11:25:44', '2023-08-14 11:48:22'),
(37, NULL, 'Welcome! What\'s going on with your car?', 'What\'s the make, model, and year of your car?', 'What\'s the approximate mileage on your car?', 'Is there anything else the car Mechanic should know before I connect you? Rest assured that they\'ll be able to help you.', 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $9. While you\'re filling out that form, I\'ll tell the car Mechanic about your situation and then connect you two.', 3, 1, '2023-08-14 11:30:03', '2023-08-14 11:49:14'),
(38, NULL, 'Welcome! What\'s going on with your computer?', 'What specific product are you working with?', 'Is this a new or an ongoing problem?', 'Is there anything else the Computer Expert should know before I connect you? Rest assured that they\'ll be able to help you.', 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $20. While you\'re filling out that form, I\'ll tell the Computer Technician about your situation and then connect you two.', 6, 1, '2023-08-14 11:31:34', '2023-08-14 11:50:01'),
(39, NULL, 'Welcome! What\'s going on with your pet or animal?', 'What type of animal are we talking about?', 'When was the animal last seen by a vet?', 'And what\'s the animal\'s name and age?', 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $11. While you\'re filling out that form, I\'ll tell the Veterinarian about your animal and then connect you two.', 5, 1, '2023-08-14 11:35:39', '2023-08-14 11:50:36'),
(40, NULL, 'Welcome! How can I help with your electrical question?', 'How long has this been going on? What have you tried so far?', 'Is there anything else the Electrician should know before I connect you? Rest assured that they\'ll be able to help you.', 'Is there anything else the Electrician should know before I connect you? Rest assured that they\'ll be able to help you.', 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $5 (fully-refundable). While you\'re filling out that form, I\'ll tell the Electrician about your situation and then connect you two.', 4, 1, '2023-08-14 11:37:36', '2023-08-14 11:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `pricings`
--

CREATE TABLE IF NOT EXISTS `pricings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `stripe_price_id` varchar(255) DEFAULT NULL,
  `trial_price` float(10,2) DEFAULT NULL,
  `trial_day` int DEFAULT NULL,
  `recurring_price` float(10,2) DEFAULT NULL,
  `recurring_day` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pricings`
--

INSERT INTO `pricings` (`id`, `category_id`, `stripe_price_id`, `trial_price`, `trial_day`, `recurring_price`, `recurring_day`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(2, 2, 'price_1NezFuImRvvOt4BMQkFKcwg8', 1.00, 5, 300.00, 7, 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $15. While you\'re filling out that form, I\'ll tell the Lawyer about your situation and then connect you two.', NULL, 1, '2023-08-14 11:48:18', '2023-09-17 10:01:12', 1),
(3, 3, 'price_1NezGiImRvvOt4BM2Sks6r4Q', 1.00, 7, 500.00, 30, 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $9. While you\'re filling out that form, I\'ll tell the car Mechanic about your situation and then connect you two.', NULL, 1, '2023-08-14 11:49:08', '2023-08-14 16:28:09', 1),
(4, 6, 'price_1NezHVImRvvOt4BMvgPsv2aK', 20.00, 7, 400.00, 30, 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $20. While you\'re filling out that form, I\'ll tell the Computer Technician about your situation and then connect you two.', NULL, NULL, '2023-08-14 11:49:57', '2023-08-14 11:49:57', 1),
(5, 5, 'price_1NezIcImRvvOt4BMaDKuk6gI', 11.00, 7, 300.00, 30, 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $11. While you\'re filling out that form, I\'ll tell the Veterinarian about your animal and then connect you two.', NULL, NULL, '2023-08-14 11:51:06', '2023-08-14 11:51:06', 1),
(6, 4, 'price_1NezJFImRvvOt4BMwaDekLkQ', 5.00, 7, 210.00, 30, 'OK. Got it. I\'m sending you to a secure page to join JustAnswer for only $5 (fully-refundable). While you\'re filling out that form, I\'ll tell the Electrician about your situation and then connect you two.', NULL, NULL, '2023-08-14 11:51:45', '2023-08-14 11:51:45', 1),
(9, 8, 'price_1Noh0KImRvvOt4BMjjHo6lcG', 7.00, 7, 45.00, 45, 'test', NULL, NULL, '2023-09-10 06:20:20', '2023-09-10 06:20:20', 1),
(10, 1, 'price_1Noh3eImRvvOt4BMdiwMP8CY', 7.00, 7, 200.00, 45, NULL, NULL, NULL, '2023-09-10 06:23:47', '2023-09-10 06:23:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'web', '2023-06-10 02:19:44', '2023-06-10 02:19:44'),
(2, 'User', 'web', '2023-06-10 02:19:45', '2023-06-10 02:19:45'),
(3, 'Administrator1', 'web', '2023-07-09 02:58:35', '2023-07-09 02:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(45, 2),
(46, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(1, 3),
(2, 3),
(3, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `group` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` json DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `group`, `key`, `display_name`, `value`, `type`, `details`, `note`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Site', 'site.name', 'Name', 'Bdtask', 'text', NULL, NULL, 1, '2023-03-21 06:00:12', '2023-06-19 01:48:12'),
(2, 'Site', 'site.description', 'Description', 'Want to study abroad ? Get free expert advice and information on colleges, courses, exams, admission, student visa, and application process to study overseas.', 'text_area', NULL, NULL, 2, '2023-03-21 06:00:12', '2023-06-19 01:48:12'),
(3, 'Site', 'site.url', 'Site Url', 'http://24.199.122.48/backend', 'text', NULL, NULL, 3, '2023-03-21 06:00:12', '2023-07-31 10:54:16'),
(5, 'Site', 'site.logo_black', 'Logo Black', 'setting/HvUprpT7HNzC0j2CrTqv6d0rJ5wuzEBHWRf5SMtK.webp', 'image', NULL, 'Default image size 205x60', 4, '2023-03-21 06:00:12', '2023-06-19 05:46:38'),
(6, 'Site', 'site.favicon', 'Favicon', 'setting/6hrgR22EatGk1rofa4pkwY21yLLinez2kMHeBWsG.jpg', 'image', NULL, 'Default image size 68x68', 8, '2023-03-21 06:00:12', '2023-06-19 05:46:38'),
(7, 'Contact', 'contact.phn', 'Phone', '+880 1xxx xxx xxx', 'text', NULL, NULL, 1, '2023-03-21 06:00:12', '2023-03-21 06:00:12'),
(8, 'Contact', 'contact.email', 'Email', 'info@xxxxx.xxxx', 'text', NULL, NULL, 2, '2023-03-21 06:00:12', '2023-03-21 06:00:12'),
(9, 'Contact', 'contact.address', 'Address', 'xxxx,xxxx,xxxx-xxx', 'text', NULL, NULL, 3, '2023-03-21 06:00:12', '2023-03-21 06:00:12'),
(16, 'Appearance', 'appearance.auth_img', 'Authentication image', 'setting/8qw76vZESn16Y6Fv4pENvsNyvUmuO0ejia9vbv7c.jpg', 'image', '[]', NULL, 1, '2023-03-23 04:45:32', '2023-07-11 07:31:03'),
(17, 'Appearance', 'appearance.auth_quote_title', 'Authentication Page Quote Title', 'Top Notch Stock Resources', 'text', '[]', NULL, 2, '2023-03-23 04:51:08', '2023-03-23 04:54:13'),
(18, 'Appearance', 'appearance.auth_quote', 'Authentication Page Quote', 'Today, we create innovative solutions to the challenges that consumers face in both their everyday lives and events.', 'text_area', '[]', NULL, 3, '2023-03-23 04:55:02', '2023-03-23 04:55:18'),
(21, 'Team', 'team.title', 'Team Title', 'Our Team', 'text', '[]', NULL, 2, '2023-09-05 15:00:25', '2023-09-05 09:21:07'),
(22, 'Team', 'team.description', 'Team Des', 'Distinctively grow go forward manufactured products and optimal networks. Enthusiastically disseminate user-centric outsourcing revolutionary', 'text_area', '[]', NULL, 1, '2023-09-05 09:10:38', '2023-09-05 09:21:07'),
(23, 'About', 'about.title', 'About', 'About Us', 'text', '[]', NULL, 1, '2023-09-05 09:24:00', '2023-09-05 09:29:07'),
(24, 'About', 'about.about_des', 'Description', 'Distinctively grow go forward manufactured products and optimal networks. Enthusiastically disseminate user-centric outsourcing revolutionary', 'text', '[]', NULL, 2, '2023-09-05 09:30:18', '2023-09-05 09:30:48'),
(25, 'About', 'about.about_body_title', 'Body Title', 'Total Solutions for Your Business Here', 'text', '[]', NULL, 3, '2023-09-05 09:31:26', '2023-09-05 09:35:39'),
(26, 'About', 'about.about_body_des', 'Body Description', 'Interactively develop timely niche markets before extensive imperatives. Professionally repurpose strategies.', 'text', '[]', NULL, 4, '2023-09-05 09:31:50', '2023-09-05 09:35:40'),
(27, 'About', 'about.about_feature_1', 'Features 1', 'Creative Websites Design', 'text', '[]', NULL, 5, '2023-09-05 09:32:56', '2023-09-05 09:35:42'),
(28, 'About', 'about.about_feature_2', 'Features 2', 'Accounting Procedures Guidebook', 'text', '[]', NULL, 6, '2023-09-05 09:33:21', '2023-09-05 09:35:43'),
(29, 'About', 'about.about_feature_3', 'Features 3', 'Cost Accounting Fundamentals', 'text', '[]', NULL, 7, '2023-09-05 09:33:36', '2023-09-05 09:35:44'),
(30, 'About', 'about.about_feature_4', 'Features 4', 'SEO Optimization Services', 'text', '[]', NULL, 8, '2023-09-05 09:34:59', '2023-09-05 09:36:19'),
(31, 'Contact', 'contact.contact_dialog', 'Contact Dialog', 'Looking for an excellent Business idea?', 'text', '[]', NULL, 4, '2023-09-05 10:49:57', '2023-09-05 10:51:12'),
(32, 'Contact', 'contact.contact_dialog_des', 'Contact Dialog Description', 'Seamlessly deliver pandemic e-services and next-generation initiatives.', 'text', '[]', NULL, 5, '2023-09-05 10:50:23', '2023-09-05 10:51:13'),
(33, 'Contact', 'contact.contact_map_url', 'Contact Map Url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2170.1219362906672!2d90.41942245621335!3d23.82942415322914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a4136c4b61%3A0x19549f5462616f04!2sBdtask%20Limited!5e0!3m2!1sen!2sbd!4v1687537196310!5m2!1sen!2sbd', 'text', '[]', NULL, 6, '2023-09-05 10:54:57', '2023-09-05 10:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `stripe_subs_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_id` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `recurring_invoice_date` date DEFAULT NULL,
  `trial_day` int DEFAULT NULL,
  `trial_price` float(10,2) DEFAULT NULL,
  `recurring_day` int DEFAULT NULL,
  `recurring_price` float(10,2) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_invoices_created_by_foreign` (`created_by`),
  KEY `package_invoices_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `stripe_subs_id`, `subscription_id`, `category_id`, `customer_id`, `invoice_date`, `recurring_invoice_date`, `trial_day`, `trial_price`, `recurring_day`, `recurring_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'sub_1NqswOImRvvOt4BM8Wrk6B1w', 'SUBS-1', 1, 1, '2023-09-16', '2023-10-31', 7, 7.00, 45, 200.00, 1, NULL, NULL, '2023-09-16 07:26:09', '2023-09-16 07:29:21'),
(2, '', 'SUBS-2', 3, 2, '2023-09-16', '2023-10-16', 7, 1.00, 30, 500.00, 1, NULL, NULL, '2023-09-16 07:41:12', '2023-09-16 07:41:12'),
(3, '', 'SUBS-3', 1, 3, '2023-09-16', '2023-10-16', 7, 7.00, 45, 200.00, 1, NULL, NULL, '2023-09-16 07:57:20', '2023-09-16 07:57:20'),
(4, '', 'SUBS-4', 3, 4, '2023-09-16', '2023-10-16', 7, 1.00, 30, 500.00, 1, NULL, NULL, '2023-09-16 08:00:41', '2023-09-16 08:00:41'),
(5, '', 'SUBS-5', 1, 5, '2023-09-16', '2023-10-16', 7, 7.00, 45, 200.00, 0, NULL, 320, '2023-09-16 08:12:07', '2023-09-17 04:34:01'),
(6, '', 'SUBS-6', 2, 6, '2023-09-16', '2023-10-16', 5, 1.00, 30, 300.00, 0, NULL, 321, '2023-09-16 10:41:21', '2023-09-19 06:15:11'),
(7, '', 'SUBS-7', 2, 6, '2023-09-17', '2023-10-17', 5, 1.00, 30, 300.00, 0, NULL, 321, '2023-09-17 08:32:05', '2023-09-19 06:15:11'),
(8, '', 'SUBS-8', 1, 7, '2023-09-17', '2023-10-17', 7, 7.00, 45, 200.00, 1, NULL, NULL, '2023-09-17 09:37:44', '2023-09-17 09:37:44'),
(9, '', 'SUBS-9', 1, 8, '2023-09-17', '2023-10-17', 7, 7.00, 45, 200.00, 0, NULL, 324, '2023-09-17 09:44:04', '2023-09-17 10:10:47'),
(10, '', 'SUBS-10', 1, 6, '2023-09-17', '2023-10-17', 7, 7.00, 45, 200.00, 0, NULL, 321, '2023-09-17 10:55:37', '2023-09-19 06:15:11'),
(11, '', 'SUBS-11', 2, 6, '2023-09-18', '2023-09-25', 5, 1.00, 7, 300.00, 0, NULL, 321, '2023-09-18 04:21:44', '2023-09-19 06:15:11'),
(12, '', 'SUBS-12', 2, 6, '2023-09-18', '2023-09-25', 5, 1.00, 7, 300.00, 0, NULL, 321, '2023-09-18 04:22:55', '2023-09-19 06:15:11'),
(13, '', 'SUBS-13', 1, 6, '2023-09-18', '2023-11-02', 7, 7.00, 45, 200.00, 0, NULL, 321, '2023-09-18 04:25:38', '2023-09-19 06:15:11'),
(14, '', 'SUBS-14', 2, 6, '2023-09-18', '2023-09-25', 5, 1.00, 7, 300.00, 0, NULL, 321, '2023-09-18 04:29:13', '2023-09-19 06:15:11'),
(15, '', 'SUBS-15', 1, 10, '2023-09-18', '2023-11-02', 7, 7.00, 45, 200.00, 1, NULL, NULL, '2023-09-18 08:48:27', '2023-09-18 08:48:27'),
(16, '', 'SUBS-16', 2, 6, '2023-09-19', '2023-09-26', 5, 1.00, 7, 300.00, 1, NULL, NULL, '2023-09-19 06:15:11', '2023-09-19 06:15:11'),
(17, '', 'SUBS-17', 2, 13, '2023-09-19', '2023-09-26', 5, 1.00, 7, 300.00, 0, NULL, NULL, '2023-09-19 10:11:32', '2023-09-19 10:12:32'),
(18, '', 'SUBS-18', 2, 13, '2023-09-19', '2023-09-26', 5, 1.00, 7, 300.00, 1, NULL, NULL, '2023-09-19 10:12:32', '2023-09-19 10:12:32'),
(19, '', 'SUBS-19', 6, 18, '2023-09-25', '2023-10-25', 7, 20.00, 30, 400.00, 1, NULL, NULL, '2023-09-25 06:15:58', '2023-09-25 06:15:58'),
(20, '', 'SUBS-20', 1, 19, '2023-09-25', '2023-11-09', 7, 7.00, 45, 200.00, 1, NULL, NULL, '2023-09-25 12:15:54', '2023-09-25 12:15:54'),
(21, '', 'SUBS-21', 1, 20, '2023-09-25', '2023-11-09', 7, 7.00, 45, 200.00, 0, NULL, 366, '2023-09-25 16:09:50', '2023-09-25 16:12:22'),
(22, '', 'SUBS-22', 2, 21, '2023-09-25', '2023-10-02', 5, 1.00, 7, 300.00, 1, NULL, NULL, '2023-09-25 21:26:46', '2023-09-25 21:26:46'),
(23, '', 'SUBS-23', 1, 22, '2023-09-26', '2023-11-10', 7, 7.00, 45, 200.00, 1, NULL, NULL, '2023-09-26 05:57:38', '2023-09-26 05:57:38'),
(24, '', 'SUBS-24', 1, 23, '2023-10-04', '2023-11-18', 7, 7.00, 45, 200.00, 1, NULL, NULL, '2023-10-04 06:18:06', '2023-10-04 06:18:06'),
(25, '', 'SUBS-25', 1, 17, '2023-10-28', '2023-12-12', 7, 7.00, 45, 200.00, 1, NULL, NULL, '2023-10-28 09:34:00', '2023-10-28 09:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_payments`
--

CREATE TABLE IF NOT EXISTS `subscription_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint NOT NULL,
  `stripe_ch_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_id` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `payment_method_id` bigint UNSIGNED NOT NULL,
  `total_amount` double DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `payment_type` tinyint DEFAULT '1' COMMENT '1=subscription,2=recurring',
  `inv_pdf` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_invoice_payments_created_by_foreign` (`created_by`),
  KEY `package_invoice_payments_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_payments`
--

INSERT INTO `subscription_payments` (`id`, `subscription_id`, `stripe_ch_id`, `invoice_id`, `customer_id`, `category_id`, `payment_method_id`, `total_amount`, `received_date`, `payment_type`, `inv_pdf`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ch_3NqstIImRvvOt4BM12rU8Fx3', 'INV-1', 1, 1, 2, 7, '2023-09-16', 1, NULL, 316, NULL, '2023-09-16 07:26:09', '2023-09-16 07:26:09'),
(2, 1, NULL, 'INV-2', 1, 1, 2, 200, '2023-09-16', 2, NULL, NULL, NULL, '2023-09-16 07:29:21', '2023-09-16 07:29:21'),
(3, 2, 'ch_3Nqt7sImRvvOt4BM2VUIvFrY', 'INV-3', 2, 3, 2, 1, '2023-09-16', 1, NULL, 317, NULL, '2023-09-16 07:41:12', '2023-09-16 07:41:12'),
(4, 3, 'ch_3NqtNTImRvvOt4BM050BkoxL', 'INV-4', 3, 1, 2, 7, '2023-09-16', 1, '1', 318, NULL, '2023-09-16 07:57:20', '2023-09-16 07:58:23'),
(5, 4, 'ch_3NqtQjImRvvOt4BM2GLhjsB1', 'INV-5', 4, 3, 2, 1, '2023-09-16', 1, 'pdf/4650560a9b849f.pdf', 319, NULL, '2023-09-16 08:00:41', '2023-09-16 08:00:45'),
(6, 5, 'ch_3NqtbnImRvvOt4BM0zbeVWmh', 'INV-6', 5, 1, 2, 7, '2023-09-16', 1, 'pdf/565056357acc6c.pdf', 320, NULL, '2023-09-16 08:12:07', '2023-09-16 08:12:10'),
(7, 6, 'ch_3NqvwCImRvvOt4BM1WSQ28jf', 'INV-7', 6, 2, 2, 1, '2023-09-16', 1, 'pdf/665058651981bf.pdf', 321, NULL, '2023-09-16 10:41:21', '2023-09-16 10:41:24'),
(8, 7, 'ch_3NrGOdImRvvOt4BM0uLrGc92', 'INV-8', 6, 2, 2, 1, '2023-09-17', 1, 'pdf/76506b98537833.pdf', 321, NULL, '2023-09-17 08:32:05', '2023-09-17 08:32:08'),
(9, 8, 'ch_3NrHQCImRvvOt4BM1geCXkAq', 'INV-9', 7, 1, 2, 7, '2023-09-17', 1, 'pdf/86506c8e8db1a5.pdf', 323, NULL, '2023-09-17 09:37:44', '2023-09-17 09:37:48'),
(10, 9, 'ch_3NrHWJImRvvOt4BM0A8GBvbh', 'INV-10', 8, 1, 2, 7, '2023-09-17', 1, 'pdf/96506ca643e5aa.pdf', 324, NULL, '2023-09-17 09:44:04', '2023-09-17 09:44:07'),
(11, 10, 'ch_3NrIdYImRvvOt4BM2FAz0rk6', 'INV-11', 6, 1, 2, 7, '2023-09-17', 1, 'pdf/106506db295a215.pdf', 321, NULL, '2023-09-17 10:55:37', '2023-09-17 10:55:40'),
(12, 11, 'ch_3NrYxuImRvvOt4BM2rYCsQ0t', 'INV-12', 6, 2, 2, 1, '2023-09-18', 1, 'pdf/116507d0581581a.pdf', 321, NULL, '2023-09-18 04:21:44', '2023-09-18 04:21:47'),
(13, 12, 'ch_3NrYz4ImRvvOt4BM0KVyi5yv', 'INV-13', 6, 2, 2, 1, '2023-09-18', 1, 'pdf/126507d09f8c1cb.pdf', 321, NULL, '2023-09-18 04:22:55', '2023-09-18 04:22:58'),
(14, 13, 'ch_3NrZ1hImRvvOt4BM1xSzuf1D', 'INV-14', 6, 1, 2, 7, '2023-09-18', 1, 'pdf/136507d14277f27.pdf', 321, NULL, '2023-09-18 04:25:38', '2023-09-18 04:25:41'),
(15, 14, 'ch_3NrZ59ImRvvOt4BM1pcpdRft', 'INV-15', 6, 2, 2, 1, '2023-09-18', 1, 'pdf/146507d21908552.pdf', 321, NULL, '2023-09-18 04:29:13', '2023-09-18 04:29:16'),
(16, 15, 'ch_3Nrd82ImRvvOt4BM29TtZS9C', 'INV-16', 10, 1, 2, 7, '2023-09-18', 1, 'pdf/1565080edb66faf.pdf', 326, NULL, '2023-09-18 08:48:27', '2023-09-18 08:48:30'),
(17, 16, 'ch_3NrxDGImRvvOt4BM18aeiG9g', 'INV-17', 6, 2, 2, 1, '2023-09-19', 1, 'pdf/1665093c6fe6a84.pdf', 321, NULL, '2023-09-19 06:15:11', '2023-09-19 06:15:15'),
(18, 17, 'ch_3Ns0tzImRvvOt4BM0sGXk5ey', 'INV-18', 13, 2, 2, 1, '2023-09-19', 1, NULL, 329, NULL, '2023-09-19 10:11:32', '2023-09-19 10:11:32'),
(19, 18, 'ch_3Ns0uxImRvvOt4BM2xpFBU0k', 'INV-19', 13, 2, 2, 1, '2023-09-19', 1, 'pdf/1865097410c0c63.pdf', 329, NULL, '2023-09-19 10:12:32', '2023-09-19 10:12:36'),
(20, 19, 'ch_3Nu85JImRvvOt4BM1BTgBqb5', 'INV-20', 18, 6, 2, 20, '2023-09-25', 1, 'pdf/196511259e59cdd.pdf', 349, NULL, '2023-09-25 06:15:58', '2023-09-25 06:16:01'),
(21, 20, 'ch_3NuDheImRvvOt4BM20k4IM2N', 'INV-21', 19, 1, 2, 7, '2023-09-25', 1, 'pdf/20651179fac70bc.pdf', 365, NULL, '2023-09-25 12:15:54', '2023-09-25 12:15:58'),
(22, 21, 'ch_3NuHM1ImRvvOt4BM1ubspe7h', 'INV-22', 20, 1, 2, 7, '2023-09-25', 1, 'pdf/216511b0cea4419.pdf', 366, NULL, '2023-09-25 16:09:50', '2023-09-25 16:09:53'),
(23, 22, 'ch_3NuMIjImRvvOt4BM1rO7hO4q', 'INV-23', 21, 2, 2, 1, '2023-09-25', 1, 'pdf/226511fb1648020.pdf', 367, NULL, '2023-09-25 21:26:46', '2023-09-25 21:26:49'),
(24, 23, 'ch_3NuUH7ImRvvOt4BM1xNlLs9s', 'INV-24', 22, 1, 2, 7, '2023-09-26', 1, 'pdf/23651272d2afa70.pdf', 368, NULL, '2023-09-26 05:57:38', '2023-09-26 05:57:42'),
(25, 24, 'ch_3NxOPJImRvvOt4BM0q3r7zws', 'INV-25', 23, 1, 2, 7, '2023-10-04', 1, 'pdf/24651d039e74ae7.pdf', 374, NULL, '2023-10-04 06:18:06', '2023-10-04 06:18:09'),
(26, 25, 'ch_3O68u3ImRvvOt4BM29fmfQY2', 'INV-26', 17, 1, 2, 7, '2023-10-28', 1, 'pdf/25653cd588572c3.pdf', 348, NULL, '2023-10-28 09:34:00', '2023-10-28 09:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE IF NOT EXISTS `team_members` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `fb` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `designation`, `profile`, `is_active`, `fb`, `twitter`, `linkedin`, `created_at`, `updated_at`) VALUES
(5, 'John Q. Public', 'CEO', 'teams/1694505862_team1.webp', 1, '#', '#', '#', '2023-09-10 11:31:18', '2023-09-12 08:04:22'),
(6, 'John Q. Public', 'CEO', 'teams/1694506234_team2.webp', 1, '#', '#', '#', '2023-09-10 11:33:10', '2023-09-12 08:10:34'),
(7, 'John Q. Benly', 'CTO', 'teams/1694506267_team3.webp', 1, '#', '#', '#', '2023-09-10 11:33:35', '2023-09-12 08:11:07'),
(8, 'Larry Page', 'MD', 'teams/1694506314_team4.webp', 0, '#', '#', '#', '2023-09-10 11:33:56', '2023-09-12 10:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `header` text,
  `description` text,
  `rating` varchar(5) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `header`, `description`, `rating`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Jon Dev', 'Test designation', 'Join The Rocket Answer', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '4.5', 'cms/testimonial/1690791062347.jpg', '2023-07-06 06:14:26', '2023-07-31 08:11:02'),
(3, 'Md Salman Farshi', 'Php developer', 'Join The Rocket Answer', 'Mks Tamin Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '5', 'cms/testimonial/1690966970436.jpg', '2023-07-06 06:28:23', '2023-08-02 09:02:50'),
(4, 'Md tuhin Sarker', 'Team Leader', 'Join The Rocket Answer', 'Md tuhin SarkerLorem Ipsum is simply dummy text of the printing and typesetting industry', '5', 'cms/testimonial/1690966987125.jpg', '2023-07-06 06:28:23', '2023-08-02 09:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `transections`
--

CREATE TABLE IF NOT EXISTS `transections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `expert_id` int NOT NULL,
  `expert_withdraw_requests_id` int NOT NULL,
  `amount` float(10,2) NOT NULL,
  `transection_date` datetime DEFAULT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `note` text,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `device_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_online` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Others' COMMENT 'Male,Female,Others',
  `age` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending' COMMENT 'Pending, Active, Suspended',
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint DEFAULT NULL COMMENT '1,2 = adminuser,3=expert,4=customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=375 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `device_token`, `is_online`, `name`, `user_name`, `email`, `google_id`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `gender`, `age`, `address`, `status`, `profile_photo_path`, `remember_token`, `user_type`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Admin', '', 'admin@gmail.com', NULL, '07029123456', '2023-06-10 02:19:45', '$2y$10$k0DfYeZgjz38s8nJQi0bVenbEZjfIQQRg4.h/aPbpHj9phIiaJxz2', NULL, NULL, NULL, 'Others', '23', 'test', 'Active', 'users/4EkxFA4iPvlmO2ELTUQxgFFxWOVSkPIwN3qvDGS1.jpg', 'oQ0YZyPtJR1GBrKVX6YsanABvFVDIiMIhMEaK41NgSjFNLuide0k5xCLIED0', 1, '2023-06-10 02:19:45', '2023-07-11 07:31:31'),
(2, NULL, 1, 'User', '', 'user@gmail.com', NULL, NULL, '2023-06-10 02:19:45', '$2y$10$KgU4R2AxdXM6kd2kPRuW7OIKVzZkYw6UCpQ0y94kCV3I0mvYYl3GG', NULL, NULL, NULL, 'Others', NULL, NULL, 'Active', 'users/IqTzix7k6yXeEr34nWxePgDDF9DclZyDBc22CS6c.jpg', NULL, 2, '2023-06-10 02:19:45', '2023-06-12 22:23:59'),
(150, 'cNo-B3ImSCWVhFrsEYzyj_:APA91bEiI66QBDUqr0LZBLUDUggFrB0a_FpiRsleODu6tNWTac0bDAt4KeVSYM8GImWYk53vXz_sa3uB4_qxagBXqUnNqzy4habCzBk0TOF1Ox0p5YDAJGmSGGYgLgGX3vYyj7VMuyvU', 1, 'mr', 'mr', 'mr@gmail.com', NULL, NULL, NULL, '$2y$10$0dOcFTAyLEEpIMEK99LlceEw6VvdxHEHaLkKkjpbwxlb9WyrJeh9S', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-10 10:19:39', '2023-08-19 10:27:26'),
(151, NULL, 1, 'mr1', 'mr1', 'mr1@gmail.com', NULL, NULL, NULL, '$2y$10$R8VXn2QNqfEColOWrTaR1.lFgyPaweL6wFb1B0aPrrgqGK9utii/.', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-10 10:21:21', '2023-08-10 10:21:21'),
(155, 'elZefwouRj2MkHfyOM1Za5:APA91bFDJGJ76TFphOYPSXKTsUgmBaGZ39SbNv7dyyUzn-_b1_K4Yg6pbWMsuFgp4XcYpHQb4ySQ_gZ5Yz4ifvdqyvEd704I5ByYNZB4uZfqJtwTxGYZ1p7C-vR5__Xi2NYaPvVpCA5h', 1, 'mr2', 'mr2', 'mr2@gmail.com', NULL, NULL, NULL, '$2y$10$KGdUSRnkG52ldctUedlw9uaneI.b0BVBx0TgJnPdVtTap3wr/1eFq', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-10 10:45:06', '2023-08-31 06:59:14'),
(158, 'ePhaXS3NRjaRzNcOO67Vbc:APA91bESeCRhtaECu2gdJSYmJ9WCltUXkAsDnxnHYf29iU_kiK0hKvwLZ8jGZ-WqhtcSlx-Su2zlvxpJh9-kYHZWE5P1ijZJgPZ2Y2em3CZLEc19bfsa6uD-d5OMpFPQTDQHmeEz1fnr', 1, 'hafij', 'hafij', 'hafijur300000@gmail.com', NULL, NULL, NULL, '$2y$10$J3DqXdEquX1U2ZP5DbNkCezGZlxZ4kGRdnFTOVeZKCB0gnFK0NL76', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-13 08:53:53', '2023-08-13 10:42:20'),
(162, 'd-RZ7oAWSnOEch7oWd7HCG:APA91bHh1vPXXfHleEpUlkU41r1i1pGVHUYeUdro-uw5tpG0NmAzOWWuuNwx4blGKGOULM8kTa8yTc2WoLxDs-nfy4yPVclca4YH9byhLO7aW1ya-NR7KQWYD6-YzLsEqY1Cxv8Zispk', 1, 'Doctor', 'Doctor', 'doctor@gmail.com', NULL, NULL, NULL, '$2y$10$Oub9Rbz1ehMPEI02ijc2v.Wvk2QQIQdHyD7mKvy8S0DXnFKDP7xYC', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-14 05:54:49', '2023-08-22 11:25:13'),
(184, 'eqomAeLsSBmpNVu4kUFXs2:APA91bHpJmfB_Rkl3FKiqlL5tX6fCx-c78ghci4jNeXI5PwUUvCIv8rgIKSz1Hwsr4SE9iPSMaJ0pA_pICH2LwcnScpb_rLqXekeUAgvUS2KHbaQvBs-5MElfsv1JFLynJ_Sbom4-RZ7', 1, 'Mechanic', 'Mechanic', 'mechanic@gmail.com', NULL, NULL, NULL, '$2y$10$YpFUtE60MTG8S/kIvZHucuMbdDztCGn.iHuI0qwLbIzT2pLPdqd.i', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-14 14:25:55', '2023-08-14 14:25:58'),
(185, 'eqomAeLsSBmpNVu4kUFXs2:APA91bHpJmfB_Rkl3FKiqlL5tX6fCx-c78ghci4jNeXI5PwUUvCIv8rgIKSz1Hwsr4SE9iPSMaJ0pA_pICH2LwcnScpb_rLqXekeUAgvUS2KHbaQvBs-5MElfsv1JFLynJ_Sbom4-RZ7', 1, 'Mech', 'Mech', 'mechanic2@gmail.com', NULL, NULL, NULL, '$2y$10$QE7HYKYzXBUHkj4ErE/9Y.dyEZTd8JgWtktMcFj2D0LdtEWQlmhlO', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-14 14:28:33', '2023-08-14 14:28:36'),
(186, 'eqomAeLsSBmpNVu4kUFXs2:APA91bHpJmfB_Rkl3FKiqlL5tX6fCx-c78ghci4jNeXI5PwUUvCIv8rgIKSz1Hwsr4SE9iPSMaJ0pA_pICH2LwcnScpb_rLqXekeUAgvUS2KHbaQvBs-5MElfsv1JFLynJ_Sbom4-RZ7', 1, 'electrician', 'electrician', 'electrician@gmail.com', NULL, NULL, NULL, '$2y$10$zuG7VpAfdHIzO4RHRvIK4uHvdbRrn9dex0bVPTq7VW.a8N9fUxHfa', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-14 14:30:07', '2023-08-14 14:30:10'),
(187, 'eqomAeLsSBmpNVu4kUFXs2:APA91bHpJmfB_Rkl3FKiqlL5tX6fCx-c78ghci4jNeXI5PwUUvCIv8rgIKSz1Hwsr4SE9iPSMaJ0pA_pICH2LwcnScpb_rLqXekeUAgvUS2KHbaQvBs-5MElfsv1JFLynJ_Sbom4-RZ7', 1, 'Tech', 'Tech', 'tech@gmail.com', NULL, NULL, NULL, '$2y$10$BqRGWgcZKePeLFmBzywcheKvU0QsGnaOu1DW2KoolfFiBC0whQo4m', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-14 14:31:53', '2023-08-14 14:31:55'),
(188, 'eqomAeLsSBmpNVu4kUFXs2:APA91bHpJmfB_Rkl3FKiqlL5tX6fCx-c78ghci4jNeXI5PwUUvCIv8rgIKSz1Hwsr4SE9iPSMaJ0pA_pICH2LwcnScpb_rLqXekeUAgvUS2KHbaQvBs-5MElfsv1JFLynJ_Sbom4-RZ7', 1, 'Tech s', 'Tech s', 'tech2@gmail.com', NULL, NULL, NULL, '$2y$10$tFHUiZg7yVPmuVwbElVTROvOzxoE4fpTObElLfRT5LoRWjiw3TnQ.', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-14 14:33:47', '2023-08-14 14:33:50'),
(189, 'eqomAeLsSBmpNVu4kUFXs2:APA91bHpJmfB_Rkl3FKiqlL5tX6fCx-c78ghci4jNeXI5PwUUvCIv8rgIKSz1Hwsr4SE9iPSMaJ0pA_pICH2LwcnScpb_rLqXekeUAgvUS2KHbaQvBs-5MElfsv1JFLynJ_Sbom4-RZ7', 1, 'vet', 'vet', 'vet@gmail.com', NULL, NULL, NULL, '$2y$10$4yD8allKyxUlpSvELLzH5.rJbgotCLqHPXsWTCj6B5krqINxnyTP6', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-14 14:35:34', '2023-08-14 14:35:39'),
(190, 'eqomAeLsSBmpNVu4kUFXs2:APA91bHpJmfB_Rkl3FKiqlL5tX6fCx-c78ghci4jNeXI5PwUUvCIv8rgIKSz1Hwsr4SE9iPSMaJ0pA_pICH2LwcnScpb_rLqXekeUAgvUS2KHbaQvBs-5MElfsv1JFLynJ_Sbom4-RZ7', 1, 'Another Vaterian', 'Another Vaterian', 'vat2@gmail.com', NULL, NULL, NULL, '$2y$10$DBU6uctukGXWKwY1Tp2gf.w4RnBJzcQ2UamKdoCRgo46sG6F6SwV.', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-14 14:37:27', '2023-08-14 14:37:30'),
(191, 'eqomAeLsSBmpNVu4kUFXs2:APA91bHpJmfB_Rkl3FKiqlL5tX6fCx-c78ghci4jNeXI5PwUUvCIv8rgIKSz1Hwsr4SE9iPSMaJ0pA_pICH2LwcnScpb_rLqXekeUAgvUS2KHbaQvBs-5MElfsv1JFLynJ_Sbom4-RZ7', 1, 'electrician1', 'electrician1', 'electrician3@gmail.com', NULL, NULL, NULL, '$2y$10$fm5ar.PSSU.wJDgLKfszQ.GI8KruNfhqWBa/R4bYmNijrld1Qk//e', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-14 14:39:42', '2023-08-14 14:39:45'),
(198, 'ed9rhLaWTS-GLc0su52LZp:APA91bEpMsQIbWsHtC3fWOvnK0LipwfYcLQmITNWENTupDCElBd57jQ1tXmR7vbwc1lfoxONimTW6fSyZ7HqYOp2P9R-KKtramabeDJThvpmdIznTKNASrVIA71WP0vD7N0neFGX45l_', 1, 'lawyer', 'lawyer', 'lawyer@gmail.com', NULL, NULL, NULL, '$2y$10$5ZUfV31cHd8B5VQVjKjKOuzCF1OQGrB1XNrsR17dnQUMAPNaVQpje', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-17 11:36:13', '2023-09-25 21:23:52'),
(199, 'fY2jZ9LXTlmzfJ5DQQwD6I:APA91bF7kERPWLBVtBPqFeq-kf6XWW09MerpoefThjh5ntpzhQQJYtvrBXhc6EbZTQSsIpfH9oLvzFJPN7vbK0bWwC8wvRA68-8XATy5FHTDeKL0cfOUIuk_l-6abq4kWxqZ_zIUzUw3', 1, 'Md Hafijur Rahman', 'Md Hafijur Rahman', 'doctor_hafij@gmail.com', NULL, NULL, NULL, '$2y$10$FfW1XZaQBNsAoEmDSz0Al.yCSyXS9..PBTcmeawZJQ1Un87Hz/OHC', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-17 11:37:17', '2023-10-30 06:32:11'),
(204, 'fUmxEiJ1r0Zjhj5aVstpNg:APA91bFd01OcD1fOH0tYsF6HcIyRTBcOfXkixc0iQQxvzUHcVxzaYYUmlgruELuJEFCJL_AEd39-yWFAUAe4J6_P2E7FW7YaSGWkFy642ALecIr71KauqJIUp6Z8X6hq0Y47Ct-1XAYv', 1, 'mr5', 'mr5', 'mr5@gmail.com', NULL, NULL, NULL, '$2y$10$2f7P41A8JBJkGcqbwsjgGO7eGoGoXZpy5RCJb3FV9krsPUQBSGOGS', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-20 11:33:48', '2023-08-20 11:33:52'),
(205, 'e_hWEeUbTVqM3YbX7DHSp7:APA91bHyLtSEdtgu6XH4gxyC8FMkbjiT9va32dmL06otYzB3KwI-X9ZYTxdO5hVJmtw5Erat-8c88At6jeDHNv6aUoPwe0FqNufuHFaif6d5iZLj-Qa9dg-7-kAbUUMsN7tuoWp0LD1N', 1, 'igiggi', 'igiggi', 'mr10@gmail.com', NULL, NULL, NULL, '$2y$10$qVWehpTBXEzTrGpl1lMqEeVgs6yaUQpnLjbxHSIerK/fQCJeg43ce', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-21 08:57:31', '2023-08-21 08:57:40'),
(207, 'dZGLxRbzQ8ObSLLVze-3DT:APA91bEEQC5356iQt3nHfSfnZYDJ60vTs4TYN7O-A-UBrTinu0UkAo2hhA23z--d9T_g8wbV9FOzEsdwQOJhqaLVooZWqCREXnYIOBBva747lWQYBW9wUW6WHzIY8ahUyViLaDTkO9NU', 1, 'mr11', 'mr11', 'mr11@gmail.com', NULL, NULL, NULL, '$2y$10$nXoiBF1QV7oSOtGXlKF5..xO8lLmBEmyjPw91eKHT88jQ2Qfv5y62', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-22 05:32:30', '2023-08-22 05:32:39'),
(210, 'eMwjoEjSTqCZhcrGT4RtTh:APA91bEWCwW8KGbrqgmeKYuyynwWAeRJ-_i9QtRppSaoc0CfYyGTuRWcAvuHLsTzhjhbPLcfD_MJvv7zOAucpp2yBd8Tv0pQm9oODmNzkjL0QTKkNYQC8BwemVLHd_9H3nPG3g25wX50', 1, 'mr12', 'mr12', 'mr12@gmail.com', NULL, NULL, NULL, '$2y$10$z4m34T10Wxz6Cde6AAej8OWP1bXn.QTpdRbI01bLncP9s3LoPekE6', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-22 10:38:12', '2023-08-22 10:38:14'),
(211, 'eDYPElS2R16CJ5chGrPLob:APA91bFbb0gPWhWtcnS3ouFw6D968cZ91NMedMUUv60P9ds8ndRBRWMgOf-QaJiYMkfi0VoSs_fezfpy4ZVpl8ba-X-x3eDRnN7PZIgHqcxp-pYfqqLQe8m0DQz9s1ooQzlFzGN3fT_k', 1, 'doctorr', 'doctorr', 'doctorr@gmail.com', NULL, NULL, NULL, '$2y$10$uwBPKB.ENr/Bos3eU8gx2eBRGzY4qY94dka2J/VQvXi7oHp.niszq', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-08-22 12:00:16', '2023-10-04 07:33:16'),
(290, NULL, 1, 'tdoctor', 'tdoctor', 'tdoctor@gmail.com', NULL, NULL, NULL, '$2y$10$E9cYOMuTO684XZNQqF7oceKOMrYMq525N8Ri5cNQnbr6AtVPkp4HS', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-11 12:19:32', '2023-09-11 12:19:32'),
(305, 'fgkQBjFPRZK9YpPfnBZxpG:APA91bFwSe_w-8GZsuDdKBuasl4wpFBdFf4aprFdl_-fjO2yUtpCFT-uG9VnIXN7AD2hpdJbDLAUqhNO_cv7NfylONreE6jCiwlT6wshvzC8wvpXELaQ5vOhFEmWRZb11Q9c1Nqi0oLc', 1, 'tulawyer', 'tulawyer', 'tulawyer@gmail.com', NULL, NULL, NULL, '$2y$10$MlDLFOv.B/GPLRYhqUD1l..mwbfFnEsqLnJflAgEWik3JKvvZImpW', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-14 04:49:05', '2023-09-14 04:49:08'),
(316, NULL, 1, 'tuhin1', 'tuhin1@gmail.com', 'tuhin1@gmail.com', NULL, NULL, NULL, '$2y$10$eWjIvldDTkCe3GvFbCqrIukaI1Gljy82Jw03.p5Xa6.BlvlsF7OQS', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-16 07:25:46', '2023-09-16 07:25:46'),
(317, NULL, 1, 'tuhin2', 'tuhin2@gmail.com', 'tuhin2@gmail.com', NULL, NULL, NULL, '$2y$10$eu3CaOc87CWX7bPvPwccXeZs1C1Sg0F05wweH99QNheYpoJ7HLMPC', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-16 07:40:32', '2023-09-16 07:40:32'),
(318, NULL, 1, 'tuhin3', 'tuhin3@gmail.com', 'tuhin3@gmail.com', NULL, NULL, NULL, '$2y$10$77aHk3uiFwwi0bqsll5YNORromm1UkN49niSqmnqFskCVh98R8k7e', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-16 07:56:51', '2023-09-16 07:56:51'),
(319, NULL, 1, 'tuhin4', 'tuhin4@gmail.com', 'tuhin4@gmail.com', NULL, NULL, NULL, '$2y$10$Cc5/6Zz.aXSmZnKlNPmuM.WJ4uiIo8ZjYyL4lleRk37LjofvKSATy', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-16 08:00:22', '2023-09-20 03:36:32'),
(320, NULL, 1, 'kivabil645', 'kivabil645@viicard.com', 'kivabil645@viicard.com', NULL, NULL, NULL, '$2y$10$h/CDtb0lUW8YaG/A9uYrGuk7o1MDKqZoYm6MYOVWLoTi.u.k5PK3W', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-16 08:11:37', '2023-09-16 08:11:37'),
(321, NULL, 1, 'lol', 'lol@gmail.com', 'lol@gmail.com', NULL, NULL, NULL, '$2y$10$0BYoOJZUDuzMKTRQmGOYduFYJ7254.aa4Rj2V5rVCBwIrTZKctMr6', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-16 10:41:01', '2023-09-20 04:27:10'),
(322, 'cjFEIJAvS1mPtHiJCN6vFZ:APA91bF9vYi8-mwVtgb-pzx7YsWsTbX95HV9xG-5U70Nxzbeh6rdmP0row3F5SHmPEyD9YJquwi5Br5yebELK-C_kSV2a1dAnckPmYCQmErq9gH9mkTFJ-ehLk3L60_KTO_QSzVWqATt', 1, 'nabid', 'nabid', 'nabid@gmail.com', NULL, NULL, NULL, '$2y$10$fVZ1OXMu5hJTplWYIm7.AuToozpdYjLFLMDRXQiuxQWsZ5MjAsooy', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-17 09:31:09', '2023-09-17 09:31:16'),
(323, NULL, 1, 'podokap405', 'podokap405@ipnuc.com', 'podokap405@ipnuc.com', NULL, NULL, NULL, '$2y$10$CLFQ1BwU2dDQppyX6UOYVuQ9DPvfb8TuIGo/F05Y.9Bo/5ZH9l1nW', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-17 09:37:00', '2023-09-17 09:37:00'),
(324, NULL, 1, 'hanipip120', 'hanipip120@tenjb.com', 'hanipip120@tenjb.com', NULL, NULL, NULL, '$2y$10$9ZZQT1879rSC9sICNfJcAu.a2dyONS50iBjERwv3yiL9hs.Y2uwS.', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-17 09:43:26', '2023-09-17 09:43:26'),
(325, NULL, 1, 'daneci1088', 'daneci1088@twugg.com', 'daneci1088@twugg.com', NULL, NULL, NULL, '$2y$10$.1j3vfnW2s5YHHSrLeK0peWzcODo1T65m6rcw69EeLW3woCFo1vY.', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-17 12:31:53', '2023-09-17 12:31:53'),
(326, NULL, 1, 'admin23', 'admin23@gmail.com', 'admin23@gmail.com', NULL, NULL, NULL, '$2y$10$8fg/jXAzsPOVhY4SiBzj..lKN2oR1gaHgLgbNVTe3xjAxZOPHWZsW', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-18 08:46:31', '2023-09-18 08:46:31'),
(327, NULL, 1, 'mks.tamin.bd', 'mks.tamin.bd', 'mks.tamin.bd@gmail.com', '115742584025247380871', NULL, NULL, '', NULL, NULL, NULL, 'Others', NULL, NULL, 'Active', NULL, NULL, 4, '2023-09-19 06:17:03', '2023-09-19 06:17:03'),
(328, NULL, 1, 'lugnazuspa', 'lugnazuspa@gufum.com', 'lugnazuspa@gufum.com', NULL, NULL, NULL, '$2y$10$vX4yUAFH2Ljy4L8F5cMVlOUSjQit7xQUVg2TWLJhbcGoXTToqXB.m', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-19 07:54:07', '2023-09-19 07:55:36'),
(329, NULL, 1, 'jemox33929', 'jemox33929@tenjb.com', 'jemox33929@tenjb.com', NULL, NULL, NULL, '$2y$10$OQwV27tpIwXdUEP9wqDm.eO33.GMCT4q9zFuTYOBNuLE.s7/MAAXS', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-19 10:10:57', '2023-09-19 10:10:57'),
(330, NULL, 1, 'Mks', 'Mks', 'mks@g.com', NULL, NULL, NULL, '$2y$10$RtaohFGybY8bL08Nrc3I1OI7gWNcgWbTVzIlgCguMs8MPuAQp5LRG', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:01:47', '2023-09-20 08:01:47'),
(331, NULL, 1, 'tamin', 'tamin', 'k@k.com', NULL, NULL, NULL, '$2y$10$QFSIICcCBs6P0yo4Luoche0G5fwFqOeWb1bkmO9Tbb/tB3lepD7SC', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:03:53', '2023-09-20 08:03:53'),
(332, NULL, 1, 'asdf', 'asdf', 'asd@g.com', NULL, NULL, NULL, '$2y$10$d8Z2Me/B.CNffeXS1d5jc.QrPU9Ng8UMRg9K3FF/nVgf.xqqrkpvq', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:08:05', '2023-09-20 08:08:05'),
(333, NULL, 1, 'asdfasdf', 'asdfasdf', 'asd@f.com', NULL, NULL, NULL, '$2y$10$qTt2nnweAOy4Y1ZhCqH5eeufPGrZSYjGbPId/a7tPusAz9MpVev5O', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:09:30', '2023-09-20 08:09:30'),
(334, NULL, 1, 'asdfdsfdsfdf', 'asdfdsfdsfdf', 'asdfadf@ad.com', NULL, NULL, NULL, '$2y$10$jdFlIsKUXsj/MWhj0VYp3./jmbRRhqSk8YuMmew0gAiHWvBSQWKk6', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:11:00', '2023-09-20 08:11:00'),
(335, NULL, 1, 'dfgyrtr', 'dfgyrtr', 'dsfgfgh@g.com', NULL, NULL, NULL, '$2y$10$ArSEhON/CDWMBpOSu8aK4uUk8.UoNc8jncAhFAZOf7BfAqymDywgq', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:12:12', '2023-09-20 08:12:12'),
(336, NULL, 1, 'asdpp', 'asdpp', 'p@p.com', NULL, NULL, NULL, '$2y$10$tS16zHimEO4DFsPkl/lZBuCZJDOjiQAMu.tzrN93oR1KBmyFMmya6', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:14:51', '2023-09-20 08:14:51'),
(337, NULL, 1, 'asd', 'asd', 'asdfdf@a.com', NULL, NULL, NULL, '$2y$10$qHEJrw/2bmgwVcMH26nRaOs22ENChAnZ0vtOmH7YgHt/vcmUoKXLO', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:15:47', '2023-09-20 08:15:47'),
(338, NULL, 1, 'asdfj', 'asdfj', 'adsf@a.com', NULL, NULL, NULL, '$2y$10$3PxT95umotnVnK9hQIXPq.B9bzGjKKg4IgqSBXvSEvbLx8SlawgJy', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:17:31', '2023-09-20 08:17:31'),
(339, NULL, 1, 'asdf asd', 'asdf asd', 'adfm@ad.com', NULL, NULL, NULL, '$2y$10$m/.eOmSIfNmxBdaOcD1Pruf4WEV72BLhW40sVSZBEcvwlisbKk05S', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:18:08', '2023-09-20 08:18:08'),
(340, NULL, 1, 'asdf asdfsdf dsf', 'asdf asdfsdf dsf', 'h@d.com', NULL, NULL, NULL, '$2y$10$OgP2OiF9/BpNgb2Ov5G1fOBZ9lOS4g5qLFPi1dyVnzx8yjl.l08gC', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:19:33', '2023-09-20 08:19:33'),
(341, NULL, 1, 'mksssss', 'mksssss', 'mksss@g.com', NULL, NULL, NULL, '$2y$10$HKb6rTZaUlReruc7xoSXHOVC2eGP9oeUqxOqiFG3jvsOtJ65HGftq', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 08:51:59', '2023-09-20 08:51:59'),
(342, 'eDYPElS2R16CJ5chGrPLob:APA91bGRUGrswOSrAezmRcNDWjG8C75OGPepeGkheL9nQgzmuM1IYRu8wctFBTsFs7VV5W4-zePB-ByEKbCoeBazXO-R4lyVJq-SxXBQ-nEng0PaVp-9rCv10zZiMFl2zwQ9-ZSdEtOs', 1, 'lol', 'lol', 'elol@gmail.com', NULL, NULL, NULL, '$2y$10$n0gdGOT/tNuoELSYPvNkDu8DX/3onwUxXDtE8nCa8NyL4JMgI4sem', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-20 09:04:43', '2023-09-21 05:00:00'),
(343, NULL, 1, 'cc111', 'cc111@gmail.com', 'cc111@gmail.com', NULL, NULL, NULL, '$2y$10$CBSh2LodPkqE0pPK5a38VOFwRjqz1y3j7nuBFTHQ6l8XvyxGdJpxy', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-20 09:44:32', '2023-09-20 09:44:32'),
(344, NULL, 1, 'lllll', 'lllll', 'lllll@gmail.com', NULL, NULL, NULL, '$2y$10$5b.OcEUgZqt195AYb4v9J..QPAYnc5GPHnXTytSMBwQb1qKDRVdgC', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-21 09:25:45', '2023-09-21 09:25:45'),
(345, NULL, 1, 'ahad', 'ahad', 'ahad@gmail.com', NULL, NULL, NULL, '$2y$10$F0vtzzWUn5Y4NMPb6d9tk.gvhmyHwomtSnq67fIuINL69RYGA4Ahq', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-21 11:22:47', '2023-09-21 11:22:47'),
(346, NULL, 1, 'customer', 'customer@gmail.com', 'customer@gmail.com', NULL, NULL, NULL, '$2y$10$MPdTXZA88R0kUtyttV9Fzed4Mpfs50ZsTdMataeNdM4EcWHmStms.', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-24 03:53:40', '2023-09-24 03:53:40'),
(347, NULL, 1, 'abc', 'abc@gmail.com', 'abc@gmail.com', NULL, NULL, NULL, '$2y$10$KUzDU/OSY/XXcbSBhf4v.uef/S.ILOjzymxp2egMrQbiHNWeQ8/DW', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-24 04:50:43', '2023-09-24 04:50:43'),
(348, NULL, 1, 'a', 'a@a.com', 'a@a.com', NULL, NULL, NULL, '$2y$10$LvsNeBrjfoXx.VBecUpQiOgkykPXG8wUZD94k283Dz8hCNAT9lh0y', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-25 06:14:26', '2023-09-25 06:14:26'),
(349, NULL, 1, 'ab', 'ab@ab.com', 'ab@ab.com', NULL, NULL, NULL, '$2y$10$OtE4.TKPjwav3zezJvdrieKi4XJbR05wpS9jg9EW87X7AQCb54gJW', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-25 06:15:11', '2023-09-25 06:15:11'),
(350, NULL, 1, 'aaaa', 'aaaa', 'ea@a.com', NULL, NULL, NULL, '$2y$10$Y5CDGiSlgnusBW0CaJWfQ.QFtpkJJ9ojCDKvN7Z/.eILv0Pg0UN1q', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:18:23', '2023-09-25 06:18:23'),
(351, NULL, 1, 'bbbbb', 'bbbbb', 'eb@b.com', NULL, NULL, NULL, '$2y$10$tkOYb1sOqqvyydLesfQHaeyV7e.Wr.SRyaQcKYn/vKQ2TDbTxJvk.', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:20:07', '2023-09-25 06:20:07'),
(352, NULL, 1, 'asdfdsf', 'asdfdsf', 'asd@a.com', NULL, NULL, NULL, '$2y$10$Vv19Imhc91AMX6YgQrEd2.HNdgIywShkNfvHasv8oXq9Bw2CVFSR.', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:21:46', '2023-09-25 06:21:46'),
(353, NULL, 1, 'dfg', 'dfg', 's@asdf.cp', NULL, NULL, NULL, '$2y$10$2WMrcaMDuHeRzaHpOF4YvOOjDqgN.XxnQWYOqLWq./26kqZuGk5ci', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:23:46', '2023-09-25 06:23:46'),
(354, NULL, 1, 'asdsdf', 'asdsdf', 'asdfd@asdfl.com', NULL, NULL, NULL, '$2y$10$6ErJibJwg86CiEQXZXMLoOG6kce18SA91piYve1oOMMA/1XVLdIgy', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:25:43', '2023-09-25 06:25:43'),
(355, NULL, 1, 'pjjjj', 'pjjjj', 'ppsd@p.com', NULL, NULL, NULL, '$2y$10$Ue1n7ZayCC.uduvCfO1yMej7md5xNMtQuDTPZdAGYLtXoFEihPJ7e', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:26:53', '2023-09-25 06:26:53'),
(356, NULL, 1, 'asdfdsfdsfsdfds', 'asdfdsfdsfsdfds', 'pasdpf@pasd.com', NULL, NULL, NULL, '$2y$10$0FwxPXElnj7jwDACjB8uuuKCFXOry/Y5Rn33l5ttjY.mXCKL8pYdS', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:28:03', '2023-09-25 06:28:03'),
(357, NULL, 1, 'asdfsdfsf', 'asdfsdfsf', 'asdfsaf@c.csd', NULL, NULL, NULL, '$2y$10$IiutmPtqNKfCml.PWwBdm.WQetgofSV9dyeFj9xhh/Sqy5jOgvcxC', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:28:36', '2023-09-25 06:28:36'),
(358, NULL, 1, 'asdfsdfspapd', 'asdfsdfspapd', 'pppppp@lc.on', NULL, NULL, NULL, '$2y$10$4M/kJaKBLrn2RlD3tE5pcO9BG5ECWb1WUhkPerc1J3e.PzXdNc5Jq', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:29:11', '2023-09-25 06:29:11'),
(359, NULL, 1, 'Compiler', 'Compiler', 'compiler@co.com', NULL, NULL, NULL, '$2y$10$EB1rwAY/pqOv7e2BPiZ8XuZ8hwi9gdrHP5kpmPRs/Xf7RZNcISFra', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:31:42', '2023-09-25 06:31:42'),
(360, NULL, 1, 'asdfdsfsdfsadf', 'asdfdsfsdfsadf', 'pasdfdf@lksdf.com', NULL, NULL, NULL, '$2y$10$mhu6n00LM45KEyreBFX15u9/etZre9u0uBHQMDS9E1xyERpRRlZM6', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:32:50', '2023-09-25 06:32:50'),
(361, NULL, 1, 'pppppp', 'pppppp', 'pppp@d.com', NULL, NULL, NULL, '$2y$10$ylUoX6GjD6hWRe104fJ84e5Cx4XYDgP8/gTy6.4wqzk4.f85L5P9a', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:34:17', '2023-09-25 06:34:17'),
(362, NULL, 1, 'asdfdsfsdfsdf', 'asdfdsfsdfsdf', 'oppp@lasd.com', NULL, NULL, NULL, '$2y$10$9CL78rNAcYL6OYwiSP8xNelG32sflZLnrtaQ/PDEh1ElWCHVR4KhK', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:36:27', '2023-09-25 06:36:27'),
(363, NULL, 1, 'house', 'house', 'house@house.com', NULL, NULL, NULL, '$2y$10$7kS28hofm4/v/7FWosbRVuZbIqvrZ.dgD4rbMJmMcyqYq3VXkfvbW', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:37:30', '2023-09-25 06:37:30'),
(364, NULL, 1, 'asdfd', 'asdfd', 'papsd@lasd.com', NULL, NULL, NULL, '$2y$10$A1JhYYeuvy5DOJI6DX9gDu60t5bEIVjRT.miS9Aus4FaF7xbrObMy', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-25 06:41:26', '2023-09-25 06:41:26'),
(365, NULL, 1, 'fdasdssf', 'fdasdssf@gmail.com', 'fdasdssf@gmail.com', NULL, NULL, NULL, '$2y$10$rPyeE2cdODpct7z5EbDEa.FwvfXkF36LYuKEsRjVtfsFdY8Sp5Lc6', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-25 12:15:28', '2023-09-25 12:15:28'),
(366, NULL, 1, 'kk', 'kk@k.com', 'kk@k.com', NULL, NULL, NULL, '$2y$10$Qm387Hamu83UkqxoSgiexOkmnbnd/ZurEnXPjEMj/pahPdJbPLUyK', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-25 16:09:22', '2023-09-25 16:09:22'),
(367, NULL, 1, 'danny818', 'danny818@gmail.com', 'danny818@gmail.com', NULL, NULL, NULL, '$2y$10$ti3oT/RwRzfGCV6J..UMV.k8Ah7dlN.luiPnNEYT9n0CcDuzFWzDa', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-25 21:26:18', '2023-09-25 21:26:18'),
(368, NULL, 1, 'llll', 'llll@l.com', 'llll@l.com', NULL, NULL, NULL, '$2y$10$.kuJ3Ktp6v6l/H.vArQn3u9Iarglakd/iF1Ya.vAhTOHPKpFwjBVS', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-09-26 05:57:19', '2023-09-26 05:57:19'),
(369, NULL, 1, 'sdf', 'sdf', 'as@s.com', NULL, NULL, NULL, '$2y$10$AmlgYuYPTIU6f0w990YOHO4IC6LuUHHUEXzitB5PDg0HZbb0D/cqq', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-27 06:17:26', '2023-09-27 06:17:26'),
(370, NULL, 1, 'asdasdf', 'asdasdf', 'asd@o.com', NULL, NULL, NULL, '$2y$10$v25O8T4.EsWbsVRBfRiSbuQna4S31bVLuDsYbQyMQ3fHLRtwkeKPG', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-27 06:30:03', '2023-09-27 06:30:03'),
(371, NULL, 1, 'Lllllll', 'Lllllll', 'msk@m.com', NULL, NULL, NULL, '$2y$10$zwr426izh3peLpYmeoAl0eyrRJgVNXLTXlKBNeEY7FRNUddMcIob.', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-27 06:49:56', '2023-09-27 06:49:56'),
(372, NULL, 1, 'mmm', 'mmm', 'tmt@gmail.com', NULL, NULL, NULL, '$2y$10$OV6s/tTzJfEuboUhpY0kh.0uMO0EPS1oW2eWqvOHfdjwtH5aWJgpu', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-27 07:17:32', '2023-09-27 07:17:32'),
(373, 'eDYPElS2R16CJ5chGrPLob:APA91bGRUGrswOSrAezmRcNDWjG8C75OGPepeGkheL9nQgzmuM1IYRu8wctFBTsFs7VV5W4-zePB-ByEKbCoeBazXO-R4lyVJq-SxXBQ-nEng0PaVp-9rCv10zZiMFl2zwQ9-ZSdEtOs', 1, 'mmmmm', 'mmmmm', 'm@m.com', NULL, NULL, NULL, '$2y$10$HDEohzoZg.1wbD8otJEEUuxsaW1EI2xKdKS48V1oW8z8vz6s.1DKO', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 3, '2023-09-27 07:22:02', '2023-09-27 08:22:58'),
(374, NULL, 1, 'abcdabcd', 'abcdabcd@gmail.com', 'abcdabcd@gmail.com', NULL, NULL, NULL, '$2y$10$1u5KE/wnCNyoNlry8YreEeldVEw.Kep0Sc.qzxuhx6.OjN9cPUXT6', NULL, NULL, NULL, 'Others', NULL, NULL, 'Pending', NULL, NULL, 4, '2023-10-04 06:17:43', '2023-10-04 06:17:43');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `packages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `package_durations`
--
ALTER TABLE `package_durations`
  ADD CONSTRAINT `package_durations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `package_durations_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `package_invoice_details`
--
ALTER TABLE `package_invoice_details`
  ADD CONSTRAINT `package_invoice_details_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `package_invoice_details_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `package_invoice_payments`
--
ALTER TABLE `package_invoice_payments`
  ADD CONSTRAINT `package_invoice_payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `package_invoice_payments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `package_modules`
--
ALTER TABLE `package_modules`
  ADD CONSTRAINT `package_modules_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `package_modules_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `package_payment_methods`
--
ALTER TABLE `package_payment_methods`
  ADD CONSTRAINT `package_payment_methods_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `package_payment_methods_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `package_recarring_invoices`
--
ALTER TABLE `package_recarring_invoices`
  ADD CONSTRAINT `package_recarring_invoices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `package_recarring_invoices_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `package_recarring_invoice_details`
--
ALTER TABLE `package_recarring_invoice_details`
  ADD CONSTRAINT `package_recarring_invoice_details_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `package_recarring_invoice_details_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `package_recarring_invoice_payments`
--
ALTER TABLE `package_recarring_invoice_payments`
  ADD CONSTRAINT `package_recarring_invoice_payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `package_recarring_invoice_payments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `package_settings`
--
ALTER TABLE `package_settings`
  ADD CONSTRAINT `package_settings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `package_settings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
