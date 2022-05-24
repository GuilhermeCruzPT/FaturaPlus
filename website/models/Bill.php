<?php

class Bill extends \ActiveRecord\Model
{

    static $validates_presence_of = array(
        array('date', 'message' => 'It must be provided'),
        array('total_value', 'message' => 'It must be provided'),
        array('total_iva', 'message' => 'It must be provided'),
        array('state', 'message' => 'It must be provided'),
        array('client_reference_id', 'message' => 'It must be provided'),
        array('employee_reference_id', 'message' => 'It must be provided'),
    );

}