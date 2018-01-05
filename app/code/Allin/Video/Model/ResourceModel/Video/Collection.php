<?php

namespace Allin\Video\Model\ResourceModel\Video;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\Video\Model\Video', 'Allin\Video\Model\ResourceModel\Video');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>