6<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Ubah Data Event<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">

    <div class="card">
        <div class="card-body">
            <form class="form form-vertical" method="POST" action="<?= base_url('event/update/' . $event->id) ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="user_id" id="" value="<?= session()->get('user_id') ?>">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="judul">Nama Lengkap</label>
                                <input type="text" class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul') ? old('judul') : $event->judul; ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('judul'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="deskripsi">Deskripsi Event</label>
                                <textarea name="deskripsi" class="form-control <?= (validation_show_error('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" cols="30" rows="10"><?= old('deskripsi') ? old('deskripsi') : $event->deskripsi; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('deskripsi'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="gambar">Gambar Event</label>
                                <input type="hidden" class="form-control" name="gambarLama" value="<?= $event->gambar ?>">
                                <a href="<?= base_url('uploads/event/' . $event->gambar); ?>" target="_blank" rel="noopener noreferrer">
                                    <img src="<?= base_url('uploads/event/' . $event->gambar); ?>" alt="<?= $event->gambar ?>" width="100" class="object-fit-cover" />
                                </a>
                                <input type="file" id="gambar" class="mt-3 form-control <?= (validation_show_error('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" autofocus value="<?= old('gambar'); ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('gambar'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="tgl_buat">Tanggal Mulai Event</label>
                                <input type="date" class="form-control <?= (validation_show_error('tgl_buat')) ? 'is-invalid' : ''; ?>" id="tgl_buat" name="tgl_buat" autofocus value="<?= old('tgl_buat') ? old('tgl_buat') : $event->tgl_buat; ?>">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('tgl_buat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                Simpan perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        let options = {
            selector: '#deskripsi',
            height: 300,
            menubar: false,
            statusbar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat',
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
        }
        if (localStorage.getItem("tablerTheme") === 'dark') {
            options.skin = 'oxide-dark';
            options.content_css = 'dark';
        }
        tinyMCE.init(options);
    })
    // @formatter:on
</script>
<?= $this->endSection() ?>
