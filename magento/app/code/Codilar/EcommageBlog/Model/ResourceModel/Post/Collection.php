<?php
namespace Codilar\EcommageBlog\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'blogs_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Codilar\EcommageBlog\Model\Post', 'Codilar\EcommageBlog\Model\ResourceModel\Post');
    }
//    protected function filterOrder()
//    {
//        $this->sales_order_table = "main_table";
//        $this->sales_order_payment_table = $this->getTable("customer_entity");
//        $this->getSelect()
//            ->join(array('customer_entity' =>$this->sales_order_payment_table), $this->sales_order_table . '.entity_id= payment.parent_id',
//                array('payment_method' => 'payment.method',
//                    'order_id' => $this->sales_order_table.'.entity_id'
//                )
//            );
//
//    }

}
