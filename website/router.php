<?php

/* Arranque da aplicação */
require_once './startup/boot.php';

/* Controladores */
require_once './controllers/BaseController.php';
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
                case 'backoffice':
                    $siteController->backoffice();
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
                case 'save':
                    $productsController->store();
                    break;
                case 'edit':
                    $id_product = $_GET[('id_product')];
                    $productsController->edit($id_product);
                    break;
                case 'update':
                    $id_product = $_GET[('id_product')];
                    $productsController->update($id_product);
                    break;
                case 'show':
                    $id_product = $_GET[('id_product')];
                    $productsController->show($id_product);
                    break;
                case 'delete':
                    $id_product = $_GET[('id_product')];
                    $productsController->delete($id_product);
                    break;
            }
            break;
    }
}
