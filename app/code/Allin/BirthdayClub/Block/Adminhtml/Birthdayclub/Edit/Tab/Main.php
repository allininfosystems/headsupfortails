<?php

namespace Allin\BirthdayClub\Block\Adminhtml\Birthdayclub\Edit\Tab;

/**
 * Birthdayclub edit form main tab
 */
class Main extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @var \Allin\BirthdayClub\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Allin\BirthdayClub\Model\Status $status,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        /* @var $model \Allin\BirthdayClub\Model\BlogPosts */
        $model = $this->_coreRegistry->registry('birthdayclub');

        $isElementDisabled = false;

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Item Information')]);

        if ($model->getId()) {
            $fieldset->addField('birthdayclub_id', 'hidden', ['name' => 'birthdayclub_id']);
        }

		
        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'title' => __('Name'),
				
                'disabled' => $isElementDisabled
            ]
        );
					
        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email'),
                'title' => __('Email'),
				
                'disabled' => $isElementDisabled
            ]
        );
					
        $fieldset->addField(
            'pet_type_dog_cat_1st',
            'text',
            [
                'name' => 'pet_type_dog_cat_1st',
                'label' => __('Pet Type (Dog/Cat)'),
                'title' => __('Pet Type (Dog/Cat)'),
				
                'disabled' => $isElementDisabled
            ]
        );
					
        $fieldset->addField(
            'pet_name_1st',
            'text',
            [
                'name' => 'pet_name_1st',
                'label' => __('Pet Name'),
                'title' => __('Pet Name'),
				
                'disabled' => $isElementDisabled
            ]
        );
					
        $fieldset->addField(
            'pet_breed_1st',
            'text',
            [
                'name' => 'pet_breed_1st',
                'label' => __('Pet Breed'),
                'title' => __('Pet Breed'),
				
                'disabled' => $isElementDisabled
            ]
        );
					

        $dateFormat = $this->_localeDate->getDateFormat(
            \IntlDateFormatter::MEDIUM
        );
        $timeFormat = $this->_localeDate->getTimeFormat(
            \IntlDateFormatter::MEDIUM
        );

        $fieldset->addField(
            'pet_birthday_1st',
            'date',
            [
                'name' => 'pet_birthday_1st',
                'label' => __('Pet Birthday'),
                'title' => __('Pet Birthday'),
                    'date_format' => $dateFormat,
                    //'time_format' => $timeFormat,
				
                'disabled' => $isElementDisabled
            ]
        );
						
						
						
        $fieldset->addField(
            'pet_type_dog_cat_2nd',
            'text',
            [
                'name' => 'pet_type_dog_cat_2nd',
                'label' => __('Pet Type (Dog/Cat)'),
                'title' => __('Pet Type (Dog/Cat)'),
				
                'disabled' => $isElementDisabled
            ]
        );
					
        $fieldset->addField(
            'pet_name_2nd',
            'text',
            [
                'name' => 'pet_name_2nd',
                'label' => __('Pet Name'),
                'title' => __('Pet Name'),
				
                'disabled' => $isElementDisabled
            ]
        );
					
        $fieldset->addField(
            'pet_breed_2nd',
            'text',
            [
                'name' => 'pet_breed_2nd',
                'label' => __('Pet Breed'),
                'title' => __('Pet Breed'),
				
                'disabled' => $isElementDisabled
            ]
        );
					

        $dateFormat = $this->_localeDate->getDateFormat(
            \IntlDateFormatter::MEDIUM
        );
        $timeFormat = $this->_localeDate->getTimeFormat(
            \IntlDateFormatter::MEDIUM
        );

        $fieldset->addField(
            'pet_birthday_2nd',
            'date',
            [
                'name' => 'pet_birthday_2nd',
                'label' => __('Pet Birthday'),
                'title' => __('Pet Birthday'),
                    'date_format' => $dateFormat,
                    //'time_format' => $timeFormat,
				
                'disabled' => $isElementDisabled
            ]
        );
						
						
						

        if (!$model->getId()) {
            $model->setData('is_active', $isElementDisabled ? '0' : '1');
        }

        $form->setValues($model->getData());
        $this->setForm($form);
		
        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Item Information');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Item Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
    
    public function getTargetOptionArray(){
    	return array(
    				'_self' => "Self",
					'_blank' => "New Page",
    				);
    }
}
