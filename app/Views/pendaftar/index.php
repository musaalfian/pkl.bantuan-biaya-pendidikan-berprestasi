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
<!-- Hero section -->
<div class=" p40">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mb-3 mb-xl-0 col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
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
                    <div class="arrow justify-content-end d-flex mt15">
                        <span class="carousel-control me-2" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon-hidden" aria-hidden="true"><i
                                    class="bi bi-arrow-left-circle-fill blue"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </span>

                        <span class="carousel-control" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon-hidden" aria-hidden="true"><i
                                    class="bi bi-arrow-right-circle-fill blue"></i></span>
                            <span class="visually-hidden">Next</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Informasi terbaru -->
            <div class="col-xl-4 col-12" data-bs-spy="scroll" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <div class="border px-4 br20 p25 overflow-scroll height__scroll bg-white">
                    <h3 class="biru">Informasi <span class="orange">Terbaru</span></h3>
                    <?php foreach ($informasi as $informasi) : ?>
                    <div class="border-bottom pb-2 mt20">
                        <div class="info__section">
                            <a href="<?php base_url(); ?>/home_pendaftar/detail_informasi/<?= $informasi['id_informasi_terbaru']; ?>"
                                class="fw-bold blue">
                                <?= $informasi['judul_informasi_terbaru']; ?>
                            </a>
                            <div class="mt5">
                                <p class="fs12">
                                    <?= $informasi['deskripsi_singkat']; ?>
                                </p>
                            </div>
                            <div class="tanggal">
                                <p class="mt5 fs12"><?= $informasi['tanggal_indo_informasi']; ?> WIB</p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="mt-4 list__info">
                        <a href="<?= base_url(); ?>/home_pendaftar/kumpulan_informasi_terbaru" class="btn bg-biru ">
                            Lihat informasi selengkapnya
                            <i class="bi bi-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <!-- End informasi terbaru -->
        </div>
    </div>
</div>
<!-- End hero section -->

<!-- Kuota -->
<div class="container bg-abu br20 pd__80">
    <div class="tengah">
        <h3 class="biru fw-bold">Kuota dan <span class="orange">Alokasi</span> </h3>
    </div>
    <div class="row pt60 justify-content-center">
        <div class="col-md-4 mb20 mb-md-0 col-sm-5 col-12 mb-lg-0 mb-md-0 mb-sm-4">
            <div class="p25 bs1 br10 bg-white">
                <div class="tengah">
                    <img src="<?= base_url(); ?>/assets/img/kuota/sma.png" alt="" />
                </div>
                <div class="tengah mt-4">
                    <h4>Peserta Didik</h4>
                </div>
                <div class="tengah">
                    <p><span id="jumlahpesertadidik">200</span> orang</p>
                </div>
            </div>
        </div>
        <!-- end peserta didik -->
        <div class="col-md-4 mb20 mb-md-0 col-sm-5 col-12 mb-lg-0 mb-md-0 mb-sm-2">
            <div class="p25 bs1 br10 bg-white">
                <div class="tengah">
                    <img src="<?= base_url(); ?>/assets/img/kuota/calon-mahasiswa.png" alt="" />
                </div>
                <div class="tengah mt-4">
                    <h4>Calon Mahasiswa</h4>
                </div>
                <div class="tengah">
                    <p><span id="jumlahpesertadidik">10 s.d 15</span> orang</p>
                </div>
            </div>
        </div>
        <!-- end calon mahasiswa -->
        <div class="col-md-4 mb20 mb-md-0 col-sm-5 col-12">
            <div class="p25 bs1 br10 bg-white">
                <div class="tengah">
                    <img src="<?= base_url(); ?>/assets/img/kuota/mahasiswa.png" alt="" />
                </div>
                <div class="tengah mt-4">
                    <h4>Mahasiswa</h4>
                </div>
                <div class="tengah">
                    <p><span id="jumlahpesertadidik">10 s.d 20</span> orang</p>
                </div>

            </div>
        </div>
        <!-- end mahasiswa -->
    </div>
</div>
<!-- End kuota -->

<!-- Jalur beasiswa -->
<div class=" py40">
    <div class="container">
        <h3 class="text-center biru">Jalur  <span class="orange">Beasiswa</span></h3>
        <div class="row mt40 justify-content-lg-between justify-content-around jalur_beasiswa">
            <!-- Peserta didik -->
            <div class="card__beasiswa br20 bs2  col-lg-4 mb20 mb-lg-0 col-md-5 col-12 border gx-1 p-5 bg-white">
                <div class="text-center">
                    <img src="<?= base_url(); ?>/assets/img/tut wuri handayani.png"  alt="" />
                </div>
                <div class="deskripsi text-center">
                    <h4 class="mt-5 bold biru mb-2 ">Peserta Didik</h4>
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
                    <?php if ($identitas == null || ($identitas['id_status_peserta'] == 1 && $identitas['id_status_pendaftaran'] == null)) { ?>
                    <a class="btn btn-primary d-block mt25"
                        href="<?= base_url(); ?>/siswa/tambah_identitas_siswa">Daftar</a>
                    <?php }  ?>
                    <?php endif;  ?>
                </div>
            </div>
            <!-- End peserta didik -->

            <!-- Calon mahasiswa -->
            <div class="card__beasiswa br20 bs2 col-lg-4 mb20 mb-lg-0 col-md-5 col-12 border gx-1 p-5 bg-white">
                <div class="text-center">
                    <img src="<?= base_url(); ?>/assets/img/tut wuri handayani.png" alt="" />
                </div>
                <div class="deskripsi text-center">
                    <h4 class="mt-5 bold biru mb-2">Calon Mahasiwa</h4>
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
                    <?php if ($identitas == null || ($identitas['id_status_peserta'] == 2 && $identitas['id_status_pendaftaran'] == null)) { ?>
                    <a class="btn btn-primary d-block mt25"
                        href="<?= base_url(); ?>/calon_mhs/tambah_identitas_calon_mhs">Daftar</a>
                    <?php }  ?>
                    <?php endif ?>
                </div>
            </div>
            <!-- End calon mahasiswa -->

            <!-- Mahasiswa -->
            <div class="card__beasiswa br20 bs2 col-lg-4 mb20 mb-lg-0 col-md-5 col-12 border gx-1 p-5 bg-white">
                <div class="text-center">
                    <img src="<?= base_url(); ?>/assets/img/tut wuri handayani.png" alt="" />
                </div>
                <div class="deskripsi text-center">
                    <h4 class="mt-5 bold biru mb-2">Mahasiswa</h4>
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
                    <?php if ($identitas == null || ($identitas['id_status_peserta'] == 3 && $identitas['id_status_pendaftaran'] == null)) { ?>
                    <a class="btn btn-primary d-block mt25"
                        href="<?= base_url(); ?>/mahasiswa/tambah_identitas_mhs">Daftar</a>
                    <?php }  ?>
                    <?php endif  ?>
                </div>
            </div>
            <!-- End mahasiswa -->
        </div>
    </div>
</div>
<!-- End jalur beasiswa -->

<?= $this->endSection(); ?>