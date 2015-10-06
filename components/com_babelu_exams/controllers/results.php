<?php
/**
 * @version     1.9.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsControllerResults extends Babelu_examsControllerBase
{
	protected $spec;
	
	public function __construct($config)
	{
		$config['default_view'] = 'results';
		parent::__construct($config);
		
		$specFactory = new Babelu_examsSpecificationFactory();
		$spec = $specFactory->getSpecification(array('results_access'));
		
		//allows plug-ins to add specifications around the standard specifications
		$dispatcher = JDispatcher::getInstance();
		$results = $dispatcher->trigger('OnBeforeSetResultsSpecification', array($spec));
		
		$this->spec = $spec;
	}
	
	public function display($cachable = false, $urlparams = array())
	{
		$model = $this->getModel('Results', 'Babelu_examsModel');
		$exam = $model->getExam();
		
		if (!$this->spec->satisfiedBy($exam))
		{
			$this->accessDeniedRedirect($exam->getMsg());
		}
		
		$vFormat = JFactory::getDocument()->getType();
		$this->view = $this->getView('Results', $vFormat, '', $this->getViewConfig());
		$this->view->setModel($model, true);
		parent::display($cachable, $urlparams);
	}
	
	/**
	 * Method to redirect to details if access is restricted
	 * @param string $msg
	 */
	private function accessDeniedRedirect($msg)
	{
		$input = JFactory::getApplication()->input;
		$this->task = null;
		$url = Babelu_examsHelperBabelu_exams::getDetailsLink($input->get('id',0,'int'));
		$this->setRedirect(JRoute::_($url),JText::_($msg),'error');
		$this->redirect();
	}
}