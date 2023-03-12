<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Data Users<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="<?= base_url('users/create') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= ucwords($user->name) ?></td>
                                <td><?= ucwords($user->email) ?></td>
                                <td><?= ucwords($user->akses) ?></td>
                                <td class="d-flex gap-2">
                                    <a href="<?= base_url('users/edit/' . $user->id) ?>" class="btn btn-sm rounded-3 btn-outline-warning">Edit</a>
                                    <a href="<?= base_url('users/delete/' . $user->id) ?>" class="btn btn-sm rounded-3 btn-outline-danger" onclick="return confirm('Hapus data ?');">Hapus</a>
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
