<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Website Bantuan Biaya Pendidikan Berprestasi Dari Keluarga Miskin. Menyajikan Informasi Pendaftaran Bantuan Biaya Pendidikan dan Melakukan Pendataftaran Bantuan Biaya Pendidikan Berprestasi.">
    <meta name="author" content="Dinas Pendidikan dan Kebudayaan Kabupaten Batang">
    <meta name="keywords"
        content="beasiswa, bantuan, biaya, pendidikan, batang, dinas, beasiswa batang,bantuan biaya,bantuan biaya pendidikan,biaya pendidikan,bantuan biaya batang,bantuan biaya pendidikan batang,dinas pendidikan,dinas pendidikan dan kebudayaan,dinas pendidikan batang">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="Bantuan Biaya Pendidikan Berprestasi Kabupaten Batang" />
    <!-- website name -->
    <meta property="og:site" content="https://bandikmentibatang.com/" /> <!-- website link -->
    <meta property="og:title" content="Bantuan Biaya Pendidikan Berprestasi Kabupaten Batang" />
    <!-- title shown in the actual shared post -->
    <meta property="og:description"
        content="Website Bantuan Biaya Pendidikan Berprestasi Dari Keluarga Miskin. Menyajikan Informasi Pendaftaran Bantuan Biaya Pendidikan dan Melakukan Pendataftaran Bantuan Biaya Pendidikan Berprestasi." />
    <!-- description shown in the actual shared post -->
    <meta property="og:image" content="https://www.batangkab.go.id/src/front/img/batang128.png" />
    <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <title><?= $title; ?></title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- ICON -->
    <script src="https://kit.fontawesome.com/5fbcc24921.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- CSS Custom -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Dropify -->
    <link rel="stylesheet" href="<?= base_url(); ?>/dropify/dist/css/dropify.css" />
    <script src="<?= base_url('dropify/dist/js/dropify.js') ?>" type="text/javascript"></script>

    <!-- Form wizard -->
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript">
    </script>
    <script>
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bgblue py-3" id="navbar">
        <div class="container pendaftar">
            <div class="navbar-brand logo">
                <a href="<?= base_url(); ?>/home_pendaftar/index"
                    class="d-flex align-items-center text-decoration-none text-white">
                    <img src="<?= base_url(); ?>/assets/img/logo-kabupaten-batang 2.png" width="40px"
                        alt="Logo Kabupaten Batang" />
                    <h3 class="ms-2 fs14">Dinas Pendidikan dan Kebudayaan <br> Kabupaten Batang</h3>
                </a>
            </div>
            <button class="navbar-toggler text-white border-0 bg-transparent" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-transparent border-0 "
                    style="background-color: transparent !important;"><i class="fa-solid fa-sliders"></i></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item align-self-end">
                        <a class="nav-link navbarNav" id="nav__beranda"
                            href="<?= base_url(); ?>/home_pendaftar/index">Beranda</a>
                    </li>
                    <li class="nav-item align-self-end">
                        <a class="nav-link navbarNav mx-0 mx-lg-5" id="nav__informasi"
                            href="<?= base_url(); ?>/home_pendaftar/informasi">Informasi Pendaftaran</a>
                    </li>
                    <li class="nav-item align-self-end position-relative">
                        <?php if ($identitas != null && $identitas['pesan'] != null) : ?>
                        <i class="fas fa-circle icon-notif position-absolute"></i>
                        <?php endif; ?>
                        <!-- cek apakah user sudah mendaftar atau belum. jika belum akan ditampilan view pendaftaran atau jika sudah maka akan ditampilkan menu pengumuman -->
                        <?php if ($identitas == null || $identitas['id_status_pendaftaran'] == null) { ?>
                        <a class="nav-link navbarNav " id="nav__beasiswa"
                            href="<?= base_url(); ?>/home_pendaftar/pendaftaran">Pendaftaran Beasiswa</a>
                        <?php } else { ?>
                        <a class="nav-link navbarNav " id="nav__beasiswa"
                            href="<?= base_url(); ?>/home_pendaftar/pengumuman">Pengumuman Beasiswa
                        </a>
                        <?php } ?>
                    </li>
                </ul>

                <div class="nav-item align-self-end me-0">
                    <div class="dropdown d-flex justify-content-end ">
                        <button class="dropdown-toggle bg-transparent border-0" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle text-white fs24"></i>
                        </button>
                        <ul class="dropdown-menu py-3 px-5 br10" aria-labelledby="dropdownMenuButton1">
                            <h6 class="fs14 fw-bold"><?= user()->username; ?></h6>
                            <hr class="dropdown-divider" />
                            <p><?= user()->email; ?></p>
                            <hr class="dropdown-divider" />
                            <li class="d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-red mt-3" data-bs-toggle="modal"
                                    data-bs-target="#logoutModal">
                                    Keluar
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Logout  Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title bold" id="logoutModalLabel">
                        Anda yakin akan keluar?
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Pilih "Keluar" dibawah jika anda ingin mengakhiri sesimu sekarang.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <a href="<?= base_url(); ?>/logout" class="btn btn-danger">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End navbar -->

    <!-- Main Content -->
    <?= $this->renderSection('content'); ?>
    <!-- end Main content -->

    <!-- Footer -->
    <footer class="bgblue pt40 text-white">
        <div class="container user">
            <div class="row mb40 justify-content-between">
                <div class="col-md-6 col-12">
                    <h2 class="fw-bold fs16">Sistem Informasi Bantuan Biaya <br>
                        Pendidikan Berprestasi</h2>
                    <div class="desc darklight mt-2 mt-md-3">
                        <h3 class="fs14 fw-normal grey lh1">Merupakan sistem informasi berbasis website yang digunakan
                            untuk melakukan
                            pendaftaran program bantuan biaya pendidikan berprestasi bagi peserta didik pendidikan
                            menengah dan mahasiswa dari
                            keluarga miskin di Kabupaten Batang.</a>
                        </h3>
                    </div>
                    <div class="logo__indo">
                        <a href="https://indonesiamaju.or.id/" target="_blank">
                            <img src="<?= base_url('assets/img/logo-2030.png'); ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="nav__footer d-flex justify-content-start justify-content-md-end">
                        <div class="item me-3 me-sm-5 me-md-3 me-lg-5">
                            <h3 class="fw-bold fs16 mb-2 mb-md-3">Program Beasiswa</h3>
                            <a href="<?= base_url(); ?>/home_pendaftar/pendaftaran" class="fs14 grey">
                                Peserta didik
                            </a>
                            <br>
                            <a href="<?= base_url(); ?>/home_pendaftar/pendaftaran" class="fs14 grey">
                                Calon mahasiswa
                            </a>
                            <br>
                            <a href="<?= base_url(); ?>/home_pendaftar/pendaftaran" class="fs14 grey">
                                Mahasiswa
                            </a>
                        </div>
                        <div class="item">
                            <h3 class="fw-bold fs16 mb-2 mb-md-3">Informasi</h3>
                            <a href="<?= base_url(); ?>/home_pendaftar/kumpulan_informasi_terbaru" class="fs14 grey">
                                Informasi terbaru
                            </a>
                            <br>
                            <a href="/halaman_awal/informasi_pendaftaran/1" class="fs14 grey">
                                Informasi pendaftaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sosmed mb20">
                <div class="content d-flex">
                    <a href="https://www.instagram.com/disdikbud_batang/" target="_blank">
                        <div class="d-flex justify-content-center align-items-center icon">
                            <i class="fa-brands fa-instagram" id="insta"></i>
                        </div>
                    </a>
                    <a href="https://disdikbud.batangkab.go.id/index.html" target="_blank" class="ms-3">
                        <div class="d-flex justify-content-center align-items-center icon">
                            <i class="fa-solid fa-globe" id="web"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="copyright text-center p-3 p-lg-4 border-top">
                <h3 class="fs14 fw-normal"><i class="fa-solid fa-copyright me-2"></i>2022. Dinas Pendidikan dan
                    Kebudayaan Kabupaten Batang. All Right Reserved.</h3>
            </div>
        </div>
    </footer>
    <!-- End footer -->

    <!-- Custom Js -->
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>
</body>

</html>