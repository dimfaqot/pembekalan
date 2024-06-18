<?= $this->extend('facebook/logged') ?>

<?= $this->section('content') ?>
<?= view('facebook/top_menu'); ?>
<div class="mb-5" style="background-color:#f5f5f5;">

    <div class="row bg-white g-0">
        <div class="col-3">
            <div class="d-flex px-3 pt-4 shadow shadow-sm gap-3" style="height:550px;">
                <a href="" style="width: 15%;">
                    <img style="max-width:100%;border-radius:5px" src="<?= base_url('fb/grup/'); ?><?= $data['grup_image']; ?>" alt="Gambar Profile">
                </a>

                <div>
                    <div class="d-flex justify-content-between gap-3">
                        <a href="" class="nama_status_normal" style="font-size: large;"><?= $data['grup']; ?></a>
                        <div class="d-flex justify-content-end text-center" style="border-radius:50%;width:30px;height:30px;padding-top:7px;padding-right:7px;background-color:#dde4eb">
                            <a href="" style="color: #303133;"><i class="fa-solid fa-square-caret-left" style="font-size:large;"></i></a>
                        </div>

                    </div>
                    <i class="fa-solid fa-earth-americas"></i> <span style="color: #8d9399;">Grup Publik</span> - <span style="color:#70777d;font-weight:500">44,0 rb anggota</span>


                    <div class="px-3 bg-white shadow shadow-sm" style="position: absolute;bottom:0px;left:0px;width:382px">
                        <div class="p-2 text-center" style="background-color:#f5f6f7;">
                            <h4><i class="fa-solid fa-comment"></i></h4>
                            <h6 style="font-weight: 600;font-size:18px;">Ngobrol tentang hal yang penting bagi Anda</h6>
                            <div style="font-size: medium;">Sarankan obrolan untuk grup guna terhubung secara real time. Jika admin menyetujui saran Anda, obrolan akan dibuat.</div>
                            <div class="d-grid">
                                <button class="btn_saran"><i class="fa-solid fa-plus"></i> Sarankan obrolan baru</button>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
            <div class="px-3" style="margin-top: 260px;">

                <?= view('facebook/grup'); ?>

            </div>

        </div>
        <div class="col-9">
            <div>
                <div style="border-radius:0px 0px 5px 5px;height: 390px;background-repeat:no-repeat;background-size:cover;background-position:center;background-image:url('<?= base_url('fb/grup/'); ?><?= $data['grup_image']; ?>'">

                    <div class="py-1 px-3" style="height:40px;background-color:#176be8;color:white;position:relative;top:92%;border-radius:0px 0px 5px 5px;font-size:medium;font-weight:600">
                        Grup oleh Nana Nina
                    </div>
                </div>

                <div class="px-3 pt-4 card shadow shadow-sm" style="border-radius: 0px;">

                    <h2><?= strtoupper($data['grup']); ?></h2>
                    <div style="font-size: 14px;">
                        <i class="fa-solid fa-earth-americas"></i> <span style="color: #8d9399;">Grup Publik</span> - <span style="color:#70777d;font-weight:500">44,0 rb anggota</span>

                    </div>
                    <div class="mt-2 d-flex justify-content-between">
                        <div>
                            <?php foreach (get_files() as $k => $i) : ?>
                                <?php if ($k < 20) : ?>
                                    <img style="width: 45px;border-radius:50%;border:2px solid white;<?= ($k > 0 ? 'margin-left:-12px' : ''); ?>" src="<?= base_url($i); ?>" alt="Users">
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>

                        <div>
                            <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Undang</button>
                            <button class="btn btn-light"><i class="fa-solid fa-share"></i> Bagikan</button>
                            <button class="btn btn-light"><i class="fa-solid fa-users"></i> Bergabung <i class="fa-solid fa-caret-down"></i></button>
                            <button class="btn btn-light"><i class="fa-solid fa-angle-down"></i></button>
                        </div>

                    </div>

                    <hr>
                    <?php $menu = ['Diskusi', 'Mencari Pemain', 'Unggulan', 'Orang', 'Acara', 'Media', 'File']; ?>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-3">
                            <?php foreach ($menu as $k => $i) : ?>
                                <a href="" class="<?= ($k == 0 ? 'menu_grup_active' : 'menu_grup'); ?>"><?= $i; ?></a>
                            <?php endforeach; ?>
                        </div>
                        <div>
                            <button class="btn btn-light"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <button class="btn btn-light"><i class="fa-solid fa-ellipsis"></i></button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <div class="card" style="margin-top: 25px;margin-bottom:14px;">
                                <div class="card-body px-3 pt-3 pb-3">
                                    <div class="d-flex gap-2">

                                        <img style="border-radius: 50%;" src="<?= base_url(); ?>fb/user/<?= user()['img']; ?>" width="40px" alt="User">
                                        <input class="py-2 px-3" type="text" style="font-size:16px;font-weight:500;width: 100%;border:1px solid #f0f1f2;background-color:#f0f1f2;border-radius:40px;color:#e8e9eb" placeholder="Tulis sesuatu...">
                                    </div>

                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <a class="col menu_status" style="font-weight: 600;" href=""><i class="fa-solid fa-video text-danger" style="font-size:large;"></i> Postingan Anonim</a>
                                        <a class="col menu_status" href=""><i class="fa-regular fa-images" style="font-size:large;color:#07ab53"></i> Foto/video</a>
                                        <a class="col menu_status" href=""><i class="fa-regular fa-face-grin" style="font-size:large;color: #fccc0d;"></i> Polling</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="margin-top: 25px;margin-bottom:14px;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex gap-2">
                                            <h6>Unggulan</h6> <i style="font-size:18px;padding-top:3px" class="fa-solid fa-circle-exclamation"></i>

                                        </div>

                                        <div>
                                            <a class="a_down" href=""><i class="fa-solid fa-chevron-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 style="color:#70777d;">Baru Saja Dilihat</h6>

                            <?= view('facebook/status'); ?>
                        </div>
                        <div class="col-5 mt-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5>Tentang</h5>
                                    <p style="font-size: medium;">Grup jual beli khusus unit Yaris segala tipe dan tahun di wilayah Jateng DIY. Pastikan postingan yang anda buat berisikan informasi yang jelas d… <a href="">Lihat selengkapnya</a></p>
                                    <h6><i class="fa-solid fa-earth-americas"></i> Publik</h6>
                                    <p style="font-size: medium;">Siapa pun bisa melihat siapa saja anggota grup ini dan apa yang mereka posting.</p>
                                    <h6><i class="fa-regular fa-eye"></i> Dapat dilihat</h6>
                                    <p style="font-size: medium;">Semua orang bisa menemukan grup ini.</p>

                                    <div class="d-grid">
                                        <button class="btn btn-light" style="font-weight: 500;">Pelajari selengkapanya</button>
                                    </div>
                                </div>
                            </div>
                            <?= view('facebook/iklan'); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>