<?php 

namespace Application\Model\Product;

use Zend\Db\TableGateway\TableGateway;

class ProductMapper
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() 
    {
        return $this->tableGateway->select() ;
    }


}