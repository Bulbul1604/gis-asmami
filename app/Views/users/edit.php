6<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Ubah Data Users<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">

    <div class="card">
        <div class="card-body">
            <form class="form form-vertical" method="POST" action="<?= base_url('users/update/' . $user->id) ?>">
                <?= csrf_field(); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Nama Lengkap</label>
                                <input type="text" class="form-control <?= (validation_show_error('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" autofocus value="<?= old('name') ? old('name') : $user->name; ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('name'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= old('email') ? old('email') : $user->email; ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('email'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="akses">Akses</label>
                                <select class="form-select" id="akses" name="akses">
                                    <option value="mitra" <?php if ($user->akses == 'mitra') {
                                                                echo "selected";
                                                            } ?>>Mitra</option>
                                    <option value="pimpinan" <?php if ($user->akses == 'pimpinan') {
                                                                    echo "selected";
                                                                } ?>>Pimpinan</option>
                                </select>
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
