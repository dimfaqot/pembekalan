<?= $this->extend('facebook/logged') ?>

<?= $this->section('content') ?>
<div class="container mb-5">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 30%;">
            <div class="card-body d-grid">
                <h6>DATA FYP</h6>
                <a href="<?= base_url('facebook/home'); ?>" type="button" class="btn btn-info text-white btn-lg mb-2"><i class="fa-solid fa-house"></i></a>
                <?php if (user()['role'] == 'Root') : ?>
                    <a href="<?= base_url('facebook/settings'); ?>" type="button" class="btn btn-primary btn-lg mb-2"><i class="fa-solid fa-gear"></i></a>
                <?php endif; ?>
            </div>
        </div>


    </div>

    <?php if (user()['role'] == 'Root') : ?>
        <div class="bg-light p-2">
            <input type="text" placeholder="Search..." class="cari_db" style="border-radius: 12px;padding:5px 20px;height:23px;">
            <div class="list-group body_cari_db" style="position:absolute;">

            </div>

        </div>


    <?php endif; ?>

    <div class="row mt-4 g-1">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h6>Story</h6>
                    <table class="table table-striped table-bordered mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            <?php foreach ($data['simpulan'] as $k => $i) : ?>
                                <?php if ($i['ket'] == 'story') : ?>
                                    <tr>
                                        <th scope="row"><?= $x++; ?></th>
                                        <td><?= $i['nama']; ?></td>
                                        <td><?= $i['jml_kunjungan']; ?></td>
                                    </tr>


                                <?php endif; ?>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h6>Teman</h6>
                    <table class="table table-striped table-bordered mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            <?php foreach ($data['simpulan'] as $k => $i) : ?>
                                <?php if ($i['ket'] == 'user') : ?>
                                    <tr>
                                        <th scope="row"><?= $x++; ?></th>
                                        <td><?= $i['nama']; ?></td>
                                        <td><?= $i['jml_kunjungan']; ?></td>
                                    </tr>


                                <?php endif; ?>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h6>Grup</h6>
                    <table class="table table-striped table-bordered mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            <?php foreach ($data['simpulan'] as $k => $i) : ?>
                                <?php if ($i['ket'] == 'grup') : ?>
                                    <tr>
                                        <th scope="row"><?= $x++; ?></th>
                                        <td><?= $i['grup']; ?></td>
                                        <td><?= $i['kategori']; ?></td>
                                        <td><?= $i['jml_kunjungan']; ?></td>
                                    </tr>


                                <?php endif; ?>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h6>Produk/Iklan</h6>
                    <table class="table table-striped table-bordered mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            <?php foreach ($data['simpulan'] as $k => $i) : ?>
                                <?php if ($i['ket'] == 'produk') : ?>
                                    <tr>
                                        <th scope="row"><?= $x++; ?></th>
                                        <td><?= $i['nama_produk']; ?></td>
                                        <td><?= $i['kategori']; ?></td>
                                        <td><?= $i['jml_kunjungan']; ?></td>
                                    </tr>


                                <?php endif; ?>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <h6 class="mt-4">Detail</h6>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Jenis</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['data'] as $k => $i) : ?>
                <tr>
                    <th scope="row"><?= ($k + 1); ?></th>
                    <td><?= $i['jenis']; ?></td>
                    <td><?= ($i['nama'] == '' ? '-' : $i['nama']); ?></td>
                    <td><?= ($i['kategori'] == '' ? '-' : $i['kategori']); ?></td>
                    <td><?= date('d-m-Y H:i:s', $i['created_at']); ?></td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>


</div>

<?= $this->endSection() ?>