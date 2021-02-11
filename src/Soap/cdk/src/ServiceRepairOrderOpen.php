<?php

namespace App\Soap\cdk\src;

/**
 * Class representing ServiceRepairOrderOpen
 */
class ServiceRepairOrderOpen
{

    /**
     * @var \App\Soap\cdk\src\PostedDate $postedDate
     */
    private $postedDate = null;

    /**
     * @var string $specialCustFlag
     */
    private $specialCustFlag = null;

    /**
     * @var string $vIN
     */
    private $vIN = null;

    /**
     * @var \App\Soap\cdk\src\DisDebitAccountNo $disDebitAccountNo
     */
    private $disDebitAccountNo = null;

    /**
     * @var \App\Soap\cdk\src\DisUserID $disUserID
     */
    private $disUserID = null;

    /**
     * @var \App\Soap\cdk\src\FeeOpCodeDesc $feeOpCodeDesc
     */
    private $feeOpCodeDesc = null;

    /**
     * @var \App\Soap\cdk\src\HrsActualHours $hrsActualHours
     */
    private $hrsActualHours = null;

    /**
     * @var \App\Soap\cdk\src\PrtBin1 $prtBin1
     */
    private $prtBin1 = null;

    /**
     * @var \App\Soap\cdk\src\PrtClass $prtClass
     */
    private $prtClass = null;

    /**
     * @var \App\Soap\cdk\src\PurchaseOrderNo $purchaseOrderNo
     */
    private $purchaseOrderNo = null;

    /**
     * @var \App\Soap\cdk\src\PrtDesc $prtDesc
     */
    private $prtDesc = null;

    /**
     * @var \App\Soap\cdk\src\LbrCost $lbrCost
     */
    private $lbrCost = null;

    /**
     * @var string $waiterFlag
     */
    private $waiterFlag = null;

    /**
     * @var \App\Soap\cdk\src\LinCause $linCause
     */
    private $linCause = null;

    /**
     * @var \App\Soap\cdk\src\PrtSource $prtSource
     */
    private $prtSource = null;

    /**
     * @var \App\Soap\cdk\src\PrtCoreSale $prtCoreSale
     */
    private $prtCoreSale = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totLocalTax
     */
    private $totLocalTax = null;

    /**
     * @var \App\Soap\cdk\src\ApptTime $apptTime
     */
    private $apptTime = null;

    /**
     * @var \App\Soap\cdk\src\LbrLaborType $lbrLaborType
     */
    private $lbrLaborType = null;

    /**
     * @var string $cityStateZip
     */
    private $cityStateZip = null;

    /**
     * @var \App\Soap\cdk\src\Comments $comments
     */
    private $comments = null;

    /**
     * @var \App\Soap\cdk\src\ContactEmailAddress $contactEmailAddress
     */
    private $contactEmailAddress = null;

    /**
     * @var string $origPromisedDate
     */
    private $origPromisedDate = null;

    /**
     * @var int $rONumber
     */
    private $rONumber = null;

    /**
     * @var int $serviceAdvisor
     */
    private $serviceAdvisor = null;

    /**
     * @var \App\Soap\cdk\src\DisDebitTargetCo $disDebitTargetCo
     */
    private $disDebitTargetCo = null;

    /**
     * @var \App\Soap\cdk\src\FeeOpCode $feeOpCode
     */
    private $feeOpCode = null;

    /**
     * @var \App\Soap\cdk\src\HrsCost $hrsCost
     */
    private $hrsCost = null;

    /**
     * @var \App\Soap\cdk\src\HrsPercentage $hrsPercentage
     */
    private $hrsPercentage = null;

    /**
     * @var \App\Soap\cdk\src\LbrSequenceNo $lbrSequenceNo
     */
    private $lbrSequenceNo = null;

    /**
     * @var \App\Soap\cdk\src\LinServiceRequest $linServiceRequest
     */
    private $linServiceRequest = null;

    /**
     * @var \App\Soap\cdk\src\PrtSpecialStatus $prtSpecialStatus
     */
    private $prtSpecialStatus = null;

    /**
     * @var \App\Soap\cdk\src\RapApptID $rapApptID
     */
    private $rapApptID = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totLubeSale
     */
    private $totLubeSale = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totSoldHours
     */
    private $totSoldHours = null;

    /**
     * @var \App\Soap\cdk\src\PayInsuranceFlag $payInsuranceFlag
     */
    private $payInsuranceFlag = null;

    /**
     * @var \App\Soap\cdk\src\LbrOpCode $lbrOpCode
     */
    private $lbrOpCode = null;

    /**
     * @var \App\Soap\cdk\src\ClosedDate $closedDate
     */
    private $closedDate = null;

    /**
     * @var \App\Soap\cdk\src\ErrorLevel $errorLevel
     */
    private $errorLevel = null;

    /**
     * @var \App\Soap\cdk\src\Name2 $name2
     */
    private $name2 = null;

    /**
     * @var string $openDate
     */
    private $openDate = null;

    /**
     * @var int $vehID
     */
    private $vehID = null;

    /**
     * @var \App\Soap\cdk\src\HrsHourType $hrsHourType
     */
    private $hrsHourType = null;

    /**
     * @var \App\Soap\cdk\src\HrsLaborType $hrsLaborType
     */
    private $hrsLaborType = null;

    /**
     * @var \App\Soap\cdk\src\HrsTechNo $hrsTechNo
     */
    private $hrsTechNo = null;

    /**
     * @var \App\Soap\cdk\src\LbrTechNo $lbrTechNo
     */
    private $lbrTechNo = null;

    /**
     * @var \App\Soap\cdk\src\LbrTimeCardHours $lbrTimeCardHours
     */
    private $lbrTimeCardHours = null;

    /**
     * @var \App\Soap\cdk\src\LinEstDuration $linEstDuration
     */
    private $linEstDuration = null;

    /**
     * @var \App\Soap\cdk\src\PrtUnitServiceCharge $prtUnitServiceCharge
     */
    private $prtUnitServiceCharge = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totPartsSale
     */
    private $totPartsSale = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totShopChargeSale
     */
    private $totShopChargeSale = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totSupp4Tax
     */
    private $totSupp4Tax = null;

    /**
     * @var \App\Soap\cdk\src\WarFailureCode $warFailureCode
     */
    private $warFailureCode = null;

    /**
     * @var \App\Soap\cdk\src\PrtComp $prtComp
     */
    private $prtComp = null;

    /**
     * @var \App\Soap\cdk\src\PrtCoreCost $prtCoreCost
     */
    private $prtCoreCost = null;

    /**
     * @var int $mileage
     */
    private $mileage = null;

    /**
     * @var string $address
     */
    private $address = null;

    /**
     * @var string $comebackFlag
     */
    private $comebackFlag = null;

    /**
     * @var int $contactPhoneNumber
     */
    private $contactPhoneNumber = null;

    /**
     * @var string $estComplDate
     */
    private $estComplDate = null;

    /**
     * @var string $makeDesc
     */
    private $makeDesc = null;

    /**
     * @var \App\Soap\cdk\src\OrigPromisedTime $origPromisedTime
     */
    private $origPromisedTime = null;

    /**
     * @var \App\Soap\cdk\src\Remarks $remarks
     */
    private $remarks = null;

    /**
     * @var string $vehicleColor
     */
    private $vehicleColor = null;

    /**
     * @var \App\Soap\cdk\src\FeeFeeID $feeFeeID
     */
    private $feeFeeID = null;

    /**
     * @var \App\Soap\cdk\src\HrsLineCode $hrsLineCode
     */
    private $hrsLineCode = null;

    /**
     * @var \App\Soap\cdk\src\HrsOtherHours $hrsOtherHours
     */
    private $hrsOtherHours = null;

    /**
     * @var \App\Soap\cdk\src\LbrOpCodeDesc $lbrOpCodeDesc
     */
    private $lbrOpCodeDesc = null;

    /**
     * @var \App\Soap\cdk\src\PrtOutsideSalesmanNo $prtOutsideSalesmanNo
     */
    private $prtOutsideSalesmanNo = null;

    /**
     * @var \App\Soap\cdk\src\PrtSale $prtSale
     */
    private $prtSale = null;

    /**
     * @var \App\Soap\cdk\src\PrtCompLineCode $prtCompLineCode
     */
    private $prtCompLineCode = null;

    /**
     * @var \App\Soap\cdk\src\BookedDate $bookedDate
     */
    private $bookedDate = null;

    /**
     * @var string $estComplTime
     */
    private $estComplTime = null;

    /**
     * @var \App\Soap\cdk\src\MileageOut $mileageOut
     */
    private $mileageOut = null;

    /**
     * @var string $model
     */
    private $model = null;

    /**
     * @var string $soldByDealerFlag
     */
    private $soldByDealerFlag = null;

    /**
     * @var string $tagNo
     */
    private $tagNo = null;

    /**
     * @var \App\Soap\cdk\src\FeeLineCode $feeLineCode
     */
    private $feeLineCode = null;

    /**
     * @var \App\Soap\cdk\src\LinComplaintCode $linComplaintCode
     */
    private $linComplaintCode = null;

    /**
     * @var \App\Soap\cdk\src\PrtEmployeeNo $prtEmployeeNo
     */
    private $prtEmployeeNo = null;

    /**
     * @var \App\Soap\cdk\src\PrtLaborType $prtLaborType
     */
    private $prtLaborType = null;

    /**
     * @var \App\Soap\cdk\src\PrtPartNo $prtPartNo
     */
    private $prtPartNo = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totRoSale
     */
    private $totRoSale = null;

    /**
     * @var \App\Soap\cdk\src\LinStoryEmployeeNo $linStoryEmployeeNo
     */
    private $linStoryEmployeeNo = null;

    /**
     * @var string $addOnFlag
     */
    private $addOnFlag = null;

    /**
     * @var string $apptFlag
     */
    private $apptFlag = null;

    /**
     * @var \App\Soap\cdk\src\LbrMcdPercentage $lbrMcdPercentage
     */
    private $lbrMcdPercentage = null;

    /**
     * @var string $lastServiceDate
     */
    private $lastServiceDate = null;

    /**
     * @var string $origWaiterFlag
     */
    private $origWaiterFlag = null;

    /**
     * @var int $priorityValue
     */
    private $priorityValue = null;

    /**
     * @var string $rentalFlag
     */
    private $rentalFlag = null;

    /**
     * @var int $year
     */
    private $year = null;

    /**
     * @var \App\Soap\cdk\src\DisDebitControlNo $disDebitControlNo
     */
    private $disDebitControlNo = null;

    /**
     * @var \App\Soap\cdk\src\LbrSale $lbrSale
     */
    private $lbrSale = null;

    /**
     * @var \App\Soap\cdk\src\LinComebackFlag $linComebackFlag
     */
    private $linComebackFlag = null;

    /**
     * @var \App\Soap\cdk\src\LinDispatchCode $linDispatchCode
     */
    private $linDispatchCode = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totLaborSale
     */
    private $totLaborSale = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totMiscSale
     */
    private $totMiscSale = null;

    /**
     * @var \App\Soap\cdk\src\ApptDate $apptDate
     */
    private $apptDate = null;

    /**
     * @var string $deliveryDate
     */
    private $deliveryDate = null;

    /**
     * @var \App\Soap\cdk\src\ErrorMessage $errorMessage
     */
    private $errorMessage = null;

    /**
     * @var string $make
     */
    private $make = null;

    /**
     * @var int $mileageLastVisit
     */
    private $mileageLastVisit = null;

    /**
     * @var string $promisedTime
     */
    private $promisedTime = null;

    /**
     * @var \App\Soap\cdk\src\VoidedDate $voidedDate
     */
    private $voidedDate = null;

    /**
     * @var \App\Soap\cdk\src\FeeCost $feeCost
     */
    private $feeCost = null;

    /**
     * @var \App\Soap\cdk\src\HrsSoldHours $hrsSoldHours
     */
    private $hrsSoldHours = null;

    /**
     * @var \App\Soap\cdk\src\LinCampaignCode $linCampaignCode
     */
    private $linCampaignCode = null;

    /**
     * @var \App\Soap\cdk\src\LinStatusCode $linStatusCode
     */
    private $linStatusCode = null;

    /**
     * @var \App\Soap\cdk\src\LinStatusDesc $linStatusDesc
     */
    private $linStatusDesc = null;

    /**
     * @var \App\Soap\cdk\src\PrtQtyOrdered $prtQtyOrdered
     */
    private $prtQtyOrdered = null;

    /**
     * @var \App\Soap\cdk\src\PrtQtySold $prtQtySold
     */
    private $prtQtySold = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totLaborCost
     */
    private $totLaborCost = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totMiscCost
     */
    private $totMiscCost = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totPartsCost
     */
    private $totPartsCost = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totSubletSale
     */
    private $totSubletSale = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totSupp3Tax
     */
    private $totSupp3Tax = null;

    /**
     * @var \App\Soap\cdk\src\BookerNo $bookerNo
     */
    private $bookerNo = null;

    /**
     * @var \App\Soap\cdk\src\Cashier $cashier
     */
    private $cashier = null;

    /**
     * @var int $custNo
     */
    private $custNo = null;

    /**
     * @var string $hostItemID
     */
    private $hostItemID = null;

    /**
     * @var string $name1
     */
    private $name1 = null;

    /**
     * @var string $promisedDate
     */
    private $promisedDate = null;

    /**
     * @var \App\Soap\cdk\src\FeeLaborType $feeLaborType
     */
    private $feeLaborType = null;

    /**
     * @var \App\Soap\cdk\src\HrsSale $hrsSale
     */
    private $hrsSale = null;

    /**
     * @var \App\Soap\cdk\src\LinLineCode $linLineCode
     */
    private $linLineCode = null;

    /**
     * @var \App\Soap\cdk\src\PrtCost $prtCost
     */
    private $prtCost = null;

    /**
     * @var \App\Soap\cdk\src\PrtList $prtList
     */
    private $prtList = null;

    /**
     * @var \App\Soap\cdk\src\PrtMcdPercentage $prtMcdPercentage
     */
    private $prtMcdPercentage = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totStateTax
     */
    private $totStateTax = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totSupp2Tax
     */
    private $totSupp2Tax = null;

    /**
     * @var \App\Soap\cdk\src\MlsType $mlsType
     */
    private $mlsType = null;

    /**
     * @var \App\Soap\cdk\src\PunWorkType $punWorkType
     */
    private $punWorkType = null;

    /**
     * @var int $punMultivalueCount
     */
    private $punMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\PunTechNo $punTechNo
     */
    private $punTechNo = null;

    /**
     * @var \App\Soap\cdk\src\PunTimeOn $punTimeOn
     */
    private $punTimeOn = null;

    /**
     * @var \App\Soap\cdk\src\PunWorkDate $punWorkDate
     */
    private $punWorkDate = null;

    /**
     * @var \App\Soap\cdk\src\PunTimeOff $punTimeOff
     */
    private $punTimeOff = null;

    /**
     * @var \App\Soap\cdk\src\PunDuration $punDuration
     */
    private $punDuration = null;

    /**
     * @var \App\Soap\cdk\src\PunLineCode $punLineCode
     */
    private $punLineCode = null;

    /**
     * @var \App\Soap\cdk\src\BookedTime $bookedTime
     */
    private $bookedTime = null;

    /**
     * @var \App\Soap\cdk\src\DisLevel $disLevel
     */
    private $disLevel = null;

    /**
     * @var int $disMultivalueCount
     */
    private $disMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\FeeType $feeType
     */
    private $feeType = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totLaborCount
     */
    private $totLaborCount = null;

    /**
     * @var \App\Soap\cdk\src\DedMaximumAmount $dedMaximumAmount
     */
    private $dedMaximumAmount = null;

    /**
     * @var \App\Soap\cdk\src\DisLaborDiscount $disLaborDiscount
     */
    private $disLaborDiscount = null;

    /**
     * @var \App\Soap\cdk\src\FeeSale $feeSale
     */
    private $feeSale = null;

    /**
     * @var \App\Soap\cdk\src\LinStoryText $linStoryText
     */
    private $linStoryText = null;

    /**
     * @var int $mlsMultivalueCount
     */
    private $mlsMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\V[] $phoneDesc
     */
    private $phoneDesc = null;

    /**
     * @var \App\Soap\cdk\src\PhoneExt $phoneExt
     */
    private $phoneExt = null;

    /**
     * @var \App\Soap\cdk\src\PunAlteredFlag $punAlteredFlag
     */
    private $punAlteredFlag = null;

    /**
     * @var string $statusDesc
     */
    private $statusDesc = null;

    /**
     * @var \App\Soap\cdk\src\BlockAutoMsg $blockAutoMsg
     */
    private $blockAutoMsg = null;

    /**
     * @var \App\Soap\cdk\src\DisClassOrType $disClassOrType
     */
    private $disClassOrType = null;

    /**
     * @var \App\Soap\cdk\src\LbrFlagHours $lbrFlagHours
     */
    private $lbrFlagHours = null;

    /**
     * @var \App\Soap\cdk\src\LbrComebackTech $lbrComebackTech
     */
    private $lbrComebackTech = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totCoreCost
     */
    private $totCoreCost = null;

    /**
     * @var \App\Soap\cdk\src\FeeLOPorPartSeqNo $feeLOPorPartSeqNo
     */
    private $feeLOPorPartSeqNo = null;

    /**
     * @var float $payPaymentsMade
     */
    private $payPaymentsMade = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totPayType
     */
    private $totPayType = null;

    /**
     * @var \App\Soap\cdk\src\MlsOpCode $mlsOpCode
     */
    private $mlsOpCode = null;

    /**
     * @var \App\Soap\cdk\src\WarLaborSequenceNo $warLaborSequenceNo
     */
    private $warLaborSequenceNo = null;

    /**
     * @var int $dedMultivalueCount
     */
    private $dedMultivalueCount = null;

    /**
     * @var int $hrsMultivalueCount
     */
    private $hrsMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\LbrOperationType $lbrOperationType
     */
    private $lbrOperationType = null;

    /**
     * @var \App\Soap\cdk\src\DisTotalDiscount $disTotalDiscount
     */
    private $disTotalDiscount = null;

    /**
     * @var string $modelDesc
     */
    private $modelDesc = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totLubeCost
     */
    private $totLubeCost = null;

    /**
     * @var \App\Soap\cdk\src\PayPaymentAmount $payPaymentAmount
     */
    private $payPaymentAmount = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totActualHours
     */
    private $totActualHours = null;

    /**
     * @var string $hasIntPayFlag
     */
    private $hasIntPayFlag = null;

    /**
     * @var \App\Soap\cdk\src\LicenseNumber $licenseNumber
     */
    private $licenseNumber = null;

    /**
     * @var \App\Soap\cdk\src\MlsLaborType $mlsLaborType
     */
    private $mlsLaborType = null;

    /**
     * @var \App\Soap\cdk\src\MlsSequenceNo $mlsSequenceNo
     */
    private $mlsSequenceNo = null;

    /**
     * @var int $payMultivalueCount
     */
    private $payMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\PrtExtendedSale $prtExtendedSale
     */
    private $prtExtendedSale = null;

    /**
     * @var \App\Soap\cdk\src\PrtLaborSequenceNo $prtLaborSequenceNo
     */
    private $prtLaborSequenceNo = null;

    /**
     * @var string $statusCode
     */
    private $statusCode = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totLaborDiscount
     */
    private $totLaborDiscount = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totOtherHours
     */
    private $totOtherHours = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totTimeCardHours
     */
    private $totTimeCardHours = null;

    /**
     * @var \App\Soap\cdk\src\DedLineCodes $dedLineCodes
     */
    private $dedLineCodes = null;

    /**
     * @var \App\Soap\cdk\src\DisDiscountID $disDiscountID
     */
    private $disDiscountID = null;

    /**
     * @var \App\Soap\cdk\src\DisOverridePercent $disOverridePercent
     */
    private $disOverridePercent = null;

    /**
     * @var \App\Soap\cdk\src\EmailAddress $emailAddress
     */
    private $emailAddress = null;

    /**
     * @var \App\Soap\cdk\src\HrsFlagHours $hrsFlagHours
     */
    private $hrsFlagHours = null;

    /**
     * @var \App\Soap\cdk\src\HrsTimeCardHours $hrsTimeCardHours
     */
    private $hrsTimeCardHours = null;

    /**
     * @var \App\Soap\cdk\src\LbrLineCode $lbrLineCode
     */
    private $lbrLineCode = null;

    /**
     * @var \App\Soap\cdk\src\LbrSoldHours $lbrSoldHours
     */
    private $lbrSoldHours = null;

    /**
     * @var \App\Soap\cdk\src\LinBookerNo $linBookerNo
     */
    private $linBookerNo = null;

    /**
     * @var \App\Soap\cdk\src\LotLocation $lotLocation
     */
    private $lotLocation = null;

    /**
     * @var \App\Soap\cdk\src\MlsOpCodeDesc $mlsOpCodeDesc
     */
    private $mlsOpCodeDesc = null;

    /**
     * @var string $openTime
     */
    private $openTime = null;

    /**
     * @var \App\Soap\cdk\src\V[] $phoneNumber
     */
    private $phoneNumber = null;

    /**
     * @var \App\Soap\cdk\src\WarFailedPartsCount $warFailedPartsCount
     */
    private $warFailedPartsCount = null;

    /**
     * @var \App\Soap\cdk\src\DedSequenceNo $dedSequenceNo
     */
    private $dedSequenceNo = null;

    /**
     * @var \App\Soap\cdk\src\DisLopSeqNo $disLopSeqNo
     */
    private $disLopSeqNo = null;

    /**
     * @var \App\Soap\cdk\src\DisOverrideTarget $disOverrideTarget
     */
    private $disOverrideTarget = null;

    /**
     * @var \App\Soap\cdk\src\FeeLOPorPartFlag $feeLOPorPartFlag
     */
    private $feeLOPorPartFlag = null;

    /**
     * @var int $feeMultivalueCount
     */
    private $feeMultivalueCount = null;

    /**
     * @var string $hasCustPayFlag
     */
    private $hasCustPayFlag = null;

