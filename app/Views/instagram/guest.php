<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?></title>
    <script src="https://kit.fontawesome.com/a193ca89ae.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>/ig/logo.png" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>style.css" />

    <style>
        .btn-login-ig {
            background-color: #5aa7ff;
            color: white;
            font-weight: 500;
            border-radius: 8px;
        }

        .btn-login-ig:hover {
            background-color: #0064e0;
            color: white;
            font-weight: 500;
            border-radius: 8px;
        }

        .link-facebook-login {
            color: #024b99;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .ig-footer a {
            color: #5b5b5c;
            text-decoration: none;
        }

        .ig-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- loading -->
    <div class="blur waiting" style="display:none">
        <div class="middlecenter">
            <div class="load">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>
    </div>


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

    <!-- sukses js -->
    <div class="sukses middlecenter" style="display: none;">
        <div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
            </svg>
        </div>
    </div>


    <!-- gagal js -->
    <div class="gagal blur" style="border-radius: 10px; z-index:99999999; display:none">
        <div class="middlecenter">
            <div class="d-flex justify-content-between bg-danger px-1" style="border-radius: 10px;width:300px; color:lightpink;font-size:12px;">

                <div class="toast-body p-2 textGagal" style="border-radius: 10px; font-size:12px;">

                </div>
                <div>
                    <button type="button" class="btn btn-sm m-auto btnclose" style="color:lightpink;"><i class="fa fa-times-circle"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">


        <!-- zoom -->
        <div class="modal fade" id="modal_zoom" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body d-flex justify-content-center body_download">

                    </div>
                    <div class="download_footer d-grid gap-2 d-flex justify-content-center mb-3">

                    </div>
                </div>
            </div>
        </div>
        <div class="d-block d-md-none d-sm-block" style="margin-top:60px;"></div>
        <?= $this->renderSection('content') ?>

    </div>

    <?= $this->renderSection('content') ?>

    <div class="fixed-bottom" style="height: 120px;">
        <div class="d-flex justify-content-center gap-3 ig-footer">
            <a href="">Meta</a>
            <a href="">About</a>
            <a href="">Blog</a>
            <a href="">Jobs</a>
            <a href="">Help</a>
            <a href="">API</a>
            <a href="">Privacy</a>
            <a href="">Terms</a>
            <a href="">Locations</a>
            <a href="">Instagram Lite</a>
            <a href="">Treads</a>
            <a href="">Contact Uploading & Non-Users</a>
            <a href="">Meta Verified</a>
        </div>
        <div class="mt-2" style="text-align: center;font-size:small;color: #5b5b5c;">
            &#169 <?= date('Y'); ?> Instagram from Meta
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="extensions/export/bootstrap-table-export.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));


        async function post(url = '', data = {}) {
            loading(true);
            const response = await fetch("<?= base_url(); ?>" + url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });
            loading(false);
            return response.json(); // parses JSON response into native JavaScript objects
        }
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

        $(document).on('keyup', '.cari', function(e) {
            e.preventDefault();

            let value = $(this).val().toLowerCase();
            console.log(value);
            $('.tabel_search tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });

        });

        $(document).on('click', '.zoom', function(e) {
            e.preventDefault();
            let url = $(this).data('url');

            let html = '';
            html += '<button type="button" class="btn-sm btn_purple" data-bs-dismiss="modal">Close</button>';
            html += '<a href="' + url + '" type="button" class="btn-sm btn_add" download>Download</a>';
            $('.download_footer').html(html);

            let img = '';
            img += '<img src="' + url + '" class="img-fluid" alt="File">';
            $('.body_download').html(img);

            let myModal = document.getElementById('modal_zoom');
            let modal = bootstrap.Modal.getOrCreateInstance(myModal)
            modal.show()
        });

        const str_replace = (search, replace, subject) => {
            return subject.split(search).join(replace);
        }

        let x = 'Makan';
        x.toUpperCase();
    </script>
</body>

</html>