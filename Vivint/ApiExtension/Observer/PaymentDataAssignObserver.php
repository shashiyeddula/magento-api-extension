<?php

namespace Vivint\ApiExtension\Observer;

use Magento\Framework\Event\Observer;
use Magento\Payment\Observer\AbstractDataAssignObserver;
use Magento\Quote\Api\Data\PaymentInterface;

/**
 * Class PaymentDataAssignObserver
 */
class PaymentDataAssignObserver extends AbstractDataAssignObserver
{
    const CUSTOM_DATA_KEY_1 = 'key_1';
    const CUSTOM_DATA_KEY_2 = 'key_2';

    /**
     * @var array
     */
    protected $additionalInformationAcceptedKeyList = [
        self::CUSTOM_DATA_KEY_1,
        self::CUSTOM_DATA_KEY_2
    ];

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $data = $this->readDataArgument($observer);

        $additionalData = $data->getData(PaymentInterface::KEY_ADDITIONAL_DATA);
        //no additional data lets get out of here
        if (!is_array($additionalData)) {
            return;
        }

        $paymentInfo = $this->readPaymentModelArgument($observer);

        foreach ($this->additionalInformationAcceptedKeyList as $_key) {
            //if the key is predefined accept it to be stored in the additional information column in quote_payment table:  else reject it 
            //additional info is automatically serialised while saving  and unseriealised while retreving so we are going save it there
            if (isset($additionalData[$_key])) {
                $paymentInfo->setAdditionalInformation(
                    $_key,
                    $additionalData[$_key]
                );
            }
        }
    }
}
