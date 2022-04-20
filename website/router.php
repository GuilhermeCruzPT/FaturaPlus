<?php

/* Arranque da aplicação */
require_once './startup/boot.php';

/* Controladores */
require_once './controllers/SiteController.php';

if(!(isset($_GET['c']) && isset($_GET['a']))){
    // Controller e action por omissão
    $siteController = new SiteController();
    $siteController->index();
}else {
    $controller = $_GET['c'];
    $action = $_GET['a'];

    switch ($controller) {
        case 'site':
            $siteController = new SiteController();
            switch ($action) {
                case 'index':
                    $siteController->index();
                    break;
                case 'show':
                    $siteController->demo();
                    break;
                case 'name':
                    $siteController->name();
                    break;
                case 'plano':
                    $siteController->plano();
                    break;
                case 'processa':
                    $siteController->processa();
                    break;
            }
            break;
    }
}
