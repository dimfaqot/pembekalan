<div class="fixed-top px-3 py-2 border border-bottom" style="height: 57px;background-color:#fff;">
    <div class="row">
        <div class="col-3">
            <div class="d-flex gap-2">
                <a href="<?= base_url('facebook/home'); ?>">
                    <img src="<?= base_url(); ?>img/logo.png" width="40px" alt="Logo">

                </a>
                <input class="p-2" type="text" style="font-size:15px;width: 60%;border:1px solid #f0f1f2;background-color:#f0f1f2;border-radius:40px;font-family:Arial, FontAwesome" placeholder="&#xF002; Cari di Facebook">
            </div>
        </div>
        <div class="col-6">
            <div class="row g-2">
                <a class="col top_menu_active" href=""><i class="fa-solid fa-house"></i>
                </a>
                <a class="col top_menu" href=""><i class="fa-solid fa-user-group"></i>
                </a>
                <a class="col top_menu" href=""><i class="fa-solid fa-tv"></i>
                </a>
                <a class="col top_menu" href=""><i class="fa-solid fa-store"></i>
                </a>
                <a class="col top_menu" href=""><i class="fa-solid fa-users"></i>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="d-flex justify-content-end gap-2">
                <?php if (user()['role'] == 'Root') : ?>
                    <a href="<?= base_url('facebook/settings'); ?>" class="top_right" href=""><i class="fa-solid fa-gear"></i>
                    </a>
                <?php else : ?>
                    <?php if (settings()['versi_fb'] == 3) : ?>

                        <a href="<?= base_url('facebook/logout'); ?>" class="top_right bg-danger" href=""><i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                        <a href="<?= base_url('facebook/data_fyp'); ?>" class="top_right" href=""><i class="fa-solid fa-gear"></i>
                        </a>
                    <?php endif; ?>

                <?php endif; ?>
                <a href="" class="top_right" href=""><i class="fa-solid fa-bars"></i>
                </a>
                <a href="" class="top_right" href=""><i class="fa-brands fa-facebook-messenger"></i>
                </a>
                <a href="" class="top_right" href=""><i class="fa-solid fa-bell"></i>
                </a>
                <a href="<?= base_url('facebook/home'); ?>">
                    <img style="border-radius: 50%;" src="<?= get_profile(); ?>" width="40px" alt="User">

                </a>
            </div>
        </div>
    </div>
</div>