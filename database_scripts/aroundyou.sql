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
INSERT INTO `ci_sessions` VALUES ('b59bcaa483de40fd8df4d365c66bbc3d','0.0.0.0','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/534.53.11 (KHTML, like Gecko) Version/5.1.3 Safari/534.53.10',1329151370,'a:5:{s:9:\"user_data\";s:0:\"\";s:10:\"oauth_type\";s:4:\"sina\";s:13:\"oauth_user_id\";i:1653904592;s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":17:{s:2:\"id\";s:2:\"18\";s:4:\"name\";s:11:\"jun1st.feng\";s:5:\"email\";s:21:\"jun1st.feng@gmail.com\";s:5:\"weibo\";N;s:13:\"register_time\";s:19:\"2012-02-14 00:44:11\";s:15:\"last_login_time\";N;s:18:\"last_activity_time\";N;s:8:\"password\";N;s:18:\"profile_image_path\";N;s:11:\"description\";N;s:7:\"website\";N;s:8:\"location\";N;s:8:\"birthday\";N;s:24:\"profile_small_image_path\";N;s:23:\"profile_tiny_image_path\";N;s:17:\"remember_me_token\";N;s:15:\"last_visit_time\";N;}}');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,7,'good, you comment it','2011-11-26 22:33:42'),(2,3,7,'什么时候这事能发生在中国？','2011-11-29 20:50:13'),(3,3,7,'不可能，别做梦了','2011-11-29 20:50:27'),(4,3,7,'what\'s the hell are you talking about?','2011-11-30 00:31:00'),(5,5,7,'标题有错哦','2011-12-11 13:14:12'),(6,12,7,'测试html tag &amp;lt;input /&amp;gt;','2011-12-25 21:10:53'),(7,5,7,'&amp;lt;input /&amp;gt;','2011-12-28 22:52:49'),(8,12,7,'评论事件测试；','2011-12-29 23:28:01'),(9,12,9,'什么都不想要 &amp;lt;script','2012-01-24 00:56:57');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_region`
--

LOCK TABLES `message_region` WRITE;
/*!40000 ALTER TABLE `message_region` DISABLE KEYS */;
INSERT INTO `message_region` VALUES (1,5,1,'2011-12-12 00:00:00'),(2,7,2,'2011-12-17 00:00:00'),(3,12,3,'2011-12-17 23:39:29'),(4,3,4,NULL),(5,4,5,NULL),(6,1,6,NULL),(7,13,7,'2012-01-31 22:02:57'),(8,14,8,'2012-01-31 22:03:26');
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
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `posted_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Sort_On_PostedTime` (`posted_time`),
  KEY `owner` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,7,'topic add by jun1st','this is my first message                        ',1.000000,1.000000,'2011-11-25 16:07:23'),(3,7,'总统被起诉？','菲律宾总统被起诉？                        ',1.000000,1.000000,'2011-11-27 22:42:17'),(4,9,'买书要交税','去你妈的国家，真是无耻                        ',1.000000,1.000000,'2011-12-09 14:24:07'),(5,7,'今天又月食哦','今天有月食，可惜天空不够干净，看不清楚,只好等下次机会了',1.000000,1.000000,'2011-12-10 22:05:01'),(7,7,'0','圣诞节要在杭州过了',NULL,NULL,'2011-12-17 23:03:14'),(12,7,'0','圣诞节买什么礼物？',NULL,NULL,'2011-12-17 23:39:29'),(13,7,'0','正式版本没有网页的发布方式',NULL,NULL,'2012-01-31 22:02:57'),(14,7,'0','这个是为了测试分业',NULL,NULL,'2012-01-31 22:03:26');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'仙霞','2011-12-12 00:00:00',NULL,NULL),(2,'杭州','2011-12-17 23:07:12',NULL,NULL),(3,'amazon','2011-12-17 23:39:29',NULL,NULL),(4,'上海','2012-01-20 23:03:42',1.000000,1.000000),(5,'shanghai','2012-01-21 14:12:40',1.000000,1.000000),(6,'掉落','2012-01-22 18:44:49',1.000000,1.000000),(7,'版本','2012-01-31 22:02:57',NULL,NULL),(8,'分页','2012-01-31 22:03:26',NULL,NULL);
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
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `weibo` varchar(511) DEFAULT NULL,
  `register_time` datetime NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `last_activity_time` datetime DEFAULT NULL,
  `password` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
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
  KEY `email_INDEX` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'冯琦钧','jun1st.feng@gmail.com','','2011-11-24 16:51:53','0000-00-00 00:00:00','0000-00-00 00:00:00','d4f083848a882e9ac83a58c6e4711115d573a57f','/uploads/profile_images/7/profile_image_128.jpg','果粉，开发者','http://fengqijun.me','上海','1983-12-04 00:00:00','/uploads/profile_images/7/profile_image_64.jpg','/uploads/profile_images/7/profile_image_32.jpg','4f2250598b240','2012-01-27 15:20:57'),(9,'selina','floraqian131@hotmail.com','','2011-11-24 17:36:48','0000-00-00 00:00:00','0000-00-00 00:00:00','79c57cbd0df457a4047ca6d399439dede9309d14','/uploads/profile_images/9/profile_image_128.jpg','/&gt;&lt;&lt;script /','','杭州 /&gt;','1983-01-31 00:00:00','/uploads/profile_images/9/profile_image_64.jpg','/uploads/profile_images/9/profile_image_32.jpg','4f1aa18a83c33','2012-01-21 19:29:14'),(10,'theonerk','theonerk@gmail.com',NULL,'2011-12-13 22:37:32',NULL,NULL,'273a0c7bd3c679ba9a6f5d99078e36e85d02b952','/uploads/profile_images/10/profile_image_128.png','一口吃成一个胖子','','','0000-00-00 00:00:00','/uploads/profile_images/10/profile_image_64.png','/uploads/profile_images/10/profile_image_32.png',NULL,NULL),(16,'derek','derek.feng@mkcorp.com',NULL,'2012-02-13 00:09:33',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'jun1st.feng','jun1st.feng@gmail.com',NULL,'2012-02-14 00:44:11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_oauth`
--

DROP TABLE IF EXISTS `users_oauth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_oauth` (
  `user_id` int(11) NOT NULL,
  `oauth_user_id` varchar(45) NOT NULL,
  `oauth_type` varchar(45) NOT NULL,
  UNIQUE KEY `user_id_and_oauth_id` (`user_id`,`oauth_user_id`),
  KEY `oauth_user_indexes` (`user_id`,`oauth_user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_oauth`
--

LOCK TABLES `users_oauth` WRITE;
/*!40000 ALTER TABLE `users_oauth` DISABLE KEYS */;
INSERT INTO `users_oauth` VALUES (18,'1653904592','sina');
/*!40000 ALTER TABLE `users_oauth` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-02-14  0:55:27
