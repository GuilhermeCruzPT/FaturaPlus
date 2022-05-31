<?php

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
                array('conditions' => "date LIKE '%$search%' 
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
        $user = User::all();
        $this->renderViewBackend('bills/create',[
            'user' => $user
        ]);
    }

    public function store()
    {
        $attributes = array(
            'date' => $_POST['date'],
            'total_value' => ((float)$_POST['total_value']),
            'total_iva' => ((int)$_POST['total_iva']),
            'state' => $_POST['state'],
            'client_reference_id' => $_POST['client_reference_id'],
            'employee_reference_id' => $_POST['employee_reference_id']);
        $bills = new Bill($attributes);
        $user = User::all();
        if ($bills->is_valid()) {
            $bills->save();
            header('Location: router.php?c=bills&a=index');
        } else {
            // *** Retorna os erros presentes no model *** \\

            //print_r($bills->errors->full_messages());

            $this->renderViewBackend('bills/create', [
                'bills' => $bills,
                'user' => $user
            ]);
        }
    }

    public function edit($id)
    {
        $bill = Bill::find([$id]);
        $user = User::all();
        if (is_null($bill)) {
            header('Location: router.php?c=bills&a=index');
        } else {
            $this->renderViewBackend('bills/update', [
                'bill' => $bill,
                'user' => $user
            ]);
        }
    }

    public function update($id)
    {
        $user = User::all();
        $bill = Bill::find([$id]);

        $attributes = array(
            'date' => $_POST['date'],
            'total_value' => ((float)$_POST['total_value']),
            'total_iva' => ((int)$_POST['total_iva']),
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
}