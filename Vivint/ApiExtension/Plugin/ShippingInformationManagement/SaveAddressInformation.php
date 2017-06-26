<?php

namespace Vivint\ApiExtension\Plugin\ShippingInformationManagement;

/**
 * Description of SaveAddressInformation
 * the plugin is used to tap into saveAddressInformation method in Magento\Checkout\Model\ShippingInformationManagement
 * to do our own stuff setting the quote object for now to be used in PaymentDetailsInterface to populated extended attributes
 * @author shashi
 */
class SaveAddressInformation
{

    /**
     * 
     * @param \Magento\Checkout\Model\ShippingInformationManagement\Interceptor $object
     * @param \Vivint\ApiExtension\Plugin\ShippingInformationManagement\callable $proceed
     * @param type $cartId
     * @param \Magento\Checkout\Model\ShippingInformation $addressInformation
     * @return type
     */
    public function aroundSaveAddressInformation(
    \Magento\Checkout\Model\ShippingInformationManagement\Interceptor $object, callable $proceed, $cartId, \Magento\Checkout\Model\ShippingInformation $addressInformation)
    {
        /* letting the actual saveAddressInformation do its stuff */
        $result = $proceed($cartId, $addressInformation);

        /* using cart is param from the plugin to fetch the quote object to be used later */
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $quoteRepository = $objectManager->create('\Magento\Quote\Api\CartRepositoryInterface');
        $quote = $quoteRepository->getActive($cartId);
        
        
        /*here we will save the extension attributes for the quote */
        $extensionAttributes = $addressInformation->getExtensionAttributes();
        $contactId = $extensionAttributes->getContactId();
        $anotherId = $extensionAttributes->getAnotherId();
        $customDate = $extensionAttributes->getSomeRandomDate();
        
        $quote->setContactId($contactId);
        $quote->setAnotherId($anotherId);
        $quote->setSomeRandomDate($customDate);
        $quote->save();
        
        /*this is wat gives us quote object in PaymentDetailsExtraData::afterGetExtensionAttributes to be used later*/
        $result->setQuote($quote);
        
        return $result;
    }

}
