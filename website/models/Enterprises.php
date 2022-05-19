<?php

class Enterprises extends \ActiveRecord\Model
{

    static $validates_presence_of = array(
        array('social_designation', 'message' => 'It must be provided'),
        array('email', 'message' => 'It must be provided'),
        array('phone', 'message' => 'It must be provided'),
        array('nif', 'message' => 'It must be provided'),
        array('postal_code', 'message' => 'It must be provided'),
        array('country', 'message' => 'It must be provided'),
        array('city', 'message' => 'It must be provided'),
        array('locale', 'message' => 'It must be provided'),
        array('address', 'message' => 'It must be provided'),
        array('social_capital', 'message' => 'It must be provided'),

    );

}