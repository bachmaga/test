<?php

namespace App\Chart;

interface ChartStorageInterface
{
	public function save(array $data);
	public function get();
}