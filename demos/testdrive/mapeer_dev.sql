# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.33-community
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2012-03-02 18:56:41
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping structure for table testdrive.action
DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `comment` text,
  `subject` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.action: ~6 rows (approximately)
DELETE FROM `action`;
/*!40000 ALTER TABLE `action` DISABLE KEYS */;
INSERT INTO `action` (`id`, `title`, `comment`, `subject`) VALUES
	(1, 'message_write', NULL, NULL),
	(2, 'message_receive', NULL, NULL),
	(3, 'user_create', NULL, NULL),
	(4, 'user_update', NULL, NULL),
	(5, 'user_remove', NULL, NULL),
	(6, 'user_admin', NULL, NULL);
/*!40000 ALTER TABLE `action` ENABLE KEYS */;


# Dumping structure for table testdrive.friendship
DROP TABLE IF EXISTS `friendship`;
CREATE TABLE IF NOT EXISTS `friendship` (
  `inviter_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `acknowledgetime` int(11) DEFAULT NULL,
  `requesttime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`inviter_id`,`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.friendship: ~0 rows (approximately)
DELETE FROM `friendship`;
/*!40000 ALTER TABLE `friendship` DISABLE KEYS */;
/*!40000 ALTER TABLE `friendship` ENABLE KEYS */;


# Dumping structure for table testdrive.membership
DROP TABLE IF EXISTS `membership`;
CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membership_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `end_date` int(11) DEFAULT NULL,
  `payment_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.membership: ~0 rows (approximately)
DELETE FROM `membership`;
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
/*!40000 ALTER TABLE `membership` ENABLE KEYS */;


# Dumping structure for table testdrive.message
DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` int(10) unsigned NOT NULL,
  `from_user_id` int(10) unsigned NOT NULL,
  `to_user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `message_read` tinyint(1) NOT NULL,
  `answered` tinyint(1) NOT NULL,
  `draft` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.message: ~0 rows (approximately)
DELETE FROM `message`;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;


# Dumping structure for table testdrive.payment
DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.payment: ~2 rows (approximately)
DELETE FROM `payment`;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` (`id`, `title`, `text`) VALUES
	(1, 'Prepayment', NULL),
	(2, 'Paypal', NULL);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;


# Dumping structure for table testdrive.permission
DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `principal_id` int(11) NOT NULL,
  `subordinate_id` int(11) NOT NULL DEFAULT '0',
  `type` enum('user','role') NOT NULL,
  `action` int(11) NOT NULL,
  `template` tinyint(1) NOT NULL,
  `comment` text,
  PRIMARY KEY (`principal_id`,`subordinate_id`,`type`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.permission: ~7 rows (approximately)
DELETE FROM `permission`;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` (`principal_id`, `subordinate_id`, `type`, `action`, `template`, `comment`) VALUES
	(1, 0, 'role', 4, 0, ''),
	(1, 0, 'role', 5, 0, ''),
	(1, 0, 'role', 6, 0, ''),
	(1, 0, 'role', 7, 0, ''),
	(2, 0, 'role', 1, 0, 'Users can write messages'),
	(2, 0, 'role', 2, 0, 'Users can receive messages'),
	(2, 0, 'role', 3, 0, 'Users are able to view visits of his profile');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;


# Dumping structure for table testdrive.privacy_setting
DROP TABLE IF EXISTS `privacy_setting`;
CREATE TABLE IF NOT EXISTS `privacy_setting` (
  `user_id` int(10) unsigned NOT NULL,
  `message_new_friendship` tinyint(1) NOT NULL DEFAULT '1',
  `message_new_message` tinyint(1) NOT NULL DEFAULT '1',
  `message_new_profilecomment` tinyint(1) NOT NULL DEFAULT '1',
  `appear_in_search` tinyint(1) NOT NULL DEFAULT '1',
  `show_online_status` tinyint(1) NOT NULL DEFAULT '1',
  `log_profile_visits` tinyint(1) NOT NULL DEFAULT '1',
  `ignore_users` varchar(255) DEFAULT NULL,
  `public_profile_fields` bigint(15) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.privacy_setting: ~3 rows (approximately)
DELETE FROM `privacy_setting`;
/*!40000 ALTER TABLE `privacy_setting` DISABLE KEYS */;
INSERT INTO `privacy_setting` (`user_id`, `message_new_friendship`, `message_new_message`, `message_new_profilecomment`, `appear_in_search`, `show_online_status`, `log_profile_visits`, `ignore_users`, `public_profile_fields`) VALUES
	(1, 1, 1, 1, 1, 1, 1, '', NULL),
	(2, 1, 1, 1, 1, 1, 1, NULL, NULL),
	(3, 1, 1, 1, 1, 1, 1, '', NULL);
/*!40000 ALTER TABLE `privacy_setting` ENABLE KEYS */;


# Dumping structure for table testdrive.profile
DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `privacy` enum('protected','private','public') NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `show_friends` tinyint(1) DEFAULT '1',
  `allow_comments` tinyint(1) DEFAULT '1',
  `email` varchar(255) NOT NULL DEFAULT '',
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.profile: ~2 rows (approximately)
DELETE FROM `profile`;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `user_id`, `timestamp`, `privacy`, `lastname`, `firstname`, `show_friends`, `allow_comments`, `email`, `street`, `city`, `about`) VALUES
	(1, 1, '2012-02-21 16:04:55', 'protected', 'admin', 'admin', 1, 1, 'webmaster@example.com', '', '', ''),
	(2, 2, '2012-02-21 16:04:55', 'protected', 'demo', 'demo', 1, 1, 'demo@example.com', NULL, NULL, NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;


# Dumping structure for table testdrive.profile_comment
DROP TABLE IF EXISTS `profile_comment`;
CREATE TABLE IF NOT EXISTS `profile_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.profile_comment: ~0 rows (approximately)
DELETE FROM `profile_comment`;
/*!40000 ALTER TABLE `profile_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_comment` ENABLE KEYS */;


# Dumping structure for table testdrive.profile_field
DROP TABLE IF EXISTS `profile_field`;
CREATE TABLE IF NOT EXISTS `profile_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `hint` text NOT NULL,
  `field_type` varchar(50) NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(255) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  `related_field_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.profile_field: ~6 rows (approximately)
DELETE FROM `profile_field`;
/*!40000 ALTER TABLE `profile_field` DISABLE KEYS */;
INSERT INTO `profile_field` (`id`, `varname`, `title`, `hint`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `position`, `visible`, `related_field_name`) VALUES
	(1, 'email', 'E-Mail', '', 'VARCHAR', 255, 0, 1, '', '', '', 'CEmailValidator', '', 0, 3, ''),
	(2, 'firstname', 'First name', '', 'VARCHAR', 255, 0, 1, '', '', '', '', '', 0, 3, ''),
	(3, 'lastname', 'Last name', '', 'VARCHAR', 255, 0, 1, '', '', '', '', '', 0, 3, ''),
	(4, 'street', 'Street', '', 'VARCHAR', 255, 0, 0, '', '', '', '', '', 0, 3, ''),
	(5, 'city', 'City', '', 'VARCHAR', 255, 0, 0, '', '', '', '', '', 0, 3, ''),
	(6, 'about', 'About', '', 'TEXT', 255, 0, 0, '', '', '', '', '', 0, 3, '');
/*!40000 ALTER TABLE `profile_field` ENABLE KEYS */;


# Dumping structure for table testdrive.profile_field_group
DROP TABLE IF EXISTS `profile_field_group`;
CREATE TABLE IF NOT EXISTS `profile_field_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.profile_field_group: ~0 rows (approximately)
DELETE FROM `profile_field_group`;
/*!40000 ALTER TABLE `profile_field_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_field_group` ENABLE KEYS */;


# Dumping structure for table testdrive.profile_visit
DROP TABLE IF EXISTS `profile_visit`;
CREATE TABLE IF NOT EXISTS `profile_visit` (
  `visitor_id` int(11) NOT NULL,
  `visited_id` int(11) NOT NULL,
  `timestamp_first_visit` int(11) NOT NULL,
  `timestamp_last_visit` int(11) NOT NULL,
  `num_of_visits` int(11) NOT NULL,
  PRIMARY KEY (`visitor_id`,`visited_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.profile_visit: ~1 rows (approximately)
DELETE FROM `profile_visit`;
/*!40000 ALTER TABLE `profile_visit` DISABLE KEYS */;
INSERT INTO `profile_visit` (`visitor_id`, `visited_id`, `timestamp_first_visit`, `timestamp_last_visit`, `num_of_visits`) VALUES
	(1, 3, 1329812641, 1329812676, 2);
/*!40000 ALTER TABLE `profile_visit` ENABLE KEYS */;


# Dumping structure for table testdrive.role
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_membership_possible` tinyint(1) NOT NULL DEFAULT '0',
  `price` double DEFAULT NULL COMMENT 'Price (when using membership module)',
  `duration` int(11) DEFAULT NULL COMMENT 'How long a membership is valid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.role: ~4 rows (approximately)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `title`, `description`, `is_membership_possible`, `price`, `duration`) VALUES
	(1, 'UserManager', 'This users can manage Users', 0, 0, 0),
	(2, 'Demo', 'Users having the demo role', 0, 0, 0),
	(3, 'Business', 'Example Business account', 0, 9.99, 7),
	(4, 'Premium', 'Example Premium account', 0, 19.99, 28);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


# Dumping structure for table testdrive.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` char(255) DEFAULT '0',
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.tbl_user: 22 rows
DELETE FROM `tbl_user`;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id`, `fb_id`, `username`, `password`, `email`) VALUES
	(1, '0', 'test1', 'pass1', 'test1@example.com'),
	(2, '0', 'test2', 'pass2', 'test2@example.com'),
	(3, '0', 'test3', 'pass3', 'test3@example.com'),
	(4, '0', 'test4', 'pass4', 'test4@example.com'),
	(5, '0', 'test5', 'pass5', 'test5@example.com'),
	(6, '0', 'test6', 'pass6', 'test6@example.com'),
	(7, '0', 'test7', 'pass7', 'test7@example.com'),
	(8, '0', 'test8', 'pass8', 'test8@example.com'),
	(9, '0', 'test9', 'pass9', 'test9@example.com'),
	(10, '0', 'test10', 'pass10', 'test10@example.com'),
	(11, '0', 'test11', 'pass11', 'test11@example.com'),
	(12, '0', 'test12', 'pass12', 'test12@example.com'),
	(13, '0', 'test13', 'pass13', 'test13@example.com'),
	(14, '0', 'test14', 'pass14', 'test14@example.com'),
	(15, '0', 'test15', 'pass15', 'test15@example.com'),
	(16, '0', 'test16', 'pass16', 'test16@example.com'),
	(17, '0', 'test17', 'pass17', 'test17@example.com'),
	(18, '0', 'test18', 'pass18', 'test18@example.com'),
	(19, '0', 'test19', 'pass19', 'test19@example.com'),
	(20, '0', 'test20', 'pass20', 'test20@example.com'),
	(21, '0', 'test21', 'pass21', 'test21@example.com'),
	(22, '0', 'brandon', '123456', 'kokweiong@gmail.com'),
	(23, '0', 'brandon@techsailor.com', 'brandon', 'brandon@techsailor.com');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;


# Dumping structure for table testdrive.translation
DROP TABLE IF EXISTS `translation`;
CREATE TABLE IF NOT EXISTS `translation` (
  `message` varbinary(255) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `language` varchar(5) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`message`,`language`,`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.translation: ~0 rows (approximately)
DELETE FROM `translation`;
/*!40000 ALTER TABLE `translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `translation` ENABLE KEYS */;


# Dumping structure for table testdrive.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `activationKey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `lastaction` int(10) NOT NULL DEFAULT '0',
  `lastpasswordchange` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `notifyType` enum('None','Digest','Instant','Threshold') DEFAULT 'Instant',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.user: ~3 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `activationKey`, `createtime`, `lastvisit`, `lastaction`, `lastpasswordchange`, `superuser`, `status`, `avatar`, `notifyType`) VALUES
	(1, 'admin', '7df09d22cc5c67e9cc6c4f89fd59701a', '', 1329811495, 1329900036, 0, 1329812883, 1, 1, NULL, 'Instant'),
	(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '', 1329811495, 0, 0, 0, 0, 1, NULL, 'Instant'),
	(3, 'crystal', '7df09d22cc5c67e9cc6c4f89fd59701a', '9ed7f81cb2d1796ce1b8bb1a7c4bc74b', 1329812525, 0, 0, 1329812525, 0, 1, NULL, 'Instant');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


# Dumping structure for table testdrive.user_group
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `participants` text,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.user_group: ~0 rows (approximately)
DELETE FROM `user_group`;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;


# Dumping structure for table testdrive.user_group_message
DROP TABLE IF EXISTS `user_group_message`;
CREATE TABLE IF NOT EXISTS `user_group_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `createtime` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.user_group_message: ~0 rows (approximately)
DELETE FROM `user_group_message`;
/*!40000 ALTER TABLE `user_group_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_group_message` ENABLE KEYS */;


# Dumping structure for table testdrive.user_role
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table testdrive.user_role: ~1 rows (approximately)
DELETE FROM `user_role`;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
	(2, 3);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
