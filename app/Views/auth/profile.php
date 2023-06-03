<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Data ASMAMI<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="p-3 pb-0 d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-3 align-items-center">
                            <img src="<?= base_url() ?>/assets/images/asmamii.png" alt="" width="100">
                            <div>
                                <h2 style="letter-spacing: 0.2rem;">ASOSIASI</h2>
                                <h6 class="fw-base">Makanan dan Minuman</h6>
                                <h6 class="fw-base" style="letter-spacing: 1rem;">BONTANG</h6>
                            </div>
                        </div>
                        <div style="position: relative;">
                            <h2 style="font-style: italic;" class="fw-bold">UMKM</h2>
                            <h4 style="font-style: italic; position: absolute; bottom: 0; right: 0; transform: rotate(-10deg);" class="text-danger">Hebat!</h4>
                        </div>
                    </div>
                    <hr />
                    <div class="card-body pt-0 mt-0 text-center">
                        <?php if ($user != NULL) : ?>
                            <h4 class="card-title"><?= ucwords($user->name) ?></h4>
                            <hr class="p-0 m-0 col-8 mx-auto" />
                            <p class="card-text pt-1"><?= ucwords($user->nama_usaha) ?></p>
                            <p class="card-text mb-5"><?= ucwords($user->alamat) ?></p>
                            <small class="text-muted">Jl. RE Martadinata RT.013</small>
                            <small class="text-muted">Kel. Loktuan Bontang Utara</small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
