<?php

class Iva extends \ActiveRecord\Model
{
    /* verifica a precença
         não pode ser nulo*/
    static $validates_presence_of = array(
        array('percentage', 'message' => 'A percentage não pode estar vazio'),
        array('description', 'message' => 'A description não pode estar vazio'),
        array('vigour', 'message' => 'A vigour não pode estar vazio'),
    );
}