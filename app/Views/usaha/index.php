<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Data Usaha<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="card">
        <?php if (session()->get('akses') != "mitra") : ?>
            <div class="card-header d-flex justify-content-end">
                <a href="<?= base_url('usaha/create') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Pemilik Usaha</th>
                            <th>No. WhatsApp</th>
                            <th>Nama Usaha</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usaha as $us) : ?>
                            <tr>
                                <td><?= ucwords($us->pemilik_usaha) ?></td>
                                <td><?= ucwords($us->no_wa) ?></td>
                                <td><?= ucwords($us->nama_usaha) ?></td>
                                <td class="d-flex gap-2">
                                    <a href="<?= base_url('usaha/edit/' . $us->id) ?>" class="btn btn-sm rounded-3 btn-outline-warning">Edit</a>
                                    <a href="<?= base_url('usaha/delete/' . $us->id) ?>" class="btn btn-sm rounded-3 btn-outline-danger" onclick="return confirm('Hapus data ?');">Hapus</a>
                                    <?php if ($us->lang_lat != NULL or $us->lang_lat != "") : ?>
                                        <a href="<?= base_url('usaha/show/' . $us->id) ?>" class="btn btn-sm rounded-3 btn-outline-info">Detail</a>
                                    <?php endif; ?>
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
