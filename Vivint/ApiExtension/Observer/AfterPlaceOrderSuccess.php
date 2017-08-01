<?php

namespace Vivint\ApiExtension\Observer;

use Magento\Framework\Event\Observer;

/**
 * Class PaymentDataAssignObserver
 */
class AfterPlaceOrderSuccess implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $data = $observer->getEvent();
        $quote = $data->getQuote();
        $order = $data->getOrder();

        // this is how you can get additional info after its saved in the database from the table quote_payment
        $paymentAdditionalData = $quote->getPayment()->getAdditionalInformation();
        
        //do your stuff here
//         if ($quote->getItemsSummaryQty() == 0) throw new \Exception('Error: Empty Cart');
//
//        if (!$quote->getHasRunPayment()) $this->runPayment($cartId, $email_content);
//        if (!$quote->getHasScheduledAppointment()) $this->scheduleAppointment($cartId);
    }

}
