<?php

namespace App\Entity;

use App\Soap\dealerbuilt\src\DateTime;

class DMSResult
{
    /**
     * @var DMSResultCustomer
     */
    private $customer;

    private $number;
    private $roKey;
    /**
     * @var DateTime
     */
    private $date;
    private $waiter;
    private $pickupDate;
    private $year;
    private $make;
    private $model;
    private $miles;
    private $vin;

    /**
     * @var DMSResultAdvisor
     */
    private $advisor;

    /**
     * The actual result. Used for troubleshooting.
     */
    private $raw;

    public function __construct()
    {
        $this->customer = new DMSResultCustomer();
        $this->advisor = new DMSResultAdvisor();
    }

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
    public function getNumber()
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
    public function getRoKey()
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
    public function getDate()
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
    public function getWaiter()
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
    public function getPickupDate()
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
    public function getYear()
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
    public function getMake()
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
    public function getModel()
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
    public function getMiles()
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
    public function getVin()
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

    /**
     * @return mixed
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @param mixed $raw
     */
    public function setRaw($raw): void
    {
        $this->raw = $raw;
    }


}
