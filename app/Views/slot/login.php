<?= $this->extend('slot/guest') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-center" style="margin-top:70px;">
    <div class="card" style="width:500px;">
        <div class="card-body text-center p-5">
            <img class="mb-3 mt-2" width="100" src="<?= base_url(); ?>slot/logo.png" alt="LOGO">
            <form action="<?= base_url('slotgacor/'); ?>auth" method="post">
                <div class="form-floating mb-2">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <label>Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <label>Password</label>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn_save" type="submit"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</button>
                </div>

            </form>
        </div>
    </div>


</div>

<div class="d-flex justify-content-center mt-5">
    <div>
        <h5>DAFTAR</h5>
        <form action="<?= base_url('slotgacor/daftar'); ?>" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama" required>
                    </div>

                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control form-control-sm" name="username" placeholder="Username" required>
                    </div>

                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control form-control-sm" name="password" placeholder="Password" required>
                    </div>

                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Topup</label>
                        <input type="number" class="form-control form-control-sm" name="uang" placeholder="Topup" required>
                    </div>

                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn_purple" type="submit"><i class="fa-regular fa-address-card"></i> Daftar</button>
            </div>
        </form>

    </div>

</div>
<?= $this->endSection() ?>