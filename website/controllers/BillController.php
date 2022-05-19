<?php

class BillController extends BaseController
{
    public function index()
    {

        if (isset($_POST[('search_btn')])) {

            //barra de pesquisa

            $search = $_POST['search'];
            $bill = Bill::find('all',
                array('conditions' => "date LIKE '%$search%' 
                or total_value LIKE '%$search%'
                or total_iva LIKE '%$search%'
                or state LIKE '%$search%'
                or client_reference_id LIKE '%$search%'
                or employee_reference_id LIKE '%$search%'"));


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

        $attributes = array('date' => $_POST['date'],
            'total_value' => $_POST['total_value'],
            'total_iva' => $_POST['total_iva'],
            'state' => $_POST['state'],
            'client_reference_id' => $_POST['client_reference_id'],
            'employee_reference_id' => $_POST['employee_reference_id']);
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
        ('date' => $_POST['date'],
            'total_value' => $_POST['total_value'],
            'total_iva' => $_POST['total_iva'],
            'state' => $_POST['state'],
            'client_reference_id' => $_POST['client_reference_id'],
            'employee_reference_id' => $_POST['employee_reference_id']);


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