<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing ChartEntryType
 *
 * 
 * XSD Type: ChartEntry
 */
class ChartEntryType extends ApiCompanyItemType
{

    /**
     * @var string $accountClass
     */
    private $accountClass = null;

    /**
     * @var string $accountDescription
     */
    private $accountDescription = null;

    /**
     * @var string $accountDescriptionAbbreviated
     */
    private $accountDescriptionAbbreviated = null;

    /**
     * @var string $accountNumber
     */
    private $accountNumber = null;

    /**
     * @var string $chainAccountNumber
     */
    private $chainAccountNumber = null;

    /**
     * @var string $control1Type
     */
    private $control1Type = null;

    /**
     * @var string $control2Type
     */
    private $control2Type = null;

    /**
     * @var string $departmentCode
     */
    private $departmentCode = null;

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\FactoryAccountNumbersType[] $factoryAccountNumbers
     */
    private $factoryAccountNumbers = null;

    /**
     * @var string $forwardType
     */
    private $forwardType = null;

    /**
     * @var bool $isActive
     */
    private $isActive = null;

    /**
     * @var string $scheduleClass
     */
    private $scheduleClass = null;

    /**
     * @var string $scheduleCode
     */
    private $scheduleCode = null;

    /**
     * @var \DateTime $scheduleStartDate
     */
    private $scheduleStartDate = null;

    /**
     * @var string $scheduleType
     */
    private $scheduleType = null;

    /**
     * @var string[] $spreadAccountNumbers
     */
    private $spreadAccountNumbers = null;

    /**
     * Gets as accountClass
     *
     * @return string
     */
    public function getAccountClass()
    {
        return $this->accountClass;
    }

    /**
     * Sets a new accountClass
     *
     * @param string $accountClass
     * @return self
     */
    public function setAccountClass($accountClass)
    {
        $this->accountClass = $accountClass;
        return $this;
    }

    /**
     * Gets as accountDescription
     *
     * @return string
     */
    public function getAccountDescription()
    {
        return $this->accountDescription;
    }

    /**
     * Sets a new accountDescription
     *
     * @param string $accountDescription
     * @return self
     */
    public function setAccountDescription($accountDescription)
    {
        $this->accountDescription = $accountDescription;
        return $this;
    }

    /**
     * Gets as accountDescriptionAbbreviated
     *
     * @return string
     */
    public function getAccountDescriptionAbbreviated()
    {
        return $this->accountDescriptionAbbreviated;
    }

    /**
     * Sets a new accountDescriptionAbbreviated
     *
     * @param string $accountDescriptionAbbreviated
     * @return self
     */
    public function setAccountDescriptionAbbreviated($accountDescriptionAbbreviated)
    {
        $this->accountDescriptionAbbreviated = $accountDescriptionAbbreviated;
        return $this;
    }

    /**
     * Gets as accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Sets a new accountNumber
     *
     * @param string $accountNumber
     * @return self
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * Gets as chainAccountNumber
     *
     * @return string
     */
    public function getChainAccountNumber()
    {
        return $this->chainAccountNumber;
    }

    /**
     * Sets a new chainAccountNumber
     *
     * @param string $chainAccountNumber
     * @return self
     */
    public function setChainAccountNumber($chainAccountNumber)
    {
        $this->chainAccountNumber = $chainAccountNumber;
        return $this;
    }

    /**
     * Gets as control1Type
     *
     * @return string
     */
    public function getControl1Type()
    {
        return $this->control1Type;
    }

    /**
     * Sets a new control1Type
     *
     * @param string $control1Type
     * @return self
     */
    public function setControl1Type($control1Type)
    {
        $this->control1Type = $control1Type;
        return $this;
    }

    /**
     * Gets as control2Type
     *
     * @return string
     */
    public function getControl2Type()
    {
        return $this->control2Type;
    }

    /**
     * Sets a new control2Type
     *
     * @param string $control2Type
     * @return self
     */
    public function setControl2Type($control2Type)
    {
        $this->control2Type = $control2Type;
        return $this;
    }

    /**
     * Gets as departmentCode
     *
     * @return string
     */
    public function getDepartmentCode()
    {
        return $this->departmentCode;
    }

    /**
     * Sets a new departmentCode
     *
     * @param string $departmentCode
     * @return self
     */
    public function setDepartmentCode($departmentCode)
    {
        $this->departmentCode = $departmentCode;
        return $this;
    }

