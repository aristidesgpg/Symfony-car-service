<?php

namespace App\Soap\automate\src;

/**
 * Class representing CodesAndCommentsExpanded
 */
class CodesAndCommentsExpanded
{

    /**
     * @var string $causeDescription
     */
    private $causeDescription = null;

    /**
     * @var string $complaintDescription
     */
    private $complaintDescription = null;

    /**
     * @var string $correctionDescription
     */
    private $correctionDescription = null;

    /**
     * Gets as causeDescription
     *
     * @return string
     */
    public function getCauseDescription()
    {
        return $this->causeDescription;
    }

    /**
     * Sets a new causeDescription
     *
     * @param string $causeDescription
     * @return self
     */
    public function setCauseDescription($causeDescription)
    {
        $this->causeDescription = $causeDescription;
        return $this;
    }

    /**
     * Gets as complaintDescription
     *
     * @return string
     */
    public function getComplaintDescription()
    {
        return $this->complaintDescription;
    }

    /**
     * Sets a new complaintDescription
     *
     * @param string $complaintDescription
     * @return self
     */
    public function setComplaintDescription($complaintDescription)
    {
        $this->complaintDescription = $complaintDescription;
        return $this;
    }

    /**
     * Gets as correctionDescription
     *
     * @return string
     */
    public function getCorrectionDescription()
    {
        return $this->correctionDescription;
    }

    /**
     * Sets a new correctionDescription
     *
     * @param string $correctionDescription
     * @return self
     */
    public function setCorrectionDescription($correctionDescription)
    {
        $this->correctionDescription = $correctionDescription;
        return $this;
    }


}

