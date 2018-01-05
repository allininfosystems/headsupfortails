<?php
namespace Allin\VideoCategory\Block\Adminhtml\Videocategory;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Allin\VideoCategory\Model\videocategoryFactory
     */
    protected $_videocategoryFactory;

    /**
     * @var \Allin\VideoCategory\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Allin\VideoCategory\Model\videocategoryFactory $videocategoryFactory
     * @param \Allin\VideoCategory\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Allin\VideoCategory\Model\VideocategoryFactory $VideocategoryFactory,
        \Allin\VideoCategory\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_videocategoryFactory = $VideocategoryFactory;
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
        $this->setDefaultSort('videocategory_id');
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
        $collection = $this->_videocategoryFactory->create()->getCollection();
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
            'videocategory_id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'videocategory_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );



		$this->addColumn(
			'category_name',
			[
				'header' => __('Category Name'),
				'index' => 'category_name',
			]
		);
		$this->addColumn(
					'status',
					[
						'header' => __('Status'),
						'index' => 'status',
						'type' => 'options',
						'options' => \Allin\VideoCategory\Block\Adminhtml\Videocategory\Grid::getOptionArray1()
					]
		);
				


		
        $this->addColumn(
            'edit',
            [
                'header' => __('Edit'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url' => [
                            'base' => '*/*/edit'
                        ],
                        'field' => 'videocategory_id'
                    ]
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action'
            ]
        );
		

		
		   $this->addExportType($this->getUrl('videocategory/*/exportCsv', ['_current' => true]),__('CSV'));
		   $this->addExportType($this->getUrl('videocategory/*/exportExcel', ['_current' => true]),__('Excel XML'));

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

        $this->setMassactionIdField('videocategory_id');
        //$this->getMassactionBlock()->setTemplate('Allin_VideoCategory::videocategory/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('videocategory');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('videocategory/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('videocategory/*/massStatus', ['_current' => true]),
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
        return $this->getUrl('videocategory/*/index', ['_current' => true]);
    }

    /**
     * @param \Allin\VideoCategory\Model\videocategory|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
		
        return $this->getUrl(
            'videocategory/*/edit',
            ['videocategory_id' => $row->getId()]
        );
		
    }
	
	static public function getOptionArray1()
		{
            $data_array=array(); 
			$data_array[0]='Enable';
			$data_array[1]='Disable';
            return($data_array);
		}
		static public function getValueArray1()
		{
            $data_array=array();
			foreach(\Allin\VideoCategory\Block\Adminhtml\Videocategory\Grid::getOptionArray1() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}

	

}