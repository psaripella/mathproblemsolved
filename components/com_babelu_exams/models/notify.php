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

class Babelu_examsModelNotify extends JModelLegacy
{
	/**
	 * Exam Entity
	 * @var Babelu_examsEntityExam
	 */
	protected $exam;
	
	/**
	 * Notification subject line
	 * @var string
	 */
	protected $msg_subject;
	
	/**
	 * Notification body
	 * @var string
	 */
	protected $msg_body;
	
	public function notify(Babelu_examsEntityExam $exam)
	{
		$this->exam = $exam;
		
		$this->prepareToNotify($this->exam->getSetting('notification_id'));
		
		if ($exam->notifyAdminAuto() || $exam->notifyAdminManual()) 
		{
			$this->notifyAdmin();
		}
		
		if ($exam->notifyUserAuto())
		{
			$this->notifyUser();
		}
		
	}
	
	private function prepareToNotify($notification_id)
	{
		$notificationRepository = new Babelu_examsRepositoryNotification('joomla');
		$notificationProfile = $notificationRepository->getNotificationProfile($notification_id);
		
		$this->exam->mergeSettings($notificationProfile);
	}
	
	private function notifyAdmin()
	{
		$exam = $this->exam;
		$this->msg_subject = $exam->getSetting('admin_msg_subject');
		$this->msg_body = $exam->getSetting('admin_msg_body');
		
		$name = $exam->getSetting('admin_name');
		$email = $exam->getSetting('admin_email');
		
		if(JMailHelper::isEmailAddress($email))
		{
			$this->sendNotification($name, $email);
		}
	}
	
	public function notifyExaminee($result_id, $notifyGrade = false, $notifyComment = false)
	{
		$examRepository = new Babelu_examsRepositoryExam('joomla');
		$this->exam = $examRepository->getExamWithResult($result_id);
		$this->prepareToNotify($this->exam->getSetting('notification_id'));
		
		if ($notifyGrade)
		{
			echo 'notify grade';
			$this->notifyUser();
		}
		elseif ($notifyComment)
		{
			echo 'notify commnet';
			$this->notifyUserComment();
		}
	}
	
	private function notifyUserComment()
	{
		$exam = $this->exam;
		$this->msg_subject = $exam->getSetting('comment_msg_subject');
		$this->msg_body = $exam->getSetting('comment_msg_body');
		
		$user = JFactory::getUser($this->exam->getSetting('user_id'));
		$email = $user->email;
		$name = $user->name;
		
		if (!$user->guest && JMailHelper::isEmailAddress($email))
		{
			$this->sendNotification($name, $email);
		}
	}
	
	private function notifyUser()
	{
		$exam = $this->exam;
		$this->msg_subject = $exam->getSetting('user_msg_subject');
		$this->msg_body = $exam->getSetting('user_msg_body');
		
		
		$user= JFactory::getUser($this->exam->getSetting('user_id'));
		$email = $user->email;
		$name = $user->name;
		
		if(!$user->guest && JMailHelper::isEmailAddress($email))
		{
			$this->sendNotification( $name, $email);
		}
	}
	
	private function sendNotification($name, $email)
	{
		$config = JFactory::getConfig();
		$sender = array();
		$sender[] = $config->get( 'config.mailfrom' );
		$sender[] = $config->get( 'config.fromname' );
		
		$emailer = JFactory::getMailer();
		$emailer->setSender($sender);
		$emailer->ClearAddresses();
		$emailer->AddAddress($email, $name);
		$emailer->setSubject($this->getSubject());
		$emailer->setBody($this->getMsgBody());
		$emailer->IsHTML(true);
		$emailer->Send();
	}
	
	private function getSubject()
	{
		$search = $this->getSearch();
		$replace = $this->getReplace();
		
		$subject = str_replace($search, $replace, $this->msg_subject);
		return $subject;
	}
	
	private function getMsgBody()
	{
		$search = $this->getSearch();
		$replace = $this->getReplace();
		
		$msg = str_replace($search, $replace, $this->msg_body);
		return $msg;
	}
	
	private function getSearch()
	{
		$search = array();
		$search[] = '{exam_title}';
		$search[] = '{examinee_name}';
		$search[] = '{examinee_email}';
		$search[] = '{pass_line}';
		$search[] = '{percentage_grade}';
		$search[] = '{exam_point_grade}';
		$search[] = '{exam_result}';
		$search[] = '{time_spent}';
		$search[] = '{submission_date}';
		$search[] = '{result_link}';
		
		return $search;
	}
	
	private function getReplace()
	{
		$user = JFactory::getUser($this->exam->getSetting('user_id'));
		
		if ($user->guest)
		{
			$userName = JText::_('COM_BABELU_EXAMS_GUEST');
			$userEmail = '';
		}
		else
		{
			$userName = $user->name;
			$userEmail = $user->email;
		}
		
		
		$replace = array();
		$replace[] = $this->exam->getSetting('title');
		$replace[] = $userName;
		$replace[] = $userEmail;
		$replace[] = $this->exam->getSetting('pass_per').'%';
		$replace[] = $this->exam->getSetting('percentage_grade').'%';
		$replace[] = $this->exam->getSetting('point_grade');
		$replace[] = JText::_($this->exam->getStatusMsg());
		$replace[] = $this->exam->getTimeSpent();
		$replace[] = $this->exam->getSetting('creation_date');
		
		$uri = JUri::root();
		$result_id = $this->exam->getSetting('result_id');
		$result_url = $uri.'index.php?option=com_babelu_exams&view=result&id='.$result_id;
		$result_link = '<a href="'.JRoute::_($result_url).'">'.$result_url.'</a>';
		
		$replace[] = $result_link;
		
		return $replace;
	}
}