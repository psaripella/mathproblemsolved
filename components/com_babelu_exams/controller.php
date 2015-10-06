<?php
/**
 * @version     1.2.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */
 
 // No direct access
defined('_JEXEC') or die;

class Babelu_examsController extends JControllerLegacy
{
	public function __construct($config)
	{
		$config['default_view'] = 'categories';
		parent::__construct($config);
	}
	
}