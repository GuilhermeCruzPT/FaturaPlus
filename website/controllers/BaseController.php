<?php

class BaseController{

    public function renderView($view, $params = []) {
        extract($params);
        require_once "./views/layout/header.php";
        require_once "./views/$view.php";
        require_once "./views/layout/footer.php";
    }

    public function renderViewBackend($view, $params = []) {
        extract($params);
        require_once "./views/backoffice/backoffice.php";
        require_once "./views/backoffice/$view.php";
    }

    public function renderViewfrontend($view, $params = []) {
        extract($params);
        require_once "./views/$view.php";
    }

    public function renderViewDetalhe($view, $params = []) {
        extract($params);
        require_once "./views/site/$view.php";
    }
}