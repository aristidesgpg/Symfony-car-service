<?php

namespace App\Entity;

use App\Soap\dealerbuilt\src\DateTime;

/**
 * Class DMSResult.
 */
class DMSResult
{
    /**
     * @var DMSResultCustomer
     */
    private $customer;

    /**
\     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $roKey;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $waiter;

    /**
     * @var DateTime
     */
    private $pickupDate;

    /**
     * @var string
     */
    private $year;

    /**
     * @var string
     */
    private $make;

    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $miles;

    /**
     * @var string
     */
    private $vin;

    /**
     * @var DMSResultAdvisor
     */
    private $advisor;

    public function getCustomer(): DMSResultCustomer
    {
        return $this->customer;
    }

    public function setCustomer(DMSResultCustomer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getRoKey(): string
    {
        return $this->roKey;
    }

    /**
     * @param mixed $roKey
     */
    public function setRoKey($roKey): void
    {
        $this->roKey = $roKey;
    }

    /**
     * @return mixed
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getWaiter(): string
    {
        return $this->waiter;
    }

    /**
     * @param mixed $waiter
     */
    public function setWaiter($waiter): void
    {
        $this->waiter = $waiter;
    }

    /**
     * @return mixed
     */
    public function getPickupDate(): DateTime
    {
        return $this->pickupDate;
    }

    /**
     * @param mixed $pickupDate
     */
    public function setPickupDate($pickupDate): void
    {
        $this->pickupDate = $pickupDate;
    }

    /**
     * @return mixed
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year): void
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getMake(): string
    {
        return $this->make;
    }

    /**
     * @param mixed $make
     */
    public function setMake($make): void
    {
        $this->make = $make;
    }

    /**
     * @return mixed
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getMiles(): string
    {
        return $this->miles;
    }

    /**
     * @param mixed $miles
     */
    public function setMiles($miles): void
    {
        $this->miles = $miles;
    }

    /**
     * @return mixed
     */
    public function getVin(): string
    {
        return $this->vin;
    }

    /**
     * @param mixed $vin
     */
    public function setVin($vin): void
    {
        $this->vin = $vin;
    }

    public function getAdvisor(): DMSResultAdvisor
    {
        return $this->advisor;
    }

    public function setAdvisor(DMSResultAdvisor $advisor): void
    {
        $this->advisor = $advisor;
    }
}
