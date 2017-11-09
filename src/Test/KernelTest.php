<?php

namespace App\Test;

use App\DI\DependencyInjection;
use PHPUnit\Framework\TestCase;

class KernelTest extends TestCase
{
	protected static $di;

	public static function initKernel()
	{
		if (static::$di == null) {
		    static::$di = new DependencyInjection();
		}

		return static::$di;
	}
}