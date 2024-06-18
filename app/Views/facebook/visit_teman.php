<?= $this->extend('facebook/logged') ?>

<?= $this->section('content') ?>
<div class="container mb-5">
    <?= view('facebook/top_menu'); ?>
</div>

<div style="background-image: linear-gradient(180deg, #7dbbf8 30%, white 70%);height:610px;box-shadow: 0 4px 2px -2px #e4e6e8;">
    <div class="container">
        <img style="width:100%;text-align:center;border-radius:0px 0px 5px 5px" src="<?= base_url('fb/cover/'); ?><?= strtolower($data['nama']); ?>_cover.jpg" alt="COVER">
        <div class="d-flex gap-3 px-5">
            <img style="border: 4px solid white;border-radius:50%;margin-top:-50px;" src="<?= base_url(); ?>fb/user/<?= $data['user_image']; ?>" width="14%" alt="User">
            <div class="d-flex justify-content-between" style="width: 100%;">
                <div>
                    <h2 class="mt-4"><?= $data['nama']; ?></h2>
                    <h6 style="color:#939597;"><?= $data['jml_komentar']; ?> teman</h6>

                </div>

                <div class="mt-5">
                    <a class="btn_light" style="text-decoration: none;font-size:medium;color:#393a3b;font-weight:600" href=""><i class="fa-brands fa-facebook-messenger"></i> Kirim Pesan</a>
                    <a class="btn_light" style="text-decoration: none;font-size:medium;background-color:#095fc9;color:white;font-weight:600" href=""><i class="fa-solid fa-user-plus"></i> Tambahkan teman</a>


                </div>
            </div>
        </div>

        <div class="px-5">
            <hr>
            <?php $menu = ['Postingan', 'Tentang', 'Teman', 'Foto', 'Video', 'Reels', 'Lainnya'] ?>
            <div class="d-flex justify-content-between">
                <div class="d-flex gap-3">
                    <?php foreach ($menu as $k => $i) : ?>
                        <?php if ($i == 'Lainnya') : ?>
                            <a href style="margin-top: -7px;" class="<?= ($k == 0 ? 'menu_grup_active' : 'menu_grup'); ?>"><?= $i; ?> <i class="fa-solid fa-sort-down"></i></a>

                        <?php else : ?>
                            <a href style="margin-top: -7px;" class="<?= ($k == 0 ? 'menu_grup_active' : 'menu_grup'); ?>"><?= $i; ?></a>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div>
                    <button class="btn btn-light"><i class="fa-solid fa-ellipsis"></i></button>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="mt-1" style="background-color: #f5f5f5;">
    <div class="container" style="padding: 13px 58px 13px 58px;">
        <div class="row g-2">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h5>Intro</h5>
                        <h6 style="font-weight: 400;color:#7f8285"><i class="fa-solid fa-graduation-cap"></i> Pernah belajar di Ponpes Walisongo Sragen</h6>
                        <h6 style="font-weight: 400;color:#7f8285"><i class="fa-solid fa-briefcase"></i> Jual Beli Mobil Surakarta</h6>
                        <h6 style="font-weight: 400;color:#7f8285"><i class="fa-solid fa-house-flag"></i> Tinggal di <span style="font-weight: bold;color:#393a3b">Sragen</span></h6>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5>Foto</h5>
                            <button class="btn btn-light py-1" style="background-color: transparent;color:#095fc9;font-weight:500">Lihat semua Foto</button>
                        </div>
                        <div class="row g-0">
                            <?php foreach (get_files() as $k => $i) : ?>
                                <?php if ($k > 5 && $k < 12) : ?>
                                    <div class="col-4">
                                        <img style="width: 155px;border-radius:1%;border:2px solid white;" src="<?= base_url($i); ?>" alt="Users">
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5>Teman</h5>
                            <button class="btn btn-light py-1" style="background-color: transparent;color:#095fc9;font-weight:500">Lihat semua Teman</button>
                        </div>
                        <div class="row g-1 mb-3">
                            <?php $x = 0; ?>
                            <?php foreach (status('all') as $k => $i) : ?>
                                <?php if ($i['jenis'] == 'user') : ?>
                                    <?php if ($x < 6) : ?>
                                        <div class="col-4">
                                            <a href="<?= base_url('facebook/visit/user/'); ?><?= $i['id']; ?>" style="text-decoration: none;color:#393a3b;font-weight:500">
                                                <img style="width: 155px;border-radius:5%;border:2px solid white;" src="<?= base_url('fb/user/'); ?><?= $i['user_image']; ?>" alt="Users">
                                                <?= $i['nama']; ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?= view('facebook/sahabat'); ?>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">

                        <?= view('facebook/iklan'); ?>
                    </div>
                </div>

                <div class="footer_login my-3">
                    <div>
                        <a href="">Privasi</a> - <a href="">Ketentuan</a> - <a href="">Iklan</a> - <a href="">Pilihan Iklan <i class="fa-solid fa-play"></i></a>
                        <a href="">Cookie</a> - <a href="">Lainnya</a> - Meta © <?= date('Y'); ?>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card mb-3">
                    <div class="card-body py-2">
                        <div class="d-flex justify-content-between">
                            <h5 class="pt-1">Postingan</h5>
                            <button class="btn btn-light" style="font-weight: 600;"><i class="fa-solid fa-sliders"></i> Filter</button>
                        </div>

                    </div>
                </div>

                <?= view('facebook/status'); ?>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>