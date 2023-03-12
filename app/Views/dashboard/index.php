<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <!--  -->
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon purple mb-2">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                                Total Data Mitra
                            </h6>
                            <h4 class="font-extrabold mb-0"><?= count($user) ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon blue mb-2">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                                Total Data Usaha
                            </h6>
                            <h4 class="font-extrabold mb-0"><?= count($usaha) ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2">
                                <i class="fa-solid fa-box"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                                Total Data Produk
                            </h6>
                            <h4 class="font-extrabold mb-0"><?= count($produk) ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Peta Sebaran <span style="font-family: 'Croissant One', cursive;">Asmami</span></h4>
        </div>
        <div class="card-body">
            <div id="map" class="rounded-3" style="height: 450px;"></div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    var map = L.map('map').setView([0.1397306, 117.4681409], 12);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    const iLength = <?= $usahaa ?>;
    <?php foreach ($usaha as $value) : ?>
        L.marker([<?= $value->lang_lat ?>])
            .bindPopup("<h6><?= ucwords($value->nama_usaha) ?></h6><?= ucwords($value->alamat) ?><br /><br /><a href='<?= base_url('usaha/preview/' . $value->id) ?>' class='btn btn-sm btn-primary text-white px-4'>Detail</a>").
        addTo(map);
    <?php endforeach; ?>
</script>
<?= $this->endSection() ?>
