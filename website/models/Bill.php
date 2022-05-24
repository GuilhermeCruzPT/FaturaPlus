<?php

class Bill extends \ActiveRecord\Model
{
    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║       ou uma string em branco         ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_presence_of = array(
        array('date', 'message' => 'O campo Data não pode estar vazio'),
        array('total_iva', 'message' => 'O campo Iva Total não pode estar vazio'),
        array('state', 'message' => 'O campo Estado não pode estar vazio'),
        array('client_reference_id', 'message' => 'O campo Referência Cliente não pode estar vazio'),
        array('employee_reference_id', 'message' => 'O campo Referência Funcionário não pode estar vazio'),
    );

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║       ou uma string em branco         ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_numericality_of = array(
        array('total_value', 'greater_than' => 0,'message' => 'O campo Valor Total não pode estar vazio'),
        array('client_reference_id', 'greater_than' => 0,'message' => 'O campo Referência Cliente não pode estar vazio'),
        array('employee_reference_id', 'greater_than' => 0,'message' => 'O campo Referência Funcionário não pode estar vazio'),
    );

    /* ╔═════════════════════════════════╗ */
    /* ║     Vai buscar o valor para     ║ */
    /* ║      da chave estrangeira       ║ */
    /* ╚═════════════════════════════════╝ */

    static $belongs_to = array(
        array('user')
    );
}