<?php 

namespace Application\Model\Product;

class ProductMapper
{
    protected $products ;

    public function __construct() {
        $data = [
            1 => [
                'id' => '1',
                'nom' => 'Machine à laver',
                'photo' => 'img1.jpg',
                'description' => 'Neuve',
                'prix' => '580',
            ],
            2 => [
                'id' => '2',
                'nom' => 'Oridnateur portable',
                'photo' => 'img1.jpg',
                'description' => 'Asus',
                'prix' => '800',
            ],
            3 => [
                'id' => '3',
                'nom' => 'Guitare',
                'photo' => 'img1.jpg',
                'description' => 'Très joli son',
                'prix' => '200',
            ],
        ] ;

        foreach ($data as $product_data) {
            $product = new Product();
            $product->setId($product_data['id'])
                ->setNom($product_data['nom'])
                ->setPhoto($product_data['photo'])
                ->setDescription($product_data['description'])
                ->setPrix($product_data['prix']) ;

            $this->products[] = $product;
        }
    }

    public function fetchAll()
    {
        return $this->products;
    }
}