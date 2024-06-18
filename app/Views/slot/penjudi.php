<?= $this->extend('slot/logged') ?>

<?= $this->section('content') ?>
<h3 class="mt-3">DATA PENJUDI</h3>
<div class="table-responsive-xl">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="text-align: center;" scope="col">#</th>
                <th style="text-align: center;" scope="col">Nama</th>
                <th style="text-align: center;" scope="col">Uang</th>
                <th style="text-align: center;" scope="col">Taruhan</th>
                <th style="text-align: center;" scope="col">Angka</th>
                <?php if (settings()['bukaan'] == 1) : ?>
                    <th style="text-align: center;" scope="col">Hadiah</th>

                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php

            $total_uang = 0;
            $total_taruhan = 0;
            $total_hadiah = 0;
            ?>
            <?php foreach ($data as $k => $i) : ?>
                <?php
                $total_uang += $i['uang'];
                $total_taruhan += $i['jml_taruhan'];
                $hadiah = compare_two_array($i['angka_taruhan'], $i['jml_taruhan']);

                $total_hadiah += $hadiah;
                ?>

                <tr>
                    <th style="text-align: center;" scope="row"><?= $k + 1; ?></th>
                    <td><?= $i['nama']; ?></td>
                    <td style="text-align: right;"><?= angka($i['uang']); ?></td>
                    <td style="text-align: right;"><?= angka($i['jml_taruhan']); ?></td>
                    <td style="text-align: center;"><?= str_replace(",", " | ", $i['angka_taruhan']); ?></td>
                    <?php if (settings()['bukaan'] == 1) : ?>
                        <th style="text-align: right;"><?= angka($hadiah); ?></th>

                    <?php endif; ?>
                </tr>

            <?php endforeach; ?>
            <tr>
                <th style="text-align: center;" colspan="2">TOTAL</th>
                <th style="text-align: right;"><?= angka($total_uang); ?></th>
                <th style="text-align: right;"><?= angka($total_taruhan); ?></th>
                <th style="text-align: center;">-</th>
                <?php if (settings()['bukaan'] == 1) : ?>
                    <th style="text-align: right;"><?= angka($total_hadiah); ?></th>

                <?php endif; ?>
            </tr>

        </tbody>
    </table>

</div>

<?= $this->endSection() ?>