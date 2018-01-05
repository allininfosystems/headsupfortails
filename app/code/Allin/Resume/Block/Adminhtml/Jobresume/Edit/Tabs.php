<?php
namespace Allin\Resume\Block\Adminhtml\Jobresume\Edit;

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
        $this->setId('jobresume_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Jobresume Information'));
    }
}