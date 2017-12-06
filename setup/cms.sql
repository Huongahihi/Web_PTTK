/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : moza_yii2_business

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-12 12:05:31
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_about
-- ----------------------------
INSERT INTO `cms_about` VALUES ('1', '', '', 'Vision', 'Our mission is creating shit', '<p>Our mission is creating shit</p>', 'blue', '0', 'ok', 'glyphicon glyphicon-education', '', '1', '0', null, '', '2016-10-26', '6', '');
INSERT INTO `cms_about` VALUES ('2', '', '', 'Mission', 'Our mission is to developing', '', 'random', '4', '', 'random', '', '1', '1', '2016-10-02', '6', '2016-10-02', '6', '');
INSERT INTO `cms_about` VALUES ('3', '', '', 'Core Values', 'Trustful, Hard working, Love programming', '', 'random', '3', '', 'random', '', '1', '1', '2016-10-02', '6', '2016-10-02', '6', '');
INSERT INTO `cms_about` VALUES ('4', '', '', 'Commitment', 'Quality service commitment', '', '#6aa84f', '1', '', 'random', '', '1', '0', '2016-10-02', '6', '2016-10-02', '6', '');
INSERT INTO `cms_about` VALUES ('5', '', '', 'Test About', 'Test About :)', '<p>FDSFSDFDS</p>', '', '2', '', ':)', 'en', '1', '1', '2016-12-18', '7', '2017-02-03', '6', 'default');

