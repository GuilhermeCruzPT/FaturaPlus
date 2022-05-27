<?php

class Bill_line extends \ActiveRecord\Model
{







    /* ╔═════════════════════════════════╗ */
    /* ║     Vai buscar o valor para     ║ */
    /* ║      da chave estrangeira       ║ */
    /* ╚═════════════════════════════════╝ */

    static $belongs_to = array(
        array('product'),
        array('bill'),
    );
}