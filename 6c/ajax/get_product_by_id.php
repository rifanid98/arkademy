<?php
require '../functions.php';

$id = $_POST['id'];
$datas = get_product_by_id($id);

// echo $id;
echo json_encode($datas[0], JSON_PRETTY_PRINT);