<?php

class HomeController extends Controller
{
    public function index()
    {
        //echo 'home/index';

        $dados = [
          'teste1' => 'Teste 1',
          'teste2' => 'Teste 2'
        ];

        $this->view('pages/home', $dados);
    }
}