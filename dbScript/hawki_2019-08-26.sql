# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.30-MariaDB)
# Database: hawki
# Generation Time: 2019-08-26 04:37:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table assign_request_order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `assign_request_order`;

CREATE TABLE `assign_request_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_quote_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('pending','processed','ordered','completed','rejected','awaiting_result','approved','dispatched') NOT NULL DEFAULT 'pending',
  `reson` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `assign_request_order` WRITE;
/*!40000 ALTER TABLE `assign_request_order` DISABLE KEYS */;

INSERT INTO `assign_request_order` (`id`, `request_quote_id`, `user_id`, `status`, `reson`)
VALUES
	(1,25,17,'pending',''),
	(2,25,8,'rejected',''),
	(3,112,1,'pending',''),
	(4,112,37,'rejected',''),
	(5,113,1,'pending',''),
	(6,113,37,'rejected',''),
	(7,114,37,'pending',''),
	(8,115,37,'pending',''),
	(9,118,1,'pending',''),
	(10,118,40,'pending',''),
	(11,119,37,'pending',''),
	(12,119,8,'pending',''),
	(13,119,1,'pending',''),
	(14,120,37,'pending',''),
	(15,120,1,'pending',''),
	(16,120,40,'pending',''),
	(17,121,37,'rejected',''),
	(18,121,1,'pending',''),
	(19,121,40,'pending',''),
	(26,7,8,'rejected','no need....'),
	(27,7,8,'rejected','no need1'),
	(28,7,8,'rejected','no need....'),
	(29,26,8,'rejected','no need....'),
	(30,26,42,'rejected','no need....'),
	(31,26,42,'rejected','no need....'),
	(32,26,42,'rejected','no need....'),
	(33,26,42,'rejected','ufuf'),
	(34,26,42,'rejected','niq'),
	(35,126,42,'pending',''),
	(36,126,42,'pending',''),
	(37,126,42,'pending',''),
	(38,126,42,'pending',''),
	(39,126,37,'pending',''),
	(40,127,42,'pending',''),
	(41,127,42,'pending',''),
	(42,127,42,'pending',''),
	(43,127,42,'pending',''),
	(44,127,37,'pending',''),
	(45,129,37,'pending',''),
	(46,130,37,'pending',''),
	(47,131,37,'pending',''),
	(48,132,1,'pending',''),
	(49,132,40,'pending',''),
	(50,133,37,'pending',''),
	(51,134,37,'pending',''),
	(52,135,37,'pending',''),
	(53,136,37,'pending',''),
	(54,137,37,'pending',''),
	(55,138,37,'pending',''),
	(56,138,1,'pending',''),
	(57,138,40,'pending',''),
	(58,139,37,'pending',''),
	(59,139,1,'pending',''),
	(60,139,40,'pending',''),
	(61,140,37,'pending',''),
	(62,140,1,'pending',''),
	(63,140,40,'pending',''),
	(64,141,37,'pending',''),
	(65,141,1,'pending',''),
	(66,141,40,'pending',''),
	(67,142,37,'pending',''),
	(68,142,1,'pending',''),
	(69,142,40,'pending',''),
	(70,143,37,'pending',''),
	(71,143,1,'pending',''),
	(72,143,40,'pending',''),
	(73,144,37,'pending',''),
	(74,144,1,'pending',''),
	(75,144,40,'pending',''),
	(76,145,37,'pending',''),
	(77,145,1,'pending',''),
	(78,145,40,'pending',''),
	(79,146,37,'pending',''),
	(80,146,1,'pending',''),
	(81,146,40,'pending',''),
	(82,147,37,'pending',''),
	(83,147,1,'pending',''),
	(84,147,40,'pending',''),
	(85,148,37,'pending',''),
	(86,148,1,'pending',''),
	(87,148,40,'pending',''),
	(88,149,37,'pending',''),
	(89,149,1,'pending',''),
	(90,149,40,'pending',''),
	(91,150,37,'pending',''),
	(92,150,1,'pending',''),
	(93,150,40,'pending',''),
	(94,151,37,'pending',''),
	(95,151,1,'pending',''),
	(96,151,40,'pending',''),
	(97,152,37,'pending',''),
	(98,153,37,'pending',''),
	(99,153,1,'pending',''),
	(100,153,40,'pending',''),
	(101,154,37,'pending',''),
	(102,154,1,'pending',''),
	(103,154,40,'pending',''),
	(104,155,37,'pending',''),
	(105,155,1,'pending',''),
	(106,155,40,'pending',''),
	(107,156,37,'pending',''),
	(108,156,1,'pending',''),
	(109,156,40,'pending',''),
	(110,157,37,'pending',''),
	(111,157,1,'pending',''),
	(112,157,40,'pending',''),
	(113,158,37,'pending',''),
	(114,158,1,'pending',''),
	(115,158,40,'pending',''),
	(116,159,37,'pending',''),
	(117,159,1,'pending',''),
	(118,159,40,'pending',''),
	(119,160,37,'pending',''),
	(120,160,1,'pending',''),
	(121,160,40,'pending',''),
	(122,161,37,'pending',''),
	(123,161,1,'pending',''),
	(124,161,40,'pending',''),
	(125,162,37,'pending',''),
	(126,162,1,'pending',''),
	(127,162,40,'pending',''),
	(128,163,37,'pending',''),
	(129,163,1,'pending',''),
	(130,163,40,'pending',''),
	(131,164,37,'pending',''),
	(132,164,1,'pending',''),
	(133,164,40,'pending',''),
	(134,165,37,'pending',''),
	(135,165,1,'pending',''),
	(136,165,40,'pending',''),
	(137,166,37,'pending',''),
	(138,166,1,'pending',''),
	(139,166,40,'pending',''),
	(140,167,37,'pending',''),
	(141,167,1,'pending',''),
	(142,167,40,'pending',''),
	(143,168,37,'pending',''),
	(144,168,1,'pending',''),
	(145,168,40,'pending',''),
	(146,169,37,'pending',''),
	(147,169,1,'pending',''),
	(148,169,40,'pending',''),
	(149,170,37,'pending',''),
	(150,170,1,'pending',''),
	(151,170,40,'pending',''),
	(152,171,37,'pending',''),
	(153,171,1,'pending',''),
	(154,171,40,'pending',''),
	(155,172,37,'pending',''),
	(156,172,1,'pending',''),
	(157,172,40,'pending',''),
	(158,173,37,'pending',''),
	(159,173,1,'pending',''),
	(160,173,40,'pending',''),
	(161,174,37,'pending',''),
	(162,174,1,'pending',''),
	(163,174,40,'pending',''),
	(164,175,37,'pending',''),
	(165,175,1,'pending',''),
	(166,175,40,'pending',''),
	(167,176,37,'pending',''),
	(168,176,1,'pending',''),
	(169,176,40,'pending',''),
	(170,177,37,'pending',''),
	(171,177,1,'pending',''),
	(172,177,40,'pending',''),
	(173,178,37,'pending',''),
	(174,178,1,'pending',''),
	(175,178,40,'pending',''),
	(176,179,37,'pending',''),
	(177,179,1,'pending',''),
	(178,179,40,'pending',''),
	(179,180,37,'pending',''),
	(180,180,1,'pending',''),
	(181,180,40,'pending',''),
	(182,181,37,'pending',''),
	(183,181,1,'pending',''),
	(184,181,40,'pending',''),
	(185,182,37,'pending',''),
	(186,182,1,'pending',''),
	(187,182,40,'pending',''),
	(188,183,37,'pending',''),
	(189,183,1,'pending',''),
	(190,183,40,'pending',''),
	(191,184,42,'pending',''),
	(192,184,42,'pending',''),
	(193,184,42,'pending',''),
	(194,184,42,'pending',''),
	(195,184,42,'pending',''),
	(196,184,42,'pending',''),
	(197,184,42,'pending',''),
	(198,184,42,'pending',''),
	(199,184,42,'pending',''),
	(200,184,42,'pending',''),
	(201,184,42,'pending',''),
	(202,185,37,'pending',''),
	(203,185,1,'pending',''),
	(204,185,40,'pending',''),
	(205,186,37,'pending',''),
	(206,186,1,'pending',''),
	(207,186,40,'pending',''),
	(208,187,37,'pending',''),
	(209,187,1,'pending',''),
	(210,187,40,'pending',''),
	(211,188,37,'pending',''),
	(212,188,1,'pending',''),
	(213,188,40,'pending',''),
	(214,189,37,'pending',''),
	(215,189,1,'pending',''),
	(216,189,40,'pending',''),
	(217,190,37,'pending',''),
	(218,190,1,'pending',''),
	(219,190,40,'pending',''),
	(220,191,37,'pending',''),
	(221,191,1,'pending',''),
	(222,191,40,'pending',''),
	(223,192,37,'pending',''),
	(224,192,1,'pending',''),
	(225,192,40,'pending',''),
	(226,193,37,'pending',''),
	(227,193,1,'pending',''),
	(228,193,40,'pending',''),
	(229,194,37,'pending',''),
	(230,194,1,'pending',''),
	(231,194,40,'pending',''),
	(232,195,37,'pending',''),
	(233,195,1,'pending',''),
	(234,195,40,'pending',''),
	(235,196,37,'pending',''),
	(236,196,1,'pending',''),
	(237,196,40,'pending',''),
	(238,197,37,'pending',''),
	(239,197,1,'pending',''),
	(240,197,40,'pending',''),
	(241,198,37,'pending',''),
	(242,198,1,'pending',''),
	(243,198,40,'pending',''),
	(244,199,37,'pending',''),
	(245,199,1,'pending',''),
	(246,199,40,'pending',''),
	(247,200,37,'pending',''),
	(248,200,1,'pending',''),
	(249,200,40,'pending',''),
	(250,201,37,'pending',''),
	(251,201,1,'pending',''),
	(252,201,40,'pending',''),
	(253,202,37,'pending',''),
	(254,202,1,'pending',''),
	(255,202,40,'pending',''),
	(256,203,37,'pending',''),
	(257,203,1,'pending',''),
	(258,203,40,'pending',''),
	(259,204,37,'pending',''),
	(260,204,1,'pending',''),
	(261,204,40,'pending',''),
	(262,205,37,'pending',''),
	(263,205,1,'pending',''),
	(264,205,40,'pending',''),
	(265,206,37,'pending',''),
	(266,206,1,'pending',''),
	(267,206,40,'pending',''),
	(268,207,37,'pending',''),
	(269,207,1,'pending',''),
	(270,207,40,'pending',''),
	(271,208,37,'pending',''),
	(272,208,1,'pending',''),
	(273,208,40,'pending',''),
	(274,209,37,'pending',''),
	(275,209,1,'pending',''),
	(276,209,40,'pending',''),
	(277,210,37,'pending',''),
	(278,210,1,'pending',''),
	(279,210,40,'pending',''),
	(280,211,37,'pending',''),
	(281,211,1,'pending',''),
	(282,211,40,'pending',''),
	(283,212,37,'pending',''),
	(284,212,1,'pending',''),
	(285,212,40,'pending',''),
	(286,213,37,'pending',''),
	(287,213,1,'pending',''),
	(288,213,40,'pending',''),
	(289,214,37,'pending',''),
	(290,214,1,'pending',''),
	(291,214,40,'pending',''),
	(292,215,37,'pending',''),
	(293,215,1,'pending',''),
	(294,215,40,'pending',''),
	(295,216,37,'pending',''),
	(296,216,1,'pending',''),
	(297,216,40,'pending',''),
	(298,217,37,'pending',''),
	(299,217,1,'pending',''),
	(300,217,40,'pending',''),
	(301,218,37,'pending',''),
	(302,218,1,'pending',''),
	(303,218,40,'pending',''),
	(304,219,37,'pending',''),
	(305,219,1,'pending',''),
	(306,219,40,'pending',''),
	(307,220,37,'pending',''),
	(308,220,1,'pending',''),
	(309,220,40,'pending',''),
	(310,221,37,'pending',''),
	(311,221,1,'pending',''),
	(312,221,40,'pending',''),
	(313,222,37,'pending',''),
	(314,222,1,'pending',''),
	(315,222,40,'pending',''),
	(316,223,1,'pending',''),
	(317,223,40,'pending',''),
	(318,224,8,'pending',''),
	(319,224,37,'pending',''),
	(320,224,1,'pending',''),
	(321,224,40,'pending','');

/*!40000 ALTER TABLE `assign_request_order` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table banner
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `bid` int(50) NOT NULL AUTO_INCREMENT,
  `bannerTitle` varchar(255) DEFAULT NULL,
  `bannerDescription` text,
  `buttonText` varchar(200) DEFAULT NULL,
  `buttonUrl` varchar(200) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `banner_isActive` int(1) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;

INSERT INTO `banner` (`bid`, `bannerTitle`, `bannerDescription`, `buttonText`, `buttonUrl`, `image`, `video_url`, `banner_isActive`)
VALUES
	(1,'home banner',NULL,NULL,NULL,'ban_IVgyP.png','http://youtube.com',1);

/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table brand
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;

INSERT INTO `brand` (`id`, `name`, `created_at`)
VALUES
	(1,'Cyclone','2018-10-16 18:16:00'),
	(2,'Herdsman','2018-10-16 13:06:00'),
	(3,'OK','2018-10-16 13:06:00'),
	(4,'Redbrand','2018-10-16 13:00:00'),
	(5,'Sheffield','2018-10-16 14:00:00'),
	(6,'Waratah','2018-10-16 13:00:00');

/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table buyer_feedback
# ------------------------------------------------------------

DROP TABLE IF EXISTS `buyer_feedback`;

CREATE TABLE `buyer_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `offer_id` varchar(255) DEFAULT NULL,
  `good_quality` varchar(255) DEFAULT NULL,
  `delivery_speed` varchar(255) DEFAULT NULL,
  `attitute` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `average` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `buyer_feedback` WRITE;
