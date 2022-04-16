<?php
/*
 * Classe Rota
 * Cria as URL, carrega os controladores, métodos e parametros
 * FORMATO URL - /controlador/metodo/parametros
 */

class Rota
{
    //Atributos da classe
    private $controlador = 'HomeController';
    private $metodo = 'index';
    private $parametros = [];

    public function __construct()
    {
        //Se o url existir guarda a funcao url na variavel $url
        $url = $this->url() ? $this->url() : [0];

        //Verifica se o controlador existe
        //ucwords - Converte para maiúsculas o primeiro caractere de cada palavra
        if (file_exists('../app/controllers/'.ucwords($url[0]).'.php'))
        {
            //Se existir fica como controlador
            $this->controlador = ucwords($url[0]);
            //unset - Destrói a variável especificada
            unset($url[0]);
        }

        //Requera o controlador
        require_once '../app/controllers/'.$this->controlador.'.php';
        //Instacia o controlador
        $this->controlador = new $this->controlador;

        //Verifica se o método existe, segunda parte do url
        if (isset($url[1]))
        {
            //method_exists - Verifica se o método da classe existe
            if (method_exists($this->controlador,$url[1]))
            {
                $this->metodo = $url[1];
                unset($url[1]);
            }
        }

        //Se existir retorna um array com os valores se não retorna um array vazio
        //array_values - Retorna todos os valores de um array
        $this->parametros = $url ? array_values($url) : [];
        //call_user_func_array - Chama uma dada função de usuário com um array de parâmetros
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);

        //var_dump($this->url());
        //var_dump($this);
    }

    //Retorna a url em um array
    private function url()
    {
        //echo $_GET['url'];
        //O filtro FILTER_SANITIZE_URL remove todos os caracteres ilegais de uma URL
        $url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
        //Verifica se o url existe
        if (isset($url))
        {
            //trim - Retira espaço no ínicio e final de uma string
            //rtrim - Retira espaços em branco (ou outros caracteres) do final da string
            $url = trim(rtrim($url,'/'));
            //explode - Divide uma string em strings, retorna um array
            $url = explode('/',$url);
            return $url;
        }
    }
}