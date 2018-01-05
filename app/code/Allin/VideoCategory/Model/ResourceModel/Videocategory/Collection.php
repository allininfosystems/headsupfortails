<?php

namespace Allin\VideoCategory\Model\ResourceModel\Videocategory;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\VideoCategory\Model\Videocategory', 'Allin\VideoCategory\Model\ResourceModel\Videocategory');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>