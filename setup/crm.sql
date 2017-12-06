/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : vinh_hung

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-21 18:26:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `crm_client`
-- ----------------------------
DROP TABLE IF EXISTS `crm_client`;
CREATE TABLE `crm_client` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) DEFAULT NULL COMMENT 'group:COMPANY',
  `content` text,
  `start_date` varchar(18) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_title` varchar(100) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL COMMENT 'group:COMPANY',
  `address` varchar(255) DEFAULT NULL COMMENT 'group:COMPANY',
  `address2` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL COMMENT 'group:COMPANY',
  `email` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL COMMENT 'group:COMPANY',
  `company` varchar(255) DEFAULT NULL COMMENT 'group:COMPANY',
  `business_license` varchar(255) DEFAULT NULL,
  `tax_code` varchar(255) DEFAULT NULL COMMENT 'group:COMPANY',
  `payment_info` varchar(2000) DEFAULT NULL,
  `payment_term` varchar(2000) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL COMMENT 'group:LOCATION',
  `city` varchar(255) DEFAULT NULL COMMENT 'group:LOCATION',
  `country` varchar(255) DEFAULT NULL COMMENT 'group:LOCATION',
  `region` varchar(100) DEFAULT NULL COMMENT 'data:US,EU,JP-KR,ARAB,ASIAN,AFRICA,INDIA;group:LOCATION',
  `note` text,
  `tags` varchar(4000) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `sale_user` varchar(100) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of crm_client
-- ----------------------------
INSERT INTO `crm_client` VALUES ('1', 'crm_client1_image.png', null, 'Fruity Solution', 'Hihihi', null, '2016-10-31', null, null, '+84912738748', 'HBC', '', null, '', 'hung.hoxuan@gmail.com', '', 'Vietnam', null, '102332223', null, null, '', '', '', 'AFRICA', '', null, null, '', '', null, '', '2016-10-06', '6', '2016-11-18', '6', 'education');
INSERT INTO `crm_client` VALUES ('2', '', 'Test', 'Test 2', 'TFDs', '', '2017-05-03', '', 'fdsfsda', '33', '33', '33', '', '3', '333@aa.com', '3', '', 'fadsf', 'MST 123', 'sdfsd', 'fasdfda', '', '', '', 'JP-KR', 'fdsfsdfsda', '', '1', '', 'new', '', '', '2017-04-11', '6', '2017-04-11', '6', 'vinh_hung');
INSERT INTO `crm_client` VALUES ('3', '', '384', 'Công ty XD 384', 'ABC', '', '28.4.2017', 'Mr Hung', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '2017-05-11', '6', null, '', 'vinh_hung');

-- ----------------------------
-- Table structure for `crm_quotation`
-- ----------------------------
DROP TABLE IF EXISTS `crm_quotation`;
CREATE TABLE `crm_quotation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `client_description` varchar(2000) CHARACTER SET utf8mb4 DEFAULT NULL,
  `client_requirement` text CHARACTER SET utf8mb4,
  `expected_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `completed_date` date DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `reason` varchar(4000) CHARACTER SET utf8mb4 DEFAULT NULL,
  `note` varchar(4000) CHARACTER SET utf8mb4 DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of crm_quotation
-- ----------------------------
INSERT INTO `crm_quotation` VALUES ('1', 'dfs', '2017-04-20', '1', '?iên à :(', 'afasf', 'sfafas', '2017-04-28', '2017-04-28', '2017-04-28', '', 'new', 'Hahaha fdsff', 'ok fsdafasdfsa', null, '2017-04-11', '6', '2017-04-11', '6', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('2', '12/VP?N-VH/', null, null, '', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('3', '12/VP?N-VH/', null, '2', '', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('4', '12/VP?N-VH/', '2017-05-23', '2', 'Test 2', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('5', '12/VP?N-VH/', '2017-05-23', '2', 'Test 2', '', '', '2017-05-18', null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('6', '12/VP?N-VH/', '2017-05-23', '2', 'Test 2', '', '', '2017-05-18', '2017-05-17', null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('7', '12/VP?N-VH/', '2017-05-23', '2', 'Test 2', '', '', '2017-05-18', '2017-05-17', '2017-05-31', '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('8', '12/VP?N-VH/', '2017-05-23', '2', 'Test 2', '', '', '2017-05-18', '2017-05-17', '2017-05-31', '', 'new', 'FDS', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('9', '12/VP?N-VH/', '2017-05-23', '2', 'Test 2', '', '', '2017-05-18', '2017-05-17', '2017-05-31', '', 'new', 'FDS', 'FSDFDSFSD', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('10', '12/VP?N-VH/', '2017-05-23', '2', 'Test 2', '', '', '2017-05-18', '2017-05-17', '2017-05-31', '', 'new', 'FDS', 'FSDFDSFSD', null, '2017-05-12', '6', '2017-05-12', '6', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('11', '', null, null, '', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('12', 'DDDDD', null, null, '', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('13', 'DDDDD', null, null, '', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('14', 'DDDDD', null, null, '', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', '2017-05-12', '6', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('15', 'BBB', null, null, '', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('16', 'BBB', '2017-05-25', null, '', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('17', 'BBB', '2017-05-25', '2', '', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('18', 'BBB', '2017-05-25', '2', 'Test 2', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('19', 'BBB', '2017-05-25', '2', 'Test 2', '', '', null, null, null, '', 'new', '', '', null, '2017-05-12', '6', '2017-05-12', '6', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('20', '', null, null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('21', 'hihihi', null, null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('22', 'hihihi', '2017-05-18', null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('23', 'hihihi', '2017-05-18', null, '', '', '', null, null, null, '', '', 'FC', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('24', 'hihihi', '2017-05-18', null, '', '', '', null, null, null, '', '', 'FC', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('25', 'Hello', null, null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('26', 'Hello', '2017-05-15', null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('27', 'Hello', '2017-05-15', null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('28', 'Hello', '2017-05-15', null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('29', 'Shit hehe', null, null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('30', 'Shit hehe', '2017-05-25', null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('31', 'Shit hehe', '2017-05-25', null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('32', 'Shit hehe', '2017-05-25', null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', '2017-05-12', '6', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('33', 'Dien ah', null, null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('34', 'Dien ah', null, null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('35', 'ok bro', null, null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
INSERT INTO `crm_quotation` VALUES ('36', 'ok bro', null, null, '', '', '', null, null, null, '', '', '', '', null, '2017-05-12', '6', null, '', 'vinh_hung');
