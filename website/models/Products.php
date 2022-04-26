<?php

class Products
{
    public function getAll(){
        $connection = mysqli_connect(HOST, USER, PASS, DB)
        or
        die("Could not connect: " . mysql_error());
        $sql = "SELECT * FROM products";
        $result = mysqli_query($connection, $sql);
        return $result;
    }
    public function create_produto(){}
    public function update_produto(){}
    public function delete_produto($id_product){
        $connection = mysqli_connect(HOST, USER, PASS, DB)
        or
        die("Could not connect: " . mysql_error());

        $sql = "DELETE FROM products
	        WHERE id_product=$id_product";
        $result = mysqli_query($connection, $sql);


    }


}