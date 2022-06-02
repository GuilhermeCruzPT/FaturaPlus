<?php

class Bill_line extends \ActiveRecord\Model
{

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║            para Númericos             ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_numericality_of = array(
        array('quantity', 'greater_than' => 0,'message' => 'O campo Quantidade não pode estar vazio'.'<br>'),
        array('unitary_value', 'greater_than' => 0,'message' => 'O campo Valor Unitario não pode estar vazio'.'<br>'),
        array('iva_value', 'greater_than' => 0,'message' => 'O campo Valor Iva não pode estar vazio'.'<br>'),
        array('product_id', 'greater_than' => 0,'message' => 'O campo Referência Produto não pode estar vazio'.'<br>'),
        array('bill_id', 'greater_than' => 0,'message' => 'O campo Referência Fatura não pode estar vazio'.'<br>')
    );

    /* ╔═════════════════════════════════╗ */
    /* ║     Vai buscar o valor para     ║ */
    /* ║      da chave estrangeira       ║ */
    /* ╚═════════════════════════════════╝ */

    static $belongs_to = array(
        array('product'),
        array('bill'),
    );
}