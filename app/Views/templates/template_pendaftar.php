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
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-biru" id="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="<?= base_url(); ?>/home_pendaftar/index"
                    class="logo d-flex me-auto text-decoration-none text-white">
                    <img class="d-inline" src="<?= base_url(); ?>/assets/img/logo-kabupaten-batang 2.png" alt="" />
                    <h4 class="d-flex align-items-center ms-2 fs16 fw400">
                        Dinas Pendidikan dan Kebudayaan <br />
                        Kabupaten Batang
                    </h4>
                </a>
            </div>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="bi bi-list text-white"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <div class="d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item align-self-end">
                            <a class="nav-link navbarNav fw400" id="nav__beranda"
                                href="<?= base_url(); ?>/home_pendaftar/index">Beranda</a>
                        </li>
                        <li class="nav-item align-self-end">
                            <a class="nav-link navbarNav fw400" id="nav__informasi"
                                href="<?= base_url(); ?>/home_pendaftar/informasi">Informasi Pendaftaran</a>
                        </li>
                        <li class="nav-item align-self-end position-relative">
                            <?php if ($identitas != null && $identitas['pesan'] != null) : ?>
                            <i class="fas fa-circle icon-notif position-absolute"></i>
                            <?php endif; ?>
                            <!-- cek apakah user sudah mendaftar atau belum. jika belum akan ditampilan view pendaftaran atau jika sudah maka akan ditampilkan menu pengumuman -->
                            <?php if ($identitas == null || $identitas['id_status_pendaftaran'] == null) { ?>
                            <a class="nav-link navbarNav fw400" id="nav__beasiswa"
                                href="<?= base_url(); ?>/home_pendaftar/pendaftaran">Pendaftaran Beasiswa</a>
                            <?php } else { ?>
                            <a class="nav-link navbarNav fw400" id="nav__beasiswa"
                                href="<?= base_url(); ?>/home_pendaftar/pengumuman">Pengumuman Beasiswa
                            </a>
                            <?php } ?>
                        </li>
                        <li class="nav-item align-self-end me-0">
                            <div class="dropdown nav__icon">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle fs-4"></i>
                                </button>
                                <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton1">
                                    <hr class="dropdown-divider" />
                                    <li><?= user()->email; ?></li>
                                    <hr class="dropdown-divider" />
                                    <li>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="text-black btn__modal" data-bs-toggle="modal"
                                            data-bs-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Main Content -->
    <?= $this->renderSection('content'); ?>

    <!-- end Main content -->

    <!-- Footer -->
    <footer class="bg-biru text-center pt20 pb20">
        <div class="container">
            <p class="fs16">
                ©2022. Dinas Pendidikan dan Kebudayaan Kabupaten Batang. All rights
                reserved
            </p>
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