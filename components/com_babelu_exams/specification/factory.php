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

class Babelu_examsSpecificationFactory
{
	/**
	 * Method to build a decorated specification chain.
	 * Babelu_examsSpecificationData is always at the core.
	 * @param array $specs Array of specification names.
	 * @return Decorated Babelu_examsSpecificationData object
	 */
	public function getSpecification($specs = array())
	{
		$prefix = 'Babelu_examsSpecification';
		$spec = new Babelu_examsSpecificationData();
		
		foreach ($specs AS $postfix)
		{
			$className = $prefix.ucfirst($postfix);
			$spec = new $className($spec);
		}
		
		return $spec;
	}
}