<?php

namespace App\Soap\dealerbuilt\src\Models\Sales;

/**
 * Class representing ArrayOfProtectionPackageType
 *
 * 
 * XSD Type: ArrayOfProtectionPackage
 */
class ArrayOfProtectionPackageType
{

    /**
     * @var \App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType[] $protectionPackage
     */
    private $protectionPackage = [
        
    ];

    /**
     * Adds as protectionPackage
     *
     * @return self
     * @param \App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType $protectionPackage
     */
    public function addToProtectionPackage(\App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType $protectionPackage)
    {
        $this->protectionPackage[] = $protectionPackage;
        return $this;
    }

    /**
     * isset protectionPackage
     *
     * @param int|string $index
     * @return bool
     */
    public function issetProtectionPackage($index)
    {
        return isset($this->protectionPackage[$index]);
    }

    /**
     * unset protectionPackage
     *
     * @param int|string $index
     * @return void
     */
    public function unsetProtectionPackage($index)
    {
        unset($this->protectionPackage[$index]);
    }

    /**
     * Gets as protectionPackage
     *
     * @return \App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType[]
     */
    public function getProtectionPackage()
    {
        return $this->protectionPackage;
    }

    /**
     * Sets a new protectionPackage
     *
     * @param \App\Soap\dealerbuilt\src\Models\Sales\ProtectionPackageType[] $protectionPackage
     * @return self
     */
    public function setProtectionPackage(array $protectionPackage)
    {
        $this->protectionPackage = $protectionPackage;
        return $this;
    }


}

