<?php
namespace Allin\VideoCategory\Model\ResourceModel;

class Videocategory extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('videocategory', 'videocategory_id');
    }
}
?>