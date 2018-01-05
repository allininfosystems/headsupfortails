<?php
namespace Allin\Video\Block\Adminhtml\Video;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Allin\Video\Model\videoFactory
     */
    protected $_videoFactory;

    /**
     * @var \Allin\Video\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Allin\Video\Model\videoFactory $videoFactory
     * @param \Allin\Video\Model\Status $status
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Allin\Video\Model\VideoFactory $VideoFactory,
        \Allin\Video\Model\Status $status,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
        $this->_videoFactory = $VideoFactory;
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
        $this->setDefaultSort('videos_id');
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
        $collection = $this->_videoFactory->create()->getCollection();
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
            'videos_id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'videos_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );


		
				$this->addColumn(
					'video_title',
					[
						'header' => __('Video Title'),
						'index' => 'video_title',
					]
				);
				
				$this->addColumn(
					'video_url',
					[
						'header' => __('Video URL'),
						'index' => 'video_url',
					]
				);
				
						
				$this->addColumn(
					'category_name',
					[
						'header' => __('Video Category'),
						'index' => 'category_name',
						'type' => 'options',
						'options' => \Allin\Video\Block\Adminhtml\Video\Grid::getOptionArray2()
					]
				);
				
				$this->addColumn(
							'status',
							[
								'header' => __('Status'),
								'index' => 'status',
								'type' => 'options',
								'options' => \Allin\Video\Block\Adminhtml\Video\Grid::getOptionArray1()
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
                        'field' => 'videos_id'
                    ]
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action'
            ]
        );
		

		
		   $this->addExportType($this->getUrl('video/*/exportCsv', ['_current' => true]),__('CSV'));
		   $this->addExportType($this->getUrl('video/*/exportExcel', ['_current' => true]),__('Excel XML'));

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

        $this->setMassactionIdField('videos_id');
        //$this->getMassactionBlock()->setTemplate('Allin_Video::video/grid/massaction_extended.phtml');
        $this->getMassactionBlock()->setFormFieldName('video');

        $this->getMassactionBlock()->addItem(
            'delete',
            [
                'label' => __('Delete'),
                'url' => $this->getUrl('video/*/massDelete'),
                'confirm' => __('Are you sure?')
            ]
        );

        $statuses = $this->_status->getOptionArray();

        $this->getMassactionBlock()->addItem(
            'status',
            [
                'label' => __('Change status'),
                'url' => $this->getUrl('video/*/massStatus', ['_current' => true]),
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
        return $this->getUrl('video/*/index', ['_current' => true]);
    }

    /**
     * @param \Allin\Video\Model\video|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
		
        return $this->getUrl(
            'video/*/edit',
            ['videos_id' => $row->getId()]
        );
		
    }

	
		static public function getOptionArray2()
		{
            $data_array=array(); 
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$collection = $objectManager->create('Allin\VideoCategory\Model\Videocategory')->getCollection();
			if ($collection->count() > 0){
				foreach($collection as $category){
						$data_array[$category->getCategoryName()]=$category->getCategoryName();
				}
			}
            return($data_array);
		}
		static public function getValueArray2()
		{
            $data_array=array();
			foreach(\Allin\Video\Block\Adminhtml\Video\Grid::getOptionArray2() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray1()
		{
            $data_array1=array(); 
			$data_array1[0]='Enable';
			$data_array1[1]='Disable';
            return($data_array1);
		}
		static public function getValueArray1()
		{
            $data_array1=array();
			foreach(\Allin\Video\Block\Adminhtml\Video\Grid::getOptionArray1() as $k=>$v){
               $data_array1[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array1);

		}
		

}