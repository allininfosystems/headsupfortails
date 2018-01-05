<?php

namespace Allin\VideoComment\Controller\Adminhtml\videocomment;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Response\Http\FileFactory;

class ExportExcel extends \Magento\Backend\App\Action
{
    protected $_fileFactory;

    public function execute()
    {
        $this->_view->loadLayout(false);

        $fileName = 'videocomment.xml';

        $exportBlock = $this->_view->getLayout()->createBlock('Allin\VideoComment\Block\Adminhtml\Videocomment\Grid');

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $this->_fileFactory = $objectManager->create('Magento\Framework\App\Response\Http\FileFactory');


        return $this->_fileFactory->create(
            $fileName,
            $exportBlock->getExcelFile(),
            DirectoryList::VAR_DIR
        );
    }
}