<?php

namespace Codilar\EcommageBlog\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Add extends \Magento\Framework\App\Action\Action
{
    protected $_post;
    protected $resultRedirect;

    public function __construct(
        \Codilar\EcommageBlog\Model\PostFactory $post,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\ResultFactory $result
    )
    {
        $this->_post = $post;
        $this->resultRedirect = $result;
        return parent::__construct($context);
    }

    public function execute()
    {


        $data = (array)$this->getRequest()->getPost();

//        $params = $this->getRequest()->getParams();

        $resultRedirect = $this->resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        //$resultRedirect->setUrl($this->_redirect->getRefererUrl());
        $resultRedirect->setPath('http://ecommage2.local/EcommageBlog/index');

        $model = $this->_post->create();
        $model->addData([
            "author_id" => $data['author_id'],
            "content" => $data['connten'],
            "status" => $data['status']
        ]);
        $model->save();



    }


}
