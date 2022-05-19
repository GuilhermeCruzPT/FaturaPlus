<?php

class Business extends \ActiveRecord\Model
{

    static $validates_presence_of = array(
        array('designação_social', 'message' => 'It must be provided'),
        array('email', 'message' => 'It must be provided'),
        array('nif', 'message' => 'It must be provided'),
        array('codigo_postal', 'message' => 'It must be provided'),
        array('capital_social', 'message' => 'It must be provided'),
        array('telefone', 'message' => 'It must be provided'),
        array('localidade', 'message' => 'It must be provided'),
    );

}