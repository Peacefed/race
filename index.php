<?php

class Car {
    protected $name;
    protected $speed;

    public function __construct($name, $speed) {
        $this->name = $name;
        $this->speed = $speed;
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function getName() {
        return $this->name;
    }

    public function __toString() {
        return "{$this->name} with speed {$this->speed} km/h";
    }
}

// Subclasses
class SportsCar extends Car {
    public function __construct($name, $speed) {
        parent::__construct($name, $speed);
    }
}

class SUV extends Car {
    public function __construct($name, $speed) {
        parent::__construct($name, $speed);
    }
}

class Truck extends Car {
    public function __construct($name, $speed) {
        parent::__construct($name, $speed);
    }
}

// Race Class
class Race {
    private $cars = [];

    public function addCar(Car $car) {
        $this->cars[] = $car;
    }

    public function startRace() {
        if (empty($this->cars)) {
            echo "No cars in the race!" . PHP_EOL;
            return;
        }

        echo "Race started!" . PHP_EOL . '<br>'. '<br>';
        foreach ($this->cars as $car) {
            echo $car . PHP_EOL . '<br>'. '<br>';
        }

        // Determine the winner
        $winner = null;
        foreach ($this->cars as $car) {
            if ($winner === null || $car->getSpeed() > $winner->getSpeed()) {
                $winner = $car;
            }
        }
        echo  '<br>'. '<br>';
        echo PHP_EOL . "Winner is: " . $winner->getName() . " with a speed of " . $winner->getSpeed() . " km/h!" . PHP_EOL;
    }
}

// Main Program
// Create cars
$car1 = new SportsCar("Ferrari", rand(200, 300));
$car2 = new SUV("Range Rover", rand(150, 250));
$car3 = new Truck("Volvo Truck", rand(100, 180));

// Create race and add cars
$race = new Race();
$race->addCar($car1);
$race->addCar($car2);
$race->addCar($car3);

// Start the race
$race->startRace();
