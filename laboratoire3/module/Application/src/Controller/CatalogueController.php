<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Product\ProductMapper;

class CatalogueController extends AbstractActionController
{

    private $productMapper;

    public function __construct(ProductMapper $productMapper)
    {
        $this->productMapper = $productMapper;
    }

    public function indexAction()
    {
        $pageNumber = (int) $this->params()->fromQuery('page',1);

        //Nombre de produit par page (pagination)
        $count = 10;

        $products = $this->productMapper->fetchAll($pageNumber, $count);

        return new ViewModel([
            'products' => $products,
        ]);
    }
}