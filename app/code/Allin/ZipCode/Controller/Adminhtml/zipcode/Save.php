<?php
namespace Allin\ZipCode\Controller\Adminhtml\zipcode;

use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;


class Save extends \Magento\Backend\App\Action
{

    /**
     * @param Action\Context $context
     */
    public function __construct(Action\Context $context)
    {
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
         $data = $this->getRequest()->getPostValue();
        
        
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $model = $this->_objectManager->create('Allin\ZipCode\Model\Zipcode');

            $id = $this->getRequest()->getParam('allinzip_id');
            if ($id) {
                $model->load($id);
                $model->setCreatedAt(date('Y-m-d H:i:s'));
            }
			 if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '') {
				// echo $_FILES['filename']['type'];die;
				$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
						if(!in_array($_FILES['filename']['type'],$mimes)){				
					  $this->messageManager->addError(__('Wrong csv format..'));
					//$this->messageManager->addException($e, __('Something went wrong while saving the Zipcode csv.')); 
					return $resultRedirect->setPath('*/*/edit', ['allinzip_id' => $this->getRequest()->getParam('allinzip_id')]);
				 }
				 
            try {
        //$uploader = $this->_objectManager->create('Magento\Core\Model\File\Uploader', array('fileId' => 'image'));
       $uploader = $this->_objectManager->create('Magento\Framework\File\Uploader', array('fileId' => 'filename'));

		$uploader->setAllowedExtensions(array('csv'));
		
		//echo DirectoryList::MEDIA;die;
		$mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
		->getDirectoryRead(DirectoryList::MEDIA);
   // echo $mediaDirectory->getAbsolutePath('zipcode');die;
		 $result = $uploader->save($mediaDirectory->getAbsolutePath('zipcode'));
		
		unset($result['tmp_name']);
		unset($result['path']);
		
		echo $data['filename'] = '/zipcode/'.$result['file']; 
		} catch (Exception $e) {
			$fileType = "Invalid file format";
		$data['filename'] = $_FILES['filename']['name'];
		}
		}
		else{
		//$data['image'] = $data['image']['value'];
		//echo "hi";
		if (isset($data['filename']) && isset($data['filename']['value'])){
		if (isset($data['filename']['delete'])){
		//echo "del";
		$data['filename'] = '';
		$data['delete_image'] = true;
		}
		elseif (isset($data['filename']['value'])){
		$data['filename'] = $data['filename']['value'];
		}
		else{
		$data['filename'] = null;
		}
		}
		}
			
			
            $model->setData($data);

            try {
                $model->save();
				$path= $_SERVER['SCRIPT_FILENAME'].'/pub/media/zipcode';
				if (file_exists($path)) { 
				chmod($data['filename'],0777,true);
				}
				
                $this->messageManager->addSuccess(__('The csv has been saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['allinzip_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Zipcode csv.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['allinzip_id' => $this->getRequest()->getParam('allinzip_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}