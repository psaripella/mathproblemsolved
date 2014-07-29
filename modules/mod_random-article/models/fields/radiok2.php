<?php
/**
 * @package Module Random Article for Joomla! 2.5+
 * @version $Id: radiok2.php 48 2012-12-06 20:25:23Z artur.ze.alves@gmail.com $
 * @author Artur Alves
 * @copyright (C) 2012 - Artur Alves
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.fields.radio');
 
// The class name must always be the same as the filename (in camel case)
class JFormFieldRadioK2 extends JFormFieldRadio {
	
		private $k2Installed;
 
        //The field class must know its own type through the variable $type.
        protected $type = 'radiok2';
        
        public function __construct() {
        	$this->hasK2Installed();
        	parent::__construct();	
        }
        
        private function hasK2Installed() {
        	$query = "SELECT * FROM #__extensions WHERE element = 'com_k2' AND type='component' AND enabled = '1';";
			$db = JFactory::getDBO();
			$db->setQuery($query);
			$k2 = $db->loadObject();
			
			if(isset($k2) && $k2->element == 'com_k2') {
				$this->k2Installed = true;
			}
			else
				$this->k2Installed = false;	
        }

        public function getLabel() {
                // code that returns HTML that will be shown as the label
                if($this->k2Installed)
                	return parent::getLabel();
        }

        public function getInput() {
                // code that returns HTML that will be shown as the form field
                if($this->k2Installed)
                	return parent::getInput();
        }
        
        protected function getOptions () {
        	return parent::getOptions();
		}
}
