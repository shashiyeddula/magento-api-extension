<?php

namespace Vivint\ApiExtension\Plugin\ExtensionData;

/**
 * Description of CartRepositoryGetExtraData plugs into the get method of the CartRepositoryInterface::get method to set the extension data 
 *
 * @author shashi
 */
class CartRepositoryGetExtraData
{

   /**
    * tap into the get quote api call and add our custom extension attributes
    * @param \Magento\Quote\Model\QuoteRepository\Interceptor $object
    * @param \Magento\Quote\Model\Quote $responseQuoteObject
    * @return \Magento\Quote\Model\Quote
    */
    public function afterGet(\Magento\Quote\Model\QuoteRepository\Interceptor $object,\Magento\Quote\Model\Quote $responseQuoteObject)
    {
        $quoteExtension = $responseQuoteObject->getExtensionAttributes();

        $contactId = $responseQuoteObject->getContactId();
        $anotherId = $responseQuoteObject->getAnotherId();
        $customDate = $responseQuoteObject->getSomeRandomDate();

        $quoteExtension->setContactId($contactId);
        $quoteExtension->setAnotherId($anotherId);
        $quoteExtension->setSomeRandomDate($customDate);

        return $responseQuoteObject;
    }

}
