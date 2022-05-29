<?php

class EnterpriseController extends BaseController
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
            $enterprises = Enterprise::find('all',
                array('conditions' => "social_designation LIKE '%$search%' 
                or email LIKE '%$search%'
                or phone LIKE '%$search%'
                or nif LIKE '%$search%'
                or postal_code LIKE '%$search%'
                or country LIKE '%$search%'
                or city LIKE '%$search%'
                or locale LIKE '%$search%'
                or address LIKE '%$search%'
                or social_capital LIKE '%$search%'"));

            $this->renderViewBackend('enterprises/index', [
                'enterprises' => $enterprises,
            ]);

        } else {
            $enterprises = Enterprise::all();
            $this->renderViewBackend('enterprises/index', [
                'enterprises' => $enterprises,
            ]);
        }
    }

    public function create()
    {
        $this->renderViewBackend('enterprises/create');
    }

    public function store()
    {
        $attributes = array(
            'social_designation' => $_POST['social_designation'],
            'email' => $_POST['email'],
            'phone' => ((int)$_POST['phone']),
            'nif' => ((int)$_POST['nif']),
            'postal_code' => $_POST['postal_code'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'locale' => $_POST['locale'],
            'address' => $_POST['address'],
            'social_capital' => $_POST['social_capital']);
        $enterprises = new Enterprise($attributes);
        if ($enterprises->is_valid()) {
            $enterprises->save();
            header('Location: router.php?c=enterprises&a=index');
        } else {
            // *** Retorna os erros presentes no model *** \\

            //print_r($bills->errors->full_messages());

            $this->renderViewBackend('enterprises/create', [
                'enterprises' => $enterprises
            ]);
        }
    }

    public function edit($id)
    {
        $enterprise = Enterprise::find([$id]);
        if (is_null($enterprise)) {
            header('Location: router.php?c=enterprises&a=index');
        } else {
            $this->renderViewBackend('enterprises/update', [
                'enterprise' => $enterprise,
            ]);
        }
    }

    public function update($id)
    {
        $enterprise = Enterprise::find([$id]);

        $attributes = array(
            'social_designation' => $_POST['social_designation'],
            'email' => $_POST['email'],
            'phone' => ((int)$_POST['phone']),
            'nif' => ((int)$_POST['nif']),
            'postal_code' => $_POST['postal_code'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'locale' => $_POST['locale'],
            'address' => $_POST['address'],
            'social_capital' => $_POST['social_capital']);
        $enterprise->update_attributes($attributes);
        if ($enterprise->is_valid()) {
            $enterprise->save();
            header('Location: router.php?c=enterprises&a=index');
        } else {
            $this->renderView('enterprises/update', [
                'enterprise' => $enterprise,
            ]);
        }
    }

    public function delete($id)
    {
        $enterprise = Enterprise::find([$id]);
        $enterprise->delete();

        header('Location: router.php?c=enterprises&a=index');
    }

    public function show($id)
    {
        $enterprise = Enterprise::find([$id]);
        if (is_null($enterprise)) {
            header('Location: router.php?c=enterprises&a=index');
        } else {
            $this->renderViewBackend('enterprises/show', [
                'enterprise' => $enterprise,
            ]);
        }
    }
}