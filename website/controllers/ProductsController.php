<?php

class ProductsController extends BaseController
{
    public function index()
    {

        if (isset($_POST[('search_btn')])){

            //barra de pesquisa

            $search = $_POST['search'];
            $products = Products::find('all',
                array('conditions' => "referencia LIKE '%$search%' 
                or descricao LIKE '%$search%'
                or preco LIKE '%$search%'
                or stock LIKE '%$search%'
                or vigor LIKE '%$search%'"));

            $this->renderViewBackend('products/index', [
                'products' => $products,
            ]);

        }else {
            $products = Products::all();
            $this->renderViewBackend('products/index', [
                'products' => $products,
            ]);
        }
    }

    public function create()
    {
        $this->renderViewBackend('products/create');
    }

    public function store()
    {

        $attributes = array('referencia' => $_POST['referencia'],
            'descricao' => $_POST['descricao'],
            'preco' => $_POST['preco'],
            'stock' => $_POST['stock'],
            'vigor' => $_POST['vigor']);
        $products = new Products($attributes);
        if ($products->is_valid()) {
            $products->save();
            header('Location: router.php?c=products&a=index');
        }else{
            //retorna os erros presentes no model

          

            print_r($products->errors->full_messages());

                $this->renderViewBackend('products/create', [
                    'products' => $products
                ]);

            //header('Location: router.php?c=products&a=create');
        }

    }

    public function edit($id_product)
    {
        $product = Products::find([$id_product]);
        if (is_null($product)) {
            header('Location: router.php?c=products&a=index');
        } else {
            $this->renderViewBackend('products/update', [
                'product' => $product,
            ]);
        }
    }

    public function update($id_product)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $product = Products::find([$id_product]);

        $attributes = array('referencia' => $_POST['referencia'],
            'descricao' => $_POST['descricao'],
            'preco' => $_POST['preco'],
            'stock' => $_POST['stock'],
            'vigor' => $_POST['vigor']);
        $product->update_attributes($attributes);
        if($product->is_valid()){
            $product->save();
            header('Location: router.php?c=products&a=index');
        } else {
            $this->renderView('products/update', [
                'product' => $product,
            ]);
        }
    }

    public function delete($id_product)
    {
        $product = Products::find([$id_product]);
        $product->delete();

        header('Location: router.php?c=products&a=index');
        //$this->renderView('product/index');

    }

    public function show($id_product)
    {

        $product = Products::find([$id_product]);
        if (is_null($product)) {
            header('Location: router.php?c=products&a=index');
        } else {
            $this->renderViewBackend('products/show', [
                'product' => $product,
            ]);


        }
    }

}