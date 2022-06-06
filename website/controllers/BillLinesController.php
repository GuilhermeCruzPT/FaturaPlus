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

        if (isset($_POST['quantity'],$_POST['product_id'],$_POST['bill_id'])){

        $products = Product::all();
        $bills = Bill::all();
        $lines = Bill_line::all();

        if(((int)$_POST['quantity']) != 0 && ((int)$_POST['product_id']) != 0 && ((int)$_POST['bill_id']) != 0) {

            $product_id = Product::find_by_id(((int)$_POST['product_id']));
            $bill_id = Bill::find_by_id(((int)$_POST['bill_id']));

            $valorTotal = null;
            $valorIva = null;

            if (((int)$_POST['quantity']) <= ((int)$product_id->stock)) {

                $stock = (((int)$product_id->stock) - ((int)$_POST['quantity']));

                foreach ($lines as $line) {
                    if ($line->bill_id == $bill_id->id) {
                        $valorTotal += $line->unitary_value * $line->quantity;
                        $valorIva += $line->iva_value * $line->quantity;
                    }
                }

                $product = Product::find_by_id($_POST['product_id']);
                $iva = Iva::find_by_id($product->iva_id);

                $ivaEuro = ((float)$product->price) * floatval('0.' . $iva->percentage);
                $valorUni = ((float)$product->price) - ((float)$ivaEuro);

                $valorTotal += $valorUni * ((int)$_POST['quantity']);
                $valorIva += $ivaEuro * ((int)$_POST['quantity']);

                $attributes_bills = array(
                    'total_value' => ((float)$valorTotal),
                    'total_iva' => ((float)$valorIva));

                $attributes_lines = array(
                    'quantity' => ((int)$_POST['quantity']),
                    'unitary_value' => $valorUni,
                    'iva_value' => $ivaEuro,
                    'product_id' => $_POST['product_id'],
                    'bill_id' => $_POST['bill_id']
                );

                $attributes_products = array(
                    'stock' => $stock,
                );

                $bill = Bill::find([$_POST['bill_id']]);
                $bill->update_attributes($attributes_bills);
                $product->update_attributes($attributes_products);
                $bill_lines = new Bill_line($attributes_lines);
                if ($bill_lines->is_valid() && $bill->is_valid() && $product->is_valid()) {
                    $bill_lines->save();
                    $bill->save();
                    $product->save();
                    header('Location: router.php?c=lines&a=index');
                } else {
                    $this->renderViewBackend('lines/create', [
                        'bill_lines' => $bill_lines,
                        'products' => $products,
                        'bills' => $bills,
                    ]);
                }
            }
            else {
                $error_quantity = "Quantidate maior que o stock do Produto<br>";

                $attributes_lines = array(
                    'quantity' => ((int)$_POST['quantity']),
                    'product_id' => $_POST['product_id'],
                    'bill_id' => $_POST['bill_id']
                );

                $bill_lines = new Bill_line($attributes_lines);
                if ($bill_lines->is_valid()) {
                    $bill_lines->save();
                    header('Location: router.php?c=lines&a=index');
                } else {
                    $this->renderViewBackend('lines/create', [
                        'bill_lines' => $bill_lines,
                        'products' => $products,
                        'bills' => $bills,
                        'error_quantity' => $error_quantity,
                    ]);
                }
            }
        }
        else {
            $attributes_lines = array(
                'quantity' => ((int)$_POST['quantity']),
                'product_id' => $_POST['product_id'],
                'bill_id' => $_POST['bill_id']
            );

            $bill_lines = new Bill_line($attributes_lines);
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
        } else {
            $products = Product::all();
            $bills = Bill::all();
            $this->renderViewBackend('lines/create', [
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

        if ($bill_lines->bill->state == 'l') {
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
        else
            header('Location: router.php?c=lines&a=index');
    }

    public function update($id)
    {
        $products = Product::all();
        $bills = Bill::all();
        $lines = Bill_line::all();

        $product_id_new = Product::find_by_id(((int)$_POST['product_id']));
        $bill_line_old = Bill_line::find_by_id($id);
        $product_id_old = Product::find_by_id($bill_line_old->product_id);
        $bill_id = Bill::find_by_id($_POST['bill_id']);

        $valorTotal_new = null;
        $valorIva_new = null;
        $valorTotal_old = null;
        $valorIva_old = null;

        if (((int)$_POST['quantity']) <= ((int)$product_id_new->stock)) {

            if ($product_id_new->id != $product_id_old->id)
                $validation_product = true;
            else
                $validation_product = false;

            if ($bill_line_old->quantity != ((int)$_POST['quantity']))
                $validation_quantity = true;
            else
                $validation_quantity = false;

            if ($bill_id->id != $bill_line_old->bill_id)
                $validation_bill = true;
            else
                $validation_bill = false;

            if ($validation_product == true) {
                $stock_new = (((int)$product_id_new->stock) - ((int)$_POST['quantity']));
                $stock_old = (((int)$product_id_old->stock) + ((int)$bill_line_old->quantity));
            }
            else if ($validation_quantity == true) {
                $difference = ((int)$_POST['quantity']) - $bill_line_old->quantity;
                $stock_new = (((int)$product_id_new->stock) - $difference);
            }

            foreach ($lines as $line) {
                if ($line->bill_id == $bill_id->id || $line->id == $id) {
                    if ($line->id == $id && $validation_quantity == true){
                        $valorTotal_new += $line->unitary_value * ((int)$_POST['quantity']);
                        $valorIva_new += $line->iva_value * ((int)$_POST['quantity']);
                    }
                    else {
                        $valorTotal_new += $line->unitary_value * $line->quantity;
                        $valorIva_new += $line->iva_value * $line->quantity;
                    }
                }
            }

            if ($validation_bill == true){
                foreach ($lines as $line) {
                    if ($line->bill_id == $bill_line_old->bill_id) {
                        if ($line->id != $id) {
                            $valorTotal_old += $line->unitary_value * $line->quantity;
                            $valorIva_old += $line->iva_value * $line->quantity;
                        }
                    }
                }
            }

            $product = Product::find_by_id($_POST['product_id']);
            $iva = Iva::find_by_id($product->iva_id);

            $ivaEuro = ((float)$product->price) * floatval('0.' . $iva->percentage);
            $valorUni = ((float)$product->price) - ((float)$ivaEuro);

            $attributes_bills_new = array(
                'total_value' => ((float)$valorTotal_new),
                'total_iva' => ((float)$valorIva_new));

            if ($validation_bill == true) {
                $attributes_bills_old = array(
                    'total_value' => ((float)$valorTotal_old),
                    'total_iva' => ((float)$valorIva_old));
            }

            $attributes_lines = array(
                'quantity' => ((int)$_POST['quantity']),
                'unitary_value' => $valorUni,
                'iva_value' => $ivaEuro,
                'product_id' => $_POST['product_id'],
                'bill_id' => $_POST['bill_id']);

            if ($validation_product == true) {
                $attributes_products_new = array(
                    'stock' => $stock_new,
                );

                $attributes_products_old = array(
                    'stock' => $stock_old,
                );
            }
            else if ($validation_quantity == true) {
                $attributes_products_new = array(
                    'stock' => $stock_new,
                );
            }

            $bill_new = Bill::find([$_POST['bill_id']]);
            $bill_new->update_attributes($attributes_bills_new);
            if ($validation_bill == true) {
                $bill_old = Bill::find($bill_line_old->bill_id);
                $bill_old->update_attributes($attributes_bills_old);
            }
            $bill_lines = Bill_line::find([$id]);
            $bill_lines->update_attributes($attributes_lines);
            if ($validation_product == true) {
                $product_id_new->update_attributes($attributes_products_new);
                $product_id_old->update_attributes($attributes_products_old);
                if ($bill_lines->is_valid() && $bill_new->is_valid() && $product_id_new->is_valid() && $product_id_old->is_valid() && $validation_bill == false) {
                    $bill_lines->save();
                    $bill_new->save();
                    $product_id_new->save();
                    $product_id_old->save();
                    header('Location: router.php?c=lines&a=index');
                } else if ($bill_lines->is_valid() && $bill_new->is_valid() && $bill_old->is_valid() && $product_id_new->is_valid() && $product_id_old->is_valid() && $validation_bill == true) {
                    $bill_lines->save();
                    $bill_new->save();
                    $bill_old->save();
                    $product_id_new->save();
                    $product_id_old->save();
                    header('Location: router.php?c=lines&a=index');
                } else {
                    $this->renderViewBackend('lines/update', [
                        'bill_lines' => $bill_lines,
                        'products' => $products,
                        'bills' => $bills,
                    ]);
                }
            }
            else if ($validation_quantity == true) {
                var_dump("Hello");
                if (((int)$_POST['quantity']) != 0)
                    $product_id_new->update_attributes($attributes_products_new);
                if ($bill_lines->is_valid() && $bill_new->is_valid() && $product_id_new->is_valid() && $validation_bill == false) {
                    $bill_lines->save();
                    $bill_new->save();
                    $product_id_new->save();
                    header('Location: router.php?c=lines&a=index');
                } else if ($bill_lines->is_valid() && $bill_new->is_valid() && $bill_old->is_valid() && $product_id_new->is_valid() && $validation_bill == true) {
                    $bill_lines->save();
                    $bill_new->save();
                    $bill_old->save();
                    $product_id_new->save();
                    header('Location: router.php?c=lines&a=index');
                } else {
                    $this->renderViewBackend('lines/update', [
                        'bill_lines' => $bill_lines,
                        'products' => $products,
                        'bills' => $bills,
                    ]);
                }
            }
            else {
                if ($bill_lines->is_valid() && $bill_new->is_valid() && $validation_bill == false) {
                    $bill_lines->save();
                    $bill_new->save();
                    header('Location: router.php?c=lines&a=index');
                } else if ($bill_lines->is_valid() && $bill_new->is_valid() && $bill_old->is_valid() && $validation_bill == true) {
                    $bill_lines->save();
                    $bill_new->save();
                    $bill_old->save();
                    header('Location: router.php?c=lines&a=index');
                } else {
                    $this->renderViewBackend('lines/update', [
                        'bill_lines' => $bill_lines,
                        'products' => $products,
                        'bills' => $bills,
                    ]);
                }
            }
        }
        else {
            $error_quantity = "Quantidate maior que o stock do Produto<br>";

            $attributes_lines = array(
                'quantity' => ((int)$_POST['quantity']),
                'product_id' => $_POST['product_id'],
                'bill_id' => $_POST['bill_id']
            );

            $bill_lines = new Bill_line($attributes_lines);
            if ($bill_lines->is_valid()) {
                $bill_lines->save();
                header('Location: router.php?c=lines&a=index');
            } else {
                $this->renderViewBackend('lines/create', [
                    'bill_lines' => $bill_lines,
                    'products' => $products,
                    'bills' => $bills,
                    'error_quantity' => $error_quantity,
                ]);
            }
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