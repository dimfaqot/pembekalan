       <?php foreach (status() as $i) : ?>
           <?php if ($i['jenis'] == 'produk') : ?>

               <div class="card mb-2">
                   <div class="card-body">

                       <!-- identitas penulis status -->
                       <div class="d-flex justify-content-between">
                           <div class="d-flex gap-2">
                               <div>
                                   <img style="border-radius: 10px;" src="<?= base_url(); ?>fb/user/<?= $i['user_image']; ?>" width="40px" alt="User">
                                   <div style="position: relative;">
                                       <img style="border-radius: 50%;border:1px solid white;margin-left:13px;margin-top:-42px;" src="<?= base_url(); ?>fb/grup/<?= $i['grup_image']; ?>" width="30px" alt="Grup">
                                   </div>
                               </div>
                               <div>
                                   <a class="nama_status_normal" href="<?= base_url('facebook/visit/grup/'); ?><?= $i['id']; ?>"><?= $i['grup']; ?></a>
                                   <div>
                                       <a href="<?= base_url('facebook/visit/user/'); ?><?= $i['id']; ?>" class="nama_status_sm"><?= $i['nama']; ?> </a>- <?= $i['waktu']; ?> <i class="fa-solid fa-earth-americas"></i>

                                   </div>

                               </div>
                           </div>



                           <div class="d-flex gap-2 status_top_right">
                               <a href=""><i class="fa-solid fa-ellipsis"></i></a>
                               <a href=""><i class="fa-solid fa-x"></i></a>
                           </div>
                       </div>

                       <!-- akhir identitas penulis status -->

                       <!-- isi status -->
                       <div style="font-size: medium;">
                           <?= $i['deskripsi']; ?>
                       </div>

                       <!-- akhir isi status -->
                   </div>

                   <!-- gambar status -->
                   <?php if (count($i['arr_produk_image']) == 1) : ?>
                       <a href="" data-kategori="produk" data-id="<?= $i['id']; ?>" data-url="<?= base_url(); ?>fb/produk/<?= $p; ?>">
                           <img class="fyp" src="<?= base_url(); ?>fb/produk/<?= $i['produk_image']; ?>" alt="Produk">
                       </a>

                   <?php else : ?>
                       <div class="row g-1 px-2">
                           <?php foreach ($i['arr_produk_image'] as $p) : ?>
                               <a data-kategori="produk" href="" class="col-<?= 12 / count($i['arr_produk_image']); ?> fyp" data-id="<?= $i['id']; ?>" data-url="<?= base_url(); ?>fb/produk/<?= $p; ?>">
                                   <img style="max-width: 100%;" src="<?= base_url(); ?>fb/produk/<?= $p; ?>" alt="Produk">
                               </a>
                           <?php endforeach; ?>
                       </div>
                   <?php endif; ?>
                   <!-- akhir gambar status -->

                   <!-- harga status -->
                   <div class="card-body d-flex justify-content-between" style="background-color:#f5f5f5">
                       <div>
                           <div><?= strtoupper('rp' . angka($i['harga'])); ?> <?= strtoupper($i['kota']); ?></div>
                           <h6><?= upper_first($i['nama_produk']); ?></h6>
                       </div>
                       <div class="pt-2">
                           <a class="btn_light" style="text-decoration: none;font-size:medium;color:#393a3b;font-weight:600" href=""><i class="fa-brands fa-facebook-messenger"></i> Kirim Pesan</a>
                       </div>
                   </div>

                   <!-- akhir harga status -->


                   <div class="px-3 py-2">
                       <!-- like n komentar -->
                       <div class="d-flex justify-content-between">
                           <div class="d-flex gap-1">
                               <div style="background-color: #0c77c4;border-radius:50%;width:19px;height:19px">
                                   <i class="fa-solid fa-thumbs-up text-white" style="font-size: 12px;"></i>
                               </div>
                               <div style="color: #7a7a7a;font-size:14px;font-weight:400"><?= $i['jml_like']; ?></div>
                           </div>
                           <div style="color: #7a7a7a;font-size:14px;font-weight:400"><?= $i['jml_komentar']; ?> komentar</div>
                       </div>

                       <!-- akhir like n komentar -->
                       <hr class="my-2">
                       <!-- like comment n share -->
                       <div class="d-flex justify-content-around body_komentar">
                           <a href=""><i class="fa-regular fa-thumbs-up"></i> Suka</a>
                           <a href=""><i class="fa-regular fa-message"></i> Komentari</a>
                           <a href=""><i class="fa-solid fa-share"></i> Bagikan</a>
                       </div>
                       <!-- akhir like comment n share -->
                       <hr class="my-2">


                       <!-- tulis komentar -->
                       <div class="d-flex gap-2">

                           <img src="<?= get_profile(); ?>" style="border-radius: 50%;" width="42px" alt="User">
                           <input class="py-2 px-3" type="text" style="font-size:16px;font-weight:400;width: 100%;border:1px solid #f0f1f2;background-color:#f0f1f2;border-radius:40px;color:black" placeholder="Tulis komentar publik...">
                       </div>

                       <!-- akhir tulis komentar -->

                   </div>
               </div>

           <?php elseif ($i['jenis'] == 'user') : ?>

               <div class="card mb-2">
                   <div class="card-body">

                       <!-- identitas penulis status -->
                       <div class="d-flex justify-content-between">
                           <div class="d-flex gap-2">
                               <div>
                                   <img style="border-radius: 50%;" src="<?= base_url(); ?>fb/user/<?= $i['user_image']; ?>" width="40px" alt="User">

                               </div>
                               <div>
                                   <div>
                                       <a href="<?= base_url('facebook/visit/user/'); ?><?= $i['id']; ?>" style="font-size: medium;color:#393a3b" class="nama_status_sm"><?= $i['nama']; ?> </a>
                                       <div><?= $i['waktu']; ?> <i class="fa-solid fa-earth-americas"></i></div>

                                   </div>

                               </div>
                           </div>



                           <div class="d-flex gap-2 status_top_right">
                               <a href=""><i class="fa-solid fa-ellipsis"></i></a>
                               <a href=""><i class="fa-solid fa-x"></i></a>
                           </div>
                       </div>

                       <!-- akhir identitas penulis status -->

                       <!-- isi status -->
                       <?php if ($i['produk_image'] == '0') : ?>
                           <div style="font-size: medium;" class="mt-2">

                               <?= $i['deskripsi']; ?>
                           </div>

                       <?php else : ?>
                           <div class="d-flex flex-column p-4 mt-3" style="font-size:xx-large;height:400px;background-color:<?= $i['produk_image']; ?>;text-align:center;font-weight:600;color:white">
                               <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                                   <?= $i['deskripsi']; ?>
                               </div>
                           </div>

                       <?php endif; ?>

                       <!-- akhir isi status -->
                   </div>


                   <!-- akhir gambar status -->



                   <div class=" px-3 py-2">
                       <!-- like n komentar -->
                       <div class="d-flex justify-content-between">
                           <div class="d-flex gap-1">
                               <div style="background-color: #0c77c4;border-radius:50%;width:19px;height:19px">
                                   <i class="fa-solid fa-thumbs-up text-white" style="font-size: 12px;"></i>
                               </div>
                               <div style="color: #7a7a7a;font-size:14px;font-weight:400"><?= $i['jml_like']; ?></div>
                           </div>
                           <div style="color: #7a7a7a;font-size:14px;font-weight:400"><?= $i['jml_komentar']; ?> komentar</div>
                       </div>

                       <!-- akhir like n komentar -->
                       <hr class="my-2">
                       <!-- like comment n share -->
                       <div class="d-flex justify-content-around body_komentar">
                           <a href=""><i class="fa-regular fa-thumbs-up"></i> Suka</a>
                           <a href=""><i class="fa-regular fa-message"></i> Komentari</a>
                           <a href=""><i class="fa-solid fa-share"></i> Bagikan</a>
                       </div>
                       <!-- akhir like comment n share -->
                       <hr class="my-2">


                       <!-- tulis komentar -->
                       <div class="d-flex gap-2">
                           <img src="<?= base_url(); ?>fb/user/<?= user()['img']; ?>" style="border-radius: 50%;" width="42px" alt="User">
                           <input class="py-2 px-3" type="text" style="font-size:16px;font-weight:400;width: 100%;border:1px solid #f0f1f2;background-color:#f0f1f2;border-radius:40px;color:black" placeholder="Tulis komentar publik...">
                       </div>

                       <!-- akhir tulis komentar -->

                   </div>
               </div>

           <?php endif; ?>

       <?php endforeach; ?>