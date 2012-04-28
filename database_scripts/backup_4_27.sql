-- MySQL dump 10.13  Distrib 5.5.18, for osx10.6 (i386)
--
-- Host: localhost    Database: iAroundYou
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
INSERT INTO `ci_sessions` VALUES ('aa77b6de0a9a5f0a6b9d8903bc5145f6','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/534.55.3 (KHTML, like Gecko) Version/5.1.5 Safari/534.55.3',1335516863,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":19:{s:2:\"id\";s:2:\"25\";s:4:\"name\";s:8:\"rong kai\";s:5:\"email\";s:18:\"theonerk@gmail.com\";s:5:\"weibo\";N;s:13:\"register_time\";s:19:\"2012-04-26 14:42:47\";s:15:\"last_login_time\";N;s:18:\"last_activity_time\";N;s:8:\"password\";s:40:\"9f82a9e8c93e69a1a6276a738d0b30626a7ca38e\";s:18:\"profile_image_path\";s:48:\"/uploads/profile_images/25/profile_image_128.jpg\";s:11:\"description\";s:75:\"一口吃成一个胖子, &lt;li&gt;&lt;/li&gt;, 一个死胖子！hello，\";s:7:\"website\";s:0:\"\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";N;s:24:\"profile_small_image_path\";s:47:\"/uploads/profile_images/25/profile_image_64.jpg\";s:23:\"profile_tiny_image_path\";s:47:\"/uploads/profile_images/25/profile_image_32.jpg\";s:17:\"remember_me_token\";s:13:\"4f9a43dba676d\";s:15:\"last_visit_time\";s:19:\"2012-04-27 14:59:39\";s:14:\"messages_count\";N;s:14:\"comments_count\";N;}}'),('f10d135d7ffe0338615f4cc358f82315','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/534.55.3 (KHTML, like Gecko) Version/5.1.5 Safari/534.55.3',1335513843,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"is_login\";s:4:\"true\";s:4:\"user\";O:8:\"stdClass\":19:{s:2:\"id\";s:2:\"25\";s:4:\"name\";s:8:\"rong kai\";s:5:\"email\";s:18:\"theonerk@gmail.com\";s:5:\"weibo\";N;s:13:\"register_time\";s:19:\"2012-04-26 14:42:47\";s:15:\"last_login_time\";N;s:18:\"last_activity_time\";N;s:8:\"password\";s:40:\"9f82a9e8c93e69a1a6276a738d0b30626a7ca38e\";s:18:\"profile_image_path\";s:48:\"/uploads/profile_images/25/profile_image_128.jpg\";s:11:\"description\";s:24:\"一口吃成一个胖子\";s:7:\"website\";s:0:\"\";s:8:\"location\";s:6:\"上海\";s:8:\"birthday\";N;s:24:\"profile_small_image_path\";s:47:\"/uploads/profile_images/25/profile_image_64.jpg\";s:23:\"profile_tiny_image_path\";s:47:\"/uploads/profile_images/25/profile_image_32.jpg\";s:17:\"remember_me_token\";s:13:\"4f9a43dba676d\";s:15:\"last_visit_time\";s:19:\"2012-04-27 14:59:39\";s:14:\"messages_count\";N;s:14:\"comments_count\";N;}}');
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,7,'good, you comment it','2011-11-26 22:33:42'),(2,3,7,'什么时候这事能发生在中国？','2011-11-29 20:50:13'),(3,3,7,'不可能，别做梦了','2011-11-29 20:50:27'),(4,3,7,'what\'s the hell are you talking about?','2011-11-30 00:31:00'),(5,5,7,'标题有错哦','2011-12-11 13:14:12'),(6,12,7,'测试html tag &amp;lt;input /&amp;gt;','2011-12-25 21:10:53'),(7,5,7,'&amp;lt;input /&amp;gt;','2011-12-28 22:52:49'),(8,12,7,'评论事件测试；','2011-12-29 23:28:01'),(9,12,9,'什么都不想要 &amp;lt;script','2012-01-24 00:56:57'),(10,14,18,'','2012-02-16 23:36:03'),(11,14,18,'from weibo','2012-02-18 23:56:39'),(12,14,7,'test again','2012-02-19 20:42:20'),(13,43,7,'Let\'s start comment, shall we?','2012-04-07 00:00:00'),(14,43,10,'this is a comment','2012-04-07 00:00:00'),(15,43,10,'t\'his is a commen\'','2012-04-07 00:00:00'),(16,55,7,'Comment started. Go','2012-04-07 00:00:00'),(17,43,10,'t\'his is a commen\'','2012-04-07 00:00:00'),(18,43,10,'t\'his is a commen\'','2012-04-07 00:00:00'),(19,55,25,'\'this is cool, isn\\\'t it? <br/>\'','2012-04-27 14:07:49'),(20,55,25,'\'this is cool, if u turn on html special character.\'','2012-04-27 14:33:32'),(21,55,25,'\'我要发布iLogin了。\'','2012-04-27 14:59:55');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER add_comment AFTER INSERT ON comments FOR EACH ROW 
BEGIN
UPDATE messages SET comments_count = comments_count + 1 WHERE id = NEW.message_id;
UPDATE users SET comments_count = comments_count + 1 WHERE id = NEW.user_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_region`
--

LOCK TABLES `message_region` WRITE;
/*!40000 ALTER TABLE `message_region` DISABLE KEYS */;
INSERT INTO `message_region` VALUES (1,5,1,'2011-12-12 00:00:00'),(2,7,2,'2011-12-17 00:00:00'),(3,12,3,'2011-12-17 23:39:29'),(4,3,4,NULL),(5,4,5,NULL),(6,1,6,NULL),(7,13,7,'2012-01-31 22:02:57'),(8,14,8,'2012-01-31 22:03:26'),(9,15,1,'2012-02-27 22:05:41'),(10,16,1,'2012-02-27 22:08:07'),(11,17,1,'2012-02-27 22:10:24'),(12,18,1,'2012-02-27 22:10:44'),(13,19,1,'2012-02-27 22:11:29'),(14,20,1,'2012-03-02 01:18:01'),(15,21,1,'2012-03-02 01:26:35'),(16,22,1,'2012-03-06 15:58:08'),(17,23,1,'2012-03-06 16:06:27'),(18,24,1,'2012-03-07 21:13:36'),(19,25,1,'2012-03-07 21:14:23'),(20,26,1,'2012-03-07 21:43:18'),(21,27,1,'2012-03-11 05:26:02'),(22,28,1,'2012-03-11 05:26:42'),(23,29,1,'2012-03-11 05:26:44'),(24,30,1,'2012-03-11 18:43:58'),(25,31,1,'2012-03-12 05:58:17'),(26,32,1,'2012-03-12 10:20:52'),(27,33,1,'2012-03-12 10:20:54'),(28,34,1,'2012-03-12 10:20:55'),(29,35,1,'2012-03-12 10:21:34'),(30,36,1,'2012-03-23 13:39:00'),(31,37,1,'2012-03-23 14:03:46'),(32,38,1,'2012-03-23 14:10:32'),(33,39,1,'2012-03-23 14:26:36'),(34,40,1,'2012-03-23 14:34:07'),(35,41,1,'2012-03-23 14:35:19'),(36,42,1,'2012-03-23 16:44:25'),(37,43,1,'2012-03-23 17:00:27'),(38,44,1,'2012-03-24 14:54:26'),(39,45,1,'2012-03-24 15:05:32'),(40,46,1,'2012-03-24 15:13:26'),(41,47,1,'2012-03-24 15:13:37'),(42,48,1,'2012-03-24 15:19:49'),(43,49,5,'2012-03-29 15:56:23'),(44,50,9,'2012-03-29 16:45:03'),(45,51,10,'2012-04-04 15:54:38'),(46,52,11,'2012-04-04 19:44:38'),(47,53,12,'2012-04-04 20:38:47'),(48,54,13,'2012-04-04 21:14:16'),(49,55,14,'2012-04-04 21:31:32');
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
  `comments_count` int(11) DEFAULT '0',
  `street` varchar(200) DEFAULT '""',
  PRIMARY KEY (`id`),
  KEY `Sort_On_PostedTime` (`posted_time`),
  KEY `owner` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (12,7,'0','圣诞节买什么礼物？',NULL,NULL,'2011-12-17 23:39:29',3,NULL),(13,7,'0','正式版本没有网页的发布方式',NULL,NULL,'2012-01-31 22:02:57',0,NULL),(14,7,'0','这个是为了测试分业',NULL,NULL,'2012-01-31 22:03:26',3,NULL),(15,7,'0','\'this is not a test\'',NULL,NULL,'2012-02-27 22:05:41',0,NULL),(16,7,'0','\'this is not a test\'',NULL,NULL,'2012-02-27 22:08:07',0,NULL),(17,7,'0','\'this is not a test\'',NULL,NULL,'2012-02-27 22:10:24',0,NULL),(18,7,'0','\'this is not a test\'',NULL,NULL,'2012-02-27 22:10:44',0,NULL),(19,7,'0','\'挺好的东西，是不是？\'',NULL,NULL,'2012-02-27 22:11:29',0,NULL),(20,7,'0','This is the first message sent from app',NULL,NULL,'2012-03-02 01:18:01',0,NULL),(21,7,'0','This is the first message from ipad，酷吗？',NULL,NULL,'2012-03-02 01:26:35',0,NULL),(23,10,'0','Let\'s send this out?\nSure, why not.\nThis is cool!',NULL,NULL,'2012-03-06 16:06:27',0,NULL),(24,10,'0','Test',NULL,NULL,'2012-03-07 21:13:36',0,NULL),(31,10,'0','This is the message from app, let\'s test new lines that matches too much, cool, this , ask u about that',NULL,NULL,'2012-03-12 05:58:17',0,NULL),(36,7,'0','31.209622 第一条有坐标的消息！',0.000000,0.000000,'2012-03-23 13:39:00',0,NULL),(37,7,'0','31.209585 这是第二条消息，31.209585 这是第二条消息，31.209585 这是第二条消息，31.209585 这是第二条消息，',0.000000,0.000000,'2012-03-23 14:03:46',0,NULL),(38,7,'0','31.209583 第三条',0.000000,0.000000,'2012-03-23 14:10:32',0,NULL),(39,7,'0','31.209615 添加异常测试',0.000000,0.000000,'2012-03-23 14:26:36',0,NULL),(40,7,'0','31.209502 添加测试异常2！',0.000000,0.000000,'2012-03-23 14:34:07',0,NULL),(41,7,'0','31.209521 添加异常3！ 一个d写成了@，弄坏了，搞的我特麻烦！现在终于成功了！',0.000000,0.000000,'2012-03-23 14:35:19',0,NULL),(42,7,'0','31.209606 完成发布取消的任务',0.000000,0.000000,'2012-03-23 16:44:25',0,NULL),(43,7,'0','31.208434 再次发布，加上动态效果。',0.000000,0.000000,'2012-03-23 17:00:27',0,NULL),(44,7,'0','37.785834 wancheng ce shi',0.000000,0.000000,'2012-03-24 14:54:26',0,NULL),(45,7,'0','37.785834\n',0.000000,0.000000,'2012-03-24 15:05:32',0,NULL),(46,7,'0','37.785834 test start cool',0.000000,0.000000,'2012-03-24 15:13:26',0,NULL),(47,7,'0','37.785834 posting again',0.000000,0.000000,'2012-03-24 15:13:37',0,NULL),(48,7,'0','Try to let app load only the latest app! 发布以一条新的消息，尽加载最后这一条。',0.000000,0.000000,'2012-03-24 15:19:49',0,NULL),(49,10,'0','hello_world',10.000000,10.000000,'2012-03-29 15:56:23',0,NULL),(50,7,'0','静安区 静安区人民发来贺电！',31.230278,121.448257,'2012-03-29 16:45:03',0,NULL),(51,7,'0','西湖区 杭州人民发来贺电！来自西湖区的消息。',30.247295,120.153069,'2012-04-04 15:54:38',0,NULL),(52,7,'0','上城区 火车站好多人！',30.246613,120.177254,'2012-04-04 19:44:38',0,NULL),(53,7,'0','江干区 嘉兴南，火车站！',30.301992,120.255417,'2012-04-04 20:38:47',0,NULL),(54,7,'0','闵行区 虹桥火车站！',31.196140,121.316216,'2012-04-04 21:14:16',0,NULL),(55,7,'0','长宁区 回到家了！',31.210249,121.382767,'2012-04-04 21:31:32',1,'威宁路');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER add_message AFTER INSERT ON messages FOR EACH ROW
BEGIN
UPDATE users SET messages_count = messages_count + 1 WHERE id = NEW.user_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
  `province_en` varchar(120) DEFAULT '""',
  `province_cn` varchar(245) DEFAULT '""',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'仙霞','2011-12-12 00:00:00',NULL,NULL,'\"\"','\"\"'),(2,'杭州','2011-12-17 23:07:12',NULL,NULL,'\"\"','\"\"'),(3,'amazon','2011-12-17 23:39:29',NULL,NULL,'\"\"','\"\"'),(4,'上海','2012-01-20 23:03:42',1.000000,1.000000,'\"\"','\"\"'),(5,'shanghai','2012-01-21 14:12:40',1.000000,1.000000,'\"\"','\"\"'),(6,'掉落','2012-01-22 18:44:49',1.000000,1.000000,'\"\"','\"\"'),(7,'版本','2012-01-31 22:02:57',NULL,NULL,'\"\"','\"\"'),(8,'分页','2012-01-31 22:03:26',NULL,NULL,'\"\"','\"\"'),(9,'静安区','2012-03-29 16:45:03',31.230278,121.448257,'\"\"','\"\"'),(10,'西湖区','2012-04-04 15:54:38',30.247295,120.153069,'\"\"','\"\"'),(11,'上城区','2012-04-04 19:44:38',30.246613,120.177254,'\"\"','\"\"'),(12,'江干区','2012-04-04 20:38:47',30.301992,120.255417,'\"\"','\"\"'),(13,'闵行区','2012-04-04 21:14:16',31.196140,121.316216,'\"\"','\"\"'),(14,'长宁区','2012-04-04 21:31:32',31.210249,121.382767,'\"\"','\"\"');
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
  `messages_count` int(11) DEFAULT '0',
  `comments_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `email_INDEX` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'derek feng','jun1st.feng@gmail.com','','2011-11-24 16:51:53','0000-00-00 00:00:00','0000-00-00 00:00:00','d4f083848a882e9ac83a58c6e4711115d573a57f','/uploads/profile_images/7/profile_image_128.jpg','description','','','1983-12-04 00:00:00','/uploads/profile_images/7/profile_image_64.jpg','/uploads/profile_images/7/profile_image_32.jpg','4f98edfb643f0','2012-04-26 14:40:59',34,11),(9,'selina','floraqian131@hotmail.com','','2011-11-24 17:36:48','0000-00-00 00:00:00','0000-00-00 00:00:00','79c57cbd0df457a4047ca6d399439dede9309d14','/uploads/profile_images/9/profile_image_128.jpg','/&gt;&lt;&lt;script /','','杭州 /&gt;','1983-01-31 00:00:00','/uploads/profile_images/9/profile_image_64.jpg','/uploads/profile_images/9/profile_image_32.jpg','4f1aa18a83c33','2012-01-21 19:29:14',1,1),(25,'rong kai','theonerk@gmail.com',NULL,'2012-04-26 14:42:47',NULL,NULL,'9f82a9e8c93e69a1a6276a738d0b30626a7ca38e','/uploads/profile_images/25/profile_image_128.jpg','一口吃成一个胖子, &lt;li&gt;&lt;/li&gt;, 一个死胖子！hello，','','上海',NULL,'/uploads/profile_images/25/profile_image_64.jpg','/uploads/profile_images/25/profile_image_32.jpg','4f9a43dba676d','2012-04-27 14:59:39',NULL,NULL),(26,'jun1st','jun1st@live.com',NULL,'2012-04-26 17:14:58',NULL,NULL,'d4f083848a882e9ac83a58c6e4711115d573a57f',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2012-04-27 17:22:41
