<?php

class Products extends \ActiveRecord\Model
{

    static $validates_presence_of = array(
        array('referencia', 'message' => 'It must be provided'),
        array('descricao', 'message' => 'It must be provided'),
        array('preco', 'message' => 'It must be provided'),
        array('stock', 'message' => 'It must be provided'),
        array('vigor', 'message' => 'It must be provided'),
    );

}