<?php
namespace Allin\ZipCode\Model;

class Zipcode extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\ZipCode\Model\ResourceModel\Zipcode');
    }
}
?>