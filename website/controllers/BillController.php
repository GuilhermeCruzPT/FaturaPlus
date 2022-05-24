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


            $this->renderViewBackend('bills/index', [
                'bills' => $bill,
            ]);

        } else {
            $bill = Bill::all();
            $this->renderViewBackend('bills/index', [
                'bills' => $bill,
            ]);
        }
    }

    public function create()
    {
        $this->renderViewBackend('bills/create');
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
            header('Location: router.php?c=bills&a=index');
        } else {
            //retorna os erros presentes no model


            print_r($bill->errors->full_messages());

            $this->renderViewBackend('bills/create', [
                'bills' => $bill
            ]);

        }

    }

    public function edit($id_bill)
    {
        $bill = Bill::find([$id_bill]);
        if (is_null($id_bill)) {
            header('Location: router.php?c=bills&a=index');
        } else {
            $this->renderViewBackend('bills/update', [
                'bills' => $bill,
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
            header('Location: router.php?c=bills&a=index');
        } else {
            $this->renderView('bills/update', [
                'bills' => $bill,
            ]);
        }
    }

    public function delete($id_bill)
    {
        $bill = Bill::find([$id_bill]);
        $bill->delete();

        header('Location: router.php?c=bills&a=index');

    }

    public function show($id_bill)
    {

        $bill = Products::find([$id_bill]);
        if (is_null($bill)) {
            header('Location: router.php?c=bills&a=index');
        } else {
            $this->renderViewBackend('bills/show.php', [
                'bills' => $bill,
            ]);


        }
    }

}