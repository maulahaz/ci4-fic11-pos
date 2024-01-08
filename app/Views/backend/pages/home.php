<?=$this->extend("backend/layout/blank")?>

<!-- CONTENT SECTION -->
<?=$this->section("content")?>
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
        <?= view('shared/flash_msg') ?>
            <div class="title">
                <h4>Home</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= route_to('admin.home') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Home
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<?=$this->endSection()?>

<!-- STYLESHEET SECTION -->
<?=$this->section("stylesheets")?>
    <!-- STYLESHEET HERE -->
<?=$this->endSection()?>

<!-- SCRIPTS SECTION -->
<?=$this->section("scripts")?>
    <!-- SCRIPTS HERE -->
<?=$this->endSection()?>