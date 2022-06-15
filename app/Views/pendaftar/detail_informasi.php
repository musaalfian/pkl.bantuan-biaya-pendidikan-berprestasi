<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>
<!-- Main section -->
<div class="p40">
    <div class="container">
        <div class="row detail__info__section">
            <div class="col-12 col-md-8">
                <div class="navigasi d-flex">
                    <a href="<?= base_url(); ?>/home_pendaftar/index/" class="blue">Beranda <span
                            class="mx-2 blue">/</span></a>
                    <a href="" class="abu">Informasi</a>
                </div>
                <div class="detail__header mt10">
                    <h3 class="fw-bold">
                        <?= $informasi['judul_informasi_terbaru']; ?>
                    </h3>
                    <p class="mt10 abu"><?= $informasi['tanggal_indo_informasi']; ?> WIB</p>
                </div>
                <div class="detail__desc mt20">
                    <p>
                        <?= $informasi['deskripsi_informasi_terbaru']; ?>
                    </p>
                    <p class="mt10">
                        Edaran dapat diunduh <span><a
                                href="<?php base_url(); ?>/assets/informasi/file/<?= $informasi['file_informasi_terbaru']; ?>">Disini</a></span>
                    </p>
                    <p class="mt10">Terima kasih.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 mt20">
                <div class="border px-3 p20 overflow-scroll height__scroll bg-white">
                    <h3 class="">Informasi Lainnya</h3>
                    <?php foreach ($kumpulan_3_informasi as $kumpulan_3_informasi) : ?>
                    <div class="border-bottom pb-2 mt20">
                        <div class="info__section">
                            <a href="<?= base_url(); ?>/home_pendaftar/detail_informasi/<?= $kumpulan_3_informasi['id_informasi_terbaru']; ?>"
                                class="fw-bold blue">
                                <?= $kumpulan_3_informasi['judul_informasi_terbaru']; ?>
                            </a>
                            <div class="mt5">
                                <p>
                                    <?= $kumpulan_3_informasi['deskripsi_singkat']; ?>
                                </p>
                            </div>
                            <div class="tanggal">
                                <p class="mt5"><?= $kumpulan_3_informasi['tanggal_indo_informasi']; ?> WIB</p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="mt-4 list__info">
                        <a href="<?= base_url(); ?>/home_pendaftar/kumpulan_informasi_terbaru" class="fs14">
                            Lihat informasi selengkapnya
                            <i class="bi bi-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End main section -->

<?= $this->endSection(); ?>