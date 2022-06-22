<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>
<!-- Form pendaftaran -->
<div class="bglight2 py40" id="edit__pendaftaran">
    <div class="container">
        <!-- form edit pendaftaran -->
        <?php if ($identitas['status_edit_pendaftaran'] == null) : ?>
            <?php if ($id_peserta == 1) : ?>
                <form action="<?= base_url(); ?>/siswa/simpan_edit_siswa/<?= $identitas['no_induk']; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <!-- end sma -->
                <?php elseif ($id_peserta == 2) : ?>
                    <form action="<?= base_url(); ?>/calon_mhs/simpan_edit_calon_mhs/<?= $identitas['no_induk']; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <!-- end calon mahasiswa -->
                    <?php else : ?>
                        <form action="<?= base_url(); ?>/mahasiswa/simpan_edit_mhs/<?= $identitas['no_induk']; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <!-- end mahasiswa -->
                        <?php endif; ?>
                        <div class="tab-content bdblue bgwhite br25 p-4 p-sm-5">
                            <h3 class="mb20 biru fw-bold">Ubah Data Pendaftaran</h3>

                            <!-- Identitas diri -->
                            <h3 class="mb20 fs20">A. Identitas Diri</h3>
                            <div class="row mt20 mb40 ">
                                <div class="col-12 col-md-6">
                                    <div class="mb20 ">
                                        <label for="nama_lengkap" class="form-label bold">Nama Lengkap </label>
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['nama_lengkap'] : old('nama_lengkap'); ?>" name="nama_lengkap" placeholder="" required />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('nama_lengkap') == '') ? 'Bagian nama lengkap  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_lengkap')); ?>
                                        </div>
                                    </div>
                                    <!-- end nama lengkap -->
                                    <div class="mb20">
                                        <label for="jenis_kelamin" class="form-label bold">Jenis Kelamin <span class="required-label"></span>
                                        </label>
                                        <div class="form-check kelamin">
                                            <input required type="radio" class="form-check-input" name="jenis_kelamin" id="L" <?php if ($identitas != null) {
                                                                                                                                    if ($identitas['jenis_kelamin'] == 'L') {
                                                                                                                                        echo 'checked';
                                                                                                                                    };
                                                                                                                                } else {
                                                                                                                                    if (old('jenis_kelamin') == 'L') {
                                                                                                                                        echo 'checked';
                                                                                                                                    }
                                                                                                                                } ?> value="L">
                                            <label class="form-check-label ms-2" for="L">
                                                Laki - laki
                                            </label>
                                            <input required type="radio" class="form-check-input ms-3" name="jenis_kelamin" id="P" <?php if ($identitas != null) {
                                                                                                                                        if ($identitas['jenis_kelamin'] == 'P') {
                                                                                                                                            echo 'checked';
                                                                                                                                        };
                                                                                                                                    } else {
                                                                                                                                        if (old('jenis_kelamin') == 'P') {
                                                                                                                                            echo 'checked';
                                                                                                                                        }
                                                                                                                                    } ?> value="P">
                                            <label class="form-check-label ms-2" for="P">
                                                Perempuan
                                            </label>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('jenis_kelamin') == '') ? 'Bagian jenis kelamin  wajib diisi' : str_replace('_', ' ', $validation->getError('jenis_kelamin')) ?>
                                        </div>
                                    </div>
                                    <!-- end jenis kelamin -->
                                    <div class="mb20 ">
                                        <label for="no_induk" class="form-label bold">NIK </label>
                                        <input type="number" min="0" max="9999999999999999" name="no_induk" required class="form-control <?= ($validation->hasError('no_induk')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_induk'] : old('no_induk'); ?>" name="no_induk" placeholder="" />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('no_induk') == '') ? 'Bagian NIK  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk')) ?>
                                        </div>
                                    </div>
                                    <!-- end NIK -->
                                    <div class="mb20 ">
                                        <label for="ttl" class="form-label bold">Tempat, Tanggal Lahir <span class="fs14 lightgrey ms-2"> Contoh : Batang, 19 Agustus
                                                2000</span>
                                        </label>
                                        <input type="text" class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>" required value="<?= ($identitas != null) ? $identitas['ttl'] : old('ttl'); ?>" name="ttl" placeholder="" />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('ttl') == '') ? 'Bagian tempat, tanggal lahir  wajib diisi' : str_replace('_', ' ', $validation->getError('ttl')) ?>
                                        </div>
                                    </div>
                                    <!-- end Tempat, Tanggal Lahir -->
                                    <div class="mb20 ">
                                        <label for="agama" class="form-label bold">Agama </label>
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
                                                        } ?> value="<?= $agama['id_agama']; ?>">
                                                    <?= ucfirst($agama['nama_agama']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('agama') == '') ? 'Bagian agama wajib diisi' : str_replace('_', ' ', $validation->getError('agama')) ?>
                                        </div>
                                    </div>
                                    <!-- end agama -->

                                    <?php if ($identitas['id_status_peserta'] == 1) : ?>
                                        <div class="mb20 ">
                                            <label for="anak_ke" class="form-label bold">Anak Ke </label>
                                            <input type="number" required class="form-control <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['anak_ke'] : old('anak_ke'); ?>" name="anak_ke" min="1" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('anak_ke') == '') ? 'Bagian anak ke  wajib diisi' : $validation->getError('anak_ke'); ?>
                                            </div>
                                        </div>
                                        <!-- end anak ke -->
                                    <?php endif ?>

                                    <div class="alamat mb20 ">
                                        <label for="alamat_rumah" class="form-label bold">Alamat Rumah <span class="fs14 ms-2 lightgrey"> Alamat rumah berisi dukuh, rt, rw,
                                                desa, dan jalan</span></label>
                                        <textarea required class="form-control mb-2 <?= ($validation->hasError('alamat_rumah')) ? 'is-invalid' : ''; ?>" name="alamat_rumah" id="alamat_rumah" rows="1"><?= ($identitas != null) ? $identitas['alamat_rumah'] : old('alamat_rumah'); ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('alamat_rumah') == '') ? 'Bagian alamat rumah  wajib diisi' : $validation->getError('alamat_rumah'); ?>
                                        </div>
                                    </div>
                                    <!-- end alamat -->
                                    <div class="mb20 ">
                                        <label for="kecamatan" class="form-label bold">Kecamatan </label>
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
                                    <?php if ($id_peserta == 2 || $id_peserta == 3) : ?>
                                        <div class="mb20 ">
                                            <label for="no_telepon" class="form-label bold">Nomer Telepon </label>
                                            <input type="number" min="0" max="999999999999999" required class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_telepon'] : old('no_telepon'); ?>" name="no_telepon" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('no_telepon') == '') ? 'Bagian no telepon  wajib diisi dan kurang dari 15 angka' : str_replace('_', ' ', $validation->getError('no_telepon')) ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12 col-md-6">
                                    <?php if ($id_peserta == 1) : ?>
                                        <div class="mb20 ">
                                            <label for="no_telepon" class="form-label bold">Nomer Telepon </label>
                                            <input type="number" min="0" max="999999999999999" required class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_telepon'] : old('no_telepon'); ?>" name="no_telepon" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('no_telepon') == '') ? 'Bagian no telepon  wajib diisi dan kurang dari 15 angka' : str_replace('_', ' ', $validation->getError('no_telepon')) ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <!-- end Nomer Telepon -->

                                    <?php if ($identitas['id_status_peserta'] == 3) : ?>
                                        <div class="mb20">
                                            <label for="no_induk_pelajar" class="form-label bold">NIM </label>
                                            <input required type="number" maxlength="25" name="no_induk_pelajar" class="form-control <?= ($validation->hasError('no_induk_pelajar')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_induk_pelajar'] : old('no_induk_pelajar'); ?>" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('no_induk_pelajar') == '') ? 'Bagian NIM  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk_pelajar')) ?>
                                            </div>
                                        </div>
                                        <!-- end NIM -->
                                    <?php else : ?>
                                        <div class="mb20 ">
                                            <label for="no_induk_pelajar" class="form-label bold"> NISN </label>
                                            <input type="text" maxlength="25" required class="form-control <?= ($validation->hasError('no_induk_pelajar')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_induk_pelajar'] : old('no_induk_pelajar'); ?>" name="no_induk_pelajar" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('no_induk_pelajar') == '') ? 'Bagian NISN  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk_pelajar')) ?>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <!-- end NIS -->

                                    <?php if ($identitas['id_status_peserta'] == 1) : ?>
                                        <div class="mb20 ">
                                            <label for="jarak_sekolah" class="form-label bold">Jarak dari Rumah ke Sekolah (Km)
                                            </label>
                                            <input type="number" required class="form-control <?= ($validation->hasError('jarak_sekolah')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['jarak_sekolah'] : old('jarak_sekolah'); ?>" name="jarak_sekolah" min="0" step=".1" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('jarak_sekolah') == '') ? 'Bagian jarak sekolah  wajib diisi' : str_replace('_', ' ', $validation->getError('jarak_rumah')) ?>
                                            </div>
                                        </div>
                                        <!-- end Jarak dari Rumah ke Sekolah -->
                                        <div class="mb20 ">
                                            <label for="transportasi" class="form-label bold">Transportasi Siswa ke Sekolah
                                            </label>
                                            <select class="form-select <?= ($validation->hasError('transportasi')) ? 'is-invalid' : ''; ?>" required aria-label="Default select example" name="transportasi">
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
                                        <div class="mb20 ">
                                            <label for="sekolah" class="form-label bold">Sekolah </label>
                                            <select class="form-select <?= ($validation->hasError('sekolah')) ? 'is-invalid' : ''; ?>" required aria-label="Default select example" name="sekolah">
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
                                        <div class="mb20 ">
                                            <label for="kelas" class="form-label bold">Kelas </label>
                                            <select class="form-select <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>" required aria-label="Default select example" name="kelas">
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
                                        <div class="mb20 ">
                                            <label for="nama_pt" class="form-label bold">Nama Perguruan Tinggi
                                            </label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nama_pt')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['nama_pt'] : old('nama_pt'); ?>" id="nama_pt" placeholder="" name="nama_pt" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('nama_pt') == '') ? 'Bagian nama perguruan tinggiwajib diisi' : $validation->getError('nama_pt'); ?>
                                            </div>
                                        </div>
                                        <!-- end nama_pt -->
                                        <div class="mb20">
                                            <label for="akreditasi_pt" class="form-label bold">Akrediktasi Perguruan Tinggi
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
                                            <label for="tahun_masuk_pt" class="form-label bold">Tahun Masuk Perguruan Tinggi
                                            </label>
                                            <input type="number" class="form-control <?= ($validation->hasError('tahun_masuk_pt')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['tahun_masuk_pt'] : old('tahun_masuk_pt'); ?>" name="tahun_masuk_pt" placeholder="" min="2010" max="2022" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('tahun_masuk_pt') == '') ? 'Bagian tahun masuk perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('tahun_masuk_pt')); ?>
                                            </div>
                                        </div>
                                        <!-- end tahun_masuk_pt -->
                                        <div class="mb20">
                                            <label for="semester_ke" class="form-label bold">Semester ke
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
                                            <label for="alamat_pt" class="form-label bold">Alamat Perguruan Tinggi
                                            </label>
                                            <textarea class="form-control <?= ($validation->hasError('alamat_pt')) ? 'is-invalid' : ''; ?>" name="alamat_pt" id="alamat_pt" rows="1"><?= ($identitas != null) ? $identitas['alamat_pt'] : old('alamat_pt'); ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('alamat_pt') == '') ? 'Bagian alamat perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('alamat_pt')); ?>
                                            </div>
                                        </div>
                                        <!-- end alamat perguruan tinggi-->
                                    <?php endif ?>
                                    <div class="mb20 ">
                                        <label for="pernah_menerima_bantuan" class="form-label bold">Apakah Calon
                                            Penerima
                                            Beasiswa Pernah
                                            Menerima Bantuan?
                                            <span class="required-label"></span></label>
                                        <!-- radio button -->
                                        <div class="form-check pertanyaan">
                                            <?php foreach ($opsional as $opsional_menerima_bantuan) : ?>
                                                <input required class="form-check-input <?= ($opsional_menerima_bantuan == "tidak") ? 'ms-3' : ''; ?>" type="radio" name="pernah_menerima_bantuan" id="pernah_menerima_bantuan_<?= $opsional_menerima_bantuan; ?>" <?php if ($identitas != null) {
                                                                                                                                                                                                                                                                        if ($identitas['pernah_menerima_bantuan'] == $opsional_menerima_bantuan) {
                                                                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                                                                        };
                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                        if (old('pernah_menerima_bantuan') == $opsional_menerima_bantuan) {
                                                                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                    } ?> value="<?= $opsional_menerima_bantuan; ?>">
                                                <label class="form-check-label" for="pernah_menerima_bantuan_<?= $opsional_menerima_bantuan; ?>">
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
                                        <label for="menerima_bantuan_dari" class="form-label bold">Jika Ya, Menerima Bantuan
                                            Dari</label>
                                        <input id="menerima_bantuan_dari" id="menerima_bantuan_dari" type="text" maxlength="16" class="form-control <?= ($validation->hasError('menerima_bantuan_dari')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['menerima_bantuan_dari'] : old('menerima_bantuan_dari'); ?>" name="menerima_bantuan_dari" placeholder="" />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('menerima_bantuan_dari') == '') ? '' : str_replace('_', ' ', $validation->getError('menerima_bantuan_dari')) ?>
                                        </div>
                                    </div>
                                    <!-- end menerima_bantuan_dari -->
                                </div>
                            </div>
                            <!-- end identitas diri -->

                            <!-- Kondisi keluarga -->
                            <h3 class="mb20 fs20">B. Kondisi Keluarga</h3>
                            <div class="row mb40">
                                <div class="col-12 col-md-6">
                                    <div class="mb20 ">
                                        <label for="nama_ayah" class="form-label bold">Nama Ayah / Wali</label>
                                        <input type="text" required class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['nama_ayah'] : old('nama_ayah'); ?>" name="nama_ayah" placeholder="" />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('nama_ayah') == '') ? 'Bagian nama_ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_ayah')); ?>
                                        </div>
                                    </div>
                                    <!-- end nama ayah -->
                                    <?php if ($identitas['id_status_peserta'] != 1) : ?>
                                        <div class="mb20">
                                            <label for="usia" class="form-label bold">Usia Ayah / Wali </label>
                                            <input type="number" class="form-control <?= ($validation->hasError('usia_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['usia_ayah'] : old('usia_ayah'); ?>" id="usia_ayah" name="usia_ayah" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('usia_ayah') == '') ? 'Bagian nama wajib diisi' : $validation->getError('usia_ayah'); ?>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <!-- end usia -->
                                    <div class="mb20 ">
                                        <label for="pekerjaan_ayah" class="form-label bold">Pekerjaan Ayah / Wali
                                        </label>
                                        <input type="text" required class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['pekerjaan_ayah'] : old('pekerjaan_ayah'); ?>" name="pekerjaan_ayah" placeholder="" />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('pekerjaan_ayah') == '') ? 'Bagian nama  wajib diisi' : str_replace('_', ' ', $validation->getError('pekerjaan_ayah')); ?>
                                        </div>
                                    </div>
                                    <!-- end pekerjaan ayah -->
                                    <div class="mb20 ">
                                        <label for="pendidikan_ayah" class="form-label bold">Pendidikan Terakhir Ayah / Wali
                                        </label>
                                        <select required class="form-select <?= ($validation->hasError('pendidikan_ayah')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="pendidikan_ayah">
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
                                    <div class="mb20 ">
                                        <label for="penghasilan_ayah" class="form-label bold">Penghasilan per Bulan Ayah /
                                            Wali
                                        </label>
                                        <input type="number" required class="form-control <?= ($validation->hasError('penghasilan_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['penghasilan_ayah'] : old('penghasilan_ayah'); ?>" name="penghasilan_ayah" placeholder="" />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('penghasilan_ayah') == '') ? 'Bagian penghasilan_ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('penghasilan_ayah')); ?>
                                        </div>
                                    </div>
                                    <!-- end Pneghasilan ayah -->
                                    <div class="mb20 ">
                                        <label for="alamat_ayah" class="form-label bold">Alamat Ayah / Wali
                                        </label>
                                        <textarea required class="form-control <?= ($validation->hasError('alamat_ayah')) ? 'is-invalid' : ''; ?>" name="alamat_ayah" name="alamat_ayah" rows="5"><?= ($keluarga != null) ? $keluarga['alamat_ayah'] : old('alamat_ayah'); ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('alamat_ayah') == '') ? 'Bagian alamat_ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_ayah')); ?>
                                        </div>
                                    </div>
                                    <!-- end alamat -->
                                </div>
                                <!-- Ayah / Wali -->
                                <div class="col-12 col-md-6">
                                    <div class="mb20 ">
                                        <label for="nama_ibu" class="form-label bold">Nama Ibu / Wali </label>
                                        <input type="text" required class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['nama_ibu'] : old('nama_ibu'); ?>" name="nama_ibu" placeholder="" />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('nama_ibu') == '') ? 'Bagian nama_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_ibu')); ?>
                                        </div>
                                    </div>
                                    <!-- end nama Ibu / Wali -->
                                    <?php if ($identitas['id_status_peserta'] != 1) : ?>
                                        <div class="mb20">
                                            <label for="usia_ibu" class="form-label bold">Usia Ibu / Wali </label>
                                            <input type="number" class="form-control <?= ($validation->hasError('usia_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['usia_ibu'] : old('usia_ibu'); ?>" id="usia_ibu" name="usia_ibu" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('usia_ibu') == '') ? 'Bagian nama wajib diisi' : $validation->getError('usia_ibu'); ?>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <!-- end usia -->
                                    <div class="mb20 ">
                                        <label for="pekerjaan_ibu" class="form-label bold">Pekerjaan Ibu / Wali
                                        </label>
                                        <input type="text" required class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['pekerjaan_ibu'] : old('pekerjaan_ibu'); ?>" name="pekerjaan_ibu" placeholder="" />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('pekerjaan_ibu') == '') ? 'Bagian pekerjaan_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('pekerjaan_ibu')); ?>
                                        </div>
                                    </div>
                                    <!-- end pekerjaan Ibu / Wali -->
                                    <div class="mb20 ">
                                        <label for="pendidikan_ibu" class="form-label bold">Pendidikan Terakhir Ibu / Wali
                                        </label>
                                        <select required class="form-select <?= ($validation->hasError('pendidikan_ibu')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="pendidikan_ibu">
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
                                    <div class="mb20 ">
                                        <label for="penghasilan_ibu" class="form-label bold">Penghasilan per Bulan Ibu /
                                            Wali
                                        </label>
                                        <input type="number" required class="form-control <?= ($validation->hasError('penghasilan_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['penghasilan_ibu'] : old('penghasilan_ibu'); ?>" name="penghasilan_ibu" placeholder="" />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('penghasilan_ibu') == '') ? 'Bagian penghasilan_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('penghasilan_ibu')); ?>
                                        </div>
                                    </div>
                                    <!-- end Pneghasilan Ibu / Wali -->
                                    <div class="mb20 ">
                                        <label for="alamat_ibu" class="form-label bold">Alamat Ibu / Wali
                                        </label>
                                        <textarea class="form-control <?= ($validation->hasError('alamat_ibu')) ? 'is-invalid' : ''; ?>" required name="alamat_ibu" id="alamat_ibu" rows="5"><?= ($keluarga != null) ? $keluarga['alamat_ibu'] : old('alamat_ibu'); ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('alamat_ibu') == '') ? 'Bagian alamat_ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_ibu')); ?>
                                        </div>
                                    </div>
                                    <!-- end alamat -->
                                </div>
                                <!-- end Ibu / Wali -->
                            </div>
                            <!-- end kondisi keluarga -->

                            <!-- Terdaftar sebagai  -->
                            <h3 class="mb20">C. Apakah Calon Penerima Bantuan Terdaftar Sebagai </h3>
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
                                                <input name="rtsm_rtm" id="rtsm_rtm_<?= ucfirst($opsional_rstm); ?>" required type="radio" class="form-check-input <?= ($opsional_rstm == 'tidak') ? 'ms-3' : ''; ?>" <?php if ($keluarga != null) {
                                                                                                                                                                                                                            if ($keluarga['rtsm_rtm'] == $opsional_rstm) {
                                                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                                                            };
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            if (old('rtsm_rtm') == $opsional_rstm) {
                                                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                        } ?> value="<?= $opsional_rstm; ?>"><label for="rtsm_rtm_<?= ucfirst($opsional_rstm); ?>" class="form-check-label"><?= ucfirst($opsional_rstm); ?></label>
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
                                                <input type="radio" class="form-check-input <?= ($opsional_pkh == 'tidak') ? 'ms-3' : ''; ?>" required name="pkh_kks_kbs" id="pkh_kks_kbs_<?= ucfirst($opsional_pkh); ?>" <?php if ($keluarga != null) {
                                                                                                                                                                                                                                if ($keluarga['pkh_kks_kbs'] == $opsional_pkh) {
                                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                                };
                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                if (old('pkh_kks_kbs') == $opsional_pkh) {
                                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                            } ?> value="<?= $opsional_pkh; ?>"><label for="pkh_kks_kbs_<?= ucfirst($opsional_pkh); ?>" class="form-check-label"><?= ucfirst($opsional_pkh); ?></label>
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
                                                <input name="bsm_kip" id="bsm_kip_<?= ucfirst($opsional_bsm); ?>" type="radio" class="form-check-input <?= ($opsional_bsm == 'tidak') ? 'ms-3' : ''; ?>" required <?php if ($keluarga != null) {
                                                                                                                                                                                                                        if ($keluarga['bsm_kip'] == $opsional_bsm) {
                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                        };
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        if (old('bsm_kip') == $opsional_bsm) {
                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    } ?> value="<?= $opsional_bsm; ?>"><label for="bsm_kip_<?= ucfirst($opsional_bsm); ?>" class="form-check-label"><?= ucfirst($opsional_bsm); ?></label>
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

                            <!-- prestasi -->
                            <h3 class="mb20 ">D. Prestasi</h3>
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
                            <div class="mb20">
                                <?php for ($i = 1; $i <= 3; $i++) : ?>
                                    <div class="row" id="edit_prestasi_<?= $i ?>">
                                        <!-- file prestasi -->
                                        <div class="col-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="scan_prestasi_<?= $i; ?>" class="form-label bold">Scan
                                                    Prestasi
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?>
                                                </label>
                                                <input class="custom-file-input scan-lampiran <?= ($validation->hasError('scan_prestasi_' . $i)) ? 'is-invalid' : ''; ?>" <?= ($prestasi[$i - 1] != null)?'data-default-file="'.base_url().'/assets/scan/'.$identitas['no_induk'].'/file/'. $prestasi[$i - 1]["file_prestasi"].'"':''; ?>  data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_prestasi_<?= $i; ?>" id="file_prestasi_<?= $i; ?>" type="file" accept="application/pdf" />
                                                <label class=" bg-white" style="cursor: pointer;" for="file_prestasi_<?= $i; ?>">
                                                </label>
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
                                                <input value="<?= ($prestasi[$i - 1] != null) ? $prestasi[$i - 1]['nama_prestasi'] : old('nama_prestasi_' . $i); ?>" <?= ($i == 1) ? 'required' : ''; ?> type="text" id="nama_prestasi_<?= $i; ?>" class="form-control <?= ($validation->hasError('nama_prestasi_' . $i)) ? 'is-invalid' : ''; ?>" value="<?= old('nama_prestasi_' . $i); ?>" name="nama_prestasi_<?= $i; ?>" placeholder="" />
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
                                                <select <?= ($i == 1) ? 'required' : ''; ?> class="form-select <?= ($validation->hasError('kategori_' . $i)) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="kategori_<?= $i; ?>" id="kategori_<?= $i; ?>">
                                                    <?php foreach ($kategori as $data_kategori) : ?>
                                                        <option hidden></option>
                                                        <option onchange="kategori_prestasi()" <?php
                                                                                                if (old('kategori_' . $i) == $data_kategori) {
                                                                                                    echo 'selected';
                                                                                                } elseif ($prestasi[$i - 1] != null) {
                                                                                                    if ($prestasi[$i - 1]['kategori'] == $data_kategori) {
                                                                                                        echo 'selected';
                                                                                                    }
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
                                        <div class="col-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="tingkat_<?= $i; ?>" class="form-label bold">Tingkat Prestasi
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?></label>
                                                <select disabled id="tingkat_<?= $i; ?>" class="form-select <?= ($validation->hasError('tingkat_' . $i)) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="tingkat_<?= $i; ?>">
                                                    <option selected></option>
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
                                            </div>
                                            <!-- end tingkat prestasi -->
                                        </div>
                                        <!-- end tingkat -->
                                        <div class="col-6 col-xxl-2">
                                            <div class="mb20">
                                                <label for="juara_<?= $i; ?>" class="form-label bold">Juara
                                                    <?= ($i == 1) ? '<span class="required-label"></span>' : ''; ?>
                                                </label>
                                                <select id="juara_<?= $i; ?>" class="form-select <?= ($validation->hasError('juara_' . $i)) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="juara_<?= $i; ?>">
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
                                            <!-- end Juara -->
                                        </div>
                                        <!-- end juara -->
                                        <div class="col-6 col-xxl-1">
                                            <div class="mb20">
                                                <label for="tahun_prestasi_<?= $i; ?>" class="form-label bold">Tahun
                                                    <span class="required-label"></span>
                                                </label>
                                                <input <?= ($i == 1) ? 'required' : ''; ?> type="number" id="tahun_prestasi_<?= $i; ?>" class="form-control <?= ($validation->hasError('tahun_prestasi_' . $i)) ? 'is-invalid' : ''; ?>" value="<?= ($prestasi[$i - 1] != null) ? $prestasi[$i - 1]['tahun_prestasi'] : old('tahun_prestasi_' . $i); ?>" name="tahun_prestasi_<?= $i; ?>" placeholder="" min="2010" max="2022" />
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
                                        <div class="col-6 col-xxl-1 tambah__prestasi">
                                            <div class="mb20 text-start">
                                                <?php if ($i != 3 && $prestasi[$i] == null) : ?>
                                                    <label for="juara_<?= $i; ?>" id="label-tambah-<?= $i; ?>" class="form-label bold">Tambah
                                                    </label>
                                                    <button type="button" id="icon-tambah-<?= $i; ?>" data-bs-toggle="modal" data-bs-target="#prestasi_<?= $i; ?>_modal" class="btn ">
                                                        <i class="fas fa-plus-circle text-center blue fs18"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <hr>
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
                                                    <button type="button" class="btn btn-secondary fw-normal" data-bs-dismiss="modal">
                                                        Batal
                                                    </button>
                                                    <a class="btn btn-primary" onclick="tambah_edit_prestasi_<?= $i + 1; ?>()" data-bs-dismiss="modal">Tambah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <!-- end prestasi -->

                            <!-- lampiran dokumen -->
                            <h3 class="mb20">E. Lampiran Dokumen</h3>
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
                            <div class="row pb40" id="edit_lampiran">
                                <div class="col-12 col-md-6">
                                    <div class="mb20">
                                        <label for="label_scan_kk" class="form-label bold">Scan Kartu Keluarga (KK) <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                induk)_scan_kk<strong>.pdf</strong></span></label>

                                        <input class="form-control custom-file-input scan-lampiran <?= ($validation->hasError('scan_kk')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['kk']; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_kk" type="file" accept="application/pdf" id="kk" value=" <?= $file['kk']; ?>" />
                                        
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('scan_kk') == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('scan_kk')); ?>
                                        </div>
                                    </div>
                                    <!-- end scan KK -->
                                    <div class="mb20">
                                        <label for="label_scan_ktp" class="form-label bold">Scan Kartu Tanda Penduduk (KTP)
                                            <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                induk)_scan_ktp<strong>.pdf</strong></span>
                                        </label>
                                        <input class="form-control scan-lampiran <?= ($validation->hasError('scan_ktp')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['ktp']; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_ktp" type="file" accept="application/pdf" id="ktp" value="<?= $file['ktp']; ?>" />
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('scan_ktp') == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('scan_ktp')); ?>
                                        </div>
                                    </div>
                                    <!-- end scan KTP -->
                                    <?php if ($identitas['id_status_peserta'] == 1 || $identitas['id_status_peserta'] == 2) : ?>
                                        <div class="mb20">
                                            <label for="label_scan_kartu_pelajar" class="form-label bold">Scan Kartu Pelajar
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_kartu_pelajar<strong>.pdf</strong></span>
                                            </label>
                                            <input  class="form-control scan-lampiran <?= ($validation->hasError('scan_kartu_pelajar')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['kartu_pelajar']; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_kartu_pelajar" type="file" accept="application/pdf" id="kartu_pelajar" value="<?= $file['kartu_pelajar']; ?>" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_kartu_pelajar') == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('scan_kartu_pelajar')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan Kartu pelajar -->
                                    <?php else : ?>
                                        <div class="mb20">
                                            <label for="label_scan_kartu_pelajar" class="form-label bold">Scan Kartu Mahasiswa
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_ktm<strong>.pdf</strong></span>
                                            </label>
                                            <input  class="form-control scan-lampiran <?= ($validation->hasError('scan_kartu_pelajar')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['kartu_pelajar']; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_kartu_pelajar" type="file" value="<?= $file['kartu_pelajar']; ?>" accept="application/pdf" id="kartu_pelajar" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_kartu_pelajar') == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('scan_kartu_pelajar')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan Kartu Mahasiswa -->
                                    <?php endif ?>
                                    <div class="mb20">
                                        <label for="label_scan_pas_foto" class="form-label bold">Upload Foto Berwarna
                                            <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                induk)_pas_foto<strong>.jpg/.jpeg/.png</strong></span>
                                        </label>
                                        <input class="form-control <?= ($validation->hasError('scan_pas_foto')) ? 'is-invalid' : ''; ?> lampiran-foto" data-allowed-file-extensions="jpg jpeg png " data-height="200" data-height="100" data-max-file-size="2M" name="scan_pas_foto" type="file" accept="image/*" id="pas_foto" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['pas_foto']; ?>" />
                                    </div>
                                    <!-- end scan_pas_foto -->
                                </div>
                                <div class="col-12 col-md-6">
                                    <?php if ($identitas['id_status_peserta'] == 1) : ?>
                                        <div class="mb20">
                                            <label for="label_scan_raport_smt" class="form-label bold">Scan Nilai Raport
                                                Semester
                                                Terakhir
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan
                                                    file : (no induk)_scan_raport_smt<strong>.pdf</strong></span>
                                            </label>
                                            <input class="form-control scan-lampiran <?= ($validation->hasError('scan_raport_smt')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['raport_smt']; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_raport_smt" type="file" value="<?= $file['raport_smt']; ?>" accept="application/pdf" id="raport_smt" />

                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_raport_smt') == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('scan_raport_smt')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan raport smt terakhir -->
                                        <div class="mb20">
                                            <label for="label_scan_raport" class="form-label bold">Scan Raport Legalisasi
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_raport_legalisasi<strong>.pdf</strong></span>
                                            </label>
                                            <input class="form-control scan-lampiran <?= ($validation->hasError('scan_raport')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['raport']; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_raport" type="file" value="<?= $file['raport_legalisasi']; ?>" accept="application/pdf" id="raport" />
                                        
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_raport') == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('scan_raport')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan raport legalisasi -->
                                    <?php endif ?>
                                    <div class="mb20">
                                        <label for="label_scan_sktm" class="form-label bold">Scan Surat Keterangan Tidak
                                            Mampu
                                            <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                induk)_scan_sktm<strong>.pdf</strong></span>
                                        </label>
                                        <input class="form-control scan-lampiran <?= ($validation->hasError('scan_sktm')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['sktm']; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_sktm" accept="application/pdf" type="file" value="<?= $file['sktm']; ?>" id="sktm" />

                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('scan_sktm') == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('scan_sktm')); ?>
                                        </div>
                                    </div>
                                    <!-- end SKTM -->
                                    <?php if ($identitas['id_status_peserta'] == 2) : ?>
                                        <div class="mb20">
                                            <label for="label_scan_diterima_pt" class="form-label bold">Scan Keterangan Diterima
                                                Perguruan Tinggi
                                                <span class="fs14 lightgrey ms-2"> Contoh
                                                    penamaan file : (no induk)_scan_diteima_pt<strong>.pdf</strong></span>
                                            </label>
                                            <input class="form-control scan-lampiran <?= ($validation->hasError('scan_diterima_pt')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['diterima_pt']; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_diterima_pt" type="file" value="<?= $file['diterima_pt']; ?>" accept="application/pdf" id="diterima_pt" />
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_diterima_pt') == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('scan_diterima_pt')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan diterima perguruan tinggi-->
                                    <?php elseif ($identitas['id_status_peserta'] == 3) : ?>
                                        <div class="mb20">
                                            <label for="label_scan_akreditasi_pt" class="form-label bold">Scan Keterangan
                                                Akreditasi
                                                Perguruan
                                                Tinggi
                                                <span class="fs14 lightgrey ms-2"> Contoh
                                                    penamaan file : (no induk)_scan_akreditasi_pt<strong>.pdf</strong></span>
                                            </label>
                                            <input class="form-control scan-lampiran <?= ($validation->hasError('scan_akreditasi_pt')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['akreditasi_pt']; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_akreditasi_pt" type="file" value="<?= $file['akreditasi_pt']; ?>" accept="application/pdf" id="akreditasi_pt" />
                                            
                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_akreditasi_pt') == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('scan_akreditasi_pt')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan akreditasi perguruan tinggi-->
                                    <?php endif ?>
                                    <?php if ($identitas['id_status_peserta'] != 1) : ?>
                                        <div class="mb20">
                                            <label for="label_scan_proposal" class="form-label bold">Scan Proposal Bantuan
                                                <span class="fs14 lightgrey ms-2"> Contoh penamaan file : (no
                                                    induk)_scan_proposal<strong>.pdf</strong></span>
                                            </label>
                                            <input class="form-control scan-lampiran <?= ($validation->hasError('scan_proposal')) ? 'is-invalid' : ''; ?>" data-default-file="<?= base_url(); ?>/assets/scan/<?= $identitas['no_induk']; ?>/file/<?= $file['proposal']; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_proposal" type="file" value="<?= $file['proposal']; ?>" accept="application/pdf" id="proposal" />

                                            <div class="invalid-feedback">
                                                <?= ($validation->getError('scan_proposal') == '') ? 'Bagian kategori prestasi wajib diisi' : str_replace('_', ' ', $validation->getError('scan_proposal')); ?>
                                            </div>
                                        </div>
                                        <!-- end scan_proposal -->
                                    <?php endif ?>
                                </div>
                            </div>
                            <!-- end lampiran dokumen -->

                        </div>
                        <!-- Submit -->
                        <div class="d-flex justify-content-end mt-3">
                            <a href="<?= base_url(); ?>/home_pendaftar/pengumuman" class="btn btn-secondary fs16 me-2 fw-normal">Batal</a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#save_modal" class="btn btn-success fs16 fw-normal">
                                Simpan
                            </button>
                        </div>
                        <!-- end submit -->

                        <!-- Save modal -->
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary fw-normal" data-bs-dismiss="modal">
                                            Batal
                                        </button>
                                        <button type="submit" class="btn btn-success fw-normal">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End save modal -->
                        </form>
                    <?php else : ?>
                        <!-- kirim ulang formulir pendaftaran -->
                        <form action="<?= base_url(); ?>/pendaftaran/simpanEditPendaftaran/<?= $identitas['no_induk']; ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="tab-content bdblue bgwhite br25 p-4 p-sm-5">
                                <input type="text" hidden name="scan_formulir_pendaftaran_lama" value="<?= $file['formulir_pendaftaran']; ?>">
                                <h3 class="mb20 fs20 blue">Silahkan Upload Kembali Formulir Pendaftaran</h3>

                                <div class="alert alert-primary">
                                    <h6 class="bold">Ketentuan :</h6>
                                    <p class="fs14">
                                        1. Download formulir pendaftaran <a class="text-decoration-underline" href="<?= base_url(); ?>/home_pendaftar/download_detail_pendaftar/<?= $identitas['no_induk']; ?>" target="_blank">Disini</a>
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
                                    <input required id="formulir_pendaftaran" class="form-control w-100 scan-lampiran <?= ($validation->hasError('scan_formulir_pendaftaran')) ? 'is-invalid' : ''; ?>" data-allowed-file-extensions="pdf" data-height="100" data-max-file-size="2M" name="scan_formulir_pendaftaran" type="file" accept="application/pdf" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('scan_formulir_pendaftaran') == '') ? 'Bagian scan formulir pendaftaran wajib diisi dan ukuran file tidak boleh lebih dari 8MB' : str_replace('_', ' ', $validation->getError('scan_formulir_pendaftaran')); ?>
                                    </div>
                                </div>
                                <!-- end scan Kartu pelajar -->
                            </div>
                            <!-- Submit -->
                            <div class="mt-3 text-end">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#save_formulir_modal" class="btn btn-primary fs16 fw-normal">
                                    Simpan
                                </button>
                            </div>
                            <!-- end submit -->
                            <!-- SAVE  Modal -->
                            <div class="modal fade" id="save_formulir_modal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
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
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary fw-normal" data-bs-dismiss="modal">
                                                Batal
                                            </button>
                                            <button type="submit" class="btn btn-success fw-normal">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
    </div>
