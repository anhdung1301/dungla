<?php

namespace Codilar\EcommageBlog\Controller\Adminhtml\Post;

use Codilar\EcommageBlog\Model\PostFactory;
use Magento\Backend\App\Action;
//use Codilar\EcommageBlog\Controller\Adminhtml\Post\PostDataProcessor;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Codilar_EcommgeBlog::ecommageblog';
    protected $dataProcessor;
    protected $dataPersistor;
    protected $imageUploader;
    protected $_postFactory;
    protected $_postRepository;
    protected $_fileUploader;

    public function __construct(Action\Context $context,
                                PostFactory $postFactory = null,
//                                PostDataProcessor $dataProcessor,
                                DataPersistorInterface $dataPersistor
    )
    {
//        $this->dataProcessor = $dataProcessor;
        $this->dataPersistor = $dataPersistor;
        //$this->_fileUploader = $fileUploaderFactory;
        $this->_postFactory = $postFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\Codilar\EcommageBlog\Model\PostFactory::class);

        parent::__construct($context);
    }

    public function execute()
    {
        // TODO: Implement execute() method.
        $data = $this->getRequest()->getPostValue();

        $params = $this->getRequest()->getParams();


        $model = $this->_postFactory->create();
        $resultRedirect = $this->resultRedirectFactory->create();
        //$this->processResultRedirect($model,$resultRedirect,$data);
        try {
            $msg = __('add record success');
            if ($id =! null) {
                $msg = __('Edit record success');
            }
            if (isset($data['id']) && !$id) {
                unset($data['id']);
            }
            $id=$params['post']['id'] ? $params['post']['id'] : null;
            if ($id) {
                $model->load($id);
                $model->addData([

                    "content" => $data['post']['content'],
                    "status" => $data['post']['status']
                ]);
                $model->save();
            } else {
                $model->addData([
                    "author_id" => 5,
                    "content" => $data['post']['content'],
                    "status" => $data['post']['status']

                ]);
                $model->save();
            }
            $model->setUrlKey($model->beforeSave());

            $this->messageManager->addSuccessMessage($msg);
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        if ($this->getRequest()->getParam('back', false) === 'duplicate') {
            return $resultRedirect->setPath('*/*/edit', ['id' => $id, 'duplicate' => '0']);
        } else {
            return $resultRedirect->setPath('*/*/index');
        }

    }
}
