<?php

require_once './models/Data.php';

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
        $this->renderViewDetalhe('bills/index', [
            'user' => $user,
            'bills' => $bills,
        ]);
    }
}