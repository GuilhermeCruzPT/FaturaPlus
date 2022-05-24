<?php

class IvaController extends BaseController
{
    public function index()
    {
        if (isset($_POST[('search_btn')])){

            //barra de pesquisa

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
        $attributes = array('percentage' => $_POST['percentage'],
            'description' => $_POST['description'],
            'vigour' => $_POST['vigour']);
        $ivas = new Iva($attributes);
        if ($ivas->is_valid()) {
            $ivas->save();
            header('Location: router.php?c=ivas&a=index');
        }else{
            //retorna os erros presentes no model

            print_r($ivas->errors->full_messages());

            $this->renderViewBackend('ivas/create', [
                'ivas' => $ivas
            ]);

            //header('Location: router.php?c=ivas&a=create');
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
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $iva = Iva::find([$id]);

        $attributes = array('percentage' => $_POST['percentage'],
            'description' => $_POST['description'],
            'vigour' => $_POST['vigour']);
        $iva->update_attributes($attributes);
        if($iva->is_valid()){
            $iva->save();
            header('Location: router.php?c=ivas&a=index');
        } else {
            $this->renderView('ivas/update', [
                'iva' => $iva,
            ]);
        }
    }

    public function delete($id)
    {
        $iva = Iva::find([$id]);
        $iva->delete();

        header('Location: router.php?c=ivas&a=index');
        //$this->renderView('iva/index');
    }

    public function show($id)
    {
        $iva = Iva::find([$id]);
        if (is_null($iva)) {
            header('Location: router.php?c=ivas&a=index');
        } else {
            $this->renderViewBackend('ivas/show.php', [
                'iva' => $iva,
            ]);
        }
    }
}