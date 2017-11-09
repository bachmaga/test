<?php

namespace App\Chart;

class ChartFileStorage implements ChartStorageInterface
{
	/**
	 * File with setting of the chart
	 *
	 * @var string
	 */
	private $cachFile;

	public function __construct($file)
	{
		$this->cacheFile = realpath(__DIR__.'/../../'.$file);
	}

	/**
	 * Save array setting
	 *
	 * @param array $data
	 */
	public function save(array $data)
	{
		file_put_contents($this->cacheFile, json_encode($data));
	}

	/**
	 * Get array setting
	 *
	 * @return array
	 */
	public function get()
	{
		return json_decode(file_get_contents($this->cacheFile), 1);
	}
}