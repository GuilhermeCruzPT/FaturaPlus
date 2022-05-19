<?php

class UserController extends BaseController
{
    public function index()
    {

        if (isset($_POST[('search_btn')])){

            //barra de pesquisa

            $search = $_POST['search'];
            $users = User::find('all',
                array('conditions' => "referencia LIKE '%$search%' 
                or username LIKE '%$search%'
                or password LIKE '%$search%'
                or image LIKE '%$search%'
                or name LIKE '%$search%'
                or email LIKE '%$search%'
                or phone LIKE '%$search%'
                or nif LIKE '%$search%'
                or postal_code LIKE '%$search%'
                or birth LIKE '%$search%'
                or genre LIKE '%$search%'
                or coutry LIKE '%$search%'
                or city LIKE '%$search%'
                or locale LIKE '%$search%'
                or address LIKE '%$search%'
                or role LIKE '%$search%'"));

            $this->renderViewBackend('users/index', [
                'users' => $users,
            ]);

        }else {
            $users = User::all();
            $this->renderViewBackend('users/index', [
                'users' => $users,
            ]);
        }
    }

    public function create()
    {
        $this->renderViewBackend('users/create');
    }

    public function store()
    {

        $attributes = array('reference' => $_POST['reference'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'stock' => $_POST['stock'],
            'iva_id' => $_POST['iva_id']);
        $products = new Product($attributes);
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

    public function edit($id)
    {
        $product = Product::find([$id]);
        if (is_null($product)) {
            header('Location: router.php?c=products&a=index');
        } else {
            $this->renderViewBackend('products/update', [
                'product' => $product,
            ]);
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $product = Product::find([$id]);

        $attributes = array('reference' => $_POST['reference'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'stock' => $_POST['stock'],
            'iva_id' => $_POST['iva_id']);
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

    public function delete($id)
    {
        $product = Product::find([$id]);
        $product->delete();

        header('Location: router.php?c=products&a=index');
        //$this->renderView('product/index');

    }

    public function show($id_product)
    {

        $product = Product::find([$id_product]);
        if (is_null($product)) {
            header('Location: router.php?c=products&a=index');
        } else {
            $this->renderViewBackend('products/show', [
                'product' => $product,
            ]);


        }
    }

}