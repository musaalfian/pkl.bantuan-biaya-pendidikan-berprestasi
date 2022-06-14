<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
</head>

<body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg bg-biru" id="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="<?= base_url(); ?>/home_pendaftar/index" class="logo d-flex text-decoration-none text-white">
                    <img class="d-inline sm_none" src="<?= base_url(); ?>/assets/img/logo-kabupaten-batang 2.png"
                        alt="" />
                    <p class="d-flex   align-items-center ms-2 ">
                        Dinas Pendidikan dan Kebudayaan <br />
                        Kabupaten Batang
                    </p>

                </a>
            </div>
            <button class="navbar-toggler text-white border-0 bg-transparent" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-transparent border-0"><i class="fa-solid fa-sliders"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul> -->
                <div class="me-auto">
                    <ul class="navbar-nav bl ">
                        <li class="nav-item align-self-end ms-lg-4">
                            <a class="nav-link navbarNav br5" id="nav__beranda"
                                href="<?= base_url(); ?>/home_pendaftar/index">Beranda</a>
                        </li>
                        <li class="nav-item align-self-end">
                            <a class="nav-link navbarNav br5" id="nav__informasi"
                                href="<?= base_url(); ?>/home_pendaftar/informasi">Informasi Pendaftaran</a>
                        </li>
                        <li class="nav-item align-self-end position-relative">
                            <?php if ($identitas != null && $identitas['pesan'] != null) : ?>
                            <i class="fas fa-circle icon-notif position-absolute"></i>
                            <?php endif; ?>
                            <!-- cek apakah user sudah mendaftar atau belum. jika belum akan ditampilan view pendaftaran atau jika sudah maka akan ditampilkan menu pengumuman -->
                            <?php if ($identitas == null || $identitas['id_status_pendaftaran'] == null) { ?>
                            <a class="nav-link navbarNav  br5" id="nav__beasiswa"
                                href="<?= base_url(); ?>/home_pendaftar/pendaftaran">Pendaftaran Beasiswa</a>
                            <?php } else { ?>
                            <a class="nav-link navbarNav  br5" id="nav__beasiswa"
                                href="<?= base_url(); ?>/home_pendaftar/pengumuman">Pengumuman Beasiswa
                            </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>

                <div class="nav-item align-self-end me-0">
                    <div class="dropdown nav__icon d-flex justify-content-end ">
                        <button class="dropdown-toggle " style=" background: none !important;border:none !important"
                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- <button class="btn btn_orange">Masuk</button> -->
                            <!-- <i class="fa-solid fa-user-gear fs-4"></i> -->
                            <i class="bi bi-person-circle" style="color: white;font-size: 30px !important;"></i>
                        </button>
                        <ul class="dropdown-menu p-3 br10" aria-labelledby="dropdownMenuButton1">
                            <hr class="dropdown-divider" />
                            <p><?= user()->email; ?></p>
                            <hr class="dropdown-divider" />
                            <li>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-red text " data-bs-toggle="modal"
                                    data-bs-target="#logoutModal">
                                    Logout
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Main Content -->
    <?= $this->renderSection('content'); ?>

    <!-- end Main content -->

    <!-- Footer -->

    <footer class="pt50">
        <div class="container bg-biru  p50 px50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-12" style="height: 20vh;">

                        <div class="d-flex">
                            <img class="" src="<?= base_url(); ?>/assets/img/logo-kabupaten-batang 2.png" alt="" />
                            <p class="bold ms-2"> Dinas Pendidikan dan Kebudayaan <br />
                                Kabupaten Batang</p>
                        </div>


                    </div>
                    <div class="col-lg-4 col-12 mt-md-3 mt-sm-3">
                        <div class="">
                            <div class="">
                                <p class="fw-bold fs16">MENU</p>
                            </div>
                            <div class="">
                                <a href="<?= base_url(); ?>/home_pendaftar/index" class="text-white me-2  ">Beranda</a>
                                <a href="<?= base_url(); ?>/home_pendaftar/informasi"
                                    class=" text-white  me-2 ">Informasi</a>
                                <!-- cek apakah user sudah mendaftar atau belum. jika belum akan ditampilan view pendaftaran atau jika sudah maka akan ditampilkan menu pengumuman -->
                                <?php if ($identitas == null || $identitas['id_status_pendaftaran'] == null) { ?>
                                <a class="text-white  me-2" id=""
                                    href="<?= base_url(); ?>/home_pendaftar/pendaftaran">Pendaftaran Beasiswa</a>
                                <?php } else { ?>
                                <a class=" text-white  me-2"
                                    href="<?= base_url(); ?>/home_pendaftar/pengumuman">Pengumuman Beasiswa
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <p class=" mt20"> <span class="orange fw-bold">©2022.</span> Dinas Pendidikan dan Kebudayaan Kabupaten
                    Batang. All rights reserved</p>
            </div>
        </div>
    </footer>
    <!-- End footer -->

    <!-- LOGOUT  Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">
                        Anda yakin akan keluar?
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Pilih "Logout" dibawah jika anda ingin mengakhiri sesimu sekarang.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <a href="<?= base_url(); ?>/logout" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Custom Js -->
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>
</body>

</html>