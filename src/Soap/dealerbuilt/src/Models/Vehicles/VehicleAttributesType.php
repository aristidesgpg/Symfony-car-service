<?php

namespace App\Soap\dealerbuilt\src\Models\Vehicles;

/**
 * Class representing VehicleAttributesType
 *
 * 
 * XSD Type: VehicleAttributes
 */
class VehicleAttributesType
{

    /**
     * @var string $bodyStyle
     */
    private $bodyStyle = null;

    /**
     * @var string $certificationNumber
     */
    private $certificationNumber = null;

    /**
     * @var string $color
     */
    private $color = null;

    /**
     * @var string $colorCode
     */
    private $colorCode = null;

    /**
     * @var string $colorDescription
     */
    private $colorDescription = null;

    /**
     * @var string $comments
     */
    private $comments = null;

    /**
     * @var string $contractCompanyName
     */
    private $contractCompanyName = null;

    /**
     * @var string $contractID
     */
    private $contractID = null;

    /**
     * @var \DateTime $contractStartDate
     */
    private $contractStartDate = null;

    /**
     * @var float $contractStartDistanceMeasure
     */
    private $contractStartDistanceMeasure = null;

    /**
     * @var int $cylinderCount
     */
    private $cylinderCount = null;

    /**
     * @var string $detailedEngineDescription
     */
    private $detailedEngineDescription = null;

    /**
     * @var int $doorCount
     */
    private $doorCount = null;

    /**
     * @var string $engine
     */
    private $engine = null;

    /**
     * @var string $engineSerialNumber
     */
    private $engineSerialNumber = null;

    /**
     * @var string $factoryExteriorColor
     */
    private $factoryExteriorColor = null;

    /**
     * @var string $factoryTrimDesc
     */
    private $factoryTrimDesc = null;

    /**
     * @var string $fleetID
     */
    private $fleetID = null;

    /**
     * @var string $fuelType
     */
    private $fuelType = null;

    /**
     * @var string $fuelTypeCode
     */
    private $fuelTypeCode = null;

    /**
     * @var string $ignitionKeyNumber
     */
    private $ignitionKeyNumber = null;

    /**
     * @var string $interiorColor
     */
    private $interiorColor = null;

    /**
     * @var string $interiorColorCode
     */
    private $interiorColorCode = null;

    /**
     * @var string $interiorColorDescription
     */
    private $interiorColorDescription = null;

    /**
     * @var bool $isCertifiedPreOwned
     */
    private $isCertifiedPreOwned = null;

    /**
     * @var bool $isNonUsMarket
     */
    private $isNonUsMarket = null;

    /**
     * @var \DateTime $licensePlateExpirationDate
     */
    private $licensePlateExpirationDate = null;

    /**
     * @var string $licensePlateNumber
     */
    private $licensePlateNumber = null;

    /**
     * @var string $lystockAvailability
     */
    private $lystockAvailability = null;

    /**
     * @var string $make
     */
    private $make = null;

    /**
     * @var string $manufacturer
     */
    private $manufacturer = null;

    /**
     * @var int $mileage
     */
    private $mileage = null;

    /**
     * @var string $mnCodeDescription
     */
    private $mnCodeDescription = null;

    /**
     * @var string $model
     */
    private $model = null;

    /**
     * @var string $modelNumber
     */
    private $modelNumber = null;

    /**
     * @var \DateTime $modifiedStamp
     */
    private $modifiedStamp = null;

    /**
     * @var float $numberOfEngineCylindersNumeric
     */
    private $numberOfEngineCylindersNumeric = null;

    /**
     * @var string $optionString
     */
    private $optionString = null;

    /**
     * @var string $purchaseComments
     */
    private $purchaseComments = null;

    /**
     * @var string $registrationID
     */
    private $registrationID = null;

    /**
     * @var \DateTime $saleDate
     */
    private $saleDate = null;

    /**
     * @var string $saleType
     */
    private $saleType = null;

    /**
     * @var string $series
     */
    private $series = null;

    /**
     * @var string $serviceContractCompanyName
     */
    private $serviceContractCompanyName = null;

    /**
     * @var \DateTime $serviceContractExpirationDate
     */
    private $serviceContractExpirationDate = null;