/*!40000 ALTER TABLE `buyer_feedback` DISABLE KEYS */;

INSERT INTO `buyer_feedback` (`id`, `user_id`, `offer_id`, `good_quality`, `delivery_speed`, `attitute`, `description`, `average`)
VALUES
	(10,'56','5643','3','2','1','Description','2'),
	(11,'56','5641','3','2','1','ption','2'),
	(12,'56','5646','3','2','1','Description','4'),
	(13,'56','5641','3','2','1','Description','2'),
	(14,'56','7152','2','2','1','ddf','1.6666666666667'),
	(15,'57','7775','5','5','5','e','5'),
	(16,'58','7738','2','3','3','jasmer','2.6666666666667'),
	(17,'57','8119','5','5','5','33','5'),
	(18,'84','8282','5','5','5','very good deal','5'),
	(19,'56','8992','5','5','5','123','5');

/*!40000 ALTER TABLE `buyer_feedback` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table buyer_orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `buyer_orders`;

CREATE TABLE `buyer_orders` (
  `order_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `order_random_id` varchar(255) NOT NULL,
  `product_assign_category` int(255) NOT NULL COMMENT 'selected product  type category',
  `brand_name_1` varchar(255) DEFAULT NULL,
  `order_name_1` varchar(255) DEFAULT NULL,
  `part_number_1` varchar(255) DEFAULT NULL,
  `quantity_1` varchar(255) DEFAULT 'NULL',
  `note_1` varchar(255) DEFAULT 'NULL',
  `brand_name_2` varchar(255) DEFAULT NULL,
  `order_name_2` varchar(255) DEFAULT NULL,
  `part_number_2` varchar(255) DEFAULT NULL,
  `quantity_2` varchar(255) DEFAULT 'NULL',
  `note_2` varchar(255) DEFAULT 'NULL',
  `brand_name_3` varchar(255) DEFAULT NULL,
  `order_name_3` varchar(255) DEFAULT NULL,
  `part_number_3` varchar(255) DEFAULT NULL,
  `quantity_3` varchar(255) DEFAULT 'NULL',
  `note_3` varchar(255) DEFAULT 'NULL',
  `brand_name_4` varchar(255) DEFAULT NULL,
  `order_name_4` varchar(255) DEFAULT NULL,
  `part_number_4` varchar(255) DEFAULT NULL,
  `quantity_4` varchar(255) DEFAULT 'NULL',
  `note_4` varchar(255) DEFAULT 'NULL',
  `brand_name_5` varchar(255) DEFAULT NULL,
  `order_name_5` varchar(255) DEFAULT NULL,
  `part_number_5` varchar(255) DEFAULT NULL,
  `quantity_5` varchar(255) DEFAULT 'NULL',
  `note_5` varchar(255) DEFAULT 'NULL',
  `brand_name_6` varchar(255) DEFAULT NULL,
  `order_name_6` varchar(255) DEFAULT NULL,
  `part_number_6` varchar(255) DEFAULT NULL,
  `quantity_6` varchar(255) DEFAULT 'NULL',
  `note_6` varchar(255) DEFAULT 'NULL',
  `brand_name_7` varchar(255) DEFAULT NULL,
  `order_name_7` varchar(255) DEFAULT NULL,
  `part_number_7` varchar(255) DEFAULT NULL,
  `quantity_7` varchar(255) DEFAULT 'NULL',
  `note_7` varchar(255) DEFAULT 'NULL',
  `brand_name_8` varchar(255) DEFAULT NULL,
  `order_name_8` varchar(255) DEFAULT NULL,
  `part_number_8` varchar(255) DEFAULT NULL,
  `quantity_8` varchar(255) DEFAULT 'NULL',
  `note_8` varchar(255) DEFAULT 'NULL',
  `brand_name_9` varchar(255) DEFAULT NULL,
  `order_name_9` varchar(255) DEFAULT NULL,
  `part_number_9` varchar(255) DEFAULT NULL,
  `quantity_9` varchar(255) DEFAULT 'NULL',
  `note_9` varchar(255) DEFAULT 'NULL',
  `brand_name_10` varchar(255) DEFAULT NULL,
  `order_name_10` varchar(255) DEFAULT NULL,
  `part_number_10` varchar(255) DEFAULT NULL,
  `quantity_10` varchar(255) DEFAULT 'NULL',
  `note_10` varchar(255) DEFAULT 'NULL',
  `order_description` varchar(255) DEFAULT 'NULL',
  `prefer_delivery_data` varchar(255) DEFAULT NULL,
  `sent_number_ofSupplier_request` int(255) NOT NULL DEFAULT '0' COMMENT '0 => ''NO RESPONSE '',  send  total response to suplier ',
  `awaiting_supplie_response` int(255) DEFAULT '0',
  `draft` int(255) DEFAULT '0' COMMENT '0=> saved .1=> save as draft',
  `send_notification_to_suppliers` varchar(255) DEFAULT NULL COMMENT 'supplier_id-----------------all suppliers notiify sent and sent mail on this user id ',
  `is_deleted` int(255) NOT NULL DEFAULT '0' COMMENT '0=> not delete .1=> deleted',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_Request_order_again` int(255) NOT NULL DEFAULT '0',
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  `image7` varchar(255) DEFAULT NULL,
  `image8` varchar(255) DEFAULT NULL,
  `image9` varchar(255) DEFAULT NULL,
  `image10` varchar(255) DEFAULT NULL,
  `bundle_id` int(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `buyer_orders` WRITE;
/*!40000 ALTER TABLE `buyer_orders` DISABLE KEYS */;

