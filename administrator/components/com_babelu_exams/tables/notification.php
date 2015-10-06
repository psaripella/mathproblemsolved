<?php
/**
 * @version     1.5.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsTableNotification extends Babelu_examsTableBase
{
	public function __construct($db)
	{
		parent::__construct('#__babelu_exams_notification_profiles', 'id', $db);
	}

	public function check()
	{
		return parent::check();
	}
}