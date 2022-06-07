<?php

require_once './models/Data.php';

// Include autoloader
require_once '../vendor/dompdf/autoload.inc.php';

// Reference the Dompdf namespace
use Dompdf\Dompdf;

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
        $enterprise = Enterprise::all([1]);
        //$bill = Bill::find([$id]);
        //$client = User::find_by_id(((int)$bill->client_reference));

        // Instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Fatura em Html
        $html = '<style>
        * {box-sizing: border-box;}
        table {width: 100%;}
        .invoice {padding: 2rem;}
        .invoice__header {border-bottom: 4px solid black;padding-bottom: 2rem;}
        .invoice__header:before, .invoice__header:after {content: " ";display: table;}
        .invoice__header:after {clear: both;}
        .invoice__header-item {width: 25%;float: left;padding: 0 0.5rem;}
        .invoice__body {padding: 2rem 0;border-bottom: 2px solid black;}
        .invoice__body thead {font-weight: bold;}
        .invoice__body thead td {padding-bottom: 1rem;}
        .invoice__body td {padding: 0 0.5rem;}
        .invoice__totals {width: 25%;float: right;}
        .invoice__subtotals, .invoice__grandtotal {padding: 2rem 0.5rem;}
        .invoice__subtotals {border-bottom: 4px solid black;}
        .invoice__grandtotal {font-size: 150%;font-weight: bold;}
        .text-right {text-align: right;}
        </style>';
        $html .= '<div class="invoice">';
        $html .= '<header class="invoice__header">';
        $html .= '<div class="invoice__header-item"><h2>Fatura Plus<h2></div>';
        $html .= '<div class="invoice__header-item">';
        $html .= '<p>';
        $html .= '<strong>'.$enterprise->social_designation.'</strong>';
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
        $html .= '<strong>Cliente</strong>';
        $html .= '<br>';
        $html .= '<br>CORSO V. EMANUELE, 195';
        $html .= '<br>70059 Trani';
        $html .= '<br>Bari';
        $html .= '<br>Italy';
        $html .= '<br>CORSO V.';
        $html .= '<br>dsfeefgesf';
        $html .= '<br>70059 Trani';
        $html .= '</p>';
        $html .= '</div>';
        $html .= '<div class="invoice__header-item">';
        $html .= '<p>';
        $html .= '<strong>Data:</strong> 15/16/1520<br><br>';
        $html .= '<strong>Referência Cliente:</strong> ABCDEFGH3843<br><br>';
        $html .= '<strong>Referência Funcionário:</strong> ABCDEFGH3843';
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
        $html .= '<tr>';
        $html .= '<td>FHABHBJUJ</td>';
        $html .= '<td>Runner 3.0 Low Fuse Grey</td>';
        $html .= '<td class="text-right">1</td>';
        $html .= '<td class="text-right">10</td>';
        $html .= '<td class="text-right">888,90</td>';
        $html .= '<td class="text-right">30</td>';
        $html .= '<td class="text-right">266,67</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '<div class="invoice__totals">';
        $html .= '<div class="invoice__subtotals">';
        $html .= '<table>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td><strong>Valor Total</strong></td>';
        $html .= '<td class="text-right">800,01</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td><strong>Iva Total</strong></td>';
        $html .= '<td class="text-right">0,00</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '<div class="invoice__grandtotal">';
        $html .= '<table>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td><strong>Total</strong></td>';
        $html .= '<td class="text-right">800,01</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        // Load HTML content
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("file.pdf", ["Attachment" => false]);





        /*//The full or relative path to your PDF file.
        $pdfFile = '..\site\pdf.html';

//Set the Content-Type to application/pdf
        header('Content-Type: application/pdf');

//Set the Content-Length header.
        header('Content-Length: ' . filesize($pdfFile));

//Set the Content-Transfer-Encoding to "Binary"
        header('Content-Transfer-Encoding: Binary');

//The filename that it should download as.
        $downloadName = 'instructions.pdf';

//Set the Content-Disposition to attachment and specify
//the name of the file.
        header('Content-Disposition: attachment; filename=' . $downloadName);

//Read the PDF file data and exit the script.
        readfile($pdfFile);
        exit;*/


        //header("Content-type:application/pdf");

// It will be called downloaded.pdf
        //header("Content-Disposition:attachment;filename='downloaded.pdf'");

// The PDF source is in original.pdf
        //readfile("original.pdf");


// reference the Dompdf namespace
// use Dompdf\Dompdf;

// instantiate and use the dompdf class
        //$dompdf = new Dompdf();
        //$dompdf->loadHtml('Hello World!');
        //$dompdf->loadHtml(file_get_contents('pdf.html'));

// (Optional) Setup the paper size and orientation
        //$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
        //$dompdf->render();

// Get the generated PDF file contents
        //$pdf = $dompdf->output();

// Output the generated PDF to Browser
        //$dompdf->stream("file");

        //Instancia do DOMPDF
        //$dompdf = new Dompdf();

        //$dompdf->load_html("<h1>Fatura</h1>");
        //$dompdf->setPaper("A4", "portrait");
        //$dompdf->render();
        //$dompdf->stream("file.pdf", array("Attachment" => false));

        //$dompdf->loadHtml("<h1>Fatura</h1>");

        //ob_start();
        //$pdf = ob_get_clean();
        //require 'C:\wamp64\www\FaturaPlus\website\views\site\bills\pdf.html';
        //$dompdf->loadHtml(ob_get_clean());

        //$dompdf->setPaper("A4", "landscape");
        //$dompdf->setPaper("A4");

        //$dompdf->render();
        //$dompdf->stream("file.pdf", ["Attachment" => false]);

        //header('Content-type: application/pdf');
        //echo $dompdf->output();



        /*$user = User::find([$id]);
        $bills = Bill::all();
        $this->renderViewDetalhe('bills/index', [
            'user' => $user,
            'bills' => $bills,
        ]);*/
    }

    public function teste()
    {
        $this->renderViewDetalhe('pdf/pdf');
    }
}