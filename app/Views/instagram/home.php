<?= $this->extend('instagram/logged') ?>

<?= $this->section('content') ?>

<div class="container" style="margin-top: -20px;">
    <div class="d-flex gap-2">
        <?php if (user()['role'] == 'Root') : ?>
            <a class="btn_add" style="padding: 2px 10px;" href="<?= base_url('instagram/versi'); ?>"><i class="fa-solid fa-right-from-bracket"></i> Versi <?= settings()['versi_ig']; ?></a>
            <button type="button" class="btn_main" style="padding: 2px 10px;" data-bs-toggle="modal" data-bs-target="#tools">
                Simulasi
            </button>
        <?php endif; ?>
        <a class="btn_danger" href="<?= base_url('instagram/logout'); ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        <?php if (user()['role'] == 'Root') : ?>

            <div>
                <input type="text" placeholder="Search..." class="cari_db" style="border-radius: 12px;padding:5px 20px;height:23px;">
                <div class="list-group body_cari_db" style="position:absolute;">

                </div>

            </div>

        <?php endif; ?>
        <div><?= user()['nama']; ?></div>
    </div>

    <?php if (settings()['versi_ig'] == 1) : ?>
        <div class="d-flex justify-content-center gap-2">
            <div style="font-size:large;"><i class="fa-brands fa-instagram"></i></div>
            <div style="width: 100px;"><img width="100%" src="<?= base_url('ig/ig-text.png'); ?>" alt="IG"></div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <div class="card">
                <div class="card-body" id="top" style="height: 100%;width:400px;height:630px;overflow-y:scroll;text-align:center;">
                    <?php foreach (videos() as $k => $i) : ?>

                        <video width="350" id="video<?= $k; ?>" data-id="<?= $i['id']; ?>" loop class="mb-3 video" style="border-radius: 10px; height:600px;">
                            <source src="<?= base_url('ig/videos/'); ?><?= $i['url']; ?>.mp4" type="video/mp4">
                            <source src="<?= base_url('ig/videos/'); ?><?= $i['url']; ?>.ogg" type="video/ogg">
                        </video>


                    <?php endforeach; ?>


                </div>
            </div>
        </div>

        <div class="text-center mt-1 body_musik">


        </div>

    <?php endif; ?>
    <?php if (settings()['versi_ig'] == 2) : ?>
        <div class="row">
            <div class="col-8">

                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Penyanyi</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Durasi</th>
                        </tr>
                    </thead>

                    <tbody class="body_daftar_musik">
                        <?php foreach ($data as $k => $i) : ?>
                            <tr>
                                <td><?= ($k + 1); ?></td>
                                <td><?= $i['penyanyi']; ?></td>
                                <td><?= $i['judul']; ?></td>
                                <td><?= $i['genre']; ?></td>
                                <td><?= $i['durasi']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <div class="d-flex justify-content-center gap-2">
                    <div style="font-size:large;"><i class="fa-brands fa-instagram"></i></div>
                    <div style="width: 100px;"><img width="100%" src="<?= base_url('ig/ig-text.png'); ?>" alt="IG"></div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <div class="card">
                        <div class="card-body" id="top" style="height: 100%;width:400px;height:630px;overflow-y:scroll;text-align:center;">
                            <?php foreach (videos() as $k => $i) : ?>

                                <video width="350" id="video<?= $k; ?>" data-id="<?= $i['id']; ?>" loop class="mb-3 video" style="border-radius: 10px; height:600px;">
                                    <source src="<?= base_url('ig/videos/'); ?><?= $i['url']; ?>.mp4" type="video/mp4">
                                    <source src="<?= base_url('ig/videos/'); ?><?= $i['url']; ?>.ogg" type="video/ogg">
                                </video>


                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-1 body_musik">


            </div>

        </div>

    <?php endif; ?>
</div>

<!-- modal tool -->
<!-- modal tools -->
<div class="modal fade" id="tools" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item">Varsi untuk pindah versi dari 1 ke 2 atau sebaliknya. Yang tampil adalah yang sedang diaktifkan</li>
                    <li class="list-group-item">Versi 1 detail durasi menonton tidak ditampilkan</li>
                    <li class="list-group-item">Peserta diperintahkan menonton video kesukaan</li>
                    <li class="list-group-item">Pembicara menebak lagu kesukaan</li>
                    <li class="list-group-item">Pembicara mengaktifkan versi 2 lalu peserta mereload untuk melihat di halamannya sendiri</li>
                </ol>


            </div>
        </div>
    </div>
</div>

<!-- data durasi menonton user -->

<div class="modal fade" id="modal_detail_menonton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h6 class="judul_detail_menonton"></h6>
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Penyanyi</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Durasi</th>
                    </tr>
                </thead>

                <tbody class="body_detail_menonton">

                </tbody>
            </table>

            <div class="body_detail_menonton_del d-flex justify-content-end gap-2">

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>