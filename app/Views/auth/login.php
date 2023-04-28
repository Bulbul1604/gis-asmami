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
                    <div class="auth-logo mb-3 pb-3 text-primary fw-bold display-6">
                        Asmami<span class="text-dark">Bontang</span>
                    </div>
                    <h3 class="mb-3">Log in.</h3>

                    <?php if (!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success py-2 pt-3 alert-dismissible fade show" role="alert">
                            <h6 class="fw-normal text-light">Sukses! Pendaftaran berhasil. Silahkan login.</h6>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p class="fw-semibold">Email atau password anda salah!</p>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('login/process') ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-lg rounded-3 border-0 shadow-sm" placeholder="Email" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-lg rounded-3 border-0 shadow-sm" placeholder="Password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block shadow-sm mt-2">
                            Log in
                        </button>
                    </form>
                    <div class="text-center mt-3">
                        <p class="text-gray-600">
                            Belum punya akun?
                            <a href="<?= base_url('register') ?>" class="font-bold">Daftar</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 d-none d-md-block" id="auth-right"></div>
        </div>
    </div>
</body>

</html>
