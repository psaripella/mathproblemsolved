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

class Babelu_examsControllerProblems extends Babelu_examsControllerAdmin
{
	public function &getModel($name = 'Problem', $prefix = 'Babelu_examsModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
	
	public function csvExport()
	{
		$model = $this->getModel('Export', 'Babelu_examsModel', array('ignore_request' => true));
		$model->setModelState();
		$data = $model->getItems();
		$this->exportAsCSV($data);
	}
	
	protected function exportAsCSV($data)
	{
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment;filename=Babel_U_Exams_Problems.csv');
		if ($fp = fopen('php://output','w'))
		{
			$fields = array(
					'group',
					'problem_text',
					'correct_answers',
					'incorrect_options',
					'level','point_value',
					'result_text',
					'status'
			);
				
			fputcsv($fp, $fields);
	
			foreach ($data AS $row)
			{
				if (is_object($row))
				{
					fputcsv($fp, JArrayHelper::fromObject($row));
				}
			}
	
			fclose($fp);
		}
		JFactory::getApplication()->close();
	}
}