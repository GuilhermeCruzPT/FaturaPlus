<?php

require_once './models/Data.php';

// Include autoloader
require_once '../vendor/dompdf/autoload.inc.php';

// Reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

class SiteController extends BaseController
{
    public function __construct()
    {
        if (isset($_SESSION["user_id"])) {
            if ($_SESSION["permission"] != 'c')
                header('Location: router.php?c=panel&a=index');
        }
    }

    public function index()
    {
        $this->renderView('site/index');
    }

    public function about()
    {
        $this->renderView('site/about_us');
    }

    public function demo()
    {
        //call model and get data
        $d = new Data();
        $data = $d->getData();

        //require once view
        require_once './views/site/show.php';
    }

    public function name()
    {
        //buscar os dados ao model
        $d = new Data();
        $data = $d->getName();
        require_once './views/site/name.php';
    }

    public function plano()
    {
        //Renderizar uma vista com o form plano
        require_once './views/site/plano.php';
    }

    public function processa()
    {
        //É responsável por processar o form

        //echo "Hello";
        $nome = $_POST['nome'];
        //echo $nome;

        //Instanciar o model
        $d = new Data();
        $data = $d->getName();
        $fraseCompleta = "Vom dia $nome.Bem vindo ao $data";
        //echo $fraseCompleta;
        require_once './views/site/lab.php';

        //Falta enviar a variável para a vista
    }

    public function backoffice()
    {
        // tirei o section para o backoffice
        // não se pode usar neste ficheiro
        // porque eu faço require
        $this->renderView('backoffice/backoffice');
    }

    public function edit($id)
    {
        $user = User::find([$id]);
        $this->renderViewDetalhe('profile/update', [
            'user' => $user,
        ]);
    }

    public function update($id)
    {
        $user = User::find([$id]);

        $attributes = array(
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => ((int)$_POST['phone']),
            'nif' => ((int)$_POST['nif']),
            'postal_code' => $_POST['postal_code'],
            'birth' => $_POST['birth'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'locale' => $_POST['locale'],
            'address' => $_POST['address']);

        if (empty($attributes['password'])) {
            $user_pass = User::find('password', array('conditions' => array('id = ? ', $id)));
            var_dump($user_pass->password);
            $attributes['password'] = "P" . $user_pass->password;
            var_dump($user_pass->password);
            $user->update_attributes($attributes);

            if ($user->is_valid()) {
                var_dump($attributes['password']);
                $attributes['password'] = $user_pass->password;
                $user->update_attributes($attributes);
                $user->save(false);
                header('Location: router.php?c=site&a=show&id=' . $user->id);
            } else {
                $this->renderViewDetalhe('profile/update', [
                    'user' => $user,
                ]);
            }
        } else {
            if ($user->is_valid()) {
                $attributes['password'] = md5($_POST['password']);
                $user->update_attributes($attributes);
                $user->save(false);
                header('Location: router.php?c=site&a=index');
            } else {
                $this->renderViewDetalhe('profile/update', [
                    'user' => $user,
                ]);
            }
        }
    }

    public function show($id)
    {
        $user = User::find([$id]);
        if (is_null($user)) {
            header('Location: router.php?c=site&a=index');
        } else {
            $this->renderViewDetalhe('profile/show', [
                'user' => $user,
            ]);
        }
    }

    public function pdfindex($id)
    {
        $user = User::find([$id]);
        $bills = Bill::all();
        $this->renderViewDetalhe('pdf/index', [
            'user' => $user,
            'bills' => $bills,
        ]);
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