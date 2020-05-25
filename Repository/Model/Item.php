<?php

namespace Example\Repository\Model;

/**
 * Example Repository Model item model
 */
class Item extends \Magento\Framework\Model\AbstractModel implements \Example\Repository\Api\Data\ItemInterface {
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init('Example\Repository\Model\ResourceModel\Item');
    }

    /**
     * {@inheritdoc}
     */
    public function getId() {
        return $this->_getData('id');
    }

    /**
     * {@inheritdoc}
     */
    public function setId($id) {
        return $this->setData('id', $id);
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return $this->_getData(self::NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name) {
        return $this->setData(self::NAME, $name);
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt() {
        return $this->_getData(self::CREATED_AT);
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt($timeStamp) {
        return $this->setData(self::CREATED_AT, $timeStamp);
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt() {
        return $this->_getData(self::UPDATED_AT);
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt($timeStamp) {
        return $this->setData(self::UPDATED_AT, $timeStamp);
    }
}