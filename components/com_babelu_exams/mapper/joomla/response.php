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

class Babelu_examsMapperJoomlaResponse extends Babelu_examsMapperJoomlaBase
{
	public function savePausedResponse($parent_id, $section_id, $problem_id, $response, $marked)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->insert('#__babelu_exams_s_response');
		$query->set('parent_id = '.(int)$parent_id)->
		set('section_id = '.(int)$section_id)->
		set('problem_id = '.(int)$problem_id)->
		set('user_response = '.$db->quote($response))->
		set('marked = '.$marked);
		$db->setQuery($query);
		
		if ($db->execute())
		{
			return true;
		}
		return false;
	}
	
	public function saveResultResponse($parent_id, $section_id, $problem_id, $response, $status, $marked)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->insert('#__babelu_exams_r_response');
		$query->set('parent_id = '.(int)$parent_id)->
		set('section_id = '.(int)$section_id)->
		set('problem_id = '.(int)$problem_id)->
		set('user_response = '.$db->quote($response))->
		set('status = '.(int)$status)->
		set('marked = '.$marked);
		$db->setQuery($query);
		
		if ($db->execute())
		{
			return true;
		}
		return false;
	}
	
	public function updateResultResponse($response_id, $status, $comment)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->update('#__babelu_exams_r_response');
		$query->set('status = '.(int)$status)->
		set('comment = '.$db->quote($comment));
		$query->where('id = '.(int)$response_id);
		
		$db->setQuery($query);
		
		if ($db->execute())
		{
			return true;
		}
		return false;
	}
}