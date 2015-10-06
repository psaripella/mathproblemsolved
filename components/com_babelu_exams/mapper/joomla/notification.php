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

class Babelu_examsMapperJoomlaNotification extends Babelu_examsMapperJoomlaBase
{
	public function getNotificationProfile($id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.notify_admin_manual, a.notify_admin_automatic, a.notify_user_automatic');
		$query->from('#__babelu_exams_notification_profiles AS a');
		
		$query->select('uc.name AS admin_name, uc.email AS admin_email');
		$query->join('LEFT','#__users AS uc ON uc.id = a.admin_to_notify');
		
		$query->select('admin.msg_subject AS admin_msg_subject, admin.msg_body AS admin_msg_body');
		$query->join('LEFT', '#__babelu_exams_notification_messages AS admin ON admin.id = a.admin_msg_id');
		
		$query->select('user.msg_subject AS user_msg_subject, user.msg_body AS user_msg_body');
		$query->join('LEFT', '#__babelu_exams_notification_messages AS user ON user.id = a.user_msg_id');
		
		$query->select('comment.msg_subject AS comment_msg_subject, comment.msg_body AS comment_msg_body');
		$query->join('LEFT', '#__babelu_exams_notification_messages AS comment ON comment.id = a.comment_msg_id');
		
		$query->where('a.id = '.(int)$id);
		
		$db->setQuery($query);
		return $db->loadObject();
	}
}