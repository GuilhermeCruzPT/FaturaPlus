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
        //$this->renderView('site/sigin');
        $this->renderViewfrontend('site/sigin');
    }
    public function save_signin(){

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

        var_dump($attributes);

    }

}