<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>
<!-- tanggal pendaftaran -->
<?php date_default_timezone_set("Asia/Jakarta");
$tanggal_sekarang = getdate(date("U"));
$tanggal = date_create($tanggal_pendaftaran['tanggal_penting']);
$tanggal_pendaftaran_tahun = date_format($tanggal, 'Y');
$tanggal_pendaftaran_bulan = date_format($tanggal, 'm');
$tanggal_pendaftaran_tanggal = date_format($tanggal, 'd');
?>
<!-- Jalur beasiswa -->
<div class="bg-abu py40">
    <div class="container">
        <h3 class="text-center biru">Jalur <span class="orange">Beasiswa</span> </h3>
        <div class="row mt40 justify-content-lg-between justify-content-around jalur_beasiswa">
            <!-- Peserta didik -->
            <div class="card__beasiswa col-lg-4 mb20 mb-lg-0 col-md-5 col-12 border gx-1 p-5 bg-white">
                <div class="text-center">
                    <img src="<?= base_url(); ?>/assets/img/tut wuri handayani.png" alt="" />
                </div>
                <div class="deskripsi text-center">
                    <p class="mt-5 biru fs14 bold mb-2">Peserta Didik</p>
                    <p class="">
                        Beasiswa bagi peserta didik <br />
                        SMA/SMK/MA sederajat
                    </p>
                    <?php if (
                        $tanggal_sekarang['year'] >= $tanggal_pendaftaran_tahun &&
                        $tanggal_sekarang['mon'] >= $tanggal_pendaftaran_bulan &&
                        ($tanggal_sekarang['mday'] >= $tanggal_pendaftaran_tanggal ||
                            ($tanggal_sekarang['mon'] >= $tanggal_pendaftaran_bulan + 1 &&
                                $tanggal_sekarang['mday'] >= 1))
                    ) : ?>
                        <?php if ($identitas == null || $identitas['id_status_peserta'] == 1) { ?>
                            <a class="btn btn-primary d-block mt25" href="<?= base_url(); ?>/pendaftaran/tambah_pendaftar/1">Daftar</a>
                        <?php }  ?>
                    <?php endif ?>
                </div>
            </div>
            <!-- End peserta didik -->

            <!-- Calon mahasiswa -->
            <div class="card__beasiswa col-lg-4 mb20 mb-lg-0 col-md-5 col-12 border gx-1 p-5 bg-white">
                <div class="text-center">
                    <img src="<?= base_url(); ?>/assets/img/tut wuri handayani.png" alt="" />
                </div>
                <div class="deskripsi text-center">
                    <p class="mt-5  biru fs14 bold mb-2">Calon Mahasiwa</p>
                    <p class="">
                        Beasiswa bagi peserta didik lulusan SMA/SMK/MA dari daerah
                    </p>
                    <?php if (
                        $tanggal_sekarang['year'] >= $tanggal_pendaftaran_tahun &&
                        $tanggal_sekarang['mon'] >= $tanggal_pendaftaran_bulan &&
                        ($tanggal_sekarang['mday'] >= $tanggal_pendaftaran_tanggal ||
                            ($tanggal_sekarang['mon'] >= $tanggal_pendaftaran_bulan + 1 &&
                                $tanggal_sekarang['mday'] >= 1))
                    ) : ?>
                        <?php if ($identitas == null || $identitas['id_status_peserta'] == 2) { ?>
                            <a class="btn btn-primary d-block mt25" href="<?= base_url(); ?>/pendaftaran/tambah_pendaftar/2">Daftar</a>
                        <?php }  ?>
                    <?php endif  ?>

                </div>
            </div>
            <!-- End calon mahasiswa -->

            <!-- Mahasiswa -->
            <div class="card__beasiswa col-lg-4 mb20 mb-lg-0 col-md-5 col-12 border gx-1 p-5 bg-white">
                <div class="text-center">
                    <img src="<?= base_url(); ?>/assets/img/tut wuri handayani.png" alt="" />
                </div>
                <div class="deskripsi text-center">
                    <p class="mt-5 biru fs14 bold mb-2">Mahasiswa</p>
                    <p class="">
                        Beasiswa bagi mahasiswa <br />
                        dari Kabupaten Batang
                    </p>
                    <?php if (
                        $tanggal_sekarang['year'] >= $tanggal_pendaftaran_tahun &&
                        $tanggal_sekarang['mon'] >= $tanggal_pendaftaran_bulan &&
                        ($tanggal_sekarang['mday'] >= $tanggal_pendaftaran_tanggal ||
                            ($tanggal_sekarang['mon'] >= $tanggal_pendaftaran_bulan + 1 &&
                                $tanggal_sekarang['mday'] >= 1))
                    ) : ?>
                        <?php if ($identitas == null || $identitas['id_status_peserta'] == 3) { ?>
                            <a class="btn btn-primary  d-block mt25" href="<?= base_url(); ?>/pendaftaran/tambah_pendaftar/3">Daftar</a>
                        <?php }  ?>
                    <?php endif ?>
                </div>
            </div>
            <!-- End mahasiswa -->
        </div>
    </div>
</div>
<!-- End jalur beasiswa -->

<?= $this->endSection(); ?>