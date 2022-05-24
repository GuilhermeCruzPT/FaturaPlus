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

    public function edit($id)
    {
        $bill = Bill::find([$id]);
        if (is_null($id)) {
            header('Location: router.php?c=bills&a=index');
        } else {
            $this->renderViewBackend('bills/update', [
                'bill' => $bill,
            ]);
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $bill = Bill::find([$id]);

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
                'bill' => $bill,
            ]);
        }
    }

    public function delete($id)
    {
        $bill = Bill::find([$id]);
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