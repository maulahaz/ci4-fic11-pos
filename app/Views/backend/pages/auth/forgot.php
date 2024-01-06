<?=$this->extend("backend/layout/auth")?>
<?=$this->section("content")?>

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="<?=base_url()?>public/t_deskapp/vendors/images/forgot-password.png" alt="">
        </div>
        <div class="col-md-6">
            <div class="login-box bg-white box-shadow border-radius-10">
                <div class="login-title">
                    <h2 class="text-center text-primary">Forgot Password</h2>
                </div>
                <h6 class="mb-20">
                    Enter your email address to reset your password
                </h6>
                <?php $validation = \Config\Services::validation(); ?>
                <!-- NOTIFICATION -->
                <?= view('shared/flash_msg') ?>
                <form action="<?= base_url('admin/send-reset-password-link'); ?>" method="POST">
                <?= csrf_field() ?>
                    <div class="input-group custom">
                        <input type="text" class="form-control form-control-lg" value="<?= set_value('email')?>" placeholder="Email">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <?= $validation->getError('email') ? '<div class="d-block text-danger" style="margin-top:-25px;margin-bottom:15px;">'.$validation->getError('email').'</div>' : '' ?>

                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="input-group mb-0">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="font-16 weight-600 text-center" data-color="#707373" style="color: rgb(112, 115, 115);">
                                OR
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="input-group mb-0">
                                <a class="btn btn-outline-primary btn-lg btn-block" href="<?= base_url(route_to('admin.login.form')); ?>">Login</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection()?>