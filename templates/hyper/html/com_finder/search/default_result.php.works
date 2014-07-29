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
//Phani:
$images = json_decode($this->item->images); // new line
?>

<li>

<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
   <?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
   <div class="img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
   <img
      <?php if ($images->image_intro_caption):
         echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
      endif; ?>
      src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
   </div>
<?php endif; ?>

<a href="<?php echo JRoute::_($route); ?>"><img border="0" <?php echo $this->result->created_by_alias; ?> alt="Pulpit rock" ></a>


  <?php if ($this->params->get('show_description', 1)): ?>
  <p class="result-text<?php echo $this->pageclass_sfx; ?>">
   <?php echo $this->result->summary; ?>
  <?php echo '<div style="float: left;margin: 5px 10px;"><img src="'. $this->escape($result->image_intro).'" alt="" /></div>';?>
  </p>
  <?php endif; ?>


  <?php if ($this->params->get('show_url', 1)): ?>
  <small class="small result-url<?php echo $this->pageclass_sfx; ?>"><?php echo $base . JRoute::_($this->result->route); ?></small>
  <?php endif; ?>
</li>