    /**
     * @var int $serviceContractExpirationMileage
     */
    private $serviceContractExpirationMileage = null;

    /**
     * @var \DateTime $serviceContractSartDate
     */
    private $serviceContractSartDate = null;

    /**
     * @var \DateTime $serviceContractStartDate
     */
    private $serviceContractStartDate = null;

    /**
     * @var int $serviceContractStartMileage
     */
    private $serviceContractStartMileage = null;

    /**
     * @var string $transmission
     */
    private $transmission = null;

    /**
     * @var string $transmissionDescription
     */
    private $transmissionDescription = null;

    /**
     * @var string $trimCode
     */
    private $trimCode = null;

    /**
     * @var \DateTime $vehicleBuildDate
     */
    private $vehicleBuildDate = null;

    /**
     * @var string $vehicleNote
     */
    private $vehicleNote = null;

    /**
     * @var string $vehicleType
     */
    private $vehicleType = null;

    /**
     * @var string $vin
     */
    private $vin = null;

    /**
     * @var float $warrantyEndDistanceMeasure
     */
    private $warrantyEndDistanceMeasure = null;

    /**
     * @var \DateTime $warrantyExpirationDate
     */
    private $warrantyExpirationDate = null;

    /**
     * @var string $warrantyNotes
     */
    private $warrantyNotes = null;

    /**
     * @var \DateTime $warrantyStartDate
     */
    private $warrantyStartDate = null;

    /**
     * @var float $warrantyStartDistanceMeasure
     */
    private $warrantyStartDistanceMeasure = null;

    /**
     * @var string $warrantyTypeDescription
     */
    private $warrantyTypeDescription = null;

    /**
     * @var float $weight
     */
    private $weight = null;

    /**
     * @var int $year
     */
    private $year = null;

    /**
     * Gets as bodyStyle
     *
     * @return string
     */
    public function getBodyStyle()
    {
        return $this->bodyStyle;
    }

    /**
     * Sets a new bodyStyle
     *
     * @param string $bodyStyle
     * @return self
     */
    public function setBodyStyle($bodyStyle)
    {
        $this->bodyStyle = $bodyStyle;
        return $this;
    }

    /**
     * Gets as certificationNumber
     *
     * @return string
     */
    public function getCertificationNumber()
    {
        return $this->certificationNumber;
    }

    /**
     * Sets a new certificationNumber
     *
     * @param string $certificationNumber
     * @return self
     */
    public function setCertificationNumber($certificationNumber)
    {
        $this->certificationNumber = $certificationNumber;
        return $this;
    }

    /**
     * Gets as color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Sets a new color
     *
     * @param string $color
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Gets as colorCode
     *
     * @return string
     */
    public function getColorCode()
    {
        return $this->colorCode;
    }

    /**
     * Sets a new colorCode
     *
     * @param string $colorCode
     * @return self
     */
    public function setColorCode($colorCode)
    {
        $this->colorCode = $colorCode;
        return $this;
    }

    /**
     * Gets as colorDescription
     *
     * @return string
     */
    public function getColorDescription()
    {
        return $this->colorDescription;
    }

    /**
     * Sets a new colorDescription
     *
     * @param string $colorDescription
     * @return self
     */
    public function setColorDescription($colorDescription)
    {
        $this->colorDescription = $colorDescription;
        return $this;
    }

    /**
     * Gets as comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets a new comments
     *
     * @param string $comments
     * @return self
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Gets as contractCompanyName
     *
     * @return string
     */
    public function getContractCompanyName()
    {
        return $this->contractCompanyName;
    }

    /**
     * Sets a new contractCompanyName
     *
     * @param string $contractCompanyName
     * @return self
     */
    public function setContractCompanyName($contractCompanyName)
    {
        $this->contractCompanyName = $contractCompanyName;
        return $this;
    }

    /**
     * Gets as contractID
     *
     * @return string
     */
    public function getContractID()
    {
        return $this->contractID;
    }

    /**
     * Sets a new contractID
     *
     * @param string $contractID
     * @return self
     */
    public function setContractID($contractID)
    {
        $this->contractID = $contractID;
        return $this;
    }

    /**
     * Gets as contractStartDate
     *
     * @return \DateTime
     */
    public function getContractStartDate()
    {
        return $this->contractStartDate;
    }

