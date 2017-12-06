SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `cms_article`;
CREATE TABLE `cms_article` (
    `id` bigint(20)  NOT NULL AUTO_INCREMENT ,
    `thumbnail` varchar(300)  NULL  ,
    `image` varchar(300)  NULL  ,
    `banner` varchar(300)  NULL  ,
    `code` varchar(255)  NULL  ,
    `icon` varchar(255)  NULL  ,
    `name` varchar(250)  NOT NULL  ,
    `overview` varchar(2000)  NULL  ,
    `content` text  NULL  ,
    `linkurl` varchar(255)  NULL  ,
    `sort_order` int(5)  NULL  ,
    `type` varchar(50)  NULL  ,
    `lang` varchar(50)  NULL  ,
    `is_active` tinyint(1)  NULL  ,
    `is_top` tinyint(1)  NULL  ,
    `created_date` date  NULL  ,
    `created_user` varchar(150)  NULL  ,
    `modified_date` date  NULL  ,
    `modified_user` varchar(150)  NULL  ,
    `application_id` varchar(100)  NULL  ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


