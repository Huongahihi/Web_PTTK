/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : vinh_hung

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-27 14:56:49
*/

SET FOREIGN_KEY_CHECKS=0;
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

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
