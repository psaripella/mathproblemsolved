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

// import Joomla controller library
jimport('joomla.application.component.controller');

require_once('paypal.class.php');  // include the class file

/**
 * SP Paypal Component Controller
 */
class SpPaypalController extends JControllerLegacy
{

   function display() {
      
    $post = JRequest::get( 'post' );
/*
ob_start();
print_r($post );
$szLog = ob_get_clean();
error_log($szLog);
*/
    
    $params = &JComponentHelper::getParams( 'com_sppaypal' ); //get component parameters
    $p = new paypal_class;             // initiate an instance of the class

    if ($params->get('test_sandbox')) {
      $p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
    } else {
      $p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url
    }
    
    if ( !$p->validate_ipn($post) ) { //ipn validation
      JError::raiseError(200, 'IPN validation failed.');
			return false;
    }
    if ( $params->get('merchant_id') == $post['receiver_id'] || $params->get('merchant_email') == $post['receiver_email'] ) {
      // Make sure we have a default view
      if( !JRequest::getVar( 'view' )) {
		    JRequest::setVar('view', 'paypal' );
      } else {
	 	   $view = JRequest::getVar( 'view' );
		    JRequest::setVar('view', $view );
      }    
 		  parent::display();
      return $this;
    } else {
      JError::raiseError(200, 'Unauthorized use');
			return false;
    }
	} 
 
}
