<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="<?= base_url('home') ?>">
                        <span>Asmami</span>
                    </a>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item">
                    <a href="<?= base_url('home') ?>" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <?php if (session()->get('akses') == "admin") : ?>
                    <li class="sidebar-item">
                        <a href="<?= base_url('users') ?>" class="sidebar-link">
                            <i class="bi bi-people-fill"></i>
                            <span>Data User</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('event') ?>" class="sidebar-link">
                            <i class="bi bi-calendar-event-fill"></i>
                            <span>Data Event</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (session()->get('akses') == "admin" or session()->get('akses') == "mitra") : ?>
                    <li class="sidebar-item">
                        <a href="<?= base_url('usaha') ?>" class="sidebar-link">
                            <i class="bi bi-briefcase-fill"></i>
                            <span>Data Usaha</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('produk'); ?>" class="sidebar-link">
                            <i class="bi bi-box2-fill"></i>
                            <span>Data Produk</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (session()->get('akses') == "admin" or session()->get('akses') == "pimpinan") : ?>
                    <li class="sidebar-item">
                        <a href="<?= base_url('laporan'); ?>" class="sidebar-link">
                            <i class="bi bi-clipboard-fill"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</div>
