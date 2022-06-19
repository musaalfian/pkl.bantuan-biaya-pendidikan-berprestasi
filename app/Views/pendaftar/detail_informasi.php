<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>
<!-- Main section -->
<div class="container p40">
    <div class="navigasi d-flex mb-3">
        <a href="<?= base_url(); ?>/home_pendaftar/index/" class="blue">Beranda <span class="mx-2 blue">/</span></a>
        <a href="" class="abu">Informasi</a>
    </div>
    <div class="informasi__awal row">
        <div class="col-md-8 col-12 mb-4 mb-md-0">
            <div class="gambar ">
                <div class="bg ">
                    <img class="w-100"  src="<?php base_url() ?>/assets/informasi/img/<?= $informasi['gambar_informasi_terbaru']; ?>" alt="Gambar Informasi">
                </div>
                <h6 class="fs14 abu mt-3">
                    <?= $informasi['tanggal_indo_informasi']; ?> WIB
                </h6>
            </div>
            <div class="content mt-3">
                <h2 class="fw-bold fs24 blue">
                    <?= $informasi['judul_informasi_terbaru']; ?>
                </h2>
                <p class="mt-2">
                    <?= $informasi['deskripsi_informasi_terbaru']; ?>
                </p>
                <p class="mt-2">
                    Edaran dapat diunduh <span><a href="<?php base_url(); ?>/assets/informasi/file/<?= $informasi['file_informasi_terbaru']; ?>" class="fs16">Disini</a></span>
                </p>
                <p class="mt-2">
                    Terima kasih.
                </p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="info__lainnya border px-3 p20 overflow-auto bg-white">
                <h3 class="fs20">Informasi Lainnya</h3>
                <?php foreach ($kumpulan_3_informasi as $kumpulan_3_informasi) : ?>
                    <div class="border-bottom pb-2 mt20">
                        <div class="info__section">
                            <a href="<?= base_url(); ?>/home_pendaftar/detail_informasi/<?= $kumpulan_3_informasi['id_informasi_terbaru']; ?>" class="fw-bold blue fs16">
                                <?= $kumpulan_3_informasi['judul_informasi_terbaru']; ?>
                            </a>
                            <div class="mt5">
                                <p class="">
                                    <?= $kumpulan_3_informasi['deskripsi_singkat']; ?>
                                </p>
                            </div>
                            <div class="tanggal">
                                <p class="mt5"><?= $kumpulan_3_informasi['tanggal_indo_informasi']; ?> WIB</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- End main section -->

<?= $this->endSection(); ?>