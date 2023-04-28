<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Edit Data Produk<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="card">
        <div class="card-body">
            <form class="form form-vertical" method="POST" action="<?= base_url('produk/update/' . $produk->id) ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="id" value="<?= $produk->id ?>">
                        <input type="hidden" class="form-control" name="usaha_id" value="<?= $produk->usaha_id ?>">
                        <input type="hidden" class="form-control" name="fotoLama" value="<?= $produk->foto ?>">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nama_usaha">Nama Usaha</label>
                                <input type="text" id="nama_usaha" class="form-control" readonly name="nama_usaha" value="<?= ucwords($produk->nama_produk) ?>" style="background-color: #eaeaea;" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nama_produk">Nama Produk</label>
                                <input type="text" id="nama_produk" class="form-control <?= (validation_show_error('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" autofocus value="<?= old('nama_produk') ? old('nama_produk') : $produk->nama_produk; ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('nama_produk'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <textarea class="form-control <?= (validation_show_error('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" rows="3"><?= old('deskripsi') ? old('deskripsi') : $produk->deskripsi; ?></textarea>
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
                                    <option value="1" <?php if ($produk->stock == 1) {
                                                            echo "selected";
                                                        } ?>>Tersedia</option>
                                    <option value="0" <?php if ($produk->stock == 0) {
                                                            echo "selected";
                                                        } ?>>Kosong</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('stock'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="harga">Harga</label>
                                <input type="number" id="harga" class="form-control <?= (validation_show_error('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" autofocus value="<?= old('harga') ? old('harga') : $produk->harga; ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('harga'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="kategori">Kategori</label>
                                <select class="form-select <?= (validation_show_error('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori">
                                    <option value="">Pilih salah satu</option>
                                    <option value="makanan" <?php if ($produk->kategori == "makanan") {
                                                                echo "selected";
                                                            } ?>>Makanan</option>
                                    <option value="minuman" <?php if ($produk->kategori == "minuman") {
                                                                echo "selected";
                                                            } ?>>Minuman</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('kategori'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Foto Produk - <span class="text-sm fw-bold text-primary"><a href="<?= base_url('uploads/produk/' . $produk->foto); ?>" target="_blank" rel="noopener noreferrer">Cek Foto</a></span></label>
                                <input type="file" id="foto" class="form-control <?= (validation_show_error('foto')) ? 'is-invalid' : ''; ?>" name="foto">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('kategori'); ?>
                                </div>
                                <span class="text-sm fw-semibold text-muted">* Jika tidak upload foto maka akan menggunakan foto sebelumnya.</span>
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
