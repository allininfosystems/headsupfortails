<?php
namespace Allin\Resume\Model\ResourceModel;

class Jobresume extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('jobresume', 'jobresume_id');
    }
}
?>