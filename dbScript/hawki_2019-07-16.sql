# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.30-MariaDB)
# Database: hawki
# Generation Time: 2019-07-16 04:45:07 +0000
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
  `product_assign_category` int(255) NOT NULL COMMENT 'selected product  type category',
  `brand_name_1` varchar(255) DEFAULT NULL,
  `order_name_1` varchar(255) DEFAULT NULL,
  `part_number_1` varchar(255) DEFAULT NULL,
  `quantity_1` varchar(255) DEFAULT 'NULL',
  `brand_name_2` varchar(255) DEFAULT NULL,
  `order_name_2` varchar(255) DEFAULT NULL,
  `part_number_2` varchar(255) DEFAULT NULL,
  `quantity_2` varchar(255) DEFAULT 'NULL',
  `brand_name_3` varchar(255) DEFAULT NULL,
  `order_name_3` varchar(255) DEFAULT NULL,
  `part_number_3` varchar(255) DEFAULT NULL,
  `quantity_3` varchar(255) DEFAULT 'NULL',
  `brand_name_4` varchar(255) DEFAULT NULL,
  `order_name_4` varchar(255) DEFAULT NULL,
  `part_number_4` varchar(255) DEFAULT NULL,
  `quantity_4` varchar(255) DEFAULT 'NULL',
  `brand_name_5` varchar(255) DEFAULT NULL,
  `order_name_5` varchar(255) DEFAULT NULL,
  `part_number_5` varchar(255) DEFAULT NULL,
  `quantity_5` varchar(255) DEFAULT 'NULL',
  `brand_name_6` varchar(255) DEFAULT NULL,
  `order_name_6` varchar(255) DEFAULT NULL,
  `part_number_6` varchar(255) DEFAULT NULL,
  `quantity_6` varchar(255) DEFAULT 'NULL',
  `brand_name_7` varchar(255) DEFAULT NULL,
  `order_name_7` varchar(255) DEFAULT NULL,
  `part_number_7` varchar(255) DEFAULT NULL,
  `quantity_7` varchar(255) DEFAULT 'NULL',
  `brand_name_8` varchar(255) DEFAULT NULL,
  `order_name_8` varchar(255) DEFAULT NULL,
  `part_number_8` varchar(255) DEFAULT NULL,
  `quantity_8` varchar(255) DEFAULT 'NULL',
  `brand_name_9` varchar(255) DEFAULT NULL,
  `order_name_9` varchar(255) DEFAULT NULL,
  `part_number_9` varchar(255) DEFAULT NULL,
  `quantity_9` varchar(255) DEFAULT 'NULL',
  `brand_name_10` varchar(255) DEFAULT NULL,
  `order_name_10` varchar(255) DEFAULT NULL,
  `part_number_10` varchar(255) DEFAULT NULL,
  `quantity_10` varchar(255) DEFAULT 'NULL',
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
  `master_list` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `buyer_orders` WRITE;
/*!40000 ALTER TABLE `buyer_orders` DISABLE KEYS */;

INSERT INTO `buyer_orders` (`order_id`, `user_id`, `order_random_id`, `product_assign_category`, `brand_name_1`, `order_name_1`, `part_number_1`, `quantity_1`, `brand_name_2`, `order_name_2`, `part_number_2`, `quantity_2`, `brand_name_3`, `order_name_3`, `part_number_3`, `quantity_3`, `brand_name_4`, `order_name_4`, `part_number_4`, `quantity_4`, `brand_name_5`, `order_name_5`, `part_number_5`, `quantity_5`, `brand_name_6`, `order_name_6`, `part_number_6`, `quantity_6`, `brand_name_7`, `order_name_7`, `part_number_7`, `quantity_7`, `brand_name_8`, `order_name_8`, `part_number_8`, `quantity_8`, `brand_name_9`, `order_name_9`, `part_number_9`, `quantity_9`, `brand_name_10`, `order_name_10`, `part_number_10`, `quantity_10`, `order_description`, `prefer_delivery_data`, `sent_number_ofSupplier_request`, `awaiting_supplie_response`, `draft`, `send_notification_to_suppliers`, `is_deleted`, `created_at`, `updated_at`, `is_Request_order_again`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `image10`, `master_list`)
VALUES
	(1795,1,'BL8513067',29,'13','123','13','13','13','13','13','13','32','13','23','32',NULL,NULL,NULL,'NULL',NULL,NULL,NULL,'NULL',NULL,NULL,NULL,'NULL',NULL,NULL,NULL,'NULL',NULL,NULL,NULL,'NULL',NULL,NULL,NULL,'NULL',NULL,NULL,NULL,'NULL','32','2019-07-09',9,0,0,'8,37,40,55,56,57,58,67,84',0,'2019-07-15 14:20:49','2019-07-15 14:20:49',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(1796,1,'BN9145063',224,'123','123','12','123','qwe','qwe','qwe','9','asd','asd','asd','3','czxc','czx','cxz','3','vvf','vvf','vvf','1','fafa','faf','fe','142','eew','eew','eew','2','fr','fr','fr','4','fwe','fwrf','fwe','1','','wef','fwe1','1','12','2019-07-17',4,0,0,'57,56,67,84',0,'2019-07-15 14:25:03','2019-07-15 14:25:03',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(1797,1,'BI1489203',227,'product 1 Brand name','product 1','product 1 part number','999','product 2 Brand name','product 2','product 2 pn','132','product 3','product 3','product 2 pn','456','','','','','','','','','','','','','','','','','','','','','','','','','','','','','i want to','2019-07-18',4,0,0,'57,56,67,84',0,'2019-07-15 15:54:21','2019-07-15 15:54:21',0,'1563170061.png','15631700611.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(1798,1,'BA7386902',227,'brand 1','product 1','123','55','435g','123','53','34','rre','142','12','24','125','192','52','555','123','123','3213','3313','33','222','3332','333','','','','','','','','','','','','','','','','','wqeqwe','2019-07-17',4,0,0,'57,56,67,84',0,'2019-07-16 09:30:23','2019-07-16 09:30:23',0,'1563233423Screen_Shot_2019-07-10_at_08_43_25.png',NULL,NULL,NULL,'1563233423Screen_Shot_2019-07-10_at_08_43_251.png','1563233423Screen_Shot_2019-07-10_at_08_43_252.png','1563233423Screen_Shot_2019-07-10_at_08_43_253.png','1563233423Screen_Shot_2019-07-10_at_08_43_254.png','1563233423Screen_Shot_2019-07-10_at_08_43_255.png','1563233423Screen_Shot_2019-07-10_at_08_43_256.png',NULL),
	(1799,2,'BF5902671',225,'123','123','123','123','123','123','213','123','132','123','321','312','','','','','','','','','','','','','','','','','','','','','','','','','','','','','13','2019-07-09',4,0,0,'57,56,67,84',0,'2019-07-16 11:33:52','2019-07-16 14:17:16',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),
	(1800,1,'BU9647032',227,'123','123','3213','312','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','123','2019-07-10',4,0,0,'57,56,67,84',0,'2019-07-16 11:37:24','2019-07-16 11:37:24',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),
	(1801,1,'BP7205968',228,'123','12','123','123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','213','2019-07-03',4,0,0,'57,56,67,84',0,'2019-07-16 13:30:22','2019-07-16 13:30:22',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),
	(1802,1,'BQ8657240',229,'123','123','132','123','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','123','2019-07-03',4,0,0,'57,56,67,84',0,'2019-07-16 13:37:13','2019-07-16 13:37:13',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1');

/*!40000 ALTER TABLE `buyer_orders` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
