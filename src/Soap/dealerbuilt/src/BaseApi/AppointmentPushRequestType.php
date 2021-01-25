<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing AppointmentPushRequestType
 *
 * 
 * XSD Type: AppointmentPushRequest
 */
class AppointmentPushRequestType
{

    /**
     * @var string $advisorId
     */
    private $advisorId = null;

    /**
     * @var string $appointmentKey
     */
    private $appointmentKey = null;

    /**
     * @var \DateTime $appointmentTime
     */
    private $appointmentTime = null;

    /**
     * @var string $comment
     */
    private $comment = null;

    /**
     * @var string $concernPushMethod
     */
    private $concernPushMethod = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Appointments\ConcernType[] $concerns
     */
    private $concerns = null;

    /**
     * @var string $customerKey
     */
    private $customerKey = null;

    /**
     * @var string $customerStatementPushMethod
     */
    private $customerStatementPushMethod = null;

    /**
     * @var string $externalAppointmentId
     */
    private $externalAppointmentId = null;

    /**
     * @var int $mileage
     */
    private $mileage = null;

    /**
     * @var \DateTime $promisedTime
     */
    private $promisedTime = null;

    /**
     * @var string $repairOrderNumber
     */
    private $repairOrderNumber = null;

    /**
     * @var string $scenario
     */
    private $scenario = null;

    /**
     * @var int $serviceLocationId
     */
    private $serviceLocationId = null;

    /**
     * @var string $status
     */
    private $status = null;

    /**
     * @var string $statusDescription
     */
    private $statusDescription = null;

    /**
     * @var string $vehicleKey
     */
    private $vehicleKey = null;

    /**
     * @var string $vin
     */
    private $vin = null;

    /**
     * Gets as advisorId
     *
     * @return string
     */
    public function getAdvisorId()
    {
        return $this->advisorId;
    }

    /**
     * Sets a new advisorId
     *
     * @param string $advisorId
     * @return self
     */
    public function setAdvisorId($advisorId)
    {
        $this->advisorId = $advisorId;
        return $this;
    }

    /**
     * Gets as appointmentKey
     *
     * @return string
     */
    public function getAppointmentKey()
    {
        return $this->appointmentKey;
    }

    /**
     * Sets a new appointmentKey
     *
     * @param string $appointmentKey
     * @return self
     */
    public function setAppointmentKey($appointmentKey)
    {
        $this->appointmentKey = $appointmentKey;
        return $this;
    }

    /**
     * Gets as appointmentTime
     *
     * @return \DateTime
     */
    public function getAppointmentTime()
    {
        return $this->appointmentTime;
    }

    /**
     * Sets a new appointmentTime
     *
     * @param \DateTime $appointmentTime
     * @return self
     */
    public function setAppointmentTime(\DateTime $appointmentTime)
    {
        $this->appointmentTime = $appointmentTime;
        return $this;
    }

    /**
     * Gets as comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets a new comment
     *
     * @param string $comment
     * @return self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Gets as concernPushMethod
     *
     * @return string
     */
    public function getConcernPushMethod()
    {
        return $this->concernPushMethod;
    }

    /**
     * Sets a new concernPushMethod
     *
     * @param string $concernPushMethod
     * @return self
     */
    public function setConcernPushMethod($concernPushMethod)
    {
        $this->concernPushMethod = $concernPushMethod;
        return $this;
    }

    /**
     * Adds as concern
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Appointments\ConcernType $concern
     */
    public function addToConcerns(\App\Soap\dealerbuilt\src\Models\Appointments\ConcernType $concern)
    {
        $this->concerns[] = $concern;
        return $this;
    }

    /**
     * isset concerns
     *
     * @param int|string $index
     * @return bool
     */
    public function issetConcerns($index)
    {
        return isset($this->concerns[$index]);
    }

    /**
     * unset concerns
     *
     * @param int|string $index
     * @return void
     */
    public function unsetConcerns($index)
    {
        unset($this->concerns[$index]);
    }

    /**
     * Gets as concerns
     *
     * @return \App\Soap\dealerbuilt\src\Models\Appointments\ConcernType[]
     */
    public function getConcerns()
    {
        return $this->concerns;
    }

