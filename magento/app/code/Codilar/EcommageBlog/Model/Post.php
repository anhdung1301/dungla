<?php

namespace Codilar\EcommageBlog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'blogs';

    protected $_cacheTag = 'blogs';

    protected $_eventPrefix = 'blogs';

    const STATUS_PUBLISH = 1;
    const STATUS_DRAFT = 2;
    const STATUS_NONPUBLISH=3;


    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    protected function _construct()
    {
        $this->_init('Codilar\EcommageBlog\Model\ResourceModel\Post');
    }
    public function isActive()
    {
        return (bool)$this->getData(self::IS_ACTIVE);
    }
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }
    public function getAvailableStatuses()
    {
        return [self::STATUS_PUBLISH => __('Publish'), self::STATUS_DRAFT => __('Draft'),self::STATUS_NONPUBLISH=>__('non-Publish')];
    }



}
