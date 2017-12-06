/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : moza_yii2_business

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-12 13:24:45
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_user
-- ----------------------------
INSERT INTO `app_user` VALUES ('1', '', 'Mr Cuong Hy', 'immrhy@gmail.com', 'immrhy@gmail.com', '$2y$13$LRvAS.EQ5jfb6rT0/KRg0eKf2c1YB02VN2V1Dzz0ze/ISVEH1Yawe', 'gRS6h1See-FfeNWrV2gjeLl42UkUNH5t', null, null, '', null, '', null, '', null, null, '', null, null, '', null, '5', '', '', '', '', '', null, null, null, '1', null, 'BANNED', '10', null, null, '2016-11-23 11:49:26');
INSERT INTO `app_user` VALUES ('2', '', 'fddaf', 'hung.hoxuan@gmail.com', 'hung.hoxuan@gmail.com', '$2y$13$L5JZJz0ATdHpVsPITUlISu76jVaV.j6LAdpBpbRgGmRCUKGGhBbKC', 'sdWDOCVhNSfiSEyITG6Q8l-5OsYq5dtg', '', '', '', '', '', '', '', '', '', '', '', '', '', null, null, '', '', '', '', '', null, null, '1', '1', '', '1', '20', '', null, '2017-03-22 12:18:54');
INSERT INTO `app_user` VALUES ('3', null, '', 'admin@gmail.com', 'admin@gmail.com', '$2y$13$6Q.axFyEYMDuuAmqtv/I3uIxYiiL5h5UmMC21zL661c1.oUTGIiiO', 'UWa_--r2UJzDZcNImYoe269dxi6qDfaF', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, '1', '30', null, null, null);
INSERT INTO `app_user` VALUES ('4', null, '', 'hung2@gmail.com', 'hung2@gmail.com', '$2y$13$sTwuSuIgZKaF7o9nBLLCyuSLcGlCBtUUCkvlMvpbNYoAAYwckMjva', '8OSE2JnRP_ye5RS_DSae3BriFJ0hyVQO', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, '1', '30', null, null, null);
INSERT INTO `app_user` VALUES ('5', null, '', 'hunghx@gmail.com', 'hunghx@gmail.com', '$2y$13$/swJpb8Tgmtf70lzglBmcuQybDTbnANGpi8qaKM76FcxOOEcywVv6', 'auJkSikaZQCR6xHvafexNReCMQwqaLZh', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, '0', null, null, null, null);
INSERT INTO `app_user` VALUES ('6', null, '', 'lalala@gmail.com', 'lalala@gmail.com', '$2y$13$JkpjpHQ29KRNWpJ2FlloM.aZvt9qrcCoweaqjK3mwqYcysS3Pl4hy', '9xDfP9MG6bXul1IxNwv5npmz8x4MaSWr', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, '0', null, null, null, null);
INSERT INTO `app_user` VALUES ('7', null, '', 'hung.hoxuan2@gmail.com', 'hung.hoxuan2@gmail.com', '$2y$13$XfRle7qNilUSFGRmInhoC.qdC11bM6nmYB18AkmBCvVB8NdXEZ7mi', 'gQQId4Pld4doKppxEeKOtdJ3eWlhv2TL', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, '0', null, null, null, null);
INSERT INTO `app_user` VALUES ('8', null, '', 'hunghx2@gmail.com', 'hunghx2@gmail.com', '$2y$13$/5l02psYMMrFenFdAL2sUexqJiMcrqhJSZRc3wJdPR6NoBDJOFvM6', 'HmezIgceQWX0qil69i4tw6XNL4c-5TZr', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, '0', null, null, null, null);
INSERT INTO `app_user` VALUES ('9', null, '', 'hung.hoxuan5555@gmail.com', 'hung.hoxuan5555@gmail.com', '$2y$13$U3PXHhNDKsA2UQQqJMm6quPgzt2DK003VJd7H8osOkcNxfXuRv8/2', 'NjILyuhUrJQtrzgWyH-h6mBEnu-QLMEF', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, '0', null, null, null, null);
INSERT INTO `app_user` VALUES ('10', null, '', 'hung.hoxuan14@gmail.com', 'hung.hoxuan14@gmail.com', '$2y$13$rCUaIAkWWU9/XG2tPbdYMOqt3P.E35/f4/YWm1EtEWgq9NZVcaILe', 'Yhwl97QGHXDPxDDI0Eik6rIz9aTADZDU', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, '0', null, null, null, null);

-- ----------------------------
-- Table structure for `app_user_bookmark`
-- ----------------------------
DROP TABLE IF EXISTS `app_user_bookmark`;
CREATE TABLE `app_user_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL COMMENT 'lookup:@user',
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
  `user_id` int(11) DEFAULT NULL COMMENT 'lookup:@user',
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
  `user_id` varchar(100) NOT NULL COMMENT 'lookup:@user',
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_user_feedback
-- ----------------------------
INSERT INTO `app_user_feedback` VALUES ('1', '4', '', 'common', 'fdsfas', 'fsdfasdfdfsa', '', '', '2017-03-06 17:49:58', '', null, '', 'default');
INSERT INTO `app_user_feedback` VALUES ('2', '2', '', '', 'FDSFDSFDS', '', '', '', '2017-03-06 00:00:00', '', null, '', 'default');
INSERT INTO `app_user_feedback` VALUES ('3', '2', '', '', 'FDSFDS', '', '', '', '2017-03-06 00:00:00', '', null, '', 'default');
INSERT INTO `app_user_feedback` VALUES ('4', '2', '', '', 'FDSFSDfsdfsdf', '', '', '', '2017-03-06 00:00:00', '', null, '', 'default');
INSERT INTO `app_user_feedback` VALUES ('5', '6', '84', 'ecommerce_order', 'Order #84 (Bộ Neo DUL/SSPC 6-19 (bát+ nêm)', '', '', '', '2017-03-08 00:00:00', '6', null, '', 'default');

-- ----------------------------
-- Table structure for `app_user_logs`
-- ----------------------------
DROP TABLE IF EXISTS `app_user_logs`;
CREATE TABLE `app_user_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL COMMENT 'lookup:@user',
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
  `receiver_user_id` varchar(100) NOT NULL COMMENT 'lookup:@user',
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
