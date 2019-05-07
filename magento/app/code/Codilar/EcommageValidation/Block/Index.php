<?php

namespace Codilar\EcommageValidation\Block;

use Codilar\EcommageBlog\Model\PostFactory;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_customerSessionFactory;
    protected $_postFactory;
    protected $_customer;
    protected $resultRedirect;
    protected $_resource;
    protected $helperData;


    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        PostFactory $postFactory,
        \Magento\Customer\Model\SessionFactory $customerSessionFactory,
        \Magento\Customer\Model\Customer $customers,
        \Magento\Framework\Controller\ResultFactory $result,
        \Magento\Framework\App\ResourceConnection $Resource,
        \Codilar\EcommageBlog\Helper\Data $helperData

    )
    {
        $this->_customerSessionFactory = $customerSessionFactory;
        $this->_postFactory = $postFactory;
        $this->_customer = $customers;
        $this->resultRedirect = $result;
        $this->_resource = $Resource;
        $this->helperData = $helperData;

        parent::__construct($context);
    }

    public function getHelloWorld()
    {
        return __('Hello World');
    }

    public function getdatabyid($id)
    {
        return $post = $this->_postFactory->create()->load($id);

//        return $post->getCollection();
    }

    public function getCustomerID()
    {
        return $this->_customerSessionFactory->create();
    }

    public function getName($id)
    {
        if ($id) {


            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION');
            $result1 = $connection->fetchAll('SELECT * FROM customer_entity Inner JOIN  blogs on customer_entity.entity_id=blogs.author_id where  author_id=' . $id . ' or status =1  group by  blogs.id,blogs.status ');
        } else {


            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION');
            $result1 = $connection->fetchAll('SELECT * FROM customer_entity,blogs where customer_entity.entity_id=blogs.author_id and status=1 GROUP BY blogs.id');
        }

        return $result1;
    }

    public function getFormAction()
    {
        return 'add';
    }


    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    public function getPostCollection()
    {
        $collection = $this->_postFactory->create()->getCollection();
        $collection->getSelect()->join(array('customer_entity' => 'customer_entity'),
            'customer_entity.entity_id = main_table.id', array('*'));
        return $collection;
    }
    public function getConfig()
    {
//        echo $this->helperData->getGeneralConfig('enable');
        return $this->helperData->getGeneralConfig('display_text');

    }

}