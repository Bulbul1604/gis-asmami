<!DOCTYPE html>
<html lang="en">

<head>
   <?php include 'incHome/_head.php'; ?>
   <link rel="stylesheet" href="<?= base_url() ?>/assets/css/pages/auth.css" />
   <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main/app.css" />
   <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main/app-dark.css" />
   <link rel="stylesheet" href="<?= base_url() ?>/assets/css/pages/datatables.css" />
</head>

<body>
   <!-- Spinner Start -->
   <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-grow text-primary" role="status"></div>
   </div>
   <!-- Spinner End -->


   <!-- Navbar Start -->
   <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
      <a href="<?= base_url() ?>" class="navbar-brand d-flex align-items-center">
         <h3 class="m-0 text-primary">Asmami<span class="text-dark">Bontang</span></h3>
      </a>
      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
         <div class="navbar-nav ms-auto py-4 py-lg-0 d-flex align-items-center">
            <?php if (!session('logged_in')) : ?>
               <a href="<?= base_url('/login') ?>" class="nav-item nav-link"><span class="bg-outline-primary border-primary text-primary px-3 py-2 rounded-3">Masuk</span></a>
               <a href="<?= base_url('/register') ?>" class="nav-item nav-link"><span class="bg-primary text-white px-3 py-2 rounded-3">Daftar menjadi Mitra</span></a>
            <?php else : ?>
               <a href="<?= base_url() ?>/home" class="fw-bold"><?= ucwords(session('name')); ?></a>
            <?php endif; ?>
         </div>
      </div>
   </nav>

   <!-- Navbar End -->

   <div class="container">
      <section class="section mt-5">
         <div class="card">
            <div class="card-content">
               <div id="map" class="border rounded mb-3" style="height: 420px; z-index: 0;"></div>
               <div class="card-body">
                  <h4 class="card-title"><?= ucwords($usaha->nama_usaha) ?></h4>
                  <h6 class="card-title font-semibold"><?= ucwords($usaha->pemilik_usaha) ?> - <?= $usaha->no_wa ?></h6>
                  <span class="card-text"><?= ucwords($usaha->alamat) ?>, Kelurahan <?= ucwords($usaha->kelurahan) ?>, Kecamatan <?= ucwords($usaha->kecamatan) ?>, Kota Bontang.</span>
                  <hr class="mb-0 pb-0" />
               </div>
               <div class="card-body">
                  <h5 class="card-title mb-3">Produk dari <?= ucwords($usaha->nama_usaha) ?></h5>
                  <div class="row">
                     <?php foreach ($produk as $pro) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                           <div class="card bg-light shadow-sm">
                              <div class="card-content">
                                 <img src="<?= base_url('uploads/produk/' . $pro->foto); ?>" class="card-img-top img-fluid" alt="singleminded" style="height: 15rem; object-fit: cover;" />
                                 <div class="card-body d-flex flex-column justify-content-between" style="min-height: 15em;">
                                    <div>
                                       <h5 class="card-title"><?= ucwords($pro->nama_produk); ?></h5>
                                       <p class="mb-1 pb-1 text-sm card-text text-muted"><?= ucwords($pro->kategori); ?></p>
                                    </div>
                                    <p class="card-text text-secaondary text-sm fw-semibold"><?= ucwords($pro->deskripsi); ?></p>
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                       <?php if ($pro->stock == 1) : ?>
                                          <span class="badge bg-success text-sm mb-2">Tersedia</span>
                                       <?php elseif ($pro->stock == 0) : ?>
                                          <span class="badge bg-danger text-sm mb-2">Kosong</span>
                                       <?php endif; ?>
                                       <span class="fw-bold text-sm">Rp <?= number_format($pro->harga, 0, ",", "."); ?></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php endforeach; ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>

   <?php include 'incHome/_footer.php'; ?>

   <!-- Back to Top -->
   <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


   <!-- JavaScript Libraries -->
   <?php include 'incHome/_script.php'; ?>

   <script>
      let map = L.map('map', {
         attributionControl: false,
      }).setView([<?= $usaha->lang_lat ?>], 15);
      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showPosition);
      } else {
         alert('Geolocation is not supported by this browser.');
      }

      function showPosition(position) {
         L.Routing.control({
            waypoints: [
               L.latLng(position.coords.latitude, position.coords.longitude),
               L.latLng(<?= $usaha->lang_lat ?>)
            ]
         }).addTo(map);
      }
      // let icon = L.icon({
      //    iconUrl: '<?= base_url('/icon.png') ?>',
      // });
      // let marker = L.marker([
      //    <?= $usaha->lang_lat ?>
      // ], {
      //    icon: icon
      // }).addTo(map);
      // marker.bindPopup("<h6><?= ucwords($usaha->nama_usaha) ?></h6").openPopup();
      // marker.bindPopup("<a href='' style='letter-spacing: 0.4px; font-weight: 600;'>Tampilkan Rute ></a>").openPopup();
   </script>
</body>

</html>
