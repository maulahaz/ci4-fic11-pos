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
        <div class="pull-right">
            <a href="" id="add_user_btn" class="btn btn-primary btn-sm scroll-click" role="button"><i class="fa fa-plus-circle"></i> Add</a>
        </div>
    </div>
    <div class="pb-20">
        <table id="user-table" class="data-table table hover stripe nowrap">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
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
    <!-- Datatable -->
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- buttons for Export datatable -->
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/src/plugins/datatables/js/vfs_fonts.js"></script>
    <!-- Datatable Setting js -->
    <script src="<?=base_url()?>public/t_deskapp/vendors/scripts/datatable-setting.js"></script>

<script>

    $(document).ready(function(){
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax:{url: "<?= base_url('admin/user-ajax') ?>", type:'POST'},
            columns:[
                {data: 1},
                {data: 'username'},
                {data: 'role'},
                {data: 'created_at'},
                {data: null},
            ],
        });
    });

    $(document).on('click', '#add_client_btn', function(e){
        e.preventDefault();
        var modal = $('body').find('div#client-modal');
        var modal_title = 'Add Client';
        var modal_btn_text = 'Add';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type=text]').val('');
        modal.modal('show');
    });

    $('#add_client_form').on('submit', function(e){
        e.preventDefault();
        var csrfName = $('.ci_csrf_data').attr('name');//CSRF Token Name
        var csrfHash = $('.ci_csrf_data').val();//CSRF Hash
        var form = this;
        var modal = $('body').find('div#client-modal');
        var formdata = new FormData(form);

        formdata.append(csrfName, csrfHash);

        $.ajax({
            url: $(form).attr('action'),
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
                $('.ci_csrf_data').val(res.token);

                if($.isEmptyObject(res.error)){
                    if(res.status == 1){
                        $(form)[0].reset();
                        modal.modal('hide');
                        toastr.success(res.msg);
                    }else{
                        toastr.error(res.msg);
                    }
                }else{
                    $.each(res.error, function(prefix, val){
                        $(form).find('span.'+prefix+'_error').text(val);
                    })
                }
            }
        });
    });
</script>

<?=$this->endSection()?>