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

jimport('joomla.application.component.controlleradmin');

class Babelu_examsControllerAdmin extends JControllerAdmin
{
	public function saveOrderAjax()
	{
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');
		$order = $input->post->get('order', array(), 'array');
	
		JArrayHelper::toInteger($pks);
		JArrayHelper::toInteger($order);
	
		$model = $this->getModel();
	
		$return = $model->saveorder($pks, $order);
		if ($return){ echo "1"; }
		JFactory::getApplication()->close();
	}
}