<div class="modal fade bs-example-modal-lg" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="actionUrl" method='POST' id='user-form'>
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Large modal
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                ×
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf_data">
                <input type="hidden" name="user_id">

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="user_username" readonly>
                    <!-- <span class="text-danger error-text user_username_error"></span> -->
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="custom-select form-control" id="user_role" name="user_role">
                        <option value="" selected>Choose...</option>
                    </select>
                    <span class="text-danger error-text user_role_error"></span>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="user_email" readonly>
                    <!-- <span class="text-danger error-text user_email_error"></span> -->
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="custom-select form-control" id="user_status" name="user_status">
                        <?php $options = ['inactive'=>'In-Active','active'=>'Active']; ?>
                        <option value="" selected>Choose...</option>
                        <?php foreach ($options as $key => $value) : ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                        <?php endforeach;?>
                    </select>
                    <span class="text-danger error-text user_status_error"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Close
                </button>
                <button type="submit" class="btn btn-primary action">
                Save changes
                </button>
            </div>
            </form>
        </div>
    </div>
</div>