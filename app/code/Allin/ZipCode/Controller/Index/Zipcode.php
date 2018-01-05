<?php

namespace Allin\ZipCode\Controller\Index;

class Zipcode extends \Magento\Framework\App\Action\Action
{
     public function execute()
    {
       // csv file path 
	   $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
       $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');	 
	   $mediapath =  $storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
	   $filepath =   $mediapath.'zipcode/zipcode.csv';
		//echo $_POST['searchVal'];die;
		
			if(isset($_POST['searchVal'])){
			$search      = $_POST['searchVal'];
			$lines       = file($filepath);
			$line_number = false;

			while (list($key, $line) = each($lines) and !$line_number) {
			   $line_number = (strpos($line, $search) !== FALSE);
			}

			if($line_number){

			   echo "<div class='cod-avail'>Cod available  for ".$search."</div>";

			}

			else{
			   echo "Cod not available for ".$search;
			}
						
			}
			//echo  $search;
			exit;
    }
}