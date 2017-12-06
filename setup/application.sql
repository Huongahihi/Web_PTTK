/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : moza_yii2_framework

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-06 15:47:41
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `application`
-- ----------------------------
DROP TABLE IF EXISTS `application`;
CREATE TABLE `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(300) DEFAULT NULL COMMENT 'editor:upload',
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `keywords` varchar(1000) DEFAULT NULL,
  `note` varchar(3000) DEFAULT NULL,
  `storage_max` bigint(20) DEFAULT NULL COMMENT 'group:storage',
  `storage_current` bigint(20) DEFAULT NULL COMMENT 'group:storage',
  `address` varchar(255) DEFAULT NULL COMMENT 'group:contact',
  `map` varchar(255) DEFAULT NULL COMMENT 'group:contact;grid:hidden',
  `website` varchar(255) DEFAULT NULL COMMENT 'group:contact',
  `email` varchar(255) DEFAULT NULL COMMENT 'group:contact',
  `phone` varchar(255) DEFAULT NULL COMMENT 'group:contact',
  `fax` varchar(255) DEFAULT NULL COMMENT 'group:contact',
  `chat` varchar(255) DEFAULT NULL COMMENT 'group:contact',
  `facebook` varchar(255) DEFAULT NULL COMMENT 'grid:hidden;group:social',
  `twitter` varchar(255) DEFAULT NULL COMMENT 'grid:hidden;group:social',
  `google` varchar(255) DEFAULT NULL COMMENT 'grid:hidden;group:social',
  `youtube` varchar(255) DEFAULT NULL COMMENT 'grid:hidden;group:social',
  `copyright` varchar(255) DEFAULT NULL COMMENT 'grid:hidden;',
  `terms_of_service` varchar(300) DEFAULT NULL COMMENT 'editor:file;group:common',
  `profile` varchar(300) DEFAULT NULL COMMENT 'editor:file;group:common',
  `privacy_policy` varchar(300) DEFAULT NULL COMMENT 'editor:file;group:common',
  `is_active` tinyint(1) DEFAULT NULL COMMENT 'group:common',
  `type` varchar(100) DEFAULT NULL COMMENT 'data:ONEPAGE,COMPANY,ECOMMERCE,SOCIAL,MUSIC,EDUCATION',
  `status` varchar(100) DEFAULT NULL COMMENT 'data:DEMO,LIVE,CLOSED,SUSPEND',
  `owner_id` varchar(100) DEFAULT NULL COMMENT 'editor:select;lookup:@user,id,username;group:common',
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of application
-- ----------------------------
INSERT INTO `application` VALUES ('1', 'application1_logo.png', 'default', 'MOZA Group', 'Always the best', '', '', '50000', null, '17 Phung CHi Kien, Cau Giay, Ha noi, Vietnam.', '', 'www.mozagroup.com', 'hung.hoxuan@gmail.com', '84912738748', '', '', '', '', '', 'https://www.youtube.com/channel/UCyw4WvIz4CbBBipCJpVTQjQ', 'Copyright by', '', '', '', '1', '', '', '6', '2016-10-03 13:15:39', '6', '2016-10-26 01:41:26', '6');
