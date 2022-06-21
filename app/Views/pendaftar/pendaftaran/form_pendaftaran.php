<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>
<!-- Form pendaftaran -->
<div class="pendaftaran py-5 bgwhite">
    <div class="container">
        <h3 class="mb-3 biru fw-bold">Form Pendaftaran Bantuan Biaya Pendidikan
            <?= ($id_peserta == 1) ? 'SMA/SMK/MA Sederajat' : (($id_peserta == 2) ? 'Calon Mahasiswa' : 'Mahasiswa'); ?></span>
        </h3>
        <div id="smartwizard" class="">
            <ul class="nav p-3 bdblue bgwhite br25 mb-3">
                <li class="nav-item">
                    <a class="nav-link fw-bold fs14" href="#step-1" id="1">
                        Tahap 1 <br>
                        <span>Lengkapi Identitas Diri </span>
                    </a>
                </li>
                <li class="nav-item mt-3 mt-md-0">
                    <a class="nav-link fw-bold fs14" href="#step-2" id="2">
                        Tahap 2 <br>
                        <span>Lengkapi Data Orang Tua</span>
                    </a>
                </li>
                <li class="nav-item mt-3 mt-md-0">
                    <a class="nav-link fw-bold fs14" href="#step-3" id="3">
                        Tahap 3 <br>
                        <span>Lengkapi Dokumen</span>
                    </a>
                </li>
                <li class="nav-item mt-3 mt-md-0">
                    <a class="nav-link fw-bold fs14" href="#step-4">
                        Tahap 4 <br>
                        <span>Kirim Ulang Formulir</span>
                    </a>
                </li>
                <li class="nav-item mt-3 mt-md-0">
                    <a class="nav-link fw-bold fs14" href="#step-5">
                        Tahap 5 <br>
                        <span>Cek Data</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content bdblue br25 p-4 p-sm-5">
                <!-- Form identitas -->
                <div id="step-1" class="tab-pane p-0" role="tabpanel" aria-labelledby="step-1">
                    <?php if ($id_peserta == 1) : ?>
                    <form action="<?= base_url(); ?>/siswa/simpan_tambah_identitas_siswa/<?= $id_peserta; ?>"
                        method="post" class="needs-validation" novalidate>

                        <!-- end sma -->
                        <?php elseif ($id_peserta == 2) : ?>
                        <form action="<?= base_url(); ?>/calon_mhs/simpan_tambah_identitas_calon_mhs/<?= $id_peserta ?>"
                            method="post" class="needs-validation" novalidate>
                            <!-- end calon mahasiswa -->
                            <?php else : ?>
                            <form action="<?= base_url(); ?>/mahasiswa/simpan_tambah_identitas_mhs/<?= $id_peserta ?>"
                                method="post" class="needs-validation" novalidate>
                                <h3 class="mb20 biru fw-bold">Form Pendaftaran Beasiswa <span
                                        class="orange">Mahasiswa</span>
                                    <!-- end mahasiswa -->
                                    <?php endif; ?>
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
                                            <label for="nama_lengkap" class="form-label bold">Nama Lengkap <span
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
                                            <label for="jenis_kelamin" class="form-label bold">Jenis Kelamin <span
                                                    class="required-label"></span>
                                            </label>
                                            <div class="form-check kelamin">
                                                <input <?= ($identitas != null) ? 'disabled' : ''; ?> required
                                                    type="radio" class="form-check-input" name="jenis_kelamin" id="L"
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
                                                <label class="form-check-label ms-2" for="L">
                                                    Laki - laki
                                                </label>
                                                <input <?= ($identitas != null) ? 'disabled' : ''; ?> required
                                                    type="radio" class="form-check-input ms-3" name="jenis_kelamin"
                                                    id="P"
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
                                                <label class="form-check-label ms-2" for="P">
                                                    Perempuan
                                                </label>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('jenis_kelamin') == '') ? 'Bagian jenis kelamin  wajib diisi' : str_replace('_', ' ', $validation->getError('jenis_kelamin')) ?>
                                            </div>
                                        </div>
                                        <!-- end jenis kelamin -->
                                        <div class="mb20">
                                            <label for="no_induk" class="form-label bold">NIK <span
                                                    class="required-label"></span></label>
                                            <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number"
                                                min="0" max="9999999999999999"
                                                class="form-control <?= ($validation->hasError('no_induk')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($identitas != null) ? $identitas['no_induk'] : old('no_induk'); ?>"
                                                name="no_induk" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('no_induk') == '') ? 'Bagian NIK  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk')) ?>
                                            </div>
                                        </div>
                                        <!-- end NIK -->
                                        <div class="mb20">
                                            <label for="ttl" class="form-label bold">Tempat, Tanggal Lahir
                                                <span class="fs14 lightgrey ms-2"> Contoh : Batang, 19 Agustus
                                                    2000</span></label>
                                            <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text"
                                                class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($identitas != null) ? $identitas['ttl'] : old('ttl'); ?>"
                                                name="ttl" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('ttl') == '') ? 'Bagian tempat, tanggal lahir  wajib diisi' : str_replace('_', ' ', $validation->getError('ttl')) ?>
                                            </div>
                                        </div>
                                        <!-- end Tempat, Tanggal Lahir -->
                                        <div class="mb20">
                                            <label for="agama" class="form-label bold">Agama <span
                                                    class="required-label"></span></label>
                                            <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                                class="form-select <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>"
                                                aria-label="Default select example" name="agama">
                                                <option selected hidden></option>
                                                <?php foreach ($agama as $agama_pendaftar) : ?>
                                                <option <?php if ($identitas != null) {
                                                                    if ($identitas['id_agama'] == $agama_pendaftar['id_agama']) {
                                                                        echo 'selected';
                                                                    };
                                                                } else {
                                                                    if (old('agama') == $agama_pendaftar['id_agama']) {
                                                                        echo 'selected';
                                                                    }
                                                                } ?> value="<?= $agama_pendaftar['id_agama']; ?>">
                                                    <?= ucfirst($agama_pendaftar['nama_agama']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('agama') == '') ? 'Bagian agama wajib diisi' : str_replace('_', ' ', $validation->getError('agama')) ?>
                                            </div>
                                        </div>
                                        <!-- end agama -->
                                        <?php if ($id_peserta == 1) : ?>
                                        <div class="mb20">
                                            <label for="anak_ke" class="form-label bold">Anak Ke <span
                                                    class="required-label"></span></label>
                                            <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number"
                                                class="form-control <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($identitas != null) ? $identitas['anak_ke'] : old('anak_ke'); ?>"
                                                name="anak_ke" min="1" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('anak_ke') == '') ? 'Bagian anak ke  wajib diisi' : str_replace('_', ' ', $validation->getError('anak_ke')); ?>
                                            </div>
                                        </div>
                                        <?php endif ?>
                                        <!-- end anak ke -->
                                        <div class="alamat mb20">
                                            <label for="alamat_rumah" class="form-label bold">Alamat Rumah <span
                                                    class="fs14 ms-2 lightgrey"> Alamat rumah berisi dukuh, rt, rw,
                                                    desa, dan jalan</span></label>
                                            <textarea required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                                class="form-control mb-2 <?= ($validation->hasError('alamat_rumah')) ? 'is-invalid' : ''; ?>"
                                                name="alamat_rumah" id="alamat_rumah"
                                                rows="1"><?= ($identitas != null) ? $identitas['alamat_rumah'] : old('alamat_rumah'); ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('alamat_rumah') == '') ? 'Bagian alamat rumah  wajib diisi' : $validation->getError('alamat_rumah'); ?>
                                            </div>
                                        </div>
                                        <!-- end alamat -->
                                        <div class="mb20">
                                            <label for="kecamatan" class="form-label bold">Kecamatan <span
                                                    class="required-label"></span></label>
                                            <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                                class="form-select <?= ($validation->hasError('kecamatan')) ? 'is-invalid' : ''; ?>"
                                                aria-label="Default select example" name="kecamatan">
                                                <option value="" selected hidden></option>
                                                <?php foreach ($kecamatan as $kecamatan_pendaftaran) : ?>
                                                <option <?php if ($identitas != null) {
                                                                    if ($identitas['id_kecamatan'] == $kecamatan_pendaftaran['id_kecamatan']) {
                                                                        echo 'selected';
                                                                    };
                                                                } else {
                                                                    if (old('kecamatan') == $kecamatan_pendaftaran['id_kecamatan']) {
                                                                        echo 'selected';
                                                                    }
                                                                } ?>
                                                    value="<?= $kecamatan_pendaftaran['id_kecamatan']; ?>">
                                                    <?= ucfirst(strtolower($kecamatan_pendaftaran['nama_kecamatan'])); ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('kecamatan') == '') ? 'Bagian kecamatan  wajib diisi' : $validation->getError('kecamatan'); ?>
                                            </div>
                                        </div>
                                        <!-- end kecamatan -->
                                        <?php if ($id_peserta == 2 || $id_peserta == 3) : ?>
                                        <div class="mb20">
                                            <label for="no_telepon" class="form-label bold">Nomor Telepon <span
                                                    class="required-label"></span></label>
                                            <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number"
                                                min="0" max="999999999999999"
                                                class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($identitas != null) ? $identitas['no_telepon'] : old('no_telepon'); ?>"
                                                name="no_telepon" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('no_telepon') == '') ? 'Bagian no telepon  wajib diisi dan kurang dari 15 angka' : str_replace('_', ' ', $validation->getError('no_telepon')) ?>
                                            </div>
                                        </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <?php if ($id_peserta == 1) : ?>

                                        <div class="mb20">
                                            <label for="no_telepon" class="form-label bold">Nomor Telepon <span
                                                    class="required-label"></span></label>
                                            <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number"
                                                min="0" max="999999999999999"
                                                class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($identitas != null) ? $identitas['no_telepon'] : old('no_telepon'); ?>"
                                                name="no_telepon" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('no_telepon') == '') ? 'Bagian no telepon  wajib diisi dan kurang dari 15 angka' : str_replace('_', ' ', $validation->getError('no_telepon')) ?>
                                            </div>
                                        </div>
                                        <?php endif ?>

                                        <!-- end Nomer Telepon -->
                                        <?php if ($id_peserta == 1 || $id_peserta == 2) : ?>
                                        <div class="mb20">
                                            <label for="no_induk_pelajar" class="form-label bold">NISN <span
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
                                        <?php else : ?>
                                        <div class="mb20">
                                            <label for="no_induk_pelajar" class="form-label bold">NIM </label>
                                            <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text"
                                                maxlength="25" name="no_induk_pelajar"
                                                class="form-control <?= ($validation->hasError('no_induk_pelajar')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($identitas != null) ? $identitas['no_induk_pelajar'] : old('no_induk_pelajar'); ?>"
                                                name="no_induk_pelajar" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('no_induk_pelajar') == '') ? 'Bagian NIM  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk_pelajar')) ?>
                                            </div>
                                        </div>
                                        <!-- end NIM -->
                                        <?php endif ?>
                                        <?php if ($id_peserta == 1) : ?>
                                        <div class="mb20">
                                            <label for="jarak_sekolah" class="form-label bold">Jarak dari Rumah ke
                                                Sekolah (Km)
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
                                            <label for="transportasi" class="form-label bold">Transportasi Siswa ke
                                                Sekolah
                                                <span class="required-label"></span></label>
                                            <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                                class="form-select <?= ($validation->hasError('transportasi')) ? 'is-invalid' : ''; ?>"
                                                aria-label="Default select example" name="transportasi">
                                                <option selected hidden></option>
                                                <?php foreach ($transportasi as $transportasi_pendaftaran) : ?>
                                                <option <?php if ($identitas != null) {
                                                                        if ($identitas['id_transportasi'] == $transportasi_pendaftaran['id_transportasi']) {
                                                                            echo 'selected';
                                                                        };
                                                                    } else {
                                                                        if (old('transportasi') == $transportasi_pendaftaran['id_transportasi']) {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>
                                                    value="<?= $transportasi_pendaftaran['id_transportasi']; ?>">
                                                    <?= ucfirst($transportasi_pendaftaran['nama_transportasi']); ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('transportasi') == '') ? 'Bagian transportasi wajib diisi' : $validation->getError('transportasi'); ?>
                                            </div>
                                        </div>
                                        <!-- end transportasi -->
                                        <div class="mb20">
                                            <label for="sekolah" class="form-label bold">Sekolah <span
                                                    class="required-label"></span></label>
                                            <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                                class="form-select <?= ($validation->hasError('sekolah')) ? 'is-invalid' : ''; ?>"
                                                aria-label="Default select example" name="sekolah">
                                                <option selected hidden></option>
                                                <?php foreach ($sekolah as $sekolah_pendaftaran) : ?>
                                                <option <?php if ($identitas != null) {
                                                                        if ($identitas['id_sekolah'] == $sekolah_pendaftaran['id_sekolah']) {
                                                                            echo 'selected';
                                                                        };
                                                                    } else {
                                                                        if (old('sekolah') == $sekolah_pendaftaran['id_sekolah']) {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>
                                                    value="<?= $sekolah_pendaftaran['id_sekolah']; ?>">
                                                    <?= $sekolah_pendaftaran['nama_sekolah']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('sekolah') == '') ? 'Bagian sekolah wajib diisi' : $validation->getError('sekolah'); ?>
                                            </div>
                                        </div>
                                        <!-- end sekolah -->
                                        <div class="mb20">
                                            <label for="kelas" class="form-label bold">Kelas <span
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
                                        <?php else : ?>
                                        <div class="mb20">
                                            <label for="nama_pt" class="form-label bold">Nama Perguruan Tinggi
                                            </label>
                                            <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text"
                                                class="form-control <?= ($validation->hasError('nama_pt')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($identitas != null) ? $identitas['nama_pt'] : old('nama_pt'); ?>"
                                                name="nama_pt" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('nama_pt') == '') ? 'Bagian nama perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('nama_pt')); ?>
                                            </div>
                                        </div>
                                        <!-- end nama_pt -->
                                        <div class="mb20">
                                            <label for="akreditasi_pt" class="form-label bold">Akrediktasi Perguruan
                                                Tinggi
                                            </label>
                                            <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                                class="form-select <?= ($validation->hasError('akreditasi_pt')) ? 'is-invalid' : ''; ?>"
                                                aria-label="Default select example" name="akreditasi_pt">
                                                <option selected hidden></option>
                                                <?php foreach ($akreditasi_pt as $akreditasi_pt_pendaftaran) : ?>
                                                <option <?php if ($identitas != null) {
                                                                        if ($identitas['akreditasi_pt'] == $akreditasi_pt_pendaftaran) {
                                                                            echo 'selected';
                                                                        };
                                                                    } else {
                                                                        if (old('akreditasi_pt') == $akreditasi_pt_pendaftaran) {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?> value="<?= $akreditasi_pt_pendaftaran; ?>">
                                                    <?= $akreditasi_pt_pendaftaran; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('akreditasi_pt') == '') ? 'Bagian akreditasi perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('akreditasi_pt')); ?>
                                            </div>
                                        </div>
                                        <!-- end akreditasi_pt -->
                                        <div class="mb20">
                                            <label for="tahun_masuk_pt" class="form-label bold">Tahun Masuk Perguruan
                                                Tinggi
                                            </label>
                                            <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number"
                                                class="form-control <?= ($validation->hasError('tahun_masuk_pt')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($identitas != null) ? $identitas['tahun_masuk_pt'] : old('tahun_masuk_pt'); ?>"
                                                name="tahun_masuk_pt" placeholder="" min="2016" max="2022" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('tahun_masuk_pt') == '') ? 'Bagian tahun masuk perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('tahun_masuk_pt')); ?>
                                            </div>
                                        </div>
                                        <!-- end tahun_masuk_pt -->
                                        <div class="mb20">
                                            <label for="semester_ke" class="form-label bold">Semester ke
                                            </label>
                                            <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                                class="form-select <?= ($validation->hasError('semester_ke')) ? 'is-invalid' : ''; ?>"
                                                aria-label="Default select example" name="semester_ke">
                                                <option selected hidden></option>
                                                <?php foreach ($semester_ke as $semester_ke_pendaftaran) : ?>
                                                <option <?php if ($identitas != null) {
                                                                        if ($identitas['semester_ke'] == $semester_ke_pendaftaran) {
                                                                            echo 'selected';
                                                                        };
                                                                    } else {
                                                                        if (old('semester_ke') == $semester_ke_pendaftaran) {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?> value="<?= $semester_ke_pendaftaran; ?>">
                                                    <?= $semester_ke_pendaftaran; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('semester_ke') == '') ? 'Bagian semester ke wajib diisi' : str_replace('_', ' ', $validation->getError('semester_ke')); ?>
                                            </div>
                                        </div>
                                        <!-- end semester_ke -->
                                        <div class="mb20">
                                            <label for="alamat_pt" class="form-label bold">Alamat Perguruan Tinggi
                                            </label>
                                            <textarea required <?= ($identitas != null) ? 'disabled' : ''; ?>
                                                class="form-control <?= ($validation->hasError('alamat_pt')) ? 'is-invalid' : ''; ?>"
                                                name="alamat_pt" id="alamat_pt"
                                                rows="1"><?= ($identitas != null) ? $identitas['alamat_pt'] : old('alamat_pt'); ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('alamat_pt') == '') ? 'Bagian alamat perguruan tinggi wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_pt')); ?>
                                            </div>
                                        </div>
                                        <!-- end alamat perguruan tinggi-->
                                        <?php endif; ?>
                                        <div class="mb20 ">
                                            <label for="pernah_menerima_bantuan" class="form-label bold">Apakah Calon
                                                Penerima
                                                Beasiswa Pernah
                                                Menerima Bantuan?
                                                <span class="required-label"></span></label>
                                            <!-- radio button -->
                                            <div class="form-check pertanyaan">
                                                <?php foreach ($opsional as $opsional_menerima_bantuan) : ?>
                                                <input required
                                                    class="form-check-input <?= ($opsional_menerima_bantuan == "tidak") ? 'ms-3' : ''; ?>"
                                                    <?= ($identitas != null) ? 'disabled' : ''; ?> type="radio"
                                                    name="pernah_menerima_bantuan"
                                                    id="pernah_menerima_bantuan_<?= $opsional_menerima_bantuan; ?>"
                                                    <?php if ($identitas != null) {
                                                                                                                                                                                                                                                                                                                                if ($identitas['pernah_menerima_bantuan'] == $opsional_menerima_bantuan) {
                                                                                                                                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                                                                                                                                };
                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                if (old('pernah_menerima_bantuan') == $opsional_menerima_bantuan) {
                                                                                                                                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                            } ?>
                                                    value="<?= $opsional_menerima_bantuan; ?>">
                                                <label class="form-check-label"
                                                    for="pernah_menerima_bantuan_<?= $opsional_menerima_bantuan; ?>">
                                                    <?= ucfirst($opsional_menerima_bantuan); ?>
                                                </label>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('pernah_menerima_bantuan') == '') ? 'Bagian pernah menerima bantuan  wajib diisi' : str_replace('_', ' ', $validation->getError('pernah_menerima_bantuan')); ?>
                                            </div>
                                        </div>
                                        <!-- end pernah menerima bantuan -->
                                        <div class="mb20">
                                            <label for="menerima_bantuan_dari" class="form-label bold">Jika Ya, Menerima
                                                Bantuan
                                                Dari</label>
                                            <input required id="menerima_bantuan_dari"
                                                <?= ($identitas != null) ? 'disabled' : ''; ?>
                                                id="menerima_bantuan_dari" type="text" maxlength="16"
                                                class="form-control <?= ($validation->hasError('menerima_bantuan_dari')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($identitas != null) ? $identitas['menerima_bantuan_dari'] : old('menerima_bantuan_dari'); ?>"
                                                name="menerima_bantuan_dari" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('menerima_bantuan_dari') == '') ? '' : str_replace('_', ' ', $validation->getError('menerima_bantuan_dari')) ?>
                                            </div>
                                        </div>
                                        <!-- end menerima_bantuan_dari -->
                                    </div>
                                </div>
                                <!-- end identitas diri -->
                                <!-- SAVE  Modal -->
                                <div class="modal fade" id="save_modal" tabindex="-1" aria-labelledby="saveModalLabel"
                                    aria-hidden="true">
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
                                                <div class="alert alert-danger pesan-gagal" role="alert" style="display:none">
                                                    Terdapat kesalahan masukkan atau data yang anda masukkan tidak sesuai.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary fw-normal"
                                                    data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-success fw-normal">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                </div>
                <!-- End form identitas -->

                <!-- form keluarga -->
                <div id="step-2" class="tab-pane p-0" role="tabpanel" aria-labelledby="step-2">
                    <?php if ($identitas != null) : ?>
                    <?php if ($identitas['id_status_peserta'] == 1) : ?>
                    <form action="<?= base_url(); ?>/siswa/simpan_tambah_keluarga_siswa/<?= $identitas['no_induk']; ?>"
                        method="post" class="needs-validation" novalidate>
                        <!-- end sma -->
                        <?php elseif ($identitas['id_status_peserta'] == 2) : ?>
                        <form
                            action="<?= base_url(); ?>/calon_mhs/simpan_tambah_keluarga_calon_mhs/<?= $identitas['no_induk']; ?>"
                            method="post" class="needs-validation" novalidate>
                            <!-- end calon mahasiswa -->
                            <?php else : ?>
                            <form
                                action="<?= base_url(); ?>/mahasiswa/simpan_tambah_keluarga_mhs/<?= $identitas['no_induk']; ?>"
                                method="post" class="needs-validation" novalidate>
                                <!-- end mahasiswa -->
                                <?php endif; ?>
                                <!-- alert keluarga -->
                                <?php if (session()->getFlashdata('pesan-tambah-keluarga-calon_mhs')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('pesan-tambah-keluarga-calon_mhs'); ?>
                                </div>
                                <?php endif; ?>
                                <!-- end alert keluarga -->
                                <h3 class="mb20 fs20">B. Kondisi Keluarga</h3>
                                <div class="row mb40">
                                    <div class="col-12 col-md-6">
                                        <div class="mb20">
                                            <label for="nama_ayah" class="form-label bold">Nama Ayah / Wali <span
                                                    class="required-label">*</span></label>
                                            <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="text"
                                                class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($keluarga != null) ? $keluarga['nama_ayah'] : old('nama_ayah'); ?>"
                                                name="nama_ayah" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('nama_ayah') == '') ? 'Bagian nama ayah wajib diisi' : str_replace('_', ' ', $validation->getError('nama_ayah')); ?>
                                            </div>
                                        </div>
                                        <!-- end nama ayah -->
                                        <?php if ($identitas['id_status_peserta'] != 1) : ?>
                                        <div class="mb20">
                                            <label for="usia" class="form-label bold">Usia Ayah / Wali <span
                                                    class="required-label">*</span></label>
                                            <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="number"
                                                class="form-control <?= ($validation->hasError('usia_ayah')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($keluarga != null) ? $keluarga['usia_ayah'] : old('usia_ayah'); ?>"
                                                id="usia_ayah" name="usia_ayah" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('usia_ayah') == '') ? 'Bagian usia ayah wajib diisi' : $validation->getError('usia_ayah'); ?>
                                            </div>
                                        </div>
                                        <?php endif ?>
                                        <!-- end usia -->
                                        <div class="mb20">
                                            <label for="pekerjaan_ayah" class="form-label bold">Pekerjaan Ayah / Wali
                                                <span class="required-label">*</span></label>
                                            <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="text"
                                                class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($keluarga != null) ? $keluarga['pekerjaan_ayah'] : old('pekerjaan_ayah'); ?>"
                                                name="pekerjaan_ayah" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('pekerjaan_ayah') == '') ? 'Bagian pekerjaan ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('pekerjaan_ayah')); ?>
                                            </div>
                                        </div>
                                        <!-- end pekerjaan ayah -->
                                        <div class="mb20">
                                            <label for="pendidikan_ayah" class="form-label bold">Pendidikan Terakhir
                                                Ayah /
                                                Wali
                                                <span class="required-label">*</span></label>
                                            <select required <?= ($keluarga != null) ? 'disabled' : ''; ?>
                                                class="form-select <?= ($validation->hasError('pendidikan_ayah')) ? 'is-invalid' : ''; ?>"
                                                aria-label="Default select example" name="pendidikan_ayah">
                                                <option selected hidden></option>
                                                <?php foreach ($pendidikan as $pendidikan_ayah) : ?>
                                                <option <?php if ($keluarga != null) {
                                                                    if ($keluarga['pendidikan_ayah'] == $pendidikan_ayah) {
                                                                        echo 'selected';
                                                                    };
                                                                } else {
                                                                    if (old('pendidikan_ayah') == $pendidikan_ayah) {
                                                                        echo 'selected';
                                                                    }
                                                                } ?> value="<?= $pendidikan_ayah; ?>">
                                                    <?= $pendidikan_ayah; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('pendidikan_terakhir_ayah') == '') ? 'Bagian pendidikan terakhir ayah wajib diisi' : str_replace('_', ' ', $validation->getError('pendidikan_terakhir_ayah')); ?>
                                            </div>
                                        </div>
                                        <!-- end Pendidikan Terakhir Ayah / Wali -->
                                        <div class="mb20">
                                            <label for="penghasilan_ayah" class="form-label bold">Penghasilan per Bulan
                                                Ayah
                                                / Wali
                                                <span class="required-label">* </span></label>
                                            <p>Contoh : 2000000 (tanpa menggunakan titik)</p>
                                            <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="number"
                                                min="0"
                                                class="form-control <?= ($validation->hasError('penghasilan_ayah')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($keluarga != null) ? $keluarga['penghasilan_ayah'] : old('penghasilan_ayah'); ?>"
                                                name="penghasilan_ayah" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('penghasilan_ayah') == '') ? 'Bagian penghasilan ayah wajib diisi' : str_replace('_', ' ', $validation->getError('penghasilan_ayah')); ?>
                                            </div>
                                        </div>
                                        <!-- end Pneghasilan ayah -->
                                        <div class="mb20">
                                            <label for="alamat_ayah" class="form-label bold">Alamat Ayah / Wali
                                                <span class="required-label">*</span></label>
                                            <textarea required <?= ($keluarga != null) ? 'disabled' : ''; ?>
                                                class="form-control <?= ($validation->hasError('alamat_ayah')) ? 'is-invalid' : ''; ?>"
                                                name="alamat_ayah" name="alamat_ayah"
                                                rows="5"><?= ($keluarga != null) ? $keluarga['alamat_ayah'] : old('alamat_ayah'); ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('alamat_ayah') == '') ? 'Bagian alamat ayah wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_ayah')); ?>
                                            </div>
                                        </div>
                                        <!-- end alamat -->
                                    </div>
                                    <!-- Ayah / Wali -->
                                    <div class="col-12 col-md-6">
                                        <div class="mb20">
                                            <label for="nama_ibu" class="form-label bold">Nama Ibu / Wali <span
                                                    class="required-label">*</span></label>
                                            <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="text"
                                                class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($keluarga != null) ? $keluarga['nama_ibu'] : old('nama_ibu'); ?>"
                                                name="nama_ibu" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('nama_ibu') == '') ? 'Bagian nama ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_ibu')); ?>
                                            </div>
                                        </div>
                                        <!-- end nama Ibu / Wali -->
                                        <?php if ($identitas['id_status_peserta'] != 1) : ?>
                                        <div class="mb20">
                                            <label for="usia_ibu" class="form-label bold">Usia Ibu / Wali <span
                                                    class="required-label">*</span></label>
                                            <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="number"
                                                class="form-control <?= ($validation->hasError('usia_ibu')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($keluarga != null) ? $keluarga['usia_ibu'] : old('usia_ibu'); ?>"
                                                id="usia_ibu" name="usia_ibu" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('usia_ibu') == '') ? 'Bagian usia ibu wajib diisi' : $validation->getError('usia_ibu'); ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <!-- end usia -->
                                        <div class="mb20">
                                            <label for="pekerjaan_ibu" class="form-label bold">Pekerjaan Ibu / Wali
                                                <span class="required-label">*</span></label>
                                            <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="text"
                                                class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($keluarga != null) ? $keluarga['pekerjaan_ibu'] : old('pekerjaan_ibu'); ?>"
                                                name="pekerjaan_ibu" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('pekerjaan_ibu') == '') ? 'Bagian pekerjaan ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('pekerjaan_ibu')); ?>
                                            </div>
                                        </div>
                                        <!-- end pekerjaan Ibu / Wali -->
                                        <div class="mb20">
                                            <label for="pendidikan_ibu" class="form-label bold">Pendidikan Terakhir Ibu
                                                /
                                                Wali
                                                <span class="required-label">*</span></label>
                                            <select required <?= ($keluarga != null) ? 'disabled' : ''; ?>
                                                class="form-select <?= ($validation->hasError('pendidikan_ibu')) ? 'is-invalid' : ''; ?>"
                                                aria-label="Default select example" name="pendidikan_ibu">
                                                <option selected hidden></option>
                                                <?php foreach ($pendidikan as $pendidikan_ibu) : ?>
                                                <option <?php if ($keluarga != null) {
                                                                    if ($keluarga['pendidikan_ibu'] == $pendidikan_ibu) {
                                                                        echo 'selected';
                                                                    };
                                                                } else {
                                                                    if (old('pendidikan_ibu') == $pendidikan_ibu) {
                                                                        echo 'selected';
                                                                    }
                                                                } ?> value="<?= $pendidikan_ibu; ?>">
                                                    <?= $pendidikan_ibu; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('pendidikan_terakhir_ibu') == '') ? 'Bagian pendidikan terakhir ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('pendidikan_terakhir_ibu')); ?>
                                            </div>
                                        </div>
                                        <!-- end Pendidikan Terakhir Ibu / Wali -->
                                        <div class="mb20">
                                            <label for="penghasilan_ibu" class="form-label bold">Penghasilan per Bulan
                                                Ibu /
                                                Wali
                                                <span class="required-label">* </span> </label>
                                            <p>Contoh : 2000000 (tanpa menggunakan titik)</p>
                                            <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="number"
                                                min="0"
                                                class="form-control <?= ($validation->hasError('penghasilan_ibu')) ? 'is-invalid' : ''; ?>"
                                                value="<?= ($keluarga != null) ? $keluarga['penghasilan_ibu'] : old('penghasilan_ibu'); ?>"
                                                name="penghasilan_ibu" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('penghasilan_ibu') == '') ? 'Bagian penghasilan ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('penghasilan_ibu')); ?>
                                            </div>
                                        </div>
                                        <!-- end Pneghasilan Ibu / Wali -->
                                        <div class="mb20">
                                            <label for="alamat_ibu" class="form-label bold">Alamat Ibu / Wali
                                                <span class="required-label">*</span></label>
                                            <textarea required <?= ($keluarga != null) ? 'disabled' : ''; ?>
                                                class="form-control <?= ($validation->hasError('alamat_ibu')) ? 'is-invalid' : ''; ?>"
                                                name="alamat_ibu" id="alamat_ibu"
                                                rows="5"><?= ($keluarga != null) ? $keluarga['alamat_ibu'] : old('alamat_ibu'); ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('alamat_ibu') == '') ? 'Bagian alamat ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_ibu')); ?>
                                            </div>
                                        </div>
                                        <!-- end alamat -->
                                    </div>
                                    <!-- end Ibu / Wali -->
                                </div>
                                <!-- end kondisi keluarga -->
                                <!-- Apakah Calon Penerima Bantuan Terdaftar Sebegai  -->
                                <h3 class="mb20 fs20">C. Apakah Calon Penerima Bantuan Terdaftar Sebagai </h3>
                                <div class="row mb40">
                                    <div class="col-12 col-md-6">
                                        <div class="mb20">
                                            <label for="rtsm_rtm" class="form-label">Rumah Tangga Sangat Miskin (RTSM) /
                                                Rumah
                                                Tangga Miskin
                                                (RTM)? <span class="required-label">*</span></label>

                                            <!-- radio button -->
                                            <div class="form-check">
                                                <?php foreach ($opsional as $opsional_rstm) : ?>
                                                <input name="rtsm_rtm" id="rtsm_rtm_<?= ucfirst($opsional_rstm); ?>"
                                                    required type="radio"
                                                    class="form-check-input <?= ($opsional_rstm == 'tidak') ? 'ms-3' : ''; ?>"
                                                    <?= ($keluarga != null) ? 'disabled' : ''; ?>
                                                    <?php if ($keluarga != null) {
                                                                                                                                                                                                                                                                                if ($keluarga['rtsm_rtm'] == $opsional_rstm) {
                                                                                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                                                                                };
                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                if (old('rtsm_rtm') == $opsional_rstm) {
                                                                                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                            } ?>
                                                    value="<?= $opsional_rstm; ?>"><label
                                                    for="rtsm_rtm_<?= ucfirst($opsional_rstm); ?>"
                                                    class="form-check-label"><?= ucfirst($opsional_rstm); ?></label>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('rtsm_rtm') == '') ? 'Bagian Rumah Tangga Sangat Miskin (RTSM) / Rumah Tangga Miskin (RTM) wajib diisi' : str_replace('_', ' ', $validation->getError('rtsm_rtm')); ?>
                                            </div>
                                        </div>
                                        <!-- end rtsm rtm -->
                                        <div class="mb20">
                                            <label for="pkh_kks_kbs" class="form-label">Peserta Program Keluarga Harapan
                                                (PKH)/Kart
                                                Keluarga Sejahtera
                                                (KKS) dan Kartu Batang Sehat (KBS)?
                                                <span class="required-label">*</span></label>

                                            <!-- radio button -->
                                            <div class="form-check">
                                                <?php foreach ($opsional as $opsional_pkh) : ?>
                                                <input type="radio"
                                                    class="form-check-input <?= ($opsional_pkh == 'tidak') ? 'ms-3' : ''; ?>"
                                                    required name="pkh_kks_kbs"
                                                    id="pkh_kks_kbs_<?= ucfirst($opsional_pkh); ?>"
                                                    <?= ($keluarga != null) ? 'disabled' : ''; ?>
                                                    <?php if ($keluarga != null) {
                                                                                                                                                                                                                                                                                    if ($keluarga['pkh_kks_kbs'] == $opsional_pkh) {
                                                                                                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                                                                                                    };
                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                    if (old('pkh_kks_kbs') == $opsional_pkh) {
                                                                                                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                } ?>
                                                    value="<?= $opsional_pkh; ?>"><label
                                                    for="pkh_kks_kbs_<?= ucfirst($opsional_pkh); ?>"
                                                    class="form-check-label"><?= ucfirst($opsional_pkh); ?></label>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('pkh_kks_kbs') == '') ? 'Bagian Peserta Program Keluarga Harapan (PKH)/Kart Keluarga Sejahtera (KKS) dan Kartu Batang Sehat (KBS)  wajib diisi' : str_replace('_', ' ', $validation->getError('pkh_kks_kbs')); ?>
                                            </div>
                                        </div>
                                        <!-- end pkh kks kbs -->
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb20">
                                            <label for="bsm_kip" class="form-label">Penerimaan BSM atau Kartu Indonesia
                                                Pintar
                                                (KIP)?
                                                <span class="required-label">*</span></label>
                                            <!-- radio button -->
                                            <div class="form-check">
                                                <?php foreach ($opsional as $opsional_bsm) : ?>
                                                <input name="bsm_kip" id="bsm_kip_<?= ucfirst($opsional_bsm); ?>"
                                                    type="radio"
                                                    class="form-check-input <?= ($opsional_bsm == 'tidak') ? 'ms-3' : ''; ?>"
                                                    required <?= ($keluarga != null) ? 'disabled' : ''; ?>
                                                    <?php if ($keluarga != null) {
                                                                                                                                                                                                                                                                            if ($keluarga['bsm_kip'] == $opsional_bsm) {
                                                                                                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                                                                                                            };
                                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                                            if (old('bsm_kip') == $opsional_bsm) {
                                                                                                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                        } ?>
                                                    value="<?= $opsional_bsm; ?>"><label
                                                    for="bsm_kip_<?= ucfirst($opsional_bsm); ?>"
                                                    class="form-check-label"><?= ucfirst($opsional_bsm); ?></label>
                                                <?php endforeach; ?>
                                            </div>
                                            <!-- </select> -->
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('bsm_kip') == '') ? 'Bagian Penerimaan BSM atau Kartu Indonesia Pintar (KIP)  wajib diisi' : str_replace('_', ' ', $validation->getError('bsm_kip')); ?>
                                            </div>
                                        </div>
                                        <!-- end bsm kip -->
                                    </div>
                                </div>
                                <!-- end terdaftar sebagai -->
                                <!-- SAVE  Modal -->
                                <div class="modal fade" id="save_modal_keluarga" tabindex="-1"
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
                                                <div class="alert alert-danger pesan-gagal" role="alert" style="display:none">
                                                    Terdapat kesalahan masukkan atau data yang anda masukkan tidak sesuai.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary fw-normal"
                                                    data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-success fw-normal">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Selanjutnya  Modal -->
                                <div class="modal fade" id="selanjutnya_modal_keluarga" tabindex="-1"
                                    aria-labelledby="saveModalLabel" aria-hidden="true">
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
                            <?php endif ?>
                </div>
                <!-- end form keluarga -->

                <!-- form lampiran -->
                <div id="step-3" class="tab-pane p-0" role="tabpanel" aria-labelledby="step-3">
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
                                        <div class="col-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="scan_prestasi_<?= $i; ?>" class="form-label bold">Scan
                                                    Prestasi
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?>
                                                </label>
                                                <input
                                                    value="<?= ($file != null) ? $prestasi[$i - 1]['file_prestasi'] : ''; ?>"
                                                    <?= ($file != null) ? 'disabled' : ''; ?>
                                                    <?= ($i == 1) ? 'required' : ''; ?> id="file_prestasi_<?= $i; ?>"
                                                    class="form-control  <?= ($validation->hasError('scan_prestasi_' . $i)) ? 'is-invalid' : ''; ?>"
                                                    name="scan_prestasi_<?= $i; ?>"
                                                    <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                    accept="application/pdf" />
                                                <div class="invalid-feedback">
                                                    <?= ($validation->getError('scan_prestasi_' . $i) == '') ? 'Bagian scan prestasi wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_prestasi_' . $i));
                                                            ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end file prestasi -->
                                        <div class="col-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="nama_prestasi_<?= $i; ?>" class="form-label bold">Nama
                                                    Prestasi
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?></label>
                                                <input
                                                    value="<?= ($file != null) ? $prestasi[$i - 1]['nama_prestasi'] : ''; ?>"
                                                    <?= ($file != null) ? 'disabled' : ''; ?>
                                                    <?= ($i == 1) ? 'required' : ''; ?> type="text"
                                                    id="nama_prestasi_<?= $i; ?>"
                                                    class="form-control <?= ($validation->hasError('nama_prestasi_' . $i)) ? 'is-invalid' : ''; ?>"
                                                    value="<?= old('nama_prestasi_' . $i); ?>"
                                                    name="nama_prestasi_<?= $i; ?>" placeholder="" />
                                                <div class="invalid-feedback">
                                                    <?= ($validation->getError('nama_prestasi_' . $i) == '') ? 'Bagian nama prestasi wajib diisi' : str_replace(
                                                                '_',
                                                                ' ',
                                                                $validation->getError('nama_prestasi_' . $i)
                                                            ); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end nama prestasi -->
                                        <div class="col-6 col-xxl-2">
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
                                                        value="<?= $data_kategori; ?>">
                                                        <?= ucfirst($data_kategori); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= ($validation->getError('kategori_' . $i) == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('kategori_' . $i)); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end kategori -->
                                        <div class="col-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="tingkat_<?= $i; ?>" class="form-label bold">Tingkat Prestasi
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?></label>
                                                <select
                                                    <?= ($file != null) ? 'disabled id="tingkat_isi_' . $i . '"' : 'id="tingkat_' . $i . '"'; ?>
                                                    disabled
                                                    class="form-select <?= ($validation->hasError('tingkat_' . $i)) ? 'is-invalid' : ''; ?>"
                                                    aria-label="Default select example" name="tingkat_<?= $i; ?>" ">
                                                                <option selected></option>
                                                                <?php foreach ($tingkat as $data_tingkat) : ?>
                                                                    <option <?php
                                                                            if (old('tingkat_' . $i) == $data_tingkat) {
                                                                                echo 'selected';
                                                                            } elseif ($file != null) {
                                                                                if ($prestasi[$i - 1]['tingkat'] == $data_tingkat) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }  ?> value=" <?= $data_tingkat; ?>">
                                                    <?= ucfirst($data_tingkat); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <!-- end tingkat prestasi -->
                                        </div>
                                        <!-- end tingkat -->
                                        <div class="col-6 col-xxl-2">
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
                                        <div class="col-6 col-xxl-1">
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
                                                <div class="invalid-feedback">
                                                    <?= ($validation->getError('tahun_prestasi_' . $i) == '') ? 'Bagian tahun prestasi ' . $i . ' wajib diisi' : str_replace(
                                                                '_',
                                                                ' ',
                                                                $validation->getError('tahun_prestasi_' . $i)
                                                            ); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end tahun_prestasi -->
                                        <div class="col-6 col-xl-1 tambah__prestasi">
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
                                                    <h5 class="modal-title" id="prestasiModalLabel">
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
                                <?php if ($id_peserta == 2 || $id_peserta == 3) : ?>
                                <p>Sistematika proposal bantuan biaya pendidikan : <a
                                        href="<?= base_url(); ?>/assets/informasi/file/Sistematika Proposal.pdf">Unduh
                                        disini</a> </p>
                                <?php endif ?>
                                <div class="alert alert-primary">
                                    <h6 class="bold">Ketentuan :</h6>
                                    <p class="fs14">
                                        1. Semua formulir wajib diisi dan ukuran file tidak boleh lebih dari
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
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb20">
                                            <label for="scan_kk" class="form-label bold">Scan Kartu Keluarga (KK) <span
                                                    class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_kk<strong>.pdf</strong></span></label>
                                            <input <?= ($file != null) ? 'disabled value="' . $file['kk'] . '"' : ''; ?>
                                                required id="kk"
                                                class="form-control <?= ($validation->hasError('scan_kk')) ? 'is-invalid' : ''; ?>"
                                                name="scan_kk" <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_kk') == '') ? 'Bagian scan kk  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_kk')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan KK -->
                                        <div class="mb20">
                                            <label for="scan_ktp" class="form-label bold">Scan Kartu Tanda Penduduk
                                                (KTP) <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_ktp<strong>.pdf</strong></span>
                                            </label>
                                            <input
                                                <?= ($file != null) ? 'disabled value="' . $file['ktp'] . '"' : ''; ?>
                                                required id="ktp"
                                                class="form-control <?= ($validation->hasError('scan_ktp')) ? 'is-invalid' : ''; ?>"
                                                name="scan_ktp" <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_ktp') == '') ? 'Ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_ktp')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan KTP -->
                                        <?php if ($id_peserta == 1 || $id_peserta == 2) : ?>
                                        <div class="mb20">
                                            <label for="scan_kartu_pelajar" class="form-label bold">Scan Kartu Pelajar
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_kartu_pelajar<strong>.pdf</strong></span>
                                            </label>
                                            <input
                                                <?= ($file != null) ? 'disabled value="' . $file['kartu_pelajar'] . '"' : ''; ?>
                                                required id="kartu_pelajar"
                                                class="form-control <?= ($validation->hasError('scan_kartu_pelajar')) ? 'is-invalid' : ''; ?>"
                                                name="scan_kartu_pelajar"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_kartu_pelajar') == '') ? 'Bagian scan kartu pelajar  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_kartu_pelajar')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan Kartu pelajar -->
                                        <?php else : ?>
                                        <div class="mb20">
                                            <label for="scan_kartu_pelajar" class="form-label bold">Scan Kartu Mahasiswa
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_ktm<strong>.pdf</strong></span>
                                            </label>
                                            <input required id="kartu_pelajar"
                                                class="form-control <?= ($validation->hasError('scan_kartu_pelajar')) ? 'is-invalid' : ''; ?>"
                                                <?= ($file != null) ? 'disabled value="' . $file['kartu_pelajar'] . '"' : ''; ?>
                                                name="scan_kartu_pelajar"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_kartu_pelajar') == '') ? 'Bagian scan kartu pelajar  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_kartu_pelajar')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan Kartu pelajar -->
                                        <?php endif ?>

                                        <div class="mb20">
                                            <label for="scan_pas_foto" class="form-label bold">Upload Foto Berwarna
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_pas_foto<strong>.jpg/.jpeg/.png</strong></span>
                                            </label>
                                            <input type="file" required id="pas_foto"
                                                class="form-control lampiran-foto-pendaftaran <?= ($validation->hasError('scan_pas_foto')) ? 'is-invalid' : ''; ?>"
                                                name="scan_pas_foto" accept="image/*" data-max-file-size="2M"
                                                <?= ($file != null) ? 'disabled hidden data-default-file="' . base_url() . '/assets/scan/' . $identitas["no_induk"] . '/file/' . $file["pas_foto"] . '"' : ''; ?>
                                                data-allowed-file-extensions="jpg jpeg png" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_pas_foto') == '') ? 'Bagian pas foto  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_pas_foto')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan_pas_foto -->
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <?php if ($id_peserta == 2) : ?>
                                        <div class="mb20">
                                            <label for="scan_diterima_pt" class="form-label bold">Scan Keterangan
                                                Diterima Perguruan Tinggi <span class="fs14 lightgrey ms-2"> Contoh
                                                    penamaan file : (no
                                                    induk)_scan_diteima_pt<strong>.pdf</strong></span>
                                            </label>
                                            <input required id="diterima_pt"
                                                class="form-control <?= ($validation->hasError('scan_diterima_pt')) ? 'is-invalid' : ''; ?>"
                                                <?= ($file != null) ? 'disabled value="' . $file['diterima_pt'] . '"' : ''; ?>
                                                name="scan_diterima_pt"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_diterima_pt') == '') ? 'Bagian scan diterima perguruan tinggi wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : $validation->getError('scan_diterima_pt'); ?>
                                            </div>
                                        </div>
                                        <!-- end scan diterima pt -->
                                        <?php elseif ($id_peserta == 3) : ?>
                                        <div class="mb20">
                                            <label for="scan_akreditasi_pt" class="form-label bold">Scan Surat
                                                Akreditasi Perguruan Tinggi <span class="fs14 lightgrey ms-2"> Contoh
                                                    penamaan file : (no
                                                    induk)_scan_akreditasi_pt<strong>.pdf</strong></span>
                                            </label>

                                            <input required id="akreditasi_pt"
                                                class="form-control <?= ($validation->hasError('scan_akreditasi_pt')) ? 'is-invalid' : ''; ?>"
                                                <?= ($file != null) ? 'disabled value="' . $file['akreditasi_pt'] . '"' : ''; ?>
                                                name="scan_akreditasi_pt"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_akreditasi_pt') == '') ? 'Bagian akreditasi perguruan tinggi wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : $validation->getError('scan_akreditasi_pt'); ?>
                                            </div>
                                        </div>
                                        <!-- end scan_akreditasi_pt -->
                                        <?php endif ?>
                                        <?php if ($id_peserta == 1) : ?>
                                        <div class="mb20">
                                            <label for="scan_raport_smt" class="form-label bold">Scan Nilai Raport
                                                Semester Terakhir <span class="fs14 lightgrey ms-2"> Contoh penamaan
                                                    file : (no induk)_scan_raport_smt<strong>.pdf</strong></span>
                                            </label>

                                            <input
                                                <?= ($file != null) ? 'disabled value="' . $file['raport_smt'] . '"' : ''; ?>
                                                required id="raport_smt"
                                                class="form-control <?= ($validation->hasError('scan_raport_smt')) ? 'is-invalid' : ''; ?>"
                                                name="scan_raport_smt"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_raport_smt') == '') ? 'Bagian scan raport semester terakhir  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_raport_smt')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan raport smt terakhir -->
                                        <div class="mb20">
                                            <label for="scan_raport" class="form-label bold">Scan Raport Legalisasi
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_raport_legalisasi<strong>.pdf</strong></span>
                                            </label>
                                            <input
                                                <?= ($file != null) ? 'disabled value="' . $file['raport_legalisasi'] . '"' : ''; ?>
                                                required id="raport"
                                                class="form-control <?= ($validation->hasError('scan_raport')) ? 'is-invalid' : ''; ?>"
                                                name="scan_raport"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_raport') == '') ? 'Bagian scan raport legalisasi  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_raport')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan raport legalisasi -->
                                        <?php else : ?>
                                        <div class="mb20">
                                            <label for="scan_proposal" class="form-label bold">Scan Proposal Bantuan
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_proposal<strong>.pdf</strong></span>
                                            </label>
                                            <input required id="proposal"
                                                class="form-control <?= ($validation->hasError('scan_proposal')) ? 'is-invalid' : ''; ?>"
                                                <?= ($file != null) ? 'disabled value="' . $file['proposal'] . '"' : ''; ?>
                                                name="scan_proposal"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?>
                                                accept="application/pdf" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_proposal') == '') ? 'Bagian scan_proposal wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : $validation->getError('scan_proposal'); ?>
                                            </div>
                                        </div>
                                        <!-- end scan_proposal -->
                                        <?php endif ?>


                                        <div class="mb20">
                                            <label for="scan_sktm" class="form-label bold">Scan Surat Keterangan Tidak
                                                Mampu <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_sktm<strong>.pdf</strong></span>
                                            </label>
                                            <input
                                                <?= ($file != null) ? 'disabled value="' . $file['sktm'] . '"' : ''; ?>
                                                required id="sktm"
                                                class="form-control <?= ($validation->hasError('scan_sktm')) ? 'is-invalid' : ''; ?>"
                                                name="scan_sktm" accept="application/pdf"
                                                <?= ($file != null) ? 'type="text"' : 'type="file"'; ?> />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_sktm') == '') ? 'Bagian scan ktm  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_sktm')); ?>
                                            </div>
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
                                                    Yakin ingin mengirim data?
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Pastikan data yang anda masukkan sudah benar.
                                                <div class="alert alert-danger pesan-gagal" role="alert" style="display:none">
                                                    Terdapat kesalahan masukkan atau data yang anda masukkan tidak sesuai.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary fw-normal"
                                                    data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-success fw-normal">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php endif ?>
                </div>
                <!-- end form lampiran -->

                <!-- kirim ulang form pendaftaran -->
                <div id="step-4" class="tab-pane p-0" role="tabpanel" aria-labelledby="step-4">
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
                                        <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                            induk)_scan_formulir_pendaftaran<strong>.pdf</strong></span></label>
                                    <input required <?= ($file['formulir_pendaftaran'] != null) ? 'disabled' : ''; ?>
                                        id="formulir_pendaftaran"
                                        class="form-control w-100 <?= ($validation->hasError('scan_formulir_pendaftaran')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($file['formulir_pendaftaran'] != null) ? $file['formulir_pendaftaran'] : old('scan_formulir_pendaftaran'); ?>"
                                        name="scan_formulir_pendaftaran"
                                        type="<?= ($file['formulir_pendaftaran'] != null) ? 'text' : 'file'; ?>"
                                        accept="application/pdf" />
                                    <div class="invalid-feedback">
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
                                                    Yakin ingin mengirim data?
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Pastikan data yang anda masukkan sudah benar.
                                                <div class="alert alert-danger pesan-gagal" role="alert" style="display:none">
                                                    Terdapat kesalahan masukkan atau data yang anda masukkan tidak sesuai.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary fw-normal"
                                                    data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-success fw-normal">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php endif ?>
                </div>
                <!-- end kirim ulang form pendaftaran -->

                <!-- review pendaftaran -->
                <div id="step-5" class="tab-pane p-0" role="tabpanel" aria-labelledby="step-5">
                    <?php if ($file != null && $file['formulir_pendaftaran']) : ?>
                    <form action="<?= base_url(); ?>/pendaftaran/simpanPendaftaran/<?= $identitas['no_induk']; ?>"
                        method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <h2 class="mb-3 mb-lg-5 bold fs24">Rekap Data Pendaftaran</h2>
                        <!-- Btn Ubah data -->
                        <h3 class="mb20 fs20">A. Identitas Diri</h3>
                        <div class="row mt20 mb40 review">
                            <div class="col-12 col-md-6">
                                <div class="mb20 has-validation">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap </label>
                                    <input disabled type="text"
                                        class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['nama_lengkap'] : old('nama_lengkap'); ?>"
                                        name="nama_lengkap" placeholder="" required />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('nama_lengkap') == '') ? 'Bagian nama lengkap  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_lengkap')); ?>
                                    </div>
                                </div>
                                <!-- end nama lengkap -->
                                <div class="mb20 has-validation kelamin">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>"
                                        required aria-label="Default select example" name="jenis_kelamin">
                                        <option hidden></option>
                                        <option <?php if ($identitas != null) {
                                                        if ($identitas['jenis_kelamin'] == 'L') {
                                                            echo 'selected';
                                                        };
                                                    } else {
                                                        if (old('jenis_kelamin') == 'L') {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="L">
                                            Laki-laki
                                        </option>
                                        <option <?php if ($identitas != null) {
                                                        if ($identitas['jenis_kelamin'] == 'P') {
                                                            echo 'selected';
                                                        };
                                                    } else {
                                                        if (old('jenis_kelamin') == 'P') {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="P">
                                            Perempuan
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('jenis_kelamin') == '') ? 'Bagian jenis kelamin  wajib diisi' : str_replace('_', ' ', $validation->getError('jenis_kelamin')) ?>
                                    </div>
                                </div>
                                <!-- end jenis kelamin -->
                                <div class="mb20 has-validation">
                                    <label for="no_induk" class="form-label">NIK </label>
                                    <input disabled type="number" min="0" max="9999999999999999" name="no_induk"
                                        required
                                        class="form-control <?= ($validation->hasError('no_induk')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['no_induk'] : old('no_induk'); ?>"
                                        name="no_induk" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('no_induk') == '') ? 'Bagian NIK  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk')) ?>
                                    </div>
                                </div>
                                <!-- end NIK -->
                                <div class="mb20 has-validation">
                                    <label for="ttl" class="form-label">Tempat, Tanggal Lahir
                                    </label>
                                    <input disabled type="text"
                                        class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>"
                                        required value="<?= ($identitas != null) ? $identitas['ttl'] : old('ttl'); ?>"
                                        name="ttl" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('ttl') == '') ? 'Bagian tempat, tanggal lahir  wajib diisi' : str_replace('_', ' ', $validation->getError('ttl')) ?>
                                    </div>
                                </div>
                                <!-- end Tempat, Tanggal Lahir -->
                                <div class="mb20 has-validation">
                                    <label for="agama" class="form-label">Agama </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>"
                                        required aria-label="Default select example" name="agama">
                                        <option selected hidden></option>
                                        <?php foreach ($agama as $agama_review) : ?>
                                        <option <?php if ($identitas != null) {
                                                            if ($identitas['id_agama'] == $agama_review['id_agama']) {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('agama') == $agama_review['id_agama']) {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="<?= $agama_review['id_agama']; ?>">
                                            <?= $agama_review['nama_agama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('agama') == '') ? 'Bagian agama wajib diisi' : str_replace('_', ' ', $validation->getError('agama')) ?>
                                    </div>
                                </div>
                                <!-- end agama -->

                                <?php if ($identitas['id_status_peserta'] == 1) : ?>
                                <div class="mb20 has-validation">
                                    <label for="anak_ke" class="form-label">Anak Ke </label>
                                    <input disabled type="number" required
                                        class="form-control <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['anak_ke'] : old('anak_ke'); ?>"
                                        name="anak_ke" min="1" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('anak_ke') == '') ? 'Bagian anak ke  wajib diisi' : $validation->getError('anak_ke'); ?>
                                    </div>
                                </div>
                                <!-- end anak ke -->
                                <?php endif ?>

                                <div class="alamat mb20 has-validation">
                                    <label for="alamat_rumah" class="form-label">Alamat Rumah </label>
                                    <textarea disabled required
                                        class="form-control mb-2 <?= ($validation->hasError('alamat_rumah')) ? 'is-invalid' : ''; ?>"
                                        name="alamat_rumah" id="alamat_rumah"
                                        rows="1"><?= ($identitas != null) ? $identitas['alamat_rumah'] : old('alamat_rumah'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('alamat_rumah') == '') ? 'Bagian alamat rumah  wajib diisi' : $validation->getError('alamat_rumah'); ?>
                                    </div>
                                </div>
                                <!-- end alamat -->
                                <div class="mb20 has-validation">
                                    <label for="kecamatan" class="form-label">Kecamatan </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('kecamatan')) ? 'is-invalid' : ''; ?>"
                                        required aria-label="Default select example" name="kecamatan">
                                        <option value="" selected hidden></option>
                                        <?php foreach ($kecamatan as $kecamatan_review) : ?>
                                        <option <?php if ($identitas != null) {
                                                            if ($identitas['id_kecamatan'] == $kecamatan_review['id_kecamatan']) {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('kecamatan') == $kecamatan_review['id_kecamatan']) {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="<?= $kecamatan_review['id_kecamatan']; ?>">
                                            <?= $kecamatan_review['nama_kecamatan']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('kecamatan') == '') ? 'Bagian kecamatan  wajib diisi' : $validation->getError('kecamatan'); ?>
                                    </div>
                                </div>
                                <!-- end kecamatan -->
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb20 has-validation">
                                    <label for="no_telepon" class="form-label">Nomer Telepon </label>
                                    <input disabled type="number" min="0" max="999999999999999" required
                                        class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['no_telepon'] : old('no_telepon'); ?>"
                                        name="no_telepon" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('no_telepon') == '') ? 'Bagian no telepon  wajib diisi dan kurang dari 15 angka' : str_replace('_', ' ', $validation->getError('no_telepon')) ?>
                                    </div>
                                </div>
                                <!-- end Nomer Telepon -->

                                <?php if ($identitas['id_status_peserta'] == 3) : ?>
                                <div class="mb20">
                                    <label for="no_induk_pelajar" class="form-label">NIM </label>
                                    <input disabled required type="number" maxlength="25" name="no_induk_pelajar"
                                        class="form-control <?= ($validation->hasError('no_induk_pelajar')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['no_induk_pelajar'] : old('no_induk_pelajar'); ?>"
                                        placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('no_induk_pelajar') == '') ? 'Bagian NIM  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk_pelajar')) ?>
                                    </div>
                                </div>
                                <!-- end NIM -->
                                <?php else : ?>
                                <div class="mb20 has-validation">
                                    <label for="no_induk_pelajar" class="form-label"> NISN </label>
                                    <input disabled type="text" maxlength="25" required
                                        class="form-control <?= ($validation->hasError('no_induk_pelajar')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['no_induk_pelajar'] : old('no_induk_pelajar'); ?>"
                                        name="no_induk_pelajar" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('no_induk_pelajar') == '') ? 'Bagian NISN  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk_pelajar')) ?>
                                    </div>
                                </div>
                                <?php endif ?>
                                <!-- end NIS -->

                                <?php if ($identitas['id_status_peserta'] == 1) : ?>
                                <div class="mb20 has-validation">
                                    <label for="jarak_sekolah" class="form-label">Jarak dari Rumah ke Sekolah (Km)
                                    </label>
                                    <input disabled type="number" required
                                        class="form-control <?= ($validation->hasError('jarak_sekolah')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['jarak_sekolah'] : old('jarak_sekolah'); ?>"
                                        name="jarak_sekolah" min="0" step=".1" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('jarak_sekolah') == '') ? 'Bagian jarak sekolah  wajib diisi' : str_replace('_', ' ', $validation->getError('jarak_rumah')) ?>
                                    </div>
                                </div>
                                <!-- end Jarak dari Rumah ke Sekolah -->
                                <div class="mb20 has-validation">
                                    <label for="transportasi" class="form-label">Transportasi Siswa ke Sekolah
                                    </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('transportasi')) ? 'is-invalid' : ''; ?>"
                                        required aria-label="Default select example" name="transportasi">
                                        <option selected hidden></option>
                                        <?php foreach ($transportasi as $transportasi_review) : ?>
                                        <option <?php if ($identitas != null) {
                                                                if ($identitas['id_transportasi'] == $transportasi_review['id_transportasi']) {
                                                                    echo 'selected';
                                                                };
                                                            } else {
                                                                if (old('transportasi') == $transportasi_review['id_transportasi']) {
                                                                    echo 'selected';
                                                                }
                                                            } ?>
                                            value="<?= $transportasi_review['id_transportasi']; ?>">
                                            <?= ucfirst($transportasi_review['nama_transportasi']); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('transportasi') == '') ? 'Bagian transportasi wajib diisi' : $validation->getError('transportasi'); ?>
                                    </div>
                                </div>
                                <!-- end transportasi -->
                                <div class="mb20 has-validation">
                                    <label for="sekolah" class="form-label">Sekolah </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('sekolah')) ? 'is-invalid' : ''; ?>"
                                        required aria-label="Default select example" name="sekolah">
                                        <option selected hidden></option>
                                        <?php foreach ($sekolah as $sekolah_review) : ?>
                                        <option <?php if ($identitas != null) {
                                                                if ($identitas['id_sekolah'] == $sekolah_review['id_sekolah']) {
                                                                    echo 'selected';
                                                                };
                                                            } else {
                                                                if (old('sekolah') == $sekolah_review['id_sekolah']) {
                                                                    echo 'selected';
                                                                }
                                                            } ?> value="<?= $sekolah_review['id_sekolah']; ?>">
                                            <?= $sekolah_review['nama_sekolah']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('sekolah') == '') ? 'Bagian sekolah wajib diisi' : $validation->getError('sekolah'); ?>
                                    </div>
                                </div>
                                <!-- end sekolah -->
                                <div class="mb20 has-validation">
                                    <label for="kelas" class="form-label">Kelas </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>"
                                        required aria-label="Default select example" name="kelas">
                                        <option hidden></option>
                                        <option <?php if ($identitas != null) {
                                                            if ($identitas['kelas'] == '10') {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('sekolah') == '10') {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="10">X - Sepuluh</option>
                                        <option <?php if ($identitas != null) {
                                                            if ($identitas['kelas'] == '11') {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('sekolah') == '11') {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="11">XI - Sebelas</option>
                                        <option <?php if ($identitas != null) {
                                                            if ($identitas['kelas'] == '12') {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('sekolah') == '12') {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="12">XII - Dua Belas</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('kelas') == '') ? 'Bagian kelas wajib diisi' : $validation->getError('kelas'); ?>
                                    </div>
                                </div>
                                <!-- end kelas -->
                                <?php else : ?>
                                <div class="mb20 has-validation">
                                    <label for="nama_pt" class="form-label">Nama Perguruan Tinggi
                                    </label>
                                    <input disabled type="text"
                                        class="form-control <?= ($validation->hasError('nama_pt')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['nama_pt'] : old('nama_pt'); ?>"
                                        id="nama_pt" placeholder="" name="nama_pt" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('nama_pt') == '') ? 'Bagian nama perguruan tinggiwajib diisi' : $validation->getError('nama_pt'); ?>
                                    </div>
                                </div>
                                <!-- end nama_pt -->
                                <div class="mb20">
                                    <label for="akreditasi_pt" class="form-label">Akrediktasi Perguruan Tinggi
                                    </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('akreditasi_pt')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="akreditasi_pt">
                                        <option selected hidden></option>
                                        <?php foreach ($akreditasi_pt as $akreditasi_pt_review) : ?>
                                        <option <?php if ($identitas != null) {
                                                                if ($identitas['akreditasi_pt'] == $akreditasi_pt_review) {
                                                                    echo 'selected';
                                                                };
                                                            } else {
                                                                if (old('akreditasi_pt') == $akreditasi_pt_review) {
                                                                    echo 'selected';
                                                                }
                                                            } ?> value="<?= $akreditasi_pt_review; ?>">
                                            <?= $akreditasi_pt_review; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('akreditasi_pt') == '') ? 'Bagian akreditasi perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('akreditasi_pt')); ?>
                                    </div>
                                </div>
                                <!-- end akreditasi_pt -->
                                <div class="mb20">
                                    <label for="tahun_masuk_pt" class="form-label">Tahun Masuk Perguruan Tinggi
                                    </label>
                                    <input disabled type="number"
                                        class="form-control <?= ($validation->hasError('tahun_masuk_pt')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['tahun_masuk_pt'] : old('tahun_masuk_pt'); ?>"
                                        name="tahun_masuk_pt" placeholder="" min="2010" max="2022" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('tahun_masuk_pt') == '') ? 'Bagian tahun masuk perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('tahun_masuk_pt')); ?>
                                    </div>
                                </div>
                                <!-- end tahun_masuk_pt -->
                                <div class="mb20">
                                    <label for="semester_ke" class="form-label">Semester ke
                                    </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('semester_ke')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="semester_ke">
                                        <option selected hidden></option>
                                        <?php foreach ($semester_ke as $semester_ke_review) : ?>
                                        <option <?php if ($identitas != null) {
                                                                if ($identitas['semester_ke'] == $semester_ke_review) {
                                                                    echo 'selected';
                                                                };
                                                            } else {
                                                                if (old('semester_ke') == $semester_ke_review) {
                                                                    echo 'selected';
                                                                }
                                                            } ?> value="<?= $semester_ke_review; ?>">
                                            <?= $semester_ke_review; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('semester_ke') == '') ? 'Bagian semester ke wajib diisi' : str_replace('_', ' ', $validation->getError('semester_ke')); ?>
                                    </div>
                                </div>
                                <!-- end semester_ke -->
                                <div class="mb20">
                                    <label for="alamat_pt" class="form-label">Alamat Perguruan Tinggi
                                    </label>
                                    <textarea disabled
                                        class="form-control <?= ($validation->hasError('alamat_pt')) ? 'is-invalid' : ''; ?>"
                                        name="alamat_pt" id="alamat_pt"
                                        rows="1"><?= ($identitas != null) ? $identitas['alamat_pt'] : old('alamat_pt'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('alamat_pt') == '') ? 'Bagian alamat perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('alamat_pt')); ?>
                                    </div>
                                </div>
                                <!-- end alamat perguruan tinggi-->
                                <?php endif ?>
                                <div class="mb20">
                                    <label for="pernah_menerima_bantuan" class="form-label">Apakah Calon Penerima
                                        Beasiswa Pernah
                                        Menerima Bantuan?
                                    </label>
                                    <select disabled id="pernah_menerima_bantuan"
                                        class="form-select <?= ($validation->hasError('pernah_menerima_bantuan')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="pernah_menerima_bantuan">
                                        <option selected hidden></option>
                                        <?php foreach ($opsional as $opsional_pernah_menerima) : ?>
                                        <option <?php if ($identitas != null) {
                                                            if ($identitas['pernah_menerima_bantuan'] == $opsional_pernah_menerima) {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('pernah_menerima_bantuan') == $opsional_pernah_menerima) {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="<?= $opsional_pernah_menerima; ?>">
                                            <?= ucfirst($opsional_pernah_menerima); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('pernah_menerima_bantuan') == '') ? 'Bagian pernah menerimabantuan  wajib diisi' : str_replace('_', ' ', $validation->getError('pernah_menerima_bantuan')); ?>
                                    </div>
                                </div>
                                <!-- end pernah menerima bantuan -->
                                <div class="mb20">
                                    <label for="menerima_bantuan_dari" class="form-label">Jika Ya, Menerima Bantuan
                                        Dari</label>
                                    <input disabled id="menerima_bantuan_dari" id="menerima_bantuan_dari" type="text"
                                        maxlength="16"
                                        class="form-control <?= ($validation->hasError('menerima_bantuan_dari')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($identitas != null) ? $identitas['menerima_bantuan_dari'] : old('menerima_bantuan_dari'); ?>"
                                        name="menerima_bantuan_dari" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('menerima_bantuan_dari') == '') ? '' : str_replace('_', ' ', $validation->getError('menerima_bantuan_dari')) ?>
                                    </div>
                                </div>
                                <!-- end menerima_bantuan_dari -->
                            </div>
                        </div>
                        <!-- end identitas diri -->
                        <h3 class="mb20 fs20">B. Kondisi Keluarga</h3>
                        <div class="row mb40">
                            <div class="col-12 col-md-6">
                                <div class="mb20 has-validation">
                                    <label for="nama_ayah" class="form-label">Nama Ayah / Wali</label>
                                    <input disabled type="text" required
                                        class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($keluarga != null) ? $keluarga['nama_ayah'] : old('nama_ayah'); ?>"
                                        name="nama_ayah" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('nama_ayah') == '') ? 'Bagian nama_ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_ayah')); ?>
                                    </div>
                                </div>
                                <!-- end nama ayah -->
                                <?php if ($identitas['id_status_peserta'] != 1) : ?>
                                <div class="mb20">
                                    <label for="usia" class="form-label">Usia Ayah / Wali </label>
                                    <input disabled type="number"
                                        class="form-control <?= ($validation->hasError('usia_ayah')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($keluarga != null) ? $keluarga['usia_ayah'] : old('usia_ayah'); ?>"
                                        id="usia_ayah" name="usia_ayah" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('usia_ayah') == '') ? 'Bagian nama wajib diisi' : $validation->getError('usia_ayah'); ?>
                                    </div>
                                </div>
                                <?php endif ?>
                                <!-- end usia -->
                                <div class="mb20 has-validation">
                                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah / Wali
                                    </label>
                                    <input disabled type="text" required
                                        class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($keluarga != null) ? $keluarga['pekerjaan_ayah'] : old('pekerjaan_ayah'); ?>"
                                        name="pekerjaan_ayah" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('pekerjaan_ayah') == '') ? 'Bagian nama  wajib diisi' : str_replace('_', ' ', $validation->getError('pekerjaan_ayah')); ?>
                                    </div>
                                </div>
                                <!-- end pekerjaan ayah -->
                                <div class="mb20 has-validation">
                                    <label for="pendidikan_ayah" class="form-label">Pendidikan Terakhir Ayah / Wali
                                    </label>
                                    <select disabled required
                                        class="form-select <?= ($validation->hasError('pendidikan_ayah')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="pendidikan_ayah">
                                        <option selected hidden></option>
                                        <?php foreach ($pendidikan as $pendidikan_ayah) : ?>
                                        <option <?php if ($keluarga != null) {
                                                            if ($keluarga['pendidikan_ayah'] == $pendidikan_ayah) {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('pendidikan_ayah') == $pendidikan_ayah) {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="<?= $pendidikan_ayah; ?>">
                                            <?= $pendidikan_ayah; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('pendidikan_terakhir_ayah') == '') ? 'Bagian pendidikan_terakhir_ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('pendidikan_terakhir_ayah')); ?>
                                    </div>
                                </div>
                                <!-- end Pendidikan Terakhir Ayah / Wali -->
                                <div class="mb20 has-validation">
                                    <label for="penghasilan_ayah" class="form-label">Penghasilan per Bulan Ayah / Wali
                                    </label>
                                    <input disabled type="number" required
                                        class="form-control <?= ($validation->hasError('penghasilan_ayah')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($keluarga != null) ? $keluarga['penghasilan_ayah'] : old('penghasilan_ayah'); ?>"
                                        name="penghasilan_ayah" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('penghasilan_ayah') == '') ? 'Bagian penghasilan_ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('penghasilan_ayah')); ?>
                                    </div>
                                </div>
                                <!-- end Pneghasilan ayah -->
                                <div class="mb20 has-validation">
                                    <label for="alamat_ayah" class="form-label">Alamat Ayah / Wali
                                    </label>
                                    <textarea disabled required
                                        class="form-control <?= ($validation->hasError('alamat_ayah')) ? 'is-invalid' : ''; ?>"
                                        name="alamat_ayah" name="alamat_ayah"
                                        rows="5"><?= ($keluarga != null) ? $keluarga['alamat_ayah'] : old('alamat_ayah'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('alamat_ayah') == '') ? 'Bagian alamat_ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_ayah')); ?>
                                    </div>
                                </div>
                                <!-- end alamat -->
                            </div>
                            <!-- Ayah / Wali -->
                            <div class="col-12 col-md-6">
                                <div class="mb20 has-validation">
                                    <label for="nama_ibu" class="form-label">Nama Ibu / Wali </label>
                                    <input disabled type="text" required
                                        class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($keluarga != null) ? $keluarga['nama_ibu'] : old('nama_ibu'); ?>"
                                        name="nama_ibu" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('nama_ibu') == '') ? 'Bagian nama_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_ibu')); ?>
                                    </div>
                                </div>
                                <!-- end nama Ibu / Wali -->
                                <?php if ($identitas['id_status_peserta'] != 1) : ?>
                                <div class="mb20">
                                    <label for="usia_ibu" class="form-label">Usia Ibu / Wali </label>
                                    <input disabled type="number"
                                        class="form-control <?= ($validation->hasError('usia_ibu')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($keluarga != null) ? $keluarga['usia_ibu'] : old('usia_ibu'); ?>"
                                        id="usia_ibu" name="usia_ibu" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('usia_ibu') == '') ? 'Bagian nama wajib diisi' : $validation->getError('usia_ibu'); ?>
                                    </div>
                                </div>
                                <?php endif ?>
                                <!-- end usia -->
                                <div class="mb20 has-validation">
                                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu / Wali
                                    </label>
                                    <input disabled type="text" required
                                        class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($keluarga != null) ? $keluarga['pekerjaan_ibu'] : old('pekerjaan_ibu'); ?>"
                                        name="pekerjaan_ibu" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('pekerjaan_ibu') == '') ? 'Bagian pekerjaan_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('pekerjaan_ibu')); ?>
                                    </div>
                                </div>
                                <!-- end pekerjaan Ibu / Wali -->
                                <div class="mb20 has-validation">
                                    <label for="pendidikan_ibu" class="form-label">Pendidikan Terakhir Ibu / Wali
                                    </label>
                                    <select disabled required
                                        class="form-select <?= ($validation->hasError('pendidikan_ibu')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="pendidikan_ibu">
                                        <option selected hidden></option>
                                        <?php foreach ($pendidikan as $pendidikan_ibu) : ?>
                                        <option <?php if ($keluarga != null) {
                                                            if ($keluarga['pendidikan_ibu'] == $pendidikan_ibu) {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('pendidikan_ibu') == $pendidikan_ibu) {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="<?= $pendidikan_ibu; ?>">
                                            <?= $pendidikan_ibu; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('pendidikan_terakhir_ibu') == '') ? 'Bagian pendidikan_terakhir_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('pendidikan_terakhir_ibu')); ?>
                                    </div>
                                </div>
                                <!-- end Pendidikan Terakhir Ibu / Wali -->
                                <div class="mb20 has-validation">
                                    <label for="penghasilan_ibu" class="form-label">Penghasilan per Bulan Ibu / Wali
                                    </label>
                                    <input disabled type="number" required
                                        class="form-control <?= ($validation->hasError('penghasilan_ibu')) ? 'is-invalid' : ''; ?>"
                                        value="<?= ($keluarga != null) ? $keluarga['penghasilan_ibu'] : old('penghasilan_ibu'); ?>"
                                        name="penghasilan_ibu" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('penghasilan_ibu') == '') ? 'Bagian penghasilan_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('penghasilan_ibu')); ?>
                                    </div>
                                </div>
                                <!-- end Pneghasilan Ibu / Wali -->
                                <div class="mb20 has-validation">
                                    <label for="alamat_ibu" class="form-label">Alamat Ibu / Wali
                                    </label>
                                    <textarea disabled
                                        class="form-control <?= ($validation->hasError('alamat_ibu')) ? 'is-invalid' : ''; ?>"
                                        required name="alamat_ibu" id="alamat_ibu"
                                        rows="5"><?= ($keluarga != null) ? $keluarga['alamat_ibu'] : old('alamat_ibu'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('alamat_ibu') == '') ? 'Bagian alamat_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_ibu')); ?>
                                    </div>
                                </div>
                                <!-- end alamat -->
                            </div>
                            <!-- end Ibu / Wali -->
                        </div>
                        <!-- end kondisi keluarga -->
                        <!-- Apakah Calon Penerima Bantuan Terdaftar Sebegai  -->
                        <h3 class="mb20 fs20">C. Apakah Calon Penerima Bantuan Terdaftar Sebagai </h3>
                        <div class="row mb40">
                            <div class="col-12 col-md-6">
                                <div class="mb20">
                                    <label for="rtsm_rtm" class="form-label">Rumah Tangga Sangat Miskin (RTSM) / Rumah
                                        Tangga Miskin
                                        (RTM)? </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('rtsm_rtm')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="rtsm_rtm">
                                        <option selected hidden></option>
                                        <?php foreach ($opsional as $opsional_rstm) : ?>
                                        <option <?php if ($keluarga != null) {
                                                            if ($keluarga['rtsm_rtm'] == $opsional_rstm) {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('rtsm_rtm') == $opsional_rstm) {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="<?= $opsional_rstm; ?>">
                                            <?= ucfirst($opsional_rstm); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('rtsm_rtm') == '') ? 'Bagian rtsm_rtm  wajib diisi' : str_replace('_', ' ', $validation->getError('rtsm_rtm')); ?>
                                    </div>
                                </div>
                                <!-- end rtsm rtm -->
                                <div class="mb20">
                                    <label for="pkh_kks_kbs" class="form-label">Peserta Program Keluarga Harapan
                                        (PKH)/Kart
                                        Keluarga Sejahtera
                                        (KKS) dan Kartu Batang Sehat (KBS)?
                                    </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('pkh_kks_kbs')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="pkh_kks_kbs">
                                        <option selected hidden></option>
                                        <?php foreach ($opsional as $opsional_pkh) : ?>
                                        <option <?php if ($keluarga != null) {
                                                            if ($keluarga['pkh_kks_kbs'] == $opsional_pkh) {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('pkh_kks_kbs') == $opsional_pkh) {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="<?= $opsional_pkh; ?>">
                                            <?= ucfirst($opsional_pkh); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('pkh_kks_kbs') == '') ? 'Bagian nama  wajib diisi' : str_replace('_', ' ', $validation->getError('pkh_kks_kbs')); ?>
                                    </div>
                                </div>
                                <!-- end pkh kks kbs -->
                            </div>
                            <!-- end terdaftar sebagai kiri -->
                            <div class="col-12 col-md-6">
                                <div class="mb20">
                                    <label for="bsm_kip" class="form-label">Penerimaan BSM atau Kartu Indonesia Pintar
                                        (KIP)
                                    </label>
                                    <select disabled
                                        class="form-select <?= ($validation->hasError('bsm_kip')) ? 'is-invalid' : ''; ?>"
                                        aria-label="Default select example" name="bsm_kip">
                                        <option selected hidden></option>
                                        <?php foreach ($opsional as $opsional_bsm) : ?>
                                        <option <?php if ($keluarga != null) {
                                                            if ($keluarga['bsm_kip'] == $opsional_bsm) {
                                                                echo 'selected';
                                                            };
                                                        } else {
                                                            if (old('bsm_kip') == $opsional_bsm) {
                                                                echo 'selected';
                                                            }
                                                        } ?> value="<?= $opsional_bsm; ?>">
                                            <?= ucfirst($opsional_bsm); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('bsm_kip') == '') ? 'Bagian nama  wajib diisi' : str_replace('_', ' ', $validation->getError('bsm_kip')); ?>
                                    </div>
                                </div>
                                <!-- end bsm kip -->
                            </div>
                            <!-- end terdaftar sebagai kanan -->
                        </div>
                        <!-- end terdaftar sebagai -->
                        <!-- prestasi -->
                        <h3 class="mb20 fs20">D. Prestasi
                        </h3>
                        <div class="pb40">
                            <?php if ($file != null) {
                                    $n = count($prestasi);
                                } else {
                                    $n = 3;
                                } ?>
                            <?php for ($i = 1; $i <= $n; $i++) { ?>
                            <div class="row">
                                <!-- file prestasi -->
                                <div class="col-6 col-md-2">
                                    <div class="mb20">
                                        <label for="prestasi" class="form-label">Scan Prestasi
                                        </label>
                                        <input disabled
                                            class="form-control  <?= ($validation->hasError('scan_prestasi_' . $i)) ? 'is-invalid' : ''; ?>"
                                            name="scan_prestasi_review<?= $i; ?>" id="file_prestasi_review<?= $i; ?>"
                                            type="text" accept="application/pdf"
                                            value="<?= $prestasi[$i - 1]['file_prestasi']; ?>" />
                                    </div>
                                </div>
                                <!-- end file prestasi -->
                                <div class="col-6 col-md-2">
                                    <div class="mb20">
                                        <label for="nama_prestasi_review<?= $i; ?>" class="form-label">Nama Prestasi
                                        </label>
                                        <input disabled type="text"
                                            class="form-control <?= ($validation->hasError('nama_prestasi_review' . $i)) ? 'is-invalid' : ''; ?>"
                                            value="<?= ($prestasi[$i - 1] != null) ? $prestasi[$i - 1]['nama_prestasi'] : old('nama_prestasi_review' . $i); ?>"
                                            name="nama_prestasi_review<?= $i; ?>" placeholder="" />
                                    </div>
                                </div>
                                <!-- end nama prestasi -->
                                <div class="col-4 col-md-2">
                                    <div class="mb20">
                                        <label for="kategori_<?= $i; ?>" class="form-label">Kategori Prestasi
                                        </label>
                                        <select disabled
                                            class="form-select <?= ($validation->hasError('kategori_' . $i)) ? 'is-invalid' : ''; ?>"
                                            aria-label="Default select example" name="kategori_<?= $i; ?>"
                                            id="kategori_<?= $i; ?>">
                                            <?php foreach ($kategori as $data_kategori) : ?>
                                            <option onchange="kategori_prestasi()" <?php
                                                                                                if (old('kategori_' . $i) == $data_kategori) {
                                                                                                    echo 'selected';
                                                                                                } else if ($prestasi[$i - 1] != null && $prestasi[$i - 1]['kategori'] == $data_kategori) {
                                                                                                    echo 'selected';
                                                                                                } ?>
                                                value="<?= $data_kategori; ?>">
                                                <?= ucfirst($data_kategori); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- end kategori -->
                                <div class="col-3 col-md-2">
                                    <div class="mb20">
                                        <label for="tingkat_<?= $i; ?>" class="form-label">Tingkat Prestasi
                                        </label>
                                        <select disabled
                                            class="form-select <?= ($validation->hasError('tingkat_' . $i)) ? 'is-invalid' : ''; ?>"
                                            aria-label="Default select example" name="tingkat_<?= $i; ?>"
                                            id="review_tingkat_<?= $i; ?>">
                                            <option selected></option>
                                            <?php foreach ($tingkat as $data_tingkat) : ?>
                                            <option
                                                <?= ($prestasi[$i - 1]['tingkat'] == $data_tingkat) ? 'selected' : ''; ?>
                                                value="<?= $data_tingkat; ?>">
                                                <?= $data_tingkat; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- end tingkat prestasi -->
                                </div>
                                <!-- end tingkat -->
                                <div class="col-3 col-md-2">
                                    <div class="mb20">
                                        <label for="juara_<?= $i; ?>" class="form-label">Juara

                                        </label>
                                        <select disabled
                                            class="form-select <?= ($validation->hasError('juara_' . $i)) ? 'is-invalid' : ''; ?>"
                                            aria-label="Default select example" id="review_juara_<?= $i; ?>"
                                            name="juara_<?= $i; ?>">
                                            <option selected></option>
                                            <?php foreach ($juara as $data_juara) : ?>
                                            <option <?php
                                                                if ($prestasi[$i - 1] != null) {
                                                                    if ($prestasi[$i - 1]['juara'] == $data_juara) {
                                                                        echo 'selected';
                                                                    }
                                                                } ?> value="<?= $data_juara; ?>">
                                                <?= ucfirst($data_juara); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- end juara -->
                                <div class="col-2">
                                    <div class="mb20">
                                        <label for="tahun_prestasi_review<?= $i; ?>" class="form-label">Tahun

                                        </label>
                                        <input disabled type="number"
                                            class="form-control <?= ($validation->hasError('tahun_prestasi_review' . $i)) ? 'is-invalid' : ''; ?>"
                                            value="<?= ($prestasi[$i - 1] != null) ? $prestasi[$i - 1]['tahun_prestasi'] : old('tahun_prestasi_review' . $i); ?>"
                                            name="tahun_prestasi_review<?= $i; ?>" placeholder="" min="2010"
                                            max="2022" />
                                    </div>
                                </div>
                                <!-- end tahun_prestasi -->
                                <hr>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- end prestasi -->
                        <!-- lampiran dokumen -->
                        <h3 class="mb20 fs20">E. Lampiran Dokumen</h3>
                        <div class="row pb40">
                            <div class="col-12 col-md-6">
                                <div class="mb20">
                                    <label for="label_scan_kk" class="form-label">Scan Kartu Keluarga (KK)</label>
                                    <input disabled
                                        class="form-control custom-file-input   <?= ($validation->hasError('scan_kk')) ? 'is-invalid' : ''; ?>"
                                        name="scan_kk" type="text" accept="application/pdf" id="kk"
                                        value=" <?= $file['kk']; ?>" />
                                </div>
                                <!-- end scan KK -->
                                <div class="mb20">
                                    <label for="label_scan_ktp" class="form-label">Scan Kartu Tanda Penduduk (KTP)
                                    </label>
                                    <input disabled
                                        class="form-control <?= ($validation->hasError('scan_ktp')) ? 'is-invalid' : ''; ?>"
                                        name="scan_ktp" type="text" accept="application/pdf" id="ktp"
                                        value="<?= $file['ktp']; ?>" />
                                </div>
                                <!-- end scan KTP -->
                                <?php if ($identitas['id_status_peserta'] == 1) : ?>
                                <div class="mb20">
                                    <label for="label_scan_kartu_pelajar" class="form-label">Scan Kartu Pelaja
                                    </label>
                                    <input disabled
                                        class="form-control <?= ($validation->hasError('scan_kartu_pelajar')) ? 'is-invalid' : ''; ?>"
                                        name="scan_kartu_pelajar" type="text" accept="application/pdf"
                                        id="kartu_pelajar" value="<?= $file['kartu_pelajar']; ?>" />
                                </div>
                                <!-- end scan Kartu pelajar -->
                                <?php else : ?>
                                <div class="mb20">
                                    <label for="label_scan_kartu_pelajar" class="form-label">Scan Kartu Mahasiswa
                                    </label>
                                    <input disabled
                                        class="form-control <?= ($validation->hasError('scan_kartu_pelajar')) ? 'is-invalid' : ''; ?>"
                                        name="scan_kartu_pelajar" type="text" value="<?= $file['kartu_pelajar']; ?>"
                                        accept="application/pdf" id="kartu_pelajar" />
                                </div>
                                <!-- end scan Kartu Mahasiswa -->
                                <?php endif ?>
                                <div class="mb20">
                                    <label for="label_scan_pas_foto" class="form-label">Upload Foto Berwarna
                                    </label>
                                    <input disabled hidden
                                        class="form-control <?= ($validation->hasError('scan_pas_foto')) ? 'is-invalid' : ''; ?> lampiran-foto-review"
                                        data-allowed-file-extensions="jpg jpeg png " data-height="100"
                                        data-max-file-size="2M" name="scan_pas_foto" type="file" accept="image/*"
                                        id="pas_foto"
                                        data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['pas_foto']; ?>" />
                                </div>
                                <!-- end scan_pas_foto -->
                            </div>
                            <div class="col-12 col-md-6">
                                <?php if ($identitas['id_status_peserta'] == 1) : ?>
                                <div class="mb20">
                                    <label for="label_scan_raport_smt" class="form-label">Scan Nilai Raport Semester
                                        Terakhir
                                    </label>
                                    <input disabled
                                        class="form-control <?= ($validation->hasError('scan_raport_smt')) ? 'is-invalid' : ''; ?>"
                                        name="scan_raport_smt" type="text" value="<?= $file['raport_smt']; ?>"
                                        accept="application/pdf" id="raport_smt" />
                                </div>
                                <!-- end scan raport smt terakhir -->
                                <div class="mb20">
                                    <label for="label_scan_raport" class="form-label">Scan Raport Legalisasi
                                    </label>
                                    <input disabled
                                        class="form-control <?= ($validation->hasError('scan_raport')) ? 'is-invalid' : ''; ?>"
                                        name="scan_raport" type="text" value="<?= $file['raport_legalisasi']; ?>"
                                        accept="application/pdf" id="raport" />
                                </div>
                                <!-- end scan raport legalisasi -->
                                <?php endif ?>
                                <div class="mb20">
                                    <label for="label_scan_sktm" class="form-label">Scan Surat Keterangan Tidak Mampu
                                    </label>
                                    <input disabled
                                        class="form-control <?= ($validation->hasError('scan_sktm')) ? 'is-invalid' : ''; ?>"
                                        name="scan_sktm" accept="application/pdf" type="text"
                                        value="<?= $file['sktm']; ?>" id="sktm" />
                                </div>
                                <!-- end SKTM -->
                                <?php if ($identitas['id_status_peserta'] == 2) : ?>
                                <div class="mb20">
                                    <label for="label_scan_diterima_pt" class="form-label">Scan Keterangan Diterima
                                        Perguruan Tinggi
                                    </label>
                                    <input disabled
                                        class="form-control <?= ($validation->hasError('scan_diterima_pt')) ? 'is-invalid' : ''; ?>"
                                        name="scan_diterima_pt" type="text" value="<?= $file['diterima_pt']; ?>"
                                        accept="application/pdf" id="diterima_pt" />
                                </div>
                                <!-- end scan diterima perguruan tinggi-->
                                <?php elseif ($identitas['id_status_peserta'] == 3) : ?>
                                <div class="mb20">
                                    <label for="label_scan_akreditasi_pt" class="form-label">Scan Keterangan Akreditasi
                                        Perguruan
                                        Tinggi
                                    </label>
                                    <input disabled
                                        class="form-control <?= ($validation->hasError('scan_akreditasi_pt')) ? 'is-invalid' : ''; ?>"
                                        name="scan_akreditasi_pt" type="text" value="<?= $file['akreditasi_pt']; ?>"
                                        accept="application/pdf" id="akreditasi_pt" />
                                </div>
                                <!-- end scan akreditasi perguruan tinggi-->
                                <?php endif ?>
                                <?php if ($identitas['id_status_peserta'] != 1) : ?>
                                <div class="mb20">
                                    <label for="label_scan_proposal" class="form-label">Scan Proposal Bantuan
                                    </label>
                                    <input disabled
                                        class="form-control <?= ($validation->hasError('scan_proposal')) ? 'is-invalid' : ''; ?>"
                                        value="<?= $file['proposal']; ?>" name="scan_proposal" type="text"
                                        value="<?= $file['proposal']; ?>" accept="application/pdf" id="proposal" />
                                </div>
                                <!-- end scan_proposal -->
                                <?php endif ?>
                            </div>
                        </div>

                        <!-- end lampiran dokumen -->

                        <!-- SAVE  Modal -->
                        <div class="modal fade" id="ajukan_modal" tabindex="-1" aria-labelledby="saveModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title bold" id="saveModalLabel">
                                            Yakin ingin mengajukan bantuan biaya pendidikan?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Pastikan data dan berkas yang di upload sudah sesuai.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary fw-normal"
                                            data-bs-dismiss="modal">
                                            Batal
                                        </button>
                                        <button type="submit" class="btn btn-success fw-normal">Ajukan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php endif ?>
                </div>
                <!-- end review pendaftaran -->
            </div>

            <!-- Selanjutnya  Modal -->
            <div class="modal fade" id="selanjutnya_modal" tabindex="-1" aria-labelledby="saveModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Anda harus mengisi form dan menyimpannya terlebih dahulu.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                Oke
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End form pendaftaran -->

<!-- Wizard -->
<script type="text/javascript">
    // alert invalid form fields
$('form').on('submit', function(e) {
    // alert("Page is loaded");
    $(document).ready(function() {
    var numItems = $('.was-validated').length
    if(numItems > 0){
        $('.pesan-gagal').show();
    }
    });
});
    // jika terdapat error dalam input prestasi 2
<?php if ($validation->getError('scan_prestasi_2') != null || $validation->getError('nama_prestasi_2') != null || $validation->getError('kategori_2') != null || $validation->getError('tahun_prestasi_2') != null) : ?>
$(document).ready(function() {
    $("#prestasi_2").show();
    // $("#prestasi_2_modal").show();
    $("#icon-tambah-1").hide();
    $("#label-tambah-1").hide();
});
<?php else: ?>
    $(document).ready(function() {
        $("#prestasi_2").hide();
        // $("#prestasi_2_modal").show();
        $("#icon-tambah-1").show();
        $("#label-tambah-1").show();
    });
<?php endif ?>

// jika terdapat error dalam input prestasi 3
<?php if ($validation->getError('scan_prestasi_3') != null || $validation->getError('nama_prestasi_3') != null || $validation->getError('kategori_3') != null || $validation->getError('tahun_prestasi_3') != null) : ?>
$(document).ready(function() {
    // pretasi 3
    $("#prestasi_3").show();
    // $("#prestasi_2_modal").show();
    $("#icon-tambah-2").hide();
    $("#label-tambah-2").hide();

    // prestasi 2
    $("#prestasi_2").show();
    // $("#prestasi_2_modal").show();
    $("#icon-tambah-1").hide();
    $("#label-tambah-1").hide();
});
<?php else: ?>
    $(document).ready(function() {
        $("#prestasi_3").hide();
        // $("#prestasi_2_modal").show();
        $("#icon-tambah-2").show();
        $("#label-tambah-2").show();
    });
    <?php endif ?>
    
// Smartwizard
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
            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
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
        // form identitas belum diisi
        <?php if ($identitas == null) : ?>
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $(
                    `<button type="button" data-bs-toggle="modal" data-bs-target="#save_modal" class="simpan"></button>`
                )
                .text('Simpan')
                .addClass('btn btn-success btn-simpan')
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [2, 3, 4, 5], // Array Steps disabled

        // form keluarga belum diisi dan identitas sudah diisi
        <?php elseif ($keluarga == null && $identitas != null) : ?>
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $(
                    `<button type="button" data-bs-toggle="modal" data-bs-target="#save_modal_keluarga" class="simpan"></button>`
                )
                .text('Simpan')
                .addClass('btn btn-success btn-simpan')
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [3, 4, 5], // Array Steps disabled

        // form lampiran
        <?php elseif ($file == null && $keluarga != null && $identitas != null) : ?>
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $(
                    `<button type="button" data-bs-toggle="modal" data-bs-target="#save_modal_lampiran" class="simpan"></button>`
                )
                .text('Simpan')
                .addClass('btn btn-success btn-simpan')
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [4, 5], // Array Steps disabled

        // form kirim ulang formulir pendaftaran
        <?php elseif ($file != null && $file['formulir_pendaftaran'] == null && $keluarga != null && $identitas != null) : ?>
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $(
                    `<button type="button" data-bs-toggle="modal" data-bs-target="#save_formulir_modal" class="simpan"></button>`
                )
                .text('Simpan')
                .addClass('btn btn-success btn-simpan')
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [5], // Array Steps disabled

        // review pendaftaran
        <?php elseif ($file != null && $file['formulir_pendaftaran'] != null && $keluarga != null && $identitas != null) : ?>
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $(
                    `<button type="button" data-bs-toggle="modal" data-bs-target="#ajukan_modal" class="simpan"></button>`
                )
                .text('Ajukan')
                .addClass('btn btn-success btn-simpan')
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [], // Array Steps disabled
        <?php endif ?>
        errorSteps: [], // Highlight step with errors
        hiddenSteps: [] // Hidden steps
    });

    // form identitas belum diisi
    <?php if ($identitas == null) : ?>
    $('.sw-btn-next').attr({
        "data-bs-toggle": "modal",
        "data-bs-target": "#selanjutnya_modal"
    });
    // Initialize the leaveStep event
    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
        stepDirection) {
        if (stepDirection == 'forward') {
            return false;
        }
    });
    // form keluarga belum diisi dan identitas sudah diisi
    <?php elseif ($keluarga == null && $identitas != null) : ?>
    // Go to step 1
    $('#smartwizard').smartWizard("next");
    $('.sw-btn-next').attr({
        "data-bs-toggle": "modal",
        "data-bs-target": "#selanjutnya_modal"
    });
    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
        stepDirection) {
        if (stepDirection == 'forward') {
            $(".simpan").show();
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
            if (nextStepIndex == 2) {
                return false;
            } else {
                return true
            }
        } else if (stepDirection == 'backward' && currentStepIndex == 2) {
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
            return true
        } else if (stepDirection == 'backward') {
            $('.sw-btn-next').attr({
                "data-bs-target": "#bukan_selanjutnya_modal"
            });
            $(".simpan").hide();
            return true
        } else {
            $(".simpan").hide();
        }
    });
    // form lampiran belum diisi
    <?php elseif ($file == null && $keluarga != null && $identitas != null) : ?>
    // Go to step 2
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('.sw-btn-next').attr({
        "data-bs-toggle": "modal",
        "data-bs-target": "#selanjutnya_modal"
    });
    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
        stepDirection) {
        // jika masuk ke tahap 3
        if (stepDirection == 'forward' && nextStepIndex == 2) {
            $(".simpan").show();
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
        } else if (stepDirection == 'forward' && nextStepIndex == 3) {
            return false;
        } else if (stepDirection == 'backward' && currentStepIndex == 3) {
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
            return true
        } else if (stepDirection == 'backward') {
            $('.sw-btn-next').attr({
                "data-bs-target": "#bukan_selanjutnya_modal"
            });
            $(".simpan").hide();
            return true
        } else {
            $(".simpan").hide();
        }
    });
    // form formulir pendaftaran belum diisi
    <?php elseif ($file != null && $file['formulir_pendaftaran'] == null && $keluarga != null && $identitas != null) : ?>
    // Go to step 3
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('.sw-btn-next').attr({
        "data-bs-toggle": "modal",
        "data-bs-target": "#selanjutnya_modal"
    });
    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
        stepDirection) {
        // jika masuk ke tahap 3
        if (stepDirection == 'forward' && nextStepIndex == 3) {
            $(".simpan").show();
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
        } else if (stepDirection == 'forward' && nextStepIndex == 4) {
            return false;
        } else if (stepDirection == 'backward' && currentStepIndex == 4) {
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
            return true
        } else if (stepDirection == 'backward') {
            $('.sw-btn-next').attr({
                "data-bs-target": "#bukan_selanjutnya_modal"
            });
            $(".simpan").hide();
            return true
        } else {
            $(".simpan").hide();
        }
    });
    // review pendaftaran
    <?php elseif ($file != null && $file['formulir_pendaftaran'] != null && $keluarga != null && $identitas != null) : ?>
    // Go to step 4
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('.sw-btn-next').attr({
        "data-bs-toggle": "modal",
        "data-bs-target": "#selanjutnya_modal"
    });

    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
        stepDirection) {
        // jika masuk ke tahap 3
        if (stepDirection == 'forward' && nextStepIndex == 4) {
            $(".simpan").show();
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
        } else if (stepDirection == 'forward' && nextStepIndex == 5) {
            return false;
        } else if (stepDirection == 'backward' && currentStepIndex == 5) {
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
            return true
        } else if (stepDirection == 'backward') {
            $('.sw-btn-next').attr({
                "data-bs-target": "#bukan_selanjutnya_modal"
            });
            $(".simpan").hide();
            return true
        } else {
            $(".simpan").hide();
        }
    });
    <?php endif ?>
});

// dropify upload foto berwarna pendaftar
$(".lampiran-foto-pendaftaran").dropify({
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
$(".lampiran-foto-review").dropify({
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
<!-- Garis progress -->
<?php if ($identitas == null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 20%;
}
</style>
<?php elseif ($keluarga == null && $identitas != null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 40%;
}
</style>
<?php elseif ($file == null && $keluarga != null && $identitas != null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 60%;
}
</style>
<?php elseif ($file != null && $file['formulir_pendaftaran'] == null && $keluarga != null && $identitas != null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 80%;
}
</style>
<?php elseif ($file != null && $file['formulir_pendaftaran'] != null && $keluarga != null && $identitas != null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 100%;
}
</style>

<?php endif ?>


<?= $this->endSection(); ?>