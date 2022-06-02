<?php

class Bill extends \ActiveRecord\Model
{

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║       ou uma string em branco         ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_presence_of = array(
        array('date', 'message' => 'O campo Data não pode estar vazio'.'<br>'),
        array('reference', 'message' => 'O campo Referência não pode estar vazio'.'<br>'),
        array('state', 'message' => 'O campo Estado não pode estar vazio'.'<br>')
    );

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║            para Númericos             ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_numericality_of = array(
        array('total_value', 'greater_than' => 0,'message' => 'O campo Valor Total não pode estar vazio'.'<br>'),
        array('total_iva', 'greater_than' => 0,'message' => 'O campo Iva Total não pode estar vazio'.'<br>'),
        array('client_reference_id', 'greater_than' => 0,'message' => 'O campo Referência Cliente não pode estar vazio'.'<br>'),
        array('employee_reference_id', 'greater_than' => 0,'message' => 'O campo Referência Funcionário não pode estar vazio'.'<br>')
    );

    /* ╔═════════════════════════════════════════╗ */
    /* ║     Verifica se o valor do atributo     ║ */
    /* ║             já existe ou não            ║ */
    /* ╚═════════════════════════════════════════╝ */

    static $validates_uniqueness_of = array(
        array('reference', 'message' => 'A Referência já existe'.'<br>')
    );

    /* ╔═════════════════════════════════╗ */
    /* ║     Vai buscar o valor para     ║ */
    /* ║      da chave estrangeira       ║ */
    /* ╚═════════════════════════════════╝ */

    static $belongs_to = array(
        array('client_reference',
            'foreign_key'=>'client_reference_id',
            'primary_key'=>'id',
            'class_name' => 'User'),
        array('employee_reference',
            'foreign_key'=>'employee_reference_id',
            'primary_key'=>'id',
            'class_name' => 'User')
    );

}