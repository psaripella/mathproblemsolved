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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO  `#__babelu_exams_categories` ( `title`, `access` ) VALUES ('Uncategorised', '1');