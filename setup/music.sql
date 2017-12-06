/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : moza_yii2_business

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-21 10:33:48
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `music_artist`
-- ----------------------------
DROP TABLE IF EXISTS `music_artist`;
CREATE TABLE `music_artist` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'related:music_song,music_playlist',
  `thumbnail` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `real_name` varchar(255) DEFAULT NULL COMMENT 'grid:hidden',
  `description` varchar(2000) DEFAULT NULL,
  `content` text,
  `birth_date` date DEFAULT NULL COMMENT 'grid:hidden',
  `location` varchar(255) DEFAULT NULL COMMENT 'grid:hidden',
  `count_views` bigint(11) DEFAULT NULL,
  `count_likes` bigint(11) DEFAULT NULL,
  `count_rates` bigint(11) DEFAULT NULL,
  `rates` int(11) DEFAULT NULL COMMENT 'group:Count',
  `is_top` tinyint(1) DEFAULT NULL,
  `is_new` tinyint(1) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `lang` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL COMMENT 'data:WRITER=1,SINGER=2,BAND=3,PRODUCER=4,ACTOR=5',
  `status` varchar(100) DEFAULT NULL COMMENT 'data:NEW=1,ACTIVE=2,RETIRED=0',
  `category_id` varchar(500) DEFAULT NULL COMMENT 'lookup:music',
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of music_artist
-- ----------------------------
INSERT INTO `music_artist` VALUES ('1', 'https://api.soundcloud.com/tracks/82304720', 'music_artist1_image.png', 'Son Tung MTP', 'Son Tung MTP', 'FSDF FSDFSD', '<p>FSDFSDFSD</p>', null, 'sdafaf', '1500', '3333333', '44', '4', '1', '1', '1', '1', 'en', '', '1', ',20,21', '2016-09-21', 'admin', '2016-11-13', '6', 'music');
INSERT INTO `music_artist` VALUES ('2', 'musicartist2_thumbnail.png', 'musicartist2_image.png', 'Test Updated', 'Hehêhe', 'Hahahasfds', '<p>sdfasfsa</p>', null, '', '333333', '3333', '333333', '0', '1', '1', null, '1', '', '1', '1', '14,15', '2016-09-22', '6', '2016-09-28', '6', 'music');
INSERT INTO `music_artist` VALUES ('3', 'musicartist3_thumbnail.png', 'musicartist3_image.png', 'Son Tung MTP New', 'Son Tung MTP', 'FSDF FSDFSD', '<p>FSDFSDFSD</p>', null, 'sdafaf', '1500', '20000', '4444', '4', '1', null, null, '1', 'en', '2', '1', '2,3', '2016-09-21', 'admin', '2016-09-30', 'hunghx', 'music');
INSERT INTO `music_artist` VALUES ('6', 'musicartist6_thumbnail.png', 'musicartist6_image.png', 'fuck', '', '', '', null, '', null, null, null, '0', '1', null, null, null, '', '2', '', '', '2016-09-22', '6', '2016-09-22', '6', 'music');
INSERT INTO `music_artist` VALUES ('13', 'musicartist13_thumbnail.png', 'musicartist13_image.png', 'lol :D', 'FDSFDS', 'FSDFSD', '', null, '', null, null, null, '0', '1', null, null, null, '', 'type1', '', '1,3', '2016-09-22', '6', '2016-09-22', '6', 'music');
INSERT INTO `music_artist` VALUES ('14', '', '', 'lol clone', 'Hihihi', '', '', null, '', null, null, null, '0', '1', null, null, '1', '', '2', '', '2,4', '2016-09-22', '6', '2016-09-22', '6', 'music');
INSERT INTO `music_artist` VALUES ('31', 'musicartist31_thumbnail.png', 'musicartist31_image.png', 'Clone 1', '', '', '', null, '', null, null, null, '0', '1', null, null, null, '', 'type2', '', '', '2016-09-22', '6', '2016-09-22', '6', 'music');
INSERT INTO `music_artist` VALUES ('32', 'musicartist32_thumbnail.png', 'musicartist32_image.png', 'Clone 2', '', '', '', null, '', null, null, null, '0', '1', null, null, '1', '', 'type2', '1', '', '2016-09-22', '6', '2016-09-22', '6', 'music');
INSERT INTO `music_artist` VALUES ('33', 'musicartist32_thumbnail.png', 'musicartist32_image.png', 'Clone 3 :D', '', '', '', null, '', null, null, null, '0', '1', null, null, '1', '', 'type2', '1', '', '2016-09-22', '6', '2016-09-22', '6', 'music');
INSERT INTO `music_artist` VALUES ('34', '', '', 'Haha', 'Hihi', 'Heheh', '<p>FSDFSD</p>', null, '', null, null, null, '0', '1', '1', null, '1', '', '3', '1', '2,4', '2016-09-22', '6', '2016-09-22', '6', 'music');
INSERT INTO `music_artist` VALUES ('35', '', '', 'tuyệt vời', 'HIhi', '', '', null, '', null, null, null, '0', null, null, null, null, '', 'type1', '', '', '2016-09-22', '6', '2016-09-22', '6', 'music');
INSERT INTO `music_artist` VALUES ('36', '', '', 'LOL', 'Hihi', 'hahaha', '<p>FDSFS</p>', null, '', null, null, null, '0', '1', '1', null, null, '', 'type1', '', '', '2016-09-22', '6', '2016-09-22', '6', 'music');
INSERT INTO `music_artist` VALUES ('37', '', '', 'Hung dien', 'Hung dien', 'hahaha', '<p>FSDFDSF</p>', null, '', null, null, null, '0', '1', null, null, '1', '', '', '', '', '2016-10-13', '6', null, '', 'music');
INSERT INTO `music_artist` VALUES ('38', '', '', 'Ok Nga', 'Nga ngo', 'FSDFDS', '<p>FSDFSD</p>', null, '', null, null, null, '0', '1', '1', '1', '1', '', '', '', '', '2016-11-13', '6', null, '', 'cms');
INSERT INTO `music_artist` VALUES ('39', '', '', 'Artist 1', 'Artist 2', 'Hahaha', '<p>Heheh</p>', '2017-06-23', '111', '333', '33', '444', '0', '0', '0', '0', '1', '', '', '', '', '2017-06-20', '6', '2017-06-20', '6', 'cms');

