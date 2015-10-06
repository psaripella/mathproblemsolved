<?php
/**
 * @version     1.10.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;
?>

<?php if (Babelu_examsHelperIntegration::isJ3()):?>
	<?php echo $this->loadTemplate('j3form');?>
<?php else:?>
	<?php echo $this->loadTemplate('form');?>
<?php endif;?>
