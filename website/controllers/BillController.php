<?php

class BillController extends BaseController
{
    public function index()
    {

        if (isset($_POST[('search_btn')])) {

            //barra de pesquisa

            $search = $_POST['search'];
            $bill = Bill::find('all',
                array('conditions' => "data LIKE '%$search%' 
                or valor_total LIKE '%$search%'
                or iva_total LIKE '%$search%'
                or estado LIKE '%$search%'
                or referencia_cliente LIKE '%$search%'
                or referencia_funcionario LIKE '%$search%'"));


            $this->renderViewBackend('bill/index', [
                'bill' => $bill,
            ]);

        } else {
            $bill = Bill::all();
            $this->renderViewBackend('bill/index', [
                'bill' => $bill,
            ]);
        }
    }

    public function create()
    {
        $this->renderViewBackend('bill/create');
    }

    public function store()
    {

        $attributes = array('data' => $_POST['data'],
            'valor_total' => $_POST['valor_total'],
            'iva_total' => $_POST['iva_total'],
            'estado' => $_POST['estado'],
            'referencia_cliente' => $_POST['referencia_cliente'],
            'referencia_funcionario' => $_POST['referencia_funcionario']);
        $bill = new Bill($attributes);
        if ($bill->is_valid()) {
            $bill->save();
            header('Location: router.php?c=bill&a=index');
        } else {
            //retorna os erros presentes no model


            print_r($bill->errors->full_messages());

            $this->renderViewBackend('bill/create', [
                'bill' => $bill
            ]);

        }

    }

    public function edit($id_bill)
    {
        $bill = Bill::find([$id_bill]);
        if (is_null($id_bill)) {
            header('Location: router.php?c=bill&a=index');
        } else {
            $this->renderViewBackend('bill/update', [
                'bill' => $bill,
            ]);
        }
    }

    public function update($id_bill)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $bill = Bill::find([$id_bill]);

        $attributes = array
        ('data' => $_POST['data'],
            'valor_total' => $_POST['valor_total'],
            'iva_total' => $_POST['iva_total'],
            'estado' => $_POST['estado'],
            'referencia_cliente' => $_POST['referencia_cliente'],
            'referencia_funcionario' => $_POST['referencia_funcionario']);
        $bill->update_attributes($attributes);
        if ($bill->is_valid()) {
            $bill->save();
            header('Location: router.php?c=bill&a=index');
        } else {
            $this->renderView('bill/update', [
                'bill' => $bill,
            ]);
        }
    }

    public function delete($id_bill)
    {
        $bill = Bill::find([$id_bill]);
        $bill->delete();

        header('Location: router.php?c=bill&a=index');

    }

    public function show($id_bill)
    {

        $bill = Products::find([$id_bill]);
        if (is_null($bill)) {
            header('Location: router.php?c=bill&a=index');
        } else {
            $this->renderViewBackend('bill/show', [
                'bill' => $bill,
            ]);


        }
    }

}