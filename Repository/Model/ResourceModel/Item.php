<?php

namespace Example\Repository\Model\ResourceModel;

/**
 * Item resource model
 */
class Item extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init('example_repository', 'id');
    }
}