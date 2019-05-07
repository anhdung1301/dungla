<?php

namespace Codilar\EcommageBlog\Controller\Adminhtml\Post;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Edit extends \Codilar\EcommageBlog\Controller\Adminhtml\Post implements HttpGetActionInterface
{

    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create(\Codilar\EcommageBlog\Model\Post::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This block no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('blogs', $model);

        // 5. Build edit form

        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Blogs') : __('New Blogs'),
            $id ? __('Edit Blogs') : __('New Blogs')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('blogs'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getTitle() : __('New Blogs'));
        return $resultPage;

    }
}