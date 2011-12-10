-- MySQL dump 10.13  Distrib 5.5.18, for osx10.6 (i386)
--
-- Host: localhost    Database: aroundyou
-- ------------------------------------------------------
-- Server version	5.5.18

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
-- Current Database: `aroundyou`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `aroundyou` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `aroundyou`;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(140) NOT NULL,
  `posted_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,7,'good, you comment it','2011-11-26 22:33:42'),(2,3,7,'什么时候这事能发生在中国？','2011-11-29 20:50:13'),(3,3,7,'不可能，别做梦了','2011-11-29 20:50:27'),(4,3,7,'what\'s the hell are you talking about?','2011-11-30 00:31:00');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `topic` varchar(20) DEFAULT NULL,
  `content` varchar(140) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `posted_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Sort_On_PostedTime` (`posted_time`),
  KEY `owner` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,7,'topic add by jun1st','this is my first message',1.000000,1.000000,'2011-11-25 16:07:23'),(3,7,'总统被起诉？','菲律宾总统被起诉？',1.000000,1.000000,'2011-11-27 22:42:17'),(4,9,'买书要交税','去你妈的国家，真是无耻',1.000000,1.000000,'2011-12-09 14:24:07');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `weibo` varchar(511) DEFAULT NULL,
  `register_time` datetime NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `last_activity_time` datetime DEFAULT NULL,
  `password` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `profile_image_path` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `profile_small_image_path` varchar(255) DEFAULT NULL,
  `profile_tiny_image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `email_INDEX` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'jun1st','jun1st.feng@gmail.com','','2011-11-24 16:51:53','0000-00-00 00:00:00','0000-00-00 00:00:00','d4f083848a882e9ac83a58c6e4711115d573a57f','/uploads/profile_images/7/profile_image_128.png',NULL,'http://fengqijun.com','上海','1983-12-04 00:00:00','/uploads/profile_images/7/profile_image_64.png','/uploads/profile_images/7/profile_image_32.png'),(8,'derek','derek.feng@mkcorp.com','','2011-11-24 17:34:59','0000-00-00 00:00:00','0000-00-00 00:00:00','d4f083848a882e9ac83a58c6e4711115d573a57f',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'selina','floraqian131@hotmail.com','','2011-11-24 17:36:48','0000-00-00 00:00:00','0000-00-00 00:00:00','79c57cbd0df457a4047ca6d399439dede9309d14','/uploads/profile_images/9/profile_image_128.jpg',NULL,'','','1983-01-31 00:00:00','/uploads/profile_images/9/profile_image_64.jpg','/uploads/profile_images/9/profile_image_32.jpg');
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

-- Dump completed on 2011-12-09 17:38:39
