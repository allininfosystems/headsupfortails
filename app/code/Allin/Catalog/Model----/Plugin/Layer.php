<?php

namespace Allin\Catalog\Model\Plugin;

class Layer
{

    /**
     * @param \Magento\Catalog\Model\Layer $subject
     * @param $collection \Magento\Catalog\Model\ResourceModel\Product\Collection
     * @return mixed
     */
    public function afterGetProductCollection(\Magento\Catalog\Model\Layer $subject, $collection)
    {


            $collection->getSelect()->joinLeft(
                ['_inventory_table' => 'cataloginventory_stock_item'],
                "_inventory_table.product_id = e.entity_id",
                ['is_in_stock']
            );

            $collection->setOrder('is_in_stock', 'DESC');
            $collection->setOrder('created_at', 'DESC');
       echo $collection->getSelect();
        return $collection;
    }
}