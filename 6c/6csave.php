<?php
require 'functions.php';
if(isset($_POST['ADD'])){
    $product_name = $_POST['productADD'];
    settype($product_name, "string");
    $cashier_id = $_POST['cashierADD'];
    settype($cashier_id, "integer");
    $category_id = $_POST['categoryADD'];
    settype($category_id, "integer");
    $product_price = $_POST['productADDprice'];
    settype($product_price, "integer");

    $datas = [
        // penjualan_id
        "",
        // foreign keys fields
        $product_name,
        $product_price,
        $category_id,
        $cashier_id
    ];
    
    // var_dump(add_data($datas));
    if(add_data($datas) == true){
        header("location: 6c.php");
    }else{
        echo "<script>alert('gagal tambah data');</script>";
        header("location: 6c.php");
    }
}