<?php


namespace Allin\Customregistrationfields\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Customer\Model\Customer;

class InstallData implements InstallDataInterface
{

    private $customerSetupFactory;

    /**
     * Constructor
     *
     * @param \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'first_pet_information', [
            'type' => 'int',
            'label' => 'First Pet Information',
            'input' => 'select',
            'source' => 'Allin\Customregistrationfields\Model\Customer\Attribute\Source\FirstPetInformation',
            'required' => false,
            'visible' => false,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'first_pet_information')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, '_first_pet_name', [
            'type' => 'varchar',
            'label' => ' First Pet Name',
            'input' => 'text',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', '_first_pet_name')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'first_pet_breed', [
            'type' => 'varchar',
            'label' => 'First Pet Breed',
            'input' => 'text',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'first_pet_breed')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'first_pets_birthday', [
            'type' => 'datetime',
            'label' => 'First Pets Birthday',
            'input' => 'date',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'first_pets_birthday')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'first_more_details', [
            'type' => 'text',
            'label' => 'First More Details',
            'input' => 'textarea',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'first_more_details')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'second_pet_information', [
            'type' => 'int',
            'label' => 'Second Pet Information',
            'input' => 'select',
            'source' => 'Allin\Customregistrationfields\Model\Customer\Attribute\Source\SecondPetInformation',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'second_pet_information')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'second_pet_name', [
            'type' => 'varchar',
            'label' => 'Second Pet Name',
            'input' => 'text',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'second_pet_name')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'second_pet_breed', [
            'type' => 'varchar',
            'label' => 'Second Pet Breed',
            'input' => 'text',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'second_pet_breed')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'second_pets_birthday', [
            'type' => 'datetime',
            'label' => 'Second Pets Birthday',
            'input' => 'date',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'second_pets_birthday')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'second_more_details', [
            'type' => 'text',
            'label' => 'Second More Details',
            'input' => 'textarea',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'second_more_details')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'third_pet_information', [
            'type' => 'int',
            'label' => 'Third Pet Information',
            'input' => 'select',
            'source' => 'Allin\Customregistrationfields\Model\Customer\Attribute\Source\ThirdPetInformation',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'third_pet_information')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'third_pet_name', [
            'type' => 'varchar',
            'label' => 'Third Pet Name',
            'input' => 'text',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'third_pet_name')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'third_pet_breed', [
            'type' => 'varchar',
            'label' => 'Third Pet Breed',
            'input' => 'text',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'third_pet_breed')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'third_pets_birthday', [
            'type' => 'datetime',
            'label' => 'Third Pets Birthday',
            'input' => 'date',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'third_pets_birthday')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
        

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'third_more_details', [
            'type' => 'text',
            'label' => 'Third More Details',
            'input' => 'textarea',
            'source' => '',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'third_more_details')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]]);
        $attribute->save();
    }
}
