<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Tambah Data Usaha<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="card">
        <div class="card-body">
            <form class="form form-vertical" method="POST" action="<?= base_url('usaha/save'); ?>">
                <?= csrf_field(); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="user_id">Pemilik Usaha</label>
                                <select class="form-select <?= (validation_show_error('user_id')) ? 'is-invalid' : ''; ?>" id="user_id" name="user_id">
                                    <option value="">Pilih salah satu</option>
                                    <?php foreach ($user as $us) : ?>
                                        <option value="<?= $us->id ?>"><?= ucwords($us->id) ?> - <?= ucwords($us->name) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('user_id'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="pemilik_usaha">Nama Lengkap</label>
                                <input type="text" class="form-control <?= (validation_show_error('pemilik_usaha')) ? 'is-invalid' : ''; ?>" id="pemilik_usaha" name="pemilik_usaha" autofocus value="<?= old('pemilik_usaha'); ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('pemilik_usaha'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="no_wa">Nomor WhatsApp</label>
                                <input type="number" class="form-control <?= (validation_show_error('no_wa')) ? 'is-invalid' : ''; ?>" id="no_wa" name="no_wa" autofocus value="<?= old('no_wa'); ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('no_wa'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nama_usaha">Nama Usaha</label>
                                <input type="text" class="form-control <?= (validation_show_error('nama_usaha')) ? 'is-invalid' : ''; ?>" id="nama_usaha" name="nama_usaha" autofocus value="<?= old('nama_usaha'); ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('nama_usaha'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea class="form-control <?= (validation_show_error('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" rows="3"></textarea>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="kelurahan">Kelurahan</label>
                                <select class="form-select <?= (validation_show_error('kelurahan')) ? 'is-invalid' : ''; ?>" id="kelurahan" name="kelurahan">
                                    <option value="">Pilih salah satu</option>
                                    <?php foreach ($kelurahan as $kel) : ?>
                                        <option value="<?= $kel ?>"><?= ucwords($kel) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('kelurahan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="kecamatan">Kecamatan</label>
                                <select class="form-select <?= (validation_show_error('kecamatan')) ? 'is-invalid' : ''; ?>" id="kecamatan" name="kecamatan">
                                    <option value="">Pilih salah satu</option>
                                    <?php foreach ($kecamatan as $kec) : ?>
                                        <option value="<?= $kec ?>"><?= ucwords($kec) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('kecamatan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="lang_lat">Koordinat Lokasi</label>
                                <input type="text" id="lang_lat" class="form-control mb-2 <?= (validation_show_error('lang_lat')) ? 'is-invalid' : ''; ?>" name="lang_lat" readonly style="background-color: #eaeaea;" />
                                <div class="invalid-feedback">
                                    <?= validation_show_error('lang_lat'); ?>
                                </div>
                                <span class="text-mutted text-sm">* Silahkan klik lokasi pada map sesuai dengan lokasi UMKM.</span>
                            </div>
                            <div id="map" class="border rounded mb-3" style="height: 400px"></div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    let map = L.map('map', {
        attributionControl: false,
        // zoomControl: false,
    }).setView([0.1372358, 117.4548496], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    let popup = L.popup();
    var marker = L.marker([0.1372358, 117.4548496]).addTo(map);
    var loc = document.querySelector("[name=lang_lat]");
    map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        loc.value = lat + "," + lng;
    });
</script>
<?= $this->endSection() ?>
