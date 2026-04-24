<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?></title>
    <script src="https://kit.fontawesome.com/a193ca89ae.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        const message = (status = "200", message) => {
            let html = `<div class="d-flex justify-content-center">
                            <div class="bg-opacity-25 ${(status=="200"?"bg-success border border-success":"bg-danger border border-danger")} px-5 pb-1 rounded" style="font-size: medium;">${message}</div>
                        </div>`;

            $(".message").html(html);
            setTimeout(() => {
                $(".message").html("");
            }, 1000);

        }

        async function post(url = '', data = {}) {
            const response = await fetch("<?= base_url(); ?>" + url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });
            return response.json(); // parses JSON response into native JavaScript objects
        }

        function angka(a, prefix) {
            let angka = a.toString();
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        const time_php_to_js = (date, format = "d/m/Y") => {
            const d = new Date(date * 1000);

            const map = {
                d: d.getDate().toString().padStart(2, '0'),
                m: (d.getMonth() + 1).toString().padStart(2, '0'),
                Y: d.getFullYear(),
                H: d.getHours().toString().padStart(2, '0'),
                i: d.getMinutes().toString().padStart(2, '0'),
                s: d.getSeconds().toString().padStart(2, '0')
            };

            let result = '';
            for (let i = 0; i < format.length; i++) {
                const char = format[i];
                result += map[char] ?? char; // kalau bukan placeholder, langsung ditambahkan
            }

            return result;
        };
    </script>
</head>

<body>

    <div class="container">
        <div class="modal fade" id="main_modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border border-secondary body_modal p-4">

                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('iot'); ?>">Pembekalan</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= $judul == "Daftar" ? "active" : ""; ?>" href="<?= base_url('iot'); ?>">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $judul == "Rfid" ? "active" : ""; ?>" href="<?= base_url('iot/lampu'); ?>">Lampu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $judul == "Kantin" ? "active" : ""; ?>" href="<?= base_url('iot/kantin'); ?>">Kantin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $judul == "Laser" ? "active" : ""; ?>" href="<?= base_url('iot/laser'); ?>">Laser</a>
                        </li>
                    </ul>
                </div>
            </div>



        </nav>
        <?= $this->renderSection('content') ?>

        <div class="fixed-bottom message" style="margin-bottom: 90px;z-index:999999"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        let myModal = document.getElementById('main_modal');
        let modal = bootstrap.Modal.getOrCreateInstance(myModal);
    </script>
</body>

</html>