    /**
     * @var \App\Soap\cdk\src\LbrComebackRO $lbrComebackRO
     */
    private $lbrComebackRO = null;

    /**
     * @var \App\Soap\cdk\src\LbrComebackSA $lbrComebackSA
     */
    private $lbrComebackSA = null;

    /**
     * @var \App\Soap\cdk\src\LbrForcedShopCharge $lbrForcedShopCharge
     */
    private $lbrForcedShopCharge = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totFlagHours
     */
    private $totFlagHours = null;

    /**
     * @var int $totMultivalueCount
     */
    private $totMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totShopChargeCost
     */
    private $totShopChargeCost = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totSubletCount
     */
    private $totSubletCount = null;

    /**
     * @var \App\Soap\cdk\src\WarAuthorizationCode $warAuthorizationCode
     */
    private $warAuthorizationCode = null;

    /**
     * @var \App\Soap\cdk\src\WarClaimType $warClaimType
     */
    private $warClaimType = null;

    /**
     * @var \App\Soap\cdk\src\WarConditionCode $warConditionCode
     */
    private $warConditionCode = null;

    /**
     * @var \App\Soap\cdk\src\WarLineCode $warLineCode
     */
    private $warLineCode = null;

    /**
     * @var int $warMultivalueCount
     */
    private $warMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\DedActualAmount $dedActualAmount
     */
    private $dedActualAmount = null;

    /**
     * @var \App\Soap\cdk\src\DedLaborType $dedLaborType
     */
    private $dedLaborType = null;

    /**
     * @var \App\Soap\cdk\src\DisAppliedBy $disAppliedBy
     */
    private $disAppliedBy = null;

    /**
     * @var \App\Soap\cdk\src\DisDesc $disDesc
     */
    private $disDesc = null;

    /**
     * @var \App\Soap\cdk\src\DisManagerOverride $disManagerOverride
     */
    private $disManagerOverride = null;

    /**
     * @var \App\Soap\cdk\src\DisOverrideGPPercent $disOverrideGPPercent
     */
    private $disOverrideGPPercent = null;

    /**
     * @var \App\Soap\cdk\src\HrsMcdPercentage $hrsMcdPercentage
     */
    private $hrsMcdPercentage = null;

    /**
     * @var \App\Soap\cdk\src\LbrOtherHours $lbrOtherHours
     */
    private $lbrOtherHours = null;

    /**
     * @var \App\Soap\cdk\src\MlsMcdPercentage $mlsMcdPercentage
     */
    private $mlsMcdPercentage = null;

    /**
     * @var float $payCPTotal
     */
    private $payCPTotal = null;

    /**
     * @var \App\Soap\cdk\src\PayPaymentCode $payPaymentCode
     */
    private $payPaymentCode = null;

    /**
     * @var int $phoneMultivalueCount
     */
    private $phoneMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\PrtExtendedCost $prtExtendedCost
     */
    private $prtExtendedCost = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totDiscount
     */
    private $totDiscount = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totPartsDiscount
     */
    private $totPartsDiscount = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totRoSalePostDed
     */
    private $totRoSalePostDed = null;

    /**
     * @var \App\Soap\cdk\src\DedPartsAmount $dedPartsAmount
     */
    private $dedPartsAmount = null;

    /**
     * @var \App\Soap\cdk\src\DisOverrideAmount $disOverrideAmount
     */
    private $disOverrideAmount = null;

    /**
     * @var \App\Soap\cdk\src\DisSequenceNo $disSequenceNo
     */
    private $disSequenceNo = null;

    /**
     * @var \App\Soap\cdk\src\EmailDesc $emailDesc
     */
    private $emailDesc = null;

    /**
     * @var \App\Soap\cdk\src\FeeSequenceNo $feeSequenceNo
     */
    private $feeSequenceNo = null;

    /**
     * @var int $linMultivalueCount
     */
    private $linMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\LinStorySequenceNo $linStorySequenceNo
     */
    private $linStorySequenceNo = null;

    /**
     * @var \App\Soap\cdk\src\PrtLineCode $prtLineCode
     */
    private $prtLineCode = null;

    /**
     * @var int $prtMultivalueCount
     */
    private $prtMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\PrtSequenceNo $prtSequenceNo
     */
    private $prtSequenceNo = null;

    /**
     * @var int $rapMultivalueCount
     */
    private $rapMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totLaborSalePostDed
     */
    private $totLaborSalePostDed = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totLubeCount
     */
    private $totLubeCount = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totPartsSalePostDed
     */
    private $totPartsSalePostDed = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totRoCost
     */
    private $totRoCost = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totRoTax
     */
    private $totRoTax = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totSubletCost
     */
    private $totSubletCost = null;

    /**
     * @var \App\Soap\cdk\src\DedLaborAmount $dedLaborAmount
     */
    private $dedLaborAmount = null;

    /**
     * @var \App\Soap\cdk\src\DisLineCode $disLineCode
     */
    private $disLineCode = null;

    /**
     * @var \App\Soap\cdk\src\DisOriginalDiscount $disOriginalDiscount
     */
    private $disOriginalDiscount = null;

    /**
     * @var \App\Soap\cdk\src\DisOverrideGPAmount $disOverrideGPAmount
     */
    private $disOverrideGPAmount = null;

    /**
     * @var \App\Soap\cdk\src\DisPartsDiscount $disPartsDiscount
     */
    private $disPartsDiscount = null;

    /**
     * @var int $emailMultivalueCount
     */
    private $emailMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\FeeMcdPercentage $feeMcdPercentage
     */
    private $feeMcdPercentage = null;

    /**
     * @var string $hasWarrPayFlag
     */
    private $hasWarrPayFlag = null;

    /**
     * @var \App\Soap\cdk\src\HrsSequenceNo $hrsSequenceNo
     */
    private $hrsSequenceNo = null;

    /**
     * @var \App\Soap\cdk\src\LbrActualHours $lbrActualHours
     */
    private $lbrActualHours = null;

    /**
     * @var \App\Soap\cdk\src\LbrComebackFlag $lbrComebackFlag
     */
    private $lbrComebackFlag = null;

    /**
     * @var int $lbrMultivalueCount
     */
    private $lbrMultivalueCount = null;

    /**
     * @var \App\Soap\cdk\src\LinActualWork $linActualWork
     */
    private $linActualWork = null;

    /**
     * @var \App\Soap\cdk\src\LinAddOnFlag $linAddOnFlag
     */
    private $linAddOnFlag = null;

    /**
     * @var \App\Soap\cdk\src\MlsCost $mlsCost
     */
    private $mlsCost = null;

    /**
     * @var \App\Soap\cdk\src\MlsLineCode $mlsLineCode
     */
    private $mlsLineCode = null;

    /**
     * @var \App\Soap\cdk\src\MlsSale $mlsSale
     */
    private $mlsSale = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totCoreSale
     */
    private $totCoreSale = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totForcedShopCharge
     */
    private $totForcedShopCharge = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totMiscCount
     */
    private $totMiscCount = null;

    /**
     * @var \App\Soap\cdk\src\V[] $totPartsCount
     */
    private $totPartsCount = null;

    /**
     * @var \App\Soap\cdk\src\WarFailedPartNo $warFailedPartNo
     */
    private $warFailedPartNo = null;

    /**
     * @var int $zip
     */
    private $zip = null;

    /**
     * @var \App\Soap\cdk\src\PrtQtyOnHand $prtQtyOnHand
     */
    private $prtQtyOnHand = null;

    /**
     * @var \App\Soap\cdk\src\PrtQtyBackordered $prtQtyBackordered
     */
    private $prtQtyBackordered = null;

    /**
     * @var \App\Soap\cdk\src\PrtQtyFilled $prtQtyFilled
     */
    private $prtQtyFilled = null;

    /**
     * Gets as postedDate
     *
     * @return \App\Soap\cdk\src\PostedDate
     */
    public function getPostedDate()
    {
        return $this->postedDate;
    }

    /**
     * Sets a new postedDate
     *
     * @param \App\Soap\cdk\src\PostedDate $postedDate
     * @return self
     */
    public function setPostedDate(\App\Soap\cdk\src\PostedDate $postedDate)
    {
        $this->postedDate = $postedDate;
        return $this;
    }

    /**
     * Gets as specialCustFlag
     *
     * @return string
     */
    public function getSpecialCustFlag()
    {
        return $this->specialCustFlag;
    }

    /**
     * Sets a new specialCustFlag
     *
     * @param string $specialCustFlag
     * @return self
     */
    public function setSpecialCustFlag($specialCustFlag)
    {
        $this->specialCustFlag = $specialCustFlag;
        return $this;
    }

    /**
     * Gets as vIN
     *
     * @return string
     */
    public function getVIN()
    {
        return $this->vIN;
    }

    /**
     * Sets a new vIN
     *
     * @param string $vIN
     * @return self
     */
    public function setVIN($vIN)
    {
        $this->vIN = $vIN;
        return $this;
    }

    /**
     * Gets as disDebitAccountNo
     *
     * @return \App\Soap\cdk\src\DisDebitAccountNo
     */
    public function getDisDebitAccountNo()
    {
        return $this->disDebitAccountNo;
    }

    /**
     * Sets a new disDebitAccountNo
     *
     * @param \App\Soap\cdk\src\DisDebitAccountNo $disDebitAccountNo
     * @return self
     */
    public function setDisDebitAccountNo(\App\Soap\cdk\src\DisDebitAccountNo $disDebitAccountNo)
    {
        $this->disDebitAccountNo = $disDebitAccountNo;
        return $this;
    }

    /**
     * Gets as disUserID
     *
     * @return \App\Soap\cdk\src\DisUserID
     */
    public function getDisUserID()
    {
        return $this->disUserID;
    }

    /**
     * Sets a new disUserID
     *
     * @param \App\Soap\cdk\src\DisUserID $disUserID
     * @return self
     */
    public function setDisUserID(\App\Soap\cdk\src\DisUserID $disUserID)
    {
        $this->disUserID = $disUserID;
        return $this;
    }

    /**
     * Gets as feeOpCodeDesc
     *
     * @return \App\Soap\cdk\src\FeeOpCodeDesc
     */
    public function getFeeOpCodeDesc()
    {
        return $this->feeOpCodeDesc;
    }

    /**
     * Sets a new feeOpCodeDesc
     *
     * @param \App\Soap\cdk\src\FeeOpCodeDesc $feeOpCodeDesc
     * @return self
     */
    public function setFeeOpCodeDesc(\App\Soap\cdk\src\FeeOpCodeDesc $feeOpCodeDesc)
    {
        $this->feeOpCodeDesc = $feeOpCodeDesc;
        return $this;
    }

    /**
     * Gets as hrsActualHours
     *
     * @return \App\Soap\cdk\src\HrsActualHours
     */
    public function getHrsActualHours()
    {
        return $this->hrsActualHours;
    }

    /**
     * Sets a new hrsActualHours
     *
     * @param \App\Soap\cdk\src\HrsActualHours $hrsActualHours
     * @return self
     */
    public function setHrsActualHours(\App\Soap\cdk\src\HrsActualHours $hrsActualHours)
    {
        $this->hrsActualHours = $hrsActualHours;
        return $this;
    }

    /**
     * Gets as prtBin1
     *
     * @return \App\Soap\cdk\src\PrtBin1
     */
    public function getPrtBin1()
    {
        return $this->prtBin1;
    }

    /**
     * Sets a new prtBin1
     *
     * @param \App\Soap\cdk\src\PrtBin1 $prtBin1
     * @return self
     */
    public function setPrtBin1(\App\Soap\cdk\src\PrtBin1 $prtBin1)
    {
        $this->prtBin1 = $prtBin1;
        return $this;
    }

    /**
     * Gets as prtClass
     *
     * @return \App\Soap\cdk\src\PrtClass
     */
    public function getPrtClass()
    {
        return $this->prtClass;
    }

    /**
     * Sets a new prtClass
     *
     * @param \App\Soap\cdk\src\PrtClass $prtClass
     * @return self
     */
    public function setPrtClass(\App\Soap\cdk\src\PrtClass $prtClass)
    {
        $this->prtClass = $prtClass;
        return $this;
    }

    /**
     * Gets as purchaseOrderNo
     *
     * @return \App\Soap\cdk\src\PurchaseOrderNo
     */
    public function getPurchaseOrderNo()
    {
        return $this->purchaseOrderNo;
    }

    /**
     * Sets a new purchaseOrderNo
     *
     * @param \App\Soap\cdk\src\PurchaseOrderNo $purchaseOrderNo
     * @return self
     */
    public function setPurchaseOrderNo(\App\Soap\cdk\src\PurchaseOrderNo $purchaseOrderNo)
    {
        $this->purchaseOrderNo = $purchaseOrderNo;
        return $this;
    }

    /**
     * Gets as prtDesc
     *
     * @return \App\Soap\cdk\src\PrtDesc
     */
    public function getPrtDesc()
    {
        return $this->prtDesc;
    }

    /**
     * Sets a new prtDesc
     *
     * @param \App\Soap\cdk\src\PrtDesc $prtDesc
     * @return self
     */
    public function setPrtDesc(\App\Soap\cdk\src\PrtDesc $prtDesc)
    {
        $this->prtDesc = $prtDesc;
        return $this;
    }

    /**
     * Gets as lbrCost
     *
     * @return \App\Soap\cdk\src\LbrCost
     */
    public function getLbrCost()
    {
        return $this->lbrCost;
    }

    /**
     * Sets a new lbrCost
     *
     * @param \App\Soap\cdk\src\LbrCost $lbrCost
     * @return self
     */
    public function setLbrCost(\App\Soap\cdk\src\LbrCost $lbrCost)
    {
        $this->lbrCost = $lbrCost;
        return $this;
    }

    /**
     * Gets as waiterFlag
     *
     * @return string
     */
    public function getWaiterFlag()
    {
        return $this->waiterFlag;
    }

    /**
     * Sets a new waiterFlag
     *
     * @param string $waiterFlag
     * @return self
     */
    public function setWaiterFlag($waiterFlag)
    {
        $this->waiterFlag = $waiterFlag;
        return $this;
    }

    /**
     * Gets as linCause
     *
     * @return \App\Soap\cdk\src\LinCause
     */
    public function getLinCause()
    {
        return $this->linCause;
    }

    /**
     * Sets a new linCause
     *
     * @param \App\Soap\cdk\src\LinCause $linCause
     * @return self
     */
    public function setLinCause(\App\Soap\cdk\src\LinCause $linCause)
    {
        $this->linCause = $linCause;
        return $this;
    }

    /**
     * Gets as prtSource
     *
     * @return \App\Soap\cdk\src\PrtSource
     */
    public function getPrtSource()
    {
        return $this->prtSource;
    }

    /**
     * Sets a new prtSource
     *
     * @param \App\Soap\cdk\src\PrtSource $prtSource
     * @return self
     */
    public function setPrtSource(\App\Soap\cdk\src\PrtSource $prtSource)
    {
        $this->prtSource = $prtSource;
        return $this;
    }

    /**
     * Gets as prtCoreSale
     *
     * @return \App\Soap\cdk\src\PrtCoreSale
     */
    public function getPrtCoreSale()
    {
        return $this->prtCoreSale;
    }

