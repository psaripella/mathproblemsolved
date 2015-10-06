ALTER TABLE  `#__babelu_exams_r_response` CHANGE  `result_id`  `parent_id` INT( 11 ) UNSIGNED NOT NULL;
ALTER TABLE  `#__babelu_exams_s_response` CHANGE  `save_id`  `parent_id` INT( 11 ) UNSIGNED NOT NULL;

ALTER TABLE  `#__babelu_exams_results` CHANGE  `result_date`  `creation_date` DATETIME NOT NULL;
ALTER TABLE `#__babelu_exams_results` DROP `exam_title`;
ALTER TABLE  `#__babelu_exams_saves` CHANGE  `save_date`  `creation_date` DATETIME NOT NULL;

ALTER TABLE  `#__babelu_exams_s_response` ADD INDEX (  `parent_id` );
ALTER TABLE  `#__babelu_exams_s_response` ADD INDEX (  `section_id` );
ALTER TABLE  `#__babelu_exams_s_response` ADD INDEX (  `problem_id` );

ALTER TABLE  `#__babelu_exams_r_response` ADD INDEX (  `parent_id` );
ALTER TABLE  `#__babelu_exams_r_response` ADD INDEX (  `section_id` );
ALTER TABLE  `#__babelu_exams_r_response` ADD INDEX (  `problem_id` );

ALTER TABLE  `#__babelu_exams_results` ADD INDEX (  `exam_id` );
ALTER TABLE  `#__babelu_exams_results` ADD INDEX (  `user_id` );

ALTER TABLE  `#__babelu_exams_saves` ADD INDEX (  `exam_id` );
ALTER TABLE  `#__babelu_exams_saves` ADD INDEX (  `user_id` );

ALTER TABLE  `#__babelu_exams_problems` ADD INDEX (  `group_id` );

ALTER TABLE  `#__babelu_exams_sections` ADD INDEX (  `exam_id` );

ALTER TABLE  `#__babelu_exams_exams` ADD INDEX (  `catid` );

ALTER TABLE  `#__babelu_exams_exams` ADD  `access` INT UNSIGNED NOT NULL DEFAULT  '0' AFTER  `catid`;