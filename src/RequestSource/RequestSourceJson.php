<?php

namespace App\RequestSource;

use App\RequestSource\RequestSourceInterface;

class RequestSourceJson implements RequestSourceInterface
{
	/**
	 * File with requests to subjects of education
	 *
	 */
	private $jsonFile;

	public function __construct($jsonFile)
	{
		$this->jsonFile = realpath(__DIR__.'/../../web/'.$jsonFile);
	}

	/**
	 * Get data of requests
	 *
	 * @return object
	 */
	public function getData()
	{
		$data = json_decode(file_get_contents($this->jsonFile));

		if ($data === null) {
			throw new \Exception("Data of requests is not correct", 1);
		}

		return $data;
	}
}