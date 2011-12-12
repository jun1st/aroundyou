-- MySQL dump 10.13  Distrib 5.5.14, for osx10.6 (i386)
--
-- Host: localhost    Database: aroundyou
-- ------------------------------------------------------
-- Server version	5.5.14

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('0a12f362ac929dbca6e627f9e5b5fdac','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7',1323617984,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":17:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:9:\"冯琦钧\";s:5:\"email\";s:21:\"jun1st.feng@gmail.com\";s:5:\"weibo\";s:0:\"\";s:13:\"register_time\";s:19:\"2011-11-24 16:51:53\";s:15:\"last_login_time\";s:19:\"0000-00-00 00:00:00\";s:18:\"last_activity_time\";s:19:\"0000-00-00 00:00:00\";s:8:\"password\";s:40:\"d4f083848a882e9ac83a58c6e4711115d573a57f\";s:18:\"profile_image_path\";s:47:\"/uploads/profile_images/7/profile_image_128.png\";s:11:\"description\";s:18:\"果粉，开发者\";s:7:\"website\";s:20:\"http://fengqijun.com\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";s:19:\"1983-12-04 00:00:00\";s:24:\"profile_small_image_path\";s:46:\"/uploads/profile_images/7/profile_image_64.png\";s:23:\"profile_tiny_image_path\";s:46:\"/uploads/profile_images/7/profile_image_32.png\";s:17:\"remember_me_token\";s:13:\"4ee3152fce538\";s:15:\"last_visit_time\";s:19:\"2011-12-10 16:15:43\";}}'),('1275d19eb6a1138b478585be685e997e','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7',1323615552,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":17:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:9:\"冯琦钧\";s:5:\"email\";s:21:\"jun1st.feng@gmail.com\";s:5:\"weibo\";s:0:\"\";s:13:\"register_time\";s:19:\"2011-11-24 16:51:53\";s:15:\"last_login_time\";s:19:\"0000-00-00 00:00:00\";s:18:\"last_activity_time\";s:19:\"0000-00-00 00:00:00\";s:8:\"password\";s:40:\"d4f083848a882e9ac83a58c6e4711115d573a57f\";s:18:\"profile_image_path\";s:47:\"/uploads/profile_images/7/profile_image_128.png\";s:11:\"description\";s:18:\"果粉，开发者\";s:7:\"website\";s:20:\"http://fengqijun.com\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";s:19:\"1983-12-04 00:00:00\";s:24:\"profile_small_image_path\";s:46:\"/uploads/profile_images/7/profile_image_64.png\";s:23:\"profile_tiny_image_path\";s:46:\"/uploads/profile_images/7/profile_image_32.png\";s:17:\"remember_me_token\";s:13:\"4ee3152fce538\";s:15:\"last_visit_time\";s:19:\"2011-12-10 16:15:43\";}}'),('1ea758036fb0f920082b248fb5801154','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7',1323609157,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":17:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:9:\"冯琦钧\";s:5:\"email\";s:21:\"jun1st.feng@gmail.com\";s:5:\"weibo\";s:0:\"\";s:13:\"register_time\";s:19:\"2011-11-24 16:51:53\";s:15:\"last_login_time\";s:19:\"0000-00-00 00:00:00\";s:18:\"last_activity_time\";s:19:\"0000-00-00 00:00:00\";s:8:\"password\";s:40:\"d4f083848a882e9ac83a58c6e4711115d573a57f\";s:18:\"profile_image_path\";s:47:\"/uploads/profile_images/7/profile_image_128.png\";s:11:\"description\";s:18:\"果粉，开发者\";s:7:\"website\";s:20:\"http://fengqijun.com\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";s:19:\"1983-12-04 00:00:00\";s:24:\"profile_small_image_path\";s:46:\"/uploads/profile_images/7/profile_image_64.png\";s:23:\"profile_tiny_image_path\";s:46:\"/uploads/profile_images/7/profile_image_32.png\";s:17:\"remember_me_token\";s:13:\"4ee3152fce538\";s:15:\"last_visit_time\";s:19:\"2011-12-10 16:15:43\";}}'),('328688d6ca809f67af0235050968f91e','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7',1323614135,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":17:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:9:\"冯琦钧\";s:5:\"email\";s:21:\"jun1st.feng@gmail.com\";s:5:\"weibo\";s:0:\"\";s:13:\"register_time\";s:19:\"2011-11-24 16:51:53\";s:15:\"last_login_time\";s:19:\"0000-00-00 00:00:00\";s:18:\"last_activity_time\";s:19:\"0000-00-00 00:00:00\";s:8:\"password\";s:40:\"d4f083848a882e9ac83a58c6e4711115d573a57f\";s:18:\"profile_image_path\";s:47:\"/uploads/profile_images/7/profile_image_128.png\";s:11:\"description\";s:18:\"果粉，开发者\";s:7:\"website\";s:20:\"http://fengqijun.com\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";s:19:\"1983-12-04 00:00:00\";s:24:\"profile_small_image_path\";s:46:\"/uploads/profile_images/7/profile_image_64.png\";s:23:\"profile_tiny_image_path\";s:46:\"/uploads/profile_images/7/profile_image_32.png\";s:17:\"remember_me_token\";s:13:\"4ee3152fce538\";s:15:\"last_visit_time\";s:19:\"2011-12-10 16:15:43\";}}'),('45a884423a6b1519f5eb3c33a82917b7','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7',1323617247,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":17:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:9:\"冯琦钧\";s:5:\"email\";s:21:\"jun1st.feng@gmail.com\";s:5:\"weibo\";s:0:\"\";s:13:\"register_time\";s:19:\"2011-11-24 16:51:53\";s:15:\"last_login_time\";s:19:\"0000-00-00 00:00:00\";s:18:\"last_activity_time\";s:19:\"0000-00-00 00:00:00\";s:8:\"password\";s:40:\"d4f083848a882e9ac83a58c6e4711115d573a57f\";s:18:\"profile_image_path\";s:47:\"/uploads/profile_images/7/profile_image_128.png\";s:11:\"description\";s:18:\"果粉，开发者\";s:7:\"website\";s:20:\"http://fengqijun.com\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";s:19:\"1983-12-04 00:00:00\";s:24:\"profile_small_image_path\";s:46:\"/uploads/profile_images/7/profile_image_64.png\";s:23:\"profile_tiny_image_path\";s:46:\"/uploads/profile_images/7/profile_image_32.png\";s:17:\"remember_me_token\";s:13:\"4ee3152fce538\";s:15:\"last_visit_time\";s:19:\"2011-12-10 16:15:43\";}}'),('a8b993463ddd2262562c370c62f0fb6a','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7',1323700931,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":17:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:9:\"冯琦钧\";s:5:\"email\";s:21:\"jun1st.feng@gmail.com\";s:5:\"weibo\";s:0:\"\";s:13:\"register_time\";s:19:\"2011-11-24 16:51:53\";s:15:\"last_login_time\";s:19:\"0000-00-00 00:00:00\";s:18:\"last_activity_time\";s:19:\"0000-00-00 00:00:00\";s:8:\"password\";s:40:\"d4f083848a882e9ac83a58c6e4711115d573a57f\";s:18:\"profile_image_path\";s:47:\"/uploads/profile_images/7/profile_image_128.png\";s:11:\"description\";s:18:\"果粉，开发者\";s:7:\"website\";s:20:\"http://fengqijun.com\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";s:19:\"1983-12-04 00:00:00\";s:24:\"profile_small_image_path\";s:46:\"/uploads/profile_images/7/profile_image_64.png\";s:23:\"profile_tiny_image_path\";s:46:\"/uploads/profile_images/7/profile_image_32.png\";s:17:\"remember_me_token\";s:13:\"4ee3152fce538\";s:15:\"last_visit_time\";s:19:\"2011-12-10 16:15:43\";}}'),('df976fecb1cb148078c19f184ed77011','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7',1323622762,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":17:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:9:\"冯琦钧\";s:5:\"email\";s:21:\"jun1st.feng@gmail.com\";s:5:\"weibo\";s:0:\"\";s:13:\"register_time\";s:19:\"2011-11-24 16:51:53\";s:15:\"last_login_time\";s:19:\"0000-00-00 00:00:00\";s:18:\"last_activity_time\";s:19:\"0000-00-00 00:00:00\";s:8:\"password\";s:40:\"d4f083848a882e9ac83a58c6e4711115d573a57f\";s:18:\"profile_image_path\";s:47:\"/uploads/profile_images/7/profile_image_128.png\";s:11:\"description\";s:18:\"果粉，开发者\";s:7:\"website\";s:20:\"http://fengqijun.com\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";s:19:\"1983-12-04 00:00:00\";s:24:\"profile_small_image_path\";s:46:\"/uploads/profile_images/7/profile_image_64.png\";s:23:\"profile_tiny_image_path\";s:46:\"/uploads/profile_images/7/profile_image_32.png\";s:17:\"remember_me_token\";s:13:\"4ee3152fce538\";s:15:\"last_visit_time\";s:19:\"2011-12-10 16:15:43\";}}'),('e832729c291dcc0bac5f45b04ce2f45e','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7',1323698657,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":17:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:9:\"冯琦钧\";s:5:\"email\";s:21:\"jun1st.feng@gmail.com\";s:5:\"weibo\";s:0:\"\";s:13:\"register_time\";s:19:\"2011-11-24 16:51:53\";s:15:\"last_login_time\";s:19:\"0000-00-00 00:00:00\";s:18:\"last_activity_time\";s:19:\"0000-00-00 00:00:00\";s:8:\"password\";s:40:\"d4f083848a882e9ac83a58c6e4711115d573a57f\";s:18:\"profile_image_path\";s:47:\"/uploads/profile_images/7/profile_image_128.png\";s:11:\"description\";s:18:\"果粉，开发者\";s:7:\"website\";s:20:\"http://fengqijun.com\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";s:19:\"1983-12-04 00:00:00\";s:24:\"profile_small_image_path\";s:46:\"/uploads/profile_images/7/profile_image_64.png\";s:23:\"profile_tiny_image_path\";s:46:\"/uploads/profile_images/7/profile_image_32.png\";s:17:\"remember_me_token\";s:13:\"4ee3152fce538\";s:15:\"last_visit_time\";s:19:\"2011-12-10 16:15:43\";}}'),('f6b42fd659c382ba262fdfc8db686f83','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7',1323618943,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":17:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:9:\"冯琦钧\";s:5:\"email\";s:21:\"jun1st.feng@gmail.com\";s:5:\"weibo\";s:0:\"\";s:13:\"register_time\";s:19:\"2011-11-24 16:51:53\";s:15:\"last_login_time\";s:19:\"0000-00-00 00:00:00\";s:18:\"last_activity_time\";s:19:\"0000-00-00 00:00:00\";s:8:\"password\";s:40:\"d4f083848a882e9ac83a58c6e4711115d573a57f\";s:18:\"profile_image_path\";s:47:\"/uploads/profile_images/7/profile_image_128.png\";s:11:\"description\";s:18:\"果粉，开发者\";s:7:\"website\";s:20:\"http://fengqijun.com\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";s:19:\"1983-12-04 00:00:00\";s:24:\"profile_small_image_path\";s:46:\"/uploads/profile_images/7/profile_image_64.png\";s:23:\"profile_tiny_image_path\";s:46:\"/uploads/profile_images/7/profile_image_32.png\";s:17:\"remember_me_token\";s:13:\"4ee3152fce538\";s:15:\"last_visit_time\";s:19:\"2011-12-10 16:15:43\";}}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,7,'good, you comment it','2011-11-26 22:33:42'),(2,3,7,'什么时候这事能发生在中国？','2011-11-29 20:50:13'),(3,3,7,'不可能，别做梦了','2011-11-29 20:50:27'),(4,3,7,'what\'s the hell are you talking about?','2011-11-30 00:31:00'),(5,5,7,'标题有错哦','2011-12-11 13:14:12');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_region`
--

DROP TABLE IF EXISTS `message_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_region` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message_id` bigint(20) NOT NULL,
  `region_id` bigint(20) NOT NULL,
  `added_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`message_id`,`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_region`
--

LOCK TABLES `message_region` WRITE;
/*!40000 ALTER TABLE `message_region` DISABLE KEYS */;
INSERT INTO `message_region` VALUES (1,5,1,'2011-12-12 00:00:00');
/*!40000 ALTER TABLE `message_region` ENABLE KEYS */;
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
  `topic` varchar(40) DEFAULT NULL,
  `content` varchar(140) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `posted_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Sort_On_PostedTime` (`posted_time`),
  KEY `owner` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,7,'topic add by jun1st','this is my first message',1.000000,1.000000,'2011-11-25 16:07:23'),(3,7,'总统被起诉？','菲律宾总统被起诉？',1.000000,1.000000,'2011-11-27 22:42:17'),(4,9,'买书要交税','去你妈的国家，真是无耻',1.000000,1.000000,'2011-12-09 14:24:07'),(5,7,'今天又月食哦','今天有月食，可惜天空不够干净，看不清楚,只好等下次机会了',1.000000,1.000000,'2011-12-10 22:05:01');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `added_time` datetime NOT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'仙霞','2011-12-12 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
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
  `remember_me_token` varchar(255) DEFAULT NULL,
  `last_visit_time` datetime DEFAULT NULL,
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
INSERT INTO `users` VALUES (7,'冯琦钧','jun1st.feng@gmail.com','','2011-11-24 16:51:53','0000-00-00 00:00:00','0000-00-00 00:00:00','d4f083848a882e9ac83a58c6e4711115d573a57f','/uploads/profile_images/7/profile_image_128.png','果粉，开发者','http://fengqijun.com','上海','1983-12-04 00:00:00','/uploads/profile_images/7/profile_image_64.png','/uploads/profile_images/7/profile_image_32.png','4ee3152fce538','2011-12-10 16:15:43'),(8,'derek','derek.feng@mkcorp.com','','2011-11-24 17:34:59','0000-00-00 00:00:00','0000-00-00 00:00:00','d4f083848a882e9ac83a58c6e4711115d573a57f',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'selina','floraqian131@hotmail.com','','2011-11-24 17:36:48','0000-00-00 00:00:00','0000-00-00 00:00:00','79c57cbd0df457a4047ca6d399439dede9309d14','/uploads/profile_images/9/profile_image_128.jpg',NULL,'','','1983-01-31 00:00:00','/uploads/profile_images/9/profile_image_64.jpg','/uploads/profile_images/9/profile_image_32.jpg',NULL,NULL);
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

-- Dump completed on 2011-12-12 22:46:59
