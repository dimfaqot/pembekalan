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


<body style="margin-top: 45px;background-color:#fff">


    <?= $this->renderSection('content') ?>

    <!-- zoom -->
    <div class="modal fade" id="modal_zoom" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center body_zoom">

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        const loading = (req = true) => {
            if (req === true) {
                $('.waiting').show()
            } else {
                $('.waiting').fadeOut()
            }
        }

        const sukses = () => {
            $('.sukses').show();
            setTimeout(() => {
                $('.sukses').fadeOut();
            }, 1200);
        }


        const gagal = (alert) => {
            $('.textGagal').text(alert);
            $('.gagal').fadeIn();
        }


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


        $(document).on('click', '.fyp', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            let kategori = $(this).data('kategori');
            let url = $(this).data('url');

            let myModal = document.getElementById('modal_zoom');
            let modal = bootstrap.Modal.getOrCreateInstance(myModal);

            $('.body_zoom').html('<img style="max-width:100%" src="' + url + '">');


            post('facebook/fyp', {
                    id,
                    kategori
                })
                .then(res => {
                    if (res.status == '200') {
                        modal.show();
                    } else {
                        gagal(res.message);
                    }

                })

        });

        $(document).on('keyup', '.cari_db', function(e) {
            e.preventDefault();

            let text = $(this).val();

            post('facebook/cari_db', {
                    text,
                    db: 'penjudi'
                })
                .then(res => {
                    if (res.status == '200') {
                        let html = '';
                        for (let i = 0; i < res.data.length; i++) {
                            html += '<a href="<?= base_url('facebook/data_fyp/'); ?>' + res.data[i].id + '" class="list-group-item list-group-item-action p-1" style="width: 190px;">' + res.data[i].nama + '</a>';
                        }

                        $('.body_cari_db').html(html);

                    } else {
                        gagal(res.message);
                    }

                })

        });
    </script>

</body>

</html>