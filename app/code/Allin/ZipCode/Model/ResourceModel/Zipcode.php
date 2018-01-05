<?php
namespace Allin\ZipCode\Model\ResourceModel;

class Zipcode extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('allinzip', 'allinzip_id');
    }
}
?>