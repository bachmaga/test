<?php

namespace App\Chart;

class ChartManager
{
	/**
	 * The storage of settings of the chart
	 *
	 * @var \App\Chart\ChartStorageInterface
	 */
	private $chartStorage;

	public function __construct(ChartStorageInterface $chartStorage)
	{
		$this->chartStorage = $chartStorage;
	}

	/**
	 * Save array setting
	 *
	 * @param array $data
	 */
	public function saveDataChart(array $data)
	{
		$this->chartStorage->save($data);
	}

	/**
	 * Get array setting
	 *
	 * @return array
	 */
	public function getDataChart()
	{
		return $this->chartStorage->get();
	}
}