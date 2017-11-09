<?php

namespace App\DI;

use App\DI;

class DependencyInjection
{
	private $config;
	private $services = array();

	public function __construct()
	{
		$this->config = json_decode(file_get_contents(realpath(__DIR__.'/../config/services.json')), 1);
	}

	public function get($serviceName)
	{
		if (isset($this->services[$serviceName])) {
			return $this->services[$serviceName];
		}

		$service = $this->load($serviceName);
		$this->services[$serviceName] = $service;

		return $service;
	}

	private function load($serviceName)
	{
		$argumenst = array();

		foreach ($this->config[$serviceName]['arguments'] AS $argument) {
			if (substr($argument, 0, 1) == '@') {
				$service = substr($argument, 1);
				if ($serviceName == $service) {
					throw new \Exception("Curcular Reference in arguments", 1);
				}
				$arguments[] = $this->load($service);
			} else {
				$arguments[] = $argument;
			}
		}

		return new $this->config[$serviceName]['class'](...$arguments);
	}
}