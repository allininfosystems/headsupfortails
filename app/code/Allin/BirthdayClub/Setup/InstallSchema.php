<?php

namespace Allin\BirthdayClub\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.0') < 0){

		$installer->run('create table birthdayclub(birthdayclub_id int not null auto_increment, name varchar(100), email varchar(100), pet_type_dog_cat_1st varchar(100), pet_name_1st varchar(100), pet_breed_1st varchar(100), pet_birthday_1st varchar(100), pet_type_dog_cat_2nd varchar(100), pet_name_2nd varchar(100), pet_breed_2nd varchar(100), pet_birthday_2nd varchar(100), primary key(birthdayclub_id))');


		//demo 
//$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//$scopeConfig = $objectManager->create('Magento\Framework\App\Config\ScopeConfigInterface');
//demo 

		}

        $installer->endSetup();

    }
}