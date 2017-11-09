<?php

namespace App\Controller;

class DefaultController extends Controller
{
	/**
	 * Default Action
	 */
	public function indexAction()
	{
		$sourceManager = $this->di->get('source_manager');
		$chartManager = $this->di->get('chart_manager');

		$this->render('index.php', [
			'data' => $sourceManager->getDataOfRequestsByMonths(),
			'chart' => $chartManager->getDataChart()
		]);
	}

	/**
	 * Setting view chart action
	 */
	public function chartSettingAction()
	{
		$chartManager = $this->di->get('chart_manager');

		$chartManager->saveDataChart($_POST['chartData']);

		echo 'ok';
	}
}