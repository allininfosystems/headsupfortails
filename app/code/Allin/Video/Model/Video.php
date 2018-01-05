<?php
namespace Allin\Video\Model;

class Video extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\Video\Model\ResourceModel\Video');
    }
}
?>