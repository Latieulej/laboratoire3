<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Product\Product;
use Application\Model\Product\ProductMapper;
use Application\Form\ProductForm; 

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

    // Afficher la fiche d'un produit 
    public function getAction()
    {
        $id = (int) $this->params()->fromRoute('id',0); // Récupère l'id dans l'URL

        $product = $this->productMapper->getProduct($id) ; 

        return new ViewModel([
            'product' => $product,
        ]) ;
    }
    public function addAction()
    {
        $form = new ProductForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $product = new Product();
            $form->setInputFilter($product->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $product->exchangeArray($form->getData());
                $this->getProductTable()->saveProduct($product);

                // Redirect to list of products
                return $this->redirect()->toRoute('catalogue');
            }

    }
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('catalogue', array(
                'action' => 'add'
            ));
        }

        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $product = $this->getProductTable()->getProduct($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('catalogue', array(
                'action' => 'index'
            ));
        }

        $form  = new AlbumForm();
        $form->bind($product);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($product->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getProductTable()->saveProduct($product);

                // Redirect to list of albums
                return $this->redirect()->toRoute('product');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('product');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getProductTable()->deleteProduct($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('product');
         }

         return array(
             'id'    => $id,
             'product' => $this->getProductTable()->getProduct($id)
         );
    }

}