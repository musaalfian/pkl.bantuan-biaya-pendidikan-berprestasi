<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main Section-->
<div class=" bg-abu p40">
    <div class=" admin-content  mx-auto">
        <h3  class="col-6 biru pb20">Daftar <span class="orange">Informasi Terbaru </span> </h3>
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
        <div class="p-4 br20 bg-white mt20 ">
            <div class="sub-informasi mb20">
                <h3 class="mb20">1. Persyaratan Penerima Bantuan</h3>
                <div class="detail ms-4">

                    <div class="mt20">
                        <?php $i = 1 ?>
                        <?php foreach ($persyaratan as $persyaratan) : ?>
                        <?php if ($persyaratan != null) : ?>

                        <p>
                            <?= $i++; ?>. <?= $persyaratan; ?>
                        </p>
                        <?php endif ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- end persyaratan -->
            <div class="sub-informasi mb20">
                <h3 class="mb20">2. Jadwal Pendaftaran</h3>
                <div class="detail ms-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
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
            <div class="sub-informasi mb20">
                <h3 class="mb20">3. Proses Seleksi</h3>
                <div class="detail ms-4">
                    <?php $i = 1 ?>

                    <?php foreach ($proses_seleksi as $proses_seleksi) : ?>
                    <?php if ($proses_seleksi != null) : ?>
                    <p>
                        <?= $i++; ?>. <?= $proses_seleksi; ?>
                    </p>
                    <?php endif ?>
                    <?php endforeach; ?>
                    <!-- download selengkapnya -->
                    <a href="<?= base_url(); ?>/admin_informasi/edit_informasi_pendaftaran"
                        class="btn btn-primary mt20"> Edit Informasi Pendaftaran <span class="ms-3">--></span></a>
                </div>
            </div>
            <!-- end proses seleksi -->
        </div>
    </div>
</div>
<!-- end main section -->
<?= $this->endSection(); ?>