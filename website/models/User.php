<?php

class User extends \ActiveRecord\Model
{
    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║       ou uma string em branco         ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_presence_of = array(
        array('username', 'message' => 'O campo Username não pode estar vazio'.'<br>'),
        array('password', 'message' => 'O campo Password não pode estar vazio'.'<br>'),
        array('name', 'message' => 'O campo Nome não pode estar vazio'.'<br>'),
        array('email', 'message' => 'O campo E-mail não pode estar vazio'.'<br>'),
        array('postal_code', 'message' => 'O campo Código Postal não pode estar vazio'.'<br>'),
        array('birth', 'message' => 'O campo Data de Nascimento não pode estar vazio'.'<br>'),
        array('genre', 'message' => 'O campo Género não pode estar vazio'.'<br>'),
        array('country', 'message' => 'O campo País não pode estar vazio'.'<br>'),
        array('city', 'message' => 'O campo Cidade não pode estar vazio'.'<br>'),
        array('locale', 'message' => 'O campo Localidade não pode estar vazio'.'<br>'),
        array('address', 'message' => 'O campo Morada não pode estar vazio'.'<br>'),
        array('role', 'message' => 'O campo Permissão não pode estar vazio'.'<br>')
    );

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║            para Númericos             ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_numericality_of = array(
        array('phone', 'greater_than' => 0,'message' => 'O campo Telemóvel não pode estar vazio'.'<br>'),
        array('nif', 'greater_than' => 0,'message' => 'O campo Nif não pode estar vazio'.'<br>')
    );

    /* ╔═════════════════════════════════════════╗ */
    /* ║     Verifica se o valor do atributo     ║ */
    /* ║             já existe ou não            ║ */
    /* ╚═════════════════════════════════════════╝ */

    static $validates_uniqueness_of = array(
        array('email', 'message' => 'O E-mail já existe'.'<br>'),
        array('username', 'message' => 'O Username já existe'.'<br>'),
        array('phone', 'message' => 'O Número de Telemóvel já existe'.'<br>')
   );

    /* ╔════════════════════════════════╗ */
    /* ║     Verifica se o atributo     ║ */
    /* ║        tem 9 caracteres        ║ */
    /* ╚════════════════════════════════╝ */

    static $validates_size_of = array(
        array('phone', 'minimum' => 9, 'too_short' => 'Número de Telemóvel com formatação incorreta'.'<br>'),
        array('nif', 'minimum' => 9, 'too_short' => 'Nif com formatação incorreta'.'<br>'),
        array('username', 'minimum' => 3, 'too_short' => 'O campo Username tem de ter no mínimo 3 caracteres'.'<br>')
   );

    /* ╔═══════════════════════════════════════════════╗ */
    /* ║     Verifica se o atributo tem caracteres     ║ */
    /* ║              especiais e números              ║ */
    /* ╚═══════════════════════════════════════════════╝ */

    static $validates_format_of = array(
        array('email', 'with' =>
        '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', 'message' => 'E-mail com formatação incorreta'.'<br>'),
        array('password', 'with' =>
        '/^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/', 'message' => 'Password é demasiado fraca, tem que possuir Maiscúlas e números'.'<br>'),
        array('postal_code', 'with' =>
            '/^\d{4}-\d{3}?$/', 'message' => 'Código Postal com formatação incorreta'.'<br>')
    );
}