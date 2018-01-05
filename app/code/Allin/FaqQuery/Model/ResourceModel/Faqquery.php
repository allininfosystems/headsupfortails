<?php
namespace Allin\FaqQuery\Model\ResourceModel;

class Faqquery extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('allin_faqquery', 'allin_faqquery_id');
    }
}
?>