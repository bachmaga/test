<?php

namespace App\Tests\RequestSource;

use App\Test\KernelTest;

class RequestSourceJsonTest extends KernelTest
{
	/**
	 * Requests from source json file
	 *
	 * @var \App\RequestSource\RequestSourceJson
	 */
	private $requestSource;

	public function setUp()
	{
		self::initKernel();

		$this->requestSource = static::$di->get('request_source.json');
	}

	/**
	 * Test RequestSourceJson::getData
	 */
	public function testGetData()
	{
		$data = $this->requestSource->getData();

		$this->assertInternalType('object', $data);
		$this->assertInternalType('object', $data);
		$this->assertObjectHasAttribute('Columns', $data);
		$this->assertObjectHasAttribute('Rows', $data);
	}
}