<?php
/**
 * @version     1.8.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsControllerResults extends Babelu_examsControllerAdmin
{
	public function &getModel($name = 'Result', $prefix = 'Babelu_examsModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
	
	public function csvReport()
	{
		$model = $this->getModel('Report', 'Babelu_examsModel', array('ignore_request' => true));
		$model->setModelState();
		$data = $model->getItems();
		$this->exportAsCSV($data);
	}
	
	protected function exportAsCSV($data)
	{
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment;filename=B_U_E_Results_Report.csv');
	
		if ($fp = fopen('php://output','w'))
		{
			$fields = array(
					'Examinee',
					'Examinee Email',
					'Exam',
					'Submitted Date',
					'Submitted Time',
					'Time Spent',
					'Point Grade',
					'Percentage Grade',
					'Result',
					'Administrator');
			fputcsv($fp, $fields);
				
			foreach ($data AS $row)
			{
				$fixed_row = array();
				$fixed_row[] = $row->examinee;
				$fixed_row[] = $row->examinee_email;
				$fixed_row[] = $row->exam;
				$submitted = new JDate($row->submitted_date);
				$fixed_row[] = $submitted->format('m-d-Y');
				$fixed_row[] = $submitted->format('H:i:s');
				$fixed_row[] = gmdate('H:i:s', $row->time_spent);
				$fixed_row[] = $row->point_grade;
				$fixed_row[] = $row->percentage_grade.'%';
	
				$result_array = array();
				$result_array[0] = JText::_('COM_BABELU_EXAMS_STATUS_PENDING');
				$result_array[1] = JText::_('COM_BABELU_EXAMS_STATUS_FAIL');
				$result_array[2] = JText::_('COM_BABELU_EXAMS_STATUS_PASS');
				$result_array[3] = JText::_('COM_BABELU_EXAMS_STATUS_PENDING');
	
				$fixed_row[] = $result_array[$row->status];
				$fixed_row[] = $row->notify_name;
	
				fputcsv($fp, $fixed_row);
	
			}
				
			fclose($fp);
		}
	
		JFactory::getApplication()->close();
	}
}