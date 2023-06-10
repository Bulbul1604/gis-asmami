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
                    <div class="auth-logo mb-3 text-primary fw-bold display-6">
                        Asmami<span class="text-dark">Bontang</span>
                    </div>
                    <h3>Registrasi.</h3>

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h6>Maaf! Pendaftaran gagal.</h6>
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('register/process') ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="email" name="email" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Email" />
                            <div class="form-control-icon">
                                <i class="bi bi-envelope-at"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" name="password" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" name="pemilik_usaha" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Pemilik Usaha" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="number" name="no_wa" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Nomor WhatsApp" />
                            <div class="form-control-icon">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" name="nama_usaha" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Nama Usaha" />
                            <div class="form-control-icon">
                                <i class="bi bi-briefcase"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <!-- <input type="text" name="kategori_usaha" class="form-control form-control-lg rounded-3 border-0 shadow-sm" required placeholder="Kategori Usaha" /> -->
                            <select name="kategori_usaha" class="form-control form-control-lg rounded-3 border-0 shadow-sm">
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                                <option value="makanan/minuman">Makanan/ Minuman</option>
                            </select>
                            <div class="form-control-icon">
                                <i class="bi bi-tags"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block shadow-sm mt-2">
                            Register
                        </button>
                    </form>
                    <div class="text-center mt-2">
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
