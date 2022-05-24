<?php

class User extends \ActiveRecord\Model
{
    /* verifica a precença
     não pode ser nulo*/
    static $validates_presence_of = array(
        array('username', 'message' => 'O username não pode estar vazio'),
        array('password', 'message' => 'A password não pode estar vazio'),
        array('image', 'message' => 'A image não pode estar vazio'),
        array('name', 'message' => 'O nome não pode estar vazio'),
        array('email', 'message' => 'O email não pode estar vazio'),
        array('postal_code', 'message' => 'O postal code não pode estar vazio'),
        array('birth', 'message' => 'O birth não pode estar vazio'),
        array('genre', 'message' => 'O genre não pode estar vazio'),
        array('coutry', 'message' => 'O coutry não pode estar vazio'),
        array('city', 'message' => 'A city não pode estar vazio'),
        array('locale', 'message' => 'O locale não pode estar vazio'),
        array('address', 'message' => 'O address não pode estar vazio'),
        array('role', 'message' => 'A role não pode estar vazio'),
    );
    /* verifica a precença
     não pode ser nulo mas para numeros*/
    static $validates_numericality_of = array(
        array('phone', 'greater_than' => 0,'message' => 'O phone não pode estar vazio'),
        array('nif', 'greater_than' => 0,'message' => 'O nif não pode estar vazio'),
    );
    /* verifica a precença
    na base de dados*/
    static $validates_uniqueness_of = array(
        array('username', 'message' => 'O username ja existe'),
        array('phone', 'message' => 'O numero de telefone ja existe'),

   );
    /* verifica a precença
 se o numero não tem mais de 9*/
    static $validates_size_of = array(
        array('phone', 'maximum' => 9, 'too_long' => 'should be short and sweet'),
        array('nif', 'maximum' => 9, 'too_long' => 'should be short and sweet')
   );
    /* verifica a precença
 de caracteres especiais e numeros*/
    static $validates_format_of = array(
        array('email', 'with' =>
        '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/'),
       array('password', 'with' =>
        '/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/', 'message' => 'Password demasiado fraca')
    );


}