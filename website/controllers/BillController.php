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
            if(isset($_POST['btn_adicionar'])) {

                $product = $_POST['product_id'];
                $products_array = unserialize($_POST['products_array']);
                $product_one = Product::find_by_id($product);
                $users = User::all();
                $products = Product::all();
                $ivas = Iva::all();

                if (!$products_array){
                    $attributes = array(
                        'id' => 0,
                        'quantity' => 1,
                        'unitary_value' => $product_one->price,
                        'product_id' => $product_one->id,
                        'iva_value' => $product_one->iva_id,
                        'bill_id' => 'fica vazio por enquanto');
                    array_push($products_array, $attributes);
                    $this->renderViewBackend('bills/create', [
                        'users' => $users,
                        'products' => $products,
                        'products_array' => $products_array,
                        'ivas' => $ivas
                    ]);
                }else{
                    foreach ($products_array as $array ) {
                        $id = $array['id'];
                    }
                    $attributes = array(
                        'id' => $id + 1,
                        'quantity' => 1,
                        'unitary_value' => $product_one->price,
                        'product_id' => $product_one->id,
                        'iva_value' => $product_one->iva_id,
                        'bill_id' => 'fica vazio por enquanto');
                    array_push($products_array, $attributes);
                    $this->renderViewBackend('bills/create', [
                        'users' => $users,
                        'products' => $products,
                        'products_array' => $products_array,
                        'ivas' => $ivas
                    ]);
                }
            }elseif(isset($_POST['btn_apagar'])){
                $products_array = unserialize($_POST['products_array']);
                $key2 = $_POST['btn_apagar'];

                if (array_key_exists($key2,$products_array)) {

                    unset($products_array[$key2]);
                    //var_dump($key2);
                    $users = User::all();
                    $products = Product::all();
                    $ivas = Iva::all();
                    $this->renderViewBackend('bills/create', [
                        'users' => $users,
                        'products' => $products,
                        'products_array' => $products_array,
                        'ivas' => $ivas
                    ]);

                }else{
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
            }
            else{
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
        }else{
            $products_array = [];
            $ivas = Iva::all();
            $users = User::all();
            $products = Product::all();
            $this->renderViewBackend('bills/create', [
                'users' => $users,
                'products' => $products,
                'products_array' => $products_array,
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
        }
        else
            header('Location: router.php?c=bills&a=index');
    }

    public function update($id)
    {

        if (isset($_POST['reference'], $_POST['state'], $_POST['client_reference_id'], $_POST['employee_reference_id'])) {
        $user = User::all();
        $bill = Bill::find([$id]);

        $attributes = array(
            'reference' => sprintf('%06d', $_POST['reference']),
            'state' => $_POST['state'],
            'client_reference_id' => $_POST['client_reference_id'],
            'employee_reference_id' => $_POST['employee_reference_id']);
        $bill->update_attributes($attributes);
        if ($bill->is_valid()) {
            $bill->save();
            header('Location: router.php?c=bills&a=index');
        } else {
            $this->renderViewBackend('bills/update', [
                'bill' => $bill,
                'user' => $user
            ]);
        }
        } else {
            $bill = Bill::find([$id]);
            $user = User::all();
            $this->renderViewBackend('bills/update', [
                'bill' => $bill,
                'user' => $user
            ]);
        }
    }

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
        $dompdf->stream('F'.$bill->reference.' - '.APP_NAME, ["Attachment" => false]);
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
        $dompdf->stream('F'.$bill->reference.' - '.APP_NAME, ["Attachment" => true]);
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
        $html .= '<div class="invoice__header-item"><img src="'.DIRIMG.'FaturaPlus_Oficial.png" class="lg-img"></div>';
        $html .= '<div class="invoice__header-item">';
        $html .= '<p>';
        $html .= '<strong>Empresa</strong><br>';
        $html .= '<br>E-mail: '.$enterprise->email;
        $html .= '<br>Telefone: '.$enterprise->phone;
        $html .= '<br>Nif: '.$enterprise->nif;
        $html .= '<br>Código Postal: '.$enterprise->postal_code;
        $html .= '<br>País: '.$enterprise->country;
        $html .= '<br>Cidade: '.$enterprise->city;
        $html .= '<br>Localidade: '.$enterprise->locale;
        $html .= '<br>Morada: '.$enterprise->address;
        $html .= '</p>';
        $html .= '</div>';
        $html .= '<div class="invoice__header-item">';
        $html .= '<p>';
        $html .= '<strong>Remetente</strong><br>';
        $html .= '<br>Nome: '.$client->name;
        $html .= '<br>E-mail: '.$client->email;
        $html .= '<br>Telefone: '.$client->phone;
        $html .= '<br>Nif: '.$client->nif;
        $html .= '<br>País: '.$client->country;
        $html .= '<br>Cidade: '.$client->city;
        $html .= '<br>Localidade: '.$client->locale;
        $html .= '<br>Morada: '.$client->address;
        $html .= '</p>';
        $html .= '</div>';
        $html .= '<div class="invoice__header-item">';
        $html .= '<p>';
        $html .= '<strong>Data: </strong>'.$bill->date->format('d/m/Y').'<br><br>';
        $html .= '<strong>Referência Fatura: </strong><br>F'.$bill->reference.'<br><br>';
        $html .= '<strong>Referência Cliente: </strong><br>'.$client->username.'<br><br>';
        $html .= '<strong>Referência Funcionário: </strong><br>'.$employee->username;
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
                $html .= '<td>P'.$line->product->reference.'</td>';
                $html .= '<td>'.$line->product->title.'</td>';
                $html .= '<td class="text-right">'.$line->quantity.'</td>';
                $html .= '<td class="text-right">'.number_format($line->unitary_value, 2, '.', '').'</td>';
                $html .= '<td class="text-right">'.number_format($line->product->iva->percentage, 2, '.', '').'</td>';
                $html .= '<td class="text-right">'.number_format($line->iva_value, 2, '.', '').'</td>';
                $html .= '<td class="text-right">'.number_format($line->product->price, 2, '.', '').'</td>';
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
        $html .= '<td class="text-right">'.number_format($bill->total_value, 2, '.', '').' €</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td><strong>Iva Total</strong></td>';
        $html .= '<td class="text-right">'.number_format($bill->total_iva, 2, '.', '').' €</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '<div class="invoice__grandtotal">';
        $html .= '<table>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td><strong>Total</strong></td>';
        $html .= '<td class="text-right">'.number_format($bill->total_value + $bill->total_iva, 2, '.', '').' €</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}