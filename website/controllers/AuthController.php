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
        $user = User::find_by_username($_POST['username']);
        if ($user->username == $_POST['username'] && $user->password == md5($_POST['password'])){
            $_SESSION["user_id"] = $user->id;
            $_SESSION["username"] = $user->username;
            $_SESSION["permission"] = $user->role;

            if ($user->role == 'c') {
                $this->renderView('site/index', [
                    'userName' => $user->name,
                ]);
            }
            else {
                $this->renderViewBackend('panel/index');
            }
        }
        else {
            $error = 'O Username ou a Palavra-Passe não existem!!';
        }
    }

    public function signup(){
        //$this->renderView('site/sigin');
        $this->renderViewfrontend('site/signup');
    }

    public function save_signup(){
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
            'role' => "utlizador");

        $users = new User($attributes);
        if ($users->is_valid()) {
            $users->save();
            header('Location: router.php?c=auth&a=signin');
        }
        else {
            $this->renderViewfrontend('site/signup', [
                'users' => $users
            ]);
        }
    }

    public function logout(){
        session_destroy();
        header('Location: router.php?c=auth&a=signin');
    }
}