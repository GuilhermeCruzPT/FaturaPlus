<?php

class Iva extends \ActiveRecord\Model
{
    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║       ou uma string em branco         ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_presence_of = array(
        array('description', 'message' => 'O campo Descrição não pode estar vazio'.'<br>')
    );

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║            para Númericos             ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_numericality_of = array(
        array('percentage', 'greater_than' => 0,'message' => 'O campo Percentagem não pode estar vazio'.'<br>'),
        array('vigour', 'less_than' => 2,'message' => 'O campo Vigor não pode estar vazio'.'<br>')
    );

    /* ╔════════════════════════════════╗ */
    /* ║     Verifica se o atributo     ║ */
    /* ║        tem 2 caracteres        ║ */
    /* ╚════════════════════════════════╝ */

    static $validates_size_of = array(
        array('percentage', 'minimum' => 2, 'too_short' => 'Percentagem com formatação incorreta'.'<br>')
    );
}