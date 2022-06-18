<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main section-->
<div class=" bg-abu p40">
    <div class=" admin-content mx-auto">
        <h3 class="mb20 biru">Edit <span class="orange">Informasi Terbaru</span> </h3>
        <form
            action="<?= base_url(); ?>/admin_informasi/simpan_edit_informasi_terbaru/<?= $data_informasi_terbaru['id_informasi_terbaru']; ?>"
            method="post" enctype="multipart/form-data">
            <div class="mb20">
                <label for="judul_informasi_terbaru" class="form-label">Judul <span
                        class="required-label">*</span></label>
                <input id="judul_informasi_terbaru" type="text"
                    class="form-control <?= ($validation->hasError('judul_informasi_terbaru')) ? 'is-invalid' : ''; ?>"
                    name="judul_informasi_terbaru" value="<?= $data_informasi_terbaru['judul_informasi_terbaru']; ?>">
                <div class="invalid-feedback">
                    <?= ($validation->getError('judul_informasi_terbaru') == '') ? 'Bagian judul_informasi_terbaru wajib diisi' : str_replace('_', ' ', $validation->getError('judul_informasi_terbaru')) ?>
                </div>
            </div>
            <!-- end judul _informasi_terbaru -->
            <div class="mb20">
                <label for="deskripsi_informasi_terbaru" class="form-label">Deskripsi <span
                        class="required-label">*</span></label>
                <textarea id="deskripsi_informasi_terbaru" cols="30" rows="10"
                    class="form-control <?= ($validation->hasError('deskripsi_informasi_terbaru')) ? 'is-invalid' : ''; ?>"
                    name="deskripsi_informasi_terbaru"><?= $data_informasi_terbaru['deskripsi_informasi_terbaru']; ?></textarea>
                <div class="invalid-feedback">
                    <?= ($validation->getError('deskripsi_informasi_terbaru') == '') ? 'Bagian deskripsi_informasi_terbaru wajib diisi' : str_replace('_', ' ', $validation->getError('deskripsi_informasi_terbaru')) ?>
                </div>
            </div>
            <!-- end deskripsi _informasi_terbaru -->
            <div class="mb20">
                <label for="label_file_informasi_terbaru" class="form-label">File</label>
                <input id="file_informasi_terbaru" type="file" hidden
                    class="form-control <?= ($validation->hasError('file_informasi_terbaru')) ? 'is-invalid' : ''; ?>"
                    name="file_informasi_terbaru" accept="application/pdf">
                <label class=" bg-white" style="cursor: pointer;" for="file_informasi_terbaru">
                    <a class="btn btn-secondary">Pilih File</a>
                    <?= $data_informasi_terbaru['file_informasi_terbaru']; ?>
                </label>
                <div class="invalid-feedback">
                    <?= ($validation->getError('file_informasi_terbaru') == '') ? 'Ukuran file informasi terbaru tidak boleh lebih dari 15 MB' : str_replace('_', ' ', $validation->getError('file_informasi_terbaru')) ?>
                </div>
            </div>
            <!-- end file _informasi_terbaru -->
            <div class="mb20">
                <label for="label_gambar_informasi_terbaru" class="form-label">Gambar</label>
                <input id="gambar_informasi_terbaru" type="file"
                    class="form-control dropify <?= ($validation->hasError('gambar_informasi_terbaru')) ? 'is-invalid' : ''; ?>"
                    name="gambar_informasi_terbaru" accept="image/*" data-max-file-size="5M"
                    data-default-file="<?= base_url('assets/informasi/img/' . $data_informasi_terbaru['gambar_informasi_terbaru']); ?>"
                    data-allowed-file-extensions="jpg jpeg png">
                </label>
                <!-- <div class="invalid-feedback"> -->
                <div class="invalid-feedback">
                    <?= ($validation->getError('gambar_informasi_terbaru') == '') ? '' : str_replace('_', ' ', $validation->getError('gambar_informasi_terbaru')) ?>
                </div>
            </div>
            <!-- end gambar _informasi_terbaru -->
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
<script>
$('.dropify').dropify({
    error: {
        fileSize: "Ukuran gambar terlalu besar ({{ value }} maksimal).",
        fileExtension: "format file tidak diperbolehkan, hanya ({{ value }} yang diperbolehkan).",
    },
    messages: {
        default: "Tarik dan letakkan file disini atau pilih",
        replace: "Tarik dan letakkan atau pilih gambar baru",
        remove: "Hapus",
        error: "Ooops, Terdapat kesalahan.",
    },
});
</script>
<!-- end main section -->
<?= $this->endSection(); ?>