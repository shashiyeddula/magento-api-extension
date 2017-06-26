<?php

namespace Vivint\ApiExtension\Model;

use Vivint\ApiExtension\Api\Data\PaymentDetailsExtensionDataInterface;

/**
 * @codeCoverageIgnoreStart
 */
class PaymentDetailsExtensionData extends \Magento\Framework\Model\AbstractExtensibleModel implements
PaymentDetailsExtensionDataInterface
{

    public function setIsVerified($status)
    {
        return $this->setData(self::IS_VERIFIED, $status);
    }

    public function getIsVerified()
    {
        return $this->getData(self::IS_VERIFIED);
    }

    public function setLatitude($latitudeValue)
    {
        return $this->setData(self::LATITUDE, $latitudeValue);
    }

    public function getLatitude()
    {
        return $this->getData(self::LATITUDE);
    }

    public function setLongitude($longitudeValue)
    {
        return $this->setData(self::LOGITUDE, $longitudeValue);
    }

    public function getLongitude()
    {
        return $this->getData(self::LOGITUDE);
    }

    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    public function setExtensionAttributes(
    Vivint\ApiExtension\Api\Data\PaymentDetailsExtensionInterface $extensionAttributes
    )
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

}
