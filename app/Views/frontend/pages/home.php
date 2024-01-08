<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $webTitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/assets/css/app.css" />
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <img src="<?= base_url() ?>public/assets/img/car-washing-logo.png" alt="">
            </div>
            <ul class="nav-area">
                <li><a href="<?= base_url('em/wash') ?>">Washing</a></li> 
                <li><a href="<?= base_url('em/clients') ?>">Clients</a></li> 
                <?php if(is_null(get_user())) : ?>
                <li><a href="<?= base_url(route_to('login')) ?>">Login</a></li> 
                <?php else : ?>
                <li><a href="<?= base_url(route_to('logout')) ?>">Logout</a></li> 
                <?php endif ?>
            </ul>
        </div>
        <div class="welcome-text">
            <h1>Welcome <?= is_null(get_user()) ? 'Guest' :get_user()->username ?></h1>
        </div>
    </header>    
</body>
</html>
