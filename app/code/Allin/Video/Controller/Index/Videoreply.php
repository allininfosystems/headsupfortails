<?php

namespace Allin\Video\Controller\Index;
use Magento\Framework\Controller\ResultFactory;

class Videoreply extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
	//echo 'test video controller';  die;
	$resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
	$post = $this->getRequest()->getPost();
	//$query = $post['searchVal'];
	//$post = $_POST['videocategory_id'];
	//echo $query; die;
	//echo '<pre>'; print_r($post); die;
	if (!$post) {
            $this->_redirect('*/*/');
            return;
        }

        if(1)
		{	
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$videoId = $post['videosId'];
			$commentId = $post['commentId'];
			$name = $post['username'];
			//echo $name; die;
			$email = $post['usermail'];
			$message = $post['usermessage'];
			
			$model = $objectManager->create('Allin\VideoComment\Model\Videocomment');
			$model->setData('videos_id', $videoId);
			$model->setData('parent_id', $commentId);
			$model->setData('username', $name);
			$model->setData('email', $email);
			$model->setData('comment', $message);
			$model->setData('status', 1);
			
			$model->save();

            echo 'Thanks for contacting us with your comments. After approval your comment will be listed here.';
           
        } 
    }
}