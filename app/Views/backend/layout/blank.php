<!DOCTYPE html>
<html>
    <head>
        <!-- Basic Page Info -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="<?=csrf_token() ?>" content="<?=csrf_hash() ?>" class="csrf" />
        <title><?= isset($pageTitle) ? $pageTitle : 'New Page Title'; ?></title>
        <!-- Site favicon -->
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="<?=base_url()?>public/t_deskapp/vendors/images/apple-touch-icon.png"
            />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="<?=base_url()?>public/t_deskapp/vendors/images/favicon-32x32.png"
            />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="<?=base_url()?>public/t_deskapp/vendors/images/favicon-16x16.png"
            />
        <!-- Mobile Specific Metas -->
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1"
            />
        <!-- Google Font -->
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet"
            />
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/t_deskapp/vendors/styles/core.css" />

        <link
            rel="stylesheet"
            type="text/css"
            href="<?=base_url()?>public/t_deskapp/vendors/styles/icon-font.min.css"
            />
        <!-- TOASTR -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <!-- SWEETALERT2 -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/t_deskapp/src/plugins/sweetalert2/sweetalert2.css"
		/>
        
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/t_deskapp/vendors/styles/style.css" />
        <!-- My Custome Stylesheet -->
        <?= $this->renderSection("stylesheets"); ?>
    </head>
    <body>
        <!-- 		
            <div class="pre-loader">
            	<div class="pre-loader-box">
            		<div class="loader-logo">
            			<img src="<?=base_url()?>public/t_deskapp/vendors/images/deskapp-logo.svg" alt="" />
            		</div>
            		<div class="loader-progress" id="progress_div">
            			<div class="bar" id="bar1"></div>
            		</div>
            		<div class="percent" id="percent1">0%</div>
            		<div class="loading-text">Loading...</div>
            	</div>
            </div>
            -->
        <?php include('section/header.php') ?>
        <?php include('section/right-sidebar.php') ?>
        <?php include('section/left-sidebar.php') ?>
        <div class="mobile-menu-overlay"></div>
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <!-- 
                        <div class="page-header">
                        	<div class="row">
                        		<div class="col-md-6 col-sm-12">
                        			<div class="title">
                        				<h4>blank</h4>
                        			</div>
                        			<nav aria-label="breadcrumb" role="navigation">
                        				<ol class="breadcrumb">
                        					<li class="breadcrumb-item">
                        						<a href="index.html">Home</a>
                        					</li>
                        					<li class="breadcrumb-item active" aria-current="page">
                        						blank
                        					</li>
                        				</ol>
                        			</nav>
                        		</div>
                        		<div class="col-md-6 col-sm-12 text-right">
                        			<div class="dropdown">
                        				<a
                        					class="btn btn-primary dropdown-toggle"
                        					href="#"
                        					role="button"
                        					data-toggle="dropdown"
                        				>
                        					January 2018
                        				</a>
                        				<div class="dropdown-menu dropdown-menu-right">
                        					<a class="dropdown-item" href="#">Export List</a>
                        					<a class="dropdown-item" href="#">Policies</a>
                        					<a class="dropdown-item" href="#">View Assets</a>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>
                         -->
                    <div>
                        <?= $this->renderSection("content"); ?>
                    </div>
                </div>
                <?php include('section/footer.php') ?>	
            </div>
        </div>
        <!-- js -->
        <script src="<?=base_url()?>public/t_deskapp/vendors/scripts/core.js"></script>
        <script src="<?=base_url()?>public/t_deskapp/vendors/scripts/script.min.js"></script>
        <script src="<?=base_url()?>public/t_deskapp/vendors/scripts/process.js"></script>
        <script src="<?=base_url()?>public/t_deskapp/vendors/scripts/layout-settings.js"></script>
        <!-- TOASTR -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- SWEETALERT2 -->
		<script src="<?=base_url()?>public/t_deskapp/src/plugins/sweetalert2/sweetalert2.all.js"></script>
		<script src="<?=base_url()?>public/t_deskapp/src/plugins/sweetalert2/sweet-alert.init.js"></script>
        <!-- My Custome Scripts -->
        <?= $this->renderSection("scripts"); ?>
    </body>
</html>