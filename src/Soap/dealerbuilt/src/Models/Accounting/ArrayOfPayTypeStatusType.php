<?php

namespace App\Soap\dealerbuilt\src\Models\Accounting;

/**
 * Class representing ArrayOfPayTypeStatusType.
 *
 * XSD Type: ArrayOfPayTypeStatus
 */
class ArrayOfPayTypeStatusType
{
    /**
     * @var \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType[]
     */
    private $payTypeStatus = [
    ];

    /**
     * Adds as payTypeStatus.
     *
     * @return self
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType $payTypeStatus
     */
    public function addToPayTypeStatus(PayTypeStatusType $payTypeStatus)
    {
        $this->payTypeStatus[] = $payTypeStatus;

        return $this;
    }

    /**
     * isset payTypeStatus.
     *
     * @param int|string $index
     *
     * @return bool
     */
    public function issetPayTypeStatus($index)
    {
        return isset($this->payTypeStatus[$index]);
    }

    /**
     * unset payTypeStatus.
     *
     * @param int|string $index
     *
     * @return void
     */
    public function unsetPayTypeStatus($index)
    {
        unset($this->payTypeStatus[$index]);
    }

    /**
     * Gets as payTypeStatus.
     *
     * @return \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType[]
     */
    public function getPayTypeStatus()
    {
        return $this->payTypeStatus;
    }

    /**
     * Sets a new payTypeStatus.
     *
     * @param \App\Soap\dealerbuilt\src\Models\Accounting\PayTypeStatusType[] $payTypeStatus
     *
     * @return self
     */
    public function setPayTypeStatus(array $payTypeStatus)
    {
        $this->payTypeStatus = $payTypeStatus;

        return $this;
    }
}