    /**
     * Sets a new contractStartDate
     *
     * @param \DateTime $contractStartDate
     * @return self
     */
    public function setContractStartDate(\DateTime $contractStartDate = null)
    {
        $this->contractStartDate = $contractStartDate;
        return $this;
    }

    /**
     * Gets as contractStartDistanceMeasure
     *
     * @return float
     */
    public function getContractStartDistanceMeasure()
    {
        return $this->contractStartDistanceMeasure;
    }

    /**
     * Sets a new contractStartDistanceMeasure
     *
     * @param float $contractStartDistanceMeasure
     * @return self
     */
    public function setContractStartDistanceMeasure($contractStartDistanceMeasure)
    {
        $this->contractStartDistanceMeasure = $contractStartDistanceMeasure;
        return $this;
    }

    /**
     * Gets as cylinderCount
     *
     * @return int
     */
    public function getCylinderCount()
    {
        return $this->cylinderCount;
    }

    /**
     * Sets a new cylinderCount
     *
     * @param int $cylinderCount
     * @return self
     */
    public function setCylinderCount($cylinderCount)
    {
        $this->cylinderCount = $cylinderCount;
        return $this;
    }

    /**
     * Gets as detailedEngineDescription
     *
     * @return string
     */
    public function getDetailedEngineDescription()
    {
        return $this->detailedEngineDescription;
    }

    /**
     * Sets a new detailedEngineDescription
     *
     * @param string $detailedEngineDescription
     * @return self
     */
    public function setDetailedEngineDescription($detailedEngineDescription)
    {
        $this->detailedEngineDescription = $detailedEngineDescription;
        return $this;
    }

    /**
     * Gets as doorCount
     *
     * @return int
     */
    public function getDoorCount()
    {
        return $this->doorCount;
    }

    /**
     * Sets a new doorCount
     *
     * @param int $doorCount
     * @return self
     */
    public function setDoorCount($doorCount)
    {
        $this->doorCount = $doorCount;
        return $this;
    }

    /**
     * Gets as engine
     *
     * @return string
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Sets a new engine
     *
     * @param string $engine
     * @return self
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;
        return $this;
    }

    /**
     * Gets as engineSerialNumber
     *
     * @return string
     */
    public function getEngineSerialNumber()
    {
        return $this->engineSerialNumber;
    }

    /**
     * Sets a new engineSerialNumber
     *
     * @param string $engineSerialNumber
     * @return self
     */
    public function setEngineSerialNumber($engineSerialNumber)
    {
        $this->engineSerialNumber = $engineSerialNumber;
        return $this;
    }

    /**
     * Gets as factoryExteriorColor
     *
     * @return string
     */
    public function getFactoryExteriorColor()
    {
        return $this->factoryExteriorColor;
    }

    /**
     * Sets a new factoryExteriorColor
     *
     * @param string $factoryExteriorColor
     * @return self
     */
    public function setFactoryExteriorColor($factoryExteriorColor)
    {
        $this->factoryExteriorColor = $factoryExteriorColor;
        return $this;
    }

    /**
     * Gets as factoryTrimDesc
     *
     * @return string
     */
    public function getFactoryTrimDesc()
    {
        return $this->factoryTrimDesc;
    }

    /**
     * Sets a new factoryTrimDesc
     *
     * @param string $factoryTrimDesc
     * @return self
     */
    public function setFactoryTrimDesc($factoryTrimDesc)
    {
        $this->factoryTrimDesc = $factoryTrimDesc;
        return $this;
    }

    /**
     * Gets as fleetID
     *
     * @return string
     */
    public function getFleetID()
    {
        return $this->fleetID;
    }

    /**
     * Sets a new fleetID
     *
     * @param string $fleetID
     * @return self
     */
    public function setFleetID($fleetID)
    {
        $this->fleetID = $fleetID;
        return $this;
    }

    /**
     * Gets as fuelType
     *
     * @return string
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * Sets a new fuelType
     *
     * @param string $fuelType
     * @return self
     */
    public function setFuelType($fuelType)
    {
        $this->fuelType = $fuelType;
        return $this;
    }

