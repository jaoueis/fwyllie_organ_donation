-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: organ_donation
-- ------------------------------------------------------
-- Server version	5.6.38

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
-- Table structure for table `admin_group`
--

DROP TABLE IF EXISTS `admin_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_group` (
  `user_id` varchar(36) NOT NULL,
  `user_pwd` varchar(128) NOT NULL,
  `user_fullname` varchar(120) DEFAULT NULL,
  `user_email` varchar(120) NOT NULL,
  `user_ip` varchar(36) DEFAULT NULL,
  `user_permission` varchar(36) NOT NULL,
  `login_date` datetime DEFAULT NULL,
  `expire_time` varchar(65) DEFAULT NULL,
  `user_first_time_login` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_group`
--

LOCK TABLES `admin_group` WRITE;
/*!40000 ALTER TABLE `admin_group` DISABLE KEYS */;
INSERT INTO `admin_group` VALUES ('admin','$2y$10$yrHjNwuRqKezKofjjHg8YeN3unckVRY5db78exUdGrKdhNp2LFbp6','Super Manager','wyao@alcanada.com','::1','Administrator','2018-04-03 01:07:49','unlimited','no');
/*!40000 ALTER TABLE `admin_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_sub`
--

DROP TABLE IF EXISTS `email_sub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_sub` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `subscription` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_sub`
--

LOCK TABLES `email_sub` WRITE;
/*!40000 ALTER TABLE `email_sub` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_sub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempt`
--

DROP TABLE IF EXISTS `login_attempt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempt` (
  `attempt_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(36) NOT NULL,
  `attempt_counter` int(11) NOT NULL,
  PRIMARY KEY (`attempt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempt`
--

LOCK TABLES `login_attempt` WRITE;
/*!40000 ALTER TABLE `login_attempt` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistics` (
  `statistic_id` int(11) NOT NULL AUTO_INCREMENT,
  `statistic_desc` varchar(650) DEFAULT NULL,
  PRIMARY KEY (`statistic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistics`
--

LOCK TABLES `statistics` WRITE;
/*!40000 ALTER TABLE `statistics` DISABLE KEYS */;
INSERT INTO `statistics` VALUES (1,'15,547'),(2,'1,527'),(3,'32%'),(4,'29%');
/*!40000 ALTER TABLE `statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stories` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `story_name` text NOT NULL,
  `story_title` varchar(200) NOT NULL,
  `story_image` text NOT NULL,
  `story_paragraph` varchar(1280) NOT NULL,
  PRIMARY KEY (`story_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stories`
--

LOCK TABLES `stories` WRITE;
/*!40000 ALTER TABLE `stories` DISABLE KEYS */;
INSERT INTO `stories` VALUES (1,'Brandon','Organ Donor','brandon.jpg','Brandon’s parents donated his organs at Beaumont Hospital, Royal Oak, in February 2007. But according to his mother, Brandon himself made that decision years earlier. While at the dinner table, Brandon’s mother Constance recalls, “I expressed my desire to donate my organs upon my death. At that time, my husband was totally against it. '),(2,'Amellia','Liver Recipient','amellia.jpg','“All through high school, I knew something wasn’t right, but I didn’t want to worry my parents. All I wanted to be was a normal teenager, graduate high school and attend the University of Kentucky. I guess you could say I was a good actress.” Amelia has said.'),(3,'Anne','Organ Donor','anne.jpg','Shortly after celebrating her 32nd birthday, Anne collapsed from a brain aneurysm. As her family waited anxiously in the hospital that February, they overheard another family, whose young child had just died, discuss donation of their child’s organs. '),(4,'Patrick','Cornea Recipient','patrick.jpg','Patrick has spoken at the National Donor Recognition Ceremony in Washington, DC and several times at Gift of Life Michigan’s Betty Buckley Donor Family Ceremony and has given permission for us to use excerpts from his speech. ');
/*!40000 ALTER TABLE `stories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-03  2:07:53