</div>
<script>
    // hide prestasi
    <?php if ($prestasi[1] == null) : ?>
        $(document).ready(function() {
            $("#edit_prestasi_2").hide();
            $("#prestasi_2_modal").hide();
        });
    <?php endif ?>
    <?php if ($prestasi[2] == null) : ?>
        $(document).ready(function() {
            $("#edit_prestasi_3").hide();
            $("#prestasi_3_modal").hide();
        });
    <?php endif ?>
    // fungsi menambah prestasi 2
    function tambah_edit_prestasi_2() {
        $("#edit_prestasi_2").show();
        // $("#prestasi_2_modal").show();
        $("#icon-tambah-1").hide();
        $("#label-tambah-1").hide();
    }
    // jika terdapat error dalam input prestasi 2
    <?php if ($validation->getError('scan_prestasi_2') != null || $validation->getError('nama_prestasi_2') != null || $validation->getError('kategori_2') != null || $validation->getError('tahun_prestasi_2') != null) : ?>
        $(document).ready(function() {

            $("#edit_prestasi_2").show();
            // $("#prestasi_2_modal").show();
            $("#icon-tambah-1").hide();
            $("#label-tambah-1").hide();
        });
    <?php endif ?>

    function tambah_edit_prestasi_3() {
        console.log('loogag');
        $("#edit_prestasi_3").show();
        // $("#prestasi_3_modal").show();
        $("#icon-tambah-2").hide();
        $("#label-tambah-2").hide();
    }
    // jika terdapat error dalam input prestasi 2
    <?php if ($validation->getError('scan_prestasi_3') != null || $validation->getError('nama_prestasi_3') != null || $validation->getError('kategori_3') != null || $validation->getError('tahun_prestasi_3') != null) : ?>
        $(document).ready(function() {

            $("#edit_prestasi_3").show();
            // $("#prestasi_2_modal").show();
            $("#icon-tambah-2").hide();
            $("#label-tambah-2").hide();
        });
    <?php endif ?>

    // dropify upload lampiran
    $(".scan-lampiran").dropify({
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