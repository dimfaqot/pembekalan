<?= $this->extend('slot/logged') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-end">
    <a class="btn_danger" href="<?= base_url('slotgacor/logout'); ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>

<div class="row mt-2">
    <div class="col-3">
        <div class="d-flex justify-content-center mb-4">
            <div class="card" style="width: 100%;">
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
                    <input type="number" name="jml_taruhan" value="<?= user()['jml_taruhan']; ?>" class="form-control form-control-lg mb-2 jml_taruhan" placeholder="Jumlah taruhan" required>

                </div>
            </div>
            <div class="text-center">Angka Tebakan</div>
            <div class="d-flex justify-content-center">
                <div class="d-flex gap-3">
                    <input type="number" name="angka1" class="form-control form-control-lg" value="<?= angka_taruhan(user()['angka_taruhan'])[0]; ?>" placeholder="0" required>
                    <input type="number" name="angka2" class="form-control form-control-lg" value="<?= angka_taruhan(user()['angka_taruhan'])[1]; ?>" placeholder="0" required>
                    <input type="number" name="angka3" class="form-control form-control-lg" value="<?= angka_taruhan(user()['angka_taruhan'])[2]; ?>" placeholder="0" required>

                </div>

            </div>
            <div class="d-flex justify-content-center mt-4">
                <div class="d-grid" style="width: 300px;text-align:center;">
                    <button style="text-align: center;" class="btn_purple" type="submit"><i class="fa-solid fa-circle-dollar-to-slot"></i> KONFIRMASI</button>
                </div>
            </div>
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
    </div>
    <div class="col-9">
        <div class="panel panel-primary">
            <h3 class="panel-heading text-center bg-primary text-light p-2" style="border-radius: 5px;">SLOT GACOR</h3>
            <div class="panel-body">
                <div class="well text-center alert alert-primary" style="font-weight: bold;font-size: medium;">
                    Pilih angka tiga angka 1-7. Jika benar 1 sesuai urutan mendapatkan permen, jika 2 mendapatkan roti, jika 3 mendapatkan silverqueen.
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <div class="slotwrapper" id="example2" style="height: 200px;">
                        <ul style="width: 200px;height:200px;font-size: 200px;line-height: 200px;margin-top:-8px;">
                            <?php for ($i = 0; $i < 7; $i++) : ?>
                                <li><?= $i + 1; ?></li>

                            <?php endfor; ?>

                        </ul>
                        <ul style="width: 200px;height:200px;font-size: 200px;line-height: 200px;margin-top:-8px;">
                            <?php for ($i = 0; $i < 7; $i++) : ?>
                                <li><?= $i + 1; ?></li>

                            <?php endfor; ?>
                        </ul>
                        <ul style="width: 200px;height:200px;font-size: 200px;line-height: 200px;margin-top:-8px;">
                            <?php for ($i = 0; $i < 7; $i++) : ?>
                                <li><?= $i + 1; ?></li>

                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>

                <div class="d-none">
                    <div class="col-sm-2 col-xs-4">
                        <input type="text" class="form-control" id="txt-example2-1" value="<?= explode(",", settings()['angka_bandar'])[0]; ?>" />
                    </div>
                    <div class="col-sm-2 col-xs-4">
                        <input type="text" class="form-control" id="txt-example2-2" value="<?= explode(",", settings()['angka_bandar'])[1]; ?>" />
                    </div>
                    <div class="col-sm-2 col-xs-4">
                        <input type="text" class="form-control" id="txt-example2-3" value="<?= explode(",", settings()['angka_bandar'])[2]; ?>" />
                    </div>
                </div>
                <div class="text-center mt-3 star_spin">
                    <button type="button" class="btn btn-success btn-lg" id="btn-example2">Start Spin!</button>

                </div>

                <div class="collapse" id="collapse-example2">
                    <div class="well">
                        <code>
                            $('#btn-example2').click(function() {<br />
                            &nbsp;&nbsp;$('#example2 ul').playSpin({<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;endNum: [7, 7, 7],<br />
                            &nbsp;&nbsp;});<br />
                            });
                        </code>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>