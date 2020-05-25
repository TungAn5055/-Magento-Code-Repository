<?php

namespace Example\Repository\Api;

/**
 * @api
 */
interface ItemRepositoryInterface {
    /**
     * Create item
     *
     * @param \Example\Repository\Api\Data\ItemInterface $item
     * @return int
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Example\Repository\Api\Data\ItemInterface $item);

    /**
     * Get info about item by item id
     *
     * @param int $modelId
     * @return \Example\Repository\Api\Data\ItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($modelId);

    /**
     * Delete item
     *
     * @param \Example\Repository\Api\Data\ItemInterface $item
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\StateException
     */
    public function delete(\Example\Repository\Api\Data\ItemInterface $item);

    /**
     * Delete item by id
     *
     * @param int $itemId
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\StateException
     */
    public function deleteById($itemId);

    /**
     * Get item list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Example\Repository\Api\Data\ItemSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}