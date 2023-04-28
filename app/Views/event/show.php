<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Detail Data Event<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="card">
        <div class="card-content">
            <img src="<?= base_url('uploads/event/' . $event[0]['gambar']); ?>" class="card-img-top img-fluid" alt="singleminded" style="object-fit: cover;" />
            <div class="card-body">
                <h4 class="card-title mb-1 pb-1"><?= ucwords($event[0]['judul']) ?></h4>
                <small class="card-text text-muted">Penulis : <?= ucwords($event[0]['name']) ?> | Tanggal Acara : <?= date("d F Y", strtotime($event[0]['tgl_buat'])) ?></small>
                <hr class="my-1 py-1" />
                <p class="card-text"><?= ucwords($event[0]['deskripsi']) ?></p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
