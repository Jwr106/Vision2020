/*
 Navicat Premium Data Transfer

 Source Server         : aliyun
 Source Server Type    : MariaDB
 Source Server Version : 100412
 Source Host           : tongxx.top:3306
 Source Schema         : ecomm

 Target Server Type    : MariaDB
 Target Server Version : 100412
 File Encoding         : 65001

 Date: 25/05/2020 10:48:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for order_record
-- ----------------------------
DROP TABLE IF EXISTS `order_record`;
CREATE TABLE `order_record` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `contact_number` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `l_sphere` float DEFAULT NULL,
  `l_cylinder` float DEFAULT NULL,
  `l_axis` float DEFAULT NULL,
  `r_sphere` float DEFAULT NULL,
  `r_cylinder` float DEFAULT NULL,
  `r_axis` float DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
