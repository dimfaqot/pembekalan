<?= $this->extend('guest') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-center">
    <img width="12%" src="<?= base_url(); ?>img/logo-text.png" alt="Logo">
</div>
<div class="d-flex flex-column min-vw-100" style="min-height: 660px;">
    <div class="d-flex flex-grow-1 justify-content-center align-items-center">
        <div class="card text-center" style="width: 25%;">
            <div class="card-body">
                <h5 style="font-size: 18px;" class="mb-4">Log in to Facebook</h5>
                <div class="p-2" style="background-color: #ffebe8; border:1px solid #dd3c10">
                    <div style="font-weight: 700;">Wrong credentials</div>
                    <span style="font-size: small;">Invalid username or password</span>
                </div>
            </div>
        </div>
    </div>
</div>






<?= $this->endSection() ?>