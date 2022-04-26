<?php

/* Arranque da aplicação */
require_once './startup/boot.php';

/* Controladores */
require_once './controllers/SiteController.php';
require_once './controllers/AuthController.php';
require_once './controllers/ProductsController.php';

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

        case 'auth':
            $siteController = new AuthController();
            switch ($action) {
                case 'sign':
                    $siteController->sign();
                    break;
            }

        case 'products':
            $productsController = new ProductsController();
            switch ($action) {
                case 'index':
                    $productsController->index();
                    break;
                case 'create':
                    $productsController->create();
                    break;
                case 'delete':
                    $productsController->delete();
                    break;
            }
            break;
    }
}
