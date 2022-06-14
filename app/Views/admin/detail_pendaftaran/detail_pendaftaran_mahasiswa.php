<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main section-->
<div class=" bg-abu p40">
    <div class="admin-content detail mx-auto">
        <div class="row justify-content-around">
            <h3 class="col-6 pb20">Detail Data Beasiswa Mahasiswa</h3>
            <div class="col-6 text-end">
                <button class="btn btn-primary mx-3">
                    <a style="text-decoration: none;" class="text-white"
                        href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['formulir_pendaftaran']; ?>"
                        target="_blank">Download formulir pendaftaran</a>
                </button>
            </div>
        </div>
        <div class="alert alert-primary">
            Catatan :
            <ol>
                <li>Untuk menampilkan nilai prestasi (hafidz, perlombaan), silahkan refresh halaman terlebih dahulu</li>
                <li>Untuk nilai 200 artinya diterima langsung</li>
            </ol>
        </div>
        <div class="bg-white p-lg-5 p-md-3">
            <div class="row gx-5">
                <!-- alert nilai -->
                <?php if (session()->getFlashdata('pesan-edit-nilai-pendaftar')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan-edit-nilai-pendaftar'); ?>
                </div>
                <?php endif; ?>
                <!-- end alert nilai -->
                <!-- alert verifikasi -->
                <?php if (session()->getFlashdata('pesan-edit-verifikasi-pendaftar')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan-edit-verifikasi-pendaftar'); ?>
                </div>
                <?php endif; ?>
                <!-- end alert verifikasi -->
                <div class="mb20">
                    <h4 class="">A. Identitas Diri</h4>
                </div>
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_lengkap']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?= ($detail_pendaftar['jenis_kelamin'] == 'L') ? 'Laki - laki' : 'Perempuan'; ?>
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>NIM </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['no_induk_pelajar']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['ttl']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_agama']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pernah Menerima Bantuan? </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pernah_menerima_bantuan']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jika Ya, Menerima Bantuan Dari </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['menerima_bantuan_dari']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['no_telepon']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Perguruan Tinggi</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_pt']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- end identitas kiri -->
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Alamat </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['alamat_rumah']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_kecamatan']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Akrediktasi Perguruan Tinggi </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['akreditasi_pt']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun Masuk Perguruan Tinggi </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['tahun_masuk_pt']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Semester ke </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['semester_ke']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Perguruan Tinggi </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['alamat_pt']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- end identitas kanan -->
            </div>
            <!-- end identitas  -->
            <div class="row m20 ">
                <div class="mb20">
                    <h4>B. Kondisi Orang Tua </h4>
                </div>
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Ayah / Wali</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_ayah']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end nama ayah -->
                            <tr>
                                <td>Usia Ayah / Wali</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['usia_ayah']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end usia ayah -->
                            <tr>
                                <td>Pekerjaan Ayah / Wali</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pekerjaan_ayah']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end pekerjaan ayah -->
                            <tr>
                                <td>Pendidikan Terakhir Ayah / Wali </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pendidikan_ayah']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end pendidikan ayah -->
                            <tr>
                                <td>Penghasilan per Bulan Ayah / Wali</td>
                                <td>:</td>
                                <td>Rp <?= number_format($detail_pendaftar['penghasilan_ayah'], 0, ',', '.'); ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end penghasilan ayah -->
                            <tr>
                                <td>Alamat Ayah / Wali</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['alamat_ayah']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end alamat ayah -->
                        </tbody>
                    </table>
                </div>
                <!-- end keluarga kiri -->
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Ibu / Wali </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_ibu']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end nama ibu -->
                            <tr>
                                <td>Usia Ibu / Wali </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['usia_ibu']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end usia ibu -->
                            <tr>
                                <td>Pekerjaan Ibu / Wali</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pekerjaan_ibu']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end pekerjaan ibu -->
                            <tr>
                                <td>Pendidikan Terakhir Ibu / Wali </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pendidikan_ibu']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- edn pendidikan ibu -->
                            <tr>
                                <td>Penghasilan per Bulan Ibu / Wali </td>
                                <td>:</td>
                                <td>Rp <?= number_format($detail_pendaftar['penghasilan_ibu'], 0, ',', '.'); ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end penghasilan ibu -->
                            <tr>
                                <td>Alamat Ibu / Wali </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['alamat_ibu']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end alamat ibu -->
                        </tbody>
                    </table>
                </div>
                <!-- end keluarga kanan -->
            </div>
            <!-- end keluarga -->
            <div class="row m20 ">
                <div class="mb20">
                    <h4>C. Apakah Calon Penerima Bantuan Terdaftar Sebegai </h4>
                </div>
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Rumah Tangga Sangat Miskin (RTSM) / Rumah Tangga Miskin (RTM)? </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['rtsm_rtm']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Peserta Program Keluarga Harapan (PKH)/Kart Keluarga Sejahtera (KKS) dan Kartu
                                    Batang Sehat (KBS)?</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pkh_kks_kbs']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end keluarga kiri -->
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Penerimaan BSM atau Kartu Indonesia Pintar (KIP) </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['bsm_kip']; ?></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end keluarga kanan -->
            </div>
            <!-- end terdaftar sebagai  -->
            <div class="row m20 border-bottom">
                <div class="m20">
                    <h4>D. Prestasi </h4>
                </div>
                <form
                    action="<?= base_url(); ?>/Admin_Detail_Pendaftaran/simpan_penilaian/<?= $detail_pendaftar['no_induk']; ?>"
                    method="post">
                    <?php $i = 1; ?>
                    <?php foreach ($prestasi as $prestasi) : ?>
                    <div class="row mb20">
                        <div class="col-6 col-sm-3 mb-2">
                            <label for="prestasi_<?= $i; ?>" class="form-label">Scan Prestasi
                            </label>
                            <input disabled class="form-control" name="scan_prestasi_<?= $i; ?>"
                                id="scan_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['file_prestasi']; ?>" />
                        </div>
                        <!-- end nama file prestasi -->
                        <div class="col-1 align-self-end mb-2">
                            <!-- <label for="prestasi_<?= $i; ?>" class="form-label">
                            </label> -->
                            <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/prestasi/<?= $prestasi['file_prestasi']; ?>"
                                class="btn btn-white " target="_blank">lihat</a>
                        </div>
                        <!-- end lihat prestasi -->
                        <div class="col-6 col-sm-4 mb-2">
                            <label for="nama_prestasi_<?= $i; ?>" class="form-label">Nama_Prestasi
                            </label>
                            <input disabled class="form-control" name="nama_prestasi_<?= $i; ?>"
                                id="nama_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['nama_prestasi']; ?>" />
                        </div>
                        <!-- end nama prestasi -->
                        <div class="col-4 col-sm-4 mb-2">
                            <label for="kategori_prestasi_<?= $i; ?>" class="form-label">Kategori
                            </label>
                            <input disabled class="form-control" name="kategori_prestasi_<?= $i; ?>"
                                id="kategori_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['kategori']; ?>" />
                        </div>
                        <!-- end kategori prestasi -->
                        <div class="col-4 col-sm-3 mb-2">
                            <label for="tingkat_prestasi_<?= $i; ?>" class="form-label">Tingkat
                            </label>
                            <input disabled class="form-control" name="tingkat_prestasi_<?= $i; ?>"
                                id="tingkat_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['tingkat']; ?>" />
                        </div>
                        <!-- end tingkat prestasi -->

                        <div class="col-4 col-sm-3 mb-2">
                            <label for="juara_prestasi_<?= $i; ?>" class="form-label">Juara
                            </label>
                            <input disabled class="form-control" name="juara_prestasi_<?= $i; ?>"
                                id="juara_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['juara']; ?>" />
                        </div>
                        <!-- end juara prestasi -->
                        <div class="col-3 col-sm-3 mb-2">
                            <label for="tahun_prestasi_<?= $i; ?>" class="form-label">Tahun
                            </label>
                            <input disabled class="form-control" name="tahun_prestasi_<?= $i; ?>"
                                id="tahun_prestasi_<?= $i; ?>" type="text"
                                value="<?= $prestasi['tahun_prestasi']; ?>" />
                        </div>
                        <!-- end tahun prestasi -->

                        <div class="col-3">
                            <label for="nilai_prestasi_<?= $i; ?>" class="form-label">Penilaian
                            </label>
                            <input required class="form-control" name="nilai_prestasi_<?= $i; ?>"
                                id="nilai_prestasi_<?= $i; ?>" type="number" value="<?= $prestasi['nilai']; ?>" />
                        </div>
                        <!-- end nilai prestasi -->

                    </div>
                    <hr>
                    <?php $i++; ?>
                    <?php endforeach; ?>


                    <!-- Submit -->
                    <div class="row pb40">
                        <div class="col-12 text-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#save_nilai_modal"
                                class="btn btn-success me-3 fs18 px-4 py-2">
                                Simpan
                            </button>
                        </div>
                    </div>
                    <!-- end submit -->

                    <!-- SAVE  Modal -->
                    <div class="modal fade" id="save_nilai_modal" tabindex="-1" aria-labelledby="saveModalLabel"
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>



                </form>


            </div>
            <!-- end prestasi -->
            <div class="row m20 border-bottom">
                <div class="m20">
                    <h4>D. Lampiran Dokumen </h4>
                </div>
                <div class="row pb-4">
                    <div class="col-lg-10 col-12">
                        <div class="row">
                            <div class="col-lg-6 c0l-12">
                                <table class="table">
                                    <tbody>
                                        <tr class="mt20">
                                            <td>
                                                <p>Kartu Keluarga (KK)</p>
                                                <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['kk']; ?>"
                                                    class="btn btn-white mt15" target="_blank">lihat</a>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value=""
                                                        aria-label="Checkbox for following text input">
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end kk -->
                                        <tr class="mt20">
                                            <td>
                                                <p>Kartu Tanda Penduduk (KTP)</p>
                                                <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['ktp']; ?>"
                                                    class="btn btn-white mt15" target="_blank">lihat</a>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value=""
                                                        aria-label="Checkbox for following text input">
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end ktp -->
                                        <tr>
                                            <td>
                                                <p>Foto Berwarna Ukuran 3x4</p>
                                                <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['pas_foto']; ?>"
                                                    class="btn btn-white mt15" target="_blank">lihat</a>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value=""
                                                        aria-label="Checkbox for following text input">
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end pas foto -->
                                        <tr>
                                            <td>
                                                <p>Kartu Pelajar</p>
                                                <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['kartu_pelajar']; ?>"
                                                    class="btn btn-white mt15" target="_blank">lihat</a>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value=""
                                                        aria-label="Checkbox for following text input">
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end kartu pelajar -->
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-lg-6 c0l-12">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p>Surat Akreditasi Perguruan Tinggi</p>
                                                <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['akreditasi_pt']; ?>"
                                                    class="btn btn-white mt15" target="_blank">lihat</a>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value=""
                                                        aria-label="Checkbox for following text input">
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end Surat Akreditasi Perguruan Tinggi -->
                                        <tr>
                                            <td>
                                                <p>Proposal Bantuan</p>
                                                <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['proposal']; ?>"
                                                    class="btn btn-white mt15" target="_blank">lihat</a>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value=""
                                                        aria-label="Checkbox for following text input">
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end Proposal Bantuan -->
                                        <tr>
                                            <td>
                                                <p>Surat Keterangan Tidak Mampu</p>
                                                <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['sktm']; ?>"
                                                    class="btn btn-white mt15" target="_blank">lihat</a>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value=""
                                                        aria-label="Checkbox for following text input">
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end SKTM -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end lampiran dokumen -->
            <form
                action="<?= base_url(); ?>/Admin_Detail_Pendaftaran/simpan_verifikasi/<?= $detail_pendaftar['no_induk']; ?>"
                method="POST">
                <div class="row mb20">

                    <div class="col-lg-6 col-12">
                        <h4>Penilaian Prestasi</h4>
                        <input disabled value="<?= $penilaian_tertinggi; ?>" type="text" class="w-100 form-control">
                        <!-- end penilaian -->
                        <h4 class="mt-3">Status Pendaftaran</h4>
                        <select class="form-select" id="ubah_status_pendaftaran" name="id_status_pendaftaran">
                            <?php foreach ($status_pendaftaran as $status_pendaftaran) : ?>
                            <option
                                <?= ($detail_pendaftar['id_status_pendaftaran'] == $status_pendaftaran['id_status_pendaftaran']) ? 'selected' : ''; ?>
                                value="<?= $status_pendaftaran['id_status_pendaftaran']; ?>">
                                <?= $status_pendaftaran['nama_status']; ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <!-- end ubah status pendaftaran -->
                        <div id="ubah_status_final">
                            <h4 class="mt-3">Status Pendaftaran</h4>
                            <select class="form-select" id="inputGroupSelect01" name="id_status_final">
                                <option value="" selected></option>
                                <?php foreach ($status_final as $status_final) : ?>
                                <option
                                    <?= ($detail_pendaftar['id_status_final'] == $status_final['id_status_final']) ? 'selected' : ''; ?>
                                    value="<?= $status_final['id_status_final']; ?>">
                                    <?= $status_final['nama_status_final']; ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <!-- end status final -->
                        </div>
                    </div>
                    <!-- end verifikasi kiri -->
                    <div class="col-lg-6 col-12 d-flex flex-column">
                        <h4>Pesan</h4>
                        <textarea name="pesan" id="pesan"
                            class="w-100 form-control h-100"><?= $detail_pendaftar['pesan']; ?></textarea>
                        <!-- end pesan -->
                    </div>
                    <!-- end verifikasi kanan -->
                </div>
                <!-- Submit -->
                <div class="row pb40">
                    <div class="col-12 text-end">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#save_verifikasi_modal"
                            class="btn btn-success me-3 fs18 px-4 py-2">
                            Simpan
                        </button>
                    </div>
                </div>
                <!-- end submit -->
                <!-- SAVE  Modal -->
                <div class="modal fade" id="save_verifikasi_modal" tabindex="-1" aria-labelledby="saveModalLabel"
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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
</div>
<!-- end main section -->
<?= $this->endSection(); ?>