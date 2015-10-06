ALTER TABLE  `#__babelu_exams_exams` ADD  `level_filter_type` INT( 11 ) UNSIGNED NOT NULL AFTER  `level`;
ALTER TABLE  `#__babelu_exams_exams` ADD  `catid` INT( 11 ) NOT NULL;
ALTER TABLE  `#__babelu_exams_exams` DROP  `hits`;
ALTER TABLE  `#__babelu_exams_exams` CHANGE  `tracking`  `tracking` TINYINT(3)  NOT NULL;

ALTER TABLE  `#__babelu_exams_sections` CHANGE  `point_value`  `default_point_value` INT( 11 ) UNSIGNED NOT NULL;
ALTER TABLE  `#__babelu_exams_sections` DROP  `link`;
ALTER TABLE  `#__babelu_exams_sections` ADD  `max_options` INT(11) NOT NULL;
ALTER TABLE  `#__babelu_exams_sections` ADD  `result_text` TEXT(65535)  NOT NULL;

ALTER TABLE  `#__babelu_exams_problems` ADD `state` TINYINT(1)  NOT NULL DEFAULT '1';
ALTER TABLE  `#__babelu_exams_problems` CHANGE  `recap_text`  `result_text` TEXT(65535)  NOT NULL;
ALTER TABLE  `#__babelu_exams_problems` CHANGE  `choice_code`  `options` VARCHAR(255)  NOT NULL;
ALTER TABLE  `#__babelu_exams_problems` CHANGE  `answer`  `answers` VARCHAR(255)  NOT NULL;

ALTER TABLE  `#__babelu_exams_results` ADD `checked_out` INT(11)  NOT NULL;
ALTER TABLE  `#__babelu_exams_results` ADD `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00';
ALTER TABLE  `#__babelu_exams_results` ADD `exam_title` VARCHAR(255)  NOT NULL;
ALTER TABLE  `#__babelu_exams_results` ADD `status` TINYINT(1) NOT NULL DEFAULT '0';
ALTER TABLE  `#__babelu_exams_results` DROP  `retake_counter`;
ALTER TABLE  `#__babelu_exams_results` DROP  `p_possible`;
ALTER TABLE  `#__babelu_exams_results` CHANGE  `p_earned`  `point_grade` INT(11)  NOT NULL;
ALTER TABLE  `#__babelu_exams_results` CHANGE  `p_cent`  `percentage_grade` INT(11)  NOT NULL;

ALTER TABLE  `#__babelu_exams_r_response` ADD `comment` TEXT(65535)  NOT NULL;
ALTER TABLE  `#__babelu_exams_r_response` CHANGE  `sec_id`  `section_id` INT(11) UNSIGNED  NOT NULL;
ALTER TABLE  `#__babelu_exams_r_response` CHANGE  `p_id`  `problem_id` INT(11) UNSIGNED  NOT NULL;
ALTER TABLE  `#__babelu_exams_r_response` CHANGE  `rid`  `result_id` INT(11) UNSIGNED NOT NULL;
ALTER TABLE  `#__babelu_exams_r_response` CHANGE  `user_response`  `user_response` TEXT(65535)  NOT NULL;

ALTER TABLE  `#__babelu_exams_saves` CHANGE  `time_remaining`  `time_spent` INT(11)  NOT NULL;

ALTER TABLE  `#__babelu_exams_s_response` CHANGE  `sec_id`  `section_id` INT(11) UNSIGNED NOT NULL;
ALTER TABLE  `#__babelu_exams_s_response` CHANGE  `p_id`  `problem_id` INT(11) UNSIGNED NOT NULL;
ALTER TABLE  `#__babelu_exams_s_response` CHANGE  `sid`  `save_id` INT(11) UNSIGNED NOT NULL;
ALTER TABLE  `#__babelu_exams_s_response` CHANGE  `user_response`  `user_response` TEXT(65535)  NOT NULL;
DROP TABLE IF EXISTS `#__babelu_exams_performance`;