<!-- menu atas -->
<?= view('facebook/top_menu'); ?>

<!-- akhir menu atas -->

<!-- body -->
<div class="row g-1" style="margin-left: -10px;">

    <!-- kiri -->
    <div class="col-3" style="padding-top: 35px;">
        <a href="" class="d-flex gap-3 menu_left">
            <img style="border-radius: 50%;" src="<?= get_profile(); ?>" width="40px" alt="User">
            <h6 class="pt-2"><?= user()['nama']; ?></h6>


        </a>
        <a href="" class="d-flex gap-3 menu_left">
            <div class="menu_left_icon">
                <i class="fa-solid fa-user-group"></i>
            </div>
            <h6 class="pt-2">Cari Teman</h6>


        </a>
        <a href="" class="d-flex gap-3 menu_left">
            <div class="menu_left_icon">
                <i class="fa-solid fa-store"></i>
            </div>
            <h6 class="pt-2">Marketplace</h6>


        </a>
        <a href="" class="d-flex gap-3 menu_left">
            <div class="menu_left_icon">
                <i class="fa-regular fa-clock"></i>
            </div>
            <h6 class="pt-2">Kenangan</h6>


        </a>
        <a href="" class="d-flex gap-3 menu_left">
            <div class="menu_left_icon">
                <i class="fa-regular fa-bookmark"></i>
            </div>
            <h6 class="pt-2">Tersimpan</h6>


        </a>
        <a href="" class="d-flex gap-3 menu_left">
            <div class="menu_left_icon">
                <i class="fa-solid fa-users-line"></i>
            </div>
            <h6 class="pt-2">Grup</h6>


        </a>
        <a href="" class="d-flex gap-3 menu_left">
            <div class="menu_left_icon">
                <i class="fa-solid fa-tv"></i>
            </div>
            <h6 class="pt-2">Video</h6>


        </a>
        <a href="" class="d-flex gap-3 menu_left">
            <div class="menu_left_icon">
                <i class="fa-regular fa-newspaper"></i>
            </div>
            <h6 class="pt-2">Kabar</h6>


        </a>
        <a href="" class="d-flex gap-3 menu_left">
            <div class="menu_left_icon">
                <i class="fa-solid fa-signal"></i>
            </div>
            <h6 class="pt-2">Pengelola Iklan</h6>


        </a>
        <a href="" class="d-flex gap-3 menu_left">
            <div class="menu_left_icon">
                <i class="fa-solid fa-bullseye"></i>
            </div>
            <h6 class="pt-2">Penanggulangan Krisis</h6>


        </a>
        <a href="" class="d-flex gap-3 menu_left">
            <div class="menu_left_icon">
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <h6 class="pt-2">Lihat selengkapnya</h6>

        </a>

        <div class="footer_login" style="position: absolute;bottom:10px;margin-left:6px;">
            <div>
                <a href="">Privasi</a> - <a href="">Ketentuan</a> - <a href="">Iklan</a> - <a href="">Pilihan Iklan <i class="fa-solid fa-play"></i></a>
            </div>
            <a href="">Cookie</a> - <a href="">Lainnya</a> - Meta © <?= date('Y'); ?>
        </div>
    </div>

    <!-- akhir kiri -->


    <!-- tengah -->
    <div class="col-6 px-4" style="margin-top: 40px;height:100vh;overflow-y:auto;">

        <!-- story baru -->
        <div class="d-flex gap-2">
            <a href="" <?= (user()['img'] == 'images.jpg' ? 'class="border"' : ''); ?> style="text-decoration:none;height: 250px;width:20%;border-radius: 10px;background-repeat:no-repeat;background-size:cover;background-position:center;background-image:url('<?= get_profile(); ?>'">
                <div style="position: relative;left:10px;top:18px;">
                    <img style="border: 4px solid #0c77c4;border-radius:50%" src="<?= get_profile(); ?>" width="30%" alt="User">

                </div>
                <div style="position: relative;top:68%;text-align:center;border-radius:0px 0px 10px 10px" class="bg-white">
                    <i class="fa-solid fa-circle-plus text-primary" style="font-size: xx-large;margin-top:-17px;"></i>
                    <div style="font-size: 12px;font-weight:bold;;color:#393a3b;margin-top:3px;padding-bottom:2px;">Buat cerita</div>
                </div>
            </a>
            <?php foreach (status('story') as $i) : ?>

                <a class="fyp" data-id="<?= $i['id']; ?>" data-kategori="story" data-url="<?= base_url("fb/story/"); ?><?= $i['story_image']; ?>" href="" style="text-decoration:none;height: 250px;width:20%;border-radius: 10px;background-repeat:no-repeat;background-size:cover;background-position:center;background-image:url('<?= base_url("fb/story/"); ?><?= $i['story_image']; ?>'">
                    <div style="position: relative;left:10px;top:18px;">
                        <img style="border: 4px solid #0c77c4;border-radius:50%" src="<?= base_url(); ?>fb/user/<?= $i['user_image']; ?>" width="30%" alt="User">
                    </div>
                </a>


            <?php endforeach; ?>

        </div>
        <!-- akhir story baru -->

        <!-- siaran langsung -->
        <div class="card" style="margin-top: 25px;margin-bottom:14px;">
            <div class="card-body px-3 pt-3 pb-3">
                <div class="d-flex gap-2">

                    <img style="border-radius: 50%;" src="<?= get_profile(); ?>" width="40px" alt="User">
                    <input class="py-2 px-3" type="text" style="font-size:16px;font-weight:500;width: 100%;border:1px solid #f0f1f2;background-color:#f0f1f2;border-radius:40px;color:#e8e9eb" placeholder="Apa yang Anda pikirkan, <?= user()['nama']; ?>?">
                </div>

                <hr>
                <div class="d-flex justify-content-between">
                    <a class="col menu_status" style="font-weight: 600;" href=""><i class="fa-solid fa-video text-danger" style="font-size:large;"></i> Video siaran langsung</a>
                    <a class="col menu_status" href=""><i class="fa-regular fa-images" style="font-size:large;color:#07ab53"></i> Foto/video</a>
                    <a class="col menu_status" href=""><i class="fa-regular fa-face-grin" style="font-size:large;color: #fccc0d;"></i> Perasaan/aktifitas</a>
                </div>
            </div>
        </div>

        <!-- akhir siaran langsung -->


        <!-- timeline -->
        <?= view('facebook/status'); ?>

        <!-- akhir timeline -->


    </div>

    <!-- akhir tengah -->


    <!-- kanan -->
    <div class="col-3" style="margin-top: 40px;">
        <!-- <h5 style="font-size: 17px;color:#727273">Obrolan komunitas Anda</h5>
        <a href="" class="d-flex gap-2 mb-3 menu_kanan">
            <div class="p-2" style="background-image: linear-gradient(60deg, #aeaeb0 5%, #d9d9db 50%);border-radius:50%;color:white"><i class="fa-solid fa-comment-dots" style="font-size: large;"></i></div>
            <div>
                <h6 style="font-size: 15px;color:#393a3b">baru gabung</h6>
                <div style="margin-top: -10px;color:#727273">Jual Beli Hyundai Getz & Part & Troubleshooting</div>
            </div>
        </a>
        <a href="" class="d-flex gap-2 mb-3 menu_kanan">
            <div class="p-2" style="background-image: linear-gradient(60deg, #aeaeb0 5%, #d9d9db 50%);border-radius:50%;color:white"><i class="fa-solid fa-comment-dots" style="font-size: large;"></i></div>
            <div>
                <h6 style="font-size: 15px;color:#393a3b">Agud</h6>
                <div style="margin-top: -10px;color:#727273">Jual Beli Hyundai Getz & Part & Troubleshooting</div>
            </div>
        </a> -->


        <?= view('facebook/grup'); ?>
        <?= view('facebook/iklan'); ?>
        <?= view('facebook/sahabat'); ?>

    </div>
    <!-- akhir kanan -->
</div>