-- ----------------------------
-- Table structure for `cms_album`
-- ----------------------------
DROP TABLE IF EXISTS `cms_album`;
CREATE TABLE `cms_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_album
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_article
-- ----------------------------
INSERT INTO `cms_article` VALUES ('1', '', 'article1_image.png', '', 'Hung heheh', 'AA hihihi', 'OK :)', '<p>FDSFSDFDSFDSFDSFSD</p>', 'http://vnexpress.net ! fsdf', '8', 'testimonial', 'bunJi', null, '1', null, '', '2017-02-28', '6', 'unify');
INSERT INTO `cms_article` VALUES ('2', '', '', '', 'Test', 'Hihi', 'Haha', '<p>FDSFDSFDS</p>', '', '15', 'testimonial', 'en', null, '1', '2016-11-13', '6', '2017-02-28', '6', 'education');
INSERT INTO `cms_article` VALUES ('3', '', '', '', 'Hihihihi', 'Haha', '', '', 'FDSFSD', '11', '', '', null, null, '2017-03-01', '6', '2017-03-01', '6', 'default');
INSERT INTO `cms_article` VALUES ('4', '', '', '', 'Test :)', 'Hahaha', '.................', '', 'www.vnexpress.net', '9', 'service', 'en', '1', '1', '2017-03-01', '6', '2017-03-01', '6', 'default');
INSERT INTO `cms_article` VALUES ('5', '', '', '', 'FSDFSDF', 'FDSFFSD', '', '', 'OK', '13', 'testimonial', 'bunJi', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('6', '', '', '', 'Hello', 'Hihi', '', '', 'FSDF', '18', 'testimonial', 'en', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('7', '', '', '', '11', '333', '', '', '3333', '16', 'testimonial', 'en', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('8', '', '', '', 'Haha', 'Hihi', '', '', 'FDS', '18', 'testimonial', 'en', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('9', '', '', '', 'Yeu em', 'So hoa fsd', 'dfdfsd', '', 'FDS', '19', 'testimonial', 'en', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('10', '', '', '', 'Yeu em', 'So hoa', '', '', 'FDS', '17', 'testimonial', 'en', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('11', '', '', '', 'Hung', 'Haha', '', '', 'Hihi', '17', '', '', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('12', '', '', '', 'FDS', 'FDSF', '', '', 'SDFSDF', '19', 'service', 'en', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('13', '', '', '', 'XXXXXX', 'FFFF', '', '', 'FDSFSD', '19', 'service', 'bunJi', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('14', '', '', '', 'DD11', 'DD111', '', '', 'DD111', '16', 'service', 'en', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('15', '', '', '', 'Cuong', 'Cuong', '', '', 'Hha', '15', 'testimonial', 'en', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('16', '', '', '', 'fsd', 'fds', '', '', 'dsf', '17', 'testimonial', '', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('17', '', '', '', 'Ngon', 'Ngon', '', '', 'Haha', '15', 'service', 'bunJi', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('18', '', '', '', 'DDD', 'DDD', '', '', 'DFD', '16', 'testimonial', 'bunJi', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('19', '', '', '', '11', '22', '', '', '33', '17', 'testimonial', '', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('20', '', '', '', '', 'ddd', '', '', '', '18', '', '', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('21', '', '', '', 'hung dien', 'hung dien', '', '', 'fdsfdsfsa', '19', 'testimonial', '', null, null, '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('22', '', '', '', 'DDD', 'FDSFS', ':)', '', 'DFDSFDS', '5', 'service', 'hindi', '1', '1', '2017-03-01', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('23', '', '', '', 'OK', 'Haha', '', '', 'dda', '16', 'testimonial', 'en', null, '1', '2017-03-01', '6', '2017-03-03', '6', 'default');
INSERT INTO `cms_article` VALUES ('24', 'hahah-dok_cms_article24_thumbnail.png', 'hahah-dok_cms_article24_image.png', '', 'Ok :)', 'OK :)', 'Gen ok rồi', '<p>FSDFSD</p>', '', '0', 'testimonial', 'bunJi', '1', '1', '2017-03-01', '6', '2017-03-05', '6', 'default');
INSERT INTO `cms_article` VALUES ('25', '', '', '', '', 'Haha', '', '', '', '6', 'service', '', '1', '1', '2017-03-01', '6', '2017-03-05', '6', 'default');
INSERT INTO `cms_article` VALUES ('26', '', '', '', 'ok', 'ok', '', '', 'shit', '7', '', '', '1', '1', '2017-03-01', '6', '2017-03-05', '6', 'default');
INSERT INTO `cms_article` VALUES ('27', '', '', '', 'Hiep', 'DSFSD', '', '', 'heheh', '18', 'testimonial', 'en', null, null, '2017-03-02', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('28', '', '', '', '31333', 'Hiep ga fdsf. Good vãi :) fsd', 'Hehe fsd fsdfsd', '', '', '4', 'service', '', '0', '1', '2017-03-02', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_article` VALUES ('29', '', '', '', 'Hehe', 'Hiepf', '', '', '', '12', '', 'en', '1', '1', '2017-03-03', '6', '2017-03-03', '6', 'default');
INSERT INTO `cms_article` VALUES ('30', '', '', '', 'OK', 'Hiep', 'jjj', '', '', '10', 'service', 'en', '1', '1', '2017-03-03', '6', '2017-03-03', '6', 'default');
INSERT INTO `cms_article` VALUES ('31', '', '', '', 'XXXX', 'XXXX', '', '', 'XXX', '14', 'service', 'en', '1', '1', '2017-03-04', '6', '2017-03-04', '6', 'default');
INSERT INTO `cms_article` VALUES ('32', '', '', '', 'CCC', 'FFFF fds', '', '', 'DDD', '2', 'testimonial', '', '0', '1', '2017-03-05', '6', '2017-03-05', '6', 'default');
INSERT INTO `cms_article` VALUES ('33', '', 'blog-fsdfs_cms_article33_image.png', '', 'DDDD', 'blog fsdfs', '', '', 'fsdfs', '1', 'testimonial', '', '1', '1', '2017-03-05', '6', '2017-03-05', '6', 'default');
INSERT INTO `cms_article` VALUES ('34', '', '', '', 'Hung dien', 'Good', '', '', 'Hihihi', '3', 'about', '', '0', '1', '2017-03-05', '6', '2017-03-05', '6', 'default');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_blogs
-- ----------------------------
INSERT INTO `cms_blogs` VALUES ('13', 'hihi_cms_blogs13_thumbnail.png', 'hihi_cms_blogs13_image.png', '', 'haha - fw', 'Hihi', 'Ok', '<p>OK</p>', 'events', 'published', ',10,', '1', 'en', '', '', '', '1', '0', '1', null, null, null, '333', '0', '2017-02-10', '6', '2017-02-10', '6', 'default');
INSERT INTO `cms_blogs` VALUES ('14', '', '', '', 'Linkhay - fw', 'LinkHAY', 'Hihihi Hehehe', '<p>Hoho FSDFSD</p>', 'news', 'published', ',10,', '1', 'en', 'tags,format', 'www.vnexpress.net', 'www.vnexpress.net', '1', '1', '1', '33', '3333', '334443', '33', '0', '2017-02-10', '6', '2017-02-10', '6', 'default');
INSERT INTO `cms_blogs` VALUES ('16', null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `cms_blogs` VALUES ('17', '', '', '', 'aaa', 'ddd', 'ffff', '<p>dddd</p>', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-10', '6', null, '', 'default');
INSERT INTO `cms_blogs` VALUES ('18', '', '', '', 'fdsaáda', 'fdsf', 'fdà', '<p>fdấdf</p>', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-10', '6', null, '', 'default');
INSERT INTO `cms_blogs` VALUES ('19', '', '', '', 'fff', 'ffff', 'fffff', '', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-10', '6', null, '', 'default');
INSERT INTO `cms_blogs` VALUES ('20', '', '', '', '', 'dddddddddddddddd', 'dddddddddddddddd', '', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-10', '6', null, '', 'default');
INSERT INTO `cms_blogs` VALUES ('21', '', '', '', '', 'ddddddd', 'ddddddddddddddd', '', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-10', '6', null, '', 'default');
INSERT INTO `cms_blogs` VALUES ('22', '', '', '', '', 'ddddddd', 'ddddddddddddddd', '', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-10', '6', null, '', 'default');
INSERT INTO `cms_blogs` VALUES ('23', '', '', '', '', 'fsdf', 'fsdfasdfsda', '', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-10', '6', null, '', 'default');
INSERT INTO `cms_blogs` VALUES ('24', '', '', '', '', 'fsdf', 'fsdfasdfsda', '', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-10', '6', null, '', 'default');
INSERT INTO `cms_blogs` VALUES ('25', '', '', '', '', 'Hahaha', 'hahahha', '', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-10', '6', null, '', 'default');
INSERT INTO `cms_blogs` VALUES ('27', '', '', '', 'New 2', 'New 2 - Name', 'New 3 - Name', '<p>Hahaha</p>', '', '', '', '1', '', 'FSDFDS', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-22', '9', '2017-05-27', '6', 'trayolo');
INSERT INTO `cms_blogs` VALUES ('28', '', '', '', 'New - EN', 'New 1 - Lahala', 'New 2 - Hehehe', '<p>New 3 - Hhahaha</p>', '', '', '', '1', '', 'FSDFSD', '', '', '0', '0', '0', null, null, null, null, '0', '2017-05-23', '9', '2017-05-26', '9', 'trayolo');
INSERT INTO `cms_blogs` VALUES ('29', '', '', '', 'Test Create new', 'Test Create new - Name', 'FSDFSDF', '', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-02', '6', null, '', 'trayolo');
INSERT INTO `cms_blogs` VALUES ('30', '', '', '', 'Lalalala - New 3', 'HIHIHi - New 3', 'HOHÔHOHO - New 3', '<p>Hehehe&nbsp;- New FDS</p>', '', '', '', '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-02', '6', '2017-06-02', '6', 'trayolo');
INSERT INTO `cms_blogs` VALUES ('31', '', '', '', 'New Blogs EN haha', 'New Blogs - Description EN', 'Hahah 1 2 3 4 5 6', '<p>444</p>', '', '', '', '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-02', '6', '2017-06-02', '6', 'trayolo');
INSERT INTO `cms_blogs` VALUES ('32', '', '', '', 'Test EN NEW', 'Haha', 'hihi', '<p>SDFDFDSF</p>', '', '', null, '0', '', 'FSFSDFSD', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-09', '6', null, '', 'trayolo');
INSERT INTO `cms_blogs` VALUES ('33', '', '', '', 'Test EN NEW', 'Haha', 'hihi', '<p>SDFDFDSF</p>', '', '', null, '0', '', 'FSFSDFSD', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-09', '6', null, '', 'trayolo');
INSERT INTO `cms_blogs` VALUES ('34', '', '', '', 'TEST NEW 2', 'TEST NEW 2', 'TEST NEW 2', '', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-09', '6', null, '', 'trayolo');
INSERT INTO `cms_blogs` VALUES ('35', '', '', '', 'TEST NEW 3', 'TEST NEW 3', 'TEST NEW 3', '', '', '', null, '0', '', '', '', '', '0', '0', '0', null, null, null, null, '0', '2017-06-09', '6', null, '', 'trayolo');

-- ----------------------------
-- Table structure for `cms_contact`
-- ----------------------------
DROP TABLE IF EXISTS `cms_contact`;
CREATE TABLE `cms_contact` (
  `id` int(11) NOT NULL,
  `avatar` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT 'group:location',
  `linkurl` varchar(255) DEFAULT NULL,
  `live_chat` varchar(2000) DEFAULT NULL COMMENT 'group:CHAT',
  `skype` varchar(255) DEFAULT NULL COMMENT 'group:CHAT',
  `facebook` varchar(255) DEFAULT NULL COMMENT 'group:CHAT',
  `map_url` varchar(255) DEFAULT NULL COMMENT 'group:location',
  `city` varchar(100) DEFAULT NULL COMMENT 'group:location',
  `country` varchar(100) DEFAULT NULL COMMENT 'group:location',
  `lat` int(11) DEFAULT NULL COMMENT 'group:location',
  `long` int(11) DEFAULT NULL COMMENT 'group:location',
  `type` varchar(100) DEFAULT NULL COMMENT 'data:sale,tech,support,partner;',
  `sort_order` int(11) DEFAULT NULL,
  `is_online` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_contact
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_employee
-- ----------------------------
INSERT INTO `cms_employee` VALUES ('1', 'cms_employee1_image.png', 'Ho Xuan Cuong', 'CEO, Co-Founder', '', '', 'http://www.vnexpress.net', 'hung.hoxuan', 'hung.hoxuan', 'hung.hoxuan', '', 'hicomsolutions@gmail.com', '+84912738748', 'skype:hung.hoxuan', '0', '1', '1', '1', null, '', '2016-09-25', '6', '');
INSERT INTO `cms_employee` VALUES ('2', 'cms_employee2_image.png', 'Ho Xuan Hung', 'CEO, Co-Founder', '', '', '', '', '', '', '', 'hung.hoxuan@gmail.com', '+84912738748', 'skype:hung.hoxuan', '1', '1', '1', '1', null, '', null, '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_faq
-- ----------------------------
INSERT INTO `cms_faq` VALUES ('1', 'Can i kiss you', '<p>Yes you <strong>can.</strong></p>', '', '0', '', '1', '1', '2016-10-05', '6', '2017-02-10', '6', 'education');
INSERT INTO `cms_faq` VALUES ('2', 'Can i have refund', '<p>No you can&#39;t</p>', '', '2', '', '1', '1', '2016-10-05', '6', '2017-02-10', '6', 'education');
INSERT INTO `cms_faq` VALUES ('3', 'What can i do now', '', 'COMMON', '1', 'en', '1', '1', '2017-03-03', '6', '2017-03-03', '6', 'default');

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
-- Table structure for `cms_links`
-- ----------------------------
DROP TABLE IF EXISTS `cms_links`;
CREATE TABLE `cms_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'FOREIGN KEY (categoryId) REFERENCES category(id)',
  `content` text,
  `type` varchar(100) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_links
-- ----------------------------
INSERT INTO `cms_links` VALUES ('43', 'a', 'a', '9', null, null, '1', null, '2017-03-10', null);
INSERT INTO `cms_links` VALUES ('44', 'google.com.vn', 'google dfd', '10', null, null, '0', null, '2017-03-10', null);

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
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_partner
-- ----------------------------
INSERT INTO `cms_partner` VALUES ('1', 'cms_partner1_image.png', 'ES Canada', '', null, null, null, 'FSDFSD', '0', '1', '2016-09-25', '6', '2016-09-25', '6', '');
INSERT INTO `cms_partner` VALUES ('2', 'cms_partner2_image.png', 'Microsoft', 'http://www.microsoft.com', null, null, null, 'DDDD', '1', '1', '2016-09-25', '6', null, '', '');
INSERT INTO `cms_partner` VALUES ('3', 'cms_partner3_image.png', 'Facebook', '', null, null, null, '', '2', '1', '2016-09-25', '6', null, '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_portfolio
-- ----------------------------
INSERT INTO `cms_portfolio` VALUES ('1', '', '', 'Rich Media', 'AAAA', '<p>FSDFsd</p>', '', '', '', null, null, '', '', '1', '1', '1', '2016-10-05', '6', '2016-10-05', '6', 'education');
INSERT INTO `cms_portfolio` VALUES ('2', 'cms_portfolio2_image.jpg', 'cms_portfolio2_banner.jpg', 'Rich media', 'Hello hihi', '<p>Hihii</p>', '', '', '', null, null, '', '', '0', '1', '1', '2016-10-05', '6', '2016-11-13', '6', 'education');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_service
-- ----------------------------
INSERT INTO `cms_service` VALUES ('1', '', '', 'Mobile development', 'We can develop fast', '<p>Hello :)</p>', '', '1', 'hindi', null, '1', '2016-10-04', '6', '2017-03-02', '6', 'education');
INSERT INTO `cms_service` VALUES ('2', '', '', 'Software outsourcing', '5 years experience in software outsourcing', '<p>OK&nbsp;</p>', '', '0', 'bunJi', null, null, '2016-10-04', '6', '2017-01-08', '6', 'education');
INSERT INTO `cms_service` VALUES ('3', '', '', 'OK', '', '', 'good DF', null, 'en', '1', '1', '2017-03-02', '6', '2017-03-02', '6', 'default');
INSERT INTO `cms_service` VALUES ('4', '', '', 'Service 1 lalala', 'Service 1 lalala', '<p>Service 1</p>', '', null, '', '0', '0', '2017-06-06', '6', '2017-06-06', '6', 'trayolo');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_slide
-- ----------------------------
INSERT INTO `cms_slide` VALUES ('1', '1.jpg', 'Over 100+ mobile apps templates', 'Ready source code, reliable developers', 'random', '500', 'center', '', 'VNExpress', 'http://www.vnexpress.net', '', '', '', '', '0', '1', '');
INSERT INTO `cms_slide` VALUES ('2', '2.jpg', 'Fruity Solution is best', 'Best templates & source code & developers', 'zoomout', '1500', 'right', '', 'View more', 'www.vnexpress.net', '', '', '', '', '2', '1', '');
INSERT INTO `cms_slide` VALUES ('3', 'cms_slide3_image.png', 'I Like it', 'Chuẩn men', '', '', '', '', 'Test', '', 'Video', 'https://www.youtube.com/embed/ANSROLDKhp4', '', '', '3', '1', '');
INSERT INTO `cms_slide` VALUES ('4', '', 'Slide 1', 'Best', 'fade', '1000', 'left', '', 'Project Template', 'http://projectemplate.com', '', '', '', '', '1', '1', 'default');

-- ----------------------------
-- Table structure for `cms_statistics`
-- ----------------------------
DROP TABLE IF EXISTS `cms_statistics`;
CREATE TABLE `cms_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` bigint(20) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_top` int(11) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cms_statistics
-- ----------------------------
INSERT INTO `cms_statistics` VALUES ('1', 'Products', '244', '1', '1', '1', '');
INSERT INTO `cms_statistics` VALUES ('2', 'Clients', '1500', '0', '1', '1', '');
INSERT INTO `cms_statistics` VALUES ('3', 'Products', '150', null, '1', '1', 'default');

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
INSERT INTO `cms_testimonial` VALUES ('1', '', 'Ho Xuan Cuong EN 3', 'CEO, Founder of Projectemplate', 'Vietnam', '<p>Projectemplate is very good ! We love their service !</p>', '4', '', '1', '1', '1', '2016-09-25', '6', '2016-09-26', '6', 'cms');
INSERT INTO `cms_testimonial` VALUES ('2', 'cms_testimonial2_image.png', 'Ho Xuan Hung EN 3', 'CEO of Projectemplate EN', 'Hanoi, Vietnam', '<p>Projectemplate is very good !</p>', '3', '', '0', '1', '1', '2016-09-25', '6', '2017-06-06', '6', 'cms');
