<?php

namespace Allin\VideoComment\Model\ResourceModel\Videocomment;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\VideoComment\Model\Videocomment', 'Allin\VideoComment\Model\ResourceModel\Videocomment');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>