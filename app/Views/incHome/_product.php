 <div class="container-xxl bg-light py-5 my-5" id="produk">
     <div class="container py-5">
         <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
             <h1 class="display-6">Produk</h1>
             <p class="text-primary fs-5 mb-5">Temukan Produk UMKM favoritmu sekarang juga!</p>
         </div>
         <div class="row g-4 justify-content-center">
             <?php foreach ($produk as $pro) : ?>
                 <div class="col-lg-4 col-md-6 wow fadeInUp rounded-3" data-wow-delay="0.1s">
                     <div class="service-item bg-white p-3 rounded-3">
                         <?php if ($pro->foto) : ?>
                             <a href="<?= base_url('uploads/produk/' . $pro->foto); ?>" target="_blank" rel="noopener noreferrer">
                                 <img src="<?= base_url('uploads/produk/' . $pro->foto); ?>" alt="<?= $pro->foto ?>" height="200" style="width: 100%; object-fit: cover;" class="object-fit-cover" />
                             </a>
                         <?php else : ?>
                             <a href="<?= base_url('uploads/produk/default.jpg'); ?>" target="_blank" rel="noopener noreferrer">
                                 <img src="<?= base_url('uploads/produk/default.jpg'); ?>" alt="<?= $pro->foto ?>" height="200" style="width: 100%; object-fit: cover;" class="object-fit-cover" />
                             </a>
                         <?php endif; ?>
                         <h4 class="mb-3"><?= ucwords($pro->nama_produk) ?></h4>
                         <p><?= ucwords($pro->deskripsi) ?></p>
                         <div class="d-flex flex-wrap align-items-center justify-content-between">
                             <?php if ($pro->stock == 1) : ?>
                                 <span class="badge bg-success text-sm mb-2">Tersedia</span>
                             <?php elseif ($pro->stock == 0) : ?>
                                 <span class="badge bg-danger text-sm mb-2">Kosong</span>
                             <?php endif; ?>
                             <span class="fw-semibold text-dark text-sm">Rp <?= number_format($pro->harga, 0, ",", "."); ?></span>
                         </div>
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
         <div class="text-end mt-5">
             <a href="<?= site_url('list-produk'); ?>" class="btn btn-sm btn-primary">Lihat semua produk <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);"><path d="M10.296 7.71 14.621 12l-4.325 4.29 1.408 1.42L17.461 12l-5.757-5.71z"></path><path d="M6.704 6.29 5.296 7.71 9.621 12l-4.325 4.29 1.408 1.42L12.461 12z"></path></svg></a>
         </div>
     </div>
 </div>
