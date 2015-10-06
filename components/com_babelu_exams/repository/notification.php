<?php
/**
 * @version     1.8.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsRepositoryNotification extends Babelu_examsRepositoryBase
{
	public function getNotificationProfile($id)
	{
		$mapper = $this->getMapper('Notification');
		return $mapper->getNotificationProfile($id);
	}
}