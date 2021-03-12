<?php

namespace App\Soap\automate\src;

/**
 * Class representing Job
 */
class Job
{

    /**
     * @var string $jobNumberString
     */
    private $jobNumberString = null;

    /**
     * @var string $operationID
     */
    private $operationID = null;

    /**
     * @var string $operationName
     */
    private $operationName = null;

    /**
     * @var \App\Soap\automate\src\CodesAndCommentsExpanded $codesAndCommentsExpanded
     */
    private $codesAndCommentsExpanded = null;

    /**
     * @var \App\Soap\automate\src\Diagnostics $diagnostics
     */
    private $diagnostics = null;

    /**
     * @var string $originCode
     */
    private $originCode = null;

    /**
     * @var \App\Soap\automate\src\ServiceParts[] $serviceParts
     */
    private $serviceParts = [
        
    ];

    /**
     * @var \App\Soap\automate\src\ServiceLabor $serviceLabor
     */
    private $serviceLabor = null;

    /**
     * @var \App\Soap\automate\src\Pricing $pricing
     */
    private $pricing = null;

    /**
     * @var float $laborAllowanceHoursNumeric
     */
    private $laborAllowanceHoursNumeric = null;

    /**
     * @var float $laborActualHoursNumeric
     */
    private $laborActualHoursNumeric = null;

    /**
     * @var string $jobStatusCode
     */
    private $jobStatusCode = null;

    /**
     * @var string $jobTypeString
     */
    private $jobTypeString = null;

    /**
     * @var \App\Soap\automate\src\ServiceTechnicianParty $serviceTechnicianParty
     */
    private $serviceTechnicianParty = null;

    /**
     * @var \App\Soap\automate\src\ServiceComponents $serviceComponents
     */
    private $serviceComponents = null;

    /**
     * Gets as jobNumberString
     *
     * @return string
     */
    public function getJobNumberString()
    {
        return $this->jobNumberString;
    }

    /**
     * Sets a new jobNumberString
     *
     * @param string $jobNumberString
     * @return self
     */
    public function setJobNumberString($jobNumberString)
    {
        $this->jobNumberString = $jobNumberString;
        return $this;
    }

    /**
     * Gets as operationID
     *
     * @return string
     */
    public function getOperationID()
    {
        return $this->operationID;
    }

    /**
     * Sets a new operationID
     *
     * @param string $operationID
     * @return self
     */
    public function setOperationID($operationID)
    {
        $this->operationID = $operationID;
        return $this;
    }

    /**
     * Gets as operationName
     *
     * @return string
     */
    public function getOperationName()
    {
        return $this->operationName;
    }

    /**
     * Sets a new operationName
     *
     * @param string $operationName
     * @return self
     */
    public function setOperationName($operationName)
    {
        $this->operationName = $operationName;
        return $this;
    }

    /**
     * Gets as codesAndCommentsExpanded
     *
     * @return \App\Soap\automate\src\CodesAndCommentsExpanded
     */
    public function getCodesAndCommentsExpanded()
    {
        return $this->codesAndCommentsExpanded;
    }

    /**
     * Sets a new codesAndCommentsExpanded
     *
     * @param \App\Soap\automate\src\CodesAndCommentsExpanded $codesAndCommentsExpanded
     * @return self
     */
    public function setCodesAndCommentsExpanded(\App\Soap\automate\src\CodesAndCommentsExpanded $codesAndCommentsExpanded)
    {
        $this->codesAndCommentsExpanded = $codesAndCommentsExpanded;
        return $this;
    }

    /**
     * Gets as diagnostics
     *
     * @return \App\Soap\automate\src\Diagnostics
     */
    public function getDiagnostics()
    {
        return $this->diagnostics;
    }

    /**
     * Sets a new diagnostics
     *
     * @param \App\Soap\automate\src\Diagnostics $diagnostics
     * @return self
     */
    public function setDiagnostics(\App\Soap\automate\src\Diagnostics $diagnostics)
    {
        $this->diagnostics = $diagnostics;
        return $this;
    }

    /**
     * Gets as originCode
     *
     * @return string
     */
    public function getOriginCode()
    {
        return $this->originCode;
    }

    /**
     * Sets a new originCode
     *
     * @param string $originCode
     * @return self
     */
    public function setOriginCode($originCode)
    {
        $this->originCode = $originCode;
        return $this;
    }

    /**
     * Adds as serviceParts
     *
     * @return self
     * @param \App\Soap\automate\src\ServiceParts $serviceParts
     */
    public function addToServiceParts(\App\Soap\automate\src\ServiceParts $serviceParts)
    {
        $this->serviceParts[] = $serviceParts;
        return $this;
    }

