<?php

namespace App\Controller;

use App\DI\DependencyInjection;

class Controller
{
	protected $di;

	public function __construct(DependencyInjection $di)
	{
		$this->di = $di;
	}

	public function render($templateName, array $data = array())
	{
		extract($data);
		require_once(realpath(__DIR__.'/../View/'.$templateName));
	}
}