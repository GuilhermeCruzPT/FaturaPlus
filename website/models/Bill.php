<?php

class Bill extends \ActiveRecord\Model
{

    static $validates_presence_of = array(
        array('data', 'message' => 'It must be provided'),
        array('valor_total', 'message' => 'It must be provided'),
        array('iva_total', 'message' => 'It must be provided'),
        array('estado', 'message' => 'It must be provided'),
        array('referencia_cliente', 'message' => 'It must be provided'),
        array('referencia_funcionario', 'message' => 'It must be provided'),
    );

}