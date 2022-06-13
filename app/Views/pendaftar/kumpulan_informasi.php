<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>

<!-- Main section -->
<div class="p40">
    <div class="container">
        <div class="info__terbaru">
            <div class="navigasi d-flex mb10">
                <a href="<?= base_url(); ?>/home_pendaftar/index/" class="blue">Beranda <span class="mx-2 blue">/</span></a>
                <a href="" class="abu">Kumpulan Informasi</a>
            </div>
            <h3>Informasi Terbaru</h3>
            <div class="row mt10 justify-content-between">
                <?php foreach ($kumpulan_3_informasi as $kumpulan_3_informasi) : ?>
                    <div class="col-12 col-md-4 py10">
                        <a href="<?= base_url(); ?>/home_pendaftar/detail_informasi/<?= $kumpulan_3_informasi['id_informasi_terbaru']; ?>" class="blue fw-bold fs18">
                            <?= $kumpulan_3_informasi['judul_informasi_terbaru']; ?>
                        </a>
                        <div class="mt10 fs14">
                            <?= $kumpulan_3_informasi['deskripsi_singkat']; ?>
                        </div>
                        <div class="mt10 fs14 abu"><?= $kumpulan_3_informasi['tanggal_indo_informasi']; ?> WIB</div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="line mt20"></div>
        </div>
        <div class="info__lama mt20">
            <h3 class="">Informasi Lainnya</h3>
            <div class="row mt10 justify-content-between">
                <?php foreach ($kumpulan_informasi as $kumpulan_informasi) : ?>

                    <div class="col-12 col-md-4 py10">
                        <a href="<?= base_url(); ?>/home_pendaftar/detail_informasi/<?= $kumpulan_informasi['id_informasi_terbaru']; ?>" class="blue fw-bold fs18">
                            <?= $kumpulan_informasi['judul_informasi_terbaru']; ?>
                        </a>
                        <div class="mt10 fs14">
                            <?= $kumpulan_informasi['deskripsi_singkat']; ?>
                        </div>
                        <div class="mt10 fs14 abu"><?= $kumpulan_informasi['tanggal_indo_informasi']; ?> WIB</div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
<!-- End main section -->

<?= $this->endSection(); ?>