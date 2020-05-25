<?php

namespace Example\Repository\Api\Data;

/**
 * @api
 */
interface ItemSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get attributes list.
     *
     * @return \Example\Repository\Api\Data\ItemInterface[]
     */
    public function getItems();

    /**
     * Set attributes list.
     *
     * @param \Example\Repository\Api\Data\ItemInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
