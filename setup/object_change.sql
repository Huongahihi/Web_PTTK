/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : vinh_hung

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-27 11:16:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `object_change`
-- ----------------------------
DROP TABLE IF EXISTS `object_change`;
CREATE TABLE `object_change` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `field_name` varchar(255) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `quantity_begin` int(11) DEFAULT NULL,
  `quantity_increase` int(11) DEFAULT NULL,
  `quantity_reduce` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of object_change
-- ----------------------------
INSERT INTO `object_change` VALUES ('25', '37', 'store_product', 'store_quantity', null, null, '4', '2017', null, '1500', '0', '2017-04-12 00:00:00', '2017-04-12 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('26', '38', 'store_product', 'store_quantity', null, null, '4', '2017', null, '500', '0', '2017-04-12 00:00:00', '2017-04-12 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('27', '39', 'store_product', 'store_quantity', null, null, '4', '2017', null, '900', '0', '2017-04-12 00:00:00', '2017-04-12 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('28', '40', 'store_product', 'store_quantity', null, null, '4', '2017', null, '900', '100', '2017-04-12 00:00:00', '2017-04-12 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('29', '1', 'store_product', 'store_quantity', null, null, '4', '2017', null, '500', '14', '2017-04-19 00:00:00', '2017-04-19 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('30', '2', 'store_product', 'store_quantity', null, null, '4', '2017', null, '0', '50', '2017-04-19 00:00:00', '2017-04-19 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('31', '3', 'store_product', 'store_quantity', null, null, '4', '2017', null, '5333', '0', '2017-04-19 00:00:00', '2017-04-19 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('32', '4', 'store_product', 'store_quantity', null, null, '4', '2017', null, '17943', '0', '2017-04-19 00:00:00', '2017-04-19 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('33', '5', 'store_product', 'store_quantity', null, null, '4', '2017', null, '2000', '0', '2017-04-26 00:00:00', '2017-04-26 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('34', '6', 'store_product', 'store_quantity', null, null, '4', '2017', null, '0', '0', '2017-04-27 00:00:00', '2017-04-27 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('35', '7', 'store_product', 'store_quantity', null, null, '4', '2017', null, '1000', '0', '2017-04-27 00:00:00', '2017-04-27 00:00:00', 'vinh_hung');
INSERT INTO `object_change` VALUES ('36', '8', 'store_product', 'store_quantity', null, null, '4', '2017', null, '0', '0', '2017-04-27 00:00:00', '2017-04-27 00:00:00', 'vinh_hung');
