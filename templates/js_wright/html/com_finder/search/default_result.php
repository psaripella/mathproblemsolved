<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
  <h4 class="result->title <?php echo $mime; ?>"><a href="<?php echo JRoute::_($route); ?>"><?php echo $this->result->alias; ?></a></h4>
 
 */




defined('_JEXEC') or die;

// Get the mime type class.
$mime = !empty($this->result->mime) ? 'mime-' . $this->result->mime : null;

// Get the base url.
$base = JURI::getInstance()->toString(array('scheme', 'host', 'port'));

// Get the route with highlighting information.
if (!empty($this->query->highlight) && empty($this->result->mime) && $this->params->get('highlight_terms', 1) && JPluginHelper::isEnabled('system', 'highlight')) {
  $route = $this->result->route . '&highlight=' . base64_encode(serialize($this->query->highlight));
} else {
  $route = $this->result->route;
}
?>

<li>


<a class="result-title2"  href="<?php echo JRoute::_($route); ?>"><img border="0" <?php echo $this->result->created_by_alias; ?> alt="<?php echo $this->result->checked_out_time; ?>" ></a>

<?php 


//$images=json_decode($hello);
# echo $hello;
/*
$pictures = json_decode('{"image_intro":"images/integral-calculus/problems/problem12/question/question12.jpg",
                          "float_intro":"",
                          "image_intro_alt":"",
                          "image_intro_caption":"",
                          "image_fulltext":"",
                          "float_fulltext":"",
                          "image_fulltext_alt":"",
                          "image_fulltext_caption":""
                         }',
                         true);
*/

?> 




  <?php if ($this->params->get('show_url', 1)): ?>
  <small class="small result-url<?php echo $this->pageclass_sfx; ?>"><?php echo $base . JRoute::_($this->result->route); ?></small>
  <?php endif; ?>
</li>
