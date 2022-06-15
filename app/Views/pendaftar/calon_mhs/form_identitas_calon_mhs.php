<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>

<!-- Form pendaftaran -->
<div class="bg-abu py40">
    <div class="container form__calon">
        <form action="<?= base_url(); ?>/calon_mhs/simpan_tambah_identitas_calon_mhs" method="post" class="needs-validation" novalidate>
            <h3 class="mb20 biru fw-bold">Form Pendaftaran Beasiswa <span class="orange"> Calon Mahasiswa</span></h3>
            <!-- alert identitas -->
            <?php if (session()->getFlashdata('pesan-tambah-identitas-calon-mhs')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan-tambah-identitas-calon-mhs'); ?>
                </div>
            <?php endif; ?>
            <!-- end alert identitas -->
            <div class="d-flex justify-content-between align-content-center mb20">
                <h3>A. Identitas Diri</h3>
            </div>
            <div class="row mb40">
                <div class="col-12 col-md-6">
                    <div class="mb20">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap </label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['nama_lengkap'] : old('nama_lengkap'); ?>" name="nama_lengkap" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('nama_lengkap') == '') ? 'Bagian nama lengkap  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_lengkap')); ?>
                        </div>
                    </div>
                    <!-- end nama lengkap -->
                    <div class="mb20">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <!-- radio button -->
                        <!-- <select required <?= ($identitas != null) ? 'disabled' : ''; ?>
                            class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>"
                            aria-label="Default select example" name="jenis_kelamin">
                            <option hidden></option> -->
                        <div class="form-check">
                            <input <?= ($identitas != null) ? 'disabled' : ''; ?> required type="radio" class="form-check-input" name="jenis_kelamin" id="L" <?php if ($identitas != null) {
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
                            <input <?= ($identitas != null) ? 'disabled' : ''; ?> required type="radio" class="form-check-input" name="jenis_kelamin" id="P" <?php if ($identitas != null) {
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
                    <div class="mb20">
                        <label for="no_induk" class="form-label">NIK </label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number" min="0" max="9999999999999999" name="no_induk" class="form-control <?= ($validation->hasError('no_induk')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_induk'] : old('no_induk'); ?>" name="no_induk" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_induk') == '') ? 'Bagian NIK  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk')) ?>
                        </div>
                    </div>
                    <!-- end NIK -->
                    <div class="mb20">
                        <label for="no_induk_pelajar" class="form-label">NISN </label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text" maxlength="10" name="no_induk_pelajar" class="form-control <?= ($validation->hasError('no_induk_pelajar')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_induk_pelajar'] : old('no_induk_pelajar'); ?>" name="no_induk_pelajar" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_induk_pelajar') == '') ? 'Bagian NISN  wajib diisi' : str_replace('_', ' ', $validation->getError('no_induk_pelajar')) ?>
                        </div>
                    </div>
                    <!-- end NISN -->
                    <div class="mb20">
                        <label for="ttl" class="form-label">Tempat, Tanggal Lahir
                            <span class="required-label">Contoh : Batang, 19 Agustus 2000</span></label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text" class="form-control <?= ($validation->hasError('ttl')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['ttl'] : old('ttl'); ?>" name="ttl" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('ttl') == '') ? 'Bagian tempat, tanggal lahir  wajib diisi' : str_replace('_', ' ', $validation->getError('ttl')) ?>
                        </div>
                    </div>
                    <!-- end Tempat, Tanggal Lahir -->
                    <div class="mb20">
                        <label for="agama" class="form-label">Agama </label>
                        <select required <?= ($identitas != null) ? 'disabled' : ''; ?> class="form-select <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="agama">
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
                        <label for="no_telepon" class="form-label">Nomer Telepon </label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number" min="0" max="999999999999999" class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['no_telepon'] : old('no_telepon'); ?>" name="no_telepon" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('no_telepon') == '') ? 'Bagian no telepon  wajib diisi dan kurang dari 15 angka' : str_replace('_', ' ', $validation->getError('no_telepon')) ?>
                        </div>
                    </div>
                    <!-- end Nomer Telepon -->
                    <div class="mb20">
                        <label for="pernah_menerima_bantuan" class="form-label">Apakah Calon Penerima Beasiswa Pernah
                            Menerima Bantuan? </label>
                        <!-- <select required id="pernah_menerima_bantuan" <?= ($identitas != null) ? 'disabled' : ''; ?>
                            class="form-select <?= ($validation->hasError('pernah_menerima_bantuan')) ? 'is-invalid' : ''; ?>"
                            aria-label="Default select example" name="pernah_menerima_bantuan">
                            <option selected hidden></option> -->
                        <div class="form-check">
                            <?php foreach ($opsional as $opsional) : ?>
                                <input class="form-check-input" type="radio" required <?= ($identitas != null) ? 'disabled' : ''; ?> name="pernah_menerima_bantuan" id="pernah_menerima_bantuan_<?= $opsional; ?>" <?php if ($identitas != null) {
                                                                                                                                                                                                                        if ($identitas['pernah_menerima_bantuan'] == $opsional) {
                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                        };
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        if (old('pernah_menerima_bantuan') == $opsional) {
                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    } ?> value="<?= $opsional; ?>">
                                <label class="form-check-label" for="pernah_menerima_bantuan_<?= $opsional; ?>">
                                    <?= ucfirst($opsional); ?>
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
                        <input id="menerima_bantuan_dari" <?= ($identitas != null) ? 'disabled' : ''; ?> id="menerima_bantuan_dari" type="text" maxlength="16" class="form-control <?= ($validation->hasError('menerima_bantuan_dari')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['menerima_bantuan_dari'] : old('menerima_bantuan_dari'); ?>" name="menerima_bantuan_dari" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('menerima_bantuan_dari') == '') ? '' : str_replace('_', ' ', $validation->getError('menerima_bantuan_dari')) ?>
                        </div>
                    </div>
                    <!-- end menerima_bantuan_dari -->
                </div>
                <div class="col-12 col-md-6">
                    <div class="alamat mb20">
                        <label for="alamat_rumah" class="form-label">Alamat Rumah </label>
                        <small class="red">Contoh : alamat berisi dukuh, rt, rw, desa, dan jalan</small>
                        <textarea required <?= ($identitas != null) ? 'disabled' : ''; ?> class="form-control mb-2 <?= ($validation->hasError('alamat_rumah')) ? 'is-invalid' : ''; ?>" name="alamat_rumah" id="alamat_rumah" rows="4"><?= ($identitas != null) ? $identitas['alamat_rumah'] : old('alamat_rumah'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('alamat_rumah') == '') ? 'Bagian alamat rumah  wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_rumah')); ?>
                        </div>
                    </div>
                    <!-- end alamat -->
                    <div class="mb20">
                        <label for="kecamatan" class="form-label">Kecamatan </label>
                        <select required <?= ($identitas != null) ? 'disabled' : ''; ?> class="form-select <?= ($validation->hasError('kecamatan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="kecamatan">
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
                                        } ?> value="<?= ucfirst($kecamatan['id_kecamatan']); ?>">
                                    <?= $kecamatan['nama_kecamatan']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('kecamatan') == '') ? 'Bagian kecamatan  wajib diisi' : str_replace('_', ' ', $validation->getError('kecamatan')); ?>
                        </div>
                    </div>
                    <!-- end kecamatan -->
                    <div class="mb20">
                        <label for="nama_pt" class="form-label">Nama Perguruan Tinggi
                        </label>
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="text" class="form-control <?= ($validation->hasError('nama_pt')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['nama_pt'] : old('nama_pt'); ?>" name="nama_pt" placeholder="" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('nama_pt') == '') ? 'Bagian nama perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('nama_pt')); ?>
                        </div>
                    </div>
                    <!-- end nama_pt -->
                    <div class="mb20">
                        <label for="akreditasi_pt" class="form-label">Akrediktasi Perguruan Tinggi
                        </label>
                        <select required <?= ($identitas != null) ? 'disabled' : ''; ?> class="form-select <?= ($validation->hasError('akreditasi_pt')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="akreditasi_pt">
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
                        <input required <?= ($identitas != null) ? 'disabled' : ''; ?> type="number" class="form-control <?= ($validation->hasError('tahun_masuk_pt')) ? 'is-invalid' : ''; ?>" value="<?= ($identitas != null) ? $identitas['tahun_masuk_pt'] : old('tahun_masuk_pt'); ?>" name="tahun_masuk_pt" placeholder="" min="2010" max="2022" />
                        <div class="invalid-feedback">
                            <?= ($validation->getError('tahun_masuk_pt') == '') ? 'Bagian tahun masuk perguruan tinggiwajib diisi' : str_replace('_', ' ', $validation->getError('tahun_masuk_pt')); ?>
                        </div>
                    </div>
                    <!-- end tahun_masuk_pt -->
                    <div class="mb20">
                        <label for="semester_ke" class="form-label">Semester ke
                        </label>
                        <select required <?= ($identitas != null) ? 'disabled' : ''; ?> class="form-select <?= ($validation->hasError('semester_ke')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="semester_ke">
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
                        <textarea required <?= ($identitas != null) ? 'disabled' : ''; ?> class="form-control <?= ($validation->hasError('alamat_pt')) ? 'is-invalid' : ''; ?>" name="alamat_pt" id="alamat_pt" rows="1"><?= ($identitas != null) ? $identitas['alamat_pt'] : old('alamat_pt'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= ($validation->getError('alamat_pt') == '') ? 'Bagian alamat perguruan tinggi wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_pt')); ?>
                        </div>
                    </div>
                    <!-- end alamat perguruan tinggi-->
                </div>
            </div>
            <!-- end identitas diri -->
            <!-- Submit -->
            <div class="row pb40">
                <div class="col-12 text-end">
                    <?= ($identitas != null) ? '' : '<button type="button" data-bs-toggle="modal" data-bs-target="#save_modal"
                        class="btn btn-success me-3 fs18 px-4 py-2">
                        Simpan
                    </button>'; ?>

                    <a <?= ($identitas != null) ? 'href="' . base_url() . '/calon_mhs/tambah_keluarga_calon_mhs/' .
                            $identitas["no_induk"] . '"' : 'data-bs-toggle="modal" data-bs-target="#selanjutnya_modal"' ?> class="btn btn-primary text-white fs18 px-4
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
                            <button type="button" class="btn btn_orange" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- selanjutnya modal -->
            <div class="modal fade" id="selanjutnya_modal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
<!-- End form pendaftaran -->
<?= $this->endSection(); ?>