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
  `time_zone` int(3) NOT NULL COMMENT 'ex)1 it mean  UTC+1',
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,1,'samplesamplesamplesample',0,0,'upcoming','other','2014-07-29 17:34:20','2014-07-30 17:34:24','2014-07-31 17:34:27',6,0,0,'samplesamplesamplesample','web','samplesamplesamplesample','sample',NULL,NULL,NULL,0,'2014-07-14 17:34:59','2014-07-14 17:35:03');
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
  `odds` float NOT NULL DEFAULT '1',
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
  `time_zone` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ex)1 it mean  UTC+1',
  `language` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ex) english',
  `facebook_like_point` int(1) NOT NULL DEFAULT '0' COMMENT '0=false, 1=true',
  `login_count` int(10) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2014-07-14  9:00:39
