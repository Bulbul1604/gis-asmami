<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layouts/_head') ?>
</head>

<body>
    <script src="<?= base_url() ?>/assets/js/initTheme.js"></script>
    <div id="app">
        <?= $this->include('layouts/_sidebar'); ?>
        <div id="main">
            <header class="mb-5">
                <nav class="navbar navbar-expand m-0 p-0 navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?= ucwords(session()->get('name')); ?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?= ucwords(session()->get('akses')); ?></p>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?= ucwords(session()->get('name')); ?></h6>
                                    </li>
                                    <?php if (session()->get('akses') == "mitra") : ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('profile') ?>"><i class="icon-mid bi bi-person me-2"></i> My
                                                Profile</a>
                                        </li>
                                    <?php endif; ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('change-password') ?>"><i class="icon-mid bi bi-key me-2"></i> Change Password</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                            Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3><?= $this->renderSection('title'); ?></h3>
                            <p class="text-subtitle text-muted"><?= $this->renderSection('description'); ?></p>
                        </div>
                    </div>
                </div>
                <!-- <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Default Layout</h4>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam,
                            commodi? Ullam quaerat similique iusto temporibus, vero aliquam
                            praesentium, odit deserunt eaque nihil saepe hic deleniti?
                            Placeat delectus quibusdam ratione ullam!
                        </div>
                    </div>
                </section> -->
                <?= $this->renderSection('content'); ?>
            </div>

        </div>
    </div>

    <?= $this->include('layouts/_script.php'); ?>
    <?= $this->renderSection('script'); ?>
</body>

</html>
