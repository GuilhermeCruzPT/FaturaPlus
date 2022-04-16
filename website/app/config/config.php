<?php
# * Formato das Constantes *
# --------------------------
# define('APP_NAME', 'Teste');
# ----------- or -----------
# const APP_NAME = 'Teste';


# Arquivos diretórios raízes
$PastaInterna = "IPL/FaturaPlus/website/";
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}");

if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/'){
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");
}else{
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}");
}


# Diretórios Específicos
define('DIRIMG', DIRPAGE."public/img/");
define('DIRCSS', DIRPAGE."public/css/");
define('DIRJS', DIRPAGE."public/js/");


# Acesso a Base de Dados
define('HOST', "localhost");
define('DB', "faturaplus");
define('USER', "root");
define('PASS', "");


# Constantes
define('APP_NAME', "Fatura Plus");
