<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main section-->
<div class="bgwhite py40">
    <div class="w90 detail mx-auto">
        <div class="navigasi d-flex flex-wrap align-items-center mb-3">
            <a href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_siswa" class="fw-bold blue fs14 me-3"><i class="fa-solid fa-arrow-left-long"></i></a>
            <a href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_siswa" class="blue fs14">Data Pendaftaran <span class="mx-2 blue fs14">/</span></a>
            <a href="" class="abu fs14">Detail Peserta Didik</a>
        </div>
        <div class="d-flex justify-content-between align-items-end mb-3">
            <h3 class="biru">Detail Penerima Bantuan Biaya Pendidikan Peserta Didik</h3>
            <a class="btn btn-primary fw-normal" href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['formulir_pendaftaran']; ?>" target="_blank">
                Unduh formulir pendaftar
            </a>
        </div>
        <div class="alert alert-primary">
            <strong>Catatan :</strong>
            <p class="fs16">1. Untuk menampilkan nilai prestasi (hafidz, perlombaan), silahkan refresh halaman terlebih dahulu</p>
            <p class="fs16">2. Untuk nilai 200, pendaftar diterima langsung sebagai penerima bantuan biaya pendidikan berprestasi</p>
        </div>
        <div class="bg-white p-4 br1 bdgrey">
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

            <!-- Identitas -->
            <h3 class="fw-bold fs20">A. Identitas Diri</h3>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr class="">
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_lengkap']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?= ($detail_pendaftar['jenis_kelamin'] == 'L') ? 'Laki - laki' : 'Perempuan';; ?>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>NISN </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['no_induk_pelajar']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['ttl']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_agama']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Anak Ke </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['anak_ke']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pernah Menerima Bantuan? </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pernah_menerima_bantuan']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jika Ya, Menerima Bantuan Dari </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['menerima_bantuan_dari']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['no_telepon']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
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
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_kecamatan']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jarak Dari Rumah ke Sekolah </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['jarak_sekolah']; ?> Km</td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Transportasi ke Sekolah </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_transportasi']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kelas </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['kelas']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Sekolah </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_sekolah']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- <tr>
                                    <td>Nomor Telepon </td>
                                    <td>:</td>
                                    <td>085329999577</td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input mt-0" type="checkbox" value=""
                                                aria-label="Checkbox for following text input">
                                        </div>
                                    </td>
                                </tr> -->
                            <tr>
                                <td>Alamat Sekolah Asal </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['alamat_sekolah']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- end identitas kanan -->
            </div>
            <!-- End identitas  -->

            <!-- Kondisi keluarga -->
            <h3 class="fw-bold fs20 mt-3">B. Kondisi Orang Tua</h3>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Ayah / Wali</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_ayah']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ayah / Wali</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pekerjaan_ayah']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Terakhir Ayah / Wali </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pendidikan_ayah']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan per Bulan Ayah / Wali</td>
                                <td>:</td>
                                <td>Rp <?= number_format($detail_pendaftar['penghasilan_ayah'], 0, ',', '.'); ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Ayah / Wali</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['alamat_ayah']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
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
                                <td>Nama Ibu / Wali </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['nama_ibu']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ibu / Wali</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pekerjaan_ibu']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Terakhir Ibu / Wali </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pendidikan_ibu']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan per Bulan Ibu / Wali </td>
                                <td>:</td>
                                <td>Rp <?= number_format($detail_pendaftar['penghasilan_ibu'], 0, ',', '.'); ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Ibu / Wali </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['alamat_ibu']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end keluarga kanan -->
            </div>
            <!-- End kondisi keluarga -->

            <!-- Apakah calon -->
            <h3 class="fw-bold fs20 mt-3">C. Apakah Calon Penerima Bantuan Terdaftar Sebagai </h3>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Rumah Tangga Sangat Miskin (RTSM) / Rumah Tangga Miskin (RTM)? </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['rtsm_rtm']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Peserta Program Keluarga Harapan (PKH)/Kart Keluarga Sejahtera (KKS) dan Kartu
                                    Batang Sehat (KBS)?</td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['pkh_kks_kbs']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Penerimaan BSM atau Kartu Indonesia Pintar (KIP) </td>
                                <td>:</td>
                                <td><?= $detail_pendaftar['bsm_kip']; ?></td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end bsm -->
            </div>
            <!-- End apakah calon  -->

            <!-- Prestasi -->
            <h3 class="fw-bold fs20 mt-3 mb-2">D. Prestasi </h3>
            <div class="row">
                <form action="<?= base_url(); ?>/admin_detail_pendaftaran/simpan_penilaian/<?= $detail_pendaftar['no_induk']; ?>" method="post">
                    <?php $i = 1; ?>
                    <?php foreach ($prestasi as $prestasi) : ?>
                        <div class="row">
                            <!-- Kiri -->
                            <div class="col-lg-6 col-12">
                                <div class="mb-2">
                                    <label for="prestasi_<?= $i; ?>" class="form-label">Scan Prestasi
                                    </label>
                                    <div class="d-flex">
                                        <input disabled class="form-control" name="scan_prestasi_<?= $i; ?>" id="scan_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['file_prestasi']; ?>" />
                                        <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/prestasi/<?= $prestasi['file_prestasi']; ?>" target="_blank" class="btn btn-white ms-3">Lihat</a>
                                    </div>
                                </div>
                                <!-- End scan prestasi -->
                                <div class="mb-2">
                                    <label for="nama_prestasi_<?= $i; ?>" class="form-label">Nama_Prestasi
                                    </label>
                                    <input disabled class="form-control" name="nama_prestasi_<?= $i; ?>" id="nama_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['nama_prestasi']; ?>" />
                                </div>
                                <!-- End nama prestasi -->
                                <div class="mb-2">
                                    <label for="kategori_prestasi_<?= $i; ?>" class="form-label">Kategori
                                    </label>
                                    <input disabled class="form-control" name="kategori_prestasi_<?= $i; ?>" id="kategori_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['kategori']; ?>" />
                                </div>
                                <!-- End kategori -->
                                <div class="mb-2">
                                    <label for="nilai_prestasi_<?= $i; ?>" class="form-label">Penilaian
                                    </label>
                                    <input required class="form-control" name="nilai_prestasi_<?= $i; ?>" id="nilai_prestasi_<?= $i; ?>" type="number" value="<?= $prestasi['nilai']; ?>" />
                                </div>
                                <!-- End penilaian -->
                            </div>
                            <!-- End kiri -->

                            <!-- Kanan -->
                            <div class="col-lg-6 col-12">
                                <div class="mb-2">
                                    <label for="tingkat_prestasi_<?= $i; ?>" class="form-label">Tingkat
                                    </label>
                                    <input disabled class="form-control" name="tingkat_prestasi_<?= $i; ?>" id="tingkat_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['tingkat']; ?>" />
                                </div>
                                <!-- End tingkat prestasi -->
                                <div class="mb-2">
                                    <label for="juara_prestasi_<?= $i; ?>" class="form-label">Juara
                                    </label>
                                    <input disabled class="form-control" name="juara_prestasi_<?= $i; ?>" id="juara_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['juara']; ?>" />
                                </div>
                                <!-- End juara -->
                                <div class="mb-2">
                                    <label for="tahun_prestasi_<?= $i; ?>" class="form-label">Tahun
                                    </label>
                                    <input disabled class="form-control" name="tahun_prestasi_<?= $i; ?>" id="tahun_prestasi_<?= $i; ?>" type="text" value="<?= $prestasi['tahun_prestasi']; ?>" />
                                </div>
                                <!-- End tahun -->
                            </div>
                            <!-- End kanan -->
                        </div>
                        <hr>
                        <?php $i++; ?>
                    <?php endforeach; ?>


                    <!-- Submit -->
                    <div class="text-end">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#save_nilai_modal" class="btn btn-primary fs16 fw-normal">
                            Nilai
                        </button>
                    </div>
                    <!-- end submit -->

                    <!-- SAVE  Modal -->
                    <div class="modal fade" id="save_nilai_modal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
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
            </div>
            <!-- End prestasi -->

            <!-- Dokumen -->
            <h3 class="fw-bold fs20 mt-3">E. Lampiran Dokumen </h3>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <table class="table">
                        <tbody>
                            <tr class="mt20">
                                <td>
                                    <p class="fs16">Kartu Keluarga (KK)</p>
                                    <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['kk']; ?>" target="_blank" class="btn btn-white mb15 mt-2">Lihat</a>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end kk -->
                            <tr class="mt20">
                                <td>
                                    <p class="fs16">Kartu Tanda Penduduk (KTP)</p>
                                    <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['ktp']; ?>" target="_blank" class="btn btn-white mb15 mt-2">Lihat</a>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end ktp -->
                            <tr>
                                <td>
                                    <p class="fs16">Foto Berwarna Ukuran 3x4</p>
                                    <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['pas_foto']; ?>" target="_blank" class="btn btn-white mb15 mt-2">Lihat</a>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end pas foto -->
                            <tr>
                                <td>
                                    <p class="fs16">Kartu Pelajar</p>
                                    <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['kartu_pelajar']; ?>" target="_blank" class="btn btn-white mb15 mt-2">Lihat</a>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end kartu pelajar -->
                        </tbody>
                    </table>

                </div>
                <div class="col-lg-6 col-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <p class="fs16">Raport Semester Terakhir</p>
                                    <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['raport_smt']; ?>" class="btn btn-white mb15 mt-2" target="_blank">Lihat</a>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end raport smt terakhir -->
                            <tr>
                                <td>
                                    <p class="fs16">Raport Legalisasi</p>
                                    <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['raport_legalisasi']; ?>" class="btn btn-white mb15 mt-2" target="_blank">Lihat</a>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end raport legalisasi -->
                            <tr>
                                <td>
                                    <p class="fs16">Surat Keterangan Tidak Mampu</p>
                                    <a href="<?= base_url(); ?>/assets/scan/<?= $detail_pendaftar['no_induk']; ?>/file/<?= $detail_pendaftar['sktm']; ?>" class="btn btn-white mb15 mt-2" target="_blank">Lihat</a>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                    </div>
                                </td>
                            </tr>
                            <!-- end SKTM -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End dokumen -->

            <!-- Penilaian -->
            <h3 class="fw-bold fs20 mt-3 mb-2">F. Penilaian</h3>
            <form action="<?= base_url(); ?>/admin_detail_pendaftaran/simpan_verifikasi/<?= $detail_pendaftar['no_induk']; ?>" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <label for="" class="form-label">Scan Prestasi</label>
                        <input disabled value="<?= $penilaian_tertinggi; ?>" type="text" class="w-100 form-control">
                        <!-- end penilaian -->
                        <label for="" class="form-label mt-3">Status Pendaftaran</label>
                        <select class="form-select" id="ubah_status_pendaftaran" name="id_status_pendaftaran">
                            <?php foreach ($status_pendaftaran as $status_pendaftaran) : ?>
                                <option <?= ($detail_pendaftar['id_status_pendaftaran'] == $status_pendaftaran['id_status_pendaftaran']) ? 'selected' : ''; ?> value="<?= $status_pendaftaran['id_status_pendaftaran']; ?>">
                                    <?= $status_pendaftaran['nama_status']; ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <!-- end status pendaftaran -->
                        <div id="ubah_status_final">
                            <label for="" class="form-label mt-3">Status Pendaftaran Final</label>
                            <select class="form-select" id="inputGroupSelect01" name="id_status_final">
                                <option value="" selected></option>
                                <?php foreach ($status_final as $status_final) : ?>
                                    <option <?= ($detail_pendaftar['id_status_final'] == $status_final['id_status_final']) ? 'selected' : ''; ?> value="<?= $status_final['id_status_final']; ?>">
                                        <?= $status_final['nama_status_final']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <!-- end status final -->
                        </div>
                    </div>
                    <!-- end verifikasi kiri -->
                    <div class="col-lg-6 col-12">
                        <label for="" class="form-label">Pesan</label>
                        <textarea name="pesan" id="pesan" class="w-100 form-control h-100"><?= $detail_pendaftar['pesan']; ?></textarea>
                        <!-- end pesan -->
                    </div>
                    <!-- end verifikasi kanan -->
                </div>
                <!-- Submit -->
                <div class="row pb40">
                    <div class="col-12 text-end">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#save_verifikasi_modal" class="btn btn-success fs16 fw-normal mt-3">
                            Simpan
                        </button>
                    </div>
                </div>
                <!-- end submit -->
                <!-- SAVE  Modal -->
                <div class="modal fade" id="save_verifikasi_modal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
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
            <!-- End penilaian -->
        </div>
    </div>
</div>
<!-- end main section -->

<script>
    // pesan CKEditor
    ClassicEditor
        .create(document.querySelector('#pesan'), {
            removePlugins: ['Heading', 'Link', 'CKFinder'],
            toolbar: ['bold', 'italic', 'bulletedList', 'numberedList']
        })
        .then(newEditor => {
            console.log(newEditor);
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?= $this->endSection(); ?>