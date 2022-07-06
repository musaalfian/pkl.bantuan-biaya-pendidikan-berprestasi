<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>
<!-- tanggal pendaftaran -->
<?php date_default_timezone_set("Asia/Jakarta");
$tanggal_sekarang = date("Y-m-d");

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
                                $tanggal_sekarang >= $tanggal_pendaftaran['tanggal_penting'] && $tanggal_sekarang <= $tanggal_penutupan_pendaftaran['tanggal_penting']
                            ) : ?>
                                <?php if ($identitas == null || ($identitas['id_status_peserta'] == 1 && $identitas['id_status_pendaftaran'] == null)) { ?>
                                    <a class="btn btn-primary d-block mt25" href="<?= base_url(); ?>/pendaftaran/tambah_pendaftar/1">Daftar</a>
                                <?php }  ?>
                            <?php elseif ($tanggal_sekarang > $tanggal_penutupan_pendaftaran['tanggal_penting']) : ?>
                                <a class="btn btn-danger d-block mt25">
                                    Pendaftaran Telah Ditutup
                                </a>
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
                                $tanggal_sekarang >= $tanggal_pendaftaran['tanggal_penting'] && $tanggal_sekarang <= $tanggal_penutupan_pendaftaran['tanggal_penting']
                            ) : ?>
                                <?php if ($identitas == null || ($identitas['id_status_peserta'] == 2 && $identitas['id_status_pendaftaran'] == null)) { ?>
                                    <a class="btn btn-primary d-block mt25" href="<?= base_url(); ?>/pendaftaran/tambah_pendaftar/2">Daftar</a>
                                <?php }  ?>
                            <?php elseif ($tanggal_sekarang > $tanggal_penutupan_pendaftaran['tanggal_penting']) : ?>
                                <a class="btn btn-danger d-block mt25">
                                    Pendaftaran Telah Ditutup
                                </a>
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
                                $tanggal_sekarang >= $tanggal_pendaftaran['tanggal_penting'] && $tanggal_sekarang <= $tanggal_penutupan_pendaftaran['tanggal_penting']
                            ) : ?>
                                <?php if ($identitas == null || ($identitas['id_status_peserta'] == 3 && $identitas['id_status_pendaftaran'] == null)) { ?>
                                    <a class="btn btn-primary  d-block mt25" href="<?= base_url(); ?>/pendaftaran/tambah_pendaftar/3">Daftar</a>
                                <?php }  ?>

                            <?php elseif ($tanggal_sekarang > $tanggal_penutupan_pendaftaran['tanggal_penting']) : ?>
                                <a class="btn btn-danger d-block mt25">
                                    Pendaftaran Telah Ditutup
                                </a>
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