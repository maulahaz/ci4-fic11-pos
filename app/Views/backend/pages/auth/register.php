<?=$this->extend("backend/layout/auth")?>
<?=$this->section("content")?>

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-7">
            <img src="<?=base_url()?>public/t_deskapp/vendors/images/login-page-img.png" alt="" />
        </div>
        <div class="col-md-6 col-lg-5">
            <div class="login-box bg-white box-shadow border-radius-10">
                <div class="login-title">
                    <h2 class="text-center text-primary">Register</h2>
                </div>
                <?php $validation = \Config\Services::validation(); ?>
                <!-- NOTIFICATION -->
                <!-- <?php //include('../shared/flash_msg.php') ?> -->
                <?= view('shared/flash_msg') ?>
                <form action="<?= base_url(route_to('register')); ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="input-group custom">
                        <input
                            type="text"
                            class="form-control form-control-lg"
                            placeholder="Username"
                            id="username"
                            name="username"
                            value="<?= set_value('username')?>"
                            />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                        </div>
                    </div>
                    <?= $validation->getError('username') ? '<div class="d-block text-danger" style="margin-top:-25px;margin-bottom:15px;">'.$validation->getError('username').'</div>' : '' ?>

                    <div class="input-group custom">
                        <input
                            type="password"
                            class="form-control form-control-lg"
                            id="userpass"
                            name="userpass"
                            value="<?= set_value('userpass')?>"
                            placeholder="Password"
                            />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                        </div>
                    </div>
                    <?= $validation->getError('userpass') ? '<div class="d-block text-danger" style="margin-top:-25px;margin-bottom:15px;">'.$validation->getError('userpass').'</div>' : '' ?>

                    <div class="input-group custom">
                        <input
                            type="password"
                            class="form-control form-control-lg"
                            id="userpass_confirm"
                            name="userpass_confirm"
                            value="<?= set_value('userpass_confirm')?>"
                            placeholder="Confirm Password"
                            />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                        </div>
                    </div>
                    <?= $validation->getError('userpass_confirm') ? '<div class="d-block text-danger" style="margin-top:-25px;margin-bottom:15px;">'.$validation->getError('userpass_confirm').'</div>' : '' ?>

                    <div class="input-group custom">
                        <input
                            type="text"
                            class="form-control form-control-lg"
                            id="email"
                            name="email"
                            value="<?= set_value('email')?>"
                            placeholder="Email address"
                            />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        </div>
                    </div>
                    <?= $validation->getError('email') ? '<div class="d-block text-danger" style="margin-top:-25px;margin-bottom:15px;">'.$validation->getError('email').'</div>' : '' ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-0">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex pt-3 justify-content-center"><a href="<?= base_url('login'); ?>">I have account</a></div>
                </form>
            </div>
        </div>
    </div>
</div>


<?=$this->endSection()?>