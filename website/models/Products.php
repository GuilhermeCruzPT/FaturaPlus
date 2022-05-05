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
    public function create_produto($referencia,$descricao,$preco,$stock,$vigor){

        $connection = mysqli_connect(HOST, USER, PASS, DB)
        or
        die("Could not connect: " . mysql_error());

        $sql = "INSERT INTO products(referencia,descricao,preco,stock,vigor) 
               VALUES($referencia,$descricao,$preco,$stock,$vigor)";
        $result = mysqli_query($connection, $sql);

        if ($result) {
         return $result;
        }else {
            return "not sucess";
        }




    }
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