<?php

namespace Vivint\ApiExtension\Api\Data;

/**
 * Description of PaymentAddressInterface
 *
 * @author shashi
 */
interface PaymentDetailsExtensionDataInterface
{

    //put your code here
    const IS_VERIFIED = 'is_verified';
    const LATITUDE = 'latitude';
    const LOGITUDE = 'logitude';

    /**
     * 
     * @param bool $status
     * @return Vivint\ApiExtension\Api\Data\PaymentDetailsExtensionDataInterface
     */
    public function setIsVerified($status);

    /**
     * @return Vivint\ApiExtension\Api\Data\PaymentDetailsExtensionDataInterface
     */
    public function getIsVerified();

    /**
     * @return Vivint\ApiExtension\Api\Data\PaymentDetailsExtensionDataInterface
     * @param string $latitudeValue
     */
    public function setLatitude($latitudeValue);

    /**
     * @return Vivint\ApiExtension\Api\Data\PaymentDetailsExtensionDataInterface
     */
    public function getLatitude();

    /**
     * @return Vivint\ApiExtension\Api\Data\PaymentDetailsExtensionDataInterface
     * @param string $longitudeValue
     */
    public function setLongitude($longitudeValue);

    /**
     * @return Vivint\ApiExtension\Api\Data\PaymentDetailsExtensionDataInterface
     */
    public function getLongitude();
}
