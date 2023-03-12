<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Edit Data Produk<?= $this->endSection() ?>
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
            <form class="form form-vertical" method="POST" action="<?= base_url('produk/update/' . $produk->id) ?>" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="id" value="<?= $produk->id ?>">
                        <input type="hidden" class="form-control" name="usaha_id" value="<?= $produk->usaha_id ?>">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nama_usaha">Nama Usaha</label>
                                <input type="text" id="nama_usaha" class="form-control" readonly name="nama_usaha" value="<?= $produk->usaha_id ?>" style="background-color: #eaeaea;" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nama_produk">Nama Produk</label>
                                <input type="text" id="nama_produk" class="form-control" name="nama_produk" value="<?= $produk->nama_produk ?>" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $produk->deskripsi ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="stock">Stok</label>
                                <select class="form-select" id="stock" name="stock">
                                    <option value="">Pilih salah satu</option>
                                    <option value="1" <?php if ($produk->stock == 1) {
                                                            echo "selected";
                                                        } ?>>Tersedia</option>
                                    <option value="0" <?php if ($produk->stock == 0) {
                                                            echo "selected";
                                                        } ?>>Kosong</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="harga">Harga</label>
                                <input type="number" id="harga" class="form-control" name="harga" value="<?= $produk->harga ?>" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="kategori">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori">
                                    <option value="">Pilih salah satu</option>
                                    <option value="makanan" <?php if ($produk->kategori == "makanan") {
                                                                echo "selected";
                                                            } ?>>Makanan</option>
                                    <option value="minuman" <?php if ($produk->kategori == "minuman") {
                                                                echo "selected";
                                                            } ?>>Minuman</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <?php if ($produk->foto) : ?>
                                    <label class="form-label">Foto Produk - <span class="text-sm fw-bold text-primary"><a href="<?= base_url('uploads/produk/' . $produk->foto); ?>" target="_blank" rel="noopener noreferrer">Cek Foto</a></span></label>
                                <?php else : ?>
                                    <label class="form-label">Foto Produk - <span class="text-sm fw-bold text-primary"> <a href="<?= base_url('assets/images/no_image_product.jpg') ?>" target="_blank" rel="noopener noreferrer">Cek Foto</a></span></label>
                                <?php endif; ?>
                                <input type="file" id="foto" class="form-control" name="foto" />
                                <span class="text-sm fw-semibold text-danger">* Jika tidak upload foto maka akan menggunakan foto sebelumnya.</span>
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