    /**
     * Sets a new concerns
     *
     * @param \App\Soap\dealerbuilt\src\Models\Appointments\ConcernType[] $concerns
     * @return self
     */
    public function setConcerns(array $concerns)
    {
        $this->concerns = $concerns;
        return $this;
    }

    /**
     * Gets as customerKey
     *
     * @return string
     */
    public function getCustomerKey()
    {
        return $this->customerKey;
    }

    /**
     * Sets a new customerKey
     *
     * @param string $customerKey
     * @return self
     */
    public function setCustomerKey($customerKey)
    {
        $this->customerKey = $customerKey;
        return $this;
    }

    /**
     * Gets as customerStatementPushMethod
     *
     * @return string
     */
    public function getCustomerStatementPushMethod()
    {
        return $this->customerStatementPushMethod;
    }

    /**
     * Sets a new customerStatementPushMethod
     *
     * @param string $customerStatementPushMethod
     * @return self
     */
    public function setCustomerStatementPushMethod($customerStatementPushMethod)
    {
        $this->customerStatementPushMethod = $customerStatementPushMethod;
        return $this;
    }

    /**
     * Gets as externalAppointmentId
     *
     * @return string
     */
    public function getExternalAppointmentId()
    {
        return $this->externalAppointmentId;
    }

    /**
     * Sets a new externalAppointmentId
     *
     * @param string $externalAppointmentId
     * @return self
     */
    public function setExternalAppointmentId($externalAppointmentId)
    {
        $this->externalAppointmentId = $externalAppointmentId;
        return $this;
    }

    /**
     * Gets as mileage
     *
     * @return int
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Sets a new mileage
     *
     * @param int $mileage
     * @return self
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
        return $this;
    }

    /**
     * Gets as promisedTime
     *
     * @return \DateTime
     */
    public function getPromisedTime()
    {
        return $this->promisedTime;
    }

    /**
     * Sets a new promisedTime
     *
     * @param \DateTime $promisedTime
     * @return self
     */
    public function setPromisedTime(\DateTime $promisedTime)
    {
        $this->promisedTime = $promisedTime;
        return $this;
    }

    /**
     * Gets as repairOrderNumber
     *
     * @return string
     */
    public function getRepairOrderNumber()
    {
        return $this->repairOrderNumber;
    }

    /**
     * Sets a new repairOrderNumber
     *
     * @param string $repairOrderNumber
     * @return self
     */
    public function setRepairOrderNumber($repairOrderNumber)
    {
        $this->repairOrderNumber = $repairOrderNumber;
        return $this;
    }

    /**
     * Gets as scenario
     *
     * @return string
     */
    public function getScenario()
    {
        return $this->scenario;
    }

    /**
     * Sets a new scenario
     *
     * @param string $scenario
     * @return self
     */
    public function setScenario($scenario)
    {
        $this->scenario = $scenario;
        return $this;
    }

    /**
     * Gets as serviceLocationId
     *
     * @return int
     */
    public function getServiceLocationId()
    {
        return $this->serviceLocationId;
    }

    /**
     * Sets a new serviceLocationId
     *
     * @param int $serviceLocationId
     * @return self
     */
    public function setServiceLocationId($serviceLocationId)
    {
        $this->serviceLocationId = $serviceLocationId;
        return $this;
    }

    /**
     * Gets as status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets a new status
     *
     * @param string $status
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Gets as statusDescription
     *
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Sets a new statusDescription
     *
     * @param string $statusDescription
     * @return self
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;
        return $this;
    }

    /**
     * Gets as vehicleKey
     *
     * @return string
     */
    public function getVehicleKey()
    {
        return $this->vehicleKey;
    }

    /**
     * Sets a new vehicleKey
     *
     * @param string $vehicleKey
     * @return self
     */
    public function setVehicleKey($vehicleKey)
    {
        $this->vehicleKey = $vehicleKey;
        return $this;
    }

    /**
     * Gets as vin
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Sets a new vin
     *
     * @param string $vin
     * @return self
     */
    public function setVin($vin)
    {
        $this->vin = $vin;
        return $this;
    }


}

