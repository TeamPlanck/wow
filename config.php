<?php namespace Wow;

include 'includes/Database.class.php';

$db = new Database();
$con = $db->connect();

// Create Tables
	
$create_tbl = 'CREATE TABLE IF NOT EXISTS `wow_user` (
    `user_id` INT(10) NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(20) NOT NULL,
    `user_fname` VARCHAR(20) NOT NULL,
    `user_lname` VARCHAR(10) NOT NULL,
    `user_email` VARCHAR(30) NOT NULL,
    `user_cc` INT(3) NULL DEFAULT NULL,
    `user_no` VARCHAR(10) NULL DEFAULT NULL,
    `user_gender` TINYINT(1) NULL DEFAULT NULL,
    `user_birthday` DATE NULL DEFAULT NULL,
    `user_follower` INT(10) NOT NULL DEFAULT 0,
    `user_follwing` INT(3) NOT NULL DEFAULT 0, 
    `user_verified` TINYINT(1) NOT NULL DEFAULT 0,
    `user_count` BIGINT NOT NULL DEFAULT 1,
    `user_password` VARCHAR(256) NOT NULL,
    `user_signup` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`),
    UNIQUE (`user_name`, `user_email`, `user_no`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;';

$create_tbl .= 'CREATE TABLE IF NOT EXISTS `wow_report` (
    `report_id` INT(10) NOT NULL AUTO_INCREMENT,
    `report_uid` INT(10) NOT NULL,
    `report_rid` INT(10) NOT NULL,
    `report_type` VARCHAR(10) NOT NULL,
    `report_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`report_id`),
    FOREIGN KEY (`report_uid`) REFERENCES `wow_user` (`user_id`) ON DELETE CASCADE 
) ENGINE = InnoDB DEFAULT CHARSET = utf8;';

$create_tbl .= 'CREATE TABLE IF NOT EXISTS `user_link` (
    `link_id` INT(10) NOT NULL AUTO_INCREMENT,
    `link_uid` INT(10) NOT NULL,
    `link_fb` VARCHAR(20) NULL DEFAULT NULL,
    `link_ig` VARCHAR(20) NULL DEFAULT NULL,
    `link_tw` VARCHAR(20) NULL DEFAULT NULL,
    `link_li` VARCHAR(20) NULL DEFAULT NULL,
    `link_md` VARCHAR(20) NULL DEFAULT NULL,
    `link_web` VARCHAR(50) NULL DEFAULT NULL,
    PRIMARY KEY (`link_id`),
    FOREIGN KEY (`link_uid`) REFERENCES `wow_user` (`user_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;';

$create_tbl .= 'CREATE TABLE IF NOT EXISTS `wow_post` (
    `post_id` BIGINT NOT NULL AUTO_INCREMENT,
    `post_uid` INT(10) NOT NULL,
    `post_title` VARCHAR(100) NOT NULL,
    `post_info` VARCHAR(512) NOT NULL,
    `post_archive` TINYINT(1) NOT NULL DEFAULT 1,
    `post_pending` TINYINT(1) NOT NULL DEFAULT 0,
    `post_price` INT(3) NOT NULL DEFAULT 0,
    `post_count` BIGINT NOT NULL DEFAULT 1,
    `post_promo` BIGINT NOT NULL DEFAULT 1,
    `post_like` BIGINT NOT NULL DEFAULT 0,
    `post_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`post_id`),
    FOREIGN KEY (`post_uid`) REFERENCES `wow_user` (`user_id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;';

$create_tbl .= 'CREATE TABLE IF NOT EXISTS `wow_source` (
    `source_id` INT(10) NOT NULL AUTO_INCREMENT,
    `source_pid` INT(10) NOT NULL UNIQUE,
    `source_url` VARCHAR(200) NULL DEFAULT NULL,
    `source_count` BIGINT NULL DEFAULT 0,
    `source_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`source_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;';

$create_tbl .= 'CREATE TABLE IF NOT EXISTS `wow_image` (
    `image_id` INT(10) NOT NULL AUTO_INCREMENT,
    `image_did` INT(10) NOT NULL,
    `image_type` VARCHAR(20) NOT NULL,
    `image_url` VARCHAR(200) NULL DEFAULT NULL,
    PRIMARY KEY (`image_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;';

$create_tbl .= 'CREATE TABLE IF NOT EXISTS `post_like` (
    `like_id` INT(10) NOT NULL AUTO_INCREMENT,
    `like_pid` INT(10) NOT NULL,
    `like_uid` INT(10) NOT NULL,
    `like_status` TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY (`like_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;';

$create_tbl .= 'CREATE TABLE IF NOT EXISTS `wow_data` (
    `data_name` VARCHAR(20),
    `data_value` BIGINT NOT NULL DEFAULT 1
) ENGINE = InnoDB DEFAULT CHARSET = utf8;';


$db->queryExec($create_tbl);

$db->close();

?>