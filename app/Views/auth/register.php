<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layouts/_head') ?>
</head>

<body>
    <div id="auth">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-5 col-md-6 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <span>Asmami</span>
                    </div>
                    <h1 class="auth-title">Registrasi.</h1>

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h6>Maaf! Pendaftaran gagal.</h6>
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('register/process') ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Email" />
                            <div class="form-control-icon">
                                <i class="bi bi-envelope-at"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="pemilik_usaha" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Pemilik Usaha" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="number" name="no_wa" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Nomor WhatsApp" />
                            <div class="form-control-icon">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="nama_usaha" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Nama Usaha" />
                            <div class="form-control-icon">
                                <i class="bi bi-briefcase"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block shadow-sm mt-2">
                            Register
                        </button>
                    </form>
                    <div class="text-center mt-3">
                        <p class="text-gray-600">
                            Sudah punya akun?
                            <a href="<?= base_url('login') ?>" class="font-bold">Masuk</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 d-none d-md-block" id="auth-right"></div>
        </div>
    </div>
</body>

</html>