    /**
     * Gets as fuelTypeCode
     *
     * @return string
     */
    public function getFuelTypeCode()
    {
        return $this->fuelTypeCode;
    }

    /**
     * Sets a new fuelTypeCode
     *
     * @param string $fuelTypeCode
     * @return self
     */
    public function setFuelTypeCode($fuelTypeCode)
    {
        $this->fuelTypeCode = $fuelTypeCode;
        return $this;
    }

    /**
     * Gets as ignitionKeyNumber
     *
     * @return string
     */
    public function getIgnitionKeyNumber()
    {
        return $this->ignitionKeyNumber;
    }

    /**
     * Sets a new ignitionKeyNumber
     *
     * @param string $ignitionKeyNumber
     * @return self
     */
    public function setIgnitionKeyNumber($ignitionKeyNumber)
    {
        $this->ignitionKeyNumber = $ignitionKeyNumber;
        return $this;
    }

    /**
     * Gets as interiorColor
     *
     * @return string
     */
    public function getInteriorColor()
    {
        return $this->interiorColor;
    }

    /**
     * Sets a new interiorColor
     *
     * @param string $interiorColor
     * @return self
     */
    public function setInteriorColor($interiorColor)
    {
        $this->interiorColor = $interiorColor;
        return $this;
    }

    /**
     * Gets as interiorColorCode
     *
     * @return string
     */
    public function getInteriorColorCode()
    {
        return $this->interiorColorCode;
    }

    /**
     * Sets a new interiorColorCode
     *
     * @param string $interiorColorCode
     * @return self
     */
    public function setInteriorColorCode($interiorColorCode)
    {
        $this->interiorColorCode = $interiorColorCode;
        return $this;
    }

    /**
     * Gets as interiorColorDescription
     *
     * @return string
     */
    public function getInteriorColorDescription()
    {
        return $this->interiorColorDescription;
    }

    /**
     * Sets a new interiorColorDescription
     *
     * @param string $interiorColorDescription
     * @return self
     */
    public function setInteriorColorDescription($interiorColorDescription)
    {
        $this->interiorColorDescription = $interiorColorDescription;
        return $this;
    }

    /**
     * Gets as isCertifiedPreOwned
     *
     * @return bool
     */
    public function getIsCertifiedPreOwned()
    {
        return $this->isCertifiedPreOwned;
    }

    /**
     * Sets a new isCertifiedPreOwned
     *
     * @param bool $isCertifiedPreOwned
     * @return self
     */
    public function setIsCertifiedPreOwned($isCertifiedPreOwned)
    {
        $this->isCertifiedPreOwned = $isCertifiedPreOwned;
        return $this;
    }

    /**
     * Gets as isNonUsMarket
     *
     * @return bool
     */
    public function getIsNonUsMarket()
    {
        return $this->isNonUsMarket;
    }

    /**
     * Sets a new isNonUsMarket
     *
     * @param bool $isNonUsMarket
     * @return self
     */
    public function setIsNonUsMarket($isNonUsMarket)
    {
        $this->isNonUsMarket = $isNonUsMarket;
        return $this;
    }

    /**
     * Gets as licensePlateExpirationDate
     *
     * @return \DateTime
     */
    public function getLicensePlateExpirationDate()
    {
        return $this->licensePlateExpirationDate;
    }

    /**
     * Sets a new licensePlateExpirationDate
     *
     * @param \DateTime $licensePlateExpirationDate
     * @return self
     */
    public function setLicensePlateExpirationDate(\DateTime $licensePlateExpirationDate = null)
    {
        $this->licensePlateExpirationDate = $licensePlateExpirationDate;
        return $this;
    }

    /**
     * Gets as licensePlateNumber
     *
     * @return string
     */
    public function getLicensePlateNumber()
    {
        return $this->licensePlateNumber;
    }

    /**
     * Sets a new licensePlateNumber
     *
     * @param string $licensePlateNumber
     * @return self
     */
    public function setLicensePlateNumber($licensePlateNumber)
    {
        $this->licensePlateNumber = $licensePlateNumber;
        return $this;
    }

    /**
     * Gets as lystockAvailability
     *
     * @return string
     */
    public function getLystockAvailability()
    {
        return $this->lystockAvailability;
    }

