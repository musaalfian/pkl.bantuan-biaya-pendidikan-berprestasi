<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>

<!-- Main -->
<div class="py40 bglight2 kumpulan__informasi">
    <div class="container">
        <div class="navigasi d-flex flex-wrap align-items-center mb-3">
            <a href="<?= base_url(); ?>/home_pendaftar/index/" class="fw-bold blue fs14 me-3"><i class="fa-solid fa-arrow-left-long"></i></a>
            <a href="<?= base_url(); ?>/home_pendaftar/index/" class="blue fs14">Beranda <span class="mx-2 blue fs14">/</span></a>
            <a href="" class="abu fs14">Kumpulan Informasi</a>
        </div>
        <div class="info__terbaru mb-3">
            <h3 class="fs20 mb-2">Informasi Terbaru</h3>
            <div class="row">
                <?php foreach ($kumpulan_3_informasi as $kumpulan_3_informasi) : ?>
                    <div class="col-sm-6 col-lg-4 col-12">
                        <div class="pb-3 border-bottom mb-2">
                            <a href="<?= base_url(); ?>/home_pendaftar/detail_informasi/<?= $kumpulan_3_informasi['id_informasi_terbaru']; ?>" class="blue fw-bold fs18">
                                <?= $kumpulan_3_informasi['judul_informasi_terbaru']; ?>
                            </a>
                            <div class="mt-2 fs14 desc">
                                <?= $kumpulan_3_informasi['deskripsi_singkat']; ?>
                            </div>
                            <div class="fs14 mt-1 lightgrey"><?= $kumpulan_3_informasi['tanggal_indo_informasi']; ?> WIB</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="info__terbaru">
            <h3 class="fs20 mb-2">Informasi Lainnya</h3>
            <div class="row">
                <?php foreach ($kumpulan_informasi as $kumpulan_informasi) : ?>
                    <div class="col-sm-6 col-lg-4 col-12">
                        <div class="pb-3 border-bottom mb-2">
                            <a href="<?= base_url(); ?>/home_pendaftar/detail_informasi/<?= $kumpulan_informasi['id_informasi_terbaru']; ?>" class="blue fw-bold fs18">
                                <?= $kumpulan_informasi['judul_informasi_terbaru']; ?>
                            </a>
                            <div class="mt-2 fs14 desc">
                                <?= $kumpulan_informasi['deskripsi_singkat']; ?>
                            </div>
                            <div class="mt-1 fs14 lightgrey"><?= $kumpulan_informasi['tanggal_indo_informasi']; ?> WIB</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- End main -->



<?= $this->endSection(); ?>