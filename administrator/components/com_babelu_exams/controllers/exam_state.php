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

jimport('joomla.application.component.controllerform');

class Babelu_examsControllerExam_state extends JControllerForm
{
	public function __construct($config = array())
	{
		$this->view_list = 'results';
		parent::__construct();
	}
	
	public function save($key = null, $urlVar = null)
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		
		$app = JFactory::getApplication();
		$model = $this->getModel();
		$data = $app->input->get('jform', array(), 'array');
		
		// Access check.
		if (!JFactory::getUser()->authorise('core.edit', $this->option))
		{
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_SAVE_NOT_PERMITTED'));
			$this->setMessage($this->getError(), 'error');
		
			$this->setRedirect(
					JRoute::_(
							'index.php?option=' . $this->option . '&view=' . $this->view_list
							. $this->getRedirectToListAppend(), false
					)
			);
		
			return false;
		}
		
		// Validate the posted data.
		// Sometimes the form needs some posted data, such as for plugins and modules.
		$form = $model->getForm($data, false);
		
		if (!$form)
		{
			$app->enqueueMessage($model->getError(), 'error');
		
			return false;
		}
		
		// Test whether the data is valid.
		$validData = $model->validate($form, $data);
		
		// Check for validation errors.
		if ($validData === false)
		{
			// Get the validation messages.
			$errors = $model->getErrors();
		
			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++)
			{
				if ($errors[$i] instanceof Exception)
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				}
				else
				{
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}
		
			// Redirect back to the edit screen.
			$this->setRedirect(
						JRoute::_(
								'index.php?option=' . $this->option . '&view=' . $this->view_list
								. $this->getRedirectToListAppend(), false
						)
				);
		
			return false;
		}
		
		if (!isset($validData['tags']))
		{
		$validData['tags'] = null;
		}
		
		// Attempt to save the data.
			if (!$model->save($validData))
			{
				// Redirect back to the edit screen.
				$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_SAVE_FAILED', $model->getError()));
				$this->setMessage($this->getError(), 'error');
				// Redirect to the list screen.
				
				$this->setRedirect(
						JRoute::_(
								'index.php?option=' . $this->option . '&view=' . $this->view_list
								. $this->getRedirectToListAppend(), false
						)
				);
				return false;
			}
			



		$this->setMessage(
			JText::_('COM_BABELU_EXAMS_EXAM_STATE_SAVED_SUCCESSFULLY')
		);
		
		// Redirect to the list screen.
		$this->setRedirect(
				JRoute::_(
						'index.php?option=' . $this->option . '&view=' . $this->view_list
						. $this->getRedirectToListAppend(), false
				)
		);
	}
}