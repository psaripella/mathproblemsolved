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

class Babelu_examsControllerImport extends JControllerForm
{
	protected $importKeys;	
	
    public function __construct() 
    {
        $this->view_list = 'problems';
        $this->importKeys = array('group','problem_text','correct_answers','incorrect_options', 'default_input_type','level','point_value','result_text','status');
        parent::__construct();
    }

    public function save($key=null, $urlVar=null)
    {
    	JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
 
    	$app = JFactory::getApplication();
    	$model = $this->getModel();
    	$table = $model->getTable();

    	$jinput = JFactory::getApplication()->input;
    	$files = $jinput->files->get('jform');
    	$importFile   = $files['importFile'];
    	
    	$fileExt = explode('.', JString::strtolower($importFile['name']));
    	$countFileExt = count($fileExt);
    	$adjusted = $countFileExt - 1;
    
    	if ($fileExt[$adjusted] !== 'csv')
    	{
    		$msg = JText::_('COM_BABELU_EXAMS_IMPORT_ERROR_INVALID_FILE_TYPE');
    		$this->set('task', null);
    		$this->setRedirect('index.php?option='.$this->option.'&view=import',$msg,'error');
    		$this->redirect();
    	}
    	else
    	{
    		if (($handle = fopen($importFile['tmp_name'], "r")) !== FALSE)
    		{
    			$importKeys = '';
    			while (($data = fgetcsv($handle)) !== FALSE)
    			{
    				if ($importKeys === '')
    				{
    					$importKeys = $data;

    					if (!is_array($importKeys) || (count($importKeys) == 0))
    					{
    						$msg = JText::_('COM_BABELU_EXAMS_IMPORT_ERROR_INVALID_CSV_HEADERS');
    						$this->set('task', null);
    						$this->setRedirect('index.php?option='.$this->option.'&view=import',$msg,'error');
    						$this->redirect();
    					}
    					else
    					{
    						foreach ($importKeys as $importKey)
    						{
    							if (!in_array($importKey, $this->importKeys) 
    									&& !in_array(mb_convert_encoding($importKey, mb_internal_encoding()), $this->importKeys))
    							{
    								$msg = JText::_('COM_BABELU_EXAMS_IMPORT_ERROR_UNRECOGNIZED_CSV_HEADER');
    								$this->set('task', null);
    								$this->setRedirect('index.php?option='.$this->option.'&view=import',$msg,'error');
    								$this->redirect();
    							}
    						}
    					}
    				}
    				else
    				{
    					$package['id'] = '0';
    					if (!in_array('group', $importKeys))
    					{
    						$jFormData = JFactory::getApplication()->input->get('jform', array('group_id' => 1),'array');
    						$package['group_id'] = $jFormData['group_id'];
    					}
    					
    					$i = 0;
    					foreach ($importKeys as $importKey)
    					{
    						switch ($importKey)
    						{
    							case 'group':
    								$package['group_id'] = (int)$data[$i];	
    							break;
    							
    							case 'status':
    								$package['state'] = (int)$data[$i];
    								if ($package['state'] != 1 && $package['state'] != 0)
    								{
    									$package['state'] = 0;
    								}
    							break;
    							
    							case 'correct_answers':
    								$package['answers'] = $data[$i];
    							break;
    							  						
    							case 'incorrect_options':
    								$package['options'] = $data[$i];
    							break;
    							
    							default:
    								$package[$importKey] = $data[$i];
    							break;
    						}
    						$i++;
    					}
    					$model->save($package);
    				}
    			}
    			
    			fclose($handle);
    		}
    		$msg = JText::_('COM_BABELU_EXAMS_IMPORT_SUCCESS');
    		$this->set('task', null);
    		$this->setRedirect('index.php?option='.$this->option.'&view=import',$msg);
	   	} 	
    }
}