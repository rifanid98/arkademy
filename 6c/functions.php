<?php
// koneksi ke database
$conn = mysqli_connect("localhost","root","","penjualanku");

function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function get_cashiers () {
    $query = "SELECT * FROM cashier";
    
    return query($query);
}

function get_products () {
    $query = "SELECT * FROM product";
    
    return query($query);
}

function get_categories () {
    $query = "SELECT * FROM category";
    
    return query($query);
}

// function get_category_by_product ($product_id) {
//     $query = "";
    
//     return query($query);
// } 

function get_product_by_id ($id) {
    $query = "SELECT * FROM product WHERE product_id = $id";
    
    return query($query);
}

function get_data () {
    $query = "SELECT 
        prd.product_id,
        csh.cashier_name,
        prd.product_name,
        ctg.category_name,
        prd.product_price 
        FROM 
        cashier AS csh INNER JOIN 
        product AS prd INNER JOIN 
        category AS ctg 
        WHERE 
        prd.cashier_id=csh.cashier_id AND 
        prd.category_id=ctg.category_id 
        ORDER BY prd.product_id";

    return query($query);
}

function get_data_by_keyword ($keyword) {
     $query = "SELECT 
        prd.product_id,
        csh.cashier_name,
        prd.product_name,
        ctg.category_name,
        prd.product_price 
        FROM 
        cashier AS csh INNER JOIN 
        product AS prd INNER JOIN 
        category AS ctg 
        WHERE 
        prd.cashier_id=csh.cashier_id AND 
        prd.category_id=ctg.category_id AND (
            prd.product_name LIKE '%$keyword%' OR 
            prd.product_price  LIKE '%$keyword%' OR
            ctg.category_name LIKE '%$keyword%' OR 
            csh.cashier_name LIKE '%$keyword%'
        )
        ORDER BY prd.product_id";

    return query($query);
}

function get_data_by_id ($id) {
      $query = "SELECT * FROM product WHERE product_id = '$id'";
    // return $query;
    return query($query);
}


function add_data ($datas) {
    $query = "INSERT INTO product VALUES(";
    foreach ($datas as $data) {
        if(gettype($data) == "string"){
            $query .= "'$data',";
        }else if(gettype($data) == "integer"){
            $query .= "$data,";

        }
    }
    $query = substr($query, 0, -1);
    $query .= ")";
    // echo $query;
    global $conn;
    if(mysqli_query($conn, $query)){
        return true;
    }else{
        return false;
    }
}

function update_data ($datas) {
    $query = "UPDATE product SET ";
    foreach ($datas as $key => $value) {
        if($key == "product_id"){
            // kalo sudah sampai product_id, hapus 1 karakter terakhir
            // yaitu , karena akan menyebabkan error dan query yang salah
            $query = substr(trim($query), 0, -1);
            $query .= " WHERE product_id = $value";
        }else{
            if(gettype($value) == "string"){
                $query .= "$key = '$value', ";
            }else if(gettype($value) == "integer"){
                $query .= "$key = $value, ";
            }
        }
    }
    // echo $query;
    global $conn;
    if(mysqli_query($conn, $query)){
        return true;
    }else{
        return false;
    }
}

function delete_data_by_id ($id) {
    $query = "DELETE FROM product WHERE product_id = $id";
    global $conn;
    if(mysqli_query($conn, $query)){
        return true;
    }else{
        return false;
    }
}