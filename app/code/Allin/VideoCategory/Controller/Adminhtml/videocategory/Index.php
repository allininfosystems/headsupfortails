<?php

namespace Allin\VideoCategory\Controller\Adminhtml\videocategory;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPagee;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Allin_VideoCategory::videocategory');
        $resultPage->addBreadcrumb(__('Allin'), __('Allin'));
        $resultPage->addBreadcrumb(__('Manage item'), __('Manage Videocategory'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Videocategory'));

        return $resultPage;
    }
}
?>