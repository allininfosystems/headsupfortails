<?php

namespace Allin\FaqQuery\Controller\Index;
use Magento\Framework\Controller\ResultFactory; 
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;

class Query extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
		
	$i=0;
	//echo 'test apply controller testt'; 
	$resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
	$post = $this->getRequest()->getPost();
//echo '<pre>'; print_r($post); die;
	if (!$post) {
            $this->_redirect('*/*/');
            return;
        }

         if(1)
		{
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		
			$to = 'allin.vinodkumar@gmail.com';
			$subject = 'Faq Query Form';
			$name = $post['name'];
			$email = $post['email'];
			$phone = $post['phone'];
			$orderId = $post['orderId'];
			$subjectTitle = $post['subjectTitle'];
			$description = $post['description'];
			
            $message = 'Name: ' . $name . "\r\n" . "Email: " . $email . "\r\n" . "Phone: " . $phone . "\r\n". 'Post: ' . $orderId. "\r\n" . 'Subject: ' . $subjectTitle. "\r\n" . 'Description: ' . $description;
            $headers = 'From:'. $email;
            mail($to, $subject, $message, $headers); 
			
			$model = $objectManager->create('Allin\FaqQuery\Model\Faqquery');
			$model->setData('name', $name);
			$model->setData('email', $email);
			$model->setData('phone', $phone);
			$model->setData('order_id', $orderId);
			$model->setData('subject', $subjectTitle);
			$model->setData('description', $description);
			$model->save();
			
			 echo 'Your query has been submitted successfully. We will contact you asap.';
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