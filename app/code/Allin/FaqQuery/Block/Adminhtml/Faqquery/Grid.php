<?php
namespace Allin\FaqQuery\Block\Adminhtml\Faqquery;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Allin\FaqQuery\Model\faqqueryFactory
     */
    protected $_faqqueryFactory;

    /**
     * @var \Allin\FaqQuery\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Allin\FaqQuery\Model\faqqueryFactory $faqqueryFactory
     * @param \Allin\FaqQuery\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Allin\FaqQuery\Model\FaqqueryFactory $FaqqueryFactory,
        \Allin\FaqQuery\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_faqqueryFactory = $FaqqueryFactory;
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
        $this->setDefaultSort('allin_faqquery_id');
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
        $collection = $this->_faqqueryFactory->create()->getCollection();
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
            'allin_faqquery_id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'allin_faqquery_id',
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
					'phone',
					[
						'header' => __('Phone'),
						'index' => 'phone',
					]
				);
				
				$this->addColumn(
					'order_id',
					[
						'header' => __('Order Id'),
						'index' => 'order_id',
					]
				);
				
						
						$this->addColumn(
							'subject',
							[
								'header' => __('Subject'),
								'index' => 'subject',
								'type' => 'options',
								'options' => \Allin\FaqQuery\Block\Adminhtml\Faqquery\Grid::getOptionArray4()
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
                        //'field' => 'allin_faqquery_id'
                    //]
                //],
                //'filter' => false,
                //'sortable' => false,
                //'index' => 'stores',
                //'header_css_class' => 'col-action',
                //'column_css_class' => 'col-action'
            //]
        //);
		

		
		   $this->addExportType($this->getUrl('faqquery/*/exportCsv', ['_current' => true]),__('CSV'));
		   $this->addExportType($this->getUrl('faqquery/*/exportExcel', ['_current' => true]),__('Excel XML'));

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

        $this->setMassactionIdField('allin_faqquery_id');
        //$this->getMassactionBlock()->setTemplate('Allin_FaqQuery::faqquery/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('faqquery');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('faqquery/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('faqquery/*/massStatus', ['_current' => true]),
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
        return $this->getUrl('faqquery/*/index', ['_current' => true]);
    }

    /**
     * @param \Allin\FaqQuery\Model\faqquery|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
		
        return $this->getUrl(
            'faqquery/*/edit',
            ['allin_faqquery_id' => $row->getId()]
        );
		
    }

	
		static public function getOptionArray4()
		{
            $data_array=array(); 
			$data_array[0]='I want to place an Order';
			$data_array[1]='Order Related';
			$data_array[2]='Payment related';
			$data_array[3]='Complaint';
			$data_array[4]='Others';
            return($data_array);
		}
		static public function getValueArray4()
		{
            $data_array=array();
			foreach(\Allin\FaqQuery\Block\Adminhtml\Faqquery\Grid::getOptionArray4() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}