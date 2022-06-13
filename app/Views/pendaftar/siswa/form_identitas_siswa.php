<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>
<!-- Form pendaftaran -->
<div class="bg-abu p40">
    <div class="container">
        <form action="<?= base_url(); ?>/siswa/simpan_tambah_identitas_siswa" method="post" class="needs-validation"
            novalidate>
            <h2 class="mb20 fs30">Form Pendaftaran Beasiswa SMA/SMK/MA Sederajat</h2>
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
                                class="required-label"></span></label>
                        <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                            class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>"
                            aria-label="Default select example" name="jenis_kelamin">
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
                    <div class="mb20">
                        <label for="no_induk" class="form-label">NISN <span class="required-label"></span></label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text" maxlength="10"
                            name="no_induk"
                            class="form-control <?= ($validation->hasError('no_induk')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['no_induk'] : old('no_induk'); ?>"
                            name="no_induk" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_induk') == '') ? 'Bagian NIS/NISN  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk')) ?>
                        </div>
                    </div>
                    <!-- end NISN -->
                    <div class="mb20">
                        <label for="ttl" class="form-label">Tempat, Tanggal Lahir
                            <span class="required-label">Contoh : Batang, 19 Agustus 2000</span></label>
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
                        <label for="agama" class="form-label">Agama <span class="required-label"></span></label>
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
                                        } ?> value="<?= $agama['id_agama']; ?>"><?= $agama['nama_agama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('agama') == '') ? 'Bagian agama wajib diisi' : str_replace('_', ' ', $validation->getError('agama')) ?>
                        </div>
                    </div>
                    <!-- end agama -->
                    <div class="mb20">
                        <label for="anak_ke" class="form-label">Anak Ke <span class="required-label"></span></label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number"
                            class="form-control <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['anak_ke'] : old('anak_ke'); ?>" name="anak_ke"
                            min="1" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('anak_ke') == '') ? 'Bagian anak ke  wajib diisi' : str_replace('_', ' ', $validation->getError('anak_ke')); ?>
                        </div>
                    </div>
                    <!-- end anak ke -->
                    <div class="mb20">
                        <label for="pernah_menerima_bantuan" class="form-label">Apakah Calon Penerima Beasiswa Pernah
                            Menerima Bantuan?
                            <span class="required-label"></span></label>
                        <select required id="pernah_menerima_bantuan" <?= ($identitas != null) ? 'disabled' : ''; ?>
                            class="form-select <?= ($validation->hasError('pernah_menerima_bantuan')) ? 'is-invalid' : ''; ?>"
                            aria-label="Default select example" name="pernah_menerima_bantuan">
                            <option selected hidden></option>
                            <?php foreach ($opsional as $opsional) : ?>
                            <option <?php if ($identitas != null) {
                                            if ($identitas['pernah_menerima_bantuan'] == $opsional) {
                                                echo 'selected';
                                            };
                                        } else {
                                            if (old('pernah_menerima_bantuan') == $opsional) {
                                                echo 'selected';
                                            }
                                        } ?> value="<?= $opsional; ?>"><?= ucfirst($opsional); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('pernah_menerima_bantuan') == '') ? 'Bagian pernah_menerima_bantuan  wajib diisi' : str_replace('_', ' ', $validation->getError('pernah_menerima_bantuan')); ?>
                        </div>
                    </div>
                    <!-- end pernah menerima bantuan -->
                    <div class="mb20">
                        <label for="menerima_bantuan_dari" class="form-label">Jika Ya, Menerima Bantuan
                            Dari</label>
                        <input required id="menerima_bantuan_dari" <?= ($identitas != null) ? 'disabled' : ''; ?>
                            id="menerima_bantuan_dari" type="text" maxlength="16"
                            class="form-control <?= ($validation->hasError('menerima_bantuan_dari')) ? 'is-invalid' : ''; ?>"
                            value="<?= ($identitas != null) ? $identitas['menerima_bantuan_dari'] : old('menerima_bantuan_dari'); ?>"
                            name="menerima_bantuan_dari" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('menerima_bantuan_dari') == '') ? 'Bagian no telepon  wajib diisi' : str_replace('_', ' ', $validation->getError('menerima_bantuan_dari')) ?>
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
                        <small>alamat berisi dukuh, rt, rw, desa, dan jalan</small>

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
                        <label for="kecamatan" class="form-label">Kecamatan <span class="required-label"></span></label>
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
                                <?= $kecamatan['nama_kecamatan']; ?>
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
                        <label for="sekolah" class="form-label">Sekolah <span class="required-label"></span></label>
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
                                        } ?> value="<?= $sekolah['id_sekolah']; ?>"><?= $sekolah['nama_sekolah']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('sekolah') == '') ? 'Bagian sekolah wajib diisi' : $validation->getError('sekolah'); ?>
                        </div>
                    </div>
                    <!-- end sekolah -->
                    <div class="mb20">
                        <label for="kelas" class="form-label">Kelas <span class="required-label"></span></label>
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
                        py-2">Selanjutnya</a>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Anda harus mengisi form dan menyimpannya terlebih dahulu.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Oke
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End form pendaftaran -->


<?= $this->endSection(); ?>