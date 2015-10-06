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
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<ul class="adminformlist">
            
			<li>
				<?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?>
			</li>
          
			<li>
				<?php echo $this->form->getLabel('title'); ?>
				<?php echo $this->form->getInput('title'); ?>
			</li>

            <li>
            	<?php echo $this->form->getLabel('checked_out'); ?>
                <?php echo $this->form->getInput('checked_out'); ?>
            </li>
                
            <li>
            	<?php echo $this->form->getLabel('checked_out_time'); ?>
                <?php echo $this->form->getInput('checked_out_time'); ?>
            </li>

            </ul>
		</fieldset>
	</div>
