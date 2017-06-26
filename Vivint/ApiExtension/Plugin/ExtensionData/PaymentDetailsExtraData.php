<?php

namespace Vivint\ApiExtension\Plugin\ExtensionData;

use Magento\Checkout\Api\Data\PaymentDetailsInterface;
use Magento\Checkout\Api\Data\PaymentDetailsExtensionInterface;
use Vivint\ApiExtension\Api\Data\PaymentDetailsExtensionDataInterface;

/**
 * Description of PaymentDetailsExtaData
 *
 * @author shashi
 */
class PaymentDetailsExtraData
{

    /**
     * @var PaymentDetailsExtensionFactory
     */
    private $extensionFactory;

    /**
     * @param PaymentDetailsFactory $extensionFactory
     */
    public function __construct(\Magento\Checkout\Api\Data\PaymentDetailsExtensionFactory $extensionFactory)
    {
        $this->extensionFactory = $extensionFactory;
    }

    /**
     * Loads product entity extension attributes
     *
     * @param PaymentDetailsInterface $entity
     * @param PaymentDetailsExtensionInterface|null $extension
     * @return PaymentDetailsExtensionInterface
     */
    public function afterGetExtensionAttributes(
    PaymentDetailsInterface $entity, PaymentDetailsExtensionInterface $extension = null
    )
    {
        //echo "here afterGetExtensionAttributes";
        // var_dump();
        if ($extension === null) {
            $extension = $this->extensionFactory->create();
        }

        /* here we are getting the extension attribute interface that we newly created and assigning that as the "address" PaymentDetailsExtensionDataInterface */
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $paymentDetailsExtraData = $objectManager->create(PaymentDetailsExtensionDataInterface::class);

        /* getting the quote we registered in PaymentDetails plugin in SaveAddressInformation::aroundSaveAddressInformation */
        $quote = $entity->getQuote();
        if ($quote) {
            $shippingAddress = $quote->getShippingAddress(); //getting the shipping address where we stored the data
            $paymentDetailsExtraData->setIsVerified($shippingAddress->getIsVerified());
            $paymentDetailsExtraData->setLatitude($shippingAddress->getLatitude());
            $paymentDetailsExtraData->setLongitude($shippingAddress->getLongitude());

            /* settign up the extra extension attributes we declared in extension_attributes.xml for="Magento\Checkout\Api\Data\PaymentDetailsInterface */
            $extension->setAcceptAddress($shippingAddress->getAcceptAddress()!=null?$shippingAddress->getAcceptAddress():'');
            $extension->setHasPackageLimitations($shippingAddress->getHasPackageLimitations()!=null?$shippingAddress->getHasPackageLimitations():'');
        }
        $extension->setAddress($paymentDetailsExtraData);
       

        return $extension;
    }

}
