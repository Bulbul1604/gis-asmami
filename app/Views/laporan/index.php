<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Laporan<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="card">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h6>Laporan Data Anggota ASMAMI</h6>
            <a href="<?= base_url('/laporan/print'); ?>" target="_blank">
                <div class="btn btn-sm btn-primary">Unduh Laporan</div>
            </a>
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
