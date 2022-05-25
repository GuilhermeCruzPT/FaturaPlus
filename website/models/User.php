<?php

class User extends \ActiveRecord\Model
{
    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║       ou uma string em branco         ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_presence_of = array(
        array('username', 'message' => 'O campo Username não pode estar vazio'),
        array('password', 'message' => 'O campo Password não pode estar vazio'),
        array('image', 'message' => 'O campo Imagem não pode estar vazio'),
        array('name', 'message' => 'O campo Nome não pode estar vazio'),
        array('email', 'message' => 'O campo E-mail não pode estar vazio'),
        array('postal_code', 'message' => 'O campo Código Postal não pode estar vazio'),
        array('birth', 'message' => 'O campo Data de Nascimento não pode estar vazio'),
        array('genre', 'message' => 'O campo Género não pode estar vazio'),
        array('country', 'message' => 'O campo País não pode estar vazio'),
        array('city', 'message' => 'O campo Cidade não pode estar vazio'),
        array('locale', 'message' => 'O campo Localidade não pode estar vazio'),
        array('address', 'message' => 'O campo Morada não pode estar vazio'),
        array('role', 'message' => 'O campo Permissão não pode estar vazio')
    );

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║            para Númericos             ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_numericality_of = array(
        array('phone', 'greater_than' => 0,'message' => 'O campo Telemóvel não pode estar vazio'),
        array('nif', 'greater_than' => 0,'message' => 'O campo Nif não pode estar vazio')
    );

    /* ╔═════════════════════════════════════════╗ */
    /* ║     Verifica se o valor do atributo     ║ */
    /* ║             já existe ou não            ║ */
    /* ╚═════════════════════════════════════════╝ */

    static $validates_uniqueness_of = array(
        array('username', 'message' => 'O Username já existe'),
        array('phone', 'message' => 'O Número de Telemóvel já existe')
   );

    /* ╔════════════════════════════════╗ */
    /* ║     Verifica se o atributo     ║ */
    /* ║        tem 9 caracteres        ║ */
    /* ╚════════════════════════════════╝ */

    static $validates_size_of = array(
        array('phone', 'maximum' => 9, 'too_long' => 'O Número de Telemóvel é demasiado longo'),
        array('nif', 'maximum' => 9, 'too_long' => 'O Nif é demasiado longo')
   );

    /* ╔═══════════════════════════════════════════════╗ */
    /* ║     Verifica se o atributo tem caracteres     ║ */
    /* ║              especiais e números              ║ */
    /* ╚═══════════════════════════════════════════════╝ */

    static $validates_format_of = array(
        array('email', 'with' =>
        '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', 'message' => 'E-mail com formatação incorreta'),
        array('password', 'with' =>
        '/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/', 'message' => 'Password é demasiado fraca')
    );
}