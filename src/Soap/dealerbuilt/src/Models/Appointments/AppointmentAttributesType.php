<?php

namespace App\Soap\dealerbuilt\src\Models\Appointments;

/**
 * Class representing AppointmentAttributesType
 *
 * 
 * XSD Type: AppointmentAttributes
 */
class AppointmentAttributesType
{

    /**
     * @var string $appointmentMethod
     */
    private $appointmentMethod = null;

    /**
     * @var int $appointmentNumber
     */
    private $appointmentNumber = null;

    /**
     * @var string $appointmentScenario
     */
    private $appointmentScenario = null;

    /**
     * @var \DateTime $appointmentTime
     */
    private $appointmentTime = null;

    /**
     * @var string $comment
     */
    private $comment = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Appointments\ConcernType[] $concerns
     */
    private $concerns = null;

    /**
     * @var \DateTime $created
     */
    private $created = null;

    /**
     * @var int $mileage
     */
    private $mileage = null;

    /**
     * @var \DateTime $neededBy
     */
    private $neededBy = null;

    /**
     * @var \DateTime $promisedTime
     */
    private $promisedTime = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $serviceAdvisor
     */
    private $serviceAdvisor = null;

    /**
     * @var string $status
     */
    private $status = null;

    /**
     * @var string $statusDescription
     */
    private $statusDescription = null;

    /**
     * Gets as appointmentMethod
     *
     * @return string
     */
    public function getAppointmentMethod()
    {
        return $this->appointmentMethod;
    }

    /**
     * Sets a new appointmentMethod
     *
     * @param string $appointmentMethod
     * @return self
     */
    public function setAppointmentMethod($appointmentMethod)
    {
        $this->appointmentMethod = $appointmentMethod;
        return $this;
    }

    /**
     * Gets as appointmentNumber
     *
     * @return int
     */
    public function getAppointmentNumber()
    {
        return $this->appointmentNumber;
    }

    /**
     * Sets a new appointmentNumber
     *
     * @param int $appointmentNumber
     * @return self
     */
    public function setAppointmentNumber($appointmentNumber)
    {
        $this->appointmentNumber = $appointmentNumber;
        return $this;
    }

    /**
     * Gets as appointmentScenario
     *
     * @return string
     */
    public function getAppointmentScenario()
    {
        return $this->appointmentScenario;
    }

    /**
     * Sets a new appointmentScenario
     *
     * @param string $appointmentScenario
     * @return self
     */
    public function setAppointmentScenario($appointmentScenario)
    {
        $this->appointmentScenario = $appointmentScenario;
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
     * Gets as created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets a new created
     *
     * @param \DateTime $created
     * @return self
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
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
     * Gets as neededBy
     *
     * @return \DateTime
     */
    public function getNeededBy()
    {
        return $this->neededBy;
    }

    /**
     * Sets a new neededBy
     *
     * @param \DateTime $neededBy
     * @return self
     */
    public function setNeededBy(\DateTime $neededBy)
    {
        $this->neededBy = $neededBy;
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
     * Gets as serviceAdvisor
     *
     * @return \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType
     */
    public function getServiceAdvisor()
    {
        return $this->serviceAdvisor;
    }

    /**
     * Sets a new serviceAdvisor
     *
     * @param \App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $serviceAdvisor
     * @return self
     */
    public function setServiceAdvisor(\App\Soap\dealerbuilt\src\Models\NumberedPersonInfoType $serviceAdvisor)
    {
        $this->serviceAdvisor = $serviceAdvisor;
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


}

