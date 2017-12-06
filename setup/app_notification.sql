SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `app_notification`;
CREATE TABLE `app_notification` (
    `id` bigint(20)  NOT NULL AUTO_INCREMENT ,
    `message` varchar(2000)  NOT NULL  ,
    `action` varchar(255)  NULL  ,
    `params` varchar(2000)  NULL  ,
    `sent_type` varchar(100)  NULL   COMMENT data:sms,app,email,message,all,
    `sent_date` datetime  NULL  ,
    `receiver_count` bigint(20)  NULL   COMMENT group:Receiver,
    `receiver_users` text  NULL   COMMENT lookup:user; group:Receiver,
    `created_date` datetime  NULL  ,
    `created_user` varchar(100)  NULL  ,
    `application_id` varchar(100)  NULL  ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


