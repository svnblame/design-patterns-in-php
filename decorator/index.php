<?php 

class BaseInspection {
	public function getCost()
	{
		return 19;
	}
}

echo (new BasicInspection())->getCost() . PHP_EOL;
