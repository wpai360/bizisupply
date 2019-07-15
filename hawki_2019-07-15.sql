# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.30-MariaDB)
# Database: hawki
# Generation Time: 2019-07-15 00:53:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table buyer_orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `buyer_orders`;

CREATE TABLE `buyer_orders` (
  `order_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `order_random_id` text,
  `brand_name` varchar(255) DEFAULT NULL,
  `product_assign_category` int(255) NOT NULL COMMENT 'selected product  type category',
  `order_name` varchar(255) DEFAULT NULL,
  `order_description` varchar(255) DEFAULT 'NULL',
  `quantity` varchar(255) DEFAULT 'NULL',
  `part_number` varchar(255) DEFAULT NULL,
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
  `master_list` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `buyer_orders` WRITE;
/*!40000 ALTER TABLE `buyer_orders` DISABLE KEYS */;

INSERT INTO `buyer_orders` (`order_id`, `user_id`, `order_random_id`, `brand_name`, `product_assign_category`, `order_name`, `order_description`, `quantity`, `part_number`, `prefer_delivery_data`, `sent_number_ofSupplier_request`, `awaiting_supplie_response`, `draft`, `send_notification_to_suppliers`, `is_deleted`, `created_at`, `updated_at`, `is_Request_order_again`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `image10`, `master_list`)
VALUES
	(1778,1,'BX3674901','123',190,'123','1231','123','123','2019-07-10',9,0,0,'8,40,17,55,56,57,58,67,84',0,'2019-07-15 09:52:28','2019-07-15 09:52:28',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(1779,1,'BU9278304','123',20,'213','123','123','123','2019-07-09',9,0,0,'8,37,40,55,56,57,58,67,84',0,'2019-07-15 10:01:21','2019-07-15 10:01:21',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(1780,1,'BB4732085','123',19,'123','123','123','123','2019-07-30',9,0,0,'8,37,40,55,56,57,58,67,84',0,'2019-07-15 10:03:14','2019-07-15 10:03:14',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),
	(1781,1,'BD9432807','123',19,'123','13','13','123','2019-07-03',9,0,0,'8,37,40,55,56,57,58,67,84',0,'2019-07-15 10:15:48','2019-07-15 10:15:48',0,'1563149748.png','15631497481.png','15631497482.png','15631497483.png',NULL,NULL,NULL,'15631497484.png','15631497485.png',NULL,NULL);

/*!40000 ALTER TABLE `buyer_orders` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
