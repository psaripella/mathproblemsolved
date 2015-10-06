ALTER TABLE  `#__babelu_exams_exams` ADD  `results_access` int(10) unsigned NOT NULL DEFAULT '0';

ALTER TABLE  `#__babelu_exams_sections` ADD  `level` INT UNSIGNED NOT NULL; 
ALTER TABLE  `#__babelu_exams_sections` ADD  `level_filter_type` INT NOT NULL;