<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main section-->
<div class=" bg-abu p40">
    <div class=" admin-content p-4 mx-auto">
        <h3 class="mb20">Edit Informasi Pendaftaran</h3>
        <form action="<?= base_url(); ?>/admin_informasi/simpan_edit_informasi_pendaftaran" method="post">
            <div class="alert alert-primary">
                Catatan : Untuk menambahkan kalimat berikutnya, gunakan semicolon (;)
            </div>
            <div class="row">
                <div class="mb20">
                    <label for="persyaratan" class=" form-label">Persyaratan Pendaftaran <span
                            class="required-label">*</span></label>
                    <textarea id="persyaratan" cols="30" rows="10"
                        class="form-control <?= ($validation->hasError('persyaratan')) ? 'is-invalid' : ''; ?>"
                        name="persyaratan"> <?= $persyaratan; ?></textarea>
                    <div class=" invalid-feedback">
                        <?= ($validation->getError('persyaratan') == '') ? 'Bagian persyaratan wajib diisi' : str_replace('_', ' ', $validation->getError('persyaratan')) ?>
                    </div>
                </div>

                <!-- end persyaratan'. $j -->
                <div class="col-sm-6">
                    <div class="mb20">
                        <label for="label_jadwal_kegiatan" class="form-label">Jadwal Kegiatan</label>
                        <textarea id="jadwal_kegiatan" type="text" cols="30" rows="10"
                            class="form-control <?= ($validation->hasError('jadwal_kegiatan')) ? 'is-invalid' : ''; ?>"
                            name="jadwal_kegiatan"><?= $jadwal_kegiatan; ?></textarea>
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
                    <div class="mb20">
                        <label for="label_jadwal_pelaksanaan" class="form-label">Jadwal Pelaksanaan</label>

                        <textarea id="jadwal_pelaksanaan" type="text" cols="30" rows="10"
                            class="form-control <?= ($validation->hasError('jadwal_pelaksanaan')) ? 'is-invalid' : ''; ?>"
                            name="jadwal_pelaksanaan"><?= $jadwal_pelaksanaan; ?></textarea>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('jadwal_pelaksanaan') == '') ? 'Bagian jadwal_pelaksanaan' . ' wajib diisi' : str_replace('_', ' ', $validation->getError('jadwal_pelaksanaan')) ?>
                        </div>
                    </div>
                </div>

                <!-- jadwal pelaksanaan -->
                <div class="mb20">
                    <label for="proses_seleksi" class="form-label">Proses Seleksi <span
                            class="required-label">*</span></label>

                    <textarea id="proses_seleksi" cols="30" rows="10"
                        class="form-control <?= ($validation->hasError('proses_seleksi')) ? 'is-invalid' : ''; ?>"
                        name="proses_seleksi"><?= $proses_seleksi; ?></textarea>
                    <div class="invalid-feedback">
                        <?= ($validation->getError('proses_seleksi') == '') ? 'Bagian proses_seleksi
                        wajib diisi' : str_replace('_', ' ', $validation->getError('proses_seleksi')); ?>
                    </div>
                </div>

            </div>
            <!-- end proses_seleksi -->
            <!-- Submit -->
            <div class="row pb40">
                <div class="col-12 text-end">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#save_modal"
                        class="btn btn-success me-3 fs18 px-4 py-2">
                        Simpan
                    </button>
                </div>
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
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end main section -->
<?= $this->endSection(); ?>