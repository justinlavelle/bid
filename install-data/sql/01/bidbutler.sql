/*
SQLyog Ultimate v8.61 
MySQL - 5.0.51b-community-nt-log : Database - newpenny
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`newpenny` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `newpenny`;

/*Table structure for table `bidbutlers` */

DROP TABLE IF EXISTS `bidbutlers`;

CREATE TABLE `bidbutlers` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `minimum_price` decimal(30,2) NOT NULL,
  `maximum_price` decimal(30,2) NOT NULL,
  `bids` int(11) NOT NULL,
  `active` tinyint(4) default '1',
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `auction_id` (`auction_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;

/*Data for the table `bidbutlers` */

insert  into `bidbutlers`(`id`,`user_id`,`auction_id`,`minimum_price`,`maximum_price`,`bids`,`active`,`created`,`modified`) values (137,32,127,'40.00','4000.00',0,1,'2010-12-29 16:45:07','2010-12-29 16:45:22'),(136,29,127,'30.00','4000.00',0,1,'2010-12-29 16:44:39','2010-12-29 16:45:12'),(135,29,127,'30.00','4000.00',0,1,'2010-12-29 16:44:07','2010-12-29 16:44:21'),(134,32,127,'40.00','4000.00',0,1,'2010-12-29 16:43:49','2010-12-29 16:44:12'),(133,29,127,'30.00','4000.00',0,1,'2010-12-29 16:43:43','2010-12-29 16:44:02'),(132,29,126,'20.00','4000.00',0,1,'2010-12-29 16:40:45','2010-12-29 16:44:10'),(131,32,126,'40.00','5000.00',100,1,'2010-12-29 16:40:37','2010-12-29 16:44:00'),(130,32,126,'40.00','5000.00',0,1,'2010-12-29 16:40:28','2010-12-29 16:44:10'),(129,29,126,'20.00','4000.00',0,1,'2010-12-29 16:40:21','2010-12-29 16:44:00'),(128,32,125,'50.00','2000.00',0,1,'2010-12-29 16:36:15','2010-12-29 16:37:31'),(124,32,123,'100.00','2000.00',0,1,'2010-12-29 16:19:30','2010-12-29 16:20:38'),(127,29,125,'100.00','1000.00',0,1,'2010-12-29 16:36:04','2010-12-29 16:37:22'),(123,29,123,'100.00','2000.00',0,1,'2010-12-29 16:19:27','2010-12-29 16:20:39'),(125,32,124,'10.00','1000.00',0,1,'2010-12-29 16:23:37','2010-12-29 16:24:51'),(138,29,127,'30.00','4000.00',100,1,'2010-12-29 16:45:21','2010-12-29 16:45:22'),(139,29,128,'10.00','1000.00',0,1,'2010-12-29 16:47:31','2010-12-29 16:47:54'),(140,32,128,'20.00','2000.00',0,1,'2010-12-29 16:47:38','2010-12-29 16:47:53'),(145,32,130,'100.00','1000.00',0,1,'2010-12-29 16:55:18','2010-12-29 16:56:39'),(143,32,129,'20.00','1000.00',0,1,'2010-12-29 16:51:41','2010-12-29 16:52:18'),(144,32,129,'10.00','2000.00',0,1,'2010-12-29 16:52:40','2010-12-29 16:52:57'),(146,32,131,'20.00','1000.00',300,1,'2010-12-29 17:02:50','2010-12-29 17:10:01'),(148,29,132,'10.00','1000.00',200,1,'2010-12-31 14:10:30','2010-12-31 14:10:30'),(149,29,133,'100.00','2000.00',200,1,'2010-12-31 14:12:31','2010-12-31 14:12:31'),(150,31,133,'100.00','1000.00',200,1,'2010-12-31 14:12:41','2010-12-31 14:12:41'),(151,31,134,'40.00','2000.00',0,1,'2010-12-31 14:14:34','2010-12-31 14:15:36'),(152,29,134,'40.00','1000.00',0,1,'2010-12-31 14:14:41','2010-12-31 14:15:36'),(153,31,134,'40.00','2000.00',200,1,'2010-12-31 14:15:45','2010-12-31 14:15:45'),(154,31,134,'40.00','2000.00',100,1,'2010-12-31 14:15:57','2010-12-31 14:16:38'),(155,31,134,'40.00','2000.00',1000,1,'2010-12-31 14:16:07','2010-12-31 14:16:07'),(156,31,134,'40.00','2000.00',1000,0,'2010-12-31 14:16:23','2010-12-31 14:16:23'),(159,29,136,'100.00','2000.00',10,1,'2010-12-31 14:30:47','2010-12-31 14:30:47'),(158,31,136,'50.00','2000.00',0,1,'2010-12-31 14:28:20','2010-12-31 14:30:08'),(160,29,137,'200.00','1000.00',0,0,'2010-12-31 15:03:12','2010-12-31 15:05:28'),(161,31,137,'50.00','3000.00',0,0,'2010-12-31 15:03:21','2010-12-31 15:05:28'),(162,31,137,'50.00','3000.00',0,0,'2010-12-31 15:06:24','2010-12-31 15:06:56'),(163,31,138,'40.00','1000.00',0,0,'2010-12-31 15:10:31','2010-12-31 15:11:00'),(164,29,138,'50.00','4000.00',0,0,'2010-12-31 15:10:36','2010-12-31 15:10:59'),(165,29,140,'20.00','1000.00',10,1,'2010-12-31 15:19:06','2010-12-31 15:19:06'),(167,30,141,'10.00','1000.00',0,0,'2010-12-31 15:31:02','2010-12-31 15:32:09'),(168,30,141,'10.00','1000.00',0,0,'2010-12-31 15:32:24','2010-12-31 15:33:08'),(169,30,141,'10.00','1000.00',0,0,'2010-12-31 15:33:19','2010-12-31 15:35:28'),(170,30,141,'10.00','1000.00',0,0,'2010-12-31 15:35:44','2010-12-31 15:36:48'),(171,29,141,'10.00','2000.00',0,0,'2010-12-31 15:37:19','2010-12-31 15:38:49');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
