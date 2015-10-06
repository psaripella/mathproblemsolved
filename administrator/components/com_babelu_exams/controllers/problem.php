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

class Babelu_examsControllerProblem extends JControllerForm
{
    public function __construct() 
    {
        $this->view_list = 'problems';
        parent::__construct();
    }
}