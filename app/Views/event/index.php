<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Data Event<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
   <?php if (!empty(session()->getFlashdata('message'))) : ?>
      <div class="alert alert-success alert-dismissible show fade">
         <?= session()->getFlashdata('message'); ?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   <?php endif; ?>
   <div class="card">
      <div class="card-header d-flex justify-content-end">
         <a href="<?= base_url('event/create') ?>" class="btn btn-sm btn-primary">Tambah Event</a>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table" id="table1">
               <thead>
                  <tr>
                     <th>Gambar</th>
                     <th>Judul</th>
                     <th>Tgl Acara</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($events as $event) : ?>
                     <tr>
                        <td>
                           <a href="<?= base_url('uploads/event/' . $event->gambar); ?>" target="_blank" rel="noopener noreferrer">
                              <img src="<?= base_url('uploads/event/' . $event->gambar); ?>" alt="<?= $event->gambar ?>" width="30" height="30" class="object-fit-cover" />
                           </a>
                        </td>
                        <td><?= ucwords($event->judul) ?></td>
                        <td><?= date("d F Y", strtotime($event->tgl_buat)) ?></td>
                        <td class="d-flex gap-2">
                           <a href="<?= base_url('event/show/' . $event->id) ?>" class="btn btn-sm rounded-3 btn-outline-info">Detail</a>
                           <a href="<?= base_url('event/edit/' . $event->id) ?>" class="btn btn-sm rounded-3 btn-outline-warning">Edit</a>
                           <a href="<?= base_url('event/delete/' . $event->id) ?>" class="btn btn-sm rounded-3 btn-outline-danger" onclick="return confirm('Hapus data ?');">Hapus</a>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
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
