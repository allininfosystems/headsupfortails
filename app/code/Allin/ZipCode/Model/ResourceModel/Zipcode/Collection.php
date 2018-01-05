<?php

namespace Allin\ZipCode\Model\ResourceModel\Zipcode;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\ZipCode\Model\Zipcode', 'Allin\ZipCode\Model\ResourceModel\Zipcode');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>