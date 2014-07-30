-- MySQL dump 10.13  Distrib 5.6.14, for Linux (x86_64)
--
-- Host: localhost    Database: bbm
-- ------------------------------------------------------
-- Server version	5.6.14

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
-- Table structure for table `bets`
--

DROP TABLE IF EXISTS `bets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bets` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `book_id` int(20) NOT NULL,
  `content_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `betpoint` int(10) NOT NULL,
  `result_point` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bets`
--

LOCK TABLES `bets` WRITE;
/*!40000 ALTER TABLE `bets` DISABLE KEYS */;
/*!40000 ALTER TABLE `bets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL COMMENT 'book create user',
  `title` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `bet_all_total` int(10) NOT NULL DEFAULT '0',
  `user_all_count` int(10) NOT NULL DEFAULT '0',
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bet_start` datetime NOT NULL,
  `bet_finish` datetime NOT NULL,
  `result_time` datetime NOT NULL,
  `time_zone` int(3) NOT NULL COMMENT 'id for table time_zones',
  `result_time_info` int(1) NOT NULL DEFAULT '0' COMMENT '0=false,1=true',
  `timeover_info` int(1) NOT NULL DEFAULT '0' COMMENT '0=false,1=true',
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `announcement_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `announcement` text COLLATE utf8_unicode_ci NOT NULL,
  `announcement_name` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `result_detail` text COLLATE utf8_unicode_ci,
  `win_contents_id` int(20) DEFAULT NULL,
  `reward_point` int(10) DEFAULT NULL,
  `updates_info` int(1) NOT NULL DEFAULT '0' COMMENT '0=false,1=true',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,1,'book1',0,0,'Up Coming','Others','2014-07-29 17:34:20','2014-07-30 17:34:24','2014-07-31 17:34:27',6,0,0,'samplesamplesamplesample','web','samplesamplesamplesample','sample',NULL,NULL,NULL,0,'2014-07-14 17:34:59','2014-07-14 17:35:03'),(3,1,'book2',0,0,'Book Delete','Sports','2014-07-16 16:41:20','2014-07-17 16:41:23','2014-07-25 16:41:30',1,0,0,'','','','',NULL,NULL,NULL,0,'2014-07-16 16:42:43','2014-07-16 16:42:46'),(4,2,'book3',0,0,'Bet Now','Sports','2014-07-17 16:41:36','2014-07-25 16:41:39','2014-07-30 16:41:42',1,0,0,'','','','',NULL,NULL,NULL,0,'2014-07-16 16:42:36','2014-07-16 16:42:39'),(5,2,'book4',0,0,'Up Coming','Others','2014-07-16 16:44:21','2014-07-17 16:44:24','2014-07-22 16:44:27',1,0,0,'','','','',NULL,NULL,NULL,0,'2014-07-16 16:44:50','2014-07-16 16:44:48'),(6,2,'book5',0,0,'Result Timeover','Sports','2014-07-17 16:44:34','2014-07-18 16:44:37','2014-07-22 16:44:40',1,0,0,'','','','',NULL,NULL,NULL,0,'2014-07-16 16:44:43','2014-07-16 16:44:45');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `book_id` int(20) NOT NULL,
  `title` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(2) NOT NULL COMMENT 'Alignment sequence',
  `odds` float(10,2) NOT NULL DEFAULT '1.00',
  `bet_total` int(10) NOT NULL DEFAULT '0',
  `user_count` int(10) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passbooks`
--

DROP TABLE IF EXISTS `passbooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passbooks` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `book_id` int(20) DEFAULT NULL,
  `content_id` int(20) DEFAULT NULL,
  `bet_id` int(20) DEFAULT NULL,
  `point` int(10) NOT NULL,
  `balance` int(10) NOT NULL,
  `event` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ex) bet',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passbooks`
--

LOCK TABLES `passbooks` WRITE;
/*!40000 ALTER TABLE `passbooks` DISABLE KEYS */;
/*!40000 ALTER TABLE `passbooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_zones`
--

DROP TABLE IF EXISTS `time_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_zones` (
  `id` int(11) NOT NULL,
  `gmtAdjustment` varchar(20) NOT NULL,
  `useDaylightTime` tinyint(4) NOT NULL,
  `value` float(5,2) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_zones`
--

LOCK TABLES `time_zones` WRITE;
/*!40000 ALTER TABLE `time_zones` DISABLE KEYS */;
INSERT INTO `time_zones` VALUES (1,'GMT-12:00',0,-12.00,'(GMT-12:00) International Date Line West'),(2,'GMT-11:00',0,-11.00,'(GMT-11:00) Midway Island, Samoa'),(3,'GMT-10:00',0,-10.00,'(GMT-10:00) Hawaii'),(4,'GMT-09:00',1,-9.00,'(GMT-09:00) Alaska'),(5,'GMT-08:00',1,-8.00,'(GMT-08:00) Pacific Time (US & Canada)'),(6,'GMT-08:00',1,-8.00,'(GMT-08:00) Tijuana, Baja California'),(7,'GMT-07:00',0,-7.00,'(GMT-07:00) Arizona'),(8,'GMT-07:00',1,-7.00,'(GMT-07:00) Chihuahua, La Paz, Mazatlan'),(9,'GMT-07:00',1,-7.00,'(GMT-07:00) Mountain Time (US & Canada)'),(10,'GMT-06:00',0,-6.00,'(GMT-06:00) Central America'),(11,'GMT-06:00',1,-6.00,'(GMT-06:00) Central Time (US & Canada)'),(12,'GMT-06:00',1,-6.00,'(GMT-06:00) Guadalajara, Mexico City, Monterrey'),(13,'GMT-06:00',0,-6.00,'(GMT-06:00) Saskatchewan'),(14,'GMT-05:00',0,-5.00,'(GMT-05:00) Bogota, Lima, Quito, Rio Branco'),(15,'GMT-05:00',1,-5.00,'(GMT-05:00) Eastern Time (US & Canada)'),(16,'GMT-05:00',1,-5.00,'(GMT-05:00) Indiana (East)'),(17,'GMT-04:00',1,-4.00,'(GMT-04:00) Atlantic Time (Canada)'),(18,'GMT-04:00',0,-4.00,'(GMT-04:00) Caracas, La Paz'),(19,'GMT-04:00',0,-4.00,'(GMT-04:00) Manaus'),(20,'GMT-04:00',1,-4.00,'(GMT-04:00) Santiago'),(21,'GMT-03:30',1,-3.50,'(GMT-03:30) Newfoundland'),(22,'GMT-03:00',1,-3.00,'(GMT-03:00) Brasilia'),(23,'GMT-03:00',0,-3.00,'(GMT-03:00) Buenos Aires, Georgetown'),(24,'GMT-03:00',1,-3.00,'(GMT-03:00) Greenland'),(25,'GMT-03:00',1,-3.00,'(GMT-03:00) Montevideo'),(26,'GMT-02:00',1,-2.00,'(GMT-02:00) Mid-Atlantic'),(27,'GMT-01:00',0,-1.00,'(GMT-01:00) Cape Verde Is.'),(28,'GMT-01:00',1,-1.00,'(GMT-01:00) Azores'),(29,'GMT+00:00',0,0.00,'(GMT+00:00) Casablanca, Monrovia, Reykjavik'),(30,'GMT+00:00',1,0.00,'(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London'),(31,'GMT+01:00',1,1.00,'(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna'),(32,'GMT+01:00',1,1.00,'(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague'),(33,'GMT+01:00',1,1.00,'(GMT+01:00) Brussels, Copenhagen, Madrid, Paris'),(34,'GMT+01:00',1,1.00,'(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb'),(35,'GMT+01:00',1,1.00,'(GMT+01:00) West Central Africa'),(36,'GMT+02:00',1,2.00,'(GMT+02:00) Amman'),(37,'GMT+02:00',1,2.00,'(GMT+02:00) Athens, Bucharest, Istanbul'),(38,'GMT+02:00',1,2.00,'(GMT+02:00) Beirut'),(39,'GMT+02:00',1,2.00,'(GMT+02:00) Cairo'),(40,'GMT+02:00',0,2.00,'(GMT+02:00) Harare, Pretoria'),(41,'GMT+02:00',1,2.00,'(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius'),(42,'GMT+02:00',1,2.00,'(GMT+02:00) Jerusalem'),(43,'GMT+02:00',1,2.00,'(GMT+02:00) Minsk'),(44,'GMT+02:00',1,2.00,'(GMT+02:00) Windhoek'),(45,'GMT+03:00',0,3.00,'(GMT+03:00) Kuwait, Riyadh, Baghdad'),(46,'GMT+03:00',1,3.00,'(GMT+03:00) Moscow, St. Petersburg, Volgograd'),(47,'GMT+03:00',0,3.00,'(GMT+03:00) Nairobi'),(48,'GMT+03:00',0,3.00,'(GMT+03:00) Tbilisi'),(49,'GMT+03:30',1,3.50,'(GMT+03:30) Tehran'),(50,'GMT+04:00',0,4.00,'(GMT+04:00) Abu Dhabi, Muscat'),(51,'GMT+04:00',1,4.00,'(GMT+04:00) Baku'),(52,'GMT+04:00',1,4.00,'(GMT+04:00) Yerevan'),(53,'GMT+04:30',0,4.50,'(GMT+04:30) Kabul'),(54,'GMT+05:00',1,5.00,'(GMT+05:00) Yekaterinburg'),(55,'GMT+05:00',0,5.00,'(GMT+05:00) Islamabad, Karachi, Tashkent'),(56,'GMT+05:30',0,5.50,'(GMT+05:30) Sri Jayawardenapura'),(57,'GMT+05:30',0,5.50,'(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi'),(58,'GMT+05:45',0,5.75,'(GMT+05:45) Kathmandu'),(59,'GMT+06:00',1,6.00,'(GMT+06:00) Almaty, Novosibirsk'),(60,'GMT+06:00',0,6.00,'(GMT+06:00) Astana, Dhaka'),(61,'GMT+06:30',0,6.50,'(GMT+06:30) Yangon (Rangoon)'),(62,'GMT+07:00',0,7.00,'(GMT+07:00) Bangkok, Hanoi, Jakarta'),(63,'GMT+07:00',1,7.00,'(GMT+07:00) Krasnoyarsk'),(64,'GMT+08:00',0,8.00,'(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi'),(65,'GMT+08:00',0,8.00,'(GMT+08:00) Kuala Lumpur, Singapore'),(66,'GMT+08:00',0,8.00,'(GMT+08:00) Irkutsk, Ulaan Bataar'),(67,'GMT+08:00',0,8.00,'(GMT+08:00) Perth'),(68,'GMT+08:00',0,8.00,'(GMT+08:00) Taipei'),(69,'GMT+09:00',0,9.00,'(GMT+09:00) Osaka, Sapporo, Tokyo'),(70,'GMT+09:00',0,9.00,'(GMT+09:00) Seoul'),(71,'GMT+09:00',1,9.00,'(GMT+09:00) Yakutsk'),(72,'GMT+09:30',0,9.50,'(GMT+09:30) Adelaide'),(73,'GMT+09:30',0,9.50,'(GMT+09:30) Darwin'),(74,'GMT+10:00',0,10.00,'(GMT+10:00) Brisbane'),(75,'GMT+10:00',1,10.00,'(GMT+10:00) Canberra, Melbourne, Sydney'),(76,'GMT+10:00',1,10.00,'(GMT+10:00) Hobart'),(77,'GMT+10:00',0,10.00,'(GMT+10:00) Guam, Port Moresby'),(78,'GMT+10:00',1,10.00,'(GMT+10:00) Vladivostok'),(79,'GMT+11:00',1,11.00,'(GMT+11:00) Magadan, Solomon Is., New Caledonia'),(80,'GMT+12:00',1,12.00,'(GMT+12:00) Auckland, Wellington'),(81,'GMT+12:00',0,12.00,'(GMT+12:00) Fiji, Kamchatka, Marshall Is.'),(82,'GMT+13:00',0,13.00,'(GMT+13:00) Nuku\'alofa');
/*!40000 ALTER TABLE `time_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `updates`
--

DROP TABLE IF EXISTS `updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `updates` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `book_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `event` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ex) bet_start',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `updates`
--

LOCK TABLES `updates` WRITE;
/*!40000 ALTER TABLE `updates` DISABLE KEYS */;
/*!40000 ALTER TABLE `updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'first input. facebook_username',
  `facebook_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_link_hide` int(1) NOT NULL DEFAULT '1' COMMENT '0=false, 1=true',
  `facebook_username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_gender` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_mail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'first input. facebook_mail',
  `point` int(20) NOT NULL DEFAULT '0',
  `betlist` int(10) NOT NULL DEFAULT '0',
  `makedbook` int(10) NOT NULL DEFAULT '0',
  `book_delete` int(10) NOT NULL DEFAULT '0',
  `result_timeover` int(10) NOT NULL DEFAULT '0',
  `profile` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'first input. facebook_bio',
  `default_rate` int(4) NOT NULL DEFAULT '10',
  `facebook_auto_post` int(1) NOT NULL DEFAULT '1' COMMENT '0=false, 1=true',
  `mail_submit` int(1) NOT NULL DEFAULT '1' COMMENT '0=false, 1=true',
  `time_zone` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id for table time_zones',
  `language` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ex) english',
  `facebook_like_point` int(1) NOT NULL DEFAULT '0' COMMENT '0=false, 1=true',
  `login_count` int(10) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ivan','facebook_id','facebook_link',1,'Ivan','male','ivan@intspirit.com','ivan@intspirit.com',0,0,0,0,0,'',10,1,1,'1','ru',0,1,'2014-07-17 10:41:15','2014-07-17 10:41:18'),(2,'James','james_id','james_link',1,'james','male','james@example.com','james@example.com',0,0,0,0,0,'',10,1,1,'1','ru',0,1,'2014-07-17 10:42:15','2014-07-17 10:42:18'),(8,'Iv Sk','1439948026269431','https://www.facebook.com/app_scoped_user_id/1439948026269431/',1,'Iv Sk','male','','',10,40,100,0,0,'',10,1,1,'4','en_US',0,1,'2014-07-18 17:53:14','2014-07-18 17:53:14');
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

-- Dump completed on 2014-07-30  8:33:48
