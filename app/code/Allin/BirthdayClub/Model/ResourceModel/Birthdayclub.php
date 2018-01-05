<?php
namespace Allin\BirthdayClub\Model\ResourceModel;

class Birthdayclub extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('birthdayclub', 'birthdayclub_id');
    }
}
?>