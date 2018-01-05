<?php
namespace Allin\BirthdayClub\Model;

class Birthdayclub extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\BirthdayClub\Model\ResourceModel\Birthdayclub');
    }
}
?>