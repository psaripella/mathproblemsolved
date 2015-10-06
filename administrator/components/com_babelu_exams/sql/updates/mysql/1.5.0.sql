ALTER TABLE  `#__babelu_exams_exams` CHANGE  `tracking`  `show_chart` TINYINT( 3 ) NOT NULL;

ALTER TABLE  `#__babelu_exams_exams` ADD  `notification_id` INT UNSIGNED NOT NULL;

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