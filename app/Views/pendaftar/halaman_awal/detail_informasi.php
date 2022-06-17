<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- CSS Custom -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css" />
</head>

<body>
    <div class="informasi__awal bglight2">
        <div class="container p40">
            <div class="row">
                <div class="nav__back mb40 d-flex align-items-center">
                    <a href="/" class="fw-bold blue fs20"><i class="fa-solid fa-arrow-left-long"></i></a>
                    <h3 class="fw-bold ms-3 fs20">Informasi Pendaftaran</h3>
                </div>
                <div class="col-md-8 col-12 mb-4 mb-md-0">
                    <div class="gambar">
                        <div class="bg">
                            <img src="" alt="Gambar Informasi">
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
                                    <a href="<?= base_url(); ?>/halaman_awal/informasi_pendaftaran/<?= $kumpulan_3_informasi['id_informasi_terbaru']; ?>" class="fw-bold blue fs16">
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
    </div>


    <!-- Custom Js -->
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>
</body>

</html>