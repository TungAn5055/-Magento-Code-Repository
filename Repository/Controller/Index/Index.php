<?php

namespace Example\Repository\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Example\Repository\Api\Data\ItemInterfaceFactory
     */
    protected $itemFactory;

    /**
     * @var \Example\Repository\Api\ItemRepositoryInterface
     */
    protected $itemRepository;

    /**
     * @var \Magento\Framework\Api\FilterBuilder
     */
    protected $filterBuilder;

    /**
     * @var \Magento\Framework\Api\Search\FilterGroupBuilder
     */
    protected $filterGroupBuilder;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Example\Repository\Api\Data\ItemInterfaceFactory $itemFactory,
        \Example\Repository\Api\ItemRepositoryInterface $itemRepository,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\Search\FilterGroupBuilder $filterGroupBuilder,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->itemFactory = $itemFactory;
        $this->itemRepository = $itemRepository;
        $this->filterBuilder = $filterBuilder;
        $this->filterGroupBuilder = $filterGroupBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context);
    }

    /**
     * Example index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /* ----- Create ----- */
//        /** @var \Example\Repository\Api\Data\ItemInterface $item */
//        $item = $this->itemFactory->create();
//        $item
//            ->setName('Name 1')
//            ->setCreatedAt((new \DateTime())->getTimestamp());
//
//        $this->itemRepository->save($item);
//
//        /** @var \Example\Repository\Api\Data\ItemInterface $item */
//        $item = $this->itemFactory->create();
//        $item
//            ->setName('Name 2')
//            ->setCreatedAt((new \DateTime())->getTimestamp());
//
//        $this->itemRepository->save($item);

        /* ----- Retrieve ----- */
//        $item = $this->itemRepository->get(1);
//        var_dump($item->getName());
//        var_dump($item->getCreatedAt());
//        var_dump($item->getData());

        /* ----- Update ----- */
//        $item = $this->itemRepository->get(1);
//        $item
//            ->setUpdatedAt((new \DateTime())->getTimestamp());
//
//        $this->itemRepository->save($item);

        /* ----- Delete ----- */
//        $item = $this->itemRepository->get(1);
//        if ($this->itemRepository->delete($item)) {
//            echo 'True';
//        }

        /* ----- Delete 2 ----- */
//        $this->itemRepository->deleteById(2);

        /* ----- Setup sample data which is used to demonstrated Repository's getList ----- */
//        /** @var \Example\Repository\Api\Data\ItemInterface $item */
//        $item = $this->itemFactory->create();
//        $item
//            ->setName('Name 3')
//            ->setCreatedAt((new \DateTime())->getTimestamp());
//
//        $this->itemRepository->save($item);
//
//        /** @var \Example\Repository\Api\Data\ItemInterface $item */
//        $item = $this->itemFactory->create();
//        $item
//            ->setName('Name 4')
//            ->setCreatedAt((new \DateTime())->getTimestamp());
//
//        $this->itemRepository->save($item);
//
//        /** @var \Example\Repository\Api\Data\ItemInterface $item */
//        $item = $this->itemFactory->create();
//        $item
//            ->setName('Name 5')
//            ->setCreatedAt((new \DateTime())->getTimestamp());
//
//        $this->itemRepository->save($item);

        /* ----- getList with 1 filter, 1 filter group ----- */
//        $filter = $this->filterBuilder
//            ->create()
//            ->setField(\Example\Repository\Api\Data\ItemInterface::NAME)
//            ->setValue('%4%')
//            ->setConditionType('like');
//
//        $filterGroup = $this->filterGroupBuilder
//            ->addFilter($filter)
//            ->create();
//
//        $searchCriteria = $this->searchCriteriaBuilder
//            ->setFilterGroups([$filterGroup])
//            ->create();
//
//        $result = $this->itemRepository->getList($searchCriteria);
//        foreach ($result->getItems() as $item) {
//            var_dump($item->getData());
//        }

        /* ----- getList with 2 filters, 1 filter group | OR is used between each filter inside a filter group ----- */
//        $filter1 = $this->filterBuilder
//            ->create()
//            ->setField(\Example\Repository\Api\Data\ItemInterface::NAME)
//            ->setValue('%4%')
//            ->setConditionType('like');
//
//        $filter2 = $this->filterBuilder
//            ->create()
//            ->setField(\Example\Repository\Api\Data\ItemInterface::NAME)
//            ->setValue('%5%')
//            ->setConditionType('like');
//
//        $filterGroup = $this->filterGroupBuilder
//            ->setFilters([$filter1])
//            ->addFilter($filter2)
//            ->create();
//
//        $searchCriteria = $this->searchCriteriaBuilder
//            ->setFilterGroups([$filterGroup])
//            ->create();
//
//        $result = $this->itemRepository->getList($searchCriteria);
//        foreach ($result->getItems() as $item) {
//            var_dump($item->getData());
//        }

        /* ----- getList with 2 filters, 2 filter groups | AND is used between each filter group inside a search criteria ----- */
//        $filter1 = $this->filterBuilder
//            ->create()
//            ->setField(\Example\Repository\Api\Data\ItemInterface::NAME)
//            ->setValue('%4%')
//            ->setConditionType('like');
//
//        $filter2 = $this->filterBuilder
//            ->create()
//            ->setField(\Example\Repository\Api\Data\ItemInterface::NAME)
//            ->setValue('%5%')
//            ->setConditionType('like');
//
//        $filterGroup1 = $this->filterGroupBuilder
//            ->addFilter($filter1)
//            ->create();
//
//        $filterGroup2 = $this->filterGroupBuilder
//            ->addFilter($filter2)
//            ->create();
//
//        $searchCriteria = $this->searchCriteriaBuilder
//            ->setFilterGroups([$filterGroup1, $filterGroup2])
//            ->create();
//
//        $result = $this->itemRepository->getList($searchCriteria);
//        foreach ($result->getItems() as $item) {
//            var_dump($item->getData());
//        }

        echo '<br />Done';

//        /** @var \Magento\Framework\View\Result\Page $resultPage */
//        $resultPage = $this->resultPageFactory->create();
//        return $resultPage;
    }
}