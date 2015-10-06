<?php
/**
 * @version     1.4.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

class Babelu_examsControllerGrade extends JControllerForm
{
	protected $percentage;
	protected $score;
	protected $points_possible;
	protected $status;
	protected $pass_per;

    public function __construct() 
    {
        $this->view_list = 'results';
        parent::__construct();

        $id = JFactory::getApplication()->input->get('id');
        $model = $this->getModel();
       
        $examId = $model->getExamId($id);
        
        if (!(Babelu_examsHelperActions::canGrade('com_babelu_exams.exam.'.(int)$examId)))
        {
        	$url = 'index.php?option=com_babelu_exams&view=grades';
        	$msg = JText::_('COM_BABELU_EXAMS_ERROR_GRADING_NOT_ALLOWED_FOR_ITEM');
        	$this->setRedirect(JRoute::_($url, false),$msg, 'warning');
        	$this->redirect();
        }
    }

    private function setPercentage()
    {
    	if($this->score != 0 && $this->points_possible != 0) 
    	{
    		$this->percentage = round(($this->score/$this->points_possible)*100); 
    	}
    	else { $this->percentage = 0; }
    }
    
    private function setPointsPossible($value)
    {
    	if(is_numeric($value)) { $this->points_possible = $value; }
    	//TODO error handling
    }
    
    private function setScore($value)
    {
    	if(is_numeric($value)) { $this->score = $value; } 
    	//TODO error handling
    }
    
    private function setPassPer($value)
    {
    	if(is_numeric($value)) { $this->pass_per = $value; }
		//TODO error handling
    }
    
    public function setStatus()
    {
    	if ($this->percentage >= $this->pass_per) { $this->status = 2; }
    	else { $this->status = 1; }
    }
    
    public function getGradeDataArray($result_id)
    {
    	$data['status'] = $this->status;
    	$data['score'] = $this->score;
    	$data['percentage'] = $this->percentage;
    	$data['id'] = $result_id;
    	return $data;
    }
    
    function save($key = NULL, $urlVar = NULL)
    {
    	JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
    	$input = JFactory::getApplication()->input;
    	$data = $input->get('jform', array(), 'array');
		
		if (!is_null($data))
		{
			$data_keys = array_keys($data);
			foreach ($data_keys AS $comment_key)
			{
				if (stristr($comment_key,'comment_'))
				{
					$problem_id = substr($comment_key, 8);
					$comment = trim($data[$comment_key]);
					
					$points_earned = $data['grade'][$problem_id];
					$point_value = $data['point_value'][$problem_id];
					
					if ($points_earned == $point_value) { $status = 3; } //Correct
					elseif ($points_earned != 0) { $status = 2; } // partially correct
					else { $status = 1;}// incorrect
					
					$db = JFactory::getDbo();
					$query = $db->getQuery(true);
					$query->update('#__babelu_exams_r_response');
					$query->set('comment = '.$db->quote($comment))->
					set('status = '.(int)$status);
					$query->where('id = '.$db->quote($problem_id));
					$db->setQuery($query);
					$db->execute();	
				}	
			}

			$this->setPointsPossible($data['points_possible']);
			$this->setScore(array_sum($data['grade']));
			$this->setPercentage();
			$this->setPassPer($data['pass_per']);
			$this->setStatus();
			$grade_data = $this->getGradeDataArray($data['id']);
			$model = $this->getModel();
			$model->saveGrade($grade_data);
		}
		
		$id = $data['id'];

		$this->notifyExaminee($id, $data);
		
		$task = $this->getTask();
		switch ($task)
		{
			case 'apply':
				
				$msg = JText::_('COM_BABELU_EXAMS_EXAM_GRADE_SAVED');
				$this->setRedirect(JRoute::_('index.php?option=com_babelu_exams&task=grade.edit&id='.$id,false),$msg);
				$this->redirect();
				
				break;
			default:
				$model = $this->getModel();
				$model->checkin($id);
				$msg = JText::_('COM_BABELU_EXAMS_EXAM_GRADE_SAVED');
				$this->setRedirect(JRoute::_('index.php?option=com_babelu_exams&view=results',false),$msg);
				$this->redirect();
				break;
		}
    }
    
    private function notifyExaminee($id, $data)
    {
    	$this->addModelPath(JPATH_SITE.'/components/com_babelu_exams/models');
    	$notifier = $this->getModel('Notify');
    	
    	$notifyGrade = (isset($data['notify_user_grade']));
    	$notifyComment =  (isset($data['notify_user_comment']));
    	$notifier->notifyExaminee($id, $notifyGrade. $notifyComment);
    }
}