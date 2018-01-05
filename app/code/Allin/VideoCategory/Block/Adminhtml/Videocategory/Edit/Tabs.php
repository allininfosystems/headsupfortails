<?php
namespace Allin\VideoCategory\Block\Adminhtml\Videocategory\Edit;

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
        $this->setId('videocategory_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Videocategory Information'));
    }
}