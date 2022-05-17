<?php

class Product extends \ActiveRecord\Model
{

    static $validates_presence_of = array(
        array('reference', 'message' => 'It must be provided'),
        array('description', 'message' => 'It must be provided'),
        array('price', 'message' => 'It must be provided'),
        array('stock', 'message' => 'It must be provided'),
        array('iva_id', 'message' => 'It must be provided'),
    );

}