<?php

require_once './models/Data.php';

class AuthController extends BaseController
{
    public function sign(){
        //require view index;
        require_once './views/site/auth.php';
    }

    public function signin(){
        $this->renderView('site/sigin');
    }

}