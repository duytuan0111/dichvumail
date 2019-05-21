var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "ajax_list",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
            ],

        });





    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });



});
function add_users()
{
    save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.alert-danger').css('display','none'); // clear error class
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Thêm người dùng mới'); // Set Title to Bootstrap modal title
    }
    function edit_user(id)
    {
        save_method = 'update';
    $('#form')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
        url : "ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="username"]').val(data.username);
            $('[name="password"]').val(data.password);
            $('[name="fullname"]').val(data.fullname);
            $('[name="email"]').val(data.email);
            $('[name="phone"]').val(data.phone)
            $('[name="role"]').val(data.role)
            $('[name="forgot_code"]').val(data.forgot_code)
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Sửa thông tin người dùng'); // Set title to Bootstrap modal title



        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function reload_table()
{
        table.ajax.reload(null,false); //reload datatable ajax 
    }
    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;

        if(save_method == 'add') {
            url = "ajax_add";
        } else {
            url = "ajax_update";
        }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('vui lòng kiểm tra lại các trường nhập: Tài khoản , mật khẩu, email không được để trống!');
            $(".alert-danger").css('display','block');
            $(".alert-danger").html('vui lòng kiểm tra lại');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}
// js delete
function delete_user(id)
{
    if(confirm('bạn có chắc muốn xóa bản ghi này không?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Xóa không thành công!');
            }
        });

    }
}

