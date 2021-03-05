<?php

namespace App\Soap\dealerbuilt\src\Models\Logging;

/**
 * Class representing LogAttributesType
 *
 * 
 * XSD Type: LogAttributes
 */
class LogAttributesType
{

    /**
     * @var string $clientAddress
     */
    private $clientAddress = null;

    /**
     * @var string $columnName
     */
    private $columnName = null;

    /**
     * @var string $event
     */
    private $event = null;

    /**
     * @var int $loggingSeq
     */
    private $loggingSeq = null;

    /**
     * @var string $modifiedBy
     */
    private $modifiedBy = null;

    /**
     * @var \DateTime $modifiedStamp
     */
    private $modifiedStamp = null;

    /**
     * @var string $newValue
     */
    private $newValue = null;

    /**
     * @var string $oldValue
     */
    private $oldValue = null;

    /**
     * @var string $schemaName
     */
    private $schemaName = null;

    /**
     * @var string $tableName
     */
    private $tableName = null;

    /**
     * Gets as clientAddress
     *
     * @return string
     */
    public function getClientAddress()
    {
        return $this->clientAddress;
    }

    /**
     * Sets a new clientAddress
     *
     * @param string $clientAddress
     * @return self
     */
    public function setClientAddress($clientAddress)
    {
        $this->clientAddress = $clientAddress;
        return $this;
    }

    /**
     * Gets as columnName
     *
     * @return string
     */
    public function getColumnName()
    {
        return $this->columnName;
    }

    /**
     * Sets a new columnName
     *
     * @param string $columnName
     * @return self
     */
    public function setColumnName($columnName)
    {
        $this->columnName = $columnName;
        return $this;
    }

    /**
     * Gets as event
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Sets a new event
     *
     * @param string $event
     * @return self
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * Gets as loggingSeq
     *
     * @return int
     */
    public function getLoggingSeq()
    {
        return $this->loggingSeq;
    }

    /**
     * Sets a new loggingSeq
     *
     * @param int $loggingSeq
     * @return self
     */
    public function setLoggingSeq($loggingSeq)
    {
        $this->loggingSeq = $loggingSeq;
        return $this;
    }

    /**
     * Gets as modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Sets a new modifiedBy
     *
     * @param string $modifiedBy
     * @return self
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }

    /**
     * Gets as modifiedStamp
     *
     * @return \DateTime
     */
    public function getModifiedStamp()
    {
        return $this->modifiedStamp;
    }

    /**
     * Sets a new modifiedStamp
     *
     * @param \DateTime $modifiedStamp
     * @return self
     */
    public function setModifiedStamp(\DateTime $modifiedStamp)
    {
        $this->modifiedStamp = $modifiedStamp;
        return $this;
    }

    /**
     * Gets as newValue
     *
     * @return string
     */
    public function getNewValue()
    {
        return $this->newValue;
    }

    /**
     * Sets a new newValue
     *
     * @param string $newValue
     * @return self
     */
    public function setNewValue($newValue)
    {
        $this->newValue = $newValue;
        return $this;
    }

    /**
     * Gets as oldValue
     *
     * @return string
     */
    public function getOldValue()
    {
        return $this->oldValue;
    }

    /**
     * Sets a new oldValue
     *
     * @param string $oldValue
     * @return self
     */
    public function setOldValue($oldValue)
    {
        $this->oldValue = $oldValue;
        return $this;
    }

    /**
     * Gets as schemaName
     *
     * @return string
     */
    public function getSchemaName()
    {
        return $this->schemaName;
    }

    /**
     * Sets a new schemaName
     *
     * @param string $schemaName
     * @return self
     */
    public function setSchemaName($schemaName)
    {
        $this->schemaName = $schemaName;
        return $this;
    }

    /**
     * Gets as tableName
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Sets a new tableName
     *
     * @param string $tableName
     * @return self
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }


}

