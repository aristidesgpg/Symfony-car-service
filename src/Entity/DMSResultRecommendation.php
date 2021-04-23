<?php

namespace App\Entity;

/**
 * Class DMSResultRecommendation
 */
class DMSResultRecommendation{

    public $description;
    public $preApproved;
    public $approved;
    public $partsPrice;
    public $partsTax;
    public $suppliesPrice;
    public $suppliesTax;
    public $laborTax;
    public $laborPrice;
    public $laborHours;
    public $operationCode;
    public $notes;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): DMSResultRecommendation
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPreApproved()
    {
        return $this->preApproved;
    }

    /**
     * @param mixed $preApproved
     */
    public function setPreApproved($preApproved): DMSResultRecommendation
    {
        $this->preApproved = $preApproved;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * @param mixed $approved
     */
    public function setApproved($approved): DMSResultRecommendation
    {
        $this->approved = $approved;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPartsPrice()
    {
        return $this->partsPrice;
    }

    /**
     * @param mixed $partsPrice
     */
    public function setPartsPrice($partsPrice): DMSResultRecommendation
    {
        $this->partsPrice = $partsPrice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPartsTax()
    {
        return $this->partsTax;
    }

    /**
     * @param mixed $partsTax
     */
    public function setPartsTax($partsTax): DMSResultRecommendation
    {
        $this->partsTax = $partsTax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuppliesPrice()
    {
        return $this->suppliesPrice;
    }

    /**
     * @param mixed $suppliesPrice
     */
    public function setSuppliesPrice($suppliesPrice): DMSResultRecommendation
    {
        $this->suppliesPrice = $suppliesPrice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuppliesTax()
    {
        return $this->suppliesTax;
    }

    /**
     * @param mixed $suppliesTax
     */
    public function setSuppliesTax($suppliesTax): DMSResultRecommendation
    {
        $this->suppliesTax = $suppliesTax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLaborTax()
    {
        return $this->laborTax;
    }

    /**
     * @param mixed $laborTax
     */
    public function setLaborTax($laborTax): DMSResultRecommendation
    {
        $this->laborTax = $laborTax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLaborPrice()
    {
        return $this->laborPrice;
    }

    /**
     * @param mixed $laborPrice
     */
    public function setLaborPrice($laborPrice): DMSResultRecommendation
    {
        $this->laborPrice = $laborPrice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLaborHours()
    {
        return $this->laborHours;
    }

    /**
     * @param mixed $laborHours
     */
    public function setLaborHours($laborHours): DMSResultRecommendation
    {
        $this->laborHours = $laborHours;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperationCode()
    {
        return $this->operationCode;
    }

    /**
     * @param mixed $operationCode
     */
    public function setOperationCode($operationCode): DMSResultRecommendation
    {
        $this->operationCode = $operationCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes): DMSResultRecommendation
    {
        $this->notes = $notes;
        return $this;
    }




}