<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main section-->
<div class="bgwhite py40">
    <div class="admin-content detail mx-auto">
        <h3 class="pb20 biru">Download File Pendaftar</h3>
        <div class="bg-white br1 bdgrey p-4">
            <form action="<?= base_url(); ?>/admin_download/print_download_pendaftaran" method="POST">
                <div class="row mb20">
                    <div class="col-lg-6 col-12">
                        <h4 class="mt-3">File Download</h4>
                        <div class="form-check tahap_pendaftaran">
                            <input class="form-check-input" value="pdf" type="radio" name="file_download" id="pdf" checked>
                            <label class="form-check-label" for="pdf">
                                PDF
                            </label>
                        </div>
                        <div class="form-check tahap_pendaftaran">
                            <input class="form-check-input" value="excel" type="radio" name="file_download" id="excel">
                            <label class="form-check-label" for="excel">
                                Excel
                            </label>
                        </div>
                        <!-- end file download -->
                        <h4 class="mt-3">Tahap Pendaftaran</h4>
                        <div class="form-check tahap_pendaftaran">
                            <input class="form-check-input" value="pendaftar" type="radio" name="tahap_pendaftaran" id="pendaftar" checked>
                            <label class="form-check-label" for="pendaftar">
                                Pendaftar
                            </label>
                        </div>
                        <div class="form-check tahap_pendaftaran">
                            <input class="form-check-input" value="penerima" type="radio" name="tahap_pendaftaran" id="penerima">
                            <label class="form-check-label" for="penerima">
                                Penerima
                            </label>
                        </div>
                        <!-- end pendaftar -->
                        <div id="status_peserta">
                        </div>
                        <h4 class="mt-3">Status peserta</h4>
                        <!-- <select class="form-select" id="inputGroupSelect01" name="id_status_peserta"> -->
                        <div class="form-check ">
                            <?php foreach ($status_peserta as $status_peserta) : ?>
                                <input <?= ($status_peserta['id_status_peserta'] == 1) ? 'checked' : ''; ?> type="radio" name="id_status_peserta" class="form-check-input" required value="<?= $status_peserta['id_status_peserta']; ?>">
                                <?= $status_peserta['nama_peserta']; ?>
                                </input>
                                <br>
                            <?php endforeach ?>
                        </div>
                        <!-- </select> -->

                        <!-- end  publik atau non publik  -->
                        <div id="kegunaan">
                            <h4 class="mt-3">Digunakan untuk</h4>
                            <div class="form-check">
                                <input checked type="radio" class="form-check-input" required name="kegunaan" value="non_publik">
                                Non Publik
                                </input>
                            </div>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="kegunaan" value="publik">
                                Publik
                                </input>
                            </div>
                            <!-- </select> -->
                        </div>
                        <!-- end  status peserta -->
                        <div id="status_pendaftaran">
                            <h4 class="mt-3">Status Pendaftaran</h4>
                            <select class="form-select mt-2" id="status_pendaftaran" name="id_status_pendaftaran">
                                <?php foreach ($status_pendaftaran as $status_pendaftaran) : ?>
                                    <option value="<?= $status_pendaftaran['id_status_pendaftaran']; ?>">
                                        <?= $status_pendaftaran['nama_status']; ?>
                                    </option>
                                <?php endforeach ?>
                                <option value="5">Semua status pendaftaran</option>
                            </select>
                        </div>
                        <!-- end  status pendaftaran -->
                        <div id="status_final">
                            <h4 class="mt-3">Status final<h4>
                                    <select class="form-select" id="status_final" name="id_status_final">
                                        <?php foreach ($status_final as $status_final) : ?>
                                            <option value="<?= $status_final['id_status_final']; ?>">
                                                <?= $status_final['nama_status_final']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                        </div>
                        <!-- end  status final -->
                    </div>
                    <!-- end filter final -->
                </div>
                <!-- Submit -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary fs16 fw-normal">
                        <i class="fa-solid fa-file-arrow-down me-2"></i>Download
                    </button>
                </div>
                <!-- end submit -->
            </form>
        </div>
    </div>
</div>
<!-- end main section -->
<?= $this->endSection(); ?>