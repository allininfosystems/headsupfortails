<?php
namespace Allin\BirthdayClub\Block\Adminhtml\Birthdayclub;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Allin\BirthdayClub\Model\birthdayclubFactory
     */
    protected $_birthdayclubFactory;

    /**
     * @var \Allin\BirthdayClub\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Allin\BirthdayClub\Model\birthdayclubFactory $birthdayclubFactory
     * @param \Allin\BirthdayClub\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Allin\BirthdayClub\Model\BirthdayclubFactory $BirthdayclubFactory,
        \Allin\BirthdayClub\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_birthdayclubFactory = $BirthdayclubFactory;
        $this->_status = $status;
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('postGrid');
        $this->setDefaultSort('birthdayclub_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
        $this->setVarNameFilter('post_filter');
    }

    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        $collection = $this->_birthdayclubFactory->create()->getCollection();
        $this->setCollection($collection);

        parent::_prepareCollection();

        return $this;
    }

    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'birthdayclub_id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'birthdayclub_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );


		
				$this->addColumn(
					'name',
					[
						'header' => __('Name'),
						'index' => 'name',
					]
				);
				
				$this->addColumn(
					'email',
					[
						'header' => __('Email'),
						'index' => 'email',
					]
				);
				
				$this->addColumn(
					'pet_type_dog_cat_1st',
					[
						'header' => __('Pet Type (Dog/Cat)'),
						'index' => 'pet_type_dog_cat_1st',
					]
				);
				
				$this->addColumn(
					'pet_name_1st',
					[
						'header' => __('Pet Name'),
						'index' => 'pet_name_1st',
					]
				);
				
				$this->addColumn(
					'pet_breed_1st',
					[
						'header' => __('Pet Breed'),
						'index' => 'pet_breed_1st',
					]
				);
				
				$this->addColumn(
					'pet_birthday_1st',
					[
						'header' => __('Pet Birthday'),
						'index' => 'pet_birthday_1st',
						'type'      => 'datetime',
					]
				);
					
					
				$this->addColumn(
					'pet_type_dog_cat_2nd',
					[
						'header' => __('Pet Type (Dog/Cat)'),
						'index' => 'pet_type_dog_cat_2nd',
					]
				);
				
				$this->addColumn(
					'pet_name_2nd',
					[
						'header' => __('Pet Name'),
						'index' => 'pet_name_2nd',
					]
				);
				
				$this->addColumn(
					'pet_breed_2nd',
					[
						'header' => __('Pet Breed'),
						'index' => 'pet_breed_2nd',
					]
				);
				
				$this->addColumn(
					'pet_birthday_2nd',
					[
						'header' => __('Pet Birthday'),
						'index' => 'pet_birthday_2nd',
						'type'      => 'datetime',
					]
				);
					
					


		
        //$this->addColumn(
            //'edit',
            //[
                //'header' => __('Edit'),
                //'type' => 'action',
                //'getter' => 'getId',
                //'actions' => [
                    //[
                        //'caption' => __('Edit'),
                        //'url' => [
                            //'base' => '*/*/edit'
                        //],
                        //'field' => 'birthdayclub_id'
                    //]
                //],
                //'filter' => false,
                //'sortable' => false,
                //'index' => 'stores',
                //'header_css_class' => 'col-action',
                //'column_css_class' => 'col-action'
            //]
        //);
		

		
		   $this->addExportType($this->getUrl('birthdayclub/*/exportCsv', ['_current' => true]),__('CSV'));
		   $this->addExportType($this->getUrl('birthdayclub/*/exportExcel', ['_current' => true]),__('Excel XML'));

        $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }

        return parent::_prepareColumns();
    }

	
    /**
     * @return $this
     */
    protected function _prepareMassaction()
    {

        $this->setMassactionIdField('birthdayclub_id');
        //$this->getMassactionBlock()->setTemplate('Allin_BirthdayClub::birthdayclub/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('birthdayclub');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('birthdayclub/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('birthdayclub/*/massStatus', ['_current' => true]),
                'additional' => [
                    'visibility' => [
                        'name' => 'status',
                        'type' => 'select',
                        'class' => 'required-entry',
                        'label' => __('Status'),
                        'values' => $statuses
                    ]
                ]
            ]
        );


        return $this;
    }
		

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('birthdayclub/*/index', ['_current' => true]);
    }

    /**
     * @param \Allin\BirthdayClub\Model\birthdayclub|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
		
        return $this->getUrl(
            'birthdayclub/*/edit',
            ['birthdayclub_id' => $row->getId()]
        );
		
    }

	

}