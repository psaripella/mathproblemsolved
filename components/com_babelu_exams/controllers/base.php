<?php
/**
 * @version     1.9.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */
// No direct access
defined('_JEXEC') or die;

abstract class Babelu_examsControllerBase extends JControllerLegacy
{
	protected $view;
	
	/**
	 * Method to check the session token
	 */
	protected function validateSession()
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
	}
	
	/**
	 * Method to refresh the session token to prevent the back button
	 */
	protected function refreshToken()
	{
		$session = JFactory::getSession();
		$session->getToken(true);
	}
	
	/**
	 * Method to get basepath and layout for view
	 * @return Array $config keys 'base_path' and 'layout'
	 */
	protected function getViewConfig()
	{
		$config = array();
		$config['base_path'] = $this->basePath;
		$config['layout'] = JFactory::getApplication()->input->get('layout', 'default');
		return $config;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see JController::display()
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$document = JFactory::getDocument();
		$viewType = $document->getType();
	
		if (!isset($this->view))
		{
			$viewName = JFactory::getApplication()->input->get('view', $this->default_view, 'CMD');
			$this->view = $this->getView($viewName, $viewType, '', $this->getViewConfig());
	
			// Get/Create the model
			if ($model = $this->getModel($viewName))
			{
				// Push the model into the view (as default)
				$this->view->setModel($model, true);
			}
		}
	
		$this->view->document = $document;
		$conf = JFactory::getConfig();
	
		// Display the view
		if ($cachable && $viewType != 'feed' && $conf->get('caching') >= 1)
		{
			$option = JFactory::getApplication()->input->get('option', $this->getName(), 'CMD');
			$cache = JFactory::getCache($option, 'view');
	
			if (is_array($urlparams))
			{
				$app = JFactory::getApplication();
	
				if (!empty($app->registeredurlparams))
				{
					$registeredurlparams = $app->registeredurlparams;
				}
				else
				{
					$registeredurlparams = new stdClass;
				}
	
				foreach ($urlparams as $key => $value)
				{
					// Add your safe url parameters with variable type as value {@see JFilterInput::clean()}.
					$registeredurlparams->$key = $value;
				}
	
				$app->registeredurlparams = $registeredurlparams;
			}
	
			$cache->get($this->view, 'display');
		}
		else
		{
			$this->view->display();
		}
	
		return $this;
	}
}