<?= $this->extend('facebook/logged') ?>

<?= $this->section('content') ?>

<div class="px-3" style="background-color:#f5f5f5;height:100vh">
    <div class="d-none d-md-block">
        <?= view('facebook/md'); ?>
    </div>

    <div class="d-block d-md-none d-sm-block fixed-top" style="top:-5px">
        <?= view('facebook/sm'); ?>
    </div>
</div>
<?= $this->endSection() ?>