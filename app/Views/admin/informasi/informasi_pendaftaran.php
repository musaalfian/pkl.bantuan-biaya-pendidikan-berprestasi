<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main Section-->
<div class="bgwhite py40 admin__informasi__pendaftaran">
    <div class="admin-content  mx-auto">
        <div class="d-flex justify-content-between align-items-end mb-3">
            <h3 class="biru">Daftar Informasi Pendaftaran</h3>
            <a class="btn btn-primary fw-normal" href="<?= base_url(); ?>/admin_informasi/edit_informasi_pendaftaran">
                Edit Informasi
            </a>
        </div>
        <!-- alert informasi terbaru -->
        <?php if (session()->getFlashdata('pesan-tambah-informasi-terbaru')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan-tambah-informasi-terbaru'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesan-hapus-informasi-terbaru')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesan-hapus-informasi-terbaru'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesan-ubah-informasi-terbaru')) : ?>
            <div class="alert alert-warning" role="alert">
                <?= session()->getFlashdata('pesan-ubah-informasi-terbaru'); ?>
            </div>
        <?php endif; ?>
        <!-- end alert informasi terbaru -->
        <div class="p-4 bdgrey br20 bg-white mt20">
            <div class="sub-informasi mb-3">
                <h3 class="mb-2 fs18">1. Persyaratan Penerima Bantuan</h3>
                <div class="detail ms-4">
                    <div class="">
                        <?php $i = 1 ?>
                        <?php foreach ($persyaratan as $persyaratan) : ?>
                            <?php if ($persyaratan != null) : ?>

                                <p class="fs16">
                                    <?= $i++; ?>. <?= $persyaratan; ?>
                                </p>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- end persyaratan -->
            <div class="sub-informasi mb-3">
                <h3 class="mb-2 fs18">2. Jadwal Pendaftaran</h3>
                <div class="detail ms-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Jadwal Pelaksanaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jadwal as $jadwal) : ?>
                                <tr>
                                    <?php if ($jadwal['jadwal_kegiatan'] != null) : ?>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $jadwal['jadwal_kegiatan']; ?></td>
                                        <td><?= $jadwal['jadwal_pelaksanaan']; ?></td>
                                    <?php endif; ?>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end jadwal -->
            <div class="sub-informasi mb-3">
                <h3 class="mb-2 fs18">3. Proses Seleksi</h3>
                <div class="detail ms-4">
                    <?php $i = 1 ?>

                    <?php foreach ($proses_seleksi as $proses_seleksi) : ?>
                        <?php if ($proses_seleksi != null) : ?>
                            <p class="fs16">
                                <?= $i++; ?>. <?= $proses_seleksi; ?>
                            </p>
                        <?php endif ?>
                    <?php endforeach; ?>
                    <!-- download selengkapnya -->
                </div>
            </div>
            <!-- end proses seleksi -->
        </div>
    </div>
</div>
<!-- end main section -->
<?= $this->endSection(); ?>