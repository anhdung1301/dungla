<?php

namespace Codilar\EcommageValidation\Observer;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Event\ObserverInterface;

class UpdateCustomerMeta implements ObserverInterface
{
    protected $_post;
    protected $_customerRepositoryInterface;

    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
           \Codilar\EcommageBlog\Model\PostFactory $post
    ) {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        $this->_post = $post;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $email= $customer->getEmail();
        $id=$customer->getID();
        $model = $this->_post->create();
        $model->addData([
            "author_id" =>$id,
            "content" =>"hello $email ",
            "status" => 1
        ]);
        $model->save();



    }
}
