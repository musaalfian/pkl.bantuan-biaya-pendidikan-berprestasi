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

                                <?php if ($id_peserta == 2 || $id_peserta == 3) : ?>
                                <div class="mb20">
                                    <label for="no_telepon" class="form-label bold">Nomor Telepon <span
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
                                <?php endif ?>
                            </div>
                            <div class="col-12 col-md-6">
                                <?php if ($id_peserta == 1) : ?>

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
                                <?php endif ?>

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
                                <div class="col-12 col-xl-6">
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
                                <div class="col-12 col-xl-6">
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
                                <div class="col-12 col-xl-6">
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
                                <div class="col-12 col-xl-6">
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
                                <div class="col-12 col-xl-6">
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
                                <div class="col-12 col-xl-6">
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
                                        data-allowed-file-extensions="jpg jpeg png " data-height="100" data-height="100"
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
                                        <button type="submit" id="btn_submit" class="btn btn-success fw-normal">Ajukan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php endif ?>