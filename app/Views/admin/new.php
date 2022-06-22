<form action="<?= base_url(); ?>/admin_detail_pendaftaran/simpan_verifikasi/<?= $detail_pendaftar['no_induk']; ?>" method="POST">
                <div class="row mb20">

                    <div class="col-lg-6 col-12">
                        <h4>Penilaian Prestasi</h4>
                        <input disabled value="<?= $penilaian_tertinggi; ?>" type="text" class="w-100 form-control">
                        <!-- end penilaian -->
                        <h4 class="mt-3">Status Pendaftaran</h4>
                        <select class="form-select" id="ubah_status_pendaftaran" name="id_status_pendaftaran">
                            <?php foreach ($status_pendaftaran as $status_pendaftaran) : ?>
                                <option <?= ($detail_pendaftar['id_status_pendaftaran'] == $status_pendaftaran['id_status_pendaftaran']) ? 'selected' : ''; ?> value="<?= $status_pendaftaran['id_status_pendaftaran']; ?>">
                                    <?= $status_pendaftaran['nama_status']; ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <!-- end ubah status pendaftaran -->
                        <div id="ubah_status_final">
                            <h4 class="mt-3">Status Pendaftaran</h4>
                            <select class="form-select" id="inputGroupSelect01" name="id_status_final">
                                <option value="" selected></option>
                                <?php foreach ($status_final as $status_final) : ?>
                                    <option <?= ($detail_pendaftar['id_status_final'] == $status_final['id_status_final']) ? 'selected' : ''; ?> value="<?= $status_final['id_status_final']; ?>">
                                        <?= $status_final['nama_status_final']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <!-- end status final -->
                        </div>
                    </div>
                    <!-- end verifikasi kiri -->
                    <div class="col-lg-6 col-12 d-flex flex-column">
                        <h4>Pesan</h4>
                        <textarea name="pesan" id="pesan" class="w-100 form-control h-100"><?= $detail_pendaftar['pesan']; ?></textarea>
                        <!-- end pesan -->
                    </div>
                    <!-- end verifikasi kanan -->
                </div>
                <!-- Submit -->
                <div class="row pb40">
                    <div class="col-12 text-end">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#save_verifikasi_modal" class="btn btn-success me-3 fs18 px-4 py-2">
                            Simpan
                        </button>
                    </div>
                </div>
                <!-- end submit -->
                <!-- SAVE  Modal -->
                <div class="modal fade" id="save_verifikasi_modal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
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