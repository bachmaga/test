<?php 

namespace App\RequestSource;

class SourceManager
{
	private $source;

	public function __construct(RequestSourceInterface $source)
	{
		$this->source = $source;
	}

	public function getDataOfRequestsByMonths()
	{
		$data = $this->source->getData();

		return $data;
	}
}