<h5 style="font-size: 17px;color:#727273">Iklan</h5>
<div class="row g-1 mb-3">
    <?php foreach (iklan()['produk'] as $k => $i) : ?>
        <?php if ($k < 4) : ?>
            <div class="col">
                <img style="max-width: 100%;" src="<?= base_url('fb/produk/'); ?><?= $i['produk_image']; ?>" alt="">
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>