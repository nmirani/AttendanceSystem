DROP TABLE IF EXISTS `nastasia_attendances`;

CREATE TABLE `nastasia_attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hardware_used` enum('nfc','barcode','','') NOT NULL,
  `number_registered` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nastasia_attendances` */

/*Table structure for table `nastasia_classes` */

DROP TABLE IF EXISTS `nastasia_classes`;

CREATE TABLE `nastasia_classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(11) NOT NULL,
  `room` varchar(10) NOT NULL,
  `day_of_week` varchar(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `repeat` int(2) NOT NULL DEFAULT '7',
  `group` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nastasia_classes` */

/*Table structure for table `nastasia_course` */

DROP TABLE IF EXISTS `nastasia_course`;

CREATE TABLE `nastasia_course` (
  `course_id` varchar(20) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nastasia_course` */

insert  into `nastasia_course`(`course_id`,`course_name`,`created`,`modified`) values ('COMP33512','User Experience','0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `nastasia_course`(`course_id`,`course_name`,`created`,`modified`) values ('COMP33812','Software Evolution','0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `nastasia_course`(`course_id`,`course_name`,`created`,`modified`) values ('COMP38120','Documents, Services and Data on the Web','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `nastasia_courses_teachers` */

DROP TABLE IF EXISTS `nastasia_courses_teachers`;

CREATE TABLE `nastasia_courses_teachers` (
  `course_teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Teacher''s ID',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`course_teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nastasia_courses_teachers` */

insert  into `nastasia_courses_teachers`(`course_teacher_id`,`course_id`,`user_id`,`created`,`modified`) values (1,'COMP22712',8243667,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `nastasia_event_types` */

DROP TABLE IF EXISTS `nastasia_event_types`;

CREATE TABLE `nastasia_event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nastasia_event_types` */

insert  into `nastasia_event_types`(`id`,`name`,`color`,`created`,`modified`) values (1,'Lecture','Blue','0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `nastasia_event_types`(`id`,`name`,`color`,`created`,`modified`) values (2,'Labs','Purple','0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `nastasia_event_types`(`id`,`name`,`color`,`created`,`modified`) values (3,'Seminar','Yellow','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `nastasia_events` */

DROP TABLE IF EXISTS `nastasia_events`;

CREATE TABLE `nastasia_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `all_day` tinyint(1) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `editable` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nastasia_events` */

insert  into `nastasia_events`(`id`,`event_type_id`,`title`,`details`,`all_day`,`start`,`end`,`editable`,`created`,`modified`,`status`) values (1,0,'Chip Multiprocessors','',0,'2014-02-19 13:00:00','2014-02-19 15:00:00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','');
insert  into `nastasia_events`(`id`,`event_type_id`,`title`,`details`,`all_day`,`start`,`end`,`editable`,`created`,`modified`,`status`) values (2,2,'Documents,Data and Services of Web','',1,'2014-02-21 00:13:00','2014-02-21 00:15:00',0,'0000-00-00 00:00:00','2014-02-21 18:47:20','Scheduled');
insert  into `nastasia_events`(`id`,`event_type_id`,`title`,`details`,`all_day`,`start`,`end`,`editable`,`created`,`modified`,`status`) values (3,0,'Microcontrollers','',0,'2014-02-16 11:00:00','2014-02-16 12:00:00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','');
insert  into `nastasia_events`(`id`,`event_type_id`,`title`,`details`,`all_day`,`start`,`end`,`editable`,`created`,`modified`,`status`) values (4,0,'Third Year Project','',0,'2014-03-19 14:00:00','2014-03-19 16:00:00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','');
insert  into `nastasia_events`(`id`,`event_type_id`,`title`,`details`,`all_day`,`start`,`end`,`editable`,`created`,`modified`,`status`) values (5,1,'Third Year Project','',1,'2014-02-21 18:24:00','2014-02-21 18:24:00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','');
insert  into `nastasia_events`(`id`,`event_type_id`,`title`,`details`,`all_day`,`start`,`end`,`editable`,`created`,`modified`,`status`) values (6,0,'Dero','',0,'2014-02-21 18:31:00','2014-02-21 18:31:00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','');

/*Table structure for table `nastasia_groups` */

DROP TABLE IF EXISTS `nastasia_groups`;

CREATE TABLE `nastasia_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nastasia_groups` */

/*Table structure for table `nastasia_student_classes` */

DROP TABLE IF EXISTS `nastasia_student_classes`;

CREATE TABLE `nastasia_student_classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(11) NOT NULL,
  `room` varchar(10) NOT NULL,
  `day_of_week` varchar(20) NOT NULL,
  `frequency` varchar(50) DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `repeat` int(2) NOT NULL DEFAULT '7',
  `group` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `nastasia_student_classes` */

insert  into `nastasia_student_classes`(`class_id`,`course_id`,`room`,`day_of_week`,`frequency`,`start_time`,`end_time`,`repeat`,`group`,`created`,`modified`) values (1,'COMP38120','1.2','Sunday','Every week','11:12:00','11:16:00',7,'#test1','2014-03-04 14:46:07','2014-03-04 14:50:04');
insert  into `nastasia_student_classes`(`class_id`,`course_id`,`room`,`day_of_week`,`frequency`,`start_time`,`end_time`,`repeat`,`group`,`created`,`modified`) values (2,'COMP33512','2.4','Tuesday','Every alternate week','15:02:00','04:06:00',7,'test2','2014-03-04 15:12:18','2014-03-04 15:12:18');

/*Table structure for table `nastasia_student_classes.old` */

DROP TABLE IF EXISTS `nastasia_student_classes.old`;

CREATE TABLE `nastasia_student_classes.old` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(11) NOT NULL,
  `room` varchar(10) NOT NULL,
  `start_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `repeat` int(2) NOT NULL DEFAULT '7',
  `group` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38122 DEFAULT CHARSET=latin1;

/*Data for the table `nastasia_student_classes.old` */

insert  into `nastasia_student_classes.old`(`class_id`,`course_id`,`room`,`start_date_time`,`end_time`,`repeat`,`group`,`created`,`modified`) values (23420,'COMP23420','1.3','2014-02-17 15:00:00','2014-02-17 17:00:00',7,'X','0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `nastasia_student_classes.old`(`class_id`,`course_id`,`room`,`start_date_time`,`end_time`,`repeat`,`group`,`created`,`modified`) values (33512,'COMP33512 ','1.4','2014-02-19 10:00:00','2014-02-19 12:00:00',7,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `nastasia_student_classes.old`(`class_id`,`course_id`,`room`,`start_date_time`,`end_time`,`repeat`,`group`,`created`,`modified`) values (33812,'COMP33812','1.1','2014-02-18 13:00:00','2014-02-18 14:00:00',7,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `nastasia_student_classes.old`(`class_id`,`course_id`,`room`,`start_date_time`,`end_time`,`repeat`,`group`,`created`,`modified`) values (38120,'COMP38120','Collab','2014-02-21 13:00:00','2014-02-21 15:00:00',7,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `nastasia_student_classes.old`(`class_id`,`course_id`,`room`,`start_date_time`,`end_time`,`repeat`,`group`,`created`,`modified`) values (38121,'COMP23420','Tootil 1','2014-07-21 20:53:00','2014-02-21 21:53:00',7,'','2014-02-21 21:53:59','2014-02-21 21:53:59');

/*Table structure for table `nastasia_user_courses` */

DROP TABLE IF EXISTS `nastasia_user_courses`;

CREATE TABLE `nastasia_user_courses` (
  `user_courses_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`user_courses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nastasia_user_courses` */

insert  into `nastasia_user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (14,3,'COMP33512','','2014-03-03 21:37:27','2014-03-03 21:37:27');
insert  into `nastasia_user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (15,3,'COMP33812','','2014-03-03 21:37:55','2014-03-03 21:37:55');
insert  into `nastasia_user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (16,2,'COMP38120','','2014-03-04 13:16:08','2014-03-04 13:16:08');
insert  into `nastasia_user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (17,7,'COMP38120','','2014-03-04 13:16:25','2014-03-04 13:16:25');
insert  into `nastasia_user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (18,2,'COMP33512','','2014-03-04 14:08:13','2014-03-04 14:08:13');

/*Table structure for table `nastasia_user_tags` */

DROP TABLE IF EXISTS `nastasia_user_tags`;

CREATE TABLE `nastasia_user_tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tag` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tag_type` enum('nfc','barcode','','') COLLATE utf8_unicode_ci NOT NULL,
  `in_use` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nastasia_user_tags` */

insert  into `nastasia_user_tags`(`tag_id`,`user_id`,`tag`,`tag_type`,`in_use`,`created`,`modified`) values (1,8243654,'047d1a02592','nfc',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `nastasia_user_tags`(`tag_id`,`user_id`,`tag`,`tag_type`,`in_use`,`created`,`modified`) values (2,8243654,'8243654','barcode',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `nastasia_users` */

DROP TABLE IF EXISTS `nastasia_users`;

CREATE TABLE `nastasia_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` int(11) NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('Student','Teacher','Admin','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Student' COMMENT 'Student/Teacher/Admin',
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nastasia_users` */

insert  into `nastasia_users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (1,1111111,'dd00101a6962b75767b23429f64fa765','Admin','Nastasia','Mirani','nastasia.mirani@gmail.com','0000-00-00 00:00:00','2014-02-28 18:33:46');
insert  into `nastasia_users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (2,2222222,'dd00101a6962b75767b23429f64fa765','Student','Jim','Garside','jgarside@manchester.ac.uk','0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `nastasia_users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (3,3333333,'dd00101a6962b75767b23429f64fa765','Teacher','Krish','Joshi','tuffleo@gmail.com','2014-02-23 21:00:00','0000-00-00 00:00:00');
insert  into `nastasia_users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (5,123456,'45f1a4b4a2f6bdfa31838a823064389f','Admin','admin','amdin','admin@admin.com','2014-03-02 12:23:32','2014-03-02 12:24:09');
insert  into `nastasia_users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (7,1234,'dd00101a6962b75767b23429f64fa765','Student','test','test00','test@test.com','2014-03-03 20:56:48','2014-03-03 20:56:48');
