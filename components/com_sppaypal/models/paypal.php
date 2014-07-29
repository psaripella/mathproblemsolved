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

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * SpPaypal Model
 */
class SpPaypalModelPaypal extends JModelItem {

    /**
     * @var object item
     */
    protected $item;

    /**
     * Method to auto-populate the model state.
     *
     * This method should only be called once per instantiation and is designed
     * to be called on the first call to the getState() method unless the model
     * configuration flag to ignore the request is set.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @return	void
     * @since	1.6
     */
    protected function populateState() {
        $app = JFactory::getApplication();
        // Get the message id
        $id = JRequest::getInt('id');
        $this->setState('message.id', $id);

        // Load the parameters.
        $params = $app->getParams();
        $this->setState('params', $params);
        parent::populateState();
    }

    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param	type	The table type to instantiate
     * @param	string	A prefix for the table class name. Optional.
     * @param	array	Configuration array for model. Optional.
     * @return	JTable	A database object
     * @since	1.6
     */
    public function getTable($type = 'SpPaypal', $prefix = 'SpPaypalTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Get the item
     * @return object The item to be displayed to the user
     */
    public function getItem() {
        if (!isset($this->item)) {
            $item_number = JRequest::getVar('item_number');

            //$id = $this->getState('message.id');
            $this->_db->setQuery($this->_db->getQuery(true)
                            ->from('#__sppaypal as h')
                            ->select('h.item_number, h.params, h.rules_sub, h.rules_eot,h.block,h.contact,h.catid')
                            ->where('h.item_number=' . $this->_db->quote($item_number)));
            if (!$this->item = $this->_db->loadObject()) {
                JError::raiseError(200, $this->_db->getError());
                return false;
                //$this->setError($this->_db->getError());
            } else {
                // Load the JSON string
                $params = new JRegistry;
                $params->loadString($this->item->params);
                $this->item->params = $params;

                // Merge global params with item params
                $params = clone $this->getState('params');
                $params->merge($this->item->params);
                $this->item->params = $params;
            }
        }

        return $this->item;
    }

    /**
     * Update with Transaction
     * @return object The item to be displayed to the user
     */
    public function getPayer() {
        //convert rules to arrays
        $this->item->rules_sub = json_decode($this->item->rules_sub);
        $this->item->rules_eot = json_decode($this->item->rules_eot);

        // update status (block or unblock)
        $saveUser = false;
        switch (JRequest::getVar('txn_type')) {
            case 'web_accept':
                $txn_type = 'sub';
                $saveUser = true;
                break;
            case 'subscr_signup':
                $txn_type = 'sub';
                $row['block'] = 0;
                $saveUser = true;
                break;
            case 'subscr_payment':
                $txn_type = 'sub';
                $row['block'] = 0;
                $saveUser = true;
                break;
            case 'subscr_eot':
                $txn_type = 'eot';
                $row['block'] = $this->item->block;
                $saveUser = true;
                break;
        }

        if (!$saveUser) {
            JError::raiseError(200, $this->_db->getError());
            return false;
            //$this->setError("No valid transaction type");
        }
        if (!isset($this->payer)) {
            // Create-Load user
            $this->_db->setQuery($this->_db->getQuery(true)
                            ->from('#__users as h')
                            ->select('*')
                            ->where('h.email=' . $this->_db->quote(JRequest::getVar('payer_email'))));
            if (!$result = $this->_db->loadObject()) {
                //new user
                // exit if not subscription
                if (JRequest::getVar('txn_type') == 'subscr_eot') {
                    JError::raiseError(200, $this->_db->getError());
                    return false;
                }
                //$this->setError($this->_db->getError());
                //define user groups
                $row['groups'] = $this->item->rules_sub;

                $this->payer = JFactory::getUser(0);
                // new user
                $row['id'] = 0;
                $row['email'] = JRequest::getVar('payer_email');
                $row['name'] = JRequest::getVar('first_name') . ' ' . JRequest::getVar('last_name');
                $row['email1'] = JRequest::getVar('payer_email');
                $row['email2'] = JRequest::getVar('payer_email');
                //update username as necessary
                $username = JRequest::getVar('payer_email');
                $params = &JComponentHelper::getParams('com_sppaypal');
                $username_type = $params->get('username_type');
                if ($username_type) {
                    $username = mb_substr(JRequest::getVar('first_name'), 0, 1);
                    $username .= JRequest::getVar('last_name');
                    $username = mb_strtolower($username);
                    $this->_db->setQuery($this->_db->getQuery(true) //search if already exist
                                    ->from('#__users as h')
                                    ->select('*')
                                    ->where('h.username LIKE ' . $this->_db->quote($username)));
                    if ($result2 = $this->_db->loadObject())
                        $username .= rand(0, 1000);
                }
                $row['username'] = $username;
                //$row['sendEmail'] = 0;
                //$row['params'] = '{"admin_style":"","admin_language":"","language":"","editor":"","helpsite":"","timezone":""}';

                $user_id = $this->register($row);
                if (!$user_id) {
                    JError::raiseError(200, $this->_db->getError());
                    return false;
                    //$this->setError($this->_db->getError());
                }
                $this->payer = JFactory::getUser($user_id);
                //Save Contact
                if ($this->item->contact)
                    $this->saveContact();
            }
            else {
                //existing user
                $this->payer = JFactory::getUser($result->id);

                //Merge groups
                if ($txn_type == 'sub') {
                    foreach ($this->payer->groups as $key1 => $value1) {
                        $temp = true;
                        foreach ($this->item->rules_eot as $key2 => $value2) {
                            if ($value1 == $value2) {
                                $temp = false;
                            }
                        }
                        if ($temp)
                            $row['groups'][$key1] = $value1;
                    }
                    if (count($row['groups']) == 0) {
                        $row['groups'] = $this->item->rules_sub;
                    } else {
                        $row['groups'] = array_merge($this->item->rules_sub, $row['groups']);
                    }
                }
                if ($txn_type == 'eot') {
                    foreach ($this->payer->groups as $key1 => $value1) {
                        $temp = true;
                        foreach ($this->item->rules_sub as $key2 => $value2) {
                            if ($value1 == $value2) {
                                $temp = false;
                            }
                        }
                        if ($temp)
                            $row['groups'][$key1] = $value1;
                    }
                    if (count($row['groups']) == 0) {
                        $row['groups'] = $this->item->rules_eot;
                    } else {
                        $row['groups'] = array_merge($this->item->rules_eot, $row['groups']);
                    }
                }

                if (!$this->payer->bind($row)) {
                    JError::raiseError(200, $this->payer->getError());
                    //$this->setError($this->payer->getError());
                    error_log('Error saving user:');
                    ob_start();
                    print_r($this->payer);
                    $szLog = ob_get_clean();
                    error_log($szLog);
                    return false;
                }

                if (!$this->payer->save()) {
                    JError::raiseError(200, $this->_db->getError());
                    //$this->setError($this->payer->getError());
                    error_log('Error saving user:');
                    ob_start();
                    print_r($this->payer);
                    $szLog = ob_get_clean();
                    error_log($szLog);
                    return false;
                }

                //email notification when migrated
                if (JRequest::getVar('txn_type') != 'subscr_eot') {
                    $this->mSendMail($this->payer);
                }
            }
        }

        return $this->payer;
    }

    /**
     * Update with Transaction
     * @return object The item to be displayed to the user
     */
    public function saveContact() {
        JTable::addIncludePath(JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_contact' . DIRECTORY_SEPARATOR . 'tables');
        $table = & JTable::getInstance('Contact', 'ContactTable');

        $data['name'] = JRequest::getVar('first_name') . ' ' . JRequest::getVar('last_name');
        $data['name'] = htmlspecialchars_decode($data['name'], ENT_QUOTES);
        $data['alias'] = JApplication::stringURLSafe($data['name']);
        $data['email_to'] = JRequest::getVar('payer_email');
        $data['country'] = JRequest::getVar('address_country');
        $data['postcode'] = JRequest::getVar('address_zip');
        $data['state'] = JRequest::getVar('address_state');
        $data['suburb'] = JRequest::getVar('address_city');
        $data['address'] = JRequest::getVar('address_street');
        $data['published'] = '1';
        $data['params'] = '{"show_contact_category":"","show_contact_list":"","presentation_style":"","show_name":"","show_position":"","show_email":"","show_street_address":"","show_suburb":"","show_state":"","show_postcode":"","show_country":"","show_telephone":"","show_mobile":"","show_fax":"","show_webpage":"","show_misc":"","show_image":"","allow_vcard":"","show_articles":"","show_profile":"","show_links":"","linka_name":"","linka":"","linkb_name":"","linkb":"","linkc_name":"","linkc":"","linkd_name":"","linkd":"","linke_name":"","linke":"","show_email_form":"","show_email_copy":"","banned_email":"","banned_subject":"","banned_text":"","validate_session":"","custom_reply":"","redirect":""}';
        $data['user_id'] = $this->payer->id;
        $data['catid'] = $this->item->catid;
        $data['access'] = '1';
        $data['language'] = '*';
        $data['metadata'] = '{"robots":"","rights":""}';
        //set ordering
        $db = JFactory::getDbo();
        $db->setQuery('SELECT MAX(ordering) FROM #__contact_details');
        $max = $db->loadResult();
        $data['ordering'] = $max + 1;

        if (!$table->bind($data)) {
            JError::raiseError(200, $this->_db->getError());
            //$this->setError($this->payer->getError());
            error_log('Error binding contact:');
            ob_start();
            print_r($this->table);
            $szLog = ob_get_clean();
            error_log($szLog);
            return false;
        }

        if (!$table->store()) {
            JError::raiseError(200, $this->_db->getError());
            //$this->setError($this->payer->getError());
            error_log('Error saving contact:');
            ob_start();
            print_r($this->table);
            $szLog = ob_get_clean();
            error_log($szLog);
            return false;
        }
    }

    /**
     * Method to save new user
     *
     * @param	array		The form data.
     * @return	mixed		The user id on success, false on failure.
     * @since	1.6
     */
    public function register($temp) {
        $config = JFactory::getConfig();
        $params = JComponentHelper::getParams('com_users');
        $params2 = &JComponentHelper::getParams('com_sppaypal');

        // Initialise the table with JUser.
        $user = new JUser;
        //$data = (array)$this->getData();
        // Merge in the registration data.
        foreach ($temp as $k => $v) {
            $data[$k] = $v;
        }

        // Prepare the data for the user object.
        $data['email'] = $data['email1'];
        $data['password'] = $data['password1'];
        $useractivation = $params->get('useractivation');

        // Check if the user needs to activate their account.
        /*
          if (($useractivation == 1) || ($useractivation == 2)) {
          jimport('joomla.user.helper');
          $data['activation'] = JUtility::getHash(JUserHelper::genRandomPassword());
          $data['block'] = 1;
          }
         */

        // Bind the data.
        if (!$user->bind($data)) {
            JError::raiseError(200, JText::sprintf('COM_SPPAYPAL_REGISTRATION_BIND_FAILED', $user->getError()));
            //$this->setError(JText::sprintf('COM_SPPAYPAL_REGISTRATION_BIND_FAILED', $user->getError()));
            return false;
        }

        // Load the users plugin group.
        JPluginHelper::importPlugin('user');

        // Store the data.
        if (!$user->save()) {
            JError::raiseError(200, JText::sprintf('COM_SPPAYPAL_REGISTRATION_SAVE_FAILED', $user->getError()));
            //$this->setError(JText::sprintf('COM_SPPAYPAL_REGISTRATION_SAVE_FAILED', $user->getError()));
            return false;
        }

        // Compile the notification mail values.
        $data = $user->getProperties();
        $data['fromname'] = $config->get('fromname');
        $data['mailfrom'] = $config->get('mailfrom');
        $data['sitename'] = $config->get('sitename');
        $data['siteurl'] = JUri::base();

        // Handle account activation/confirmation emails.
        $useractivation = 0; //activate by force account. That is because paypal email is alread verified.		
        if ($useractivation == 2) {
            // Set the link to confirm the user email.
            $uri = JURI::getInstance();
            $base = $uri->toString(array('scheme', 'user', 'pass', 'host', 'port'));
            $data['activate'] = $base . JRoute::_('index.php?option=com_users&task=registration.activate&token=' . $data['activation'], false);

            $emailSubject = JText::sprintf(
                            'COM_SPPAYPAL_EMAIL_ACCOUNT_DETAILS', $data['name'], $data['sitename']
            );

            $emailBody = JText::sprintf(
                            'COM_SPPAYPAL_EMAIL_REGISTERED_WITH_ADMIN_ACTIVATION_BODY', $data['name'], $data['sitename'], $data['siteurl'] . 'index.php?option=com_users&task=registration.activate&token=' . $data['activation'], $data['siteurl'], $data['username'], $data['password_clear']
            );
        } else if ($useractivation == 1) {
            // Set the link to activate the user account.
            $uri = JURI::getInstance();
            $base = $uri->toString(array('scheme', 'user', 'pass', 'host', 'port'));
            $data['activate'] = $base . JRoute::_('index.php?option=com_users&task=registration.activate&token=' . $data['activation'], false);

            $emailSubject = JText::sprintf(
                            'COM_SPPAYPAL_EMAIL_ACCOUNT_DETAILS', $data['name'], $data['sitename']
            );

            $emailBody = JText::sprintf(
                            'COM_SPPAYPAL_EMAIL_REGISTERED_WITH_ACTIVATION_BODY', $data['name'], $data['sitename'], $data['siteurl'] . 'index.php?option=com_users&task=registration.activate&token=' . $data['activation'], $data['siteurl'], $data['username'], $data['password_clear']
            );
        } else {
            //Strings to search and replace
            $search_str = Array("{name}", "{username}", "{password}", "{email}", "{sitename}", "{siteurl}");
            $replace_str = Array($data['name'], $data['username'], $data['password_clear'], $data['email'], $data['sitename'], $data['siteurl']);
            $emailSubject = str_replace($search_str, $replace_str, stripslashes($params2->get('newuser_subject')));
            $emailBody = str_replace($search_str, $replace_str, stripslashes($params2->get('newuser_body')));
        }

        // Send the registration email.
        $mail = & JFactory::getMailer();

        $mail->addRecipient($data['email']);
        $mail->setSender(Array(0 => $data['mailfrom'], 1 => $data['fromname']));
        $mail->setSubject($emailSubject);
        $mail->setBody($emailBody);

        if ($mail->Send()) {
            echo "Mail sent successfully.";
        } else {
            echo "An error occurred.  Mail was not sent.";
        }
        //$return = JMail::sendMail($data['mailfrom'], $data['fromname'], $data['email'], $emailSubject, $emailBody);

        // Check for an error.
        if ($return !== true) {
            JError::raiseError(200, JText::_('COM_SPPAYPAL_REGISTRATION_SEND_MAIL_FAILED'));
            //$this->setError(JText::_('COM_SPPAYPAL_REGISTRATION_SEND_MAIL_FAILED'));
            // Send a system message to administrators receiving system mails
            $db = JFactory::getDBO();
            $q = "SELECT id
				FROM #__users
				WHERE block = 0
				AND sendEmail = 1";
            $db->setQuery($q);
            $sendEmail = $db->loadColumn();
            if (count($sendEmail) > 0) {
                $jdate = new JDate();
                // Build the query to add the messages
                $q = "INSERT INTO `#__messages` (`user_id_from`, `user_id_to`, `date_time`, `subject`, `message`)
					VALUES ";
                $messages = array();
                foreach ($sendEmail as $userid) {
                    $messages[] = "(" . $userid . ", " . $userid . ", '" . $jdate->toMySQL() . "', '" . JText::_('COM_SPPAYPAL_MAIL_SEND_FAILURE_SUBJECT') . "', '" . JText::sprintf('COM_SPPAYPAL_MAIL_SEND_FAILURE_BODY', $return, $data['username']) . "')";
                }
                $q .= implode(',', $messages);
                $db->setQuery($q);
                $db->query();
            }
            return false;
        }

        if ($useractivation == 1)
            return "useractivate";
        else if ($useractivation == 2)
            return "adminactivate";
        else
            return $user->id;
    }

    /**
     * Method to send email notifications
     *
     * @param	array		The form data.
     * @return	mixed		The user id on success, false on failure.
     * @since	1.6
     */
    private function mSendMail($temp) {
        $config = JFactory::getConfig();
        $params = JComponentHelper::getParams('com_users');
        $params2 = JComponentHelper::getParams('com_sppaypal');

        // Merge in the registration data.
        foreach ($temp as $k => $v) {
            $data[$k] = $v;
        }

        // Compile the notification mail values.
        $data['fromname'] = $config->get('fromname');
        $data['mailfrom'] = $config->get('mailfrom');
        $data['sitename'] = $config->get('sitename');
        $data['siteurl'] = JUri::base();

        //Strings to search and replace
        $search_str = Array("{name}", "{username}", "{password}", "{email}", "{sitename}", "{siteurl}");
        $replace_str = Array($data['name'], $data['username'], $data['password_clear'], $data['email'], $data['sitename'], $data['siteurl']);
        $emailSubject = str_replace($search_str, $replace_str, stripslashes($params2->get('upgradeduser_subject')));
        $emailBody = str_replace($search_str, $replace_str, stripslashes($params2->get('upgradeduser_body')));

        // Send the registration email.
        $mail = & JFactory::getMailer();

        $mail->addRecipient($data['email']);
        $mail->setSender(Array(0 => $data['mailfrom'], 1 => $data['fromname']));
        $mail->setSubject($emailSubject);
        $mail->setBody($emailBody);

        if ($mail->Send()) {
            echo "Mail sent successfully.";
        } else {
            echo "An error occurred.  Mail was not sent.";
        }
        //$return = JMail::sendMail($data['mailfrom'], $data['fromname'], $data['email'], $emailSubject, $emailBody);

        if ($useractivation == 1)
            return "useractivate";
        else if ($useractivation == 2)
            return "adminactivate";
        else
            return $user->id;
    }

}