<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $webTitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/t_deskapp/vendors/styles/style.css" />
</head>
<body>
	<div class="panel">
		<div class="panel-heading text-center">
			<span class="panel-title"><h1>Forbidden</h1></span>
		</div>
		<div class="panel-body text-center mb-5">
			<img src="<?= base_url()?>public/assets/img/padlock.png" alt="" class="img-fluid m-5" style="width: 200px;">
			<h5 class="card-title">You don't have permission to view this page.</h5>
			<p class="card-text">Please contact Administrator for further detail.</p>
			<p><small>Back to <a href="<?= base_url(); ?>">Homepage</a></small></p>
		</div>
	</div>   
</body>
</html>