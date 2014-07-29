<?php

/**
 * @package		SP Paypal
 * @subpackage	Components
 * @copyright	SP CYEND - All rights reserved.
 * @author		SP CYEND
 * @link		http://www.cyend.com
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the SpPaypal Component
 */
class SpPaypalViewPaypal extends JViewLegacy
{
	// Overwriting JViewLegacy display method
	function display($tpl = null) 
	{
    // Assign data to the view
	  $this->item = $this->get('Item');
	  $this->payer = $this->get('Payer');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(200, implode('<br />', $errors));
			return false;
		}
		
		// Display the view
		parent::display($tpl);
	}
}
