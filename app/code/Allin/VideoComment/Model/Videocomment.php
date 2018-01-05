<?php
namespace Allin\VideoComment\Model;

class Videocomment extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\VideoComment\Model\ResourceModel\Videocomment');
    }
}
?>