    /**
     * Adds as factoryAccountNumbersType
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\FactoryAccountNumbersType $factoryAccountNumbersType
     */
    public function addToFactoryAccountNumbers(\App\Soap\dealerbuilt\src\Models\Accounting\FactoryAccountNumbersType $factoryAccountNumbersType)
    {
        $this->factoryAccountNumbers[] = $factoryAccountNumbersType;
        return $this;
    }

    /**
     * isset factoryAccountNumbers
     *
     * @param int|string $index
     * @return bool
     */
    public function issetFactoryAccountNumbers($index)
    {
        return isset($this->factoryAccountNumbers[$index]);
    }

    /**
     * unset factoryAccountNumbers
     *
     * @param int|string $index
     * @return void
     */
    public function unsetFactoryAccountNumbers($index)
    {
        unset($this->factoryAccountNumbers[$index]);
    }

    /**
     * Gets as factoryAccountNumbers
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\FactoryAccountNumbersType[]
     */
    public function getFactoryAccountNumbers()
    {
        return $this->factoryAccountNumbers;
    }

    /**
     * Sets a new factoryAccountNumbers
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\FactoryAccountNumbersType[] $factoryAccountNumbers
     * @return self
     */
    public function setFactoryAccountNumbers(array $factoryAccountNumbers)
    {
        $this->factoryAccountNumbers = $factoryAccountNumbers;
        return $this;
    }

    /**
     * Gets as forwardType
     *
     * @return string
     */
    public function getForwardType()
    {
        return $this->forwardType;
    }

    /**
     * Sets a new forwardType
     *
     * @param string $forwardType
     * @return self
     */
    public function setForwardType($forwardType)
    {
        $this->forwardType = $forwardType;
        return $this;
    }

    /**
     * Gets as isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Sets a new isActive
     *
     * @param bool $isActive
     * @return self
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * Gets as scheduleClass
     *
     * @return string
     */
    public function getScheduleClass()
    {
        return $this->scheduleClass;
    }

    /**
     * Sets a new scheduleClass
     *
     * @param string $scheduleClass
     * @return self
     */
    public function setScheduleClass($scheduleClass)
    {
        $this->scheduleClass = $scheduleClass;
        return $this;
    }

    /**
     * Gets as scheduleCode
     *
     * @return string
     */
    public function getScheduleCode()
    {
        return $this->scheduleCode;
    }

    /**
     * Sets a new scheduleCode
     *
     * @param string $scheduleCode
     * @return self
     */
    public function setScheduleCode($scheduleCode)
    {
        $this->scheduleCode = $scheduleCode;
        return $this;
    }

    /**
     * Gets as scheduleStartDate
     *
     * @return \DateTime
     */
    public function getScheduleStartDate()
    {
        return $this->scheduleStartDate;
    }

    /**
     * Sets a new scheduleStartDate
     *
     * @param \DateTime $scheduleStartDate
     * @return self
     */
    public function setScheduleStartDate(\DateTime $scheduleStartDate)
    {
        $this->scheduleStartDate = $scheduleStartDate;
        return $this;
    }

    /**
     * Gets as scheduleType
     *
     * @return string
     */
    public function getScheduleType()
    {
        return $this->scheduleType;
    }

    /**
     * Sets a new scheduleType
     *
     * @param string $scheduleType
     * @return self
     */
    public function setScheduleType($scheduleType)
    {
        $this->scheduleType = $scheduleType;
        return $this;
    }

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToSpreadAccountNumbers($string)
    {
        $this->spreadAccountNumbers[] = $string;
        return $this;
    }

    /**
     * isset spreadAccountNumbers
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSpreadAccountNumbers($index)
    {
        return isset($this->spreadAccountNumbers[$index]);
    }

    /**
     * unset spreadAccountNumbers
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSpreadAccountNumbers($index)
    {
        unset($this->spreadAccountNumbers[$index]);
    }

    /**
     * Gets as spreadAccountNumbers
     *
     * @return string[]
     */
    public function getSpreadAccountNumbers()
    {
        return $this->spreadAccountNumbers;
    }

    /**
     * Sets a new spreadAccountNumbers
     *
     * @param string[] $spreadAccountNumbers
     * @return self
     */
    public function setSpreadAccountNumbers(array $spreadAccountNumbers)
    {
        $this->spreadAccountNumbers = $spreadAccountNumbers;
        return $this;
    }


}

