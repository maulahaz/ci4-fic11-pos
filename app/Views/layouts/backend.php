<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">
    <title><?= $title ?> &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet"
        href="<?=base_url()?>public/t_deskapp/t_stisla/library/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

        <?= $this->renderSection('stylesheets') ?>

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="<?=base_url()?>public/t_deskapp/t_stisla/css/style.css">
    <link rel="stylesheet"
        href="<?=base_url()?>public/t_deskapp/t_stisla/css/components.css">

    <!-- Start GA -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
</head>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Header -->
            <?= $this->include('layouts/components/header') ?>

            <!-- Sidebar -->
            <?= $this->include('layouts/components/sidebar') ?>

            <!-- Content -->
            <?= $this->renderSection("content"); ?>

            <!-- Footer -->
            <?= $this->include('layouts/components/footer') ?>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?=base_url()?>public/t_deskapp/t_stisla/library/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/t_stisla/library/popper.js/dist/umd/popper.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/t_stisla/library/tooltip.js/dist/umd/tooltip.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/t_stisla/library/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/t_stisla/library/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/t_stisla/library/moment/min/moment.min.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/t_stisla/js/stisla.js"></script>

    <!-- Template JS File -->
    <script src="<?=base_url()?>public/t_deskapp/t_stisla/js/scripts.js"></script>
    <script src="<?=base_url()?>public/t_deskapp/t_stisla/js/custom.js"></script>

    <?= $this->renderSection('scripts') ?>
</body>

</html>
