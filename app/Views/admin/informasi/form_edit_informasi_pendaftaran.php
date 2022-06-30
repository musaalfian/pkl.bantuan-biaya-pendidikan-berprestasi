<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main section-->
<div class="bgwhite py40">
    <div class="admin-content mx-auto">
        <div class="navigasi d-flex flex-wrap align-items-center mb-3">
            <a href="<?= base_url(); ?>/admin_informasi/informasi_pendaftaran" class="fw-bold blue fs14 me-3"><i class="fa-solid fa-arrow-left-long"></i></a>
            <a href="<?= base_url(); ?>/admin_informasi/informasi_pendaftaran" class="blue fs14">Informasi Pendaftaran <span class="mx-2 blue fs14">/</span></a>
            <a href="" class="abu fs14">Edit Informasi Pendaftaran</a>
        </div>
        <h3 class="mb-2 biru">Edit Informasi Pendaftaran</h3>
        <form action="<?= base_url(); ?>/admin_informasi/simpan_edit_informasi_pendaftaran" method="post" class="needs-validation" novalidate>
            <div class="row">
                <div class="mb-3">
                    <label for="persyaratan" class="form-label bold">Persyaratan Pendaftaran</label>
                    <!-- <textarea id="persyaratan" cols="30" rows="10"
                        class="form-control <?= ($validation->hasError('persyaratan')) ? 'is-invalid' : ''; ?>"
                        name="persyaratan"> <?= $persyaratan[0]; ?></textarea> -->
                    <textarea id="persyaratan" name="persyaratan" required>
                        <ol>
                            <?php foreach ($persyaratan as $persyaratan) : ?>
                                <li><?= $persyaratan; ?></li>
                                <?php endforeach ?>
                        </ol>
                    </textarea>
                    <div class=" invalid-feedback">
                        <?= ($validation->getError('persyaratan') == '') ? 'Bagian persyaratan wajib diisi' : str_replace('_', ' ', $validation->getError('persyaratan')) ?>
                    </div>
                </div>

                <!-- end persyaratan'. $j -->
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="label_jadwal_kegiatan" class="form-label bold">Jadwal Kegiatan</label>
                        <textarea id="jadwal_kegiatan" name="jadwal_kegiatan" required>
                        <ol>
                            <?php foreach ($jadwal_kegiatan as $jadwal_kegiatan) : ?>
                                <li><?= $jadwal_kegiatan; ?></li>
                                <?php endforeach ?>
                        </ol>
                    </textarea>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('jadwal_kegiatan') == '') ? 'Bagian
                            jadwal_kegiatan' . ' wajib diisi' : str_replace(
                                '_',
                                ' ',
                                $validation->getError('jadwal_kegiatan')
                            ) ?>
                        </div>
                    </div>
                </div>

                <!-- jadwal kegiatan -->
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="label_jadwal_pelaksanaan" class="form-label bold">Jadwal Pelaksanaan</label>
                        <textarea id="jadwal_pelaksanaan" name="jadwal_pelaksanaan" required>
                        <ol>
                            <?php foreach ($jadwal_pelaksanaan as $jadwal_pelaksanaan) : ?>
                                <li><?= $jadwal_pelaksanaan; ?></li>
                                <?php endforeach ?>
                        </ol>
                    </textarea>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('jadwal_pelaksanaan') == '') ? 'Bagian jadwal_pelaksanaan' . ' wajib diisi' : str_replace('_', ' ', $validation->getError('jadwal_pelaksanaan')) ?>
                        </div>
                    </div>
                </div>

                <!-- jadwal pelaksanaan -->
                <div class="mb-3">
                    <label for="proses_seleksi" class="form-label bold">Proses Seleksi</label>

                    <textarea id="proses_seleksi" name="proses_seleksi" required>
                        <ol>
                            <?php foreach ($proses_seleksi as $proses_seleksi) : ?>
                                <li><?= $proses_seleksi; ?></li>
                                <?php endforeach ?>
                        </ol>
                    </textarea>
                    <div class="invalid-feedback">
                        <?= ($validation->getError('proses_seleksi') == '') ? 'Bagian proses_seleksi
                        wajib diisi' : str_replace('_', ' ', $validation->getError('proses_seleksi')); ?>
                    </div>
                </div>

            </div>
            <!-- end proses_seleksi -->
            <!-- Submit -->
            <div class="d-flex justify-content-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#save_modal" class="btn btn-success fs16 fw-normal">
                    Simpan
                </button>
            </div>
            <!-- end submit -->
            <!-- SAVE  Modal -->
            <div class="modal fade" id="save_modal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="saveModalLabel">
                                Yakin ingin menyimpan data?
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Pastikan data yang anda masukkan sudah benar.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button id="submit" type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    // persyaratan CKEditor
    ClassicEditor
        .create(document.querySelector('#persyaratan'), {
            removePlugins: ['Heading', 'Link', 'CKFinder'],
            toolbar: ['bold', 'italic', 'bulletedList', 'numberedList']
        })
        .then(newEditor => {
            console.log(newEditor);
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });
    // jadwal kegiatan CKEditor
    ClassicEditor
        .create(document.querySelector('#jadwal_kegiatan'), {
            removePlugins: ['Heading', 'Link', 'CKFinder'],
            toolbar: ['bold', 'italic', 'bulletedList', 'numberedList']
        })
        .then(newEditor => {
            console.log(newEditor);
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });
    // jadwal pelaksanaan CKEditor
    ClassicEditor
        .create(document.querySelector('#jadwal_pelaksanaan'), {
            removePlugins: ['Heading', 'Link', 'CKFinder'],
            toolbar: ['bold', 'italic', 'bulletedList', 'numberedList']
        })
        .then(newEditor => {
            console.log(newEditor);
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });
    // proses seleksi CKEditor
    ClassicEditor
        .create(document.querySelector('#proses_seleksi'), {
            removePlugins: ['Heading', 'Link', 'CKFinder'],
            toolbar: ['bold', 'italic', 'bulletedList', 'numberedList']
        })
        .then(newEditor => {
            console.log(newEditor);
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
<!-- end main section -->
<?= $this->endSection(); ?>