-- ----------------------------
-- Table structure for `music_playlist`
-- ----------------------------
DROP TABLE IF EXISTS `music_playlist`;
CREATE TABLE `music_playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'related:music_song',
  `thumbnail` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `songs_count` int(11) DEFAULT NULL COMMENT 'group:common',
  `songs_duration` varchar(8) DEFAULT NULL COMMENT 'group:common',
  `is_active` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `is_new` tinyint(1) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT NULL,
  `is_album` tinyint(1) DEFAULT NULL,
  `is_video` tinyint(1) DEFAULT NULL,
  `lang` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL COMMENT 'data:USER=0,EDITOR=1,ALBUM=2,SHOW=3,BY_ARTIST=4',
  `category_id` varchar(500) DEFAULT NULL COMMENT 'lookup:music',
  `count_views` bigint(20) DEFAULT NULL COMMENT 'grid:hidden',
  `count_likes` bigint(20) DEFAULT NULL COMMENT 'grid:hidden',
  `count_purchase` bigint(20) DEFAULT NULL COMMENT 'grid:hidden',
  `count_rates` bigint(20) DEFAULT NULL COMMENT 'grid:hidden',
  `rates` int(11) DEFAULT NULL COMMENT 'grid:hidden',
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of music_playlist
-- ----------------------------
INSERT INTO `music_playlist` VALUES ('1', 'music_play_list1_thumbnail.png', 'music_play_list1_image.png', 'TOP 10 2016 WEEK 1', 'HIHIIHI', null, '15', '3:30:30', '1', '1', null, null, null, null, '', '1', '20', '1111', '11111', '1', '111', '4', '2016-09-28', '6', '2016-10-20', '6', '');
INSERT INTO `music_playlist` VALUES ('2', '', '', 'Playlist 1', 'Playlist 2', '2017-06-23', '11', '333', '1', '1', '1', '0', '0', '0', 'en', '', '', '111', '233', '332', '332', '4', '2017-06-20', '6', '2017-06-20', '6', 'cms');

-- ----------------------------
-- Table structure for `music_song`
-- ----------------------------
DROP TABLE IF EXISTS `music_song`;
CREATE TABLE `music_song` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'related:music_artist',
  `thumbnail` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `song_file` varchar(300) DEFAULT NULL COMMENT 'editor:file',
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `content` text,
  `price` decimal(10,2) DEFAULT NULL COMMENT 'grid:hidden',
  `duration` varchar(8) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `artist_singer_id` varchar(100) DEFAULT NULL COMMENT 'editor:select;lookup:@music_artist',
  `artist_composer_id` varchar(100) DEFAULT NULL COMMENT 'editor:select;lookup:@music_artist',
  `album_id` varchar(100) DEFAULT NULL COMMENT 'editor:select;lookup:@music_playlist',
  `is_hot` tinyint(1) DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_video` tinyint(1) DEFAULT NULL,
  `lang` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL COMMENT 'data:ORIGINAL=0,REMIX=1,REMAKE=2,COVER=3',
  `status` varchar(100) DEFAULT NULL COMMENT 'data:NEW=0,HOT=1,HIT=2,CLASSIC=3',
  `mood` varchar(100) DEFAULT NULL,
  `category_id` varchar(500) DEFAULT NULL COMMENT 'multiple:true;lookup:music',
  `count_views` bigint(20) DEFAULT NULL COMMENT 'grid:hidden',
  `count_likes` bigint(20) DEFAULT NULL COMMENT 'grid:hidden',
  `count_purchase` bigint(20) DEFAULT NULL COMMENT 'grid:hidden',
  `count_comments` int(10) DEFAULT NULL COMMENT 'grid:hidden',
  `count_rates` bigint(20) DEFAULT NULL COMMENT 'grid:hidden',
  `rates` int(11) DEFAULT NULL COMMENT 'grid:hidden',
  `created_date` date DEFAULT NULL,
  `created_user` varchar(100) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of music_song
