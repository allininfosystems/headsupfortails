<?php

namespace Allin\ZipCode\Block\Index;


class Zipcode extends \Magento\Framework\View\Element\Template {

    public function __construct(\Magento\Catalog\Block\Product\Context $context, array $data = []) {

        parent::__construct($context, $data);

    }


    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
	
	
	public function zipcode(){
		
		
		//  $getzipcode = $this->getRequest()->getParam("zipcode") ;	
		  // echo  $getzipcode ;
	}

}