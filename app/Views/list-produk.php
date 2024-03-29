<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'incHome/_head.php'; ?>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/pages/auth.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main/app.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main/app-dark.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/pages/datatables.css" />
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="<?= base_url() ?>" class="navbar-brand d-flex align-items-center">
            <h3 class="m-0 text-primary">Asmami<span class="text-dark">Bontang</span></h3>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0 d-flex align-items-center">
                <?php if (!session('logged_in')) : ?>
                    <a href="<?= base_url('/login') ?>" class="nav-item nav-link"><span class="bg-outline-primary border-primary text-primary px-3 py-2 rounded-3">Masuk</span></a>
                    <a href="<?= base_url('/register') ?>" class="nav-item nav-link"><span class="bg-primary text-white px-3 py-2 rounded-3">Daftar menjadi Mitra</span></a>
                <?php else : ?>
                    <a href="<?= base_url() ?>/home" class="fw-bold"><?= ucwords(session('name')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Navbar End -->

    <div class="container">
        <section class="section mt-5">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Usaha</th>
                                <th>Foto</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produk as $pro) : ?>
                                <tr>
                                    <td><?= ucwords($pro->nama_usaha) ?></td>
                                    <td>
                                        <?php if ($pro->foto) : ?>
                                            <a href="<?= base_url('uploads/produk/' . $pro->foto); ?>" target="_blank" rel="noopener noreferrer">
                                                <img src="<?= base_url('uploads/produk/' . $pro->foto); ?>" alt="<?= $pro->foto ?>" width="50" height="40" class="object-fit-cover" />
                                            </a>
                                        <?php else : ?>
                                            <a href="<?= base_url('uploads/produk/default.jpg'); ?>" target="_blank" rel="noopener noreferrer">
                                                <img src="<?= base_url('uploads/produk/default.jpg'); ?>" alt="<?= $pro->foto ?>" width="50" height="40" class="object-fit-cover" />
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= ucwords($pro->nama_produk) ?></td>
                                    <td><?= ucwords($pro->kategori) ?></td>
                                    <td><?= ucwords($pro->deskripsi) ?></td>
                                    <td>
                                        <?php if ($pro->stock > 0) : ?>
                                            <span class="badge bg-success">Tersedia
                                            <?php else : ?>
                                                <span class="badge bg-danger">Kosong
                                                <?php endif; ?>
                                                </span>
                                    </td>
                                    <td>Rp <?= number_format($pro->harga, 0, ",", ".") ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <?php include 'incHome/_footer.php'; ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php include 'incHome/_script.php'; ?>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>
