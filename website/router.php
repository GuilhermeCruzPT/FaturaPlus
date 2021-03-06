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
require_once './controllers/IvaController.php';
require_once './controllers/EnterpriseController.php';
require_once './controllers/BillLinesController.php';
require_once './controllers/PanelController.php';


if (!(isset($_GET['c']) && isset($_GET['a']))) {
    // Controller e action por omissão
    $siteController = new SiteController();
    $siteController->index();
} else {
    $controller = $_GET['c'];
    $action = $_GET['a'];

    switch ($controller) {

        case 'site':
            $siteController = new SiteController();
            switch ($action) {
                case 'index':
                    $siteController->index();
                    break;
                /*case 'show':
                    $siteController->demo();
                    break;*/
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
                case 'edit':
                    $id = $_GET[('id')];
                    $siteController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $siteController->update($id);
                    break;
                case 'show':
                    $id = $_GET[('id')];
                    $siteController->show($id);
                    break;
                case 'pdfindex':
                    $id = $_GET[('id')];
                    $siteController->pdfindex($id);
                    break;
                case 'pdfshow':
                    $id = $_GET[('id')];
                    $siteController->pdfshow($id);
                    break;
                case 'pdftrans':
                    $id = $_GET[('id')];
                    $siteController->pdftrans($id);
                    break;
                case 'terms':
                    $siteController->terms();
                    break;
                case 'privacy':
                    $siteController->privacy();
                    break;
            }
            break;

        case 'auth':
            $authController = new AuthController();
            switch ($action) {
                case 'signin':
                    $authController->signin();
                    break;
                case 'verify_login':
                    $authController->verify_login();
                    break;
                case 'signup':
                    $authController->signup();
                    break;
                case 'save_signup':
                    $authController->save_signup();
                    break;
                case 'logout':
                    $authController->logout();
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

        case 'bills':
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
                case 'show':
                    $id = $_GET[('id')];
                    $BillController->show($id);
                    break;
                case 'delete':
                    $id = $_GET[('id')];
                    $BillController->delete($id);
                    break;
                case 'pdfshow':
                    $id = $_GET[('id')];
                    $BillController->pdfshow($id);
                    break;
                case 'pdftrans':
                    $id = $_GET[('id')];
                    $BillController->pdftrans($id);
                    break;
                case 'index_lines':
                    $billid = $_GET[('billid')];
                    $BillController->index_lines($billid);
                    break;
                case 'edit_lines':
                    $id = $_GET[('id')];
                    $BillController->edit_lines($id);
                    break;
                case 'update_lines':
                    $id = $_GET[('id')];
                    $BillController->update_lines($id);
                    break;
                case 'delete_lines':
                    $id = $_GET[('id')];
                    $BillController->delete_lines($id);
                    break;
                case 'create_lines':
                    $id = $_GET[('id')];
                    $BillController->create_lines($id);
                    break;
                case 'save_lines':
                    $BillController->store_lines();
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
                case 'show':
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
                case 'show':
                    $id = $_GET[('id')];
                    $IvaController->show($id);
                    break;
                case 'delete':
                    $id = $_GET[('id')];
                    $IvaController->delete($id);
                    break;
            }
            break;

        case 'enterprises':
            $EnterprisesController = new EnterpriseController();
            switch ($action) {
                case 'index':
                    $EnterprisesController->index();
                    break;
                case 'edit':
                    $id = $_GET[('id')];
                    $EnterprisesController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $EnterprisesController->update($id);
                    break;
                case 'show':
                    $id = $_GET[('id')];
                    $EnterprisesController->show($id);
                    break;
            }
            break;

        case 'lines':
            $BillLinesController = new BillLinesController();
            switch ($action) {
                case 'index':
                    $BillLinesController->index();
                    break;
                case 'create':
                    $BillLinesController->create();
                    break;
                case 'save':
                    $BillLinesController->store();
                    break;
                case 'edit':
                    $id = $_GET[('id')];
                    $BillLinesController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $BillLinesController->update($id);
                    break;
                case 'show':
                    $id = $_GET[('id')];
                    $BillLinesController->show($id);
                    break;
                case 'delete':
                    $id = $_GET[('id')];
                    $BillLinesController->delete($id);
                    break;
            }
            break;

        case 'panel':
            $PanelController = new PanelController();
            switch ($action) {
                case 'index':
                    $PanelController->index();
                    break;
            }
            break;
    }
}
