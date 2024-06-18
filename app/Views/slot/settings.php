<?= $this->extend('slot/logged') ?>

<?= $this->section('content') ?>

<div class="container">

    <?php if (settings()['versi'] == 1) : ?>


        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary" style="width: 23%;" data-bs-toggle="modal" data-bs-target="#tools">
                TOOLS
            </button>
        </div>
        <!-- Button trigger modal -->
        <div class="d-flex gap-2 mt-2 justify-content-center">
            <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#sim1">
                1
            </button>
            <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#sim2">
                2
            </button>

        </div>

        <!-- modal tools -->
        <div class="modal fade" id="tools" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item">Set untuk menyetting angka pilihan bandar melalui form input, dan pada versi 1 sekaligus mengupdate bukaan menjadi 1</li>
                            <li class="list-group-item">Set Angka Terbaik untuk menyetting angka pilihan bandar secara otomatis melalui sistem, dan mengupdate settings bukaan menjadi 1 dan mengupdate saldo penjudi sesuai hasil</li>
                            <li class="list-group-item">Analisis Angka Terbaik untuk menampilkan hasil analisis angka terbaik untuk bandar</li>
                            <li class="list-group-item">Varsi untuk pindah versi dari 1 ke 2 atau sebaliknya. Yang tampil adalah yang sedang diaktifkan</li>
                            <li class="list-group-item">Data Penjudi untuk menampilkan data detail penjudi</li>
                            <li class="list-group-item">Hasil Ditampilkan untuk menampilkan hasil judi di halaman penjudi, dan mengupdate settings bukaan menjadi 2. Hasil disembunyikan untuk mngupdate settings bukaan menjadi 0 dan mengupdate jml_taruhan penjudi menjadi 0</li>
                        </ol>


                    </div>
                </div>
            </div>
        </div>
        <!-- modal sim1 1 -->
        <div class="modal fade" id="sim1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Versi 1 permainan kelompok dengan 1 bukaan</li>
                        <li class="list-group-item">Penjudi memasukkan taruhan dan angka pilihan</li>
                        <li class="list-group-item">Bandar klik Set Angka Terbaik untuk meraih hasil terbaik dan memproses hasil</li>
                        <li class="list-group-item">Bandar klik hasil Ditampilkan untuk menampilkan hasil di halaman penjudi</li>
                        <li class="list-group-item">Bandar klik Hasil Disembunyikan untuk memulai ulang</li>
                        <li class="list-group-item">Data Penjudi untuk menampilkan data detail penjudi</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- modal sim1 2 -->
        <div class="modal fade" id="sim2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Penjudi memasukkan taruhan dan angka pilihan</li>
                        <li class="list-group-item">Bandar memilih Angka Bandar melalui form input untuk menarget pemenang</li>
                        <li class="list-group-item">Bandar klik hasil Ditampilkan untuk menampilkan hasil di halaman penjudi</li>
                        <li class="list-group-item">Bandar klik Hasil Disembunyikan untuk memulai ulang</li>
                        <li class="list-group-item">Data Penjudi untuk menampilkan data detail penjudi</li>
                    </ol>

                </div>
            </div>
        </div>




        <form method="post" action="<?= base_url('slotgacor/update_angka_bandar'); ?>" class="d-flex justify-content-center mt-2">
            <div class="card">
                <div class="card-header">
                    <h3>ANGKA BANDAR</h3>
                </div>
                <div class="card-body">
                    <input type="text" name="angka_bandar" class="form-control form-control-lg" value="<?= settings()['angka_bandar']; ?>" required>

                    <div class="d-grid mt-3 gap-2">
                        <button type="submit" class="btn btn-primary" class="btn btn-primary"><i class="fa-solid fa-key"></i> SET</button>
                        <a class="btn btn-success text-light" href="<?= base_url('slotgacor/angka_terbaik_bandar'); ?>"><i class="fa-solid fa-heart"></i> SET ANGKA TERBAIK</a>
                        <a target="_blank" class="btn btn-success text-light" href="<?= base_url('slotgacor/analisis_angka_terbaik_bandar'); ?>"><i class="fa-solid fa-chart-pie"></i> ANALISIS ANGKA TERBAIK</a>
                        <a class="btn btn-danger text-light" href="<?= base_url('slotgacor/update_versi'); ?>"><i class="fa-solid fa-chart-pie"></i> VERSI <?= settings()['versi']; ?></a>
                        <a target="_blank" class="btn btn-info text-light" href="<?= base_url('slotgacor/penjudi'); ?>"><i class="fa-solid fa-user-secret"></i> DATA PENJUDI</a>
                        <a class="btn btn-info text-light" href="<?= base_url('slotgacor/tampilkan_hasil'); ?>"><?= (settings()['bukaan'] == 0 ? '<i class="fa-solid fa-eye-slash"></i> HASIL DISEMBUNYIKAN' : '<i class="fa-solid fa-eye"></i> HASIL DITAMPILKAN'); ?></a>
                    </div>
                </div>
            </div>

        </form>



    <?php else : ?>

        <div class="row mt-2">
            <div class="col-3">
                <div class="d-grid">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tools">
                        TOOLS
                    </button>
                </div>
                <!-- Button trigger modal -->
                <div class="d-flex gap-2 mt-2 justify-content-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#sim1">
                        1
                    </button>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#sim2">
                        2
                    </button>

                </div>

                <!-- modal tools -->
                <div class="modal fade" id="tools" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item">Set untuk menyetting angka pilihan bandar melalui form input, dan pada versi 1 sekaligus mengupdate bukaan menjadi 1</li>
                                    <li class="list-group-item">Set Angka Terbaik untuk menyetting angka pilihan bandar secara otomatis melalui sistem, dan mengupdate settings bukaan menjadi 1 dan mengupdate saldo penjudi sesuai hasil</li>
                                    <li class="list-group-item">Analisis Angka Terbaik untuk menampilkan hasil analisis angka terbaik untuk bandar</li>
                                    <li class="list-group-item">Varsi untuk pindah versi dari 1 ke 2 atau sebaliknya. Yang tampil adalah yang sedang diaktifkan</li>
                                    <li class="list-group-item">Data Penjudi untuk menampilkan data detail penjudi</li>
                                    <li class="list-group-item">Hasil Ditampilkan untuk menampilkan hasil judi di halaman penjudi, dan mengupdate settings bukaan menjadi 2. Hasil disembunyikan untuk mngupdate settings bukaan menjadi 0 dan mengupdate jml_taruhan penjudi menjadi 0</li>
                                </ol>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal sim1 1 -->
                <div class="modal fade" id="sim1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item">Versi 2 penjudi bermain secara mandiri</li>
                                <li class="list-group-item">Penjudi memasukkan taruhan dan angka pilihan</li>
                                <li class="list-group-item">Hasil langsung keluar secara terus menerus</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- modal sim1 2 -->
                <div class="modal fade" id="sim2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item">Bandar memberikan sodaqoh kepadan penjudi yang ditentukan</li>
                                <li class="list-group-item">Sodaqoh 1 untuk 1 angka yang sama, begitu juga 2 dan 2</li>
                            </ol>

                        </div>
                    </div>
                </div>




                <form method="post" action="<?= base_url('slotgacor/update_angka_bandar'); ?>" class="d-flex justify-content-center mt-2">
                    <div class="card">
                        <div class="card-header">
                            <h3>ANGKA BANDAR</h3>
                        </div>
                        <div class="card-body">
                            <input type="text" name="angka_bandar" class="form-control form-control-lg" value="<?= settings()['angka_bandar']; ?>" required>

                            <div class="d-grid mt-3 gap-2">
                                <button type="submit" class="btn btn-primary" class="btn btn-primary"><i class="fa-solid fa-key"></i> SET</button>
                                <a class="btn btn-success text-light" href="<?= base_url('slotgacor/angka_terbaik_bandar'); ?>"><i class="fa-solid fa-heart"></i> SET ANGKA TERBAIK</a>
                                <a target="_blank" class="btn btn-success text-light" href="<?= base_url('slotgacor/analisis_angka_terbaik_bandar'); ?>"><i class="fa-solid fa-chart-pie"></i> ANALISIS ANGKA TERBAIK</a>
                                <a class="btn btn-danger text-light" href="<?= base_url('slotgacor/update_versi'); ?>"><i class="fa-solid fa-chart-pie"></i> VERSI <?= settings()['versi']; ?></a>
                                <a target="_blank" class="btn btn-info text-light" href="<?= base_url('slotgacor/penjudi'); ?>"><i class="fa-solid fa-user-secret"></i> DATA PENJUDI</a>
                                <a class="btn btn-info text-light" href="<?= base_url('slotgacor/tampilkan_hasil'); ?>"><?= (settings()['bukaan'] == 0 ? '<i class="fa-solid fa-eye-slash"></i> HASIL DISEMBUNYIKAN' : '<i class="fa-solid fa-eye"></i> HASIL DITAMPILKAN'); ?></a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-9">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">#</th>
                            <th style="text-align: center;" scope="col">Nama</th>
                            <th style="text-align: center;" scope="col">Angka</th>
                            <th style="text-align: center;" scope="col">Taruhan</th>
                            <th style="text-align: center;" scope="col">Sodaqoh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (penjudi() as $k => $i) : ?>
                            <?php if ($i['angka_taruhan'] != '') : ?>
                                <tr>
                                    <th style="text-align: center;" scope="row"><?= $k + 1; ?></th>
                                    <td><?= $i['nama']; ?></td>
                                    <td style="text-align: center;"><?= $i['angka_taruhan']; ?></td>
                                    <th style="text-align: right;"><?= angka($i['jml_taruhan']); ?></th>
                                    <td class="sodaqoh" contenteditable="true" data-id="<?= $i['id']; ?>" style="text-align: center;"><?= $i['sodaqoh']; ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php endif; ?>
</div>

<?= $this->endSection() ?>