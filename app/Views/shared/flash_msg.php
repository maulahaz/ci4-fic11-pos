<?php if (!empty($errors)) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p><strong>Whoops!</strong> There are some problems with your input.</p>
		<ul>
			<?php foreach ($errors as $field => $error) : ?>
			<li><?= $error ?></li>
			<?php endforeach ?>
		</ul>        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>    
<?php endif ?>

<?php if (!empty(session()->getFlashdata('success'))): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php endif; ?>

<?php if (!empty(session()->getFlashdata('fail'))): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('fail') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div
<?php endif; ?>