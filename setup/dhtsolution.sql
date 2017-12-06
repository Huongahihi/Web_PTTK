/*
Navicat MySQL Data Transfer

Source Server         : mozaweb
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dhtsolution

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-06 17:38:51
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `app_user`
-- ----------------------------
DROP TABLE IF EXISTS `app_user`;
CREATE TABLE `app_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `content` text,
  `gender` varchar(100) DEFAULT NULL COMMENT 'group:PERSONAL',
  `dob` varchar(255) DEFAULT NULL COMMENT 'group:PERSONAL',
  `phone` varchar(25) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL COMMENT 'group:PERSONAL',
  `height` varchar(255) DEFAULT NULL COMMENT 'group:PERSONAL',
  `address` varchar(255) DEFAULT NULL COMMENT 'group:LOCATION',
  `country` varchar(100) DEFAULT NULL COMMENT 'group:LOCATION',
  `state` varchar(100) DEFAULT NULL COMMENT 'group:LOCATION',
  `city` varchar(100) DEFAULT NULL COMMENT 'group:LOCATION',
  `balance` decimal(10,0) DEFAULT NULL COMMENT 'group:FINANCE',
  `point` int(11) DEFAULT NULL COMMENT 'group:FINANCE',
  `card_number` varchar(255) DEFAULT NULL COMMENT 'group:PAYMENT',
  `card_cvv` varchar(255) DEFAULT NULL COMMENT 'editor:text;group:PAYMENT',
  `card_exp` varchar(255) DEFAULT NULL COMMENT 'group:PAYMENT',
  `lat` varchar(255) DEFAULT NULL COMMENT 'group:LOCATION',
  `long` varchar(255) DEFAULT NULL COMMENT 'group:LOCATION',
  `rate` float DEFAULT NULL COMMENT 'group:RATINGS;',
  `rate_count` int(11) DEFAULT NULL COMMENT 'group:RATINGS;',
  `is_online` tinyint(1) DEFAULT NULL COMMENT 'group:GROUPING',
  `is_active` tinyint(1) DEFAULT NULL COMMENT 'group:GROUPING',
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL COMMENT 'data:PENDING,BANNED,REJECTED,NORMAL,PRO,VIP',
  `role` int(2) DEFAULT NULL COMMENT 'data:10:USER,20:MODERATOR,30:ADMIN;editor:select;group:GROUPING',
  `provider_id` varchar(100) DEFAULT NULL COMMENT 'lookup:@provider',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_user
-- ----------------------------
INSERT INTO `app_user` VALUES ('1', null, 'Trần Hoàng Anh', 'akinahoang', 'anhth52@wru.vn', '123456', '123456', '123456', '123456', null, 'LIKE PHONE', null, null, '096412234', null, null, '175, Tây Sơn, Đống Đa, Hà Nội', 'Việt Nam', null, null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, null, null);
INSERT INTO `app_user` VALUES ('2', '', 'Vũ Thị Hường', 'pikahuong', 'huongtlu@gmail.com', '123', '123', '123', '123', null, 'LIKE OPPO', null, null, '096291929', null, null, '181 Xuân Thủy, Cầu Giấy, Hà Nội', null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `app_user_bookmark`
-- ----------------------------
DROP TABLE IF EXISTS `app_user_bookmark`;
CREATE TABLE `app_user_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL COMMENT 'lookup:@app_user',
  `object_id` varchar(100) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `name` varchar(2000) NOT NULL COMMENT '1-full 2-chapter 3-text',
  `content` text,
  `created_date` datetime DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_user_bookmark
-- ----------------------------

-- ----------------------------
-- Table structure for `app_user_device`
-- ----------------------------
DROP TABLE IF EXISTS `app_user_device`;
CREATE TABLE `app_user_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'lookup:@app_user',
  `ime` varchar(255) NOT NULL,
  `gcm_id` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_user_device
-- ----------------------------

-- ----------------------------
-- Table structure for `app_user_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `app_user_feedback`;
CREATE TABLE `app_user_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL COMMENT 'lookup:@app_user',
  `object_id` varchar(100) DEFAULT NULL,
  `object_type` varchar(100) DEFAULT NULL,
  `comment` varchar(4000) NOT NULL,
  `response` text,
  `type` varchar(100) DEFAULT NULL COMMENT 'data:Question,Feedback,Report',
  `status` varchar(100) DEFAULT NULL COMMENT 'data:New,Received,Processing,Pending,Closed',
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_user_feedback
-- ----------------------------
INSERT INTO `app_user_feedback` VALUES ('1', '4', '', 'common', 'fdsfas', 'fsdfasdfdfsa', '', '', '2017-03-06 17:49:58', '', null, '', 'default');
INSERT INTO `app_user_feedback` VALUES ('2', '2', '', '', 'FDSFDSFDS', '', '', '', '2017-03-06 00:00:00', '', null, '', 'default');
INSERT INTO `app_user_feedback` VALUES ('3', '2', '', '', 'FDSFDS', '', '', '', '2017-03-06 00:00:00', '', null, '', 'default');
INSERT INTO `app_user_feedback` VALUES ('4', '2', '', '', 'FDSFSDfsdfsdf', '', '', '', '2017-03-06 00:00:00', '', null, '', 'default');
INSERT INTO `app_user_feedback` VALUES ('5', '6', '84', 'ecommerce_order', 'Order #84 (Bộ Neo DUL/SSPC 6-19 (bát+ nêm)', '', '', '', '2017-03-08 00:00:00', '6', null, '', 'default');
INSERT INTO `app_user_feedback` VALUES ('6', '6', '85', 'ecommerce_order', 'Order #85 (ưerw', '', '', '', '2017-07-01 00:00:00', '6', null, '', 'mozaweb');
INSERT INTO `app_user_feedback` VALUES ('7', '6', '85', 'ecommerce_order', 'Order #85 (ưerw', '', '', '', '2017-07-01 00:00:00', '6', null, '', 'mozaweb');
INSERT INTO `app_user_feedback` VALUES ('8', '6', '85', 'ecommerce_order', 'Order #85 (ưerw', '', '', '', '2017-07-01 00:00:00', '6', null, '', 'mozaweb');
INSERT INTO `app_user_feedback` VALUES ('9', '6', '86', 'ecommerce_order', 'Order #86 (3', '', '', '', '2017-07-01 00:00:00', '6', null, '', 'mozaweb');
INSERT INTO `app_user_feedback` VALUES ('10', '1', '', '', '<p>Iphone t&ocirc;i mới mua tại Shopphone d&ugrave;ng cảm ứng tốt. T&ocirc;i thấy h&agrave;i l&ograve;ng. N&ecirc;n sắp tới t&ocirc;i sẽ mua iphone X tại shop</p>', '', 'Feedback', 'New', '2017-11-20 16:12:37', '12', null, '', 'SellPhone');

-- ----------------------------
-- Table structure for `app_user_logs`
-- ----------------------------
DROP TABLE IF EXISTS `app_user_logs`;
CREATE TABLE `app_user_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL COMMENT 'lookup:@app_user',
  `action` varchar(100) DEFAULT NULL COMMENT 'data:register,login,purchase,feedback',
  `duration` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of app_user_logs
-- ----------------------------

-- ----------------------------
-- Table structure for `app_user_pro`
-- ----------------------------
DROP TABLE IF EXISTS `app_user_pro`;
CREATE TABLE `app_user_pro` (
  `user_id` int(11) NOT NULL,
  `rate` float(3,1) DEFAULT NULL,
  `rate_count` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_email` varchar(255) DEFAULT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `business_website` varchar(255) DEFAULT NULL,
  `business_phone` varchar(20) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  UNIQUE KEY `user_id_unique` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_user_pro
-- ----------------------------
INSERT INTO `app_user_pro` VALUES ('51', null, '0', null, null, null, null, null, null, '1', null, null);
INSERT INTO `app_user_pro` VALUES ('54', '8.0', '1', null, null, null, null, null, null, '1', null, null);
INSERT INTO `app_user_pro` VALUES ('55', '10.0', '2', null, null, null, null, null, null, '1', null, null);
INSERT INTO `app_user_pro` VALUES ('88', null, '0', null, null, null, null, null, null, '1', null, null);

-- ----------------------------
-- Table structure for `app_user_token`
-- ----------------------------
DROP TABLE IF EXISTS `app_user_token`;
CREATE TABLE `app_user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of app_user_token
-- ----------------------------
INSERT INTO `app_user_token` VALUES ('66', '12', '5c804ecda04320124cd26a6ff4be7f1f', '2016-06-30 10:24:38');
INSERT INTO `app_user_token` VALUES ('108', '6', '0380c4baf39d05a2937b1d1f55ebcad8', '2016-07-01 17:23:50');
INSERT INTO `app_user_token` VALUES ('115', '1', '790e8065b42517072891b761c0f9de2d', '2016-07-07 01:16:15');
INSERT INTO `app_user_token` VALUES ('119', '8', 'e552d7af875986ffa6da843bd077d59e', '2016-07-05 11:32:38');
INSERT INTO `app_user_token` VALUES ('131', '14', '7b57883f8d0f12fc0463c425dd8f09bf', '2016-07-06 10:17:20');
INSERT INTO `app_user_token` VALUES ('135', '2', '628565b445f604ede847942c7af3d3f4', '2016-07-07 11:05:21');
INSERT INTO `app_user_token` VALUES ('136', '10', '492de1fc848a6cf9fffb02d971dcf5bf', '2016-07-07 11:07:16');
INSERT INTO `app_user_token` VALUES ('137', '15', 'aacdee4a314980d048fb22bc2b107543', '2016-07-07 11:20:01');

-- ----------------------------
-- Table structure for `app_user_transaction`
-- ----------------------------
DROP TABLE IF EXISTS `app_user_transaction`;
CREATE TABLE `app_user_transaction` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `receiver_user_id` varchar(100) NOT NULL COMMENT 'lookup:@app_user',
  `object_id` varchar(100) DEFAULT NULL,
  `object_type` varchar(100) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `payment_method` varchar(100) NOT NULL COMMENT 'data:POINT,CREDIT,CASH,BANK,PAYPAL,WU',
  `note` varchar(2000) DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `action` varchar(255) DEFAULT NULL COMMENT 'data:SYSTEM_ADJUST,CANCELLATION_ORDER_FEE,EXCHANGE_POINT,REDEEM_POINT,TRANSFER_POINT,TRIP_PAYMENT,PASSENGER_SHARE_BONUS,DRIVER_SHARE_BONUS',
  `type` varchar(100) DEFAULT NULL COMMENT 'data:PLUS,MINUS',
  `status` varchar(100) NOT NULL COMMENT 'data:PENDING=0,APPROVED=1,REJECTED=-1',
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_user_transaction
-- ----------------------------

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
  `lang` varchar(100) DEFAULT NULL,
  `modules` varchar(500) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of application
-- ----------------------------
INSERT INTO `application` VALUES ('12', '', 'mozaweb', 'MOZA Business Solutions', '', '', '', 'vi', '', null, null, '', '', '', 'mozatech@gmail.com', '01649970624', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-06-29 03:43:33', '6', '2017-06-29 03:47:36', '6');
INSERT INTO `application` VALUES ('13', '', 'mozacompany', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-07-20 04:30:06', '', null, '');
INSERT INTO `application` VALUES ('14', '', 'olongkar', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-07-21 05:06:57', '', null, '');
INSERT INTO `application` VALUES ('15', '', 'theme1', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-07-21 06:20:30', '', null, '');
INSERT INTO `application` VALUES ('16', '', 'theme2', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-07-21 08:35:05', '', null, '');
INSERT INTO `application` VALUES ('17', '', 'theme3', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-07-21 09:10:13', '', null, '');
INSERT INTO `application` VALUES ('18', '', 'salique', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-07-21 09:33:08', '', null, '');
INSERT INTO `application` VALUES ('19', '', 'aquality', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-07-22 11:51:13', '', null, '');
INSERT INTO `application` VALUES ('20', '', 'music', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-07-30 10:01:32', '7', null, '');
INSERT INTO `application` VALUES ('21', '', 'theme', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-08-01 09:35:36', '7', null, '');
INSERT INTO `application` VALUES ('22', '', 'deliver', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-08-30 05:54:07', '', null, '');
INSERT INTO `application` VALUES ('23', '', 'education2', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-09-10 11:48:00', '', null, '');
INSERT INTO `application` VALUES ('24', '', 'stech', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-09-15 06:25:18', '', null, '');
INSERT INTO `application` VALUES ('25', '', 'SellPhone', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-11-17 12:40:32', '', null, '');
INSERT INTO `application` VALUES ('26', '', 'mo', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-11-17 12:54:53', '12', null, '');
INSERT INTO `application` VALUES ('27', '', 'mozaweb_n', 'MOZA Business Solutions', '', '', '', 'en', '', null, null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '2017-11-22 17:51:57', '12', null, '');

-- ----------------------------
-- Table structure for `auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE `auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group
-- ----------------------------
INSERT INTO `auth_group` VALUES ('8', 'Cms Admin', '1', '2017-05-26 10:36:41', null, '');
INSERT INTO `auth_group` VALUES ('9', 'Cms User', '1', '2017-05-26 10:40:26', '2017-05-27 02:12:39', '');
INSERT INTO `auth_group` VALUES ('10', 'Ecommerce User', '1', '2017-05-26 10:41:02', null, '');
INSERT INTO `auth_group` VALUES ('11', 'Ecommerce Admin', '1', '2017-05-26 10:41:02', null, '');
INSERT INTO `auth_group` VALUES ('12', 'Travel User', '1', '2017-05-26 10:41:43', null, '');
INSERT INTO `auth_group` VALUES ('13', 'Travel Admin', '1', '2017-05-26 10:41:43', null, '');
INSERT INTO `auth_group` VALUES ('14', 'App User', '1', '2017-05-26 10:41:49', null, '');
INSERT INTO `auth_group` VALUES ('15', 'App Admin', '1', '2017-05-26 10:41:49', null, '');
INSERT INTO `auth_group` VALUES ('16', 'Administration User', '1', '2017-05-27 03:16:38', null, '');
INSERT INTO `auth_group` VALUES ('17', 'Administration Admin', '1', '2017-05-27 03:16:39', null, '');
INSERT INTO `auth_group` VALUES ('18', 'Cms User', '1', '2017-06-28 23:12:02', null, 'mozaweb');
INSERT INTO `auth_group` VALUES ('19', 'Cms Admin', '1', '2017-06-28 23:12:02', null, 'mozaweb');

-- ----------------------------
-- Table structure for `auth_permission`
-- ----------------------------
DROP TABLE IF EXISTS `auth_permission`;
CREATE TABLE `auth_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `object2_id` bigint(20) NOT NULL,
  `object2_type` varchar(100) NOT NULL,
  `relation_type` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(5) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_permission
-- ----------------------------
INSERT INTO `auth_permission` VALUES ('71', '10', 'auth_group', '9', 'user', 'group-user', null, '0', '2017-05-26', null);
INSERT INTO `auth_permission` VALUES ('73', '9', 'user', '94', 'auth_role', 'user-role', null, '0', '2017-05-26', null);
INSERT INTO `auth_permission` VALUES ('78', '10', 'auth_group', '110', 'auth_role', 'group-role', null, '0', '2017-05-26', null);
INSERT INTO `auth_permission` VALUES ('79', '11', 'auth_group', '111', 'auth_role', 'group-role', null, '0', '2017-05-26', null);
INSERT INTO `auth_permission` VALUES ('80', '9', 'auth_group', '9', 'user', 'group-user', null, '0', '2017-05-27', null);
INSERT INTO `auth_permission` VALUES ('88', '14', 'auth_group', '121', 'auth_role', 'group-role', null, '0', '2017-05-27', null);
INSERT INTO `auth_permission` VALUES ('89', '15', 'auth_group', '122', 'auth_role', 'group-role', null, '0', '2017-05-27', null);
INSERT INTO `auth_permission` VALUES ('97', '16', 'auth_group', '114', 'auth_role', 'group-role', null, '0', '2017-05-29', null);
INSERT INTO `auth_permission` VALUES ('106', '12', 'auth_group', '137', 'auth_role', 'group-role', null, '0', '2017-05-30', null);
INSERT INTO `auth_permission` VALUES ('107', '13', 'auth_group', '138', 'auth_role', 'group-role', null, '0', '2017-05-30', null);
INSERT INTO `auth_permission` VALUES ('108', '9', 'auth_group', '91', 'auth_role', 'group-role', null, '0', '2017-05-30', null);
INSERT INTO `auth_permission` VALUES ('109', '8', 'auth_group', '92', 'auth_role', 'group-role', null, '0', '2017-05-30', null);
INSERT INTO `auth_permission` VALUES ('112', '18', 'auth_group', '148', 'auth_role', 'group-role', null, '0', '2017-06-28', null);
INSERT INTO `auth_permission` VALUES ('113', '19', 'auth_group', '149', 'auth_role', 'group-role', null, '0', '2017-06-28', null);

-- ----------------------------
-- Table structure for `auth_role`
-- ----------------------------
DROP TABLE IF EXISTS `auth_role`;
CREATE TABLE `auth_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_role
-- ----------------------------
INSERT INTO `auth_role` VALUES ('89', 'home', 'Home - View', 'View, List', '1', '2017-05-26 10:58:42', null, '');
INSERT INTO `auth_role` VALUES ('90', 'home/manage', 'Home - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:58:42', null, '');
INSERT INTO `auth_role` VALUES ('91', 'cms', 'Cms - View', 'View, List', '1', '2017-05-26 10:58:56', null, '');
INSERT INTO `auth_role` VALUES ('92', 'cms/manage', 'Cms - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:58:57', null, '');
INSERT INTO `auth_role` VALUES ('93', 'cms_blogs', 'Cms Blogs - View', 'View, List', '1', '2017-05-26 10:58:57', null, '');
INSERT INTO `auth_role` VALUES ('94', 'cms_blogs/manage', 'Cms Blogs - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:58:57', null, '');
INSERT INTO `auth_role` VALUES ('95', 'cms_article', 'Cms Article - View', 'View, List', '1', '2017-05-26 10:59:01', null, '');
INSERT INTO `auth_role` VALUES ('96', 'cms_article/manage', 'Cms Article - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:59:01', null, '');
INSERT INTO `auth_role` VALUES ('97', 'cms_slide', 'Cms Slide - View', 'View, List', '1', '2017-05-26 10:59:04', null, '');
INSERT INTO `auth_role` VALUES ('98', 'cms_slide/manage', 'Cms Slide - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:59:04', null, '');
INSERT INTO `auth_role` VALUES ('99', 'cms_service', 'Cms Service - View', 'View, List', '1', '2017-05-26 10:59:06', null, '');
INSERT INTO `auth_role` VALUES ('100', 'cms_service/manage', 'Cms Service - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:59:06', null, '');
INSERT INTO `auth_role` VALUES ('101', 'cms_about', 'Cms About - View', 'View, List', '1', '2017-05-26 10:59:09', null, '');
INSERT INTO `auth_role` VALUES ('102', 'cms_about/manage', 'Cms About - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:59:09', null, '');
INSERT INTO `auth_role` VALUES ('103', 'cms_employee', 'Cms Employee - View', 'View, List', '1', '2017-05-26 10:59:11', null, '');
INSERT INTO `auth_role` VALUES ('104', 'cms_employee/manage', 'Cms Employee - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:59:11', null, '');
INSERT INTO `auth_role` VALUES ('105', 'cms_contact', 'Cms Contact - View', 'View, List', '1', '2017-05-26 10:59:14', null, '');
INSERT INTO `auth_role` VALUES ('106', 'cms_contact/manage', 'Cms Contact - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:59:14', null, '');
INSERT INTO `auth_role` VALUES ('107', 'cms_album', 'Cms Album - View', 'View, List', '1', '2017-05-26 10:59:16', null, '');
INSERT INTO `auth_role` VALUES ('108', 'cms_album/manage', 'Cms Album - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:59:16', null, '');
INSERT INTO `auth_role` VALUES ('109', 'cms_testimonial', 'Cms Testimonial - View', 'View, List', '1', '2017-05-26 10:59:19', null, '');
INSERT INTO `auth_role` VALUES ('110', 'ecommerce', 'Ecommerce - View', 'View, List', '1', '2017-05-26 10:59:23', null, '');
INSERT INTO `auth_role` VALUES ('111', 'ecommerce/manage', 'Ecommerce - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:59:23', null, '');
INSERT INTO `auth_role` VALUES ('112', 'product', 'Product - View', 'View, List', '1', '2017-05-26 10:59:23', null, '');
INSERT INTO `auth_role` VALUES ('113', 'product/manage', 'Product - Manage', 'Create, Update, Delete', '1', '2017-05-26 10:59:23', null, '');
INSERT INTO `auth_role` VALUES ('114', 'administration', 'Administration - View', 'View, List', '1', '2017-05-26 10:59:28', null, '');
INSERT INTO `auth_role` VALUES ('115', 'ecommerce_order', 'Ecommerce Order - View', 'View, List', '1', '2017-05-26 11:01:35', null, '');
INSERT INTO `auth_role` VALUES ('116', 'provider', 'Provider - View', 'View, List', '1', '2017-05-26 11:01:37', null, '');
INSERT INTO `auth_role` VALUES ('117', 'provider/manage', 'Provider - Manage', 'Create, Update, Delete', '1', '2017-05-26 11:01:37', null, '');
INSERT INTO `auth_role` VALUES ('118', 'promotion', 'Promotion - View', 'View, List', '1', '2017-05-26 11:05:35', null, '');
INSERT INTO `auth_role` VALUES ('119', 'promotion/manage', 'Promotion - Manage', 'Create, Update, Delete', '1', '2017-05-26 11:05:35', null, '');
INSERT INTO `auth_role` VALUES ('120', 'object_setting', 'Object Setting - View', 'View, List', '1', '2017-05-27 03:16:39', null, '');
INSERT INTO `auth_role` VALUES ('121', 'app', 'App - View', 'View, List', '1', '2017-05-27 03:35:00', null, '');
INSERT INTO `auth_role` VALUES ('122', 'app/manage', 'App - Manage', 'Create, Update, Delete', '1', '2017-05-27 03:35:00', null, '');
INSERT INTO `auth_role` VALUES ('123', 'app_user', 'App User - View', 'View, List', '1', '2017-05-27 03:35:00', null, '');
INSERT INTO `auth_role` VALUES ('124', 'app_user/manage', 'App User - Manage', 'Create, Update, Delete', '1', '2017-05-27 03:35:00', null, '');
INSERT INTO `auth_role` VALUES ('125', 'app_user_device', 'App User Device - View', 'View, List', '1', '2017-05-27 03:35:06', null, '');
INSERT INTO `auth_role` VALUES ('126', 'app_user_feedback', 'App User Feedback - View', 'View, List', '1', '2017-05-27 03:35:09', null, '');
INSERT INTO `auth_role` VALUES ('127', 'cms_feedback', 'Cms Feedback - View', 'View, List', '1', '2017-05-28 10:32:08', null, '');
INSERT INTO `auth_role` VALUES ('128', 'cms_feedback/manage', 'Cms Feedback - Manage', 'Create, Update, Delete', '1', '2017-05-28 10:32:08', null, '');
INSERT INTO `auth_role` VALUES ('129', 'cms_statistics', 'Cms Statistics - View', 'View, List', '1', '2017-05-28 10:32:37', null, '');
INSERT INTO `auth_role` VALUES ('130', 'cms_partner', 'Cms Partner - View', 'View, List', '1', '2017-05-28 16:12:21', null, '');
INSERT INTO `auth_role` VALUES ('131', 'cms_partner/manage', 'Cms Partner - Manage', 'Create, Update, Delete', '1', '2017-05-28 16:12:21', null, '');
INSERT INTO `auth_role` VALUES ('132', 'object_category', 'Object Category - View', 'View, List', '1', '2017-05-29 20:42:34', null, '');
INSERT INTO `auth_role` VALUES ('133', 'settings_menu', 'Settings Menu - View', 'View, List', '1', '2017-05-29 20:42:48', null, '');
INSERT INTO `auth_role` VALUES ('134', 'settings_menu/manage', 'Settings Menu - Manage', 'Create, Update, Delete', '1', '2017-05-29 20:42:48', null, '');
INSERT INTO `auth_role` VALUES ('135', 'cms_faq', 'Cms Faq - View', 'View, List', '1', '2017-05-29 20:45:43', null, '');
INSERT INTO `auth_role` VALUES ('136', 'cms_faq/manage', 'Cms Faq - Manage', 'Create, Update, Delete', '1', '2017-05-29 20:45:43', null, '');
INSERT INTO `auth_role` VALUES ('137', 'travel', 'Travel - View', 'View, List', '1', '2017-05-30 04:19:56', null, '');
INSERT INTO `auth_role` VALUES ('138', 'travel/manage', 'Travel - Manage', 'Create, Update, Delete', '1', '2017-05-30 04:19:56', null, '');
INSERT INTO `auth_role` VALUES ('139', 'travel_attractions', 'Travel Attractions - View', 'View, List', '1', '2017-05-30 04:19:56', null, '');
INSERT INTO `auth_role` VALUES ('140', 'travel_sites', 'Travel Sites - View', 'View, List', '1', '2017-05-30 05:46:55', null, '');
INSERT INTO `auth_role` VALUES ('141', 'travel_sites/manage', 'Travel Sites - Manage', 'Create, Update, Delete', '1', '2017-05-30 05:46:55', null, '');
INSERT INTO `auth_role` VALUES ('142', 'travel_itinerary', 'Travel Itinerary - View', 'View, List', '1', '2017-05-30 05:46:57', null, '');
INSERT INTO `auth_role` VALUES ('143', 'travel_scores', 'Travel Scores - View', 'View, List', '1', '2017-05-30 05:48:29', null, '');
INSERT INTO `auth_role` VALUES ('144', 'travel_scores/manage', 'Travel Scores - Manage', 'Create, Update, Delete', '1', '2017-05-30 05:48:29', null, '');
INSERT INTO `auth_role` VALUES ('145', 'cms_portfolio', 'Cms Portfolio - View', 'View, List', '1', '2017-05-30 05:54:02', null, '');
INSERT INTO `auth_role` VALUES ('146', 'cms_portfolio/manage', 'Cms Portfolio - Manage', 'Create, Update, Delete', '1', '2017-05-30 05:54:02', null, '');
INSERT INTO `auth_role` VALUES ('147', 'administration', 'Administration - View', 'View, List', '1', '2017-06-06 23:18:32', null, 'cms');
INSERT INTO `auth_role` VALUES ('148', 'cms', 'Cms - View', 'View, List', '1', '2017-06-28 23:12:02', null, 'mozaweb');
INSERT INTO `auth_role` VALUES ('149', 'cms/manage', 'Cms - Manage', 'Create, Update, Delete', '1', '2017-06-28 23:12:02', null, 'mozaweb');
INSERT INTO `auth_role` VALUES ('150', 'cms_page', 'Cms Page - View', 'View, List', '1', '2017-06-28 23:12:02', null, 'mozaweb');
INSERT INTO `auth_role` VALUES ('151', 'cms_page/manage', 'Cms Page - Manage', 'Create, Update, Delete', '1', '2017-06-28 23:12:03', null, 'mozaweb');
INSERT INTO `auth_role` VALUES ('152', 'cms_links', 'Cms Links - View', 'View, List', '1', '2017-06-28 23:12:18', null, 'mozaweb');
INSERT INTO `auth_role` VALUES ('153', 'cms_links/manage', 'Cms Links - Manage', 'Create, Update, Delete', '1', '2017-06-28 23:12:18', null, 'mozaweb');
INSERT INTO `auth_role` VALUES ('154', 'cms_widgets', 'Cms Widgets - View', 'View, List', '1', '2017-07-01 18:50:53', null, 'mozaweb');
INSERT INTO `auth_role` VALUES ('155', 'cms_widgets/manage', 'Cms Widgets - Manage', 'Create, Update, Delete', '1', '2017-07-01 18:50:53', null, 'mozaweb');

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
  `content` text,
  `color` varchar(100) DEFAULT NULL,
  `sort_order` int(5) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(150) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(150) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_about
-- ----------------------------
INSERT INTO `cms_about` VALUES ('6', '', '', 'MozaGroup Group Corporation', '', '<p><img class=\"img-responsive\" src=\"http://projectemplate.com/content/images/default.png\" style=\"float:left; width:500px; margin-right: 20px\" /></p>\r\n\r\n<p>We are software agency with mission to bring RIGHT things to START your project successfully</p>\r\n\r\n<ul>\r\n	<li>&nbsp;Standard technical stacks</li>\r\n	<li>&nbsp;Trustful, dedicated developers</li>\r\n	<li>&nbsp;Agile, Scrum process</li>\r\n	<li>&nbsp;Right solutions, effective methods</li>\r\n	<li>&nbsp;Transparent &amp; Commitment</li>\r\n</ul>\r\n\r\n<p>Trusted by more than 300+ clients from Chupamobile, Sellmyapps.., we always bring highest commitment and effective approach to every project we work on. That is why we are an right technical partner for any client, from individuals, startups to enterprises..</p>\r\n\r\n<p>CEO, Hung Ho</p>', '', null, '', '', 'en', '1', '1', '2017-06-23', '6', '2017-06-23', '6', 'mozaweb');
INSERT INTO `cms_about` VALUES ('7', 'hng_cms_about_thumbnail.jpg', 'i-am-hng-learning-thuy-loi-univercity_cms_about7_image.jpg', 'Welcome to something funny', 'Trying complete', '<p><span style=\"color:rgb(85, 85, 85)\">Success is not the key to happiness. Happiness is the key to success. If you love what you are doing, you will be successful.</span></p>\r\n\r\n<p><span style=\"color:rgb(85, 85, 85)\">Character cannot be developed in ease and quiet. Only through experience of trial and suffering can the soul be strengthened, ambition inspired, and success achieved.</span></p>\r\n\r\n<p><span style=\"color:rgb(85, 85, 85)\">The key to success is to focus our conscious mind on things we desire not things we fear.</span></p>', '#ed1616', null, '', '', '', '0', '1', '2017-07-28', '7', '2017-07-28', '7', 'theme1');
INSERT INTO `cms_about` VALUES ('8', 'hi_cms_about_thumbnail.jpg', 'hi_cms_about_image.jpg', 'Hi', 'oooooooooooohhhh', '<p><span style=\"color:rgb(85, 85, 85)\">Character cannot be developed in ease and quiet. Only through experience of trial and suffering can the soul be strengthened, ambition inspired, and success achieved.</span></p>', '', null, 'ytyt', 'ytytuyt', 'de', '1', '0', '2017-07-28', '7', '2017-07-28', '7', 'theme1');
INSERT INTO `cms_about` VALUES ('9', 'i-am-hit_cms_about_thumbnail.png', 'i-am-hit_cms_about_image.jpg', 'i am H_IT', 'hihih', '<p><span style=\"color:rgb(85, 85, 85)\">Character cannot be developed in ease and quiet. Only through experience of trial and suffering can the soul be strengthened, ambition inspired, and success achieved.</span></p>', '#cc0000', null, 'ghg', 'fgh', '', '0', '1', '2017-07-28', '7', null, '', 'theme1');
INSERT INTO `cms_about` VALUES ('10', 'mother_cms_about_thumbnail.jpg', 'mother_cms_about_image.jpg', 'Club', 'Contacts us......', '<p>My club alway funny&nbsp;to take care of my memeber....</p>', '', null, 'http://www.moralstories.org/mothers-sacrifice/', 'glyphicon glyphicon-user', 'en', '1', '0', '2017-07-31', '7', '2017-07-31', '7', 'olongkar');
INSERT INTO `cms_about` VALUES ('11', '', '', 'A', '', '', '', null, '', '', '', '0', '0', '2017-07-31', '7', null, '', 'theme3');
INSERT INTO `cms_about` VALUES ('12', '', 'cng-ty-c-phn-tp-on-in-thoi-cng-ngh-cao_cms_about_image.jpg', 'Công ty cổ phần tập đoàn điện thoại công nghệ cao', 'Hợp tác phát triển qua nhiều năm kinh doanh shop phone. Công ty được hình thành trên nền tảng công cao vốn có của các nhà kinh doanh...', '', '', null, '', '', '', '1', '0', '2017-11-20', '12', null, '', 'SellPhone');

-- ----------------------------
-- Table structure for `cms_article`
-- ----------------------------
DROP TABLE IF EXISTS `cms_article`;
CREATE TABLE `cms_article` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `banner` varchar(300) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `overview` varchar(2000) DEFAULT NULL,
  `content` text,
  `linkurl` varchar(255) DEFAULT NULL,
  `sort_order` int(5) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(150) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(150) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_article
-- ----------------------------
INSERT INTO `cms_article` VALUES ('1', '', '', '', '', '<i class=\"fa fa-lightbulb-o\" aria-hidden=\"true\"></i>', 'Ready-made solutions', '50 ready-made solutions for all kind of business are designed, coded and carefully tested by more than 300 clients. Buy full source code to SAVE 50% TIME & COST', '', '', null, '', '', '1', '1', '2017-06-28', '6', '2017-06-28', '6', 'mozaweb');
INSERT INTO `cms_article` VALUES ('2', '', '', '', '', '<i class=\"fa fa-fire\" aria-hidden=\"true\"></i>', 'Good developers', 'We have team of full-time developers, designers for hire per project, per hours (month) or Offshore team.Trustful, dedicated, live support, experienced. Never drop projects.', '', '', null, '', '', '1', '1', '2017-06-28', '6', '2017-06-28', '6', 'mozaweb');
INSERT INTO `cms_article` VALUES ('3', '', '', '', '', '<i class=\"fa fa-rocket\" aria-hidden=\"true\"></i>', 'Money back guaranteed', 'Risk-free as everything is premade, preview and tested by other clients. Trusted by Chupamobile, SellmyApp, Elance .. 95% Success Rate, Money back guarantee', '', '', null, '', '', '1', '1', '2017-06-28', '6', '2017-06-28', '6', 'mozaweb');

-- ----------------------------
-- Table structure for `cms_blogs`
-- ----------------------------
DROP TABLE IF EXISTS `cms_blogs`;
CREATE TABLE `cms_blogs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `banner` varchar(300) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `overview` varchar(2000) DEFAULT NULL,
  `content` text,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `category_id` varchar(500) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `tags` varchar(1000) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `is_new` tinyint(1) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT NULL,
  `count_views` int(11) DEFAULT NULL,
  `count_comments` int(11) DEFAULT NULL,
  `count_likes` int(11) DEFAULT NULL,
  `count_rates` int(11) DEFAULT NULL,
  `rates` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_blogs
-- ----------------------------
INSERT INTO `cms_blogs` VALUES ('1', '', '31231_cms_blogs_image.jpg', '', '23', '31231', '123', '<p>312</p>', '', '', '9', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', null, '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('2', '', 'asdfasd_cms_blogs_image.jpg', '', 'asdfsf', 'asdfasd', 'asdfasdfasasdfasd', '<p>asdfasdfas</p>', '', '', '', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', null, '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('3', '', '', '', 'sadfasd', 'asdfasd', 'asdfasdf', '<p>fasdfas</p>', '', '', '', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', null, '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('4', '', '', '', 'fdsfds', 'fasdf', 'fadsafdas', '', '', '', '', '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-28', '6', null, '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('5', '', '31231_cms_blogs_image.jpg', '', '23', '31231', '123', '<p>312</p>', '', '', '9', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('6', '', 'asdfasd_cms_blogs_image.jpg', '', 'asdfsf', 'asdfasd', 'asdfasdfasasdfasd', '<p>asdfasdfas</p>', '', '', '', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('7', '', '', '', 'sadfasd', 'asdfasd', 'asdfasdf', '<p>fasdfas</p>', '', '', '', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('8', '', '', '', 'fdsfds', 'fasdf', 'fadsafdas', '', '', '', '', '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('9', '', '31231_cms_blogs_image.jpg', '', '23', '31231', '123', '<p>312</p>', '', '', '9', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('10', '', 'asdfasd_cms_blogs_image.jpg', '', 'asdfsf', 'asdfasd', 'asdfasdfasasdfasd', '<p>asdfasdfas</p>', '', '', '', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('11', '', '', '', 'sadfasd', 'asdfasd', 'asdfasdf', '<p>fasdfas</p>', '', '', '', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('12', '', '', '', 'fdsfds', 'fasdf', 'fadsafdas', '', '', '', '', '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('13', '', '31231_cms_blogs_image.jpg', '', '23', '31231', '123', '<p>312</p>', '', '', '9', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('14', '', 'asdfasd_cms_blogs_image.jpg', '', 'asdfsf', 'asdfasd', 'asdfasdfasasdfasd', '<p>asdfasdfas</p>', '', '', '8', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '7', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('15', '', '', '', 'sadfasd', 'asdfasd', 'asdfasdf', '<p>fasdfas</p>', '', '', '', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('16', '', '', '', 'fdsfds', 'fasdf', 'fadsafdas', '', '', '', '', '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('17', '', '31231_cms_blogs_image.jpg', '', '23', '31231', '123', '<p>312</p>', '', '', '9', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('18', '', 'asdfasd_cms_blogs_image.jpg', '', 'asdfsf', 'asdfasd', 'asdfasdfasasdfasd', '<p>asdfasdfas</p>', '', '', '', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('19', '', '', '', 'sadfasd', 'asdfasd', 'asdfasdf', '<p>fasdfas</p>', '', '', '', '1', '', '', '', '', '0', '1', '0', null, null, null, null, '0', '2017-06-28', '6', '0000-00-00', '', 'mozaweb');
INSERT INTO `cms_blogs` VALUES ('26', 'hng_cms_blogs26_thumbnail.jpg', 'hng_cms_blogs26_image.jpg', 'hng_cms_blogs26_banner.jpg', '1', 'Hường', 'hihi', '<p><span style=\"color:rgb(36, 39, 41)\">I am so confused! in first situation, this function doesn&#39;t generate id as a parameter name, and in second situation, it does! but after manually added id.</span><br />\r\n<span style=\"color:rgb(36, 39, 41)\">What shoud I do to make correct url format with this function?</span></p>', '', '', null, '0', '', 'very good', 'https://stackoverflow.com/questions/23327850/yii-app-createurl-for-view-action', '1', '0', '1', '1', '1222112', '1229993210', '1', '838410', '5', '2017-07-27', '7', '2017-07-27', '7', 'theme1');
INSERT INTO `cms_blogs` VALUES ('27', '', '', '', '2', 'Fukuzawa', 'haha', '<p><span style=\"color:rgb(56, 56, 56)\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</span></p>', '', '', null, '1', '', 'why are you choose', 'http://www.nhaccuatui.com/playlist/nhac-tieng-anh-soi-dong-dang-cap-nhat.iJmtWyBeEgrr.html?st=10', '2', '0', '1', '0', '1241399', '9009999', '2147483647', '2147483647', '2', '2017-07-27', '7', null, '', 'theme1');
INSERT INTO `cms_blogs` VALUES ('28', 'ahiii_cms_blogs28_thumbnail.jpg', 'ahiii_cms_blogs28_image.jpg', 'ahiii_cms_blogs28_banner.jpg', '3', 'Ahiii', 'hehe', '<p>When a test receives input from both a&nbsp;@dataProvider&nbsp;method and from one or more tests it&nbsp;@depends&nbsp;on, the arguments from the data provider will come before the ones from depended-upon tests. The arguments from depended-upon tests will be the&nbsp;</p>', '', '', null, '0', '', '9', 'https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html', '3', '0', '1', '0', '575555559', '2147483647', '68776', '67676786', '2', '2017-07-27', '7', '2017-07-27', '7', 'theme1');
INSERT INTO `cms_blogs` VALUES ('29', 'name1_cms_blogs_thumbnail.jpg', 'name1_cms_blogs_image.jpg', 'name1_cms_blogs_banner.jpg', '1', 'name1', 'I alway smile when you come. Because i like....', '<p>In fact, i feel my life is fun. Just i fighting to it fun&nbsp;</p>', '', '', ',21,', '1', '', 'hihi', 'https://vieclam24h.vn/danh-sach-tin-tuyen-dung-cong-ty-cp-cong-nghe-va-truyen-thong-caia-ntd1751304p1.html', '1', '0', '0', '1', '6799876', '2147483647', '9676897', '67685985', '5', '2017-07-29', '7', null, '', 'olongkar');
INSERT INTO `cms_blogs` VALUES ('30', 'name-2_cms_blogs_thumbnail.jpg', 'name-2_cms_blogs_image.jpg', '', '2', 'name 2', 'He is kindness, fun hihi', '<p>I was learned manything him....</p>', '', '', ',21,', '1', 'vi', 'haha', 'http://mozagroup.com', '2', '1', '1', '1', '5658766', '5685987', '76565', '55875767', '5', '2017-07-29', '7', '2017-07-29', '7', 'olongkar');
INSERT INTO `cms_blogs` VALUES ('31', '', '', '', '1', 'Chú ý :v', 'news/', '<p>hihiiiiiiiiiiiiiiiii</p>', '', '', ',24,', '1', 'en', 'ih', '', '', '0', '1', '0', null, null, null, null, '2', '2017-08-08', '9', null, '', 'olongkar');
INSERT INTO `cms_blogs` VALUES ('32', 'chuyn-gia-apple-tit-l-l-do-iphone-x-gi-cao-ngt-ngng_cms_blogs32_thumbnail.jpg', 'chuyn-gia-apple-tit-l-l-do-iphone-x-gi-cao-ngt-ngng_cms_blogs_image.jpg', '', '', 'Chuyên gia Apple tiết lộ lí do iPhone X giá cao ngất ngưởng', '(Techz.vn) Jony Ive, trưởng bộ phận thiết kế của Apple vừa tiết lộ lí do khiến iPhone X được bán với mức giá cao ngất ngưởng, lên tới hơn 1.000 USD như hiện nay.', '', '', '', '10', '1', '', '', '', 'Apple', '0', null, null, null, null, null, null, null, '2017-11-20', '12', '2017-11-20', '12', 'SellPhone');
INSERT INTO `cms_blogs` VALUES ('33', 'tin-n-iphone-se-2-ang-c-pht-trin-s-ra-mt-na-u-nm-2018_cms_blogs_thumbnail.png', 'tin-n-iphone-se-2-ang-c-pht-trin-s-ra-mt-na-u-nm-2018_cms_blogs_image.jpg', '', '', 'Tin đồn: iPhone SE 2 đang được phát triển, sẽ ra mắt nửa đầu năm 2018', 'Mặc dù nhiều ý kiến cho rằng Apple đang chuẩn bị cho những mẫu iPhone X thế hệ mới vào năm sau, tuy nhiên mới đây, nguồn tin cũng cho biết iPhone SE 2 sẽ ra mắt vào nửa đầu năm 2018.', '<p>Theo&nbsp;<a href=\"https://www.gizchina.com/2017/11/20/iphone-se-2/\" rel=\"nofollow\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(40, 138, 214);\" target=\"_blank\" title=\"iPhone SE 2\">gizchina</a>, Apple đang chuẩn bị iPhone SE 2 để &ldquo;chiến đấu&rdquo; với Galaxy S9 Mini của Samsung v&agrave;o đầu năm 2018.</p>\r\n\r\n<p>Nguồn tin cho biết, iPhone SE 2 sẽ c&oacute; th&ocirc;ng số kỹ thuật tương tự như iPhone 7 từ năm ngo&aacute;i, tuy nhi&ecirc;n n&oacute; c&oacute; m&agrave;n h&igrave;nh nhỏ gọn hơn. Nếu nguồn tin l&agrave; ch&iacute;nh x&aacute;c th&igrave; iPhone SE 2 vẫn c&oacute; thiết kế như iPhone SE hiện tại.</p>\r\n\r\n<p>N&oacute; c&oacute; m&agrave;n h&igrave;nh 4 inch cảm ứng lực, chip Apple A10, ROM 32 GB hoặc 128 GB.Ngo&agrave;i ra, iPhone SE 2 sẽ chạy iOS 11 l&uacute;c ra mắt c&ugrave;ng pin dung lượng 1.700 mAh.</p>\r\n\r\n<p>Về gi&aacute; b&aacute;n, iPhone SE 2 sẽ c&oacute; gi&aacute; 450 USD (khoảng 10.2 triệu đồng) tại thị trường Trung Quốc.</p>', '', '', '', '1', '', '', '', '', '0', null, null, null, null, null, null, null, '2017-11-20', '12', null, '', 'SellPhone');

-- ----------------------------
-- Table structure for `cms_contact`
-- ----------------------------
DROP TABLE IF EXISTS `cms_contact`;
CREATE TABLE `cms_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `overview` varchar(2000) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT 'group:location',
  `linkurl` varchar(255) DEFAULT NULL,
  `live_chat` varchar(2000) DEFAULT NULL COMMENT 'group:CHAT',
  `skype` varchar(255) DEFAULT NULL COMMENT 'group:CHAT',
  `facebook` varchar(255) DEFAULT NULL COMMENT 'group:CHAT',
  `map_url` varchar(2000) DEFAULT NULL COMMENT 'group:location',
  `city` varchar(100) DEFAULT NULL COMMENT 'group:location',
  `country` varchar(100) DEFAULT NULL COMMENT 'group:location',
  `lat` int(11) DEFAULT NULL COMMENT 'group:location',
  `long` int(11) DEFAULT NULL COMMENT 'group:location',
  `type` varchar(100) DEFAULT NULL COMMENT 'data:sale,tech,support,partner;',
  `sort_order` int(11) DEFAULT NULL,
  `is_online` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_contact
-- ----------------------------
INSERT INTO `cms_contact` VALUES ('2', 'mozagroup-group-corporation_cms_contact2_avatar.jpg', 'HỒ CHÍ MINH', 'We have dedicated, trustful, and hard working developers and ready-made solutions that will have you SAVE TIME & COST. Talk to me to get consulting (free)', '+84912738748', 'sellprojectemplate@gmail.com', '17 Phung Chi Kien, Nghia Do, Cau Giay, Ha Noi, Vietnam', '', '', 'project.template', 'Ho Hung', 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14895.143070904624!2d105.79967699999999!3d21.0412563!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2sin!4v1498644291607', '', '', null, null, '', null, null, '1', '1', '2017-06-28', '6', '2017-06-28', '6', 'mozaweb');
INSERT INTO `cms_contact` VALUES ('3', 'mozagroup-group-corporation_cms_contact2_avatar.jpg', 'HÀ NỘI', 'We have dedicated, trustful, and hard working developers and ready-made solutions that will have you SAVE TIME & COST. Talk to me to get consulting (free)', '+84912738748', 'sellprojectemplate@gmail.com', '17 Phung Chi Kien, Nghia Do, Cau Giay, Ha Noi, Vietnam', '', '', 'project.template', 'Ho Hung @', 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14895.143070904624!2d105.79967699999999!3d21.0412563!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2sin!4v1498644291607', '', '', null, null, '', null, null, '1', '1', '2017-06-28', '6', '2017-06-28', '6', 'mozaweb');

-- ----------------------------
-- Table structure for `cms_employee`
-- ----------------------------
DROP TABLE IF EXISTS `cms_employee`;
CREATE TABLE `cms_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `overview` varchar(2000) DEFAULT NULL,
  `content` text,
  `link_url` varchar(255) DEFAULT NULL COMMENT 'group:links;grid:hidden',
  `facebook` varchar(255) DEFAULT NULL COMMENT 'group:links;grid:hidden',
  `twitter` varchar(255) DEFAULT NULL COMMENT 'group:links;grid:hidden',
  `google` varchar(255) DEFAULT NULL COMMENT 'group:links',
  `linkedin` varchar(255) DEFAULT NULL COMMENT 'group:links;grid:hidden',
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `chat` varchar(255) DEFAULT NULL,
  `sort_order` int(5) DEFAULT NULL,
  `is_contact` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_employee
-- ----------------------------
INSERT INTO `cms_employee` VALUES ('1', 'v-th-hng_cms_employee_image.jpg', 'Vũ Thị Hường', 'Manager', 'Tổng giám đốc công ty', '', '', 'huongtlu.facebook.com', '', '', '', 'huongvt201@gmail.com', '0962919840', '', null, null, '1', '1', '2017-11-20', '12', '2017-12-04', '12', 'SellPhone');

-- ----------------------------
-- Table structure for `cms_faq`
-- ----------------------------
DROP TABLE IF EXISTS `cms_faq`;
CREATE TABLE `cms_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text COMMENT 'editor:html',
  `type` varchar(100) DEFAULT NULL COMMENT 'data:COMMON,PURCHASE,SUPPORT',
  `sort_order` int(5) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_faq
-- ----------------------------
INSERT INTO `cms_faq` VALUES ('1', 'àdasdfas', '', '', null, '', '1', '1', '2017-06-29', '6', null, '', 'mozaweb');
INSERT INTO `cms_faq` VALUES ('2', 'hi', '<p>http://danhngon.nhadatso.com/tuyen-tap-nhung-danh-ngon-ve-thanh-cong-hay-nhat.html</p>', 'COMMON', null, '', '0', '1', '2017-07-28', '7', null, '', 'theme1');
INSERT INTO `cms_faq` VALUES ('3', 'ha', '<p>http://danhngon.nhadatso.com/tuyen-tap-nhung-danh-ngon-ve-thanh-cong-hay-nhat.html</p>', '', null, '', '1', '0', '2017-07-28', '7', null, '', 'theme1');
INSERT INTO `cms_faq` VALUES ('4', 'aha', '<p><span style=\"color:rgb(85, 85, 85)\">The key to success is to focus our conscious mind on things we desire not things we fear.</span></p>', '', null, '', '1', '0', '2017-07-28', '7', null, '', 'theme1');

-- ----------------------------
-- Table structure for `cms_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `cms_feedback`;
CREATE TABLE `cms_feedback` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `user_id` varchar(100) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for `cms_page`
-- ----------------------------
DROP TABLE IF EXISTS `cms_page`;
CREATE TABLE `cms_page` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `content` text,
  `keywords` varchar(500) DEFAULT NULL,
  `page_image` varchar(300) DEFAULT NULL,
  `page_title` varchar(300) DEFAULT NULL,
  `page_slug` varchar(255) DEFAULT NULL,
  `page_description` varchar(2000) DEFAULT NULL,
  `page_content` text,
  `page_width` varchar(255) DEFAULT NULL,
  `page_background` varchar(255) DEFAULT NULL,
  `body_css` varchar(255) DEFAULT NULL,
  `body_style` varchar(255) DEFAULT NULL,
  `page_style` text,
  `page_script` text,
  `views_count` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `application_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cms_page
-- ----------------------------
INSERT INTO `cms_page` VALUES ('1', 'frontend/System/site', '', 'site', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '0', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('2', 'kiki', 'kiki.png', 'site', '1234567890', '12345678', '12345678', '12345678', '23456789', '234', '567893456', '78903', '456789', '345678', '345678', '34567', '34567', '45678', '4567', '1', null, null, null, null);
INSERT INTO `cms_page` VALUES ('3', 'frontend/Cms/contact', '', 'contact', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '0', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('4', 'frontend/Cms/news', '', 'news', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '0', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('5', 'frontend/Cms/about', '', 'about', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '0', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('6', 'frontend/Cms/portfolio', '', 'portfolio', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '0', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('7', 'frontend/Ecommerce/product', '', 'product', '', '', '', '', 'Products', '', '', '', '', '', '', '', '', '', null, '0', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('8', 'frontend/Cms/faq', '', 'faq', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '0', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('9', 'backend/System/settings-schema', '', 'settings-schema', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('10', 'home', '', 'site', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('11', 'Cms/portfolio', '', 'portfolio', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('12', 'Ecommerce/product', '', 'product', '', '', '', '', 'Products', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('13', 'error', '', 'site', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('14', 'Cms/faq', '', 'faq', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('15', 'Cms/news', '', 'news', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-06-29', '6', '0');
INSERT INTO `cms_page` VALUES ('16', 'contact', '', 'site', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-07-01', '6', '0');
INSERT INTO `cms_page` VALUES ('17', 'cms/about', '', 'about', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-07-01', '6', '0');
INSERT INTO `cms_page` VALUES ('18', 'ecommerce/order/viewcart', '', 'order', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-07-01', '6', '0');
INSERT INTO `cms_page` VALUES ('19', 'ecommerce/order/bill', '', 'order', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-07-01', '6', '0');
INSERT INTO `cms_page` VALUES ('20', 'ecommerce/order/checkout', '', 'order', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-07-01', '6', '0');
INSERT INTO `cms_page` VALUES ('21', 'login', '', 'site', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '0', null, '2017-07-01', '6', '0');
INSERT INTO `cms_page` VALUES ('22', 'ecommerce/product/view', '', 'product', '', '', '', '', 'Product', '', '', '', '', '', '', '', '', '', null, '0', null, '2017-07-19', '', '0');
INSERT INTO `cms_page` VALUES ('23', 'cms/contact', '', 'contact', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '0', null, '2017-07-19', '', '0');
INSERT INTO `cms_page` VALUES ('27', 'cms/news/list', 'news_cms_page27_image.jpg', 'news', 'funny', '<p>a little..........</p>', '567', 'news_cms_page27_page_image.jpg', 'uoiu', 'oouu', '', '', '', '', '', '', '', '', null, '1', null, '2017-07-29', '7', '0');
INSERT INTO `cms_page` VALUES ('28', 'cms/news/view', 'news_cms_page28_image.jpg', 'news', 'hihi', '<p>Test1..............</p>', '126', 'news_cms_page28_page_image.jpg', 'io', 'hjk', 'good', 'hihihi', '58', '878', 'green', 'height 56', 'yyh', 'phpmyafmin', null, '1', null, '2017-07-30', '7', '0');
INSERT INTO `cms_page` VALUES ('29', 'backend//error', '', 'site', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-08-02', '7', '0');
INSERT INTO `cms_page` VALUES ('30', 'ecommerce/product/list', '', 'product', '', '', '', '', 'Products', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-08-08', '8', '0');
INSERT INTO `cms_page` VALUES ('31', 'cms/contact', '', 'contact', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-08-30', '', '0');
INSERT INTO `cms_page` VALUES ('32', 'backend/ecommerce/ecommerce-reservation', '', 'ecommerce-reservation', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-11-20', '12', '0');
INSERT INTO `cms_page` VALUES ('33', 'ecommerce/product/view', '', 'product', '', '', '', '', 'Product', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-12-03', '', '0');
INSERT INTO `cms_page` VALUES ('34', 'login', '', 'site', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1', null, '2017-12-03', '', '0');

-- ----------------------------
-- Table structure for `cms_partner`
-- ----------------------------
DROP TABLE IF EXISTS `cms_partner`;
CREATE TABLE `cms_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `hotline` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `overview` varchar(1000) DEFAULT NULL,
  `sort_order` tinyint(5) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_partner
-- ----------------------------

-- ----------------------------
-- Table structure for `cms_portfolio`
-- ----------------------------
DROP TABLE IF EXISTS `cms_portfolio`;
CREATE TABLE `cms_portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) DEFAULT NULL,
  `banner` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `overview` varchar(2000) DEFAULT NULL,
  `content` text,
  `tags` varchar(2000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `testimonial_id` int(11) DEFAULT NULL COMMENT 'editor:select;lookup:@cms_testimonial',
  `product_id` int(11) DEFAULT NULL COMMENT 'editor:select;lookup:@product',
  `product_category_id` varchar(500) DEFAULT NULL COMMENT 'editor:select;lookup:@object_category',
  `lang` varchar(50) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_portfolio
-- ----------------------------
INSERT INTO `cms_portfolio` VALUES ('1', '', '', 'LIVE SCORES 5 IN 1', 'The best live score app for the top 5 leagues in Europe (All in one).\r\n\r\nWith this app on your device, the entire 2016/2017 season of Premier League, Bundesliga, La Liga, Ligue 1 and Seria A are in your pocket.', '<p>The best live score app for the top 5 leagues in Europe (All in one).</p>\r\n\r\n<p>With this app on your device, the entire 2016/2017 season of Premier League, Bundesliga, La Liga, Ligue 1 and Seria A are in your pocket.</p>', '[\"All\",\"Website\"]', '', 'https://play.google.com/store/apps/details?id=com.apptunez.fiveleagues', null, null, '', '', null, '1', '1', '2017-07-01', '6', '2017-07-01', '6', 'mozaweb');
INSERT INTO `cms_portfolio` VALUES ('2', '', '', 'EPL LIVE SCORES', 'The best live score app for the new Premier League season 2016/2017.\r\n\r\nWith this app on your device, the entire Premier League season 2016/2017 is in your pocket.', '<p>The best live score app for the new Premier League season 2016/2017.</p>\r\n\r\n<p>With this app on your device, the entire Premier League season 2016/2017 is in your pocket.</p>', '[\"Mobile\",\"Outsourcing\"]', '', '', null, null, '', '', null, '1', '1', '2017-07-01', '6', null, '', 'mozaweb');
INSERT INTO `cms_portfolio` VALUES ('3', 'h_cms_portfolio_image.jpg', 'h_cms_portfolio_banner.jpg', 'H', 'hohii', '<p><span style=\"color:rgb(85, 85, 85)\">The key to success is to focus our conscious mind on things we desire not things we fear.</span></p>', 'hih', '', 'http://danhngon.nhadatso.com/tuyen-tap-nhung-danh-ngon-ve-thanh-cong-hay-nhat.html', null, '12', '', 'kr', null, '0', '1', '2017-07-28', '7', null, '', 'theme1');
INSERT INTO `cms_portfolio` VALUES ('4', 'khang_cms_portfolio_image.jpg', 'khang_cms_portfolio_banner.jpg', 'Khang', 'Best friends', '<p>When i and you is friend. You was listented so much and understand...</p>', 'Hương Nguyễn', '', 'http://nhachay.mobi/bai-hat/72330/Ban-Nhac-Tieng-Anh-Soi-Dong-Remix-Dance.html', null, null, '', 'kr', null, '1', '1', '2017-08-01', '7', null, '', 'theme3');

-- ----------------------------
-- Table structure for `cms_service`
-- ----------------------------
DROP TABLE IF EXISTS `cms_service`;
CREATE TABLE `cms_service` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `overview` varchar(2000) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_service
-- ----------------------------
INSERT INTO `cms_service` VALUES ('1', '12', null, 'a', null, 'hihi', '1', '23', '3', '1', '1', '0000-00-00', '2012/2/15', '2012-12-01', '2013/2/12', 'theme1');

-- ----------------------------
-- Table structure for `cms_slide`
-- ----------------------------
DROP TABLE IF EXISTS `cms_slide`;
CREATE TABLE `cms_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `overview` varchar(1000) DEFAULT NULL,
  `transition_type` varchar(50) DEFAULT NULL,
  `transition_speed` varchar(50) DEFAULT NULL,
  `alignment` varchar(50) DEFAULT NULL,
  `lang` varchar(20) DEFAULT NULL,
  `url1_label` varchar(255) DEFAULT NULL,
  `url1_link` varchar(255) DEFAULT NULL,
  `url2_label` varchar(255) DEFAULT NULL,
  `url2_link` varchar(255) DEFAULT NULL,
  `url3_label` varchar(255) DEFAULT NULL,
  `url3_link` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_slide
-- ----------------------------
INSERT INTO `cms_slide` VALUES ('1', 'hehe_cms_slide1_image.jpg', 'hehe', ':vvvv', '', '', '', '', 'file:///C:/Users/huong/Documents/theme1_flatlab/index.html', 'google.com', 'hi', '', 'dfhtiujtuj', '', null, '1', 'mozaweb');
INSERT INTO `cms_slide` VALUES ('2', 'fgrkyujgn_cms_slide_image.png', 'fgrkyujgn', '', '', '', '', '', 'e7iyujmbn', '', 'iop\'l;.', '', 'o8yulkhmn', '', null, '1', 'mozaweb');
INSERT INTO `cms_slide` VALUES ('3', 'hng_cms_slide3_image.jpg', 'Hường', 'Hard', '', '', '', '', 'https://sites.google.com/a/wru.vn/my-picture/', 'https://sites.google.com/a/wru.vn/website-learned/', '', '', '', '', null, '1', 'mozaweb');
INSERT INTO `cms_slide` VALUES ('4', 'database-subject_cms_slide_image.jpg', 'Database subject', 'class 57TH2( 2017)', 'random', '500', 'right', 'en', 'Group my class......', 'https://www.facebook.com/groups/1647586895515832/?multi_permalinks=1959618500979335&notif_t=group_activity&notif_id=1501473651782366', 'Where  you have fun...', 'http://www.rd.com/jokes/funny-stories/', 'The story travel', 'https://sites.google.com/a/wru.vn/behuong_57th2_programlanguage/my-blogger', null, '0', 'theme1');
INSERT INTO `cms_slide` VALUES ('5', 'travel-bavi-57th2_cms_slide_image.jpg', 'Travel Bavi 57TH2', '(Blog 2017)', '3dcurtain-vertical', '1000', 'right', 'cn', 'hihi', 'http://www.rd.com/funny-stuff/funny-mom-stories/', 'haha', 'http://www.rd.com/funny-stuff/funny-dads/', 'Memory', 'https://www.youtube.com/watch?v=iDa9li1sJQY', null, '1', 'theme1');
INSERT INTO `cms_slide` VALUES ('6', 'playinng-sport_cms_slide_image.jpg', 'Playinng Sport', 'cms/cms-blog', 'random', '1500', 'right', 'en', 'hehe', 'http://getbootstrap.com/components/', 'hí hí', 'https://www.youtube.com/watch?v=IwsUkZ-1zjk', 'Sport & Công Phượng', 'http://danviet.vn/the-thao/fox-sport-danh-gia-bat-ngo-ve-cong-phuong-792262.html', null, '1', 'theme1');

-- ----------------------------
-- Table structure for `cms_statistics`
-- ----------------------------
DROP TABLE IF EXISTS `cms_statistics`;
CREATE TABLE `cms_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` bigint(20) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_top` int(11) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_statistics
-- ----------------------------
INSERT INTO `cms_statistics` VALUES ('4', 'PRODUCTS', '49', '<i class=\"fa fa-user\"></i>', null, '1', '1', 'mozaweb');
INSERT INTO `cms_statistics` VALUES ('5', 'WORKING HOURS', '19444', '<i class=\"fa fa-database\"></i>', null, '1', '1', 'mozaweb');
INSERT INTO `cms_statistics` VALUES ('6', 'HAPPY CLIENTS', '315', '<i class=\"fa fa-eye\"></i>', null, '1', '1', 'mozaweb');
INSERT INTO `cms_statistics` VALUES ('7', 'PROJECTS DONE', '168', '<i class=\"fa fa-money\"></i>', null, '1', '1', 'mozaweb');

-- ----------------------------
-- Table structure for `cms_testimonial`
-- ----------------------------
DROP TABLE IF EXISTS `cms_testimonial`;
CREATE TABLE `cms_testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `rate` int(10) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_testimonial
-- ----------------------------
INSERT INTO `cms_testimonial` VALUES ('1', '', 'Myo Min Thu,', '', '', '<p>Projectemplate is super awesome team. I am so happy to find them out for my projects. They are so hardware working and after sale service is also top notch. Looking forward to work with them for my upcoming projects. Keep it up guys. Really appreciate for your efforts on my project.</p>', '0', '', null, '1', '1', '2017-06-28', '6', null, '', 'mozaweb');
INSERT INTO `cms_testimonial` VALUES ('2', '', 'Saruhan Köle,', '', '', '<p><span style=\"color:rgb(34, 34, 34)\">as a owner a digiatal agency and a developer, we have worked with project template as a solution partner. We were very satisfied of working with their firendly and hardworking team. thanks for all.. hope to work on another project</span></p>', '0', '', null, '1', '1', '2017-06-28', '6', null, '', 'mozaweb');

-- ----------------------------
-- Table structure for `cms_widgets`
-- ----------------------------
DROP TABLE IF EXISTS `cms_widgets`;
CREATE TABLE `cms_widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overview` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `display_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `columns_count` int(11) DEFAULT NULL,
  `items_count` int(11) DEFAULT NULL,
  `width_css` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_css` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color_bg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `style` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_style` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_layout` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_viewmore` tinyint(1) DEFAULT NULL,
  `show_headline` tinyint(1) DEFAULT NULL,
  `viewmore_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `application_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cms_widgets
-- ----------------------------
INSERT INTO `cms_widgets` VALUES ('10', 'FProduct', 'Ecommerce/product', '', '', '', 'fgrid1', '4', null, '', '', '', '', '', '', '', null, null, '', '1', null, '2017-06-29', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('11', 'FChat', 'common', '', '', '', 'chat_fb1.php', null, null, '', '', '', '', '', '', '', null, null, '', '1', null, '2017-07-01', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('12', 'FGoogleAnalytic', 'common', '', '', '', 'google_analytic.php', null, null, '', '', '', '', '', '', '', null, null, '', '1', null, '2017-07-01', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('13', 'FProduct_w0', 'ecommerce/product', '', '', '', 'fgrid1', '4', null, '', '', '', '', '', '', '', null, null, '', '1', null, '2017-07-01', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('14', 'FPageHeader_w0', 'cms/portfolio', '', 'LIVE SCORES 5 IN 1', '', '', null, null, '', '', '', '', '', '', '', null, null, '', '1', null, '2017-07-01', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('15', 'FView_w1', 'cms/portfolio', '', '', '', 'fproduct', null, null, '', '', '', '#797777', '', '', '', null, null, '', '1', null, '2017-07-01', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('17', 'BaseWidget_Cart', 'ecommerce/product', '', '', '', '', null, null, '', '', '', '', 'padding: 20px; width:100%;background-color: #f7f7f7; border:3px solid #508910', '', '', '0', '0', '', '1', null, '2017-07-01', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('18', 'FPageHeader_w0', 'cms/about', 'Giới thiệu', '', '', 'pageheader_blank', null, null, '', '', '', '', '', '', '', null, null, '', '1', null, '2017-07-02', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('19', 'FPageHeader_w0', 'contact', 'Contact Us', '', '', 'pageheader_blank', null, null, '', '', '', '', '', '', '', null, null, '', '1', null, '2017-07-02', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('20', 'FPageHeader_w0', 'cms/news', 'Blogs', '', '', 'pageheader_blank', null, null, '', '', '', '', '', '', '', null, null, '', '1', null, '2017-07-02', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('21', 'FPageHeader_w0', 'ecommerce/product', 'Sản phẩm', '', '', 'pageheader_blank', null, null, '', '', '', '', '', '', '', null, null, '', '1', null, '2017-07-02', '6', 'mozaweb');
INSERT INTO `cms_widgets` VALUES ('22', 'FProduct_w1', 'ecommerce/product', '', '', '', 'fgrid1', '4', null, '', '', '', '', '', '', '', null, null, '', '1', null, '2017-07-02', '6', 'mozaweb');

-- ----------------------------
-- Table structure for `crm_client`
-- ----------------------------
DROP TABLE IF EXISTS `crm_client`;
CREATE TABLE `crm_client` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `content` text,
  `start_date` varchar(255) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_title` varchar(100) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `business_license` varchar(255) DEFAULT NULL,
  `tax_code` varchar(255) DEFAULT NULL,
  `payment_info` varchar(2000) DEFAULT NULL,
  `payment_term` varchar(2000) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `note` text,
  `tags` varchar(4000) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `sale_user` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_date` date DEFAULT NULL,
  `modified_date` date NOT NULL,
  `appication_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of crm_client
-- ----------------------------

-- ----------------------------
-- Table structure for `ecommerce_order`
-- ----------------------------
DROP TABLE IF EXISTS `ecommerce_order`;
CREATE TABLE `ecommerce_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL COMMENT 'lookup:@app_user',
  `billing_name` varchar(255) NOT NULL COMMENT 'group:Billing',
  `billing_phone` varchar(255) NOT NULL COMMENT 'group:Billing',
  `billing_address` varchar(1000) NOT NULL COMMENT 'group:Billing',
  `billing_email` varchar(255) DEFAULT NULL COMMENT 'group:Billing',
  `billing_postcode` varchar(255) DEFAULT NULL COMMENT 'group:Billing',
  `billing_city` varchar(255) DEFAULT NULL COMMENT 'group:Billing',
  `billing_state` varchar(255) DEFAULT NULL COMMENT 'group:Billing',
  `billing_country` varchar(255) DEFAULT NULL COMMENT 'group:Billing',
  `shipping_address` varchar(2000) DEFAULT NULL COMMENT 'group:Shipping',
  `shipping_time` varchar(255) DEFAULT NULL COMMENT 'group:Shipping',
  `shipping_note` varchar(2000) DEFAULT NULL COMMENT 'group:Shipping',
  `order_date` varchar(200) DEFAULT NULL COMMENT 'group:Order',
  `order_detail` text COMMENT 'group:Order',
  `order_note` text COMMENT 'group:Order',
  `order_type` varchar(100) DEFAULT NULL COMMENT 'group:Order;data:web,mobile,call,direct,agency',
  `order_status` varchar(100) DEFAULT NULL COMMENT 'group:Order;data:pending,approved,processing,finish,done,fail',
  `is_active` tinyint(1) DEFAULT NULL COMMENT 'group:Order',
  `price_total` float(10,2) DEFAULT NULL COMMENT 'group:Payment',
  `tax` varchar(500) DEFAULT NULL COMMENT 'group:Payment',
  `price_tax` float(10,2) DEFAULT NULL COMMENT 'group:Payment',
  `promotion_code` varchar(255) DEFAULT NULL COMMENT 'group:Payment',
  `price_discount` float(10,0) DEFAULT NULL COMMENT 'group:Payment',
  `price_shipping` float(10,2) DEFAULT NULL COMMENT 'group:Payment',
  `price_final` float DEFAULT NULL COMMENT 'group:Payment',
  `payment_method` varchar(100) DEFAULT NULL COMMENT 'group:Payment;data:cash,point,credit,cod,bank',
  `payment_status` varchar(100) DEFAULT NULL COMMENT 'group:Payment;data:0:unpaid,1:paid',
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecommerce_order
-- ----------------------------
INSERT INTO `ecommerce_order` VALUES ('79', '', 'Ho Hung', '8883333', 'FDSF', 'hung.hoxuan@gmail.com', 'FDS', 'FSD', '', 'FSD', '', '', null, '', '', '[{\"firstname\":\"Hung\",\"lastname\":\"Ho\",\"type\":\"adult\",\"leader\":1},{\"firstname\":\"Ha\",\"lastname\":\"Ha\",\"type\":\"adult\",\"leader\":0},{\"firstname\":\"Hi\",\"lastname\":\"Hi\",\"type\":\"frant\",\"leader\":0},{\"firstname\":\"Lin\",\"lastname\":\"FDS\",\"type\":\"frant\",\"leader\":0}]', '', '', null, '1.00', '', '0.00', '', '0', '0.00', '1', '', '', '2017-02-22 17:24:20', '6', '2017-02-22 17:24:21', '6', null);
INSERT INTO `ecommerce_order` VALUES ('80', '', 'Ho Hung DFD', 'FDFDF', 'FDSFDSF', 'hung.hoxuan@gmail.com', 'DFDSFDS', 'FSDF', '', 'FDSFDS', '', '', '', '', '', '[{\"firstname\":\"FDS\",\"lastname\":\"FDSF\",\"type\":\"adult\",\"leader\":1},{\"firstname\":\"FDS\",\"lastname\":\"FDS\",\"type\":\"adult\",\"leader\":0},{\"firstname\":\"FSD\",\"lastname\":\"FDS\",\"type\":\"frant\",\"leader\":0},{\"firstname\":\"FDS\",\"lastname\":\"FSDFD\",\"type\":\"frant\",\"leader\":0}]', '', '', null, '1.00', '', '0.00', '', '0', '0.00', '1', '', '', '2017-02-23 16:49:37', '6', '2017-02-23 16:50:33', '6', 'default');
INSERT INTO `ecommerce_order` VALUES ('81', '', 'Ho Mr', '939393', '17 Phung CHi Kien', 'hung.hoxuan@gmail.com', 'DFD', 'Hanoi', '', 'Vietnam', '', '', '', '', '[]', '', '', '', null, '1.00', '', '0.00', '', '0', '0.00', '1', '', '', '2017-03-02 10:12:59', '6', '2017-03-02 10:26:00', '6', 'default');
INSERT INTO `ecommerce_order` VALUES ('82', '', 'Ho Hung', 'Hihih', 'n/a', 'hung.hoxuan@gmail.com', '', '', '', '', '', '', '', '', '[]', '', '', '', null, '2.00', '', '0.00', '', '0', '0.00', '2', '', '', '2017-03-03 04:30:27', '', null, '', 'default');
INSERT INTO `ecommerce_order` VALUES ('83', '', 'Ho Hung', '0912738748', 'n/a', 'hung.hoxuan@gmail.com', '', '', '', '', '', '', '', '', '[]', '', '', '', null, '2.00', '', '0.00', '', '0', '0.00', '2', '', '', '2017-03-04 02:55:13', '', null, '', 'default');
INSERT INTO `ecommerce_order` VALUES ('84', '', 'Ho Hung', 'FDSFDS', 'n/a', 'hung@azstack.co', '', '', '', '', '', '', '', '', '[]', '', '', '', null, '2.00', '', '0.00', '', '0', '0.00', '2', '', '', '2017-03-08 04:37:53', '6', null, '', 'default');
INSERT INTO `ecommerce_order` VALUES ('85', '', 'Ho Hung', '0993333', 'n/a', 'hung.hoxuan@gmail.com', '', '', '', '', '', '', '', '', '[]', '', '', '', null, '0.00', '', '0.00', '', '0', '0.00', '0', '', '', '2017-07-01 09:40:48', '6', '2017-07-01 09:41:45', '6', 'mozaweb');
INSERT INTO `ecommerce_order` VALUES ('86', '', 'Ho Hung', '3333', 'FSDFSDFDS', 'hung.hoxuan@gmail.com', 'FDSFSDFSD', 'FDSFSD', '', 'FDSFSD', '', '', '', '', '[]', '', '', '', null, '0.00', '', '0.00', '', '0', '0.00', '0', '', '', '2017-07-01 12:08:51', '6', null, '', 'mozaweb');
INSERT INTO `ecommerce_order` VALUES ('87', '', 'Vũ Thị Hường', '091234556', 'HÀ Nội', 'huongvt2131@gmail,com', '12345', 'HÀ Nội', '2345`', 'VN', '', '', '', '12/12/2017', '', 'd', '', '', '0', '2345.00', '', '768.00', '', '6789', '6798.00', '5687', 'bank', 'paid', '2017-11-29 08:22:49', '12', '2017-11-29 08:23:25', '12', 'SellPhone');
INSERT INTO `ecommerce_order` VALUES ('88', '', 'Trần Hoàng Anh', '09832687', 'Hà Nội', 'anh nt@gmail,com', '', '', '', '', '', '', '', '', '', '', '', '', '1', null, '', null, '', null, null, null, '', '', '2017-12-03 14:24:41', '12', null, '', 'SellPhone');

-- ----------------------------
-- Table structure for `ecommerce_order_item`
-- ----------------------------
DROP TABLE IF EXISTS `ecommerce_order_item`;
CREATE TABLE `ecommerce_order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` varchar(2000) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecommerce_order_item
-- ----------------------------
INSERT INTO `ecommerce_order_item` VALUES ('83', '79', '1', 'Bộ Neo DUL/SSPC 6-19 (bát+ nêm)', '', '1', '1', '1');
INSERT INTO `ecommerce_order_item` VALUES ('89', '80', '1', 'Bộ Neo DUL/SSPC 6-19 (bát+ nêm)', '', '1', '1', '1');
INSERT INTO `ecommerce_order_item` VALUES ('92', '81', '3', 'Bộ Neo DUL/SSPC F6-3 (bát+ nêm)', '<p>fsdafasfa</p>', '1', '1', '1');
INSERT INTO `ecommerce_order_item` VALUES ('93', '82', '3', 'Bộ Neo DUL/SSPC F6-3 (bát+ nêm)', '<p>fsdafasfa</p>', '2', '1', '2');
INSERT INTO `ecommerce_order_item` VALUES ('94', '83', '13', 'Bộ Neo DUL/SSPC 6-19 (bát+ nêm)', '<p>H<img alt=\"\" src=\"/framework/backend/web/upload/editor/files/Screenshot%20(2).png\" style=\"height:133px; line-height:20.8px; width:200px\" />HHHH a aa</p>', '2', '1', '2');
INSERT INTO `ecommerce_order_item` VALUES ('95', '84', '13', 'Bộ Neo DUL/SSPC 6-19 (bát+ nêm)', '<p>H<img alt=\"\" src=\"/framework/backend/web/upload/editor/files/Screenshot%20(2).png\" style=\"height:133px; line-height:20.8px; width:200px\" />HHHH a aa</p>', '2', '1', '2');
INSERT INTO `ecommerce_order_item` VALUES ('99', '85', '10', 'ưerw', '', '6', '0', '0');

-- ----------------------------
-- Table structure for `ecommerce_reservation`
-- ----------------------------
DROP TABLE IF EXISTS `ecommerce_reservation`;
CREATE TABLE `ecommerce_reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL COMMENT 'group:BUYER;lookup:@app_user;',
  `buyer_name` varchar(255) DEFAULT NULL COMMENT 'group:BUYER;',
  `buyer_note` text COMMENT 'group:BUYER;',
  `buyer_confirm` tinyint(1) DEFAULT '1' COMMENT 'group:BUYER;',
  `buyer_visible` tinyint(1) DEFAULT '1' COMMENT 'group:BUYER;',
  `seller_id` int(11) NOT NULL COMMENT 'group:PROVIDER;lookup:@app_user',
  `seller_name` varchar(255) DEFAULT NULL COMMENT 'group:PROVIDER;',
  `seller_note` text COMMENT 'group:PROVIDER;',
  `seller_confirm` tinyint(1) DEFAULT '1' COMMENT 'group:PROVIDER;',
  `seller_visible` tinyint(1) DEFAULT '1' COMMENT 'group:PROVIDER;',
  `deal_id` int(11) DEFAULT NULL COMMENT 'group:DEAL;',
  `deal_name` varchar(255) DEFAULT NULL COMMENT 'group:DEAL;',
  `price` float(10,2) DEFAULT '0.00' COMMENT 'group:DEAL;',
  `time` varchar(255) DEFAULT NULL COMMENT 'group:DEAL;',
  `payment_method` varchar(100) DEFAULT NULL COMMENT 'group:DEAL;data:point,credit,cash,paypal,cod',
  `payment_status` varchar(100) DEFAULT NULL COMMENT 'group:DEAL;data:0:Unpaid,1:Paid',
  `status` varchar(100) DEFAULT NULL COMMENT 'group:DEAL;data:pending,approved,rejected,processing,finish,fail',
  `is_active` tinyint(1) DEFAULT NULL COMMENT 'group:DEAL;',
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecommerce_reservation
-- ----------------------------
INSERT INTO `ecommerce_reservation` VALUES ('1', '5', 'null', null, '1', '1', '1', 'Stephen Hy', null, '0', '1', '39', 'Làm vợ anh nhé', '0.00', '1486455377', null, null, 'rejected', '1', '2017-02-07 02:16:17', null, null, null, null);
INSERT INTO `ecommerce_reservation` VALUES ('2', '5', 'null', null, '1', '1', '1', 'Stephen Hy', null, '0', '1', '39', 'Làm vợ anh nhé', '0.00', '1486455411', null, null, 'rejected', '1', '2017-02-07 02:16:51', null, null, null, null);
INSERT INTO `ecommerce_reservation` VALUES ('3', '27', 'Hienpt', null, '1', '1', '1', 'Stephen Hy', null, '0', '1', '56', 'Làm mẹ của con a nhé', '0.00', '1486455505', null, null, 'rejected', '1', '2017-02-07 02:18:25', null, null, null, null);
INSERT INTO `ecommerce_reservation` VALUES ('4', '9', 'null', null, '1', '1', '1', 'Stephen Hy', null, '0', '1', '56', 'Làm mẹ của con a nhé', '0.00', '1486455562', null, null, 'rejected', '1', '2017-02-07 02:19:22', null, null, null, null);
INSERT INTO `ecommerce_reservation` VALUES ('5', '9', 'null', null, '1', '1', '14', 'Na Pro', null, '0', '1', '58', 'Nothing', '0.00', '1486456476', null, null, 'rejected', '1', '2017-02-07 02:33:34', null, '2017-02-07 02:34:36', null, null);
INSERT INTO `ecommerce_reservation` VALUES ('6', '13', 'Van1', null, '1', '1', '14', 'Na Pro', null, '1', '1', '58', 'Nothing', '0.00', '1486456515', null, null, 'pending', '1', '2017-02-07 02:35:15', null, null, null, null);
INSERT INTO `ecommerce_reservation` VALUES ('7', '9', 'null', null, '1', '1', '14', 'Na Pro', null, '0', '1', '58', 'Nothing', '0.00', '1486457120', null, null, 'rejected', '1', '2017-02-07 02:44:48', null, '2017-02-07 02:45:20', null, null);
INSERT INTO `ecommerce_reservation` VALUES ('8', '29', 'null', null, '1', '1', '14', 'Na Pro', null, '1', '1', '58', 'Nothing', '0.00', '1486458016', null, null, 'pending', '1', '2017-02-07 03:00:16', null, null, null, null);
INSERT INTO `ecommerce_reservation` VALUES ('9', '9', 'null', null, '1', '1', '14', 'Na Pro', null, '1', '1', '58', 'Nothing', '0.00', '1486458761', null, null, 'pending', '1', '2017-02-07 03:06:12', null, '2017-02-07 03:12:41', null, null);
INSERT INTO `ecommerce_reservation` VALUES ('10', '5', 'null', null, '1', '1', '28', 'Hienpt123', null, '1', '1', '63', 'Te', '25908.00', '1486459963', 'point', '1', 'pending', '1', '2017-02-07 03:32:43', null, null, null, null);
INSERT INTO `ecommerce_reservation` VALUES ('11', '5', 'null', null, '1', '1', '28', 'Hienpt123', null, '1', '1', '64', 'G', '7.00', '1486460757', 'point', '1', 'pending', '1', '2017-02-07 03:45:57', null, null, null, null);
INSERT INTO `ecommerce_reservation` VALUES ('12', '2', 'Hienpt123', '', '1', '1', '1', 'Van1 FSD', 'FSDFSDFSD\\\r\nFSD\r\nFSD', '1', '1', '61', 'Deal 99', '2580.00', '1486461149', 'cash', '', 'pending', '1', '2017-02-07 03:52:29', '', '2017-02-23 08:38:15', '6', '');

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------

-- ----------------------------
-- Table structure for `object_actions`
-- ----------------------------
DROP TABLE IF EXISTS `object_actions`;
CREATE TABLE `object_actions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` varchar(100) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `name` varchar(2000) DEFAULT NULL,
  `old_content` text,
  `content` text NOT NULL,
  `action` varchar(100) NOT NULL COMMENT 'data:comment,create,update,delete,approve,reject,feedback',
  `is_active` tinyint(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of object_actions
-- ----------------------------
INSERT INTO `object_actions` VALUES ('140', '1', 'cms_portfolio', 'CREATE. Changed fields: id, name, overview, content, tags, linkurl, is_active, is_top, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",1],[\"name\",\"\",\"LIVE SCORES 5 IN 1\"],[\"overview\",\"\",\"The best live score app for the top 5 leagues in Europe (All in one).\\r\\n\\r\\nWith this app on your device, the entire 2016\\/2017 season of Premier League, Bundesliga, La Liga, Ligue 1 and Seria A are in your pocket.\"],[\"content\",\"\",\"<p>The best live score app for the top 5 leagues in Europe (All in one).<\\/p>\\r\\n\\r\\n<p>With this app on your device, the entire 2016\\/2017 season of Premier League, Bundesliga, La Liga, Ligue 1 and Seria A are in your pocket.<\\/p>\"],[\"tags\",\"\",\"[\\\"All\\\",\\\"Mobile\\\"]\"],[\"linkurl\",\"\",\"https:\\/\\/play.google.com\\/store\\/apps\\/details?id=com.apptunez.fiveleagues\"],[\"is_active\",\"\",\"1\"],[\"is_top\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-01 04:35:19\"],[\"created_user\",\"\",6],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 04:35:19', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('141', '1', 'cms_portfolio', 'UPDATE. Changed fields: tags, modified_date, modified_user,', '{\"id\":1,\"image\":\"\",\"banner\":\"\",\"name\":\"LIVE SCORES 5 IN 1\",\"overview\":\"The best live score app for the top 5 leagues in Europe (All in one).\\r\\n\\r\\nWith this app on your device, the entire 2016\\/2017 season of Premier League, Bundesliga, La Liga, Ligue 1 and Seria A are in your pocket.\",\"content\":\"<p>The best live score app for the top 5 leagues in Europe (All in one).<\\/p>\\r\\n\\r\\n<p>With this app on your device, the entire 2016\\/2017 season of Premier League, Bundesliga, La Liga, Ligue 1 and Seria A are in your pocket.<\\/p>\",\"tags\":\"[\\\"All\\\",\\\"Mobile\\\"]\",\"status\":\"\",\"linkurl\":\"https:\\/\\/play.google.com\\/store\\/apps\\/details?id=com.apptunez.fiveleagues\",\"testimonial_id\":null,\"product_id\":null,\"product_category_id\":\"\",\"lang\":\"\",\"sort_order\":null,\"is_active\":1,\"is_top\":1,\"created_date\":\"2017-07-01\",\"created_user\":\"6\",\"modified_date\":null,\"modified_user\":\"\",\"application_id\":\"mozaweb\"}', '[[\"tags\",\"[\\\"All\\\",\\\"Mobile\\\"]\",\"[\\\"All\\\",\\\"Website\\\"]\"],[\"modified_date\",null,\"2017-07-01 04:36:31\"],[\"modified_user\",\"\",6]]', 'update', '1', '2017-07-01 04:36:32', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('142', '2', 'cms_portfolio', 'CREATE. Changed fields: id, name, overview, content, tags, is_active, is_top, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",2],[\"name\",\"\",\"EPL LIVE SCORES\"],[\"overview\",\"\",\"The best live score app for the new Premier League season 2016\\/2017.\\r\\n\\r\\nWith this app on your device, the entire Premier League season 2016\\/2017 is in your pocket.\"],[\"content\",\"\",\"<p>The best live score app for the new Premier League season 2016\\/2017.<\\/p>\\r\\n\\r\\n<p>With this app on your device, the entire Premier League season 2016\\/2017 is in your pocket.<\\/p>\"],[\"tags\",\"\",\"[\\\"Mobile\\\",\\\"Outsourcing\\\"]\"],[\"is_active\",\"\",\"1\"],[\"is_top\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-01 04:41:11\"],[\"created_user\",\"\",6],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 04:41:11', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('143', '14', 'cms_widgets', 'CREATE. Changed fields: id, name, page_code, overview, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",14],[\"name\",\"\",\"FPageHeader_w0\"],[\"page_code\",\"\",\"cms\\/portfolio\"],[\"overview\",\"\",\"LIVE SCORES 5 IN 1\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-01\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 04:55:16', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('144', '15', 'cms_widgets', 'CREATE. Changed fields: id, name, page_code, display_type, color, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",15],[\"name\",\"\",\"FView_w1\"],[\"page_code\",\"\",\"cms\\/portfolio\"],[\"display_type\",\"\",\"fproduct\"],[\"color\",\"\",\"#797777\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-01\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 04:55:16', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('145', '18', 'cms_page', 'CREATE. Changed fields: id, code, name, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",\"18\"],[\"code\",\"\",\"ecommerce\\/order\\/viewcart\"],[\"name\",\"\",\"order\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-01\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 09:40:12', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('146', '19', 'cms_page', 'CREATE. Changed fields: id, code, name, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",\"19\"],[\"code\",\"\",\"ecommerce\\/order\\/bill\"],[\"name\",\"\",\"order\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-01\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 09:40:27', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('147', '85', 'ecommerce_order', 'CREATE. Changed fields: id, billing_name, billing_phone, billing_address, billing_email, order_detail, price_total, price_tax, price_discount, price_shipping, price_final, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",85],[\"billing_name\",\"\",\"Ho Hung\"],[\"billing_phone\",\"\",\"0993333\"],[\"billing_address\",\"\",\"n\\/a\"],[\"billing_email\",\"\",\"hung.hoxuan@gmail.com\"],[\"order_detail\",\"\",\"[]\"],[\"price_total\",\"\",\"0\"],[\"price_tax\",\"\",\"0\"],[\"price_discount\",\"\",\"0\"],[\"price_shipping\",\"\",\"0\"],[\"price_final\",\"\",\"0\"],[\"created_date\",\"\",\"2017-07-01 09:40:48\"],[\"created_user\",\"\",6],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 09:40:48', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('148', '96', 'ecommerce_order_item', 'CREATE. Changed fields: id, order_id, product_id, name, quantity, price, total,', '[]', '[[\"id\",\"\",96],[\"order_id\",\"\",\"85\"],[\"product_id\",\"\",\"10\"],[\"name\",\"\",\"\\u01b0erw\"],[\"quantity\",\"\",\"4\"],[\"price\",\"\",\"0.00\"],[\"total\",\"\",\"0\"]]', 'create', '1', '2017-07-01 09:40:49', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('149', '85', 'ecommerce_order', 'UPDATE. Changed fields: modified_date, modified_user,', '{\"billing_name\":\"Ho Hung\",\"billing_phone\":\"0993333\",\"billing_address\":\"n\\/a\",\"billing_city\":\"\",\"billing_country\":\"\",\"billing_postcode\":\"\",\"billing_email\":\"hung.hoxuan@gmail.com\",\"price_tax\":\"0\",\"price_discount\":\"0\",\"price_total\":\"0\",\"price_final\":\"0\",\"price_shipping\":\"0\",\"promotion_code\":\"\",\"tax\":\"\",\"order_detail\":\"[]\",\"id\":85,\"user_id\":\"\",\"billing_state\":\"\",\"shipping_address\":\"\",\"shipping_time\":\"\",\"shipping_note\":\"\",\"order_date\":\"\",\"order_note\":\"\",\"order_type\":\"\",\"order_status\":\"\",\"is_active\":\"\",\"payment_method\":\"\",\"payment_status\":\"\",\"created_date\":\"2017-07-01 09:40:48\",\"created_user\":6,\"modified_date\":\"\",\"modified_user\":\"\",\"application_id\":\"mozaweb\"}', '[[\"modified_date\",\"\",\"2017-07-01 09:41:45\"],[\"modified_user\",\"\",6]]', 'update', '1', '2017-07-01 09:41:45', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('150', '97', 'ecommerce_order_item', 'CREATE. Changed fields: id, order_id, product_id, name, quantity, price, total,', '[]', '[[\"id\",\"\",97],[\"order_id\",\"\",\"85\"],[\"product_id\",\"\",\"10\"],[\"name\",\"\",\"\\u01b0erw\"],[\"quantity\",\"\",\"4\"],[\"price\",\"\",\"0.00\"],[\"total\",\"\",\"0\"]]', 'create', '1', '2017-07-01 09:41:46', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('151', '20', 'cms_page', 'CREATE. Changed fields: id, code, name, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",\"20\"],[\"code\",\"\",\"ecommerce\\/order\\/checkout\"],[\"name\",\"\",\"order\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-01\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 09:41:46', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('152', '85', 'ecommerce_order', 'UPDATE. Changed fields:', '{\"billing_name\":\"Ho Hung\",\"billing_phone\":\"0993333\",\"billing_address\":\"n\\/a\",\"billing_city\":\"\",\"billing_country\":\"\",\"billing_postcode\":\"\",\"billing_email\":\"hung.hoxuan@gmail.com\",\"price_tax\":\"0\",\"price_discount\":\"0\",\"price_total\":\"0\",\"price_final\":\"0\",\"price_shipping\":\"0\",\"promotion_code\":\"\",\"tax\":\"\",\"order_detail\":\"[]\",\"id\":\"85\",\"user_id\":\"\",\"billing_state\":\"\",\"shipping_address\":\"\",\"shipping_time\":\"\",\"shipping_note\":\"\",\"order_date\":\"\",\"order_note\":\"\",\"order_type\":\"\",\"order_status\":\"\",\"is_active\":\"\",\"payment_method\":\"\",\"payment_status\":\"\",\"created_date\":\"2017-07-01 09:40:48\",\"created_user\":\"6\",\"modified_date\":\"2017-07-01 09:41:45\",\"modified_user\":6,\"application_id\":\"mozaweb\"}', '[]', 'update', '1', '2017-07-01 09:42:31', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('153', '98', 'ecommerce_order_item', 'CREATE. Changed fields: id, order_id, product_id, name, quantity, price, total,', '[]', '[[\"id\",\"\",98],[\"order_id\",\"\",\"85\"],[\"product_id\",\"\",\"10\"],[\"name\",\"\",\"\\u01b0erw\"],[\"quantity\",\"\",\"4\"],[\"price\",\"\",\"0.00\"],[\"total\",\"\",\"0\"]]', 'create', '1', '2017-07-01 09:42:31', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('154', '85', 'ecommerce_order', 'UPDATE. Changed fields:', '{\"billing_name\":\"Ho Hung\",\"billing_phone\":\"0993333\",\"billing_address\":\"n\\/a\",\"billing_city\":\"\",\"billing_country\":\"\",\"billing_postcode\":\"\",\"billing_email\":\"hung.hoxuan@gmail.com\",\"price_tax\":\"0\",\"price_discount\":\"0\",\"price_total\":\"0\",\"price_final\":\"0\",\"price_shipping\":\"0\",\"promotion_code\":\"\",\"tax\":\"\",\"order_detail\":\"[]\",\"id\":\"85\",\"user_id\":\"\",\"billing_state\":\"\",\"shipping_address\":\"\",\"shipping_time\":\"\",\"shipping_note\":\"\",\"order_date\":\"\",\"order_note\":\"\",\"order_type\":\"\",\"order_status\":\"\",\"is_active\":\"\",\"payment_method\":\"\",\"payment_status\":\"\",\"created_date\":\"2017-07-01 09:40:48\",\"created_user\":\"6\",\"modified_date\":\"2017-07-01 09:41:45\",\"modified_user\":\"6\",\"application_id\":\"mozaweb\"}', '[]', 'update', '1', '2017-07-01 10:06:20', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('155', '99', 'ecommerce_order_item', 'CREATE. Changed fields: id, order_id, product_id, name, quantity, price, total,', '[]', '[[\"id\",\"\",99],[\"order_id\",\"\",\"85\"],[\"product_id\",\"\",\"10\"],[\"name\",\"\",\"\\u01b0erw\"],[\"quantity\",\"\",\"6\"],[\"price\",\"\",\"0.00\"],[\"total\",\"\",\"0\"]]', 'create', '1', '2017-07-01 10:06:20', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('156', '86', 'ecommerce_order', 'CREATE. Changed fields: id, billing_name, billing_phone, billing_address, billing_email, billing_postcode, billing_city, billing_country, order_detail, price_total, price_tax, price_discount, price_shipping, price_final, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",86],[\"billing_name\",\"\",\"Ho Hung\"],[\"billing_phone\",\"\",\"3333\"],[\"billing_address\",\"\",\"FSDFSDFDS\"],[\"billing_email\",\"\",\"hung.hoxuan@gmail.com\"],[\"billing_postcode\",\"\",\"FDSFSDFSD\"],[\"billing_city\",\"\",\"FDSFSD\"],[\"billing_country\",\"\",\"FDSFSD\"],[\"order_detail\",\"\",\"[]\"],[\"price_total\",\"\",\"0\"],[\"price_tax\",\"\",\"0\"],[\"price_discount\",\"\",\"0\"],[\"price_shipping\",\"\",\"0\"],[\"price_final\",\"\",\"0\"],[\"created_date\",\"\",\"2017-07-01 12:08:51\"],[\"created_user\",\"\",6],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 12:08:51', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('157', '21', 'cms_page', 'CREATE. Changed fields: id, code, name, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",\"21\"],[\"code\",\"\",\"login\"],[\"name\",\"\",\"site\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-01\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 12:52:50', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('158', '8', 'product', 'UPDATE. Changed fields: name, cost, price, unit, currency, modified_user,', '{\"id\":\"8\",\"thumbnail\":\"\",\"image\":\"3_product_image.jpg\",\"banner\":\"\",\"code\":\"2345678\\u01b0ewe\",\"name\":\"3\",\"overview\":\"\",\"content\":\"\",\"cost\":\"0.00\",\"price\":\"0.00\",\"unit\":\"\",\"currency\":\"\",\"color\":\"\",\"type\":\"\",\"status\":\"\",\"brand_id\":\"\",\"category_id\":\"4\",\"is_active\":1,\"is_hot\":0,\"is_top\":1,\"promotion_id\":\"\",\"quantity\":\"\",\"discount\":null,\"tax\":\"\",\"sort_order\":null,\"count_views\":null,\"count_comments\":null,\"count_purchase\":null,\"count_likes\":null,\"count_rates\":null,\"rates\":3,\"qrcode_image\":\"\",\"barcode_image\":\"\",\"created_date\":\"2017-06-28 06:36:40\",\"created_user\":\"6\",\"modified_date\":\"0000-00-00 00:00:00\",\"modified_user\":\"\",\"application_id\":\"mozaweb\"}', '[[\"name\",\"3\",\"Product 3\"],[\"cost\",\"0.00\",\"222.00\"],[\"price\",\"0.00\",\"33333.00\"],[\"unit\",\"\",\"Item\"],[\"currency\",\"\",\"USD\"],[\"modified_user\",\"\",6]]', 'update', '1', '2017-07-01 16:31:23', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('159', '3', 'product', 'UPDATE. Changed fields: overview, cost, price, modified_date, modified_user,', '{\"id\":\"3\",\"thumbnail\":\"\",\"image\":\"3_product_image.jpg\",\"banner\":\"\",\"code\":\"2345678\\u01b0ewe\",\"name\":\"3\",\"overview\":\"\",\"content\":\"\",\"cost\":null,\"price\":null,\"unit\":\"\",\"currency\":\"\",\"color\":\"\",\"type\":\"\",\"status\":\"\",\"brand_id\":\"\",\"category_id\":\"4\",\"is_active\":1,\"is_hot\":0,\"is_top\":1,\"promotion_id\":\"\",\"quantity\":\"\",\"discount\":null,\"tax\":\"\",\"sort_order\":null,\"count_views\":null,\"count_comments\":null,\"count_purchase\":null,\"count_likes\":null,\"count_rates\":null,\"rates\":3,\"qrcode_image\":\"\",\"barcode_image\":\"\",\"created_date\":\"2017-06-28 06:36:40\",\"created_user\":\"6\",\"modified_date\":null,\"modified_user\":\"\",\"application_id\":\"mozaweb\"}', '[[\"overview\",\"\",\"FDSF\"],[\"cost\",null,\"1212.00\"],[\"price\",null,\"3333.00\"],[\"modified_date\",null,\"2017-07-01 16:45:49\"],[\"modified_user\",\"\",6]]', 'update', '1', '2017-07-01 16:45:49', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('160', '3', 'product', 'UPDATE. Changed fields: name,', '{\"id\":\"3\",\"thumbnail\":\"\",\"image\":\"3_product_image.jpg\",\"banner\":\"\",\"code\":\"2345678\\u01b0ewe\",\"name\":\"3\",\"overview\":\"FDSF\",\"content\":\"\",\"cost\":\"1212.00\",\"price\":\"3333.00\",\"unit\":\"\",\"currency\":\"\",\"color\":\"\",\"type\":\"\",\"status\":\"\",\"brand_id\":\"\",\"category_id\":\"4\",\"is_active\":1,\"is_hot\":0,\"is_top\":1,\"promotion_id\":\"\",\"quantity\":\"\",\"discount\":null,\"tax\":\"\",\"sort_order\":null,\"count_views\":null,\"count_comments\":null,\"count_purchase\":null,\"count_likes\":null,\"count_rates\":null,\"rates\":3,\"qrcode_image\":\"\",\"barcode_image\":\"\",\"created_date\":\"2017-06-28 06:36:40\",\"created_user\":\"6\",\"modified_date\":\"2017-07-01 16:45:49\",\"modified_user\":\"6\",\"application_id\":\"mozaweb\"}', '[[\"name\",\"3\",\"Product 2\"]]', 'update', '1', '2017-07-01 16:46:45', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('161', '16', 'cms_widgets', 'CREATE. Changed fields: id, name, page_code, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",16],[\"name\",\"\",\"BaseWidget_w0\"],[\"page_code\",\"\",\"ecommerce\\/product\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-01\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 18:05:20', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('162', '17', 'cms_widgets', 'CREATE. Changed fields: id, name, page_code, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",17],[\"name\",\"\",\"BaseWidget_Cart\"],[\"page_code\",\"\",\"ecommerce\\/product\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-01\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-01 18:52:07', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('163', '16', 'cms_widgets', 'Deleted successful !', '{\"id\":16,\"name\":\"BaseWidget_w0\",\"page_code\":\"ecommerce\\/product\",\"title\":\"\",\"overview\":\"\",\"content\":\"\",\"display_type\":\"\",\"columns_count\":null,\"items_count\":null,\"width_css\":\"\",\"background_css\":\"\",\"color_bg\":\"\",\"color\":\"\",\"style\":\"\",\"item_style\":\"\",\"item_layout\":\"\",\"show_viewmore\":null,\"show_headline\":null,\"viewmore_url\":\"\",\"is_active\":1,\"sort_order\":null,\"created_date\":\"2017-07-01\",\"created_user\":\"6\",\"application_id\":\"mozaweb\"}', '[]', 'delete', '1', '2017-07-01 18:52:29', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('164', '17', 'cms_widgets', 'UPDATE. Changed fields: style, show_viewmore, show_headline,', '{\"id\":17,\"name\":\"BaseWidget_Cart\",\"page_code\":\"ecommerce\\/product\",\"title\":\"\",\"overview\":\"\",\"content\":\"\",\"display_type\":\"\",\"columns_count\":null,\"items_count\":null,\"width_css\":\"\",\"background_css\":\"\",\"color_bg\":\"\",\"color\":\"\",\"style\":\"\",\"item_style\":\"\",\"item_layout\":\"\",\"show_viewmore\":null,\"show_headline\":null,\"viewmore_url\":\"\",\"is_active\":1,\"sort_order\":null,\"created_date\":\"2017-07-01\",\"created_user\":\"6\",\"application_id\":\"mozaweb\"}', '[[\"style\",\"\",\"padding: 20px; width:100%;background-color: #f7f7f7; border:3px solid #508910\"],[\"show_viewmore\",null,\"0\"],[\"show_headline\",null,\"0\"]]', 'update', '1', '2017-07-01 19:47:54', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('165', '18', 'cms_widgets', 'CREATE. Changed fields: id, name, page_code, title, display_type, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",18],[\"name\",\"\",\"FPageHeader_w0\"],[\"page_code\",\"\",\"cms\\/about\"],[\"title\",\"\",\"Gi\\u1edbi thi\\u1ec7u\"],[\"display_type\",\"\",\"pageheader_blank\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-02\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-02 02:12:48', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('166', '19', 'cms_widgets', 'CREATE. Changed fields: id, name, page_code, title, display_type, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",19],[\"name\",\"\",\"FPageHeader_w0\"],[\"page_code\",\"\",\"contact\"],[\"title\",\"\",\"Contact Us\"],[\"display_type\",\"\",\"pageheader_blank\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-02\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-02 02:12:55', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('167', '20', 'cms_widgets', 'CREATE. Changed fields: id, name, page_code, title, display_type, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",20],[\"name\",\"\",\"FPageHeader_w0\"],[\"page_code\",\"\",\"cms\\/news\"],[\"title\",\"\",\"Blogs\"],[\"display_type\",\"\",\"pageheader_blank\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-02\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-02 02:27:34', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('168', '21', 'cms_widgets', 'CREATE. Changed fields: id, name, page_code, title, display_type, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",21],[\"name\",\"\",\"FPageHeader_w0\"],[\"page_code\",\"\",\"ecommerce\\/product\"],[\"title\",\"\",\"S\\u1ea3n ph\\u1ea9m\"],[\"display_type\",\"\",\"pageheader_blank\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-02\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-02 02:29:27', '6', 'mozaweb');
INSERT INTO `object_actions` VALUES ('169', '22', 'cms_widgets', 'CREATE. Changed fields: id, name, page_code, display_type, columns_count, is_active, created_date, created_user, application_id,', '[]', '[[\"id\",\"\",22],[\"name\",\"\",\"FProduct_w1\"],[\"page_code\",\"\",\"ecommerce\\/product\"],[\"display_type\",\"\",\"fgrid1\"],[\"columns_count\",\"\",\"4\"],[\"is_active\",\"\",\"1\"],[\"created_date\",\"\",\"2017-07-02\"],[\"created_user\",\"\",\"6\"],[\"application_id\",\"\",\"mozaweb\"]]', 'create', '1', '2017-07-02 02:29:27', '6', 'mozaweb');

-- ----------------------------
-- Table structure for `object_attributes`
-- ----------------------------
DROP TABLE IF EXISTS `object_attributes`;
CREATE TABLE `object_attributes` (
  `object_id` int(11) NOT NULL,
  `object_type` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `application_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`object_id`,`object_type`,`meta_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of object_attributes
-- ----------------------------
INSERT INTO `object_attributes` VALUES ('1', 'cms_testimonial', 'Ok', 'Ok 1', '1', '2016-09-26 00:00:00', '6', '');
INSERT INTO `object_attributes` VALUES ('1', 'crm_client', 'Country', 'Vietnam', '1', '2016-11-18 00:00:00', '6', 'education');
INSERT INTO `object_attributes` VALUES ('1', 'crm_client', 'Domain', 'IT, Programming', '1', '2016-11-18 00:00:00', '6', 'education');
INSERT INTO `object_attributes` VALUES ('1', 'music_playlist', 'ff', 'FFF', '1', '2016-10-20 00:00:00', '6', 'education');
INSERT INTO `object_attributes` VALUES ('1', 'music_song', 'New Field', 'Ok, good', '1', '2016-10-20 00:00:00', '6', 'education');
INSERT INTO `object_attributes` VALUES ('1', 'travel_attractions', 'Overview', 'http://vnexpress.net', '1', '2017-02-06 00:00:00', '6', 'default');
INSERT INTO `object_attributes` VALUES ('1', 'travel_attractions', 'Top 5 attractions', 'http://www.dantri.com.vn', '1', '2017-02-06 00:00:00', '6', 'default');
INSERT INTO `object_attributes` VALUES ('2', 'music_artist', 'DDDFD', 'FDSFSDFSDFS', '1', '2016-09-28 00:00:00', '6', '');
INSERT INTO `object_attributes` VALUES ('2', 'music_artist', 'GGGG', 'GGGG', '1', '2016-09-28 00:00:00', '6', '');
INSERT INTO `object_attributes` VALUES ('2', 'travel_attractions', 'hahaha', 'www.linkhay.com', '1', '2017-02-06 00:00:00', '6', 'default');
INSERT INTO `object_attributes` VALUES ('2', 'travel_attractions', 'hihiih', 'ok', '1', '2017-02-06 00:00:00', '6', 'default');

-- ----------------------------
-- Table structure for `object_category`
-- ----------------------------
DROP TABLE IF EXISTS `object_category`;
CREATE TABLE `object_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `sort_order` int(5) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT NULL,
  `object_type` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of object_category
-- ----------------------------
INSERT INTO `object_category` VALUES ('1', null, '', 'Products', '', null, '1', null, '1', '', '2017-06-21 10:44:49', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('2', '1', '', 'eCommerce', '', null, '1', null, '1', 'product', '2017-06-21 10:45:10', '2017-06-21 10:45:16', 'mozaweb');
INSERT INTO `object_category` VALUES ('3', '1', '', 'Business', '', null, '1', null, '1', 'product', '2017-06-21 10:45:29', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('4', '1', '', 'Restaurant', '', null, '1', null, '1', 'product', '2017-06-21 10:45:41', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('5', '1', '', 'Media', '', null, '1', null, '1', 'product', '2017-06-21 10:45:58', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('6', '1', '', 'Sport', '', null, '1', null, '1', 'product', '2017-06-21 10:46:14', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('7', '1', '', 'Travel', '', null, '1', null, '1', 'product', '2017-06-21 10:46:24', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('8', null, '', 'Blog', '', null, '1', null, '1', '', '2017-06-21 10:46:38', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('9', '8', '', 'Web Development', '', null, '1', null, '1', 'blog', '2017-06-21 10:46:49', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('10', '8', '', 'Mobile Development', '', null, '1', null, '1', 'blog', '2017-06-21 10:47:03', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('11', '8', '', 'Free Downloads', '', null, '1', null, '1', 'blog', '2017-06-21 10:47:14', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('12', '8', '', 'Miscellaneous', '', null, '1', null, '1', 'blog', '2017-06-21 10:47:27', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('13', '8', '', 'Insights', '', null, '1', null, '1', 'blog', '2017-06-21 10:47:37', null, 'mozaweb');
INSERT INTO `object_category` VALUES ('14', null, '', 'Products', '', null, '1', null, '1', '', '2017-06-21 10:44:49', null, 'olongkar');
INSERT INTO `object_category` VALUES ('15', '14', '', 'eCommerce', '', null, '1', null, '1', '', '2017-06-23 10:45:10', '2017-06-21 10:45:16', 'olongkar');
INSERT INTO `object_category` VALUES ('16', '14', '', 'Business', '', null, '1', null, '1', '', '2017-06-23 10:45:29', null, 'olongkar');
INSERT INTO `object_category` VALUES ('17', '14', '', 'Restaurant', '', null, '1', null, '1', '', '2017-06-23 10:45:41', null, 'olongkar');
INSERT INTO `object_category` VALUES ('18', '14', '', 'Media', '', null, '1', null, '1', '', '2017-06-24 10:45:58', null, 'olongkar');
INSERT INTO `object_category` VALUES ('19', '14', '', 'Sport', '', null, '1', null, '1', '', '2017-06-24 10:46:14', null, 'olongkar');
INSERT INTO `object_category` VALUES ('20', '14', '', 'Travel', '', null, '1', null, '1', '', '2017-06-24 10:46:24', null, 'olongkar');
INSERT INTO `object_category` VALUES ('21', null, '', 'Blog', '', null, '1', null, '1', 'blog', '2017-06-24 10:46:38', null, 'olongkar');
INSERT INTO `object_category` VALUES ('22', '21', '', 'Web Development', '', null, '1', null, '1', 'blog', '2017-06-24 10:46:49', null, 'olongkar');
INSERT INTO `object_category` VALUES ('23', '21', '', 'Mobile Development', '', null, '1', null, '1', '', '2017-06-24 10:47:03', null, 'olongkar');
INSERT INTO `object_category` VALUES ('24', '21', '', 'Free Downloads', '', null, '1', null, '1', '', '2017-06-24 10:47:14', null, 'olongkar');
INSERT INTO `object_category` VALUES ('25', '21', '', 'Miscellaneous', '', null, '1', null, '1', '', '2017-06-24 10:47:27', null, 'theme1');
INSERT INTO `object_category` VALUES ('26', '21', '', 'Insights', '', null, '1', null, '1', '', '2017-06-24 10:47:37', null, 'theme1');
INSERT INTO `object_category` VALUES ('34', '22', 'iphone_object_category34_image.jpg', 'IPHONE', '', null, '1', null, null, 'Product', '2017-11-20 15:48:48', '2017-11-20 15:49:06', 'SellPhone');
INSERT INTO `object_category` VALUES ('35', '22', 'oppo_object_category35_image.png', 'OPPO', '', null, '1', null, null, 'product', '2017-11-20 15:49:28', '2017-11-20 15:50:07', 'SellPhone');
INSERT INTO `object_category` VALUES ('36', '22', 'samsung_object_category_image.png', 'SAMSUNG', '', null, '1', null, null, 'Product', '2017-11-20 15:51:09', '2017-11-27 11:29:31', 'SellPhone');

-- ----------------------------
-- Table structure for `object_comment`
-- ----------------------------
DROP TABLE IF EXISTS `object_comment`;
CREATE TABLE `object_comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` varchar(255) NOT NULL,
  `object_type` varchar(100) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `comment` varchar(4000) DEFAULT NULL,
  `app_user_id` varchar(100) DEFAULT NULL COMMENT 'lookup:@app_user',
  `user_id` varchar(100) DEFAULT NULL COMMENT 'lookup:@user',
  `user_type` varchar(100) DEFAULT NULL COMMENT 'data:app_user,user',
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of object_comment
-- ----------------------------
INSERT INTO `object_comment` VALUES ('25', '5', 'app_user_feedback', null, 'Admin', '', '', 'user', '2017-03-08 00:00:00', '6', 'default');
INSERT INTO `object_comment` VALUES ('26', '5', 'app_user_feedback', null, 'Ok', '', '', 'user', '2017-03-08 00:00:00', '6', 'default');
INSERT INTO `object_comment` VALUES ('27', '4', 'app_user_feedback', null, 'OK :)', '2', '', 'app_user', '2017-03-08 00:00:00', '6', 'default');
INSERT INTO `object_comment` VALUES ('28', '4', 'app_user_feedback', null, 'What is this :)', '6', '', 'app_user', '2017-03-08 00:00:00', '6', 'default');
INSERT INTO `object_comment` VALUES ('29', '4', 'app_user_feedback', null, 'You need to do like this bro', '', '', 'user', '2017-03-08 00:00:00', '6', 'default');

-- ----------------------------
-- Table structure for `object_file`
-- ----------------------------
DROP TABLE IF EXISTS `object_file`;
CREATE TABLE `object_file` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `file` varchar(555) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `file_duration` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` tinyint(5) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of object_file
-- ----------------------------
INSERT INTO `object_file` VALUES ('7', '0', '', null, '', null, null, null, null, null, null, null, null, null);
INSERT INTO `object_file` VALUES ('19', '1', 'music_artist', 'music_artist_1_file_19.png', 'Test Hihi', '', 'image/png', null, null, '1', '0', '2016-09-26 00:00:00', '6', '');
INSERT INTO `object_file` VALUES ('21', '1', 'cms_testimonial', 'cms_testimonial_1_file_21.png', 'hihi', '', 'image/png', null, null, '1', '0', '2016-09-26 00:00:00', '6', '');
INSERT INTO `object_file` VALUES ('22', '1', 'music_artist', 'music_artist_1_file_22.png', 'DDDDDD', '', 'image/png', null, null, '1', '1', '2016-09-27 00:00:00', '6', '');
INSERT INTO `object_file` VALUES ('24', '2', 'music_artist', 'music_artist_2_file_24.png', 'jjjjjjjjjj', '', 'image/png', null, null, '1', '0', '2016-09-27 00:00:00', '6', '');
INSERT INTO `object_file` VALUES ('25', '2', 'music_artist', 'music_artist_2_file_25.png', 'DDDDDDDD', '', 'image/png', null, null, '1', '1', '2016-09-27 00:00:00', '6', '');
INSERT INTO `object_file` VALUES ('26', '1', 'music_song', 'music_song_1_file_26.png', 'fsdfdsfafas', '', 'image/png', null, null, '1', '0', '2016-09-28 00:00:00', '6', '');
INSERT INTO `object_file` VALUES ('30', '1', 'music_artist', 'www.vnexpress.net', '2', '', 'image/png', null, null, '1', '2', '2016-10-01 00:00:00', '6', '');
INSERT INTO `object_file` VALUES ('31', '1', 'music_artist', 'vnexpress.net', '3', '', '', null, null, '1', '3', '2016-10-01 00:00:00', '6', '');
INSERT INTO `object_file` VALUES ('32', '1', 'music_artist', 'music_artist_1_file_32.png', '4', '', 'image/png', null, null, '1', '4', '2016-10-01 00:00:00', '6', '');
INSERT INTO `object_file` VALUES ('33', '1', 'crm_client', 'crm_client_1_file_33.pdf', 'Company profile', '', 'application/pdf', null, null, '1', '0', '2016-10-06 00:00:00', '6', 'education');
INSERT INTO `object_file` VALUES ('34', '1', 'cms_blogs', 'cms_blogs_1_file_34.png', 'Test', '', 'image/png', '602113', '111', '1', '0', '2016-12-05 00:00:00', '6', 'education');
INSERT INTO `object_file` VALUES ('35', '1', 'cms_blogs', 'cms_blogs_1_file_35.png', 'Ok', '', 'image/png', '', '3333', '1', '1', '2016-12-05 00:00:00', '6', 'education');
INSERT INTO `object_file` VALUES ('36', '1', 'travel_attractions', 'ddd', 'ss', '', '', '', 'ss', '1', '0', '2017-01-18 00:00:00', '6', 'default');
INSERT INTO `object_file` VALUES ('37', '1', 'travel_attractions', 'fdsfsd', 'fasf', '', '', '', 'fsd', '1', '1', '2017-01-18 00:00:00', '6', 'default');
INSERT INTO `object_file` VALUES ('38', '13', 'cms_blogs', 'cms_blogs_13_file_38.png', 'Test 1', '', 'image/png', '121057', '12', '1', '0', '2017-03-22 00:00:00', '6', 'default');
INSERT INTO `object_file` VALUES ('39', '13', 'cms_blogs', 'cms_blogs_13_file_39.png', 'Test 2', '', 'image/png', '763871', '15', '1', '1', '2017-03-22 00:00:00', '6', 'default');

-- ----------------------------
-- Table structure for `object_message`
-- ----------------------------
DROP TABLE IF EXISTS `object_message`;
CREATE TABLE `object_message` (
  `id` bigint(1) NOT NULL AUTO_INCREMENT,
  `object_id` varchar(100) NOT NULL COMMENT 'lookup:@app_user',
  `object_type` varchar(100) DEFAULT NULL,
  `message` varchar(4000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL COMMENT 'data:Plan,Sent,Received,Read',
  `type` varchar(100) DEFAULT NULL COMMENT 'data:Warning,Birthday,Remind,Promotion',
  `method` varchar(100) DEFAULT NULL COMMENT 'data:Push,Email,SMS',
  `sent_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of object_message
-- ----------------------------

-- ----------------------------
-- Table structure for `object_relation`
-- ----------------------------
DROP TABLE IF EXISTS `object_relation`;
CREATE TABLE `object_relation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `object2_id` bigint(20) NOT NULL,
  `object2_type` varchar(100) NOT NULL,
  `relation_type` varchar(100) DEFAULT NULL,
  `sort_order` int(5) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of object_relation
-- ----------------------------
INSERT INTO `object_relation` VALUES ('1', '1', 'product', '1', 'cms_blogs', '2', '0', null, null);
INSERT INTO `object_relation` VALUES ('2', '1', 'product', '2', 'cms_blogs', '2', '0', null, null);
INSERT INTO `object_relation` VALUES ('17', '1', 'music_artist', '1', 'music_song', '2', '1', '2016-09-26', '6');
INSERT INTO `object_relation` VALUES ('24', '2', 'music_artist', '1', 'music_song', 'sing', '1', '2016-09-28', '6');
INSERT INTO `object_relation` VALUES ('25', '2', 'music_artist', '2', 'music_song', 'sing', '2', '2016-09-28', '6');
INSERT INTO `object_relation` VALUES ('26', '2', 'music_artist', '1', 'music_song', 'compose', '1', '2016-09-28', '6');
INSERT INTO `object_relation` VALUES ('27', '2', 'music_artist', '3', 'music_song', 'compose', '2', '2016-09-28', '6');
INSERT INTO `object_relation` VALUES ('89', '3', 'music_song', '3', 'music_artist', '', '1', '2016-10-09', '6');
INSERT INTO `object_relation` VALUES ('116', '1', 'music_song', '1', 'music_artist', '', '1', '2016-10-20', '6');
INSERT INTO `object_relation` VALUES ('117', '1', 'music_song', '3', 'music_artist', '', '2', '2016-10-20', '6');
INSERT INTO `object_relation` VALUES ('118', '1', 'music_playlist', '1', 'music_song', '', '1', '2016-10-20', '6');
INSERT INTO `object_relation` VALUES ('119', '1', 'music_playlist', '2', 'music_song', '', '2', '2016-10-20', '6');
INSERT INTO `object_relation` VALUES ('120', '1', 'music_playlist', '3', 'music_song', '', '3', '2016-10-20', '6');
INSERT INTO `object_relation` VALUES ('121', '1', 'music_artist', '1', 'music_song', '', '1', '2016-11-13', '6');
INSERT INTO `object_relation` VALUES ('122', '1', 'music_artist', '2', 'music_song', '', '2', '2016-11-13', '6');
INSERT INTO `object_relation` VALUES ('123', '1', 'cms_blogs', '9', 'object-category', '', '1', '2017-06-28', '6');
INSERT INTO `object_relation` VALUES ('125', '5', 'product', '2', 'object-category', '', '1', '2017-06-29', '6');
INSERT INTO `object_relation` VALUES ('126', '8', 'product', '4', 'object-category', '', '1', '2017-07-01', '6');
INSERT INTO `object_relation` VALUES ('128', '3', 'product', '4', 'object-category', '', '1', '2017-07-01', '6');
INSERT INTO `object_relation` VALUES ('129', '29', 'cms_blogs', '21', 'object-category', '', '2', '2017-07-29', '7');
INSERT INTO `object_relation` VALUES ('130', '30', 'cms_blogs', '21', 'object-category', '', '2', '2017-07-29', '7');
INSERT INTO `object_relation` VALUES ('131', '14', 'product', '15', 'object-category', '', '2', '2017-07-31', '7');
INSERT INTO `object_relation` VALUES ('132', '15', 'product', '18', 'object-category', '', '2', '2017-07-31', '7');
INSERT INTO `object_relation` VALUES ('133', '31', 'cms_blogs', '24', 'object-category', '', '2', '2017-08-08', '9');
INSERT INTO `object_relation` VALUES ('134', '14', 'cms_blogs', '8', 'object-category', '', '1', '2017-09-04', '7');
INSERT INTO `object_relation` VALUES ('135', '1', 'product', '3', 'object-category', '', '1', '2017-09-04', '7');
INSERT INTO `object_relation` VALUES ('137', '32', 'cms_blogs', '10', 'object-category', '', '1', '2017-11-20', '12');
INSERT INTO `object_relation` VALUES ('163', '20', 'product', '35', 'object-category', '', '1', '2017-11-27', '12');
INSERT INTO `object_relation` VALUES ('164', '19', 'product', '35', 'object-category', '', '1', '2017-11-27', '12');
INSERT INTO `object_relation` VALUES ('167', '18', 'product', '34', 'object-category', '', '1', '2017-11-28', '12');
INSERT INTO `object_relation` VALUES ('168', '21', 'product', '36', 'object-category', '', '1', '2017-11-28', '12');
INSERT INTO `object_relation` VALUES ('175', '22', 'product', '34', 'object-category', '', '1', '2017-11-28', '12');
INSERT INTO `object_relation` VALUES ('176', '23', 'product', '35', 'object-category', '', '1', '2017-11-29', '12');
INSERT INTO `object_relation` VALUES ('177', '24', 'product', '35', 'object-category', '', '1', '2017-11-29', '12');
INSERT INTO `object_relation` VALUES ('178', '25', 'product', '34', 'object-category', '', '1', '2017-11-29', '12');
INSERT INTO `object_relation` VALUES ('180', '26', 'product', '34', 'object-category', '', '1', '2017-11-29', '12');
INSERT INTO `object_relation` VALUES ('181', '27', 'product', '36', 'object-category', '', '1', '2017-11-29', '12');
INSERT INTO `object_relation` VALUES ('186', '28', 'product', '36', 'object-category', '', '1', '2017-12-04', '12');

-- ----------------------------
-- Table structure for `object_reviews`
-- ----------------------------
DROP TABLE IF EXISTS `object_reviews`;
CREATE TABLE `object_reviews` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `rate` float DEFAULT NULL,
  `comment` varchar(2000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'lookup:@app_user',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of object_reviews
-- ----------------------------

-- ----------------------------
-- Table structure for `object_setting`
-- ----------------------------
DROP TABLE IF EXISTS `object_setting`;
CREATE TABLE `object_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `description` text,
  `icon` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `sort_order` int(5) NOT NULL,
  `application_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of object_setting
-- ----------------------------
INSERT INTO `object_setting` VALUES ('43', 'common', 'stores', 'SG', 'Sài Gòn', '', 'metasetting43_icon.png', '', '1', '6', '');
INSERT INTO `object_setting` VALUES ('44', 'common', 'stores', 'HN', 'Hà nội', '', 'metasetting44_icon.png', '#0000ff', '1', '7', '');
INSERT INTO `object_setting` VALUES ('45', 'common', 'stores', 'DN', 'Đà nẵng', null, null, '', '1', '8', '');
INSERT INTO `object_setting` VALUES ('50', 'product', 'type', 'course', 'Course', null, null, 'primary', '1', '7', 'trayolo');
INSERT INTO `object_setting` VALUES ('51', 'product', 'type', 'clothes', 'Clothes', null, null, 'warning', '1', '8', 'trayolo');
INSERT INTO `object_setting` VALUES ('52', 'product', 'type', 'smartphone', 'Smartphone', null, null, 'success', '1', '9', 'trayolo');
INSERT INTO `object_setting` VALUES ('53', 'product', 'status', 'new', 'New', null, null, 'primary', '1', '3', 'trayolo');
INSERT INTO `object_setting` VALUES ('54', 'product', 'status', 'instock', 'In Stock', null, null, 'success', '1', '4', 'trayolo');
INSERT INTO `object_setting` VALUES ('55', 'product', 'status', 'outstock', 'Out of Stock', null, null, 'danger', '1', '6', 'trayolo');
INSERT INTO `object_setting` VALUES ('56', 'product', 'status', 'discount', 'Discount', null, null, 'warning', '1', '5', 'trayolo');
INSERT INTO `object_setting` VALUES ('57', 'article', 'type', 'about', 'About', null, null, '', '1', '2', 'trayolo');
INSERT INTO `object_setting` VALUES ('58', 'article', 'type', 'help', 'Help', null, null, '', '1', '1', 'trayolo');
INSERT INTO `object_setting` VALUES ('59', 'article', 'type', 'testimonial', 'Testmonial', null, null, '', '1', '3', '');
INSERT INTO `object_setting` VALUES ('60', 'article', 'type', 'service', 'Service', null, null, '', '1', '4', '');
INSERT INTO `object_setting` VALUES ('61', 'article', 'type', 'member', 'Members', null, null, '', '1', '5', '');
INSERT INTO `object_setting` VALUES ('62', 'article', 'type', 'slide', 'Slide', null, null, '', '1', '6', '');
INSERT INTO `object_setting` VALUES ('63', 'article', 'type', 'home', 'Home', null, null, '', '1', '7', '');
INSERT INTO `object_setting` VALUES ('64', 'cms_blogs', 'type', 'events', 'Events', null, null, 'primary', '1', '16', '');
INSERT INTO `object_setting` VALUES ('65', 'cms_blogs', 'type', 'news', 'News', null, null, 'warning', '1', '17', '');
INSERT INTO `object_setting` VALUES ('66', 'cms_blogs', 'status', 'draft', 'Draft', null, null, '', '1', '14', '');
INSERT INTO `object_setting` VALUES ('67', 'cms_blogs', 'status', 'published', 'Published', null, null, '', '1', '13', '');
INSERT INTO `object_setting` VALUES ('68', 'purchase_item', 'purchase_status', '0_new', 'Mới', null, null, 'danger', '1', '1', '');
INSERT INTO `object_setting` VALUES ('69', 'purchase_item', 'purchase_status', '1_plan', 'Đang đặt', null, null, 'success', '1', '1', '');
INSERT INTO `object_setting` VALUES ('70', 'purchase_item', 'purchase_status', '2_started', 'Đang về', null, null, 'warning', '1', '1', '');
INSERT INTO `object_setting` VALUES ('71', 'purchase_item', 'request_location', 'HN', 'Hà nội', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('72', 'purchase_item', 'request_location', 'SG', 'Sài gòn', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('73', 'purchase_item', 'request_location', 'DN', 'Đà nẵng', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('74', 'purchase_item', 'request_provider', 'QC', 'Quảng châu', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('75', 'purchase_item', 'request_provider', 'SMD', 'SMD', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('76', 'purchase_item', 'request_provider', 'QVM', 'QVM', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('77', 'purchase_item', 'request_provider', 'VN', 'Việt nam', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('78', 'purchase_item', 'product_unit', 'pcs', 'PCS', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('79', 'purchase_item', 'product_unit', 'set', 'Set', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('80', 'purchase_item', 'product_unit', 'item', 'Item', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('81', 'purchase_item', 'product_unit', 'kg', 'Kg', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('82', 'purchase_item', 'product_unit', 'ton', 'Tấn', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('83', 'purchase_item', 'receive_habor', 'HP', 'Hải Phòng', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('84', 'purchase_item', 'receive_habor', 'HG', 'Hòn Gai', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('85', 'purchase_item', 'receive_habor', 'TH', 'Nghi Sơn', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('86', 'purchase_item', 'receive_habor', 'HCM', 'TP. Hồ Chí Minh', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('87', 'purchase_item', 'receive_habor', 'VT', 'Vũng Tàu', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('88', 'purchase_item', 'receive_habor', 'DN', 'Đà nẵng', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('89', 'purchase_item', 'store_code', 'HP', 'Hải phòng', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('90', 'purchase_item', 'store_code', 'HN', 'Hà nội', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('91', 'purchase_item', 'store_code', 'DN', 'Đà nẵng', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('92', 'purchase_item', 'store_code', 'HCM', 'Hồ Chí Minh', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('93', 'purchase_item', 'store_quality', 'good', 'Đạt', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('94', 'purchase_item', 'store_quality', 'bad', 'Không đạt', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('95', 'purchase_item', 'store_quality', 'n/a', 'Chưa kiểm tra', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('96', 'purchase_item', 'product_group', 'goi', 'Gối', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('97', 'purchase_item', 'product_group', 'neo', 'Bộ NEO', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('98', 'purchase_item', 'product_group', 'cap127', 'Cáp 12.7mm', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('99', 'purchase_item', 'purchase_status', '3_finished', 'Hoàn thành', null, null, 'primary', '1', '1', '');
INSERT INTO `object_setting` VALUES ('100', 'purchase_item', 'purchase_status', 'late', 'Chậm', null, null, 'danger', '1', '1', '');
INSERT INTO `object_setting` VALUES ('101', 'purchase_item', 'purchase_status', '25_half', 'Về Đợt 1', null, null, 'warning', '1', '1', '');
INSERT INTO `object_setting` VALUES ('102', 'purchase_item', 'purchase_status', 'lost', 'Thất lạc', null, null, 'danger', '1', '1', '');
INSERT INTO `object_setting` VALUES ('103', 'provider', 'type', 'si', 'Sỉ', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('104', 'provider', 'type', 'le', 'Lẻ', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('105', 'provider', 'type', 'NN', 'nước ngoài', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('106', 'user', 'status', '0', 'inactive', null, null, 'default', '1', '1', '');
INSERT INTO `object_setting` VALUES ('107', 'user', 'status', '10', 'active', null, null, 'success', '1', '1', '');
INSERT INTO `object_setting` VALUES ('108', 'user', 'status', '-1', 'disabled', null, null, 'warning', '1', '1', '');
INSERT INTO `object_setting` VALUES ('109', 'purchase_order', 'purchase_department', 'KD', 'Phòng Kinh doanh', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('110', 'purchase_order', 'purchase_department', 'KDHN', 'Phòng Kinh doanh Hà Nội', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('111', 'purchase_order', 'purchase_department', 'KDSG', 'Phòng Kinh doanh Sài gòn', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('112', 'purchase_order', 'purchase_department', 'KDDN', 'Phòng Kinh doanh Đà nẵng', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('113', 'purchase_order', 'purchase_department', 'MH', 'Phòng Mua sắm', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('114', 'purchase_order', 'purchase_department', 'KT', 'Kế toán', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('115', 'purchase_order', 'term_quality', 'ISO2700', 'ISO 2700', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('116', 'purchase_order', 'term_quality', 'EU', 'EU 28000', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('117', 'purchase_order', 'term_variant', '90', '90%', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('118', 'purchase_order', 'term_variant', '100', '100%', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('119', 'purchase_order', 'term_original', 'EU', 'Châu âu', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('120', 'purchase_order', 'term_original', 'QC', 'Quảng Châu', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('121', 'purchase_order', 'term_original', 'VN', 'Trong nước', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('122', 'purchase_order', 'term_certificate', 'SK', 'Sao khuê', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('123', 'purchase_order', 'term_certificate', 'ISO', 'ISO 12000', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('124', 'test', 'status', 'T1', 'T1 V', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('125', 'test', 'status', 'T2', 'T2 V', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('126', 'test', 'status', 'T3', 'T3 V', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('127', 'truck_container', 'type', '1', 'Type 1', null, null, '', '1', '1', '');
INSERT INTO `object_setting` VALUES ('128', 'truck_container', 'type', '2', 'Type 2', null, null, '', '1', '0', '');
INSERT INTO `object_setting` VALUES ('129', 'cms_article', 'type', 'about', 'About', null, null, '', '1', '11', '');
INSERT INTO `object_setting` VALUES ('130', 'cms_article', 'type', 'service', 'Service', null, null, '', '1', '9', '');
INSERT INTO `object_setting` VALUES ('131', 'cms_article', 'type', 'testimonial', 'Testimonial', null, null, '', '1', '10', '');
INSERT INTO `object_setting` VALUES ('133', 'music_artist', 'type', 'type2', 'Artist Type2', null, null, '', '1', '3', '');
INSERT INTO `object_setting` VALUES ('134', 'common', 'lang', 'hindi', 'Hindi', null, null, '', '1', '3', 'education');
INSERT INTO `object_setting` VALUES ('135', 'common', 'lang', 'bunJi', 'Bunji', null, null, '', '1', '2', 'education');
INSERT INTO `object_setting` VALUES ('136', 'music_song', 'type', 'Nhac vang', 'Nhac vang', null, null, '', '1', '4', 'education');
INSERT INTO `object_setting` VALUES ('137', 'music', 'mood', 'sad', 'sad', '', '', '', '1', '1', 'education');
INSERT INTO `object_setting` VALUES ('138', 'music', 'mood', 'happy', 'happy :)', 'hihi fdsfsd', '', '', '1', '0', 'education');
INSERT INTO `object_setting` VALUES ('139', 'music', 'mood', 'love', 'love', null, null, '', '1', '2', 'education');
INSERT INTO `object_setting` VALUES ('140', 'common', 'city', 'Kuala Lumpur', 'Kuala Lumpur', null, null, '', '1', '1', 'education');
INSERT INTO `object_setting` VALUES ('141', 'common', 'city', 'Johor', 'Johor', null, null, '', '1', '0', 'education');
INSERT INTO `object_setting` VALUES ('142', 'travel', 'keywords', 'Attractions', 'Attractions', null, null, '', '1', '1', 'education');
INSERT INTO `object_setting` VALUES ('143', 'travel', 'keywords', 'Hotels', 'Hotels', null, null, '', '1', '1', 'education');
INSERT INTO `object_setting` VALUES ('144', 'travel', 'keywords', 'Restaurants', 'Restaurants', null, null, '', '1', '1', 'education');
INSERT INTO `object_setting` VALUES ('145', 'travel_attractions', 'default_duration', '15', '00:15', null, null, '', '1', '1', 'education');
INSERT INTO `object_setting` VALUES ('146', 'travel_attractions', 'default_duration', '30', '00:30', null, null, '', '1', '1', 'education');
INSERT INTO `object_setting` VALUES ('147', 'travel_attractions', 'default_duration', '45', '00:45', null, null, '', '1', '1', 'education');
INSERT INTO `object_setting` VALUES ('148', 'travel_attractions', 'default_duration', '60', '1 hour', null, null, '', '1', '1', 'default');
INSERT INTO `object_setting` VALUES ('149', 'travel_attractions', 'default_duration', '90', '1 hour 30 mins', null, null, '', '1', '1', 'default');
INSERT INTO `object_setting` VALUES ('150', 'product', 'type', 'book', 'Book', null, null, '', '1', '1', 'default');
INSERT INTO `object_setting` VALUES ('151', 'common', 'Role', '31', 'Bet Admin', '', '', '', '1', '4', 'default');
INSERT INTO `object_setting` VALUES ('152', 'common', 'Role', '32', 'Finance Admin', '', '', '', '1', '5', 'default');
INSERT INTO `object_setting` VALUES ('153', 'travel', 'fdsf', 'dsfds', 'fsdf', null, null, null, '1', '0', '');
INSERT INTO `object_setting` VALUES ('154', '', 'type', 'aaa', 'b dddd', null, null, null, '1', '0', 'trayolo');
INSERT INTO `object_setting` VALUES ('155', 'common', 'cms_blogs.type', 'hhahah', 'hahah en', null, null, null, '1', '2', 'trayolo');
INSERT INTO `object_setting` VALUES ('156', 'common', 'cms_blogs.type', 'lala', 'vai - en', null, null, null, '1', '0', 'trayolo');
INSERT INTO `object_setting` VALUES ('157', 'common', 'cms_blogs.type', 'ok', 'shit en', null, null, null, '1', '1', 'trayolo');
INSERT INTO `object_setting` VALUES ('162', 'common', 'FSD', 'key', 'value', null, '', null, '1', '1', 'trayolo');
INSERT INTO `object_setting` VALUES ('166', 'user', 'position', 'M', 'Manager', null, null, '', '1', '1', 'trayolo');
INSERT INTO `object_setting` VALUES ('167', 'cms_blogs', 'type', 'N', 'News', null, null, null, '1', '0', 'trayolo');
INSERT INTO `object_setting` VALUES ('168', 'cms_blogs', 'type', 'B', 'Blogs', null, null, null, '1', '0', 'trayolo');
INSERT INTO `object_setting` VALUES ('169', 'user', 'department', 'KT', 'Accountant', null, null, null, '1', '0', 'trayolo');
INSERT INTO `object_setting` VALUES ('170', 'user', 'department', 'HR', 'HR', null, null, null, '1', '0', 'trayolo');
INSERT INTO `object_setting` VALUES ('171', 'cms_blogs', 'type', 'E', 'Events', null, null, null, '1', '0', 'trayolo');

-- ----------------------------
-- Table structure for `object_translation`
-- ----------------------------
DROP TABLE IF EXISTS `object_translation`;
CREATE TABLE `object_translation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) DEFAULT NULL,
  `object_type` varchar(100) DEFAULT NULL,
  `lang` varchar(100) DEFAULT NULL,
  `content` text,
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of object_translation
-- ----------------------------
INSERT INTO `object_translation` VALUES ('12', '28', 'cms_blogs', 'vi', '{\"id\":\"28\",\"thumbnail\":\"\",\"image\":\"\",\"banner\":\"\",\"code\":\"New - 2 - Vi\\u1ec7t nam\",\"name\":\"New 1 - Lahala  - Vi\\u1ec7t nam\",\"overview\":\"New 2 - Hehehe  - Vi\\u1ec7t nam\",\"content\":\"<p>New 3 - Hhahaha<\\/p>\",\"type\":\"\",\"status\":\"\",\"category_id\":\"\",\"is_active\":\"1\",\"lang\":\"\",\"tags\":\"FSDFSD\",\"linkurl\":\"\",\"author\":\"\",\"is_top\":\"0\",\"is_new\":\"0\",\"is_hot\":\"0\",\"count_views\":\"\",\"count_comments\":\"\",\"count_likes\":\"\",\"count_rates\":\"\",\"rates\":\"0\",\"created_date\":\"2017-05-23\",\"created_user\":\"9\",\"modified_date\":\"2017-05-26\",\"modified_user\":\"9\",\"application_id\":\"trayolo\"}', '2017-06-06 20:42:36', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('14', '4', 'cms_service', 'vi', '{\"id\":\"4\",\"thumbnail\":\"\",\"image\":\"\",\"name\":\"Service 1-vi leu leu\",\"overview\":\"Service 1-vi\",\"content\":\"<p>Hahaha ! Ngon vai<\\/p>\",\"linkurl\":\"-en\",\"sort_order\":\"\",\"lang\":\"vi\",\"is_active\":\"1\",\"is_top\":\"1\",\"created_date\":\"2017-06-06\",\"created_user\":\"6\",\"modified_date\":\"2017-06-06 21:18:09\",\"modified_user\":\"6\",\"application_id\":\"trayolo\"}', '2017-06-06 21:18:09', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('17', '2', 'cms_testimonial', 'vi', '{\"id\":\"2\",\"image\":\"cms_testimonial2_image.png\",\"name\":\"Ho Xuan Hung - Viet 3\",\"description\":\"CEO of Projectemplate - VIet 3\",\"location\":\"Hanoi, Vietnam\",\"content\":\"<p>Projectemplate qu&aacute; tuy\\u1ec7t v\\u1eddi Viet 3<\\/p>\",\"rate\":\"3\",\"linkurl\":\"\",\"sort_order\":\"0\",\"is_active\":\"1\",\"is_top\":\"1\",\"created_date\":\"2016-09-25\",\"created_user\":\"6\",\"modified_date\":\"2017-06-06\",\"modified_user\":\"6\",\"application_id\":\"cms\"}', '2017-06-06 22:53:10', '6', 'cms');
INSERT INTO `object_translation` VALUES ('18', '1', 'cms_testimonial', 'vi', '{\"id\":\"1\",\"image\":\"\",\"name\":\"Ho Xuan Cuong VI 3\",\"description\":\"CEO, Founder of Projectemplate\",\"location\":\"Vietnam\",\"content\":\"<p>Projectemplate is very good ! We love their service !<\\/p>\",\"rate\":\"4\",\"linkurl\":\"\",\"sort_order\":\"1\",\"is_active\":\"1\",\"is_top\":\"1\",\"created_date\":\"2016-09-25\",\"created_user\":\"6\",\"modified_date\":\"2016-09-26\",\"modified_user\":\"6\",\"application_id\":\"cms\"}', '2017-06-06 22:58:17', '6', 'cms');
INSERT INTO `object_translation` VALUES ('19', '31', 'cms_blogs', 'vi', '{\"id\":\"31\",\"thumbnail\":\"\",\"image\":\"\",\"banner\":\"\",\"code\":\"New Blogs VI\",\"name\":\"New Blogs - Description VI\",\"overview\":\"Hahah 1 2 3 4 5 6\",\"content\":\"<p>444<\\/p>\",\"type\":\"\",\"status\":\"\",\"category_id\":\"\",\"is_active\":\"0\",\"lang\":\"\",\"tags\":\"\",\"linkurl\":\"\",\"author\":\"\",\"is_top\":\"0\",\"is_new\":\"0\",\"is_hot\":\"0\",\"count_views\":\"\",\"count_comments\":\"\",\"count_likes\":\"\",\"count_rates\":\"\",\"rates\":\"0\",\"created_date\":\"2017-06-02\",\"created_user\":\"6\",\"modified_date\":\"2017-06-02\",\"modified_user\":\"6\",\"application_id\":\"trayolo\"}', '2017-06-06 23:37:50', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('20', '30', 'cms_blogs', 'vi', '{\"id\":\"30\",\"thumbnail\":\"\",\"image\":\"\",\"banner\":\"\",\"code\":\"Lalalala - VI 2\",\"name\":\"HIHIHi - New VI 3\",\"overview\":\"HOH\\u00d4HOHO - New 3\",\"content\":\"<p>Hehehe&nbsp;- New FDS<\\/p>\",\"type\":\"\",\"status\":\"\",\"category_id\":\"\",\"is_active\":\"0\",\"lang\":\"\",\"tags\":\"\",\"linkurl\":\"\",\"author\":\"\",\"is_top\":\"0\",\"is_new\":\"0\",\"is_hot\":\"0\",\"count_views\":\"\",\"count_comments\":\"\",\"count_likes\":\"\",\"count_rates\":\"\",\"rates\":\"0\",\"created_date\":\"2017-06-02\",\"created_user\":\"6\",\"modified_date\":\"2017-06-02\",\"modified_user\":\"6\",\"application_id\":\"trayolo\"}', '2017-06-06 23:48:51', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('21', '29', 'cms_blogs', 'vi', '{\"id\":\"29\",\"thumbnail\":\"\",\"image\":\"\",\"banner\":\"\",\"code\":\"Test Viet\",\"name\":\"Test Create new - Viet\",\"overview\":\"Vietnam\",\"content\":\"\",\"type\":\"\",\"status\":\"\",\"category_id\":\"\",\"is_active\":\"0\",\"lang\":\"\",\"tags\":\"\",\"linkurl\":\"\",\"author\":\"\",\"is_top\":\"0\",\"is_new\":\"0\",\"is_hot\":\"0\",\"count_views\":\"\",\"count_comments\":\"\",\"count_likes\":\"\",\"count_rates\":\"\",\"rates\":\"0\",\"created_date\":\"2017-06-02\",\"created_user\":\"6\",\"modified_date\":\"2017-06-06 23:51:49\",\"modified_user\":\"6\",\"application_id\":\"trayolo\"}', '2017-06-06 23:51:49', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('22', '4', 'application', 'vi', '{\"id\":\"4\",\"logo\":\"trayolo_application4_logo.png\",\"code\":\"trayolo\",\"name\":\"Travel Trip Planner\",\"description\":\"\",\"keywords\":\"\",\"note\":\"\",\"lang\":\"vi\",\"modules\":\"\",\"storage_max\":\"\",\"storage_current\":\"\",\"address\":\"\",\"map\":\"\",\"website\":\"www.trayolo.com\",\"email\":\"support@trayolo.com\",\"phone\":\"\",\"fax\":\"\",\"chat\":\"\",\"facebook\":\"\",\"twitter\":\"\",\"google\":\"\",\"youtube\":\"\",\"copyright\":\"Copyright by\",\"terms_of_service\":\"\",\"profile\":\"\",\"privacy_policy\":\"\",\"is_active\":\"1\",\"type\":\"\",\"status\":\"\",\"page_size\":\"\",\"main_color\":\"\",\"cache_enabled\":\"\",\"currency_format\":\"\",\"date_format\":\"\",\"web_theme\":\"\",\"admin_form_alignment\":\"\",\"body_css\":\"\",\"body_style\":\"\",\"page_css\":\"\",\"page_style\":\"\",\"owner_id\":\"\",\"created_date\":\"2017-05-08 11:07:32\",\"created_user\":\"6\",\"modified_date\":\"2017-05-08 11:42:37\",\"modified_user\":\"6\"}', '2017-06-07 00:02:22', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('23', null, 'cms_article', 'vi', '{\"id\":null,\"thumbnail\":\"\",\"image\":\"\",\"banner\":\"\",\"code\":\"fdsafsad\",\"name\":\"fsdafasdfsadfd\",\"overview\":\"fdsfsdfdsaf\",\"content\":\"\",\"linkurl\":\"\",\"sort_order\":\"\",\"type\":\"\",\"lang\":\"\",\"is_active\":\"1\",\"is_top\":\"\",\"created_date\":\"2017-06-10 05:06:04\",\"created_user\":6,\"modified_date\":\"\",\"modified_user\":\"\",\"application_id\":\"trayolo\"}', '2017-06-10 05:06:04', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('44', '6', 'cms_about', 'vi', '{\"id\":\"6\",\"thumbnail\":\"\",\"image\":\"\",\"name\":\"C\\u00f4ng Ty C\\u1ed5 Ph\\u1ea7n T\\u1eadp \\u0110o\\u00e0n MozaGroup\",\"overview\":\"\",\"content\":\"<p><img class=\\\"img-responsive\\\" src=\\\"http:\\/\\/projectemplate.com\\/content\\/images\\/default.png\\\" style=\\\"float:left; margin-right:20px; width:500px\\\" \\/><\\/p>\\r\\n\\r\\n<p>Ch&uacute;ng t&ocirc;i l&agrave; c\\u01a1 quan ph\\u1ea7n m\\u1ec1m v\\u1edbi s\\u1ee9 m\\u1ec7nh mang nh\\u1eefng \\u0111i\\u1ec1u CH R \\u0111\\u1ebfn START th&agrave;nh c&ocirc;ng cho d\\u1ef1 &aacute;n c\\u1ee7a b\\u1ea1n<\\/p>\\r\\n\\r\\n<p>&nbsp; Ti&ecirc;u chu\\u1ea9n k\\u1ef9 thu\\u1eadt x\\u1ebfp ch\\u1ed3ng<br \\/>\\r\\n&nbsp; C&aacute;c nh&agrave; ph&aacute;t tri\\u1ec3n \\u0111&aacute;ng tin c\\u1eady, d&agrave;nh ri&ecirc;ng<br \\/>\\r\\n&nbsp; Agile, qu&aacute; tr&igrave;nh Scrum<br \\/>\\r\\n&nbsp; Gi\\u1ea3i ph&aacute;p \\u0111&uacute;ng, ph\\u01b0\\u01a1ng ph&aacute;p hi\\u1ec7u qu\\u1ea3<br \\/>\\r\\n&nbsp; Minh b\\u1ea1ch &amp; cam k\\u1ebft<br \\/>\\r\\n\\u0110\\u01b0\\u1ee3c tin c\\u1eady b\\u1edfi h\\u01a1n 300 kh&aacute;ch h&agrave;ng t\\u1eeb Chupamobile, Sellmyapps .., ch&uacute;ng t&ocirc;i lu&ocirc;n mang \\u0111\\u1ebfn s\\u1ef1 cam k\\u1ebft cao nh\\u1ea5t v&agrave; c&aacute;ch ti\\u1ebfp c\\u1eadn hi\\u1ec7u qu\\u1ea3 cho m\\u1ecdi d\\u1ef1 &aacute;n ch&uacute;ng t&ocirc;i l&agrave;m. \\u0110&oacute; l&agrave; l&yacute; do v&igrave; sao ch&uacute;ng t&ocirc;i l&agrave; \\u0111\\u1ed1i t&aacute;c k\\u1ef9 thu\\u1eadt \\u0111&uacute;ng \\u0111\\u1eafn cho b\\u1ea5t k\\u1ef3 kh&aacute;ch h&agrave;ng, c&aacute; nh&acirc;n, doanh nghi\\u1ec7p m\\u1edbi th&agrave;nh l\\u1eadp cho doanh nghi\\u1ec7p.<\\/p>\\r\\n\\r\\n<p>CEO, Hung Ho<\\/p>\",\"color\":\"\",\"sort_order\":\"\",\"linkurl\":\"\",\"icon\":\"\",\"lang\":\"vi\",\"is_active\":\"1\",\"is_top\":\"1\",\"created_date\":\"2017-06-23\",\"created_user\":\"6\",\"modified_date\":\"2017-06-23\",\"modified_user\":\"6\",\"application_id\":\"mozaweb\"}', '2017-06-23 12:07:17', '6', 'mozaweb');
INSERT INTO `object_translation` VALUES ('45', '12', 'application', 'vi', '{\"id\":\"12\",\"logo\":\"\",\"code\":\"mozaweb\",\"name\":\"MOZAGROUP\",\"description\":\"\",\"keywords\":\"\",\"note\":\"\",\"lang\":\"\",\"modules\":\"\",\"storage_max\":\"\",\"storage_current\":\"\",\"address\":\"\",\"map\":\"\",\"website\":\"\",\"email\":\"support@mozagroup.com\",\"phone\":\"+84914954444 (VN)\",\"fax\":\"\",\"chat\":\"\",\"facebook\":\"groupmoza\",\"twitter\":\"\",\"google\":\"\",\"youtube\":\"\",\"copyright\":\"\",\"terms_of_service\":\"\",\"profile\":\"\",\"privacy_policy\":\"\",\"is_active\":\"1\",\"type\":\"\",\"status\":\"\",\"page_size\":\"\",\"main_color\":\"\",\"cache_enabled\":\"0\",\"currency_format\":\"\",\"date_format\":\"\",\"web_theme\":\"\",\"admin_form_alignment\":\"\",\"body_css\":\"\",\"body_style\":\"\",\"page_css\":\"\",\"page_style\":\"\",\"owner_id\":\"\",\"created_date\":\"2017-06-29 03:43:33\",\"created_user\":\"6\",\"modified_date\":\"2017-06-29 03:47:36\",\"modified_user\":\"6\"}', '2017-07-01 01:43:52', '6', 'mozaweb');

-- ----------------------------
-- Table structure for `object_type`
-- ----------------------------
DROP TABLE IF EXISTS `object_type`;
CREATE TABLE `object_type` (
  `object_type` varchar(255) NOT NULL,
  `group` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(5) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`object_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of object_type
-- ----------------------------
INSERT INTO `object_type` VALUES ('application', 'common', 'Application', null, '0', '1');
INSERT INTO `object_type` VALUES ('app_user', 'app', 'App User', '4', '1', '1');
INSERT INTO `object_type` VALUES ('app_user_bookmark', 'app', 'App User Bookmark', '9', '0', '1');
INSERT INTO `object_type` VALUES ('app_user_device', 'app', 'App User Device', '8', '0', '1');
INSERT INTO `object_type` VALUES ('app_user_feedback', 'app', 'App User Feedback', '10', '0', '1');
INSERT INTO `object_type` VALUES ('app_user_logs', 'app', 'App User Logs', '7', '0', '1');
INSERT INTO `object_type` VALUES ('app_user_pro', 'app', 'App User Pro', '5', '0', '1');
INSERT INTO `object_type` VALUES ('app_user_token', 'app', 'App User Token', '6', '0', '1');
INSERT INTO `object_type` VALUES ('app_user_transaction', 'app', 'App User Transaction', '11', '0', '1');
INSERT INTO `object_type` VALUES ('cms_about', 'cms', 'Cms About', '18', '0', '1');
INSERT INTO `object_type` VALUES ('cms_album', 'cms', 'Cms Album', '20', '0', '1');
INSERT INTO `object_type` VALUES ('cms_article', 'cms', 'Cms Article', '16', '0', '1');
INSERT INTO `object_type` VALUES ('cms_blogs', 'cms', 'Cms Blogs', '15', '1', '1');
INSERT INTO `object_type` VALUES ('cms_contact', 'cms', 'Cms Contact', '21', '0', '1');
INSERT INTO `object_type` VALUES ('cms_employee', 'cms', 'Cms Employee', '20', '0', '1');
INSERT INTO `object_type` VALUES ('cms_faq', 'cms', 'Cms Faq', '17', '0', '1');
INSERT INTO `object_type` VALUES ('cms_partner', 'cms', 'Cms Partner', '19', '0', '1');
INSERT INTO `object_type` VALUES ('cms_portfolio', 'cms', 'Cms Portfolio', '21', '0', '1');
INSERT INTO `object_type` VALUES ('cms_service', 'cms', 'Cms Service', '21', '0', '1');
INSERT INTO `object_type` VALUES ('cms_slide', 'cms', 'Cms Slide', '20', '0', '1');
INSERT INTO `object_type` VALUES ('cms_statistics', 'cms', 'Cms Statistics', '13', '0', '1');
INSERT INTO `object_type` VALUES ('cms_testimonial', 'cms', 'Cms Testimonial', '14', '0', '1');
INSERT INTO `object_type` VALUES ('common', '', 'Common', '0', '1', null);
INSERT INTO `object_type` VALUES ('crm_client', 'crm', 'Crm Client', '1', '0', '1');
INSERT INTO `object_type` VALUES ('crm_deals', 'crm', 'Crm Deals', null, '0', '1');
INSERT INTO `object_type` VALUES ('crm_invoice', 'crm', 'Crm Invoice', null, '0', '1');
INSERT INTO `object_type` VALUES ('finance_deposit', 'finance', 'Finance Deposit', null, '0', '1');
INSERT INTO `object_type` VALUES ('finance_expense', 'finance', 'Finance Expense', null, '0', '1');
INSERT INTO `object_type` VALUES ('finance_transfer', 'finance', 'Finance Transfer', null, '0', '1');
INSERT INTO `object_type` VALUES ('migration', 'migration', 'Migration', null, '0', '1');
INSERT INTO `object_type` VALUES ('music', '', 'Music :)', '2', '1', '1');
INSERT INTO `object_type` VALUES ('music_artist', 'music', 'Music Artist', '5', '0', '1');
INSERT INTO `object_type` VALUES ('music_playlist', 'music', 'Music Playlist', '12', '0', '1');
INSERT INTO `object_type` VALUES ('music_song', 'music', 'Music Song', '10', '0', '1');
INSERT INTO `object_type` VALUES ('object_actions', 'common', 'Object Actions', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_article', 'common', 'Object Article', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_attributes', 'common', 'Object Attributes', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_booking', 'common', 'Object Booking', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_cache', 'common', 'Object Cache', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_category', 'common', 'Object Category', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_comment', 'common', 'Object Comment', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_favourites', 'common', 'Object Favourites', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_file', 'common', 'Object File', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_message', 'common', 'Object Message', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_people', 'common', 'Object People', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_relation', 'common', 'Object Relation', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_reviews', 'common', 'Object Reviews', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_seo', 'common', 'Object Seo', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_setting', 'common', 'Object Setting', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_tag', 'common', 'Object Tag', null, '0', '1');
INSERT INTO `object_type` VALUES ('object_type', 'common', 'Object Type', null, '0', '1');
INSERT INTO `object_type` VALUES ('office_document', 'office', 'Office Document', null, '0', '1');
INSERT INTO `object_type` VALUES ('pm_issue', 'pm', 'Pm Issue', null, '0', '1');
INSERT INTO `object_type` VALUES ('pm_project', 'pm', 'Pm Project', null, '0', '1');
INSERT INTO `object_type` VALUES ('pm_task', 'pm', 'Pm Task', null, '0', '1');
INSERT INTO `object_type` VALUES ('product', 'ecommerce', 'Product', '9', '0', '1');
INSERT INTO `object_type` VALUES ('product_book', 'ecommerce', 'Product Book', null, '0', '1');
INSERT INTO `object_type` VALUES ('product_clothes', 'ecommerce', 'Product Clothes', null, '0', '1');
INSERT INTO `object_type` VALUES ('product_course', 'ecommerce', 'Product Course', null, '0', '1');
INSERT INTO `object_type` VALUES ('product_deal', 'ecommerce', 'Product Deal', null, '0', '1');
INSERT INTO `object_type` VALUES ('product_items', 'ecommerce', 'Product Items', null, '0', '1');
INSERT INTO `object_type` VALUES ('product_order', 'ecommerce', 'Product Order', null, '0', '1');
INSERT INTO `object_type` VALUES ('product_order_item', 'ecommerce', 'Product Order Item', null, '0', '1');
INSERT INTO `object_type` VALUES ('product_reservation', 'ecommerce', 'Product Reservation', null, '0', '1');
INSERT INTO `object_type` VALUES ('product_smartphone', 'ecommerce', 'Product Smartphone', null, '0', '1');
INSERT INTO `object_type` VALUES ('promotion', 'ecommerce', 'Promotion', null, '1', '1');
INSERT INTO `object_type` VALUES ('provider', 'ecommerce', 'Provider', '4', '1', '1');
INSERT INTO `object_type` VALUES ('purchase_item', 'purchase', 'Purchase Item', '11', '0', '1');
INSERT INTO `object_type` VALUES ('purchase_order', 'purchase', 'Purchase Order', '13', '0', '1');
INSERT INTO `object_type` VALUES ('purchase_request', 'purchase', 'Purchase Request', null, '0', '1');
INSERT INTO `object_type` VALUES ('settings', 'settings', 'Settings', null, '0', '1');
INSERT INTO `object_type` VALUES ('settings_languages', 'common', 'Settings Languages', null, '0', '1');
INSERT INTO `object_type` VALUES ('settings_lookup', 'common', 'Settings Lookup', null, '0', '1');
INSERT INTO `object_type` VALUES ('settings_menu', 'common', 'Settings Menu', null, '0', '1');
INSERT INTO `object_type` VALUES ('settings_schema', 'common', 'Settings Schema', null, '0', '1');
INSERT INTO `object_type` VALUES ('settings_text', 'common', 'Settings Text', null, '0', '1');
INSERT INTO `object_type` VALUES ('settings_theme', 'common', 'Settings Theme', null, '0', '1');
INSERT INTO `object_type` VALUES ('software', 'software', 'Software', null, '0', '1');
INSERT INTO `object_type` VALUES ('transport_driver', 'transport', 'Transport Driver', null, '0', '1');
INSERT INTO `object_type` VALUES ('transport_request', 'transport', 'Transport Request', null, '0', '1');
INSERT INTO `object_type` VALUES ('transport_trip', 'transport', 'Transport Trip', null, '0', '1');
INSERT INTO `object_type` VALUES ('transport_vehicle', 'transport', 'Transport Vehicle', null, '0', '1');
INSERT INTO `object_type` VALUES ('transport_vehicle_img', 'transport', 'Transport Vehicle Img', null, '0', '1');
INSERT INTO `object_type` VALUES ('travel', '', 'Travel', '1', '1', null);
INSERT INTO `object_type` VALUES ('travel_attractions', 'travel', 'Travel Attractions', '2', '0', '1');
INSERT INTO `object_type` VALUES ('travel_distance', 'travel', 'Travel Distance', null, '0', '1');
INSERT INTO `object_type` VALUES ('travel_itinerary', 'travel', 'Travel Itinerary', null, '0', '1');
INSERT INTO `object_type` VALUES ('travel_plans', 'travel', 'Travel Plans', null, '0', '1');
INSERT INTO `object_type` VALUES ('travel_scores', 'travel', 'Travel Scores', null, '0', '1');
INSERT INTO `object_type` VALUES ('travel_sites', 'travel', 'Travel Sites', null, '0', '1');
INSERT INTO `object_type` VALUES ('user', 'common', 'User', '6', '0', '1');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner` varchar(300) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `overview` varchar(2000) DEFAULT NULL,
  `content` text,
  `cost` decimal(15,2) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL COMMENT 'data:Item,Kg,Box,Course,Hour,License',
  `currency` varchar(100) DEFAULT NULL COMMENT 'data:USD,VND,Credit',
  `color` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `brand_id` varchar(100) DEFAULT '' COMMENT 'lookup:@provider',
  `category_id` varchar(500) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `promotion_id` varchar(100) DEFAULT NULL COMMENT 'lookup:@promotion',
  `quantity` varchar(255) DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `tax` varchar(100) DEFAULT NULL COMMENT 'data:Included=0; Exempted=0',
  `sort_order` int(11) DEFAULT NULL,
  `count_views` int(11) DEFAULT NULL,
  `count_comments` int(11) DEFAULT NULL,
  `count_purchase` int(11) DEFAULT NULL,
  `count_likes` int(11) DEFAULT NULL,
  `count_rates` int(11) DEFAULT NULL,
  `rates` int(11) DEFAULT NULL,
  `qrcode_image` varchar(255) DEFAULT NULL,
  `barcode_image` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '', '1_product_image.jpg', '', '191.764.812', '1', '', '', null, null, '', '', '', '', '', '', '3', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-06-28 06:35:49', '6', '2017-06-28 06:36:02', '6', 'mozaweb');
INSERT INTO `product` VALUES ('2', '', '2_product_image.jpg', '', '2345678', '2', '', '', null, null, '', '', '', '', '', '', '3', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-06-28 06:36:40', '6', null, '', 'mozaweb');
INSERT INTO `product` VALUES ('3', '', '3_product_image.jpg', '', '2345678ưewe', 'Product 2', 'FDSF', '', '1212.00', '3333.00', '', '', '', '', '', '', '4', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-06-28 06:36:40', '6', '2017-07-01 16:45:49', '6', 'mozaweb');
INSERT INTO `product` VALUES ('4', '', 'q121_product4_image.png', '', 'qưeq', 'q121', '', '', null, null, '', '', '', '', '', '', '4', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-06-28 06:37:50', '6', '2017-06-28 06:39:34', '6', 'mozaweb');
INSERT INTO `product` VALUES ('5', '', 'erw_product5_image.png', '', 'rưer', 'ưerw', '', '', null, null, '', '', '', '', '', '', '2', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-06-28 06:39:07', '6', '2017-06-28 06:39:54', '6', 'mozaweb');
INSERT INTO `product` VALUES ('6', '', '1_product_image.jpg', '', '191.764.812', '1', '', '', '0.00', '0.00', '', '', '', '', '', '', '3', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-06-28 06:35:49', '6', '2017-06-28 06:36:02', '6', 'mozaweb');
INSERT INTO `product` VALUES ('7', '', '2_product_image.jpg', '', '2345678', '2', '', '', '0.00', '0.00', '', '', '', '', '', '', '3', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-06-28 06:36:40', '6', '0000-00-00 00:00:00', '', 'mozaweb');
INSERT INTO `product` VALUES ('8', '', '3_product_image.jpg', '', '2345678ưewe', 'Product 3', '', '', '222.00', '33333.00', 'Item', 'USD', '', '', '', '', '4', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-06-28 06:36:40', '6', '0000-00-00 00:00:00', '6', 'mozaweb');
INSERT INTO `product` VALUES ('9', '', 'q121_product4_image.png', '', 'qưeq', 'q121', '', '', '0.00', '0.00', '', '', '', '', '', '', '4', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-06-28 06:37:50', '6', '2017-06-28 06:39:34', '6', 'mozaweb');
INSERT INTO `product` VALUES ('10', '', 'erw_product5_image.png', '', 'rưer', 'ưerw', '', '', '0.00', '0.00', '', '', '', '', '', '', '2', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-06-28 06:39:07', '6', '2017-06-28 06:39:54', '6', 'mozaweb');
INSERT INTO `product` VALUES ('11', 'hng_product11_thumbnail.jpg', 'hng_product11_image.jpg', 'hng_product11_banner.jpg', 'First', 'Hường', 'hihiii', '<ol>\r\n	<li>A good laugh is sunshine in a house &ndash; Một tiếng cười vui vẻ l&agrave; &aacute;nh nắng mặt trời trong nh&agrave;</li>\r\n</ol>', '1000000.00', '0.00', 'Box', 'VND', '#0000ff', '', '', '', null, '1', '1', '1', '', '', '15', '', null, '10000000', '122222222', '2147483647', '9999999', '999', '3', 'hng_product11_qrcode_image.jpg', 'hng_product11_barcode_image.jpg', '2017-07-27 05:46:33', '7', '2017-07-27 05:47:42', '7', 'theme1');
INSERT INTO `product` VALUES ('12', '-h_product_thumbnail.jpg', '-h_product_image.png', '-h_product_banner.png', '3', 'http://www.creatingtechnology.org/', 'Thích thì làm', '<p><span style=\"color:rgb(85, 85, 85)\">Your success and happiness lies in you. Resolve to keep happy, and your joy and you shall form an invincible host against difficulties.</span></p>', '5756777789.00', '8797987.00', 'License', 'VND', '#cc0000', '', '', '', null, '1', '1', '1', '', 'hihi', '30', '', null, '2147483647', '2147483647', '2147483647', '2147483647', '2147483647', '3', '-h_product_qrcode_image.jpg', '-h_product_barcode_image.jpg', '2017-07-28 05:16:29', '7', '2017-08-03 03:43:48', '7', 'theme1');
INSERT INTO `product` VALUES ('14', 'aaa_product_thumbnail.jpg', 'aaa_product_image.jpg', 'aaa_product_banner.jpg', '1', 'aaa', 'news', '<p>hiiiiiiiiiiiiiiiiiiiiiiiffh</p>', '698989.00', '9080988.00', '', '', '', '', '', '', ',15,', '0', '0', '1', '', '', '5', '', null, '8978708', '-98787098', '89098098', '8009809', '7809787', '2', 'aaa_product_qrcode_image.jpg', '', '2017-07-31 03:30:38', '7', null, '', 'olongkar');
INSERT INTO `product` VALUES ('15', 'bb_product_thumbnail.jpg', 'bb_product_image.jpg', 'bb_product_banner.jpg', '2', 'bb', 'lists', '<p>hahaaaa</p>', '979877.00', '8988.00', '', '', '', '', '', '', ',18,', '0', '0', '1', '', 'uy6y', '15', '', null, '89980800', '898898', '9097078', '8787867', '768769879', '2', '', '', '2017-07-31 03:51:34', '7', null, '', 'olongkar');
INSERT INTO `product` VALUES ('16', 'c_product_thumbnail.jpg', '', '', '3', 'c', 'lith', '<p>hjhjhjlkjl</p>', '809.00', '79897798.00', '', '', '', '', '', '', null, '0', '0', '0', '', 'hkjh', '15', '', null, '79800', '78908', '8098098', '8008', '800988', '2', '', '', '2017-07-31 04:10:04', '7', null, '', 'olongkar');
INSERT INTO `product` VALUES ('17', 'dht_product_thumbnail.jpg', 'dht_product_image.jfif', 'dht_product_banner.jfif', '5', 'DHT', '/news/today', '<p>With technology... i like that</p>', '897668.00', '869769887.00', 'Course', 'Credit', '', '', '', '', null, '1', '0', '1', '', '', '15', '', null, '76679878', '8798796', '869866', '896986', '8698986', '2', 'dht_product_qrcode_image.jpg', '', '2017-08-03 03:24:23', '7', null, '', 'theme1');
INSERT INTO `product` VALUES ('18', 'iphone-8-plus-256gb_product18_thumbnail.png', 'iphone-8-plus-256gb_product18_image.png', '', 'sp1', 'IPhone 8 Plus 256GB', '<p>&nbsp;</p>\r\n\r\n<p><a class=\"slLnk\" href=\"https://www.thegioididong.com/tin-tuc/chi-tiet-a11-bionic-chip-co-nhieu-thanh-phan-apple-tu-trong-nhat-tu-truoc-den-nay-1021653\" style=\"margin: 0px; padding: 4px 8px; text-decoration-line: none; position: absolute; bottom: 5px; right: 5px; color: rgb(40, 138, 214); background: rgba(255, 255, 255, 0.9); border-radius: 3px;\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a class=\"slLnk\" href=\"https://www.thegioididong.com/hoi-dap/chong-nuoc-va-chong-bui-tren-smart-phone-771130\" style=\"margin: 0px; padding: 4px 8px; text-decoration-line: none; position: absolute; bottom: 5px; right: 5px; color: rgb(40, 138, 214); background: rgba(255, 255, 255, 0.9); border-radius: 3px;\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a class=\"slLnk\" href=\"https://www.thegioididong.com/hoi-dap/mo-khoa-bang-dau-van-tay-645010\" style=\"margin: 0px; padding: 4px 8px; text-decoration-line: none; position: absolute; bottom: 5px; right: 5px; color: rgb(40, 138, 214); background: rgba(255, 255, 255, 0.9); border-radius: 3px;\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a class=\"slLnk\" href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-sac-khong-day-761328\" style=\"margin: 0px; padding: 4px 8px; text-decoration-line: none; position: absolute; bottom: 5px; right: 5px; color: rgb(40, 138, 214); background: rgba(255, 255, 255, 0.9); border-radius: 3px;\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Thừa hưởng thiết kế đ&atilde; đạt đến độ chuẩn mực, thế hệ&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-8-plus-256gb\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; font-stretch: normal; line-height: 18px; color: rgb(80, 168, 227); outline: none; zoom: 1;\" target=\"_blank\" title=\"iPhone 8 256 GB\" type=\"iPhone 8 256 GB\">iPhone 8 Plus</a>&nbsp;thay đổi phong c&aacute;ch b&oacute;ng bẩy hơn...</p>', '<p>Th&ocirc;ng số kỹ thuật</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:rgb(102, 102, 102)\">M&agrave;n h&igrave;nh:</span>\r\n\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-led-backlit-ips-lcd-la-gi-905757\" style=\"color: rgb(40, 138, 214); margin: 0px; padding: 0px; text-decoration-line: none;\" target=\"_blank\">LED-backlit IPS LCD</a>, 5.5&quot;,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-retina-la-gi-905780\" style=\"color: rgb(40, 138, 214); margin: 0px; padding: 0px; text-decoration-line: none;\" target=\"_blank\">Retina HD</a></p>\r\n	</li>\r\n	<li><span style=\"color:rgb(102, 102, 102)\">Hệ điều h&agrave;nh:</span>\r\n	<p>iOS 11</p>\r\n	</li>\r\n	<li><span style=\"color:rgb(102, 102, 102)\">Camera sau:</span>\r\n	<p>2 camera 12 MP</p>\r\n	</li>\r\n	<li><span style=\"color:rgb(102, 102, 102)\">Camera trước:</span>\r\n	<p>7 MP</p>\r\n	</li>\r\n	<li><span style=\"color:rgb(102, 102, 102)\">CPU:</span>\r\n	<p>Apple A11 Bionic 6 nh&acirc;n</p>\r\n	</li>\r\n	<li><span style=\"color:rgb(102, 102, 102)\">RAM:</span>\r\n	<p>3 GB</p>\r\n	</li>\r\n	<li><span style=\"color:rgb(102, 102, 102)\">Bộ nhớ trong:</span>\r\n	<p>256 GB</p>\r\n	</li>\r\n	<li><span style=\"color:rgb(102, 102, 102)\">Thẻ SIM:</span>\r\n	<p><a href=\"https://www.thegioididong.com/tin-tuc/tim-hieu-cac-loai-sim-thong-dung-sim-thuong-micro--590216#nanosim\" style=\"color: rgb(40, 138, 214); margin: 0px; padding: 0px; text-decoration-line: none;\" target=\"_blank\">1 Nano SIM</a>,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/4g-la-gi-731757\" style=\"color: rgb(40, 138, 214); margin: 0px; padding: 0px; text-decoration-line: none;\" target=\"_blank\">Hỗ trợ 4G</a></p>\r\n	</li>\r\n	<li><span style=\"color:rgb(102, 102, 102)\">Dung lượng pin:</span>\r\n	<p>2691 mAh,&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-sac-nhanh-tren-smartphone-755549\" style=\"color: rgb(40, 138, 214); margin: 0px; padding: 0px; text-decoration-line: none;\" target=\"_blank\">c&oacute; sạc nhanh</a></p>\r\n	</li>\r\n	<li>Trong hộp c&oacute;:&nbsp;<strong>Sạc, Tai nghe, S&aacute;ch hướng dẫn, Jack chuyển tai nghe 3.5mm, C&aacute;p, C&acirc;y lấy sim</strong></li>\r\n	<li>Bảo h&agrave;nh ch&iacute;nh h&atilde;ng:&nbsp;<strong>th&acirc;n m&aacute;y 12 th&aacute;ng, sạc 12 th&aacute;ng, tai nghe 12 th&aacute;ng</strong>&nbsp;-&nbsp;<a class=\"pWarr\" href=\"https://www.thegioididong.com/bao-hanh/apple\" style=\"color: rgb(40, 138, 214); margin: 0px; padding: 0px; text-decoration-line: none;\" target=\"_blank\">Xem điểm bảo h&agrave;nh</a></li>\r\n	<li>Giao h&agrave;ng tận nơi miễn ph&iacute; trong&nbsp;<strong>30 ph&uacute;t</strong>.&nbsp;<a href=\"https://www.thegioididong.com/giao-hang\" style=\"color: rgb(40, 138, 214); margin: 0px; padding: 0px; text-decoration-line: none;\" target=\"blank\">T&igrave;m hiểu</a></li>\r\n	<li><strong>1 đổi 1 trong 1 th&aacute;ng&nbsp;</strong>với sản phẩm lỗi.&nbsp;<a href=\"https://www.thegioididong.com/chinh-sach-bao-hanh-san-pham\" style=\"color: rgb(40, 138, 214); margin: 0px; padding: 0px; text-decoration-line: none;\" target=\"blank\">T&igrave;m hiểu</a></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '2600.00', '1800.00', '', 'VND', '', '', '', '', '34', '1', '1', null, 'n1', 'Sạc, Tai nghe, Sách hướng dẫn, Jack chuyển tai nghe 3.5mm, Cáp, Cây lấy sim', '2', '', null, null, null, null, null, null, '3', '', '', '2017-11-20 15:42:12', '12', '2017-11-20 15:42:56', '12', 'SellPhone');
INSERT INTO `product` VALUES ('19', 'oppo-f5_product19_thumbnail.png', 'oppo-f5_product_image.png', '', 'sp2', 'OPPO F5', '<p>OPPO F5&nbsp;l&agrave; chiếc điện thoại mang tr&ecirc;n m&igrave;nh rất nhiều đổi mới khi n&oacute; sở hữu thiết kế m&agrave;n h&igrave;nh chiếm to&agrave;n bộ mặt trước v&agrave; camera selfie AI th&ocirc;ng minh...</p>', '<ul>\r\n	<li>Hệ điều h&agrave;nh</li>\r\n	<li>Hệ điều h&agrave;nh :Andoid 7.1</li>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>C&ocirc;ng nghệ cảm ứng :Điện dung đa điểm</li>\r\n	<li>M&agrave;u m&agrave;n h&igrave;nh :Đang cập nhật</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh :IPS LCD</li>\r\n	<li>Mặt k&iacute;nh m&agrave;n h&igrave;nh :Gorilla Glass</li>\r\n	<li>Chuẩn m&agrave;n h&igrave;nh :Full HD+</li>\r\n	<li>Độ ph&acirc;n giải m&agrave;n h&igrave;nh :1080 x 2160 Pixels</li>\r\n	<li>Cấu h&igrave;nh phần cứng</li>\r\n	<li>Cảm biến :V&acirc;n tay</li>\r\n	<li>Tốc độ CPU :2.5 Ghz</li>\r\n	<li>Số nh&acirc;n :8 nh&acirc;n</li>\r\n	<li>Chipset :Mediatek MT6763T Helio P23</li>\r\n	<li>RAM :4 GB</li>\r\n	<li>Chip đồ họa (GPU) :Mali-G71 MP2</li>\r\n	<li>Th&ocirc;ng tin pin</li>\r\n	<li>Thời gian chờ :Đang cập nhật</li>\r\n	<li>Thời gian đ&agrave;m thoại :Đang cập nhật</li>\r\n	<li>Thời gian sạc đầy :Đang cập nhật</li>\r\n	<li>Chế độ sạc nhanh :Kh&ocirc;ng</li>\r\n	<li>Loại pin :Li-Ion</li>\r\n	<li>Dung lượng pin :3200 mAh</li>\r\n	<li>Pin c&oacute; thể th&aacute;o rời :Kh&ocirc;ng</li>\r\n	<li>Kết nối &amp; Cổng giao tiếp</li>\r\n	<li>GPRS/EDGE :Kh&ocirc;ng</li>\r\n	<li>NFC :Kh&ocirc;ng</li>\r\n	<li>Kết nối USB :Micro USB</li>\r\n	<li>Cổng kết nối kh&aacute;c :OTG</li>\r\n	<li>Cổng sạc :Micro USB</li>\r\n	<li>Jack (Input &amp; Output) :3.5 mm</li>\r\n	<li>Băng tần 2G :C&oacute;</li>\r\n	<li>Băng tần 3G :C&oacute;</li>\r\n	<li>Băng tần 4G :C&oacute;</li>\r\n	<li>Hỗ trợ SIM :Nano sim</li>\r\n	<li>Khe cắm sim :2 sim</li>\r\n	<li>Wifi :Wi-Fi 802.11 b/g/n, Wi-Fi hotspot</li>\r\n	<li>GPS :A-GPS</li>\r\n	<li>Bluetooth :v4.2, A2DP, LE</li>\r\n	<li>Thiết kế &amp; Trọng lượng</li>\r\n	<li>Khả năng chống nước :Kh&ocirc;ng</li>\r\n	<li>Kiểu d&aacute;ng :Thanh (thẳng) + Cảm ứng</li>\r\n	<li>Chất liệu :Nhựa (mặt k&iacute;nh cong 2,5D)</li>\r\n	<li>K&iacute;ch thước :156.5 x 76 x 7.5 mm</li>\r\n	<li>Trọng lượng :152g</li>\r\n	<li>Giải tr&iacute; &amp; Ứng dụng</li>\r\n	<li>Ghi &acirc;m :Kh&ocirc;ng</li>\r\n	<li>FM radio :Kh&ocirc;ng</li>\r\n	<li>Đ&egrave;n pin :Kh&ocirc;ng</li>\r\n	<li>Chức năng kh&aacute;c :Đang cập nhật</li>\r\n	<li>Xem phim :MP4, H.263, H.264(MPEG4-AVC)</li>\r\n	<li>Nghe nhạc :MP3, WAV, eAAC+, FLAC</li>\r\n	<li>Th&ocirc;ng số cơ bản</li>\r\n	<li>M&agrave;n h&igrave;nh :6&quot;</li>\r\n	<li>Camera :Ch&iacute;nh: 16.0 MP, Phụ: 20.0 MP</li>\r\n	<li>RAM :4 GB</li>\r\n	<li>Bộ nhớ trong :32 GB</li>\r\n	<li>Hệ điều h&agrave;nh :Android 7.1</li>\r\n	<li>Chipset :Mediatek MT6763T</li>\r\n	<li>CPU :Octa-Core 2.5 GHz</li>\r\n	<li>GPU :Mali-G71</li>\r\n	<li>K&iacute;ch thước :156.5 x 76 x 7.5 mm</li>\r\n	<li>Camera Trước</li>\r\n	<li>Video Call :C&oacute;</li>\r\n	<li>Độ ph&acirc;n giải :20 MP</li>\r\n	<li>Th&ocirc;ng tin kh&aacute;c :C&ocirc;ng nghệ Selfie A.I Beauty, Selfie bằng cử chỉ, Chế độ l&agrave;m đẹp</li>\r\n	<li>Camera Sau</li>\r\n	<li>Độ ph&acirc;n giải :16 MP</li>\r\n	<li>Quay phim :FullHD 1080p@30fps</li>\r\n	<li>Đ&egrave;n Flash :C&oacute;</li>\r\n	<li>Chụp ảnh n&acirc;ng cao :Chế độ &aacute;nh s&aacute;ng yếu, Tự động lấy n&eacute;t, Chạm lấy n&eacute;t, HDR, Panorama</li>\r\n	<li>Bộ nhớ &amp; Lưu trữ</li>\r\n	<li>Danh bạ lưu trữ :Kh&ocirc;ng giới hạn</li>\r\n	<li>ROM :32 GB</li>\r\n	<li>Bộ nhớ c&ograve;n lại :Đang cập nhập</li>\r\n	<li>Thẻ nhớ ngo&agrave;i :MicroSD</li>\r\n	<li>Hỗ trợ thẻ nhớ tối đa :256 GB</li>\r\n	<li>Bảo h&agrave;nh</li>\r\n	<li>Thời gian bảo h&agrave;nh :12 th&aacute;ng</li>\r\n</ul>', '6780.00', '6600.00', '', 'USD', '', '', '', '', '35', '1', '1', null, 'n1', '', '10', '', null, null, null, null, null, null, '0', '', '', '2017-11-20 15:55:54', '12', '2017-11-20 16:23:11', '12', 'SellPhone');
INSERT INTO `product` VALUES ('20', 'oppo-f3-plus_product20_thumbnail.png', 'oppo-f3-plus_product20_image.jpg', '', 'sp3', 'OPPO F3 Plus', '<p><strong>OPPO F3 Plus l&agrave; một sản phẩm mới được OPPO giới thiệu đến người d&ugrave;ng, m&aacute;y được đ&aacute;nh gi&aacute; rất cao về camera k&eacute;p mặt trước cho h&igrave;nh ảnh chụp sắc n&eacute;t, sống động. Về ngoại h&igrave;nh, m&aacute;y vẫn sở hữu thiết kế truyền thống v&agrave; một cấu h&igrave;nh mạnh mẽ b&ecirc;n trong, c&ugrave;ng nhiều t&iacute;nh năng ấn tượng kh&aacute;c đang chờ người d&ugrave;ng kh&aacute;m ph&aacute;.</strong></p>', '<ul>\r\n	<li>Camera Sau</li>\r\n	<li>Quay phim :Quay phim 4K 2160p@30fps</li>\r\n	<li>Chụp ảnh n&acirc;ng cao :Tự động lấy n&eacute;t, Chạm lấy n&eacute;t, Nhận diện khu&ocirc;n mặt, HDR, Panorama</li>\r\n	<li>Độ ph&acirc;n giải :16.0 MP</li>\r\n	<li>Đ&egrave;n Flash :C&oacute;</li>\r\n	<li>Camera Trước</li>\r\n	<li>Độ ph&acirc;n giải :Dual 16.0 MP + 8.0 MP</li>\r\n	<li>Th&ocirc;ng tin kh&aacute;c :Selfie bằng cử chỉ, Camera k&eacute;p, Nhận diện khu&ocirc;n mặt, Chế độ l&agrave;m đẹp, Camera g&oacute;c rộng, HDR</li>\r\n	<li>Video Call :C&oacute;</li>\r\n	<li>Cấu h&igrave;nh phần cứng</li>\r\n	<li>Tốc độ CPU :4 nh&acirc;n 1.95 GHz v&agrave; 4 nh&acirc;n 1.40 GHz</li>\r\n	<li>Chipset :Qualcomm Snapdragon 653</li>\r\n	<li>Chip đồ họa (GPU) :Adreno 510</li>\r\n	<li>Số nh&acirc;n :8 Nh&acirc;n</li>\r\n	<li>RAM :4 GB</li>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh :IPS LCD (Cong 2,5D)</li>\r\n	<li>Độ ph&acirc;n giải m&agrave;n h&igrave;nh :1080 x 1920 pixels</li>\r\n	<li>Mặt k&iacute;nh m&agrave;n h&igrave;nh :Corning Gorilla Glass 5</li>\r\n	<li>M&agrave;u m&agrave;n h&igrave;nh :16 Triệu m&agrave;u</li>\r\n	<li>Chuẩn m&agrave;n h&igrave;nh :Full HD</li>\r\n	<li>C&ocirc;ng nghệ cảm ứng :Cảm ứng điện dung, đa điểm</li>\r\n	<li>Giải tr&iacute; &amp; Ứng dụng</li>\r\n	<li>Xem phim :H.265, 3GP, MP4, AVI, WMV, H.263, H.264(MPEG4-AVC), DivX, WMV9, Xvid</li>\r\n	<li>Nghe nhạc :Lossless, Midi, MP3, WAV, WMA</li>\r\n	<li>Ghi &acirc;m :C&oacute;</li>\r\n	<li>FM radio :Kh&ocirc;ng</li>\r\n	<li>Kết nối &amp; Cổng giao tiếp</li>\r\n	<li>NFC :Kh&ocirc;ng</li>\r\n	<li>Băng tần 3G :WCDMA 850/ 900 / 1700 / 1900 / 2100 GHz</li>\r\n	<li>GPS :C&oacute;, hỗ trợ A-GPS v&agrave; GLONASS</li>\r\n	<li>Wifi :Wi-Fi 802.11 a/b/g/n/ac</li>\r\n	<li>Kết nối USB :Micro USB</li>\r\n	<li>Cổng kết nối kh&aacute;c :Hỗ trợ OTG</li>\r\n	<li>Băng tần 2G :GSM 850 / 900 / 1800 / 1900</li>\r\n	<li>GPRS/EDGE :C&oacute;</li>\r\n	<li>Băng tần 4G :LTE B1/2/3/4/5/7/8/20/28</li>\r\n	<li>Hỗ trợ SIM :2 Nano Sim Hoặc 1 Sim 1 Thẻ Nhớ</li>\r\n	<li>Bluetooth :Bluetooth v4.1</li>\r\n	<li>Jack (Input &amp; Output) :3.5 mm</li>\r\n	<li>Khe cắm sim :2 Khe</li>\r\n	<li>Cổng sạc :Micro USB</li>\r\n	<li>Th&ocirc;ng số cơ bản</li>\r\n	<li>RAM :4 GB</li>\r\n	<li>Chipset :Qualcomm Snapdragon 653</li>\r\n	<li>K&iacute;ch thước :163.63 x 80.8 x 7.35 mm</li>\r\n	<li>GPU :Adreno 510</li>\r\n	<li>CPU :Octa-core</li>\r\n	<li>Camera :Ch&iacute;nh: 16.0 MP, Phụ: Dual 16.0 MP + 8.0 MP</li>\r\n	<li>Hệ điều h&agrave;nh :Android 6.0 (Marshmallow)</li>\r\n	<li>Bộ nhớ trong :64 GB</li>\r\n	<li>M&agrave;n h&igrave;nh :6.0 inch (1080 x 1920 pixels)</li>\r\n	<li>Thiết kế &amp; Trọng lượng</li>\r\n	<li>K&iacute;ch thước :163.63 x 80.8 x 7.35 mm</li>\r\n	<li>Trọng lượng :185g</li>\r\n	<li>Khả năng chống nước :Kh&ocirc;ng</li>\r\n	<li>Chất liệu :Kim loại nguy&ecirc;n khối</li>\r\n	<li>Kiểu d&aacute;ng :Thanh (thẳng) + Cảm ứng</li>\r\n	<li>Bộ nhớ &amp; Lưu trữ</li>\r\n	<li>Bộ nhớ c&ograve;n lại :Đang cập nhật</li>\r\n	<li>Hỗ trợ thẻ nhớ tối đa :256 GB</li>\r\n	<li>Danh bạ lưu trữ :Kh&ocirc;ng giới hạn</li>\r\n	<li>Thẻ nhớ ngo&agrave;i :MicroSD</li>\r\n	<li>ROM :64 GB</li>\r\n	<li>Th&ocirc;ng tin pin</li>\r\n	<li>Pin c&oacute; thể th&aacute;o rời :Kh&ocirc;ng</li>\r\n	<li>Dung lượng pin :4000 mAh</li>\r\n	<li>Chế độ sạc nhanh :VOOC</li>\r\n	<li>Loại pin :Li-Ion</li>\r\n	<li>Đĩa cứng</li>\r\n	<li>Cảm biến :Gia tốc - Con quay hồi chuyển - Tiệm cận - La b&agrave;n</li>\r\n</ul>', '678.00', '890.00', '', 'USD', '', '', '', '', '35', '1', '1', null, 'n1', '', '6', '', null, null, null, null, null, null, '3', '', '', '2017-11-22 16:32:34', '12', '2017-11-22 16:32:57', '12', 'SellPhone');
INSERT INTO `product` VALUES ('21', 'samsung-galaxy-note-8_product21_thumbnail.jpg', 'samsung-galaxy-note-8_product21_image.png', '', '', 'Samsung Galaxy Note 8', '<p><strong>Nếu đ&atilde; từng sử dụng series Galaxy Note của Samsung, bạn chắc chắn sẽ kh&ocirc;ng thể bỏ qua si&ecirc;u phẩm lần n&agrave;y. So với trước kia,&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/samsung-galaxy-note-8\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent; outline: none; text-decoration-line: none; color: rgb(0, 0, 0);\" target=\"_blank\">Note 8</a>&nbsp;sở hữu c&aacute;c đặc t&iacute;nh chưa từng xuất hiện, chẳng hạn camera k&eacute;p, b&uacute;t S-Pen hỗ trợ h&agrave;ng loạt thao t&aacute;c nhanh, dock DeX cho c&ocirc;ng việc cũng như được kiểm định cực gắt gao nhằm đảm bảo tối đa sự an to&agrave;n cho kh&aacute;ch h&agrave;ng.</strong></p>', '<p>Th&ocirc;ng số kỹ thuật của Samsung Galaxy Note 8</p>\r\n\r\n<ul>\r\n	<li>Th&ocirc;ng số cơ bản</li>\r\n	<li>M&agrave;n h&igrave;nh :6.3 inch</li>\r\n	<li>Camera :Ch&iacute;nh: Dual 12.0 MP, Phụ: 8.0 MP</li>\r\n	<li>RAM :6 GB</li>\r\n	<li>Bộ nhớ trong :64 GB</li>\r\n	<li>Hệ điều h&agrave;nh :Android 7.1.1 (Nougat)</li>\r\n	<li>Chipset :Exynos 8895</li>\r\n	<li>CPU :L&otilde;i T&aacute;m (l&otilde;i Tứ 2.3GHz + l&otilde;i Tứ 1.7GHz), 64 bit, vi xử l&yacute; 10nm</li>\r\n	<li>GPU :Mali&trade; G71</li>\r\n	<li>K&iacute;ch thước :162.5 x 74.8 x 8.6 mm</li>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh :Super AMOLED</li>\r\n	<li>M&agrave;u m&agrave;n h&igrave;nh :16 Triệu m&agrave;u</li>\r\n	<li>Chuẩn m&agrave;n h&igrave;nh :2K</li>\r\n	<li>Độ ph&acirc;n giải m&agrave;n h&igrave;nh :2960 x 1440 pixels</li>\r\n	<li>Mặt k&iacute;nh m&agrave;n h&igrave;nh :Corning Gorilla Glass 5</li>\r\n	<li>Camera Trước</li>\r\n	<li>Video Call :C&oacute;</li>\r\n	<li>Độ ph&acirc;n giải :8.0 MP</li>\r\n	<li>Camera Sau</li>\r\n	<li>Đ&egrave;n Flash :C&oacute;</li>\r\n	<li>Độ ph&acirc;n giải :Dual 12.0 MP</li>\r\n	<li>Cấu h&igrave;nh phần cứng</li>\r\n	<li>Tốc độ CPU :4 nh&acirc;n 2.3 GHz v&agrave; 4 nh&acirc;n 1.7 GHz</li>\r\n	<li>Số nh&acirc;n :8 Nh&acirc;n</li>\r\n	<li>Chipset :Exynos 8895</li>\r\n	<li>RAM :6 GB</li>\r\n	<li>Chip đồ họa (GPU) :Mali&trade; G71</li>\r\n	<li>Bộ nhớ &amp; Lưu trữ</li>\r\n	<li>Danh bạ lưu trữ :Kh&ocirc;ng giới hạn</li>\r\n	<li>ROM :64 GB</li>\r\n	<li>Bộ nhớ c&ograve;n lại :Đang cập nhật</li>\r\n	<li>Thẻ nhớ ngo&agrave;i :MicroSD</li>\r\n	<li>Hỗ trợ thẻ nhớ tối đa :256 GB</li>\r\n	<li>Thiết kế &amp; Trọng lượng</li>\r\n	<li>Kiểu d&aacute;ng :Thanh (thẳng) + Cảm ứng</li>\r\n	<li>K&iacute;ch thước :162.5 x 74.8 x 8.6 mm</li>\r\n	<li>Trọng lượng :195 g</li>\r\n	<li>Khả năng chống nước :Chuẩn IP68</li>\r\n	<li>Th&ocirc;ng tin pin</li>\r\n	<li>Loại pin :Li-Ion</li>\r\n	<li>Dung lượng pin :3300 mAh</li>\r\n	<li>Chế độ sạc nhanh :C&oacute;</li>\r\n	<li>Kết nối &amp; Cổng giao tiếp</li>\r\n	<li>Cổng sạc :USB Type-C</li>\r\n	<li>Kết nối USB :USB Type-C</li>\r\n	<li>Băng tần 3G :C&oacute;</li>\r\n	<li>Băng tần 4G :C&oacute;</li>\r\n	<li>Khe cắm sim :2 Sim</li>\r\n	<li>Wifi :Wi-Fi 802.11 a/b/g/n/ac</li>\r\n	<li>GPS :C&oacute;</li>\r\n	<li>Bluetooth :v5.0</li>\r\n	<li>GPRS/EDGE :C&oacute;</li>\r\n	<li>Bảo h&agrave;nh</li>\r\n	<li>Thời gian bảo h&agrave;nh :12 Th&aacute;ng<br />\r\n	&nbsp;</li>\r\n</ul>', '5687.00', '5879.00', '', 'USD', '', '', '', '', '36', '1', '1', null, '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-11-27 10:34:03', '12', '2017-11-27 11:05:57', '12', 'SellPhone');
INSERT INTO `product` VALUES ('22', 'iphone-6s_product22_thumbnail.jpg', 'iphone-x-plus_product22_image.jpg', '', '', 'Iphone X plus', '<p>Mang đăng cấp ph&aacute;i mạnh với nhiều sự ph&aacute;t triển vượt trội...</p>', '<p>fdjsf</p>', '23456.00', '5675463.00', '', 'VND', '', '', '', '', '34', '1', '0', null, '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-11-28 04:12:20', '12', '2017-11-28 04:12:47', '12', 'SellPhone');
INSERT INTO `product` VALUES ('23', '', 'oppo-a37_product_image.png', '', '', 'OPPO A37', '<p><strong><a href=\"https://fptshop.com.vn/dien-thoai/oppo-a37-a37f\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent; outline: none; text-decoration-line: none; color: rgb(0, 0, 0);\" target=\"_blank\">OPPO A37</a>&nbsp;(hay c&ograve;n gọi l&agrave; OPPO Neo 9) l&agrave; sản phẩm kế thừa sự th&agrave;nh c&ocirc;ng của Neo 7, với khung kim loại, mặt lưng giả kim v&agrave; m&agrave;n h&igrave;nh cong 2,5D được bảo vệ bởi k&iacute;nh cường lực Gorilla Glass 4. Ở ph&acirc;n kh&uacute;c dưới 5 triệu đồng, đ&acirc;y l&agrave; một thiết kế kh&aacute; tốt khi so với những đối thủ trong tầm gi&aacute;.</strong></p>', '<ul>\r\n	<li>M&agrave;n h&igrave;nh :5.0 inch (1280 x 720 pixels)</li>\r\n	<li>Hệ điều h&agrave;nh :ColorOS 3.0(Android 5.1)</li>\r\n	<li>K&iacute;ch thước :143.1 x 71 x 7.68 mm</li>\r\n	<li>CPU :Quad core 1.2 Ghz</li>\r\n	<li>RAM :2 GB</li>\r\n	<li>Bộ nhớ trong :16 GB</li>\r\n	<li>Chipset :Qualcomm Snapdragon 410</li>\r\n	<li>Camera :Camera: Ch&iacute;nh 8.0 MP, Phụ 5.0MP</li>\r\n</ul>', '5678.00', '6789.00', '', 'USD', '', '', '', '', '35', '1', '0', null, '', '', null, '', null, null, null, null, null, null, '2', '', '', '2017-11-29 06:08:11', '12', null, '', 'SellPhone');
INSERT INTO `product` VALUES ('24', '', 'opp-f9-plus_product_image.png', '', '', 'OPP F9 Plus', '<p>OPP F9 Plus&nbsp;<strong>dường như đ&atilde; gay sốt ngay từ khi ra mắt bởi những n&acirc;ng cấp đ&aacute;ng gi&aacute; về tốc độ xử l&yacute;, khả năng chụp ảnh, t&iacute;nh năng chống nước, bụi hiện đại... </strong>OPP F9 Plus<strong>đ&atilde; trở th&agrave;nh ước mơ của rất nhiều người đam m&ecirc; c&ocirc;ng nghệ, đặc biệt l&agrave; với phi&ecirc;n bản dung lượng 32 GB c&oacute; gi&aacute; th&agrave;nh hợp l&yacute; hơn cả.</strong></p>', '<ul>\r\n	<li>CPU :2.3 Ghz</li>\r\n	<li>GPU :PowerVR Series7XT Plus</li>\r\n	<li>RAM :2 GB</li>\r\n	<li>Bộ nhớ trong :32 GB</li>\r\n	<li>K&iacute;ch thước :138.3 x 67.1 x 7.1 mm</li>\r\n	<li>M&agrave;n h&igrave;nh :4.7 inch(1334 x 750 pixel)</li>\r\n	<li>Camera :Ch&iacute;nh: 12.0 MP, Phụ: 7.0 MP</li>\r\n	<li>Hệ điều h&agrave;nh :iOS 10</li>\r\n	<li>Chipset :Apple A10</li>\r\n	<li>Kết nối &amp; Cổng giao tiếp</li>\r\n	<li>Cổng sạc :Lightning</li>\r\n	<li>Jack (Input &amp; Output) :Lightning</li>\r\n	<li>Băng tần 2G :GSM / EDGE (850, 900, 1800, 1900 MHz)</li>\r\n	<li>Băng tần 3G :UMTS / HSPA + / DC-HSDPA (850, 900, 1700/2100, 1900, 2100 MHz)</li>\r\n	<li>NFC :C&oacute; (Apple Pay)</li>\r\n	<li>GPRS/EDGE :C&oacute;</li>\r\n	<li>GPS :A-GPS v&agrave; GLONASS</li>\r\n	<li>Cổng kết nối kh&aacute;c :Kh&ocirc;ng</li>\r\n	<li>Băng tần 4G :C&oacute;</li>\r\n	<li>Wifi :802.11a / b / g / n / ac</li>\r\n	<li>Kết nối USB :Lightning</li>\r\n	<li>Bluetooth :v4.2</li>\r\n	<li>Khe cắm sim :1 Sim</li>\r\n	<li>Hỗ trợ SIM :Nano Sim</li>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>C&ocirc;ng nghệ cảm ứng :3D Touch</li>\r\n	<li>Độ ph&acirc;n giải m&agrave;n h&igrave;nh :1334 x 750 pixels</li>\r\n	<li>Mặt k&iacute;nh m&agrave;n h&igrave;nh :K&iacute;nh oleophobic (ion cường lực)</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh :Retina</li>\r\n	<li>M&agrave;u m&agrave;n h&igrave;nh :16 Triệu m&agrave;u</li>\r\n	<li>Chuẩn m&agrave;n h&igrave;nh :Chuẩn HD</li>\r\n	<li>Thiết kế &amp; Trọng lượng</li>\r\n	<li>K&iacute;ch thước :138.3 x 67.1 x 7.1 mm</li>\r\n	<li>Khả năng chống nước :Chuẩn IP67</li>\r\n	<li>Kiểu d&aacute;ng :Thanh (thẳng) + Cảm ứng</li>\r\n	<li>Trọng lượng :138g</li>\r\n	<li>Chất liệu :Hợp kim nh&ocirc;m nguy&ecirc;n khối (mặt k&iacute;nh cong 2,5D)</li>\r\n	<li>Giải tr&iacute; &amp; Ứng dụng</li>\r\n	<li>Xem phim :C&oacute;</li>\r\n	<li>Đ&egrave;n pin :C&oacute;</li>\r\n	<li>Nghe nhạc :C&oacute;</li>\r\n	<li>FM radio :Kh&ocirc;ng</li>\r\n	<li>Ghi &acirc;m :C&oacute;</li>\r\n	<li>Đĩa cứng</li>\r\n	<li>Cảm biến :V&acirc;n tay, gia tốc, con quay hồi chuyển, khoảng c&aacute;ch, la b&agrave;n, &aacute;p kế</li>\r\n	<li>Bộ nhớ &amp; Lưu trữ</li>\r\n	<li>Bộ nhớ c&ograve;n lại :~28 GB</li>\r\n	<li>Danh bạ lưu trữ :Kh&ocirc;ng giới hạn</li>\r\n	<li>ROM :32 GB</li>\r\n	<li>Thẻ nhớ ngo&agrave;i :Kh&ocirc;ng</li>\r\n	<li>Hỗ trợ thẻ nhớ tối đa :Kh&ocirc;ng</li>\r\n	<li>Camera Sau</li>\r\n	<li>Chụp ảnh n&acirc;ng cao :Tự động lấy n&eacute;t, Chạm lấy n&eacute;t, Nhận diện khu&ocirc;n mặt, HDR, Panorama, Chống rung quang học</li>\r\n	<li>Quay phim :Quay phim 4K 2160p@30fps</li>\r\n	<li>Độ ph&acirc;n giải :12.0 MP</li>\r\n	<li>Đ&egrave;n Flash :C&oacute;</li>\r\n	<li>Th&ocirc;ng tin pin</li>\r\n	<li>Chế độ sạc nhanh :Kh&ocirc;ng</li>\r\n	<li>Dung lượng pin :7.45 Wh (1960 mAh)</li>\r\n	<li>Loại pin :Li-Ion</li>\r\n	<li>Pin c&oacute; thể th&aacute;o rời :Kh&ocirc;ng</li>\r\n	<li>Cấu h&igrave;nh phần cứng</li>\r\n	<li>RAM :2 GB</li>\r\n	<li>Tốc độ CPU :2.3 GHz</li>\r\n	<li>Số nh&acirc;n :4 Nh&acirc;n</li>\r\n	<li>Chipset :Apple A10</li>\r\n	<li>Chip đồ họa (GPU) :PowerVR Series7XT Plus</li>\r\n	<li>Camera Trước</li>\r\n	<li>Video Call :C&oacute;</li>\r\n	<li>Th&ocirc;ng tin kh&aacute;c :Selfie ngược s&aacute;ng HDR, Tự động lấy n&eacute;t, Quay video Full HD, Nhận diện khu&ocirc;n mặt, Panorama, Retina Flash</li>\r\n	<li>Độ ph&acirc;n giải :7.0 MP</li>\r\n	<li>Ống k&iacute;nh\r\n	<ul>\r\n		<li>Kiểu điện thoại :Thanh (thẳng) + Cảm ứng<br />\r\n		&nbsp;</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '2523.00', '2332.00', '', 'USD', '', '', '', '', '35', '1', '0', null, '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-11-29 06:10:42', '12', null, '', 'SellPhone');
INSERT INTO `product` VALUES ('25', '', 'iphone-7-plus_product_image.jpg', '', '', 'IPHONE 7 PLUS', '<p style=\"text-align:justify\"><strong><a href=\"https://fptshop.com.vn/dien-thoai/iphone-7-Plus\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent; outline: none; text-decoration-line: none; color: rgb(0, 0, 0);\" target=\"_blank\">iPhone 7 Plus</a>&nbsp;dường như l&agrave; sản phẩm được Apple chăm ch&uacute;t để vượt xa iPhone 7, trở th&agrave;nh sản phẩm rất đ&aacute;ng để n&acirc;ng cấp so với iPhone 6s Plus khi được n&acirc;ng cấp th&ecirc;m camera k&eacute;p c&ugrave;ng chức năng chụp ch&acirc;n dung xo&aacute; ph&ocirc;ng cực &quot;hot&quot;. Kh&ocirc;ng chỉ vậy, n&acirc;ng cấp đ&aacute;ng gi&aacute; kh&aacute;c như tốc độ xử l&yacute; nhanh hơn, chống nước, bụi, loa ngo&agrave;i sống động... Tất cả đ&atilde; tạo n&ecirc;n một sản phẩm h&agrave;ng đầu tuyệt vời.</strong></p>\r\n\r\n<p>&nbsp;</p>', '<ul>\r\n	<li>Chipset :Apple A10</li>\r\n	<li>Camera :Ch&iacute;nh: Dual Camera 12.0MP; Phụ: 7.0MP</li>\r\n	<li>Bộ nhớ trong :32 GB</li>\r\n	<li>GPU :PowerVR Series7XT Plus</li>\r\n	<li>Hệ điều h&agrave;nh :iOS</li>\r\n	<li>RAM :3 GB</li>\r\n	<li>CPU :Quad-core 2.3 GHz</li>\r\n	<li>M&agrave;n h&igrave;nh :5.5 inch (1920 x 1080 pixels)</li>\r\n	<li>K&iacute;ch thước :158.2 x 77.9 x 7.3 mm</li>\r\n	<li>Thiết kế &amp; Trọng lượng</li>\r\n	<li>K&iacute;ch thước :158.2 x 77.9 x 7.3 mm</li>\r\n	<li>Chất liệu :Hợp kim nh&ocirc;m nguy&ecirc;n khối (mặt k&iacute;nh cong 2,5D)</li>\r\n	<li>Kiểu d&aacute;ng :Thanh (thẳng) + Cảm ứng</li>\r\n	<li>Trọng lượng :188 g</li>\r\n	<li>Khả năng chống nước :Chuẩn IP67</li>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>Mặt k&iacute;nh m&agrave;n h&igrave;nh :K&iacute;nh oleophobic (ion cường lực)</li>\r\n	<li>C&ocirc;ng nghệ cảm ứng :3D Touch</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh :Retina</li>\r\n	<li>Chuẩn m&agrave;n h&igrave;nh :Full HD</li>\r\n	<li>Độ ph&acirc;n giải m&agrave;n h&igrave;nh :1920 x 1080 pixels</li>\r\n	<li>M&agrave;u m&agrave;n h&igrave;nh :16 Triệu m&agrave;u</li>\r\n	<li>Bộ nhớ &amp; Lưu trữ</li>\r\n	<li>Hỗ trợ thẻ nhớ tối đa :Kh&ocirc;ng</li>\r\n	<li>ROM :32 GB</li>\r\n	<li>Thẻ nhớ ngo&agrave;i :Kh&ocirc;ng</li>\r\n	<li>Danh bạ lưu trữ :Kh&ocirc;ng giới hạn</li>\r\n	<li>Bộ nhớ c&ograve;n lại :~28 GB</li>\r\n	<li>Kết nối &amp; Cổng giao tiếp</li>\r\n	<li>Kết nối USB :Lightning</li>\r\n	<li>Băng tần 2G :GSM / EDGE (850, 900, 1800, 1900 MHz)</li>\r\n	<li>Băng tần 3G :UMTS / HSPA + / DC-HSDPA (850, 900, 1700/2100, 1900, 2100 MHz)</li>\r\n	<li>Khe cắm sim :1 Sim</li>\r\n	<li>NFC :C&oacute; (Apple Pay)</li>\r\n	<li>GPRS/EDGE :C&oacute;</li>\r\n	<li>GPS :A-GPS v&agrave; GLONASS</li>\r\n	<li>Wifi :Wi-Fi 802.11 a/b/g/n/ac</li>\r\n	<li>Băng tần 4G :C&oacute;</li>\r\n	<li>Bluetooth :v4.2</li>\r\n	<li>Cổng kết nối kh&aacute;c :Air Play, OTG, HDMI</li>\r\n	<li>Cổng sạc :Lightning</li>\r\n	<li>Jack (Input &amp; Output) :Lightning</li>\r\n	<li>Hỗ trợ SIM :Nano Sim</li>\r\n	<li>Camera Sau</li>\r\n	<li>Độ ph&acirc;n giải :Dual 12.0 MP</li>\r\n	<li>Quay phim :Quay phim 4K 2160p@30fps</li>\r\n	<li>Đ&egrave;n Flash :C&oacute;</li>\r\n	<li>Chụp ảnh n&acirc;ng cao :Tự động lấy n&eacute;t, Chạm lấy n&eacute;t, Nhận diện khu&ocirc;n mặt, HDR, Panorama, Chống rung quang học (OIS)</li>\r\n	<li>Giải tr&iacute; &amp; Ứng dụng</li>\r\n	<li>Xem phim :H.265, 3GP, MP4, AVI, WMV, H.264(MPEG4-AVC), DivX, WMV9, Xvid</li>\r\n	<li>FM radio :Kh&ocirc;ng</li>\r\n	<li>Nghe nhạc :Lossless, Midi, MP3, WAV, WMA, AAC, eAAC+</li>\r\n	<li>Đ&egrave;n pin :C&oacute;</li>\r\n	<li>Ghi &acirc;m :C&oacute;</li>\r\n	<li>Cấu h&igrave;nh phần cứng</li>\r\n	<li>RAM :3 GB</li>\r\n	<li>Số nh&acirc;n :4 Nh&acirc;n</li>\r\n	<li>Tốc độ CPU :2.3 GHz</li>\r\n	<li>Chipset :A10</li>\r\n	<li>Chip đồ họa (GPU) :M10</li>\r\n	<li>Th&ocirc;ng tin pin</li>\r\n	<li>Dung lượng pin :11.1 Wh (2900 mAh)</li>\r\n	<li>Loại pin :Li-Ion</li>\r\n	<li>Pin c&oacute; thể th&aacute;o rời :Kh&ocirc;ng</li>\r\n	<li>Chế độ sạc nhanh :Kh&ocirc;ng</li>\r\n	<li>Camera Trước</li>\r\n	<li>Độ ph&acirc;n giải :7.0 MP</li>\r\n	<li>Th&ocirc;ng tin kh&aacute;c :Selfie ngược s&aacute;ng HDR, Tự động lấy n&eacute;t, Quay video Full HD, Nhận diện khu&ocirc;n mặt, Retina Flash</li>\r\n	<li>Video Call :C&oacute;</li>\r\n	<li>Ống k&iacute;nh</li>\r\n	<li>Kiểu điện thoại :Thanh (thẳng) + Cảm ứng</li>\r\n	<li>Đĩa cứng</li>\r\n	<li>Cảm biến :V&acirc;n tay, gia tốc, con quay hồi chuyển, khoảng c&aacute;ch, la b&agrave;n, &aacute;p kế<br />\r\n	&nbsp;</li>\r\n</ul>', '3245.00', '1234.00', '', 'USD', '', '', '', '', '34', '1', '0', null, '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-11-29 06:14:28', '12', null, '', 'SellPhone');
INSERT INTO `product` VALUES ('26', '', 'iphone-8-plus_product26_image.png', '', '', 'IPHONE 8 Plus', '<p><strong>Apple bất ngờ ra mắt bộ đ&ocirc;i iPhone 8 v&agrave;&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/iphone-8-plus-64gb\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent; outline: none; text-decoration-line: none; color: rgb(0, 0, 0);\" target=\"_blank\">iPhone 8 Plus</a>&nbsp;tạo ra cơn b&atilde;o mới c&agrave;n qu&eacute;t hết c&aacute;c bảng xếp hạng si&ecirc;u phẩm. Như thường lệ, iPhone 8 Plus từ thiết kế cho tới t&iacute;nh năng đều mang đến cho người d&ugrave;ng những trải nghiệm th&uacute; vị tuyệt vời kh&ocirc;ng thể bỏ lỡ.</strong></p>', '<ul>\r\n	<li>M&agrave;n h&igrave;nh :5.5 inchs HD Retina</li>\r\n	<li>Camera :Camera sau: Dual 12 MP, (28mm, f/1.8, OIS &amp; 56mm, f/2.8), Camera trước: 7 MP, f/2.2</li>\r\n	<li>RAM :3 GB</li>\r\n	<li>Bộ nhớ trong :64 GB</li>\r\n	<li>Hệ điều h&agrave;nh :iOS 11</li>\r\n	<li>Chipset :Apple A11 Bionic</li>\r\n	<li>CPU :Hexa-core (2x Monsoon + 4x Mistral)</li>\r\n	<li>GPU :Apple GPU (three-core graphics)</li>\r\n	<li>K&iacute;ch thước :158.4 x 78.1 x 7.5 mm</li>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh :Widescreen LCD Multi-Touch display with IPS technology</li>\r\n	<li>M&agrave;u m&agrave;n h&igrave;nh :16 Triệu m&agrave;u</li>\r\n	<li>Chuẩn m&agrave;n h&igrave;nh :Retina HD</li>\r\n	<li>Độ ph&acirc;n giải m&agrave;n h&igrave;nh :1920 x 1080 pixels</li>\r\n	<li>C&ocirc;ng nghệ cảm ứng :3D Touch</li>\r\n	<li>Mặt k&iacute;nh m&agrave;n h&igrave;nh :K&iacute;nh cường lực</li>\r\n	<li>Camera Trước</li>\r\n	<li>Video Call :C&oacute;</li>\r\n	<li>Độ ph&acirc;n giải :7.0 MP</li>\r\n	<li>Camera Sau</li>\r\n	<li>Độ ph&acirc;n giải :Dual 12.0 MP</li>\r\n	<li>Quay phim :2160p@24/30/60fps, 1080p@30/60/120/240fps</li>\r\n	<li>Đ&egrave;n Flash :C&oacute;</li>\r\n	<li>Chụp ảnh n&acirc;ng cao :Geo-tagging, simultaneous 4K video and 8MP image recording, touch focus, face/smile detection, HDR (photo/panorama)</li>\r\n	<li>Cấu h&igrave;nh phần cứng</li>\r\n	<li>Số nh&acirc;n :6</li>\r\n	<li>Chipset :Apple A11 Bionic</li>\r\n	<li>RAM :3 GB</li>\r\n	<li>Chip đồ họa (GPU) :Apple GPU (three-core graphics)</li>\r\n	<li>Cảm biến :Fingerprint (front-mounted), accelerometer, gyro, proximity, compass, barometer</li>\r\n	<li>Bộ nhớ &amp; Lưu trữ</li>\r\n	<li>Danh bạ lưu trữ :Kh&ocirc;ng giới hạn</li>\r\n	<li>ROM :64 GB</li>\r\n	<li>Thẻ nhớ ngo&agrave;i :Kh&ocirc;ng</li>\r\n	<li>Hỗ trợ thẻ nhớ tối đa :Kh&ocirc;ng</li>\r\n	<li>Thiết kế &amp; Trọng lượng</li>\r\n	<li>Kiểu d&aacute;ng :Thanh (thẳng) + Cảm ứng</li>\r\n	<li>Chất liệu :Khung kim loại + mặt k&iacute;nh cường lực</li>\r\n	<li>K&iacute;ch thước :158.4 x 78.1 x 7.5 mm</li>\r\n	<li>Trọng lượng :202 g</li>\r\n	<li>Khả năng chống nước :Chuẩn IP67</li>\r\n	<li>Th&ocirc;ng tin pin</li>\r\n	<li>Loại pin :Li-Ion</li>\r\n	<li>Dung lượng pin :2675 mAh</li>\r\n	<li>Pin c&oacute; thể th&aacute;o rời :Kh&ocirc;ng</li>\r\n	<li>Kết nối &amp; Cổng giao tiếp</li>\r\n	<li>Kết nối USB :Lightning</li>\r\n	<li>Cổng sạc :Lightning</li>\r\n	<li>Jack (Input &amp; Output) :Lightning</li>\r\n	<li>Băng tần 2G :GSM/EDGE (850, 900, 1800, 1900 MHz)</li>\r\n	<li>Băng tần 3G :UMTS/HSPA+/DC-HSDPA (850, 900, 1700/2100, 1900, 2100 MHz)</li>\r\n	<li>Băng tần 4G :TD-LTE (Bands 34, 38, 39, 40, 41)</li>\r\n	<li>Hỗ trợ SIM :Nano Sim</li>\r\n	<li>Khe cắm sim :1 Sim</li>\r\n	<li>Wifi :802.11ac Wi‑Fi with MIMO</li>\r\n	<li>GPS :C&oacute;</li>\r\n	<li>Bluetooth :v5.0</li>\r\n	<li>Giải tr&iacute; &amp; Ứng dụng</li>\r\n	<li>Xem phim :HEVC, H.264, MPEG-4 Part 2, and Motion JPEG</li>\r\n	<li>Nghe nhạc :AAC-LC, HE-AAC, HE-AAC v2, Protected AAC, MP3, Linear PCM, Apple Lossless, FLAC</li>\r\n	<li>Ghi &acirc;m :C&oacute;</li>\r\n	<li>FM radio :C&oacute;</li>\r\n	<li>Đ&egrave;n pin :C&oacute;</li>\r\n	<li>Bảo h&agrave;nh</li>\r\n	<li>Thời gian bảo h&agrave;nh :12 Th&aacute;ng</li>\r\n	<li>Hệ điều h&agrave;nh</li>\r\n	<li>Hệ điều h&agrave;nh :iOS 11</li>\r\n</ul>\r\n\r\n<p style=\"text-align:center\">X</p>', '1234.00', '3432.00', '', 'USD', '', '', '', '', '34', '1', '0', null, '', '', null, '', null, null, null, null, null, null, '5', '', '', '2017-11-29 06:17:18', '12', '2017-11-29 06:18:34', '12', 'SellPhone');
INSERT INTO `product` VALUES ('27', '', 'samsung-galaxy-s8_product_image.png', '', '', 'Samsung Galaxy S8', '<p><strong><a href=\"https://fptshop.com.vn/dien-thoai/samsung-galaxy-s8-plus-orchid-gray\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent; outline: none; text-decoration-line: none; color: rgb(0, 0, 0);\" target=\"_blank\">Samsung S8 </a>&nbsp;l&agrave; phi&ecirc;n bản m&agrave;u mới cực độc cho Galaxy S8 Plus, m&agrave;u t&iacute;m kh&oacute;i. Đ&acirc;y l&agrave; phi&ecirc;n bản rất đ&aacute;ng mua cho những ai đang t&igrave;m kiếm một chiếc điện thoại cao cấp. Thiết kế ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n đ&atilde; mang lại cảm x&uacute;c th&aacute;n phục bởi sự sắc sảo, tinh tế đến từ chi tiết v&agrave; một m&agrave;n h&igrave;nh cong tr&agrave;n cạnh &ldquo;kh&ocirc;ng viền&rdquo; đ&aacute;ng ngạc nhi&ecirc;n tr&ecirc;n nền m&agrave;u sắc độc đ&aacute;o. K&egrave;m theo l&agrave; nhiều t&iacute;nh năng đặc biệt th&uacute; vị nhằm n&acirc;ng cao trải nghiệm cho người d&ugrave;ng.</strong></p>', '<ul>\r\n	<li>M&agrave;n h&igrave;nh :6.2 inch Super AMOLED (2560 x 1440 pixel)</li>\r\n	<li>Camera :Ch&iacute;nh: 12.0 MP, Phụ: 8.0 MP</li>\r\n	<li>RAM :4 GB</li>\r\n	<li>Bộ nhớ trong :64 GB</li>\r\n	<li>Hệ điều h&agrave;nh :Android 7.0</li>\r\n	<li>Chipset :Exynos 8895</li>\r\n	<li>CPU :L&otilde;i T&aacute;m (l&otilde;i Tứ 2.3GHz + l&otilde;i Tứ 1.7GHz), 64 bit, vi xử l&yacute; 10nm</li>\r\n	<li>GPU :Mali&trade; G71</li>\r\n	<li>K&iacute;ch thước :159.5 x 73.4 x 8.1mm</li>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh :Super AMOLED</li>\r\n	<li>M&agrave;u m&agrave;n h&igrave;nh :16 Triệu m&agrave;u</li>\r\n	<li>Chuẩn m&agrave;n h&igrave;nh :2K</li>\r\n	<li>Độ ph&acirc;n giải m&agrave;n h&igrave;nh :2560 x 1440 pixels</li>\r\n	<li>C&ocirc;ng nghệ cảm ứng :Đa điểm</li>\r\n	<li>Mặt k&iacute;nh m&agrave;n h&igrave;nh :Corning Gorilla Glass 5</li>\r\n	<li>Camera Trước</li>\r\n	<li>Video Call :C&oacute;</li>\r\n	<li>Độ ph&acirc;n giải :8.0 MP</li>\r\n	<li>Th&ocirc;ng tin kh&aacute;c :Camera g&oacute;c rộng, Chế độ l&agrave;m đẹp, Nhận diện khu&ocirc;n mặt, Selfie bằng cử chỉ, Flash m&agrave;n h&igrave;nh</li>\r\n	<li>Camera Sau</li>\r\n	<li>Độ ph&acirc;n giải :Dual 12.0 MP</li>\r\n	<li>Quay phim :Quay phim 4K 2160p@60fps</li>\r\n	<li>Đ&egrave;n Flash :C&oacute;</li>\r\n	<li>Chụp ảnh n&acirc;ng cao :Chụp trước lấy n&eacute;t sau, Chụp ảnh x&oacute;a ph&ocirc;ng, Chụp phơi s&aacute;ng, Tự động lấy n&eacute;t, Chạm lấy n&eacute;t, Nhận diện khu&ocirc;n mặt, HDR, Panorama, Chống rung quang học (OIS), Chế độ chụp chuy&ecirc;n nghiệp</li>\r\n	<li>Cấu h&igrave;nh phần cứng</li>\r\n	<li>Tốc độ CPU :4 nh&acirc;n 2.3 GHz v&agrave; 4 nh&acirc;n 1.7 GHz</li>\r\n	<li>Số nh&acirc;n :8 Nh&acirc;n</li>\r\n	<li>Chipset :Exynos 8895</li>\r\n	<li>RAM :4 GB</li>\r\n	<li>Chip đồ họa (GPU) :Mali&trade; G71</li>\r\n	<li>Bộ nhớ &amp; Lưu trữ</li>\r\n	<li>Danh bạ lưu trữ :Kh&ocirc;ng giới hạn</li>\r\n	<li>ROM :64 GB</li>\r\n	<li>Bộ nhớ c&ograve;n lại :Đang cập nhật</li>\r\n	<li>Thẻ nhớ ngo&agrave;i :MicroSD</li>\r\n	<li>Hỗ trợ thẻ nhớ tối đa :256 GB</li>\r\n	<li>Thiết kế &amp; Trọng lượng</li>\r\n	<li>Kiểu d&aacute;ng :Thanh (thẳng) + Cảm ứng</li>\r\n	<li>Chất liệu :Nguy&ecirc;n khối viền kim loại</li>\r\n	<li>K&iacute;ch thước :159.5 x 73.4 x 8.1mm</li>\r\n	<li>Trọng lượng :173 g</li>\r\n	<li>Khả năng chống nước :Chuẩn IP68</li>\r\n	<li>Th&ocirc;ng tin pin</li>\r\n	<li>Loại pin :Li-Ion</li>\r\n	<li>Dung lượng pin :3500 mAh</li>\r\n	<li>Pin c&oacute; thể th&aacute;o rời :Kh&ocirc;ng</li>\r\n	<li>Kết nối &amp; Cổng giao tiếp</li>\r\n	<li>Băng tần 4G :C&oacute;</li>\r\n	<li>Hỗ trợ SIM :Nano Sim</li>\r\n	<li>Khe cắm sim :2 Sim</li>\r\n	<li>Wifi :Wi-Fi 802.11 a/b/g/n/ac</li>\r\n	<li>GPS :A-GPS, GLONASS, BDS</li>\r\n	<li>Bluetooth :v5.0</li>\r\n	<li>GPRS/EDGE :C&oacute;</li>\r\n	<li>NFC :C&oacute;</li>\r\n	<li>Kết nối USB :USB Type-C</li>\r\n	<li>Cổng kết nối kh&aacute;c :Hỗ trợ OTG</li>\r\n	<li>Cổng sạc :USB Type-C</li>\r\n	<li>Jack (Input &amp; Output) :3.5 mm</li>\r\n	<li>Giải tr&iacute; &amp; Ứng dụng</li>\r\n	<li>Xem phim :MP4/DivX/XviD/H.265 player</li>\r\n	<li>Nghe nhạc :MP3/WAV/eAAC+/Flac player</li>\r\n	<li>Ghi &acirc;m :C&oacute;</li>\r\n	<li>FM radio :C&oacute;</li>\r\n	<li>Đ&egrave;n pin :C&oacute;</li>\r\n	<li>Chức năng kh&aacute;c :Photo/video editor, Document viewer</li>\r\n	<li>Bảo h&agrave;nh</li>\r\n	<li>Thời gian bảo h&agrave;nh :12 Th&aacute;ng<br />\r\n	&nbsp;</li>\r\n</ul>', '2345.00', '234.00', '', 'USD', '', '', '', '', '36', '1', '0', null, '', '', null, '', null, null, null, null, null, null, '3', '', '', '2017-11-29 06:21:20', '12', null, '', 'SellPhone');
INSERT INTO `product` VALUES ('28', '', 'samsung-galaxy-note_product_image.png', '', '', 'Samsung Galaxy Note', '<p><strong>Galaxy Note Fan Edition (FE) được Samsung giới thiệu thị trường Việt Nam với mức gi&aacute; đặc biệt d&agrave;nh cho những người y&ecirc;u th&iacute;ch d&ograve;ng Note.&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/samsung-galaxy-note-fe\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent; outline: none; text-decoration-line: none; color: rgb(0, 0, 0);\" target=\"_blank\">Samsung Note FE</a>&nbsp;sở hữu tất cả c&aacute;c t&iacute;nh năng cao cấp được người d&ugrave;ng Note y&ecirc;u th&iacute;ch v&agrave; mong đợi.</strong></p>', '<ul>\r\n	<li>M&agrave;n h&igrave;nh :5.7&quot;</li>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh :Super AMOLED</li>\r\n	<li>M&agrave;u m&agrave;n h&igrave;nh :16 triệu m&agrave;u</li>\r\n	<li>Chuẩn m&agrave;n h&igrave;nh :Full HD</li>\r\n	<li>Độ ph&acirc;n giải m&agrave;n h&igrave;nh :2K (1440 x 2560 pixels)</li>\r\n	<li>C&ocirc;ng nghệ cảm ứng :Điện dung đa điểm</li>\r\n	<li>Mặt k&iacute;nh m&agrave;n h&igrave;nh :Corning Gorilla Glass 5</li>\r\n	<li>Camera Trước</li>\r\n	<li>Độ ph&acirc;n giải :5.0 MP</li>\r\n	<li>Th&ocirc;ng tin kh&aacute;c :Selfie ngược s&aacute;ng HDR,&nbsp;Chụp bằng giọng n&oacute;i,&nbsp;Quay video Full HD,&nbsp;Chế độ l&agrave;m đẹp,&nbsp;Nhận diện khu&ocirc;n mặt,&nbsp;Selfie bằng cử chỉ,&nbsp;Camera g&oacute;c rộng</li>\r\n	<li>Camera Sau</li>\r\n	<li>Độ ph&acirc;n giải :12.0 MP</li>\r\n	<li>Quay phim :Quay phim FullHD 1080p@60fps,&nbsp;Quay phim 4K 2160p@24fps</li>\r\n	<li>Đ&egrave;n Flash :C&oacute;</li>\r\n	<li>Chụp ảnh n&acirc;ng cao :Tự động lấy n&eacute;t,&nbsp;Chạm lấy n&eacute;t,&nbsp;Nhận diện khu&ocirc;n mặt,&nbsp;HDR,&nbsp;Panorama,&nbsp;Chống rung quang học (OIS),&nbsp;Chế độ chụp chuy&ecirc;n nghiệp</li>\r\n	<li>Cấu h&igrave;nh phần cứng</li>\r\n	<li>Tốc độ CPU :4 nh&acirc;n 2.6 GHz v&agrave; 4 nh&acirc;n 1.6 GHz</li>\r\n	<li>Số nh&acirc;n :4 nh&acirc;n 2.6 GHz v&agrave; 4 nh&acirc;n 1.6 GHz</li>\r\n	<li>Chipset :Exynos 8890 8 nh&acirc;n 64-bit</li>\r\n	<li>RAM :4 GB</li>\r\n	<li>Chip đồ họa (GPU) :Mali-T880 MP12</li>\r\n	<li>Cảm biến :V&acirc;n tay, qu&eacute;t mống mắt</li>\r\n	<li>Bộ nhớ &amp; Lưu trữ</li>\r\n	<li>Danh bạ lưu trữ :Kh&ocirc;ng giới hạn</li>\r\n	<li>ROM :64 GB</li>\r\n	<li>Bộ nhớ c&ograve;n lại :Đang cập nhật</li>\r\n	<li>Thẻ nhớ ngo&agrave;i :Chưa x&aacute;c định</li>\r\n	<li>Hỗ trợ thẻ nhớ tối đa :Chưa x&aacute;c định</li>\r\n	<li>Thiết kế &amp; Trọng lượng</li>\r\n	<li>Kiểu d&aacute;ng :Nguy&ecirc;n khối</li>\r\n	<li>Chất liệu :Khung kim loại + mặt k&iacute;nh cường lực</li>\r\n	<li>K&iacute;ch thước :D&agrave;i 153.5 mm - Ngang 73.9 mm - D&agrave;y 7.9 mm</li>\r\n	<li>Trọng lượng :169 g</li>\r\n	<li>Khả năng chống nước :C&oacute;</li>\r\n	<li>Th&ocirc;ng tin pin</li>\r\n	<li>Loại pin :Li-Ion</li>\r\n	<li>Dung lượng pin :3200 mAh</li>\r\n	<li>Pin c&oacute; thể th&aacute;o rời :C&oacute;</li>\r\n	<li>Thời gian chờ :Đang cập nhật</li>\r\n	<li>Thời gian đ&agrave;m thoại :Đang cập nhật</li>\r\n	<li>Thời gian sạc đầy :Đang cập nhật</li>\r\n	<li>Chế độ sạc nhanh :C&oacute;</li>\r\n	<li>Kết nối &amp; Cổng giao tiếp</li>\r\n	<li>Băng tần 2G :C&oacute;</li>\r\n	<li>Băng tần 3G :C&oacute;</li>\r\n	<li>Băng tần 4G :C&oacute;</li>\r\n	<li>Hỗ trợ SIM :Nano Sim</li>\r\n	<li>Khe cắm sim :2 Sim</li>\r\n	<li>Wifi :Wi-Fi 802.11 a/b/g/n/ac,&nbsp;Dual-band,&nbsp;DLNA,&nbsp;Wi-Fi Direct,&nbsp;Wi-Fi hotspot</li>\r\n	<li>GPS :A-GPS,&nbsp;GLONASS</li>\r\n	<li>Bluetooth :v4.2,&nbsp;apt-X,&nbsp;A2DP,&nbsp;LE,&nbsp;EDR</li>\r\n	<li>GPRS/EDGE :C&oacute;</li>\r\n	<li>NFC :C&oacute;</li>\r\n	<li>Cổng sạc :USB Type-C</li>\r\n	<li>Jack (Input &amp; Output) :3.5 mm</li>\r\n	<li>Giải tr&iacute; &amp; Ứng dụng</li>\r\n	<li>Xem phim :H.265,&nbsp;3GP,&nbsp;MP4,&nbsp;AVI,&nbsp;WMV,&nbsp;H.264(MPEG4-AVC),&nbsp;DivX,&nbsp;WMV9,&nbsp;Xvid</li>\r\n	<li>Nghe nhạc :Midi,&nbsp;Lossless,&nbsp;MP3,&nbsp;WAV,&nbsp;WMA,&nbsp;AAC++,&nbsp;eAAC+,&nbsp;OGG,&nbsp;AC3,&nbsp;FLAC</li>\r\n	<li>Ghi &acirc;m :C&oacute;</li>\r\n	<li>FM radio :Kh&ocirc;ng</li>\r\n	<li>Đ&egrave;n pin :C&oacute;</li>\r\n	<li>Chức năng kh&aacute;c :Mở kh&oacute;a bằng v&acirc;n tay,&nbsp;Qu&eacute;t mống mắt</li>\r\n	<li>Bảo h&agrave;nh</li>\r\n	<li>Thời gian bảo h&agrave;nh :12</li>\r\n	<li>Hệ điều h&agrave;nh</li>\r\n	<li>Hệ điều h&agrave;nh :Android 7.0<br />\r\n	&nbsp;</li>\r\n</ul>', '234.00', '34.23', '', 'USD', '', '', '', '', '36', '1', '0', '1', '', '', null, '', null, null, null, null, null, null, '5', '', '', '2017-11-29 06:23:01', '12', '2017-12-04 08:14:33', '12', 'SellPhone');

-- ----------------------------
-- Table structure for `promotion`
-- ----------------------------
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE `promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `banner` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `overview` varchar(2000) DEFAULT NULL,
  `content` text,
  `link_url` varchar(255) DEFAULT NULL,
  `discount_type` varchar(100) DEFAULT NULL COMMENT 'data:percent,price_off;group:Discount',
  `discount` int(11) DEFAULT NULL COMMENT 'group:Discount',
  `usage_limit` int(12) DEFAULT NULL COMMENT 'group:Usage',
  `usage_current` int(11) DEFAULT NULL COMMENT 'group:Usage',
  `apply_type` varchar(100) DEFAULT NULL COMMENT 'data:all,sales_over,products; group:Apply',
  `sales_over` int(11) DEFAULT NULL COMMENT 'group:Apply',
  `products` varchar(500) DEFAULT NULL COMMENT 'group:Apply;lookup:@product',
  `start_date` date DEFAULT NULL COMMENT 'group:Duration',
  `end_date` date DEFAULT NULL COMMENT 'group:Duration',
  `is_top` tinyint(1) DEFAULT NULL COMMENT 'group:Group',
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `count_views` int(11) DEFAULT NULL,
  `count_shares` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of promotion
-- ----------------------------
INSERT INTO `promotion` VALUES ('1', 'Hung', 'cms_promotion1_image.png', 'cms_promotion1_banner.png', 'Promotion 1', 'Link FSDFSD', '<p>FSDFSDFSDFSD</p>', '', 'percent', '50', null, null, '', null, null, '2016-10-29', null, '0', '1', null, null, null, '2016-10-05', '6', '2016-10-05', '6', 'education');

-- ----------------------------
-- Table structure for `provider`
-- ----------------------------
DROP TABLE IF EXISTS `provider`;
CREATE TABLE `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `content` text,
  `start_date` varchar(255) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL COMMENT 'group:CONTACT',
  `phone` varchar(255) DEFAULT NULL COMMENT 'group:CONTACT',
  `email` varchar(255) DEFAULT NULL COMMENT 'group:CONTACT',
  `address` varchar(2000) DEFAULT NULL COMMENT 'group:CONTACT',
  `website` varchar(255) DEFAULT NULL COMMENT 'group:CONTACT',
  `city` varchar(100) DEFAULT NULL COMMENT 'group:LOCATION',
  `country` varchar(100) DEFAULT NULL COMMENT 'group:LOCATION',
  `lat` float DEFAULT NULL COMMENT 'group:LOCATION',
  `long` float DEFAULT NULL COMMENT 'group:LOCATION',
  `rate` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL COMMENT 'data:Author,Partner,Distributor,Manufacturer',
  `status` varchar(100) DEFAULT NULL COMMENT 'data:New,VIP,Partner,Normal,Closed',
  `is_top` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of provider
-- ----------------------------
INSERT INTO `provider` VALUES ('1', null, null, 'MOZA Group', null, null, '2016-09-23', null, '0912738748', 'fdsfsd', '17 Phung Chi Kien, Cau giay, Hanoi', null, 'MST-DFSDFS', '', null, null, null, 'le', '', null, '1', null, null, null, null, null, null);
INSERT INTO `provider` VALUES ('2', '', 'fdsf', 'dsfsdfafs', '', '', '', '', '', '', '', '', '', '', null, null, null, '', '', '0', '1', null, '2017-03-10', '6', '2017-03-10', '6', 'vinh_hung');
INSERT INTO `provider` VALUES ('3', '', 'FSDF', 'FDSFDS', '', '', '', '', '', '', '', '', '', '', null, null, null, '', '', null, '1', null, '2017-03-10', '6', null, '', 'vinh_hung');
INSERT INTO `provider` VALUES ('4', '', 'FSDFSD', 'FSDFSDFD', '', '', '', '', '', '', '', '', '', '', null, null, null, '', '', '0', '1', null, '2017-03-10', '6', '2017-03-10', '6', 'vinh_hung');
INSERT INTO `provider` VALUES ('5', '', 'FUck', 'Fuck sd', '', '', '', '', '', '', '', '', '', '', null, null, null, '', '', null, '1', null, '2017-03-10', '6', '2017-03-10', '6', 'vinh_hung');
INSERT INTO `provider` VALUES ('6', '', 'AAA', 'AAA', '', '', '', '', '', '', '', '', '', '', null, null, null, '', '', null, '1', null, '2017-03-10', '6', null, '', 'vinh_hung');
INSERT INTO `provider` VALUES ('7', '', 'DDD', 'WHy', '', '', '', '', '', '', '', '', '', '', null, null, null, '', '', null, '1', null, '2017-03-10', '6', null, '', 'vinh_hung');
INSERT INTO `provider` VALUES ('8', '', 'Hihi', 'Hihi', '', '', '', '', '', '', '', '', '', '', null, null, null, '', '', null, '1', null, '2017-03-10', '6', null, '', 'vinh_hung');
INSERT INTO `provider` VALUES ('9', '', 'Dien', 'Dien', '', '', '', '', '', '', '', '', '', '', null, null, null, '', '', null, '1', null, '2017-03-10', '6', null, '', 'vinh_hung');
INSERT INTO `provider` VALUES ('10', '', 'AAA', 'BBB', '', '', '', '3333', 'fsds', 'hung.hoxuan@gmail.com', '', '', '', '', null, null, null, '', '', null, '1', null, '2017-03-15', '6', null, '', 'vinh_hung');
INSERT INTO `provider` VALUES ('11', '', 'Provider 1', 'Provider 2', 'Hahah', '<p>Hihih</p>', '', 'DD', 'DD', 'DDD', 'FDSFDS', 'BBBB', 'Johor', '', null, null, '0', 'Author', 'New', '1', '0', null, '2017-05-22', '9', '2017-05-22', '9', 'trayolo');

-- ----------------------------
-- Table structure for `setting`
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metaKey` varchar(255) DEFAULT NULL,
  `metaValue` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', 'ADMIN_EMAIL', 'admin-email@gmail.com');
INSERT INTO `setting` VALUES ('2', 'GOOGLE_API_KEY', 'AIzaSyAKb1Qz5tE3P9O0F-mRAPQdXgQi5UfGE1g');
INSERT INTO `setting` VALUES ('3', 'PEM_FILE', '1483088916.pem');
INSERT INTO `setting` VALUES ('4', 'COMPANY_NAME', 'PT');
INSERT INTO `setting` VALUES ('5', 'COMPANY_DESCRIPTION', 'App & Template');
INSERT INTO `setting` VALUES ('6', 'COMPANY_HOMEPAGE', 'projectemplate.com');
INSERT INTO `setting` VALUES ('7', 'EXCHANGE_RATE', '1');
INSERT INTO `setting` VALUES ('8', 'DEAL_ONLINE_RATE', '1');
INSERT INTO `setting` VALUES ('9', 'PREMIUM_DEAL_ONLINE_RATE', '3');
INSERT INTO `setting` VALUES ('10', 'DRIVER_ONLINE_RATE', '3');
INSERT INTO `setting` VALUES ('11', 'SEARCHING_DEAL_DISTANCE', '5');
INSERT INTO `setting` VALUES ('12', 'SEARCHING_DRIVER_DISTANCE', '10');
INSERT INTO `setting` VALUES ('13', 'EXCHANGE_FEE', '1');
INSERT INTO `setting` VALUES ('14', 'TRANSFER_FEE', '0');
INSERT INTO `setting` VALUES ('15', 'REDEEM_FEE', '0');
INSERT INTO `setting` VALUES ('16', 'TRIP_PAYMENT_FEE', '0');
INSERT INTO `setting` VALUES ('17', 'DEAL_PAYMENT_FEE', '0');
INSERT INTO `setting` VALUES ('18', 'PAGE_FAQ', '<h1 style=\"text-align:center\">FAQs</h1>\n\n<h4 style=\"text-align:center\">&quot;Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...&quot;</h4>\n\n<h5 style=\"text-align:center\">&quot;There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...&quot;</h5>\n\n<p>&nbsp;</p>\n\n<p><strong>Frequently asked questions</strong>&nbsp;(<strong>FAQ</strong>) or&nbsp;<strong>Questions and Answers</strong>&nbsp;(<strong>Q&amp;A</strong>), are listed questions and answers, all supposed to be commonly asked in some context, and pertaining to a particular topic. The format is commonly used on email mailing lists and other online forums, where certain common questions tend to recur.</p>\n\n<p>&quot;FAQ&quot; is pronounced as either an&nbsp;<a class=\"mw-redirect\" href=\"https://en.wikipedia.org/wiki/Initialism\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Initialism\">initialism</a>&nbsp;(F-A-Q) or an&nbsp;<a href=\"https://en.wikipedia.org/wiki/Acronym\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Acronym\">acronym</a>. Since the acronym&nbsp;<em>FAQ</em>&nbsp;originated in textual media, its&nbsp;<a href=\"https://en.wikipedia.org/wiki/Pronunciation\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\" title=\"Pronunciation\">pronunciation</a>&nbsp;varies; &quot;F-A-Q&quot;,<sup><a href=\"https://en.wikipedia.org/wiki/FAQ#cite_note-pron-1\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">[1]</a></sup>&nbsp;is commonly heard. Depending on usage, the term may refer specifically to a single frequently asked question, or to an assembled list of many questions and their answers. Web page designers often label a single list of questions as a &quot;FAQ&quot;, such as on Google.com,<sup><a href=\"https://en.wikipedia.org/wiki/FAQ#cite_note-2\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">[2]</a></sup>&nbsp;while using &quot;FAQs&quot; to denote multiple lists of questions such as on United States Treasury sites.<sup><a href=\"https://en.wikipedia.org/wiki/FAQ#cite_note-3\" style=\"text-decoration: none; color: rgb(11, 0, 128); background: none;\">[3]</a></sup></p>\n');
INSERT INTO `setting` VALUES ('19', 'PAGE_ABOUT', '<h1 style=\"text-align:center\">About us</h1>\n\n<h4 style=\"text-align:center\">&quot;Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...&quot;</h4>\n\n<h5 style=\"text-align:center\">&quot;There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...&quot;</h5>\n\n<p>&nbsp;</p>\n');
INSERT INTO `setting` VALUES ('20', 'PAGE_HELP', '<h1 style=\"text-align:center\">Help</h1>\n\n<h4 style=\"text-align:center\">&quot;Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...&quot;</h4>\n\n<h5 style=\"text-align:center\">&quot;There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...&quot;</h5>\n\n<p>&nbsp;</p>\n');
INSERT INTO `setting` VALUES ('21', 'PAGE_TERM', '<h1 style=\"text-align:center\">Term and Condition</h1>\n\n<h4 style=\"text-align:center\">&quot;Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...&quot;</h4>\n\n<h5 style=\"text-align:center\">&quot;There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...&quot;</h5>\n\n<hr />\n<div id=\"Content\" style=\"margin: 0px; padding: 0px; position: relative; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: center;\">\n<div class=\"boxed\" style=\"margin: 10px 28.7969px; padding: 0px; clear: both;\">\n<div id=\"lipsum\" style=\"margin: 0px; padding: 0px; text-align: justify;\">\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus accumsan sapien ut dolor blandit, vitae volutpat lectus egestas. Duis interdum tortor eget ultrices ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam placerat molestie diam eu placerat. Vestibulum ac libero metus. Proin eget congue eros. Sed non sollicitudin ante. Ut vehicula consectetur turpis, at pretium augue viverra id. Curabitur elementum metus sed nibh malesuada, dapibus molestie metus aliquam. Morbi eleifend quis turpis posuere finibus. Nullam aliquam nisl et sollicitudin porta. Nullam eu bibendum nulla. Ut scelerisque tristique mauris in malesuada. Aliquam erat volutpat.</p>\n</div>\n</div>\n</div>\n');

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metaKey` varchar(255) NOT NULL,
  `metaValue` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `editor` varchar(255) DEFAULT NULL COMMENT 'editor:select;lookup:editor',
  `lookup` varchar(255) DEFAULT NULL COMMENT 'editor:select;lookup:object_type',
  `is_active` tinyint(1) DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2791 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('2513', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2514', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2515', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2516', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2517', 'Grid Display Type', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2518', 'logo', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2519', 'copyright', 'Copyright by', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2520', 'website', 'http://wwww.mozagroup.com', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2521', 'name', 'MOZA TECH', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2522', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2523', 'address', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2524', 'email', 'support@mozagroup.com', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2525', 'phone', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2526', 'chat', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2527', 'background', 'white', 'Website', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2528', 'facebook', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2529', 'youtube', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2530', 'twitter', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2531', 'footer_content', '', 'Website', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2532', 'google_analytic_key', '', 'Website', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2533', 'Page Size', '50', 'Data', '\\yii\\widgets\\MaskedInput', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2534', 'description', '', 'Website', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2535', 'keywords', '', 'Website', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2536', 'header_content', '', 'Website', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2537', 'page_style', '', 'Website', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2538', 'google', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2539', 'Format Currency', 'USD', 'Format', '\\kartik\\widgets\\Select2', 'currency', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2540', 'Digit After Decimal', '0', 'Format', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2541', 'FILE_SIZE_MAX', '4000000', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2542', 'Format Date', 'Y.m.d', 'Format', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2543', 'Field Layout', 'table', 'Theme', '\\kartik\\widgets\\Select2', 'field_layout', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2544', 'page_width', '80%', 'Website', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2545', 'footer_view', 'footer.php', 'Website', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2546', 'header_view', 'header.php', 'Website', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2547', 'ecommerce/order/viewcart?Viewcart', '_view_cart', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2548', 'Sale Off (%)', '0', 'Ecommerce', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2549', 'Shipping Fee', '0', 'Ecommerce', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2550', 'Shipping Enabled', '', 'Ecommerce', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2551', 'ecommerce/order/bill?Bill', '_bill_travel', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2552', 'ecommerce/order/checkout?Checkout', '_invoice', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2553', 'fax', '', 'Config', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2554', 'Paypal API LIVE MODE', '1', 'Paypal', '\\kartik\\checkbox\\CheckboxX', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2555', 'ecommerce/product_BaseWidget_Cart_style', 'padding: 20px; width:100%;background-color: #f7f7f7; border:1px solid #508910', 'Widgets', 'textarea', '', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2556', 'description', '', 'Website', 'textarea', '', null, '0', 'mozacompany');
INSERT INTO `settings` VALUES ('2557', 'logo', '', 'Config', 'textarea', '', null, '0', 'mozacompany');
INSERT INTO `settings` VALUES ('2558', 'keywords', '', 'Website', 'textarea', '', null, '0', 'mozacompany');
INSERT INTO `settings` VALUES ('2559', 'header_content', '', 'Website', 'textarea', '', null, '0', 'mozacompany');
INSERT INTO `settings` VALUES ('2560', 'page_style', '', 'Website', 'textarea', '', null, '0', 'mozacompany');
INSERT INTO `settings` VALUES ('2561', 'phone', '', 'Config', 'textarea', '', null, '0', 'mozacompany');
INSERT INTO `settings` VALUES ('2562', 'email', '', 'Config', 'textarea', '', null, '0', 'mozacompany');
INSERT INTO `settings` VALUES ('2563', 'facebook', '', 'Config', 'textarea', '', null, '0', 'mozacompany');
INSERT INTO `settings` VALUES ('2564', 'twitter', '', 'Config', 'textarea', '', null, '0', 'mozacompany');
INSERT INTO `settings` VALUES ('2565', 'google', '', 'Config', 'textarea', '', null, '0', 'mozacompany');
INSERT INTO `settings` VALUES ('2566', 'description', '', 'Website', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2567', 'logo', '', 'Config', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2568', 'keywords', '', 'Website', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2569', 'header_content', '', 'Website', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2570', 'page_style', '', 'Website', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2571', 'phone', '', 'Config', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2572', 'email', '', 'Config', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2573', 'facebook', '', 'Config', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2574', 'twitter', '', 'Config', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2575', 'google', '', 'Config', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2576', 'youtube', '', 'Config', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2577', 'footer_content', '', 'Website', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2578', 'description', '', 'Website', 'textarea', '', null, '0', 'theme1');
INSERT INTO `settings` VALUES ('2579', 'logo', '', 'Config', 'textarea', '', null, '0', 'theme1');
INSERT INTO `settings` VALUES ('2580', 'keywords', '', 'Website', 'textarea', '', null, '0', 'theme1');
INSERT INTO `settings` VALUES ('2581', 'header_content', '', 'Website', 'textarea', '', null, '0', 'theme1');
INSERT INTO `settings` VALUES ('2582', 'page_style', '', 'Website', 'textarea', '', null, '0', 'theme1');
INSERT INTO `settings` VALUES ('2583', 'footer_content', '', 'Website', 'textarea', '', null, '0', 'theme1');
INSERT INTO `settings` VALUES ('2584', 'description', '', 'Website', 'textarea', '', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2585', 'logo', '', 'Config', 'textarea', '', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2586', 'keywords', '', 'Website', 'textarea', '', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2587', 'header_content', '', 'Website', 'textarea', '', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2588', 'page_style', '', 'Website', 'textarea', '', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2589', 'footer_content', '', 'Website', 'textarea', '', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2590', 'description', '', 'Website', 'textarea', '', null, '0', 'theme3');
INSERT INTO `settings` VALUES ('2591', 'logo', '', 'Config', 'textarea', '', null, '0', 'theme3');
INSERT INTO `settings` VALUES ('2592', 'keywords', '', 'Website', 'textarea', '', null, '0', 'theme3');
INSERT INTO `settings` VALUES ('2593', 'header_content', '', 'Website', 'textarea', '', null, '0', 'theme3');
INSERT INTO `settings` VALUES ('2594', 'page_style', '', 'Website', 'textarea', '', null, '0', 'theme3');
INSERT INTO `settings` VALUES ('2595', 'footer_content', '', 'Website', 'textarea', '', null, '0', 'theme3');
INSERT INTO `settings` VALUES ('2596', 'description', '', 'Website', 'textarea', '', null, '0', 'salique');
INSERT INTO `settings` VALUES ('2597', 'logo', '', 'Config', 'textarea', '', null, '0', 'salique');
INSERT INTO `settings` VALUES ('2598', 'keywords', '', 'Website', 'textarea', '', null, '0', 'salique');
INSERT INTO `settings` VALUES ('2599', 'header_content', '', 'Website', 'textarea', '', null, '0', 'salique');
INSERT INTO `settings` VALUES ('2600', 'page_style', '', 'Website', 'textarea', '', null, '0', 'salique');
INSERT INTO `settings` VALUES ('2601', 'footer_content', '', 'Website', 'textarea', '', null, '0', 'salique');
INSERT INTO `settings` VALUES ('2602', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2603', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2604', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2605', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2606', 'copyright', '', 'Config', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2607', 'description', '', 'Website', 'textarea', '', null, '0', 'aquality');
INSERT INTO `settings` VALUES ('2608', 'logo', '', 'Config', 'textarea', '', null, '0', 'aquality');
INSERT INTO `settings` VALUES ('2609', 'keywords', '', 'Website', 'textarea', '', null, '0', 'aquality');
INSERT INTO `settings` VALUES ('2610', 'header_content', '', 'Website', 'textarea', '', null, '0', 'aquality');
INSERT INTO `settings` VALUES ('2611', 'page_style', '', 'Website', 'textarea', '', null, '0', 'aquality');
INSERT INTO `settings` VALUES ('2612', 'footer_content', '', 'Website', 'textarea', '', null, '0', 'aquality');
INSERT INTO `settings` VALUES ('2613', 'Page Size', '50', 'Data', '\\yii\\widgets\\MaskedInput', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2614', '_list_full', '', 'Config', 'textarea', '', null, '0', 'olongkar');
INSERT INTO `settings` VALUES ('2615', 'Format Currency', 'USD', 'Format', '\\kartik\\widgets\\Select2', 'currency', null, '0', 'theme1');
INSERT INTO `settings` VALUES ('2616', 'Page Size', '50', 'Data', '\\yii\\widgets\\MaskedInput', '', null, '0', 'theme1');
INSERT INTO `settings` VALUES ('2617', 'Page Size', '50', 'Data', '\\yii\\widgets\\MaskedInput', '', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2618', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2619', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2620', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2621', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2622', 'copyright', '', 'Config', 'textarea', '', null, '0', 'theme2');
INSERT INTO `settings` VALUES ('2623', 'Portlet Style', '', 'Theme', '\\kartik\\widgets\\Select2', 'portlet_style', '1', '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2624', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2625', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2626', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2627', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2628', 'website', '', 'Config', 'textarea', '', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2629', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2630', 'address', '', 'Config', 'textarea', '', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2631', 'email', '', 'Config', 'textarea', '', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2632', 'phone', '', 'Config', 'textarea', '', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2633', 'chat', '', 'Config', 'textarea', '', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2634', 'Portlet Style', '', 'Theme', '\\kartik\\widgets\\Select2', 'portlet_style', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2635', 'website', '', 'Config', 'textarea', '', '1', '0', 'theme2');
INSERT INTO `settings` VALUES ('2636', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'theme2');
INSERT INTO `settings` VALUES ('2637', 'address', '', 'Config', 'textarea', '', '1', '0', 'theme2');
INSERT INTO `settings` VALUES ('2638', 'email', '', 'Config', 'textarea', '', '1', '0', 'theme2');
INSERT INTO `settings` VALUES ('2639', 'phone', '', 'Config', 'textarea', '', '1', '0', 'theme2');
INSERT INTO `settings` VALUES ('2640', 'chat', '', 'Config', 'textarea', '', '1', '0', 'theme2');
INSERT INTO `settings` VALUES ('2641', 'Portlet Style', '', 'Theme', '\\kartik\\widgets\\Select2', 'portlet_style', '1', '0', 'theme2');
INSERT INTO `settings` VALUES ('2642', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2643', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2644', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2645', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2646', 'website', '', 'Config', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2647', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2648', 'address', '', 'Config', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2649', 'email', '', 'Config', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2650', 'phone', '', 'Config', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2651', 'chat', '', 'Config', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2652', 'Portlet Style', '', 'Theme', '\\kartik\\widgets\\Select2', 'portlet_style', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2653', 'Grid Display Type', '', 'Config', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2654', 'Grid Display Type', '', 'Config', 'textarea', '', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2655', 'FILE_SIZE_MAX', '4000000', 'Config', 'textarea', '', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2656', 'Digit After Decimal', '0', 'Format', 'textarea', '', '1', '0', 'theme1');
INSERT INTO `settings` VALUES ('2657', 'website', '', 'Config', 'textarea', '', '1', '0', 'olongkar');
INSERT INTO `settings` VALUES ('2658', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'olongkar');
INSERT INTO `settings` VALUES ('2659', 'address', '', 'Config', 'textarea', '', '1', '0', 'olongkar');
INSERT INTO `settings` VALUES ('2660', 'chat', '', 'Config', 'textarea', '', '1', '0', 'olongkar');
INSERT INTO `settings` VALUES ('2661', 'Portlet Style', '', 'Theme', '\\kartik\\widgets\\Select2', 'portlet_style', '1', '0', 'olongkar');
INSERT INTO `settings` VALUES ('2662', 'Grid Display Type', '', 'Config', 'textarea', '', '1', '0', 'olongkar');
INSERT INTO `settings` VALUES ('2663', 'FILE_SIZE_MAX', '4000000', 'Config', 'textarea', '', '1', '0', 'olongkar');
INSERT INTO `settings` VALUES ('2664', 'Format Currency', 'USD', 'Format', '\\kartik\\widgets\\Select2', 'currency', '1', '0', 'olongkar');
INSERT INTO `settings` VALUES ('2665', 'logo', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2666', 'keywords', '', 'Website', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2667', 'header_content', '', 'Website', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2668', 'body_css', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2669', 'description', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2670', 'Website Version', 'beta', 'Website', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2671', 'Is User Messages Enabled', '1', 'Website', '\\kartik\\checkbox\\CheckboxX', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2672', 'address', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2673', 'phone', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2674', 'email', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2675', 'copyright', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2676', 'name', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2677', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2678', 'website', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2679', 'privacy', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2680', 'terms_of_service', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2681', 'facebook', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2682', 'twitter', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2683', 'google', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2684', 'youtube', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2685', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2686', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2687', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2688', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2689', 'Grid Display Type', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2690', 'chat', '', 'Config', 'textarea', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2691', 'Portlet Style', '', 'Theme', '\\kartik\\widgets\\Select2', 'portlet_style', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2692', 'Digit After Decimal', '0', 'Format', 'textarea', '', '1', '0', 'olongkar');
INSERT INTO `settings` VALUES ('2693', 'FILE_SIZE_MAX', '4000000', 'Config', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2694', 'Page Size', '50', 'Data', '\\yii\\widgets\\MaskedInput', '', '1', '0', 'theme');
INSERT INTO `settings` VALUES ('2695', '_list_full', '', 'Config', 'textarea', '', '1', '0', 'theme');
INSERT INTO `settings` VALUES ('2696', 'ecommerce/order/viewcart?Viewcart', '_view_cart', 'Config', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2697', 'Sale Off (%)', '0', 'Ecommerce', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2698', 'Shipping Fee', '0', 'Ecommerce', 'textarea', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2699', 'Page Size', '50', 'Data', '\\yii\\widgets\\MaskedInput', '', '1', '0', 'theme3');
INSERT INTO `settings` VALUES ('2700', 'Page Size', '50', 'Data', '\\yii\\widgets\\MaskedInput', '', '1', '0', 'music');
INSERT INTO `settings` VALUES ('2701', 'logo', '', 'Config', 'textarea', '', null, '0', 'deliver');
INSERT INTO `settings` VALUES ('2702', 'description', '', 'Website', 'textarea', '', null, '0', 'deliver');
INSERT INTO `settings` VALUES ('2703', 'keywords', '', 'Website', 'textarea', '', null, '0', 'deliver');
INSERT INTO `settings` VALUES ('2704', 'header_content', '', 'Website', 'textarea', '', null, '0', 'deliver');
INSERT INTO `settings` VALUES ('2705', 'page_style', '', 'Website', 'textarea', '', null, '0', 'deliver');
INSERT INTO `settings` VALUES ('2706', 'twitter', '', 'Config', 'textarea', '', null, '0', 'deliver');
INSERT INTO `settings` VALUES ('2707', 'footer_content', '', 'Website', 'textarea', '', null, '0', 'deliver');
INSERT INTO `settings` VALUES ('2708', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', null, '0', 'education2');
INSERT INTO `settings` VALUES ('2709', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', null, '0', 'education2');
INSERT INTO `settings` VALUES ('2710', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', null, '0', 'education2');
INSERT INTO `settings` VALUES ('2711', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', null, '0', 'education2');
INSERT INTO `settings` VALUES ('2712', 'logo', '', 'Config', 'textarea', '', null, '0', 'education2');
INSERT INTO `settings` VALUES ('2713', 'description', '', 'Config', 'textarea', '', null, '0', 'education2');
INSERT INTO `settings` VALUES ('2714', 'keywords', '', 'Website', 'textarea', '', null, '0', 'education2');
INSERT INTO `settings` VALUES ('2715', 'header_content', '', 'Website', 'textarea', '', null, '0', 'education2');
INSERT INTO `settings` VALUES ('2716', 'page_style', '', 'Website', 'textarea', '', null, '0', 'education2');
INSERT INTO `settings` VALUES ('2717', 'website', '', 'Config', 'textarea', '', '1', '0', 'education2');
INSERT INTO `settings` VALUES ('2718', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'education2');
INSERT INTO `settings` VALUES ('2719', 'address', '', 'Config', 'textarea', '', '1', '0', 'education2');
INSERT INTO `settings` VALUES ('2720', 'email', '', 'Config', 'textarea', '', '1', '0', 'education2');
INSERT INTO `settings` VALUES ('2721', 'phone', '', 'Config', 'textarea', '', '1', '0', 'education2');
INSERT INTO `settings` VALUES ('2722', 'chat', '', 'Config', 'textarea', '', '1', '0', 'education2');
INSERT INTO `settings` VALUES ('2723', 'Portlet Style', '', 'Theme', '\\kartik\\widgets\\Select2', 'portlet_style', '1', '0', 'education2');
INSERT INTO `settings` VALUES ('2724', 'Grid Display Type', '', 'Config', 'textarea', '', '1', '0', 'education2');
INSERT INTO `settings` VALUES ('2725', 'description', '', 'Website', 'textarea', '', null, '0', 'stech');
INSERT INTO `settings` VALUES ('2726', 'logo', '', 'Config', 'textarea', '', null, '0', 'stech');
INSERT INTO `settings` VALUES ('2727', 'keywords', '', 'Website', 'textarea', '', null, '0', 'stech');
INSERT INTO `settings` VALUES ('2728', 'header_content', '', 'Website', 'textarea', '', null, '0', 'stech');
INSERT INTO `settings` VALUES ('2729', 'page_style', '', 'Website', 'textarea', '', null, '0', 'stech');
INSERT INTO `settings` VALUES ('2730', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', null, '0', 'stech');
INSERT INTO `settings` VALUES ('2731', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', null, '0', 'stech');
INSERT INTO `settings` VALUES ('2732', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', null, '0', 'stech');
INSERT INTO `settings` VALUES ('2733', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', null, '0', 'stech');
INSERT INTO `settings` VALUES ('2734', 'website', '', 'Config', 'textarea', '', '1', '0', 'stech');
INSERT INTO `settings` VALUES ('2735', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'stech');
INSERT INTO `settings` VALUES ('2736', 'address', '', 'Config', 'textarea', '', '1', '0', 'stech');
INSERT INTO `settings` VALUES ('2737', 'email', '', 'Config', 'textarea', '', '1', '0', 'stech');
INSERT INTO `settings` VALUES ('2738', 'phone', '', 'Config', 'textarea', '', '1', '0', 'stech');
INSERT INTO `settings` VALUES ('2739', 'chat', '', 'Config', 'textarea', '', '1', '0', 'stech');
INSERT INTO `settings` VALUES ('2740', 'Portlet Style', '', 'Theme', '\\kartik\\widgets\\Select2', 'portlet_style', '1', '0', 'stech');
INSERT INTO `settings` VALUES ('2741', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', null, '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2742', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', null, '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2743', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', null, '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2744', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', null, '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2745', 'logo', '', 'Config', 'textarea', '', null, '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2746', 'description', '', 'Config', 'textarea', '', null, '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2747', 'keywords', '', 'Website', 'textarea', '', null, '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2748', 'website', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2749', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2750', 'address', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2751', 'email', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2752', 'phone', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2753', 'chat', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2754', 'Portlet Style', '', 'Theme', '\\kartik\\widgets\\Select2', 'portlet_style', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2755', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2756', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2757', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2758', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2759', 'logo', '', 'Config', 'textarea', '', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2760', 'description', '', 'Config', 'textarea', '', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2761', 'keywords', '', 'Website', 'textarea', '', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2762', 'website', '', 'Config', 'textarea', '', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2763', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2764', 'address', '', 'Config', 'textarea', '', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2765', 'email', '', 'Config', 'textarea', '', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2766', 'phone', '', 'Config', 'textarea', '', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2767', 'chat', '', 'Config', 'textarea', '', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2768', 'Portlet Style', '', 'Theme', '\\kartik\\widgets\\Select2', 'portlet_style', '1', '0', 'mo');
INSERT INTO `settings` VALUES ('2769', 'Grid Display Type', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2770', 'FILE_SIZE_MAX', '4000000', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2771', 'Format Date', 'Y.m.d', 'Format', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2772', 'Digit After Decimal', '0', 'Format', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2773', 'header_content', '', 'Website', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2774', 'page_style', '', 'Website', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2775', 'facebook', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2776', 'twitter', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2777', 'google', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2778', 'youtube', '', 'Config', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2779', 'footer_content', '', 'Website', 'textarea', '', '1', '0', 'SellPhone');
INSERT INTO `settings` VALUES ('2780', 'description', '', 'Website', 'textarea', '', '1', '0', 'mozaweb_n');
INSERT INTO `settings` VALUES ('2781', 'logo', '', 'Config', 'textarea', '', '1', '0', 'mozaweb_n');
INSERT INTO `settings` VALUES ('2782', 'keywords', '', 'Website', 'textarea', '', '1', '0', 'mozaweb_n');
INSERT INTO `settings` VALUES ('2783', 'header_content', '', 'Website', 'textarea', '', '1', '0', 'mozaweb_n');
INSERT INTO `settings` VALUES ('2784', 'page_style', '', 'Website', 'textarea', '', '1', '0', 'mozaweb_n');
INSERT INTO `settings` VALUES ('2785', 'phone', '', 'Config', 'textarea', '', '1', '0', 'mozaweb_n');
INSERT INTO `settings` VALUES ('2786', 'email', '', 'Config', 'textarea', '', '1', '0', 'mozaweb_n');
INSERT INTO `settings` VALUES ('2787', 'hide_price', '', 'Ecommerce', 'textarea', '', null, '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2788', 'global_sale_off', '0', 'Ecommerce', 'textarea', '', null, '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2789', 'vat_fee', '0', 'Ecommerce', 'textarea', '', null, '0', 'mozaweb');
INSERT INTO `settings` VALUES ('2790', 'shipping_fee', '', 'Ecommerce', 'textarea', '', null, '0', 'mozaweb');

-- ----------------------------
-- Table structure for `settings_menu`
-- ----------------------------
DROP TABLE IF EXISTS `settings_menu`;
CREATE TABLE `settings_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `object_type` varchar(100) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL COMMENT 'lookup:module',
  `group` varchar(100) DEFAULT NULL COMMENT 'data:FRONTEND,BACKEND',
  `role` varchar(100) DEFAULT NULL,
  `menu_type` varchar(100) DEFAULT NULL COMMENT 'data:CATEGORY,TYPE,STATUS,MIXED',
  `display_type` varchar(100) DEFAULT NULL COMMENT 'data:DEFAULT,TREE,MEGA',
  `sort_order` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=388 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of settings_menu
-- ----------------------------
INSERT INTO `settings_menu` VALUES ('346', 'fa fa-list', 'Home', 'site/index', '', 'Home', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:58:42', '9', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('347', 'glyphicon glyphicon-book', 'Blogs', '/cms/cms-blogs/index', 'cms_blogs', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:58:56', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('348', 'glyphicon glyphicon-th', 'CMS', '#', null, 'Cms', 'backend', 'null', null, null, '0', '1', '2017-05-26 10:58:57', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('349', 'glyphicon glyphicon-book', 'Articles', '/cms/cms-article/index', 'cms_article', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:01', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('350', 'glyphicon glyphicon-book', 'Slide', '/cms/cms-slide/index', 'cms_slide', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:04', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('351', 'glyphicon glyphicon-book', 'Services', '/cms/cms-service/index', 'cms_service', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:06', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('352', 'glyphicon glyphicon-book', 'About', '/cms/cms-about/index', 'cms_about', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:09', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('353', 'glyphicon glyphicon-book', 'Employee', '/cms/cms-employee/index', 'cms_employee', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:11', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('354', 'glyphicon glyphicon-book', 'Contacts', '/cms/cms-contact/index', 'cms_contact', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:13', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('355', 'glyphicon glyphicon-book', 'Albums', '/cms/cms-album/index', 'cms_album', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:16', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('356', 'glyphicon glyphicon-book', 'Testimonials', '/cms/cms-testimonial/index', 'cms_testimonial', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:19', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('357', 'glyphicon glyphicon-book', 'Products', '/ecommerce/product/index', 'product', 'Ecommerce', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:23', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('358', 'glyphicon glyphicon-cog', 'User Groups', '/auth-group/index', null, 'Administration', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:28', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('359', 'glyphicon glyphicon-th', 'Administration', '#', null, 'Administration', 'backend', 'null', null, null, '0', '1', '2017-05-26 10:59:28', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('360', 'glyphicon glyphicon-cog', 'User Rights', '/auth-role/index', null, 'Administration', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:38', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('361', 'glyphicon glyphicon-cog', 'Users', '/user/index', null, 'Administration', 'backend', 'null', null, null, '1', '1', '2017-05-26 10:59:42', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('362', 'glyphicon glyphicon-book', 'Orders', '/ecommerce/ecommerce-order/index', 'ecommerce_order', 'Ecommerce', 'backend', 'null', null, null, '1', '1', '2017-05-26 11:01:35', '9', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('363', 'glyphicon glyphicon-th', 'Ecommerce', '#', null, 'Ecommerce', 'backend', 'null', null, null, '0', '1', '2017-05-26 11:01:35', '9', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('364', 'glyphicon glyphicon-book', 'Provider', '/ecommerce/provider/index', 'provider', 'Ecommerce', 'backend', 'null', null, null, '1', '1', '2017-05-26 11:01:37', '9', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('365', 'glyphicon glyphicon-book', 'Promotion', '/ecommerce/promotion/index', 'promotion', 'Ecommerce', 'backend', 'null', null, null, '1', '1', '2017-05-26 11:05:35', '9', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('366', 'glyphicon glyphicon-book', 'Settings', '/system/object-setting/index', 'object_setting', 'Administration', 'backend', 'null', null, null, '1', '1', '2017-05-27 03:16:38', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('367', 'glyphicon glyphicon-wrench', 'App Users', '/app/app-user/index', 'app_user', 'App', 'backend', 'null', null, null, '1', '1', '2017-05-27 03:35:00', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('368', 'glyphicon glyphicon-cog', 'App', '#', '', 'App', 'backend', 'null', '', '', '0', '1', '2017-05-27 03:35:00', '6', '2017-06-09 20:13:11', '6', 'trayolo');
INSERT INTO `settings_menu` VALUES ('369', 'glyphicon glyphicon-wrench', 'User Devices', '/app/app-user-device/index', 'app_user_device', 'App', 'backend', 'null', null, null, '1', '1', '2017-05-27 03:35:06', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('370', 'glyphicon glyphicon-wrench', 'User Feedbacks', '/app/app-user-feedback/index', 'app_user_feedback', 'App', 'backend', 'null', null, null, '1', '1', '2017-05-27 03:35:08', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('371', 'glyphicon glyphicon-book', 'Feedback', '/cms/cms-feedback/index', 'cms_feedback', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-28 10:32:07', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('372', 'glyphicon glyphicon-book', 'Statistics', '/cms/cms-statistics/index', 'cms_statistics', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-28 10:32:37', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('373', 'glyphicon glyphicon-book', 'Partners', '/cms/cms-partner/index', 'cms_partner', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-28 16:12:21', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('374', 'glyphicon glyphicon-book', 'Categories', '/system/object-category/index', 'object_category', 'Administration', 'backend', 'null', null, null, '1', '1', '2017-05-29 20:42:34', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('375', 'glyphicon glyphicon-cog', 'Menus', '/system/settings-menu/index', 'settings_menu', 'Administration', 'backend', 'null', null, null, '1', '1', '2017-05-29 20:42:48', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('376', 'glyphicon glyphicon-book', 'FAQ', '/cms/cms-faq/index', 'cms_faq', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-29 20:45:43', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('377', 'glyphicon glyphicon-book', 'Attractions', 'travel/travel-attractions/index', 'travel_attractions', 'Travel', 'backend', 'null', null, null, '1', '1', '2017-05-30 04:19:55', '9', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('378', 'glyphicon glyphicon-th', 'Travel', '#', null, 'Travel', 'backend', 'null', null, null, '0', '1', '2017-05-30 04:19:56', '9', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('379', 'glyphicon glyphicon-book', 'Sites', 'travel/travel-sites/index', 'travel_sites', 'Travel', 'backend', 'null', null, null, '1', '1', '2017-05-30 05:46:55', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('380', 'glyphicon glyphicon-book', 'Itinerary', 'travel/travel-itinerary/index', 'travel_itinerary', 'Travel', 'backend', 'null', null, null, '1', '1', '2017-05-30 05:46:57', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('381', 'glyphicon glyphicon-book', 'Scores', 'travel/travel-scores/index', 'travel_scores', 'Travel', 'backend', 'null', null, null, '1', '1', '2017-05-30 05:48:29', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('382', 'glyphicon glyphicon-book', 'Portfolio', '/cms/cms-portfolio/index', 'cms_portfolio', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-05-30 05:54:02', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('383', 'glyphicon glyphicon-cog', 'Configuration', '/settings/index', null, 'Administration', 'backend', 'null', null, null, '1', '1', '2017-05-30 05:55:09', '6', null, null, 'trayolo');
INSERT INTO `settings_menu` VALUES ('384', 'glyphicon glyphicon-book', 'Changes Log', '/object-actions/index', null, 'Administration', 'backend', 'null', null, null, '1', '1', '2017-06-06 23:18:31', '6', null, null, 'cms');
INSERT INTO `settings_menu` VALUES ('385', 'glyphicon glyphicon-book', 'Pages', '/cms/cms-page/index', 'cms_page', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-06-28 23:12:01', '6', null, null, 'mozaweb');
INSERT INTO `settings_menu` VALUES ('386', 'glyphicon glyphicon-book', 'Links', '/cms/cms-links/index', 'cms_links', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-06-28 23:12:18', '6', null, null, 'mozaweb');
INSERT INTO `settings_menu` VALUES ('387', 'glyphicon glyphicon-book', 'Widgets', '/cms/cms-widgets/index', 'cms_widgets', 'Cms', 'backend', 'null', null, null, '1', '1', '2017-07-01 18:50:53', '6', null, null, 'mozaweb');

-- ----------------------------
-- Table structure for `settings_schema`
-- ----------------------------
DROP TABLE IF EXISTS `settings_schema`;
CREATE TABLE `settings_schema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `dbType` varchar(100) DEFAULT NULL COMMENT 'data:numeric,bool,float,varchar,text,date,time,datetime',
  `editor` varchar(100) DEFAULT NULL COMMENT 'data:text,textarea,select,numeric,currency,boolean,date,time,datetime,range,file,image',
  `lookup` varchar(255) DEFAULT NULL,
  `format` varchar(255) DEFAULT NULL,
  `algorithm` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `roles` varchar(500) DEFAULT NULL COMMENT 'lookup:role',
  `sort_order` int(5) DEFAULT NULL,
  `is_group` tinyint(1) DEFAULT NULL,
  `is_column` tinyint(1) DEFAULT NULL,
  `is_readonly` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2452 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings_schema
-- ----------------------------
INSERT INTO `settings_schema` VALUES ('1848', 'cms_blogs', 'id', '', 'bigint(20)', '', '', '', '', '', '', '2', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1849', 'cms_blogs', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1850', 'cms_blogs', 'banner', '', 'varchar(300)', '', '', '', '', '', '', '6', null, '0', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1851', 'cms_blogs', 'code', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '0', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1852', 'cms_blogs', 'name', '', 'varchar(255)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1853', 'cms_blogs', 'type', '', 'varchar(100)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1854', 'cms_blogs', 'status', '', 'varchar(100)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1855', 'cms_blogs', 'category_id', '', 'varchar(500)', '', '', '', '', '', '', '15', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1856', 'cms_blogs', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '19', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1857', 'cms_blogs', 'lang', '', 'varchar(50)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1858', 'cms_blogs', 'linkurl', '', 'varchar(255)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1859', 'cms_blogs', 'author', '', 'varchar(255)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1860', 'cms_blogs', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '16', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1861', 'cms_blogs', 'is_new', '', 'tinyint(1)', '', '', '', '', '', '', '17', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1862', 'cms_blogs', 'is_hot', '', 'tinyint(1)', '', '', '', '', '', '', '18', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1863', 'cms_blogs', 'thumbnail', '', 'varchar(300)', '', '', '', '', '', '', '1', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1864', 'cms_blogs', 'overview', '', 'varchar(2000)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1865', 'cms_blogs', 'content', '', 'text', '', '', '', '', '', '', '9', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1866', 'cms_blogs', 'tags', '', 'varchar(1000)', '', '', '', '', '', '', '12', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1867', 'cms_blogs', 'count_views', '', 'int(11)', '', '', '', '', '', '', '20', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1868', 'cms_blogs', 'count_comments', '', 'int(11)', '', '', '', '', '', '', '21', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1869', 'cms_blogs', 'count_likes', '', 'int(11)', '', '', '', '', '', '', '22', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1870', 'cms_blogs', 'rates', '', 'int(11)', '', '', '', '', '', '', '23', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1871', 'cms_blogs', 'created_date', '', 'date', '', '', '', '', '', '', '25', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1872', 'cms_blogs', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '26', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1873', 'cms_blogs', 'modified_date', '', 'date', '', '', '', '', '', '', '27', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1874', 'cms_blogs', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '28', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1875', 'cms_blogs', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '29', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1876', 'cms_blogs', 'count_rates', '', 'int(11)', '', '', '', '', '', '', '23', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1877', 'cms_article', 'id', '', 'bigint(20)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1878', 'cms_article', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1879', 'cms_article', 'banner', '', 'varchar(300)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1880', 'cms_article', 'code', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1881', 'cms_article', 'name', '', 'varchar(250)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1882', 'cms_article', 'linkurl', '', 'varchar(255)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1883', 'cms_article', 'type', '', 'varchar(50)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1884', 'cms_article', 'lang', '', 'varchar(50)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1885', 'cms_article', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1886', 'cms_article', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1887', 'cms_article', 'thumbnail', '', 'varchar(300)', '', '', '', '', '', '', '2', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1888', 'cms_article', 'overview', '', 'varchar(2000)', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1889', 'cms_article', 'content', '', 'text', '', '', '', '', '', '', '8', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1890', 'cms_article', 'sort_order', '', 'int(5)', '', '', '', '', '', '', '10', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1891', 'cms_article', 'created_date', '', 'date', '', '', '', '', '', '', '15', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1892', 'cms_article', 'created_user', '', 'varchar(150)', '', '', '', '', '', '', '16', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1893', 'cms_article', 'modified_date', '', 'date', '', '', '', '', '', '', '17', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1894', 'cms_article', 'modified_user', '', 'varchar(150)', '', '', '', '', '', '', '18', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1895', 'cms_article', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '19', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1896', 'cms_service', 'id', '', 'bigint(20)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1897', 'cms_service', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1898', 'cms_service', 'name', '', 'varchar(250)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1899', 'cms_service', 'linkurl', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1900', 'cms_service', 'lang', '', 'varchar(50)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1901', 'cms_service', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1902', 'cms_service', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1903', 'cms_service', 'thumbnail', '', 'varchar(300)', '', '', '', '', '', '', '2', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1904', 'cms_service', 'overview', '', 'varchar(2000)', '', '', '', '', '', '', '5', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1905', 'cms_service', 'content', '', 'text', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1906', 'cms_service', 'sort_order', '', 'int(5)', '', '', '', '', '', '', '8', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1907', 'cms_service', 'created_date', '', 'date', '', '', '', '', '', '', '12', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1908', 'cms_service', 'created_user', '', 'varchar(150)', '', '', '', '', '', '', '13', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1909', 'cms_service', 'modified_date', '', 'date', '', '', '', '', '', '', '14', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1910', 'cms_service', 'modified_user', '', 'varchar(150)', '', '', '', '', '', '', '15', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1911', 'cms_service', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '16', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1912', 'cms_portfolio', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1913', 'cms_portfolio', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1914', 'cms_portfolio', 'banner', '', 'varchar(300)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1915', 'cms_portfolio', 'name', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1916', 'cms_portfolio', 'status', '', 'varchar(50)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1917', 'cms_portfolio', 'linkurl', '', 'varchar(255)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1918', 'cms_portfolio', 'testimonial_id', '', 'int(11)', 'select', '@cms_testimonial', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1919', 'cms_portfolio', 'product_id', '', 'int(11)', 'select', '@product', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1920', 'cms_portfolio', 'product_category_id', '', 'varchar(500)', 'select', '@object_category', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1921', 'cms_portfolio', 'lang', '', 'varchar(50)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1922', 'cms_portfolio', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1923', 'cms_portfolio', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1924', 'cms_portfolio', 'overview', '', 'varchar(2000)', '', '', '', '', '', '', '5', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1925', 'cms_portfolio', 'content', '', 'text', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1926', 'cms_portfolio', 'tags', '', 'varchar(2000)', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1927', 'cms_portfolio', 'sort_order', '', 'int(11)', '', '', '', '', '', '', '14', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1928', 'cms_portfolio', 'created_date', '', 'date', '', '', '', '', '', '', '17', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1929', 'cms_portfolio', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '18', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1930', 'cms_portfolio', 'modified_date', '', 'date', '', '', '', '', '', '', '19', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1931', 'cms_portfolio', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '20', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1932', 'cms_portfolio', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '21', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1933', 'cms_partner', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1934', 'cms_partner', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1935', 'cms_partner', 'name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1936', 'cms_partner', 'linkurl', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1937', 'cms_partner', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1938', 'cms_partner', 'overview', '', 'varchar(1000)', '', '', '', '', '', '', '4', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1939', 'cms_partner', 'sort_order', '', 'tinyint(5)', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1940', 'cms_partner', 'created_date', '', 'date', '', '', '', '', '', '', '8', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1941', 'cms_partner', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '9', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1942', 'cms_partner', 'modified_date', '', 'date', '', '', '', '', '', '', '10', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1943', 'cms_partner', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '11', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1944', 'cms_partner', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '12', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1945', 'cms_about', 'id', '', 'bigint(20)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1946', 'cms_about', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1947', 'cms_about', 'name', '', 'varchar(250)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1948', 'cms_about', 'icon', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1949', 'cms_about', 'color', '', 'varchar(100)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1950', 'cms_about', 'linkurl', '', 'varchar(255)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1951', 'cms_about', 'lang', '', 'varchar(50)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1952', 'cms_about', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1953', 'cms_about', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1954', 'cms_about', 'thumbnail', '', 'varchar(300)', '', '', '', '', '', '', '2', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1955', 'cms_about', 'overview', '', 'varchar(2000)', '', '', '', '', '', '', '5', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1956', 'cms_about', 'content', '', 'text', '', '', '', '', '', '', '8', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1957', 'cms_about', 'sort_order', '', 'int(5)', '', '', '', '', '', '', '10', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1958', 'cms_about', 'created_date', '', 'date', '', '', '', '', '', '', '14', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1959', 'cms_about', 'created_user', '', 'varchar(150)', '', '', '', '', '', '', '15', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1960', 'cms_about', 'modified_date', '', 'date', '', '', '', '', '', '', '16', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1961', 'cms_about', 'modified_user', '', 'varchar(150)', '', '', '', '', '', '', '17', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1962', 'cms_about', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '18', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1963', 'cms_slide', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1964', 'cms_slide', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1965', 'cms_slide', 'name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1966', 'cms_slide', 'transition_type', '', 'varchar(50)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1967', 'cms_slide', 'transition_speed', '', 'varchar(50)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1968', 'cms_slide', 'alignment', '', 'varchar(50)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1969', 'cms_slide', 'lang', '', 'varchar(20)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1970', 'cms_slide', 'url1_label', '', 'varchar(255)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1971', 'cms_slide', 'url1_link', '', 'varchar(255)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1972', 'cms_slide', 'url2_label', '', 'varchar(255)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1973', 'cms_slide', 'url2_link', '', 'varchar(255)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1974', 'cms_slide', 'url3_label', '', 'varchar(255)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1975', 'cms_slide', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '15', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1976', 'cms_slide', 'overview', '', 'varchar(1000)', '', '', '', '', '', '', '4', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1977', 'cms_slide', 'url3_link', '', 'varchar(255)', '', '', '', '', '', '', '14', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1978', 'cms_slide', 'sort_order', '', 'int(11)', '', '', '', '', '', '', '15', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1979', 'cms_slide', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '17', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1980', 'cms_testimonial', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1981', 'cms_testimonial', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1982', 'cms_testimonial', 'name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1983', 'cms_testimonial', 'location', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1984', 'cms_testimonial', 'rate', '', 'int(10)', '', '', '', '', '', '', '7', null, '1', '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1985', 'cms_testimonial', 'linkurl', '', 'varchar(255)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1986', 'cms_testimonial', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1987', 'cms_testimonial', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1988', 'cms_testimonial', 'description', '', 'varchar(255)', '', '', '', '', '', '', '4', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1989', 'cms_testimonial', 'content', '', 'varchar(1000)', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1990', 'cms_testimonial', 'sort_order', '', 'int(11)', '', '', '', '', '', '', '9', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1991', 'cms_testimonial', 'created_date', '', 'date', '', '', '', '', '', '', '12', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1992', 'cms_testimonial', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '13', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1993', 'cms_testimonial', 'modified_date', '', 'date', '', '', '', '', '', '', '14', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1994', 'cms_testimonial', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '15', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('1995', 'cms_testimonial', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '16', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1996', 'cms_employee', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1997', 'cms_employee', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1998', 'cms_employee', 'name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('1999', 'cms_employee', 'position', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2000', 'cms_employee', 'google', '', 'varchar(255)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2001', 'cms_employee', 'email', '', 'varchar(255)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2002', 'cms_employee', 'mobile', '', 'varchar(255)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2003', 'cms_employee', 'chat', '', 'varchar(255)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2004', 'cms_employee', 'is_contact', '', 'tinyint(1)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2005', 'cms_employee', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2006', 'cms_employee', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2007', 'cms_employee', 'overview', '', 'varchar(2000)', '', '', '', '', '', '', '5', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2008', 'cms_employee', 'content', '', 'text', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2009', 'cms_employee', 'link_url', '', 'varchar(255)', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2010', 'cms_employee', 'facebook', '', 'varchar(255)', '', '', '', '', '', '', '8', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2011', 'cms_employee', 'twitter', '', 'varchar(255)', '', '', '', '', '', '', '9', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2012', 'cms_employee', 'linkedin', '', 'varchar(255)', '', '', '', '', '', '', '11', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2013', 'cms_employee', 'sort_order', '', 'int(5)', '', '', '', '', '', '', '15', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2014', 'cms_employee', 'created_date', '', 'date', '', '', '', '', '', '', '19', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2015', 'cms_employee', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '20', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2016', 'cms_employee', 'modified_date', '', 'date', '', '', '', '', '', '', '21', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2017', 'cms_employee', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '22', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2018', 'cms_employee', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '23', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2019', 'cms_album', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2020', 'cms_album', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2021', 'cms_album', 'name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2022', 'cms_album', 'linkurl', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2023', 'cms_album', 'type', '', 'varchar(50)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2024', 'cms_album', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2025', 'cms_album', 'description', '', 'varchar(1000)', '', '', '', '', '', '', '4', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2026', 'cms_album', 'sort_order', '', 'int(11)', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2027', 'cms_album', 'created_date', '', 'date', '', '', '', '', '', '', '9', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2028', 'cms_album', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '10', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2029', 'cms_album', 'modified_date', '', 'date', '', '', '', '', '', '', '11', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2030', 'cms_album', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '12', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2031', 'cms_album', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '13', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2032', 'cms_statistics', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2033', 'cms_statistics', 'name', '', 'varchar(255)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2034', 'cms_statistics', 'value', '', 'bigint(20)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2035', 'cms_statistics', 'is_active', '', 'int(11)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2036', 'cms_statistics', 'is_top', '', 'int(11)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2037', 'cms_statistics', 'sort_order', '', 'int(11)', '', '', '', '', '', '', '4', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2038', 'cms_statistics', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2039', 'cms_faq', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2040', 'cms_faq', 'name', '', 'varchar(255)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2041', 'cms_faq', 'type', '', 'varchar(100)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2042', 'cms_faq', 'lang', '', 'varchar(50)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2043', 'cms_faq', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2044', 'cms_faq', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2045', 'cms_faq', 'content', '', 'text', 'html', '', '', '', '', '', '3', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2046', 'cms_faq', 'sort_order', '', 'int(5)', '', '', '', '', '', '', '5', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2047', 'cms_faq', 'created_date', '', 'date', '', '', '', '', '', '', '9', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2048', 'cms_faq', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '10', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2049', 'cms_faq', 'modified_date', '', 'date', '', '', '', '', '', '', '11', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2050', 'cms_faq', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '12', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2051', 'cms_faq', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '13', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2052', 'product', 'id', '', 'bigint(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2053', 'product', 'image', '', 'varchar(255)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2054', 'product', 'banner', '', 'varchar(300)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2055', 'product', 'code', '', 'varchar(45)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2056', 'product', 'name', '', 'varchar(255)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2057', 'product', 'cost', '', 'decimal(15,2)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2058', 'product', 'price', '', 'decimal(15,2)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2059', 'product', 'unit', '', 'varchar(100)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2060', 'product', 'currency', '', 'varchar(100)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2061', 'product', 'color', '', 'varchar(100)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2062', 'product', 'type', '', 'varchar(100)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2063', 'product', 'status', '', 'varchar(100)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2064', 'product', 'category_id', '', 'varchar(500)', '', '', '', '', '', '', '15', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2065', 'product', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '16', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2066', 'product', 'is_hot', '', 'tinyint(1)', '', '', '', '', '', '', '17', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2067', 'product', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '18', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2068', 'product', 'thumbnail', '', 'varchar(255)', '', '', '', '', '', '', '2', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2069', 'product', 'overview', '', 'varchar(2000)', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2070', 'product', 'content', '', 'text', '', '', '', '', '', '', '8', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2071', 'product', 'brand_id', '', 'varchar(100)', '', '@provider', '', '', '', '', '16', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2072', 'product', 'promotion_id', '', 'varchar(100)', '', '@promotion', '', '', '', '', '21', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2073', 'product', 'quantity', '', 'varchar(255)', '', '', '', '', '', '', '22', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2074', 'product', 'discount', '', 'int(10)', '', '', '', '', '', '', '23', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2075', 'product', 'tax', '', 'varchar(100)', '', '', '', '', '', '', '24', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2076', 'product', 'sort_order', '', 'int(11)', '', '', '', '', '', '', '25', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2077', 'product', 'count_views', '', 'int(11)', '', '', '', '', '', '', '26', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2078', 'product', 'count_comments', '', 'int(11)', '', '', '', '', '', '', '27', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2079', 'product', 'count_purchase', '', 'int(11)', '', '', '', '', '', '', '28', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2080', 'product', 'count_likes', '', 'int(11)', '', '', '', '', '', '', '29', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2081', 'product', 'count_rates', '', 'int(11)', '', '', '', '', '', '', '30', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2082', 'product', 'rates', '', 'int(11)', '', '', '', '', '', '', '31', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2083', 'product', 'qrcode_image', '', 'varchar(255)', '', '', '', '', '', '', '32', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2084', 'product', 'barcode_image', '', 'varchar(255)', '', '', '', '', '', '', '33', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2085', 'product', 'created_date', '', 'datetime', '', '', '', '', '', '', '34', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2086', 'product', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '35', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2087', 'product', 'modified_date', '', 'datetime', '', '', '', '', '', '', '36', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2088', 'product', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '37', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2089', 'product', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '38', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2090', 'ecommerce_order', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2091', 'ecommerce_order', 'user_id', '', 'varchar(100)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2092', 'ecommerce_order', 'billing_name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2093', 'ecommerce_order', 'billing_phone', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2094', 'ecommerce_order', 'billing_address', '', 'varchar(1000)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2095', 'ecommerce_order', 'billing_email', '', 'varchar(255)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2096', 'ecommerce_order', 'billing_postcode', '', 'varchar(255)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2097', 'ecommerce_order', 'billing_city', '', 'varchar(255)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2098', 'ecommerce_order', 'billing_state', '', 'varchar(255)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2099', 'ecommerce_order', 'billing_country', '', 'varchar(255)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2100', 'ecommerce_order', 'shipping_name', '', 'varchar(255)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2101', 'ecommerce_order', 'shipping_phone', '', 'varchar(255)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2102', 'ecommerce_order', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '15', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2103', 'ecommerce_order', 'shipping_address', '', 'varchar(255)', '', '', '', '', '', '', '13', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2104', 'ecommerce_order', 'shipping_email', '', 'varchar(255)', '', '', '', '', '', '', '14', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2105', 'ecommerce_order', 'shipping_postcode', '', 'varchar(255)', '', '', '', '', '', '', '15', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2106', 'ecommerce_order', 'shipping_city', '', 'varchar(255)', '', '', '', '', '', '', '16', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2107', 'ecommerce_order', 'shipping_state', '', 'varchar(255)', '', '', '', '', '', '', '17', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2108', 'ecommerce_order', 'shipping_country', '', 'varchar(255)', '', '', '', '', '', '', '18', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2109', 'ecommerce_order', 'shipping_method', '', 'varchar(100)', '', '', '', '', '', '', '19', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2110', 'ecommerce_order', 'order_date', '', 'varchar(200)', '', '', '', '', '', '', '20', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2111', 'ecommerce_order', 'order_detail', '', 'text', '', '', '', '', '', '', '21', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2112', 'ecommerce_order', 'order_note', '', 'text', '', '', '', '', '', '', '22', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2113', 'ecommerce_order', 'promotion_code', '', 'varchar(255)', '', '', '', '', '', '', '23', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2114', 'ecommerce_order', 'tax', '', 'varchar(500)', '', '', '', '', '', '', '24', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2115', 'ecommerce_order', 'order_type', '', 'varchar(100)', '', '', '', '', '', '', '25', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2116', 'ecommerce_order', 'order_status', '', 'varchar(100)', '', '', '', '', '', '', '26', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2117', 'ecommerce_order', 'price_total', '', 'float(10,2)', '', '', '', '', '', '', '28', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2118', 'ecommerce_order', 'price_shipping', '', 'float(10,2)', '', '', '', '', '', '', '29', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2119', 'ecommerce_order', 'price_tax', '', 'float(10,2)', '', '', '', '', '', '', '30', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2120', 'ecommerce_order', 'price_discount', '', 'float(10,0)', '', '', '', '', '', '', '31', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2121', 'ecommerce_order', 'price_final', '', 'float', '', '', '', '', '', '', '32', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2122', 'ecommerce_order', 'payment_method', '', 'varchar(100)', '', '', '', '', '', '', '33', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2123', 'ecommerce_order', 'payment_status', '', 'varchar(100)', '', '', '', '', '', '', '34', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2124', 'ecommerce_order', 'delivery_time', '', 'varchar(12)', '', '', '', '', '', '', '35', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2125', 'ecommerce_order', 'delivery_status', '', 'varchar(100)', '', '', '', '', '', '', '36', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2126', 'ecommerce_order', 'delivery_type', '', 'varchar(100)', '', '', '', '', '', '', '37', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2127', 'ecommerce_order', 'delivery_note', '', 'text', '', '', '', '', '', '', '38', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2128', 'ecommerce_order', 'created_date', '', 'datetime', '', '', '', '', '', '', '39', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2129', 'ecommerce_order', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '40', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2130', 'ecommerce_order', 'modified_date', '', 'datetime', '', '', '', '', '', '', '41', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2131', 'ecommerce_order', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '42', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2132', 'provider', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2133', 'provider', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2134', 'provider', 'code', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2135', 'provider', 'name', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2136', 'provider', 'start_date', '', 'varchar(255)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2137', 'provider', 'contact_name', '', 'varchar(255)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2138', 'provider', 'phone', '', 'varchar(255)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2139', 'provider', 'email', '', 'varchar(255)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2140', 'provider', 'address', '', 'varchar(2000)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2141', 'provider', 'website', '', 'varchar(255)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2142', 'provider', 'city', '', 'varchar(100)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2143', 'provider', 'type', '', 'varchar(100)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2144', 'provider', 'status', '', 'varchar(100)', '', '', '', '', '', '', '15', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2145', 'provider', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '16', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2146', 'provider', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '17', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2147', 'provider', 'description', '', 'varchar(2000)', '', '', '', '', '', '', '5', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2148', 'provider', 'content', '', 'text', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2149', 'provider', 'country', '', 'varchar(100)', '', '', '', '', '', '', '14', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2150', 'provider', 'lat', '', 'float', '', '', '', '', '', '', '15', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2151', 'provider', 'long', '', 'float', '', '', '', '', '', '', '16', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2152', 'provider', 'rate', '', 'int(11)', '', '', '', '', '', '', '17', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2153', 'provider', 'sort_order', '', 'int(11)', '', '', '', '', '', '', '22', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2154', 'provider', 'created_date', '', 'date', '', '', '', '', '', '', '23', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2155', 'provider', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '24', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2156', 'provider', 'modified_date', '', 'date', '', '', '', '', '', '', '25', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2157', 'provider', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '26', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2158', 'provider', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '27', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2159', 'promotion', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2160', 'promotion', 'code', '', 'varchar(255)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2161', 'promotion', 'image', '', 'varchar(300)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2162', 'promotion', 'banner', '', 'varchar(300)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2163', 'promotion', 'name', '', 'varchar(255)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2164', 'promotion', 'start_date', '', 'date', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2165', 'promotion', 'end_date', '', 'date', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2166', 'promotion', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2167', 'promotion', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2168', 'promotion', 'category_id', '', 'varchar(500)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2169', 'promotion', 'count_views', '', 'int(11)', '', '', '', '', '', '', '13', null, '1', '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2170', 'promotion', 'count_purchase', '', 'int(11)', '', '', '', '', '', '', '14', null, '1', '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2171', 'promotion', 'overview', '', 'varchar(2000)', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2172', 'promotion', 'content', '', 'text', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2173', 'promotion', 'count_shares', '', 'int(11)', '', '', '', '', '', '', '15', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2174', 'promotion', 'created_date', '', 'date', '', '', '', '', '', '', '16', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2175', 'promotion', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '17', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2176', 'promotion', 'modified_date', '', 'date', '', '', '', '', '', '', '18', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2177', 'promotion', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '19', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2178', 'promotion', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '20', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2179', 'music_artist', 'id', '', 'bigint(20)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2180', 'music_artist', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2181', 'music_artist', 'name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2182', 'music_artist', 'count_views', '', 'bigint(11)', '', '', '', '', '', '', '6', null, '1', '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2183', 'music_artist', 'count_likes', '', 'bigint(11)', '', '', '', '', '', '', '7', null, '1', '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2184', 'music_artist', 'count_rates', '', 'bigint(11)', '', '', '', '', '', '', '8', null, '1', '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2185', 'music_artist', 'rates', '', 'int(11)', '', '', '', '', '', '', '9', null, '1', '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2186', 'music_artist', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2187', 'music_artist', 'is_new', '', 'tinyint(1)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2188', 'music_artist', 'is_hot', '', 'tinyint(1)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2189', 'music_artist', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2190', 'music_artist', 'lang', '', 'varchar(100)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2191', 'music_artist', 'type', '', 'varchar(100)', '', '', '', '', '', '', '15', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2192', 'music_artist', 'status', '', 'varchar(100)', '', '', '', '', '', '', '16', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2193', 'music_artist', 'category_id', '', 'varchar(500)', '', 'music', '', '', '', '', '17', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2194', 'music_artist', 'thumbnail', '', 'varchar(300)', '', '', '', '', '', '', '2', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2195', 'music_artist', 'real_name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2196', 'music_artist', 'description', '', 'varchar(2000)', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2197', 'music_artist', 'content', '', 'text', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2198', 'music_artist', 'birth_date', '', 'date', '', '', '', '', '', '', '8', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2199', 'music_artist', 'location', '', 'varchar(255)', '', '', '', '', '', '', '9', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2200', 'music_artist', 'created_date', '', 'date', '', '', '', '', '', '', '22', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2201', 'music_artist', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '23', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2202', 'music_artist', 'modified_date', '', 'date', '', '', '', '', '', '', '24', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2203', 'music_artist', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '25', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2204', 'music_artist', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '26', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2205', 'music_song', 'id', '', 'bigint(20)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2206', 'music_song', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2207', 'music_song', 'song_file', '', 'varchar(300)', 'file', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2208', 'music_song', 'name', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2209', 'music_song', 'duration', '', 'varchar(8)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2210', 'music_song', 'release_date', '', 'date', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2211', 'music_song', 'artist_singer_id', '', 'varchar(100)', 'select', '@music_artist', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2212', 'music_song', 'artist_composer_id', '', 'varchar(100)', 'select', '@music_artist', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2213', 'music_song', 'album_id', '', 'varchar(100)', 'select', '@music_playlist', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2214', 'music_song', 'is_hot', '', 'tinyint(1)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2215', 'music_song', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2216', 'music_song', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2217', 'music_song', 'is_video', '', 'tinyint(1)', '', '', '', '', '', '', '15', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2218', 'music_song', 'lang', '', 'varchar(100)', '', '', '', '', '', '', '16', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2219', 'music_song', 'type', '', 'varchar(100)', '', '', '', '', '', '', '17', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2220', 'music_song', 'status', '', 'varchar(100)', '', '', '', '', '', '', '18', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2221', 'music_song', 'category_id', '', 'varchar(500)', '', 'music', '', '', '', '', '19', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2222', 'music_song', 'thumbnail', '', 'varchar(300)', '', '', '', '', '', '', '2', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2223', 'music_song', 'description', '', 'varchar(2000)', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2224', 'music_song', 'content', '', 'text', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2225', 'music_song', 'price', '', 'decimal(10,2)', '', '', '', '', '', '', '8', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2226', 'music_song', 'mood', '', 'varchar(100)', '', '', '', '', '', '', '21', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2227', 'music_song', 'count_views', '', 'bigint(20)', '', '', '', '', '', '', '23', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2228', 'music_song', 'count_likes', '', 'bigint(20)', '', '', '', '', '', '', '24', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2229', 'music_song', 'count_purchase', '', 'bigint(20)', '', '', '', '', '', '', '25', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2230', 'music_song', 'count_comments', '', 'int(10)', '', '', '', '', '', '', '26', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2231', 'music_song', 'count_rates', '', 'bigint(20)', '', '', '', '', '', '', '27', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2232', 'music_song', 'rates', '', 'int(11)', '', '', '', '', '', '', '28', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2233', 'music_song', 'created_date', '', 'date', '', '', '', '', '', '', '29', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2234', 'music_song', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '30', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2235', 'music_song', 'modified_date', '', 'date', '', '', '', '', '', '', '31', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2236', 'music_song', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '32', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2237', 'music_song', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '33', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2238', 'music_playlist', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2239', 'music_playlist', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2240', 'music_playlist', 'name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2241', 'music_playlist', 'release_date', '', 'date', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2242', 'music_playlist', 'songs_count', '', 'int(11)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2243', 'music_playlist', 'songs_duration', '', 'varchar(8)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2244', 'music_playlist', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2245', 'music_playlist', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2246', 'music_playlist', 'is_new', '', 'tinyint(1)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2247', 'music_playlist', 'is_hot', '', 'tinyint(1)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2248', 'music_playlist', 'is_album', '', 'tinyint(1)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2249', 'music_playlist', 'is_video', '', 'tinyint(1)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2250', 'music_playlist', 'lang', '', 'varchar(100)', '', '', '', '', '', '', '15', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2251', 'music_playlist', 'type', '', 'varchar(100)', '', '', '', '', '', '', '16', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2252', 'music_playlist', 'category_id', '', 'varchar(500)', '', 'music', '', '', '', '', '17', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2253', 'music_playlist', 'thumbnail', '', 'varchar(300)', '', '', '', '', '', '', '2', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2254', 'music_playlist', 'description', '', 'varchar(2000)', '', '', '', '', '', '', '5', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2255', 'music_playlist', 'count_views', '', 'bigint(20)', '', '', '', '', '', '', '18', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2256', 'music_playlist', 'count_likes', '', 'bigint(20)', '', '', '', '', '', '', '19', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2257', 'music_playlist', 'count_purchase', '', 'bigint(20)', '', '', '', '', '', '', '20', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2258', 'music_playlist', 'count_rates', '', 'bigint(20)', '', '', '', '', '', '', '21', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2259', 'music_playlist', 'rates', '', 'int(11)', '', '', '', '', '', '', '22', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2260', 'music_playlist', 'created_date', '', 'date', '', '', '', '', '', '', '23', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2261', 'music_playlist', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '24', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2262', 'music_playlist', 'modified_date', '', 'date', '', '', '', '', '', '', '25', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2263', 'music_playlist', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '26', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2264', 'music_playlist', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '27', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2265', 'travel_attractions', 'id', '', 'bigint(20)', '', '', '', '', '', '', '2', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2266', 'travel_attractions', 'image', '', 'varchar(300)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2267', 'travel_attractions', 'name', '', 'varchar(255)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2268', 'travel_attractions', 'tel', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2269', 'travel_attractions', 'address', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2270', 'travel_attractions', 'budget', '', 'varchar(255)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2271', 'travel_attractions', 'default_duration', '', 'varchar(100)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2272', 'travel_attractions', 'score', '', 'int(10)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2273', 'travel_attractions', 'open', '', 'varchar(255)', 'numeric', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2274', 'travel_attractions', 'close', '', 'varchar(255)', 'numeric', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2275', 'travel_attractions', 'city', '', 'varchar(255)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2276', 'travel_attractions', 'type', '', 'varchar(100)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2277', 'travel_attractions', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2278', 'travel_attractions', 'thumbnail', '', 'varchar(300)', '', '', '', '', '', '', '2', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2279', 'travel_attractions', 'image_description', '', 'varchar(2000)', '', '', '', '', '', '', '4', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2280', 'travel_attractions', 'description', '', 'varchar(1000)', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2281', 'travel_attractions', 'content', '', 'text', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2282', 'travel_attractions', 'note', '', 'text', 'text', '', '', '', '', '', '8', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2283', 'travel_attractions', 'website', '', 'varchar(255)', '', '', '', '', '', '', '11', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2284', 'travel_attractions', 'map', '', 'varchar(1000)', '', '', '', '', '', '', '12', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2285', 'travel_attractions', 'rate', '', 'int(10)', '', '', '', '', '', '', '13', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2286', 'travel_attractions', 'sort_order', '', 'int(11)', '', '', '', '', '', '', '17', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2287', 'travel_attractions', 'lat', '', 'float', '', '', '', '', '', '', '18', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2288', 'travel_attractions', 'long', '', 'float', '', '', '', '', '', '', '19', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2289', 'travel_attractions', 'street', '', 'varchar(255)', '', '', '', '', '', '', '22', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2290', 'travel_attractions', 'country', '', 'varchar(255)', '', '', '', '', '', '', '24', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2291', 'travel_attractions', 'category_id', '', 'varchar(100)', '', '', '', '', '', '', '25', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2292', 'travel_attractions', 'status', '', 'varchar(100)', '', '', '', '', '', '', '27', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2293', 'travel_attractions', 'is_new', '', 'tinyint(1)', '', '', '', '', '', '', '29', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2294', 'travel_attractions', 'is_hot', '', 'tinyint(1)', '', '', '', '', '', '', '30', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2295', 'travel_attractions', 'created_date', '', 'date', '', '', '', '', '', '', '31', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2296', 'travel_attractions', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '32', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2297', 'travel_attractions', 'modified_date', '', 'date', '', '', '', '', '', '', '33', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2298', 'travel_attractions', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '34', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2299', 'travel_attractions', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '35', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2300', 'travel_itinerary', 'id', '', 'bigint(20)', '', '', '', '', '', '', '2', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2301', 'travel_itinerary', 'image', '', 'varchar(300)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2302', 'travel_itinerary', 'name', '', 'varchar(255)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2303', 'travel_itinerary', 'user_id', '', 'varchar(100)', 'select', '@app_user', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2304', 'travel_itinerary', 'days', '', 'int(10)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2305', 'travel_itinerary', 'city', '', 'varchar(100)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2306', 'travel_itinerary', 'status', '', 'varchar(100)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2307', 'travel_itinerary', 'is_system', '', 'tinyint(1)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2308', 'travel_itinerary', 'image_size', '', 'varchar(255)', '', '', '', '', '', '', '3', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2309', 'travel_itinerary', 'start_date', '', 'date', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2310', 'travel_itinerary', 'end_date', '', 'date', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2311', 'travel_itinerary', 'content', '', 'text', '', '', '', '', '', '', '8', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2312', 'travel_itinerary', 'sort_order', '', 'int(5)', '', '', '', '', '', '', '12', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2313', 'travel_itinerary', 'is_top', '', 'tinyint(1)', '', '', '', '', '', '', '13', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2314', 'travel_itinerary', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '15', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2315', 'travel_itinerary', 'created_date', '', 'datetime', '', '', '', '', '', '', '16', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2316', 'travel_itinerary', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '17', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2317', 'travel_itinerary', 'modified_date', '', 'datetime', '', '', '', '', '', '', '18', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2318', 'travel_itinerary', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '19', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2319', 'travel_sites', 'city', '', '', '', '', '', '', '', '', '2', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2320', 'travel_sites', 'keywords', '', '', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2321', 'travel_sites', 'name', '', '', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2322', 'travel_sites', 'url', '', '', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2323', 'travel_sites', 'weight', '', '', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2324', 'travel_sites', 'search_element', '', '', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2325', 'travel_sites', 'is_active', '', '', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2326', 'pm_project', 'id', '', 'bigint(20)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2327', 'pm_project', 'image', '', 'varchar(300)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2328', 'pm_project', 'code', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2329', 'pm_project', 'name', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2330', 'pm_project', 'start_date', '', 'varchar(11)', 'date', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2331', 'pm_project', 'end_date', '', 'varchar(11)', 'date', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2332', 'pm_project', 'progress', '', 'int(10)', 'slide', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2333', 'pm_project', 'product_id', '', 'varchar(100)', 'select', '@product', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2334', 'pm_project', 'category_id', '', 'varchar(500)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2335', 'pm_project', 'type', '', 'varchar(100)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2336', 'pm_project', 'status', '', 'varchar(100)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2337', 'pm_project', 'user_id', '', 'varchar(100)', 'select', 'user,id,username', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2338', 'pm_project', 'description', '', 'varchar(1000)', '', '', '', '', '', '', '5', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2339', 'pm_project', 'content', '', 'text', '', 'select', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2340', 'pm_project', 'client_user_id', '', 'varchar(100)', '', '@app_user', '', '', '', '', '15', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2341', 'pm_project', 'client_id', '', 'varchar(100)', '', '@crm_client', '', '', '', '', '16', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2342', 'pm_project', 'contract_no', '', 'varchar(255)', '', '', '', '', '', '', '17', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2343', 'pm_project', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '18', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2344', 'pm_project', 'created_date', '', 'date', '', '', '', '', '', '', '19', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2345', 'pm_project', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '20', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2346', 'pm_project', 'modified_date', '', 'date', '', '', '', '', '', '', '21', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2347', 'pm_project', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '22', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2348', 'pm_task', 'id', '', 'bigint(20)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2349', 'pm_task', 'name', '', 'varchar(255)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2350', 'pm_task', 'note', '', 'text', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2351', 'pm_task', 'type', '', 'varchar(100)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2352', 'pm_task', 'status', '', 'varchar(100)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2353', 'pm_task', 'started_date', '', 'datetime', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2354', 'pm_task', 'finished_date', '', 'datetime', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2355', 'pm_task', 'user_id', '', 'varchar(100)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2356', 'pm_task', 'client_id', '', 'varchar(100)', '', '@crm_client', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2357', 'pm_task', 'project_id', '', 'varchar(100)', '', '@pm_project', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2358', 'pm_task', 'effort_spent', '', 'int(11)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2359', 'pm_task', 'effort_plan', '', 'int(11)', '', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2360', 'pm_task', 'description', '', 'varchar(2000)', '', '', '', '', '', '', '3', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2361', 'pm_task', 'created_date', '', 'date', '', '', '', '', '', '', '14', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2362', 'pm_task', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '15', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2363', 'pm_task', 'modified_date', '', 'date', '', '', '', '', '', '', '16', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2364', 'pm_task', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '17', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2365', 'pm_task', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '18', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2366', 'pm_issue', 'id', '', 'bigint(20)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2367', 'pm_issue', 'name', '', 'varchar(255)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2368', 'pm_issue', 'type', '', 'varchar(100)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2369', 'pm_issue', 'status', '', 'varchar(100)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2370', 'pm_issue', 'priority', '', 'varchar(100)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2371', 'pm_issue', 'user_id', '', 'varchar(100)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2372', 'pm_issue', 'client_id', '', 'varchar(100)', '', 'crm_client', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2373', 'pm_issue', 'project_id', '', 'varchar(100)', '', '@pm_project', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2374', 'pm_issue', 'description', '', 'varchar(2000)', '', '', '', '', '', '', '3', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2375', 'pm_issue', 'content', '', 'text', '', '', '', '', '', '', '4', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2376', 'pm_issue', 'created_date', '', 'date', '', '', '', '', '', '', '11', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2377', 'pm_issue', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '12', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2378', 'pm_issue', 'modified_date', '', 'date', '', '', '', '', '', '', '13', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2379', 'pm_issue', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '14', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2380', 'pm_issue', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '15', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2381', 'office_document', 'id', '', 'bigint(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2382', 'office_document', 'code', '', 'varchar(255)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2383', 'office_document', 'name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2384', 'office_document', 'file', '', 'varchar(300)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2385', 'office_document', 'origin', '', 'tinyint(1)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2386', 'office_document', 'security', '', 'varchar(100)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2387', 'office_document', 'priority', '', 'varchar(100)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2388', 'office_document', 'category_id', '', 'varchar(500)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2389', 'office_document', 'type', '', 'varchar(100)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2390', 'office_document', 'status', '', 'varchar(100)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2391', 'office_document', 'action', '', 'varchar(100)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2392', 'office_document', 'receive_date', '', 'varchar(19)', 'datetime', '', '', '', '', '', '14', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2393', 'office_document', 'is_incoming', '', 'tinyint(1)', '', '', '', '', '', '', '15', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2394', 'office_document', 'description', '', 'varchar(2000)', '', '', '', '', '', '', '4', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2395', 'office_document', 'content', '', 'text', '', '', '', '', '', '', '5', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2396', 'office_document', 'receive_user', '', 'varchar(100)', '', '@user', '', '', '', '', '15', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2397', 'office_document', 'receive_department', '', 'varchar(255)', '', '', '', '', '', '', '16', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2398', 'office_document', 'receive_approval', '', 'varchar(255)', '', '@user', '', '', '', '', '17', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2399', 'office_document', 'issue_date', '', 'varchar(19)', 'datetime', '', '', '', '', '', '18', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2400', 'office_document', 'issue_department', '', 'varchar(255)', '', '', '', '', '', '', '19', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2401', 'office_document', 'issue_user', '', 'varchar(255)', '', '', '', '', '', '', '20', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2402', 'office_document', 'start_date', '', 'varchar(19)', '', '', '', '', '', '', '21', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2403', 'office_document', 'end_date', '', 'varchar(19)', '', '', '', '', '', '', '22', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2404', 'office_document', 'created_date', '', 'date', '', '', '', '', '', '', '24', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2405', 'office_document', 'created_user', '', 'varchar(100)', '', '', '', '', '', '', '25', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2406', 'office_document', 'modified_date', '', 'date', '', '', '', '', '', '', '26', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2407', 'office_document', 'modified_user', '', 'varchar(100)', '', '', '', '', '', '', '27', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2408', 'office_document', 'application_id', '', 'varchar(100)', '', '', '', '', '', '', '28', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2409', 'app_user', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2410', 'app_user', 'avatar', '', 'varchar(255)', '', '', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2411', 'app_user', 'name', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2412', 'app_user', 'username', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2413', 'app_user', 'email', '', 'varchar(255)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2414', 'app_user', 'gender', '', 'varchar(100)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2415', 'app_user', 'dob', '', 'varchar(255)', '', '', '', '', '', '', '9', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2416', 'app_user', 'phone', '', 'varchar(25)', '', '', '', '', '', '', '10', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2417', 'app_user', 'weight', '', 'varchar(255)', '', '', '', '', '', '', '11', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2418', 'app_user', 'height', '', 'varchar(255)', '', '', '', '', '', '', '12', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2419', 'app_user', 'address', '', 'varchar(255)', '', '', '', '', '', '', '13', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2420', 'app_user', 'country', '', 'varchar(100)', '', '', '', '', '', '', '14', null, '1', '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2421', 'app_user', 'is_online', '', 'tinyint(1)', '', '', '', '', '', '', '15', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2422', 'app_user', 'is_active', '', 'tinyint(1)', '', '', '', '', '', '', '16', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2423', 'app_user', 'type', '', 'varchar(100)', '', '', '', '', '', '', '17', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2424', 'app_user', 'status', '', 'varchar(100)', '', '', '', '', '', '', '18', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2425', 'app_user', 'password', '', 'varchar(255)', '', '', '', '', '', '', '6', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2426', 'app_user', 'auth_key', '', 'varchar(32)', '', '', '', '', '', '', '7', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2427', 'app_user', 'password_hash', '', 'varchar(255)', '', '', '', '', '', '', '8', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2428', 'app_user', 'password_reset_token', '', 'varchar(255)', '', '', '', '', '', '', '9', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2429', 'app_user', 'description', '', 'varchar(2000)', '', '', '', '', '', '', '10', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2430', 'app_user', 'content', '', 'text', '', '', '', '', '', '', '11', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2431', 'app_user', 'state', '', 'varchar(100)', '', '', '', '', '', '', '19', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2432', 'app_user', 'city', '', 'varchar(100)', '', '', '', '', '', '', '20', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2433', 'app_user', 'balance', '', 'decimal(10,0)', '', '', '', '', '', '', '21', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2434', 'app_user', 'point', '', 'int(11)', '', '', '', '', '', '', '22', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2435', 'app_user', 'card_number', '', 'varchar(255)', '', '', '', '', '', '', '23', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2436', 'app_user', 'card_cvv', '', 'varchar(255)', 'text', '', '', '', '', '', '24', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2437', 'app_user', 'card_exp', '', 'varchar(255)', '', '', '', '', '', '', '25', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2438', 'app_user', 'lat', '', 'varchar(255)', '', '', '', '', '', '', '26', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2439', 'app_user', 'long', '', 'varchar(255)', '', '', '', '', '', '', '27', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2440', 'app_user', 'rate', '', 'float', '', '', '', '', '', '', '28', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2441', 'app_user', 'rate_count', '', 'int(11)', '', '', '', '', '', '', '29', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2442', 'app_user', 'role', '', 'int(2)', 'select', '', '', '', '', '', '34', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2443', 'app_user', 'provider_id', '', 'varchar(100)', '', '@provider', '', '', '', '', '35', null, null, null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2444', 'app_user', 'created_date', '', 'datetime', '', '', '', '', '', '', '36', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2445', 'app_user', 'modified_date', '', 'datetime', '', '', '', '', '', '', '37', null, null, '1', '1', '1');
INSERT INTO `settings_schema` VALUES ('2446', 'app_user_device', 'id', '', 'int(11)', '', '', '', '', '', '', '3', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2447', 'app_user_device', 'user_id', '', 'int(11)', '', '@app_user', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2448', 'app_user_device', 'ime', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2449', 'app_user_device', 'gcm_id', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2450', 'app_user_device', 'type', '', 'tinyint(1)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2451', 'app_user_device', 'status', '', 'tinyint(1)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overview` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identity_card` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `department` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `role` int(2) DEFAULT NULL COMMENT 'data:10:USER,20:MODERATOR,30:ADMIN',
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT 'data:DISABLED=0,ACTIVE=10',
  `is_online` tinyint(1) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `application_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('6', '', 'Ho Xuan Hung', 'admin', 'user6_image.png', '', '', 'WmzV9waECMlzP_EhXKd4PLw-_sGeMz12', '$2y$13$s5yLryk16awaMfDWpiQy7OZbs/ueqFKNE7DG5UA6yDbmrGwfL8I7i', 'Nph5RP9UXI9F0I0jITJqUnzxnhobKs2S_1473239211', null, '', '', '', 'hung.hoxuan@gmail.com', '', '', '', null, '', '', '', '', null, null, '30', '', '10', '0', '2017-07-01 01:33:33', '2017-08-20 10:57:25', '1473239211', '1477291259', 'trayolo');
INSERT INTO `user` VALUES ('7', '', 'admin_mozaweb', 'admin_mozaweb', '', '', '', 'T8XDw55hMHkvIlq0fkDO5eeBR2FT0GXB', '$2y$13$eTEULpN7NvPH2XexAEInEeUD56aAz8LN8KoBE.qbhJgmZ1j2f9JPa', 'o_L9yMKh-lOfsdybgQXlTCNXYYZCi98G_1500979964', null, '', '', '', 'admin_mozaweb@gmail.com', '', '', '', null, '', '', '', '', null, null, '30', '', '10', '0', null, '2017-08-20 11:00:30', '1500979962', '1500979962', 'mozaweb');
INSERT INTO `user` VALUES ('8', '', 'admin_theme1', 'admin_theme1', '', '', '', '817SlC947gHWyWOTvs53FJEjxZ8suOjH', '$2y$13$TIxNDv0SZVTHY0DjdJLrG.Av1l95HccS9HvJ8ufZeb0kr3ViQ8laK', 'ddvjZNgS295UNDPPEmLCa4QL-XPMIe-r_1502160967', null, '', '', '', 'admin_theme1@gmail.com', '', '', '', null, '', '', '', '', null, null, '30', '', '10', '0', null, '2017-08-21 11:01:16', '1502160965', '1502160965', 'theme1');
INSERT INTO `user` VALUES ('9', '', 'admin_olongkar', 'admin_olongkar', '', '', '', 'fRCi7O6L9OKYzN4FLY7cEbuxo-33zbWa', '$2y$13$lAmiKHAeHUmJcWTe..zDse4huehA8WCO..yFpqtCVMw1DWYsTOkwq', 'GBKYnmHFwlG_a025wWqgfM7DKJHHYUTl_1502161523', null, '', '', '', 'admin_olongkar@gmail.com', '', '', '', null, '', '', '', '', null, null, '30', '', '10', '0', null, '2017-08-08 05:20:08', '1502161521', '1502161521', 'olongkar');
INSERT INTO `user` VALUES ('10', '', 'admin_education2', 'admin_education2', '', '', '', 'Lg2zTzZ6OGJpE9KQRFw28msG5RsOoqDg', '$2y$13$pXotSau7lIFRBjF/Ys9rKem6tSn6qrV6lYkpiTz4685LyZtpdcs3.', 'VMnx9HEfLtJjvuwCB3VBfaBpoKAeJEeu_1505036931', null, '', '', '', 'admin_education2@gmail.com', '', '', '', null, '', '', '', '', null, null, '30', '', '10', null, null, null, '1505036928', '1505036928', 'education2');
INSERT INTO `user` VALUES ('11', '', 'admin_stech', 'admin_stech', '', '', '', 'uOBkppj1kYeQTP1PXqAX4bssbmi0lAT0', '$2y$13$Qwb7x7hWT5axPo3Z1kkD.uD3Gi7yTXFOsUotZt5PNiEQ28E2GS3hq', 'IMmTAxyG8lsspCNm41-Fs_QM8EIJmfkl_1505469262', null, '', '', '', 'admin_stech@gmail.com', '', '', '', null, '', '', '', '', null, null, '30', '', '10', null, null, null, '1505469259', '1505469259', 'stech');
INSERT INTO `user` VALUES ('12', '', 'admin_SellPhone', 'admin_SellPhone', '', '', '', 'KidvPwhvv8GFp4XiJJ8SKTmVuZYsbrLj', '$2y$13$M/RnMiHy3eT4w99Hq5UJKu3UDaO6Kkds/mAErHjXTaP1.NdI08T3q', 'sGVIRLdSD3q1l9xx41DyWlhDLJaxSvVd_1510918843', null, '', '', '', 'admin_SellPhone@gmail.com', '', '', '', null, '', '', '', '', null, null, '30', '', '10', '0', null, '2017-11-28 04:06:48', '1510918840', '1510918840', 'SellPhone');
