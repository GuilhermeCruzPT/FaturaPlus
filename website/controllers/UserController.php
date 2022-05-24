<?php

class UserController extends BaseController
{
    public function index()
    {
        if (isset($_POST[('search_btn')])){

            //barra de pesquisa

            $search = $_POST['search'];
            $users = User::find('all',
                array('conditions' => "referencia LIKE '%$search%' 
                or username LIKE '%$search%'
                or password LIKE '%$search%'
                or image LIKE '%$search%'
                or name LIKE '%$search%'
                or email LIKE '%$search%'
                or phone LIKE '%$search%'
                or nif LIKE '%$search%'
                or postal_code LIKE '%$search%'
                or birth LIKE '%$search%'
                or genre LIKE '%$search%'
                or coutry LIKE '%$search%'
                or city LIKE '%$search%'
                or locale LIKE '%$search%'
                or address LIKE '%$search%'
                or role LIKE '%$search%'"));

            $this->renderViewBackend('users/index', [
                'users' => $users,
            ]);

        }else {
            $users = User::all();
            $this->renderViewBackend('users/index', [
                'users' => $users,
            ]);
        }
    }

    public function create()
    {
        $this->renderViewBackend('users/create');
    }

    public function store()
    {
        $attributes = array('username' => $_POST['username'],
            'password' => $_POST['password'],
            'image' => $_POST['image'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'nif' => $_POST['nif'],
            'postal_code' => $_POST['postal_code'],
            'birth' => $_POST['birth'],
            'genre' => $_POST['genre'],
            'coutry' => $_POST['coutry'],
            'city' => $_POST['city'],
            'locale' => $_POST['locale'],
            'address' => $_POST['address'],
            'role' => $_POST['role']);
        $users = new User($attributes);
        if ($users->is_valid()) {
            $users->save();
            header('Location: router.php?c=users&a=index');
        }else{
            //retorna os erros presentes no model

            print_r($users->errors->full_messages());

            $this->renderViewBackend('users/create', [
                'users' => $users
            ]);

            //header('Location: router.php?c=products&a=create');
        }
    }

    public function edit($id)
    {
        $user = User::find([$id]);
        if (is_null($user)) {
            header('Location: router.php?c=users&a=index');
        } else {
            $this->renderViewBackend('users/update', [
                'user' => $user,
            ]);
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $user = User::find([$id]);

        $attributes = array('username' => $_POST['username'],
            'password' => $_POST['password'],
            'image' => $_POST['image'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'nif' => $_POST['nif'],
            'postal_code' => $_POST['postal_code'],
            'birth' => $_POST['birth'],
            'genre' => $_POST['genre'],
            'coutry' => $_POST['coutry'],
            'city' => $_POST['city'],
            'locale' => $_POST['locale'],
            'address' => $_POST['address'],
            'role' => $_POST['role']);
        $user->update_attributes($attributes);
        if($user->is_valid()){
            $user->save();
            header('Location: router.php?c=users&a=index');
        } else {
            $this->renderView('users/update', [
                'user' => $user,
            ]);
        }
    }

    public function delete($id)
    {
        $user = User::find([$id]);
        $user->delete();

        header('Location: router.php?c=users&a=index');
        //$this->renderView('user/index');
    }

    public function show($id)
    {
        $user = User::find([$id]);
        if (is_null($user)) {
            header('Location: router.php?c=users&a=index');
        } else {
            $this->renderViewBackend('users/show.php', [
                'user' => $user,
            ]);
        }
    }

}