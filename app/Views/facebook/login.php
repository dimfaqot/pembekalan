<?= $this->extend('facebook/guest') ?>

<?= $this->section('content') ?>

<div class="d-flex flex-column min-vw-100" style="min-height: 660px;">
    <div class="d-flex flex-grow-1 justify-content-center align-items-center">
        <div class="row" style="margin-left: 250px;margin-right: 250px;">
            <div class="col-md-6">
                <div style="padding-top: 17%;">
                    <img width="40%" src="<?= base_url(); ?>img/logo-text.png" alt="Logo Teks">
                    <h3 style="font-weight: 400;" class="mt-2">Facebook membantu Anda terhubung dan berbagi dengan orang-orang dalam kehidupan Anda.</h3>

                </div>

            </div>
            <div class="col-md-6 px-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="<?= base_url('facebook/auth'); ?>" method="post">
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control form-control-lg" placeholder="Email atau Nomor Telepon">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Kata Sandi">
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg" style="font-weight: 500;">Masuk</button>
                            </div>

                        </form>
                        <div class="text-center">
                            <a href="" class="lupa_kata_sandi">Lupa kata sandi?</a>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn_success btn-lg">Buat akun baru</button>
                        </div>
                    </div>
                </div>

                <div class="text-center" style="font-size: 15px;">
                    <a href="" class="buat_halaman">Buat Halaman</a> untuk selebriti, merek, atau bisnis.
                </div>

            </div>

        </div>
    </div>
</div>

<!-- modal buat akun baru -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <form action="<?= base_url('facebook/add'); ?>" method="post">
                    <div class="mb-2">
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control" name="username" placeholder="Username">

                    </div>
                    <div class="mb-2">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" style="font-weight: 500;">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection() ?>