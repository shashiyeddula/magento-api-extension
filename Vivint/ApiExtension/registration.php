<?php
use \Magento\Framework\Component\ComponentRegistrar;

/*registering the  Vivint_ApiExtension*/
ComponentRegistrar::register(ComponentRegistrar::MODULE, 'Vivint_ApiExtension', __DIR__);