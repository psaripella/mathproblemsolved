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

class Babelu_examsControllerCategories extends Babelu_examsControllerAdmin
{
	public function &getModel($name = 'Category', $prefix = 'Babelu_examsModel' , $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}