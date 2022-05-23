<?php

/* Arranque da aplicação */
require_once './startup/boot.php';

/* Controladores */
require_once './controllers/BaseController.php';
require_once './controllers/SiteController.php';
require_once './controllers/AuthController.php';
require_once './controllers/ProductController.php';
require_once './controllers/BillController.php';
require_once './controllers/UserController.php';


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
                    $siteController = new SiteController();
                    $siteController->index();
                    break;
                case 'show.php':
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
            break;

        case 'auth':
            $authController = new AuthController();
            switch ($action) {
                case 'sign':
                    $authController->sign();
                    break;
                case 'signin':
                    $authController->signin();
                    break;
            }
            break;

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
                case 'show.php':
                    $id = $_GET[('id')];
                    $productsController->show($id);
                    break;
                case 'delete':
                    $id = $_GET[('id')];
                    $productsController->delete($id);
                    break;
            }
            break;

        case 'bill':
            $BillController = new BillController();
            switch ($action) {
                case 'index':
                    $BillController->index();
                    break;
                case 'create':
                    $BillController->create();
                    break;
                case 'save':
                    $BillController->store();
                    break;
                case 'edit':
                    $id = $_GET[('id')];
                    $BillController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $BillController->update($id);
                    break;
                case 'show.php':
                    $id = $_GET[('id')];
                    $BillController->show($id);
                    break;
                case 'delete':
                    $id = $_GET[('id')];
                    $BillController->delete($id);
                    break;
            }
            break;

        case 'users':
            $UserController = new UserController();
            switch ($action) {
                case 'index':
                    $UserController->index();
                    break;
                case 'create':
                    $UserController->create();
                    break;
                case 'save':
                    $UserController->store();
                    break;
                case 'edit':
                    $id = $_GET[('id')];
                    $UserController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $UserController->update($id);
                    break;
                case 'show.php':
                    $id = $_GET[('id')];
                    $UserController->show($id);
                    break;
                case 'delete':
                    $id = $_GET[('id')];
                    $UserController->delete($id);
                    break;
            }
            break;

        case 'ivas':
            $IvaController = new IvaController();
            switch ($action) {
                case 'index':
                    $IvaController->index();
                    break;
                case 'create':
                    $IvaController->create();
                    break;
                case 'save':
                    $IvaController->store();
                    break;
                case 'edit':
                    $id = $_GET[('id')];
                    $IvaController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $IvaController->update($id);
                    break;
                case 'show.php':
                    $id = $_GET[('id')];
                    $IvaController->show($id);
                    break;
                case 'delete':
                    $id = $_GET[('id')];
                    $IvaController->delete($id);
                    break;
            }
            break;
    }
}
