<?php
require '../functions.php';

$keyword = $_POST['keyword'];
$datas = get_data_by_keyword($keyword);

// echo $id;
if(count($datas) > 0){
    $html = "";
    $html .= '<table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col" class="th" id="th_first">No</th>
                    <th scope="col" class="th">Cashier</th>
                    <th scope="col" class="th">Product</th>
                    <th scope="col" class="th">Category</th>
                    <th scope="col" class="th">Price</th>
                    <th scope="col" class="th" id="th_end">Action</th>
                </tr>
            </thead>
            <tbody>';
            $i=1;
            foreach($datas as $data){
            $html .='<tr>
                        <th scope="row">'.$i.'</th>
                        <td>'.$data["cashier_name"].'</td>
                        <td>'.$data["product_name"].'</td>
                        <td>'.$data["category_name"].'</td>
                        <td>'.$data["product_price"].'</td>
                        <td>
                            <a href="#" class="edit" id="'.$data["product_id"].'" data-toggle="modal" data-target="#modalEDIT"><i class="fa fa-edit"></i></a>
                            <a href="#" name="'.$data['cashier_name'].'" class="hapus" id="'.$data["product_id"].'"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>';
            $i++;
            }
                
    $html .=  '</tbody>
        </table>';
    echo $html;
}else{
    echo '<center><h4>Data Tidak Ditemukan</h4></center>';
}