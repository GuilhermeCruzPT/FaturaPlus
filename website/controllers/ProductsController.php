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
        require './views/products/create.php';
    }

    public function save(){

        $referencia = $_POST['referencia'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $stock = $_POST['stock'];
        $vigor = $_POST['vigor'];

        $products = new Products();
        $result = $products->create_produto($referencia,$descricao,$preco,$stock,$vigor);

        if ($result){

                //require 'Location: router.php?c=products&a=index';
                //require_once $_SERVER['DOCUMENT_ROOT'] . 'website/router.php?c=products&a=index';
                header('Location: router.php?c=products&a=index');

        }else{
            header('Location: router.php?c=products&a=create');
        }


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