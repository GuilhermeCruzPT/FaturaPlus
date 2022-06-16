<?php

// Include autoloader
require_once '../vendor/dompdf/autoload.inc.php';

// Reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

class BillController extends BaseController
{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION["user_id"])) {
            if ($_SESSION["permission"] == 'c')
                header('Location: router.php?c=site&a=index');
        } else header('Location: router.php?c=auth&a=signin');
    }

    public function index()
    {
        if (isset($_POST[('search_btn')])) {

            /* ╔═══════════════════════════╗ */
            /* ║     Barra de Pesquisa     ║ */
            /* ╚═══════════════════════════╝ */

            $search = $_POST['search'];
            $bills = Bill::find('all',
                array('conditions' => "reference LIKE '%$search%'
                or date LIKE '%$search%'
                or total_value LIKE '%$search%'
                or total_iva LIKE '%$search%'
                or state LIKE '%$search%'
                or client_reference_id LIKE '%$search%'
                or employee_reference_id LIKE '%$search%'"));

            $this->renderViewBackend('bills/index', [
                'bills' => $bills,
            ]);

        } else if(isset($_GET[('state')])){

            $state = $_GET['state'];
            $bills = Bill::find('all',
                array('conditions' => "state LIKE '%$state%'"));

            $this->renderViewBackend('bills/index', [
                'bills' => $bills,
            ]);
        } else {
            $bills = Bill::all();
            $this->renderViewBackend('bills/index', [
                'bills' => $bills,
            ]);
        }
    }

    public function create()
    {
        if (empty($products_array)) {
            $products_array = [];
            /* fake data
                 $products_array = [
                 ['quantity' => 'quantity1', 'unitary_value' => 'valor1', 'iva_value' => 'iva_id1', 'product_id' => 'product1', 'bill_id' => 'fica vazio por enquanto'],
                 ['quantity' => 'quantity2', 'unitary_value' => 'valor2', 'iva_value' => 'iva_id2', 'product_id' => 'product2', 'bill_id' => 'fica vazio por enquanto'],
                 ['quantity' => 'quantity3', 'unitary_value' => 'valor3', 'iva_value' => 'iva_id3', 'product_id' => 'product3', 'bill_id' => 'fica vazio por enquanto']
             ];*/
            if (isset($_POST['btn_adicionar'])) {

                if ($_POST['product_id'] != null) {

                    $client_i = $_POST['client_id'];
                    if ($client_i != 0) {

                        $product = $_POST['product_id'];
                        $products_array = unserialize($_POST['products_array']);
                        $product_one = Product::find_by_id($product);
                        $product_iva = Iva::find_by_id($product_one->iva_id);
                        $users = User::all();
                        $products = Product::all();
                        $ivas = Iva::all();

                        if (!$products_array) {
                            $attributes = array(
                                'id' => 0,
                                'quantity' => 1,
                                'unitary_value' => $product_one->price,
                                'product_id' => $product_one->id,
                                'iva_value' => $product_iva->percentage);
                            array_push($products_array, $attributes);
                            $this->renderViewBackend('bills/create', [
                                'users' => $users,
                                'products' => $products,
                                'products_array' => $products_array,
                                'ivas' => $ivas,
                                'client_i' => $client_i
                            ]);
                        } elseif (array_search($product, array_column($products_array, 'product_id')) !== false) {
                            $product_price = Product::find('iva_id', array('conditions' => array('id = ?', $product)));
                            $product_iva = Iva::find('percentage', array('conditions' => array('id = ?', $product_price->iva_id)));
                            $product_stock = Product::find('stock', array('conditions' => array('id = ?', $product)));

                            foreach ($products_array as $array) {
                                $id = $array['id'];

                                if ($array['product_id'] == $product) {

                                    $quantidade_product = $array['quantity'];
                                    $price_product = $array['unitary_value'];
                                    $iva_product = $array['iva_value'];
                                    if ($quantidade_product <= $product_stock->stock) {
                                        $mensagem = "Último produto! Stock indisponivel";
                                    } else {
                                        $products_array[$id]['quantity'] = $quantidade_product + 1;
                                        $products_array[$id]['unitary_value'] = $price_product + $product_price->price;
                                        $products_array[$id]['iva_value'] = $iva_product + $product_iva->percentage;
                                    }
                                }

                            }
                            if (isset($mensagem)) {
                                $client_i = $_POST['client_id'];

                                $this->renderViewBackend('bills/create', [
                                    'users' => $users,
                                    'products' => $products,
                                    'products_array' => $products_array,
                                    'client_i' => $client_i,
                                    'ivas' => $ivas,
                                    'mensagem' => $mensagem
                                ]);
                            } else {
                                $client_i = $_POST['client_id'];

                                $this->renderViewBackend('bills/create', [
                                    'users' => $users,
                                    'products' => $products,
                                    'products_array' => $products_array,
                                    'client_i' => $client_i,
                                    'ivas' => $ivas
                                ]);
                            }
                        } else {
                            $client_i = $_POST['client_id'];

                            foreach ($products_array as $array) {
                                $id = $array['id'];
                            }


                            $attributes = array(
                                'id' => $id + 1,
                                'quantity' => 1,
                                'unitary_value' => $product_one->price,
                                'product_id' => $product_one->id,
                                'iva_value' => $product_iva->percentage);
                            array_push($products_array, $attributes);

                            $this->renderViewBackend('bills/create', [
                                'users' => $users,
                                'products' => $products,
                                'products_array' => $products_array,
                                'client_i' => $client_i,
                                'ivas' => $ivas
                            ]);

                        }
                    } else {
                        $client_i = null;
                        $products_array = null;
                        $users = User::all();
                        $products = Product::all();
                        $ivas = Iva::all();

                        $this->renderViewBackend('bills/create', [
                            'users' => $users,
                            'products' => $products,
                            'products_array' => $products_array,
                            'client_i' => $client_i,
                            'ivas' => $ivas
                        ]);
                    }

                } else {
                    $client_i = $_POST['client_id'];
                    $products_array = null;
                    $users = User::all();
                    $products = Product::all();
                    $ivas = Iva::all();
                    $products_array = unserialize($_POST['products_array']);
                    $this->renderViewBackend('bills/create', [
                        'users' => $users,
                        'products' => $products,
                        'products_array' => $products_array,
                        'client_i' => $client_i,
                        'ivas' => $ivas
                    ]);

                }
            } elseif (isset($_POST['btn_apagar'])) {
                $products_array = unserialize($_POST['products_array']);
                $key2 = $_POST['btn_apagar'];
                $client_i = $_POST['client_id'];

                if (array_key_exists($key2, $products_array)) {

                    unset($products_array[$key2]);
                    //var_dump($key2);
                    $users = User::all();
                    $products = Product::all();
                    $ivas = Iva::all();
                    $this->renderViewBackend('bills/create', [
                        'users' => $users,
                        'products' => $products,
                        'products_array' => $products_array,
                        'client_i' => $client_i,
                        'ivas' => $ivas
                    ]);

                } else {
                    $client_i = $_POST['client_id'];
                    $users = User::all();
                    $products = Product::all();
                    $ivas = Iva::all();
                    $this->renderViewBackend('bills/create', [
                        'users' => $users,
                        'products' => $products,
                        'products_array' => $products_array,
                        'client_i' => $client_i,
                        'ivas' => $ivas
                    ]);
                }
                /*
                        if ((($key = array_search($key2, array_column($products_array, 'product_id'))) !== false)) {
                            //unset($products_array[$key]);
                            $count = array_count_values(array_column($products_array, 'product_id'))[$key2];
                            unset($products_array[$key]);
                            if ($count != 0) {
                                unset($products_array[$key]);
                            }



                            $users = User::all();
                            $products = Product::all();
                            $ivas = Iva::all();
                            $this->renderViewBackend('bills/create', [
                                'users' => $users,
                                'products' => $products,
                                'products_array' => $products_array,
                                'ivas' => $ivas
                            ]);


                        } else {
                var_dump('ds');
                            /*$users = User::all();
                            $products = Product::all();
                            $ivas = Iva::all();
                            $this->renderViewBackend('bills/create', [
                                'users' => $users,
                                'products' => $products,
                                'products_array' => $products_array,
                                'ivas' => $ivas
                            ]);
                        }*/
            } elseif (isset($_POST['btn_adicionar_client'])) {

                $client_i = $_POST['client_id'];
                //var_dump($client_i);
                $users = User::all();
                $products = Product::all();
                $ivas = Iva::all();
                $this->renderViewBackend('bills/create', [
                    'users' => $users,
                    'products' => $products,
                    'products_array' => $products_array,
                    'client_i' => $client_i,
                    'ivas' => $ivas
                ]);

            } elseif (isset($_POST['btn_apagar_client'])) {

                $client_i = null;
                $users = User::all();
                $products = Product::all();
                $ivas = Iva::all();
                $this->renderViewBackend('bills/create', [
                    'users' => $users,
                    'products' => $products,
                    'products_array' => $products_array,
                    'client_i' => $client_i,
                    'ivas' => $ivas
                ]);

            } elseif (isset($_POST['emitir_fatura'])) {

                $products_array = unserialize($_POST['products_array']);

                $client_i = $_POST['client_id'];
                $data = date('Y-m-d');
                $total_value = $_POST['total'];
                $iva_total = $_POST['iva_total'];
                $emissao = 'e';
                $referencia_empregado = $_SESSION["user_id"];


                $bill_id = Bill::find('last');

                if ($bill_id == '') {
                    $bill_id_new = 1;
                } else {
                    $bill_id = Bill::find('last');
                    $bill_id_new = $bill_id->reference + 1;
                }
                $count = mb_strlen((string)$bill_id_new);
                if ($count = 1) {
                    $bill_id_new = '0000' . $bill_id_new;
                } elseif ($count = 2) {
                    $bill_id_new = '000' . $bill_id_new;
                } elseif ($count = 3) {
                    $bill_id_new = '00' . $bill_id_new;
                } elseif ($count = 4) {
                    $bill_id_new = '0' . $bill_id_new;
                }

                $attributes = array(
                    'reference' => $bill_id_new,
                    'date' => $data,
                    'total_value' => $total_value,
                    'total_iva' => $iva_total,
                    'state' => $emissao,
                    'client_reference_id' => $client_i,
                    'employee_reference_id' => $referencia_empregado);

                $bills = new Bill($attributes);

                if ($bills->is_valid()) {
                    $bills->save();

                    $bills_find = Bill::find('id', array('conditions' => array('date = ? AND total_value = ? AND total_iva = ? AND state = ? AND client_reference_id = ? AND employee_reference_id = ?', $data, $total_value, $iva_total,
                        $emissao, $client_i, $referencia_empregado)));

                    foreach ($products_array as $products_array2) {

                        $attributes_lines = array(
                            'quantity' => $products_array2['quantity'],
                            'unitary_value' => $products_array2['unitary_value'],
                            'iva_value' => $products_array2['iva_value'],
                            'product_id' => $products_array2['product_id'],
                            'bill_id' => $bills_find->id
                        );

                        $bills_lines = new Bill_line($attributes_lines);

                        $bills_lines->save();

                        $product = Product::find([$products_array2['product_id']]);

                        $new_stock = $product->stock - $products_array2['quantity'];

                        $attributes = array(
                            'reference' => $product->reference,
                            'title' => $product->title,
                            'description' => $product->description,
                            'price' => $product->price,
                            'stock' => (int)$new_stock,
                            'iva_id' => $product->iva_id);

                        $product->update_attributes($attributes);
                        $product->save(false);

                    }
                    $mensagem_sucesso = "Fatura emitida com sucesso";

                    $client_i = null;
                    $products_array = [];
                    $users = User::all();
                    $products = Product::all();
                    $ivas = Iva::all();
                    $this->renderViewBackend('bills/create', [
                        'users' => $users,
                        'products' => $products,
                        'products_array' => $products_array,
                        'client_i' => $client_i,
                        'ivas' => $ivas,
                        'mensagem_sucesso' => $mensagem_sucesso
                    ]);

                } else {
                    print_r($bills->errors->full_messages());
                }

            } elseif (isset($_POST['guardar_fatura'])) {

                $products_array = unserialize($_POST['products_array']);

                $client_i = $_POST['client_id'];
                $data = date('Y-m-d');
                $total_value = $_POST['total'];
                $iva_total = $_POST['iva_total'];
                $emissao = 'l';
                $referencia_empregado = $_SESSION["user_id"];


                $bill_id = Bill::find('last');

                if ($bill_id == '') {
                    $bill_id_new = 1;
                } else {
                    $bill_id = Bill::find('last');
                    $bill_id_new = $bill_id->reference + 1;
                }
                $count = mb_strlen((string)$bill_id_new);
                if ($count = 1) {
                    $bill_id_new = '0000' . $bill_id_new;
                } elseif ($count = 2) {
                    $bill_id_new = '000' . $bill_id_new;
                } elseif ($count = 3) {
                    $bill_id_new = '00' . $bill_id_new;
                } elseif ($count = 4) {
                    $bill_id_new = '0' . $bill_id_new;
                }


                $attributes = array(
                    'reference' => $bill_id_new,
                    'date' => $data,
                    'total_value' => $total_value,
                    'total_iva' => $iva_total,
                    'state' => $emissao,
                    'client_reference_id' => $client_i,
                    'employee_reference_id' => $referencia_empregado);
                $bills = new Bill($attributes);

                if ($bills->is_valid()) {
                    $bills->save();

                    $bills_find = Bill::find('id', array('conditions' => array('date = ? AND total_value = ? AND total_iva = ? AND state = ? AND client_reference_id = ? AND employee_reference_id = ?', $data, $total_value, $iva_total,
                        $emissao, $client_i, $referencia_empregado)));


                    foreach ($products_array as $products_array2) {

                        $attributes_lines = array(
                            'quantity' => $products_array2['quantity'],
                            'unitary_value' => $products_array2['unitary_value'],
                            'iva_value' => $products_array2['iva_value'],
                            'product_id' => $products_array2['product_id'],
                            'bill_id' => $bills_find->id
                        );
                        $bills_lines = new Bill_line($attributes_lines);

                        $bills_lines->save();

                    }
                    $mensagem_sucesso = "Fatura guardada com sucesso";

                    $client_i = null;
                    $products_array = [];
                    $users = User::all();
                    $products = Product::all();
                    $ivas = Iva::all();
                    $this->renderViewBackend('bills/create', [
                        'users' => $users,
                        'products' => $products,
                        'products_array' => $products_array,
                        'client_i' => $client_i,
                        'ivas' => $ivas,
                        'mensagem_sucesso' => $mensagem_sucesso
                    ]);

                } else {
                    // referencia está estatica por enquanto
                    print_r($bills->errors->full_messages());
                }

            } elseif (isset($_POST['btn_add'])) {

                $product1 = $_POST['btn_add'];
                $products_array = unserialize($_POST['products_array']);

                if (array_search($product1, array_column($products_array, 'product_id')) !== false) {

                    $product_price1 = Product::find('iva_id', array('conditions' => array('id = ?', $product1)));
                    $product_iva1 = Iva::find('percentage', array('conditions' => array('id = ?', $product_price1->iva_id)));
                    $product_stock = Product::find('stock', array('conditions' => array('id = ?', $product1)));

                    foreach ($products_array as $array) {
                        $id = $array['id'];

                        if ($array['product_id'] == $product1) {

                            $quantidade_product = $array['quantity'];
                            $price_product = $array['unitary_value'];
                            $iva_product = $array['iva_value'];

                            if ($quantidade_product == $product_stock->stock) {
                                $mensagem = "Último produto! Stock indisponivel";
                            } else {

                                $products_array[$id]['quantity'] = $quantidade_product + 1;
                                $products_array[$id]['unitary_value'] = $price_product + $product_price1->price;
                                $products_array[$id]['iva_value'] = $iva_product + $product_iva1->percentage;
                            }
                        }

                    }

                    if (isset($mensagem)) {
                        $client_i = $_POST['client_id'];

                        $users = User::all();
                        $products = Product::all();
                        $ivas = Iva::all();

                        $this->renderViewBackend('bills/create', [
                            'users' => $users,
                            'products' => $products,
                            'products_array' => $products_array,
                            'client_i' => $client_i,
                            'ivas' => $ivas,
                            'mensagem' => $mensagem
                        ]);
                    } else {
                        $client_i = $_POST['client_id'];

                        $users = User::all();
                        $products = Product::all();
                        $ivas = Iva::all();

                        $this->renderViewBackend('bills/create', [
                            'users' => $users,
                            'products' => $products,
                            'products_array' => $products_array,
                            'client_i' => $client_i,
                            'ivas' => $ivas
                        ]);
                    }
                } else {

                }

            } elseif (isset($_POST['btn_delete'])) {

                $product1 = $_POST['btn_delete'];
                $products_array = unserialize($_POST['products_array']);

                if (array_search($product1, array_column($products_array, 'product_id')) !== false) {

                    $product_price1 = Product::find('iva_id', array('conditions' => array('id = ?', $product1)));

                    $product_iva1 = Iva::find('percentage', array('conditions' => array('id = ?', $product_price1->iva_id)));

                    foreach ($products_array as $array) {
                        $id = $array['id'];

                        if ($array['product_id'] == $product1) {

                            $quantidade_product = $array['quantity'];
                            $price_product = $array['unitary_value'];
                            $iva_product = $array['iva_value'];
                            $products_array[$id]['quantity'] = $quantidade_product - 1;
                            $products_array[$id]['unitary_value'] = $price_product - $product_price1->price;
                            $products_array[$id]['iva_value'] = $iva_product - $product_iva1->percentage;
                            if ($products_array[$id]['quantity'] == 0) {
                                unset($products_array[$id]);
                            }
                        }
                    }

                    $client_i = $_POST['client_id'];

                    $users = User::all();
                    $products = Product::all();
                    $ivas = Iva::all();

                    $this->renderViewBackend('bills/create', [
                        'users' => $users,
                        'products' => $products,
                        'products_array' => $products_array,
                        'client_i' => $client_i,
                        'ivas' => $ivas
                    ]);
                } else {

                }

            } else {
                $users = User::all();
                $products = Product::all();
                $ivas = Iva::all();
                $this->renderViewBackend('bills/create', [
                    'users' => $users,
                    'products' => $products,
                    'products_array' => $products_array,
                    'ivas' => $ivas
                ]);
            }
        } else {
            $products_array = [];
            $client_i = $_POST['client_id'];
            $ivas = Iva::all();
            $users = User::all();
            $products = Product::all();
            $this->renderViewBackend('bills/create', [
                'users' => $users,
                'products' => $products,
                'products_array' => $products_array,
                'client_i' => $client_i,
                'ivas' => $ivas
            ]);
        }
    }

    public function store()
    {
        if (isset($_POST['reference'], $_POST['state'], $_POST['client_reference_id'], $_POST['employee_reference_id'])) {

            $attributes = array(
                'reference' => sprintf('%06d', $_POST['reference']),
                'date' => date('d-m-Y'),
                'total_value' => 0,
                'total_iva' => 0,
                'state' => $_POST['state'],
                'client_reference_id' => $_POST['client_reference_id'],
                'employee_reference_id' => $_POST['employee_reference_id']);
            $bills = new Bill($attributes);
            $users = User::all();
            if ($bills->is_valid()) {
                $bills->save();
                header('Location: router.php?c=bills&a=index');
            } else {
                // *** Retorna os erros presentes no model *** \\

                //print_r($bills->errors->full_messages());

                $this->renderViewBackend('bills/create', [
                    'bills' => $bills,
                    'users' => $users,
                    'attributes' => $attributes
                ]);
            }
        } else {
            $users = User::all();
            $this->renderViewBackend('bills/create', [
                'users' => $users
            ]);
        }
    }

    public function edit($id)
    {
        $bill = Bill::find([$id]);
        $user = User::all();

        if ($bill->state == 'l') {
            if (is_null($bill)) {
                header('Location: router.php?c=bills&a=index');
            } else {
                $this->renderViewBackend('bills/update', [
                    'bill' => $bill,
                    'user' => $user
                ]);
            }
        } else
            header('Location: router.php?c=bills&a=index');
    }

    public function update($id)
    {

        if (isset($_POST['reference'], $_POST['state'], $_POST['client_reference_id'], $_POST['employee_reference_id'])) {
            if ( $_POST['state'] == 'e') {
                $bill = Bill::find([$id]);

                $bill_line = Bill_line::find('all', array('conditions' => array('bill_id = ?', $bill->id)));
                $totalCost = 0;
                $totalIva = 0;
                foreach ($bill_line as $bill_line1) {

                    $totalCost += $bill_line1->unitary_value;
                    $totalIva += $bill_line1->iva_value;

                }

                $attributes = array(
                    'reference' => $_POST['reference'],
                    'date' => date('Y-m-d'),
                    'total_value' => $totalCost,
                    'total_iva' => $totalIva,
                    'state' => $_POST['state'],
                    'client_reference_id' => $_POST['client_reference_id'],
                    'employee_reference_id' => $_POST['employee_reference_id']

                );

                $bill->update_attributes($attributes);
                if ($bill->is_valid()) {
                    $bill->save();
                    header('Location: router.php?c=bills&a=index');
                } else {
                    $this->renderViewBackend('bills/', [
                        'bill' => $bill,
                    ]);
                }
            }else{
                $bill = Bill::find([$id]);

                $attributes = array(
                    'reference' => $_POST['reference'],
                    'date' => date('Y-m-d'),
                    'total_value' => $bill->total_value,
                    'total_iva' => $bill->total_iva,
                    'state' => $_POST['state'],
                    'client_reference_id' => $_POST['client_reference_id'],
                    'employee_reference_id' => $_POST['employee_reference_id']

                );

                $bill->update_attributes($attributes);
                if ($bill->is_valid()) {
                    $bill->save();
                    header('Location: router.php?c=bills&a=index');
                } else {
                    $this->renderViewBackend('bills/', [
                        'bill' => $bill,
                    ]);
                }

            }

    }}

    public function delete($id)
    {
        // Faz o delete de varios registos de outras tabelas na base de dados

        $bill = Bill::find([$id]);
        Bill_line::delete_all(array('conditions' => array('bill_id  = ?', $id)));
        $bill->delete();

        header('Location: router.php?c=bills&a=index');
    }

    public function show($id)
    {
        $bill = Bill::find([$id]);
        if (is_null($bill)) {
            header('Location: router.php?c=bills&a=index');
        } else {
            $this->renderViewBackend('bills/show', [
                'bill' => $bill,
            ]);
        }
    }

    public function pdfshow($id)
    {
        $bill = Bill::find([$id]);

        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);

        // Instantiate and use the dompdf class
        $dompdf = new Dompdf($options);

        // Fatura em Html
        $html = $this->pdf($bill);

        // Load HTML content
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('F' . $bill->reference . ' - ' . APP_NAME, ["Attachment" => false]);
    }

    public function pdftrans($id)
    {
        $bill = Bill::find([$id]);

        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);

        // Instantiate and use the dompdf class
        $dompdf = new Dompdf($options);

        // Fatura em Html
        $html = $this->pdf($bill);

        // Load HTML content
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('F' . $bill->reference . ' - ' . APP_NAME, ["Attachment" => true]);
    }

    public function pdf($bill)
    {
        $enterprise = Enterprise::all([1]);
        $lines = Bill_line::all();
        $client = User::find_by_id($bill->client_reference_id);
        $employee = User::find_by_id($bill->employee_reference_id);

        $html = '<style>
        * {box-sizing: border-box;}
        table {width: 100%;}
        .invoice {padding: 2rem;}
        .invoice__header {border-bottom: 4px solid black;padding-bottom: 1rem;}
        .invoice__header:before, .invoice__header:after {content: " ";display: table;}
        .invoice__header:after {clear: both;}
        .invoice__header-item {width: 25%;float: left;padding: 0 0.5rem;}
        .invoice__body {padding: 1rem 0;border-bottom: 2px solid black;}
        .invoice__body thead {font-weight: bold;}
        .invoice__body thead td {padding-bottom: 1rem;}
        .invoice__body td {padding: 0 0.5rem;}
        .invoice__totals {width: 25%;float: right;}
        .invoice__subtotals, .invoice__grandtotal {padding: 1rem 0.5rem;}
        .invoice__subtotals {border-bottom: 4px solid black;}
        .invoice__grandtotal {font-size: 150%;font-weight: bold;}
        .text-right {text-align: right;}
        .lg-img{width: 80%;}
        </style>';
        $html .= '<div class="invoice">';
        $html .= '<header class="invoice__header">';
        $html .= '<div class="invoice__header-item"><img src="' . DIRIMG . 'FaturaPlus_Oficial.png" class="lg-img"></div>';
        $html .= '<div class="invoice__header-item">';
        $html .= '<p>';
        $html .= '<strong>Empresa</strong><br>';
        $html .= '<br>E-mail: ' . $enterprise->email;
        $html .= '<br>Telefone: ' . $enterprise->phone;
        $html .= '<br>Nif: ' . $enterprise->nif;
        $html .= '<br>Código Postal: ' . $enterprise->postal_code;
        $html .= '<br>País: ' . $enterprise->country;
        $html .= '<br>Cidade: ' . $enterprise->city;
        $html .= '<br>Localidade: ' . $enterprise->locale;
        $html .= '<br>Morada: ' . $enterprise->address;
        $html .= '</p>';
        $html .= '</div>';
        $html .= '<div class="invoice__header-item">';
        $html .= '<p>';
        $html .= '<strong>Remetente</strong><br>';
        $html .= '<br>Nome: ' . $client->name;
        $html .= '<br>E-mail: ' . $client->email;
        $html .= '<br>Telefone: ' . $client->phone;
        $html .= '<br>Nif: ' . $client->nif;
        $html .= '<br>País: ' . $client->country;
        $html .= '<br>Cidade: ' . $client->city;
        $html .= '<br>Localidade: ' . $client->locale;
        $html .= '<br>Morada: ' . $client->address;
        $html .= '</p>';
        $html .= '</div>';
        $html .= '<div class="invoice__header-item">';
        $html .= '<p>';
        $html .= '<strong>Data: </strong>' . $bill->date->format('d/m/Y') . '<br><br>';
        $html .= '<strong>Referência Fatura: </strong><br>F' . $bill->reference . '<br><br>';
        $html .= '<strong>Referência Cliente: </strong><br>' . $client->username . '<br><br>';
        $html .= '<strong>Referência Funcionário: </strong><br>' . $employee->username;
        $html .= '</p>';
        $html .= '</div>';
        $html .= '</header>';
        $html .= '<div class="invoice__body">';
        $html .= '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<td>Referência do Produto</td>';
        $html .= '<td>Título</td>';
        $html .= '<td class="text-right">Qtd</td>';
        $html .= '<td class="text-right">Valor<br>(€ s/IVA)</td>';
        $html .= '<td class="text-right">IVA (%)</td>';
        $html .= '<td class="text-right">IVA (€)</td>';
        $html .= '<td class="text-right">Valor<br>(€ c/IVA)</td>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
        foreach ($lines as $line) {
            if ($line->bill_id == $bill->id) {
                $html .= '<tr>';
                $html .= '<td>P' . $line->product->reference . '</td>';
                $html .= '<td>' . $line->product->title . '</td>';
                $html .= '<td class="text-right">' . $line->quantity . '</td>';
                $html .= '<td class="text-right">' . number_format($line->unitary_value, 2, '.', '') . '</td>';
                $html .= '<td class="text-right">' . number_format($line->product->iva->percentage, 2, '.', '') . '</td>';
                $html .= '<td class="text-right">' . number_format($line->iva_value, 2, '.', '') . '</td>';
                $html .= '<td class="text-right">' . number_format($line->product->price, 2, '.', '') . '</td>';
                $html .= '</tr>';
            }
        }
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '<div class="invoice__totals">';
        $html .= '<div class="invoice__subtotals">';
        $html .= '<table>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td><strong>Valor Total</strong></td>';
        $html .= '<td class="text-right">' . number_format($bill->total_value, 2, '.', '') . ' €</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td><strong>Iva Total</strong></td>';
        $html .= '<td class="text-right">' . number_format($bill->total_iva, 2, '.', '') . ' €</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '<div class="invoice__grandtotal">';
        $html .= '<table>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td><strong>Total</strong></td>';
        $html .= '<td class="text-right">' . number_format($bill->total_value + $bill->total_iva, 2, '.', '') . ' €</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    public function edit_lines($id)
    {

        $products = Product::all();
        $bills = Bill::all();
        $bill_lines = Bill_line::find([$id]);
        $bill_id = $bill_lines->id;
        //$bill_lines = Bill_line::find('all', array('conditions' => array('bill_id = ?', $billid)));
        //var_dump($bill_lines);

        if (is_null($bill_lines)) {
            header('Location: router.php?c=lines&a=index');
        } else {
            $this->renderViewBackend('bills/update_lines', [
                'bill_lines' => $bill_lines,
                'products' => $products,
                'bills' => $bills,
                'bill_id' => $bill_id
            ]);
        }

    }

    public function update_lines($id)
    {
        if (isset($_POST['quantity'], $_POST['product_id'], $_POST['bill_id'])) {

            $products = Product::all();
            $bills = Bill::all();
            $bill_lines = Bill_line::find([$id]);

            $quantidade_recebido = $_POST['quantity'];
            $product_id_recebido = $_POST['product_id'];
            $bill_id = $_POST['bill_id'];

            if ($product_id_recebido != $bill_lines->product_id) {


                $product = Product::find_by_id($product_id_recebido);

                $test = $product->stock;

                $iva_percentage = Iva::find('percentage', array('conditions' => array('id = ?', $product->iva_id)));
                $bill_change = Bill::find([$bill_id]);
                if ($quantidade_recebido <= $test) {



                    (int)$new_stock = $product->stock + $bill_lines->quantity - $quantidade_recebido;

                    $new_price = $product->price * $quantidade_recebido;

                    $new_iva = $iva_percentage->percentage * $quantidade_recebido;

                    $total_value = $product->price * $quantidade_recebido;

                    $total_iva = $iva_percentage->percentage * $quantidade_recebido;

                    $attributes_lines = array(
                        'quantity' => $quantidade_recebido,
                        'unitary_value' => $new_price,
                        'iva_value' => $new_iva,
                        'product_id' => $product_id_recebido,
                        'bill_id' => $bill_id
                    );

                    //$bill_lines->update_attributes($attributes_lines);
                    if ($bill_lines->is_valid()) {
                        $bill_lines->update_attributes($attributes_lines);

                        header('Location: router.php?c=bills&a=index_lines&billid=' . $bill_change->id);

                    } else {

                    }

                } elseif ($quantidade_recebido > $test) {
                    $mensagem = "Stock não disponivel";
                    $this->renderViewBackend('bills/update_lines', [
                        'bill_lines' => $bill_lines,
                        'products' => $products,
                        'bills' => $bills,
                        'mensagem' => $mensagem,
                        'bill_id' => $bill_id
                    ]);
                }

            } else {


                $product = Product::find_by_id($product_id_recebido);

                $test = $product->stock;

                $iva_percentage = Iva::find('percentage', array('conditions' => array('id = ?', $product->iva_id)));

                if ($quantidade_recebido <= $test) {

                    $bill_change = Bill::find([$bill_id]);

                    (int)$new_stock = $product->stock + $bill_lines->quantity - $quantidade_recebido;

                    $new_price = $product->price * $quantidade_recebido;

                    $new_iva = $iva_percentage->percentage * $quantidade_recebido;

                    $total_value = $product->price * $quantidade_recebido;

                    $total_iva = $iva_percentage->percentage * $quantidade_recebido;

                    $attributes_lines = array(
                        'quantity' => $quantidade_recebido,
                        'unitary_value' => $new_price,
                        'iva_value' => $new_iva,
                        'product_id' => $product_id_recebido,
                        'bill_id' => $bill_id
                    );

                    //$bill_lines->update_attributes($attributes_lines);
                    if ($bill_lines->is_valid()) {
                        $bill_lines->update_attributes($attributes_lines);

                        header('Location: router.php?c=bills&a=index_lines&billid=' . $bill_change->id);

                    } else {

                    }

                } elseif ($quantidade_recebido > $test) {
                    $mensagem = "Stock não disponivel";
                    $this->renderViewBackend('bills/update_lines', [
                        'bill_lines' => $bill_lines,
                        'products' => $products,
                        'bills' => $bills,
                        'mensagem' => $mensagem,
                        'bill_id' => $bill_id
                    ]);
                }
            }
        } else {
            $products = Product::all();
            $bills = Bill::all();
            $bill_lines = Bill_line::find([$id]);
            $this->renderViewBackend('bills/update_lines', [
                'bill_lines' => $bill_lines,
                'products' => $products,
                'bills' => $bills
            ]);
        }


    }

    public function index_lines($billid)
    {
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
                if (isset($_GET['billid'])) {

                    $bill_lines = Bill_line::find('all', array('conditions' => array('bill_id = ?', $_GET['billid'])));

                    $this->renderViewBackend('bills/index_lines', [
                        'bill_lines' => $bill_lines,
                    ]);
                }
            }
        }
    }

    public function delete_lines($id)
    {
        $bill_lines = Bill_line::find([$id]);
        $bill_lines->delete();

        header('Location: router.php?c=lines&a=index');
    }


    public function create_lines($id)
    {
        $products = Product::all();
        $bills = Bill::all();
        $this->renderViewBackend('bills/create_lines', [
            'products' => $products,
            'bills' => $bills,
            'id' => $id
        ]);
    }

    public function store_lines()
    {

        if (isset($_POST['quantity'], $_POST['product_id'], $_POST['bill_id'])) {

            $id = $_POST['bill_id'];

            $products = Product::all();
            $bills = Bill::all();

            $quantidade_recebido = $_POST['quantity'];
            $product_id_recebido = $_POST['product_id'];
            $bill_id_recebido = $_POST['bill_id'];


            $product = Product::find_by_id($product_id_recebido);

            $test = $product->stock;

            $iva_percentage = Iva::find('percentage', array('conditions' => array('id = ?', $product->iva_id)));

            if ($quantidade_recebido <= $test) {
                var_dump($test);
                $bill_change = Bill::find([$id]);

                $new_price = $product->price * $quantidade_recebido;

                $new_iva = $iva_percentage->percentage * $quantidade_recebido;


                $attributes_lines = array(
                    'quantity' => $quantidade_recebido,
                    'unitary_value' => $new_price,
                    'iva_value' => $new_iva,
                    'product_id' => $product_id_recebido,
                    'bill_id' => $bill_id_recebido
                );

                $bill_lines = new Bill_line($attributes_lines);
                if ($bill_lines->is_valid()) {
                    $bill_lines->save();
                    header('Location: router.php?c=bills&a=index_lines&billid=' . $bill_change->id);
                } else {var_dump('nao valido');
                    $this->renderViewBackend('bills/create_lines', [
                        'bill_lines' => $bill_lines,
                        'products' => $products,
                        'bills' => $bills,
                        'attributes_lines' => $attributes_lines
                    ]);

                }

            } elseif ($quantidade_recebido > $test) {
                $mensagem = "Stock não disponivel";
               $this->renderViewBackend('bills/create_lines', [
                    'products' => $products,
                    'bills' => $bills,
                    'mensagem' => $mensagem
                ]);
            }
        }
    }
}
