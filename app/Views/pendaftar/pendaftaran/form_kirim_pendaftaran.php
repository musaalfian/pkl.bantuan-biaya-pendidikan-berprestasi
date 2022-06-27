<?php if ($file != null) : ?>
                    <?php if ($identitas['id_status_peserta'] == 1) : ?>
                    <form action="<?= base_url(); ?>/siswa/simpan_formulir_pendaftaran/<?= $identitas['no_induk']; ?>"
                        method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <!-- end sma -->
                        <?php elseif ($identitas['id_status_peserta'] == 2) : ?>
                        <form
                            action="<?= base_url(); ?>/calon_mhs/simpan_formulir_pendaftaran/<?= $identitas['no_induk']; ?>"
                            method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <!-- end calon mahasiswa -->
                            <?php else : ?>
                            <form
                                action="<?= base_url(); ?>/mahasiswa/simpan_formulir_pendaftaran/<?= $identitas['no_induk']; ?>"
                                method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <!-- end mahasiswa -->
                                <?php endif; ?>
                                <h3 class="mb20 fs20">F. Lampiran Formulir Pendaftaran</h3>
                                <div class="alert alert-primary">
                                    <h6 class="bold">Ketentuan :</h6>
                                    <p class="fs14">
                                        1. Silahkan download formulir pendaftaran <a class="text-decoration-underline"
                                            href="<?= base_url(); ?>/home_pendaftar/download_detail_pendaftar/<?= $identitas['no_induk']; ?>"
                                            target="_blank">Disini</a>
                                    </p>
                                    <p class="fs14">
                                        2. Formulir pendaftaran ditandatangani oleh orang tua/wali
                                    </p>
                                    <p class="fs14">
                                        3. Setelah ditandatangani, unggah formulir pendaftaran melalui kolom unggahan
                                        dibawah ini <strong>(Format file .pdf dan ukuran file tidak boleh lebih dari
                                            8MB)</strong>
                                    </p>
                                </div>
                                <!-- <button class="btn btn-primary mx-3"> -->

                                <div class="mb-3"></div>
                                <!-- </button> -->
                                <div class="mb20 upload__ulang">
                                    <label for="scan_formulir_pendaftaran" class="form-label bold">Formulir Pendaftaran
                                        <span class="fs14 lightgrey ms-2"> Contoh penamaan file :
                                            (nik)_scan_formulir_pendaftaran<strong>.pdf</strong></span></label>
                                    <input required <?= ($file['formulir_pendaftaran'] != null) ? 'disabled value="'.$file['formulir_pendaftaran'].'"' : ''; ?>
                                        id="formulir_pendaftaran"
                                        class="form-control w-100 scan-lampiran <?= ($validation->hasError('scan_formulir_pendaftaran')) ? 'is-invalid' : ''; ?>"
                                        name="scan_formulir_pendaftaran"
                                        type="<?= ($file['formulir_pendaftaran'] != null) ? 'text' : 'file'; ?>"
                                        accept="application/pdf" data-allowed-file-extensions="pdf" data-height="100"
                                        data-max-file-size="8M" />
                                    <div class="invalid-feedback" id="formulir-pendaftaran-invalid">
                                        <?= ($validation->getError('scan_formulir_pendaftaran') == '') ? 'Bagian scan formulir pendaftaran wajib diisi dan ukuran file tidak boleh lebih dari 8MB' : str_replace('_', ' ', $validation->getError('scan_formulir_pendaftaran')); ?>
                                    </div>
                                </div>
                                <!-- end scan Kartu pelajar -->
                                <!-- SAVE  Modal -->
                                <div class="modal fade" id="save_formulir_modal" tabindex="-1"
                                    aria-labelledby="saveModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title bold" id="saveModalLabel">
                                                    Yakin ingin menyimpan data?
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Pastikan data yang anda masukkan sudah benar.
                                                <div class="alert alert-danger mt-2 pesan-gagal" role="alert"
                                                    style="display:none">
                                                    Terdapat kesalahan masukkan atau data yang anda masukkan tidak
                                                    sesuai.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary fw-normal"
                                                    data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" id="btn_submit_formulir" class="btn btn-success fw-normal">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php endif ?>