    /**
     * Sets a new lystockAvailability
     *
     * @param string $lystockAvailability
     * @return self
     */
    public function setLystockAvailability($lystockAvailability)
    {
        $this->lystockAvailability = $lystockAvailability;
        return $this;
    }

    /**
     * Gets as make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Sets a new make
     *
     * @param string $make
     * @return self
     */
    public function setMake($make)
    {
        $this->make = $make;
        return $this;
    }

    /**
     * Gets as manufacturer
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Sets a new manufacturer
     *
     * @param string $manufacturer
     * @return self
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    /**
     * Gets as mileage
     *
     * @return int
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Sets a new mileage
     *
     * @param int $mileage
     * @return self
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
        return $this;
    }

    /**
     * Gets as mnCodeDescription
     *
     * @return string
     */
    public function getMnCodeDescription()
    {
        return $this->mnCodeDescription;
    }

    /**
     * Sets a new mnCodeDescription
     *
     * @param string $mnCodeDescription
     * @return self
     */
    public function setMnCodeDescription($mnCodeDescription)
    {
        $this->mnCodeDescription = $mnCodeDescription;
        return $this;
    }

    /**
     * Gets as model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets a new model
     *
     * @param string $model
     * @return self
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Gets as modelNumber
     *
     * @return string
     */
    public function getModelNumber()
    {
        return $this->modelNumber;
    }

