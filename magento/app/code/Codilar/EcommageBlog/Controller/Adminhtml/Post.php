<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Codilar\EcommageBlog\Controller\Adminhtml;

abstract class Post extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'EcommgeBlog::Post';

    protected $_coreRegistry;


    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry)
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Codilar_EcommageBlog::ecommageblog_post')
            ->addBreadcrumb(__('ECOMMAGEBLOG'), __('ECOMMAGEBLOG'))
            ->addBreadcrumb(__('Static Posts'), __('Static Post'));
        return $resultPage;
    }
}
