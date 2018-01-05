<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

/**
 * Filter item model
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Catalog\Model\Layer\Filter;

class Item extends \Magento\Framework\DataObject
{
    /**
     * Url
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $_url;

    /**
     * Html pager block
     *
     * @var \Magento\Theme\Block\Html\Pager
     */
    protected $_htmlPagerBlock;

    /**
     * Construct
     *
     * @param \Magento\Framework\UrlInterface $url
     * @param \Magento\Theme\Block\Html\Pager $htmlPagerBlock
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\UrlInterface $url,
        \Magento\Theme\Block\Html\Pager $htmlPagerBlock,
        array $data = []
    ) {
        $this->_url = $url;
        $this->_htmlPagerBlock = $htmlPagerBlock;
        parent::__construct($data);
    }

    /**
     * Get filter instance
     *
     * @return \Magento\Catalog\Model\Layer\Filter\AbstractFilter
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getFilter()
    {
        $filter = $this->getData('filter');
        if (!is_object($filter)) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('The filter must be an object. Please set the correct filter.')
            );
        }
        return $filter;
    }

    /**
     * Get filter item url
     *
     * @return string
     */
    public function getUrl()
    {
        //$query = [
           // $this->getFilter()->getRequestVar() => $this->getValue(),
            // exclude current page from urls
           // $this->_htmlPagerBlock->getPageVarName() => null,
        //];
       // return $this->_url->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true, '_query' => $query]);
		 
		// custom code
		
		
		if($this->getFilter()->getRequestVar() == "cat"){
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		//$category = $objectManager->get('Magento\Framework\Registry')->registry('current_category');//get current category
		//$catId = $category->getId();
        //$subcategory = $objectManager->create('Magento\Catalog\Model\Category')->load($catId);  
			
			
        $category_url = $objectManager->create('Magento\Catalog\Model\Category')->load($this->getValue())->getUrl();
        $return = $category_url;
        $request = $this->_url->getUrl('*/*/*', array('_current'=>true, '_use_rewrite'=>true));
        if(strpos($request,'?') !== false ){
            $query_string = substr($request,strpos($request,'?'));
        }
        else{
            $query_string = '';
        }
        if(!empty($query_string)){
            $return .= $query_string;
        }
        return $return;
    }
    else{
		
		$query = [
            $this->getFilter()->getRequestVar() => $this->getValue(),
            // exclude current page from urls
            $this->_htmlPagerBlock->getPageVarName() => null,
        ];
		
        //$query = array(
         //   $this->getFilter()->getRequestVar()=>$this->getValue(),
          //  Mage::getBlockSingleton('page/html_pager')->getPageVarName() => null // exclude current page from urls
        //);
         return $this->_url->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true, '_query' => $query]);
        //return Mage::getUrl('*/*/*', array('_current'=>true, '_use_rewrite'=>true, '_query'=>$query));
    }
}
		
	

    /**
     * Get url for remove item from filter
     *
     * @return string
     */
    public function getRemoveUrl()
    {
        $query = [$this->getFilter()->getRequestVar() => $this->getFilter()->getResetValue()];
        $params['_current'] = true;
        $params['_use_rewrite'] = true;
        $params['_query'] = $query;
        $params['_escape'] = true;
        return $this->_url->getUrl('*/*/*', $params);
    }

    /**
     * Get url for "clear" link
     *
     * @return false|string
     */
    public function getClearLinkUrl()
    {
        $clearLinkText = $this->getFilter()->getClearLinkText();
        if (!$clearLinkText) {
            return false;
        }

        $urlParams = [
            '_current' => true,
            '_use_rewrite' => true,
            '_query' => [$this->getFilter()->getRequestVar() => null],
            '_escape' => true,
        ];
        return $this->_url->getUrl('*/*/*', $urlParams);
    }

    /**
     * Get item filter name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getFilter()->getName();
    }

    /**
     * Get item value as string
     *
     * @return string
     */
    public function getValueString()
    {
        $value = $this->getValue();
        if (is_array($value)) {
            return implode(',', $value);
        }
        return $value;
    }
}
