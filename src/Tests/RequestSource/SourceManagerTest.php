<?php

namespace App\Tests\RequestSource;

use App\Test\KernelTest;

class SourceManagerTest extends KernelTest
{
	/**
	 * Source manager
	 *
	 * @var \App\RequestSource\SourceManager
	 */
	private $sourceManager;

	public function setUp()
	{
		self::initKernel();

		$this->sourceManager = static::$di->get('source_manager');
	}

	/**
	 * Test SourceManager::getDataOfRequestsByMonths
	 */
	public function testGetDataOfRequestsByMonths()
	{
		$data = $this->sourceManager->getDataOfRequestsByMonths();

		$this->assertInternalType('object', $data);
		$this->assertInternalType('object', $data);
		$this->assertObjectHasAttribute('Columns', $data);
		$this->assertObjectHasAttribute('Rows', $data);
	}
}