<?php
/**
* Joomlaquiz Deluxe Component for Joomla 3
* @package Joomlaquiz Deluxe
* @author JoomPlace Team
* @copyright Copyright (C) JoomPlace, www.joomplace.com
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/
defined('_JEXEC') or die('Restricted Access');
$my = JFactory::getUser();
 
$tag = JFactory::getLanguage()->getTag();
$lang = JFactory::getLanguage();
$lang->load('com_joomlaquiz', JPATH_SITE, $tag, true);

global $Itemid;
$document 	= JFactory::getDocument();
$document->addStyleSheet(JURI::root().'components/com_joomlaquiz/views/templates/tmpl/joomlaquiz_standard/css/jq_template.css');		

$rows = (isset($this->results[0])) ? $this->results[0] : null;
$pagination = (isset($this->results[1])) ? $this->results[1] : null;

$database = JFactory::getDBO();
$share_id = JFactory::getApplication()->input->get('share_id', '');
$is_share = false;
if($share_id != ''){
	$database->setQuery("SELECT COUNT(id) FROM `#__quiz_r_student_share` WHERE `id` = '".$share_id."'");
	$is_share = $database->loadResult();
}

if(!$my->id && !$is_share) {
	echo JText::_('COM_RESULTS_FOR_REGISTERED');
} elseif(!count($rows)) {
	?>
	<div class="contentpane joomlaquiz">
		<h1 class="componentheading"><?php echo JText::_('COM_SHOW_RESULTS_TITLE'); ?></h1>
		<br/>
		<?php
			echo JText::_('COM_NO_RESULTS');
			echo JoomlaquizHelper::poweredByHTML();
		?>
	</div>
	<?php
} else {
?>
<style>
.limit{
	position: relative !important;
}
</style>
<div class="contentpane">
	<h1 class="jq_results_title"><?php echo JText::_('COM_SHOW_RESULTS_TITLE'); ?></h1>
	<br />
	<div class="jq_results_descr">
		<strong><?php echo JText::_('COM_SHOW_RESULTS_DESCR'); ?></strong>
	</div>
	<br />
	<div class="jq_results_container">
		<form name="adminForm" action="index.php?option=com_joomlaquiz&view=results<?php echo JoomlaquizHelper::JQ_GetItemId();?>" method="post">
		<table class="jq_results_container_table table-striped" cellpadding="10" cellspacing="10" border="0" width="100%">
		<tr>	
			<td class="sectiontableheader">#</td>
			<td class="sectiontableheader"><?php echo JText::_('COM_JQ_QUIZ'); ?></td>
			<td class="sectiontableheader"><?php echo JText::_('COM_JQ_DATE_TIME'); ?></td>
			<td class="sectiontableheader"><?php echo JText::_('COM_JQ_YOUR_SCORE'); ?></td>
			<td class="sectiontableheader"><?php echo JText::_('COM_JQ_PASS_SCORE'); ?></td>
			<td class="sectiontableheader"><?php echo JText::_('COM_JQ_MAX_SCORE'); ?></td>				
			<td class="sectiontableheader"><?php echo JText::_('COM_JQ_PASSED'); ?></td>
			<td class="sectiontableheader"><?php echo JText::_('COM_JQ_SPEND_TIME'); ?></td>
			<td class="sectiontableheader"><?php echo JText::_('COM_JQ_CERTIFICATE'); ?></td>
		</tr>

			<?php
			$k = 1;
			for ($i=0, $n=count($rows); $i < $n; $i++) {
				$row = $rows[$i];
				$link 	= "index.php?option=com_joomlaquiz&task=results.sturesult&id=".$row->id.JoomlaquizHelper::JQ_GetItemId();

				$img_passed	= $row->c_passed ? 'result_panel_true.png' : 'result_panel_false.png';
				$alt_passed = $row->c_passed ? JText::_('COM_JQ_RESULT_PASSED') : JText::_('COM_JQ_RESULT_FAILED');			
				?>
				<tr class="sectiontableentry<?php echo $k; ?>">
					<td align="center"><?php echo ( $pagination->limitstart + $i + 1 ); ?></td>
					<td align="left">
						<a href="<?php echo $link; ?>">								
							<?php echo $row->c_title; ?>
						</a>
					</td>
					<td align="left">
						<?php echo $row->c_date_time; ?>
					</td>
					<td align="left">
						<?php if ($row->c_passed == -1)	 { echo JText::_('COM_JQ_SCORE_PENDING'); } else {?>
						<?php echo number_format($row->user_score, 2, '.', ' '); ?>
						<?php }?>
					</td>
					
					<td align="left">
						<?php
						if ($row->c_passing_score) {
						$passed_score = ceil(($row->c_full_score * $row->c_passing_score) / 100);
							echo $passed_score . (strlen($row->c_passing_score)?(" (".$row->c_passing_score."%)"):'');
						} else {
							echo JText::_('COM_JQ_NA');
						}
						?>
					</td>
					<td align="left">
						<?php echo $row->c_full_score; ?>
					</td>
					<td align="center">
						<?php if ($row->c_passed == -1)	 { ?><strong>?</strong><?php } else {?>
						<img src="<?php echo JURI::root();?>components/com_joomlaquiz/assets/images/<?php echo $img_passed;?>" border="0" alt="<?php echo $alt_passed; ?>" />
						<?php }?>								
					</td>
					<td align="left">
						<?php
						$tot_min = floor($row->c_total_time / 60);
						$tot_sec = $row->c_total_time - $tot_min*60;
						echo str_pad($tot_min,2, "0", STR_PAD_LEFT).":".str_pad($tot_sec,2, "0", STR_PAD_LEFT);
						?>
					</td>
					<td align="center">
						<?php if(isset($GLOBALS['quiz_access_cert'][$row->c_quiz_id]) && $GLOBALS['quiz_access_cert'][$row->c_quiz_id]){?>
							<?php if($row->c_certificate && $row->c_passed):?>
							<a onclick="window.open ('<?php echo JRoute::_("index.php?option=com_joomlaquiz&task=printcert.get_certificate&stu_quiz_id=".$row->id.".&user_unique_id=".$row->unique_id); ?>','blank');" href="javascript:void(0)"><?php echo JText::_('COM_JOOMLAQUIZ_DOWNLOAD');?></a>
							<?php endif;?>
						<?php }?>
					</td>
				</tr>
				<?php
				$k = 3 - $k;
			}?>
			<tfoot>
			<tr>
				<td colspan="8"><?php echo $pagination->getListFooter(); ?></td>
			</tr>
			</tfoot>
			</table>
			<input type="hidden" name="option" value="com_joomlaquiz" />
			<input type="hidden" name="view" value="results" />
			<input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />
		</form>
	</div>
</div>
<?php 
} 
?>