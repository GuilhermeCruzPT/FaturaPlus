<?php

class EnterprisesController extends BaseController
{
    public function index()
    {

        if (isset($_POST[('search_btn')])) {

            //barra de pesquisa

            $search = $_POST['search'];
            $business = Enterprises::find('all',
                array('conditions' => "social_designation LIKE '%$search%' 
                or email LIKE '%$search%'
                 or phone LIKE '%$search%'
                or nif LIKE '%$search%'
                or postal_code LIKE '%$search%'
                or coutry LIKE '%$search%'
                or city LIKE '%$search%'
                or locale LIKE '%$search%'
                or address LIKE '%$search%'
                or social_capital LIKE '%$search%'"));


            $this->renderViewBackend('enterprises/index', [
                'enterprises' => $business,
            ]);

        } else {
            $business = Enterprises::all();
            $this->renderViewBackend('enterprises/index', [
                'enterprises' => $business,
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
            'phone' => $_POST['phone'],
            'nif' => $_POST['nif'],
            'postal_code' => $_POST['postal_code'],
            'coutry' => $_POST['coutry'],
            'city' => $_POST['city'],
            'locale' => $_POST['locale'],
            'address' => $_POST['address'],
            'social_capital' => $_POST['social_capital']);

        $business = new Enterprises($attributes);
        if ($business->is_valid()) {
            $business->save();
            header('Location: router.php?c=enterprises&a=index');
        } else {
            //retorna os erros presentes no model


            print_r($business->errors->full_messages());

            $this->renderViewBackend('enterprises/create', [
                'enterprises' => $business
            ]);

        }

    }

    public function edit($id)
    {
        $id = Enterprises::find([$id]);
        if (is_null($id)) {
            header('Location: router.php?c=enterprises&a=index');
        } else {
            $this->renderViewBackend('enterprises/update', [
                'enterprises' => $id,
            ]);
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $business = Enterprises::find([$id]);

        $attributes = array(
            'social_designation' => $_POST['social_designation'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'nif' => $_POST['nif'],
            'postal_code' => $_POST['postal_code'],
            'coutry' => $_POST['coutry'],
            'city' => $_POST['city'],
            'locale' => $_POST['locale'],
            'address' => $_POST['address'],
            'social_capital' => $_POST['social_capital']);

        $id->update_attributes($attributes);
        if ($id->is_valid()) {
            $id->save();
            header('Location: router.php?c=enterprises&a=index');
        } else {
            $this->renderView('enterprises/update', [
                'enterprises' => $id,
            ]);
        }
    }

    public function delete($id)
    {
        $id = Enterprises::find([$id]);
        $id->delete();

        header('Location: router.php?c=enterprises&a=index');

    }

    public function show($id)
    {

        $business = Enterprises::find([$id]);
        if (is_null($id)) {
            header('Location: router.php?c=enterprises&a=index');
        } else {
            $this->renderViewBackend('enterprises/show', [
                'enterprises' => $business,
            ]);


        }
    }

}