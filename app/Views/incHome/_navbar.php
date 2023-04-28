<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
    <a href="<?= base_url() ?>" class="navbar-brand d-flex align-items-center">
        <h3 class="m-0 text-primary">Asmami<span class="text-dark">Bontang</span></h3>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-4 py-lg-0 d-flex align-items-center">
            <a href="#beranda" class="nav-item nav-link">Beranda</a>
            <a href="#produk" class="nav-item nav-link">Produk</a>
            <a href="#peta" class="nav-item nav-link">Peta</a>
            <a href="" class="nav-item nav-link">Event</a>
            <?php if (!session('logged_in')) : ?>
                <a href="<?= base_url('/login') ?>" class="nav-item nav-link"><span class="bg-outline-primary border-primary text-primary px-3 py-2 rounded-3">Masuk</span></a>
                <a href="<?= base_url('/register') ?>" class="nav-item nav-link"><span class="bg-primary text-white px-3 py-2 rounded-3">Daftar menjadi Mitra</span></a>
            <?php else : ?>
                <a href="<?= base_url() ?>/home" class="fw-bold"><?= ucwords(session('name')); ?></a>
            <?php endif; ?>
        </div>
    </div>
</nav>
