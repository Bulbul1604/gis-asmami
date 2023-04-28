<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Detail Data Usaha<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
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
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    let map = L.map('map', {
        attributionControl: false,
    }).setView([<?= $usaha->lang_lat ?>], 15);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    let icon = L.icon({
        iconUrl: '<?= base_url('/icon.png') ?>',
    });
    let marker = L.marker([
        <?= $usaha->lang_lat ?>
    ], {
        icon: icon
    }).addTo(map);
    marker.bindPopup("<h6><?= ucwords($usaha->nama_usaha) ?></h6").openPopup();
</script>
<?= $this->endSection() ?>
