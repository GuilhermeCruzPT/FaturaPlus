<?php

class BusinessController extends BaseController
{
    public function index()
    {

        if (isset($_POST[('search_btn')])) {

            //barra de pesquisa

            $search = $_POST['search'];
            $business = Business::find('all',
                array('conditions' => "designacao_social LIKE '%$search%' 
                or email LIKE '%$search%'
                or nif LIKE '%$search%'
                or codigo_postal LIKE '%$search%'
                or capital_social LIKE '%$search%'
                or telefone LIKE '%$search%'
                or localidade LIKE '%$search%'"));


            $this->renderViewBackend('business/index', [
                'business' => $business,
            ]);

        } else {
            $business = Business::all();
            $this->renderViewBackend('business/index', [
                'business' => $business,
            ]);
        }
    }

    public function create()
    {
        $this->renderViewBackend('business/create');
    }

    public function store()
    {

        $attributes = array(
            'designacao_social' => $_POST['designacao_social'],
            'email' => $_POST['email'],
            'nif' => $_POST['nif'],
            'codigo_postal' => $_POST['codigo_postal'],
            'capital_social' => $_POST['capital_social'],
            'telefone' => $_POST['telefone'],
            'localidade' => $_POST['localidade']);

        $business = new Business($attributes);
        if ($business->is_valid()) {
            $business->save();
            header('Location: router.php?c=business&a=index');
        } else {
            //retorna os erros presentes no model


            print_r($business->errors->full_messages());

            $this->renderViewBackend('business/create', [
                'business' => $business
            ]);

        }

    }

    public function edit($id_empresa)
    {
        $id_empresa = Business::find([$id_empresa]);
        if (is_null($id_empresa)) {
            header('Location: router.php?c=business&a=index');
        } else {
            $this->renderViewBackend('business/update', [
                'business' => $id_empresa,
            ]);
        }
    }

    public function update($id_empresa)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $business = Business::find([$id_empresa]);

        $attributes = array
        ('designacao_social' => $_POST['designacao_social'],
            'email' => $_POST['email'],
            'nif' => $_POST['nif'],
            'codigo_postal' => $_POST['codigo_postal'],
            'capital_social' => $_POST['capital_social'],
            'telefone' => $_POST['telefone'],
            'localidade' => $_POST['localidade']);

        $id_empresa->update_attributes($attributes);
        if ($id_empresa->is_valid()) {
            $id_empresa->save();
            header('Location: router.php?c=business&a=index');
        } else {
            $this->renderView('business/update', [
                'business' => $id_empresa,
            ]);
        }
    }

    public function delete($id_empresa)
    {
        $id_empresa = Bill::find([$id_empresa]);
        $id_empresa->delete();

        header('Location: router.php?c=business&a=index');

    }

    public function show($id_empresa)
    {

        $business = Business::find([$id_empresa]);
        if (is_null($id_empresa)) {
            header('Location: router.php?c=business&a=index');
        } else {
            $this->renderViewBackend('business/show', [
                'business' => $business,
            ]);


        }
    }

}