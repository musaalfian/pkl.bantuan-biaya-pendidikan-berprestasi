<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>

<!-- Form pendaftaran -->
<div class="bg-abu py40">
    <div class="container form__calon">
        <?php if ($file == null) : ?>

            <form action="<?= base_url(); ?>/calon_mhs/simpan_tambah_lampiran_calon_mhs/<?= $identitas['no_induk']; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <h3 class="mb20 biru fw-bold">Form Pendaftaran Beasiswa <span class="orange"> Calon Mahasiswa</span></h3>
                <!-- alert lampiran -->
                <?php if (session()->getFlashdata('pesan-tambah-lampiran-pendaftar')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan-tambah-lampiran-pendaftar'); ?>
                    </div>
                <?php endif; ?>
                <!-- end alert lampiran -->
                <!-- prestasi -->
                <h3 class="mb20">D. Prestasi
                    <span class="text-abu">
                        (Dapat mengupload maksimal 3 prestasi)
                    </span>
                </h3>
                <p class="bold p20" style="color: red">
                    *Semua file di upload dan ukuran file tidak boleh lebih dari 2MB
                </p>
                <div class="alert alert-primary">
                    <p class="">
                        Prestasi antara lain : prestasi akademik, non akademik,
                        peserta lomba perorangan, peserta lomba kelompok, surat
                        keterangan tahfidz / lulus tahfidz Al Quran dengan minimal 5
                        juz, nilai ujian sekolah, sertifikat bahasa inggris atau
                        bahasa arab yang masih berlaku
                    </p>
                </div>
                <?php $i = 1; ?>
                <div class="pb40">
                    <?php for ($i = 1; $i <= 3; $i++) : ?>
                        <div class="row" id="prestasi_<?= $i; ?>">
                            <!-- file prestasi -->
                            <div class="col-6 col-sm-2">
                                <div class="mb20">
                                    <label for="scan_prestasi_<?= $i; ?>" class="form-label">Scan Prestasi
                                        <?= ($i == 1) ? '<span class="required-label">*</span>' : ''; ?>
                                    </label>
                                    <input <?= ($i == 1) ? 'required' : ''; ?> id="file_prestasi_<?= $i; ?>" class="form-control  <?= ($validation->hasError('scan_prestasi_' . $i)) ? 'is-invalid' : ''; ?>" value="<?= old('scan_prestasi_' . $i); ?>" name="scan_prestasi_<?= $i; ?>" type="file" accept="application/pdf" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('scan_prestasi_' . $i) == '') ? 'Bagian scan prestasi wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_prestasi_' . $i));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end file prestasi -->
                            <div class="col-6 col-sm-2">
                                <div class="mb20">
                                    <label for="nama_prestasi_<?= $i; ?>" class="form-label">Nama Prestasi
                                        <?= ($i == 1) ? '<span class="required-label">*</span>' : ''; ?></label>
                                    <input <?= ($i == 1) ? 'required' : ''; ?> type="text" id="nama_prestasi_<?= $i; ?>" class="form-control <?= ($validation->hasError('nama_prestasi' . $i)) ? 'is-invalid' : ''; ?>" value="<?= old('nama_prestasi' . $i); ?>" name="nama_prestasi_<?= $i; ?>" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('nama_prestasi' . $i) == '') ? 'Bagian
                                nama prestasi wajib diisi' : str_replace(
                                            '_',
                                            ' ',
                                            $validation->getError('nama_prestasi' . $i)
                                        ); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end nama prestasi -->
                            <div class="col-6 col-sm-2">
                                <div class="mb20">
                                    <label for="kategori_<?= $i; ?>" class="form-label">Kategori Prestasi
                                        <?= ($i == 1) ? '<span class="required-label">*</span>' : ''; ?></label>
                                    <select <?= ($i == 1) ? 'required' : ''; ?> id="kategori_<?= $i; ?>" class="form-select <?= ($validation->hasError('kategori_' . $i)) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="kategori_<?= $i; ?>" id="kategori_<?= $i; ?>">
                                        <?php foreach ($kategori as $data_kategori) : ?>
                                            <option hidden selected></option>
                                            <option onchange="kategori_prestasi()" <?php
                                                                                    if (old('kategori_' . $i) == $data_kategori) {
                                                                                        echo 'selected';
                                                                                    } ?> value="<?= $data_kategori; ?>">
                                                <?= ucfirst($data_kategori); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('kategori_' . $i) == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('kategori_' . $i)); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end kategori -->
                            <div class="col-6 col-sm-2">
                                <div class="mb20">
                                    <label for="tingkat_<?= $i; ?>" class="form-label">Tingkat Prestasi
                                        <?= ($i == 1) ? '<span class="required-label">*</span>' : ''; ?></label>
                                    <select class="form-select <?= ($validation->hasError('tingkat_' . $i)) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="tingkat_<?= $i; ?>" id="tingkat_<?= $i; ?>">
                                        <option selected></option>
                                        <?php foreach ($tingkat as $data_tingkat) : ?>
                                            <option <?php
                                                    if (old('tingkat_' . $i) == $data_tingkat) {
                                                        echo 'selected';
                                                    } ?> value="<?= $data_tingkat; ?>">
                                                <?= ucfirst($data_tingkat); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- end tingkat prestasi -->
                            </div>
                            <!-- end tingkat -->
                            <div class="col-6 col-sm-1">
                                <div class="mb20">
                                    <label for="juara_<?= $i; ?>" class="form-label">Juara
                                        <?= ($i == 1) ? '<span class="required-label">*</span>' : ''; ?>
                                    </label>
                                    <select class="form-select <?= ($validation->hasError('juara_' . $i)) ? 'is-invalid' : ''; ?>" aria-label="Default select example" id="juara_<?= $i; ?>" name="juara_<?= $i; ?>">
                                        <option selected></option>
                                        <?php foreach ($juara as $data_juara) : ?>
                                            <option <?php
                                                    if (old('juara_' . $i) == $data_juara) {
                                                        echo 'selected';
                                                    } ?> value="<?= $data_juara; ?>">
                                                <?= ucfirst($data_juara); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- end Juara -->
                            </div>
                            <!-- end juara -->
                            <div class="col-6 col-sm-2">
                                <div class="mb20">
                                    <label for="tahun_prestasi_<?= $i; ?>" class="form-label">Tahun <span class="required-label">*</span>
                                    </label>
                                    <input <?= ($i == 1) ? 'required' : ''; ?> type="number" id="tahun_prestasi_<?= $i; ?>" class="form-control <?= ($validation->hasError('tahun_prestasi_' . $i)) ? 'is-invalid' : ''; ?>" value="<?= old('tahun_prestasi_' . $i); ?>" name="tahun_prestasi_<?= $i; ?>" placeholder="" min="2010" max="2022" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('tahun_prestasi_' . $i) == '') ? 'Bagian
                                tahun prestasi ' . $i . ' wajib diisi' : str_replace(
                                            '_',
                                            ' ',
                                            $validation->getError('tahun_prestasi_' . $i)
                                        ); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end tahun_prestasi -->
                            <!-- end tahun prestasi -->
                            <div class="col-6 col-sm-1">
                                <div class="mb20">
                                    <?php if ($i != 3) : ?>
                                        <label for="juara_<?= $i; ?>" id="label-tambah-<?= $i; ?>" class="form-label">Tambah
                                        </label>
                                        <button type="button" id="icon-tambah-<?= $i; ?>" data-bs-toggle="modal" data-bs-target="#prestasi_<?= $i; ?>_modal" class="btn ">
                                            <i class="fas fa-plus-circle text-center " style="font-size: 18px;"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- end tambah prestasi -->
                        </div>
                        <!-- Tambah Prestasi  Modal -->
                        <div class="modal fade" id="prestasi_<?= $i; ?>_modal" tabindex="-1" aria-labelledby="prestasiModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="prestasiModalLabel">
                                            Yakin ingin menambah data prestasi?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Pastikan data prestasi sebelumnya sudah diisi.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn_orange" data-bs-dismiss="modal">
                                            Batal
                                        </button>
                                        <a class="btn btn-primary" onclick="tambah_prestasi_<?= $i + 1; ?>()" data-bs-dismiss="modal">Tambah</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
                <!-- end prestasi -->
                <h3 class="mb20">E. Lampiran Dokumen</h3>
                <p>Sistematika proposal bantuan biaya pendidikan : <a href="<?= base_url(); ?>/assets/informasi/file/Sistematika Proposal.pdf">Unduh disini</a> </p>

                <p class="bold p20" style="color: red">
                    *Semua file di upload dan ukuran file tidak boleh lebih dari 2MB
                </p>
                <div class="row pb40">
                    <div class="col-12 col-md-6">
                        <div class="mb20">
                            <label for="scan_kk" class="form-label">Scan Kartu Keluarga (KK)<span style="color: red; font-size: 12px;">Format file .pdf</span></label>
                            <small style="color: gray">Format nama file :
                                (no induk)_scan_kk, Contoh: 240601191_scan_kk</small>
                            <input required id="kk" class="form-control <?= ($validation->hasError('scan_kk')) ? 'is-invalid' : ''; ?>" value="<?= old('scan_kk'); ?>" name="scan_kk" type="file" accept="application/pdf" />
                            <div class="invalid-feedback">
                                <?= ($validation->getError('scan_kk') == '') ? 'Bagian scan KK wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_kk')); ?>
                            </div>
                        </div>
                        <!-- end scan KK -->
                        <div class="mb20">
                            <label for="scan_ktp" class="form-label">Scan Kartu Tanda Penduduk (KTP)
                                <span style="color: red; font-size: 12px;">Format file .pdf</span></label>
                            <small style="color: gray">Format nama file :
                                (no induk)_scan_ktp, Contoh: 240601191_scan_ktp</small>
                            <input required id="ktp" class="form-control <?= ($validation->hasError('scan_ktp')) ? 'is-invalid' : ''; ?>" value="<?= old('scan_ktp'); ?>" name="scan_ktp" type="file" accept="application/pdf" />
                            <div class="invalid-feedback">
                                <?= ($validation->getError('scan_ktp') == '') ? 'Bagian scan ktp  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_ktp')); ?>
                            </div>
                        </div>
                        <!-- end scan KTP -->
                        <div class="mb20">
                            <label for="scan_kartu_pelajar" class="form-label">Scan Kartu Pelajar
                                <span style="color: red; font-size: 12px;">Format file .pdf</span></label>
                            <small style="color: gray">Format nama file :
                                (no induk)_scan_kartu_pelajar, Contoh: 240601191_scan_kartu_pelajar</small>
                            <input required id="kartu_pelajar" class="form-control <?= ($validation->hasError('scan_kartu_pelajar')) ? 'is-invalid' : ''; ?>" value="<?= old('scan_kartu_pelajar'); ?>" name="scan_kartu_pelajar" type="file" accept="application/pdf" />
                            <div class="invalid-feedback">
                                <?= ($validation->getError('scan_kartu_pelajar') == '') ? 'Bagian scan kartu pelajar  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_kartu_pelajar')); ?>
                            </div>
                        </div>
                        <!-- end scan Kartu pelajar -->
                        <div class="mb20">
                            <label for="scan_diterima_pt" class="form-label">Scan Keterangan Diterima Perguruan Tinggi
                                <span style="color: red; font-size: 12px;">Format file .pdf</span></label>
                            <small style="color: gray">Format nama file :
                                (no induk)_scan_diterima_PT, Contoh: 240601191_scan_diterima_PT</small>
                            <input required id="diterima_pt" class="form-control <?= ($validation->hasError('scan_diterima_pt')) ? 'is-invalid' : ''; ?>" value="<?= old('scan_diterima_pt'); ?>" name="scan_diterima_pt" type="file" accept="application/pdf" />
                            <div class="invalid-feedback">
                                <?= ($validation->getError('scan_diterima_pt') == '') ? 'Bagian scan diterima perguruan tinggi wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : $validation->getError('scan_diterima_pt'); ?>
                            </div>
                        </div>
                        <!-- end scan diterima pt -->
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb20">
                            <label for="scan_pas_foto" class="form-label">Upload Foto Berwarna
                                <span style="color: red; font-size: 12px;">Format file .jpg, jpeg, .png</span></label>
                            <small style="color: gray">Format nama file :
                                (no induk)_pas_foto, Contoh: 240601191_pas_foto</small>
                            <input required id="pas_foto" class="form-control <?= ($validation->hasError('scan_pas_foto')) ? 'is-invalid' : ''; ?> lampiran-foto" data-allowed-file-extensions="jpg jpeg png" data-height="100" data-max-file-size="2M" value=" <?= old('scan_pas_foto'); ?>" name="scan_pas_foto" type="file" accept="image/*" />
                            <div class="invalid-feedback">
                                <?= ($validation->getError('scan_pas_foto') == '') ? 'Bagian scan pas foto  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_pas_foto')); ?>
                            </div>
                        </div>
                        <!-- end scan_pas_foto -->
                        <div class="mb20">
                            <label for="scan_sktm" class="form-label">Scan Surat Keterangan Tidak Mampu
                                <span style="color: red; font-size: 12px;">Format file .pdf</span></label>
                            <small style="color: gray">Format nama file :
                                (no induk)_scan_sktm, Contoh: 240601191_scan_sktm</small>
                            <p class="biru mb20">
                                RTSM/RTM, PKH, KIP, atau Surat desa yatim/piatu
                            </p>
                            <input required id="sktm" class="form-control <?= ($validation->hasError('scan_sktm')) ? 'is-invalid' : ''; ?>" value="<?= old('scan_sktm'); ?>" name="scan_sktm" accept="application/pdf" type="file" />
                            <div class="invalid-feedback">
                                <?= ($validation->getError('scan_sktm') == '') ? 'Bagian scan ktm  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_sktm')); ?>
                            </div>
                        </div>
                        <!-- end SKTM -->
                        <div class="mb20">
                            <label for="scan_proposal" class="form-label">Scan Proposal Bantuan
                                <span style="color: red; font-size: 12px;">Format file .pdf</span></label>
                            <small style="color: gray">Format nama file :
                                (no induk)_scan_proposal, Contoh: 240601191_scan_proposal</small>
                            <input required id="proposal" class="form-control <?= ($validation->hasError('scan_proposal')) ? 'is-invalid' : ''; ?>" value="<?= old('scan_proposal'); ?>" name="scan_proposal" type="file" accept="application/pdf" />
                            <div class="invalid-feedback">
                                <?= ($validation->getError('scan_proposal') == '') ? 'Bagian scan_proposal wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : $validation->getError('scan_proposal'); ?>
                            </div>
                        </div>
                        <!-- end scan_proposal -->
                    </div>
                </div>
                <!-- alert lampiran -->
                <?php if (session()->getFlashdata('pesan-gagal-lampiran-pendaftar')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('pesan-gagal-lampiran-pendaftar'); ?>
                    </div>
                <?php endif; ?>
                <!-- end alert lampiran -->
                <!-- end lampiran dokumen -->
                <div class="row pb40">
                    <div class="col-12 text-end">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#kirim_modal" class="btn btn-primary fs18 px-4 py-2">
                            Simpan
                        </button>
                    </div>
                </div>
                <!-- SAVE  Modal -->
                <div class="modal fade" id="kirim_modal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="saveModalLabel">
                                    Yakin ingin mengirim data?
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Pastikan data yang anda masukkan sudah benar.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn_orange" data-bs-dismiss="modal">
                                    Batal
                                </button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php else : ?>
            <form action="<?= base_url(); ?>/calon_mhs/simpan_formulir_pendaftaran/<?= $identitas['no_induk']; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <h3 class="mb20 fs20">F. Lampiran Formulir Pendaftaran</h3>
                <div class="alert alert-primary">
                    <ol>
                        <li>Download formulir pendaftaran dibawah ini</li>
                        <li>Ditandatangani oleh orang tua/wali</li>
                        <li>Unggah formulir pendaftaran yang sudah ditandatangani pada kolom unggahan formulir pendaftaran
                        </li>
                    </ol>
                </div>
                <!-- <button class="btn btn-primary mx-3"> -->
                <a style="text-decoration: none;" class="mb-2 " href="<?= base_url(); ?>/home_pendaftar/download_detail_pendaftar/<?= $identitas['no_induk']; ?>" target="_blank">
                    Download formulir pendaftaran disini
                </a>
                <div class="mb-3"></div>
                <!-- </button> -->
                <p class="bold p20" style="color: red">
                    Unggah formulir pendaftaran yang telah ditandatangani oleh orang tua dan ukuran file tidak boleh lebih
                    dari
                    8MB
                </p>
                <div class="mb20">
                    <label for="scan_formulir_pendaftaran" class="form-label">Formulir Pendaftaran(yang telah ditandatangani
                        oleh orang tua)<span style="color: red; font-size: 12px;">Format file .pdf</span></label>
                    <small style="color: gray">Format nama file :
                        (no induk)_scan_formulir_pendaftaran<span class="fw-bold">.pdf</span></small>
                    <input required <?= ($file['formulir_pendaftaran'] != null) ? 'disabled' : ''; ?> id="formulir_pendaftaran" class="form-control <?= ($validation->hasError('scan_formulir_pendaftaran')) ? 'is-invalid' : ''; ?>" value="<?= ($file['formulir_pendaftaran'] != null) ? $file['formulir_pendaftaran'] : old('scan_formulir_pendaftaran'); ?>" name="scan_formulir_pendaftaran" type="<?= ($file['formulir_pendaftaran'] != null) ? 'text' : 'file'; ?>" accept="application/pdf" />
                    <div class="invalid-feedback">
                        <?= ($validation->getError('scan_formulir_pendaftaran') == '') ? 'Bagian scan formulir pendaftaran wajib diisi dan ukuran file tidak boleh lebih dari 8MB' : str_replace('_', ' ', $validation->getError('scan_formulir_pendaftaran')); ?>
                    </div>
                </div>
                <!-- end scan Kartu pelajar -->
                <?php if ($file['formulir_pendaftaran'] == null) : ?>
                    <div class="row pb40">
                        <div class="col-12 text-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#kirim_modal" class="btn btn-success fs16 px-4 py-2">
                                Simpan
                            </button>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row pb40">
                        <div class="col-12 text-end">
                            <a href="/pendaftaran/review_pendaftaran/<?= $identitas['no_induk']; ?>">
                                <button type="button" class="btn btn-primary fs16 px-4 py-2">
                                    Selanjutnya
                                </button>
                            </a>
                        </div>
                    </div>
                <?php endif ?>
                <!-- SAVE  Modal -->
                <div class="modal fade" id="kirim_modal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="saveModalLabel">
                                    Yakin ingin mengirim data?
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Pastikan data yang anda masukkan sudah benar.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn_orange" data-bs-dismiss="modal">
                                    Batal
                                </button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif ?>
    </div>
</div>
<script>
    // dropify upload foto
    $(".lampiran-foto").dropify({
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
<!-- End form pendaftaran -->
<?= $this->endSection(); ?>