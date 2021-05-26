<?php

namespace App\Soap\automate\json;

use JMS\Serializer\Annotation\Type;

class OperationCode
{
    /**
     * @var ?string
     * @Type("string")
     */
    private $opCode;

    /**
     * @var ?string
     * @Type("string")
     */
    private $complaint;

    /**
     * @var ?string
     * @Type("string")
     */
    private $correction;

    /**
     * @var ?float
     * @Type("float")
     */
    private $laborPrice;

    /**
     * @var ?float
     * @Type("float")
     */
    private $partsPrice;

    /**
     * @var ?float
     * @Type("float")
     */
    private $estimatedLaborHours;

    /**
     * @var ?bool
     * @Type("bool")
     */
    private $quickOp;

    /**
     * @var ?string
     * @Type("string")
     */
    private $cause;

    public function getOpCode(): ?string
    {
        return $this->opCode;
    }

    public function setOpCode(?string $opCode): OperationCode
    {
        $this->opCode = $opCode;

        return $this;
    }

    public function getComplaint(): ?string
    {
        return $this->complaint;
    }

    public function setComplaint(?string $complaint): OperationCode
    {
        $this->complaint = $complaint;

        return $this;
    }

    public function getCorrection(): ?string
    {
        return $this->correction;
    }

    public function setCorrection(?string $correction): OperationCode
    {
        $this->correction = $correction;

        return $this;
    }

    public function getLaborPrice(): ?float
    {
        return $this->laborPrice;
    }

    public function setLaborPrice(?float $laborPrice): OperationCode
    {
        $this->laborPrice = $laborPrice;

        return $this;
    }

    public function getPartsPrice(): ?float
    {
        return $this->partsPrice;
    }

    public function setPartsPrice(?float $partsPrice): OperationCode
    {
        $this->partsPrice = $partsPrice;

        return $this;
    }

    public function getEstimatedLaborHours(): ?float
    {
        return $this->estimatedLaborHours;
    }

    public function setEstimatedLaborHours(?float $estimatedLaborHours): OperationCode
    {
        $this->estimatedLaborHours = $estimatedLaborHours;

        return $this;
    }

    public function getQuickOp(): ?bool
    {
        return $this->quickOp;
    }

    public function setQuickOp(?bool $quickOp): OperationCode
    {
        $this->quickOp = $quickOp;

        return $this;
    }

    public function getCause(): ?string
    {
        return $this->cause;
    }

    public function setCause(?string $cause): OperationCode
    {
        $this->cause = $cause;

        return $this;
    }
}
