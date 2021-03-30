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

    private $initialROValue;

    private $closedROValue;

    /**
     * @var DMSResultTechnician
     */
    private $technician;

    public function __construct()
    {
        $this->customer = new DMSResultCustomer();
        $this->advisor = new DMSResultAdvisor();
        $this->technician = new DMSResultTechnician();
    }

    public function getCustomer(): DMSResultCustomer
    {
        return $this->customer;
    }

    /**
     * @return $this
     */
    public function setCustomer(DMSResultCustomer $customer)
    {
        $this->customer = $customer;

        return $this;
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
    public function setNumber($number): DMSResult
    {
        $this->number = $number;

        return $this;
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
    public function setRoKey($roKey): DMSResult
    {
        $this->roKey = $roKey;

        return $this;
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
    public function setDate($date): DMSResult
    {
        $this->date = $date;

        return $this;
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
    public function setWaiter($waiter): DMSResult
    {
        $this->waiter = $waiter;

        return $this;
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
    public function setPickupDate($pickupDate): DMSResult
    {
        $this->pickupDate = $pickupDate;

        return $this;
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
    public function setYear($year): DMSResult
    {
        $this->year = $year;

        return $this;
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
    public function setMake($make): DMSResult
    {
        $this->make = $make;

        return $this;
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
    public function setModel($model): DMSResult
    {
        $this->model = $model;

        return $this;
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
    public function setMiles($miles): DMSResult
    {
        $this->miles = $miles;

        return $this;
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
    public function setVin($vin): DMSResult
    {
        $this->vin = $vin;

        return $this;
    }

    public function getAdvisor(): DMSResultAdvisor
    {
        return $this->advisor;
    }

    public function setAdvisor(DMSResultAdvisor $advisor): DMSResult
    {
        $this->advisor = $advisor;

        return $this;
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
    public function setRaw($raw): DMSResult
    {
        $this->raw = $raw;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitialROValue()
    {
        return $this->initialROValue;
    }

    /**
     * @param mixed $initialROValue
     */
    public function setInitialROValue($initialROValue): DMSResult
    {
        $this->initialROValue = $initialROValue;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClosedROValue()
    {
        return $this->closedROValue;
    }

    /**
     * @param mixed $closedROValue
     */
    public function setClosedROValue($closedROValue): void
    {
        $this->closedROValue = $closedROValue;
    }

    /**
     * @return DMSResultTechnician
     */
    public function getTechnician(): DMSResultTechnician
    {
        return $this->technician;
    }

    /**
     * @param DMSResultTechnician $technician
     */
    public function setTechnician(DMSResultTechnician $technician): void
    {
        $this->technician = $technician;
    }



}
