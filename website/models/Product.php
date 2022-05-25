<?php

class Product extends \ActiveRecord\Model
{
    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║       ou uma string em branco         ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_presence_of = array(
        array('reference', 'message' => 'O campo Referência não pode estar vazio'),
        array('description', 'message' => 'O campo Descrição não pode estar vazio')
    );

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║            para Númericos             ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_numericality_of = array(
        array('price', 'greater_than' => 0,'message' => 'O campo Preço não pode estar vazio'),
        array('stock', 'greater_than' => 0,'message' => 'O campo Estoque não pode estar vazio'),
        array('iva_id', 'greater_than' => 0,'message' => 'O campo Iva não pode estar vazio')
    );

    /* ╔═════════════════════════════════╗ */
    /* ║     Vai buscar o valor para     ║ */
    /* ║      da chave estrangeira       ║ */
    /* ╚═════════════════════════════════╝ */

    static $belongs_to = array(
        array('iva')
    );
}