<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>

<!-- Main section-->
<div class="bgwhite py40">
    <div class="w90 mx-auto">
        <!-- Rekap data -->
        <h3 class="blue">Rekap data</h3>
        <div class="row mt20">
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="p-4 br1 bgbiru2 main-shadow text-center">
                    <h2 class=""><?= $jumlah_pendaftar; ?></h2>
                    <p class="fs16">Pendaftaran Beasiswa</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="p-4 br1 bgkuning main-shadow text-center">
                    <h2 class=" text-center"><?= $jumlah_pendaftar_perbaikan; ?></h2>
                    <p class=" text-center fs16">Perbaikan Data</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="p-4 br1 bgkuning main-shadow text-center">
                    <h2 class=" text-center"><?= $jumlah_pendaftar_proses; ?></h2>
                    <p class=" text-center fs16">Proses Verifikasi Data</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="p-4 br1 bghijau main-shadow text-center">
                    <h2 class=" text-center"><?= $jumlah_pendaftar_memenuhi; ?></h2>
                    <p class=" text-center fs16">Sudah Memenuhi Syarat</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="p-4 br1 bgmerah main-shadow text-center">
                    <h2 class=" text-center"><?= $jumlah_pendaftar_tidak_memenuhi; ?></h2>
                    <p class="text-center fs16">Tidak Memenuhi Syarat</p>
                </div>
            </div>
        </div>
        <!-- End rekap data -->

        <!-- Tabel peserta didik -->
        <div class="d-flex align-items-end justify-content-between mt40">
            <h3 class="blue">Data Bantuan Biaya Pendidikan Peserta Didik</h3>
            <a href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_siswa" class="fs16 fw-normal">
                <div class="d-flex align-items-center">
                    Lihat data selengkapnya <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </div>
            </a>
        </div>
        <div class="mt20 p-4 br1 bdgrey bg-white">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px;" class="text-center">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Status Pendaftaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $siswa) : ?>
                        <tr>
                            <th class="text-center fw-normal"><?= $i; ?></th>
                            <td><?= $siswa['nama_lengkap']; ?></td>
                            <td><?= $siswa['nama_sekolah']; ?></td>
                            <td><?= $siswa['nama_status']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- end peserta didik -->
        </div>
        <!-- End tabel peserta didik -->

        <!-- Tabel calon mahasiswa -->
        <div class="d-flex align-items-end justify-content-between mt40">
            <h3 class="blue">Data Bantuan Biaya Pendidikan Calon Mahasiswa</h3>
            <a href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_calon_mhs" class="fs16 fw-normal">
                <div class="d-flex align-items-center">
                    Lihat data selengkapnya <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </div>
            </a>
        </div>
        <div class="mt20 p-4 br1 bg-white bdgrey">
            <table class="table p-4 table-responsive">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px;" class="text-center">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Asal Perguruan Tinggi</th>
                        <th scope="col">Status Pendaftaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($calon_mahasiswa as $calon_mahasiswa) : ?>
                        <tr>
                            <th class="text-center fw-normal"><?= $i; ?></th>
                            <td><?= $calon_mahasiswa['nama_lengkap']; ?></td>
                            <td><?= $calon_mahasiswa['nama_pt']; ?></td>
                            <td><?= $calon_mahasiswa['nama_status']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End tabel calon mahasiswa -->

        <!-- Tabel mahasiswa -->
        <div class="d-flex align-items-end justify-content-between mt40">
            <h3 class="blue">Data Bantuan Biaya Pendidikan Mahasiswa</h3>
            <a href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_mahasiswa" class="fs16 fw-normal">
                <div class="d-flex align-items-center">
                    Lihat data selengkapnya <i class="fa-solid fa-arrow-right-long ms-2"></i>
                </div>
            </a>
        </div>
        <div class="mt20 p-4 bdgrey br1 bg-white">
            <table class="table p-4 table-responsive">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px;" class="text-center">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Asal Perguruan Tinggi</th>
                        <th scope="col">Status Pendaftaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $mahasiswa) : ?>
                        <tr>
                            <th class="text-center fw-normal"><?= $i; ?></th>
                            <td><?= $mahasiswa['nama_lengkap']; ?></td>
                            <td><?= $mahasiswa['nama_pt']; ?></td>
                            <td><?= $mahasiswa['nama_status']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End tabel mahasiswa -->
    </div>
</div>
<!-- End main section -->

<?= $this->endSection(); ?>