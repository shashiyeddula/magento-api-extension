<?php

namespace Vivint\ApiExtension\Plugin;


/**
 * Description of AddressAttributesLoad
 *
 * @author shashi
 */
class AddressAttributesSave
{

    public function beforeSave($object)
    {
        //in case there no extended attributes get out of here
        if(!$object->getExtensionAttributes()){
            return;
        }
        /*we are retreving our extended attribute on the address interface Magento\Quote\Api\Data\AddressInterface*/
        foreach ($object->getExtensionAttributes()->__toArray() as $_attribute => $_value) {
            //setting the extended attribute as field on the address 
            $object->setData($_attribute,$_value);
        }
    }
}
