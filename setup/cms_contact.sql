SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `cms_contact`;
CREATE TABLE `cms_contact` (
    `id` int(11)  NOT NULL  ,
    `avatar` varchar(300)  NULL  ,
    `name` varchar(255)  NOT NULL  ,
    `overview` varchar(1000)  NULL  ,
    `phone` varchar(255)  NULL  ,
    `email` varchar(255)  NULL  ,
    `address` varchar(255)  NULL   COMMENT group:location,
    `linkurl` varchar(255)  NULL  ,
    `live_chat` varchar(2000)  NULL   COMMENT group:CHAT,
    `skype` varchar(255)  NULL   COMMENT group:CHAT,
    `facebook` varchar(255)  NULL   COMMENT group:CHAT,
    `map_url` varchar(2000)  NULL   COMMENT group:location,
    `city` varchar(100)  NULL   COMMENT group:location,
    `country` varchar(100)  NULL   COMMENT group:location,
    `lat` int(11)  NULL   COMMENT group:location,
    `long` int(11)  NULL   COMMENT group:location,
    `type` varchar(100)  NULL   COMMENT data:sale,tech,support,partner;,
    `sort_order` int(11)  NULL  ,
    `is_online` tinyint(1)  NULL  ,
    `is_top` tinyint(1)  NULL  ,
    `is_active` tinyint(1)  NULL  ,
    `created_date` date  NULL  ,
    `created_user` varchar(100)  NULL  ,
    `modified_date` date  NULL  ,
    `modified_user` varchar(100)  NULL  ,
    `application_id` varchar(100)  NULL  ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


