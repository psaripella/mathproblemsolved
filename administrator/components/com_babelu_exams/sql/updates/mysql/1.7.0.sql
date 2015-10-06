ALTER TABLE  `#__babelu_exams_problems` ADD  `standard` VARCHAR( 255 ) NOT NULL;
ALTER TABLE  `#__babelu_exams_problems` CHANGE  `standard`  `standard` VARCHAR( 255 ) NOT NULL DEFAULT 'No standard';

-- --------------------------------------------------------

--
-- Table structure for table `#__babelu_exams_levels`
--

CREATE TABLE IF NOT EXISTS `#__babelu_exams_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ordering` INT UNSIGNED NOT NULL,
  `checked_out` INT UNSIGNED NOT NULL,
  `checked_out_time` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00',
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
