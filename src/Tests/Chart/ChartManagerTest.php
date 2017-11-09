<?php

namespace App\Tests\Chart;

use App\Test\KernelTest;

class ChartManagerTest extends KernelTest
{
	/**
	 * Chart manager
	 *
	 * @var \App\CHart\ChartManager
	 */
	private $chartManager;

	public function setUp()
	{
		self::initKernel();

		$this->chartManager = static::$di->get('chart_manager');
	}

	/**
	 * Test ChartManager::saveDataChart
	 *
	 */
	public function testSaveDataChart()
	{
		$data = array('VN' => 0, 'PT' => 1);
		$this->chartManager->saveDataChart($data);

		$savedData = $this->chartManager->getDataChart();

		$this->assertInternalType('array', $savedData);
		$this->assertEquals(0, $savedData['VN']);
		$this->assertEquals(1, $savedData['PT']);
	}
}