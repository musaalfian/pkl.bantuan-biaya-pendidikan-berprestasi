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

<div class="py40 bglight2 beranda">
    <div class="container">
        <!-- Hero -->
        <div class="hero row">
            <div class="col-xl-8 mb-3 mb-xl-0 col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url(); ?>/assets/img/karate.png" class="d-block w-100 br10" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url(); ?>/assets/img/quran2.png" class="d-block w-100 br10" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url(); ?>/assets/img/paskibra.png" class="d-block w-100 br10" alt="..." />
                        </div>
                    </div>
                    <div class="arrow justify-content-end d-flex mt-3">
                        <span class="carousel-control me-2" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon-hidden" aria-hidden="true"><i class="bi bi-arrow-left-circle-fill blue fs20"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </span>

                        <span class="carousel-control" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon-hidden" aria-hidden="true"><i class="bi bi-arrow-right-circle-fill blue fs20"></i></span>
                            <span class="visually-hidden">Next</span>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Informasi terbaru -->
            <div class="info__baru col-xl-4 col-12" data-bs-spy="scroll" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <div class="border px-4 br20 p25 overflow-auto h-100 bg-white">
                    <h4 class="black fw-bold fs20">Informasi Terbaru</h3>
                        <?php foreach ($informasi as $informasi) : ?>
                            <div class="border-bottom pb-2 mt20">
                                <div class="info__section">
                                    <a href="<?php base_url(); ?>/home_pendaftar/detail_informasi/<?= $informasi['id_informasi_terbaru']; ?>" class="fw-bold blue fs16">
                                        <?= $informasi['judul_informasi_terbaru']; ?>
                                    </a>
                                    <div class="mt5">
                                        <p class="fs14">
                                            <?= $informasi['deskripsi_singkat']; ?>
                                        </p>
                                    </div>
                                    <div class="tanggal">
                                        <p class="mt5 fs12"><?= $informasi['tanggal_indo_informasi']; ?> WIB</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="mt-4 info__selengkapnya">
                            <a href="<?= base_url(); ?>/home_pendaftar/kumpulan_informasi_terbaru" class="d-flex align-items-center fs16">
                                Lihat informasi selengkapnya
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                </div>
            </div>
            <!-- End informasi terbaru -->
        </div>
        <!-- End hero -->

        <!-- Kuota -->
        <h3 class="fw-bold text-center mx-auto mt40 mb40 blue">Kuota dan Alokasi</h3>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-12 mb-3 mb-lg-0">
                <div class="p-5 br25 bgwhite m-auto d-flex justify-content-center align-items-center">
                    <div class="">
                        <img src="<?= base_url(); ?>/assets/img/kuota/sma.png" alt="" class="br25" />
                        <div class="mt-3 text-center">
                            <h4 class="fw-bold">Peserta Didik</h4>
                            <h6 class="mb-0 mt-1 lightgrey" id="jumlahpesertadidik">
                                200 orang
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-12 mb-3 mb-lg-0">
                <div class="p-5 br25 bgwhite m-auto d-flex justify-content-center align-items-center">
                    <div class="">
                        <img src="<?= base_url(); ?>/assets/img/kuota/calon-mahasiswa.png" alt="" class="br25" />
                        <div class="mt-3 text-center">
                            <h4 class="fw-bold">Calon Mahasiswa</h4>
                            <h6 class="mb-0 mt-1 lightgrey" id="jumlahpesertadidik">
                                10 s.d 15 orang
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-12 mb-3 mb-lg-0">
                <div class="p-5 br25 bgwhite m-auto d-flex justify-content-center align-items-center">
                    <div class="">
                        <img src="<?= base_url(); ?>/assets/img/kuota/mahasiswa.png" alt="" class="br25" />
                        <div class="mt-3 text-center">
                            <h4 class="fw-bold">Mahasiswa</h4>
                            <h6 class="mb-0 mt-1 lightgrey" id="jumlahpesertadidik">
                                10 s.d 20 orang
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End kuota -->

        <!-- Jalur beasiswa -->
        <h3 class="kuota fw-bold text-center mx-auto mt40 mb40 blue">Jalur Beasiswa</h3>
        <div class="row">
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
                                <?php if ($identitas == null || ($identitas['id_status_peserta'] == 1 && $identitas['id_status_pendaftaran'] == null)) { ?>
                                    <a class="btn btn-primary d-block mt25" href="<?= base_url(); ?>/siswa/tambah_identitas_siswa">Daftar</a>
                                <?php }  ?>
                            <?php endif;  ?>
                        </div>
                    </div>
                </div>
            </div>
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
                                <?php if ($identitas == null || ($identitas['id_status_peserta'] == 2 && $identitas['id_status_pendaftaran'] == null)) { ?>
                                    <a class="btn btn-primary d-block mt25" href="<?= base_url(); ?>/calon_mhs/tambah_identitas_calon_mhs">Daftar</a>
                                <?php }  ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
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
                                <?php if ($identitas == null || ($identitas['id_status_peserta'] == 3 && $identitas['id_status_pendaftaran'] == null)) { ?>
                                    <a class="btn btn-primary d-block mt25" href="<?= base_url(); ?>/mahasiswa/tambah_identitas_mhs">Daftar</a>
                                <?php }  ?>
                            <?php endif  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End jalur beasiswa -->
    </div>
</div>

<?= $this->endSection(); ?>