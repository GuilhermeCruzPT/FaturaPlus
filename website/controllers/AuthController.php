<?php

require_once './models/Data.php';

class AuthController extends BaseController
{
    public function sign(){
        //require view index;
        require_once './views/site/auth.php';
    }

    // registo

    public function signin(){

    }

    public function signup(){
        //$this->renderView('site/sigin');
        $this->renderViewfrontend('site/signup');
    }
    public function save_signup(){

        $role = "utlizador";

        $attributes = array(
            'username' => $_POST['username'],
            'password' => $_POST['password'],
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
            header('Location: router.php?c=auth&a=sign');
        } else {

            $this->renderViewfrontend('site/signup', [
                'users' => $users
            ]);
        }

    }

}