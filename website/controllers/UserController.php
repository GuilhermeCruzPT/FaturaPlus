<?php

class UserController extends BaseController
{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION["user_id"]))
        {
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
                array('conditions' => "
                username LIKE '%$search%'
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
        if (isset($_POST['username'], $_POST['password'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['nif'],
            $_POST['postal_code'], $_POST['birth'], $_POST['genre'], $_POST['country'], $_POST['city'], $_POST['locale'],
            $_POST['address'], $_POST['role'])) {

            $attributes = array(
                'username' => $_POST['username'],
                'password' => $_POST['password'],
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
                $attributes['password'] = md5($_POST['password']);
                $users->update_attributes($attributes);
                $users->save(false);
                header('Location: router.php?c=users&a=index');
            } else {
                // *** Retorna os erros presentes no model *** \\

                //print_r($bills->errors->full_messages());

                $this->renderViewBackend('users/create', [
                    'users' => $users
                ]);
            }
        } else {
            $iva = Iva::all();
            $this->renderViewBackend('users/create');
        }
    }

    public function edit($id)
    {
        $user = User::find([$id]);
        if ($_SESSION["permission"] == 'a' || $user->role == 'c' || $user->username == $_SESSION["username"]) {
            if (is_null($user)) {
                header('Location: router.php?c=users&a=index');
            } else {
                $this->renderViewBackend('users/update', [
                    'user' => $user,
                ]);
            }
        }
        else
            header('Location: router.php?c=users&a=index');
    }

    public function update($id)
    {
        if (isset($_POST['username'], $_POST['password'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['nif'],
            $_POST['postal_code'], $_POST['birth'], $_POST['genre'], $_POST['country'], $_POST['city'], $_POST['locale'],
            $_POST['address'], $_POST['role'])) {
            $user = User::find([$id]);

            $attributes = array(
                'username' => $_POST['username'],
                'password' => $_POST['password'],
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

            if (empty($attributes['password'])) {
                $user_pass = User::find('password', array('conditions' => array('id = ? ', $id)));
                var_dump($user_pass->password);
                $attributes['password'] = "P" . $user_pass->password;
                var_dump($user_pass->password);
                $user->update_attributes($attributes);

                if ($user->is_valid()) {
                    var_dump($attributes['password']);
                    $attributes['password'] = $user_pass->password;
                    $user->update_attributes($attributes);
                    $user->save(false);
                    header('Location: router.php?c=users&a=index');
                } else {
                    $this->renderViewBackend('users/update', [
                        'user' => $user,
                    ]);
                }
            } else {
                if ($user->is_valid()) {
                    $attributes['password'] = md5($_POST['password']);
                    $user->update_attributes($attributes);
                    $user->save(false);
                    header('Location: router.php?c=users&a=index');
                } else {
                    $this->renderViewBackend('users/update', [
                        'user' => $user,
                    ]);
                }
            }
        } else {
            $user = User::find([$id]);
            $this->renderViewBackend('users/update', [
                'user' => $user,
            ]);
        }
    }

    public function delete($id)
    {
        // Faz o delete de varios registos de outras tabelas na base de dados
        
        $user = User::find([$id]);
        if ($_SESSION["permission"] != 'f') {
            $show = Bill::find('all', array('conditions' => array('client_reference_id = ? OR employee_reference_id = ?', $id, $id)));

            foreach ($show as $show_bill) {
                Bill_line::delete_all(array('conditions' => array('bill_id  = ?', $show_bill->id)));
            }

            Bill::delete_all(array('conditions' => array('client_reference_id  = ? OR employee_reference_id = ?', $id, $id)));

            $user->delete();

            header('Location: router.php?c=users&a=index');
        }
        else {
            header('Location: router.php?c=users&a=index');
        }
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