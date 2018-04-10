<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Product\Product;
use Application\Model\Product\ProductMapper;
use Application\Form\ProductForm; 

class ProductController extends AbstractActionController
{
    
    private $tableMapper;
    public function __construct(TableMapper $tableMapper)
    {
        $this->tableMapper = $tabletMapper;
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
    }

}