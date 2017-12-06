/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : moza_yii2_business

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-07 05:06:27
*/

SET FOREIGN_KEY_CHECKS=0;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

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
