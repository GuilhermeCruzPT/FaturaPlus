<?php

class Product extends \ActiveRecord\Model
{
    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║       ou uma string em branco         ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_presence_of = array(
        array('reference', 'message' => 'O campo Referência não pode estar vazio'.'<br>'),
        array('title', 'message' => 'O campo Título não pode estar vazio'.'<br>'),
        array('description', 'message' => 'O campo Descrição não pode estar vazio'.'<br>')
    );

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║            para Númericos             ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_numericality_of = array(
        array('price', 'greater_than' => 0,'message' => 'O campo Preço não pode estar vazio'.'<br>'),
        array('stock', 'greater_than' => 0,'message' => 'O campo Estoque não pode estar vazio'.'<br>'),
        array('iva_id', 'greater_than' => 0,'message' => 'O campo Iva não pode estar vazio'.'<br>')
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
        array('iva')
    );
}