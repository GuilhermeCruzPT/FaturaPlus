<?php

class IvaController extends BaseController
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
            $ivas = Iva::find('all',
                array('conditions' => "percentage LIKE '%$search%' 
                or description LIKE '%$search%'
                or vigour LIKE '%$search%'"));

            $this->renderViewBackend('ivas/index', [
                'ivas' => $ivas,
            ]);

        }else {
            $ivas = Iva::all();
            $this->renderViewBackend('ivas/index', [
                'ivas' => $ivas,
            ]);
        }
    }

    public function create()
    {
        $this->renderViewBackend('ivas/create');
    }

    public function store()
    {
        $attributes = array(
            'percentage' => ((int)$_POST['percentage']),
            'description' => $_POST['description'],
            'vigour' => $_POST['vigour']);
        $ivas = new Iva($attributes);
        if ($ivas->is_valid()) {
            $ivas->save();
            header('Location: router.php?c=ivas&a=index');
        } else {
            // *** Retorna os erros presentes no model *** \\

            //print_r($bills->errors->full_messages());

            $this->renderViewBackend('ivas/create', [
                'ivas' => $ivas
            ]);
        }
    }

    public function edit($id)
    {
        $iva = Iva::find([$id]);
        if (is_null($iva)) {
            header('Location: router.php?c=ivas&a=index');
        } else {
            $this->renderViewBackend('ivas/update', [
                'iva' => $iva,
            ]);
        }
    }

    public function update($id)
    {
        $iva = Iva::find([$id]);

        $attributes = array(
            'percentage' => ((int)$_POST['percentage']),
            'description' => $_POST['description'],
            'vigour' => $_POST['vigour']);
        $iva->update_attributes($attributes);
        if($iva->is_valid()){
            $iva->save();
            header('Location: router.php?c=ivas&a=index');
        } else {
            $this->renderViewBackend('ivas/update', [
                'iva' => $iva,
            ]);
        }
    }

    public function delete($id)
    {
        // Faz o delete de varios registos de outras tabelas na base de dados

        $iva = Iva::find([$id]);

        Bill_line::delete_all(array('conditions' => array('bill_id  = ?', $id)));
        Product::delete_all(array('conditions' => array('iva_id = ?', $id)));

        $iva->delete();

        header('Location: router.php?c=ivas&a=index');
    }

    public function show($id)
    {
        $iva = Iva::find([$id]);
        if (is_null($iva)) {
            header('Location: router.php?c=ivas&a=index');
        } else {
            $this->renderViewBackend('ivas/show', [
                'iva' => $iva,
            ]);
        }
    }
}