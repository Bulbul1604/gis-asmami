<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Data Produk<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="<?= base_url('produk/create') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Usaha</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produk as $pro) : ?>
                            <tr>
                                <td><?= ucwords($pro->nama_usaha) ?></td>
                                <td>
                                    <?php if ($pro->foto) : ?>
                                        <a href="<?= base_url('uploads/produk/' . $pro->foto); ?>" target="_blank" rel="noopener noreferrer">
                                            <img src="<?= base_url('uploads/produk/' . $pro->foto); ?>" alt="<?= $pro->foto ?>" width="50" height="40" class="object-fit-cover" />
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= base_url('uploads/produk/default.jpg'); ?>" target="_blank" rel="noopener noreferrer">
                                            <img src="<?= base_url('uploads/produk/default.jpg'); ?>" alt="<?= $pro->foto ?>" width="50" height="40" class="object-fit-cover" />
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td><?= ucwords($pro->nama_produk) ?></td>
                                <td><?= ucwords($pro->kategori) ?></td>
                                <td><?= ucwords($pro->deskripsi) ?></td>
                                <td>
                                    <?php if ($pro->stock > 0) : ?>
                                        <span class="badge bg-success">Tersedia
                                        <?php else : ?>
                                            <span class="badge bg-danger">Kosong
                                            <?php endif; ?>
                                            </span>
                                </td>
                                <td>Rp <?= number_format($pro->harga, 0, ",", ".") ?></td>
                                <td>
                                    <a href="<?= base_url('produk/edit/' . $pro->id) ?>" class="btn btn-sm rounded-3 btn-outline-warning">Edit</a>
                                    <a href="<?= base_url('produk/delete/' . $pro->id) ?>" class="btn btn-sm rounded-3 btn-outline-danger" onclick="return confirm('Hapus data ?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
</script>
<?= $this->endSection() ?>
