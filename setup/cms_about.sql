/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : trayolo

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-23 21:13:51
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `cms_about`
-- ----------------------------
DROP TABLE IF EXISTS `cms_about`;
CREATE TABLE `cms_about` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `overview` varchar(2000) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `content` text,
  `linkurl` varchar(255) DEFAULT NULL,
  `sort_order` int(5) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(150) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(150) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_about
-- ----------------------------
