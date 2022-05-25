<?php

class Iva extends \ActiveRecord\Model
{
    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║       ou uma string em branco         ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_presence_of = array(
        array('percentage', 'message' => 'O campo Percentagem não pode estar vazio'),
        array('description', 'message' => 'O campo Descrição não pode estar vazio')
    );

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║            para Númericos             ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_numericality_of = array(
        array('vigour', 'less_than' => 2,'message' => 'O campo Vigor não pode estar vazio')
    );
}