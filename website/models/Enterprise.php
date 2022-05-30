<?php

class Enterprise extends \ActiveRecord\Model
{
    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║       ou uma string em branco         ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_presence_of = array(
        array('social_designation', 'message' => 'O campo Designação Social não pode estar vazio'),
        array('email', 'message' => 'O campo E-mail não pode estar vazio'),
        array('postal_code', 'message' => 'O campo Código Postal não pode estar vazio'),
        array('country', 'message' => 'O campo País não pode estar vazio'),
        array('city', 'message' => 'O campo Cidade não pode estar vazio'),
        array('locale', 'message' => 'O campo Localidade não pode estar vazio'),
        array('address', 'message' => 'O campo Morada não pode estar vazio')
    );

    /* ╔═══════════════════════════════════════╗ */
    /* ║     Verifica se o atributo é nulo     ║ */
    /* ║            para Númericos             ║ */
    /* ╚═══════════════════════════════════════╝ */

    static $validates_numericality_of = array(
        array('phone', 'greater_than' => 0,'message' => 'O campo Telemóvel não pode estar vazio'),
        array('nif', 'greater_than' => 0,'message' => 'O campo Nif não pode estar vazio'),
        array('social_capital', 'greater_than' => 0,'message' => 'O campo Capital Social não pode estar vazio')
    );

    /* ╔═════════════════════════════════════════╗ */
    /* ║     Verifica se o valor do atributo     ║ */
    /* ║             já existe ou não            ║ */
    /* ╚═════════════════════════════════════════╝ */

    static $validates_uniqueness_of = array(
        array('phone', 'message' => 'O Número de Telemóvel já existe')
    );

    /* ╔════════════════════════════════╗ */
    /* ║     Verifica se o atributo     ║ */
    /* ║        tem 9 caracteres        ║ */
    /* ╚════════════════════════════════╝ */

    static $validates_size_of = array(
        array('phone', 'minimum' => 9, 'too_short' => 'Número de Telemóvel com formatação incorreta'),
        array('nif', 'minimum' => 9, 'too_short' => 'Nif com formatação incorreta')
    );

    /* ╔═══════════════════════════════════════════════╗ */
    /* ║     Verifica se o atributo tem caracteres     ║ */
    /* ║              especiais e números              ║ */
    /* ╚═══════════════════════════════════════════════╝ */

    static $validates_format_of = array(
        array('email', 'with' =>
            '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', 'message' => 'E-mail com formatação incorreta'),
        array('postal_code', 'with' =>
            '/^\d{4}-\d{3}?$/', 'message' => 'Código Postal com formatação incorreta')
    );
}