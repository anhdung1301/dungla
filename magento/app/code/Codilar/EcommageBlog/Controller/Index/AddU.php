<?php
namespace Codilar\EcommageBlog\Controller\Index;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;


class AddU extends \Magento\Framework\App\Action\Action
{
    protected $scopeConfig;

    public function __construct(
        Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context);
    }
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = (array) $this->getRequest()->getPost();
        $params = $this->getRequest()->getParams();

        $model  = $this->_objectManager->create('Codilar\EcommageBlog\Model\Post');

        $model->load( $params['id'] );
        $model->addData([
            'content' =>$params['connten'],
            "status"=>$params['status']

        ]);

        $model->save();

//
//      return $resultRedirect->setPath('http://ecommage2.local/EcommageBlog/index');


    }
}