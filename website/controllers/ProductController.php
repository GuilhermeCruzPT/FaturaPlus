<?php

class ProductController extends BaseController
{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION["user_id"])) {
            if ($_SESSION["permission"] == 'c')
                header('Location: router.php?c=site&a=index');
        }
        else header('Location: router.php?c=auth&a=signin');
    }

    public function index()
    {
        if (isset($_POST[('search_btn')])){

            /* ╔═══════════════════════════╗ */
            /* ║     Barra de Pesquisa     ║ */
            /* ╚═══════════════════════════╝ */

            $search = $_POST['search'];
            $products = Product::find('all',
                array('conditions' => "reference LIKE '%$search%' 
                or description LIKE '%$search%'
                or price LIKE '%$search%'
                or stock LIKE '%$search%'
                or iva_id LIKE '%$search%'"));

            $this->renderViewBackend('products/index', [
                'products' => $products,
            ]);

        }else {
            $products = Product::all();
            $this->renderViewBackend('products/index', [
                'products' => $products,
            ]);
        }
    }

    public function create()
    {
        $iva = Iva::all();
        $this->renderViewBackend('products/create',[
            'iva' => $iva
        ]);
    }

    public function store()
    {
        $attributes = array(
            'reference' => $_POST['reference'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'stock' => ((int)$_POST['stock']),
            'iva_id' => $_POST['iva_id']);
        $products = new Product($attributes);
        $iva = Iva::all();
        if ($products->is_valid()) {
            $products->save();
            header('Location: router.php?c=products&a=index');
        } else {
            // *** Retorna os erros presentes no model *** \\

            //print_r($bills->errors->full_messages());

            $this->renderViewBackend('products/create', [
                'products' => $products,
                'iva' => $iva
            ]);
        }
    }

    public function edit($id)
    {
        $product = Product::find([$id]);
        $iva = Iva::all();
        if (is_null($product)) {
            header('Location: router.php?c=products&a=index');
        } else {
            $this->renderViewBackend('products/update', [
                'product' => $product,
                'iva' => $iva
            ]);
        }
    }

    public function update($id)
    {
        $iva = Iva::all();
        $product = Product::find([$id]);

        $attributes = array(
            'reference' => $_POST['reference'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'stock' => ((int)$_POST['stock']),
            'iva_id' => $_POST['iva_id']);
        $product->update_attributes($attributes);
        if($product->is_valid()){
            $product->save();
            header('Location: router.php?c=products&a=index');
        } else {
            //print_r($product->errors->full_messages());
            $this->renderViewBackend('products/update', [
                'product' => $product,
                'iva' => $iva
            ]);
        }
    }

    public function delete($id)
    {
        $product = Product::find([$id]);
        $product->delete();

        header('Location: router.php?c=products&a=index');
    }

    public function show($id)
    {
        $product = Product::find([$id]);
        if (is_null($product)) {
            header('Location: router.php?c=products&a=index');
        } else {
            $this->renderViewBackend('products/show', [
                'product' => $product,
            ]);
        }
    }
}