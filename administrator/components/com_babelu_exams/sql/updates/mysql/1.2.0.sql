--
-- Table structure for table `#__babelu_exams_exam_states`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_exam_states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `attempts` int(10) unsigned NOT NULL,
  `retakable_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE  `#__babelu_exams_problems` ADD `ordering` int(10) unsigned NOT NULL;

ALTER TABLE  `#__babelu_exams_sections` ADD  `randomize` tinyint(4) NOT NULL;
ALTER TABLE  `#__babelu_exams_sections` ADD  `case_sensitivity` tinyint(3) unsigned NOT NULL DEFAULT '1';