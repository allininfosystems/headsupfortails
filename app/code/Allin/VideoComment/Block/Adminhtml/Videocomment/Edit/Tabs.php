<?php
namespace Allin\VideoComment\Block\Adminhtml\Videocomment\Edit;

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
        $this->setId('videocomment_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Videocomment Information'));
    }
}