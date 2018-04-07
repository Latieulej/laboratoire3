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
        $products = $this->productMapper->fetchAll();

        return new ViewModel([
            'products' => $products,
        ]);
    }
}