-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2018 at 11:17 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organ_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_group`
--

DROP TABLE IF EXISTS `admin_group`;
CREATE TABLE IF NOT EXISTS `admin_group` (
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

--
-- Dumping data for table `admin_group`
--

INSERT INTO `admin_group` (`user_id`, `user_pwd`, `user_fullname`, `user_email`, `user_ip`, `user_permission`, `login_date`, `expire_time`, `user_first_time_login`) VALUES
('admin', '$2y$10$yrHjNwuRqKezKofjjHg8YeN3unckVRY5db78exUdGrKdhNp2LFbp6', 'Super Manager', 'wyao@alcanada.com', '::1', 'Administrator', '2018-04-01 15:50:55', 'unlimited', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempt`
--

DROP TABLE IF EXISTS `login_attempt`;
CREATE TABLE IF NOT EXISTS `login_attempt` (
  `attempt_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(36) NOT NULL,
  `attempt_counter` int(11) NOT NULL,
  PRIMARY KEY (`attempt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
CREATE TABLE IF NOT EXISTS `statistics` (
  `statistic_id` int(11) NOT NULL AUTO_INCREMENT,
  `statistic_desc` varchar(650) DEFAULT NULL,
  PRIMARY KEY (`statistic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`statistic_id`, `statistic_desc`) VALUES
(1, '<h5>32%</h5>\r\n<p>of Ontarians are</p>\r\n<p>registered donor, which</p>\r\n<p>is 3.9 million out of 12.3 million eligible donors</p>'),
(2, '<h5>1,527</h5>\r\n<p>Ontarians are currently waiting for an organ</p> \r\n<p>transplant, as of</p>\r\n<p>December 31, 2017</p>\r\n'),
(3, '<h5>15,547</h5>\r\n<p>Ontarians have received lifesaving organ</p>\r\n<p>transplant since 2003</p>'),
(4, '<h5>29%</h5>\r\n<p>is how much the number of National</p>\r\n<p>Deceased Donations have increased since 2006</p>');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
CREATE TABLE IF NOT EXISTS `stories` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `story_title` varchar(200) NOT NULL,
  `story_paragraph` varchar(1280) NOT NULL,
  PRIMARY KEY (`story_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`story_id`, `story_title`, `story_paragraph`) VALUES
(1, 'Brandon, Organ Donor', '<p>Brandonâ€™s parents donated his organs at Beaumont Hospital, Royal Oak, in February 2007. But according to his mother, Brandon himself made that decision years earlier.</p>\r\n<p>While at the dinner table, Brandonâ€™s mother Constance recalls, â€œI expressed my desire to donate my organs upon my death. At that time, my husband was totally against it. However, Brandon agreed with ...</p>'),
(2, 'Amellia, Liver Recipient', '<p>\"All through high school, I knew something wasn\'t right, but I didn\'t want to worry my parents. All I wanted to be was a normal teenager, graduate high school and attend the University of Kentucky. I guess you could say I was a good actress, \"Amelia has said. Amelia did graduate from high school but later said, \"I remember thinking\" at graduation that it was a... </p>'),
(3, 'Anne, Organ Donor', '<p>Shortly after celebrating her 32nd \r\nbirthday, Anne collapsed from a brain aneurysm. As her family waited anxiously in the hospital that February, they \r\noverheard another family, whose young child had just died, discuss the donation of their child\'s organs.</p>\r\n<p>Anne had never discussed organ donation with her family, but then and there, her family decided...</p>'),
(4, 'Patrick, Cornea Recipient', '<p>Patrick has spoken at the National Donor Recognition Ceremony in Washington, DC and several times at Gift of Life Michigan\'s Betty Buckley Donor Family Ceremony and has given permission for us to use excerpts from his speech.</p>\r\n<p>Patrick opens by describing the beauty of the Michigan State University campus before saying, \"As I experienced...</p>');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
