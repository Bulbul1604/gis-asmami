<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Detail Data Usaha<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="card">
        <div class="card-content">
            <div id="map" class="border rounded mb-3" style="height: 420px"></div>
            <div class="card-body">
                <h4 class="card-title"><?= ucwords($usaha->nama_usaha) ?></h4>
                <h6 class="card-title font-semibold"><?= ucwords($usaha->pemilik_usaha) ?> - <?= $usaha->no_wa ?></h6>
                <span class="card-text"><?= ucwords($usaha->alamat) ?>, Kelurahan <?= ucwords($usaha->kelurahan) ?>, Kecamatan <?= ucwords($usaha->kecamatan) ?>, Kota Bontang.</span>
                <hr class="mb-0 pb-0" />
            </div>
            <div class="card-body">
                <h5 class="card-title mb-3">Produk dari <?= ucwords($usaha->nama_usaha) ?></h5>
                <div class="row">
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="card bg-light shadow-sm">
                                <div class="card-content">
                                    <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80" class="card-img-top img-fluid" alt="singleminded" style="height: 15rem; object-fit: cover;" />
                                    <div class="card-body">
                                        <h5 class="card-title">Nama Produk</h5>
                                        <p class="mb-1 pb-1 text-sm card-text text-muted">Makanan</p>
                                        <p class="card-text text-secaondary text-sm fw-semibold">Deskripsi Produk</p>
                                        <div class="d-flex justify-content-between">
                                            <span class="badge bg-success text-sm mb-2">Tersedia</span>
                                            <span class="fw-bold text-sm">Rp 1.000.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    let map = L.map('map', {
        attributionControl: false,
    }).setView([<?= $usaha->lang_lat ?>], 15);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    let marker = L.marker([
        <?= $usaha->lang_lat ?>
    ]).addTo(map);
    marker.bindPopup("<h6><?= ucwords($usaha->nama_usaha) ?></h6><br><?= ucwords($usaha->alamat) ?>").openPopup();
</script>
<?= $this->endSection() ?>
