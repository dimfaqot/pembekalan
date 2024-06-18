<?= $this->extend('slot/logged') ?>

<?= $this->section('content') ?>
<h3 class="mt-3">ANALISIS ANGKA TERBAIK BANDAR</h3>
<div class="table-responsive-xl">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="text-align: center;" scope="col">#</th>
                <th style="text-align: center;" scope="col">Nomor Taruhan</th>
                <th style="text-align: center;" scope="col">Total Hadiah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $k => $i) : ?>
                <tr>
                    <th style="text-align: center;" scope="row"><?= $k + 1; ?></th>
                    <td style="text-align: center;"><?= $i['angka_taruhan']; ?></td>
                    <th style="text-align: right;"><?= angka($i['hadiah']); ?></th>

                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>

</div>

<?= $this->endSection() ?>