<?php

/**
 * @version    $version 3.0 Peter Bui  $
 * @copyright    Copyright (C) 2012 PB Web Development. All rights reserved.
 * @license    GNU/GPL, see LICENSE.php
 * Updated    27th October 2013
 *
 * Twitter: @astroboysoup
 * Blog: http://pbwebdev.com/blog/
 * Email: peter@pbwebdev.com.au
 *
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

class plgSystemGoogleAnalytics extends JPlugin {

    function plgGoogleAnalytics(&$subject, $config) {
        parent::__construct($subject, $config);
        $this->_plugin = JPluginHelper::getPlugin('system', 'GoogleAnalytics');
        $this->_params = new JParameter($this->_plugin->params);
    }

    function onAfterRender() {
        // Initialise variables
        $trackerCode = $this->params->get('code', '');
        $verify = $this->params->get('verify', '');
        $verifyOutput = '<meta name="google-site-verification" content="' . $verify . '" />';

        $app = JFactory::getApplication();

        // skip if admin page
        if ($app->isAdmin()) {
            return;
        }

        //getting body code and storing as buffer
        $buffer = JResponse::getBody();

        //embed Google Analytics code
        $javascript = "<script type=\"text/javascript\">
 var _gaq = _gaq || [];
 _gaq.push(['_setAccount', '" . $trackerCode . "']);
";

        $javascript .= "_gaq.push(['_trackPageview']);

 (function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 })();
</script>
<!-- Google Analytics Plugin by PB Web Development -->";


            // adding the Google Analytics code in the header before the ending </head> tag and then replacing the buffer
            $buffer = preg_replace("/<\/head>/", "\n\n" . $verifyOutput . "\n\n" . $javascript . "\n\n</head>", $buffer);
        
        //output the buffer
        JResponse::setBody($buffer);

        return true;
    }

}

?>