<?php
require 'functions.php';
if(isset($_POST['EDIT'])){
    $product_id = $_POST['productEDITid'];
    settype($product_id, "integer");
    $product_name = $_POST['productEDIT'];
    settype($product_name, "string");
    $cashier_id = $_POST['cashierEDIT'];
    settype($cashier_id, "integer");
    $category_id = $_POST['categoryEDIT'];
    settype($category_id, "integer");
    $product_price = $_POST['productEDITprice'];
    settype($product_price, "integer");

     $datas = [
         "product_name" => $product_name,
         "product_price" => $product_price,
         "category_id" => $category_id,
         "cashier_id" => $cashier_id,
         // product_id diakhirkan, maksudnya untuk update nanti
         "product_id" => $product_id
    ];

    // var_dump(update_data($datas));
    if(update_data($datas) == true){
        header("location: 6c.php");
    }else{
        echo "<script>alert('gagal tambah data');</script>";
        header("location: 6c.php");
    }
}