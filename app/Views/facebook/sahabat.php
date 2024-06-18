<h5 style="font-size: 17px;color:#727273">Sapa Sahabat Karib</h5>
<div class="row g-1">
    <?php foreach (iklan()['teman'] as $k => $i) : ?>
        <?php if ($k < 2) : ?>
            <div class="col">
                <a href="<?= base_url('facebook/visit/user/'); ?><?= $i['status_id']; ?>" style="text-decoration: none;color:#393a3b;font-weight:500">
                    <img style="max-width: 100%;border-radius:5%;border:2px solid white;" src="<?= base_url('fb/user/'); ?><?= $i['user_image']; ?>" alt="Users">
                    <?= $i['nama']; ?>
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>