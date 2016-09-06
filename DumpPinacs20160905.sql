CREATE DATABASE  IF NOT EXISTS `pinacs_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `pinacs_db`;
-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: pinacs_db
-- ------------------------------------------------------
-- Server version	5.7.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activations`
--

LOCK TABLES `activations` WRITE;
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
INSERT INTO `activations` VALUES (1,1,'mWxuqqdimPlxy7IXd1J20ca6DyTiIfMl',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(2,2,'Ugizqui0Sz8L7OzKMENQKswbU6bAaFEP',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(3,3,'q8i5jb6iqKXv1FWAlZBTLWrZOzUrpITM',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(4,4,'E1eXmCsNPQcjz0NU0UWn85FtZayoFCIT',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(5,5,'rkxRhyHISvPCKBRA4goTqpWmfQOvdx5Q',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(6,6,'dB5pJ8wTYNaG5QFW1baEYjtSF23ncYi2',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(7,7,'A9OiSmSSUBDwHjQ4aUWVOi2oMJeRy7od',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(8,8,'VdviaHpF38tTyHLAopDOTJ6iTBF2Zuam',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(9,9,'NWLB1I9HUG0ymyAaz0bNuddq8Qq4jDJ5',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(10,10,'SR7aak33VT49WDaPJklyasDqeCtJU20P',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(11,11,'A4mGD5n08rEGEzGoWY3jseTOnqPTfuAv',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57'),(12,12,'ikGcMgEPxzQu0G2tbMqHWNMvE57gw8bF',1,'2016-09-05 12:14:57','2016-09-05 12:14:57','2016-09-05 12:14:57');
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assigns`
--

DROP TABLE IF EXISTS `assigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_year_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assigns_class_year_id_foreign` (`class_year_id`),
  KEY `assigns_user_id_foreign` (`user_id`),
  CONSTRAINT `assigns_class_year_id_foreign` FOREIGN KEY (`class_year_id`) REFERENCES `class_years` (`id`),
  CONSTRAINT `assigns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assigns`
--

LOCK TABLES `assigns` WRITE;
/*!40000 ALTER TABLE `assigns` DISABLE KEYS */;
INSERT INTO `assigns` VALUES (1,2,3,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(2,1,3,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(3,5,3,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(4,4,4,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(5,3,4,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(6,6,4,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(7,2,6,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(8,5,6,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(9,2,7,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(10,5,7,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(11,2,8,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(12,5,8,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(13,4,9,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(14,6,9,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(15,4,10,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(16,6,10,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(17,4,11,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(18,6,11,'2016-09-05 12:14:57','2016-09-05 12:14:57');
/*!40000 ALTER TABLE `assigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_years`
--

DROP TABLE IF EXISTS `class_years`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_years` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_class_id` int(10) unsigned NOT NULL,
  `school_year` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `starting` date NOT NULL,
  `ending` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_years_level_class_id_foreign` (`level_class_id`),
  CONSTRAINT `class_years_level_class_id_foreign` FOREIGN KEY (`level_class_id`) REFERENCES `level_classes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_years`
--

LOCK TABLES `class_years` WRITE;
/*!40000 ALTER TABLE `class_years` DISABLE KEYS */;
INSERT INTO `class_years` VALUES (1,3,'2015-2016','2015-09-15','2016-09-14','2016-09-05 12:14:57','2016-09-05 12:14:57'),(2,3,'2014-2015','2014-09-15','2015-09-14','2016-09-05 12:14:57','2016-09-05 12:14:57'),(3,4,'2015-2016','2015-09-15','2016-09-14','2016-09-05 12:14:57','2016-09-05 12:14:57'),(4,4,'2014-2015','2014-09-15','2015-09-14','2016-09-05 12:14:57','2016-09-05 12:14:57'),(5,5,'2015-2016','2015-09-15','2016-09-14','2016-09-05 12:14:57','2016-09-05 12:14:57'),(6,6,'2015-2016','2015-09-15','2016-09-14','2016-09-05 12:14:57','2016-09-05 12:14:57');
/*!40000 ALTER TABLE `class_years` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `homework_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `class_year_id` int(10) unsigned NOT NULL,
  `grade` double(8,2) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grades_homework_id_foreign` (`homework_id`),
  KEY `grades_student_id_foreign` (`student_id`),
  KEY `grades_teacher_id_foreign` (`teacher_id`),
  KEY `grades_class_year_id_foreign` (`class_year_id`),
  CONSTRAINT `grades_class_year_id_foreign` FOREIGN KEY (`class_year_id`) REFERENCES `class_years` (`id`) ON DELETE CASCADE,
  CONSTRAINT `grades_homework_id_foreign` FOREIGN KEY (`homework_id`) REFERENCES `class_years` (`id`),
  CONSTRAINT `grades_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `grades_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,1,6,3,2,8.00,NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(2,1,7,3,2,0.00,NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(3,1,8,3,2,3.00,NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(4,2,9,4,4,3.00,NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(5,2,10,4,4,6.00,NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(6,2,11,4,4,10.00,NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(7,3,6,3,5,7.50,'u suck bro','2016-09-05 12:14:57','2016-09-05 12:21:09'),(8,3,7,3,5,5.00,'dada','2016-09-05 12:14:57','2016-09-05 13:00:51'),(9,3,8,3,5,3.00,NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(10,4,9,4,6,3.00,NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(11,4,10,4,6,6.00,NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(12,4,11,4,6,10.00,NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homework_class_years`
--

DROP TABLE IF EXISTS `homework_class_years`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homework_class_years` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_year_id` int(10) unsigned NOT NULL,
  `homework_id` int(10) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `state` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `homework_class_years_class_year_id_foreign` (`class_year_id`),
  KEY `homework_class_years_homework_id_foreign` (`homework_id`),
  CONSTRAINT `homework_class_years_class_year_id_foreign` FOREIGN KEY (`class_year_id`) REFERENCES `class_years` (`id`) ON DELETE CASCADE,
  CONSTRAINT `homework_class_years_homework_id_foreign` FOREIGN KEY (`homework_id`) REFERENCES `homeworks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homework_class_years`
--

LOCK TABLES `homework_class_years` WRITE;
/*!40000 ALTER TABLE `homework_class_years` DISABLE KEYS */;
INSERT INTO `homework_class_years` VALUES (1,2,1,'2015-01-13 00:00:00','2015-01-20 00:00:00','active','2016-09-05 12:14:57','2016-09-05 12:14:57'),(2,4,2,'2015-01-13 00:00:00','2015-01-20 00:00:00','active','2016-09-05 12:14:57','2016-09-05 12:14:57'),(3,5,3,'2016-01-13 00:00:00','2016-01-20 00:00:00','active','2016-09-05 12:14:57','2016-09-05 12:21:16'),(4,6,4,'2016-01-13 00:00:00','2016-01-20 00:00:00','active','2016-09-05 12:14:57','2016-09-05 12:14:57');
/*!40000 ALTER TABLE `homework_class_years` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homeworks`
--

DROP TABLE IF EXISTS `homeworks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homeworks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `homeworks_user_id_foreign` (`user_id`),
  CONSTRAINT `homeworks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homeworks`
--

LOCK TABLES `homeworks` WRITE;
/*!40000 ALTER TABLE `homeworks` DISABLE KEYS */;
INSERT INTO `homeworks` VALUES (1,3,'Revision for test cocksuckers','homework','2016-09-05 12:14:57','2016-09-05 12:14:57'),(2,4,'Revision for test cocksuckers 2','homework','2016-09-05 12:14:57','2016-09-05 12:14:57'),(3,3,'Revision for test cocksuckers new','homework','2016-09-05 12:14:57','2016-09-05 12:14:57'),(4,4,'Revision for test cocksuckers new 2','homework','2016-09-05 12:14:57','2016-09-05 12:14:57');
/*!40000 ALTER TABLE `homeworks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `level_classes`
--

DROP TABLE IF EXISTS `level_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `level_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `level_classes_parent_foreign` (`parent`),
  CONSTRAINT `level_classes_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `level_classes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `level_classes`
--

LOCK TABLES `level_classes` WRITE;
/*!40000 ALTER TABLE `level_classes` DISABLE KEYS */;
INSERT INTO `level_classes` VALUES (1,'Pro Junior',NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(2,'Junior',NULL,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(3,'Pro Junior 1',1,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(4,'Pro Junior 2',1,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(5,'Junior 1',2,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(6,'Junior 2',2,'2016-09-05 12:14:57','2016-09-05 12:14:57');
/*!40000 ALTER TABLE `level_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_07_02_230147_migration_cartalyst_sentinel',1),('2014_10_12_100000_create_password_resets_table',1),('2016_08_25_063719_create_level_class_table',1),('2016_08_25_063730_create_class_year_table',1),('2016_08_25_063802_create_assigns_table',1),('2016_09_01_130044_create_homework_table',1),('2016_09_01_130056_create_grades_table',1),('2016_09_01_135652_create_table_homework_class_years',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persistences`
--

DROP TABLE IF EXISTS `persistences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persistences`
--

LOCK TABLES `persistences` WRITE;
/*!40000 ALTER TABLE `persistences` DISABLE KEYS */;
INSERT INTO `persistences` VALUES (15,12,'vohPK18HNxmKTMJXxOyAkgKxbSVOfu2Y','2016-09-05 13:01:19','2016-09-05 13:01:19');
/*!40000 ALTER TABLE `persistences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminders`
--

LOCK TABLES `reminders` WRITE;
/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_users_role_id_foreign` (`role_id`),
  CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_users`
--

LOCK TABLES `role_users` WRITE;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
INSERT INTO `role_users` VALUES (1,1,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(2,2,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(3,3,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(4,3,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(5,3,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(6,5,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(7,5,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(8,5,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(9,5,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(10,5,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(11,5,'2016-09-05 12:14:57','2016-09-05 12:14:57'),(12,4,'2016-09-05 12:14:57','2016-09-05 12:14:57');
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'users','Users',NULL,'2016-09-05 12:14:56','2016-09-05 12:14:56'),(2,'admins','Admins',NULL,'2016-09-05 12:14:56','2016-09-05 12:14:56'),(3,'teachers','Teachers',NULL,'2016-09-05 12:14:56','2016-09-05 12:14:56'),(4,'parents','Parents',NULL,'2016-09-05 12:14:56','2016-09-05 12:14:56'),(5,'students','Students',NULL,'2016-09-05 12:14:56','2016-09-05 12:14:56');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `throttle`
--

LOCK TABLES `throttle` WRITE;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_to` int(10) unsigned DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_parent_to_foreign` (`parent_to`),
  CONSTRAINT `users_parent_to_foreign` FOREIGN KEY (`parent_to`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user@user.com','$2y$10$EcO6Eabv1xUUKXYFlNC.IOCzEEX6H/J/LEuPQvXJC0IQi72Y28iD6','96718318',NULL,NULL,NULL,'UserFirstName','UserLastName','2016-09-05 12:14:57','2016-09-05 12:14:57'),(2,'admin@admin.com','$2y$10$kXcWNpve1s1LNK1oTO85p.TGFh5cZHACv.DwKeC2YvCcdo1giqPfW','96718318',NULL,NULL,NULL,'AdminFirstName','AdminLastName','2016-09-05 12:14:57','2016-09-05 12:14:57'),(3,'ezeinis14@gmail.com','$2y$10$bngmaN1HZ3470gKJ0yYXfOvaES1hBJrNcFgM04FBAxAj9L/R6Oo7G','96718318',NULL,NULL,'2016-09-05 13:00:15','Alexis','Nearxou','2016-09-05 12:14:57','2016-09-05 13:00:15'),(4,'ezeinis12@gmail.com','$2y$10$GygYrY1Ha.Rh30cz/YlS/.WwkkJImQFU7O5.EwvS6Mpj/0aK.fvPS','96718318',NULL,NULL,NULL,'Yiannis','Elpidis','2016-09-05 12:14:57','2016-09-05 12:14:57'),(5,'ezeinis11@gmail.com','$2y$10$RE8/p1Mo4OMYEyFgulaQB.InJQbVwSxrjw1U2UMlP.7VWKINCvv.u','96718318',NULL,NULL,NULL,'Dimitris','Parpounas','2016-09-05 12:14:57','2016-09-05 12:14:57'),(6,'ezeinis13@gmail.com','$2y$10$8B.pXTlhhtH2oKSeM262xeEuzL3MoX0U4PoIjxilw48CwDifLYBB6','96718318',NULL,NULL,'2016-09-05 13:00:57','Efthimis','Zeinis','2016-09-05 12:14:57','2016-09-05 13:00:57'),(7,'ezeinis15@gmail.com','$2y$10$T.N7BcgDshyscUmqP2tvQuTBkADOaS8aemkmvnh7cjYAdfKr8wNyK','96718318',NULL,NULL,'2016-09-05 12:21:31','Kostas','Lamo','2016-09-05 12:14:57','2016-09-05 12:21:31'),(8,'ezeinis16@gmail.com','$2y$10$V0OStpXtkeg2iS671H/y0.srcD80d7Kedmj4jX/YR8zrtOkr7CMQq','96718318',NULL,NULL,NULL,'Stayros','Diolatzis','2016-09-05 12:14:57','2016-09-05 12:14:57'),(9,'ezeinis17@gmail.com','$2y$10$Y1iL2K4b3CK6hMp5ga/SjOd3u1ylBkzdJXDSDwo2flBQHhG7I3JVa','96718318',NULL,NULL,NULL,'Kostas','Zarkadis','2016-09-05 12:14:57','2016-09-05 12:14:57'),(10,'ezeinis18@gmail.com','$2y$10$vgMu8eZRFm7nMrBGRY0YzeQFRRXaYUxs5q5.J3DTWzA3b0apTZBr6','96718318',NULL,NULL,'2016-09-05 12:19:45','Panagiotis','Lontogiannhs','2016-09-05 12:14:57','2016-09-05 12:19:45'),(11,'ezeinis19@gmail.com','$2y$10$C00meIOBlxdJ3f.GveIIhO9VJcNgy43nrvBObNrmNip7hTd0CXI4q','96718318',NULL,NULL,NULL,'Nikos','Vandoros','2016-09-05 12:14:57','2016-09-05 12:14:57'),(12,'stathiszeinis@gmail.com','$2y$10$13chAPN.i9xW3IUR8NHZZ.Ny6umPJf.xMWxJvc6Kw1m5ySx5QnN4a','96718318',6,NULL,'2016-09-05 13:01:19','Stathis','Zeinis','2016-09-05 12:14:57','2016-09-05 13:01:19');
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

-- Dump completed on 2016-09-05 18:10:18
