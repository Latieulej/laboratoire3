<?php 

namespace Application\Model\Product;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\DbSelect;

class ProductMapper
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($pageNumber = 1, $count = null) 
    {
        $select = new Select($this->tableGateway->table);

        $paginatorAdapter = new DbSelect($select, $this->tableGateway->adapter, $this->tableGateway->getResultSetPrototype());

        $paginator = new Paginator($paginatorAdapter) ; 

        if ($count) {
            $paginator->setDefaultItemCountPerPage($count);
        }

        $paginator->setCurrentPageNumber($pageNumber);

        return $paginator;
    }

    public function getProduct($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        if (!$row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            )) ;
        }

        return $row;
    }


}