/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : moza_yii2_business

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-12 13:19:17
*/

SET FOREIGN_KEY_CHECKS=0;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of object_actions
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of object_category
-- ----------------------------
INSERT INTO `object_category` VALUES ('25', null, 'test-1_object_category25_image.png', 'Test 1', 'Test 2', '1', '1', '1', null, 'cms_blogs', '2017-06-09 16:23:25', '2017-06-09 16:29:50', 'trayolo');
INSERT INTO `object_category` VALUES ('26', '30', '', 'Test hahah', 'Hihihi', '0', '1', null, null, 'cms_blogs', '2017-06-09 16:29:16', '2017-06-09 16:30:05', 'trayolo');
INSERT INTO `object_category` VALUES ('27', null, '', 'sdfadsfasd', '', null, '1', null, null, '', '2017-06-09 19:20:02', '2017-06-10 12:33:45', 'trayolo');
INSERT INTO `object_category` VALUES ('28', null, '', 'What is this', '', null, '1', '1', null, '', '2017-06-09 19:20:20', null, 'trayolo');
INSERT INTO `object_category` VALUES ('29', null, '', 'lol', '', null, '1', null, null, '', '2017-06-09 19:21:00', null, 'trayolo');
INSERT INTO `object_category` VALUES ('30', null, '', 'ngon ok', '', null, '1', null, null, '', '2017-06-09 19:23:51', null, 'trayolo');
INSERT INTO `object_category` VALUES ('31', null, '', 'FSDfsd', '', null, '1', null, null, '', '2017-06-09 19:23:57', null, 'trayolo');
INSERT INTO `object_category` VALUES ('32', null, '', 'fdsfsad', '', null, '1', null, null, '', '2017-06-09 19:24:05', null, 'trayolo');
INSERT INTO `object_category` VALUES ('33', null, '', 'Eo hieu lam', '', null, '1', null, null, '', '2017-06-09 19:24:13', null, 'trayolo');
INSERT INTO `object_category` VALUES ('34', null, '', 'test abv', '', null, '1', null, null, '', '2017-06-10 04:57:07', null, 'trayolo');

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
  `app_user_id` varchar(100) DEFAULT NULL COMMENT 'lookup:@user',
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
  `object_id` varchar(100) NOT NULL COMMENT 'lookup:@user',
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
-- Table structure for `object_reviews`
-- ----------------------------
DROP TABLE IF EXISTS `object_reviews`;
CREATE TABLE `object_reviews` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `rate` float DEFAULT NULL,
  `comment` varchar(2000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'lookup:@user',
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

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
INSERT INTO `object_translation` VALUES ('24', '33', 'cms_blogs', 'vi', '{\"id\":\"33\",\"thumbnail\":\"\",\"image\":\"\",\"banner\":\"\",\"code\":\"Test EN NEW\",\"name\":\"Haha VI\",\"overview\":\"hihi VI\",\"content\":\"<p>SDFDFDSF<\\/p>\",\"type\":\"\",\"status\":\"\",\"category_id\":\"\",\"is_active\":\"0\",\"lang\":\"\",\"tags\":\"FSFSDFSD\",\"linkurl\":\"\",\"author\":\"\",\"is_top\":\"0\",\"is_new\":\"0\",\"is_hot\":\"0\",\"count_views\":\"\",\"count_comments\":\"\",\"count_likes\":\"\",\"count_rates\":\"\",\"rates\":\"0\",\"created_date\":\"2017-06-09\",\"created_user\":\"6\",\"modified_date\":\"2017-06-10 06:38:12\",\"modified_user\":\"6\",\"application_id\":\"trayolo\"}', '2017-06-10 06:38:12', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('25', '32', 'cms_blogs', 'vi', '{\"id\":\"32\",\"thumbnail\":\"\",\"image\":\"\",\"banner\":\"\",\"code\":\"Test EN NEW\",\"name\":\"Haha fds\",\"overview\":\"hihi\",\"content\":\"<p>SDFDFDSF<\\/p>\",\"type\":\"\",\"status\":\"\",\"category_id\":\"\",\"is_active\":\"0\",\"lang\":\"\",\"tags\":\"FSFSDFSD\",\"linkurl\":\"\",\"author\":\"\",\"is_top\":\"0\",\"is_new\":\"0\",\"is_hot\":\"0\",\"count_views\":\"\",\"count_comments\":\"\",\"count_likes\":\"\",\"count_rates\":\"\",\"rates\":\"0\",\"created_date\":\"2017-06-09\",\"created_user\":\"6\",\"modified_date\":\"2017-06-10 06:38:21\",\"modified_user\":6,\"application_id\":\"trayolo\"}', '2017-06-10 06:38:21', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('26', '34', 'cms_blogs', 'vi', '{\"id\":\"34\",\"thumbnail\":\"\",\"image\":\"\",\"banner\":\"\",\"code\":\"TEST NEW 2\",\"name\":\"TEST NEW 2 VI\",\"overview\":\"TEST NEW 2\",\"content\":\"\",\"type\":\"\",\"status\":\"\",\"category_id\":\"\",\"is_active\":\"0\",\"lang\":\"\",\"tags\":\"\",\"linkurl\":\"\",\"author\":\"\",\"is_top\":\"0\",\"is_new\":\"0\",\"is_hot\":\"0\",\"count_views\":\"\",\"count_comments\":\"\",\"count_likes\":\"\",\"count_rates\":\"\",\"rates\":\"0\",\"created_date\":\"2017-06-09\",\"created_user\":\"6\",\"modified_date\":\"2017-06-10 11:43:33\",\"modified_user\":6,\"application_id\":\"trayolo\"}', '2017-06-10 08:54:55', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('27', '35', 'cms_blogs', 'vi', '{\"id\":\"35\",\"thumbnail\":\"\",\"image\":\"\",\"banner\":\"\",\"code\":\"TEST NEW 3\",\"name\":\"TEST NEW 3 VI\",\"overview\":\"TEST NEW 3\",\"content\":\"\",\"type\":\"\",\"status\":\"\",\"category_id\":\"\",\"is_active\":\"1\",\"lang\":\"\",\"tags\":\"\",\"linkurl\":\"\",\"author\":\"\",\"is_top\":\"0\",\"is_new\":\"0\",\"is_hot\":\"0\",\"count_views\":\"\",\"count_comments\":\"\",\"count_likes\":\"\",\"count_rates\":\"\",\"rates\":\"0\",\"created_date\":\"2017-06-09\",\"created_user\":\"6\",\"modified_date\":\"2017-06-10 09:05:25\",\"modified_user\":\"6\",\"application_id\":\"trayolo\"}', '2017-06-10 09:05:25', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('31', '156', 'object_setting', 'vi', '{\"id\":156,\"object_type\":\"common\",\"meta_key\":\"cms_blogs.type\",\"key\":\"lala\",\"value\":\"vai - vi\",\"description\":null,\"icon\":null,\"color\":null,\"is_active\":1,\"sort_order\":0,\"application_id\":\"trayolo\"}', '2017-06-10 11:47:36', '6', 'trayolo');
INSERT INTO `object_translation` VALUES ('32', '27', 'object_category', 'vi', '{\"id\":\"27\",\"parent_id\":\"\",\"image\":\"\",\"name\":\"sdfadsfasd - vn\",\"description\":\"\",\"sort_order\":\"\",\"is_active\":\"1\",\"is_top\":\"\",\"is_hot\":\"\",\"object_type\":\"\",\"created_date\":\"2017-06-09 19:20:02\",\"modified_date\":\"2017-06-10 12:33:45\",\"application_id\":\"trayolo\"}', '2017-06-10 12:34:43', '6', 'trayolo');

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
INSERT INTO `object_type` VALUES ('user', 'app', 'App User', '4', '1', '1');
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
