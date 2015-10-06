ALTER TABLE  `#__babelu_exams_problems` ADD  `default_input_type` INT NOT NULL DEFAULT  '0' AFTER  `options`;
ALTER TABLE  `#__babelu_exams_sections` ADD  `use_problem_types` TINYINT NOT NULL DEFAULT  '0' AFTER  `input_type`;

ALTER TABLE  `#__babelu_exams_r_response` ADD  `marked` BOOLEAN NOT NULL DEFAULT FALSE AFTER  `status`;
ALTER TABLE  `#__babelu_exams_s_response` ADD  `marked` BOOLEAN NOT NULL DEFAULT FALSE AFTER  `user_response`;
ALTER TABLE  `#__babelu_exams_exams` ADD  `display_option` VARCHAR( 255 ) NOT NULL DEFAULT  'default' AFTER  `grading_option`;
