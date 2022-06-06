<?php

class PanelController extends BaseController
{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION["user_id"])) {
            if ($_SESSION["permission"] == 'c')
                header('Location: router.php?c=site&a=index');
        }
        else header('Location: router.php?c=auth&a=signin');
    }

    public function index()
    {
        $users = User::all();
        $bills = Bill::all();
        $lines = Bill_line::all();
        $products = Product::all();
        $ivas = Iva::all();
        $this->renderViewBackend('panel/index',[
            'users' => $users,
            'bills' => $bills,
            'lines' => $lines,
            'products' => $products,
            'ivas' => $ivas
        ]);
    }
}