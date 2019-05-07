<?php

namespace Codilar\EcommageBlog\Ui\Component;

use Codilar\EcommageBlog\Model\ResourceModel\Post\CollectionFactory;
use Magento\Ui\DataProvider\Modifier\PoolInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $addFieldStrategies;
    protected $addFilterStrategies;
    private $modifiersPool;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $addFieldStrategies = [],
        array $addFilterStrategies = [],
        array $meta = [],
        array $data = [],
        PoolInterface $modifiersPool = null
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);

        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {
        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }
        $items = $this->getCollection()->toArray();
        $data = $items;
        return $data;

//

//        $items = $this->collection->getItems();
//
//        $this->loadedData = [];
//        foreach ($items as $post) {
//            $this->loadedData[$post->getId()]['general'] = $post->getData();
//        }
//        return $this->loadedData;
//        var_dump($this->loadedData);
//        die;
    }
}
