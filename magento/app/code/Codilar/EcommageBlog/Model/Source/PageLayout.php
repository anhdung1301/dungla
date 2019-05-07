<?php
namespace Codilar\EcommageBlog\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\View\Model\PageLayout\Config\BuilderInterface;


class PageLayout implements OptionSourceInterface
{

    protected $pageLayoutBuilder;

    protected $options;


    public function __construct(BuilderInterface $pageLayoutBuilder)
    {
        $this->pageLayoutBuilder = $pageLayoutBuilder;
    }


    public function toOptionArray()
    {
//        $configOptions = $this->pageLayoutBuilder->getPageLayoutsConfig()->getOptions();
//            var_dump($configOptions);die;
        $configOptions=array(
            1=>"publish",
            2=>"draft",
            3=>"non-publish"
        );
        $options = [];
        foreach ($configOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        $this->options = $options;

        return $options;
    }
}
