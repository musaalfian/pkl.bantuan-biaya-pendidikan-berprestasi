<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>

<!-- Form pendaftaran -->
<div class="bg-abu py40">
    <div class="container form__calon">
        <?php if ($identitas['id_status_peserta'] == 1) : ?>
            <form action="<?= base_url(); ?>/siswa/simpan_tambah_keluarga_siswa/<?= $identitas['no_induk']; ?>" method="post" class="needs-validation" novalidate>
                <!-- end sma -->
            <?php elseif ($identitas['id_status_peserta'] == 2) : ?>
                <form action="<?= base_url(); ?>/calon_mhs/simpan_tambah_keluarga_calon_mhs/<?= $identitas['no_induk']; ?>" method="post" class="needs-validation" novalidate>
                    <!-- end calon mahasiswa -->
                <?php else : ?>
                    <form action="<?= base_url(); ?>/mahasiswa/simpan_tambah_keluarga_mhs/<?= $identitas['no_induk']; ?>" method="post" class="needs-validation" novalidate>
                        <!-- end mahasiswa -->
                    <?php endif; ?>
                    <h3 class="mb20 biru fw-bold">Form Pendaftaran Beasiswa <span class="orange">
                            <?= ($identitas['id_status_peserta'] == 1) ? 'SMA/SMK/MA Sederajat' : (($identitas['id_status_peserta'] == 2) ? 'Calon Mahasiswa' : 'Mahasiswa'); ?></span>
                    </h3>
                    <!-- alert keluarga -->
                    <?php if (session()->getFlashdata('pesan-tambah-keluarga-calon_mhs')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan-tambah-keluarga-calon_mhs'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- end alert keluarga -->
                    <h3 class="mb20">B. Kondisi Keluarga</h3>
                    <div class="row mb40">
                        <div class="col-12 col-md-6">
                            <div class="mb20">
                                <label for="nama_ayah" class="form-label">Nama Ayah / Wali <span class="required-label">*</span></label>
                                <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="text" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['nama_ayah'] : old('nama_ayah'); ?>" name="nama_ayah" placeholder="" />
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('nama_ayah') == '') ? 'Bagian nama ayah wajib diisi' : str_replace('_', ' ', $validation->getError('nama_ayah')); ?>
                                </div>
                            </div>
                            <!-- end nama ayah -->
                            <?php if ($identitas['id_status_peserta'] != 1) : ?>
                                <div class="mb20">
                                    <label for="usia" class="form-label">Usia Ayah / Wali <span class="required-label">*</span></label>
                                    <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="number" class="form-control <?= ($validation->hasError('usia_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['usia_ayah'] : old('usia_ayah'); ?>" id="usia_ayah" name="usia_ayah" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('usia_ayah') == '') ? 'Bagian usia ayah wajib diisi' : $validation->getError('usia_ayah'); ?>
                                    </div>
                                </div>
                            <?php endif ?>
                            <!-- end usia -->
                            <div class="mb20">
                                <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah / Wali
                                    <span class="required-label">*</span></label>
                                <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="text" class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['pekerjaan_ayah'] : old('pekerjaan_ayah'); ?>" name="pekerjaan_ayah" placeholder="" />
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('pekerjaan_ayah') == '') ? 'Bagian pekerjaan ayah  wajib diisi' : str_replace('_', ' ', $validation->getError('pekerjaan_ayah')); ?>
                                </div>
                            </div>
                            <!-- end pekerjaan ayah -->
                            <div class="mb20">
                                <label for="pendidikan_ayah" class="form-label">Pendidikan Terakhir Ayah / Wali
                                    <span class="required-label">*</span></label>
                                <select required <?= ($keluarga != null) ? 'disabled' : ''; ?> class="form-select <?= ($validation->hasError('pendidikan_ayah')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="pendidikan_ayah">
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
                                <label for="penghasilan_ayah" class="form-label">Penghasilan per Bulan Ayah / Wali
                                    <span class="required-label">*</span></label>
                                <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="number" min="0" class="form-control <?= ($validation->hasError('penghasilan_ayah')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['penghasilan_ayah'] : old('penghasilan_ayah'); ?>" name="penghasilan_ayah" placeholder="" />
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('penghasilan_ayah') == '') ? 'Bagian penghasilan ayah wajib diisi' : str_replace('_', ' ', $validation->getError('penghasilan_ayah')); ?>
                                </div>
                            </div>
                            <!-- end Pneghasilan ayah -->
                            <div class="mb20">
                                <label for="alamat_ayah" class="form-label">Alamat Ayah / Wali
                                    <span class="required-label">*</span></label>
                                <textarea required <?= ($keluarga != null) ? 'disabled' : ''; ?> class="form-control <?= ($validation->hasError('alamat_ayah')) ? 'is-invalid' : ''; ?>" name="alamat_ayah" name="alamat_ayah" rows="5"><?= ($keluarga != null) ? $keluarga['alamat_ayah'] : old('alamat_ayah'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('alamat_ayah') == '') ? 'Bagian alamat ayah wajib diisi' : str_replace('_', ' ', $validation->getError('alamat_ayah')); ?>
                                </div>
                            </div>
                            <!-- end alamat -->
                        </div>
                        <!-- Ayah / Wali -->
                        <div class="col-12 col-md-6">
                            <div class="mb20">
                                <label for="nama_ibu" class="form-label">Nama Ibu / Wali <span class="required-label">*</span></label>
                                <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="text" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['nama_ibu'] : old('nama_ibu'); ?>" name="nama_ibu" placeholder="" />
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('nama_ibu') == '') ? 'Bagian nama ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('nama_ibu')); ?>
                                </div>
                            </div>
                            <!-- end nama Ibu / Wali -->
                            <?php if ($identitas['id_status_peserta'] != 1) : ?>
                                <div class="mb20">
                                    <label for="usia_ibu" class="form-label">Usia Ibu / Wali <span class="required-label">*</span></label>
                                    <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="number" class="form-control <?= ($validation->hasError('usia_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['usia_ibu'] : old('usia_ibu'); ?>" id="usia_ibu" name="usia_ibu" placeholder="" />
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('usia_ibu') == '') ? 'Bagian usia ibu wajib diisi' : $validation->getError('usia_ibu'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <!-- end usia -->
                            <div class="mb20">
                                <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu / Wali
                                    <span class="required-label">*</span></label>
                                <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="text" class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['pekerjaan_ibu'] : old('pekerjaan_ibu'); ?>" name="pekerjaan_ibu" placeholder="" />
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('pekerjaan_ibu') == '') ? 'Bagian pekerjaan ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('pekerjaan_ibu')); ?>
                                </div>
                            </div>
                            <!-- end pekerjaan Ibu / Wali -->
                            <div class="mb20">
                                <label for="pendidikan_ibu" class="form-label">Pendidikan Terakhir Ibu / Wali
                                    <span class="required-label">*</span></label>
                                <select required <?= ($keluarga != null) ? 'disabled' : ''; ?> class="form-select <?= ($validation->hasError('pendidikan_ibu')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="pendidikan_ibu">
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
                                <label for="penghasilan_ibu" class="form-label">Penghasilan per Bulan Ibu / Wali
                                    <span class="required-label">*</span></label>
                                <input required <?= ($keluarga != null) ? 'disabled' : ''; ?> type="number" min="0" class="form-control <?= ($validation->hasError('penghasilan_ibu')) ? 'is-invalid' : ''; ?>" value="<?= ($keluarga != null) ? $keluarga['penghasilan_ibu'] : old('penghasilan_ibu'); ?>" name="penghasilan_ibu" placeholder="" />
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('penghasilan_ibu') == '') ? 'Bagian penghasilan ibu  wajib diisi' : str_replace('_', ' ', $validation->getError('penghasilan_ibu')); ?>
                                </div>
                            </div>
                            <!-- end Pneghasilan Ibu / Wali -->
                            <div class="mb20">
                                <label for="alamat_ibu" class="form-label">Alamat Ibu / Wali
                                    <span class="required-label">*</span></label>
                                <textarea required <?= ($keluarga != null) ? 'disabled' : ''; ?> class="form-control <?= ($validation->hasError('alamat_ibu')) ? 'is-invalid' : ''; ?>" name="alamat_ibu" id="alamat_ibu" rows="5"><?= ($keluarga != null) ? $keluarga['alamat_ibu'] : old('alamat_ibu'); ?></textarea>
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
                    <h3 class="mb20">C. Apakah Calon Penerima Bantuan Terdaftar Sebagai </h3>
                    <div class="row mb40">
                        <div class="col-12 col-md-6">
                            <div class="mb20">
                                <label for="rtsm_rtm" class="form-label">Rumah Tangga Sangat Miskin (RTSM) / Rumah
                                    Tangga Miskin
                                    (RTM)? <span class="required-label">*</span></label>

                                <!-- radio button -->
                                <!-- <select required <?= ($keluarga != null) ? 'disabled' : ''; ?>
                            class="form-select <?= ($validation->hasError('rtsm_rtm')) ? 'is-invalid' : ''; ?>"
                            aria-label="Default select example" name="rtsm_rtm" id="rtsm_rtm">
                            <option selected hidden></option> -->
                                <div class="form-check">

                                    <?php foreach ($opsional as $opsional_rstm) : ?>
                                        <input name="rtsm_rtm" id="rtsm_rtm_<?= ucfirst($opsional_rstm); ?>" required type="radio" class="form-check-input" <?= ($keluarga != null) ? 'disabled' : ''; ?> <?php if ($keluarga != null) {
                                                                                                                                                                                                                if ($keluarga['rtsm_rtm'] == $opsional_rstm) {
                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                };
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                if (old('rtsm_rtm') == $opsional_rstm) {
                                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                                }
                                                                                                                                                                                                            } ?> value="<?= $opsional_rstm; ?>"><label for="rtsm_rtm_<?= ucfirst($opsional_rstm); ?>" class="form-check-label"><?= ucfirst($opsional_rstm); ?></label>
                                    <?php endforeach; ?>
                                    <!-- </select> -->
                                </div>
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('rtsm_rtm') == '') ? 'Bagian Rumah Tangga Sangat Miskin (RTSM) / Rumah Tangga Miskin
                            (RTM) wajib diisi' : str_replace('_', ' ', $validation->getError('rtsm_rtm')); ?>
                                </div>
                            </div>
                            <!-- end rtsm rtm -->
                            <div class="mb20">
                                <label for="pkh_kks_kbs" class="form-label">Peserta Program Keluarga Harapan (PKH)/Kart
                                    Keluarga Sejahtera
                                    (KKS) dan Kartu Batang Sehat (KBS)?
                                    <span class="required-label">*</span></label>

                                <!-- radio button -->
                                <!-- <select required <?= ($keluarga != null) ? 'disabled' : ''; ?>
                            class="form-select <?= ($validation->hasError('pkh_kks_kbs')) ? 'is-invalid' : ''; ?>"
                            aria-label="Default select example" name="pkh_kks_kbs" id="pkh_kks_kbs">
                            <option selected hidden></option> -->
                                <div class="form-check">
                                    <?php foreach ($opsional as $opsional_pkh) : ?>
                                        <input type="radio" class="form-check-input" required name="pkh_kks_kbs" id="pkh_kks_kbs_<?= ucfirst($opsional_pkh); ?>" <?= ($keluarga != null) ? 'disabled' : ''; ?> <?php if ($keluarga != null) {
                                                                                                                                                                                                                    if ($keluarga['pkh_kks_kbs'] == $opsional_pkh) {
                                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                                    };
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    if (old('pkh_kks_kbs') == $opsional_pkh) {
                                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                } ?> value="<?= $opsional_pkh; ?>"><label for="pkh_kks_kbs_<?= ucfirst($opsional_pkh); ?>" class="form-check-label"><?= ucfirst($opsional_pkh); ?></label>
                                    <?php endforeach; ?>
                                    <!-- </select> -->
                                </div>
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('pkh_kks_kbs') == '') ? 'Bagian Peserta Program Keluarga Harapan (PKH)/Kart
                            Keluarga Sejahtera
                            (KKS) dan Kartu Batang Sehat (KBS)  wajib diisi' : str_replace('_', ' ', $validation->getError('pkh_kks_kbs')); ?>
                                </div>
                            </div>
                            <!-- end pkh kks kbs -->
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb20">
                                <label for="bsm_kip" class="form-label">Penerimaan BSM atau Kartu Indonesia Pintar
                                    (KIP)?
                                    <span class="required-label">*</span></label>
                                <!-- radio button -->
                                <!-- <select required <?= ($keluarga != null) ? 'disabled' : ''; ?>
                            class="form-select <?= ($validation->hasError('bsm_kip')) ? 'is-invalid' : ''; ?>"
                            aria-label="Default select example" name="bsm_kip" id="bsm_kip">
                            <option selected hidden></option> -->
                                <div class="form-check">
                                    <?php foreach ($opsional as $opsional_bsm) : ?>
                                        <input name="bsm_kip" id="bsm_kip_<?= ucfirst($opsional_bsm); ?>" type="radio" class="form-check-input" required <?= ($keluarga != null) ? 'disabled' : ''; ?> <?php if ($keluarga != null) {
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
                    <div class="row pb40">
                        <div class="col-12 text-end">
                            <?= ($keluarga != null) ? '' : '<button type="button" data-bs-toggle="modal" data-bs-target="#save_modal"
                        class="btn btn-success me-3 fs18 px-4 py-2">
                        Simpan
                    </button>'; ?>
                            <?php if ($identitas['id_status_peserta'] == 1) : ?>
                                <a <?= ($keluarga != null) ? 'href="' . base_url() . '/siswa/tambah_lampiran_siswa/' .
                                        $identitas["no_induk"] . '"' : 'data-bs-toggle="modal" data-bs-target="#selanjutnya_modal"' ?> class="btn btn-primary text-white fs18 px-4 py-2">
                                    Selanjutnya</a>
                                <!-- end sma -->
                            <?php elseif ($identitas['id_status_peserta'] == 2) : ?>
                                <a <?= ($keluarga != null) ? 'href="' . base_url() . '/calon_mhs/tambah_lampiran_calon_mhs/' .
                                        $identitas["no_induk"] . '"' : 'data-bs-toggle="modal" data-bs-target="#selanjutnya_modal"' ?> class="btn btn-primary text-white fs18 px-4 py-2">
                                    Selanjutnya</a>
                                <!-- end calon mahasiswa -->
                            <?php else : ?>
                                <a <?= ($keluarga != null) ? 'href="' . base_url() . '/mahasiswa/tambah_lampiran_mhs/' .
                                        $identitas["no_induk"] . '"' : 'data-bs-toggle="modal" data-bs-target="#selanjutnya_modal"' ?> class="btn btn-primary text-white fs18 px-4 py-2">
                                    Selanjutnya</a>
                                <!-- end mahasiswa -->
                            <?php endif; ?>
                        </div>
                    </div>
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
                    <!-- Selanjutnya  Modal -->
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