-- ----------------------------
INSERT INTO `music_song` VALUES ('1', 'music_song1_thumbnail.png', 'music_song1_image.png', 'www.vnexpress.net', 'Song 1', 'Song 2', '<p>FSDFS</p>', null, '0', null, '1', '2', '', '1', '1', '1', '1', '', '0', '0', '0', '20,21', null, null, null, null, null, '0', '2016-09-26', '6', '2016-10-20', '6', '');
INSERT INTO `music_song` VALUES ('2', '', '', 'http://www.jplayer.org/video/m4v/Incredibles_Teaser.m4v', 'Song 2', 'Song 2 - Des', '<p>FSDFS</p>', null, '0', null, '', '', '', '1', '1', '1', null, '', '0', '', '1', '20', null, null, null, null, null, '0', '2016-09-26', '6', '2016-10-20', '6', '');
INSERT INTO `music_song` VALUES ('3', '', '', '', 'Song 3', 'Song 3 - Des', '<p>FSDFS</p>', null, '0', null, '', '', '', '1', '1', '1', null, '', '0', '', '', '20', null, null, null, null, null, '0', '2016-09-26', '6', '2016-10-09', '6', '');
INSERT INTO `music_song` VALUES ('4', '', '', 'music_song4_song_file.png', 'Song 2', 'FSD', '<p>FSDFDSFSD</p>', '11.00', '1111', null, '1', '3', null, '1', '1', '1', null, '', '0', '0', null, '20', '111', null, null, null, null, '0', '2016-09-28', '6', '2016-09-28', '6', '');
INSERT INTO `music_song` VALUES ('5', 'hello_music_song5_thumbnail.png', 'hello_music_song5_image.png', '', 'Hello', 'Haha', '<p>Hahfahsdf</p>', null, '333', '2017-06-23', '3', '1', '1', '0', '0', '1', '0', '', '', '', '', '', null, null, null, null, null, '3', '2017-06-20', '6', '2017-06-20', '6', 'cms');
