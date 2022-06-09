<?php

require_once './models/Data.php';

class AuthController extends BaseController
{
    public function __construct()
    {
        session_start();
    }

    public function signin(){
        //session_destroy();
        if (isset($_SESSION["user_id"])){
            $user = User::find([$_SESSION["user_id"]]);
            if ($user->role == 'c') {
                $this->renderView('site/index', [
                    'userName' => $user->name,
                ]);
            }
            else {
                $this->renderViewBackend('panel/index');
            }
        }
        else
            $this->renderViewfrontend('site/auth');
    }

    public function verify_login()
    {

        if (isset($_POST['username_login']) && isset($_POST['password_login'])) {

            if ($_POST['username_login'] == '' && $_POST['password_login'] == '') {
                $user_username = 'O Username não pode estar vazio!';
                $user_password = 'A Password não pode estar vazio!';
                $this->renderViewfrontend('site/auth', [
                    'user_username' => $user_username,
                    'user_password' => $user_password
                ]);

            } elseif ($_POST['username_login'] == '') {
                $user_username = 'O Username não pode estar vazio!';
                $this->renderViewfrontend('site/auth', [
                    'user_username' => $user_username
                ]);

            } elseif ($_POST['password_login'] == '') {
                $user_password = 'A Password não pode estar vazio!';
                $this->renderViewfrontend('site/auth', [
                    'user_password' => $user_password
                ]);

            } else {
                $user = User::find_by_username($_POST['username_login']);


                if (!is_null($user) && $user->username == $_POST['username_login'] && $user->password == md5($_POST['password_login'])) {


                    $_SESSION["user_id"] = $user->id;
                    $_SESSION["username"] = $user->username;
                    $_SESSION["permission"] = $user->role;

                    if ($user->role == 'c') {
                        $this->renderView('site/index', [
                            'userName' => $user->name,
                        ]);
                    } else {
                        header('Location: router.php?c=panel&a=index');
                        //$this->renderViewBackend('panel/index');
                    }
                } else if (is_null($user)) {

                    $user_password = 'O Username ou a Palavra-Passe não existem!!';

                    $this->renderViewfrontend('site/auth', [
                        'user_password' => $user_password
                    ]);
                } elseif ($user->username == $_POST['username_login'] && $user->password != md5($_POST['password_login'])) {
                    $user_password = 'O Password não corresponde ao nome do utilizador';
                    $this->renderViewfrontend('site/auth', [
                        'user_password' => $user_password
                    ]);
                }
            }
        } else {
            $this->renderViewfrontend('site/auth');
        }
    }

    public function signup(){
        $this->renderViewfrontend('site/signup');
    }

    public function save_signup()
    {

        if (isset($_POST['username'], $_POST['password'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['nif'],
            $_POST['postal_code'], $_POST['birth'],  $_POST['country'], $_POST['city'], $_POST['locale'],
            $_POST['address'])) {


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
                'role' => "c");

            $users = new User($attributes);
            if ($users->is_valid()) {
                $attributes['password'] = md5($_POST['password']);
                $users->update_attributes($attributes);
                $users->save(false);
                header('Location: router.php?c=auth&a=signin');
            } else {
                $this->renderViewfrontend('site/signup', [
                    'users' => $users,
                    'attributes' => $attributes
                ]);
            }
        } else {
            $this->renderViewfrontend('site/signup');
        }
    }
    public function logout(){
        session_destroy();
        header('Location: router.php?c=auth&a=signin');
    }
}