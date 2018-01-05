<?php

namespace Allin\BirthdayClub\Model\ResourceModel\Birthdayclub;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\BirthdayClub\Model\Birthdayclub', 'Allin\BirthdayClub\Model\ResourceModel\Birthdayclub');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>