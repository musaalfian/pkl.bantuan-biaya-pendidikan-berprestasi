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

            </div>
        </div>
    </nav>
    <!-- End navbar -->
    <!-- Main section -->
    <div class="p40">
        <div class="container">
            <div class="row detail__info__section">
                <div class="col-12 col-md-8">
                    <div class="navigasi d-flex">
                        <a href="<?= base_url(); ?>/halaman_awal/halaman_awal" class="blue">Halaman Awal <span
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
                                <a href="<?= base_url(); ?>/halaman_awal/informasi_pendaftaran/<?= $kumpulan_3_informasi['id_informasi_terbaru']; ?>"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main section -->

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