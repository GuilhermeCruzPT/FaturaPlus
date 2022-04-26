<?php

require_once './models/Products.php';

class ProductsController
{
    public function index(){

        $products = new Products();
        $result = $products->getAll();
        require './views/products/index.php';

    }

    public function create(){
        // anida a trabalhar
    }

    public function update(){
        // anida a trabalhar
    }

    public function delete(){

$id_product = $_GET['id_product'];
if ($id_product){

    $products1 = new Products();
    $products1->delete_produto($id_product);

        header("Location: router.php?c=products&a=index");

}else{
    echo 'ocorreu um erro com o id';
    header("Location: router.php?c=products&a=index");

}

    }

}