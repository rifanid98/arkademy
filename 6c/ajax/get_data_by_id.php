<?php
require '../functions.php';

$id = $_POST['id'];
$datas = get_data_by_id($id);

// echo $id;
// var_dump($datas);
echo json_encode($datas[0], JSON_PRETTY_PRINT);