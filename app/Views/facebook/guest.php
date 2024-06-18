<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?></title>
    <script src="https://kit.fontawesome.com/a193ca89ae.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>img/logo.png" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="<?= base_url('fb/'); ?>style.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>style.css" />
</head>

<body style="background-color: #f0f2f5;">
    <!-- sukses php -->
    <?php if (session()->getFlashdata('sukses')) : ?>
        <div class="sukses middlecenter">
            <div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
            </div>
        </div>
    <?php endif; ?>

    <!-- gagal php -->
    <?php if (session()->getFlashdata('gagal')) : ?>

        <div class="gagal blur" style="border-radius: 10px;">
            <div class="middlecenter">
                <div class="d-flex justify-content-between bg-danger px-1" style="border-radius: 10px;width:300px; color:lightpink;font-size:12px;">

                    <div class="toast-body p-2" style="border-radius: 10px; font-size:12px;">
                        <?= session()->getFlashdata('gagal'); ?>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm m-auto btnclose" style="color:lightpink;"><i class="fa fa-times-circle"></i></button>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>


    <nav class="fixed-bottom">
        <div class="m-auto text-center p-3" style="height: 180px;background-color:#fff">
            <div style="margin-left: 250px;margin-right: 250px;">
                <div class="d-flex gap-2 footer_login">
                    <a href="">Bahasa Indonesia</a>
                    <a href="">English (UK)</a>
                    <a href="">Basa Jawa</a>
                    <a href="">Bahasa Melayu</a>
                    <a href="">日本語</a>
                    <a href="">العربية</a>
                    <a href="">Français (France)</a>
                    <a href="">Español</a>
                    <a href="">한국어</a>
                    <a href="">Português (Brasil)</a>
                    <a href="">Deutsch</a>
                    <button class="btn_plus"><i class="fa-solid fa-plus"></i></button>
                </div>

                <hr>
                <div class="d-flex align-content-start flex-wrap gap-2 footer_login">
                    <a href="">Daftar</a>
                    <a href="">Masuk</a>
                    <a href="">Messenger</a>
                    <a href="">Facebook Lite</a>
                    <a href="">Video</a>
                    <a href="">Tempat</a>
                    <a href="">Game</a>
                    <a href="">Marketplace</a>
                    <a href="">Meta Pay</a>
                    <a href="">Meta Store</a>
                    <a href="">Meta Quest</a>
                    <a href="">Imagine with Meta AI</a>
                    <a href="">Instagram</a>
                    <a href="">Threads</a>
                    <a href="">Penggalangan Dana</a>
                    <a href="">Layanan</a>
                    <a href="">Pusat Informasi Pemilu</a>
                    <a href="">Kebijakan Privasi</a>
                    <a href="">Pusat Privasi</a>
                    <a href="">Grup</a>
                    <a href="">Tentang</a>
                    <a href="">Buat Iklan</a>
                    <a href="">Buat Halaman</a>
                    <a href="">Developer</a>
                    <a href="">Karier</a>
                    <a href="">Cookie</a>
                    <a href="">Pilihan Iklan</a>
                    <a href="">Ketentuan</a>
                    <a href="">Bantuan</a>
                    <a href="">Pengunggahan Kontak & Non-Pengguna</a>
                    <a href="">Pengaturan</a>
                </div>
                <div class="meta_copyright mt-3">Meta © <?= date('Y'); ?></div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        $(".btnclose").click(function() {
            $('.gagal').hide();
        })

        setTimeout(() => {
            $('.sukses').fadeOut();
        }, 1200);

        const loading = (req = true) => {
            if (req === true) {
                $('.waiting').show()
            } else {
                $('.waiting').fadeOut()
            }
        }
    </script>
</body>

</html>