<?php
namespace Allin\BirthdayClub\Block\Adminhtml\Birthdayclub\Edit;

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
        $this->setId('birthdayclub_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Birthdayclub Information'));
    }
}