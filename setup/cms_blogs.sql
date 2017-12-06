SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `cms_blogs`;
CREATE TABLE `cms_blogs` (
    `id` bigint(20)  NOT NULL AUTO_INCREMENT ,
    `thumbnail` varchar(300)  NULL  ,
    `image` varchar(300)  NULL  ,
    `banner` varchar(300)  NULL  ,
    `code` varchar(255)  NULL  ,
    `name` varchar(255)  NOT NULL  ,
    `overview` varchar(2000)  NULL  ,
    `content` text  NULL  ,
    `type` varchar(100)  NULL  ,
    `status` varchar(100)  NULL  ,
    `category_id` varchar(500)  NULL  ,
    `is_active` tinyint(1)  NULL  ,
    `lang` varchar(50)  NULL  ,
    `tags` varchar(1000)  NULL  ,
    `linkurl` varchar(255)  NULL  ,
    `author` varchar(255)  NULL  ,
    `is_top` tinyint(1)  NULL  ,
    `is_new` tinyint(1)  NULL  ,
    `is_hot` tinyint(1)  NULL  ,
    `count_views` int(11)  NULL  ,
    `count_comments` int(11)  NULL  ,
    `count_likes` int(11)  NULL  ,
    `count_rates` int(11)  NULL  ,
    `rates` int(11)  NULL  ,
    `created_date` date  NULL  ,
    `created_user` varchar(100)  NULL  ,
    `modified_date` date  NULL  ,
    `modified_user` varchar(100)  NULL  ,
    `application_id` varchar(100)  NULL  ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


