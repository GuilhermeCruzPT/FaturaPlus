<?php
# * Formato das Constantes *
# --------------------------
# define('APP_NAME', 'Teste');
# ----------- or -----------
# const APP_NAME = 'Teste';


# Arquivos diretórios raízes
$PastaInterna = "FaturaPlus/website/";
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}");

if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') {
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");
} else {
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}");
}


# Diretórios Específicos
define('APP_BASE_URL', DIRPAGE . 'router.php');
define('DIRIMG', DIRPAGE . "public/img/");
define('DIRCSS', DIRPAGE . "public/css/");
define('DIRJS', DIRPAGE . "public/js/");


# Acesso a Base de Dados
define('HOST', "localhost");
define('DB', "faturaplus");
define('USER', "root");
define('PASS', "");

# Constantes
define('APP_NAME', "Fatura Plus");

# Active Record

require '../vendor/autoload.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('./models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root@localhost/faturaplus',
        )
    );
});
