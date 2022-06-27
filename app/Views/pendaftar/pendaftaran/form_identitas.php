<?php if ($id_peserta == 1) : ?>
<form action="<?= base_url(); ?>/siswa/simpan_tambah_identitas_siswa/<?= $id_peserta; ?>" method="post"
    class="needs-validation" novalidate>

    <!-- end sma -->
    <?php elseif ($id_peserta == 2) : ?>
    <form action="<?= base_url(); ?>/calon_mhs/simpan_tambah_identitas_calon_mhs/<?= $id_peserta ?>" method="post"
        class="needs-validation" novalidate>
        <!-- end calon mahasiswa -->
        <?php else : ?>
        <form action="<?= base_url(); ?>/mahasiswa/simpan_tambah_identitas_mhs/<?= $id_peserta ?>" method="post"
            class="needs-validation" novalidate>
            <?php endif; ?>
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
                        <?php if ($identitas == null) : ?>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('nama_lengkap') == '') ? 'Bagian nama lengkap  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_lengkap')); ?>
                        </div>
                        <?php endif ?>
                    </div>
                    <!-- end nama lengkap -->
                    <div class="mb20">
                        <label for="jenis_kelamin" class="form-label bold">Jenis Kelamin <span
                                class="required-label"></span>
                        </label>
                        <div class="form-check kelamin">
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
                            <label class="form-check-label ms-2" for="L">
                                Laki - laki
                            </label>
                            <input <?= ($identitas != null) ? 'disabled' : ''; ?> required type="radio"
                                class="form-check-input ms-3" name="jenis_kelamin" id="P"
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
                            <?php if ($identitas == null) : ?>
                            <div class="invalid-feedback">
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- end jenis kelamin -->
                    <div class="mb20">
                        <label for="no_induk" class="form-label bold">NIK <span class="required-label"></span></label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number" min="0"
                            max="9999999999999999"
                            class="form-control <?= ($validation->hasError('no_induk')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['no_induk'] : old('no_induk'); ?>"
                            name="no_induk" placeholder="" />
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_induk') == '') ? 'Bagian NIK  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk')) ?>
                        </div>
                        <?php endif ?>

                    </div>
                    <!-- end NIK -->
                    <div class="mb20">
                        <label for="ttl" class="form-label bold">Tempat, Tanggal Lahir
                            <span class="fs14 lightgrey ms-2"> Contoh : Batang, 19 Agustus
                                2000</span></label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text"
                            class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['ttl'] : old('ttl'); ?>" name="ttl"
                            placeholder="" />
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('ttl') == '') ? 'Bagian tempat, tanggal lahir  wajib diisi' : str_replace('_', ' ', $validation->getError('ttl')) ?>
                        </div>
                        <?php endif ?>

                    </div>
                    <!-- end Tempat, Tanggal Lahir -->
                    <div class="mb20">
                        <label for="agama" class="form-label bold">Agama <span class="required-label"></span></label>
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
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('agama') == '') ? 'Bagian agama wajib diisi' : str_replace('_', ' ', $validation->getError('agama')) ?>
                        </div>
                        <?php endif ?>

                    </div>
                    <!-- end agama -->
                    <?php if ($id_peserta == 1) : ?>
                    <div class="mb20">
                        <label for="anak_ke" class="form-label bold">Anak Ke <span
                                class="required-label"></span></label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number"
                            class="form-control <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['anak_ke'] : old('anak_ke'); ?>" name="anak_ke"
                            min="1" placeholder="" />
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('anak_ke') == '') ? 'Bagian anak ke  wajib diisi' : str_replace('_', ' ', $validation->getError('anak_ke')); ?>
                        </div>
                        <?php endif ?>

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
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('alamat_rumah') == '') ? 'Bagian alamat rumah  wajib diisi' : $validation->getError('alamat_rumah'); ?>
                        </div>
                        <?php endif ?>

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
                                        } ?> value="<?= $kecamatan_pendaftaran['id_kecamatan']; ?>">
                                <?= ucfirst(strtolower($kecamatan_pendaftaran['nama_kecamatan'])); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('kecamatan') == '') ? 'Bagian kecamatan  wajib diisi' : $validation->getError('kecamatan'); ?>
                        </div>
                        <?php endif ?>

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
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_telepon') == '') ? 'Bagian no telepon  wajib diisi dan kurang dari 15 angka' : str_replace('_', ' ', $validation->getError('no_telepon')) ?>
                        </div>
                        <?php endif ?>

                    </div>
                    <?php endif ?>
                </div>
                <div class="col-12 col-md-6">
                    <?php if ($id_peserta == 1) : ?>

                    <div class="mb20">
                        <label for="no_telepon" class="form-label bold">Nomor Telepon <span
                                class="required-label"></span></label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number" min="0"
                            max="999999999999999"
                            class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['no_telepon'] : old('no_telepon'); ?>"
                            name="no_telepon" placeholder="" />
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_telepon') == '') ? 'Bagian no telepon  wajib diisi dan kurang dari 15 angka' : str_replace('_', ' ', $validation->getError('no_telepon')) ?>
                        </div>
                        <?php endif ?>

                    </div>
                    <?php endif ?>

                    <!-- end Nomer Telepon -->
                    <?php if ($id_peserta == 1 || $id_peserta == 2) : ?>
                    <div class="mb20">
                        <label for="no_induk_pelajar" class="form-label bold">NISN <span
                                class="required-label"></span></label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number" maxlength="25"
                            class="form-control <?= ($validation->hasError('no_induk_pelajar')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['no_induk_pelajar'] : old('no_induk_pelajar'); ?>"
                            name="no_induk_pelajar" placeholder="" />
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_induk_pelajar') == '') ? 'Bagian NIS/NISN  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk_pelajar')) ?>
                        </div>
                        <?php endif ?>

                    </div>
                    <!-- end NISN -->
                    <?php else : ?>
                    <div class="mb20">
                        <label for="no_induk_pelajar" class="form-label bold">NIM </label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text" maxlength="25"
                            name="no_induk_pelajar"
                            class="form-control <?= ($validation->hasError('no_induk_pelajar')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['no_induk_pelajar'] : old('no_induk_pelajar'); ?>"
                            name="no_induk_pelajar" placeholder="" />
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_induk_pelajar') == '') ? 'Bagian NIM  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk_pelajar')) ?>
                        </div>
                        <?php endif ?>

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
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('jarak_sekolah') == '') ? 'Bagian jarak sekolah  wajib diisi' : str_replace('_', ' ', $validation->getError('jarak_rumah')) ?>
                        </div>
                        <?php endif ?>

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
                                            } ?> value="<?= $transportasi_pendaftaran['id_transportasi']; ?>">
                                <?= ucfirst($transportasi_pendaftaran['nama_transportasi']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('transportasi') == '') ? 'Bagian transportasi wajib diisi' : $validation->getError('transportasi'); ?>
                        </div>
                        <?php endif ?>

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
                                            } ?> value="<?= $sekolah_pendaftaran['id_sekolah']; ?>">
                                <?= $sekolah_pendaftaran['nama_sekolah']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('sekolah') == '') ? 'Bagian sekolah wajib diisi' : $validation->getError('sekolah'); ?>
                        </div>
                        <?php endif ?>

                    </div>
                    <!-- end sekolah -->
                    <div class="mb20">
                        <label for="kelas" class="form-label bold">Kelas <span class="required-label"></span></label>
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
                        <?php if ($identitas == null) : ?>

                        <div class="invalid-feedback">
                            <?= ($validation->getError('kelas') == '') ? 'Bagian kelas wajib diisi' : $validation->getError('kelas'); ?>
                        </div>
                        <?php endif ?>
                    </div>
                    <!-- end kelas -->
                    <?php else : ?>
                    <div class="mb20">
                        <label for="nama_pt" class="form-label bold">Nama Perguruan Tinggi
                        </label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text"
                            class="form-control <?= ($validation->hasError('nama_pt')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['nama_pt'] : old('nama_pt'); ?>" name="nama_pt"
                            placeholder="" />
                        <?php if ($identitas == null) : ?>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('nama_pt') == '') ? 'Bagian nama perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('nama_pt')); ?>
                        </div>
                        <?php endif ?>
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
                        <?php if ($identitas == null) : ?>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('akreditasi_pt') == '') ? 'Bagian akreditasi perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('akreditasi_pt')); ?>
                        </div>
                        <?php endif ?>
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
                        <?php if ($identitas == null) : ?>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('tahun_masuk_pt') == '') ? 'Bagian tahun masuk perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('tahun_masuk_pt')); ?>
                        </div>
                        <?php endif ?>
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
                        <?php if ($identitas == null) : ?>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('semester_ke') == '') ? 'Bagian semester ke wajib diisi' : str_replace('_', ' ', $validation->getError('semester_ke')); ?>
                        </div>
                        <?php endif ?>
                    </div>
                    <!-- end semester_ke -->
                    <div class="mb20">
                        <label for="alamat_pt" class="form-label bold">Alamat Perguruan Tinggi
                        </label>
                        <textarea required <?= ($identitas != null) ? 'disabled' : ''; ?>
                            class="form-control <?= ($validation->hasError('alamat_pt')) ? 'is-invalid' : ''; ?>"
                            name="alamat_pt" id="alamat_pt"
                            rows="1"><?= ($identitas != null) ? $identitas['alamat_pt'] : old('alamat_pt'); ?></textarea>
                        <?php if ($identitas == null) : ?>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('alamat_pt') == '') ? 'Bagian alamat perguruan tinggi wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_pt')); ?>
                        </div>
                        <?php endif ?>
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
                    </div>
                    <!-- end pernah menerima bantuan -->
                    <div class="mb20">
                        <label for="menerima_bantuan_dari" class="form-label bold">Jika Ya, Menerima
                            Bantuan
                            Dari</label>
                        <input required id="menerima_bantuan_dari" <?= ($identitas != null) ? 'disabled' : ''; ?>
                            id="menerima_bantuan_dari" type="text" maxlength="100"
                            class="form-control <?= ($validation->hasError('menerima_bantuan_dari')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['menerima_bantuan_dari'] : old('menerima_bantuan_dari'); ?>"
                            name="menerima_bantuan_dari" placeholder="" />
                        <?php if ($identitas == null) : ?>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('menerima_bantuan_dari') == '') ? '' : str_replace('_', ' ', $validation->getError('menerima_bantuan_dari')) ?>
                        </div>
                        <?php endif ?>
                    </div>
                    <!-- end menerima_bantuan_dari -->
                </div>
            </div>
            <!-- end identitas diri -->
            <!-- SAVE  Modal -->
            <div class="modal fade" id="save_modal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title bold" id="saveModalLabel">
                                Yakin ingin menyimpan data?
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Pastikan data yang anda masukkan sudah benar.
                            <div class="alert alert-danger mt-2 pesan-gagal" role="alert" style="display:none">
                                Terdapat kesalahan masukkan atau data yang anda masukkan tidak sesuai.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary fw-normal" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" id="btn_submit_identitas" class="btn btn-success fw-normal">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>