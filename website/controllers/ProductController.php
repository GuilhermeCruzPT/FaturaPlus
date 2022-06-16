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
                or title LIKE '%$search%'
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

        if (isset($_POST['reference'], $_POST['title'], $_POST['description'], $_POST['price'], $_POST['stock'], $_POST['iva_id'])) {

            if (isset($_GET[('p1')])) {

                $attributes_product = array(
                    'reference' => sprintf('%06d', $_POST['reference']),
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'price' => ((float)$_POST['price']),
                    'stock' => ((int)$_POST['stock']),
                    'iva_id' => $_POST['iva_id']);

                $products_array = unserialize($_POST['products_array']);

                $products = new Product($attributes_product);
                $iva = Iva::all();
                if ($products->is_valid()) {
                    $products->save();
                    header('Location: router.php?c=bills&a=index');
                } else {
                    // *** Retorna os erros presentes no model *** \\

                    //print_r($bills->errors->full_messages());

                    $this->renderViewBackend('bills/create', [
                        'products' => $products,
                        'iva' => $iva,
                        'attributes_product' => $attributes_product,
                        'products_array' => $products_array
                    ]);
                }


            }
            else {

                $attributes = array(
                    'reference' => sprintf('%06d', $_POST['reference']),
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'price' => ((float)$_POST['price']),
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
                        'iva' => $iva,
                        'attributes' => $attributes
                    ]);
                }
            }
        } else {
            if (isset($_GET[('p1')])) {
            $iva = Iva::all();
            $this->renderViewBackend('bills/create',[
                'iva' => $iva
            ]);
        }else{
                $iva = Iva::all();
                $this->renderViewBackend('products/create',[
                    'iva' => $iva
                ]);
            }}
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
        if (isset($_POST['reference'], $_POST['title'], $_POST['description'], $_POST['price'], $_POST['stock'], $_POST['iva_id'])) {
        $iva = Iva::all();
        $product = Product::find([$id]);

        $attributes = array(
            'reference' => sprintf('%06d', $_POST['reference']),
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'price' => ((float)$_POST['price']),
            'stock' => ((int)$_POST['stock']),
            'iva_id' => $_POST['iva_id']);



        $product_reference = Product::find('reference',array('conditions' => array('reference = ? ', $_POST['reference'])));

            //var_dump( $product_reference->reference);
        if ($product_reference->reference == $_POST['reference']) {
            $FiveDigitRandomNumber = rand(10000,99999);
            if ($_POST['reference'] == $FiveDigitRandomNumber){

                $FiveDigitRandomNumber2 = rand(10000,99999);

                $attributes['reference'] = $FiveDigitRandomNumber2;
                $product->update_attributes($attributes);
                if ($product->is_valid()) {

                    $attributes['reference'] = $product_reference->reference;
                    $product->update_attributes($attributes);
                    $product->save(false);

                    header('Location: router.php?c=products&a=index');
                } else {
                    $this->renderViewBackend('products/update', [
                        'product' => $product,
                        'iva' => $iva
                    ]);
                }
            }else {
                $attributes['reference'] = $FiveDigitRandomNumber;
                $product->update_attributes($attributes);
                if ($product->is_valid()) {

                    $attributes['reference'] = $product_reference->reference;
                    $product->update_attributes($attributes);
                    $product->save(false);

                    header('Location: router.php?c=products&a=index');
                } else {
                    $this->renderViewBackend('products/update', [
                        'product' => $product,
                        'iva' => $iva
                    ]);
                }
            }
        }else{
            if ($product->is_valid()) {

                $product->save();

                header('Location: router.php?c=products&a=index');
            } else {
                $this->renderViewBackend('products/update', [
                    'product' => $product,
                    'iva' => $iva
                ]);
            }
        }
        } else {
            $product = Product::find([$id]);
            $iva = Iva::all();
            $this->renderViewBackend('products/update',[
                'product' => $product,
                'iva' => $iva
            ]);
        }
    }

    public function delete($id)
    {
        // Faz o delete de varios registos de outras tabelas na base de dados

        $product = Product::find([$id]);
        Bill_line::delete_all(array('conditions' => array('product_id = ?', $id)));

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