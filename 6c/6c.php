<?php
require "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* navbar shadow */
        .navbar {
            box-shadow: 0px 2px 2px 3px #cecece ;
            margin-bottom: 50px;
        }
        /* navbar input placeholder color */
        .navbar form .form-control::-webkit-input-placeholder { 
        color: #FFFFFF;
        }

        .navbar form .form-control::-moz-placeholder {
        color: #FFFFFF;
        }
        .navbar form .form-control:-ms-input-placeholder {
        color: #FFFFFF;
        }
        .navbar form .form-control:placeholder {
        color: #FFFFFF;
        }
        /* table text-align, table shadow, table border-rdaius */
        table {
            text-align: center;
            box-shadow: 0px 2px 2px 3px #cecece ;
            border-radius: 20px;
        }
        /* th border radius */
        #th_first {
            border-radius: 20px 0 0 0;
        }
        #th_end {
            border-radius: 0 20px 0 0;
        }
        /* font weight of tr and th (title and number) */
        table tr th {
            font-weight: bold;
        }
        /* title background color */
        .th {
            background-color: #fadc9c;
            color: #FFF;
        }
        /* size of edit and delete icons */
        .edit, .hapus {
            font-size: 25px;
        }
        /* color of edit and delete icons */
        .edit {
            color: #c6e5ab;
        }
        .hapus {
            color: #eb8682;
        }
        /* removing header and footer border of modals */
        .modal .modal-header,
        .modal .modal-footer {
            border: 0 !important;
        }
        /* form-input color of modal */
        .modal .form-control {
            color: darkgray;
        }
    </style>
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-white" style="padding-left: 50px; padding-right: 40px;">
        <a class="navbar-brand" href="#">
            <img src="logo.png" height="40px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline" style="width:100%">
                <input class="form-control mr-2 text-light" id="keyword" type="text" placeholder="Search" value="" style="width:92%; font-weight: bold; background-color: #cecece;">
                <button class="btn my-2 my-sm-0 text-white" type="button" data-toggle="modal" data-target="#modalADD" style="background-color: #fadc9c;">ADD</button>
            </form>
        </div>
    </nav>

    <!-- container -->
    <div class="container">
        <table class="table table-borderless">
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
            <tbody>
                <?php $datas = get_data(); ?>
                <?php $i=1;?>
                <?php foreach($datas as $data) : ?>
                <tr>
                    <th scope="row"><?=$i;?></th>
                    <td><?=$data["cashier_name"];?></td>
                    <td><?=$data["product_name"];?></td>
                    <td><?=$data["category_name"];?></td>
                    <td><?=$data["product_price"];?></td>
                    <td>
                        <a href="#" class="edit" id="<?=$data["product_id"]?>" data-toggle="modal" data-target="#modalEDIT"><i class="fa fa-edit"></i></a>
                        <a href="#" name="<?=$data['cashier_name'];?>" class="hapus" id="<?=$data["product_id"]?>"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Modals -->

    <!-- Modal ADD -->
    <div class="modal fade" id="modalADD" tabindex="-1" role="dialog" aria-labelledby="modalADDLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalADDLabel">ADD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formADD" action="6csave.php" method="post">
                        <div class="form-group">
                            <select name="cashierADD" class="form-control mb-2" id="cashierADD">
                                <option value="0" selected>Choose Cashier</option>
                                <?php $cashiers = get_cashiers() ?>
                                <?php foreach ($cashiers as $cashier) : ?>
                                <option value="<?=$cashier["cashier_id"]?>"><?=$cashier["cashier_name"]?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-group">
                                <input name="productADD" type="text" class="form-control bg-white" id="productADD" placeholder="Product Name" required>
                            </div>
                            <select name="categoryADD" class="form-control bg-white mb-2" id="categoryADD">
                                <option value="0" selected>Choose Category</option>
                                <?php $categories = get_categories() ?>
                                <?php foreach ($categories as $category) : ?>
                                <option value="<?=$category["category_id"]?>"><?=$category["category_name"]?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-group">
                                <input name="productADDprice" type="number" class="form-control bg-white" id="productADDprice" placeholder="" pattern="[0-9]" required>
                            </div>
                        </div>
                        <button type="submit" class="btn text-white float-right" style="background-color: #fadc9c;" name="ADD">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDIT -->
    <div class="modal fade" id="modalEDIT" tabindex="-1" role="dialog" aria-labelledby="modalEDITLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalADDLabel">EDIT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEDIT" action="6cupdate.php" method="post">
                        <div class="form-group">
                            <div class="form-group">
                                <input name="productEDITid" type="number" class="" id="productEDITid" placeholder="" style="visibility: hidden; position: absolute; margin-top: 45px">
                            </div>
                            <select name="cashierEDIT" class="form-control mb-2" id="cashierEDIT">
                                <option value="0" selected>Choose Cashier</option>
                                <?php $cashiers = get_cashiers() ?>
                                <?php foreach ($cashiers as $cashier) : ?>
                                <option value="<?=$cashier["cashier_id"]?>"><?=$cashier["cashier_name"]?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-group">
                                <input name="productEDIT" type="text" class="form-control bg-white mb-2" id="productEDIT" placeholder=""
                            </div>
                            </select>
                            <select name="categoryEDIT" class="form-control bg-white mb-2" id="categoryEDIT">
                                <option value="0" selected>Choose Category</option>
                                <?php $categories = get_categories() ?>
                                <?php foreach ($categories as $category) : ?>
                                <option value="<?=$category["category_id"]?>"><?=$category["category_name"]?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-group">
                                <input name="productEDITprice" type="number" class="form-control bg-white" id="productEDITprice" placeholder=""
                            </div>
                        </div>
                        <button type="submit" class="btn text-white float-right" style="background-color: #fadc9c;" name="EDIT">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="plugins/jquery.min.js"></script>
    <script src="my.script.js"></script>
    <script src="plugins/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/sweet-alert2/sweet-alert2.min.js"></script>
</body>
</html>