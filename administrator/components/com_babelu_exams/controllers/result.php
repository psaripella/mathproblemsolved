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

class Babelu_examsControllerResult extends JControllerForm
{
    public function __construct() 
    {
        $this->view_list = 'results';
        parent::__construct();
    }

    /**
     * Method to check if you can add a new record.
     *
     * Extended classes can override this if necessary.
     *
     * @param   array   $data  An array of input data.
     * @param   string  $key   The name of the key for the primary key; default is id.
     *
     * @return  boolean
     *
     * @since   11.1
     */
    protected function allowEdit($data = array(), $key = 'id')
    {
    	$canEdit = (Babelu_examsHelperActions::canEdit('com_babelu_exams'));
    	$canComment = (Babelu_examsHelperActions::canComment('com_babelu_exams.exam.'.$data[$key]));
    	
    	if ($canEdit && $canComment)
    	{
    		return true;
    	}
    	return false;
    }
    
    function save($key = NULL, $urlVar = NULL)
    {
    	JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
    	$input = JFactory::getApplication()->input;
    	$data		= $input->get('jform', array(), 'array');
    			
		if (!is_null($data))
		{
			$data_keys = array_keys($data);
			foreach ($data_keys AS $comment_key)
			{
				if (stristr($comment_key,'comment_'))
				{
					$comment_id = substr($comment_key, 8);
					$comment = trim($data[$comment_key]);
					
					if(!is_null($comment) && $comment != '')
					{
						$db = JFactory::getDbo();
						$query = $db->getQuery(true);
						
						$query->update('#__babelu_exams_r_response');
						$query->set('comment = '.$db->quote($comment));
						
						$query->where('id = '.$db->quote($comment_id));
						
						$db->setQuery($query);
						
						$db->execute();
						
					}	
				}
			}
		}
		
		$id = $data['id'];
		
		$this->notifyExaminee($id, $data);
		
		$task = $this->getTask();
		switch ($task)
		{
			case 'apply':	
				$msg = JText::_('COM_BABELU_EXAMS_COMMENTS_UPDATED');
				$this->setRedirect(JRoute::_('index.php?option=com_babelu_exams&task=result.edit&id='.$id,false),$msg);
				$this->redirect();	
				break;
				
			default:
				$model = $this->getModel();
				$model->checkin($id);
				$msg = JText::_('COM_BABELU_EXAMS_COMMENTS_UPDATED');
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
    
    public function grade()
    {
    	
    }
    
    public function comment()
    {
    	
    }
}
