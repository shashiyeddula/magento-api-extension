<?php

namespace Vivint\ApiExtension\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($context->getVersion() && version_compare($context->getVersion(), '0.0.1') < 0) {
            $quoteTable = 'quote';

            //Quote  table adding extra columns to be used as entended attributes
            $connection = $setup->getConnection();
            $connection->addColumn(
                    $setup->getTable($quoteTable), 'contact_id', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                'comment' => 'Contact ID'
                    ]
            );
            $connection->addColumn(
                    $setup->getTable($quoteTable), 'another_id', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                'comment' => 'another_id'
                    ]
            );
            $connection->addColumn(
                    $setup->getTable($quoteTable), 'some_random_date', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                'comment' => 'some_random_date'
                    ]
            );
            
            
            
            $quoteAddressTable = 'quote_address';
             $connection->addColumn(
                    $setup->getTable($quoteAddressTable), 'is_verified', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                'comment' => 'Is Verified'
                    ]
            );
            $connection->addColumn(
                    $setup->getTable($quoteAddressTable), 'verification_date', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                'comment' => 'some_random_date'
                    ]
            );
            $connection->addColumn(
                    $setup->getTable($quoteAddressTable), 'latitude', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                'comment' => 'verification_date'
                    ]
            );
            $connection->addColumn(
                    $setup->getTable($quoteAddressTable), 'longitude', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                'comment' => 'longitude'
                    ]
            );
            
            $connection->addColumn(
                    $setup->getTable($quoteAddressTable), 'accept_address', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                'comment' => 'accept address'
                    ]
            );
            
            $connection->addColumn(
                    $setup->getTable($quoteAddressTable), 'has_package_limitations', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                'comment' => ' has_package_limitations'
                    ]
            );
            
        }

        $setup->endSetup();
    }

}
