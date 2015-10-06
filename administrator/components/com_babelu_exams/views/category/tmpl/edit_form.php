<?php
/**
 * @version     1.0.0
 * @package
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com
 */

// no direct access
defined('_JEXEC') or die;
?>

	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<ul class="adminformlist">

				<li>
					<?php echo $this->form->getLabel('id');?>
					<?php echo $this->form->getInput('id');?>
				</li>
<!-- SOF CUSTOM FIELDS -->
				<li>
					<?php echo $this->form->getLabel('title');?>
					<?php echo $this->form->getInput('title');?>
				</li>
				
				<li>
					<?php echo $this->form->getLabel('access');?>
					<?php echo $this->form->getInput('access');?>
				</li>
				
				<li>
					<?php echo $this->form->getLabel('state');?>
					<?php echo $this->form->getInput('state');?>
				</li>
				
				<li>
					<div class="clr"></div> 
					<?php echo $this->form->getLabel('description');?>
					<div class="clr"></div>
					<?php echo $this->form->getInput('description');?>
					<div class="clr"></div>
				</li>
<!-- EOF CUSTOM FIELDS -->
				<li>
					<?php echo $this->form->getLabel('checked_out');?>
					<?php echo $this->form->getInput('checked_out');?>
				</li>

				<li>
					<?php echo $this->form->getLabel('checked_out_time');?>
					<?php echo $this->form->getInput('check_out_time');?>
				</li>
			</ul>

		</fieldset>
	</div>

