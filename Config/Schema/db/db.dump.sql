
DROP TABLE IF EXISTS `attendances`;

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `course_id` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `hardware_used` enum('nfc','barcode','wifi') DEFAULT NULL,
  `number_registered` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `attendances` */

insert  into `attendances`(`id`,`user_id`,`class_id`,`course_id`,`status`,`date`,`time`,`hardware_used`,`number_registered`,`created`,`modified`) values (15,2,2,'2','1','2014-02-20','11:12:00','barcode',NULL,'2014-03-06 12:42:17','2014-03-06 12:42:17');
insert  into `attendances`(`id`,`user_id`,`class_id`,`course_id`,`status`,`date`,`time`,`hardware_used`,`number_registered`,`created`,`modified`) values (16,2,2,'2','1','2014-02-27','12:44:00','wifi',NULL,'2014-03-06 12:44:26','2014-03-06 12:45:01');

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(20) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `course` */

insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (1,'COMP33512','User Experience','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (2,'COMP33812','Software Evolution','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (3,'COMP35112','Chip Multiprocessor','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (4,'COMP38120','Documents,Data and Services on the Web','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (5,'COMP36512','Compilers','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (6,'COMP34512','Knowledge Representation and Reasoning','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (7,'COMP36212','Advanced Algorithms ','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (8,'COMP37212','Computer Vision','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (9,'COMP31212','Concurrency and Process Algebra','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (10,'COMP32212','Implementing System-on-Chip Designs','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `course`(`id`,`course_id`,`course_name`,`created`,`modified`) values (11,'MCEL30032','Managing Finance in Enterprises for Computer ','2014-03-04 18:00:06','2014-03-04 18:00:06');

/*Table structure for table `courses_teachers` */

DROP TABLE IF EXISTS `courses_teachers`;

CREATE TABLE `courses_teachers` (
  `course_teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Teacher''s ID',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`course_teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `courses_teachers` */

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `groups` */

/*Table structure for table `student_classes` */

DROP TABLE IF EXISTS `student_classes`;

CREATE TABLE `student_classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(11) NOT NULL,
  `room` varchar(10) NOT NULL,
  `day_of_week` varchar(20) NOT NULL,
  `frequency` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `repeat` int(2) DEFAULT '7',
  `group` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `student_classes` */

insert  into `student_classes`(`class_id`,`course_id`,`room`,`day_of_week`,`frequency`,`start_date`,`start_time`,`end_time`,`repeat`,`group`,`created`,`modified`) values (1,'1','IT 407','Thursday','Every week','2014-02-10','08:00:00','11:00:00',NULL,'','2014-03-04 18:40:59','2014-03-06 09:19:50');
insert  into `student_classes`(`class_id`,`course_id`,`room`,`day_of_week`,`frequency`,`start_date`,`start_time`,`end_time`,`repeat`,`group`,`created`,`modified`) values (2,'2','','Thursday','Every week','2014-02-05','12:00:00','01:00:00',NULL,'','2014-03-04 18:41:58','2014-03-04 18:41:58');
insert  into `student_classes`(`class_id`,`course_id`,`room`,`day_of_week`,`frequency`,`start_date`,`start_time`,`end_time`,`repeat`,`group`,`created`,`modified`) values (3,'3','test','Monday','Every alternate week','2014-03-03','14:00:00','15:00:00',NULL,'','2014-03-05 11:45:16','2014-03-05 12:08:38');

/*Table structure for table `teacher_classes` */

DROP TABLE IF EXISTS `teacher_classes`;

CREATE TABLE `teacher_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `teacher_classes` */

insert  into `teacher_classes`(`id`,`user_id`,`class_id`,`created`,`modified`) values (4,12,2,'2014-03-04 19:09:26','2014-03-04 19:09:26');

/*Table structure for table `user_courses` */

DROP TABLE IF EXISTS `user_courses`;

CREATE TABLE `user_courses` (
  `user_courses_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`user_courses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_courses` */

insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (1,2,'1','','2014-03-04 18:10:53','2014-03-04 18:10:53');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (2,2,'2',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (3,2,'3',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (4,2,'11',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (5,3,'3',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (6,3,'5',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (7,3,'9',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (8,3,'10',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (9,4,'3',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (10,4,'5',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (11,4,'9',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (12,4,'10',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (13,5,'1',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (14,5,'2',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (15,5,'4',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (16,5,'5',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (17,6,'4',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (18,6,'5',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (19,6,'6',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (20,6,'9',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (21,7,'4',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (22,7,'6',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (23,7,'7',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (24,7,'8',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (25,8,'1',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (26,8,'2',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (27,8,'3',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (28,8,'6',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (29,9,'3',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (30,9,'6',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (31,9,'7',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (32,9,'10',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (33,10,'1',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (34,10,'4',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (35,10,'5',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (36,10,'8',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (37,11,'1',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (38,11,'2',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (39,11,'4',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (40,11,'11',NULL,NULL,NULL);
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (41,12,'2',NULL,'2014-03-04 18:16:28','2014-03-04 18:16:28');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (42,13,'3',NULL,'2014-03-04 18:16:53','2014-03-04 18:16:53');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (43,14,'1',NULL,'2014-03-04 18:17:21','2014-03-04 18:17:21');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (44,15,'8',NULL,'2014-03-04 18:17:43','2014-03-04 18:17:43');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (45,16,'10',NULL,'2014-03-04 18:18:11','2014-03-04 18:18:11');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (46,17,'9',NULL,'2014-03-04 18:18:22','2014-03-04 18:18:22');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (47,18,'6',NULL,'2014-03-04 18:18:30','2014-03-04 18:18:30');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (48,19,'5',NULL,'2014-03-04 18:18:43','2014-03-04 18:18:43');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (49,20,'4',NULL,'2014-03-04 18:18:58','2014-03-04 18:18:58');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (50,21,'7',NULL,'2014-03-04 18:19:09','2014-03-04 18:19:09');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (51,22,'11',NULL,'2014-03-04 18:19:19','2014-03-04 18:19:19');
insert  into `user_courses`(`user_courses_id`,`user_id`,`course_id`,`group`,`created`,`modified`) values (52,23,'4',NULL,'2014-03-04 18:19:42','2014-03-04 18:19:42');

/*Table structure for table `user_tags` */

DROP TABLE IF EXISTS `user_tags`;

CREATE TABLE `user_tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tag` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tag_type` enum('nfc','barcode','','') COLLATE utf8_unicode_ci NOT NULL,
  `in_use` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_tags` */

insert  into `user_tags`(`tag_id`,`user_id`,`tag`,`tag_type`,`in_use`,`created`,`modified`) values (7,2,'test123','nfc',1,'2014-03-05 19:49:06','2014-03-05 19:49:06');
insert  into `user_tags`(`tag_id`,`user_id`,`tag`,`tag_type`,`in_use`,`created`,`modified`) values (8,2,'nepal','barcode',1,'2014-03-05 19:49:57','2014-03-05 19:52:04');
insert  into `user_tags`(`tag_id`,`user_id`,`tag`,`tag_type`,`in_use`,`created`,`modified`) values (10,2,'100010010','nfc',1,'2014-03-06 08:42:19','2014-03-06 08:42:19');
insert  into `user_tags`(`tag_id`,`user_id`,`tag`,`tag_type`,`in_use`,`created`,`modified`) values (11,3,'200010010','nfc',1,'2014-03-06 08:42:54','2014-03-06 08:42:54');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` int(11) DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` enum('Student','Teacher','Admin','') COLLATE utf8_unicode_ci DEFAULT 'Student' COMMENT 'Student/Teacher/Admin',
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (1,9080100,'dd00101a6962b75767b23429f64fa765','Admin','Superuser','-','admin@dummyemail.com','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (2,7841760,'dd00101a6962b75767b23429f64fa765','Student','Nastasia','Mirani','nastasia.mirani@gmail.com','2014-03-04 18:00:06','2014-03-05 11:29:16');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (3,7854312,'dd00101a6962b75767b23429f64fa765','Student','Prakhar','Bahuguna','r3loaded@gmail.com','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (4,7842376,'dd00101a6962b75767b23429f64fa765','Student','Neha','Agarwal','neha@hotmail.com','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (5,7762381,'dd00101a6962b75767b23429f64fa765','Student','Ivan','Blaus','ivanb@hotmail.com','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (6,7842398,'dd00101a6962b75767b23429f64fa765','Student','Anthony','Tham','anthonytham@gmail.com','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (7,7632116,'dd00101a6962b75767b23429f64fa765','Student','Bogdan','Avram','avramb@gmail.com','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (8,7932158,'dd00101a6962b75767b23429f64fa765','Student','Tom','Acey','thomas_acey@hotmail.com','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (9,7454531,'dd00101a6962b75767b23429f64fa765','Student','Muj','Zaidi','mujz@yahoo.com','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (10,7759210,'dd00101a6962b75767b23429f64fa765','Student','Shreenal','Badiani','shreenalbadiani@hotmail.com','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (11,7988632,'dd00101a6962b75767b23429f64fa765','Student','Krish','Joshi','krish.k.joshi@gmail.com','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (12,8949304,'dd00101a6962b75767b23429f64fa765','Teacher','Andy','Carpenter','andycarperntar@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (13,8949305,'dd00101a6962b75767b23429f64fa765','Teacher','John','Gurd','johngurd@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (14,8949306,'dd00101a6962b75767b23429f64fa765','Teacher','Simon','Harper','simonharper@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (15,8949307,'dd00101a6962b75767b23429f64fa765','Teacher','Aphrodite','Galata','aphroditegalata@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (16,8949308,'dd00101a6962b75767b23429f64fa765','Teacher','Jim','Garside','jimgarside@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (17,8949309,'dd00101a6962b75767b23429f64fa765','Teacher','David','Rydeheard','davidr@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (18,8949310,'dd00101a6962b75767b23429f64fa765','Teacher','Sebestian','Brandt','sebrandt@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (19,8949311,'dd00101a6962b75767b23429f64fa765','Teacher','Rizos','Sakellariou','rizossak@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (20,8949312,'dd00101a6962b75767b23429f64fa765','Teacher','Sandra','Sampaio','sandrasampaio@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (21,8949313,'dd00101a6962b75767b23429f64fa765','Teacher','Milan','Mihajlovic','milanm@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (22,8949314,'dd00101a6962b75767b23429f64fa765','Teacher','Eva','Lopez','evalopez@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');
insert  into `users`(`id`,`username`,`password`,`user_type`,`first_name`,`last_name`,`email`,`created`,`modified`) values (23,8949315,'dd00101a6962b75767b23429f64fa765','Teacher','Jock','McNaught','jockmcn@cs.man.ac.uk','2014-03-04 18:00:06','2014-03-04 18:00:06');

