<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Tambah Data Produk<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?php if (isset($validation)) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <?= $validation->listErrors() ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <form class="form form-vertical" method="POST" action="<?= base_url('produk/save'); ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="usaha_id">Nama Usaha</label>

                                <?php if (session()->get('akses') == "mitra") : ?>
                                    <input type="text" id="usaha_id" class="form-control <?= (validation_show_error('usaha_id')) ? 'is-invalid' : ''; ?>" id="usaha_id" name="usaha_id" autofocus value="<?= session()->get('nama_usaha'); ?>" readonly style="background-color: #eaeaea;">
                                    <input type="hidden" name="usaha_id" value="<?= session()->get('usaha_id'); ?>">
                                <?php else : ?>
                                    <select class="form-select <?= (validation_show_error('usaha_id')) ? 'is-invalid' : ''; ?>" id="usaha_id" name="usaha_id">
                                        <option value="">Pilih salah satu</option>
                                        <?php foreach ($usaha as $us) : ?>
                                            <option value="<?= $us->id ?>"><?= ucwords($us->nama_usaha) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('usaha_id'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nama_produk">Nama Produk</label>
                                <input type="text" id="nama_produk" class="form-control <?= (validation_show_error('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" autofocus value="<?= old('nama_produk'); ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('nama_produk'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <textarea class="form-control <?= (validation_show_error('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('deskripsi'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="stock">Stok</label>
                                <select class="form-select <?= (validation_show_error('stock')) ? 'is-invalid' : ''; ?>" id="stock" name="stock">
                                    <option value="">Pilih salah satu</option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Kosong</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('stock'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="harga">Harga</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" id="harga" class="form-control <?= (validation_show_error('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" autofocus value="<?= old('harga'); ?>">
                                    <span class="input-group-text">.000</span>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('harga'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="kategori">Kategori</label>
                                <select class="form-select <?= (validation_show_error('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori">
                                    <option value="">Pilih salah satu</option>
                                    <option value="makanan">Makanan</option>
                                    <option value="minuman">Minuman</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('stock'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="foto">Foto Produk</label>
                                <input type="file" id="foto" class="form-control <?= (validation_show_error('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" autofocus value="<?= old('foto'); ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('foto'); ?>
                                </div>
                            </div>
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
