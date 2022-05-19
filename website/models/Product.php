<?php

class Product extends \ActiveRecord\Model
{
/* verifica a precença
 não pode ser nulo*/
    static $validates_presence_of = array(
        array('reference', 'message' => 'A referencia não pode estar vazio'),
        array('description', 'message' => 'A descrição não pode estar vazio'),
        array('iva_id', 'message' => 'O iva_id não pode estar vazio'),
    );
    /* verifica a precença
     não pode ser nulo mas para numeros*/
    static $validates_numericality_of = array(
        array('price', 'greater_than' => 0,'message' => 'O preço não pode estar vazio'),
        array('stock', 'greater_than' => 0,'message' => 'O stock não pode estar vazio'),
    );

    /* vai buscar o valor para da
    chave estrangeira*/
    static $belongs_to = array(
        array('iva')
    );

}