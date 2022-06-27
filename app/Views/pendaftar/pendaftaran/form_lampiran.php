<?php if ($keluarga != null) : ?>
                    <?php if ($identitas['id_status_peserta'] == 1) : ?>
                    <form action="<?= base_url(); ?>/siswa/simpan_tambah_lampiran_siswa/<?= $identitas['no_induk']; ?>"
                        method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <!-- end sma -->
                        <?php elseif ($identitas['id_status_peserta'] == 2) : ?>
                        <form
                            action="<?= base_url(); ?>/calon_mhs/simpan_tambah_lampiran_calon_mhs/<?= $identitas['no_induk']; ?>"
                            method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <!-- end calon mahasiswa -->
                            <?php else : ?>
                            <form
                                action="<?= base_url(); ?>/mahasiswa/simpan_tambah_lampiran_mhs/<?= $identitas['no_induk']; ?>"
                                method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <!-- end mahasiswa -->
                                <?php endif; ?>
                                <!-- alert lampiran -->
                                <?php if (session()->getFlashdata('pesan-tambah-lampiran-pendaftar')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan-tambah-lampiran-pendaftar'); ?>
                                </div>
                                <?php endif; ?>
                                <!-- end alert lampiran -->
                                <!-- prestasi -->
                                <h3 class="mb20 fs20">D. Prestasi</h3>

                                <div class="alert alert-primary">
                                    <h6 class="bold">Ketentuan :</h6>
                                    <p class="fs14">
                                        1. Pendaftar dapat mengupload maksimal 3 prestasi
                                    </p>
                                    <p class="fs14">
                                        2. Semua file di upload dan ukuran file tidak boleh lebih dari
                                        <strong>2MB</strong>
                                    </p>
                                    <?php if ($id_peserta == 1) : ?>
                                    <p class="fs14">
                                        3. Prestasi yang dapat di upload antara lain : prestasi akademik, non akademik,
                                        paskibra, peserta lomba perorangan, peserta lomba kelompok,
                                        surat keterangan tahfidz / lulus tahfidz Al Quran dengan
                                        minimal 4 juz
                                    </p>
                                    <?php elseif ($id_peserta == 2) : ?>
                                    <p class="fs14">
                                        3. Prestasi yang dapat di upload antara lain : prestasi akademik, non akademik,
                                        peserta lomba perorangan, peserta lomba kelompok, surat
                                        keterangan tahfidz / lulus tahfidz Al Quran dengan minimal 5
                                        juz, nilai ujian sekolah, sertifikat bahasa inggris atau
                                        bahasa arab yang masih berlaku
                                    </p>
                                    <?php else : ?>
                                    <p class="fs14">
                                        3. Prestasi yang dapat di upload antara lain : prestasi akademik, non akademik,
                                        peserta lomba perorangan, peserta lomba kelompok, surat
                                        keterangan tahfidz / lulus tahfidz Al Quran dengan minimal 5
                                        juz, nilai ujian sekolah, sertifikat bahasa inggris atau
                                        bahasa arab yang masih berlaku
                                    </p>
                                    <?php endif; ?>
                                </div>
                                <?php $i = 1; ?>
                                <div class="mb20">
                                    <?php if ($file != null) {
                                            $n = count($prestasi);
                                        } else {
                                            $n = 3;
                                        } ?>

                                    <?php for ($i = 1; $i <= $n; $i++) : ?>
                                    <div class="row" <?= ($file == null) ? 'id="prestasi_' . $i . '"' : ''; ?>>
                                        <!-- file prestasi -->
                                        <div class="col-12 col-md-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="scan_prestasi_<?= $i; ?>" class="form-label bold">Scan
                                                    Prestasi
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?>
                                                </label>
                                                <input
                                                    value="<?= ($file != null) ? $prestasi[$i - 1]['file_prestasi'] : ''; ?>"
                                                    <?= ($file != null) ? 'disabled' : ''; ?>
                                                    <?= ($i == 1) ? 'required' : ''; ?> id="file_prestasi_<?= $i; ?>"
                                                    class="form-control scan-lampiran  <?= ($validation->hasError('scan_prestasi_' . $i)) ? 'is-invalid' : ''; ?>"
                                                    name="scan_prestasi_<?= $i; ?>"
                                                    <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                    accept="application/pdf" data-allowed-file-extensions="pdf"
                                                    data-height="100" data-max-file-size="2M" />
                                                <?php if ($file == null) : ?>
                                                <div class="invalid-feedback" id="file-prestasi-invalid-<?= $i; ?>">
                                                    <?= ($validation->getError('scan_prestasi_' . $i) == '') ? 'Bagian scan prestasi wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_prestasi_' . $i));
                                                                ?>
                                                </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <!-- end file prestasi -->
                                        <div class="col-12 col-md-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="nama_prestasi_<?= $i; ?>" class="form-label bold">Nama
                                                    Prestasi
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?></label>
                                                <input <?= ($file != null) ? 'disabled' : ''; ?>
                                                    <?= ($i == 1) ? 'required' : ''; ?> type="text"
                                                    id="nama_prestasi_<?= $i; ?>"
                                                    class="form-control <?= ($validation->hasError('nama_prestasi_' . $i)) ? 'is-invalid' : ''; ?>"
                                                    value="<?= ($file != null) ? $prestasi[$i - 1]['nama_prestasi'] : old('nama_prestasi_' . $i);  ?>"
                                                    name="nama_prestasi_<?= $i; ?>" placeholder="" />
                                                <?php if ($file == null) : ?>
                                                <div class="invalid-feedback">
                                                    <?= ($validation->getError('nama_prestasi_' . $i) == '') ? 'Bagian nama prestasi wajib diisi' : str_replace(
                                                                    '_',
                                                                    ' ',
                                                                    $validation->getError('nama_prestasi_' . $i)
                                                                ); ?>
                                                </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <!-- end nama prestasi -->
                                        <div class="col-12 col-md-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="kategori_<?= $i; ?>" class="form-label bold">Kategori
                                                    Prestasi
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?></label>
                                                <select
                                                    <?= ($file != null) ? 'disabled id="kategori_isi_' . $i . '"' : 'id="kategori_' . $i . '"'; ?>
                                                    <?= ($i == 1) ? 'required' : ''; ?>
                                                    class="form-select <?= ($validation->hasError('kategori_' . $i)) ? 'is-invalid' : ''; ?>"
                                                    aria-label="Default select example" name="kategori_<?= $i; ?>"
                                                    id="kategori_<?= $i; ?>">
                                                    <?php foreach ($kategori as $data_kategori) : ?>
                                                    <option hidden></option>
                                                    <option onchange="kategori_prestasi()" <?php
                                                                                                        if (old('kategori_' . $i) == $data_kategori) {
                                                                                                            echo 'selected';
                                                                                                        } elseif ($file != null) {
                                                                                                            if ($prestasi[$i - 1]['kategori'] == $data_kategori) {
                                                                                                                echo 'selected';
                                                                                                            }
                                                                                                        } ?>
                                                        value="<?= $data_kategori; ?>"><?= ucfirst($data_kategori); ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?php if ($file == null) : ?>
                                                <div class="invalid-feedback">
                                                    <?= ($validation->getError('kategori_' . $i) == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('kategori_' . $i)); ?>
                                                </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <!-- end kategori -->
                                        <div class="col-12 col-md-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="tingkat_<?= $i; ?>" class="form-label bold">Tingkat Prestasi
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?></label>
                                                <select
                                                    <?= ($file != null) ? 'disabled id="tingkat_isi_' . $i . '"' : 'id="tingkat_' . $i . '"'; ?>
                                                    class="form-select <?= ($validation->hasError('tingkat_' . $i)) ? 'is-invalid' : ''; ?>"
                                                    aria-label="Default select example" name="tingkat_<?= $i; ?>">
                                                    <option selected></option>
                                                    <?php foreach ($tingkat as $data_tingkat) : ?>
                                                    <option value="<?= $data_tingkat; ?>" <?php
                                                                                                        if (old('tingkat_' . $i) == $data_tingkat) {
                                                                                                            echo 'selected';
                                                                                                        } elseif ($file != null) {
                                                                                                            if ($prestasi[$i - 1]['tingkat'] == $data_tingkat) {
                                                                                                                echo 'selected';
                                                                                                            }
                                                                                                        }  ?>>
                                                        <?= ucfirst($data_tingkat); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <!-- end tingkat prestasi -->
                                        </div>
                                        <!-- end tingkat -->
                                        <div class="col-12 col-md-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="juara_<?= $i; ?>" class="form-label bold">Juara
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?>
                                                </label>
                                                <select
                                                    <?= ($file != null) ? 'disabled id="juara_isi_' . $i . '"' : 'id="juara_' . $i . '"'; ?>
                                                    class="form-select <?= ($validation->hasError('juara_' . $i)) ? 'is-invalid' : ''; ?>"
                                                    aria-label="Default select example" name="juara_<?= $i; ?>">
                                                    <option selected></option>
                                                    <?php foreach ($juara as $data_juara) : ?>
                                                    <option <?php
                                                                        if (old('juara_' . $i) == $data_juara) {
                                                                            echo 'selected';
                                                                        } elseif ($file != null) {
                                                                            if ($prestasi[$i - 1]['juara'] == $data_juara) {
                                                                                echo 'selected';
                                                                            }
                                                                        }  ?> value="<?= $data_juara; ?>">
                                                        <?= ucfirst($data_juara); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <!-- end Juara -->
                                        </div>
                                        <!-- end juara -->
                                        <div class="col-12 col-md-6 col-xxl-1">
                                            <div class="mb20">
                                                <label for="tahun_prestasi_<?= $i; ?>" class="form-label bold">Tahun
                                                    <span class="required-label"></span>
                                                </label>
                                                <input <?= ($file != null) ? 'disabled' : ''; ?>
                                                    <?= ($i == 1) ? 'required' : ''; ?> type="number"
                                                    id="tahun_prestasi_<?= $i; ?>"
                                                    class="form-control <?= ($validation->hasError('tahun_prestasi_' . $i)) ? 'is-invalid' : ''; ?>"
                                                    value="<?= ($file != null) ? $prestasi[$i - 1]['tahun_prestasi'] : old('tahun_prestasi_' . $i);  ?>"
                                                    name="tahun_prestasi_<?= $i; ?>" placeholder="" min="2010"
                                                    max="2022" />
                                                <?php if ($file == null) : ?>
                                                <div class="invalid-feedback">
                                                    <?= ($validation->getError('tahun_prestasi_' . $i) == '') ? 'Bagian tahun prestasi ' . $i . ' wajib diisi' : str_replace(
                                                                    '_',
                                                                    ' ',
                                                                    $validation->getError('tahun_prestasi_' . $i)
                                                                ); ?>
                                                </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <!-- end tahun_prestasi -->
                                        <div class="col-12 col-md-6 col-xl-1 tambah__prestasi">
                                            <div class="mb20 text-start" <?= ($file != null) ? 'hidden' : ''; ?>>
                                                <?php if ($i != 3) : ?>
                                                <label for="juara_<?= $i; ?>" id="label-tambah-<?= $i; ?>"
                                                    class="form-label bold">Tambah
                                                </label>
                                                <button type="button" id="icon-tambah-<?= $i; ?>" data-bs-toggle="modal"
                                                    data-bs-target="#prestasi_<?= $i; ?>_modal" class="btn ">
                                                    <i class="fas fa-plus-circle text-center blue fs18"></i>
                                                </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- end tambah prestasi -->
                                        <hr>
                                    </div>
                                    <!-- Tambah Prestasi  Modal -->
                                    <div class="modal fade" id="prestasi_<?= $i; ?>_modal" tabindex="-1"
                                        aria-labelledby="prestasiModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title bold" id="prestasiModalLabel">
                                                        Yakin ingin menambah data prestasi?
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Pastikan data prestasi sebelumnya sudah diisi.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary fw-normal"
                                                        data-bs-dismiss="modal">
                                                        Batal
                                                    </button>
                                                    <a class="btn btn-primary"
                                                        onclick="tambah_prestasi_<?= $i + 1; ?>()"
                                                        data-bs-dismiss="modal">Tambah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endfor; ?>
                                </div>
                                <!-- end prestasi -->
                                <!-- lampiran dokumen -->
                                <h3 class="mb20 fs20">E. Lampiran Dokumen</h3>
                                <div class="alert alert-primary">
                                    <h6 class="bold">Ketentuan :</h6>
                                    <p class="fs14">
                                        1. Semua formulir wajib diisi,
                                        <?= ($id_peserta == 1) ? 'kecuali "Scan KTP" jika belum memiliki tidak diwajibkan mengisi' : ''; ?>
                                        dan ukuran file tidak boleh lebih dari
                                        <strong>2MB</strong>
                                    </p>
                                    <p class="fs14">
                                        2. Dokumen di upload dengan format file<strong>.pdf</strong>, kecuali "Upload
                                        Foto Berwana" menggunakan format file <strong>.jpg/.jpeg/.png</strong>
                                    </p>
                                    <p class="fs14">
                                        3. Untuk "Scan Surat Keterangan Tidak Mampu", dokumen berupa : <strong>RTSM/RTM,
                                            PKH, KIP, atau Surat desa yatim/piatu</strong>
                                    </p>
                                    <?php if ($id_peserta == 1) : ?>
                                    <p class="fs14">
                                        4. Untuk "Scan Raport Legalisasi", Raport sudah dilegalisasi oleh Kepala Sekolah
                                    </p>
                                    <?php endif ?>
                                    <?php if ($id_peserta == 2 || $id_peserta == 3) : ?>
                                    <p class="fs14">4. Untuk "Scan Proposal Bantuan", penyusunan proposal dapat
                                        disesuaikan dengan ketentuan sistematika proposal yang dapat diunduh <a
                                            href="<?= base_url(); ?>/assets/informasi/file/Sistematika Proposal.pdf">Disini</a>
                                    </p>
                                    <?php endif ?>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb20">
                                            <label for="scan_kk" class="form-label bold">Scan Kartu Keluarga (KK) <span
                                                    class="fs14 lightgrey ms-2"> Contoh penamaan file :
                                                    (nik)_scan_kk<strong>.pdf</strong></span></label>
                                            <input <?= ($file != null) ? 'disabled value="' . $file['kk'] . '"' : ''; ?>
                                                required id="kk"
                                                class="form-control scan-lampiran <?= ($validation->hasError('scan_kk')) ? 'is-invalid' : ''; ?>"
                                                name="scan_kk" <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" data-allowed-file-extensions="pdf"
                                                data-height="100" data-max-file-size="2M" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="kk-invalid">
                                                <?= ($validation->getError('scan_kk') == '') ? 'Bagian scan kartu keluarga wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_kk')); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end scan KK -->
                                        <div class="mb20">
                                            <label for="scan_ktp" class="form-label bold">Scan Kartu Tanda Penduduk
                                                (KTP) <span class="fs14 lightgrey ms-2"> Contoh penamaan file :
                                                    (nik)_scan_ktp<strong>.pdf</strong></span>
                                            </label>
                                            <input
                                                <?= ($file != null) ? 'disabled value="' . $file['ktp'] . '"' : ''; ?>
                                                <?= ($id_peserta == 1) ? '' : 'required'; ?> id="ktp"
                                                class="form-control scan-lampiran <?= ($validation->hasError('scan_ktp')) ? 'is-invalid' : ''; ?>"
                                                name="scan_ktp" <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" data-allowed-file-extensions="pdf"
                                                data-height="100" data-max-file-size="2M" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="ktp-invalid">
                                                <?= ($validation->getError('scan_ktp') == '') ? 'Bagian scan kartu tanda penduduk wajib diisi dan ukuran file scan KTP tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_ktp')); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end scan KTP -->
                                        <?php if ($id_peserta == 1 || $id_peserta == 2) : ?>
                                        <div class="mb20">
                                            <label for="scan_kartu_pelajar" class="form-label bold">Scan Kartu Pelajar
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file :
                                                    (nik)_scan_kartu_pelajar<strong>.pdf</strong></span>
                                            </label>
                                            <input
                                                <?= ($file != null) ? 'disabled value="' . $file['kartu_pelajar'] . '"' : ''; ?>
                                                required id="kartu_pelajar"
                                                class="form-control scan-lampiran <?= ($validation->hasError('scan_kartu_pelajar')) ? 'is-invalid' : ''; ?>"
                                                name="scan_kartu_pelajar"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf " data-allowed-file-extensions="pdf"
                                                data-height="100" data-max-file-size="2M" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="kartu-pelajar-invalid">
                                                <?= ($validation->getError('scan_kartu_pelajar') == '') ? 'Bagian scan kartu pelajar  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_kartu_pelajar')); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end scan Kartu pelajar -->
                                        <?php else : ?>
                                        <div class="mb20">
                                            <label for="scan_kartu_pelajar" class="form-label bold">Scan Kartu Mahasiswa
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file :
                                                    (nik)_scan_ktm<strong>.pdf</strong></span>
                                            </label>
                                            <input required id="kartu_pelajar"
                                                class="form-control scan-lampiran <?= ($validation->hasError('scan_kartu_pelajar')) ? 'is-invalid' : ''; ?>"
                                                <?= ($file != null) ? 'disabled value="' . $file['kartu_pelajar'] . '"' : ''; ?>
                                                name="scan_kartu_pelajar"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" data-allowed-file-extensions="pdf"
                                                data-height="100" data-max-file-size="2M" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="kartu-pelajar-invalid">
                                                <?= ($validation->getError('scan_kartu_pelajar') == '') ? 'Bagian scan kartu mahasiswa  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_kartu_pelajar')); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end scan Kartu pelajar -->
                                        <?php endif ?>

                                        <div class="mb20">
                                            <label for="scan_pas_foto" class="form-label bold">Upload Foto Berwarna
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file :
                                                    (nik)_pas_foto<strong>.jpg/.jpeg/.png</strong></span>
                                            </label>
                                            <input type="file" required id="pas_foto"
                                                class="form-control lampiran-foto-pendaftaran <?= ($validation->hasError('scan_pas_foto')) ? 'is-invalid' : ''; ?>"
                                                name="scan_pas_foto" accept="image/*" data-height="100"
                                                data-max-file-size="2M"
                                                <?= ($file != null) ? 'disabled hidden data-default-file="' . base_url() . '/assets/scan/' . $identitas["no_induk"] . '/file/' . $file["pas_foto"] . '"' : ''; ?>
                                                data-allowed-file-extensions="jpg jpeg png" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="pas-foto-invalid">
                                                <?= ($validation->getError('scan_pas_foto') == '') ? 'Bagian pas foto  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_pas_foto')); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end scan_pas_foto -->
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <?php if ($id_peserta == 2) : ?>
                                        <div class="mb20">
                                            <label for="scan_diterima_pt" class="form-label bold">Scan Keterangan
                                                Diterima Perguruan Tinggi <span class="fs14 lightgrey ms-2"> Contoh
                                                    penamaan file : (nik)_scan_diteima_pt<strong>.pdf</strong></span>
                                            </label>
                                            <input required id="diterima_pt"
                                                class="form-control scan-lampiran <?= ($validation->hasError('scan_diterima_pt')) ? 'is-invalid' : ''; ?>"
                                                <?= ($file != null) ? 'disabled value="' . $file['diterima_pt'] . '"' : ''; ?>
                                                name="scan_diterima_pt"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" data-allowed-file-extensions="pdf"
                                                data-height="100" data-max-file-size="2M" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="diterima-pt-invalid">
                                                <?= ($validation->getError('scan_diterima_pt') == '') ? 'Bagian scan diterima perguruan tinggi wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : $validation->getError('scan_diterima_pt'); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end scan diterima pt -->
                                        <?php elseif ($id_peserta == 3) : ?>
                                        <div class="mb20">
                                            <label for="scan_akreditasi_pt" class="form-label bold">Scan Surat
                                                Akreditasi Perguruan Tinggi <span class="fs14 lightgrey ms-2"> Contoh
                                                    penamaan file : (nik)_scan_akreditasi_pt<strong>.pdf</strong></span>
                                            </label>

                                            <input required id="akreditasi_pt"
                                                class="form-control scan-lampiran <?= ($validation->hasError('scan_akreditasi_pt')) ? 'is-invalid' : ''; ?>"
                                                <?= ($file != null) ? 'disabled value="' . $file['akreditasi_pt'] . '"' : ''; ?>
                                                name="scan_akreditasi_pt"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" data-allowed-file-extensions="pdf"
                                                data-height="100" data-max-file-size="2M" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="akreditasi-pt-invalid">
                                                <?= ($validation->getError('scan_akreditasi_pt') == '') ? 'Bagian akreditasi perguruan tinggi wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : $validation->getError('scan_akreditasi_pt'); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end scan_akreditasi_pt -->
                                        <?php endif ?>
                                        <?php if ($id_peserta == 1) : ?>
                                        <div class="mb20">
                                            <label for="scan_raport_smt" class="form-label bold">Scan Nilai Raport
                                                Semester Terakhir <span class="fs14 lightgrey ms-2"> Contoh penamaan
                                                    file : (nik)_scan_raport_smt<strong>.pdf</strong></span>
                                            </label>

                                            <input
                                                <?= ($file != null) ? 'disabled value="' . $file['raport_smt'] . '"' : ''; ?>
                                                required id="raport_smt"
                                                class="form-control scan-lampiran <?= ($validation->hasError('scan_raport_smt')) ? 'is-invalid' : ''; ?>"
                                                name="scan_raport_smt"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" data-allowed-file-extensions="pdf"
                                                data-height="100" data-max-file-size="2M" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="raport-smt-invalid">
                                                <?= ($validation->getError('scan_raport_smt') == '') ? 'Bagian scan raport semester terakhir  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_raport_smt')); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end scan raport smt terakhir -->
                                        <div class="mb20">
                                            <label for="scan_raport" class="form-label bold">Scan Raport Legalisasi
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file :
                                                    (nik)_scan_raport_legalisasi<strong>.pdf</strong></span>
                                            </label>
                                            <input
                                                <?= ($file != null) ? 'disabled value="' . $file['raport_legalisasi'] . '"' : ''; ?>
                                                required id="raport"
                                                class="form-control scan-lampiran <?= ($validation->hasError('scan_raport')) ? 'is-invalid' : ''; ?>"
                                                name="scan_raport"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" data-allowed-file-extensions="pdf"
                                                data-height="100" data-max-file-size="2M" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="raport-invalid">
                                                <?= ($validation->getError('scan_raport') == '') ? 'Bagian scan raport legalisasi  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_raport')); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end scan raport legalisasi -->
                                        <?php else : ?>
                                        <div class="mb20">
                                            <label for="scan_proposal" class="form-label bold">Scan Proposal Bantuan
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file :
                                                    (nik)_scan_proposal<strong>.pdf</strong></span>
                                            </label>
                                            <input required id="proposal"
                                                class="form-control scan-lampiran <?= ($validation->hasError('scan_proposal')) ? 'is-invalid' : ''; ?>"
                                                <?= ($file != null) ? 'disabled value="' . $file['proposal'] . '"' : ''; ?>
                                                name="scan_proposal"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" data-allowed-file-extensions="pdf"
                                                data-height="100" data-max-file-size="2M" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="proposal-invalid">
                                                <?= ($validation->getError('scan_proposal') == '') ? 'Bagian scan proposal wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : $validation->getError('scan_proposal'); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end scan_proposal -->
                                        <?php endif ?>


                                        <div class="mb20">
                                            <label for="scan_sktm" class="form-label bold">Scan Surat Keterangan Tidak
                                                Mampu <span class="fs14 lightgrey ms-2"> Contoh penamaan file :
                                                    (nik)_scan_sktm<strong>.pdf</strong></span>
                                            </label>
                                            <input
                                                <?= ($file != null) ? 'disabled value="' . $file['sktm'] . '"' : ''; ?>
                                                required id="sktm"
                                                class="form-control  scan-lampiran <?= ($validation->hasError('scan_sktm')) ? 'is-invalid' : ''; ?>"
                                                name="scan_sktm" accept="application/pdf"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                data-allowed-file-extensions="pdf" data-height="100"
                                                data-max-file-size="2M" />
                                            <?php if ($file == null) : ?>
                                            <div class="invalid-feedback" id="sktm-invalid">
                                                <?= ($validation->getError('scan_sktm') == '') ? 'Bagian scan ktm  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_sktm')); ?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                        <!-- end SKTM -->
                                    </div>
                                </div>
                                <!-- end lampiran dokumen -->
                                <!-- alert lampiran -->
                                <?php if (session()->getFlashdata('pesan-gagal-lampiran-pendaftar')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('pesan-gagal-lampiran-pendaftar'); ?>
                                </div>
                                <?php endif; ?>
                                <!-- end alert lampiran -->
                                <!-- SAVE  Modal -->
                                <div class="modal fade" id="save_modal_lampiran" tabindex="-1"
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
                                                <button type="submit" id="btn_submit_lampiran" class="btn btn-success fw-normal">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php endif ?>