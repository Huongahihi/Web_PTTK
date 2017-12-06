/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : moza_yii2_business

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-12 13:18:18
*/

SET FOREIGN_KEY_CHECKS=0;
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
) ENGINE=InnoDB AUTO_INCREMENT=2395 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('2210', 'Main Color', 'green', 'Theme', '\\kartik\\widgets\\Select2', 'color', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2211', 'Footer View', 'footer.php', 'Website', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2212', 'Header View', 'header.php', 'Website', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2213', 'keyword', '', 'Information', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2214', 'Page Header Content (HTML, CSS, JS)', '', 'Website', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2215', 'body_css', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2216', 'description', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2217', 'Website Version', 'beta', 'Website', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2218', 'Cart Enabled', '', 'Ecommerce', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2219', 'Is User Messages Enabled', '1', 'Website', '\\kartik\\checkbox\\CheckboxX', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2220', 'address', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2221', 'phone', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2222', 'email', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2223', 'copyright', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2224', 'name', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2225', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2226', 'privacy', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2227', 'terms_of_service', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2228', 'facebook', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2229', 'twitter', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2230', 'google', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2231', 'youtube', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2232', 'Format Date', 'd.m.Y', 'Format', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2233', 'Format Currency', 'USD', 'Format', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2234', 'Digit After Decimal', '0', 'Format', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2235', 'Decimal Symbol', '.', 'Format', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2236', 'Thousand Grouping Symbol', ',', 'Format', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2237', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2238', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2239', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2240', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2241', 'Languages', '{\"en\":\"English\",\"vi\":\"Vietnam\"}', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2242', 'chat', '', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2243', 'Backend/Cms-blogs/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2244', 'Grid Display Type', '', 'Information', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2245', 'Backend/Cms-testimonial/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2246', 'Backend/Cms-testimonial/ Update Form View', '_form', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2247', 'Accepted Files uploaded', 'image/*,video/*,audio/*,.docx,.txt,.xls,.pdf,.xlsx,.doc,.ppt', 'Format', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2248', 'Max File Size', '900000', 'Format', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2249', 'Backend/Application/ Index  View', '_index', 'System', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2250', 'Backend/Cms-article/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2251', 'Backend/Cms-portfolio/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2252', 'Backend/Cms-partner/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2253', 'Backend/Cms-about/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2254', 'Backend/Cms-album/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2255', 'Backend/Cms-feedback/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2256', 'Backend/Cms-slide/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2257', 'Backend/Cms-service/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2258', 'Backend/Object-actions/ Index  View', '_index', 'System', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2265', 'ADMIN_INLINE_EDIT', '1', 'Config', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2266', 'Field Layout', 'table', 'Theme', '\\kartik\\widgets\\Select2', 'field_layout', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2267', 'Backend/Auth-role/ Index  View', '_index', 'System', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2268', 'Backend/Auth-group/ Index  View', '_index', 'System', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2269', 'Backend/User/ Index  View', '_index', 'System', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2270', 'Backend/Settings/ Index  View', '_index', 'System', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2271', 'Backend/Cms-contact/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2272', 'Backend/Cms-faq/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2273', 'Backend/Cms-employee/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2274', 'Backend/Cms-statistics/ Index  View', '_index', 'Cms', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2275', 'Backend/App-user/ Index  View', '_index', 'App', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2276', 'Backend/App-user-device/ Index  View', '_index', 'App', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2277', 'Backend/App-user-feedback/ Index  View', '_index', 'App', 'textarea', '', '1', '0', 'cms');
INSERT INTO `settings` VALUES ('2294', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2295', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2296', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2297', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2298', 'Languages', '{\"en\":\"English\",\"vi\":\"Vietnam\"}', 'Config', 'textarea', '', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2299', 'copyright', 'Copyright by', 'Config', 'textarea', '', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2300', 'website', 'http://wwww.mozagroup.com', 'Config', 'textarea', '', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2301', 'name', 'MOZA TECH', 'Config', 'textarea', '', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2302', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2303', 'address', '', 'Config', 'textarea', '', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2304', 'email', 'support@mozagroup.com', 'Config', 'textarea', '', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2305', 'phone', '', 'Config', 'textarea', '', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2306', 'chat', '', 'Config', 'textarea', '', '1', '0', 'default');
INSERT INTO `settings` VALUES ('2307', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2308', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2309', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2310', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2311', 'Backend/User/ Index  View', '_index', 'System', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2312', 'Grid Display Type', '', 'Information', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2313', 'Languages', '{\"en\":\"English\",\"vi\":\"Vietnam\"}', 'Config', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2314', 'copyright', 'Copyright by', 'Config', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2315', 'website', 'http://wwww.mozagroup.com', 'Config', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2316', 'name', 'MOZA TECH', 'Config', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2317', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2318', 'address', '', 'Config', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2319', 'email', 'support@mozagroup.com', 'Config', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2320', 'phone', '', 'Config', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2321', 'chat', '', 'Config', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2322', 'Backend/User/ Create Form View', '_form', 'System', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2323', 'Accepted Files uploaded', 'image/*,video/*,audio/*,.docx,.txt,.xls,.pdf,.xlsx,.doc,.ppt', 'Format', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2324', 'Max File Size', '900000', 'Format', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2325', 'Format Date', 'd.m.Y', 'Format', 'textarea', '', '1', '0', 'vinh_hung');
INSERT INTO `settings` VALUES ('2372', 'Buttons Style', 'icons', 'Theme', '\\kartik\\widgets\\Select2', 'buttons_style', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2373', 'Theme Style', 'Material Design', 'Theme', '\\kartik\\widgets\\Select2', 'theme_style', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2374', 'Theme Color', 'light', 'Theme', '\\kartik\\widgets\\Select2', 'theme_color', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2375', 'Controls Alignment', 'horizontal', 'Theme', '\\kartik\\widgets\\Select2', 'controls_alignment', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2376', 'ADMIN_INLINE_EDIT', '1', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2377', 'Grid Display Type', '', 'Information', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2378', 'Languages', '{\"en\":\"English\",\"vi\":\"Vietnam\"}', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2379', 'copyright', 'Copyright by', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2380', 'website', 'http://wwww.mozagroup.com', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2381', 'name', 'MOZA TECH', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2382', 'slogan', '', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2383', 'address', '', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2384', 'email', 'support@mozagroup.com', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2385', 'phone', '', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2386', 'chat', '', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2387', 'Decimal Symbol', '.', 'Format', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2388', 'Thousand Grouping Symbol', ',', 'Format', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2389', 'Accepted Files uploaded', 'image/*,video/*,audio/*,.docx,.txt,.xls,.pdf,.xlsx,.doc,.ppt', 'Format', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2390', 'Max File Size', '900000', 'Format', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2391', 'Format Date', 'd.m.Y', 'Format', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2392', 'FILE_SIZE_MAX', '4000', 'Config', 'textarea', '', '1', '0', 'trayolo');
INSERT INTO `settings` VALUES ('2393', 'test', 'test', '', '', '', '1', null, 'trayolo');
INSERT INTO `settings` VALUES ('2394', 'Field Layout', 'table', 'Theme', '\\kartik\\widgets\\Select2', 'field_layout', '1', '0', 'trayolo');

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
) ENGINE=InnoDB AUTO_INCREMENT=385 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO `settings_schema` VALUES ('2303', 'travel_itinerary', 'user_id', '', 'varchar(100)', 'select', '@user', '', '', '', '', '5', null, '1', null, '1', '1');
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
INSERT INTO `settings_schema` VALUES ('2340', 'pm_project', 'client_user_id', '', 'varchar(100)', '', '@user', '', '', '', '', '15', null, null, null, '1', '1');
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
INSERT INTO `settings_schema` VALUES ('2447', 'app_user_device', 'user_id', '', 'int(11)', '', '@user', '', '', '', '', '4', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2448', 'app_user_device', 'ime', '', 'varchar(255)', '', '', '', '', '', '', '5', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2449', 'app_user_device', 'gcm_id', '', 'varchar(255)', '', '', '', '', '', '', '6', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2450', 'app_user_device', 'type', '', 'tinyint(1)', '', '', '', '', '', '', '7', null, '1', null, '1', '1');
INSERT INTO `settings_schema` VALUES ('2451', 'app_user_device', 'status', '', 'tinyint(1)', '', '', '', '', '', '', '8', null, '1', null, '1', '1');
