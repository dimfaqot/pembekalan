<?= $this->extend('slot/logged') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-end">
    <a class="btn_danger" href="<?= base_url('slotgacor/logout'); ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>
<?php if (settings()['bukaan'] == 2) : ?>
    <?php if (user()['jml_taruhan'] == 0) : ?>

        <div class="d-flex justify-content-center mt-4" style="margin-bottom: 70px;">
            <div class="card" style="width: 60%;">
                <div class="text-light text-center card-body bg-danger">
                    <h4>ANDA BELUM PASANG TARUHAN!</h4>
                </div>
            </div>
        </div>

    <?php else : ?>
        <div class="d-flex justify-content-center mt-4" style="margin-bottom: 70px;">
            <div class="card" style="width: 60%;">
                <div class="text-light text-center card-body <?= (hasil() > 0 ? 'bg-success' : 'bg-danger'); ?>">
                    <?php if (hasil() > 0) : ?>
                        <h4>SELAMAT ANDA MENANG RP <?= angka(hasil()); ?></h4>
                    <?php else : ?>
                        <h4>MOHON MAAF ANDA NYONYOR RP <?= angka(user()['jml_taruhan']); ?></h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php endif; ?>

<?php else : ?>
    <?php if (user()['jml_taruhan'] == 0) : ?>

        <div class="d-flex justify-content-center mt-4" style="margin-bottom: 70px;">
            <div class="card" style="width: 60%;">
                <div class="text-light text-center card-body bg-danger">
                    <h4>ANDA BELUM PASANG TARUHAN!</h4>
                </div>
            </div>
        </div>

    <?php else : ?>
        <div class="d-flex justify-content-center mt-4 mb-1">
            <div class="card" style="width: 60%;">
                <div class="text-light text-center card-body bg-info">
                    <h4>HASIL BELUM KELUAR</h4>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center" style="margin-bottom: 70px;">
            <div class="alert alert-success" role="alert" style="width: 60%;text-align:center;font-weight:bold;">
                TARUHAN ANDA RP<?= angka(user()['jml_taruhan']); ?>
            </div>
        </div>


    <?php endif; ?>
<?php endif; ?>

<div class="d-flex justify-content-center mb-4">
    <div class="card" style="width: 30%;">
        <div class="card-header">
            <h3><?= user()['nama']; ?></h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Saldo Anda saat ini Rp<?= angka(user()['uang']); ?></h5>
            <p class="card-text">Username Anda <?= user()['username']; ?></p>
            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" class="btn btn-primary"><i class="fa-brands fa-nfc-directional"></i> TOPUP</a>
        </div>
    </div>


</div>

<h5 class="text-center">MASUKKAN JUMLAH TARUHAN DAN 3 ANGKA 1-7 UNTUK BERTARUH</h5>


<form action="<?= base_url('slotgacor/pasang_taruhan'); ?>" method="post">
    <div class="d-flex justify-content-center">
        <div style="width: 300px;">
            <div class="text-center">Uang Taruhan</div>
            <input type="number" name="jml_taruhan" value="<?= user()['jml_taruhan']; ?>" class="form-control form-control-lg mb-2" placeholder="Jumlah taruhan" required>

        </div>
    </div>
    <div class="text-center">Angka Tebakan</div>
    <div class="d-flex justify-content-center">
        <div class="d-flex gap-3" style="width: 300px;">
            <input type="number" name="angka1" class="form-control form-control-lg" value="<?= angka_taruhan(user()['angka_taruhan'])[0]; ?>" placeholder="0" required>
            <input type="number" name="angka2" class="form-control form-control-lg" value="<?= angka_taruhan(user()['angka_taruhan'])[1]; ?>" placeholder="0" required>
            <input type="number" name="angka3" class="form-control form-control-lg" value="<?= angka_taruhan(user()['angka_taruhan'])[2]; ?>" placeholder="0" required>

        </div>

    </div>

    <?php if (user()['jml_taruhan'] == 0) : ?>

        <div class="d-flex justify-content-center mt-4">
            <div class="d-grid" style="width: 300px;text-align:center;">
                <button style="text-align: center;" class="btn_purple" type="submit"><i class="fa-solid fa-circle-dollar-to-slot"></i> PASANG</button>
            </div>
        </div>

    <?php endif; ?>
</form>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="<?= base_url('slotgacor/topup'); ?>" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Uang Anda Saat Ini Rp<?= angka(user()['uang']); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="number" name="uang" class="form-control form-control-lg" placeholder="Masukkan jumlah uang" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa-brands fa-nfc-directional"></i> TOPUP</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>