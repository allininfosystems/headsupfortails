<?php

namespace Allin\Video\Controller\Index;
use Magento\Framework\Controller\ResultFactory; 
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;

class Career extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
		
	$i=0;
	// echo 'test apply controller'; 
	$resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
	$post = $this->getRequest()->getPost();

	if (!$post) {
            $this->_redirect('*/*/');
            return;
        }

         if(1)
		{
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$storeManager=$objectManager->create('\Magento\Store\Model\StoreManagerInterface');
			$baseUrl = $storeManager->getStore()->getBaseUrl();
			$fileSystem = $objectManager->create('\Magento\Framework\Filesystem');
			$mediaPath=$fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath();
			$media = $mediaPath . 'resume/';
			$file_name = $_FILES['resume']['name'];
			$file_size = $_FILES['resume']['size'];
			$file_tmp = $_FILES['resume']['tmp_name'];
			$file_type = $_FILES['resume']['type'];
			$file_path = $media . $file_name;
			$path = $baseUrl . 'pub/media/resume/'. $file_name;
			
			
//echo $file_name; die;
        if (move_uploaded_file($file_tmp, $media . $file_name)) {
            echo $file_name.'<br/>';
        } else {
            echo "File was not uploaded<br/>";
        }	
		
			$to = 'allin.vinodkumar@gmail.com';
            $subject = 'Career Form';
			$name = $post['name'];
			
			$email = $post['email'];
			$phone = $post['mobile'];
			$applied = $post['applied'];
			$intro = $post['intro'];
			$resume = $_FILES['resume']['name'];
			
            $message = 'Name: ' . $name . "\r\n" . "Email: " . $email . "\r\n" . "Phone: " . $phone . "\r\n". 'Post: ' . $applied. "\r\n" . 'Intro: ' . $intro. "\r\n" . 'Resume: ' . $resume;
            $headers = 'From:'. $email;
            mail($to, $subject, $message, $headers); 
			
			$model = $objectManager->create('Allin\Resume\Model\Jobresume');
			$model->setData('name', $post['name']);
			$model->setData('email', $post['email']);
			$model->setData('phone', $post['mobile']);
			$model->setData('post', $post['applied']);
			$model->setData('intro', $post['intro']);
			$model->setData('format', $post['type']);
			$model->setData('resume', $path);
			$model->save();
			
			 echo 'Thanks for applying the Job. We will contact you asap.';
           /*  $this->messageManager->addSuccess(
                __('Thanks for contacting us with your comments and questions. We\'ll respond to you very soon.')
            );
        } else {
            $this->messageManager->addError(
                __('Something missing in your details!')
            );
        }
		$resultRedirect->setUrl($this->_redirect->getRefererUrl()); */
        //return $resultRedirect;
	}
	
    }
}