<?php

require_once './models/Data.php';

class ProductsController
{
    public function index(){
        $connection = mysqli_connect(HOST, USER, PASS, DB)
        or
        die("Could not connect: " . mysql_error());
        //$sql = select . "products";
        $sql = "SELECT * FROM products";
        $result = mysqli_query($connection, $sql);
        require './views/products/index.php';

    }

    public function create(){
        // anida a trabalhar
    }
}