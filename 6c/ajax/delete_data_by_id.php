<?php
require '../functions.php';
$id = $_POST['id'];
if(delete_data_by_id($id) == true){
    echo json_encode([
        "result" =>  true
    ], JSON_PRETTY_PRINT);
}else{
    echo json_encode([
        "result" =>  true
    ], JSON_PRETTY_PRINT);
}