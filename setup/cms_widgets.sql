SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `cms_widgets`;
CREATE TABLE `cms_widgets` (
    `id` int(11)  NOT NULL AUTO_INCREMENT ,
    `name` varchar(255)  NOT NULL  ,
    `page_code` varchar(255)  NULL  ,
    `title` varchar(255)  NULL  ,
    `overview` varchar(1000)  NULL  ,
    `content` text  NULL  ,
    `display_type` varchar(255)  NULL  ,
    `columns_count` int(11)  NULL  ,
    `items_count` int(11)  NULL  ,
    `width_css` varchar(255)  NULL  ,
    `background_css` varchar(255)  NULL  ,
    `color_bg` varchar(255)  NULL  ,
    `color` varchar(255)  NULL  ,
    `style` varchar(1000)  NULL  ,
    `item_style` varchar(1000)  NULL  ,
    `item_layout` varchar(1000)  NULL  ,
    `show_viewmore` tinyint(1)  NULL  ,
    `show_headline` tinyint(1)  NULL  ,
    `viewmore_url` varchar(255)  NULL  ,
    `is_active` tinyint(1)  NULL  ,
    `sort_order` int(11)  NULL  ,
    `created_date` date  NULL  ,
    `created_user` varchar(100)  NULL  ,
    `application_id` varchar(100)  NULL  ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


