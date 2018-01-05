<?php
namespace Allin\FaqQuery\Model;

class Faqquery extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Allin\FaqQuery\Model\ResourceModel\Faqquery');
    }
}
?>