    /**
     * isset serviceParts
     *
     * @param int|string $index
     * @return bool
     */
    public function issetServiceParts($index)
    {
        return isset($this->serviceParts[$index]);
    }

    /**
     * unset serviceParts
     *
     * @param int|string $index
     * @return void
     */
    public function unsetServiceParts($index)
    {
        unset($this->serviceParts[$index]);
    }

    /**
     * Gets as serviceParts
     *
     * @return \App\Soap\automate\src\ServiceParts[]
     */
    public function getServiceParts()
    {
        return $this->serviceParts;
    }

    /**
     * Sets a new serviceParts
     *
     * @param \App\Soap\automate\src\ServiceParts[] $serviceParts
     * @return self
     */
    public function setServiceParts(array $serviceParts)
    {
        $this->serviceParts = $serviceParts;
        return $this;
    }

    /**
     * Gets as serviceLabor
     *
     * @return \App\Soap\automate\src\ServiceLabor
     */
    public function getServiceLabor()
    {
        return $this->serviceLabor;
    }

    /**
     * Sets a new serviceLabor
     *
     * @param \App\Soap\automate\src\ServiceLabor $serviceLabor
     * @return self
     */
    public function setServiceLabor(\App\Soap\automate\src\ServiceLabor $serviceLabor)
    {
        $this->serviceLabor = $serviceLabor;
        return $this;
    }

    /**
     * Gets as pricing
     *
     * @return \App\Soap\automate\src\Pricing
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * Sets a new pricing
     *
     * @param \App\Soap\automate\src\Pricing $pricing
     * @return self
     */
    public function setPricing(\App\Soap\automate\src\Pricing $pricing)
    {
        $this->pricing = $pricing;
        return $this;
    }

    /**
     * Gets as laborAllowanceHoursNumeric
     *
     * @return float
     */
    public function getLaborAllowanceHoursNumeric()
    {
        return $this->laborAllowanceHoursNumeric;
    }

    /**
     * Sets a new laborAllowanceHoursNumeric
     *
     * @param float $laborAllowanceHoursNumeric
     * @return self
     */
    public function setLaborAllowanceHoursNumeric($laborAllowanceHoursNumeric)
    {
        $this->laborAllowanceHoursNumeric = $laborAllowanceHoursNumeric;
        return $this;
    }

    /**
     * Gets as laborActualHoursNumeric
     *
     * @return float
     */
    public function getLaborActualHoursNumeric()
    {
        return $this->laborActualHoursNumeric;
    }

    /**
     * Sets a new laborActualHoursNumeric
     *
     * @param float $laborActualHoursNumeric
     * @return self
     */
    public function setLaborActualHoursNumeric($laborActualHoursNumeric)
    {
        $this->laborActualHoursNumeric = $laborActualHoursNumeric;
        return $this;
    }

    /**
     * Gets as jobStatusCode
     *
     * @return string
     */
    public function getJobStatusCode()
    {
        return $this->jobStatusCode;
    }

    /**
     * Sets a new jobStatusCode
     *
     * @param string $jobStatusCode
     * @return self
     */
    public function setJobStatusCode($jobStatusCode)
    {
        $this->jobStatusCode = $jobStatusCode;
        return $this;
    }

    /**
     * Gets as jobTypeString
     *
     * @return string
     */
    public function getJobTypeString()
    {
        return $this->jobTypeString;
    }

    /**
     * Sets a new jobTypeString
     *
     * @param string $jobTypeString
     * @return self
     */
    public function setJobTypeString($jobTypeString)
    {
        $this->jobTypeString = $jobTypeString;
        return $this;
    }

    /**
     * Gets as serviceTechnicianParty
     *
     * @return \App\Soap\automate\src\ServiceTechnicianParty
     */
    public function getServiceTechnicianParty()
    {
        return $this->serviceTechnicianParty;
    }

    /**
     * Sets a new serviceTechnicianParty
     *
     * @param \App\Soap\automate\src\ServiceTechnicianParty $serviceTechnicianParty
     * @return self
     */
    public function setServiceTechnicianParty(\App\Soap\automate\src\ServiceTechnicianParty $serviceTechnicianParty)
    {
        $this->serviceTechnicianParty = $serviceTechnicianParty;
        return $this;
    }

    /**
     * Gets as serviceComponents
     *
     * @return \App\Soap\automate\src\ServiceComponents
     */
    public function getServiceComponents()
    {
        return $this->serviceComponents;
    }

    /**
     * Sets a new serviceComponents
     *
     * @param \App\Soap\automate\src\ServiceComponents $serviceComponents
     * @return self
     */
    public function setServiceComponents(\App\Soap\automate\src\ServiceComponents $serviceComponents)
    {
        $this->serviceComponents = $serviceComponents;
        return $this;
    }


}