INSERT INTO `buyer_orders` (`order_id`, `user_id`, `order_random_id`, `product_assign_category`, `brand_name_1`, `order_name_1`, `part_number_1`, `quantity_1`, `note_1`, `brand_name_2`, `order_name_2`, `part_number_2`, `quantity_2`, `note_2`, `brand_name_3`, `order_name_3`, `part_number_3`, `quantity_3`, `note_3`, `brand_name_4`, `order_name_4`, `part_number_4`, `quantity_4`, `note_4`, `brand_name_5`, `order_name_5`, `part_number_5`, `quantity_5`, `note_5`, `brand_name_6`, `order_name_6`, `part_number_6`, `quantity_6`, `note_6`, `brand_name_7`, `order_name_7`, `part_number_7`, `quantity_7`, `note_7`, `brand_name_8`, `order_name_8`, `part_number_8`, `quantity_8`, `note_8`, `brand_name_9`, `order_name_9`, `part_number_9`, `quantity_9`, `note_9`, `brand_name_10`, `order_name_10`, `part_number_10`, `quantity_10`, `note_10`, `order_description`, `prefer_delivery_data`, `sent_number_ofSupplier_request`, `awaiting_supplie_response`, `draft`, `send_notification_to_suppliers`, `is_deleted`, `created_at`, `updated_at`, `is_Request_order_again`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `image10`, `bundle_id`)
VALUES
	(1864,1,'BF9576831',229,'123','2313','132','13','13','123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'31','2019-07-24',4,0,0,'57,56,67,84',0,'2019-07-29 09:15:02','2019-07-29 12:28:01',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1865,1,'BM1627530',229,'brand2','masterproduct2','part2','31','13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13','2019-07-30',4,0,0,'57,56,67,84',0,'2019-07-29 12:29:52','2019-07-29 12:29:52',0,'1564367392.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1866,1,'BX7594603',228,'44','123','2','123','','123','2313','132','123','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123','2019-07-24',4,0,0,'57,56,67,84',0,'2019-07-29 16:16:26','2019-07-29 16:16:26',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1867,1,'BO8932104',229,'brand1','masterprodut1','part1','13','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13','2019-07-17',4,0,0,'57,56,67,84',0,'2019-07-31 09:15:42','2019-07-31 09:15:42',0,'1564528542.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1868,1,'BH2716359',229,'123','1290','123','13','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13','2019-07-30',4,0,0,'57,56,67,84',0,'2019-07-31 09:56:48','2019-07-31 09:56:48',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1869,1,'BN9461230',228,'13','123','213','123','zz','123','2313','132','123','cc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2019-07-30',4,0,0,'57,56,67,84',0,'2019-07-31 10:01:38','2019-07-31 10:01:38',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1870,1,'BD9340786',229,'123','1290','123','3','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13','2019-07-31',4,0,0,'57,56,67,84',0,'2019-07-31 10:31:51','2019-07-31 10:31:51',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1871,1,'BC7984106',229,'123','1290','123','13','13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13','2019-07-31',4,0,0,'57,56,67,84',0,'2019-07-31 10:35:15','2019-07-31 10:35:15',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1872,1,'BZ2709458',229,'123','1290','123','456','','123','2313','132','142','','fakeb2','machinery2','fakep2','24','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'24','2019-07-23',4,0,0,'57,56,67,84',0,'2019-07-31 10:52:57','2019-07-31 10:52:57',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1873,1,'BO6709238',229,'brand2','masterproduct2','part2','13','13','brand3','masterproduct3','part3','13','13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13','2019-07-31',4,0,0,'57,56,67,84',0,'2019-07-31 11:42:00','2019-07-31 11:42:00',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1874,1,'BL6041239',229,'brand1','masterprodut1','part1','13','','11','masterprodut1','3','13','','123','1290','123','31','','fakeb','machinery1','fakep','1311','','brand1','masterprodut1','part1','313','','11','masterprodut1','3','13','','brand2','masterproduct2','part2','13','','fakeb','machinery1','fakep','13','','24','13','56','13','','44','masterproduct3','34','13','','13','2019-08-14',4,0,0,'57,56,67,84',0,'2019-08-01 16:42:02','2019-08-01 16:42:02',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1875,1,'BG7923186',228,'11','masterprodut1','3','11','about the product 1','brand2','pump','123','2','about the product 2','brand 3','product3','123','3','note 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'please use au post','2019-08-27',4,0,0,'57,56,67,84',0,'2019-08-05 15:43:33','2019-08-16 15:39:32',0,'1564983813.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1876,57,'BZ317948352',4,'123','123','123','123','123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123','2019-08-21',9,0,0,'1,8,37,40,55,56,58,67,84',0,'2019-08-19 10:54:48','2019-08-19 10:54:48',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1877,1,'BB3406528',229,'brand2','masterproduct2','part2','13','13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13','2019-08-29',4,0,0,'57,56,67,84',0,'2019-08-19 11:05:06','2019-08-19 11:05:06',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1878,1,'BY7582409',229,'brand2','masterproduct2','part2','56','123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123','2019-08-28',4,0,0,'57,56,67,84',0,'2019-08-19 11:36:04','2019-08-19 11:36:04',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1879,56,'BA312063917',222,'123','123','123','123','13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123','2019-08-28',3,0,0,'57,67,84',0,'2019-08-19 11:54:58','2019-08-19 11:54:58',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
	(1880,1,'BH0492316',229,'brand2','masterproduct2','part2','123','123','44','masterproduct3','34','123','123','brand2','masterproduct2','part2','123','12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123','2019-08-22',4,0,0,'57,56,67,84',0,'2019-08-21 17:34:34','2019-08-21 17:34:34',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0);

/*!40000 ALTER TABLE `buyer_orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `super_cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`id`, `name`, `user_id`, `status`, `created_at`, `updated_at`, `super_cat_id`)
VALUES
	(1,'Hotels & Accommodation','1','1','2018-08-04 22:04:39','2018-08-04 12:04:39',1),
	(2,'Agricultural and Horticultural Chemicals','1','1','2018-08-04 22:07:46','2018-08-04 12:07:46',2),
	(3,'Stockyards & Equipment','1','1','2018-08-04 22:08:24','2018-08-04 12:08:24',3),
	(4,'Agricultural and Horticulture Machinery and Equipment','1','1','2018-08-04 22:08:48','2018-08-04 12:08:48',3),
	(5,'Agricultural and Horticulture Packaging and Pallets','1','1','2018-08-04 22:08:48','2018-08-04 12:08:48',3),
	(6,'Agricultural Vehicles and Bikes','1','1','2018-08-04 22:08:48','2018-08-04 12:08:48',3),
	(7,'Fences/Gates/Grids','1','1','2018-08-04 22:15:57','2018-08-04 12:15:57',3),
	(8,'Hand tools and Heavy Duty tools','1','1','2018-08-04 22:29:14','2018-08-04 12:29:14',3),
	(9,'Hire Equipment','1','1','2018-08-04 22:29:49','2018-08-04 12:29:49',3),
	(10,'Hydroponic Supplies & Equipments','1','1','2018-08-04 22:30:39','2018-08-04 12:30:39',3),
	(11,'Oils and Lubricants','1','1','2018-08-04 22:31:07','2018-08-04 12:31:07',3),
	(12,'Refrigeration and Cold Rooms and air conditioning ','1','1','2018-08-04 22:32:03','2018-08-04 12:32:03',3),
	(13,'Farm Sheds & Silos','1','1','2018-08-04 22:32:32','2018-08-04 12:32:32',3),
	(14,'Aircraft and Helicopter','1','1','2018-08-04 22:32:50','2018-08-04 12:32:50',3),
	(15,'Hire Trucks/Vehicles','1','1','2018-08-04 22:33:24','2018-08-04 12:33:24',3),
	(16,'Earth moving Services','1','1','2018-08-04 22:33:50','2018-08-04 12:33:50',3),
	(17,'Fuel Storage Tanks & Supply','1','1','2018-08-04 22:34:24','2018-08-04 12:34:24',3),
	(18,'Feed/Water Troughs and Tubs','1','1','2018-08-04 22:36:38','2018-08-04 12:36:38',3),
	(19,'Aquaculture and Fisheries','1','1','2018-08-04 22:37:05','2018-08-04 12:37:05',4),
	(20,'Stock Feeds, Fodder & Supplements','1','1','2018-08-04 22:37:26','2018-08-04 12:37:26',4),
	(21,'Horse Thoroughbred/Others','1','1','2018-08-04 22:37:26','2018-08-04 12:37:26',4),
	(22,'Horse/Cattle Tack and Saddlery','1','1','2018-08-04 22:38:06','2018-08-04 12:38:06',4),
	(23,'Livestock','1','1','2018-08-04 22:38:27','2018-08-04 12:38:27',4),
	(24,'Livestock Veterinary Supplies & Instruments','1','1','2018-08-04 22:38:52','2018-08-04 12:38:52',4),
	(25,'Building Equipment & Supplies','1','1','2018-08-04 22:40:03','2018-08-04 12:40:03',5),
	(26,'Cleaning & Sanitation Supplies','1','1','2018-08-04 22:40:03','2018-08-04 12:40:03',6),
	(27,'Electrical Supplies','1','1','2018-08-04 22:40:03','2018-08-04 12:40:03',7),
	(28,'Bulk Power Supply','1','1','2018-08-04 22:40:23','2018-08-04 12:40:23',7),
	(29,'Solar Power Supplies','1','1','2018-08-04 22:40:44','2018-08-04 12:40:44',7),
	(30,'Insurance Services','1','1','2018-08-04 22:41:02','2018-08-04 12:41:02',8),
	(31,'Accounting and Legal services','1','1','2018-08-04 22:41:26','2018-08-04 12:41:26',8),
	(32,'Banks and Financial Services','1','1','2018-08-04 22:41:49','2018-08-04 12:41:49',8),
	(33,'Turf & Lawn Suppliers','1','1','2018-09-04 14:01:05','2018-09-04 04:01:05',9),
	(34,'Nursery','1','1','2018-09-04 14:02:17','2018-09-04 04:02:17',9),
	(35,'Irrigation & Reticulation Supplies','1','1','2018-09-04 14:07:43','2018-09-04 04:07:43',10),
	(36,'Water Storage Tanks','1','1','2018-09-04 14:08:25','2018-09-04 04:08:25',10),
	(37,'Farm labour and contractors hire','1','1','2018-09-04 14:09:49','2018-09-04 04:09:49',11),
	(38,'Landscape Supplies','1','1','2018-09-04 14:10:29','2018-09-04 04:10:29',12),
	(39,'Mobile Phone Services','1','1','2018-09-04 14:21:24','2018-09-04 04:21:24',13),
	(40,'Office Supplies','1','1','2018-09-04 14:31:19','2018-09-04 04:31:19',14),
	(41,'Personal Protective Equipment','1','1','2018-09-04 14:31:19','2018-09-04 04:31:19',15),
	(42,'Timber Supplies & Equipment','1','1','2018-09-04 14:31:19','2018-09-04 04:31:19',16),
	(43,' tradesperson services','1','1','2018-09-04 14:43:48','2018-09-04 04:43:48',17),
	(44,'Transport and Freight Services','1','1','2018-09-04 14:44:47','2018-09-04 04:44:47',18);

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table chat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `message` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recived` enum('0','1') NOT NULL DEFAULT '0',
  `requestId` varchar(255) DEFAULT NULL,
  `send` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `updated_at`, `recived`, `requestId`, `send`)
VALUES
	(60,'17','17','hiii','2018-08-13 17:25:25','0','4','2018-08-13 07:25:25.000000'),
	(61,'17','17','hello','2018-08-13 17:25:31','0','4','2018-08-13 07:25:31.000000'),
	(62,'17','17','hows u','2018-08-13 17:25:39','0','4','2018-08-13 07:25:39.000000'),
	(63,'17','17','m fine','2018-08-13 17:25:44','0','4','2018-08-13 07:25:44.000000'),
	(64,'17','17','greate to see u','2018-08-13 17:25:54','0','4','2018-08-13 07:25:54.000000'),
	(65,'17','17','please reply','2018-08-13 17:26:02','0','4','2018-08-13 07:26:02.000000'),
	(73,'1','17','ok','2018-08-13 17:47:00','0','4','2018-08-13 07:47:00.000000'),
	(74,'17','1','kii','2018-08-13 21:01:54','0','4','2018-08-13 11:01:54.000000'),
	(75,'1','17','ggg','2018-08-13 21:02:19','0','4','2018-08-13 11:02:19.000000'),
	(76,'8','17','hii\n\nhow\nare\nu\n?\n','2018-08-13 22:48:36','0','4','2018-08-13 12:48:36.000000'),
	(77,'8','17','where','2018-08-13 22:48:47','0','4','2018-08-13 12:48:47.000000'),
	(78,'8','17','do','2018-08-13 22:48:51','0','4','2018-08-13 12:48:51.000000'),
	(79,'8','17','you','2018-08-13 22:48:59','0','4','2018-08-13 12:48:59.000000'),
	(80,'8','17','live','2018-08-13 22:49:09','0','4','2018-08-13 12:49:09.000000'),
	(81,'8','17','i','2018-08-13 22:49:18','0','4','2018-08-13 12:49:18.000000'),
	(82,'8','17','m','2018-08-13 22:49:20','0','4','2018-08-13 12:49:20.000000'),
	(83,'8','17','here','2018-08-13 22:49:25','0','4','2018-08-13 12:49:25.000000'),
	(84,'8','17','how','2018-08-13 22:54:51','0','4','2018-08-13 12:54:51.000000'),
	(85,'17','17','hello','2018-08-16 15:28:49','0','4','2018-08-16 05:28:49.000000');

/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table color
# ------------------------------------------------------------

DROP TABLE IF EXISTS `color`;

CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;

INSERT INTO `color` (`id`, `name`, `created_at`)
VALUES
	(1,'Blue','2018-10-16 00:00:00'),
	(2,'Red','2018-10-16 06:06:08'),
	(3,'Green','2018-10-16 04:16:14'),
	(4,'Yellow','2018-10-16 05:17:18'),
	(5,'Pink','2018-10-16 03:08:08'),
	(6,'Black','2018-10-16 03:08:08'),
	(7,'White','2018-10-16 04:15:11'),
	(8,'Orange','2018-10-16 04:11:11'),
	(9,'Grey','2018-10-16 06:10:12');

/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `created_at`)
VALUES
	(1,'hansa','hansa.kumari@a1professionals.info','3243242343242','message here','2018-08-09 20:40:56'),
	(2,'dgdfg','dgfdfg@gmail.com','dsfsfsfd','asdf','2019-05-16 16:25:46');

/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table feedback
# ------------------------------------------------------------

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `star_rating` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;

INSERT INTO `feedback` (`id`, `order_id`, `description`, `star_rating`, `status`, `user_id`)
VALUES
	(6,NULL,'jasmer','2','0',56),
	(7,1483,'dis','4','1',56),
	(8,1406,'fdfdf','2','1',58),
	(9,1410,'gggbgg','2','1',58),
	(10,1413,'hh','2','1',58),
	(12,1412,'jasmer','3','1',58),
	(13,1481,'dismiss',NULL,'1',58),
	(14,1521,'jhkjjk','4','1',58),
	(15,1521,'dssss','2','1',17),
	(16,1521,'jas','2','1',58),
	(17,1521,';l;l;','3','1',58),
	(18,1415,'vfvcmncv','3','1',58),
	(19,1415,'jjhjjh','2','1',58),
	(24,1002,'pardeep','3','1',58),
	(25,1534,'3','5','1',57),
	(26,795,'fggff','3','1',17),
	(27,1679,'j','5','1',57),
	(28,1739,'good buyer','5','1',84);

/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_list`;

CREATE TABLE `master_list` (
  `master_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `product_assign_category` int(255) NOT NULL COMMENT 'selected product  type category',
  `brand_name` varchar(255) DEFAULT NULL,
  `order_name` varchar(255) DEFAULT NULL,
  `part_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `master_list` WRITE;
/*!40000 ALTER TABLE `master_list` DISABLE KEYS */;

INSERT INTO `master_list` (`master_id`, `user_id`, `product_assign_category`, `brand_name`, `order_name`, `part_number`, `created_at`, `updated_at`)
VALUES
	(1803,1,229,'3456','123','646','2019-07-16 15:24:08','2019-07-16 15:24:08'),
	(1804,1,229,'3456','123','646','2019-07-16 15:25:27','2019-07-16 15:25:27'),
	(1805,1,229,'3456','123','646','2019-07-16 15:25:33','2019-07-16 15:25:33'),
	(1806,1,28,'12','123','32','2019-07-16 15:45:35','2019-07-16 15:45:35'),
	(1807,1,28,'23','31','13','2019-07-16 15:45:35','2019-07-16 15:45:35'),
	(1808,1,228,'3','12','2','2019-07-16 16:18:19','2019-07-16 16:18:19'),
	(1809,1,228,'236','p2','','2019-07-16 16:18:19','2019-07-16 16:18:19'),
	(1810,1,228,'','p3','','2019-07-16 16:18:19','2019-07-16 16:18:19'),
	(1811,1,228,'','p4','','2019-07-16 16:18:19','2019-07-16 16:18:19'),
	(1812,1,228,'','p5','','2019-07-16 16:18:19','2019-07-16 16:18:19'),
	(1813,1,228,'','p6','','2019-07-16 16:18:19','2019-07-16 16:18:19'),
	(1814,1,228,'','p7','','2019-07-16 16:18:19','2019-07-16 16:18:19'),
	(1815,1,228,'','p8','','2019-07-16 16:18:19','2019-07-16 16:18:19'),
	(1816,1,228,'','p9','','2019-07-16 16:18:19','2019-07-16 16:18:19'),
	(1817,1,228,'33','12','22','2019-07-16 16:19:01','2019-07-16 16:19:01'),
	(1826,1,227,'24','13','56','2019-07-16 16:20:27','2019-07-16 16:20:27'),
	(1835,1,25,'132','123','123','2019-07-16 16:21:52','2019-07-16 16:21:52'),
	(1844,1,229,'132','123','23','2019-07-16 16:23:52','2019-07-16 16:23:52'),
	(1845,1,228,'13','13','123','2019-07-16 16:34:20','2019-07-16 16:34:20'),
	(1846,1,227,'123','1290','123','2019-07-16 16:36:58','2019-07-16 16:36:58'),
	(1847,1,229,'cc','pro1','123','2019-07-17 08:20:21','2019-07-17 08:20:21'),
	(1848,1,18,'13','13','13','2019-07-17 08:25:32','2019-07-17 08:25:32'),
	(1849,1,228,'13','123','213','2019-07-17 08:31:14','2019-07-17 08:31:14'),
	(1850,1,18,'13','13','13','2019-07-17 08:33:10','2019-07-17 08:33:10'),
	(1851,1,229,'123','2313','132','2019-07-17 08:34:17','2019-07-17 08:34:17'),
	(1852,1,228,'44','123','2','2019-07-17 08:54:53','2019-07-17 08:54:53'),
	(1853,1,228,'eq','q','we','2019-07-17 08:54:53','2019-07-17 08:54:53'),
	(1854,1,229,'brand1','masterprodut1','part1','2019-07-17 08:55:45','2019-07-17 08:55:45'),
	(1855,1,229,'brand2','masterproduct2','part2','2019-07-17 08:55:45','2019-07-17 08:55:45'),
	(1856,1,229,'brand3','masterproduct3','part3','2019-07-17 08:55:45','2019-07-17 08:55:45'),
	(1857,1,228,'11','masterprodut1','3','2019-07-17 08:56:22','2019-07-17 08:56:22'),
	(1858,1,228,'44','masterproduct3','34','2019-07-17 08:56:22','2019-07-17 08:56:22'),
	(1859,1,228,'fakeb','machinery1','fakep','2019-07-17 11:27:59','2019-07-17 11:27:59'),
	(1860,1,228,'fakeb2','machinery2','fakep2','2019-07-17 11:27:59','2019-07-17 11:27:59'),
	(1861,1,229,'123','2313','132','2019-07-23 14:02:59','2019-07-23 14:02:59'),
	(1862,1,229,'123','1290','123','2019-07-23 14:02:59','2019-07-23 14:02:59'),
	(1863,1,229,'cc','pro1','123','2019-07-23 14:02:59','2019-07-23 14:02:59'),
	(1864,1,229,'24','13','56','2019-07-23 14:02:59','2019-07-23 14:02:59'),
	(1865,109,123,'14','123','123','2019-08-21 15:41:09','2019-08-21 15:41:09'),
	(1866,110,456,'789','123','1011','2019-08-21 16:40:54','2019-08-21 16:40:54'),
	(1867,111,23,'23','12','23','2019-08-22 09:24:28','2019-08-22 09:24:28'),
	(1868,115,0,'b1','P1','i1','2019-08-22 09:34:32','2019-08-22 09:34:32'),
	(1869,115,0,'b2','p2','i2','2019-08-22 09:34:32','2019-08-22 09:34:32'),
	(1870,115,0,'b3','p3','i3','2019-08-22 09:34:32','2019-08-22 09:34:32'),
	(1871,115,0,'b4','p4','i4','2019-08-22 09:34:32','2019-08-22 09:34:32'),
	(1872,115,0,'b5','p5','i5','2019-08-22 09:34:32','2019-08-22 09:34:32'),
	(1873,117,229,'w13','frf','4r','2019-08-22 09:58:11','2019-08-22 09:58:11'),
	(1874,117,227,'fe','rwdd','rfe','2019-08-22 09:58:11','2019-08-22 09:58:11'),
	(1875,117,17,'rfe','21','42r','2019-08-22 09:58:11','2019-08-22 09:58:11'),
	(1876,117,225,'r31','fr','re','2019-08-22 09:58:11','2019-08-22 09:58:11'),
	(1877,117,188,'we','66','rew','2019-08-22 09:58:11','2019-08-22 09:58:11'),
	(1878,89,39,'','','','2019-08-23 14:35:25','2019-08-23 14:35:25'),
	(1879,89,41,'','','','2019-08-23 14:35:25','2019-08-23 14:35:25'),
	(1880,89,34,'','','','2019-08-23 14:35:25','2019-08-23 14:35:25'),
	(1881,89,40,'','','','2019-08-23 14:35:25','2019-08-23 14:35:25'),
	(1882,89,28,'','','','2019-08-23 14:35:25','2019-08-23 14:35:25'),
	(1883,90,41,'','','','2019-08-23 14:38:02','2019-08-23 14:38:02'),
	(1884,90,41,'','','','2019-08-23 14:38:02','2019-08-23 14:38:02'),
	(1885,90,41,'','','','2019-08-23 14:38:02','2019-08-23 14:38:02'),
	(1886,90,40,'','','','2019-08-23 14:38:02','2019-08-23 14:38:02'),
	(1887,90,41,'','','','2019-08-23 14:38:02','2019-08-23 14:38:02'),
	(1888,91,42,'456','123','123','2019-08-23 16:24:08','2019-08-23 16:24:08'),
	(1889,91,41,'123','132','123','2019-08-23 16:24:08','2019-08-23 16:24:08'),
	(1890,91,35,'42','41','24','2019-08-23 16:24:08','2019-08-23 16:24:08'),
	(1891,91,38,'124','14','24','2019-08-23 16:24:08','2019-08-23 16:24:08'),
	(1892,91,39,'241','124','124','2019-08-23 16:24:08','2019-08-23 16:24:08'),
	(1893,92,42,'','','','2019-08-26 10:44:43','2019-08-26 10:44:43'),
	(1894,92,38,'','','','2019-08-26 10:44:43','2019-08-26 10:44:43'),
	(1895,92,38,'','','','2019-08-26 10:44:43','2019-08-26 10:44:43'),
	(1896,92,40,'','','','2019-08-26 10:44:43','2019-08-26 10:44:43'),
	(1897,92,42,'','','','2019-08-26 10:44:43','2019-08-26 10:44:43'),
	(1898,93,40,'','','','2019-08-26 10:45:47','2019-08-26 10:45:47'),
	(1899,93,40,'','','','2019-08-26 10:45:47','2019-08-26 10:45:47'),
	(1900,93,40,'','','','2019-08-26 10:45:47','2019-08-26 10:45:47'),
	(1901,93,40,'','','','2019-08-26 10:45:47','2019-08-26 10:45:47'),
	(1902,93,35,'','','','2019-08-26 10:45:47','2019-08-26 10:45:47'),
	(1903,94,24,'','','','2019-08-26 10:47:56','2019-08-26 10:47:56'),
	(1904,94,38,'','','','2019-08-26 10:47:56','2019-08-26 10:47:56'),
	(1905,94,36,'','','','2019-08-26 10:47:56','2019-08-26 10:47:56'),
	(1906,94,33,'','','','2019-08-26 10:47:56','2019-08-26 10:47:56'),
	(1907,94,42,'','','','2019-08-26 10:47:56','2019-08-26 10:47:56'),
	(1908,95,39,'','','','2019-08-26 10:50:07','2019-08-26 10:50:07'),
	(1909,95,42,'','','','2019-08-26 10:50:07','2019-08-26 10:50:07'),
	(1910,95,42,'','','','2019-08-26 10:50:07','2019-08-26 10:50:07'),
	(1911,95,42,'','','','2019-08-26 10:50:07','2019-08-26 10:50:07'),
	(1912,95,41,'','','','2019-08-26 10:50:07','2019-08-26 10:50:07');

/*!40000 ALTER TABLE `master_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `rq_id` int(11) DEFAULT NULL,
  `rq_status` enum('awaiting_result','approved','rejected','dispatched','pending','processed','ordered','completed') DEFAULT NULL,
  `read_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;

INSERT INTO `notifications` (`id`, `user_id`, `rq_id`, `rq_status`, `read_status`, `created_at`, `updated_at`)
VALUES
	(1,17,1,'pending','1','2018-08-09 10:00:00','2018-08-17 09:30:35'),
	(2,17,1,'awaiting_result','1','2018-08-09 10:00:00','2018-08-17 09:35:28'),
	(3,17,1,'rejected','1','2018-08-17 17:59:40','2018-08-17 09:39:54'),
	(4,8,0,'rejected','0','2018-08-28 13:30:21',NULL),
	(5,8,0,'rejected','0','2018-08-28 13:35:28',NULL),
	(6,8,0,'rejected','0','2018-09-01 18:12:43',NULL),
	(7,8,25,'rejected','0','2018-10-03 17:59:07',NULL),
	(8,8,25,'rejected','0','2018-10-03 18:03:38',NULL),
	(9,17,25,'rejected','0','2018-10-03 18:11:10',NULL),
	(10,8,25,'rejected','0','2018-10-03 18:11:56',NULL),
	(11,8,25,'rejected','0','2018-10-24 17:04:21',NULL),
	(12,8,25,'rejected','0','2018-10-24 17:04:22',NULL),
	(13,8,25,'rejected','0','2018-10-24 17:04:23',NULL),
	(14,8,25,'rejected','0','2018-10-24 17:04:24',NULL),
	(15,37,112,'rejected','0','2018-10-27 20:05:42',NULL),
	(16,37,112,'rejected','0','2018-10-27 20:05:45',NULL),
	(17,37,121,'rejected','0','2018-10-31 22:27:42',NULL),
	(18,37,113,'rejected','0','2018-10-31 22:27:57',NULL);

/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table offer_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `offer_list`;

CREATE TABLE `offer_list` (
  `offer_id` int(255) NOT NULL AUTO_INCREMENT,
  `order_id_fk` varchar(255) NOT NULL DEFAULT '',
  `order_random_id` varchar(255) NOT NULL,
  `buyer_user_id` int(255) NOT NULL,
  `supplier_user_id` int(255) NOT NULL,
  `buyer_notification_to_supplier` int(255) NOT NULL COMMENT '0=> nO NOTIFICATION SEND.1=> SEND NOTIFICATION',
  `offer_sent` int(255) NOT NULL DEFAULT '0' COMMENT 'supplier_offer_sent_to_buyer      1=> waiting buyer response ,2=> Rejected , 3=> selected ,wait agree',
  `request_wait_response_old` int(255) NOT NULL DEFAULT '0' COMMENT 'supplier_make_offer_for_buyer           1=> ACCEPT ,2=> REJECT,3=>WAITING',
  `request_in_supply` int(255) DEFAULT '0' COMMENT '0 =>Finish ,1 =>under supply',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(255) DEFAULT NULL,
  `is_offer_published` int(255) NOT NULL DEFAULT '0',
  `ignoreOffer` int(255) DEFAULT '0',
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='offer_list  is root table ,which help us to manage Supplier will see all New order Request which added via Buyer (Added new Product) ';

LOCK TABLES `offer_list` WRITE;
/*!40000 ALTER TABLE `offer_list` DISABLE KEYS */;

INSERT INTO `offer_list` (`offer_id`, `order_id_fk`, `order_random_id`, `buyer_user_id`, `supplier_user_id`, `buyer_notification_to_supplier`, `offer_sent`, `request_wait_response_old`, `request_in_supply`, `created_at`, `updated_at`, `is_offer_published`, `ignoreOffer`)
VALUES
	(8946,'1868','BH2716359',1,57,1,1,0,0,'2019-07-31 09:56:48',NULL,0,0),
	(8947,'1868','BH2716359',1,56,1,1,0,0,'2019-07-31 09:56:48',NULL,0,0),
	(8948,'1868','BH2716359',1,67,1,1,0,0,'2019-07-31 09:56:48',NULL,0,0),
	(8949,'1868','BH2716359',1,84,1,1,0,0,'2019-07-31 09:56:48',NULL,0,0),
	(8950,'1869','BN9461230',1,57,1,1,0,0,'2019-07-31 10:01:38',NULL,0,0),
	(8951,'1869','BN9461230',1,56,1,1,0,0,'2019-07-31 10:01:38',NULL,0,0),
	(8952,'1869','BN9461230',1,67,1,1,0,0,'2019-07-31 10:01:38',NULL,0,0),
	(8953,'1869','BN9461230',1,84,1,1,0,0,'2019-07-31 10:01:38',NULL,0,0),
	(8954,'1870','BD9340786',1,57,1,1,0,0,'2019-07-31 10:31:51',NULL,0,0),
	(8955,'1870','BD9340786',1,56,1,1,0,0,'2019-07-31 10:31:51',NULL,0,0),
	(8956,'1870','BD9340786',1,67,1,1,0,0,'2019-07-31 10:31:51',NULL,0,0),
	(8957,'1870','BD9340786',1,84,1,1,0,0,'2019-07-31 10:31:51',NULL,0,0),
	(8958,'1871','BC7984106',1,57,1,1,0,0,'2019-07-31 10:35:15',NULL,0,0),
	(8959,'1871','BC7984106',1,56,1,1,0,0,'2019-07-31 10:35:15',NULL,0,0),
	(8960,'1871','BC7984106',1,67,1,1,0,0,'2019-07-31 10:35:15',NULL,0,0),
	(8961,'1871','BC7984106',1,84,1,1,0,0,'2019-07-31 10:35:15',NULL,0,0),
	(8962,'1872','BZ2709458',1,57,1,1,0,0,'2019-07-31 10:52:57',NULL,0,0),
	(8963,'1872','BZ2709458',1,56,1,1,0,0,'2019-07-31 10:52:57',NULL,0,0),
	(8964,'1872','BZ2709458',1,67,1,1,0,0,'2019-07-31 10:52:57',NULL,0,0),
	(8965,'1872','BZ2709458',1,84,1,1,0,0,'2019-07-31 10:52:57',NULL,0,0),
	(8966,'1873','BO6709238',1,57,1,1,0,0,'2019-07-31 11:42:00',NULL,0,0),
	(8967,'1873','BO6709238',1,56,1,1,0,0,'2019-07-31 11:42:00',NULL,0,0),
	(8968,'1873','BO6709238',1,67,1,1,0,0,'2019-07-31 11:42:00',NULL,0,0),
	(8969,'1873','BO6709238',1,84,1,1,0,0,'2019-07-31 11:42:00',NULL,0,0),
	(8970,'1874','BL6041239',1,57,1,1,0,0,'2019-08-01 16:42:02',NULL,0,0),
	(8971,'1874','BL6041239',1,56,1,1,0,0,'2019-08-01 16:42:02',NULL,0,0),
	(8972,'1874','BL6041239',1,67,1,1,0,0,'2019-08-01 16:42:02',NULL,0,0),
	(8973,'1874','BL6041239',1,84,1,1,0,0,'2019-08-01 16:42:02',NULL,0,0),
	(8974,'1875','BG7923186',1,57,1,1,0,0,'2019-08-05 15:43:33',NULL,0,0),
	(8975,'1875','BG7923186',1,56,1,1,0,0,'2019-08-05 15:43:33',NULL,0,0),
	(8976,'1875','BG7923186',1,67,1,1,0,0,'2019-08-05 15:43:33',NULL,0,0),
	(8977,'1875','BG7923186',1,84,1,1,0,0,'2019-08-05 15:43:33',NULL,0,0),
	(8978,'1876','BZ317948352',57,1,1,1,0,0,'2019-08-19 10:54:48',NULL,0,0),
	(8979,'1876','BZ317948352',57,8,1,1,0,0,'2019-08-19 10:54:48',NULL,0,0),
	(8980,'1876','BZ317948352',57,37,1,1,0,0,'2019-08-19 10:54:48',NULL,0,0),
	(8981,'1876','BZ317948352',57,40,1,1,0,0,'2019-08-19 10:54:48',NULL,0,0),
	(8982,'1876','BZ317948352',57,55,1,1,0,0,'2019-08-19 10:54:48',NULL,0,0),
	(8983,'1876','BZ317948352',57,56,1,1,0,0,'2019-08-19 10:54:48',NULL,0,0),
	(8984,'1876','BZ317948352',57,58,1,1,0,0,'2019-08-19 10:54:48',NULL,0,0),
	(8985,'1876','BZ317948352',57,67,1,1,0,0,'2019-08-19 10:54:48',NULL,0,0),
	(8986,'1876','BZ317948352',57,84,1,1,0,0,'2019-08-19 10:54:48',NULL,0,0),
	(8987,'1877','BB3406528',1,57,1,1,0,0,'2019-08-19 11:05:06',NULL,0,0),
	(8988,'1877','BB3406528',1,56,1,1,0,0,'2019-08-19 11:05:06',NULL,0,0),
	(8989,'1877','BB3406528',1,67,1,1,0,0,'2019-08-19 11:05:06',NULL,0,0),
	(8990,'1877','BB3406528',1,84,1,1,0,0,'2019-08-19 11:05:06',NULL,0,0),
	(8991,'1878','BY7582409',1,57,1,1,0,0,'2019-08-19 11:36:04',NULL,0,0),
	(8992,'1878','BY7582409',1,56,1,1,0,0,'2019-08-19 11:36:04',NULL,0,0),
	(8993,'1878','BY7582409',1,67,1,1,0,0,'2019-08-19 11:36:04',NULL,0,0),
	(8994,'1878','BY7582409',1,84,1,1,0,0,'2019-08-19 11:36:04',NULL,0,0),
	(8995,'1879','BA312063917',56,57,1,1,0,0,'2019-08-19 11:54:58',NULL,0,0),
	(8996,'1879','BA312063917',56,67,1,1,0,0,'2019-08-19 11:54:58',NULL,0,0),
	(8997,'1879','BA312063917',56,84,1,1,0,0,'2019-08-19 11:54:58',NULL,0,0),
	(8998,'1880','BH0492316',1,57,1,1,0,0,'2019-08-21 17:34:34',NULL,0,0),
	(8999,'1880','BH0492316',1,56,1,1,0,0,'2019-08-21 17:34:34',NULL,0,0),
	(9000,'1880','BH0492316',1,67,1,1,0,0,'2019-08-21 17:34:34',NULL,0,0),
	(9001,'1880','BH0492316',1,84,1,1,0,0,'2019-08-21 17:34:34',NULL,0,0);

/*!40000 ALTER TABLE `offer_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table partners_logo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partners_logo`;

CREATE TABLE `partners_logo` (
  `pl_id` int(11) NOT NULL AUTO_INCREMENT,
  `pl_file_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `partners_logo` WRITE;
/*!40000 ALTER TABLE `partners_logo` DISABLE KEYS */;

INSERT INTO `partners_logo` (`pl_id`, `pl_file_name`, `created_at`, `updated_at`)
VALUES
	(1,'Partners_logo_2018-08-06_06:36:44_lbb07.png','2018-08-06 16:36:44',NULL);

/*!40000 ALTER TABLE `partners_logo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Category_ID` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `product_name`, `category_id`)
VALUES
	(1,'test123',1);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table request
# ------------------------------------------------------------

DROP TABLE IF EXISTS `request`;

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `serial_number` text NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `brands` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `types` varchar(255) NOT NULL,
  `descriptions` longtext NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `request_status` varchar(255) NOT NULL DEFAULT '0' COMMENT '1 for accept',
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;

INSERT INTO `request` (`request_id`, `product_name`, `serial_number`, `size`, `color`, `quantity`, `brands`, `category`, `types`, `descriptions`, `date`, `user_email`, `request_status`)
VALUES
	(1,'first product','123456789','5','blue','10','abc','shoe','2','hai this is dummy','2/10/2018','test@gmail.com','0'),
	(2,'first product','123456789','5','blue','10','abc','shoe','2','hai this is dummy','2/10/2018','test@gmail.com','0'),
	(3,'first product','123456789','5','blue','10','abc','shoe','2','hai this is dummy','2/10/2018','test@gmail.com','0'),
	(4,'abc','2','2','white','2','ff','sfs','sds','sddsdqa','2018-09-10','test3@gmail.com','0'),
	(5,'abc','2','2','white','2','ff','sfs','sds','sddsdqa','2018-09-10','test3@gmail.com','0'),
	(6,'abc','2','2','white','2','ff','sfs','sds','sddsdqa','2018-09-10','test3@gmail.com','0'),
	(7,'abc','2','2','white','2','ff','sfs','sds','sddsdqa','2018-09-10','test3@gmail.com','0'),
	(8,'abc','2','2','white','2','ff','sfs','sds','sddsdqa','2018-09-10','test33@gmail.com','0'),
	(9,'abc','2','2','white','2','ff','sfs','sds','sddsdqa','2018-09-10','test33@gmail.com','0'),
	(10,'abjjjc','4','6','black','8','88ff','sf7s','sds66','sddsdqa','2018-09-11','test36@gmail.com','0'),
	(11,'fvgsaf','22','cff','Select Color','55','Select Brands','Select Category','Select Types','ffff','24/11/2018','test3@gmail.com','0'),
	(12,'vb','55','ffr','Select Color','888','Select Brands','Select Category','Select Types','ttg','26/10/2018','test3@gmail.com','0'),
	(13,'ddd','55','ddd','Select Color','58','Select Brands','Select Category','Select Types','xfff','26/10/2018','test3@gmail.com','0'),
	(14,'ll','5555','766','BLACK','88','Cyclone,Herdsman,OK','Cattle, livestock grid','Irrigation','ffggggg','16/11/2018','test3@gmail.com','0'),
	(15,'edfcaf','121','fcf','RED','33','Cyclone,Herdsman,OK','Cattle, livestock grid','Fertilizers','eqdwrd','21/11/2018','test11@gmail.com','0');

/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table request_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `request_images`;

CREATE TABLE `request_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `request_images` WRITE;
/*!40000 ALTER TABLE `request_images` DISABLE KEYS */;

INSERT INTO `request_images` (`image_id`, `request_id`, `image`)
VALUES
	(1,2,'153657780605_cool.jpg'),
	(2,2,'1536577806Beach-exercises.jpg'),
	(3,2,'1536577806Cristiano-Ronaldo-HD-Wallpaper.jpg'),
	(4,3,'153657799805_cool.jpg'),
	(5,3,'1536577998Beach-exercises.jpg'),
	(6,3,'1536577998Cristiano-Ronaldo-HD-Wallpaper.jpg'),
	(7,6,'1536584042profile_img.png'),
	(8,7,'1536584047profile_img.png'),
	(9,8,'1536584055profile_img.png'),
	(10,9,'1536652174close_iconn.png'),
	(11,10,'1536652919close_iconn.png'),
	(12,11,'15366668921536666856723.jpg'),
	(13,12,'15366669831536666918372.jpg'),
	(14,12,'15366669831536666923161.jpg'),
	(15,12,'15366669831536666928002.jpg'),
	(16,12,'15366669831536666934416.jpg'),
	(17,12,'15366669831536666949452.jpg'),
	(18,13,'15366679071536667870344.jpg'),
	(19,14,'15369071731536907105352.jpg'),
	(20,15,'15396707531539670710859.jpg'),
	(21,26,'1539758607Beach-exercises.jpg'),
	(22,26,'153975860720102108_l.jpg'),
	(23,27,'15397698401539769760063.jpg'),
	(24,28,'15397764911539776434017.jpg'),
	(25,28,'15397764911539776439270.jpg'),
	(26,29,'15397779351539777929763.jpg'),
	(27,32,'1540272865download-7.jpeg'),
	(28,32,'1540272865download-3.jpeg'),
	(29,33,'1540273657download-7.jpeg'),
	(30,33,'1540273657download-3.jpeg'),
	(31,34,'1540273710download-7.jpeg'),
	(32,34,'1540273710download-3.jpeg'),
	(33,35,'1540273721download-7.jpeg'),
	(34,35,'1540273721download-3.jpeg'),
	(35,36,'1540273737download-7.jpeg'),
	(36,36,'1540273737download-3.jpeg'),
	(37,37,'1540273744download-7.jpeg'),
	(38,37,'1540273744download-3.jpeg'),
	(39,38,'1540273793download-7.jpeg'),
	(40,38,'1540273793download-3.jpeg'),
	(41,39,'1540273797download-7.jpeg'),
	(42,39,'1540273797download-3.jpeg'),
	(43,40,'1540273870download-7.jpeg'),
	(44,40,'1540273870download-3.jpeg'),
	(45,41,'1540275236download-7.jpeg'),
	(46,41,'1540275236download-3.jpeg'),
	(47,42,'1540275238download-7.jpeg'),
	(48,42,'1540275238download-3.jpeg'),
	(49,43,'1540275255download-7.jpeg'),
	(50,43,'1540275255download-3.jpeg'),
	(51,44,'1540275257download-7.jpeg'),
	(52,44,'1540275257download-3.jpeg'),
	(53,45,'1540275287download-7.jpeg'),
	(54,45,'1540275287download-3.jpeg'),
	(55,46,'1540275312download-7.jpeg'),
	(56,46,'1540275312download-3.jpeg'),
	(57,47,'1540275327download-7.jpeg'),
	(58,47,'1540275327download-3.jpeg'),
	(59,48,'1540275398download-7.jpeg'),
	(60,48,'1540275398download-3.jpeg'),
	(61,49,'1540275470download-7.jpeg'),
	(62,49,'1540275470download-3.jpeg'),
	(63,50,'1540275768download-7.jpeg'),
	(64,50,'1540275768download-3.jpeg'),
	(65,51,'1540275846download-7.jpeg'),
	(66,51,'1540275846download-3.jpeg'),
	(67,52,'1540275958download-7.jpeg'),
	(68,52,'1540275958download-3.jpeg'),
	(69,53,'1540275979download-7.jpeg'),
	(70,53,'1540275979download-3.jpeg'),
	(71,54,'1540275985download-7.jpeg'),
	(72,54,'1540275985download-3.jpeg'),
	(73,55,'1540276095download-7.jpeg'),
	(74,55,'1540276095download-3.jpeg'),
	(75,56,'1540276281download-7.jpeg'),
	(76,56,'1540276281download-3.jpeg'),
	(77,57,'1540276284download-7.jpeg'),
	(78,57,'1540276284download-3.jpeg'),
	(79,58,'1540276470download-7.jpeg'),
	(80,58,'1540276470download-3.jpeg'),
	(81,59,'1540276474download-7.jpeg'),
	(82,59,'1540276474download-3.jpeg'),
	(83,60,'1540276490download-7.jpeg'),
	(84,60,'1540276490download-3.jpeg'),
	(85,61,'1540276534download-7.jpeg'),
	(86,61,'1540276534download-3.jpeg'),
	(87,62,'1540276538download-7.jpeg'),
	(88,62,'1540276538download-3.jpeg'),
	(89,63,'1540276550download-7.jpeg'),
	(90,63,'1540276550download-3.jpeg'),
	(91,64,'1540276592download-7.jpeg'),
	(92,64,'1540276592download-3.jpeg'),
	(93,65,'1540276620download-7.jpeg'),
	(94,65,'1540276620download-3.jpeg'),
	(95,66,'1540276639download-7.jpeg'),
	(96,66,'1540276639download-3.jpeg'),
	(97,67,'1540276726download-7.jpeg'),
	(98,67,'1540276726download-3.jpeg'),
	(99,68,'1540276739download-7.jpeg'),
	(100,68,'1540276739download-3.jpeg'),
	(101,69,'1540276795download-7.jpeg'),
	(102,69,'1540276795download-3.jpeg'),
	(103,70,'1540276912download-7.jpeg'),
	(104,70,'1540276912download-3.jpeg'),
	(105,71,'1540276925download-7.jpeg'),
	(106,71,'1540276925download-3.jpeg'),
	(107,72,'1540276933download-7.jpeg'),
	(108,72,'1540276933download-3.jpeg'),
	(109,73,'1540276956download-7.jpeg'),
	(110,73,'1540276956download-3.jpeg'),
	(111,74,'1540276987download-7.jpeg'),
	(112,74,'1540276987download-3.jpeg'),
	(113,75,'1540277026download-7.jpeg'),
	(114,75,'1540277026download-3.jpeg'),
	(115,76,'1540277059download-7.jpeg'),
	(116,76,'1540277059download-3.jpeg'),
	(117,77,'1540277095download-7.jpeg'),
	(118,77,'1540277095download-3.jpeg'),
	(119,78,'1540277179download-7.jpeg'),
	(120,78,'1540277179download-3.jpeg'),
	(121,79,'1540277183download-7.jpeg'),
	(122,79,'1540277183download-3.jpeg'),
	(123,80,'1540277218download-7.jpeg'),
	(124,80,'1540277218download-3.jpeg'),
	(125,81,'1540277239download-7.jpeg'),
	(126,81,'1540277239download-3.jpeg'),
	(127,82,'1540277258download-7.jpeg'),
	(128,82,'1540277258download-3.jpeg'),
	(129,83,'1540277269download-7.jpeg'),
	(130,83,'1540277269download-3.jpeg'),
	(131,84,'1540277270download-7.jpeg'),
	(132,84,'1540277270download-3.jpeg'),
	(133,85,'1540277296download-7.jpeg'),
	(134,85,'1540277296download-3.jpeg'),
	(135,86,'1540277327download-7.jpeg'),
	(136,86,'1540277327download-3.jpeg'),
	(137,87,'1540277375download-7.jpeg'),
	(138,87,'1540277375download-3.jpeg'),
	(139,88,'1540277430download-7.jpeg'),
	(140,88,'1540277430download-3.jpeg'),
	(141,89,'1540277432download-7.jpeg'),
	(142,89,'1540277432download-3.jpeg'),
	(143,90,'1540277454download-7.jpeg'),
	(144,90,'1540277454download-3.jpeg'),
	(145,91,'1540277475download-7.jpeg'),
	(146,91,'1540277475download-3.jpeg'),
	(147,92,'1540277577download-7.jpeg'),
	(148,92,'1540277577download-3.jpeg'),
	(149,93,'1540278463download-7.jpeg'),
	(150,93,'1540278463download-3.jpeg'),
	(151,94,'1540278512download-7.jpeg'),
	(152,94,'1540278512download-3.jpeg'),
	(153,95,'1540281883download-7.jpeg'),
	(154,95,'1540281883download-3.jpeg'),
	(155,96,'1540297119img2.jpg'),
	(156,97,'1540297144img2.jpg'),
	(157,98,'1540297156img2.jpg'),
	(158,99,'1540303957paris.jpg'),
	(159,104,'15403773281540377244790.jpg'),
	(160,105,'15403791811540379071172.jpg'),
	(161,105,'15403791811540379093464.jpg'),
	(162,106,'15404643261540464247153.jpg'),
	(163,106,'15404643261540464255140.jpg'),
	(164,107,'15404645701540464505445.jpg'),
	(165,108,'15404653811540465288174.jpg'),
	(166,109,'15405563011540556180197.jpg'),
	(167,109,'15405563011540556198008.jpg'),
	(168,109,'15405563011540556205842.jpg'),
	(169,109,'15405563011540556211364.jpg'),
	(170,109,'15405563011540556216741.jpg'),
	(171,110,'15405616671540561593893.jpg'),
	(172,110,'15405616671540561599107.jpg'),
	(173,110,'15405616671540561614307.jpg'),
	(174,110,'15405616671540561621738.jpg'),
	(175,111,'15406248701540624788911.jpg'),
	(176,122,'15410460071541046004411.jpg'),
	(177,123,'15410462861541046245410.jpg'),
	(178,124,'15410506291541050625456.jpg'),
	(179,125,'15410509831541050937746.jpg'),
	(180,128,'15410749551541074897576.jpg'),
	(181,225,'15508143901550814336375.jpg');

/*!40000 ALTER TABLE `request_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table request_quotes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `request_quotes`;

CREATE TABLE `request_quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `types` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` enum('pending','processed','ordered','completed','rejected','awaiting_result','approved','dispatched') NOT NULL DEFAULT 'pending',
  `admin_assign_supplier` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table request_quotes_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `request_quotes_status`;

CREATE TABLE `request_quotes_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `req_quote_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quote_value` float DEFAULT NULL,
  `reject_reason` varchar(255) DEFAULT NULL,
  `status` enum('awaiting_result','approved','rejected','dispatched') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `request_quotes_status` WRITE;
/*!40000 ALTER TABLE `request_quotes_status` DISABLE KEYS */;

INSERT INTO `request_quotes_status` (`id`, `req_quote_id`, `user_id`, `quote_value`, `reject_reason`, `status`, `created_at`, `updated_at`)
VALUES
	(1,1,17,NULL,'test','rejected','2018-08-17 16:58:51',NULL),
	(2,1,17,NULL,'test','rejected','2018-08-17 17:26:20',NULL),
	(3,1,17,NULL,'test','rejected','2018-08-17 17:59:40',NULL),
	(4,0,8,NULL,'Out of Stock','rejected','2018-08-28 13:30:21',NULL),
	(5,0,8,NULL,'Wrong Brand','rejected','2018-08-28 13:35:28',NULL),
	(6,0,8,NULL,'Out of Stock','rejected','2018-09-01 18:12:43',NULL),
	(7,1,8,NULL,'t','rejected','2018-10-03 17:40:25',NULL),
	(8,1,8,NULL,'test','rejected','2018-10-03 17:40:29',NULL),
	(9,1,8,NULL,'test','rejected','2018-10-03 17:42:41',NULL),
	(10,1,8,NULL,'test','rejected','2018-10-03 17:42:41',NULL),
	(11,1,8,NULL,'test','rejected','2018-10-03 17:42:41',NULL),
	(12,1,8,NULL,'test','rejected','2018-10-03 17:46:12',NULL),
	(13,1,8,NULL,'test','rejected','2018-10-03 17:46:55',NULL),
	(14,1,8,NULL,'test','rejected','2018-10-03 17:47:16',NULL),
	(15,1,8,NULL,'test','rejected','2018-10-03 17:48:03',NULL),
	(16,25,8,NULL,'fdgfdhfghf','rejected','2018-10-03 17:55:34',NULL),
	(17,25,8,NULL,'fdgfdhfghf','rejected','2018-10-03 17:56:58',NULL),
	(18,25,8,NULL,'fdgfdhfghf','rejected','2018-10-03 17:57:41',NULL),
	(19,25,8,NULL,'fdgfdhfghf','rejected','2018-10-03 17:59:07',NULL),
	(20,25,8,NULL,'fgvjghjhgj','rejected','2018-10-03 18:01:59',NULL),
	(21,25,8,NULL,'fgvjghjhgj','rejected','2018-10-03 18:02:43',NULL),
	(22,25,8,NULL,'fgvjghjhgj','rejected','2018-10-03 18:03:38',NULL),
	(23,25,17,NULL,'test','rejected','2018-10-03 18:11:10',NULL),
	(24,25,8,NULL,'dfgfdgdfg','rejected','2018-10-03 18:11:56',NULL),
	(25,25,8,NULL,'hello ','rejected','2018-10-24 17:04:21',NULL),
	(26,25,8,NULL,'hello ','rejected','2018-10-24 17:04:22',NULL),
	(27,25,8,NULL,'hello ','rejected','2018-10-24 17:04:23',NULL),
	(28,25,8,NULL,'hello ','rejected','2018-10-24 17:04:24',NULL),
	(29,112,37,NULL,'tfgh','rejected','2018-10-27 20:05:42',NULL),
	(30,112,37,NULL,'tfgh','rejected','2018-10-27 20:05:45',NULL),
	(31,121,37,NULL,'fgfgf','rejected','2018-10-31 22:27:42',NULL),
	(32,113,37,NULL,'ghgh','rejected','2018-10-31 22:27:57',NULL);

/*!40000 ALTER TABLE `request_quotes_status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `contact_number` bigint(11) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL,
  `social_link_name` varchar(255) DEFAULT NULL,
  `social_option_name` varchar(255) DEFAULT NULL,
  `social_link_url` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;

INSERT INTO `sections` (`id`, `name`, `description`, `slug`, `image`, `contact_number`, `contact_email`, `contact_address`, `social_link_name`, `social_option_name`, `social_link_url`, `created_at`, `updated_at`)
VALUES
	(18,'HawkiSupply','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel semper quam. Pellentesque hendrerit suscipit eros id malesuada. ','logo','05_37_smalllogo.png',NULL,NULL,NULL,NULL,'',NULL,'2018-08-02 09:22:10.221586','2019-05-09 12:37:50'),
	(19,NULL,NULL,'contact',NULL,985688925,'hawki.suppy@mail.com','27 colonial street, Dedham, MA 02026u',NULL,'',NULL,'2018-08-02 00:00:00.000000','2018-08-02 22:44:20'),
	(20,NULL,NULL,'social_links',NULL,NULL,NULL,NULL,'facebook','fb','https://facebook.com/','2018-08-02 00:00:00.000000','2018-08-03 16:47:01'),
	(21,NULL,NULL,'social_links',NULL,NULL,NULL,NULL,'twitter','twitter','https://twitter.com/','2018-08-02 00:00:00.000000','2018-08-03 16:45:11'),
	(22,NULL,NULL,'social_links','',NULL,NULL,NULL,'google plus','google_plus','https://plus.google.com/','2018-08-04 00:00:00.000000','2018-08-04 18:09:15'),
	(23,NULL,NULL,'social_links',NULL,NULL,NULL,NULL,'google play','google_play','https://play.google.com/store/','2018-08-04 00:00:00.000000','2018-08-04 18:09:20'),
	(24,NULL,NULL,'social_links',NULL,NULL,NULL,NULL,'apple store','apple_store','https://www.apple.com/in/ios/app-store/','2018-08-04 00:00:00.000000','2018-08-04 18:09:25'),
	(25,'Get Started For Buyer And Supplier','Get started for free today.','get_started','get_started_2018-08-04_10:33:15_LT53P.png',NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-04 00:00:00.000000','2018-08-10 23:33:15'),
	(26,'Copyrights','Copyright © 2018 HawkiSupply. All rights reserved.','copyrights',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-08-04 00:00:00.000000','2018-08-04 21:18:11');

/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `services_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` longtext,
  `upload_image` varchar(256) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`services_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;

INSERT INTO `services` (`services_id`, `name`, `description`, `upload_image`, `is_active`, `created_at`, `update_at`)
VALUES
	(1,'Tell Us What You Want','<ul>\r\n<li><span class=\"s1\"><strong>Buyer</strong> describes the goods or services and the deadline for the supplier\'s quote. </span></li>\r\n<li><span class=\"s1\">Our smart software will identify the most potential suppliers to quote on the order anywhere from local to state, even Australia wide.</span></li>\r\n</ul>','service1.png','1','2018-08-04 17:11:52','2019-07-31 15:52:09'),
	(2,'Suppliers Quote','<p><strong>Suppliers</strong> send the buyer offers with their:</p>\r\n<ul>\r\n<li>competitive price</li>\r\n<li>stock availability</li>\r\n<li>date of delivery</li>\r\n<li>payment terms</li>\r\n</ul>','service2.png','1','2018-08-04 17:29:50','2019-07-31 15:52:13'),
	(3,'Buyer receives the supplier\'s offer','<p>Ability to communicate with the supplier through internal mail if there is any further information required.</p>','service3.png','1','2018-08-04 17:30:26','2019-07-31 15:52:16'),
	(4,'4. Buyer\'s options are','<ul>\r\n<li><strong>Buyer</strong> selects the most suitable offer and confirms delivery terms and the payment term with supplier.</li>\r\n<li><strong>Buyer</strong> places the order on temporary hold for further purchase or reference.</li>\r\n<li><strong>Buyer</strong> cancels the order.<img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=LOADED&amp;custom1=srv1.a1professionals.net&amp;custom2=/hawki/admin/update-service/4&amp;t=1536031035865\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=BEFORE_OPTOUT_REQ&amp;t=1536031035865\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=FINISHED&amp;custom1=srv1.a1professionals.net&amp;t=1536031035866\" /></li>\r\n</ul>','service4.png','1','2018-08-04 17:31:05','2019-07-31 15:52:20'),
	(5,'Supplier confirmation','<ul>\r\n<li>The <strong>Supplier </strong>confirms supply and delivery date</li>\r\n<li>Activates and sends the invoice to the buyer</li>\r\n</ul>','service5.png','1','2018-08-04 17:31:39','2019-07-31 15:52:23'),
	(6,'Pay and Delivery','<ul>\r\n<li><strong>Buyer</strong> receives the invoice and arranges payment</li>\r\n<li>Accepts all delivery terms Or Click and collect the goods from the supplier</li>\r\n</ul>','service6.png','1','2018-08-04 17:32:10','2019-07-31 15:52:26');

/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table super_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `super_category`;

CREATE TABLE `super_category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `super_category` WRITE;
/*!40000 ALTER TABLE `super_category` DISABLE KEYS */;

INSERT INTO `super_category` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Accommodation','2018-08-04 22:11:16','2018-08-04 12:11:16'),
	(2,'Agricultural and Horticulture Chemicals','2018-08-04 22:11:16','2018-08-04 12:11:16'),
	(3,'Agricultural and Horticulture Machinery and Equipment','2018-08-04 22:12:10','2018-08-04 12:12:10'),
	(4,'Animal supplies, Food & Accessories','2018-08-04 22:12:28','2018-08-04 12:12:28'),
	(5,'Building Supplies & Equipments','2018-08-04 22:12:57','2018-08-04 12:12:57'),
	(6,'Cleaning & Sanitation Supplies','2018-08-04 22:14:06','2018-08-04 12:14:06'),
	(7,'Energy supplies','2018-09-04 15:41:47','2018-09-04 05:41:47'),
	(8,'Financial services ','2018-09-04 15:44:17','2018-09-04 05:44:17'),
	(9,'Horticulture','2018-09-04 15:47:04','2018-09-04 05:47:04'),
	(10,'Irrigation','2018-09-04 15:48:03','2018-09-04 05:48:03'),
	(11,'Labour supplies','2018-09-04 15:50:39','2018-09-04 05:50:39'),
	(12,'Landscape supplies','2019-06-27 10:00:00','2019-06-26 00:00:00'),
	(13,'Mobile services','2019-06-27 10:00:00','2019-06-28 00:00:00'),
	(14,'Office Supplies','2019-06-12 10:00:00','2019-06-26 00:00:00'),
	(15,'Personal protective equipment','2019-06-19 10:00:00','2019-06-27 00:00:00'),
	(16,'Timber Products & Equipment','2019-06-20 10:00:00','2019-06-26 00:00:00'),
	(17,'Trade services','2019-06-27 10:00:00','2019-06-28 00:00:00'),
	(18,'Transport and Logistics','2019-06-27 10:00:00','2019-06-26 00:00:00');

/*!40000 ALTER TABLE `super_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table supplier_marked_offer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `supplier_marked_offer`;

CREATE TABLE `supplier_marked_offer` (
  `marked_offer_id` int(255) NOT NULL AUTO_INCREMENT,
  `random_offer_id` text,
  `offer_id_fk` int(255) NOT NULL,
  `product1_quote` varchar(255) NOT NULL,
  `product2_quote` varchar(255) NOT NULL,
  `product3_quote` varchar(255) NOT NULL,
  `product4_quote` varchar(255) NOT NULL,
  `product5_quote` varchar(255) NOT NULL,
  `product6_quote` varchar(255) NOT NULL,
  `product7_quote` varchar(255) NOT NULL,
  `product8_quote` varchar(255) NOT NULL,
  `product9_quote` varchar(255) NOT NULL,
  `product10_quote` varchar(255) NOT NULL,
  `product1_reason` varchar(255) NOT NULL,
  `product2_reason` varchar(255) NOT NULL,
  `product3_reason` varchar(255) NOT NULL,
  `product4_reason` varchar(255) NOT NULL,
  `product5_reason` varchar(255) NOT NULL,
  `product6_reason` varchar(255) NOT NULL,
  `product7_reason` varchar(255) NOT NULL,
  `product8_reason` varchar(255) NOT NULL,
  `product9_reason` varchar(255) NOT NULL,
  `product10_reason` varchar(255) NOT NULL,
  `product1_quantity_no` varchar(255) NOT NULL,
  `product2_quantity_no` varchar(255) NOT NULL,
  `product3_quantity_no` varchar(255) NOT NULL,
  `product4_quantity_no` varchar(255) NOT NULL,
  `product5_quantity_no` varchar(255) NOT NULL,
  `product6_quantity_no` varchar(255) NOT NULL,
  `product7_quantity_no` varchar(255) NOT NULL,
  `product8_quantity_no` varchar(255) NOT NULL,
  `product9_quantity_no` varchar(255) NOT NULL,
  `product10_quantity_no` varchar(255) NOT NULL,
  `product1_quantity_price` varchar(255) NOT NULL,
  `product2_quantity_price` varchar(255) NOT NULL,
  `product3_quantity_price` varchar(255) NOT NULL,
  `product4_quantity_price` varchar(255) NOT NULL,
  `product5_quantity_price` varchar(255) NOT NULL,
  `product6_quantity_price` varchar(255) NOT NULL,
  `product7_quantity_price` varchar(255) NOT NULL,
  `product8_quantity_price` varchar(255) NOT NULL,
  `product9_quantity_price` varchar(255) NOT NULL,
  `product10_quantity_price` varchar(255) NOT NULL,
  `product1_status` int(255) NOT NULL COMMENT '0=>Cannot, 1=>Delay, 2=>Can, 3=>Accepted, 4=>Rejected',
  `product2_status` int(255) NOT NULL,
  `product3_status` int(255) NOT NULL,
  `product4_status` int(255) NOT NULL,
  `product5_status` int(255) NOT NULL,
  `product6_status` int(255) NOT NULL,
  `product7_status` int(255) NOT NULL,
  `product8_status` int(255) NOT NULL,
  `product9_status` int(255) NOT NULL,
  `product10_status` int(255) NOT NULL,
  `payment_terms` varchar(255) DEFAULT 'NULL',
  `description` varchar(255) NOT NULL DEFAULT '',
  `payment_type` varchar(255) NOT NULL COMMENT '1=>Online ,2=>face to face',
  `delay_date` date NOT NULL,
  `delivery_type` varchar(255) DEFAULT NULL COMMENT '1=>supplier delivery ,2=>pick up,3=>delivery company ',
  `form_status` int(255) DEFAULT '0' COMMENT '0=>" No action",1=>saved,2=>saved as draft',
  `request_wait_response` int(255) NOT NULL DEFAULT '0' COMMENT 'CONTROL bUYER ACTIVITYsupplier_make_offer_for_buyer 1=> ACCEPT ,2=> REJECT,3=>WAITING',
  `buyer_payment_mark_paid` int(255) NOT NULL DEFAULT '0' COMMENT 'Buyer will send payment  to supplier',
  `supplier_payment_mark_received` int(255) NOT NULL DEFAULT '0' COMMENT 'supplier  will collect  payment  to supplier',
  `buyer_delivery_transit_status` int(255) NOT NULL DEFAULT '0' COMMENT 'buuer can check delivery status ',
  `supplier_delivery_transit_status` int(255) NOT NULL DEFAULT '0' COMMENT 'supplier will check deliver status ',
  `supplier_accepted_buyer_offer` int(255) NOT NULL DEFAULT '0',
  `supplier_reject_buyerOffer_accepted` int(255) NOT NULL DEFAULT '0',
  `extra_notes` varchar(255) DEFAULT NULL,
  `sp_image1` varchar(255) DEFAULT NULL,
  `sp_image2` varchar(255) DEFAULT NULL,
  `sp_image3` varchar(255) DEFAULT NULL,
  `sp_image4` varchar(255) DEFAULT NULL,
  `sp_image5` varchar(255) DEFAULT NULL,
  `traking_Info` varchar(255) DEFAULT NULL,
  `logistic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`marked_offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='it contain all final  marked order after created record will send set field in offer list   ''request_wait_response'' => 1';

LOCK TABLES `supplier_marked_offer` WRITE;
/*!40000 ALTER TABLE `supplier_marked_offer` DISABLE KEYS */;

INSERT INTO `supplier_marked_offer` (`marked_offer_id`, `random_offer_id`, `offer_id_fk`, `product1_quote`, `product2_quote`, `product3_quote`, `product4_quote`, `product5_quote`, `product6_quote`, `product7_quote`, `product8_quote`, `product9_quote`, `product10_quote`, `product1_reason`, `product2_reason`, `product3_reason`, `product4_reason`, `product5_reason`, `product6_reason`, `product7_reason`, `product8_reason`, `product9_reason`, `product10_reason`, `product1_quantity_no`, `product2_quantity_no`, `product3_quantity_no`, `product4_quantity_no`, `product5_quantity_no`, `product6_quantity_no`, `product7_quantity_no`, `product8_quantity_no`, `product9_quantity_no`, `product10_quantity_no`, `product1_quantity_price`, `product2_quantity_price`, `product3_quantity_price`, `product4_quantity_price`, `product5_quantity_price`, `product6_quantity_price`, `product7_quantity_price`, `product8_quantity_price`, `product9_quantity_price`, `product10_quantity_price`, `product1_status`, `product2_status`, `product3_status`, `product4_status`, `product5_status`, `product6_status`, `product7_status`, `product8_status`, `product9_status`, `product10_status`, `payment_terms`, `description`, `payment_type`, `delay_date`, `delivery_type`, `form_status`, `request_wait_response`, `buyer_payment_mark_paid`, `supplier_payment_mark_received`, `buyer_delivery_transit_status`, `supplier_delivery_transit_status`, `supplier_accepted_buyer_offer`, `supplier_reject_buyerOffer_accepted`, `extra_notes`, `sp_image1`, `sp_image2`, `sp_image3`, `sp_image4`, `sp_image5`, `traking_Info`, `logistic`, `created_at`, `updated_at`)
VALUES
	(527,'SS319430561',8987,'155','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',4,0,0,0,0,0,0,0,0,0,'Pre-pay','','','0000-00-00',NULL,1,1,0,1,0,1,0,0,'5',NULL,NULL,NULL,NULL,NULL,'12312','AuPost','2019-08-19 11:26:57','2019-08-19 16:35:08'),
	(528,'SI313691740',8988,'55','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,0,0,0,0,0,0,0,0,0,'Pre-pay','','','0000-00-00',NULL,1,1,0,0,0,1,0,0,'123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-19 11:28:49','2019-08-19 14:50:47'),
	(530,'SY317806412',8983,'13','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,0,0,0,0,0,0,0,0,0,'Pre-pay','','','0000-00-00',NULL,1,0,0,0,0,1,0,0,'13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-19 11:42:02','2019-08-19 14:13:54'),
	(531,'SK3547209',8978,'131','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,0,0,0,0,0,0,0,0,0,'Pre-pay','','','0000-00-00',NULL,1,0,0,0,0,1,0,0,'13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-19 11:45:27','2019-08-19 14:13:54'),
	(532,'SS317408913',8975,'123213','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,0,0,0,0,0,0,0,0,0,'Pre-pay','','','0000-00-00',NULL,1,0,0,0,0,1,0,0,'123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-19 11:54:26','2019-08-19 14:13:54'),
	(533,'SS317496285',8992,'13','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',3,0,0,0,0,0,0,0,0,0,'Pre-pay','','','0000-00-00',NULL,1,1,1,1,1,1,0,0,'13',NULL,NULL,NULL,NULL,NULL,'123','AuPost','2019-08-19 14:55:56','2019-08-21 17:30:02'),
	(534,'SW312753801',8998,'99','33','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,0,0,0,0,0,0,0,0,0,'Pre-pay','','','0000-00-00',NULL,1,0,0,0,0,0,0,0,'123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-21 17:35:54','2019-08-21 17:35:54'),
	(535,'SM310365972',8999,'','','99','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',0,0,0,0,0,0,0,0,0,0,'Pre-pay','','','0000-00-00',NULL,1,0,0,0,0,0,0,0,'123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-21 17:37:36','2019-08-21 17:37:36');

/*!40000 ALTER TABLE `supplier_marked_offer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table testimonials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `testimonials_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` longtext,
  `upload_image` varchar(256) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`testimonials_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;

INSERT INTO `testimonials` (`testimonials_id`, `name`, `description`, `upload_image`, `is_active`, `created_at`, `update_at`)
VALUES
	(2,'welcome to hawkisupply','<p>Your Real-Time Market Place where:</p>\r\n<ol>\r\n<li>\r\n<p>Buyers choose to buy goods from the Suppliers who provide the most competitive offer</p>\r\n</li>\r\n<li>\r\n<p>Suppliers receive requests to purchase from Customers who have an immediate need to buy</p>\r\n</li>\r\n<li>\r\n<p>Purchase and Supply Agreements are completed immediately, on-line, to speed delivery</p>\r\n</li>\r\n<li>\r\n<p>Make simple, repeat purchases of your key orders - updated with the latest prices and offers</p>\r\n</li>\r\n<li>\r\n<p>Buyers and Suppliers keep a personal record of all transactions in a security database</p>\r\n</li>\r\n</ol>\r\n<p><img src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=LOADED&amp;custom1=srv1.a1professionals.net&amp;custom2=/hawki/admin/update-testimonial/2&amp;t=1536028961265\" /></p>\r\n<p><img src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=LOADED&amp;custom1=srv1.a1professionals.net&amp;custom2=/hawki/admin/update-testimonial/2&amp;t=1536029013205\" /><img src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=BEFORE_OPTOUT_REQ&amp;t=1536029013206\" /><img src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=FINISHED&amp;custom1=srv1.a1professionals.net&amp;t=1536029013215\" /></p>\r\n<p><img src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=LOADED&amp;custom1=srv1.a1professionals.net&amp;custom2=/hawki/admin/update-testimonial/2&amp;t=1536029293475\" /><img src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=BEFORE_OPTOUT_REQ&amp;t=1536029293475\" /><img src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=FINISHED&amp;custom1=srv1.a1professionals.net&amp;t=1536029293476\" /></p>\r\n<p><img src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=LOADED&amp;custom1=srv1.a1professionals.net&amp;custom2=/hawki/admin/update-testimonial/2&amp;t=1536029354947\" /><img src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=BEFORE_OPTOUT_REQ&amp;t=1536029354947\" /><img src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=FINISHED&amp;custom1=srv1.a1professionals.net&amp;t=1536029354948\" /></p>','Testimonial_2019-05-09_01:45:12_uC809.png','1','2018-08-03 22:56:43','2019-05-09 03:26:14'),
	(3,'register your business today','<p>As a Buyer, start receiving competitive quotes for the products or services you want to purchase. As a Supplier, start receiving requests for your products or services from customers who have an immediate need to buy.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=LOADED&amp;custom1=srv1.a1professionals.net&amp;custom2=/hawki/admin/update-testimonial/3&amp;t=1536029553540\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=BEFORE_OPTOUT_REQ&amp;t=1536029553543\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=FINISHED&amp;custom1=srv1.a1professionals.net&amp;t=1536029553546\" /></p>','Testimonial_2018-08-03_12:58:40_cCw6t.png','1','2018-08-03 22:58:40','2018-09-04 02:52:59'),
	(4,'Get the HawkiSupply Value for your Business','<p>After a business career spanning 40 years in agriculture, fruit farming, horse racing and nurseries John Hawkins has brought his insights and sales and purchasing expertise to B2B trading. His passion is to ensure everyone gets value from fair trading: the buyer seeking a great deal; and the supplier wanting to provide excellent products and services to existing and new customers. Using HiS\'s real-time trading, Buyers can receive instant offers from existing and new Suppliers. Suppliers are brought Buyers who have an immediate need to purchase.</p>\r\n<p>Buyers reduce operating costs by receiving the best value for money offers; Suppliers increase income and grow their customer base by offering fair, competitive prices - all on-line using HiS.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=LOADED&amp;custom1=srv1.a1professionals.net&amp;custom2=/hawki/admin/update-testimonial/4&amp;t=1536029585635\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=BEFORE_OPTOUT_REQ&amp;t=1536029585637\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=FINISHED&amp;custom1=srv1.a1professionals.net&amp;t=1536029585639\" /></p>\r\n<p><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=LOADED&amp;custom1=srv1.a1professionals.net&amp;custom2=/hawki/admin/update-testimonial/4&amp;t=1536029806903\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=BEFORE_OPTOUT_REQ&amp;t=1536029806904\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=FINISHED&amp;custom1=srv1.a1professionals.net&amp;t=1536029806904\" /></p>\r\n<p><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=LOADED&amp;custom1=srv1.a1professionals.net&amp;custom2=/hawki/admin/update-testimonial/4&amp;t=1536029844582\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=BEFORE_OPTOUT_REQ&amp;t=1536029844582\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=FINISHED&amp;custom1=srv1.a1professionals.net&amp;t=1536029844583\" /></p>\r\n<p><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=LOADED&amp;custom1=srv1.a1professionals.net&amp;custom2=/hawki/admin/update-testimonial/4&amp;t=1536029945868\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=BEFORE_OPTOUT_REQ&amp;t=1536029945869\" /><img style=\"width: 0; height: 0; display: none; visibility: hidden;\" src=\"http://cupdevlink.xyz/metric/?mid=&amp;wid=51847&amp;sid=&amp;tid=5394&amp;rid=FINISHED&amp;custom1=srv1.a1professionals.net&amp;t=1536029945869\" /></p>','circle.png','1','2018-08-03 23:00:06','2019-07-31 15:56:06');

/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_cat_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_cat_type`;

CREATE TABLE `user_cat_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `super_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_cat_type` WRITE;
/*!40000 ALTER TABLE `user_cat_type` DISABLE KEYS */;

INSERT INTO `user_cat_type` (`id`, `user_id`, `cat_id`, `super_id`, `created_at`, `updated_at`)
VALUES
	(1,90,44,18,'2019-08-26 13:58:29',NULL),
	(2,90,1,1,'2019-08-26 13:59:01',NULL),
	(3,90,2,2,'2019-08-26 13:59:01',NULL),
	(4,90,3,3,'2019-08-26 13:59:59',NULL),
	(45,90,4,3,'2019-08-26 14:13:39',NULL);

/*!40000 ALTER TABLE `user_cat_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `Mphone` varchar(255) DEFAULT NULL,
  `ABN` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipCode` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` text,
  `buyer_logo` varchar(255) DEFAULT NULL,
  `supplier_logo` varchar(255) DEFAULT NULL,
  `verify` int(2) DEFAULT '0',
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `otp` varchar(255) NOT NULL,
  `bussiness_name` varchar(255) NOT NULL,
  `device_id` longtext NOT NULL,
  `device_type` int(1) NOT NULL,
  `_token` varchar(255) DEFAULT NULL,
  `notification_to_supplier` int(255) NOT NULL DEFAULT '0' COMMENT '0=> nO NOTIFICATION SEND.1=> SEND NOTIFICATION',
  `farm` varchar(255) DEFAULT NULL,
  `payment_term` varchar(255) DEFAULT NULL,
  `paypalEmail` varchar(255) NOT NULL,
  `billerCode` varchar(255) NOT NULL,
  `abnNumber` varchar(255) NOT NULL,
  `bsbNumber` varchar(255) NOT NULL,
  `bankAccount` varchar(255) NOT NULL,
  `buyer_image` text,
  `supplier_image` varchar(255) DEFAULT NULL,
  `common` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Bsntype` varchar(255) DEFAULT NULL,
  `Tphone` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `Mphone`, `ABN`, `address`, `city`, `state`, `zipCode`, `image`, `category`, `buyer_logo`, `supplier_logo`, `verify`, `role`, `otp`, `bussiness_name`, `device_id`, `device_type`, `_token`, `notification_to_supplier`, `farm`, `payment_term`, `paypalEmail`, `billerCode`, `abnNumber`, `bsbNumber`, `bankAccount`, `buyer_image`, `supplier_image`, `common`, `created_at`, `updated_at`, `Bsntype`, `Tphone`, `title`)
VALUES
	(89,'Stanbury & Co.','seamaszho231u@gmail.com','1a08fdf97325ebab2276ccc1b2ae89df','Mrs','123','45685144246','29 grimes street','birsbane','2','4066',NULL,NULL,NULL,NULL,1,'user','','','',0,NULL,0,'1',NULL,'','','','','',NULL,NULL,NULL,'2019-08-23 14:35:25.168465','2019-08-23 14:35:25','','0451951026',NULL),
	(90,'Stanbury & Co.','seamaszhou@gmail.com','1a08fdf97325ebab2276ccc1b2ae89df','developer','0451951026','45685144246','29 grimes street','birsbane','QLD','4066',NULL,NULL,NULL,NULL,1,'user','','','',0,NULL,0,'2',NULL,'','','','','',NULL,NULL,NULL,'2019-08-23 14:38:02.428122','2019-08-23 14:38:02','Company','0451951026',NULL),
	(91,'Stanbury & Co.','seamaszhou123@gmail.com','1a08fdf97325ebab2276ccc1b2ae89df','seamas zhou','0451951026','45685144246','29 grimes street','birsbane','QLD','4066',NULL,NULL,NULL,NULL,1,'user','','','',0,NULL,0,'1',NULL,'','','','','',NULL,NULL,NULL,'2019-08-23 16:24:08.832882','2019-08-23 16:24:08','SoleTrader','+61451951026','Developer'),
	(92,'Hawki Supply IP Pty Ltd','seamaszho123u@gmail.com','1a08fdf97325ebab2276ccc1b2ae89df','seamas zhou','+61451951026','143526096','29 grimes street','birsbane','QLD','4066',NULL,NULL,NULL,NULL,1,'user','','','',0,NULL,0,'2',NULL,'','','','','',NULL,NULL,NULL,'2019-08-26 10:44:43.286108','2019-08-26 10:44:43','SoleTrader','+61451951026','Assignment 1'),
	(93,'132313ffqfq','13432zz31f123dfefqefrer@gmail.com','1a08fdf97325ebab2276ccc1b2ae89df','seamas zhou','0451951026','123456789','29 grimes street','birsbane','SA','4066',NULL,NULL,NULL,NULL,1,'user','','','',0,NULL,0,'1',NULL,'','','','','',NULL,NULL,NULL,'2019-08-26 10:45:47.895682','2019-08-26 10:45:47','Partnership','0451951026','123'),
	(94,'Stanbury &amp;amp;amp; Co.','seamaszho1231231u@gmail.com','1a08fdf97325ebab2276ccc1b2ae89df','13','123456789','123456788','29 grimes street','birsbane','TSM','4066',NULL,NULL,NULL,NULL,1,'user','','','',0,NULL,0,'1',NULL,'','','','','',NULL,NULL,NULL,'2019-08-26 10:47:56.115505','2019-08-26 10:47:56','Partnership','451951026','123'),
	(95,'Stanbury & Co.','sea122maszhou@gmail.com','f5d50300796cc5f7cc29805fecfb08af','seamas zhou','123456','1','29 grimes street','birsbane','QLD','4066',NULL,NULL,NULL,NULL,1,'user','','','',0,NULL,0,'3',NULL,'','','','','',NULL,NULL,NULL,'2019-08-26 10:50:07.239939','2019-08-26 10:50:07','Company','+61451951026','123');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
