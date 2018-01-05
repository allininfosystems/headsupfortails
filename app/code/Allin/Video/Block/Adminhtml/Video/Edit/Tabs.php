<?php
namespace Allin\Video\Block\Adminhtml\Video\Edit;

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
        $this->setId('video_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Video Information'));
    }
}