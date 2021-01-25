<?php

namespace App\Soap\dealerbuilt\src\BaseApi;

/**
 * Class representing GroupPlacementType.
 *
 * XSD Type: GroupPlacement
 */
class GroupPlacementType
{
    /**
     * @var int
     */
    private $groupId = null;

    /**
     * @var string
     */
    private $groupName = null;

    /**
     * Gets as groupId.
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Sets a new groupId.
     *
     * @param int $groupId
     *
     * @return self
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Gets as groupName.
     *
     * @return string
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * Sets a new groupName.
     *
     * @param string $groupName
     *
     * @return self
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;

        return $this;
    }
}
