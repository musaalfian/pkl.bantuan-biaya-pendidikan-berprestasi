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
<div class="bglight2 py40 pendaftaran__beasiswa">
    <div class="container">
        <h3 class="text-center blue fs24 mb40">Jalur Beasiswa</h3>
        <div class="row">
            <!-- Peserta didik -->
            <div class="col-md-6 col-lg-4 col-12 mb-3 mb-lg-0">
                <div class="p-5 br25 bgwhite">
                    <div class="text-center">
                        <img src="<?= base_url(); ?>/assets/img/tut wuri handayani.png" alt="" class="br25" />
                        <div class="mt-4">
                            <h4 class="fw-bold">Peserta Didik</h4>
                            <h6 class="mb-0 mt-2 lightgrey" id="jumlahpesertadidik">
                                Beasiswa bagi peserta didik <br />
                                SMA/SMK/MA sederajat
                            </h6>
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
                </div>
            </div>
            <!-- End peserta didik -->

            <!-- Calon mahasiswa -->
            <div class="col-md-6 col-lg-4 col-12 mb-3 mb-lg-0">
                <div class="p-5 br25 bgwhite">
                    <div class="text-center">
                        <img src="<?= base_url(); ?>/assets/img/tut wuri handayani.png" alt="" class="br25" />
                        <div class="mt-4">
                            <h4 class="fw-bold">Calon Mahasiswa</h4>
                            <h6 class="mb-0 mt-2 lightgrey" id="jumlahpesertadidik">
                                Beasiswa bagi peserta didik lulusan SMA/SMK/MA dari daerah
                            </h6>
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
                </div>
            </div>
            <!-- End calon mahasiswa -->

            <!-- Mahasiswa -->
            <div class="col-md-6 col-lg-4 col-12 mb-3 mb-lg-0">
                <div class="p-5 br25 bgwhite">
                    <div class="text-center">
                        <img src="<?= base_url(); ?>/assets/img/tut wuri handayani.png" alt="" class="br25" />
                        <div class="mt-4 text-center">
                            <h4 class="fw-bold">Mahasiswa</h4>
                            <h6 class="mb-0 mt-2 lightgrey" id="jumlahpesertadidik">
                                Beasiswa bagi mahasiswa <br />
                                dari Kabupaten Batang
                            </h6>
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
                </div>
            </div>
            <!-- End mahasiswa -->
        </div>
    </div>
</div>
<!-- End jalur beasiswa -->

<?= $this->endSection(); ?>