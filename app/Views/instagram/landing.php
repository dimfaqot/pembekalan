<?= $this->extend('instagram/guest') ?>

<?= $this->section('content') ?>

<div class="d-none d-md-block" style="margin-top:75px">
    <div class="row">
        <div class="col-6">
            <div class="d-flex justify-content-end">
                <div style="background-image: url(<?= base_url('ig/ig2.png'); ?>);width:45%;background-repeat: no-repeat;background-position: center;">
                    <img style="max-width: 100%;text-align:center;" src="<?= base_url('ig/frame.png'); ?>" alt="IG">
                </div>
            </div>
        </div>

        <div class="col-6">
            <div style="border: 1px solid #cfcbca;text-align:center;padding:40px;width:55%;">
                <img width="55%" src="<?= base_url('ig/ig-text.png'); ?>" alt="">
                <form action="<?= base_url('instagram/auth'); ?>" method="post">
                    <input type="text" name="username" class="form-control form-control-sm mb-2 mt-5" placeholder="Phone number, username, or email">
                    <input type="password" name="password" class="form-control form-control-sm" placeholder="Password">
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-sm btn-login-ig">Log in</button>
                    </div>

                </form>

                <div class="d-flex justify-content-center mt-5 gap-1">
                    <p style="margin-top: -20px;color:#cfcbca">_______________________</p>
                    <p style="margin-top: -15px;font-weight:500;color:#858585;">OR</p>
                    <p style="margin-top: -20px;color:#cfcbca">_______________________</p>
                </div>

                <div class="mt-2">
                    <div class="d-flex justify-content-center gap-2">
                        <div style="width: 6%;margin-top:-1px;">
                            <img width="100%" src="<?= base_url('img/logo.png'); ?>" alt="FB">
                        </div>
                        <a href="" class="link-facebook-login">Log in with Facebook</a>
                    </div>

                    <div class="mt-3">
                        <a href="" style="text-decoration: none; color:#001; font-size:12px;">Forgot password?</a>
                    </div>
                </div>
            </div>

            <div class="mt-3" style="border: 1px solid #cfcbca;text-align:center;padding:20px;width:55%;font-size:14px">
                Don't have an account? <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="" style="text-decoration: none;font-weight:500;color:#5aa7ff">Sign up</a>
            </div>
            <div class="mt-3 text-center" style="width: 55%;font-size:14px;">
                Get the app.
                <div class="d-flex justify-content-center mt-2 gap-2">
                    <img width="30%" src="<?= base_url('ig/playstrore.png'); ?>" alt="PLAYSTORE">
                    <img width="30%" src="<?= base_url('ig/microsoft.png'); ?>" alt="MICROSOFT">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- navbar sm -->
<div class="d-block d-md-none d-sm-block" style="margin-top:75px">
    <div style="border: 1px solid #cfcbca;text-align:center;padding:40px;width:100%;">
        <img width="100%" src="<?= base_url('ig/ig-text.png'); ?>" alt="">
        <form action="<?= base_url('instagram/auth'); ?>" method="post">
            <input type="text" name="username" class="form-control form-control-sm mb-2 mt-5" placeholder="Phone number, username, or email">
            <input type="password" name="password" class="form-control form-control-sm" placeholder="Password">
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-sm btn-login-ig">Log in</button>
            </div>

        </form>

        <div class="d-flex justify-content-center mt-5 gap-1">
            <p style="margin-top: -20px;color:#cfcbca">_______________________</p>
            <p style="margin-top: -15px;font-weight:500;color:#858585;">OR</p>
            <p style="margin-top: -20px;color:#cfcbca">_______________________</p>
        </div>

        <div class="mt-2">
            <div class="d-flex justify-content-center gap-2">
                <div style="width: 6%;margin-top:-1px;">
                    <img width="100%" src="<?= base_url('img/logo.png'); ?>" alt="FB">
                </div>
                <a href="" class="link-facebook-login">Log in with Facebook</a>
            </div>

            <div class="mt-3">
                <a href="" style="text-decoration: none; color:#001; font-size:12px;">Forgot password?</a>
            </div>
        </div>
    </div>

    <div class="mt-3" style="border: 1px solid #cfcbca;text-align:center;padding:20px;width:100%;font-size:14px">
        Don't have an account? <a href="" style="text-decoration: none;font-weight:500;color:#5aa7ff">Sign up</a>
    </div>
    <div class="mt-3 text-center" style="width: 100%;font-size:14px;">
        Get the app.
        <div class="d-flex justify-content-center mt-2 gap-2">
            <img width="30%" src="<?= base_url('ig/playstrore.png'); ?>" alt="PLAYSTORE">
            <img width="30%" src="<?= base_url('ig/microsoft.png'); ?>" alt="MICROSOFT">
        </div>
    </div>
</div>

<!-- modal buat akun baru -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <form action="<?= base_url('instagram/add_user'); ?>" method="post">
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