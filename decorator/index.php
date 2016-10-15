<?php

interface CarService {
    public function getCost();
    public function getDescription();
}

class BasicInspection implements CarService {
	public function getCost()
	{
		return 25;
	}

	public function getDescription()
    {
        return 'Basic inspection';
    }
}

class OilChange implements CarService {
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ', Oil change';
    }
}

class TireRotation implements CarService {
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ', Tire rotation';
    }
}

$service = new BasicInspection();
$service = new OilChange($service);
$service = new TireRotation($service);

echo 'Service: ' .  $service->getDescription() . PHP_EOL;
echo 'Total Cost: $' . $service->getCost() . PHP_EOL;
