<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>

<!-- Main section-->
<div class="bg-abu py40">
    <div class="admin-content mx-auto position-relative">
        <!-- rekap data -->
        <h3 class="biru">Rekap <span class="orange">data</span></h3>
        <div class="row mt20 position-relative">
            <div class="row justify-content-start">
                <div class="col-lg-4 col-md-6 col-12 mb20">
                    <div class="p-4 br20 bg-white main-shadow min-height-admin">
                        <div class="tengah flex-column">
                            <h2 class="biru text-center"><?= $jumlah_pendaftar; ?></h2>
                            <p class="biru text-center">Pendaftaran Beasiswa</p>
                        </div>
                    </div>
                </div>
                <!-- end pendaftaran beasiswa -->
                <div class="col-lg-4 col-md-6 col-12 mb20">
                    <div class="p-4 br20 bg-white main-shadow min-height-admin">
                        <div class="tengah flex-column">
                            <h2 class="biru text-center"><?= $jumlah_pendaftar_memenuhi; ?></h2>
                            <p class="biru text-center">Sudah Memenuhi Syarat</p>
                        </div>
                    </div>
                </div>
                <!-- end sudah memenuhi syarat -->
                <div class="col-lg-4 col-md-6 col-12 mb20">
                    <div class="p-4 br20 bg-white main-shadow min-height-admin">
                        <div class="tengah flex-column">
                            <h2 class="biru text-center"><?= $jumlah_pendaftar_tidak_memenuhi; ?></h2>
                            <p class="biru text-center">Tidak Memenuhi Syarat</p>
                        </div>
                    </div>
                </div>
                <!-- end Tidak Memenuhi Syarat -->
                <div class="col-lg-4 col-md-6 col-12 mb20">
                    <div class="p-4 br20 bg-white main-shadow min-height-admin">
                        <div class="tengah flex-column">
                            <h2 class="biru text-center"><?= $jumlah_pendaftar_perbaikan; ?></h2>
                            <p class="biru text-center">Perbaikan Data</p>
                        </div>
                    </div>
                </div>
                <!-- end perbaikan data -->
                <div class="col-lg-4 col-md-6 col-12 mb20">
                    <div class="p-4 br20 bg-white main-shadow min-height-admin">
                        <div class="tengah flex-column">
                            <h2 class="biru text-center"><?= $jumlah_pendaftar_proses; ?></h2>
                            <p class="biru text-center">Proses Verifikasi Data</p>
                        </div>
                    </div>
                </div>
                <!-- end Proses Verifikasi Data -->
            </div>
        </div>
        <!-- <div class="btn btn-primary">Download Peserta yang Lolos Verifikasi</div> -->
        <!-- end overview -->
        <div class="row mt40">
            <div class="col-12 ">
                <h3 class="biru">Data Beasiswa <span class="orange">Peserta Didik</span></h3>
                <div class="mt20 p-4 br20 bg-white">
                    <table class="table p-4 table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Asal Sekolah</th>
                                <th scope="col">Status Pendaftaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($siswa as $siswa) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <td><?= $siswa['nama_lengkap']; ?></td>
                                <td><?= $siswa['nama_sekolah']; ?></td>
                                <td><?= $siswa['nama_status']; ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- end peserta didik -->
                    <a href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_siswa"
                        class="btn btn-primary mt40">Lihat
                        Selengkapnya --></a>
                </div>

            </div>
        </div>
        <!-- end peserta didik -->
        <div class="row mt40">
            <div class="col-12 ">
                <h3 class="biru">Data Beasiswa <span class="orange">Calon Mahasiswa</span> </h3>
                <div class="mt20 p-4 br20 bg-white">
                    <table class="table p-4 table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Asal Perguruan Tinggi</th>
                                <th scope="col">Status Pendaftaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($calon_mahasiswa as $calon_mahasiswa) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <td><?= $calon_mahasiswa['nama_lengkap']; ?></td>
                                <td><?= $calon_mahasiswa['nama_pt']; ?></td>
                                <td><?= $calon_mahasiswa['nama_status']; ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- end tabel calon mahasiswa -->
                    <a href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_calon_mhs"
                        class="btn btn-primary mt40">Lihat Selengkapnya --></a>
                </div>
            </div>
        </div>
        <!-- end calon mahasiswa -->
        <div class="row mt40">
            <div class="col-12 ">
                <h3 class="biru">Data Beasiswa <span class="orange">Mahasiswa</span> </h3>

                <div class="mt20 p-4  br20 bg-white">
                    <table class="table p-4  table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Asal Perguruan Tinggi</th>
                                <th scope="col">Status Pendaftaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($mahasiswa as $mahasiswa) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <td><?= $mahasiswa['nama_lengkap']; ?></td>
                                <td><?= $mahasiswa['nama_pt']; ?></td>
                                <td><?= $mahasiswa['nama_status']; ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_mahasiswa"
                        class="btn btn-primary mt40">Lihat Selengkapnya --></a>
                </div>
            </div>
        </div>
        <!-- end mahasiswa -->
    </div>
</div>
<!-- End main section -->

<?= $this->endSection(); ?>