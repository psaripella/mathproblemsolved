<?php
/*
 * +--------------------------------------------------------------------------+
 * | Copyright (c) 2010 Add This, LLC                                         |
 * +--------------------------------------------------------------------------+
 * | This program is free software; you can redistribute it and/or modify     |
 * | it under the terms of the GNU General Public License as published by     |
 * | the Free Software Foundation; either version 3 of the License, or        |
 * | (at your option) any later version.                                      |
 * |                                                                          |
 * | This program is distributed in the hope that it will be useful,          |
 * | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
 * | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
 * | GNU General Public License for more details.                             |
 * |                                                                          |
 * | You should have received a copy of the GNU General Public License        |
 * | along with this program.  If not, see <http://www.gnu.org/licenses/>.    |
 * +--------------------------------------------------------------------------+
 */

	/**
	 *
	 * Creates AddThis sharing button and appends it to the user selected pages.
	 * Reads the user settings and creates the button accordingly.
	 *
	 * @author AddThis Team - Sol, Vipin
	 * @version 3.0.0
	 */

    // no direct access
	defined('_JEXEC') or die('Restricted access');

	appendAddThisShareJs($params);

	//Adds AddThis script to page
	appendAddThisScript($params);
	

	/**
	 * appendAddThisScript
	 *
	 * Reads button settings, creates corresponding AddThis button, reads AddThis configuration values,
	 * creates configuration object and Adds the resultant code to pages.
	 *
	 * @param object $params
	 * @return void
	 *
	 */
	function appendAddThisScript($params)
	{

    		//Creating div elements for AddThis
		$outputValue = " <div class='joomla_add_this'>";
		$outputValue .= "<!-- AddThis Button BEGIN -->" . PHP_EOL;

		//Creates addthis configuration script
		$outputValue .= "<script type='text/javascript'>\r\n";
		$outputValue .= "var addthis_product = 'jlm-3.0';\r\n";
		$outputValue .= "var addthis_config = {\r\n";
		$configParams = populateParams($params);
		$configValue = prepareConfigValues($configParams);
		
    	//Removing the last comma and end of line characters
    	if("" != trim($configValue))
		{
		  	$outputValue .= implode( ',', explode( ',', $configValue, -1 ));
		}
		$outputValue .= "\n}\n</script>". PHP_EOL;
    	
    	//Creates the button code depending on the button style chosen
        $buttonValue = getButtonSet($params);

		$outputValue .= $buttonValue;

		$outputValue .= "<!-- AddThis Button END -->". PHP_EOL;
		$outputValue .= "</div>";

        //Regular expression for finding the custom tag which disables AddThis button in the article.
        $switchregex = "#{addthis (on|off)}#s";

		if(class_exists("JFactory"))
		{ 
			//Gets frontpage
			$menu = JFactory::getApplication()->getMenu();
			//Sets the visibility of AddThis button in frontpage depending on user's settings
			if((JUri::getInstance()->toString() == JUri::base()) && ($params->get("show_frontpage") == "false")) {
				$hide_frontpage = true;
			  	$outputValue = "";
			}
		}

		echo $outputValue;
	}

	/**
     * Toolbox
     *
     * Return which style is selected.
     *
     * @return string returns the toolbox html
     */
    function getButtonSet($params)
    {
		switch($params->get("button_style")){
        	
        	case 'style_1':
        		$buttonValue = '<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_button_preferred_1"></a>
									<a class="addthis_button_preferred_2"></a>
									<a class="addthis_button_preferred_3"></a>
									<a class="addthis_button_preferred_4"></a>
									<a class="addthis_button_compact"></a>
									<a class="addthis_counter addthis_bubble_style"></a>
								</div>';
        		break;
        		
        	case 'style_2':
        		$buttonValue = '<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
									<a class="addthis_button_tweet"></a>
									<a class="addthis_button_pinterest_pinit"></a>
									<a class="addthis_counter addthis_pill_style"></a>
								</div>';
				break;
			
        	case 'style_4':
        		$buttonValue = '<div class="addthis_toolbox addthis_default_style ">
									<a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4f0d95b663c861f6" class="addthis_button_compact">Share</a>
									<span class="addthis_separator">|</span>
									<a class="addthis_button_preferred_1"></a>
									<a class="addthis_button_preferred_2"></a>
									<a class="addthis_button_preferred_3"></a>
									<a class="addthis_button_preferred_4"></a>
								</div>';
        		break;
        		
			case 'style_5':
        		$buttonValue = '<div class="addthis_toolbox addthis_default_style ">
									<a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4f0d960e09c42ec4" class="addthis_button_compact">Share</a>
								</div>';
        		break;
        		
        	case 'style_6':
        		$buttonValue = '<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_counter addthis_pill_style"></a>
								</div>';
        		break;
        		
			case 'style_7':
        		$buttonValue = '<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_counter"></a>
								</div>';
        		break;
        		        		
			case 'style_8':
        		$buttonValue = '<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v='.$params->get("menu_version").'">
									<img src="'.$params->get("custom_button_url").'" alt="Bookmark and Share" style="border:0"/>
								</a>';
        		break;
        					
        	default :
        		$buttonValue = '<div class="addthis_toolbox addthis_default_style addthis_32x32_style ">
									<a class="addthis_button_preferred_1"></a>
									<a class="addthis_button_preferred_2"></a>
									<a class="addthis_button_preferred_3"></a>
									<a class="addthis_button_preferred_4"></a>
									<a class="addthis_button_compact"></a>
									<a class="addthis_counter addthis_bubble_style"></a>
								</div> ';
        		break;        		
        }
        
        return $buttonValue;
    }
 

    /**
     * populateParams
     *
     * Gets the parameters and holds them as a collection
     *
     * @return Array of user selected AddThis configuration values
     */
     function populateParams($params)
     {
        $arrParams = array("button_style", "menu_version","custom_button_code", "addthis_services_compact",
        				   "addthis_services_exclude", "addthis_services_expanded", "addthis_services_custom",
        				   "addthis_click", "addthis_hover_direction",
        				   "addthis_data_track_clickback", "addthis_language", "position", "show_frontpage", "toolbox_more_services_mode",
        				   "addthis_ga_tracker");
        foreach ( $arrParams as $key => $value ) {
			$arrParamValues[$value] = $params->get($value);	
		}
		return $arrParamValues;
     }

    /**
     * prepareConfigValues
     *
     * Prepares configuration values for AddThis button from user saved settings
     *
     * @return void
     */
    function prepareConfigValues($arrParamValues)
    {
    	$configValue = "";
		$arrConfigs = array("addthis_services_compact" => "services_compact",
							"addthis_services_exclude" => "services_exclude", "addthis_services_expanded" => "services_expanded",
							"addthis_click" => "ui_click",
							"addthis_hover_direction" => "ui_hover_direction", "addthis_data_track_clickback" => "data_track_clickback",
							"addthis_language" => "ui_language", "addthis_ga_tracker" => "data_ga_property");

    	foreach ( $arrConfigs as $key => $value ) {
		   if(in_array($value, array("services_compact", "services_exclude", "services_expanded", "ui_language", "data_ga_property")) && ($arrParamValues[$key] != ""))
		           $configValue .= $value . ":'" . $arrParamValues[$key] . "'," . PHP_EOL;
		   elseif(in_array($value, array("ui_hover_direction")) && ($arrParamValues[$key] != ""))
				   $configValue .= $value . ":" . $arrParamValues[$key] . "," .  PHP_EOL;
		   elseif(in_array($value, array("ui_click", "data_track_clickback", "ui_use_css", )) && ($arrParamValues[$key] != ""))
				   $configValue .= "true" == $arrParamValues[$key]? $value . ":true," . PHP_EOL : (("ui_use_css" == $value || "data_track_clickback" == $value) ? $value . ":false," . PHP_EOL : "");
		}
		return $configValue;
    }

	/**
	 * Appending addthis main script to the head
	 *
	 * @return void
	 */    
    function appendAddThisShareJs($params){
        	
    	if($params->get("profile_id")!=""){
    		$profile = urlencode($params->get("profile_id"));
    	} else {
    		$profile = "xa-52206d28623a1b2c";
    	}    	
    	//Append addthis javascript file
	    $at_sl_script = "<script type='text/javascript'>". PHP_EOL;
	    $at_sl_script .= "window.addEventListener('load', function (){". PHP_EOL;
	    $at_sl_script .= "\tif(typeof addthis_conf == 'undefined'){". PHP_EOL;
	    $at_sl_script .= "\t\tvar script = document.createElement('script');". PHP_EOL;
	    $at_sl_script .= "\t\tscript.src = '//s7.addthis.com/js/300/addthis_widget.js#pubid=".$profile."';". PHP_EOL;
	    $at_sl_script .= "\t\tdocument.getElementsByTagName('head')[0].appendChild(script);". PHP_EOL;	    
	    $at_sl_script .= "\t}\n});". PHP_EOL;	    
	    $at_sl_script .= "</script>". PHP_EOL;
	    
	    echo $at_sl_script;   	
    }  