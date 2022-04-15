<?php
namespace Src\Classes;

require_once("../src/traits/TraitUrlParser.php");
use Src\Traits\TraitUrlParser;


class ClassRoutes{

    use TraitUrlParser;

    private $Rota;

    #Método de retorno da rota
    public function getRota(){
        $Url = $this->parserUrl();
        return $Url;
    }
}