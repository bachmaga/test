<?php

namespace App\Tests\Chart;

use App\Test\KernelTest;

class ChartFileStorageTest extends KernelTest
{
	/**
	 * The storage of settings of the chart
	 *
	 * @var \App\Chart\ChartFileStorage
	 */
	private $chartStorage;

	public function setUp()
	{
		self::initKernel();

		$this->chartStorage = static::$di->get('chart_storage.file');
	}

	/**
	 * Test ChartFileStorage::save
	 */
	public function testSave()
	{
		$data = array('VN' => 0, 'PT' => 1);
		$this->chartStorage->save($data);

		$savedData = $this->chartStorage->get();

		$this->assertInternalType('array', $savedData);
		$this->assertEquals(0, $savedData['VN']);
		$this->assertEquals(1, $savedData['PT']);
	}
}