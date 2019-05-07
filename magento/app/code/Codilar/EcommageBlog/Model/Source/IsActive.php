<?php

namespace Codilar\EcommageBlog\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

class IsActive implements OptionSourceInterface
{

    protected $blogs;


    public function __construct(\Codilar\EcommageBlog\Model\Post $blogs)
    {
        $this->blogs = $blogs;
    }
    public function toOptionArray()
    {
        $availableOptions = $this->blogs->getAvailableStatuses();
        $options = [];

        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}




