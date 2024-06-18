<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1>Hello, world!</h1>

    <img style="width: 10%;border-radius:50%" src="<?= base_url('fb/user/'); ?>fajar.jpg" alt="">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Uang</th>
                <th scope="col">Shodaqoh</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $i) : ?>

                <tr>
                    <th scope="row">1</th>
                    <td><a href="<?= base_url('home/bapakku/'); ?><?= $i['id']; ?>"><?= $i['nama']; ?></a></td>
                    <td><?= $i['uang']; ?></td>
                    <td><?= $i['sodaqoh']; ?></td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>