<?php
namespace Allin\VideoCategory\Model;

class Videocategory extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\VideoCategory\Model\ResourceModel\Videocategory');
    }
}
?>