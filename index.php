<?php

//StageM 1
function sortWordsInStringByNumber(string $string)
{
    if (strlen($string) == 0) {
        return '';
    } else {
        $array = explode(' ', $string);
        foreach ($array as $word) {
            preg_match('/\d{1}/', $word, $matches);
            $tempArray[$matches[0]] = $word;
        }
        ksort($tempArray);
        return implode(' ', $tempArray);
    }
}

var_dump(sortWordsInStringByNumber('g5et ski3lls on6 use1 your2 to4 7top'));

//StageM 2

interface Power
{
    public function setTime(float $time);

    public function setEngine(float $engine);

    public function setWeight(int $weight);

    public function getTime(): float;

    public function getEngine(): float;

    public function getWeight(): int;

}

abstract class Auto
{
    /** @var string */
    protected $name;

    /** @var int */
    protected $seats;

    /** @var string */
    protected $color;

    /** @var float */
    protected $volume;

    /** @var int */
    protected $year;

    /** @var string */
    protected $licensePlate;

    /**
     * @param int $seats
     */
    public function setSeats(int $seats): self
    {
        $this->seats = $seats;
        return $this;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param float $volume
     */
    public function setVolume(float $volume): self
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): self
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSeats(): int
    {
        return $this->seats;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return float
     */
    public function getVolume(): float
    {
        return $this->volume;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    public function __construct($name, $licensePlate)
    {
        $this->name = $name;
        $this->licensePlate = $licensePlate;
    }
}

class Truck extends Auto implements Power
{
    /** @var float */
    private $time;

    /** @var float */
    private $engine;

    /** @var int */
    private $capacity = 14000;

    /** @var int */
    private $quantityOfAxes;

    /** @var int */
    private $weight;

    /** @var int */

    private $totalWeight = 0;

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @param mixed $engine
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

    /**
     * @param int $capacity
     */
    public function setCapacity(int $capacity): void
    {
        $this->capacity = $capacity;
    }

    /**
     * @param mixed $quantityOfAxes
     */
    public function setQuantityOfAxes($quantityOfAxes): void
    {
        $this->quantityOfAxes = $quantityOfAxes;
    }

    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getTime(): float
    {
        return $this->time;
    }

    /**
     * @return float
     */
    public function getEngine(): float
    {
        return $this->engine;
    }

    /**
     * @return float
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    /**
     * @return int
     */
    public function getQuantityOfAxes(): int
    {
        return $this->quantityOfAxes;
    }

    public function addCar(Car $car): bool
    {
        $this->totalWeight += $car->getWeight();
        if ($this->totalWeight < $this->getCapacity()) {
            return true;
        } else return false;
    }
}

class Car extends Auto implements Power
{
    private $time;
    private $engine;
    private $bodyType;
    private $typeOfFuel;
    private $weight;

    public function setTime(float $time)
    {
        $this->time = $time;
        return $this;
    }

    public function setEngine(float $engine): self
    {
        $this->engine = $engine;
        return $this;
    }

    /**
     * @param mixed $bodyType
     */
    public function setBodyType($bodyType): self
    {
        $this->bodyType = $bodyType;
        return $this;
    }

    /**
     * @param mixed $typeOfFuel
     */
    public function setTypeOfFuel($typeOfFuel): self
    {
        $this->typeOfFuel = $typeOfFuel;
        return $this;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    public function getTime(): float
    {
        return $this->time;
    }

    public function getEngine(): float
    {
        return $this->engine;
    }

    /**
     * @return mixed
     */
    public function getBodyType()
    {
        return $this->bodyType;
    }

    /**
     * @return mixed
     */
    public function getTypeOfFuel()
    {
        return $this->typeOfFuel;
    }

    /**
     * @return mixed
     */
    public function getWeight(): int
    {
        return $this->weight;
    }
}

$track = new Truck('Mercedes', 'ВК0212АА');
$track->setCapacity(5000);

$cars[] = (new Car('BMW', 'АА0213ВС'))->setWeight(2300);
$cars[] = (new Car('Audi', 'АІ0212ВС'))->setWeight(1900);
$cars[] = (new Car('Renault', 'АС2333ВС'))->setWeight(2100);

$overweight = 0;
$totalCarsWeight = 0;
foreach ($cars as $car) {
    $totalCarsWeight += $car->getWeight();
    if (!$track->addCar($car)) {
        $overweight = $totalCarsWeight - $track->getCapacity();
        echo 'Автомобіль з номерним знаком ' . $car->getLicensePlate() . ' неможливо завантажити. Зайва вага ' . $overweight . 'кг';
    }
}
