<?php

/* Arranque da aplicação */
require_once './startup/boot.php';

/* Controladores */
require_once './controllers/BaseController.php';
require_once './controllers/SiteController.php';
require_once './controllers/AuthController.php';
require_once './controllers/ProductController.php';
require_once './controllers/BillController.php';


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
            $productsController = new ProductController();
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
                    $id = $_GET[('id')];
                    $productsController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $productsController->update($id);
                    break;
                case 'show':
                    $id = $_GET[('id')];
                    $productsController->show($id);
                    break;
                case 'delete':
                    $id = $_GET[('id')];
                    $productsController->delete($id);
                    break;
            }
            break;
    }
}
