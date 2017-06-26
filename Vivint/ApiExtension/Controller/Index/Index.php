<?php

namespace Vivint\ApiExtension\Controller\Index;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{

    public function __construct(
    \Magento\Framework\App\Action\Context $context)
    {
        return parent::__construct($context);
    }

    public function execute()
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $paymentDetailsExtraData = $objectManager->create('\Vivint\ApiExtension\Api\Data\PaymentDetailsExtensionDataInterface');
        var_dump($paymentDetailsExtraData);
        die;
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $address = $objectManager->create('Magento\Checkout\Model\PaymentDetails');
        $extAttributes = $address->getExtensionAttributes();
        var_dump($extAttributes);
        exit;
    }

}
