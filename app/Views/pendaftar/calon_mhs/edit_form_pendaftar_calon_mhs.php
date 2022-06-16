<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>

<!-- Form pendaftaran -->
<div class="bg-abu py40">
    <div class="edit__calon container">
        <form action="<?= base_url(); ?>/calon_mhs/simpan_edit_calon_mhs/<?= $identitas['no_induk']; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

            <h3 class="mb20 biru fw-bold">Ubah <span class="orange">Data Pendaftaran</span></h3>
            <!-- Btn Ubah data -->
            <h3 class="mb20">A. Identitas Diri</h3>
            <div class="row mb40">
                <div class="col-12 col-md-6">
                    <div class="mb20 has-validation">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap </label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['nama_lengkap'] : old('nama_lengkap'); ?>" name="nama_lengkap" placeholder="" required />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('nama_lengkap') == '') ? 'Bagian nama lengkap  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_lengkap')); ?>
                        </div>
                    </div>
                    <!-- end nama lengkap -->
                    <div class="mb20 has-validation">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <!-- radio button -->
                        <!-- <select required 
                            class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>"
                            aria-label="Default select example" name="jenis_kelamin">
                            <option hidden></option> -->
                        <div class="form-check">
                            <input required type="radio" class="form-check-input" name="jenis_kelamin" id="L" <?php if ($identitas != null) {
                                                                                                                    if ($identitas['jenis_kelamin'] == 'L') {
                                                                                                                        echo 'checked';
                                                                                                                    };
                                                                                                                } else {
                                                                                                                    if (old('jenis_kelamin') == 'L') {
                                                                                                                        echo 'checked';
                                                                                                                    }
                                                                                                                } ?> value="L">
                            <label class="form-check-label" for="L">
                                Laki - laki
                            </label>
                            <input required type="radio" class="form-check-input" name="jenis_kelamin" id="P" <?php if ($identitas != null) {
                                                                                                                    if ($identitas['jenis_kelamin'] == 'P') {
                                                                                                                        echo 'checked';
                                                                                                                    };
                                                                                                                } else {
                                                                                                                    if (old('jenis_kelamin') == 'P') {
                                                                                                                        echo 'checked';
                                                                                                                    }
                                                                                                                } ?> value="P">
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
                    <div class="mb20 has-validation">
                        <label for="no_induk" class="form-label">NIK </label>
                        <input type="number" name="no_induk" required class="form-control <?= ($validation->hasError('no_induk')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_induk'] : old('no_induk'); ?>" name="no_induk" placeholder="" min="0" max="9999999999999999" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_induk') == '') ? 'Bagian NIK  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk')) ?>
                        </div>
                    </div>
                    <!-- end NIK -->
                    <div class="mb20 has-validation">
                        <label for="no_induk_pelajar" class="form-label">NISN </label>
                        <input type="text" maxlength="25" required class="form-control <?= ($validation->hasError('no_induk_pelajar')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_induk_pelajar'] : old('no_induk_pelajar'); ?>" name="no_induk_pelajar" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_induk_pelajar') == '') ? 'Bagian NIS/NISN  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk_pelajar')) ?>
                        </div>
                    </div>
                    <!-- end NIS -->
                    <div class="mb20 has-validation">
                        <label for="ttl" class="form-label">Tempat, Tanggal Lahir
                        </label>
                        <input type="text" class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>" required value="<?= ($identitas != null) ? $identitas['ttl'] : old('ttl'); ?>" name="ttl" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('ttl') == '') ? 'Bagian tempat, tanggal lahir  wajib diisi' : str_replace('_', ' ', $validation->getError('ttl')) ?>
                        </div>
                    </div>
                    <!-- end Tempat, Tanggal Lahir -->
                    <div class="mb20 has-validation">
                        <label for="agama" class="form-label">Agama </label>
                        <select class="form-select <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" required aria-label="Default select example" name="agama">
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
                                        } ?> value="<?= $agama['id_agama']; ?>"><?= $agama['nama_agama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('agama') == '') ? 'Bagian agama wajib diisi' : str_replace('_', ' ', $validation->getError('agama')) ?>
                        </div>
                    </div>
                    <!-- end agama -->
                    <div class="mb20 has-validation">
                        <label for="no_telepon" class="form-label">Nomer Telepon </label>
                        <input type="text" min="0" max="999999999999999" required class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_telepon'] : old('no_telepon'); ?>" name="no_telepon" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_telepon') == '') ? 'Bagian no telepon  wajib diisi dan kurang dari 15 angka' : str_replace('_', ' ', $validation->getError('no_telepon')) ?>
                        </div>
                    </div>
                    <!-- end Nomer Telepon -->
                    <div class="mb20 has-validation">
                        <label for="pernah_menerima_bantuan" class="form-label">Apakah Calon Penerima Beasiswa Pernah
                            Menerima Bantuan? </label>
                        <!-- <select required id="pernah_menerima_bantuan" 
                            class="form-select <?= ($validation->hasError('pernah_menerima_bantuan')) ? 'is-invalid' : ''; ?>"
                            aria-label="Default select example" name="pernah_menerima_bantuan">
                            <option selected hidden></option> -->
                        <div class="form-check">

                            <?php foreach ($opsional as $opsional_pernah_penerima) : ?>
                                <input class="form-check-input" type="radio" required name="pernah_menerima_bantuan" id="pernah_menerima_bantuan_<?= $opsional_pernah_penerima; ?>" <?php if ($identitas != null) {
                                                                                                                                                                                        if ($identitas['pernah_menerima_bantuan'] == $opsional_pernah_penerima) {
                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                        };
                                                                                                                                                                                    } else {
                                                                                                                                                                                        if (old('pernah_menerima_bantuan') == $opsional_pernah_penerima) {
                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                        }
                                                                                                                                                                                    } ?> value="<?= $opsional_pernah_penerima; ?>">
                                <label class="form-check-label" for="pernah_menerima_bantuan_<?= $opsional_pernah_penerima; ?>">
                                    <?= ucfirst($opsional_pernah_penerima); ?>
                                </label>
                            <?php endforeach; ?>

                        </div>
                        <!-- </select> -->
                        <div class="invalid-feedback">
                            <?= ($validation->getError('pernah_menerima_bantuan') == '') ? 'Bagian pernah menerima bantuan  wajib diisi' : str_replace('_', ' ', $validation->getError('pernah_menerima_bantuan')); ?>
                        </div>
                    </div>
                    <!-- end pernah menerima bantuan -->
                    <div class="mb20">
                        <label for="menerima_bantuan_dari" class="form-label">Jika Ya, Menerima Bantuan
                            Dari</label>
                        <input id="menerima_bantuan_dari" id="menerima_bantuan_dari" type="text" maxlength="16" class="form-control <?= ($validation->hasError('menerima_bantuan_dari')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['menerima_bantuan_dari'] : old('menerima_bantuan_dari'); ?>" name="menerima_bantuan_dari" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('menerima_bantuan_dari') == '') ? 'Bagian no telepon  wajib diisi' : str_replace('_', ' ', $validation->getError('menerima_bantuan_dari')) ?>
                        </div>
                    </div>
                    <!-- end menerima_bantuan_dari -->
                </div>
                <div class="col-12 col-md-6">
                    <div class="alamat mb20 has-validation">
                        <label for="alamat_rumah" class="form-label">Alamat Rumah </label>
                        <small>* Pengisian alamat rumah : jalan, dukuh, rt/rw, dan desa</small>
                        <textarea required class="form-control mb-2 <?= ($validation->hasError('alamat_rumah')) ? 'is-invalid' : ''; ?>" name="alamat_rumah" id="alamat_rumah" rows="4"><?= ($identitas != null) ? $identitas['alamat_rumah'] : old('alamat_rumah'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('alamat_rumah') == '') ? 'Bagian alamat rumah  wajib diisi' : $validation->getError('alamat_rumah'); ?>
                        </div>
                    </div>
                    <!-- end alamat -->
                    <div class="mb20 has-validation">
                        <label for="kecamatan" class="form-label">Kecamatan </label>
                        <select class="form-select <?= ($validation->hasError('kecamatan')) ? 'is-invalid' : ''; ?>" required aria-label="Default select example" name="kecamatan">
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
                    <div class="mb20 has-validation">
                        <label for="nama_pt" class="form-label">Nama Perguruan Tinggi
                        </label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_pt')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['nama_pt'] : old('nama_pt'); ?>" id="nama_pt" placeholder="" name="nama_pt" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('nama_pt') == '') ? 'Bagian nama perguruan tinggiwajib diisi' : $validation->getError('nama_pt'); ?>
                        </div>
                    </div>
                    <!-- end nama_pt -->
                    <div class="mb20">
                        <label for="akreditasi_pt" class="form-label">Akrediktasi Perguruan Tinggi
                        </label>
                        <select class="form-select <?= ($validation->hasError('akreditasi_pt')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="akreditasi_pt">
                            <option selected hidden></option>
                            <?php foreach ($akreditasi_pt as $akreditasi_pt) : ?>
                                <option <?php if ($identitas != null) {
                                            if ($identitas['akreditasi_pt'] == $akreditasi_pt) {
                                                echo 'selected';
                                            };
                                        } else {
                                            if (old('akreditasi_pt') == $akreditasi_pt) {
                                                echo 'selected';
                                            }
                                        } ?> value="<?= $akreditasi_pt; ?>">
                                    <?= $akreditasi_pt; ?></option>
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
                        <input type="number" class="form-control <?= ($validation->hasError('tahun_masuk_pt')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['tahun_masuk_pt'] : old('tahun_masuk_pt'); ?>" name="tahun_masuk_pt" placeholder="" min="2010" max="2022" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('tahun_masuk_pt') == '') ? 'Bagian tahun masuk perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('tahun_masuk_pt')); ?>
                        </div>
                    </div>
                    <!-- end tahun_masuk_pt -->
                    <div class="mb20">
                        <label for="semester_ke" class="form-label">Semester ke
                        </label>
                        <select class="form-select <?= ($validation->hasError('semester_ke')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="semester_ke">
                            <option selected hidden></option>
                            <?php foreach ($semester_ke as $semester_ke) : ?>
                                <option <?php if ($identitas != null) {
                                            if ($identitas['semester_ke'] == $semester_ke) {
                                                echo 'selected';
                                            };
                                        } else {
                                            if (old('semester_ke') == $semester_ke) {
                                                echo 'selected';
                                            }
                                        } ?> value="<?= $semester_ke; ?>">
                                    <?= $semester_ke; ?></option>
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
                        <textarea class="form-control <?= ($validation->hasError('alamat_pt')) ? 'is-invalid' : ''; ?>" name="alamat_pt" id="alamat_pt" rows="1"><?= ($identitas != null) ? $identitas['alamat_pt'] : old('alamat_pt'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('alamat_pt') == '') ? 'Bagian alamat perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('alamat_pt')); ?>
                        </div>
                    </div>
                    <!-- end alamat perguruan tinggi-->
                </div>
            </div>
            <!-- end identitas diri -->
            <h3 class="mb20">B. Kondisi Keluarga</h3>
            <div class="row mb40">
                <div class="col-12 col-md-6">
                    <div class="mb20">
                        <label for="nama_ayah" class="form-label">Nama Ayah / Wali </label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['nama_ayah'] : old('nama_ayah'); ?>" name="nama_ayah" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('nama_ayah') == '') ? 'Bagian nama_ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_ayah')); ?>
                        </div>
                    </div>
                    <!-- end nama ayah -->
                    <div class="mb20">
                        <label for="usia" class="form-label">Usia Ayah / Wali </label>
                        <input type="number" class="form-control <?= ($validation->hasError('usia_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['usia_ayah'] : old('usia_ayah'); ?>" id="usia_ayah" name="usia_ayah" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('usia_ayah') == '') ? 'Bagian nama wajib diisi' : $validation->getError('usia_ayah'); ?>
                        </div>
                    </div>
                    <!-- end usia -->
                    <div class="mb20">
                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah / Wali
                        </label>
                        <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['pekerjaan_ayah'] : old('pekerjaan_ayah'); ?>" name="pekerjaan_ayah" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('pekerjaan_ayah') == '') ? 'Bagian nama  wajib diisi' : str_replace('_', ' ', $validation->getError('pekerjaan_ayah')); ?>
                        </div>
                    </div>
                    <!-- end pekerjaan ayah -->
                    <div class="mb20">
                        <label for="pendidikan_ayah" class="form-label">Pendidikan Terakhir Ayah / Wali
                        </label>
                        <select class="form-select <?= ($validation->hasError('pendidikan_ayah')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="pendidikan_ayah">
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
                    <div class="mb20">
                        <label for="penghasilan_ayah" class="form-label">Penghasilan per Bulan Ayah / Wali
                        </label>
                        <input type="number" class="form-control <?= ($validation->hasError('penghasilan_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['penghasilan_ayah'] : old('penghasilan_ayah'); ?>" name="penghasilan_ayah" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('penghasilan_ayah') == '') ? 'Bagian penghasilan_ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('penghasilan_ayah')); ?>
                        </div>
                    </div>
                    <!-- end Pneghasilan ayah -->
                    <div class="mb20">
                        <label for="alamat_ayah" class="form-label">Alamat Ayah / Wali
                        </label>
                        <textarea class="form-control <?= ($validation->hasError('alamat_ayah')) ? 'is-invalid' : ''; ?>" name="alamat_ayah" name="alamat_ayah" rows="5"><?= ($keluarga != null) ? $keluarga['alamat_ayah'] : old('alamat_ayah'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('alamat_ayah') == '') ? 'Bagian alamat_ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_ayah')); ?>
                        </div>
                    </div>
                    <!-- end alamat -->
                </div>
                <!-- Ayah / Wali -->
                <div class="col-12 col-md-6">
                    <div class="mb20">
                        <label for="nama_ibu" class="form-label">Nama Ibu / Wali </label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['nama_ibu'] : old('nama_ibu'); ?>" name="nama_ibu" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('nama_ibu') == '') ? 'Bagian nama_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_ibu')); ?>
                        </div>
                    </div>
                    <!-- end nama Ibu / Wali -->
                    <div class="mb20">
                        <label for="usia_ibu" class="form-label">Usia Ibu / Wali </label>
                        <input type="number" class="form-control <?= ($validation->hasError('usia_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['usia_ibu'] : old('usia_ibu'); ?>" id="usia_ibu" name="usia_ibu" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('usia_ibu') == '') ? 'Bagian nama wajib diisi' : $validation->getError('usia_ibu'); ?>
                        </div>
                    </div>
                    <!-- end usia -->
                    <div class="mb20">
                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu / Wali
                        </label>
                        <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['pekerjaan_ibu'] : old('pekerjaan_ibu'); ?>" name="pekerjaan_ibu" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('pekerjaan_ibu') == '') ? 'Bagian pekerjaan_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('pekerjaan_ibu')); ?>
                        </div>
                    </div>
                    <!-- end pekerjaan Ibu / Wali -->
                    <div class="mb20">
                        <label for="pendidikan_ibu" class="form-label">Pendidikan Terakhir Ibu / Wali
                        </label>
                        <select class="form-select <?= ($validation->hasError('pendidikan_ibu')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="pendidikan_ibu">
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
                    <div class="mb20">
                        <label for="penghasilan_ibu" class="form-label">Penghasilan per Bulan Ibu / Wali
                        </label>
                        <input type="number" class="form-control <?= ($validation->hasError('penghasilan_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['penghasilan_ibu'] : old('penghasilan_ibu'); ?>" name="penghasilan_ibu" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('penghasilan_ibu') == '') ? 'Bagian penghasilan_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('penghasilan_ibu')); ?>
                        </div>
                    </div>
                    <!-- end Pneghasilan Ibu / Wali -->
                    <div class="mb20">
                        <label for="alamat_ibu" class="form-label">Alamat Ibu / Wali
                        </label>
                        <textarea class="form-control <?= ($validation->hasError('alamat_ibu')) ? 'is-invalid' : ''; ?>" name="alamat_ibu" id="alamat_ibu" rows="5"><?= ($keluarga != null) ? $keluarga['alamat_ibu'] : old('alamat_ibu'); ?></textarea>
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
            <h3 class="mb20">C. Apakah Calon Penerima Bantuan Terdaftar Sebegai </h3>
            <div class="row mb40">
                <div class="col-12 col-md-6">
                    <div class="mb20">
                        <label for="rtsm_rtm" class="form-label">Rumah Tangga Sangat Miskin (RTSM) / Rumah Tangga Miskin
                            (RTM)? </label>
                        <select class="form-select <?= ($validation->hasError('rtsm_rtm')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="rtsm_rtm">
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
                                        } ?> value="<?= $opsional_rstm; ?>"><?= ucfirst($opsional_rstm); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('rtsm_rtm') == '') ? 'Bagian rtsm_rtm  wajib diisi' : str_replace('_', ' ', $validation->getError('rtsm_rtm')); ?>
                        </div>
                    </div>
                    <!-- end rtsm rtm -->
                    <div class="mb20">
                        <label for="pkh_kks_kbs" class="form-label">Peserta Program Keluarga Harapan (PKH)/Kart
                            Keluarga Sejahtera
                            (KKS) dan Kartu Batang Sehat (KBS)?
                        </label>
                        <select class="form-select <?= ($validation->hasError('pkh_kks_kbs')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="pkh_kks_kbs">
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
                                        } ?> value="<?= $opsional_pkh; ?>"><?= ucfirst($opsional_pkh); ?></option>
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
                        <label for="bsm_kip" class="form-label">Penerimaan BSM atau Kartu Indonesia Pintar (KIP)
                        </label>
                        <select class="form-select <?= ($validation->hasError('bsm_kip')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="bsm_kip">
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
                                        } ?> value="<?= $opsional_bsm; ?>"><?= ucfirst($opsional_bsm); ?></option>
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
            <div class="pb40">
                <?php for ($i = 1; $i <= 3; $i++) { ?>
                    <div class="row">
                        <!-- file prestasi -->
                        <div class="col-6 col-sm-2">
                            <div class="mb20">
                                <label for="prestasi" class="form-label">Scan Prestasi
                                    <?= ($i == 1) ? '' : ''; ?>
                                </label>
                                <input hidden class="custom-file-input  <?= ($validation->hasError('scan_prestasi_' . $i)) ? 'is-invalid' : ''; ?>" name="scan_prestasi_<?= $i; ?>" id="file_prestasi_<?= $i; ?>" type="file" accept="application/pdf" />
                                <label class=" bg-white" style="cursor: pointer;" for="file_prestasi_<?= $i; ?>">
                                    <a class="btn btn-secondary">Pilih File</a>
                                    <?php if ($prestasi[$i - 1] != null) { ?>
                                        <?= $prestasi[$i - 1]['file_prestasi']; ?>
                                    <?php } else { ?>
                                        Tidak ada file yang dipilih
                                    <?php } ?>
                                </label>
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
                                    <?= ($i == 1) ? '' : ''; ?></label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_prestasi_' . $i)) ? 'is-invalid' : ''; ?>" value="<?= ($prestasi[$i - 1] != null) ? $prestasi[$i - 1]['nama_prestasi'] : old('nama_prestasi_' . $i); ?>" name="nama_prestasi_<?= $i; ?>" placeholder="" />
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('nama_prestasi_' . $i) == '') ? 'Bagian
                                nama_prestasi wajib diisi' : str_replace(
                                        '_',
                                        ' ',
                                        $validation->getError('nama_prestasi_' . $i)
                                    ); ?>
                                </div>
                            </div>
                        </div>
                        <!-- end nama prestasi -->
                        <div class="col-4 col-sm-2">
                            <div class="mb20">
                                <label for="kategori_<?= $i; ?>" class="form-label">Kategori Prestasi
                                    <?= ($i == 1) ? '' : ''; ?></label>
                                <select class="form-select <?= ($validation->hasError('kategori_' . $i)) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="kategori_<?= $i; ?>" id="kategori_<?= $i; ?>">
                                    <?php foreach ($kategori as $data_kategori) : ?>
                                        <option onchange="kategori_prestasi()" <?php
                                                                                if (old('kategori_' . $i) == $data_kategori) {
                                                                                    echo 'selected';
                                                                                } else if ($prestasi[$i - 1] != null && $prestasi[$i - 1]['kategori'] == $data_kategori) {
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
                        <div class="col-3 col-sm-2">
                            <div class="mb20">
                                <label for="tingkat_<?= $i; ?>" class="form-label">Tingkat Prestasi
                                    <?= ($i == 1) ? '' : ''; ?></label>
                                <select class="form-select <?= ($validation->hasError('tingkat_' . $i)) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="tingkat_<?= $i; ?>" id="tingkat_<?= $i; ?>">
                                    <option selected hidden></option>
                                    <?php foreach ($tingkat as $data_tingkat) : ?>
                                        <option <?php
                                                if ($prestasi[$i - 1] != null) {
                                                    if ($prestasi[$i - 1]['tingkat'] == $data_tingkat) {
                                                        echo 'selected';
                                                    }
                                                } ?> value="<?= $data_tingkat; ?>">
                                            <?= $data_tingkat; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('tingkat_' . $i) == '') ? 'Bagian tingkat prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('tingkat_' . $i)); ?>
                                </div>
                            </div>
                            <!-- end tingkat prestasi -->
                        </div>
                        <!-- end tingkat -->
                        <div class="col-3 col-sm-2">
                            <div class="mb20">
                                <label for="juara_<?= $i; ?>" class="form-label">Juara
                                    <?= ($i == 1) ? '' : ''; ?>
                                </label>
                                <select class="form-select <?= ($validation->hasError('juara_' . $i)) ? 'is-invalid' : ''; ?>" aria-label="Default select example" id="juara_<?= $i; ?>" name="juara_<?= $i; ?>">
                                    <option selected hidden></option>
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
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('juara_' . $i) == '') ? 'Bagian juara  wajib diisi' : str_replace('_', ' ', $validation->getError('juara_' . $i)); ?>
                                </div>
                            </div>
                        </div>
                        <!-- end juara -->
                        <div class="col-2">
                            <div class="mb20">
                                <label for="tahun_prestasi_<?= $i; ?>" class="form-label">Tahun
                                    <?= ($i == 1) ? '' : ''; ?>
                                </label>
                                <input type="number" class="form-control <?= ($validation->hasError('tahun_prestasi_' . $i)) ? 'is-invalid' : ''; ?>" value="<?= ($prestasi[$i - 1] != null) ? $prestasi[$i - 1]['tahun_prestasi'] : old('tahun_prestasi_' . $i); ?>" name="tahun_prestasi_<?= $i; ?>" placeholder="" min="2010" max="2022" />
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
                    </div>
                <?php } ?>
            </div>
            <!-- end prestasi -->
            <h3 class="mb20">E. Lampiran Dokumen</h3>
            <p class="bold p20" style="color: red">
                *Semua file di upload dan ukuran file tidak boleh lebih dari 2MB
            </p>
            <div class="row pb40">
                <div class="col-12 col-md-6">
                    <div class="mb20">
                        <label for="label_scan_kk" class="form-label">Scan Kartu Keluarga (KK) <span style="color: red; font-size: 12px;">Format file .pdf</span></label>
                        <input hidden class="form-control custom-file-input   <?= ($validation->hasError('scan_kk')) ? 'is-invalid' : ''; ?>" name="scan_kk" type="file" accept="application/pdf" id="kk" value="<?= $file['kk']; ?>" />
                        <label class=" bg-white" style="cursor: pointer;" for="kk">
                            <a class="btn btn-secondary">Pilih File</a>
                            <?= $file['kk']; ?>
                        </label>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('scan_kk') == '') ? 'Bagian scan KK wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_kk')); ?>
                        </div>
                    </div>
                    <!-- end scan KK -->
                    <div class="mb20">
                        <label for="label_scan_ktp" class="form-label">Scan Kartu Tanda Penduduk (KTP) <span style="color: red; font-size: 12px;">Format file .pdf</span>
                        </label>
                        <input hidden class="form-control <?= ($validation->hasError('scan_ktp')) ? 'is-invalid' : ''; ?>" name="scan_ktp" type="file" accept="application/pdf" id="ktp" />
                        <label class=" bg-white" style="cursor: pointer;" for="ktp">
                            <a class="btn btn-secondary">Pilih File</a>
                            <?= $file['ktp']; ?>
                        </label>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('scan_ktp') == '') ? 'Bagian scan ktp  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_ktp')); ?>
                        </div>
                    </div>
                    <!-- end scan KTP -->
                    <div class="mb20">
                        <label for="label_scan_kartu_pelajar" class="form-label">Scan Kartu Mahasiswa <span style="color: red; font-size: 12px;">Format file .pdf</span>
                        </label>
                        <input hidden class="form-control <?= ($validation->hasError('scan_kartu_pelajar')) ? 'is-invalid' : ''; ?>" name="scan_kartu_pelajar" type="file" accept="application/pdf" id="kartu_pelajar" />
                        <label class=" bg-white" style="cursor: pointer;" for="kartu_pelajar">
                            <a class="btn btn-secondary">Pilih File</a>
                            <?= $file['kartu_pelajar']; ?>
                        </label>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('scan_kartu_pelajar') == '') ? 'Bagian scan kartu pelajar  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_kartu_pelajar')); ?>
                        </div>
                    </div>
                    <!-- end scan Kartu pelajar -->
                    <div class="mb20">
                        <label for="label_scan_diterima_pt" class="form-label">Scan Keterangan Diterima Perguruan Tinggi
                            <span style="color: red; font-size: 12px;">Format file .pdf</span>
                        </label>
                        <input hidden class="form-control <?= ($validation->hasError('scan_diterima_pt')) ? 'is-invalid' : ''; ?>" name="scan_diterima_pt" type="file" accept="application/pdf" id="diterima_pt" />
                        <label class=" bg-white" style="cursor: pointer;" for="diterima_pt">
                            <a class="btn btn-secondary">Pilih File</a>
                            <?= $file['diterima_pt']; ?>
                        </label>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('scan_diterima_pt') == '') ? 'Bagian scan diterima perguruan tinggi wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : $validation->getError('scan_diterima_pt'); ?>
                        </div>
                    </div>
                    <!-- end scan diterima perguruan tinggi-->
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb20">
                        <label for="label_scan_pas_foto" class="form-label">Upload Foto Berwarna <span style="color: red; font-size: 12px;">Format file .jpg, jpeg, .png</span>
                        </label>
                        <input class="form-control <?= ($validation->hasError('scan_pas_foto')) ? 'is-invalid' : ''; ?> lampiran-foto" data-allowed-file-extensions="jpg jpeg png" data-height="100" data-max-file-size="2M" name="scan_pas_foto" type="file" accept="image/*" id="pas_foto" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['pas_foto']; ?>" />

                        <div class="invalid-feedback">
                            <?= ($validation->getError('scan_pas_foto') == '') ? 'Bagian scan pas foto  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_pas_foto')); ?>
                        </div>
                    </div>
                    <!-- end scan_pas_foto -->
                    <div class="mb20">
                        <label for="label_scan_sktm" class="form-label">Scan Surat Keterangan Tidak Mampu <span style="color: red; font-size: 12px;">Format file .pdf</span>
                        </label>
                        <p class="biru mb20">
                            RTSM/RTM, PKH, KIP, atau Surat desa yatim/piatu
                        </p>
                        <input hidden class="form-control <?= ($validation->hasError('scan_sktm')) ? 'is-invalid' : ''; ?>" name="scan_sktm" accept="application/pdf" type="file" id="sktm" />
                        <label class=" bg-white" style="cursor: pointer;" for="sktm">
                            <a class="btn btn-secondary">Pilih File</a>
                            <?= $file['sktm']; ?>
                        </label>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('scan_sktm') == '') ? 'Bagian scan ktm  wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : str_replace('_', ' ', $validation->getError('scan_sktm')); ?>
                        </div>
                    </div>
                    <!-- end SKTM -->
                    <div class="mb20">
                        <label for="label_scan_proposal" class="form-label">Scan Proposal Bantuan <span style="color: red; font-size: 12px;">Format file .pdf</span>
                        </label>
                        <input hidden class="form-control <?= ($validation->hasError('scan_proposal')) ? 'is-invalid' : ''; ?>" value="<?= old('scan_proposal'); ?>" name="scan_proposal" type="file" accept="application/pdf" id="proposal" />
                        <label class=" bg-white" style="cursor: pointer;" for="proposal">
                            <a class="btn btn-secondary">Pilih File</a>
                            <?= $file['proposal']; ?>
                        </label>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('scan_proposal') == '') ? 'Bagian scan_proposal wajib diisi dan ukuran file tidak boleh lebih dari 2MB' : $validation->getError('scan_proposal'); ?>
                        </div>
                    </div>
                    <!-- end scan_proposal -->
                </div>
            </div>
            <!-- end lampiran dokumen -->
            <!-- Submit -->
            <div class="row pb40">
                <div class="row pb40">
                    <div class="col-12 text-end">
                        <a href="<?= base_url(); ?>/home_pendaftar/pengumuman" class="btn btn-danger fs18 me-3 px-4 py-2">Batal</a>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#save_modal" class="btn btn-primary fs18 px-4 py-2">
                            Simpan
                        </button>
                    </div>
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
                            <button type="button" class="btn btn_orange" data-bs-dismiss="modal">
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