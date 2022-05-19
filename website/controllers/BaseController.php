<?php

class BaseController{

    public function renderView($view, $params = []) {
        extract($params);
        require_once "./views/template/header.php";
        require_once "./views/$view.php";
        require_once "./views/template/footer.php";
    }

    public function renderViewBackend($view, $params = []) {
        extract($params);
        require_once "./views/backoffice/backoffice.php";
        require_once "./views/backoffice/$view.php";
    }


}