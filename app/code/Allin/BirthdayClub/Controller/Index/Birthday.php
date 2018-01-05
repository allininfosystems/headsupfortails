<?php

namespace Allin\BirthdayClub\Controller\Index;
use Magento\Framework\Controller\ResultFactory; 
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;

class Birthday extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
		
	$i=0;
	// echo 'test birthday controller';  die;
	$resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
	$post = $this->getRequest()->getPost();
//echo '<pre>'; print_r($post); die;
	if (!$post) {
            $this->_redirect('*/*/');
            return;
        }

         if(1)
		{
			$data = $this->getRequest()->getPostValue();
			$email = $data['email'];
			$name = $data['name'];

			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$transportBuilder = $objectManager->create('\Magento\Framework\Mail\Template\TransportBuilder');
			$inlineTranslation = $objectManager->create('\Magento\Framework\Translate\Inline\StateInterface');
			$storeManager=$objectManager->create('\Magento\Store\Model\StoreManagerInterface');
			$baseUrl = $storeManager->getStore()->getBaseUrl();
			/*=================Email Template Code Start==============================*/
			
				$inlineTranslation->suspend();

				$postObject = new \Magento\Framework\DataObject();
				$postObject->setData($data);


				$emailTemplateVariables = array();
				$emailTempVariables['email'] = $email;
				$emailTempVariables['name'] = $name;

				$error = false;

				$sender = [
				'name' => 'Headsupfortails Birthday Club',
				'email' =>'noreply@headsupfortails.com',
				];

				$storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE; 
				$transport = $transportBuilder->setTemplateIdentifier('birthday_club_email_template') // this code we have mentioned in the email_templates.xml
				->setTemplateOptions(
				[
				'area' => \Magento\Framework\App\Area::AREA_FRONTEND, // this is using frontend area to get the template file
				'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
				]
				)
				->setTemplateVars(['data' => $postObject])
				->setFrom($sender)
				->addTo($data['email'])
				->getTransport();

				$transport->sendMessage(); ;
				//$inlineTranslation->resume();

			/*==================Email Template Code End=============================*/

			/*$to = 'allin.vinodkumar@gmail.com';
            $subject = 'Birthday Club Form';
			$name = $post['name'];
			$email = $post['email'];
			$pettype = $post['pettype'];
			$petname = $post['petname'];
			$petbreed = $post['petbreed'];
			$petbirthday = $post['petbirthday'];
			$pettype1 = $post['pettype1'];
			$petname1 = $post['petname1'];
			$petbreed1 = $post['petbreed1'];
			$petbirthday1 = $post['petbirthday1'];*/
			
			
          //  $message = 'Name: ' . $name . "\r\n" . "Email: " . $email . "\r\n" . "Phone: " . $phone . "\r\n". 'Post: ' . $applied. "\r\n" . 'Intro: ' . $intro. "\r\n" . 'Resume: ' . $resume;
          //  $headers = 'From:'. $email;
         //   mail($to, $subject, $message, $headers); 
			
			$model = $objectManager->create('Allin\BirthdayClub\Model\Birthdayclub');
			$model->setData('name', $post['name']);
			$model->setData('email', $post['email']);
			$model->setData('pet_type_dog_cat_1st', $post['pettype']);
			$model->setData('pet_name_1st', $post['petname']);
			$model->setData('pet_breed_1st', $post['petbreed']);
			$model->setData('pet_birthday_1st', $post['petbirthday']);
			$model->setData('pet_type_dog_cat_2nd', $post['pettype1']);
			$model->setData('pet_name_2nd', $post['petname1']);
			$model->setData('pet_breed_2nd', $post['petbreed1']);
			$model->setData('pet_birthday_2nd', $post['petbirthday1']);
			$model->save();
			
			 echo 'Thanks for submit your Pet Information. We will contact you asap.';
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