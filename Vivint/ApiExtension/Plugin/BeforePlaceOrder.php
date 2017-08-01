<?php

namespace Vivint\ApiExtension\Plugin;

use \Magento\Quote\Api\Data\PaymentInterface;

/**
 * Description of AddressAttributesLoad
 *
 * @author shashi
 */
class BeforePlaceOrder
{

    /**
     * runs even before the place order api method is called
     * @param \Magento\Quote\Model\GuestCart\GuestCartManagement\Interceptor $object
     * @param type $cartId
     * @return type
     */
    public function beforePlaceOrder(
    \Magento\Quote\Model\GuestCart\GuestCartManagement\Interceptor $object, $cartId, PaymentInterface $paymentData
    )
    {
        $_paymentDataInput = $paymentData->getData(PaymentInterface::KEY_ADDITIONAL_DATA);
        // this is how you will get the addition data you set in the api payment object before order is placed
        //but this will not save it on the quote_payment table for which i have created and observer please refere to those files
        // event.xml and PaymentDataAssignObserver.php

        return null;
    }

}
