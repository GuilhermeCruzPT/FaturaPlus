<?php

class BillLinesController extends BaseController
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
        if (isset($_POST[('search_btn')])) {

            /* ╔═══════════════════════════╗ */
            /* ║     Barra de Pesquisa     ║ */
            /* ╚═══════════════════════════╝ */

            $search = $_POST['search'];
            $bill_lines = Bill_line::find('all',
                array('conditions' => "quantity LIKE '%$search%' 
                or unitary_value LIKE '%$search%'
                or iva_value LIKE '%$search%'
                or product_id LIKE '%$search%'
                or bill_id LIKE '%$search%'"));

            $this->renderViewBackend('lines/index', [
                'bill_lines' => $bill_lines,
            ]);

        } else {
            $bill_lines = Bill_line::all();
            $this->renderViewBackend('lines/index', [
                'bill_lines' => $bill_lines,
            ]);
        }
    }

    public function create()
    {
        $products = Product::all();
        $bills = Bill::all();
        $this->renderViewBackend('lines/create', [
            'products' => $products,
            'bills' => $bills,
        ]);
    }

    public function store()
    {
        $products = Product::all();
        $bills = Bill::all();

        if (!isset($_POST['quantity']) && !isset($_POST['product_id']) && !isset($_POST['bill_id'])) {
            $product = Product::find_by_id($_POST['product_id']);
            $iva = Iva::find_by_id($product->iva_id);

            $ivaEuro = ((float)$product->price) * floatval('0.' . $iva->percentage);
            $valorUni = ((float)$product->price) - ((float)$ivaEuro);

            $attributes = array(
                'quantity' => ((int)$_POST['quantity']),
                'unitary_value' => $valorUni,
                'iva_value' => $ivaEuro,
                'product_id' => $_POST['product_id'],
                'bill_id' => $_POST['bill_id']
            );
        }
        else {
            $attributes = array(
                'quantity' => ((int)$_POST['quantity']),
                'product_id' => $_POST['product_id'],
                'bill_id' => $_POST['bill_id']
            );
        }

        $bill_lines = new Bill_line($attributes);
        if ($bill_lines->is_valid()) {
            $bill_lines->save();
            header('Location: router.php?c=lines&a=index');
        } else {
            $this->renderViewBackend('lines/create', [
                'bill_lines' => $bill_lines,
                'products' => $products,
                'bills' => $bills,

            ]);
        }
    }

    public function edit($id)
    {
        $products = Product::all();
        $bills = Bill::all();
        $bill_lines = Bill_line::find([$id]);

        if (is_null($bill_lines)) {
            header('Location: router.php?c=lines&a=index');
        } else {
            $this->renderViewBackend('lines/update', [
                'bill_lines' => $bill_lines,
                'products' => $products,
                'bills' => $bills,
            ]);
        }
    }

    public function update($id)
    {
        $products = Product::all();
        $bills = Bill::all();

        $product = Product::find_by_id($_POST['product_id']);
        $iva = Iva::find_by_id($product->iva_id);

        $ivaEuro = ((float)$product->price)*floatval('0.'.$iva->percentage);
        $valorUni = ((float)$product->price)-((float)$ivaEuro);

        $attributes = array(
            'quantity' => ((int)$_POST['quantity']),
            'unitary_value' => $valorUni,
            'iva_value' => $ivaEuro,
            'product_id' => $_POST['product_id'],
            'bill_id' => $_POST['bill_id']);

        $bill_lines = Bill_line::find([$id]);
        $bill_lines->update_attributes($attributes);
        if ($bill_lines->is_valid()) {
            $bill_lines->save();
            header('Location: router.php?c=lines&a=index');
        } else {
            $this->renderViewBackend('lines/update', [
                'bill_lines' => $bill_lines,
                'products' => $products,
                'bills' => $bills,

            ]);
        }
    }

    public function delete($id)
    {
        $bill_lines = Bill_line::find([$id]);
        $bill_lines->delete();

        header('Location: router.php?c=lines&a=index');
    }

    public function show($id)
    {
        $bill_lines = Bill_line::find([$id]);
        if (is_null($bill_lines)) {
            header('Location: router.php?c=lines&a=index');
        } else {
            $this->renderViewBackend('lines/show', [
                'bill_lines' => $bill_lines,
            ]);
        }
    }


}