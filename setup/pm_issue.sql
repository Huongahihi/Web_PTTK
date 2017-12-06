SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `pm_issue`;
CREATE TABLE `pm_issue` (
    `id` bigint(20)  NOT NULL AUTO_INCREMENT ,
    `name` varchar(255)  NOT NULL  ,
    `description` varchar(2000)  NULL  ,
    `content` text  NULL  ,
    `type` varchar(100)  NULL   COMMENT data:CRASH,FEATURE,UI,SECURITY,PERFORMANCE,
    `status` varchar(100)  NULL   COMMENT data:OPEN,DOING,DONE,TEST,CLOSED,
    `priority` varchar(100)  NULL   COMMENT data:LOW,NORMAL,HIGH,
    `user_id` varchar(100)  NULL  ,
    `client_id` varchar(100)  NULL   COMMENT lookup:crm_client,
    `project_id` varchar(100)  NULL   COMMENT lookup:@pm_project,
    `created_date` date  NULL  ,
    `created_user` varchar(100)  NULL  ,
    `modified_date` date  NULL  ,
    `modified_user` varchar(100)  NULL  ,
    `application_id` varchar(100)  NULL  ,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


