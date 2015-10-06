--
-- Database: `babel-u-exams`
--

-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_categories`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ordering` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO  `#__babelu_exams_categories` ( `title`,`ordering`, `access`,`state` ) VALUES ('Uncategorised','1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_exams`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_exams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `notification_id` INT UNSIGNED NOT NULL,
  `ordering` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `level_filter_type` int(11) NOT NULL,
  `pass_per` int(11) NOT NULL,
  `retake_limit` int(11) NOT NULL,
  `retake_delay` int(11) NOT NULL,
  `savable` tinyint(3) NOT NULL,
  `show_chart` tinyint(3) NOT NULL,
  `grading_option` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `catid` int(11) NOT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

ALTER TABLE  `#__babelu_exams_exams` ADD  `can_take_from` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00';
ALTER TABLE  `#__babelu_exams_exams` ADD  `can_take_until` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00';
ALTER TABLE`#__babelu_exams_exams` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0' AFTER `id`;
ALTER TABLE  `#__babelu_exams_exams` ADD  `results_access` int(10) unsigned NOT NULL DEFAULT '0';
ALTER TABLE  `#__babelu_exams_exams` ADD  `display_option` VARCHAR( 255 ) NOT NULL DEFAULT  'default' AFTER  `grading_option`;
ALTER TABLE  `#__babelu_exams_exams` CHANGE  `access`  `access` INT( 10 ) UNSIGNED NOT NULL DEFAULT  '1';
ALTER TABLE  `#__babelu_exams_exams` CHANGE  `results_access`  `results_access` INT( 10 ) UNSIGNED NOT NULL DEFAULT  '1';

-- --------------------------------------------------------

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

-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_groups`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `#__babelu_exams_groups` (`id`, `checked_out`, `checked_out_time`, `title`) VALUES
(1, 0, '0000-00-00 00:00:00', 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_problems`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_problems` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `problem_text` mediumtext NOT NULL,
  `answers` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `point_value` int(11) NOT NULL DEFAULT '0',
  `result_text` mediumtext NOT NULL,
  `group_id` int(11) NOT NULL,
  `ordering` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


ALTER TABLE  `#__babelu_exams_problems` ADD  `standard` VARCHAR( 255 ) NOT NULL;
ALTER TABLE  `#__babelu_exams_problems` CHANGE  `standard`  `standard` VARCHAR( 255 ) NOT NULL DEFAULT 'No standard';
ALTER TABLE  `#__babelu_exams_problems` ADD  `default_input_type` INT NOT NULL DEFAULT  '0' AFTER  `options`;
-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_levels`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE  `#__babelu_exams_levels` ADD  `checked_out` INT UNSIGNED NOT NULL;
ALTER TABLE  `#__babelu_exams_levels` ADD  `checked_out_time` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00';
ALTER TABLE  `#__babelu_exams_levels` ADD  `ordering` INT UNSIGNED NOT NULL AFTER  `description`;
-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_results`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_results` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `exam_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `creation_date` datetime NOT NULL,
  `time_spent` int(11) NOT NULL,
  `point_grade` int(11) NOT NULL,
  `percentage_grade` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_r_response`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_r_response` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned NOT NULL,
  `section_id` int(11) unsigned NOT NULL,
  `problem_id` int(11) unsigned NOT NULL,
  `user_response` mediumtext NOT NULL,
  `comment` mediumtext NOT NULL,
  `status` TINYINT UNSIGNED NOT NULL DEFAULT  '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `section_id` (`section_id`),
  KEY `problem_id` (`problem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

ALTER TABLE  `#__babelu_exams_r_response` ADD  `marked` BOOLEAN NOT NULL DEFAULT FALSE AFTER  `status`;

-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_saves`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_saves` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `time_spent` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_sections`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_sections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ordering` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `exam_id` int(11) NOT NULL,
  `input_type` int(11) NOT NULL,
  `problem_count` int(11) NOT NULL,
  `randomize` tinyint(4) NOT NULL,
  `default_point_value` int(11) NOT NULL,
  `max_options` int(11) NOT NULL,
  `result_text` mediumtext NOT NULL,
  `group_id` int(11) NOT NULL,
  `case_sensitivity` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


ALTER TABLE  `#__babelu_exams_sections` ADD  `level` INT UNSIGNED NOT NULL; 
ALTER TABLE  `#__babelu_exams_sections` ADD  `level_filter_type` INT NOT NULL;
ALTER TABLE  `#__babelu_exams_sections` ADD  `use_problem_types` TINYINT NOT NULL DEFAULT  '0' AFTER  `input_type`;
-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_s_response`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_s_response` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned NOT NULL,
  `section_id` int(11) unsigned NOT NULL,
  `problem_id` int(11) unsigned NOT NULL,
  `user_response` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `section_id` (`section_id`),
  KEY `problem_id` (`problem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

ALTER TABLE  `#__babelu_exams_s_response` ADD  `marked` BOOLEAN NOT NULL DEFAULT FALSE AFTER  `user_response`;
-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_notification_profiles`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_notification_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_to_notify` int(10) unsigned NOT NULL,
  `admin_msg_id` int(10) unsigned NOT NULL,
  `user_msg_id` int(10) unsigned NOT NULL,
  `notify_admin_manual` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `notify_admin_automatic` tinyint(4) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `notify_user_automatic` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `title` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_notification_messages`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_notification_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `msg_subject` varchar(90) NOT NULL,
  `msg_body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE  `#__babelu_exams_notification_messages` ADD  `title` VARCHAR( 90 ) NOT NULL;
ALTER TABLE  `#__babelu_exams_notification_messages` ADD  `checked_out` INT UNSIGNED NOT NULL;
ALTER TABLE  `#__babelu_exams_notification_messages` ADD  `checked_out_time` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00';
ALTER TABLE  `#__babelu_exams_exams` ADD  `multisave` TINYINT UNSIGNED NOT NULL DEFAULT  '0';
ALTER TABLE  `#__babelu_exams_notification_profiles` ADD  `comment_msg_id` INT UNSIGNED NOT NULL AFTER  `user_msg_id`;

ALTER TABLE  `#__babelu_exams_problems` CHANGE  `answers`  `answers` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE  `#__babelu_exams_problems` CHANGE  `options`  `options` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

INSERT INTO `#__babelu_exams_notification_messages` (`id`, `msg_subject`, `msg_body`, `title`, `checked_out`, `checked_out_time`) VALUES
(1, 'Exam has been submitted', '<p>{examinee_name} submitted an exam.</p>\r\n<table><caption>Status Summary</caption>\r\n<tbody>\r\n<tr><th>Exam Title</th>\r\n<td>{exam_title}</td>\r\n</tr>\r\n<tr><th>Examinee</th>\r\n<td>{examinee_name}</td>\r\n</tr>\r\n<tr><th>Submitted on</th>\r\n<td>{submission_date}</td>\r\n</tr>\r\n<tr><th>Exam Time</th>\r\n<td>{time_spent}</td>\r\n</tr>\r\n<tr><th>Points Earned</th>\r\n<td>{exam_point_grade}</td>\r\n</tr>\r\n<tr><th>Pass Line</th>\r\n<td>{pass_line}</td>\r\n</tr>\r\n<tr><th>Percentage Grade</th>\r\n<td>{percentage_grade}</td>\r\n</tr>\r\n<tr><th>Result</th>\r\n<td>{exam_result}</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Default Administrator', 0, '0000-00-00 00:00:00'),
(2, 'Your exam results are available', '<p>Dear {examinee_name},</p>\r\n<p>Your exam has been graded. You can view the summary below or visit the site to review your results.</p>\r\n<table><caption>Result Summary</caption>\r\n<tbody>\r\n<tr><th>Exam Title</th>\r\n<td>{exam_title}</td>\r\n</tr>\r\n<tr><th>Submitted on</th>\r\n<td>{submission_date}</td>\r\n</tr>\r\n<tr><th>Exam Time</th>\r\n<td>{time_spent}</td>\r\n</tr>\r\n<tr><th>Points Earned</th>\r\n<td>{exam_point_grade}</td>\r\n</tr>\r\n<tr><th>Percentage Grade</th>\r\n<td>{percentage_grade}</td>\r\n</tr>\r\n<tr><th>Result</th>\r\n<td>{exam_result}</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Default User Grading', 0, '0000-00-00 00:00:00'),
(3, 'Your exam results are available', '<p>Dear {examinee_name},</p>\r\n<p>This is to inform you that comments have been added to the results for {exam_title} submitted on {submission_date}. </p>\r\n<p>You can view the new comments by visiting the link below</p>\r\n<p>{result_link}</p>\r\n<p> </p>', 'Default User Comment', 0, '0000-00-00 00:00:00');

INSERT INTO `#__babelu_exams_notification_profiles` (`id`, `admin_to_notify`, `admin_msg_id`, `user_msg_id`, `comment_msg_id`, `notify_admin_manual`, `notify_admin_automatic`, `checked_out`, `checked_out_time`, `notify_user_automatic`, `title`) VALUES
(1, 0, 1, 2, 3, 0, 0, 0, '0000-00-00 00:00:00', 0, 'Default Profile');