<?php
namespace Allin\FaqQuery\Block\Adminhtml\Faqquery\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('faqquery_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Faqquery Information'));
    }
}