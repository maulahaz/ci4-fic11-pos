<?=$this->extend("backend/layout/blank")?>

<!-- CONTENT SECTION -->
<?=$this->section("content")?>
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Users</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= route_to('admin.home') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Users
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">User List</h4>
        </div>
        <!-- <div class="pull-right">
            <a href="" id="add-user-btn" class="btn btn-primary btn-sm scroll-click" role="button"><i class="fa fa-plus-circle"></i> Add</a>
        </div> -->
    </div>
    <div class="pb-20">
        <table id="user-table" class="data-table table hover stripe nowrap">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
    
</div>

<?php include('user-modal-form.php') ?>

<?=$this->endSection()?>

<!-- STYLESHEET SECTION -->
<?=$this->section("stylesheets")?>
    <!-- DATATABLE -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/t_deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/t_deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
<?=$this->endSection()?>

<!-- SCRIPTS SECTION -->
<?=$this->section("scripts")?>
    <!-- DATATABLE -->
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

<script>

    //--Get Data (Datatable):
    var userDatatable = $('#user-table').DataTable({
        'processing': true,
        'serverSide': true,
        // 'dom': 'Brtip',
        'ajax': {
            'url': "<?= base_url('admin/get-users') ?>",
            'type': 'POST',
            'data':{
                csrf_calaxan: $('input[name=csrf_calaxan]').val(),  //ambil nilai csrf sesuai nama token input dari .env (wajib)
            },
            'data': function(data) {
                data.csrf_calaxan = $('input[name=csrf_calaxan]').val() //function bridge token view to controller (wajib)
            },
            'dataSrc': function(response) {
                $('input[name=csrf_calaxan]').val(response.csrf_calaxan); //dataSrc untuk random request token char (wajib)
                return response.data;
            },
        },
        'columns':[
            {'data': null,
                'render': function(data,type,row,meta){
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {'data': 'username'},
            {'data': 'role'},
            {'data': 'email'},
            {'data': 'status'},
            {'data': 'created_at'},
            {'data': null,
                'render': function(data,type,row,meta){
                    var a = `
                    <div class="btn-group">
                        <td><button class="btn btn-sm btn-warning editUserBtn" data-id="${row.id}">Edit</button>
                        <button class="btn btn-sm btn-danger deleteUserBtn" data-id="${row.id}">Delete</button></td>
                    </div>`;
                    return a;
                }
            },
        ],
    });

    //--Edit Data:
    $(document).on('click', '.editUserBtn', function(e){
        e.preventDefault(); 
        var user_id = $(this).data('id');
        var url = "<?= base_url('admin/get-user') ?>";
        $.getJSON(url, {user_id: user_id}, function(respUser){            
            var modal = $('body').find('div#user-modal');
            var modal_title = 'Edit User';
            var modal_btn_text = 'Update';

            //--Data for Editing :: For FORM SELECT type (Status): 
            var select_stat = modal.find('select[name="user_status"]');
            //--Data for Editing :: For FORM SELECT type (Role): 
            var select_role = modal.find('select[name="user_role"]');
            // var url_select_role = "<?//base_url('admin/get-role-option') ?>";
            var url_select_role = "<?= base_url('admin/get-option') ?>";
            $.getJSON(url_select_role, {user_role: respUser.data.role, user_stat: respUser.data.status}, function(respRole){
                //--Opt for Role:
                select_role.find('option').remove();
                select_role.html(respRole.data['opt_role']);
                //--Opt for Status:
                select_stat.find('option').remove();
                select_stat.html(respRole.data['opt_stat']);
            });

            modal.find('form').find('input[type="hidden"][name="user_id"]').val(user_id);
            modal.find('.modal-title').html(modal_title);
            modal.find('.modal-footer > button.action').html(modal_btn_text);

            //--Data for Editing :: For All FORM INPUT type:
            $.each(respUser.data, function(prefix, val){
                modal.find('input[name="user_'+prefix+'"]').val(val);
            }) 
                 
            modal.find('span.error-text').html('');
            modal.modal('show');
        });
    });

    //--Save / Update Data:
    $('#user-form').on('submit', function(e){
        e.preventDefault();

        //--From CSRF FIELD/FORM:
        var csrfName = $('.csrf_data').attr('name');//CSRF Token Name
        var csrfHash = $('.csrf_data').val();//CSRF Hash

        var form = this;
        var modal = $('body').find('div#user-modal');
        var formdata = new FormData(form);
        var flagAction = modal.find('.modal-title').html();

        formdata.append(csrfName, csrfHash);

        $.ajax({
            url:  (flagAction == "Add User") ? "<?= base_url(route_to('admin.add-user')) ?>" : "<?= base_url(route_to('admin.update-user')) ?>",
            method: $(form).attr('method'),
            data: formdata,
            processData: false,
            dataType: 'json',
            contentType: false,
            cache: false,
            beforeSend: function(){
                toastr.remove();
                $(form).find('span.error-text').text('');
            },
            success: function(res){
                //--Update CSRF Hash:
                $('.csrf_data').val(res.token);

                if($.isEmptyObject(res.error)){
                    if(res.status == 1){
                        $(form)[0].reset();
                        modal.modal('hide');
                        toastr.success(res.msg);
                        //--Refresh Datatable:
                        userDatatable.ajax.reload(null, false);
                    }else{
                        toastr.error(res.msg);
                    }
                }else{
                    $.each(res.error, function(prefix, val){
                        $(form).find('span.'+prefix+'_error').text(val);
                    })
                }
            }
        })
    });

    //--Delete Data:
    $(document).on('click', '.deleteUserBtn', function(e){
        e.preventDefault(); 
        var user_id = $(this).data('id');
        var url = "<?= base_url('admin/delete-user') ?>";
        swal({
            title: 'Delete confirmation',
            html: 'Are yo sure want to delete this data ?',
            showCloseButton: true,
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, Delete!',
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            allowOutsideClick: false
        }).then(function(result){
            if(result.value){
                $.getJSON(url, {user_id: user_id}, function(res){
                    if(res.status == 1){
                        //--Refresh Datatable:
                        userDatatable.ajax.reload(null, false);
                        //--Msg:
                        toastr.success(res.msg);
                    }else{
                        toastr.error(res.msg);
                    }
                });
            }
        });
    });    

</script>

<?=$this->endSection()?>