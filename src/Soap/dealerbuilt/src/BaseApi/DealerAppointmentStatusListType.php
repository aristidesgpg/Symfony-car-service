<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing DealerAppointmentStatusListType
 *
 * 
 * XSD Type: DealerAppointmentStatusList
 */
class DealerAppointmentStatusListType extends ApiServiceLocationItemType
{

    /**
     * @var string[] $statuses
     */
    private $statuses = null;

    /**
     * Adds as string
     *
     * @return self
     * @param string $string
     */
    public function addToStatuses($string)
    {
        $this->statuses[] = $string;
        return $this;
    }

    /**
     * isset statuses
     *
     * @param int|string $index
     * @return bool
     */
    public function issetStatuses($index)
    {
        return isset($this->statuses[$index]);
    }

    /**
     * unset statuses
     *
     * @param int|string $index
     * @return void
     */
    public function unsetStatuses($index)
    {
        unset($this->statuses[$index]);
    }

    /**
     * Gets as statuses
     *
     * @return string[]
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * Sets a new statuses
     *
     * @param string[] $statuses
     * @return self
     */
    public function setStatuses(array $statuses)
    {
        $this->statuses = $statuses;
        return $this;
    }


}