    /**
     * Sets a new modelNumber
     *
     * @param string $modelNumber
     * @return self
     */
    public function setModelNumber($modelNumber)
    {
        $this->modelNumber = $modelNumber;
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
    public function setModifiedStamp(\DateTime $modifiedStamp = null)
    {
        $this->modifiedStamp = $modifiedStamp;
        return $this;
    }

    /**
     * Gets as numberOfEngineCylindersNumeric
     *
     * @return float
     */
    public function getNumberOfEngineCylindersNumeric()
    {
        return $this->numberOfEngineCylindersNumeric;
    }

    /**
     * Sets a new numberOfEngineCylindersNumeric
     *
     * @param float $numberOfEngineCylindersNumeric
     * @return self
     */
    public function setNumberOfEngineCylindersNumeric($numberOfEngineCylindersNumeric)
    {
        $this->numberOfEngineCylindersNumeric = $numberOfEngineCylindersNumeric;
        return $this;
    }

    /**
     * Gets as optionString
     *
     * @return string
     */
    public function getOptionString()
    {
        return $this->optionString;
    }

    /**
     * Sets a new optionString
     *
     * @param string $optionString
     * @return self
     */
    public function setOptionString($optionString)
    {
        $this->optionString = $optionString;
        return $this;
    }

    /**
     * Gets as purchaseComments
     *
     * @return string
     */
    public function getPurchaseComments()
    {
        return $this->purchaseComments;
    }

    /**
     * Sets a new purchaseComments
     *
     * @param string $purchaseComments
     * @return self
     */
    public function setPurchaseComments($purchaseComments)
    {
        $this->purchaseComments = $purchaseComments;
        return $this;
    }

    /**
     * Gets as registrationID
     *
     * @return string
     */
    public function getRegistrationID()
    {
        return $this->registrationID;
    }

    /**
     * Sets a new registrationID
     *
     * @param string $registrationID
     * @return self
     */
    public function setRegistrationID($registrationID)
    {
        $this->registrationID = $registrationID;
        return $this;
    }

    /**
     * Gets as saleDate
     *
     * @return \DateTime
     */
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * Sets a new saleDate
     *
     * @param \DateTime $saleDate
     * @return self
     */
    public function setSaleDate(\DateTime $saleDate = null)
    {
        $this->saleDate = $saleDate;
        return $this;
    }

    /**
     * Gets as saleType
     *
     * @return string
     */
    public function getSaleType()
    {
        return $this->saleType;
    }

    /**
     * Sets a new saleType
     *
     * @param string $saleType
     * @return self
     */
    public function setSaleType($saleType)
    {
        $this->saleType = $saleType;
        return $this;
    }

    /**
     * Gets as series
     *
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Sets a new series
     *
     * @param string $series
     * @return self
     */
    public function setSeries($series)
    {
        $this->series = $series;
        return $this;
    }

    /**
     * Gets as serviceContractCompanyName
     *
     * @return string
     */
    public function getServiceContractCompanyName()
    {
        return $this->serviceContractCompanyName;
    }

    /**
     * Sets a new serviceContractCompanyName
     *
     * @param string $serviceContractCompanyName
     * @return self
     */
    public function setServiceContractCompanyName($serviceContractCompanyName)
    {
        $this->serviceContractCompanyName = $serviceContractCompanyName;
        return $this;
    }

    /**
     * Gets as serviceContractExpirationDate
     *
     * @return \DateTime
     */
    public function getServiceContractExpirationDate()
    {
        return $this->serviceContractExpirationDate;
    }

    /**
     * Sets a new serviceContractExpirationDate
     *
     * @param \DateTime $serviceContractExpirationDate
     * @return self
     */
    public function setServiceContractExpirationDate(\DateTime $serviceContractExpirationDate = null)
    {
        $this->serviceContractExpirationDate = $serviceContractExpirationDate;
        return $this;
    }

    /**
     * Gets as serviceContractExpirationMileage
     *
     * @return int
     */
    public function getServiceContractExpirationMileage()
    {
        return $this->serviceContractExpirationMileage;
    }

    /**
     * Sets a new serviceContractExpirationMileage
     *
     * @param int $serviceContractExpirationMileage
     * @return self
     */
    public function setServiceContractExpirationMileage($serviceContractExpirationMileage)
    {
        $this->serviceContractExpirationMileage = $serviceContractExpirationMileage;
        return $this;
    }

    /**
     * Gets as serviceContractSartDate
     *
     * @return \DateTime
     */
    public function getServiceContractSartDate()
    {
        return $this->serviceContractSartDate;
    }

    /**
     * Sets a new serviceContractSartDate
     *
     * @param \DateTime $serviceContractSartDate
     * @return self
     */
    public function setServiceContractSartDate(\DateTime $serviceContractSartDate = null)
    {
        $this->serviceContractSartDate = $serviceContractSartDate;
        return $this;
    }

    /**
     * Gets as serviceContractStartDate
     *
     * @return \DateTime
     */
    public function getServiceContractStartDate()
    {
        return $this->serviceContractStartDate;
    }

    /**
     * Sets a new serviceContractStartDate
     *
     * @param \DateTime $serviceContractStartDate
     * @return self
     */
    public function setServiceContractStartDate(\DateTime $serviceContractStartDate = null)
    {
        $this->serviceContractStartDate = $serviceContractStartDate;
        return $this;
    }

    /**
     * Gets as serviceContractStartMileage
     *
     * @return int
     */
    public function getServiceContractStartMileage()
    {
        return $this->serviceContractStartMileage;
    }

    /**
     * Sets a new serviceContractStartMileage
     *
     * @param int $serviceContractStartMileage
     * @return self
     */
    public function setServiceContractStartMileage($serviceContractStartMileage)
    {
        $this->serviceContractStartMileage = $serviceContractStartMileage;
        return $this;
    }

    /**
     * Gets as transmission
     *
     * @return string
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Sets a new transmission
     *
     * @param string $transmission
     * @return self
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;
        return $this;
    }

    /**
     * Gets as transmissionDescription
     *
     * @return string
     */
    public function getTransmissionDescription()
    {
        return $this->transmissionDescription;
    }

    /**
     * Sets a new transmissionDescription
     *
     * @param string $transmissionDescription
     * @return self
     */
    public function setTransmissionDescription($transmissionDescription)
    {
        $this->transmissionDescription = $transmissionDescription;
        return $this;
    }

    /**
     * Gets as trimCode
     *
     * @return string
     */
    public function getTrimCode()
    {
        return $this->trimCode;
    }

    /**
     * Sets a new trimCode
     *
     * @param string $trimCode
     * @return self
     */
    public function setTrimCode($trimCode)
    {
        $this->trimCode = $trimCode;
        return $this;
    }

    /**
     * Gets as vehicleBuildDate
     *
     * @return \DateTime
     */
    public function getVehicleBuildDate()
    {
        return $this->vehicleBuildDate;
    }

    /**
     * Sets a new vehicleBuildDate
     *
     * @param \DateTime $vehicleBuildDate
     * @return self
     */
    public function setVehicleBuildDate(\DateTime $vehicleBuildDate = null)
    {
        $this->vehicleBuildDate = $vehicleBuildDate;
        return $this;
    }

    /**
     * Gets as vehicleNote
     *
     * @return string
     */
    public function getVehicleNote()
    {
        return $this->vehicleNote;
    }

    /**
     * Sets a new vehicleNote
     *
     * @param string $vehicleNote
     * @return self
     */
    public function setVehicleNote($vehicleNote)
    {
        $this->vehicleNote = $vehicleNote;
        return $this;
    }

    /**
     * Gets as vehicleType
     *
     * @return string
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }

    /**
     * Sets a new vehicleType
     *
     * @param string $vehicleType
     * @return self
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;
        return $this;
    }

    /**
     * Gets as vin
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Sets a new vin
     *
     * @param string $vin
     * @return self
     */
    public function setVin($vin)
    {
        $this->vin = $vin;
        return $this;
    }

    /**
     * Gets as warrantyEndDistanceMeasure
     *
     * @return float
     */
    public function getWarrantyEndDistanceMeasure()
    {
        return $this->warrantyEndDistanceMeasure;
    }

    /**
     * Sets a new warrantyEndDistanceMeasure
     *
     * @param float $warrantyEndDistanceMeasure
     * @return self
     */
    public function setWarrantyEndDistanceMeasure($warrantyEndDistanceMeasure)
    {
        $this->warrantyEndDistanceMeasure = $warrantyEndDistanceMeasure;
        return $this;
    }

    /**
     * Gets as warrantyExpirationDate
     *
     * @return \DateTime
     */
    public function getWarrantyExpirationDate()
    {
        return $this->warrantyExpirationDate;
    }

    /**
     * Sets a new warrantyExpirationDate
     *
     * @param \DateTime $warrantyExpirationDate
     * @return self
     */
    public function setWarrantyExpirationDate(\DateTime $warrantyExpirationDate = null)
    {
        $this->warrantyExpirationDate = $warrantyExpirationDate;
        return $this;
    }

    /**
     * Gets as warrantyNotes
     *
     * @return string
     */
    public function getWarrantyNotes()
    {
        return $this->warrantyNotes;
    }

    /**
     * Sets a new warrantyNotes
     *
     * @param string $warrantyNotes
     * @return self
     */
    public function setWarrantyNotes($warrantyNotes)
    {
        $this->warrantyNotes = $warrantyNotes;
        return $this;
    }

    /**
     * Gets as warrantyStartDate
     *
     * @return \DateTime
     */
    public function getWarrantyStartDate()
    {
        return $this->warrantyStartDate;
    }

    /**
     * Sets a new warrantyStartDate
     *
     * @param \DateTime $warrantyStartDate
     * @return self
     */
    public function setWarrantyStartDate(\DateTime $warrantyStartDate = null)
    {
        $this->warrantyStartDate = $warrantyStartDate;
        return $this;
    }

    /**
     * Gets as warrantyStartDistanceMeasure
     *
     * @return float
     */
    public function getWarrantyStartDistanceMeasure()
    {
        return $this->warrantyStartDistanceMeasure;
    }

    /**
     * Sets a new warrantyStartDistanceMeasure
     *
     * @param float $warrantyStartDistanceMeasure
     * @return self
     */
    public function setWarrantyStartDistanceMeasure($warrantyStartDistanceMeasure)
    {
        $this->warrantyStartDistanceMeasure = $warrantyStartDistanceMeasure;
        return $this;
    }

    /**
     * Gets as warrantyTypeDescription
     *
     * @return string
     */
    public function getWarrantyTypeDescription()
    {
        return $this->warrantyTypeDescription;
    }

    /**
     * Sets a new warrantyTypeDescription
     *
     * @param string $warrantyTypeDescription
     * @return self
     */
    public function setWarrantyTypeDescription($warrantyTypeDescription)
    {
        $this->warrantyTypeDescription = $warrantyTypeDescription;
        return $this;
    }

    /**
     * Gets as weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Sets a new weight
     *
     * @param float $weight
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * Gets as year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Sets a new year
     *
     * @param int $year
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }


}

