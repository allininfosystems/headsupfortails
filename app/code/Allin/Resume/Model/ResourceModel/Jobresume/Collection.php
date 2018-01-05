<?php

namespace Allin\Resume\Model\ResourceModel\Jobresume;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\Resume\Model\Jobresume', 'Allin\Resume\Model\ResourceModel\Jobresume');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>