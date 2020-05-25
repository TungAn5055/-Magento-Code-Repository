<?php

namespace Example\Repository\Model\ResourceModel\Item;

/**
 * Item collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init('Example\Repository\Model\Item', 'Example\Repository\Model\ResourceModel\Item');
    }
}