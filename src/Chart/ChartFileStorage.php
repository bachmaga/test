<?php

namespace App\Chart;

class ChartFileStorage implements ChartStorageInterface
{
	private $cachFile;

	public function __construct($file)
	{
		$this->cacheFile = realpath(__DIR__.'/../../'.$file);
	}

	public function save(array $data)
	{
		file_put_contents($this->cacheFile, json_encode($data));
	}

	public function get()
	{
		return json_decode(file_get_contents($this->cacheFile), 1);
	}
}