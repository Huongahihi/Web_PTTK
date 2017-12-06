SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `cms_statistics`;
CREATE TABLE `cms_statistics` (
    `id` int(11)  NOT NULL AUTO_INCREMENT ,
    `name` varchar(255)  NOT NULL  ,
    `value` bigint(20)  NOT NULL  ,
    `icon` varchar(255)  NULL  ,
    `sort_order` int(11)  NULL  ,
    `is_active` int(11)  NULL  ,
    `is_top` int(11)  NULL  ,
    `application_id` varchar(100)  NULL  ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


