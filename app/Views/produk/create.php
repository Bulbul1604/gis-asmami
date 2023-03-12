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
            <form class="form form-vertical" method="POST" action="<?= base_url('produk/create'); ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="usaha_id">Nama Usaha</label>
                                <select class="form-select" id="usaha_id" name="usaha_id">
                                    <option value="">Pilih salah satu</option>
                                    <?php foreach ($usaha as $us) : ?>
                                        <option value="<?= $us->id ?>"><?= ucwords($us->id) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nama_produk">Nama Produk</label>
                                <input type="text" id="nama_produk" class="form-control" name="nama_produk" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="stock">Stok</label>
                                <select class="form-select" id="stock" name="stock">
                                    <option value="">Pilih salah satu</option>
                                    <option value="1">Tersedia</option>
                                    <option value="0">Kosong</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="harga">Harga</label>
                                <input type="number" id="harga" class="form-control" name="harga" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="kategori">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori">
                                    <option value="">Pilih salah satu</option>
                                    <option value="makanan">Makanan</option>
                                    <option value="minuman">Minuman</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="foto">Foto Produk</label>
                                <input type="file" id="foto" class="form-control" name="foto" />
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
