<?php
namespace Allin\VideoComment\Model\ResourceModel;

class Videocomment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('videocomment', 'videocomment_id');
    }
}
?>