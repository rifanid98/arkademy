$('#keyword').on('keyup', function () {
    var keyword = $(this).val();
    $.ajax({
        url: 'ajax/get_data_by_keyword.php',
        type: 'POST',
        data: 'keyword=' + keyword,
        success: function (data) {
            $('.container').html(data);
        },
        error: function (e) {
            //called when there is an error
            console.log(e.message);
        }
    });
});

$(document).on('click', '.edit', function(){
    var id = $(this).attr("id");
    $.ajax({
        url: 'ajax/get_data_by_id.php',
        type: 'POST',
        data: 'id=' + id,
        success: function (data) {
            console.log(data);

            var data = $.parseJSON(data);
            $('#productEDITid').val(data.product_id);
            $('#cashierEDIT').val(data.cashier_id);
            $('#productEDIT').val(data.product_name);
            $('#categoryEDIT').val(data.category_id);
            $('#productEDITprice').val(data.product_price);
        },
        error: function (e) {
            //called when there is an error
            console.log(e.message);
        }
    });
});

$(document).on('click', '.hapus', function(){
    var id = $(this).attr("id");
    var nama = $(this).attr("name");
    $.ajax({
        url: 'ajax/delete_data_by_id.php',
        type: 'POST',
        data: 'id=' + id,
        success: function (data) {
            var data = $.parseJSON(data);
            if (data.result == true) {
                Swal.fire({
                    title: '<strong>Data ' + nama + ' ID #' + id + '</strong>',
                    icon: 'success',
                    html: 'Data Berhasil Dihapus!',
                    showCloseButton: true,
                    focusConfirm: true
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                })
            } else {
                Swal.fire({
                    title: '<strong>Data ' + nama + ' ID #' + id + '</strong>',
                    icon: 'error',
                    html: 'Data Gagal Dihapus!',
                    showCloseButton: true,
                    focusConfirm: true
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                })
            }

        },
        error: function (e) {
            //called when there is an error
            //console.log(e.message);
        }
    });
});
