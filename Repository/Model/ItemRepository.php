<?php

namespace Example\Repository\Model;

class ItemRepository implements \Example\Repository\Api\ItemRepositoryInterface {
    /**
     * @var \Example\Repository\Model\ItemFactory
     */
    protected $modelFactory;

    /**
     * @var \Example\Repository\Model\ResourceModel\Item
     */
    protected $resourceModel;

    /**
     * @var \Example\Repository\Model\ResourceModel\Item\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var \Example\Repository\Api\Data\ItemSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var \Magento\Framework\Api\FilterBuilder
     */
    protected $filterBuilder;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * ItemRepository constructor.
     * @param \Example\Repository\Model\ItemFactory $modelFactory
     * @param \Example\Repository\Model\ResourceModel\Item $resourceModel
     * @param \Example\Repository\Model\ResourceModel\Item\CollectionFactory $collectionFactory
     * @param \Example\Repository\Api\Data\ItemSearchResultsInterfaceFactory $searchResultsFactory
     * @param \Magento\Framework\Api\FilterBuilder $filterBuilder
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        \Example\Repository\Model\ItemFactory $modelFactory,
        \Example\Repository\Model\ResourceModel\Item $resourceModel,
        \Example\Repository\Model\ResourceModel\Item\CollectionFactory $collectionFactory,
        \Example\Repository\Api\Data\ItemSearchResultsInterfaceFactory $searchResultsFactory,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function save(\Example\Repository\Api\Data\ItemInterface $model) {
        try {
            $this->resourceModel->save($model);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\CouldNotSaveException(__('Unable to save item'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function get($modelId) {
        $model = $this->modelFactory->create();
        $this->resourceModel->load($model, $modelId);
        if(!$model->getId()) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(__('Requested item doesn\'t exist'));
        }
        return $model;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(\Example\Repository\Api\Data\ItemInterface $model) {
        $id = $model->getId();
        try {
            $this->resourceModel->delete($model);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\StateException(__('Unable to remove item %1', $id));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($modelId) {
        $model = $this->get($modelId);
        return $this->delete($model);
    }

    /**
     * {@inheritdoc}
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria) {
        /** @var \Example\Repository\Model\ResourceModel\Item\Collection $collection */
        $collection = $this->collectionFactory->create();

        //Add filters from root filter group to the collection
        foreach ($searchCriteria->getFilterGroups() as $group) {
            $this->addFilterGroupToCollection($group, $collection);
        }

        /** @var \Magento\Framework\Api\SortOrder $sortOrder */
        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $field = $sortOrder->getField();
            $collection->addOrder(
                $field,
                ($sortOrder->getDirection() == \Magento\Framework\Api\SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
            );
        }

        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->load();

        /** @var \Example\Repository\Api\Data\ItemSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Helper function that adds a FilterGroup to the collection.
     *
     * @param \Magento\Framework\Api\Search\FilterGroup $filterGroup
     * @param \Example\Repository\Model\ResourceModel\Item\Collection $collection
     * @return void
     */
    private function addFilterGroupToCollection(
        \Magento\Framework\Api\Search\FilterGroup $filterGroup,
        \Example\Repository\Model\ResourceModel\Item\Collection $collection)
    {
        $fields = [];
        $conditions = [];

        foreach($filterGroup->getFilters() as $filter){
            $field = $filter->getField();
            $condition = $filter->getConditionType() ?: 'eq';
            $value = $filter->getValue();

            $fields[] = $field;
            $conditions[] = [ $condition => $value ];
        }

        if ($fields) {
            $collection->addFieldToFilter($fields, $conditions);
        }
    }
}