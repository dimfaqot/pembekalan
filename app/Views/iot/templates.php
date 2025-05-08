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
    </script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('iot'); ?>">Pembekalan</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= $judul == "Lampu" ? "active" : ""; ?>" href="<?= base_url('iot/lampu'); ?>">Lampu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $judul == "Rfid" ? "active" : ""; ?>" href="<?= base_url('iot/rfid'); ?>">Rfid</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $judul == "Remote" ? "active" : ""; ?>" href="<?= base_url('iot/remote'); ?>">Remote</a>
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
</body>

</html>