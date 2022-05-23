<?php

require_once './models/Data.php';

class SiteController extends BaseController
{
    public function index(){
        $this->renderView('site/index');
    }

    public function demo(){
        //call model and get data
        $d = new Data();
        $data = $d->getData();

        //require once view
        require_once './views/site/show.php';
    }

    public function name(){
        //buscar os dados ao model
        $d=new Data();
        $data=$d->getName();
        require_once './views/site/name.php';
    }

    public function plano(){
        //Renderizar uma vista com o form plano
        require_once './views/site/plano.php';
    }

    public function processa(){
        //É responsável por processar o form

        //echo "Hello";
        $nome=$_POST['nome'];
        //echo $nome;

        //Instanciar o model
        $d=new Data();
        $data=$d->getName();
        $fraseCompleta="Vom dia $nome.Bem vindo ao $data";
        //echo $fraseCompleta;
        require_once './views/site/lab.php';

        //Falta enviar a variável para a vista
    }

    public function backoffice(){
        // tirei o section para o backoffice
        // não se pode usar neste ficheiro
        // porque eu faço require
        $this->renderView('backoffice/backoffice');
    }
}