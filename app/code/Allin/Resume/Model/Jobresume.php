<?php
namespace Allin\Resume\Model;

class Jobresume extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\Resume\Model\ResourceModel\Jobresume');
    }
}
?>