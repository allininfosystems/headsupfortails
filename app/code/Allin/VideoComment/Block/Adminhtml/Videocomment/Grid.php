<?php
namespace Allin\VideoComment\Block\Adminhtml\Videocomment;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Allin\VideoComment\Model\videocommentFactory
     */
    protected $_videocommentFactory;

    /**
     * @var \Allin\VideoComment\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Allin\VideoComment\Model\videocommentFactory $videocommentFactory
     * @param \Allin\VideoComment\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Allin\VideoComment\Model\VideocommentFactory $VideocommentFactory,
        \Allin\VideoComment\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_videocommentFactory = $VideocommentFactory;
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
        $this->setDefaultSort('videocomment_id');
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
        $collection = $this->_videocommentFactory->create()->getCollection();
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
            'videocomment_id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'videocomment_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );

				
				
				$this->addColumn(
					'parent_id',
					[
						'header' => __('Parent Comment Id'),
						'index' => 'parent_id',
					]
				);
						
				$this->addColumn(
					'videos_id',
					[
						'header' => __('Video Id'),
						'index' => 'videos_id',
					]
				);
				
				$this->addColumn(
					'username',
					[
						'header' => __('Username'),
						'index' => 'username',
					]
				);
				
				$this->addColumn(
					'email',
					[
						'header' => __('Email Id'),
						'index' => 'email',
					]
				);
				
				$this->addColumn(
					'comment',
					[
						'header' => __('Comment'),
						'index' => 'comment',
					]
				);
				
				$this->addColumn(
					'status',
					[
						'header' => __('Status'),
						'index' => 'status',
						'type' => 'options',
						'options' => \Allin\VideoComment\Block\Adminhtml\Videocomment\Grid::getOptionArray1()
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
                        'field' => 'videocomment_id'
                    ]
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action'
            ]
        );
		

		
		   $this->addExportType($this->getUrl('videocomment/*/exportCsv', ['_current' => true]),__('CSV'));
		   $this->addExportType($this->getUrl('videocomment/*/exportExcel', ['_current' => true]),__('Excel XML'));

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

        $this->setMassactionIdField('videocomment_id');
        //$this->getMassactionBlock()->setTemplate('Allin_VideoComment::videocomment/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('videocomment');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('videocomment/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('videocomment/*/massStatus', ['_current' => true]),
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
        return $this->getUrl('videocomment/*/index', ['_current' => true]);
    }

    /**
     * @param \Allin\VideoComment\Model\videocomment|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
		
        return $this->getUrl(
            'videocomment/*/edit',
            ['videocomment_id' => $row->getId()]
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
			foreach(\Allin\VideoComment\Block\Adminhtml\Videocomment\Grid::getOptionArray1() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}

	

}