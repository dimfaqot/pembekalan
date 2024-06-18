<h5 style="font-size: 17px;color:#727273">Grup Favorit</h5>
<div class="row g-2 mb-3">
    <?php foreach (iklan()['grup'] as $k => $i) : ?>
        <?php if ($k < 3) : ?>
            <div class="col">
                <a href="<?= base_url('facebook/visit/grup/'); ?><?= $i['status_id']; ?>" style="text-decoration: none;color:#393a3b;font-weight:500">
                    <img style="max-width: 100%;border-radius:50%;border:2px solid white;" src="<?= base_url('fb/grup/'); ?><?= $i['grup_image']; ?>" alt="Grup">
                    <h6 class="mt-2" style="text-align: center;"><?= $i['grup']; ?></h6>
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>