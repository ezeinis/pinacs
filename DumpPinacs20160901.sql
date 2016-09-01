CREATE DATABASE  IF NOT EXISTS `pinacs_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `pinacs_db`;
-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activations`
--

LOCK TABLES `activations` WRITE;
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
INSERT INTO `activations` VALUES (1,1,'715GoGYGAf0RqCu1NPn7zKE7hlSqVxVF',1,'2016-09-01 12:07:24','2016-09-01 12:07:24','2016-09-01 12:07:24'),(2,2,'LPUUiphnVrNEUnYa4WMQF3KXFevQfoMO',1,'2016-09-01 12:07:24','2016-09-01 12:07:24','2016-09-01 12:07:24'),(3,3,'ctG3pyF9EmG2SZ5Gg4EnL1QrQcnFBot4',1,'2016-09-01 12:07:24','2016-09-01 12:07:24','2016-09-01 12:07:24'),(4,4,'viaHH6cvJdgyPcXfO7RX1sMtpJD8YykI',1,'2016-09-01 12:07:24','2016-09-01 12:07:24','2016-09-01 12:07:24'),(5,5,'IKiNvu90KU1gOpztxpHmUKBHPSz2nAxo',1,'2016-09-01 12:07:24','2016-09-01 12:07:24','2016-09-01 12:07:24'),(6,6,'UhtxfZzBA4vf8rzNWlK8ul3kmbU7tuxC',1,'2016-09-01 12:07:24','2016-09-01 12:07:24','2016-09-01 12:07:24'),(7,7,'JPGscgMGDXQf004IwW25za2K9EmUgfri',1,'2016-09-01 12:07:24','2016-09-01 12:07:24','2016-09-01 12:07:24'),(8,8,'P26lom1nigjMcpzKLtDTTCAddQvQi0BP',1,'2016-09-01 12:07:24','2016-09-01 12:07:24','2016-09-01 12:07:24'),(9,9,'ZUvkOzbvCbv8wW6Ya0QEF0Xf153dGQXr',1,'2016-09-01 12:07:24','2016-09-01 12:07:24','2016-09-01 12:07:24'),(10,10,'k0H3QKg9omOrtx4jHFsuONzqN60JSKvc',1,'2016-09-01 12:07:25','2016-09-01 12:07:25','2016-09-01 12:07:25'),(11,11,'58ftwlF4Y4iqhKP800f9upoizL1rWP3q',1,'2016-09-01 12:07:25','2016-09-01 12:07:25','2016-09-01 12:07:25'),(12,12,'ERKoHZcanW13ufpfWTwdTP0izggAMgrj',1,'2016-09-01 12:07:25','2016-09-01 12:07:25','2016-09-01 12:07:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assigns`
--

LOCK TABLES `assigns` WRITE;
/*!40000 ALTER TABLE `assigns` DISABLE KEYS */;
INSERT INTO `assigns` VALUES (1,2,3,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(2,1,3,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(3,5,3,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(4,4,4,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(5,3,4,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(6,6,4,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(7,2,6,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(8,5,6,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(9,2,7,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(10,5,7,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(11,2,8,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(12,5,8,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(13,4,9,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(14,6,9,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(15,4,10,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(16,6,10,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(17,4,11,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(18,6,11,'2016-09-01 12:07:25','2016-09-01 12:07:25');
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
INSERT INTO `class_years` VALUES (1,3,'2015-2016','2015-09-15','2016-09-14','2016-09-01 12:07:25','2016-09-01 12:07:25'),(2,3,'2014-2015','2014-09-15','2015-09-14','2016-09-01 12:07:25','2016-09-01 12:07:25'),(3,4,'2015-2016','2015-09-15','2016-09-14','2016-09-01 12:07:25','2016-09-01 12:07:25'),(4,4,'2014-2015','2014-09-15','2015-09-14','2016-09-01 12:07:25','2016-09-01 12:07:25'),(5,5,'2015-2016','2015-09-15','2016-09-14','2016-09-01 12:07:25','2016-09-01 12:07:25'),(6,6,'2015-2016','2015-09-15','2016-09-14','2016-09-01 12:07:25','2016-09-01 12:07:25');
/*!40000 ALTER TABLE `class_years` ENABLE KEYS */;
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
INSERT INTO `level_classes` VALUES (1,'Pro Junior',NULL,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(2,'Junior',NULL,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(3,'Pro Junior 1',1,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(4,'Pro Junior 2',1,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(5,'Junior 1',2,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(6,'Junior 2',2,'2016-09-01 12:07:25','2016-09-01 12:07:25');
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
INSERT INTO `migrations` VALUES ('2014_07_02_230147_migration_cartalyst_sentinel',1),('2014_10_12_100000_create_password_resets_table',1),('2016_08_25_063719_create_level_class_table',1),('2016_08_25_063730_create_class_year_table',1),('2016_08_25_063802_create_assigns_table',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persistences`
--

LOCK TABLES `persistences` WRITE;
/*!40000 ALTER TABLE `persistences` DISABLE KEYS */;
INSERT INTO `persistences` VALUES (8,2,'kTSod1jRT3sKc89cv4HwYdUBEJZdLFic','2016-09-01 12:37:38','2016-09-01 12:37:38');
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
INSERT INTO `role_users` VALUES (1,1,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(2,2,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(3,3,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(4,3,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(5,3,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(6,5,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(7,5,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(8,5,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(9,5,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(10,5,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(11,5,'2016-09-01 12:07:25','2016-09-01 12:07:25'),(12,4,'2016-09-01 12:07:25','2016-09-01 12:07:25');
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
INSERT INTO `roles` VALUES (1,'users','Users',NULL,'2016-09-01 12:07:24','2016-09-01 12:07:24'),(2,'admins','Admins',NULL,'2016-09-01 12:07:24','2016-09-01 12:07:24'),(3,'teachers','Teachers',NULL,'2016-09-01 12:07:24','2016-09-01 12:07:24'),(4,'parents','Parents',NULL,'2016-09-01 12:07:24','2016-09-01 12:07:24'),(5,'students','Students',NULL,'2016-09-01 12:07:24','2016-09-01 12:07:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user@user.com','$2y$10$w34Iwatgbr80BZDh7oGlqOofZxhsvcEP76agXRyBP.8Ft2SW7Sb1O','96718318',NULL,NULL,NULL,'UserFirstName','UserLastName','2016-09-01 12:07:24','2016-09-01 12:07:24'),(2,'admin@admin.com','$2y$10$VUTTLyNJBx4L0IjzKfALyuUGXCaeqpu9BelKVdLXbF.xCyo1pvp..','96718318',NULL,NULL,'2016-09-01 12:37:38','AdminFirstName','AdminLastName','2016-09-01 12:07:24','2016-09-01 12:37:38'),(3,'ezeinis14@gmail.com','$2y$10$YY9.tUbkwHoZJ/mJAZE8KOp6EzdkT.8b0ZKQPYrqS0jzf9i9MKGgq','96718318',NULL,NULL,'2016-09-01 12:33:04','Alexis','Nearxou','2016-09-01 12:07:24','2016-09-01 12:33:04'),(4,'ezeinis12@gmail.com','$2y$10$V.SDnMPJj27ZU3LTnPezfu1KWDVBM6RBnuzkA7KKivkBY3TUC6CZi','96718318',NULL,NULL,NULL,'Yiannis','Elpidis','2016-09-01 12:07:24','2016-09-01 12:07:24'),(5,'ezeinis11@gmail.com','$2y$10$h9O7ByNkXhnSjOSxLukHnOYG7v4qgoOD.KC5q1WmgKhK5wgUTXibS','96718318',NULL,NULL,NULL,'Dimitris','Parpounas','2016-09-01 12:07:24','2016-09-01 12:07:24'),(6,'ezeinis13@gmail.com','$2y$10$S9fomBP8pTCZxZ6TeiXGLewO4rCS57bS63m6undOPxSnM3OA8ESja','96718318',NULL,NULL,'2016-09-01 12:35:30','Efthimis','Zeinis2','2016-09-01 12:07:24','2016-09-01 12:35:30'),(7,'ezeinis15@gmail.com','$2y$10$rYqKTEwovcU2xOrbfssPUuh1RNecKceE3odQaALNbODGw.tF3kWky','96718318',NULL,NULL,NULL,'Kostas','Lamo','2016-09-01 12:07:24','2016-09-01 12:07:24'),(8,'ezeinis16@gmail.com','$2y$10$TZb7SKySTIfcbkqldg3yNOOh3Gk1p3JksbafMfeiZiqmshlJpYY/.','96718318',NULL,NULL,NULL,'Stayros','Diolatzis','2016-09-01 12:07:24','2016-09-01 12:07:24'),(9,'ezeinis17@gmail.com','$2y$10$Qt.wf5TDMMRRWDB7qPO/1uKDqph.Z30clYXNSe9TQNYUYMh8xcR9C','96718318',NULL,NULL,NULL,'Kostas','Zarkadis','2016-09-01 12:07:24','2016-09-01 12:07:24'),(10,'ezeinis18@gmail.com','$2y$10$XTjgP7cPjFun67AlDN2OKO.AkvF0MLOApigcik.1hQ7Dhu6RexG.e','96718318',NULL,NULL,NULL,'Panagiotis','Lontogiannhs','2016-09-01 12:07:25','2016-09-01 12:07:25'),(11,'ezeinis19@gmail.com','$2y$10$WcENKRgLOiWaC5sETb50HeDqqvPIqQH5ED7oA.I/tOzCxvUZLV4Ke','96718318',NULL,NULL,NULL,'Nikos','Vandoros','2016-09-01 12:07:25','2016-09-01 12:07:25'),(12,'stathiszeinis@gmail.com','$2y$10$I.xMnkcEmzhJWqjerR6cRuXMIiLCospdIKRGDiJVaRa8BJE4IdUk6','96718318',5,NULL,NULL,'Stathis','Zeinis','2016-09-01 12:07:25','2016-09-01 12:07:25');
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

-- Dump completed on 2016-09-01 15:39:17