    /**
     * Sets a new prtCoreSale
     *
     * @param \App\Soap\cdk\src\PrtCoreSale $prtCoreSale
     * @return self
     */
    public function setPrtCoreSale(\App\Soap\cdk\src\PrtCoreSale $prtCoreSale)
    {
        $this->prtCoreSale = $prtCoreSale;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotLocalTax(\App\Soap\cdk\src\V $v)
    {
        $this->totLocalTax[] = $v;
        return $this;
    }

    /**
     * isset totLocalTax
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotLocalTax($index)
    {
        return isset($this->totLocalTax[$index]);
    }

    /**
     * unset totLocalTax
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotLocalTax($index)
    {
        unset($this->totLocalTax[$index]);
    }

    /**
     * Gets as totLocalTax
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotLocalTax()
    {
        return $this->totLocalTax;
    }

    /**
     * Sets a new totLocalTax
     *
     * @param \App\Soap\cdk\src\V[] $totLocalTax
     * @return self
     */
    public function setTotLocalTax(array $totLocalTax)
    {
        $this->totLocalTax = $totLocalTax;
        return $this;
    }

    /**
     * Gets as apptTime
     *
     * @return \App\Soap\cdk\src\ApptTime
     */
    public function getApptTime()
    {
        return $this->apptTime;
    }

    /**
     * Sets a new apptTime
     *
     * @param \App\Soap\cdk\src\ApptTime $apptTime
     * @return self
     */
    public function setApptTime(\App\Soap\cdk\src\ApptTime $apptTime)
    {
        $this->apptTime = $apptTime;
        return $this;
    }

    /**
     * Gets as lbrLaborType
     *
     * @return \App\Soap\cdk\src\LbrLaborType
     */
    public function getLbrLaborType()
    {
        return $this->lbrLaborType;
    }

    /**
     * Sets a new lbrLaborType
     *
     * @param \App\Soap\cdk\src\LbrLaborType $lbrLaborType
     * @return self
     */
    public function setLbrLaborType(\App\Soap\cdk\src\LbrLaborType $lbrLaborType)
    {
        $this->lbrLaborType = $lbrLaborType;
        return $this;
    }

    /**
     * Gets as cityStateZip
     *
     * @return string
     */
    public function getCityStateZip()
    {
        return $this->cityStateZip;
    }

    /**
     * Sets a new cityStateZip
     *
     * @param string $cityStateZip
     * @return self
     */
    public function setCityStateZip($cityStateZip)
    {
        $this->cityStateZip = $cityStateZip;
        return $this;
    }

    /**
     * Gets as comments
     *
     * @return \App\Soap\cdk\src\Comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Sets a new comments
     *
     * @param \App\Soap\cdk\src\Comments $comments
     * @return self
     */
    public function setComments(\App\Soap\cdk\src\Comments $comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Gets as contactEmailAddress
     *
     * @return \App\Soap\cdk\src\ContactEmailAddress
     */
    public function getContactEmailAddress()
    {
        return $this->contactEmailAddress;
    }

    /**
     * Sets a new contactEmailAddress
     *
     * @param \App\Soap\cdk\src\ContactEmailAddress $contactEmailAddress
     * @return self
     */
    public function setContactEmailAddress(\App\Soap\cdk\src\ContactEmailAddress $contactEmailAddress)
    {
        $this->contactEmailAddress = $contactEmailAddress;
        return $this;
    }

    /**
     * Gets as origPromisedDate
     *
     * @return string
     */
    public function getOrigPromisedDate()
    {
        return $this->origPromisedDate;
    }

    /**
     * Sets a new origPromisedDate
     *
     * @param string $origPromisedDate
     * @return self
     */
    public function setOrigPromisedDate($origPromisedDate)
    {
        $this->origPromisedDate = $origPromisedDate;
        return $this;
    }

    /**
     * Gets as rONumber
     *
     * @return int
     */
    public function getRONumber()
    {
        return $this->rONumber;
    }

    /**
     * Sets a new rONumber
     *
     * @param int $rONumber
     * @return self
     */
    public function setRONumber($rONumber)
    {
        $this->rONumber = $rONumber;
        return $this;
    }

    /**
     * Gets as serviceAdvisor
     *
     * @return int
     */
    public function getServiceAdvisor()
    {
        return $this->serviceAdvisor;
    }

    /**
     * Sets a new serviceAdvisor
     *
     * @param int $serviceAdvisor
     * @return self
     */
    public function setServiceAdvisor($serviceAdvisor)
    {
        $this->serviceAdvisor = $serviceAdvisor;
        return $this;
    }

    /**
     * Gets as disDebitTargetCo
     *
     * @return \App\Soap\cdk\src\DisDebitTargetCo
     */
    public function getDisDebitTargetCo()
    {
        return $this->disDebitTargetCo;
    }

    /**
     * Sets a new disDebitTargetCo
     *
     * @param \App\Soap\cdk\src\DisDebitTargetCo $disDebitTargetCo
     * @return self
     */
    public function setDisDebitTargetCo(\App\Soap\cdk\src\DisDebitTargetCo $disDebitTargetCo)
    {
        $this->disDebitTargetCo = $disDebitTargetCo;
        return $this;
    }

    /**
     * Gets as feeOpCode
     *
     * @return \App\Soap\cdk\src\FeeOpCode
     */
    public function getFeeOpCode()
    {
        return $this->feeOpCode;
    }

    /**
     * Sets a new feeOpCode
     *
     * @param \App\Soap\cdk\src\FeeOpCode $feeOpCode
     * @return self
     */
    public function setFeeOpCode(\App\Soap\cdk\src\FeeOpCode $feeOpCode)
    {
        $this->feeOpCode = $feeOpCode;
        return $this;
    }

    /**
     * Gets as hrsCost
     *
     * @return \App\Soap\cdk\src\HrsCost
     */
    public function getHrsCost()
    {
        return $this->hrsCost;
    }

    /**
     * Sets a new hrsCost
     *
     * @param \App\Soap\cdk\src\HrsCost $hrsCost
     * @return self
     */
    public function setHrsCost(\App\Soap\cdk\src\HrsCost $hrsCost)
    {
        $this->hrsCost = $hrsCost;
        return $this;
    }

    /**
     * Gets as hrsPercentage
     *
     * @return \App\Soap\cdk\src\HrsPercentage
     */
    public function getHrsPercentage()
    {
        return $this->hrsPercentage;
    }

    /**
     * Sets a new hrsPercentage
     *
     * @param \App\Soap\cdk\src\HrsPercentage $hrsPercentage
     * @return self
     */
    public function setHrsPercentage(\App\Soap\cdk\src\HrsPercentage $hrsPercentage)
    {
        $this->hrsPercentage = $hrsPercentage;
        return $this;
    }

    /**
     * Gets as lbrSequenceNo
     *
     * @return \App\Soap\cdk\src\LbrSequenceNo
     */
    public function getLbrSequenceNo()
    {
        return $this->lbrSequenceNo;
    }

    /**
     * Sets a new lbrSequenceNo
     *
     * @param \App\Soap\cdk\src\LbrSequenceNo $lbrSequenceNo
     * @return self
     */
    public function setLbrSequenceNo(\App\Soap\cdk\src\LbrSequenceNo $lbrSequenceNo)
    {
        $this->lbrSequenceNo = $lbrSequenceNo;
        return $this;
    }

    /**
     * Gets as linServiceRequest
     *
     * @return \App\Soap\cdk\src\LinServiceRequest
     */
    public function getLinServiceRequest()
    {
        return $this->linServiceRequest;
    }

    /**
     * Sets a new linServiceRequest
     *
     * @param \App\Soap\cdk\src\LinServiceRequest $linServiceRequest
     * @return self
     */
    public function setLinServiceRequest(\App\Soap\cdk\src\LinServiceRequest $linServiceRequest)
    {
        $this->linServiceRequest = $linServiceRequest;
        return $this;
    }

    /**
     * Gets as prtSpecialStatus
     *
     * @return \App\Soap\cdk\src\PrtSpecialStatus
     */
    public function getPrtSpecialStatus()
    {
        return $this->prtSpecialStatus;
    }

    /**
     * Sets a new prtSpecialStatus
     *
     * @param \App\Soap\cdk\src\PrtSpecialStatus $prtSpecialStatus
     * @return self
     */
    public function setPrtSpecialStatus(\App\Soap\cdk\src\PrtSpecialStatus $prtSpecialStatus)
    {
        $this->prtSpecialStatus = $prtSpecialStatus;
        return $this;
    }

    /**
     * Gets as rapApptID
     *
     * @return \App\Soap\cdk\src\RapApptID
     */
    public function getRapApptID()
    {
        return $this->rapApptID;
    }

    /**
     * Sets a new rapApptID
     *
     * @param \App\Soap\cdk\src\RapApptID $rapApptID
     * @return self
     */
    public function setRapApptID(\App\Soap\cdk\src\RapApptID $rapApptID)
    {
        $this->rapApptID = $rapApptID;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotLubeSale(\App\Soap\cdk\src\V $v)
    {
        $this->totLubeSale[] = $v;
        return $this;
    }

    /**
     * isset totLubeSale
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotLubeSale($index)
    {
        return isset($this->totLubeSale[$index]);
    }

    /**
     * unset totLubeSale
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotLubeSale($index)
    {
        unset($this->totLubeSale[$index]);
    }

    /**
     * Gets as totLubeSale
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotLubeSale()
    {
        return $this->totLubeSale;
    }

    /**
     * Sets a new totLubeSale
     *
     * @param \App\Soap\cdk\src\V[] $totLubeSale
     * @return self
     */
    public function setTotLubeSale(array $totLubeSale)
    {
        $this->totLubeSale = $totLubeSale;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotSoldHours(\App\Soap\cdk\src\V $v)
    {
        $this->totSoldHours[] = $v;
        return $this;
    }

    /**
     * isset totSoldHours
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotSoldHours($index)
    {
        return isset($this->totSoldHours[$index]);
    }

    /**
     * unset totSoldHours
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotSoldHours($index)
    {
        unset($this->totSoldHours[$index]);
    }

    /**
     * Gets as totSoldHours
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotSoldHours()
    {
        return $this->totSoldHours;
    }

    /**
     * Sets a new totSoldHours
     *
     * @param \App\Soap\cdk\src\V[] $totSoldHours
     * @return self
     */
    public function setTotSoldHours(array $totSoldHours)
    {
        $this->totSoldHours = $totSoldHours;
        return $this;
    }

    /**
     * Gets as payInsuranceFlag
     *
     * @return \App\Soap\cdk\src\PayInsuranceFlag
     */
    public function getPayInsuranceFlag()
    {
        return $this->payInsuranceFlag;
    }

    /**
     * Sets a new payInsuranceFlag
     *
     * @param \App\Soap\cdk\src\PayInsuranceFlag $payInsuranceFlag
     * @return self
     */
    public function setPayInsuranceFlag(\App\Soap\cdk\src\PayInsuranceFlag $payInsuranceFlag)
    {
        $this->payInsuranceFlag = $payInsuranceFlag;
        return $this;
    }

    /**
     * Gets as lbrOpCode
     *
     * @return \App\Soap\cdk\src\LbrOpCode
     */
    public function getLbrOpCode()
    {
        return $this->lbrOpCode;
    }

    /**
     * Sets a new lbrOpCode
     *
     * @param \App\Soap\cdk\src\LbrOpCode $lbrOpCode
     * @return self
     */
    public function setLbrOpCode(\App\Soap\cdk\src\LbrOpCode $lbrOpCode)
    {
        $this->lbrOpCode = $lbrOpCode;
        return $this;
    }

    /**
     * Gets as closedDate
     *
     * @return \App\Soap\cdk\src\ClosedDate
     */
    public function getClosedDate()
    {
        return $this->closedDate;
    }

    /**
     * Sets a new closedDate
     *
     * @param \App\Soap\cdk\src\ClosedDate $closedDate
     * @return self
     */
    public function setClosedDate(\App\Soap\cdk\src\ClosedDate $closedDate)
    {
        $this->closedDate = $closedDate;
        return $this;
    }

    /**
     * Gets as errorLevel
     *
     * @return \App\Soap\cdk\src\ErrorLevel
     */
    public function getErrorLevel()
    {
        return $this->errorLevel;
    }

    /**
     * Sets a new errorLevel
     *
     * @param \App\Soap\cdk\src\ErrorLevel $errorLevel
     * @return self
     */
    public function setErrorLevel(\App\Soap\cdk\src\ErrorLevel $errorLevel)
    {
        $this->errorLevel = $errorLevel;
        return $this;
    }

    /**
     * Gets as name2
     *
     * @return \App\Soap\cdk\src\Name2
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * Sets a new name2
     *
     * @param \App\Soap\cdk\src\Name2 $name2
     * @return self
     */
    public function setName2(\App\Soap\cdk\src\Name2 $name2)
    {
        $this->name2 = $name2;
        return $this;
    }

    /**
     * Gets as openDate
     *
     * @return string
     */
    public function getOpenDate()
    {
        return $this->openDate;
    }

    /**
     * Sets a new openDate
     *
     * @param string $openDate
     * @return self
     */
    public function setOpenDate($openDate)
    {
        $this->openDate = $openDate;
        return $this;
    }

    /**
     * Gets as vehID
     *
     * @return int
     */
    public function getVehID()
    {
        return $this->vehID;
    }

    /**
     * Sets a new vehID
     *
     * @param int $vehID
     * @return self
     */
    public function setVehID($vehID)
    {
        $this->vehID = $vehID;
        return $this;
    }

    /**
     * Gets as hrsHourType
     *
     * @return \App\Soap\cdk\src\HrsHourType
     */
    public function getHrsHourType()
    {
        return $this->hrsHourType;
    }

    /**
     * Sets a new hrsHourType
     *
     * @param \App\Soap\cdk\src\HrsHourType $hrsHourType
     * @return self
     */
    public function setHrsHourType(\App\Soap\cdk\src\HrsHourType $hrsHourType)
    {
        $this->hrsHourType = $hrsHourType;
        return $this;
    }

    /**
     * Gets as hrsLaborType
     *
     * @return \App\Soap\cdk\src\HrsLaborType
     */
    public function getHrsLaborType()
    {
        return $this->hrsLaborType;
    }

    /**
     * Sets a new hrsLaborType
     *
     * @param \App\Soap\cdk\src\HrsLaborType $hrsLaborType
     * @return self
     */
    public function setHrsLaborType(\App\Soap\cdk\src\HrsLaborType $hrsLaborType)
    {
        $this->hrsLaborType = $hrsLaborType;
        return $this;
    }

    /**
     * Gets as hrsTechNo
     *
     * @return \App\Soap\cdk\src\HrsTechNo
     */
    public function getHrsTechNo()
    {
        return $this->hrsTechNo;
    }

    /**
     * Sets a new hrsTechNo
     *
     * @param \App\Soap\cdk\src\HrsTechNo $hrsTechNo
     * @return self
     */
    public function setHrsTechNo(\App\Soap\cdk\src\HrsTechNo $hrsTechNo)
    {
        $this->hrsTechNo = $hrsTechNo;
        return $this;
    }

    /**
     * Gets as lbrTechNo
     *
     * @return \App\Soap\cdk\src\LbrTechNo
     */
    public function getLbrTechNo()
    {
        return $this->lbrTechNo;
    }

    /**
     * Sets a new lbrTechNo
     *
     * @param \App\Soap\cdk\src\LbrTechNo $lbrTechNo
     * @return self
     */
    public function setLbrTechNo(\App\Soap\cdk\src\LbrTechNo $lbrTechNo)
    {
        $this->lbrTechNo = $lbrTechNo;
        return $this;
    }

    /**
     * Gets as lbrTimeCardHours
     *
     * @return \App\Soap\cdk\src\LbrTimeCardHours
     */
    public function getLbrTimeCardHours()
    {
        return $this->lbrTimeCardHours;
    }

    /**
     * Sets a new lbrTimeCardHours
     *
     * @param \App\Soap\cdk\src\LbrTimeCardHours $lbrTimeCardHours
     * @return self
     */
    public function setLbrTimeCardHours(\App\Soap\cdk\src\LbrTimeCardHours $lbrTimeCardHours)
    {
        $this->lbrTimeCardHours = $lbrTimeCardHours;
        return $this;
    }

    /**
     * Gets as linEstDuration
     *
     * @return \App\Soap\cdk\src\LinEstDuration
     */
    public function getLinEstDuration()
    {
        return $this->linEstDuration;
    }

    /**
     * Sets a new linEstDuration
     *
     * @param \App\Soap\cdk\src\LinEstDuration $linEstDuration
     * @return self
     */
    public function setLinEstDuration(\App\Soap\cdk\src\LinEstDuration $linEstDuration)
    {
        $this->linEstDuration = $linEstDuration;
        return $this;
    }

    /**
     * Gets as prtUnitServiceCharge
     *
     * @return \App\Soap\cdk\src\PrtUnitServiceCharge
     */
    public function getPrtUnitServiceCharge()
    {
        return $this->prtUnitServiceCharge;
    }

    /**
     * Sets a new prtUnitServiceCharge
     *
     * @param \App\Soap\cdk\src\PrtUnitServiceCharge $prtUnitServiceCharge
     * @return self
     */
    public function setPrtUnitServiceCharge(\App\Soap\cdk\src\PrtUnitServiceCharge $prtUnitServiceCharge)
    {
        $this->prtUnitServiceCharge = $prtUnitServiceCharge;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotPartsSale(\App\Soap\cdk\src\V $v)
    {
        $this->totPartsSale[] = $v;
        return $this;
    }

    /**
     * isset totPartsSale
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotPartsSale($index)
    {
        return isset($this->totPartsSale[$index]);
    }

    /**
     * unset totPartsSale
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotPartsSale($index)
    {
        unset($this->totPartsSale[$index]);
    }

    /**
     * Gets as totPartsSale
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotPartsSale()
    {
        return $this->totPartsSale;
    }

    /**
     * Sets a new totPartsSale
     *
     * @param \App\Soap\cdk\src\V[] $totPartsSale
     * @return self
     */
    public function setTotPartsSale(array $totPartsSale)
    {
        $this->totPartsSale = $totPartsSale;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotShopChargeSale(\App\Soap\cdk\src\V $v)
    {
        $this->totShopChargeSale[] = $v;
        return $this;
    }

    /**
     * isset totShopChargeSale
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotShopChargeSale($index)
    {
        return isset($this->totShopChargeSale[$index]);
    }

    /**
     * unset totShopChargeSale
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotShopChargeSale($index)
    {
        unset($this->totShopChargeSale[$index]);
    }

    /**
     * Gets as totShopChargeSale
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotShopChargeSale()
    {
        return $this->totShopChargeSale;
    }

    /**
     * Sets a new totShopChargeSale
     *
     * @param \App\Soap\cdk\src\V[] $totShopChargeSale
     * @return self
     */
    public function setTotShopChargeSale(array $totShopChargeSale)
    {
        $this->totShopChargeSale = $totShopChargeSale;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotSupp4Tax(\App\Soap\cdk\src\V $v)
    {
        $this->totSupp4Tax[] = $v;
        return $this;
    }

    /**
     * isset totSupp4Tax
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotSupp4Tax($index)
    {
        return isset($this->totSupp4Tax[$index]);
    }

    /**
     * unset totSupp4Tax
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotSupp4Tax($index)
    {
        unset($this->totSupp4Tax[$index]);
    }

    /**
     * Gets as totSupp4Tax
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotSupp4Tax()
    {
        return $this->totSupp4Tax;
    }

    /**
     * Sets a new totSupp4Tax
     *
     * @param \App\Soap\cdk\src\V[] $totSupp4Tax
     * @return self
     */
    public function setTotSupp4Tax(array $totSupp4Tax)
    {
        $this->totSupp4Tax = $totSupp4Tax;
        return $this;
    }

    /**
     * Gets as warFailureCode
     *
     * @return \App\Soap\cdk\src\WarFailureCode
     */
    public function getWarFailureCode()
    {
        return $this->warFailureCode;
    }

    /**
     * Sets a new warFailureCode
     *
     * @param \App\Soap\cdk\src\WarFailureCode $warFailureCode
     * @return self
     */
    public function setWarFailureCode(\App\Soap\cdk\src\WarFailureCode $warFailureCode)
    {
        $this->warFailureCode = $warFailureCode;
        return $this;
    }

    /**
     * Gets as prtComp
     *
     * @return \App\Soap\cdk\src\PrtComp
     */
    public function getPrtComp()
    {
        return $this->prtComp;
    }

    /**
     * Sets a new prtComp
     *
     * @param \App\Soap\cdk\src\PrtComp $prtComp
     * @return self
     */
    public function setPrtComp(\App\Soap\cdk\src\PrtComp $prtComp)
    {
        $this->prtComp = $prtComp;
        return $this;
    }

    /**
     * Gets as prtCoreCost
     *
     * @return \App\Soap\cdk\src\PrtCoreCost
     */
    public function getPrtCoreCost()
    {
        return $this->prtCoreCost;
    }

    /**
     * Sets a new prtCoreCost
     *
     * @param \App\Soap\cdk\src\PrtCoreCost $prtCoreCost
     * @return self
     */
    public function setPrtCoreCost(\App\Soap\cdk\src\PrtCoreCost $prtCoreCost)
    {
        $this->prtCoreCost = $prtCoreCost;
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
     * Gets as address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets a new address
     *
     * @param string $address
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Gets as comebackFlag
     *
     * @return string
     */
    public function getComebackFlag()
    {
        return $this->comebackFlag;
    }

    /**
     * Sets a new comebackFlag
     *
     * @param string $comebackFlag
     * @return self
     */
    public function setComebackFlag($comebackFlag)
    {
        $this->comebackFlag = $comebackFlag;
        return $this;
    }

    /**
     * Gets as contactPhoneNumber
     *
     * @return int
     */
    public function getContactPhoneNumber()
    {
        return $this->contactPhoneNumber;
    }

    /**
     * Sets a new contactPhoneNumber
     *
     * @param int $contactPhoneNumber
     * @return self
     */
    public function setContactPhoneNumber($contactPhoneNumber)
    {
        $this->contactPhoneNumber = $contactPhoneNumber;
        return $this;
    }

    /**
     * Gets as estComplDate
     *
     * @return string
     */
    public function getEstComplDate()
    {
        return $this->estComplDate;
    }

    /**
     * Sets a new estComplDate
     *
     * @param string $estComplDate
     * @return self
     */
    public function setEstComplDate($estComplDate)
    {
        $this->estComplDate = $estComplDate;
        return $this;
    }

    /**
     * Gets as makeDesc
     *
     * @return string
     */
    public function getMakeDesc()
    {
        return $this->makeDesc;
    }

    /**
     * Sets a new makeDesc
     *
     * @param string $makeDesc
     * @return self
     */
    public function setMakeDesc($makeDesc)
    {
        $this->makeDesc = $makeDesc;
        return $this;
    }

    /**
     * Gets as origPromisedTime
     *
     * @return \App\Soap\cdk\src\OrigPromisedTime
     */
    public function getOrigPromisedTime()
    {
        return $this->origPromisedTime;
    }

    /**
     * Sets a new origPromisedTime
     *
     * @param \App\Soap\cdk\src\OrigPromisedTime $origPromisedTime
     * @return self
     */
    public function setOrigPromisedTime(\App\Soap\cdk\src\OrigPromisedTime $origPromisedTime)
    {
        $this->origPromisedTime = $origPromisedTime;
        return $this;
    }

    /**
     * Gets as remarks
     *
     * @return \App\Soap\cdk\src\Remarks
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Sets a new remarks
     *
     * @param \App\Soap\cdk\src\Remarks $remarks
     * @return self
     */
    public function setRemarks(\App\Soap\cdk\src\Remarks $remarks)
    {
        $this->remarks = $remarks;
        return $this;
    }

    /**
     * Gets as vehicleColor
     *
     * @return string
     */
    public function getVehicleColor()
    {
        return $this->vehicleColor;
    }

    /**
     * Sets a new vehicleColor
     *
     * @param string $vehicleColor
     * @return self
     */
    public function setVehicleColor($vehicleColor)
    {
        $this->vehicleColor = $vehicleColor;
        return $this;
    }

    /**
     * Gets as feeFeeID
     *
     * @return \App\Soap\cdk\src\FeeFeeID
     */
    public function getFeeFeeID()
    {
        return $this->feeFeeID;
    }

    /**
     * Sets a new feeFeeID
     *
     * @param \App\Soap\cdk\src\FeeFeeID $feeFeeID
     * @return self
     */
    public function setFeeFeeID(\App\Soap\cdk\src\FeeFeeID $feeFeeID)
    {
        $this->feeFeeID = $feeFeeID;
        return $this;
    }

    /**
     * Gets as hrsLineCode
     *
     * @return \App\Soap\cdk\src\HrsLineCode
     */
    public function getHrsLineCode()
    {
        return $this->hrsLineCode;
    }

    /**
     * Sets a new hrsLineCode
     *
     * @param \App\Soap\cdk\src\HrsLineCode $hrsLineCode
     * @return self
     */
    public function setHrsLineCode(\App\Soap\cdk\src\HrsLineCode $hrsLineCode)
    {
        $this->hrsLineCode = $hrsLineCode;
        return $this;
    }

    /**
     * Gets as hrsOtherHours
     *
     * @return \App\Soap\cdk\src\HrsOtherHours
     */
    public function getHrsOtherHours()
    {
        return $this->hrsOtherHours;
    }

    /**
     * Sets a new hrsOtherHours
     *
     * @param \App\Soap\cdk\src\HrsOtherHours $hrsOtherHours
     * @return self
     */
    public function setHrsOtherHours(\App\Soap\cdk\src\HrsOtherHours $hrsOtherHours)
    {
        $this->hrsOtherHours = $hrsOtherHours;
        return $this;
    }

    /**
     * Gets as lbrOpCodeDesc
     *
     * @return \App\Soap\cdk\src\LbrOpCodeDesc
     */
    public function getLbrOpCodeDesc()
    {
        return $this->lbrOpCodeDesc;
    }

    /**
     * Sets a new lbrOpCodeDesc
     *
     * @param \App\Soap\cdk\src\LbrOpCodeDesc $lbrOpCodeDesc
     * @return self
     */
    public function setLbrOpCodeDesc(\App\Soap\cdk\src\LbrOpCodeDesc $lbrOpCodeDesc)
    {
        $this->lbrOpCodeDesc = $lbrOpCodeDesc;
        return $this;
    }

    /**
     * Gets as prtOutsideSalesmanNo
     *
     * @return \App\Soap\cdk\src\PrtOutsideSalesmanNo
     */
    public function getPrtOutsideSalesmanNo()
    {
        return $this->prtOutsideSalesmanNo;
    }

    /**
     * Sets a new prtOutsideSalesmanNo
     *
     * @param \App\Soap\cdk\src\PrtOutsideSalesmanNo $prtOutsideSalesmanNo
     * @return self
     */
    public function setPrtOutsideSalesmanNo(\App\Soap\cdk\src\PrtOutsideSalesmanNo $prtOutsideSalesmanNo)
    {
        $this->prtOutsideSalesmanNo = $prtOutsideSalesmanNo;
        return $this;
    }

    /**
     * Gets as prtSale
     *
     * @return \App\Soap\cdk\src\PrtSale
     */
    public function getPrtSale()
    {
        return $this->prtSale;
    }

    /**
     * Sets a new prtSale
     *
     * @param \App\Soap\cdk\src\PrtSale $prtSale
     * @return self
     */
    public function setPrtSale(\App\Soap\cdk\src\PrtSale $prtSale)
    {
        $this->prtSale = $prtSale;
        return $this;
    }

    /**
     * Gets as prtCompLineCode
     *
     * @return \App\Soap\cdk\src\PrtCompLineCode
     */
    public function getPrtCompLineCode()
    {
        return $this->prtCompLineCode;
    }

    /**
     * Sets a new prtCompLineCode
     *
     * @param \App\Soap\cdk\src\PrtCompLineCode $prtCompLineCode
     * @return self
     */
    public function setPrtCompLineCode(\App\Soap\cdk\src\PrtCompLineCode $prtCompLineCode)
    {
        $this->prtCompLineCode = $prtCompLineCode;
        return $this;
    }

    /**
     * Gets as bookedDate
     *
     * @return \App\Soap\cdk\src\BookedDate
     */
    public function getBookedDate()
    {
        return $this->bookedDate;
    }

    /**
     * Sets a new bookedDate
     *
     * @param \App\Soap\cdk\src\BookedDate $bookedDate
     * @return self
     */
    public function setBookedDate(\App\Soap\cdk\src\BookedDate $bookedDate)
    {
        $this->bookedDate = $bookedDate;
        return $this;
    }

    /**
     * Gets as estComplTime
     *
     * @return string
     */
    public function getEstComplTime()
    {
        return $this->estComplTime;
    }

    /**
     * Sets a new estComplTime
     *
     * @param string $estComplTime
     * @return self
     */
    public function setEstComplTime($estComplTime)
    {
        $this->estComplTime = $estComplTime;
        return $this;
    }

    /**
     * Gets as mileageOut
     *
     * @return \App\Soap\cdk\src\MileageOut
     */
    public function getMileageOut()
    {
        return $this->mileageOut;
    }

    /**
     * Sets a new mileageOut
     *
     * @param \App\Soap\cdk\src\MileageOut $mileageOut
     * @return self
     */
    public function setMileageOut(\App\Soap\cdk\src\MileageOut $mileageOut)
    {
        $this->mileageOut = $mileageOut;
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
     * Gets as soldByDealerFlag
     *
     * @return string
     */
    public function getSoldByDealerFlag()
    {
        return $this->soldByDealerFlag;
    }

    /**
     * Sets a new soldByDealerFlag
     *
     * @param string $soldByDealerFlag
     * @return self
     */
    public function setSoldByDealerFlag($soldByDealerFlag)
    {
        $this->soldByDealerFlag = $soldByDealerFlag;
        return $this;
    }

    /**
     * Gets as tagNo
     *
     * @return string
     */
    public function getTagNo()
    {
        return $this->tagNo;
    }

    /**
     * Sets a new tagNo
     *
     * @param string $tagNo
     * @return self
     */
    public function setTagNo($tagNo)
    {
        $this->tagNo = $tagNo;
        return $this;
    }

    /**
     * Gets as feeLineCode
     *
     * @return \App\Soap\cdk\src\FeeLineCode
     */
    public function getFeeLineCode()
    {
        return $this->feeLineCode;
    }

    /**
     * Sets a new feeLineCode
     *
     * @param \App\Soap\cdk\src\FeeLineCode $feeLineCode
     * @return self
     */
    public function setFeeLineCode(\App\Soap\cdk\src\FeeLineCode $feeLineCode)
    {
        $this->feeLineCode = $feeLineCode;
        return $this;
    }

    /**
     * Gets as linComplaintCode
     *
     * @return \App\Soap\cdk\src\LinComplaintCode
     */
    public function getLinComplaintCode()
    {
        return $this->linComplaintCode;
    }

    /**
     * Sets a new linComplaintCode
     *
     * @param \App\Soap\cdk\src\LinComplaintCode $linComplaintCode
     * @return self
     */
    public function setLinComplaintCode(\App\Soap\cdk\src\LinComplaintCode $linComplaintCode)
    {
        $this->linComplaintCode = $linComplaintCode;
        return $this;
    }

    /**
     * Gets as prtEmployeeNo
     *
     * @return \App\Soap\cdk\src\PrtEmployeeNo
     */
    public function getPrtEmployeeNo()
    {
        return $this->prtEmployeeNo;
    }

    /**
     * Sets a new prtEmployeeNo
     *
     * @param \App\Soap\cdk\src\PrtEmployeeNo $prtEmployeeNo
     * @return self
     */
    public function setPrtEmployeeNo(\App\Soap\cdk\src\PrtEmployeeNo $prtEmployeeNo)
    {
        $this->prtEmployeeNo = $prtEmployeeNo;
        return $this;
    }

    /**
     * Gets as prtLaborType
     *
     * @return \App\Soap\cdk\src\PrtLaborType
     */
    public function getPrtLaborType()
    {
        return $this->prtLaborType;
    }

    /**
     * Sets a new prtLaborType
     *
     * @param \App\Soap\cdk\src\PrtLaborType $prtLaborType
     * @return self
     */
    public function setPrtLaborType(\App\Soap\cdk\src\PrtLaborType $prtLaborType)
    {
        $this->prtLaborType = $prtLaborType;
        return $this;
    }

    /**
     * Gets as prtPartNo
     *
     * @return \App\Soap\cdk\src\PrtPartNo
     */
    public function getPrtPartNo()
    {
        return $this->prtPartNo;
    }

    /**
     * Sets a new prtPartNo
     *
     * @param \App\Soap\cdk\src\PrtPartNo $prtPartNo
     * @return self
     */
    public function setPrtPartNo(\App\Soap\cdk\src\PrtPartNo $prtPartNo)
    {
        $this->prtPartNo = $prtPartNo;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotRoSale(\App\Soap\cdk\src\V $v)
    {
        $this->totRoSale[] = $v;
        return $this;
    }

    /**
     * isset totRoSale
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotRoSale($index)
    {
        return isset($this->totRoSale[$index]);
    }

    /**
     * unset totRoSale
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotRoSale($index)
    {
        unset($this->totRoSale[$index]);
    }

    /**
     * Gets as totRoSale
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotRoSale()
    {
        return $this->totRoSale;
    }

    /**
     * Sets a new totRoSale
     *
     * @param \App\Soap\cdk\src\V[] $totRoSale
     * @return self
     */
    public function setTotRoSale(array $totRoSale)
    {
        $this->totRoSale = $totRoSale;
        return $this;
    }

    /**
     * Gets as linStoryEmployeeNo
     *
     * @return \App\Soap\cdk\src\LinStoryEmployeeNo
     */
    public function getLinStoryEmployeeNo()
    {
        return $this->linStoryEmployeeNo;
    }

    /**
     * Sets a new linStoryEmployeeNo
     *
     * @param \App\Soap\cdk\src\LinStoryEmployeeNo $linStoryEmployeeNo
     * @return self
     */
    public function setLinStoryEmployeeNo(\App\Soap\cdk\src\LinStoryEmployeeNo $linStoryEmployeeNo)
    {
        $this->linStoryEmployeeNo = $linStoryEmployeeNo;
        return $this;
    }

    /**
     * Gets as addOnFlag
     *
     * @return string
     */
    public function getAddOnFlag()
    {
        return $this->addOnFlag;
    }

    /**
     * Sets a new addOnFlag
     *
     * @param string $addOnFlag
     * @return self
     */
    public function setAddOnFlag($addOnFlag)
    {
        $this->addOnFlag = $addOnFlag;
        return $this;
    }

    /**
     * Gets as apptFlag
     *
     * @return string
     */
    public function getApptFlag()
    {
        return $this->apptFlag;
    }

    /**
     * Sets a new apptFlag
     *
     * @param string $apptFlag
     * @return self
     */
    public function setApptFlag($apptFlag)
    {
        $this->apptFlag = $apptFlag;
        return $this;
    }

    /**
     * Gets as lbrMcdPercentage
     *
     * @return \App\Soap\cdk\src\LbrMcdPercentage
     */
    public function getLbrMcdPercentage()
    {
        return $this->lbrMcdPercentage;
    }

    /**
     * Sets a new lbrMcdPercentage
     *
     * @param \App\Soap\cdk\src\LbrMcdPercentage $lbrMcdPercentage
     * @return self
     */
    public function setLbrMcdPercentage(\App\Soap\cdk\src\LbrMcdPercentage $lbrMcdPercentage)
    {
        $this->lbrMcdPercentage = $lbrMcdPercentage;
        return $this;
    }

    /**
     * Gets as lastServiceDate
     *
     * @return string
     */
    public function getLastServiceDate()
    {
        return $this->lastServiceDate;
    }

    /**
     * Sets a new lastServiceDate
     *
     * @param string $lastServiceDate
     * @return self
     */
    public function setLastServiceDate($lastServiceDate)
    {
        $this->lastServiceDate = $lastServiceDate;
        return $this;
    }

    /**
     * Gets as origWaiterFlag
     *
     * @return string
     */
    public function getOrigWaiterFlag()
    {
        return $this->origWaiterFlag;
    }

    /**
     * Sets a new origWaiterFlag
     *
     * @param string $origWaiterFlag
     * @return self
     */
    public function setOrigWaiterFlag($origWaiterFlag)
    {
        $this->origWaiterFlag = $origWaiterFlag;
        return $this;
    }

    /**
     * Gets as priorityValue
     *
     * @return int
     */
    public function getPriorityValue()
    {
        return $this->priorityValue;
    }

    /**
     * Sets a new priorityValue
     *
     * @param int $priorityValue
     * @return self
     */
    public function setPriorityValue($priorityValue)
    {
        $this->priorityValue = $priorityValue;
        return $this;
    }

    /**
     * Gets as rentalFlag
     *
     * @return string
     */
    public function getRentalFlag()
    {
        return $this->rentalFlag;
    }

    /**
     * Sets a new rentalFlag
     *
     * @param string $rentalFlag
     * @return self
     */
    public function setRentalFlag($rentalFlag)
    {
        $this->rentalFlag = $rentalFlag;
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

    /**
     * Gets as disDebitControlNo
     *
     * @return \App\Soap\cdk\src\DisDebitControlNo
     */
    public function getDisDebitControlNo()
    {
        return $this->disDebitControlNo;
    }

    /**
     * Sets a new disDebitControlNo
     *
     * @param \App\Soap\cdk\src\DisDebitControlNo $disDebitControlNo
     * @return self
     */
    public function setDisDebitControlNo(\App\Soap\cdk\src\DisDebitControlNo $disDebitControlNo)
    {
        $this->disDebitControlNo = $disDebitControlNo;
        return $this;
    }

    /**
     * Gets as lbrSale
     *
     * @return \App\Soap\cdk\src\LbrSale
     */
    public function getLbrSale()
    {
        return $this->lbrSale;
    }

    /**
     * Sets a new lbrSale
     *
     * @param \App\Soap\cdk\src\LbrSale $lbrSale
     * @return self
     */
    public function setLbrSale(\App\Soap\cdk\src\LbrSale $lbrSale)
    {
        $this->lbrSale = $lbrSale;
        return $this;
    }

    /**
     * Gets as linComebackFlag
     *
     * @return \App\Soap\cdk\src\LinComebackFlag
     */
    public function getLinComebackFlag()
    {
        return $this->linComebackFlag;
    }

    /**
     * Sets a new linComebackFlag
     *
     * @param \App\Soap\cdk\src\LinComebackFlag $linComebackFlag
     * @return self
     */
    public function setLinComebackFlag(\App\Soap\cdk\src\LinComebackFlag $linComebackFlag)
    {
        $this->linComebackFlag = $linComebackFlag;
        return $this;
    }

    /**
     * Gets as linDispatchCode
     *
     * @return \App\Soap\cdk\src\LinDispatchCode
     */
    public function getLinDispatchCode()
    {
        return $this->linDispatchCode;
    }

    /**
     * Sets a new linDispatchCode
     *
     * @param \App\Soap\cdk\src\LinDispatchCode $linDispatchCode
     * @return self
     */
    public function setLinDispatchCode(\App\Soap\cdk\src\LinDispatchCode $linDispatchCode)
    {
        $this->linDispatchCode = $linDispatchCode;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotLaborSale(\App\Soap\cdk\src\V $v)
    {
        $this->totLaborSale[] = $v;
        return $this;
    }

    /**
     * isset totLaborSale
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotLaborSale($index)
    {
        return isset($this->totLaborSale[$index]);
    }

    /**
     * unset totLaborSale
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotLaborSale($index)
    {
        unset($this->totLaborSale[$index]);
    }

    /**
     * Gets as totLaborSale
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotLaborSale()
    {
        return $this->totLaborSale;
    }

    /**
     * Sets a new totLaborSale
     *
     * @param \App\Soap\cdk\src\V[] $totLaborSale
     * @return self
     */
    public function setTotLaborSale(array $totLaborSale)
    {
        $this->totLaborSale = $totLaborSale;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotMiscSale(\App\Soap\cdk\src\V $v)
    {
        $this->totMiscSale[] = $v;
        return $this;
    }

    /**
     * isset totMiscSale
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotMiscSale($index)
    {
        return isset($this->totMiscSale[$index]);
    }

    /**
     * unset totMiscSale
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotMiscSale($index)
    {
        unset($this->totMiscSale[$index]);
    }

    /**
     * Gets as totMiscSale
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotMiscSale()
    {
        return $this->totMiscSale;
    }

    /**
     * Sets a new totMiscSale
     *
     * @param \App\Soap\cdk\src\V[] $totMiscSale
     * @return self
     */
    public function setTotMiscSale(array $totMiscSale)
    {
        $this->totMiscSale = $totMiscSale;
        return $this;
    }

    /**
     * Gets as apptDate
     *
     * @return \App\Soap\cdk\src\ApptDate
     */
    public function getApptDate()
    {
        return $this->apptDate;
    }

    /**
     * Sets a new apptDate
     *
     * @param \App\Soap\cdk\src\ApptDate $apptDate
     * @return self
     */
    public function setApptDate(\App\Soap\cdk\src\ApptDate $apptDate)
    {
        $this->apptDate = $apptDate;
        return $this;
    }

    /**
     * Gets as deliveryDate
     *
     * @return string
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * Sets a new deliveryDate
     *
     * @param string $deliveryDate
     * @return self
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * Gets as errorMessage
     *
     * @return \App\Soap\cdk\src\ErrorMessage
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Sets a new errorMessage
     *
     * @param \App\Soap\cdk\src\ErrorMessage $errorMessage
     * @return self
     */
    public function setErrorMessage(\App\Soap\cdk\src\ErrorMessage $errorMessage)
    {
        $this->errorMessage = $errorMessage;
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
     * Gets as mileageLastVisit
     *
     * @return int
     */
    public function getMileageLastVisit()
    {
        return $this->mileageLastVisit;
    }

    /**
     * Sets a new mileageLastVisit
     *
     * @param int $mileageLastVisit
     * @return self
     */
    public function setMileageLastVisit($mileageLastVisit)
    {
        $this->mileageLastVisit = $mileageLastVisit;
        return $this;
    }

    /**
     * Gets as promisedTime
     *
     * @return string
     */
    public function getPromisedTime()
    {
        return $this->promisedTime;
    }

    /**
     * Sets a new promisedTime
     *
     * @param string $promisedTime
     * @return self
     */
    public function setPromisedTime($promisedTime)
    {
        $this->promisedTime = $promisedTime;
        return $this;
    }

    /**
     * Gets as voidedDate
     *
     * @return \App\Soap\cdk\src\VoidedDate
     */
    public function getVoidedDate()
    {
        return $this->voidedDate;
    }

    /**
     * Sets a new voidedDate
     *
     * @param \App\Soap\cdk\src\VoidedDate $voidedDate
     * @return self
     */
    public function setVoidedDate(\App\Soap\cdk\src\VoidedDate $voidedDate)
    {
        $this->voidedDate = $voidedDate;
        return $this;
    }

    /**
     * Gets as feeCost
     *
     * @return \App\Soap\cdk\src\FeeCost
     */
    public function getFeeCost()
    {
        return $this->feeCost;
    }

    /**
     * Sets a new feeCost
     *
     * @param \App\Soap\cdk\src\FeeCost $feeCost
     * @return self
     */
    public function setFeeCost(\App\Soap\cdk\src\FeeCost $feeCost)
    {
        $this->feeCost = $feeCost;
        return $this;
    }

    /**
     * Gets as hrsSoldHours
     *
     * @return \App\Soap\cdk\src\HrsSoldHours
     */
    public function getHrsSoldHours()
    {
        return $this->hrsSoldHours;
    }

    /**
     * Sets a new hrsSoldHours
     *
     * @param \App\Soap\cdk\src\HrsSoldHours $hrsSoldHours
     * @return self
     */
    public function setHrsSoldHours(\App\Soap\cdk\src\HrsSoldHours $hrsSoldHours)
    {
        $this->hrsSoldHours = $hrsSoldHours;
        return $this;
    }

    /**
     * Gets as linCampaignCode
     *
     * @return \App\Soap\cdk\src\LinCampaignCode
     */
    public function getLinCampaignCode()
    {
        return $this->linCampaignCode;
    }

    /**
     * Sets a new linCampaignCode
     *
     * @param \App\Soap\cdk\src\LinCampaignCode $linCampaignCode
     * @return self
     */
    public function setLinCampaignCode(\App\Soap\cdk\src\LinCampaignCode $linCampaignCode)
    {
        $this->linCampaignCode = $linCampaignCode;
        return $this;
    }

    /**
     * Gets as linStatusCode
     *
     * @return \App\Soap\cdk\src\LinStatusCode
     */
    public function getLinStatusCode()
    {
        return $this->linStatusCode;
    }

    /**
     * Sets a new linStatusCode
     *
     * @param \App\Soap\cdk\src\LinStatusCode $linStatusCode
     * @return self
     */
    public function setLinStatusCode(\App\Soap\cdk\src\LinStatusCode $linStatusCode)
    {
        $this->linStatusCode = $linStatusCode;
        return $this;
    }

    /**
     * Gets as linStatusDesc
     *
     * @return \App\Soap\cdk\src\LinStatusDesc
     */
    public function getLinStatusDesc()
    {
        return $this->linStatusDesc;
    }

    /**
     * Sets a new linStatusDesc
     *
     * @param \App\Soap\cdk\src\LinStatusDesc $linStatusDesc
     * @return self
     */
    public function setLinStatusDesc(\App\Soap\cdk\src\LinStatusDesc $linStatusDesc)
    {
        $this->linStatusDesc = $linStatusDesc;
        return $this;
    }

    /**
     * Gets as prtQtyOrdered
     *
     * @return \App\Soap\cdk\src\PrtQtyOrdered
     */
    public function getPrtQtyOrdered()
    {
        return $this->prtQtyOrdered;
    }

    /**
     * Sets a new prtQtyOrdered
     *
     * @param \App\Soap\cdk\src\PrtQtyOrdered $prtQtyOrdered
     * @return self
     */
    public function setPrtQtyOrdered(\App\Soap\cdk\src\PrtQtyOrdered $prtQtyOrdered)
    {
        $this->prtQtyOrdered = $prtQtyOrdered;
        return $this;
    }

    /**
     * Gets as prtQtySold
     *
     * @return \App\Soap\cdk\src\PrtQtySold
     */
    public function getPrtQtySold()
    {
        return $this->prtQtySold;
    }

    /**
     * Sets a new prtQtySold
     *
     * @param \App\Soap\cdk\src\PrtQtySold $prtQtySold
     * @return self
     */
    public function setPrtQtySold(\App\Soap\cdk\src\PrtQtySold $prtQtySold)
    {
        $this->prtQtySold = $prtQtySold;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotLaborCost(\App\Soap\cdk\src\V $v)
    {
        $this->totLaborCost[] = $v;
        return $this;
    }

    /**
     * isset totLaborCost
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotLaborCost($index)
    {
        return isset($this->totLaborCost[$index]);
    }

    /**
     * unset totLaborCost
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotLaborCost($index)
    {
        unset($this->totLaborCost[$index]);
    }

    /**
     * Gets as totLaborCost
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotLaborCost()
    {
        return $this->totLaborCost;
    }

    /**
     * Sets a new totLaborCost
     *
     * @param \App\Soap\cdk\src\V[] $totLaborCost
     * @return self
     */
    public function setTotLaborCost(array $totLaborCost)
    {
        $this->totLaborCost = $totLaborCost;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotMiscCost(\App\Soap\cdk\src\V $v)
    {
        $this->totMiscCost[] = $v;
        return $this;
    }

    /**
     * isset totMiscCost
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotMiscCost($index)
    {
        return isset($this->totMiscCost[$index]);
    }

    /**
     * unset totMiscCost
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotMiscCost($index)
    {
        unset($this->totMiscCost[$index]);
    }

    /**
     * Gets as totMiscCost
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotMiscCost()
    {
        return $this->totMiscCost;
    }

    /**
     * Sets a new totMiscCost
     *
     * @param \App\Soap\cdk\src\V[] $totMiscCost
     * @return self
     */
    public function setTotMiscCost(array $totMiscCost)
    {
        $this->totMiscCost = $totMiscCost;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotPartsCost(\App\Soap\cdk\src\V $v)
    {
        $this->totPartsCost[] = $v;
        return $this;
    }

    /**
     * isset totPartsCost
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotPartsCost($index)
    {
        return isset($this->totPartsCost[$index]);
    }

    /**
     * unset totPartsCost
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotPartsCost($index)
    {
        unset($this->totPartsCost[$index]);
    }

    /**
     * Gets as totPartsCost
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotPartsCost()
    {
        return $this->totPartsCost;
    }

    /**
     * Sets a new totPartsCost
     *
     * @param \App\Soap\cdk\src\V[] $totPartsCost
     * @return self
     */
    public function setTotPartsCost(array $totPartsCost)
    {
        $this->totPartsCost = $totPartsCost;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotSubletSale(\App\Soap\cdk\src\V $v)
    {
        $this->totSubletSale[] = $v;
        return $this;
    }

    /**
     * isset totSubletSale
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotSubletSale($index)
    {
        return isset($this->totSubletSale[$index]);
    }

    /**
     * unset totSubletSale
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotSubletSale($index)
    {
        unset($this->totSubletSale[$index]);
    }

    /**
     * Gets as totSubletSale
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotSubletSale()
    {
        return $this->totSubletSale;
    }

    /**
     * Sets a new totSubletSale
     *
     * @param \App\Soap\cdk\src\V[] $totSubletSale
     * @return self
     */
    public function setTotSubletSale(array $totSubletSale)
    {
        $this->totSubletSale = $totSubletSale;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotSupp3Tax(\App\Soap\cdk\src\V $v)
    {
        $this->totSupp3Tax[] = $v;
        return $this;
    }

    /**
     * isset totSupp3Tax
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotSupp3Tax($index)
    {
        return isset($this->totSupp3Tax[$index]);
    }

    /**
     * unset totSupp3Tax
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotSupp3Tax($index)
    {
        unset($this->totSupp3Tax[$index]);
    }

    /**
     * Gets as totSupp3Tax
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotSupp3Tax()
    {
        return $this->totSupp3Tax;
    }

    /**
     * Sets a new totSupp3Tax
     *
     * @param \App\Soap\cdk\src\V[] $totSupp3Tax
     * @return self
     */
    public function setTotSupp3Tax(array $totSupp3Tax)
    {
        $this->totSupp3Tax = $totSupp3Tax;
        return $this;
    }

    /**
     * Gets as bookerNo
     *
     * @return \App\Soap\cdk\src\BookerNo
     */
    public function getBookerNo()
    {
        return $this->bookerNo;
    }

    /**
     * Sets a new bookerNo
     *
     * @param \App\Soap\cdk\src\BookerNo $bookerNo
     * @return self
     */
    public function setBookerNo(\App\Soap\cdk\src\BookerNo $bookerNo)
    {
        $this->bookerNo = $bookerNo;
        return $this;
    }

    /**
     * Gets as cashier
     *
     * @return \App\Soap\cdk\src\Cashier
     */
    public function getCashier()
    {
        return $this->cashier;
    }

    /**
     * Sets a new cashier
     *
     * @param \App\Soap\cdk\src\Cashier $cashier
     * @return self
     */
    public function setCashier(\App\Soap\cdk\src\Cashier $cashier)
    {
        $this->cashier = $cashier;
        return $this;
    }

    /**
     * Gets as custNo
     *
     * @return int
     */
    public function getCustNo()
    {
        return $this->custNo;
    }

    /**
     * Sets a new custNo
     *
     * @param int $custNo
     * @return self
     */
    public function setCustNo($custNo)
    {
        $this->custNo = $custNo;
        return $this;
    }

    /**
     * Gets as hostItemID
     *
     * @return string
     */
    public function getHostItemID()
    {
        return $this->hostItemID;
    }

    /**
     * Sets a new hostItemID
     *
     * @param string $hostItemID
     * @return self
     */
    public function setHostItemID($hostItemID)
    {
        $this->hostItemID = $hostItemID;
        return $this;
    }

    /**
     * Gets as name1
     *
     * @return string
     */
    public function getName1()
    {
        return $this->name1;
    }

    /**
     * Sets a new name1
     *
     * @param string $name1
     * @return self
     */
    public function setName1($name1)
    {
        $this->name1 = $name1;
        return $this;
    }

    /**
     * Gets as promisedDate
     *
     * @return string
     */
    public function getPromisedDate()
    {
        return $this->promisedDate;
    }

    /**
     * Sets a new promisedDate
     *
     * @param string $promisedDate
     * @return self
     */
    public function setPromisedDate($promisedDate)
    {
        $this->promisedDate = $promisedDate;
        return $this;
    }

    /**
     * Gets as feeLaborType
     *
     * @return \App\Soap\cdk\src\FeeLaborType
     */
    public function getFeeLaborType()
    {
        return $this->feeLaborType;
    }

    /**
     * Sets a new feeLaborType
     *
     * @param \App\Soap\cdk\src\FeeLaborType $feeLaborType
     * @return self
     */
    public function setFeeLaborType(\App\Soap\cdk\src\FeeLaborType $feeLaborType)
    {
        $this->feeLaborType = $feeLaborType;
        return $this;
    }

    /**
     * Gets as hrsSale
     *
     * @return \App\Soap\cdk\src\HrsSale
     */
    public function getHrsSale()
    {
        return $this->hrsSale;
    }

    /**
     * Sets a new hrsSale
     *
     * @param \App\Soap\cdk\src\HrsSale $hrsSale
     * @return self
     */
    public function setHrsSale(\App\Soap\cdk\src\HrsSale $hrsSale)
    {
        $this->hrsSale = $hrsSale;
        return $this;
    }

    /**
     * Gets as linLineCode
     *
     * @return \App\Soap\cdk\src\LinLineCode
     */
    public function getLinLineCode()
    {
        return $this->linLineCode;
    }

    /**
     * Sets a new linLineCode
     *
     * @param \App\Soap\cdk\src\LinLineCode $linLineCode
     * @return self
     */
    public function setLinLineCode(\App\Soap\cdk\src\LinLineCode $linLineCode)
    {
        $this->linLineCode = $linLineCode;
        return $this;
    }

    /**
     * Gets as prtCost
     *
     * @return \App\Soap\cdk\src\PrtCost
     */
    public function getPrtCost()
    {
        return $this->prtCost;
    }

    /**
     * Sets a new prtCost
     *
     * @param \App\Soap\cdk\src\PrtCost $prtCost
     * @return self
     */
    public function setPrtCost(\App\Soap\cdk\src\PrtCost $prtCost)
    {
        $this->prtCost = $prtCost;
        return $this;
    }

    /**
     * Gets as prtList
     *
     * @return \App\Soap\cdk\src\PrtList
     */
    public function getPrtList()
    {
        return $this->prtList;
    }

    /**
     * Sets a new prtList
     *
     * @param \App\Soap\cdk\src\PrtList $prtList
     * @return self
     */
    public function setPrtList(\App\Soap\cdk\src\PrtList $prtList)
    {
        $this->prtList = $prtList;
        return $this;
    }

    /**
     * Gets as prtMcdPercentage
     *
     * @return \App\Soap\cdk\src\PrtMcdPercentage
     */
    public function getPrtMcdPercentage()
    {
        return $this->prtMcdPercentage;
    }

    /**
     * Sets a new prtMcdPercentage
     *
     * @param \App\Soap\cdk\src\PrtMcdPercentage $prtMcdPercentage
     * @return self
     */
    public function setPrtMcdPercentage(\App\Soap\cdk\src\PrtMcdPercentage $prtMcdPercentage)
    {
        $this->prtMcdPercentage = $prtMcdPercentage;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotStateTax(\App\Soap\cdk\src\V $v)
    {
        $this->totStateTax[] = $v;
        return $this;
    }

    /**
     * isset totStateTax
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotStateTax($index)
    {
        return isset($this->totStateTax[$index]);
    }

    /**
     * unset totStateTax
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotStateTax($index)
    {
        unset($this->totStateTax[$index]);
    }

    /**
     * Gets as totStateTax
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotStateTax()
    {
        return $this->totStateTax;
    }

    /**
     * Sets a new totStateTax
     *
     * @param \App\Soap\cdk\src\V[] $totStateTax
     * @return self
     */
    public function setTotStateTax(array $totStateTax)
    {
        $this->totStateTax = $totStateTax;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotSupp2Tax(\App\Soap\cdk\src\V $v)
    {
        $this->totSupp2Tax[] = $v;
        return $this;
    }

    /**
     * isset totSupp2Tax
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotSupp2Tax($index)
    {
        return isset($this->totSupp2Tax[$index]);
    }

    /**
     * unset totSupp2Tax
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotSupp2Tax($index)
    {
        unset($this->totSupp2Tax[$index]);
    }

    /**
     * Gets as totSupp2Tax
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotSupp2Tax()
    {
        return $this->totSupp2Tax;
    }

    /**
     * Sets a new totSupp2Tax
     *
     * @param \App\Soap\cdk\src\V[] $totSupp2Tax
     * @return self
     */
    public function setTotSupp2Tax(array $totSupp2Tax)
    {
        $this->totSupp2Tax = $totSupp2Tax;
        return $this;
    }

    /**
     * Gets as mlsType
     *
     * @return \App\Soap\cdk\src\MlsType
     */
    public function getMlsType()
    {
        return $this->mlsType;
    }

    /**
     * Sets a new mlsType
     *
     * @param \App\Soap\cdk\src\MlsType $mlsType
     * @return self
     */
    public function setMlsType(\App\Soap\cdk\src\MlsType $mlsType)
    {
        $this->mlsType = $mlsType;
        return $this;
    }

    /**
     * Gets as punWorkType
     *
     * @return \App\Soap\cdk\src\PunWorkType
     */
    public function getPunWorkType()
    {
        return $this->punWorkType;
    }

    /**
     * Sets a new punWorkType
     *
     * @param \App\Soap\cdk\src\PunWorkType $punWorkType
     * @return self
     */
    public function setPunWorkType(\App\Soap\cdk\src\PunWorkType $punWorkType)
    {
        $this->punWorkType = $punWorkType;
        return $this;
    }

    /**
     * Gets as punMultivalueCount
     *
     * @return int
     */
    public function getPunMultivalueCount()
    {
        return $this->punMultivalueCount;
    }

    /**
     * Sets a new punMultivalueCount
     *
     * @param int $punMultivalueCount
     * @return self
     */
    public function setPunMultivalueCount($punMultivalueCount)
    {
        $this->punMultivalueCount = $punMultivalueCount;
        return $this;
    }

    /**
     * Gets as punTechNo
     *
     * @return \App\Soap\cdk\src\PunTechNo
     */
    public function getPunTechNo()
    {
        return $this->punTechNo;
    }

    /**
     * Sets a new punTechNo
     *
     * @param \App\Soap\cdk\src\PunTechNo $punTechNo
     * @return self
     */
    public function setPunTechNo(\App\Soap\cdk\src\PunTechNo $punTechNo)
    {
        $this->punTechNo = $punTechNo;
        return $this;
    }

    /**
     * Gets as punTimeOn
     *
     * @return \App\Soap\cdk\src\PunTimeOn
     */
    public function getPunTimeOn()
    {
        return $this->punTimeOn;
    }

    /**
     * Sets a new punTimeOn
     *
     * @param \App\Soap\cdk\src\PunTimeOn $punTimeOn
     * @return self
     */
    public function setPunTimeOn(\App\Soap\cdk\src\PunTimeOn $punTimeOn)
    {
        $this->punTimeOn = $punTimeOn;
        return $this;
    }

    /**
     * Gets as punWorkDate
     *
     * @return \App\Soap\cdk\src\PunWorkDate
     */
    public function getPunWorkDate()
    {
        return $this->punWorkDate;
    }

    /**
     * Sets a new punWorkDate
     *
     * @param \App\Soap\cdk\src\PunWorkDate $punWorkDate
     * @return self
     */
    public function setPunWorkDate(\App\Soap\cdk\src\PunWorkDate $punWorkDate)
    {
        $this->punWorkDate = $punWorkDate;
        return $this;
    }

    /**
     * Gets as punTimeOff
     *
     * @return \App\Soap\cdk\src\PunTimeOff
     */
    public function getPunTimeOff()
    {
        return $this->punTimeOff;
    }

    /**
     * Sets a new punTimeOff
     *
     * @param \App\Soap\cdk\src\PunTimeOff $punTimeOff
     * @return self
     */
    public function setPunTimeOff(\App\Soap\cdk\src\PunTimeOff $punTimeOff)
    {
        $this->punTimeOff = $punTimeOff;
        return $this;
    }

    /**
     * Gets as punDuration
     *
     * @return \App\Soap\cdk\src\PunDuration
     */
    public function getPunDuration()
    {
        return $this->punDuration;
    }

    /**
     * Sets a new punDuration
     *
     * @param \App\Soap\cdk\src\PunDuration $punDuration
     * @return self
     */
    public function setPunDuration(\App\Soap\cdk\src\PunDuration $punDuration)
    {
        $this->punDuration = $punDuration;
        return $this;
    }

    /**
     * Gets as punLineCode
     *
     * @return \App\Soap\cdk\src\PunLineCode
     */
    public function getPunLineCode()
    {
        return $this->punLineCode;
    }

    /**
     * Sets a new punLineCode
     *
     * @param \App\Soap\cdk\src\PunLineCode $punLineCode
     * @return self
     */
    public function setPunLineCode(\App\Soap\cdk\src\PunLineCode $punLineCode)
    {
        $this->punLineCode = $punLineCode;
        return $this;
    }

    /**
     * Gets as bookedTime
     *
     * @return \App\Soap\cdk\src\BookedTime
     */
    public function getBookedTime()
    {
        return $this->bookedTime;
    }

    /**
     * Sets a new bookedTime
     *
     * @param \App\Soap\cdk\src\BookedTime $bookedTime
     * @return self
     */
    public function setBookedTime(\App\Soap\cdk\src\BookedTime $bookedTime)
    {
        $this->bookedTime = $bookedTime;
        return $this;
    }

    /**
     * Gets as disLevel
     *
     * @return \App\Soap\cdk\src\DisLevel
     */
    public function getDisLevel()
    {
        return $this->disLevel;
    }

    /**
     * Sets a new disLevel
     *
     * @param \App\Soap\cdk\src\DisLevel $disLevel
     * @return self
     */
    public function setDisLevel(\App\Soap\cdk\src\DisLevel $disLevel)
    {
        $this->disLevel = $disLevel;
        return $this;
    }

    /**
     * Gets as disMultivalueCount
     *
     * @return int
     */
    public function getDisMultivalueCount()
    {
        return $this->disMultivalueCount;
    }

    /**
     * Sets a new disMultivalueCount
     *
     * @param int $disMultivalueCount
     * @return self
     */
    public function setDisMultivalueCount($disMultivalueCount)
    {
        $this->disMultivalueCount = $disMultivalueCount;
        return $this;
    }

    /**
     * Gets as feeType
     *
     * @return \App\Soap\cdk\src\FeeType
     */
    public function getFeeType()
    {
        return $this->feeType;
    }

    /**
     * Sets a new feeType
     *
     * @param \App\Soap\cdk\src\FeeType $feeType
     * @return self
     */
    public function setFeeType(\App\Soap\cdk\src\FeeType $feeType)
    {
        $this->feeType = $feeType;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotLaborCount(\App\Soap\cdk\src\V $v)
    {
        $this->totLaborCount[] = $v;
        return $this;
    }

    /**
     * isset totLaborCount
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotLaborCount($index)
    {
        return isset($this->totLaborCount[$index]);
    }

    /**
     * unset totLaborCount
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotLaborCount($index)
    {
        unset($this->totLaborCount[$index]);
    }

    /**
     * Gets as totLaborCount
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotLaborCount()
    {
        return $this->totLaborCount;
    }

    /**
     * Sets a new totLaborCount
     *
     * @param \App\Soap\cdk\src\V[] $totLaborCount
     * @return self
     */
    public function setTotLaborCount(array $totLaborCount)
    {
        $this->totLaborCount = $totLaborCount;
        return $this;
    }

    /**
     * Gets as dedMaximumAmount
     *
     * @return \App\Soap\cdk\src\DedMaximumAmount
     */
    public function getDedMaximumAmount()
    {
        return $this->dedMaximumAmount;
    }

    /**
     * Sets a new dedMaximumAmount
     *
     * @param \App\Soap\cdk\src\DedMaximumAmount $dedMaximumAmount
     * @return self
     */
    public function setDedMaximumAmount(\App\Soap\cdk\src\DedMaximumAmount $dedMaximumAmount)
    {
        $this->dedMaximumAmount = $dedMaximumAmount;
        return $this;
    }

    /**
     * Gets as disLaborDiscount
     *
     * @return \App\Soap\cdk\src\DisLaborDiscount
     */
    public function getDisLaborDiscount()
    {
        return $this->disLaborDiscount;
    }

    /**
     * Sets a new disLaborDiscount
     *
     * @param \App\Soap\cdk\src\DisLaborDiscount $disLaborDiscount
     * @return self
     */
    public function setDisLaborDiscount(\App\Soap\cdk\src\DisLaborDiscount $disLaborDiscount)
    {
        $this->disLaborDiscount = $disLaborDiscount;
        return $this;
    }

    /**
     * Gets as feeSale
     *
     * @return \App\Soap\cdk\src\FeeSale
     */
    public function getFeeSale()
    {
        return $this->feeSale;
    }

    /**
     * Sets a new feeSale
     *
     * @param \App\Soap\cdk\src\FeeSale $feeSale
     * @return self
     */
    public function setFeeSale(\App\Soap\cdk\src\FeeSale $feeSale)
    {
        $this->feeSale = $feeSale;
        return $this;
    }

    /**
     * Gets as linStoryText
     *
     * @return \App\Soap\cdk\src\LinStoryText
     */
    public function getLinStoryText()
    {
        return $this->linStoryText;
    }

    /**
     * Sets a new linStoryText
     *
     * @param \App\Soap\cdk\src\LinStoryText $linStoryText
     * @return self
     */
    public function setLinStoryText(\App\Soap\cdk\src\LinStoryText $linStoryText)
    {
        $this->linStoryText = $linStoryText;
        return $this;
    }

    /**
     * Gets as mlsMultivalueCount
     *
     * @return int
     */
    public function getMlsMultivalueCount()
    {
        return $this->mlsMultivalueCount;
    }

    /**
     * Sets a new mlsMultivalueCount
     *
     * @param int $mlsMultivalueCount
     * @return self
     */
    public function setMlsMultivalueCount($mlsMultivalueCount)
    {
        $this->mlsMultivalueCount = $mlsMultivalueCount;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToPhoneDesc(\App\Soap\cdk\src\V $v)
    {
        $this->phoneDesc[] = $v;
        return $this;
    }

    /**
     * isset phoneDesc
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPhoneDesc($index)
    {
        return isset($this->phoneDesc[$index]);
    }

    /**
     * unset phoneDesc
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPhoneDesc($index)
    {
        unset($this->phoneDesc[$index]);
    }

    /**
     * Gets as phoneDesc
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getPhoneDesc()
    {
        return $this->phoneDesc;
    }

    /**
     * Sets a new phoneDesc
     *
     * @param \App\Soap\cdk\src\V[] $phoneDesc
     * @return self
     */
    public function setPhoneDesc(array $phoneDesc)
    {
        $this->phoneDesc = $phoneDesc;
        return $this;
    }

    /**
     * Gets as phoneExt
     *
     * @return \App\Soap\cdk\src\PhoneExt
     */
    public function getPhoneExt()
    {
        return $this->phoneExt;
    }

    /**
     * Sets a new phoneExt
     *
     * @param \App\Soap\cdk\src\PhoneExt $phoneExt
     * @return self
     */
    public function setPhoneExt(\App\Soap\cdk\src\PhoneExt $phoneExt)
    {
        $this->phoneExt = $phoneExt;
        return $this;
    }

    /**
     * Gets as punAlteredFlag
     *
     * @return \App\Soap\cdk\src\PunAlteredFlag
     */
    public function getPunAlteredFlag()
    {
        return $this->punAlteredFlag;
    }

    /**
     * Sets a new punAlteredFlag
     *
     * @param \App\Soap\cdk\src\PunAlteredFlag $punAlteredFlag
     * @return self
     */
    public function setPunAlteredFlag(\App\Soap\cdk\src\PunAlteredFlag $punAlteredFlag)
    {
        $this->punAlteredFlag = $punAlteredFlag;
        return $this;
    }

    /**
     * Gets as statusDesc
     *
     * @return string
     */
    public function getStatusDesc()
    {
        return $this->statusDesc;
    }

    /**
     * Sets a new statusDesc
     *
     * @param string $statusDesc
     * @return self
     */
    public function setStatusDesc($statusDesc)
    {
        $this->statusDesc = $statusDesc;
        return $this;
    }

    /**
     * Gets as blockAutoMsg
     *
     * @return \App\Soap\cdk\src\BlockAutoMsg
     */
    public function getBlockAutoMsg()
    {
        return $this->blockAutoMsg;
    }

    /**
     * Sets a new blockAutoMsg
     *
     * @param \App\Soap\cdk\src\BlockAutoMsg $blockAutoMsg
     * @return self
     */
    public function setBlockAutoMsg(\App\Soap\cdk\src\BlockAutoMsg $blockAutoMsg)
    {
        $this->blockAutoMsg = $blockAutoMsg;
        return $this;
    }

    /**
     * Gets as disClassOrType
     *
     * @return \App\Soap\cdk\src\DisClassOrType
     */
    public function getDisClassOrType()
    {
        return $this->disClassOrType;
    }

    /**
     * Sets a new disClassOrType
     *
     * @param \App\Soap\cdk\src\DisClassOrType $disClassOrType
     * @return self
     */
    public function setDisClassOrType(\App\Soap\cdk\src\DisClassOrType $disClassOrType)
    {
        $this->disClassOrType = $disClassOrType;
        return $this;
    }

    /**
     * Gets as lbrFlagHours
     *
     * @return \App\Soap\cdk\src\LbrFlagHours
     */
    public function getLbrFlagHours()
    {
        return $this->lbrFlagHours;
    }

    /**
     * Sets a new lbrFlagHours
     *
     * @param \App\Soap\cdk\src\LbrFlagHours $lbrFlagHours
     * @return self
     */
    public function setLbrFlagHours(\App\Soap\cdk\src\LbrFlagHours $lbrFlagHours)
    {
        $this->lbrFlagHours = $lbrFlagHours;
        return $this;
    }

    /**
     * Gets as lbrComebackTech
     *
     * @return \App\Soap\cdk\src\LbrComebackTech
     */
    public function getLbrComebackTech()
    {
        return $this->lbrComebackTech;
    }

    /**
     * Sets a new lbrComebackTech
     *
     * @param \App\Soap\cdk\src\LbrComebackTech $lbrComebackTech
     * @return self
     */
    public function setLbrComebackTech(\App\Soap\cdk\src\LbrComebackTech $lbrComebackTech)
    {
        $this->lbrComebackTech = $lbrComebackTech;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotCoreCost(\App\Soap\cdk\src\V $v)
    {
        $this->totCoreCost[] = $v;
        return $this;
    }

    /**
     * isset totCoreCost
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotCoreCost($index)
    {
        return isset($this->totCoreCost[$index]);
    }

    /**
     * unset totCoreCost
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotCoreCost($index)
    {
        unset($this->totCoreCost[$index]);
    }

    /**
     * Gets as totCoreCost
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotCoreCost()
    {
        return $this->totCoreCost;
    }

    /**
     * Sets a new totCoreCost
     *
     * @param \App\Soap\cdk\src\V[] $totCoreCost
     * @return self
     */
    public function setTotCoreCost(array $totCoreCost)
    {
        $this->totCoreCost = $totCoreCost;
        return $this;
    }

    /**
     * Gets as feeLOPorPartSeqNo
     *
     * @return \App\Soap\cdk\src\FeeLOPorPartSeqNo
     */
    public function getFeeLOPorPartSeqNo()
    {
        return $this->feeLOPorPartSeqNo;
    }

    /**
     * Sets a new feeLOPorPartSeqNo
     *
     * @param \App\Soap\cdk\src\FeeLOPorPartSeqNo $feeLOPorPartSeqNo
     * @return self
     */
    public function setFeeLOPorPartSeqNo(\App\Soap\cdk\src\FeeLOPorPartSeqNo $feeLOPorPartSeqNo)
    {
        $this->feeLOPorPartSeqNo = $feeLOPorPartSeqNo;
        return $this;
    }

    /**
     * Gets as payPaymentsMade
     *
     * @return float
     */
    public function getPayPaymentsMade()
    {
        return $this->payPaymentsMade;
    }

    /**
     * Sets a new payPaymentsMade
     *
     * @param float $payPaymentsMade
     * @return self
     */
    public function setPayPaymentsMade($payPaymentsMade)
    {
        $this->payPaymentsMade = $payPaymentsMade;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotPayType(\App\Soap\cdk\src\V $v)
    {
        $this->totPayType[] = $v;
        return $this;
    }

    /**
     * isset totPayType
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotPayType($index)
    {
        return isset($this->totPayType[$index]);
    }

    /**
     * unset totPayType
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotPayType($index)
    {
        unset($this->totPayType[$index]);
    }

    /**
     * Gets as totPayType
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotPayType()
    {
        return $this->totPayType;
    }

    /**
     * Sets a new totPayType
     *
     * @param \App\Soap\cdk\src\V[] $totPayType
     * @return self
     */
    public function setTotPayType(array $totPayType)
    {
        $this->totPayType = $totPayType;
        return $this;
    }

    /**
     * Gets as mlsOpCode
     *
     * @return \App\Soap\cdk\src\MlsOpCode
     */
    public function getMlsOpCode()
    {
        return $this->mlsOpCode;
    }

    /**
     * Sets a new mlsOpCode
     *
     * @param \App\Soap\cdk\src\MlsOpCode $mlsOpCode
     * @return self
     */
    public function setMlsOpCode(\App\Soap\cdk\src\MlsOpCode $mlsOpCode)
    {
        $this->mlsOpCode = $mlsOpCode;
        return $this;
    }

    /**
     * Gets as warLaborSequenceNo
     *
     * @return \App\Soap\cdk\src\WarLaborSequenceNo
     */
    public function getWarLaborSequenceNo()
    {
        return $this->warLaborSequenceNo;
    }

    /**
     * Sets a new warLaborSequenceNo
     *
     * @param \App\Soap\cdk\src\WarLaborSequenceNo $warLaborSequenceNo
     * @return self
     */
    public function setWarLaborSequenceNo(\App\Soap\cdk\src\WarLaborSequenceNo $warLaborSequenceNo)
    {
        $this->warLaborSequenceNo = $warLaborSequenceNo;
        return $this;
    }

    /**
     * Gets as dedMultivalueCount
     *
     * @return int
     */
    public function getDedMultivalueCount()
    {
        return $this->dedMultivalueCount;
    }

    /**
     * Sets a new dedMultivalueCount
     *
     * @param int $dedMultivalueCount
     * @return self
     */
    public function setDedMultivalueCount($dedMultivalueCount)
    {
        $this->dedMultivalueCount = $dedMultivalueCount;
        return $this;
    }

    /**
     * Gets as hrsMultivalueCount
     *
     * @return int
     */
    public function getHrsMultivalueCount()
    {
        return $this->hrsMultivalueCount;
    }

    /**
     * Sets a new hrsMultivalueCount
     *
     * @param int $hrsMultivalueCount
     * @return self
     */
    public function setHrsMultivalueCount($hrsMultivalueCount)
    {
        $this->hrsMultivalueCount = $hrsMultivalueCount;
        return $this;
    }

    /**
     * Gets as lbrOperationType
     *
     * @return \App\Soap\cdk\src\LbrOperationType
     */
    public function getLbrOperationType()
    {
        return $this->lbrOperationType;
    }

    /**
     * Sets a new lbrOperationType
     *
     * @param \App\Soap\cdk\src\LbrOperationType $lbrOperationType
     * @return self
     */
    public function setLbrOperationType(\App\Soap\cdk\src\LbrOperationType $lbrOperationType)
    {
        $this->lbrOperationType = $lbrOperationType;
        return $this;
    }

    /**
     * Gets as disTotalDiscount
     *
     * @return \App\Soap\cdk\src\DisTotalDiscount
     */
    public function getDisTotalDiscount()
    {
        return $this->disTotalDiscount;
    }

    /**
     * Sets a new disTotalDiscount
     *
     * @param \App\Soap\cdk\src\DisTotalDiscount $disTotalDiscount
     * @return self
     */
    public function setDisTotalDiscount(\App\Soap\cdk\src\DisTotalDiscount $disTotalDiscount)
    {
        $this->disTotalDiscount = $disTotalDiscount;
        return $this;
    }

    /**
     * Gets as modelDesc
     *
     * @return string
     */
    public function getModelDesc()
    {
        return $this->modelDesc;
    }

    /**
     * Sets a new modelDesc
     *
     * @param string $modelDesc
     * @return self
     */
    public function setModelDesc($modelDesc)
    {
        $this->modelDesc = $modelDesc;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotLubeCost(\App\Soap\cdk\src\V $v)
    {
        $this->totLubeCost[] = $v;
        return $this;
    }

    /**
     * isset totLubeCost
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotLubeCost($index)
    {
        return isset($this->totLubeCost[$index]);
    }

    /**
     * unset totLubeCost
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotLubeCost($index)
    {
        unset($this->totLubeCost[$index]);
    }

    /**
     * Gets as totLubeCost
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotLubeCost()
    {
        return $this->totLubeCost;
    }

    /**
     * Sets a new totLubeCost
     *
     * @param \App\Soap\cdk\src\V[] $totLubeCost
     * @return self
     */
    public function setTotLubeCost(array $totLubeCost)
    {
        $this->totLubeCost = $totLubeCost;
        return $this;
    }

    /**
     * Gets as payPaymentAmount
     *
     * @return \App\Soap\cdk\src\PayPaymentAmount
     */
    public function getPayPaymentAmount()
    {
        return $this->payPaymentAmount;
    }

    /**
     * Sets a new payPaymentAmount
     *
     * @param \App\Soap\cdk\src\PayPaymentAmount $payPaymentAmount
     * @return self
     */
    public function setPayPaymentAmount(\App\Soap\cdk\src\PayPaymentAmount $payPaymentAmount)
    {
        $this->payPaymentAmount = $payPaymentAmount;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotActualHours(\App\Soap\cdk\src\V $v)
    {
        $this->totActualHours[] = $v;
        return $this;
    }

    /**
     * isset totActualHours
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotActualHours($index)
    {
        return isset($this->totActualHours[$index]);
    }

    /**
     * unset totActualHours
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotActualHours($index)
    {
        unset($this->totActualHours[$index]);
    }

    /**
     * Gets as totActualHours
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotActualHours()
    {
        return $this->totActualHours;
    }

    /**
     * Sets a new totActualHours
     *
     * @param \App\Soap\cdk\src\V[] $totActualHours
     * @return self
     */
    public function setTotActualHours(array $totActualHours)
    {
        $this->totActualHours = $totActualHours;
        return $this;
    }

    /**
     * Gets as hasIntPayFlag
     *
     * @return string
     */
    public function getHasIntPayFlag()
    {
        return $this->hasIntPayFlag;
    }

    /**
     * Sets a new hasIntPayFlag
     *
     * @param string $hasIntPayFlag
     * @return self
     */
    public function setHasIntPayFlag($hasIntPayFlag)
    {
        $this->hasIntPayFlag = $hasIntPayFlag;
        return $this;
    }

    /**
     * Gets as licenseNumber
     *
     * @return \App\Soap\cdk\src\LicenseNumber
     */
    public function getLicenseNumber()
    {
        return $this->licenseNumber;
    }

    /**
     * Sets a new licenseNumber
     *
     * @param \App\Soap\cdk\src\LicenseNumber $licenseNumber
     * @return self
     */
    public function setLicenseNumber(\App\Soap\cdk\src\LicenseNumber $licenseNumber)
    {
        $this->licenseNumber = $licenseNumber;
        return $this;
    }

    /**
     * Gets as mlsLaborType
     *
     * @return \App\Soap\cdk\src\MlsLaborType
     */
    public function getMlsLaborType()
    {
        return $this->mlsLaborType;
    }

    /**
     * Sets a new mlsLaborType
     *
     * @param \App\Soap\cdk\src\MlsLaborType $mlsLaborType
     * @return self
     */
    public function setMlsLaborType(\App\Soap\cdk\src\MlsLaborType $mlsLaborType)
    {
        $this->mlsLaborType = $mlsLaborType;
        return $this;
    }

    /**
     * Gets as mlsSequenceNo
     *
     * @return \App\Soap\cdk\src\MlsSequenceNo
     */
    public function getMlsSequenceNo()
    {
        return $this->mlsSequenceNo;
    }

    /**
     * Sets a new mlsSequenceNo
     *
     * @param \App\Soap\cdk\src\MlsSequenceNo $mlsSequenceNo
     * @return self
     */
    public function setMlsSequenceNo(\App\Soap\cdk\src\MlsSequenceNo $mlsSequenceNo)
    {
        $this->mlsSequenceNo = $mlsSequenceNo;
        return $this;
    }

    /**
     * Gets as payMultivalueCount
     *
     * @return int
     */
    public function getPayMultivalueCount()
    {
        return $this->payMultivalueCount;
    }

    /**
     * Sets a new payMultivalueCount
     *
     * @param int $payMultivalueCount
     * @return self
     */
    public function setPayMultivalueCount($payMultivalueCount)
    {
        $this->payMultivalueCount = $payMultivalueCount;
        return $this;
    }

    /**
     * Gets as prtExtendedSale
     *
     * @return \App\Soap\cdk\src\PrtExtendedSale
     */
    public function getPrtExtendedSale()
    {
        return $this->prtExtendedSale;
    }

    /**
     * Sets a new prtExtendedSale
     *
     * @param \App\Soap\cdk\src\PrtExtendedSale $prtExtendedSale
     * @return self
     */
    public function setPrtExtendedSale(\App\Soap\cdk\src\PrtExtendedSale $prtExtendedSale)
    {
        $this->prtExtendedSale = $prtExtendedSale;
        return $this;
    }

    /**
     * Gets as prtLaborSequenceNo
     *
     * @return \App\Soap\cdk\src\PrtLaborSequenceNo
     */
    public function getPrtLaborSequenceNo()
    {
        return $this->prtLaborSequenceNo;
    }

    /**
     * Sets a new prtLaborSequenceNo
     *
     * @param \App\Soap\cdk\src\PrtLaborSequenceNo $prtLaborSequenceNo
     * @return self
     */
    public function setPrtLaborSequenceNo(\App\Soap\cdk\src\PrtLaborSequenceNo $prtLaborSequenceNo)
    {
        $this->prtLaborSequenceNo = $prtLaborSequenceNo;
        return $this;
    }

    /**
     * Gets as statusCode
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets a new statusCode
     *
     * @param string $statusCode
     * @return self
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotLaborDiscount(\App\Soap\cdk\src\V $v)
    {
        $this->totLaborDiscount[] = $v;
        return $this;
    }

    /**
     * isset totLaborDiscount
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotLaborDiscount($index)
    {
        return isset($this->totLaborDiscount[$index]);
    }

    /**
     * unset totLaborDiscount
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotLaborDiscount($index)
    {
        unset($this->totLaborDiscount[$index]);
    }

    /**
     * Gets as totLaborDiscount
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotLaborDiscount()
    {
        return $this->totLaborDiscount;
    }

    /**
     * Sets a new totLaborDiscount
     *
     * @param \App\Soap\cdk\src\V[] $totLaborDiscount
     * @return self
     */
    public function setTotLaborDiscount(array $totLaborDiscount)
    {
        $this->totLaborDiscount = $totLaborDiscount;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotOtherHours(\App\Soap\cdk\src\V $v)
    {
        $this->totOtherHours[] = $v;
        return $this;
    }

    /**
     * isset totOtherHours
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotOtherHours($index)
    {
        return isset($this->totOtherHours[$index]);
    }

    /**
     * unset totOtherHours
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotOtherHours($index)
    {
        unset($this->totOtherHours[$index]);
    }

    /**
     * Gets as totOtherHours
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotOtherHours()
    {
        return $this->totOtherHours;
    }

    /**
     * Sets a new totOtherHours
     *
     * @param \App\Soap\cdk\src\V[] $totOtherHours
     * @return self
     */
    public function setTotOtherHours(array $totOtherHours)
    {
        $this->totOtherHours = $totOtherHours;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotTimeCardHours(\App\Soap\cdk\src\V $v)
    {
        $this->totTimeCardHours[] = $v;
        return $this;
    }

    /**
     * isset totTimeCardHours
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotTimeCardHours($index)
    {
        return isset($this->totTimeCardHours[$index]);
    }

    /**
     * unset totTimeCardHours
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotTimeCardHours($index)
    {
        unset($this->totTimeCardHours[$index]);
    }

    /**
     * Gets as totTimeCardHours
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotTimeCardHours()
    {
        return $this->totTimeCardHours;
    }

    /**
     * Sets a new totTimeCardHours
     *
     * @param \App\Soap\cdk\src\V[] $totTimeCardHours
     * @return self
     */
    public function setTotTimeCardHours(array $totTimeCardHours)
    {
        $this->totTimeCardHours = $totTimeCardHours;
        return $this;
    }

    /**
     * Gets as dedLineCodes
     *
     * @return \App\Soap\cdk\src\DedLineCodes
     */
    public function getDedLineCodes()
    {
        return $this->dedLineCodes;
    }

    /**
     * Sets a new dedLineCodes
     *
     * @param \App\Soap\cdk\src\DedLineCodes $dedLineCodes
     * @return self
     */
    public function setDedLineCodes(\App\Soap\cdk\src\DedLineCodes $dedLineCodes)
    {
        $this->dedLineCodes = $dedLineCodes;
        return $this;
    }

    /**
     * Gets as disDiscountID
     *
     * @return \App\Soap\cdk\src\DisDiscountID
     */
    public function getDisDiscountID()
    {
        return $this->disDiscountID;
    }

    /**
     * Sets a new disDiscountID
     *
     * @param \App\Soap\cdk\src\DisDiscountID $disDiscountID
     * @return self
     */
    public function setDisDiscountID(\App\Soap\cdk\src\DisDiscountID $disDiscountID)
    {
        $this->disDiscountID = $disDiscountID;
        return $this;
    }

    /**
     * Gets as disOverridePercent
     *
     * @return \App\Soap\cdk\src\DisOverridePercent
     */
    public function getDisOverridePercent()
    {
        return $this->disOverridePercent;
    }

    /**
     * Sets a new disOverridePercent
     *
     * @param \App\Soap\cdk\src\DisOverridePercent $disOverridePercent
     * @return self
     */
    public function setDisOverridePercent(\App\Soap\cdk\src\DisOverridePercent $disOverridePercent)
    {
        $this->disOverridePercent = $disOverridePercent;
        return $this;
    }

    /**
     * Gets as emailAddress
     *
     * @return \App\Soap\cdk\src\EmailAddress
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Sets a new emailAddress
     *
     * @param \App\Soap\cdk\src\EmailAddress $emailAddress
     * @return self
     */
    public function setEmailAddress(\App\Soap\cdk\src\EmailAddress $emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * Gets as hrsFlagHours
     *
     * @return \App\Soap\cdk\src\HrsFlagHours
     */
    public function getHrsFlagHours()
    {
        return $this->hrsFlagHours;
    }

    /**
     * Sets a new hrsFlagHours
     *
     * @param \App\Soap\cdk\src\HrsFlagHours $hrsFlagHours
     * @return self
     */
    public function setHrsFlagHours(\App\Soap\cdk\src\HrsFlagHours $hrsFlagHours)
    {
        $this->hrsFlagHours = $hrsFlagHours;
        return $this;
    }

    /**
     * Gets as hrsTimeCardHours
     *
     * @return \App\Soap\cdk\src\HrsTimeCardHours
     */
    public function getHrsTimeCardHours()
    {
        return $this->hrsTimeCardHours;
    }

    /**
     * Sets a new hrsTimeCardHours
     *
     * @param \App\Soap\cdk\src\HrsTimeCardHours $hrsTimeCardHours
     * @return self
     */
    public function setHrsTimeCardHours(\App\Soap\cdk\src\HrsTimeCardHours $hrsTimeCardHours)
    {
        $this->hrsTimeCardHours = $hrsTimeCardHours;
        return $this;
    }

    /**
     * Gets as lbrLineCode
     *
     * @return \App\Soap\cdk\src\LbrLineCode
     */
    public function getLbrLineCode()
    {
        return $this->lbrLineCode;
    }

    /**
     * Sets a new lbrLineCode
     *
     * @param \App\Soap\cdk\src\LbrLineCode $lbrLineCode
     * @return self
     */
    public function setLbrLineCode(\App\Soap\cdk\src\LbrLineCode $lbrLineCode)
    {
        $this->lbrLineCode = $lbrLineCode;
        return $this;
    }

    /**
     * Gets as lbrSoldHours
     *
     * @return \App\Soap\cdk\src\LbrSoldHours
     */
    public function getLbrSoldHours()
    {
        return $this->lbrSoldHours;
    }

    /**
     * Sets a new lbrSoldHours
     *
     * @param \App\Soap\cdk\src\LbrSoldHours $lbrSoldHours
     * @return self
     */
    public function setLbrSoldHours(\App\Soap\cdk\src\LbrSoldHours $lbrSoldHours)
    {
        $this->lbrSoldHours = $lbrSoldHours;
        return $this;
    }

    /**
     * Gets as linBookerNo
     *
     * @return \App\Soap\cdk\src\LinBookerNo
     */
    public function getLinBookerNo()
    {
        return $this->linBookerNo;
    }

    /**
     * Sets a new linBookerNo
     *
     * @param \App\Soap\cdk\src\LinBookerNo $linBookerNo
     * @return self
     */
    public function setLinBookerNo(\App\Soap\cdk\src\LinBookerNo $linBookerNo)
    {
        $this->linBookerNo = $linBookerNo;
        return $this;
    }

    /**
     * Gets as lotLocation
     *
     * @return \App\Soap\cdk\src\LotLocation
     */
    public function getLotLocation()
    {
        return $this->lotLocation;
    }

    /**
     * Sets a new lotLocation
     *
     * @param \App\Soap\cdk\src\LotLocation $lotLocation
     * @return self
     */
    public function setLotLocation(\App\Soap\cdk\src\LotLocation $lotLocation)
    {
        $this->lotLocation = $lotLocation;
        return $this;
    }

    /**
     * Gets as mlsOpCodeDesc
     *
     * @return \App\Soap\cdk\src\MlsOpCodeDesc
     */
    public function getMlsOpCodeDesc()
    {
        return $this->mlsOpCodeDesc;
    }

    /**
     * Sets a new mlsOpCodeDesc
     *
     * @param \App\Soap\cdk\src\MlsOpCodeDesc $mlsOpCodeDesc
     * @return self
     */
    public function setMlsOpCodeDesc(\App\Soap\cdk\src\MlsOpCodeDesc $mlsOpCodeDesc)
    {
        $this->mlsOpCodeDesc = $mlsOpCodeDesc;
        return $this;
    }

    /**
     * Gets as openTime
     *
     * @return string
     */
    public function getOpenTime()
    {
        return $this->openTime;
    }

    /**
     * Sets a new openTime
     *
     * @param string $openTime
     * @return self
     */
    public function setOpenTime($openTime)
    {
        $this->openTime = $openTime;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToPhoneNumber(\App\Soap\cdk\src\V $v)
    {
        $this->phoneNumber[] = $v;
        return $this;
    }

    /**
     * isset phoneNumber
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPhoneNumber($index)
    {
        return isset($this->phoneNumber[$index]);
    }

    /**
     * unset phoneNumber
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPhoneNumber($index)
    {
        unset($this->phoneNumber[$index]);
    }

    /**
     * Gets as phoneNumber
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets a new phoneNumber
     *
     * @param \App\Soap\cdk\src\V[] $phoneNumber
     * @return self
     */
    public function setPhoneNumber(array $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * Gets as warFailedPartsCount
     *
     * @return \App\Soap\cdk\src\WarFailedPartsCount
     */
    public function getWarFailedPartsCount()
    {
        return $this->warFailedPartsCount;
    }

    /**
     * Sets a new warFailedPartsCount
     *
     * @param \App\Soap\cdk\src\WarFailedPartsCount $warFailedPartsCount
     * @return self
     */
    public function setWarFailedPartsCount(\App\Soap\cdk\src\WarFailedPartsCount $warFailedPartsCount)
    {
        $this->warFailedPartsCount = $warFailedPartsCount;
        return $this;
    }

    /**
     * Gets as dedSequenceNo
     *
     * @return \App\Soap\cdk\src\DedSequenceNo
     */
    public function getDedSequenceNo()
    {
        return $this->dedSequenceNo;
    }

    /**
     * Sets a new dedSequenceNo
     *
     * @param \App\Soap\cdk\src\DedSequenceNo $dedSequenceNo
     * @return self
     */
    public function setDedSequenceNo(\App\Soap\cdk\src\DedSequenceNo $dedSequenceNo)
    {
        $this->dedSequenceNo = $dedSequenceNo;
        return $this;
    }

    /**
     * Gets as disLopSeqNo
     *
     * @return \App\Soap\cdk\src\DisLopSeqNo
     */
    public function getDisLopSeqNo()
    {
        return $this->disLopSeqNo;
    }

    /**
     * Sets a new disLopSeqNo
     *
     * @param \App\Soap\cdk\src\DisLopSeqNo $disLopSeqNo
     * @return self
     */
    public function setDisLopSeqNo(\App\Soap\cdk\src\DisLopSeqNo $disLopSeqNo)
    {
        $this->disLopSeqNo = $disLopSeqNo;
        return $this;
    }

    /**
     * Gets as disOverrideTarget
     *
     * @return \App\Soap\cdk\src\DisOverrideTarget
     */
    public function getDisOverrideTarget()
    {
        return $this->disOverrideTarget;
    }

    /**
     * Sets a new disOverrideTarget
     *
     * @param \App\Soap\cdk\src\DisOverrideTarget $disOverrideTarget
     * @return self
     */
    public function setDisOverrideTarget(\App\Soap\cdk\src\DisOverrideTarget $disOverrideTarget)
    {
        $this->disOverrideTarget = $disOverrideTarget;
        return $this;
    }

    /**
     * Gets as feeLOPorPartFlag
     *
     * @return \App\Soap\cdk\src\FeeLOPorPartFlag
     */
    public function getFeeLOPorPartFlag()
    {
        return $this->feeLOPorPartFlag;
    }

    /**
     * Sets a new feeLOPorPartFlag
     *
     * @param \App\Soap\cdk\src\FeeLOPorPartFlag $feeLOPorPartFlag
     * @return self
     */
    public function setFeeLOPorPartFlag(\App\Soap\cdk\src\FeeLOPorPartFlag $feeLOPorPartFlag)
    {
        $this->feeLOPorPartFlag = $feeLOPorPartFlag;
        return $this;
    }

    /**
     * Gets as feeMultivalueCount
     *
     * @return int
     */
    public function getFeeMultivalueCount()
    {
        return $this->feeMultivalueCount;
    }

    /**
     * Sets a new feeMultivalueCount
     *
     * @param int $feeMultivalueCount
     * @return self
     */
    public function setFeeMultivalueCount($feeMultivalueCount)
    {
        $this->feeMultivalueCount = $feeMultivalueCount;
        return $this;
    }

    /**
     * Gets as hasCustPayFlag
     *
     * @return string
     */
    public function getHasCustPayFlag()
    {
        return $this->hasCustPayFlag;
    }

    /**
     * Sets a new hasCustPayFlag
     *
     * @param string $hasCustPayFlag
     * @return self
     */
    public function setHasCustPayFlag($hasCustPayFlag)
    {
        $this->hasCustPayFlag = $hasCustPayFlag;
        return $this;
    }

    /**
     * Gets as lbrComebackRO
     *
     * @return \App\Soap\cdk\src\LbrComebackRO
     */
    public function getLbrComebackRO()
    {
        return $this->lbrComebackRO;
    }

    /**
     * Sets a new lbrComebackRO
     *
     * @param \App\Soap\cdk\src\LbrComebackRO $lbrComebackRO
     * @return self
     */
    public function setLbrComebackRO(\App\Soap\cdk\src\LbrComebackRO $lbrComebackRO)
    {
        $this->lbrComebackRO = $lbrComebackRO;
        return $this;
    }

    /**
     * Gets as lbrComebackSA
     *
     * @return \App\Soap\cdk\src\LbrComebackSA
     */
    public function getLbrComebackSA()
    {
        return $this->lbrComebackSA;
    }

    /**
     * Sets a new lbrComebackSA
     *
     * @param \App\Soap\cdk\src\LbrComebackSA $lbrComebackSA
     * @return self
     */
    public function setLbrComebackSA(\App\Soap\cdk\src\LbrComebackSA $lbrComebackSA)
    {
        $this->lbrComebackSA = $lbrComebackSA;
        return $this;
    }

    /**
     * Gets as lbrForcedShopCharge
     *
     * @return \App\Soap\cdk\src\LbrForcedShopCharge
     */
    public function getLbrForcedShopCharge()
    {
        return $this->lbrForcedShopCharge;
    }

    /**
     * Sets a new lbrForcedShopCharge
     *
     * @param \App\Soap\cdk\src\LbrForcedShopCharge $lbrForcedShopCharge
     * @return self
     */
    public function setLbrForcedShopCharge(\App\Soap\cdk\src\LbrForcedShopCharge $lbrForcedShopCharge)
    {
        $this->lbrForcedShopCharge = $lbrForcedShopCharge;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotFlagHours(\App\Soap\cdk\src\V $v)
    {
        $this->totFlagHours[] = $v;
        return $this;
    }

    /**
     * isset totFlagHours
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotFlagHours($index)
    {
        return isset($this->totFlagHours[$index]);
    }

    /**
     * unset totFlagHours
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotFlagHours($index)
    {
        unset($this->totFlagHours[$index]);
    }

    /**
     * Gets as totFlagHours
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotFlagHours()
    {
        return $this->totFlagHours;
    }

    /**
     * Sets a new totFlagHours
     *
     * @param \App\Soap\cdk\src\V[] $totFlagHours
     * @return self
     */
    public function setTotFlagHours(array $totFlagHours)
    {
        $this->totFlagHours = $totFlagHours;
        return $this;
    }

    /**
     * Gets as totMultivalueCount
     *
     * @return int
     */
    public function getTotMultivalueCount()
    {
        return $this->totMultivalueCount;
    }

    /**
     * Sets a new totMultivalueCount
     *
     * @param int $totMultivalueCount
     * @return self
     */
    public function setTotMultivalueCount($totMultivalueCount)
    {
        $this->totMultivalueCount = $totMultivalueCount;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotShopChargeCost(\App\Soap\cdk\src\V $v)
    {
        $this->totShopChargeCost[] = $v;
        return $this;
    }

    /**
     * isset totShopChargeCost
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotShopChargeCost($index)
    {
        return isset($this->totShopChargeCost[$index]);
    }

    /**
     * unset totShopChargeCost
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotShopChargeCost($index)
    {
        unset($this->totShopChargeCost[$index]);
    }

    /**
     * Gets as totShopChargeCost
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotShopChargeCost()
    {
        return $this->totShopChargeCost;
    }

    /**
     * Sets a new totShopChargeCost
     *
     * @param \App\Soap\cdk\src\V[] $totShopChargeCost
     * @return self
     */
    public function setTotShopChargeCost(array $totShopChargeCost)
    {
        $this->totShopChargeCost = $totShopChargeCost;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotSubletCount(\App\Soap\cdk\src\V $v)
    {
        $this->totSubletCount[] = $v;
        return $this;
    }

    /**
     * isset totSubletCount
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotSubletCount($index)
    {
        return isset($this->totSubletCount[$index]);
    }

    /**
     * unset totSubletCount
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotSubletCount($index)
    {
        unset($this->totSubletCount[$index]);
    }

    /**
     * Gets as totSubletCount
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotSubletCount()
    {
        return $this->totSubletCount;
    }

    /**
     * Sets a new totSubletCount
     *
     * @param \App\Soap\cdk\src\V[] $totSubletCount
     * @return self
     */
    public function setTotSubletCount(array $totSubletCount)
    {
        $this->totSubletCount = $totSubletCount;
        return $this;
    }

    /**
     * Gets as warAuthorizationCode
     *
     * @return \App\Soap\cdk\src\WarAuthorizationCode
     */
    public function getWarAuthorizationCode()
    {
        return $this->warAuthorizationCode;
    }

    /**
     * Sets a new warAuthorizationCode
     *
     * @param \App\Soap\cdk\src\WarAuthorizationCode $warAuthorizationCode
     * @return self
     */
    public function setWarAuthorizationCode(\App\Soap\cdk\src\WarAuthorizationCode $warAuthorizationCode)
    {
        $this->warAuthorizationCode = $warAuthorizationCode;
        return $this;
    }

    /**
     * Gets as warClaimType
     *
     * @return \App\Soap\cdk\src\WarClaimType
     */
    public function getWarClaimType()
    {
        return $this->warClaimType;
    }

    /**
     * Sets a new warClaimType
     *
     * @param \App\Soap\cdk\src\WarClaimType $warClaimType
     * @return self
     */
    public function setWarClaimType(\App\Soap\cdk\src\WarClaimType $warClaimType)
    {
        $this->warClaimType = $warClaimType;
        return $this;
    }

    /**
     * Gets as warConditionCode
     *
     * @return \App\Soap\cdk\src\WarConditionCode
     */
    public function getWarConditionCode()
    {
        return $this->warConditionCode;
    }

    /**
     * Sets a new warConditionCode
     *
     * @param \App\Soap\cdk\src\WarConditionCode $warConditionCode
     * @return self
     */
    public function setWarConditionCode(\App\Soap\cdk\src\WarConditionCode $warConditionCode)
    {
        $this->warConditionCode = $warConditionCode;
        return $this;
    }

    /**
     * Gets as warLineCode
     *
     * @return \App\Soap\cdk\src\WarLineCode
     */
    public function getWarLineCode()
    {
        return $this->warLineCode;
    }

    /**
     * Sets a new warLineCode
     *
     * @param \App\Soap\cdk\src\WarLineCode $warLineCode
     * @return self
     */
    public function setWarLineCode(\App\Soap\cdk\src\WarLineCode $warLineCode)
    {
        $this->warLineCode = $warLineCode;
        return $this;
    }

    /**
     * Gets as warMultivalueCount
     *
     * @return int
     */
    public function getWarMultivalueCount()
    {
        return $this->warMultivalueCount;
    }

    /**
     * Sets a new warMultivalueCount
     *
     * @param int $warMultivalueCount
     * @return self
     */
    public function setWarMultivalueCount($warMultivalueCount)
    {
        $this->warMultivalueCount = $warMultivalueCount;
        return $this;
    }

    /**
     * Gets as dedActualAmount
     *
     * @return \App\Soap\cdk\src\DedActualAmount
     */
    public function getDedActualAmount()
    {
        return $this->dedActualAmount;
    }

    /**
     * Sets a new dedActualAmount
     *
     * @param \App\Soap\cdk\src\DedActualAmount $dedActualAmount
     * @return self
     */
    public function setDedActualAmount(\App\Soap\cdk\src\DedActualAmount $dedActualAmount)
    {
        $this->dedActualAmount = $dedActualAmount;
        return $this;
    }

    /**
     * Gets as dedLaborType
     *
     * @return \App\Soap\cdk\src\DedLaborType
     */
    public function getDedLaborType()
    {
        return $this->dedLaborType;
    }

    /**
     * Sets a new dedLaborType
     *
     * @param \App\Soap\cdk\src\DedLaborType $dedLaborType
     * @return self
     */
    public function setDedLaborType(\App\Soap\cdk\src\DedLaborType $dedLaborType)
    {
        $this->dedLaborType = $dedLaborType;
        return $this;
    }

    /**
     * Gets as disAppliedBy
     *
     * @return \App\Soap\cdk\src\DisAppliedBy
     */
    public function getDisAppliedBy()
    {
        return $this->disAppliedBy;
    }

    /**
     * Sets a new disAppliedBy
     *
     * @param \App\Soap\cdk\src\DisAppliedBy $disAppliedBy
     * @return self
     */
    public function setDisAppliedBy(\App\Soap\cdk\src\DisAppliedBy $disAppliedBy)
    {
        $this->disAppliedBy = $disAppliedBy;
        return $this;
    }

    /**
     * Gets as disDesc
     *
     * @return \App\Soap\cdk\src\DisDesc
     */
    public function getDisDesc()
    {
        return $this->disDesc;
    }

    /**
     * Sets a new disDesc
     *
     * @param \App\Soap\cdk\src\DisDesc $disDesc
     * @return self
     */
    public function setDisDesc(\App\Soap\cdk\src\DisDesc $disDesc)
    {
        $this->disDesc = $disDesc;
        return $this;
    }

    /**
     * Gets as disManagerOverride
     *
     * @return \App\Soap\cdk\src\DisManagerOverride
     */
    public function getDisManagerOverride()
    {
        return $this->disManagerOverride;
    }

    /**
     * Sets a new disManagerOverride
     *
     * @param \App\Soap\cdk\src\DisManagerOverride $disManagerOverride
     * @return self
     */
    public function setDisManagerOverride(\App\Soap\cdk\src\DisManagerOverride $disManagerOverride)
    {
        $this->disManagerOverride = $disManagerOverride;
        return $this;
    }

    /**
     * Gets as disOverrideGPPercent
     *
     * @return \App\Soap\cdk\src\DisOverrideGPPercent
     */
    public function getDisOverrideGPPercent()
    {
        return $this->disOverrideGPPercent;
    }

    /**
     * Sets a new disOverrideGPPercent
     *
     * @param \App\Soap\cdk\src\DisOverrideGPPercent $disOverrideGPPercent
     * @return self
     */
    public function setDisOverrideGPPercent(\App\Soap\cdk\src\DisOverrideGPPercent $disOverrideGPPercent)
    {
        $this->disOverrideGPPercent = $disOverrideGPPercent;
        return $this;
    }

    /**
     * Gets as hrsMcdPercentage
     *
     * @return \App\Soap\cdk\src\HrsMcdPercentage
     */
    public function getHrsMcdPercentage()
    {
        return $this->hrsMcdPercentage;
    }

    /**
     * Sets a new hrsMcdPercentage
     *
     * @param \App\Soap\cdk\src\HrsMcdPercentage $hrsMcdPercentage
     * @return self
     */
    public function setHrsMcdPercentage(\App\Soap\cdk\src\HrsMcdPercentage $hrsMcdPercentage)
    {
        $this->hrsMcdPercentage = $hrsMcdPercentage;
        return $this;
    }

    /**
     * Gets as lbrOtherHours
     *
     * @return \App\Soap\cdk\src\LbrOtherHours
     */
    public function getLbrOtherHours()
    {
        return $this->lbrOtherHours;
    }

    /**
     * Sets a new lbrOtherHours
     *
     * @param \App\Soap\cdk\src\LbrOtherHours $lbrOtherHours
     * @return self
     */
    public function setLbrOtherHours(\App\Soap\cdk\src\LbrOtherHours $lbrOtherHours)
    {
        $this->lbrOtherHours = $lbrOtherHours;
        return $this;
    }

    /**
     * Gets as mlsMcdPercentage
     *
     * @return \App\Soap\cdk\src\MlsMcdPercentage
     */
    public function getMlsMcdPercentage()
    {
        return $this->mlsMcdPercentage;
    }

    /**
     * Sets a new mlsMcdPercentage
     *
     * @param \App\Soap\cdk\src\MlsMcdPercentage $mlsMcdPercentage
     * @return self
     */
    public function setMlsMcdPercentage(\App\Soap\cdk\src\MlsMcdPercentage $mlsMcdPercentage)
    {
        $this->mlsMcdPercentage = $mlsMcdPercentage;
        return $this;
    }

    /**
     * Gets as payCPTotal
     *
     * @return float
     */
    public function getPayCPTotal()
    {
        return $this->payCPTotal;
    }

    /**
     * Sets a new payCPTotal
     *
     * @param float $payCPTotal
     * @return self
     */
    public function setPayCPTotal($payCPTotal)
    {
        $this->payCPTotal = $payCPTotal;
        return $this;
    }

    /**
     * Gets as payPaymentCode
     *
     * @return \App\Soap\cdk\src\PayPaymentCode
     */
    public function getPayPaymentCode()
    {
        return $this->payPaymentCode;
    }

    /**
     * Sets a new payPaymentCode
     *
     * @param \App\Soap\cdk\src\PayPaymentCode $payPaymentCode
     * @return self
     */
    public function setPayPaymentCode(\App\Soap\cdk\src\PayPaymentCode $payPaymentCode)
    {
        $this->payPaymentCode = $payPaymentCode;
        return $this;
    }

    /**
     * Gets as phoneMultivalueCount
     *
     * @return int
     */
    public function getPhoneMultivalueCount()
    {
        return $this->phoneMultivalueCount;
    }

    /**
     * Sets a new phoneMultivalueCount
     *
     * @param int $phoneMultivalueCount
     * @return self
     */
    public function setPhoneMultivalueCount($phoneMultivalueCount)
    {
        $this->phoneMultivalueCount = $phoneMultivalueCount;
        return $this;
    }

    /**
     * Gets as prtExtendedCost
     *
     * @return \App\Soap\cdk\src\PrtExtendedCost
     */
    public function getPrtExtendedCost()
    {
        return $this->prtExtendedCost;
    }

    /**
     * Sets a new prtExtendedCost
     *
     * @param \App\Soap\cdk\src\PrtExtendedCost $prtExtendedCost
     * @return self
     */
    public function setPrtExtendedCost(\App\Soap\cdk\src\PrtExtendedCost $prtExtendedCost)
    {
        $this->prtExtendedCost = $prtExtendedCost;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotDiscount(\App\Soap\cdk\src\V $v)
    {
        $this->totDiscount[] = $v;
        return $this;
    }

    /**
     * isset totDiscount
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotDiscount($index)
    {
        return isset($this->totDiscount[$index]);
    }

    /**
     * unset totDiscount
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotDiscount($index)
    {
        unset($this->totDiscount[$index]);
    }

    /**
     * Gets as totDiscount
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotDiscount()
    {
        return $this->totDiscount;
    }

    /**
     * Sets a new totDiscount
     *
     * @param \App\Soap\cdk\src\V[] $totDiscount
     * @return self
     */
    public function setTotDiscount(array $totDiscount)
    {
        $this->totDiscount = $totDiscount;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotPartsDiscount(\App\Soap\cdk\src\V $v)
    {
        $this->totPartsDiscount[] = $v;
        return $this;
    }

    /**
     * isset totPartsDiscount
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotPartsDiscount($index)
    {
        return isset($this->totPartsDiscount[$index]);
    }

    /**
     * unset totPartsDiscount
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotPartsDiscount($index)
    {
        unset($this->totPartsDiscount[$index]);
    }

    /**
     * Gets as totPartsDiscount
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotPartsDiscount()
    {
        return $this->totPartsDiscount;
    }

    /**
     * Sets a new totPartsDiscount
     *
     * @param \App\Soap\cdk\src\V[] $totPartsDiscount
     * @return self
     */
    public function setTotPartsDiscount(array $totPartsDiscount)
    {
        $this->totPartsDiscount = $totPartsDiscount;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotRoSalePostDed(\App\Soap\cdk\src\V $v)
    {
        $this->totRoSalePostDed[] = $v;
        return $this;
    }

    /**
     * isset totRoSalePostDed
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotRoSalePostDed($index)
    {
        return isset($this->totRoSalePostDed[$index]);
    }

    /**
     * unset totRoSalePostDed
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotRoSalePostDed($index)
    {
        unset($this->totRoSalePostDed[$index]);
    }

    /**
     * Gets as totRoSalePostDed
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotRoSalePostDed()
    {
        return $this->totRoSalePostDed;
    }

    /**
     * Sets a new totRoSalePostDed
     *
     * @param \App\Soap\cdk\src\V[] $totRoSalePostDed
     * @return self
     */
    public function setTotRoSalePostDed(array $totRoSalePostDed)
    {
        $this->totRoSalePostDed = $totRoSalePostDed;
        return $this;
    }

    /**
     * Gets as dedPartsAmount
     *
     * @return \App\Soap\cdk\src\DedPartsAmount
     */
    public function getDedPartsAmount()
    {
        return $this->dedPartsAmount;
    }

    /**
     * Sets a new dedPartsAmount
     *
     * @param \App\Soap\cdk\src\DedPartsAmount $dedPartsAmount
     * @return self
     */
    public function setDedPartsAmount(\App\Soap\cdk\src\DedPartsAmount $dedPartsAmount)
    {
        $this->dedPartsAmount = $dedPartsAmount;
        return $this;
    }

    /**
     * Gets as disOverrideAmount
     *
     * @return \App\Soap\cdk\src\DisOverrideAmount
     */
    public function getDisOverrideAmount()
    {
        return $this->disOverrideAmount;
    }

    /**
     * Sets a new disOverrideAmount
     *
     * @param \App\Soap\cdk\src\DisOverrideAmount $disOverrideAmount
     * @return self
     */
    public function setDisOverrideAmount(\App\Soap\cdk\src\DisOverrideAmount $disOverrideAmount)
    {
        $this->disOverrideAmount = $disOverrideAmount;
        return $this;
    }

    /**
     * Gets as disSequenceNo
     *
     * @return \App\Soap\cdk\src\DisSequenceNo
     */
    public function getDisSequenceNo()
    {
        return $this->disSequenceNo;
    }

    /**
     * Sets a new disSequenceNo
     *
     * @param \App\Soap\cdk\src\DisSequenceNo $disSequenceNo
     * @return self
     */
    public function setDisSequenceNo(\App\Soap\cdk\src\DisSequenceNo $disSequenceNo)
    {
        $this->disSequenceNo = $disSequenceNo;
        return $this;
    }

    /**
     * Gets as emailDesc
     *
     * @return \App\Soap\cdk\src\EmailDesc
     */
    public function getEmailDesc()
    {
        return $this->emailDesc;
    }

    /**
     * Sets a new emailDesc
     *
     * @param \App\Soap\cdk\src\EmailDesc $emailDesc
     * @return self
     */
    public function setEmailDesc(\App\Soap\cdk\src\EmailDesc $emailDesc)
    {
        $this->emailDesc = $emailDesc;
        return $this;
    }

    /**
     * Gets as feeSequenceNo
     *
     * @return \App\Soap\cdk\src\FeeSequenceNo
     */
    public function getFeeSequenceNo()
    {
        return $this->feeSequenceNo;
    }

    /**
     * Sets a new feeSequenceNo
     *
     * @param \App\Soap\cdk\src\FeeSequenceNo $feeSequenceNo
     * @return self
     */
    public function setFeeSequenceNo(\App\Soap\cdk\src\FeeSequenceNo $feeSequenceNo)
    {
        $this->feeSequenceNo = $feeSequenceNo;
        return $this;
    }

    /**
     * Gets as linMultivalueCount
     *
     * @return int
     */
    public function getLinMultivalueCount()
    {
        return $this->linMultivalueCount;
    }

    /**
     * Sets a new linMultivalueCount
     *
     * @param int $linMultivalueCount
     * @return self
     */
    public function setLinMultivalueCount($linMultivalueCount)
    {
        $this->linMultivalueCount = $linMultivalueCount;
        return $this;
    }

    /**
     * Gets as linStorySequenceNo
     *
     * @return \App\Soap\cdk\src\LinStorySequenceNo
     */
    public function getLinStorySequenceNo()
    {
        return $this->linStorySequenceNo;
    }

    /**
     * Sets a new linStorySequenceNo
     *
     * @param \App\Soap\cdk\src\LinStorySequenceNo $linStorySequenceNo
     * @return self
     */
    public function setLinStorySequenceNo(\App\Soap\cdk\src\LinStorySequenceNo $linStorySequenceNo)
    {
        $this->linStorySequenceNo = $linStorySequenceNo;
        return $this;
    }

    /**
     * Gets as prtLineCode
     *
     * @return \App\Soap\cdk\src\PrtLineCode
     */
    public function getPrtLineCode()
    {
        return $this->prtLineCode;
    }

    /**
     * Sets a new prtLineCode
     *
     * @param \App\Soap\cdk\src\PrtLineCode $prtLineCode
     * @return self
     */
    public function setPrtLineCode(\App\Soap\cdk\src\PrtLineCode $prtLineCode)
    {
        $this->prtLineCode = $prtLineCode;
        return $this;
    }

    /**
     * Gets as prtMultivalueCount
     *
     * @return int
     */
    public function getPrtMultivalueCount()
    {
        return $this->prtMultivalueCount;
    }

    /**
     * Sets a new prtMultivalueCount
     *
     * @param int $prtMultivalueCount
     * @return self
     */
    public function setPrtMultivalueCount($prtMultivalueCount)
    {
        $this->prtMultivalueCount = $prtMultivalueCount;
        return $this;
    }

    /**
     * Gets as prtSequenceNo
     *
     * @return \App\Soap\cdk\src\PrtSequenceNo
     */
    public function getPrtSequenceNo()
    {
        return $this->prtSequenceNo;
    }

    /**
     * Sets a new prtSequenceNo
     *
     * @param \App\Soap\cdk\src\PrtSequenceNo $prtSequenceNo
     * @return self
     */
    public function setPrtSequenceNo(\App\Soap\cdk\src\PrtSequenceNo $prtSequenceNo)
    {
        $this->prtSequenceNo = $prtSequenceNo;
        return $this;
    }

    /**
     * Gets as rapMultivalueCount
     *
     * @return int
     */
    public function getRapMultivalueCount()
    {
        return $this->rapMultivalueCount;
    }

    /**
     * Sets a new rapMultivalueCount
     *
     * @param int $rapMultivalueCount
     * @return self
     */
    public function setRapMultivalueCount($rapMultivalueCount)
    {
        $this->rapMultivalueCount = $rapMultivalueCount;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotLaborSalePostDed(\App\Soap\cdk\src\V $v)
    {
        $this->totLaborSalePostDed[] = $v;
        return $this;
    }

    /**
     * isset totLaborSalePostDed
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotLaborSalePostDed($index)
    {
        return isset($this->totLaborSalePostDed[$index]);
    }

    /**
     * unset totLaborSalePostDed
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotLaborSalePostDed($index)
    {
        unset($this->totLaborSalePostDed[$index]);
    }

    /**
     * Gets as totLaborSalePostDed
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotLaborSalePostDed()
    {
        return $this->totLaborSalePostDed;
    }

    /**
     * Sets a new totLaborSalePostDed
     *
     * @param \App\Soap\cdk\src\V[] $totLaborSalePostDed
     * @return self
     */
    public function setTotLaborSalePostDed(array $totLaborSalePostDed)
    {
        $this->totLaborSalePostDed = $totLaborSalePostDed;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotLubeCount(\App\Soap\cdk\src\V $v)
    {
        $this->totLubeCount[] = $v;
        return $this;
    }

    /**
     * isset totLubeCount
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotLubeCount($index)
    {
        return isset($this->totLubeCount[$index]);
    }

    /**
     * unset totLubeCount
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotLubeCount($index)
    {
        unset($this->totLubeCount[$index]);
    }

    /**
     * Gets as totLubeCount
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotLubeCount()
    {
        return $this->totLubeCount;
    }

    /**
     * Sets a new totLubeCount
     *
     * @param \App\Soap\cdk\src\V[] $totLubeCount
     * @return self
     */
    public function setTotLubeCount(array $totLubeCount)
    {
        $this->totLubeCount = $totLubeCount;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotPartsSalePostDed(\App\Soap\cdk\src\V $v)
    {
        $this->totPartsSalePostDed[] = $v;
        return $this;
    }

    /**
     * isset totPartsSalePostDed
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotPartsSalePostDed($index)
    {
        return isset($this->totPartsSalePostDed[$index]);
    }

    /**
     * unset totPartsSalePostDed
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotPartsSalePostDed($index)
    {
        unset($this->totPartsSalePostDed[$index]);
    }

    /**
     * Gets as totPartsSalePostDed
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotPartsSalePostDed()
    {
        return $this->totPartsSalePostDed;
    }

    /**
     * Sets a new totPartsSalePostDed
     *
     * @param \App\Soap\cdk\src\V[] $totPartsSalePostDed
     * @return self
     */
    public function setTotPartsSalePostDed(array $totPartsSalePostDed)
    {
        $this->totPartsSalePostDed = $totPartsSalePostDed;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotRoCost(\App\Soap\cdk\src\V $v)
    {
        $this->totRoCost[] = $v;
        return $this;
    }

    /**
     * isset totRoCost
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotRoCost($index)
    {
        return isset($this->totRoCost[$index]);
    }

    /**
     * unset totRoCost
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotRoCost($index)
    {
        unset($this->totRoCost[$index]);
    }

    /**
     * Gets as totRoCost
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotRoCost()
    {
        return $this->totRoCost;
    }

    /**
     * Sets a new totRoCost
     *
     * @param \App\Soap\cdk\src\V[] $totRoCost
     * @return self
     */
    public function setTotRoCost(array $totRoCost)
    {
        $this->totRoCost = $totRoCost;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotRoTax(\App\Soap\cdk\src\V $v)
    {
        $this->totRoTax[] = $v;
        return $this;
    }

    /**
     * isset totRoTax
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotRoTax($index)
    {
        return isset($this->totRoTax[$index]);
    }

    /**
     * unset totRoTax
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotRoTax($index)
    {
        unset($this->totRoTax[$index]);
    }

    /**
     * Gets as totRoTax
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotRoTax()
    {
        return $this->totRoTax;
    }

    /**
     * Sets a new totRoTax
     *
     * @param \App\Soap\cdk\src\V[] $totRoTax
     * @return self
     */
    public function setTotRoTax(array $totRoTax)
    {
        $this->totRoTax = $totRoTax;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotSubletCost(\App\Soap\cdk\src\V $v)
    {
        $this->totSubletCost[] = $v;
        return $this;
    }

    /**
     * isset totSubletCost
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotSubletCost($index)
    {
        return isset($this->totSubletCost[$index]);
    }

    /**
     * unset totSubletCost
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotSubletCost($index)
    {
        unset($this->totSubletCost[$index]);
    }

    /**
     * Gets as totSubletCost
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotSubletCost()
    {
        return $this->totSubletCost;
    }

    /**
     * Sets a new totSubletCost
     *
     * @param \App\Soap\cdk\src\V[] $totSubletCost
     * @return self
     */
    public function setTotSubletCost(array $totSubletCost)
    {
        $this->totSubletCost = $totSubletCost;
        return $this;
    }

    /**
     * Gets as dedLaborAmount
     *
     * @return \App\Soap\cdk\src\DedLaborAmount
     */
    public function getDedLaborAmount()
    {
        return $this->dedLaborAmount;
    }

    /**
     * Sets a new dedLaborAmount
     *
     * @param \App\Soap\cdk\src\DedLaborAmount $dedLaborAmount
     * @return self
     */
    public function setDedLaborAmount(\App\Soap\cdk\src\DedLaborAmount $dedLaborAmount)
    {
        $this->dedLaborAmount = $dedLaborAmount;
        return $this;
    }

    /**
     * Gets as disLineCode
     *
     * @return \App\Soap\cdk\src\DisLineCode
     */
    public function getDisLineCode()
    {
        return $this->disLineCode;
    }

    /**
     * Sets a new disLineCode
     *
     * @param \App\Soap\cdk\src\DisLineCode $disLineCode
     * @return self
     */
    public function setDisLineCode(\App\Soap\cdk\src\DisLineCode $disLineCode)
    {
        $this->disLineCode = $disLineCode;
        return $this;
    }

    /**
     * Gets as disOriginalDiscount
     *
     * @return \App\Soap\cdk\src\DisOriginalDiscount
     */
    public function getDisOriginalDiscount()
    {
        return $this->disOriginalDiscount;
    }

    /**
     * Sets a new disOriginalDiscount
     *
     * @param \App\Soap\cdk\src\DisOriginalDiscount $disOriginalDiscount
     * @return self
     */
    public function setDisOriginalDiscount(\App\Soap\cdk\src\DisOriginalDiscount $disOriginalDiscount)
    {
        $this->disOriginalDiscount = $disOriginalDiscount;
        return $this;
    }

    /**
     * Gets as disOverrideGPAmount
     *
     * @return \App\Soap\cdk\src\DisOverrideGPAmount
     */
    public function getDisOverrideGPAmount()
    {
        return $this->disOverrideGPAmount;
    }

    /**
     * Sets a new disOverrideGPAmount
     *
     * @param \App\Soap\cdk\src\DisOverrideGPAmount $disOverrideGPAmount
     * @return self
     */
    public function setDisOverrideGPAmount(\App\Soap\cdk\src\DisOverrideGPAmount $disOverrideGPAmount)
    {
        $this->disOverrideGPAmount = $disOverrideGPAmount;
        return $this;
    }

    /**
     * Gets as disPartsDiscount
     *
     * @return \App\Soap\cdk\src\DisPartsDiscount
     */
    public function getDisPartsDiscount()
    {
        return $this->disPartsDiscount;
    }

    /**
     * Sets a new disPartsDiscount
     *
     * @param \App\Soap\cdk\src\DisPartsDiscount $disPartsDiscount
     * @return self
     */
    public function setDisPartsDiscount(\App\Soap\cdk\src\DisPartsDiscount $disPartsDiscount)
    {
        $this->disPartsDiscount = $disPartsDiscount;
        return $this;
    }

    /**
     * Gets as emailMultivalueCount
     *
     * @return int
     */
    public function getEmailMultivalueCount()
    {
        return $this->emailMultivalueCount;
    }

    /**
     * Sets a new emailMultivalueCount
     *
     * @param int $emailMultivalueCount
     * @return self
     */
    public function setEmailMultivalueCount($emailMultivalueCount)
    {
        $this->emailMultivalueCount = $emailMultivalueCount;
        return $this;
    }

    /**
     * Gets as feeMcdPercentage
     *
     * @return \App\Soap\cdk\src\FeeMcdPercentage
     */
    public function getFeeMcdPercentage()
    {
        return $this->feeMcdPercentage;
    }

    /**
     * Sets a new feeMcdPercentage
     *
     * @param \App\Soap\cdk\src\FeeMcdPercentage $feeMcdPercentage
     * @return self
     */
    public function setFeeMcdPercentage(\App\Soap\cdk\src\FeeMcdPercentage $feeMcdPercentage)
    {
        $this->feeMcdPercentage = $feeMcdPercentage;
        return $this;
    }

    /**
     * Gets as hasWarrPayFlag
     *
     * @return string
     */
    public function getHasWarrPayFlag()
    {
        return $this->hasWarrPayFlag;
    }

    /**
     * Sets a new hasWarrPayFlag
     *
     * @param string $hasWarrPayFlag
     * @return self
     */
    public function setHasWarrPayFlag($hasWarrPayFlag)
    {
        $this->hasWarrPayFlag = $hasWarrPayFlag;
        return $this;
    }

    /**
     * Gets as hrsSequenceNo
     *
     * @return \App\Soap\cdk\src\HrsSequenceNo
     */
    public function getHrsSequenceNo()
    {
        return $this->hrsSequenceNo;
    }

    /**
     * Sets a new hrsSequenceNo
     *
     * @param \App\Soap\cdk\src\HrsSequenceNo $hrsSequenceNo
     * @return self
     */
    public function setHrsSequenceNo(\App\Soap\cdk\src\HrsSequenceNo $hrsSequenceNo)
    {
        $this->hrsSequenceNo = $hrsSequenceNo;
        return $this;
    }

    /**
     * Gets as lbrActualHours
     *
     * @return \App\Soap\cdk\src\LbrActualHours
     */
    public function getLbrActualHours()
    {
        return $this->lbrActualHours;
    }

    /**
     * Sets a new lbrActualHours
     *
     * @param \App\Soap\cdk\src\LbrActualHours $lbrActualHours
     * @return self
     */
    public function setLbrActualHours(\App\Soap\cdk\src\LbrActualHours $lbrActualHours)
    {
        $this->lbrActualHours = $lbrActualHours;
        return $this;
    }

    /**
     * Gets as lbrComebackFlag
     *
     * @return \App\Soap\cdk\src\LbrComebackFlag
     */
    public function getLbrComebackFlag()
    {
        return $this->lbrComebackFlag;
    }

    /**
     * Sets a new lbrComebackFlag
     *
     * @param \App\Soap\cdk\src\LbrComebackFlag $lbrComebackFlag
     * @return self
     */
    public function setLbrComebackFlag(\App\Soap\cdk\src\LbrComebackFlag $lbrComebackFlag)
    {
        $this->lbrComebackFlag = $lbrComebackFlag;
        return $this;
    }

    /**
     * Gets as lbrMultivalueCount
     *
     * @return int
     */
    public function getLbrMultivalueCount()
    {
        return $this->lbrMultivalueCount;
    }

    /**
     * Sets a new lbrMultivalueCount
     *
     * @param int $lbrMultivalueCount
     * @return self
     */
    public function setLbrMultivalueCount($lbrMultivalueCount)
    {
        $this->lbrMultivalueCount = $lbrMultivalueCount;
        return $this;
    }

    /**
     * Gets as linActualWork
     *
     * @return \App\Soap\cdk\src\LinActualWork
     */
    public function getLinActualWork()
    {
        return $this->linActualWork;
    }

    /**
     * Sets a new linActualWork
     *
     * @param \App\Soap\cdk\src\LinActualWork $linActualWork
     * @return self
     */
    public function setLinActualWork(\App\Soap\cdk\src\LinActualWork $linActualWork)
    {
        $this->linActualWork = $linActualWork;
        return $this;
    }

    /**
     * Gets as linAddOnFlag
     *
     * @return \App\Soap\cdk\src\LinAddOnFlag
     */
    public function getLinAddOnFlag()
    {
        return $this->linAddOnFlag;
    }

    /**
     * Sets a new linAddOnFlag
     *
     * @param \App\Soap\cdk\src\LinAddOnFlag $linAddOnFlag
     * @return self
     */
    public function setLinAddOnFlag(\App\Soap\cdk\src\LinAddOnFlag $linAddOnFlag)
    {
        $this->linAddOnFlag = $linAddOnFlag;
        return $this;
    }

    /**
     * Gets as mlsCost
     *
     * @return \App\Soap\cdk\src\MlsCost
     */
    public function getMlsCost()
    {
        return $this->mlsCost;
    }

    /**
     * Sets a new mlsCost
     *
     * @param \App\Soap\cdk\src\MlsCost $mlsCost
     * @return self
     */
    public function setMlsCost(\App\Soap\cdk\src\MlsCost $mlsCost)
    {
        $this->mlsCost = $mlsCost;
        return $this;
    }

    /**
     * Gets as mlsLineCode
     *
     * @return \App\Soap\cdk\src\MlsLineCode
     */
    public function getMlsLineCode()
    {
        return $this->mlsLineCode;
    }

    /**
     * Sets a new mlsLineCode
     *
     * @param \App\Soap\cdk\src\MlsLineCode $mlsLineCode
     * @return self
     */
    public function setMlsLineCode(\App\Soap\cdk\src\MlsLineCode $mlsLineCode)
    {
        $this->mlsLineCode = $mlsLineCode;
        return $this;
    }

    /**
     * Gets as mlsSale
     *
     * @return \App\Soap\cdk\src\MlsSale
     */
    public function getMlsSale()
    {
        return $this->mlsSale;
    }

    /**
     * Sets a new mlsSale
     *
     * @param \App\Soap\cdk\src\MlsSale $mlsSale
     * @return self
     */
    public function setMlsSale(\App\Soap\cdk\src\MlsSale $mlsSale)
    {
        $this->mlsSale = $mlsSale;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotCoreSale(\App\Soap\cdk\src\V $v)
    {
        $this->totCoreSale[] = $v;
        return $this;
    }

    /**
     * isset totCoreSale
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotCoreSale($index)
    {
        return isset($this->totCoreSale[$index]);
    }

    /**
     * unset totCoreSale
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotCoreSale($index)
    {
        unset($this->totCoreSale[$index]);
    }

    /**
     * Gets as totCoreSale
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotCoreSale()
    {
        return $this->totCoreSale;
    }

    /**
     * Sets a new totCoreSale
     *
     * @param \App\Soap\cdk\src\V[] $totCoreSale
     * @return self
     */
    public function setTotCoreSale(array $totCoreSale)
    {
        $this->totCoreSale = $totCoreSale;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotForcedShopCharge(\App\Soap\cdk\src\V $v)
    {
        $this->totForcedShopCharge[] = $v;
        return $this;
    }

    /**
     * isset totForcedShopCharge
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotForcedShopCharge($index)
    {
        return isset($this->totForcedShopCharge[$index]);
    }

    /**
     * unset totForcedShopCharge
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotForcedShopCharge($index)
    {
        unset($this->totForcedShopCharge[$index]);
    }

    /**
     * Gets as totForcedShopCharge
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotForcedShopCharge()
    {
        return $this->totForcedShopCharge;
    }

    /**
     * Sets a new totForcedShopCharge
     *
     * @param \App\Soap\cdk\src\V[] $totForcedShopCharge
     * @return self
     */
    public function setTotForcedShopCharge(array $totForcedShopCharge)
    {
        $this->totForcedShopCharge = $totForcedShopCharge;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotMiscCount(\App\Soap\cdk\src\V $v)
    {
        $this->totMiscCount[] = $v;
        return $this;
    }

    /**
     * isset totMiscCount
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotMiscCount($index)
    {
        return isset($this->totMiscCount[$index]);
    }

    /**
     * unset totMiscCount
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotMiscCount($index)
    {
        unset($this->totMiscCount[$index]);
    }

    /**
     * Gets as totMiscCount
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotMiscCount()
    {
        return $this->totMiscCount;
    }

    /**
     * Sets a new totMiscCount
     *
     * @param \App\Soap\cdk\src\V[] $totMiscCount
     * @return self
     */
    public function setTotMiscCount(array $totMiscCount)
    {
        $this->totMiscCount = $totMiscCount;
        return $this;
    }

    /**
     * Adds as v
     *
     * @return self
     * @param \App\Soap\cdk\src\V $v
     */
    public function addToTotPartsCount(\App\Soap\cdk\src\V $v)
    {
        $this->totPartsCount[] = $v;
        return $this;
    }

    /**
     * isset totPartsCount
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTotPartsCount($index)
    {
        return isset($this->totPartsCount[$index]);
    }

    /**
     * unset totPartsCount
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTotPartsCount($index)
    {
        unset($this->totPartsCount[$index]);
    }

    /**
     * Gets as totPartsCount
     *
     * @return \App\Soap\cdk\src\V[]
     */
    public function getTotPartsCount()
    {
        return $this->totPartsCount;
    }

    /**
     * Sets a new totPartsCount
     *
     * @param \App\Soap\cdk\src\V[] $totPartsCount
     * @return self
     */
    public function setTotPartsCount(array $totPartsCount)
    {
        $this->totPartsCount = $totPartsCount;
        return $this;
    }

    /**
     * Gets as warFailedPartNo
     *
     * @return \App\Soap\cdk\src\WarFailedPartNo
     */
    public function getWarFailedPartNo()
    {
        return $this->warFailedPartNo;
    }

    /**
     * Sets a new warFailedPartNo
     *
     * @param \App\Soap\cdk\src\WarFailedPartNo $warFailedPartNo
     * @return self
     */
    public function setWarFailedPartNo(\App\Soap\cdk\src\WarFailedPartNo $warFailedPartNo)
    {
        $this->warFailedPartNo = $warFailedPartNo;
        return $this;
    }

    /**
     * Gets as zip
     *
     * @return int
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets a new zip
     *
     * @param int $zip
     * @return self
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * Gets as prtQtyOnHand
     *
     * @return \App\Soap\cdk\src\PrtQtyOnHand
     */
    public function getPrtQtyOnHand()
    {
        return $this->prtQtyOnHand;
    }

    /**
     * Sets a new prtQtyOnHand
     *
     * @param \App\Soap\cdk\src\PrtQtyOnHand $prtQtyOnHand
     * @return self
     */
    public function setPrtQtyOnHand(\App\Soap\cdk\src\PrtQtyOnHand $prtQtyOnHand)
    {
        $this->prtQtyOnHand = $prtQtyOnHand;
        return $this;
    }

    /**
     * Gets as prtQtyBackordered
     *
     * @return \App\Soap\cdk\src\PrtQtyBackordered
     */
    public function getPrtQtyBackordered()
    {
        return $this->prtQtyBackordered;
    }

    /**
     * Sets a new prtQtyBackordered
     *
     * @param \App\Soap\cdk\src\PrtQtyBackordered $prtQtyBackordered
     * @return self
     */
    public function setPrtQtyBackordered(\App\Soap\cdk\src\PrtQtyBackordered $prtQtyBackordered)
    {
        $this->prtQtyBackordered = $prtQtyBackordered;
        return $this;
    }

    /**
     * Gets as prtQtyFilled
     *
     * @return \App\Soap\cdk\src\PrtQtyFilled
     */
    public function getPrtQtyFilled()
    {
        return $this->prtQtyFilled;
    }

    /**
     * Sets a new prtQtyFilled
     *
     * @param \App\Soap\cdk\src\PrtQtyFilled $prtQtyFilled
     * @return self
     */
    public function setPrtQtyFilled(\App\Soap\cdk\src\PrtQtyFilled $prtQtyFilled)
    {
        $this->prtQtyFilled = $prtQtyFilled;
        return $this;
    }


}

