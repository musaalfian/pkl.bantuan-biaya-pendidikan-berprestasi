<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>
<!-- Form pendaftaran -->
<div class="pendaftaran py-5">
    <div id="smartwizard" class="">
        <ul class="nav">
            <li class="nav-item">
                <div class="tahap"></div>
                <a class="nav-link fw-bold fs14" href="#step-1" id="1">
                    Tahap 1 <br>
                    <span>Lengkapi Identitas Diri </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold fs14" href="#step-2" id="2">
                    Tahap 2 <br>
                    <span>Lengkapi Data Orang Tua</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold fs14" href="#step-3" id="3">
                    Tahap 3 <br>
                    <span>Lengkapi Dokumen</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold fs14" href="#step-4">
                    Tahap 4 <br>
                    <span>Lengkapi Prestasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold fs14" href="#step-5">
                    Tahap 5 <br>
                    <span>Cek Data</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                <div class="container">
                    <form action="<?= base_url(); ?>/siswa/simpan_tambah_identitas_siswa" method="post"
                        class="needs-validation" novalidate>
                        <h3 class="mb20 biru fw-bold">Form Pendaftaran Beasiswa <span class="orange">SMA/SMK/MA
                                Sederajat</span>
                        </h3>
                        <!-- alert identitas -->
                        <?php if (session()->getFlashdata('pesan-tambah-identitas-siswa')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan-tambah-identitas-siswa'); ?>
                        </div>
                        <?php endif; ?>
                        <!-- end alert identitas -->
                        <div class="d-flex justify-content-between align-content-center mb20">
                            <h3 class="fs20">A. Identitas Diri</h3>
                            <!-- Btn Ubah data -->
                        </div>
                        <div class="row mt20 mb40">
                            <div class="col-12 col-md-6">
                                <div class="mb20">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap <span
                                            class="required-label"></span></label>
                                    <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text"
                                        class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['nama_lengkap'] : old('nama_lengkap'); ?>"
                                        name="nama_lengkap" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('nama_lengkap') == '') ? 'Bagian nama lengkap  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_lengkap')); ?>
                                    </div>
                                </div>
                                <!-- end nama lengkap -->
                                <div class="mb20">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                                            class="required-label"></span>
                                    </label>
                                    <!-- radio button opsi jenis kelamin radio -->
                                    <!-- <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                    class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>"
                                    aria-label="Default select example" name="jenis_kelamin">
                                    <option hidden></option> -->
                                    <div class="form-check">
                                        <input <?= ($identitas != null) ? 'disabled' : ''; ?> required type="radio"
                                            class="form-check-input" name="jenis_kelamin" id="L"
                                            <?php if ($identitas != null) {
                                                                                                                                                                                if ($identitas['jenis_kelamin'] == 'L') {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                };
                                                                                                                                                                            } else {
                                                                                                                                                                                if (old('jenis_kelamin') == 'L') {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                }
                                                                                                                                                                            } ?>
                                            value="L">
                                        <label class="form-check-label" for="L">
                                            Laki - laki
                                        </label>
                                        <input <?= ($identitas != null) ? 'disabled' : ''; ?> required type="radio"
                                            class="form-check-input" name="jenis_kelamin" id="P"
                                            <?php if ($identitas != null) {
                                                                                                                                                                                if ($identitas['jenis_kelamin'] == 'P') {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                };
                                                                                                                                                                            } else {
                                                                                                                                                                                if (old('jenis_kelamin') == 'P') {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                }
                                                                                                                                                                            } ?>
                                            value="P">
                                        <label class="form-check-label" for="P">
                                            Perempuan
                                        </label>
                                        <!-- </select> -->
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('jenis_kelamin') == '') ? 'Bagian jenis kelamin  wajib diisi' : str_replace('_', ' ', $validation->getError('jenis_kelamin')) ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- end jenis kelamin -->
                                <div class="mb20">
                                    <label for="no_induk" class="form-label">NIK <span
                                            class="required-label"></span></label>
                                    <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number" min="0"
                                        max="9999999999999999"
                                        class="form-control <?= ($validation->hasError('no_induk')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['no_induk'] : old('no_induk'); ?>"
                                        name="no_induk" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('no_induk') == '') ? 'Bagian NIK  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk')) ?>
                                    </div>
                                </div>
                                <!-- end NIK -->
                                <div class="mb20">
                                    <label for="no_induk_pelajar" class="form-label">NISN <span
                                            class="required-label"></span></label>
                                    <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text"
                                        maxlength="25"
                                        class="form-control <?= ($validation->hasError('no_induk_pelajar')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['no_induk_pelajar'] : old('no_induk_pelajar'); ?>"
                                        name="no_induk_pelajar" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('no_induk_pelajar') == '') ? 'Bagian NIS/NISN  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk_pelajar')) ?>
                                    </div>
                                </div>
                                <!-- end NISN -->
                                <div class="mb20">
                                    <label for="ttl" class="form-label">Tempat, Tanggal Lahir
                                        <span class="required-label"> *Contoh : Batang, 19 Agustus 2000</span></label>
                                    <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text"
                                        class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['ttl'] : old('ttl'); ?>" name="ttl"
                                        placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('ttl') == '') ? 'Bagian tempat, tanggal lahir  wajib diisi' : str_replace('_', ' ', $validation->getError('ttl')) ?>
                                    </div>
                                </div>
                                <!-- end Tempat, Tanggal Lahir -->
                                <div class="mb20">
                                    <label for="agama" class="form-label">Agama <span
                                            class="required-label"></span></label>
                                    <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                        class="form-select <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="agama">
                                        <option selected hidden></option>
                                        <?php foreach ($agama as $agama) : ?>
                                        <option <?php if ($identitas != null) {
                                                        if ($identitas['id_agama'] == $agama['id_agama']) {
                                                            echo 'selected';
                                                        };
                                                    } else {
                                                        if (old('agama') == $agama['id_agama']) {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="<?= $agama['id_agama']; ?>">
                                            <?= $agama['nama_agama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('agama') == '') ? 'Bagian agama wajib diisi' : str_replace('_', ' ', $validation->getError('agama')) ?>
                                    </div>
                                </div>
                                <!-- end agama -->
                                <div class="mb20">
                                    <label for="anak_ke" class="form-label">Anak Ke <span
                                            class="required-label"></span></label>
                                    <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number"
                                        class="form-control <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['anak_ke'] : old('anak_ke'); ?>"
                                        name="anak_ke" min="1" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('anak_ke') == '') ? 'Bagian anak ke  wajib diisi' : str_replace('_', ' ', $validation->getError('anak_ke')); ?>
                                    </div>
                                </div>
                                <!-- end anak ke -->
                                <div class="mb20 ">
                                    <label for="pernah_menerima_bantuan" class="form-label">Apakah Calon Penerima
                                        Beasiswa Pernah
                                        Menerima Bantuan?
                                        <span class="required-label"></span></label>
                                    <!-- radio button -->
                                    <!-- <select required id="pernah_menerima_bantuan" <?= ($identitas != null) ? 'disabled' : ''; ?>
                                    class="form-select <?= ($validation->hasError('pernah_menerima_bantuan')) ? 'is-invalid' : ''; ?>"
                                    aria-label="Default select example" name="pernah_menerima_bantuan">--
                                    <option selected hidden></option> -->
                                    <div class="form-check">

                                        <?php foreach ($opsional as $opsional) : ?>
                                        <input required class="form-check-input"
                                            <?= ($identitas != null) ? 'disabled' : ''; ?> type="radio"
                                            name="pernah_menerima_bantuan"
                                            id="pernah_menerima_bantuan_<?= $opsional; ?>"
                                            <?php if ($identitas != null) {
                                                                                                                                                                                                                                    if ($identitas['pernah_menerima_bantuan'] == $opsional) {
                                                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                                                    };
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    if (old('pernah_menerima_bantuan') == $opsional) {
                                                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                } ?>
                                            value="<?= $opsional; ?>">
                                        <label class="form-check-label" for="pernah_menerima_bantuan_<?= $opsional; ?>">
                                            <?= ucfirst($opsional); ?>
                                        </label>
                                        <?php endforeach; ?>
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('pernah_menerima_bantuan') == '') ? 'Bagian pernah menerima bantuan  wajib diisi' : str_replace('_', ' ', $validation->getError('pernah_menerima_bantuan')); ?>
                                        </div>
                                    </div>

                                    <!-- </select> -->
                                </div>
                                <!-- end pernah menerima bantuan -->
                                <div class="mb20">
                                    <label for="menerima_bantuan_dari" class="form-label">Jika Ya, Menerima Bantuan
                                        Dari</label>
                                    <input required id="menerima_bantuan_dari"
                                        <?= ($identitas != null) ? 'disabled' : ''; ?> id="menerima_bantuan_dari"
                                        type="text" maxlength="16"
                                        class="form-control <?= ($validation->hasError('menerima_bantuan_dari')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['menerima_bantuan_dari'] : old('menerima_bantuan_dari'); ?>"
                                        name="menerima_bantuan_dari" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('menerima_bantuan_dari') == '') ? '' : str_replace('_', ' ', $validation->getError('menerima_bantuan_dari')) ?>
                                    </div>
                                </div>
                                <!-- end menerima_bantuan_dari -->
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb20">
                                    <label for="no_telepon" class="form-label">Nomor Telepon <span
                                            class="required-label"></span></label>
                                    <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number" min="0"
                                        max="999999999999999"
                                        class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['no_telepon'] : old('no_telepon'); ?>"
                                        name="no_telepon" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('no_telepon') == '') ? 'Bagian no telepon  wajib diisi dan kurang dari 15 angka' : str_replace('_', ' ', $validation->getError('no_telepon')) ?>
                                    </div>
                                </div>
                                <!-- end Nomer Telepon -->
                                <div class="alamat mb20">
                                    <label for="alamat_rumah" class="form-label">Alamat Rumah <span
                                            class="required-label"></span></label>
                                    <small class="red"> Contoh : alamat berisi dukuh, rt, rw, desa, dan jalan</small>

                                    <textarea required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                        class="form-control mb-2 <?= ($validation->hasError('alamat_rumah')) ? 'is-invalid' : ''; ?>"
                                        name="alamat_rumah" id="alamat_rumah"
                                        rows="4"><?= ($identitas != null) ? $identitas['alamat_rumah'] : old('alamat_rumah'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('alamat_rumah') == '') ? 'Bagian alamat rumah  wajib diisi' : $validation->getError('alamat_rumah'); ?>
                                    </div>
                                </div>
                                <!-- end alamat -->
                                <div class="mb20">
                                    <label for="kecamatan" class="form-label">Kecamatan <span
                                            class="required-label"></span></label>
                                    <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                        class="form-select <?= ($validation->hasError('kecamatan')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="kecamatan">
                                        <option value="" selected hidden></option>
                                        <?php foreach ($kecamatan as $kecamatan) : ?>
                                        <option <?php if ($identitas != null) {
                                                        if ($identitas['id_kecamatan'] == $kecamatan['id_kecamatan']) {
                                                            echo 'selected';
                                                        };
                                                    } else {
                                                        if (old('kecamatan') == $kecamatan['id_kecamatan']) {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="<?= $kecamatan['id_kecamatan']; ?>">
                                            <?= ucfirst(strtolower($kecamatan['nama_kecamatan'])); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('kecamatan') == '') ? 'Bagian kecamatan  wajib diisi' : $validation->getError('kecamatan'); ?>
                                    </div>
                                </div>
                                <!-- end kecamatan -->
                                <div class="mb20">
                                    <label for="jarak_sekolah" class="form-label">Jarak dari Rumah ke Sekolah (Km)
                                        <span class="required-label"></span></label>
                                    <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number"
                                        class="form-control <?= ($validation->hasError('jarak_sekolah')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['jarak_sekolah'] : old('jarak_sekolah'); ?>"
                                        name="jarak_sekolah" min="0" step=".1" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('jarak_sekolah') == '') ? 'Bagian jarak sekolah  wajib diisi' : str_replace('_', ' ', $validation->getError('jarak_rumah')) ?>
                                    </div>
                                </div>
                                <!-- end Jarak dari Rumah ke Sekolah -->
                                <div class="mb20">
                                    <label for="transportasi" class="form-label">Transportasi Siswa ke Sekolah
                                        <span class="required-label"></span></label>
                                    <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                        class="form-select <?= ($validation->hasError('transportasi')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="transportasi">
                                        <option selected hidden></option>
                                        <?php foreach ($transportasi as $transportasi) : ?>
                                        <option <?php if ($identitas != null) {
                                                        if ($identitas['id_transportasi'] == $transportasi['id_transportasi']) {
                                                            echo 'selected';
                                                        };
                                                    } else {
                                                        if (old('transportasi') == $transportasi['id_transportasi']) {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="<?= $transportasi['id_transportasi']; ?>">
                                            <?= ucfirst($transportasi['nama_transportasi']); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('transportasi') == '') ? 'Bagian transportasi wajib diisi' : $validation->getError('transportasi'); ?>
                                    </div>
                                </div>
                                <!-- end transportasi -->
                                <div class="mb20">
                                    <label for="sekolah" class="form-label">Sekolah <span
                                            class="required-label"></span></label>
                                    <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                        class="form-select <?= ($validation->hasError('sekolah')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="sekolah">
                                        <option selected hidden></option>
                                        <?php foreach ($sekolah as $sekolah) : ?>
                                        <option <?php if ($identitas != null) {
                                                        if ($identitas['id_sekolah'] == $sekolah['id_sekolah']) {
                                                            echo 'selected';
                                                        };
                                                    } else {
                                                        if (old('sekolah') == $sekolah['id_sekolah']) {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="<?= $sekolah['id_sekolah']; ?>">
                                            <?= $sekolah['nama_sekolah']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('sekolah') == '') ? 'Bagian sekolah wajib diisi' : $validation->getError('sekolah'); ?>
                                    </div>
                                </div>
                                <!-- end sekolah -->
                                <div class="mb20">
                                    <label for="kelas" class="form-label">Kelas <span
                                            class="required-label"></span></label>
                                    <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                        class="form-select <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="kelas">
                                        <option hidden></option>
                                        <option <?php if ($identitas != null) {
                                                    if ($identitas['kelas'] == '10') {
                                                        echo 'selected';
                                                    };
                                                } else {
                                                    if (old('kelas') == '10') {
                                                        echo 'selected';
                                                    }
                                                } ?> value="10">X - Sepuluh</option>
                                        <option <?php if ($identitas != null) {
                                                    if ($identitas['kelas'] == '11') {
                                                        echo 'selected';
                                                    };
                                                } else {
                                                    if (old('kelas') == '11') {
                                                        echo 'selected';
                                                    }
                                                } ?> value="11">XI - Sebelas</option>
                                        <option <?php if ($identitas != null) {
                                                    if ($identitas['kelas'] == '12') {
                                                        echo 'selected';
                                                    };
                                                } else {
                                                    if (old('kelas') == '12') {
                                                        echo 'selected';
                                                    }
                                                } ?> value="12">XII - Dua Belas</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('kelas') == '') ? 'Bagian kelas wajib diisi' : $validation->getError('kelas'); ?>
                                    </div>
                                </div>
                                <!-- end kelas -->
                            </div>
                        </div>
                        <!-- end identitas diri -->
                        <!-- Submit -->
                        <div class="row pb40">
                            <div class="col-12 text-end">
                                <?= ($identitas != null) ? '' : '<button type="button" data-bs-toggle="modal" data-bs-target="#save_modal"
                                class="btn btn-success me-3 px-4 py-2 fs16">
                                Simpan
                            </button>'; ?>

                                <a <?= ($identitas != null) ? 'href="' . base_url() . '/siswa/tambah_keluarga_siswa/' .
                                        $identitas["no_induk"] . '"' : 'data-bs-toggle="modal" data-bs-target="#selanjutnya_modal"' ?>
                                    class="btn btn-primary text-white fs16 px-4
                                py-2" id="nextt">Selanjutnya</a>
                            </div>
                        </div>
                        <!-- end submit -->
                        <!-- SAVE  Modal -->
                        <div class="modal fade" id="save_modal" tabindex="-1" aria-labelledby="saveModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="saveModalLabel">
                                            Yakin ingin menyimpan data?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
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
                        <!-- Selanjutnya  Modal -->
                        <div class="modal fade" id="selanjutnya_modal" tabindex="-1" aria-labelledby="saveModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Anda harus mengisi form dan menyimpannya terlebih dahulu.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn_orange" data-bs-dismiss="modal">
                                            Oke
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                Step 2 Content
            </div>
            <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                Step 3 Content
            </div>
            <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                Step 4 Content
            </div>
            <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                Step 5 Content
            </div>
        </div>

    </div>
</div>
<!-- End form pendaftaran -->
<?php if ($opsional != null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 10%;
}
</style>
<?php else : ?>
<?php endif ?>

<!-- Wizard -->
<script type="text/javascript">
// Inisiailasi button
var divs = $('#nextt');

$(document).ready(function() {
    $('#smartwizard').smartWizard({
        selected: 0, // Initial selected step, 0 = first step
        theme: 'dots', // theme for the wizard, related css need to include for other than default theme
        justified: true, // Nav menu justification. true/false
        darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
        autoAdjustHeight: true, // Automatically adjust content height
        cycleSteps: false, // Allows to cycle the navigation of steps
        backButtonSupport: true, // Enable the back button support
        enableURLhash: true, // Enable selection of the step based on url hash
        transition: {
            animation: 'none', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
            speed: '400', // Transion animation speed
            easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
        },
        anchorSettings: {
            anchorClickable: true, // Enable/Disable anchor navigation
            enableAllAnchors: false, // Activates all anchors clickable all times
            markDoneStep: true, // Add done state on navigation
            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
            enableAnchorOnDoneStep: false // Enable/Disable the done steps navigation
        },
        keyboardSettings: {
            keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
            keyLeft: [37], // Left key code
            keyRight: [39] // Right key code
        },
        lang: { // Language variables for button
            next: 'Selanjutnya',
            previous: 'Sebelumnya'
        },
        errorSteps: [], // Highlight step with errors
        hiddenSteps: [] // Hidden steps
    });
    <?php if ($identitas != null) : ?>
    $('#smartwizard').smartWizard({
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $('<button></button>').text('Finish')
                .addClass('btn btn-success')
                .on('click', function() {
                    alert('Finish button click');
                }),
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [2, 3, 4, 5], // Array Steps disabled
    });
    <?php endif ?>
});

$(".sw-theme-dots>.nav::before").width('50%');
</script>

<?= $this->endSection(); ?>