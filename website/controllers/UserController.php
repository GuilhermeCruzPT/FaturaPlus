<?php

class UserController extends BaseController
{
    public function __construct()
    {
        if (isset($_SESSION["user_id"])) {
            if ($_SESSION["permission"] == 'c')
                header('Location: router.php?c=site&a=index');
        }
        else header('Location: router.php?c=auth&a=signin');
    }

    public function index()
    {
        if (isset($_POST[('search_btn')])){

            /* ╔═══════════════════════════╗ */
            /* ║     Barra de Pesquisa     ║ */
            /* ╚═══════════════════════════╝ */

            $search = $_POST['search'];
            $users = User::find('all',
                array('conditions' => "referencia LIKE '%$search%' 
                or username LIKE '%$search%'
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
        $attributes = array(
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'image' => $_POST['image'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => ((int)$_POST['phone']),
            'nif' => ((int)$_POST['nif']),
            'postal_code' => $_POST['postal_code'],
            'birth' => $_POST['birth'],
            'genre' => $_POST['genre'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'locale' => $_POST['locale'],
            'address' => $_POST['address'],
            'role' => $_POST['role']);
        $users = new User($attributes);
        if ($users->is_valid()) {
            $users->save();
            header('Location: router.php?c=users&a=index');
        } else {
            // *** Retorna os erros presentes no model *** \\

            //print_r($bills->errors->full_messages());

            $this->renderViewBackend('users/create', [
                'users' => $users
            ]);
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
        $user = User::find([$id]);

        $attributes = array(
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'image' => $_POST['image'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => ((int)$_POST['phone']),
            'nif' => ((int)$_POST['nif']),
            'postal_code' => $_POST['postal_code'],
            'birth' => $_POST['birth'],
            'genre' => $_POST['genre'],
            'country' => $_POST['country'],
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
    }

    public function show($id)
    {
        $user = User::find([$id]);
        if (is_null($user)) {
            header('Location: router.php?c=users&a=index');
        } else {
            $this->renderViewBackend('users/show', [
                'user' => $user,
            ]);
        }
    }
}