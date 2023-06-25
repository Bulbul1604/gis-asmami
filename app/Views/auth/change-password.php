<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Data ASMAMI<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <?php if (!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <?= session()->getFlashdata('message'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php if (!empty(session()->getFlashdata('errors'))) : ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                        <?= session()->getFlashdata('errors'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('change-password/' . $user->id); ?>">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" value="<?= $user->email ?>" readonly style="background-color: #eaeaea;" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password_conf" class="form-label">Confirm Password</label>
                            <input type="password" name="password_conf" class="form-control" id="password_conf">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
